<?php
class Request {
	public    $max_timeout = 5;
	public    $meta        = [];

	function __construct(  ) {		
	}

	function __destruct() {		
	}

	/* Start: Required ( Abstract ) functions */

	function prepare_command( $params, $parse_result = true ) {
		$this->post_raw        = null;
		$this->post_fields     = null;
		$this->curl_method     = null;
		$this->curl_identifier = null;
		$this->curl_timeout    = $this->max_timeout;

		$this->command  = $params['command'];

		if ( ! empty( $params['post_fields'] ) )
			$this->post_fields = (bool) $params['post_fields'];
		if ( ! empty( $params['post_raw'] ) )
			$this->post_raw = $params['post_raw'];

		$this->curl_headers = [];

		if ( ! empty( $params['headers'] ) )
			$this->curl_headers = $this->headers_merge( $this->curl_headers, $params['headers'] );
		if ( ! empty( $params['curl_timeout'] ) )
			$this->curl_timeout = $params['curl_timeout'];
		if ( ! empty( $params['curl_identifier'] ) )
			$this->curl_identifier = $params['curl_identifier'];
		if ( ! empty( $params['curl_method'] ) )
			$this->curl_method = $params['curl_method'];

		unset( $params['command'], $params['post_fields'], $params['post_raw'], $params['headers'],
			$params['curl_timeout'], $params['curl_identifier'], $params['curl_method'] );

		if ( $this->post_fields ) {
			$this->post_fields = $params;
		} elseif ( ! empty( $params ) && ! $this->post_raw ) {
			$this->command .= '?' . http_build_query( $params );
		}
	}

	function headers_merge( $headers1, $headers2 ) {
		foreach ( $headers1 as $k1 => $h1 ) {
			foreach ( $headers2 as $k2 => $h2 ) {
				$parts = explode( ':', $h2 );
				if ( count( $parts ) < 2 )
					continue;
	
				if ( 0 === stripos( $h1, "{$parts[0]}:" ) ) {
					$headers1[$k1] = $h2;
					unset( $headers2[$k2] );
				}
			}
		}
	
		foreach ( $headers2 as $h2 )
			$headers1[] = $h2;
	
		return $headers1;
	}

