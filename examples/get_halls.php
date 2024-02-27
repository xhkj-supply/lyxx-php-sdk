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

//餐厅类别
$param = ['action'=>"dininghall/open_api/Api/gethalls"];
$response = json_decode($LyxxClient->getApiResponse("get","/food/api",$param));
/**
 * 返回示例:
{
    "code": 1,
    "msg": "操作成功！",
    "data": {
        "type1": [
            {
                "label": "学生餐厅",
                "value": 4,
                "checked": true
            },
            {
                "label": "教师餐厅",
                "value": 10,
                "checked": true
            }
        ],
        "type2": [
            {
                "label": "学生餐厅",
                "value": 2,
                "checked": true
            },
            {
                "label": "教师餐厅",
                "value": 1,
                "checked": true
            }
        ],
        "list": [
            {
                "type": 2,
                "id": 4,
                "name": "学生餐厅",
                "create_time": 0,
                "update_time": 0
            },
            {
                "type": 1,
                "id": 10,
                "name": "教师餐厅",
                "create_time": "2022-08-30 12:47:11",
                "update_time": "2022-09-13 14:09:39"
            }
        ]
    }
}
 */

var_dump($response);