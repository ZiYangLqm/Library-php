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

class WriteLogHandler
{
	public $file_stream = null;
	public $leaveMsg = null;
	
	
	function WriteLogHandler($file_name,$loginMsg="",$leaveMsg=""){
		
		$temp_dir = LOG_FILE_DIR."/".date("Ymd",time());
		if (!file_exists($temp_dir)){
			mkdir($temp_dir,0770,true);
			chmod($temp_dir, 0770);
		}
		$file_name= $temp_dir."/".$file_name;
		$file_stream = @fopen($file_name, "a");
		
		if ($file_stream==false) {
			return array("error"=>"打开日志文件失败！");
		}
		if (flock($file_stream, LOCK_EX | LOCK_NB)==false){
			flock($file_stream, LOCK_UN);fclose($file_stream);
			return array("error"=>"获取日志文件独占锁失败！");
		}
		//直接写入$loginMsg
		fwrite($file_stream, " \r\n[".date('Y-m-d H:i:s')."]$loginMsg	");
		//初始化$leaveMsg
		$this->leaveMsg=$leaveMsg;
		//初始化$file_stream
		$this->file_stream=$file_stream;
	}
	
	function writeLeaveMsg(){
		$this->writeMsg("$this->leaveMsg  \r\n \r\n");
		flock($this->file_stream, LOCK_UN);
		fclose($this->file_stream);
	}
	
	function writeMsg($msg){
		fwrite($this->file_stream,"\r\n[".date('Y-m-d H:i:s')."]". $msg);
	}
	
	function writeMsgWithArray($msg,$arr){
		$this->writeMsg( $msg."[".str_replace("\n", '', var_export ($arr,true))."]");
	}
	
	function writeExceptionMsg($msg){
		$this->writeMsg("[!]".$msg);
	}
	
	function writeLastMsg($msg){
		$this->writeMsg($msg);
		$this->writeLeaveMsg();
	}
	
	function writeExceptionAndLeave($msg){
		$this->writeExceptionMsg($msg);
		$this->writeLeaveMsg();
	}
	
	
}
