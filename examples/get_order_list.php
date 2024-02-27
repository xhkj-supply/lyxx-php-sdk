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
    'action'=>"dininghall/open_api/Api/orderlist",
    'user_id'=>7044,
    "halls_id"=> 10,
    "user_type"=> [
        "1,3",
        "1,4",
        "1,5",
        "1,8",
        "1,9",
        "8,11",
        "8,12",
        "8,13",
        "8,15",
        "1,15",
        "1,16",
        "1,17",
        "8,19",
        "1,20",
        "8,21",
        "1,22"
    ],
    "dates"=> [
        "2024-2-04",
        "2024-03-05"
    ],
    "user_sex"=> [
        0,
        1,
        2
    ],
    "user_name"=> "",
    "status_type"=> [
        1,
        2,
        3,
        5,
        6,
        4,
        7
    ],
    "meal_type"=> [
        0,
        1,
        2,
        3,
        4,
        5
    ],
    "dates_type"=> "0"
];
$response = json_decode($LyxxClient->getApiResponse("get","/food/api",$param));
/**
 * 返回示例：
{
    "code": 1,
    "msg": "操作成功！",
    "data": [
        {
            "user_name": "测试教师",
            "order_text": "鲜肉包×1;现磨豆浆×1;",
            "id": 445088,
            "halls_id": 10,
            "day_time": 1709568000,
            "meals_num": 0,
            "weeks_num": 2,
            "create_time": "2024-02-27 11:22:33",
            "update_time": 0,
            "user_id": 7044,
            "menu_number": 2,
            "total_prices": "3.00",
            "status": 1,
            "payment_time": 0,
            "class": "测试组",
            "meal_name": "早餐",
            "list": [
                {
                    "refund": 0,
                    "orders_notes": null,
                    "id": 480587,
                    "halls_id": 10,
                    "weeks_num": 2,
                    "meals_num": 0,
                    "menu_id": 464,
                    "menu_number": 1,
                    "api_user_id": 7044,
                    "day_time": 1709568000,
                    "order_id": 445088,
                    "affirm": 0,
                    "price": "1.50",
                    "total_prices": "1.50"
                },
                {
                    "refund": 0,
                    "orders_notes": null,
                    "id": 480586,
                    "halls_id": 10,
                    "weeks_num": 2,
                    "meals_num": 0,
                    "menu_id": 285,
                    "menu_number": 1,
                    "api_user_id": 7044,
                    "day_time": 1709568000,
                    "order_id": 445088,
                    "affirm": 0,
                    "price": "1.50",
                    "total_prices": "1.50"
                }
            ]
        },
        {
            "user_name": "测试教师",
            "order_text": "鲜肉包×1;现磨豆浆×1;",
            "id": 445086,
            "halls_id": 10,
            "day_time": 1709568000,
            "meals_num": 0,
            "weeks_num": 2,
            "create_time": "2024-02-27 11:22:33",
            "update_time": 0,
            "user_id": 7044,
            "menu_number": 2,
            "total_prices": "3.00",
            "status": 1,
            "payment_time": 0,
            "class": "测试组",
            "meal_name": "早餐",
            "list": [
                {
                    "refund": 0,
                    "orders_notes": null,
                    "id": 480583,
                    "halls_id": 10,
                    "weeks_num": 2,
                    "meals_num": 0,
                    "menu_id": 464,
                    "menu_number": 1,
                    "api_user_id": 7044,
                    "day_time": 1709568000,
                    "order_id": 445086,
                    "affirm": 0,
                    "price": "1.50",
                    "total_prices": "1.50"
                },
                {
                    "refund": 0,
                    "orders_notes": null,
                    "id": 480582,
                    "halls_id": 10,
                    "weeks_num": 2,
                    "meals_num": 0,
                    "menu_id": 285,
                    "menu_number": 1,
                    "api_user_id": 7044,
                    "day_time": 1709568000,
                    "order_id": 445086,
                    "affirm": 0,
                    "price": "1.50",
                    "total_prices": "1.50"
                }
            ]
        }
    ]
}
 * */

var_dump($response);