<?php
/*
 * jQuery File Upload Plugin PHP Class 7.1.4
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

class LogFactory
{
	private static $loggerList = array();
	
	public static function getLogger($loggerName){
		if (!isset($loggerName)||empty($loggerName)){
			$loggerName = "rootLogger";
		}
		if (!isset(self::$loggerList[$loggerName])){
			require_once dirname(__FILE__).'/CustomLogger.php';//读取类库
			/*
			$data = @file_get_contents(dirname(__FILE__).'/config.php');
			$config = @eval('?>' . $data);
			print_r($config);
			*/
			
			CustomLogger::configure(dirname(__FILE__).'/config.php');//读取配置文件
			if (!CustomLogger::exists($loggerName)){//如果配置中不存在该log项//为了尽量不加载配置文件,exists放在else里判断
				$loggerName = "rootLogger";
				if (isset(self::$loggerList[$loggerName])){//判断rootLogger是否存在
					return self::$loggerList[$loggerName];
				}
			}
			$logger = null;
			if ($loggerName=="rootLogger"){
				$logger = CustomLogger::getRootLogger();
			}else {
				$logger = CustomLogger::getLogger($loggerName);
			}
			self::$loggerList[$loggerName]=$logger;
		}
		return self::$loggerList[$loggerName];
	}
	
	
}
