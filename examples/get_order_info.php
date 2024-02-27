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
    'action'=>"dininghall/open_api/Api/orderinfo",
    'order_id'=>445085//主订单id
];
$response = json_decode($LyxxClient->getApiResponse("get","/food/api",$param));
/**
 * 返回示例：
{
    "code": 1,
    "msg": "操作成功！",
    "data": [
        {
            "refund": 1,
            "orders_notes": null,
            "id": 480580,
            "halls_id": 10,
            "weeks_num": 1,
            "meals_num": 0,
            "menu_id": 285,
            "menu_number": 1,
            "api_user_id": 7044,
            "day_time": "2024-03-04",
            "order_id": 445085,
            "affirm": 1,
            "price": "1.50",
            "total_prices": "1.50",
            "sort_id": 22,
            "name": "鲜肉包",
            "img_src": "/food/uploads/1668470005.jpeg",
            "pay_time": "2024-02-27 11:22:33",
            "refund_time": "2024-02-27 11:39:11"
        },
        {
            "refund": 1,
            "orders_notes": null,
            "id": 480581,
            "halls_id": 10,
            "weeks_num": 1,
            "meals_num": 0,
            "menu_id": 464,
            "menu_number": 1,
            "api_user_id": 7044,
            "day_time": "2024-03-04",
            "order_id": 445085,
            "affirm": 0,
            "price": "1.50",
            "total_prices": "1.50",
            "sort_id": 22,
            "name": "现磨豆浆",
            "img_src": "/food/uploads/1678408142.jpeg",
            "pay_time": "2024-02-27 11:22:33",
            "refund_time": "2024-02-27 11:39:11"
        }
    ]
}
 * */

var_dump($response);