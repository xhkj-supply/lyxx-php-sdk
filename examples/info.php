<?php

require_once __DIR__ . '/../autoload.php';

use Xhkj\Lyxx\LyxxClient;

$appKey = "your appkey";
$appSecret = "your appSecret";

try {
	$LyxxClient = new LyxxClient($appKey,$appSecret);
} catch (OssException $e) {
	printf(__FUNCTION__ . "creating LyxxClient instance: FAILED\n");
	printf($e->getMessage() . "\n");
	return null;
}

//获取开发者登录信息
$param = ['action'=>"dininghall/open_api/api/loginuserinfo"];
$response = json_decode($LyxxClient->getApiResponse("get","/food/api",$param));

//$param = ['action'=>"dininghall/open_api/Api/gethalls"];
//$response = json_decode($LyxxClient->getApiResponse("get","/food/api",$param));

var_dump($response);