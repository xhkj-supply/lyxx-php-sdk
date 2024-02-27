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

//性别列表
$param = [
    'action'=>"dininghall/open_api/Api/getsex"
];
$response = json_decode($LyxxClient->getApiResponse("get","/food/api",$param));
/**
 * 返回示例：
{
    "code": 1,
    "msg": "操作成功！",
    "data": [
        {
            "label": "未知",
            "value": 0,
            "checked": true
        },
        {
            "label": "男",
            "value": 1,
            "checked": true
        },
        {
            "label": "女",
            "value": 2,
            "checked": true
        }
    ]
}
 * */

var_dump($response);