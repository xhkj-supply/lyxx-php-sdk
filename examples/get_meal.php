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

//餐次类别
$param = [
    'action'=>"dininghall/open_api/Api/getmeal",
    'halls_id'=>10
];
$response = json_decode($LyxxClient->getApiResponse("get","/food/api",$param));
/**
 * 返回示例：
{
    "code": 1,
    "msg": "操作成功！",
    "data": {
        "type1": [
            {
                "label": "早餐",
                "value": 0,
                "checked": true
            },
            {
                "label": "中餐",
                "value": 1,
                "checked": true
            },
            {
                "label": "晚餐",
                "value": 2,
                "checked": true
            },
            {
                "label": "换购",
                "value": 3,
                "checked": true
            },
            {
                "label": "净菜",
                "value": 4,
                "checked": true
            },
            {
                "label": "毛菜",
                "value": 5,
                "checked": true
            }
        ],
        "list": [
            {
                "id": 0,
                "halls_id": 10,
                "name": "早餐",
                "start_time": "06:00",
                "end_time": "08:30",
                "latest_order_switch": 1,
                "latest_return_switch": 1,
                "auto_deduction_switch": 1,
                "auto_deduction_time": 39,
                "latest_return_time": 39,
                "latest_order_time": 39,
                "auto_order_time": 0,
                "auto_order_switch": 0,
                "recover_order_switch": 1,
                "recover_order_time": 39,
                "notice": null,
                "sort": 100
            },
            {
                "id": 1,
                "halls_id": 10,
                "name": "中餐",
                "start_time": "11:30",
                "end_time": "12:30",
                "latest_order_switch": 1,
                "latest_return_switch": 1,
                "auto_deduction_switch": 1,
                "auto_deduction_time": 20,
                "latest_return_time": 20,
                "latest_order_time": 20,
                "auto_order_time": 0,
                "auto_order_switch": 0,
                "recover_order_switch": 1,
                "recover_order_time": 20,
                "notice": null,
                "sort": 100
            },
            {
                "id": 2,
                "halls_id": 10,
                "name": "晚餐",
                "start_time": "17:00",
                "end_time": "19:00",
                "latest_order_switch": 1,
                "latest_return_switch": 1,
                "auto_deduction_switch": 1,
                "auto_deduction_time": 26,
                "latest_return_time": 26,
                "latest_order_time": 26,
                "auto_order_time": 0,
                "auto_order_switch": 0,
                "recover_order_switch": 1,
                "recover_order_time": 26,
                "notice": null,
                "sort": 100
            },
            {
                "id": 3,
                "halls_id": 10,
                "name": "换购",
                "start_time": "17:00",
                "end_time": "19:00",
                "latest_order_switch": 1,
                "latest_return_switch": 1,
                "auto_deduction_switch": 1,
                "auto_deduction_time": 26,
                "latest_return_time": 26,
                "latest_order_time": 26,
                "auto_order_time": 0,
                "auto_order_switch": 0,
                "recover_order_switch": 1,
                "recover_order_time": 26,
                "notice": null,
                "sort": 100
            },
            {
                "id": 4,
                "halls_id": 10,
                "name": "净菜",
                "start_time": "17:00",
                "end_time": "19:00",
                "latest_order_switch": 1,
                "latest_return_switch": 1,
                "auto_deduction_switch": 1,
                "auto_deduction_time": 26,
                "latest_return_time": 26,
                "latest_order_time": 26,
                "auto_order_time": 0,
                "auto_order_switch": 0,
                "recover_order_switch": 1,
                "recover_order_time": 26,
                "notice": null,
                "sort": 100
            },
            {
                "id": 5,
                "halls_id": 10,
                "name": "毛菜",
                "start_time": "17:00",
                "end_time": "19:00",
                "latest_order_switch": 1,
                "latest_return_switch": 1,
                "auto_deduction_switch": 1,
                "auto_deduction_time": 26,
                "latest_return_time": 26,
                "latest_order_time": 26,
                "auto_order_time": 0,
                "auto_order_switch": 0,
                "recover_order_switch": 1,
                "recover_order_time": 26,
                "notice": null,
                "sort": 100
            }
        ]
    }
}
 * */

var_dump($response);