
## xhkj-supply-lyxx-php-sdk

xhkj-supply-lyxx-php-sdk是序航科技为凌云小学食堂系统开发的官方SDKComposer封装包，支持php项目与凌云小学食堂平台应用API对接。
## 安装

* 通过composer，这是推荐的方式，可以使用composer.json 声明依赖，或者运行下面的命令。
```bash
$ composer require xhkj-supply/lyxx-php-sdk
```
* 直接下载安装，SDK 没有依赖其他第三方库，但需要参照 composer的autoloader，增加一个自己的autoloader程序。

## 运行环境

    php: >=7.0

## 使用方法

```php    

	use Xhkj\Lyxx\LyxxClient;

	$appKey = "your appkey";
	$appSecret = "your appSecret";

	try {
		$lyxxClient = new LyxxClient($appKey,$appSecret);
	} catch (OssException $e) {
		printf(__FUNCTION__ . "creating lyxxClient instance: FAILED\n");
		printf($e->getMessage() . "\n");
		return null;
	}

	//获取开发者登录信息
	$param = [
		'action'=>"dininghall/open_api/api/loginuserinfo"
	];
	$response = json_decode($lyxxClient->getApiResponse("get","/food/api",$param));

```    

## 云应用平台

官网网址 http://qtlyxx.wzzd.cn  
接口文档 http://qtlyxx.wzzd.cn/food/apidoc/apidocv001.html
