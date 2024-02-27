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

//用户信息-余额查询 列表
$param = [
    'action'=>"dininghall/open_api/Api/getuserinfo",
    'user_name'=> "",
    'user_phone'=> "",
    'user_id'=>"",
    'halls_id'=>10,
    'type'=>1,
    'user_type'=>[
        [
            "label"=> "教师组-其他教师",
            "value"=> "1,3",
            "checked"=> true
        ],
        [
            "label"=> "教师组-非编教师",
            "value"=> "1,4",
            "checked"=> true
        ],
        [
            "label"=> "教师组-在编教师",
            "value"=> "1,5",
            "checked"=> true
        ],
        [
            "label"=> "教师组-图书馆",
            "value"=> "1,8",
            "checked"=> true
        ],
        [
            "label"=> "教师组-医务室",
            "value"=> "1,9",
            "checked"=> true
        ],
        [
            "label"=> "职员组-保洁",
            "value"=> "8,11",
            "checked"=> true
        ],
        [
            "label"=> "职员组-食堂",
            "value"=> "8,12",
            "checked"=> true
        ],
        [
            "label"=> "职员组-保安",
            "value"=> "8,13",
            "checked"=> true
        ],
        [
            "label"=> "教师组-测试组",
            "value"=> "1,15",
            "checked"=> true
        ],
        [
            "label"=> "职员组-测试组",
            "value"=> "8,15",
            "checked"=> true
        ],
        [
            "label"=> "教师组-未命名",
            "value"=> "1,16",
            "checked"=> true
        ],
        [
            "label"=> "教师组-未命名",
            "value"=> "1,17",
            "checked"=> true
        ],
        [
            "label"=> "职员组-技术人员",
            "value"=> "8,19",
            "checked"=> true
        ],
        [
            "label"=> "教师组-代课老师",
            "value"=> "1,20",
            "checked"=> true
        ],
        [
            "label"=> "职员组-档案管理员",
            "value"=> "8,21",
            "checked"=> true
        ],
        [
            "label"=> "教师组-实习老师",
            "value"=> "1,22",
            "checked"=> true
        ]
    ],
    'user_sex'=> [
        [
            "label"=> "未知",
            "value"=> 0,
            "checked"=> true
        ],
        [
            "label"=> "男",
            "value"=> 1,
            "checked"=> true
        ],
        [
            "label"=> "女",
            "value"=> 2,
            "checked"=> true
        ]
    ]
];
$response = json_decode($LyxxClient->getApiResponse("get","/food/api",$param));
/**
 * 返回示例：
{
    "code": 1,
    "msg": "操作成功！",
    "data": {
        "list": [
            {
                "user_name": "测试教师",
                "user_id": 7044,
                "user_phone": "",
                "balance": "100.00",
                "key": 7044
            },
            {
                "user_name": "李某",
                "user_id": 7052,
                "user_phone": "13047***565",
                "balance": "0.00",
                "key": 7052
            },
            {
                "user_name": "郭某某",
                "user_id": 8342,
                "user_phone": "18367***514",
                "balance": "500.00",
                "key": 8342
            }
        ]
    }
}
 * */

var_dump($response);