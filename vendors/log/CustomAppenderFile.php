<?php

/**
 *
 */
class CustomAppenderFile extends LoggerAppenderFile {

	protected function openFile() {
		$file = $this->getTargetFile();
		$flag_file = is_file($file);
		$dir = dirname($file);
		$flag_dir = is_dir($dir);
		parent::openFile();
		if (!$flag_dir){
			chmod($dir, 0777);
			chmod($file, 0777);
		}elseif (!$flag_file){
			chmod($file, 0777);
		}
	}
	
}
