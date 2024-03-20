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

//用户信息-余额查询 列表
$param = [
    'action'=>"dininghall/open_api/Api/useraccount",
    'user_phone'=>"13388889999"
];
$response = json_decode($LyxxClient->getApiResponse("get","/food/api",$param));
/**
 * 返回示例：
{
    "code": 1,
    "msg": "操作成功！",
    "data": {
        "user_name": "测试教师",
        "user_id": 7044,
        "user_phone": "13388889999",
        "balance": "6.00"
    }
}
 * */

var_dump($response);