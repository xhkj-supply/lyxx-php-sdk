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

//订单列表查询
$param = [
    'action'=>"dininghall/open_api/Api/userorderlist",
    'user_id'=>"7044",
    'status'=>"0"
];
$response = json_decode($LyxxClient->getApiResponse("get","/food/api",$param));
/**
 * 返回示例：
{
    "code": 1,
    "msg": "获取全部订单成功",
    "data": [
        {
            "id": 467562,
            "user_id": 7044,
            "type": "三方入口-消费扣款",
            "amount": "0.00",
            "balance": "6.00",
            "reason": "2024-03-20 09:50:49[已退款1 元]-退款原因：水退款1元|2024-03-20 09:50:31-超市消费2元-订单通过第三方入口支付",
            "handle_uid": 0,
            "unique_key": "SXF17108994315123",
            "part_refund_amount": "1.00",
            "create_time": "2024-03-20 09:50:31",
            "update_time": "2024-03-20 09:50:49",
            "reason_list": [
                "2024-03-20 09:50:49[已退款1 元]-退款原因：水退款1元",
                "2024-03-20 09:50:31-超市消费2元-订单通过第三方入口支付"
            ],
            "remaining_refund_amount": 0,
            "is_refund": 1
        }
    ]
}
 * */

var_dump($response);