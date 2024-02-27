<?php

namespace Xhkj\Lyxx;

use Xhkj\Lyxx\Core\ClientException;
use Xhkj\Lyxx\Core\Base;
use Xhkj\Lyxx\Http\RequestClint;

class LyxxClient extends Base
{
	public $params;

	protected $getBody = [
		'dininghall/open_api/login/gettoken','dininghall/open_api/Api/getuserinfo','dininghall/open_api/Api/orderlist'
	];

	public function __construct($appKey, $appSecret)
    {
        $appKey = trim($appKey);
        $appSecret = trim($appSecret);

        if (empty($appKey)) {
            throw new ClientException("app key id is empty");
        }
        if (empty($appSecret)) {
            throw new ClientException("app secret is empty");
        }
        parent::__construct($appSecret,$appKey);

        self::checkEnv();

        $this->paramMap['token'] = json_decode($this->getApiResponse("post","/food/api",['action'=>"dininghall/open_api/login/gettoken",'grant_type'=>"client"]))->data->token;

    }

	public function getApiResponse($method,$action,$params=[]){

		if(in_array($params['action'],$this->getBody) && strtolower($method)=="get"){
			$method = "getbody";
		}

		if(in_array($params['action'],$this->getBody) && strtolower($method)=="post"){
			$method = "gettoken";
			$this->paramMap['grant_type']= $params['grant_type'];
		}

		$this->params = $params;
		switch (strtolower($method)){
			case "get":
				foreach ($this->params as $k=>$v){
					$this->addParam($k, $v);
				}
				break;
			case "gettoken":
				$this->addBody(json_encode($this->params));
				break;
			case "post":
				$this->addBody(json_encode($this->params));
				break;
			case "getbody":
				$this->addBody(json_encode($this->params));
				break;
			case "patch":
				$this->addBody(json_encode($this->params));
				break;
			default:
				break;
		}
		$response = RequestClint::$method($action, $this);
		//清空请求参数
		$this->removeAllParam();
		return $response;
	}

	public static function checkEnv()
	{
		if (function_exists('get_loaded_extensions')) {
			//检测curl扩展
			$enabled_extension = array("curl");
			$extensions = get_loaded_extensions();
			if ($extensions) {
				foreach ($enabled_extension as $item) {
					if (!in_array($item, $extensions)) {
						throw new ClientException("Extension {" . $item . "} is not installed or not enabled, please check your php env.");
					}
				}
			} else {
				throw new ClientException("function get_loaded_extensions not found.");
			}
		} else {
			throw new ClientException('Function get_loaded_extensions has been disabled, please check php config.');
		}
	}
	
}