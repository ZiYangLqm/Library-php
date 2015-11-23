<?php
require_once dirname(__FILE__).'/log4php/Logger.php';//读取类库
require_once dirname(__FILE__).'/CustomAppenderFile.php';

/**
 * This is the central class in the log4php package. All logging operations 
 * are done through this class.
 * 
 * The main logging methods are:
 * 	<ul>
 * 		<li>{@link trace()}</li>
 * 		<li>{@link debug()}</li>
 * 		<li>{@link info()}</li>
 * 		<li>{@link warn()}</li>
 * 		<li>{@link error()}</li>
 * 		<li>{@link fatal()}</li>
 * 	</ul>
 * 
 * @package    log4php
 * @license	   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @version	   SVN: $Id: Logger.php 1395241 2012-10-07 08:28:53Z ihabunek $
 * @link	   http://logging.apache.org/log4php
 */
class CustomLogger extends Logger {
	
	
	/* (non-PHPdoc)
	 * @see Logger::trace()
	 */
	public function trace($message,  $data=NULL) {//instanceof 
		$this->doMethod(__FUNCTION__, $message,$data);
	}
	
	/* (non-PHPdoc)
	 * @see Logger::debug()
	 */
	public function debug($message, $data = null) {
		$this->doMethod(__FUNCTION__, $message,$data);
	}

	/* (non-PHPdoc)
	 * @see Logger::info()
	 */
	public function info($message, $data = null) {
		$this->doMethod(__FUNCTION__, $message,$data);
	}

	/* (non-PHPdoc)
	 * @see Logger::warn()
	 */
	public function warn($message, $data = null) {
		$this->doMethod(__FUNCTION__, $message,$data);
	}
	
	/* (non-PHPdoc)
	 * @see Logger::error()
	 */
	public function error($message, $data = null) {
		$this->doMethod(__FUNCTION__, $message,$data);
	}
	
	/* (non-PHPdoc)
	 * @see Logger::fatal()
	 */
	public function fatal($message, $data = null) {
		$this->doMethod(__FUNCTION__, $message,$data);
	}

	
	
	private function doMethod($function,$message,  $data=NULL){
		$throwable = null;
		if ($data instanceof Exception){
			$throwable=$data;
			$data=NULL;
		}
		$message = $this->formatMessage($message,$data);
		parent::$function($message,$throwable);
	}

	private function formatMessage($message,$data=NULL){
// 		integer、double、string、array、object、unknown type。
		switch (gettype($message))
		{
			case "array":
			  $message=str_replace("\n", '', var_export ($message,true));
			  break;
			case "object":
			  $message=str_replace("\n", '', var_export ($message,true));
			  break;
			default:
			  ;
		}
		if ($data!=null){
			$message.="[".str_replace("\n", '', var_export ($data,true))."]";
		}
		return $message;
	}
}