	function curl_setopt_proxy( $curl ) {
		curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $curl, CURLOPT_HTTPPROXYTUNNEL, 0 );
		curl_setopt( $curl, CURLOPT_PROXYTYPE, 'HTTP' );
		curl_setopt( $curl, CURLOPT_PROXY, '127.0.0.1' );
		curl_setopt( $curl, CURLOPT_PROXYPORT, '8888' );
	}

	function parse_command_result( $result, $is_multi = false ) {
		$this->command_result_raw = $result;

		$doc   = new DOMDocument();
		@$doc->loadHTML( $result );

		$result = new DomXPath( $doc );

		if ( ! $is_multi )
			$this->command_result = $result;

		return $result;
	}

	protected function curl_do_setopt( $curl, $cookiefile, $follow_location ) {
		// curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, $follow_location );
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $curl, CURLOPT_COOKIEFILE, $cookiefile );
		curl_setopt( $curl, CURLOPT_COOKIEJAR, $cookiefile );		
		// curl_setopt( $curl, CURLOPT_HTTPHEADER, $this->curl_headers );
		curl_setopt( $curl, CURLOPT_VERBOSE, false );
		// curl_setopt( $curl, CURLOPT_HEADER, false );
		curl_setopt( $curl, CURLOPT_CONNECTTIMEOUT, $this->curl_timeout );
		curl_setopt( $curl, CURLOPT_TIMEOUT, $this->curl_timeout );
		// curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );
		// curl_setopt( $curl, CURLOPT_ENCODING, '' );
		// curl_setopt( $curl, CURLOPT_PRIVATE, $this->curl_identifier ?? null );	

		if ( ! empty( $this->user_config['proxy'] ) ) {
            $this->curl_setopt_proxy( $curl );
		} else {
			curl_setopt( $curl, CURLOPT_INTERFACE, null );
			curl_setopt( $curl, CURLOPT_PROXY, null );
		}

		if ( is_array( $this->post_fields ) ) {
			curl_setopt( $curl, CURLOPT_POST, true );
			$post_query = http_build_query( $this->post_fields );

			foreach ( $this->post_fields as $post_field ) {
				if ( ! is_array( $post_field ) )
					continue;

				$post_query = preg_replace( '/%5B[0-9]+%5D/simU', '%5B%5D', $post_query );
				break;
			}

			curl_setopt( $curl, CURLOPT_POSTFIELDS, $post_query );
			if ( defined( 'DEBUG_BOOKMAKER_COMMANDS' ) )
				$this->log_action( "POST: {$this->command} : " . http_build_query( $this->post_fields ) );
		} elseif ( ! empty( $this->post_raw ) ) {
			curl_setopt( $curl, CURLOPT_POST, true );
			curl_setopt( $curl, CURLOPT_POSTFIELDS, $this->post_raw );
			if ( defined( 'DEBUG_BOOKMAKER_COMMANDS' ) )
				$this->log_action( "POST: {$this->command} : " . $this->post_raw );
		} else {
			curl_setopt( $curl, CURLOPT_POST, false );
		}

		if ( ! empty( $this->curl_method ) )
			curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, $this->curl_method );
	}

	function send_command( $params, $parse_result = true, $follow_location = true, $cookiefile = "" ) {
        if ( ! is_array( $params ) )
            throw new Exception( "The params list is not a valid array." );

        $this->command = '';
        $this->command_result = '';
		$this->command_http_code = 0;
        $this->command_result_raw = '';
        $this->prepare_command( $params, $parse_result );
        if ( defined( 'DEBUG_BOOKMAKER_COMMANDS' ) ) {
            $send_command_start = microtime( true );
            //$this->log_action( $this->command );
        }

        if ( isset( $this->curl ) && is_resource( $this->curl ) )
            $curl = $this->curl;
        else
            $this->curl = $curl = curl_init();

		curl_setopt( $curl, CURLOPT_URL, $this->command );
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $curl, CURLOPT_COOKIEFILE, $cookiefile );
		curl_setopt( $curl, CURLOPT_COOKIEJAR, $cookiefile );		
		// curl_setopt( $curl, CURLOPT_HTTPHEADER, $this->curl_headers );
		curl_setopt( $curl, CURLOPT_VERBOSE, false );
		// curl_setopt( $curl, CURLOPT_HEADER, false );
		curl_setopt( $curl, CURLOPT_CONNECTTIMEOUT, $this->curl_timeout );
		curl_setopt( $curl, CURLOPT_TIMEOUT, $this->curl_timeout );
		// if( $cookiefile == "" ) {
		// 	$cookiefile = $this->cookiefile;
		// }
        // $this->curl_do_setopt( $curl, $cookiefile, $follow_location );
        $result = $this->command_result_raw = curl_exec( $curl );

        if ( defined( 'DEBUG_BOOKMAKER_COMMANDS' ) )
            $this->log_action( $this->command . ' [ '  . number_format( microtime( true ) - $send_command_start, 3 ) . 's ]' );

        if ( curl_errno( $curl ) || ( $result === false ) ) {
            $curl_error = curl_error( $curl );
            curl_close( $curl );
            throw new Exception( $this->command . "\n" . 'Empty result or command failed. Curl Error: ' . $curl_error );
        }

        $this->command_http_code = curl_getinfo( $curl, CURLINFO_HTTP_CODE );
        $effective_url = curl_getinfo( $curl, CURLINFO_EFFECTIVE_URL );

        if ( $this->command_http_code > 500 )
            throw new Exception( $this->command . "\n" . 'Bad return code: ' . $this->command_http_code );

        if ( ! $parse_result )
            return $this->command_result = $result;

        try {
			if ( 'json' === $parse_result )
				return $this->command_result = json_decode( $result, false );

            return $this->parse_command_result( $result );
        } catch ( Exception $e ) {
            if ( defined( 'DEBUG_BOOKMAKER_COMMANDS' ) )
                $this->log_action( $this->command . "\nCommand parsing failed, response: " . $result );
            throw new Exception( $e->getMessage() );
        }
	}
    /* End: Required ( Abstract) functions */
}
?>