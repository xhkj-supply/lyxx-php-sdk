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

//订单状态列表
$param = [
    'action'=>"dininghall/open_api/Api/getstatuslist"
];
$response = json_decode($LyxxClient->getApiResponse("get","/food/api",$param));
/**
 * 返回示例：
{
    "code": 1,
    "msg": "操作成功！",
    "data": [
        {
            "label": "已下单",
            "value": 1,
            "checked": true
        },
        {
            "label": "已扣款",
            "value": 2,
            "checked": true
        },
        {
            "label": "已确认",
            "value": 3,
            "checked": true
        },
        {
            "label": "已取消",
            "value": 4,
            "checked": true
        },
        {
            "label": "已取餐/完成",
            "value": 5,
            "checked": true
        },
        {
            "label": "部分退款/完成",
            "value": 6,
            "checked": true
        },
        {
            "label": "全部退款",
            "value": 7,
            "checked": true
        }
    ]
}
 * */

var_dump($response);