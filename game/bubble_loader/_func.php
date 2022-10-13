<?php
include_once('./_common.php');
	/**
	 * �Լ� Parsing / Cookie GET / GET/POST Send
	 * Need php_curl extension.
	 */

	$httph = "Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko";
	/**
	 * [splits �Ľ��Ľ���]
	 * @param  [string]  $data  [�����͸� �Է��մϴ�.]
	 * @param  [string]  $first [�Ľ��� �� ù �κ��� �Է��մϴ�.]
	 * @param  [string]  $end   [�Ľ��� �� ������ �κ��� �Է��մϴ�.]
	 * @param  integer $num   [�� ��°�� �Ľ��� ������ �Է��մϴ�. �� �κ��� �μŵ� �˴ϴ�.]
	 * @return [string]         [������� ����մϴ�.]
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