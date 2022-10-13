<?php
include_once('./_common.php');
	/**
	 * 함수 Parsing / Cookie GET / GET/POST Send
	 * Need php_curl extension.
	 */

	$httph = "Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko";
	/**
	 * [splits 파싱파싱잼]
	 * @param  [string]  $data  [데이터를 입력합니다.]
	 * @param  [string]  $first [파싱할 때 첫 부분을 입력합니다.]
	 * @param  [string]  $end   [파싱할 때 마지막 부분을 입력합니다.]
	 * @param  integer $num   [몇 번째로 파싱할 것인지 입력합니다. 이 부분은 두셔도 됩니다.]
	 * @return [string]         [결과값을 출력합니다.]
	 */
	function splits($data, $first, $end, $num = 1)
	{
		$temp = explode($first, $data);
		$temp = explode($end, $temp[$num]);
		$temp = $temp[0];
		return $temp;
	}

	function webdata($url,$paramType="GET",$param=NULL, $cookie=NULL, $header=NULL)
	{
		global $httph;
		$paramType = strtoupper($paramType);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_USERAGENT, $httph);
		curl_setopt($ch, CURLOPT_COOKIE, $cookie);
		curl_setopt($ch, CURLOPT_HEADER, $header);
		curl_setopt($ch, CURLOPT_NOBODY, false);

		if ($paramType == "POST") {
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
		}

		$data = curl_exec($ch);

		curl_close($ch);
		return ($data) ? $data : false;
	}
?>