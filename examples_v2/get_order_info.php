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

//订单详情（子订单）
$param = [
    'action'=>"dininghall/open_api/Api/userordedetails",
    'user_id'=>"7044",
    'id'=>"508967"
];
$response = json_decode($LyxxClient->getApiResponse("get","/food/api",$param));
/**
 * 返回示例：
{
    "code": 1,
    "msg": "操作成功！",
    "data": {
        "id": 508967,
        "user_id": 7044,
        "type": "三方入口-消费扣款",
        "amount": "0.00",
        "balance": "7.00",
        "reason": "2024-03-20 15:05:27[已退款1 元]-退款原因：水退款1元|2024-03-20 15:05:12-超市消费2元-订单通过第三方入口支付",
        "handle_uid": 0,
        "unique_key": "SXF17109183126209",
        "part_refund_amount": "1.00",
        "create_time": "2024-03-20 15:05:12",
        "update_time": "2024-03-20 15:05:27",
        "reason_list": [
            "2024-03-20 15:05:27[已退款1 元]-退款原因：水退款1元",
            "2024-03-20 15:05:12-超市消费2元-订单通过第三方入口支付"
        ],
        "remaining_refund_amount": 0,
        "is_refund": 1
    }
}
 * */

var_dump($response);