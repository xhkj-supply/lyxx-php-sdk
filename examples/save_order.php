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

//提交保存订单-(不支付扣款)
$param = [
    'action'=>"dininghall/open_api/Api/saveorder",
    'user_id'=>7044,
    [
        "date"=> "2024-03-04",
        "meals_num"=> 0,
        "meals_name"=> "早餐",
        "halls_id"=> "10",
        "halls_name"=> "教师餐厅",
        "menu_list"=> [
            [
                "name"=> "鲜肉包",
                "img_src"=> "/food/uploads/1668470005.jpeg",
                "menu_id"=> 285,
                "price"=> "1.50",
                "sort_name"=> "早餐",
                "sort_id"=> 22,
                "day_time"=> 1709481600,
                "mbm_id"=> 6681,
                "number_sum"=> -1,
                "meals_num"=> 0,
                "shoping_car"=> 1,
                "residue_menus"=> 0
            ],
            [
                "name"=> "现磨豆浆",
                "img_src"=> "/food/uploads/1678408142.jpeg",
                "menu_id"=> 464,
                "price"=> "1.50",
                "sort_name"=> "早餐",
                "sort_id"=> 22,
                "day_time"=> 1709481600,
                "mbm_id"=> 6689,
                "number_sum"=> -1,
                "meals_num"=> 0,
                "shoping_car"=> 1,
                "residue_menus"=> 0
            ]
        ]
    ],
    [
        "date"=> "2024-03-05",
        "meals_num"=> 0,
        "meals_name"=> "早餐",
        "halls_id"=> "10",
        "halls_name"=> "教师餐厅",
        "menu_list"=> [
            [
                "name"=> "鲜肉包",
                "img_src"=> "/food/uploads/1668470005.jpeg",
                "menu_id"=> 285,
                "price"=> "1.50",
                "sort_name"=> "早餐",
                "sort_id"=> 22,
                "day_time"=> 1709568000,
                "mbm_id"=> 6700,
                "number_sum"=> -1,
                "meals_num"=> 0,
                "shoping_car"=> 1,
                "residue_menus"=> 0
            ],
            [
                "name"=> "现磨豆浆",
                "img_src"=> "/food/uploads/1678408142.jpeg",
                "menu_id"=> 464,
                "price"=> "1.50",
                "sort_name"=> "早餐",
                "sort_id"=> 22,
                "day_time"=> 1709568000,
                "mbm_id"=> 6708,
                "number_sum"=> -1,
                "meals_num"=> 0,
                "shoping_car"=> 1,
                "residue_menus"=> 0
            ]
        ]
    ]
    
];
$response = json_decode($LyxxClient->getApiResponse("post","/food/api",$param));
/**
 * 返回示例：
{
    "code": 1,
    "msg": "订单生成成功",
    "data": 6
}

 *重复提交返回示例：
{
    "code": 0,
    "msg": "教师餐厅2024-03-04早餐订单已存在",
    "data": ""
}
 * */

var_dump($response);