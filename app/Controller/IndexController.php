<?php
class IndexController extends AppController {
	var $name = "index";

	var $components = array (
			'Session',
	);
	var $helpers = array (
			'Html',
			'Session'
	);
	
	function beforeFilter() {
		$this->layout = false;
	}


	//TODO---------------------------------------web端代码区域-----------------------------------------
	
	function  index(){
		//$this->layout = "index_layout";
		$this->set("host",HOST_ROOT);
		echo HOST_ROOT;
		var_dump(EMAIL_TO);
		echo constant("EMAIL_TO");
	}
	
// 	function  carInfo(){
// 		$this->layout = "index_layout";
// 	}
	
// 	function  shifu(){
// 		$this->layout = "index_layout";
// 	}
	
// 	function  service(){
// 		$this->layout = "index_layout";
// 	}
	
// 	function guarantee() {
// 		$this->layout = "index_layout";
// 	}
	
// 	function aboutus() {
// 		$this->layout = "index_about_layout";
// 	}
	
// 	function qa() {
// 		$this->layout = "index_about_layout";
// 	}
	
// 	function contact() {
// 		$this->layout = "index_about_layout";
// 	}
	
// 	function buydoc() {
// 		$this->layout = "index_about_layout";
// 	}
	
	//TODO---------------------------------------辅助函数趋区域-----------------------------------------
// 	function log(){
// 		App::import ( 'Vendor', 'log/LogFactory' );
// 		$log = LogFactory::getLogger ( "log" );
// 		return $log;
// 	}
}