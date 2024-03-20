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

//订单支付扣款-余额扣款
$param = [
    'action'=>"dininghall/open_api/Api/userpayment",
    'user_id'=>7044,
    'payment_recharge_balance'=>1,
    'payment_recharge_reason'=>"超市消费2元"
];
$response = json_decode($LyxxClient->getApiResponse("post","/food/api",$param));
/**
 * 返回示例：
{
    "code": 1,
    "msg": "付款成功，当前用户余额为8.00",
    "data": {
        "user_id": 7044,
        "type": "三方入口-消费扣款",
        "amount": -1,
        "balance": 8,
        "reason": "2024-03-20 14:21:36-超市消费2元-订单通过第三方入口支付",
        "handle_uid": 0,
        "unique_key": "SXF17109156964409",
        "create_time": "2024-03-20 14:21:36",
        "update_time": "2024-03-20 14:21:36",
        "id": 508964
    }
}
 * */

var_dump($response);