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
    'action'=>"dininghall/open_api/Api/payment",
    'order_id'=>445085
];
$response = json_decode($LyxxClient->getApiResponse("get","/food/api",$param));
/**
 * 返回示例：
{
    "code": 1,
    "msg": "订单支付成功",
    "data": [
        {
            "user_name": "测试教师",
            "order_text": "鲜肉包×1;现磨豆浆×1;",
            "id": 445085,
            "halls_id": 10,
            "day_time": 1709481600,
            "meals_num": 0,
            "weeks_num": 1,
            "create_time": "2024-02-27 09:34:28",
            "update_time": "2024-02-27 09:39:53",
            "user_id": 7044,
            "menu_number": 2,
            "total_prices": "3.00",
            "status": 2,
            "payment_time": 0
        }
    ]
}
 * */

var_dump($response);