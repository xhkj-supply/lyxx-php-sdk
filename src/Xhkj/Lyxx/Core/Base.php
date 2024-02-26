<?php

namespace Xhkj\Lyxx\Core;

class Base
{
	public $app_secret  = '';

	public $app_key = '';

	public $paramMap = array();

	public $body = '';

	public $serverRoot = 'http://qtlyxx.wzzd.cn';

	public function __construct($app_secret, $app_key)
	{
		if(!empty($serverRoot)){
			$this->serverRoot = $serverRoot;
		}

		if(!empty($app_secret)){
			$this->app_secret = $app_secret;
		}
		if(!empty($app_key)){
			$this->app_key = $app_key;
		}
	}

	public function addParam($key,$values)
	{
		$addParam = array($key=>$values);
		$this->paramMap = array_merge($this->paramMap,$addParam);
	}

	public function addBody($body)
	{
		$this->body = $body;
	}

	public function batchAddParam($param)
	{
		$this->paramMap = array_merge($this->paramMap,$param);
	}

	public function removeParam($key)
	{
		foreach ($this->paramMap as $k => $v){
			if($key == $k){
				unset($this->paramMap[$k]);
			}
		}
	}

	public function removeAllParam()
	{
		foreach ($this->paramMap as $k => $v){
			if($k!='token'){
				unset($this->paramMap[$k]);
			}
		}
	}

	public function getParam($key)
	{
		return $this->paramMap[$key];
	}

	public function getAllParam()
	{
		return $this->paramMap;
	}

	public function getServerRoot()
	{
		return $this->serverRoot;
	}

	public function getAppKey()
	{
		return  $this->app_key;
	}

	public function getAppSecret()
	{
		return $this->app_secret;
	}

	public function toQueryString()
	{
		$StrQuery="";
		foreach ($this->paramMap as $k=>$v){
			$StrQuery .= strlen($StrQuery) == 0 ? "" : "&";
			$StrQuery.=$k."=".urlencode($v);
		}
		return $StrQuery;
	}

}