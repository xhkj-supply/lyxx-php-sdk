<?php

require_once __DIR__ . '/../autoload.php';

use Xhkj\Lyxx\LyxxClient;

$appKey = "yunzL9Ua6L3qkZS42qW";
$appSecret = "Q9alTTwXT9I3glDK8THBDpSKhVWUIhQI";

try {
	$LyxxClient = new LyxxClient($appKey,$appSecret);
} catch (OssException $e) {
	printf(__FUNCTION__ . "creating LyxxClient instance: FAILED\n");
	printf($e->getMessage() . "\n");
	return null;
}

//获取开发者登录信息
$param = [
	'action'=>"dininghall/open_api/api/loginuserinfo"
];
$response = json_decode($LyxxClient->getApiResponse("get","/food/api",$param));
/**
 * 返回示例:
{
    "code": 1,
    "msg": "操作成功！",
    "data": {
        "id": 1,
        "name": "供应商1",
        "appkey": "yunzL9Ua6L3qkZS42qW",
        "appsecret": "Q9alTTwXT9I3glDK8THBDpSKhVWUIhQI",
        "token": "4031567e42e71b881dcbf68572cc6b9c",
        "token_time": "2024-02-26 23:28:30",
        "login_ip": "127.0.0.1",
        "login_time": "2024-02-26 17:27:23",
        "refresh_time": "2024-02-26 17:28:30",
        "updata_time": "2024-02-26 17:28:30",
        "create_time": "2024-02-26 17:27:23"
    }
}
 */

var_dump($response);