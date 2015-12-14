<?php
class DB{
	private static $_instance = NULL;
	private $_handle = NULL;
	static public function getInstance(){
		if(!self::$_instance instanceof self) { //$this->_instance对比  检查是不是自己的instance
			self::$_instance = new self;
		}
		return self::$_instance;
	}
	private function __construct(){
		$this->_handle = new mysqli("localhost", "w0340096", "wItJw8", "db0340096");
	}
	function query() {
		$this->_handle->query("set names 'utf8'");
		$this->_handle->query($qs);
	}
}

$db = new DB();  //可以保证DB只有一个
//$db->query("select......");

//$db = DB()::getInstance();
?>