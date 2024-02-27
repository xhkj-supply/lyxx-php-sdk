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

//用户分组类别
$param = [
    'action'=>"dininghall/open_api/Api/getgroup",
    'halls_id'=>10
];
$response = json_decode($LyxxClient->getApiResponse("get","/food/api",$param));
/**
 * 返回示例：
{
    "code": 1,
    "msg": "操作成功！",
    "data": [
        {
            "label": "教师组-其他教师",
            "value": "1,3",
            "checked": true
        },
        {
            "label": "教师组-非编教师",
            "value": "1,4",
            "checked": true
        },
        {
            "label": "教师组-在编教师",
            "value": "1,5",
            "checked": true
        },
        {
            "label": "教师组-图书馆",
            "value": "1,8",
            "checked": true
        },
        {
            "label": "教师组-医务室",
            "value": "1,9",
            "checked": true
        },
        {
            "label": "职员组-保洁",
            "value": "8,11",
            "checked": true
        },
        {
            "label": "职员组-食堂",
            "value": "8,12",
            "checked": true
        },
        {
            "label": "职员组-保安",
            "value": "8,13",
            "checked": true
        },
        {
            "label": "职员组-测试组",
            "value": "8,15",
            "checked": true
        },
        {
            "label": "教师组-测试组",
            "value": "1,15",
            "checked": true
        },
        {
            "label": "职员组-技术人员",
            "value": "8,19",
            "checked": true
        },
        {
            "label": "教师组-代课老师",
            "value": "1,20",
            "checked": true
        },
        {
            "label": "教师组-实习老师",
            "value": "1,22",
            "checked": true
        }
    ]
}
 * */

var_dump($response);