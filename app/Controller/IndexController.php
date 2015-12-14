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
		//$this->layout = false;
	}


	//TODO---------------------------------------web端代码区域-----------------------------------------
	function test(){
		$session_me = $this->Session->read ( 'me' );
		var_dump($session_me);exit();
	}
	function addSuperAdmin(){//用于手动添加超级管理员
		$this->loadModel('Admin');
		App::import ( 'Vendor', 'Crypt/Crypt3Des' );
		$Crypt3Des = new Crypt3Des ();
		$password3Des=$Crypt3Des->encrypt ('lqm1199');
		$dataAll =  array(
				'account' => 'admin',
				'password' => $password3Des,
				'level' => 0,
				'create_admin' => 'liuqingmeng',
		);
		$this->Admin->addAdmin($dataAll);
		exit();
	}
	
	
	function  index(){
		$session_me = $this->Session->read ( 'me' );
		if( !empty($session_me)) {
			$this->redirect ( "/manager/bookList" );
			return;
		}
		
		
		$this->layout = "empty";
		if (isset ( $_POST ) && !empty($_POST)) {
			App::import ( 'Vendor', 'Crypt/Crypt3Des' );
			$Crypt3Des = new Crypt3Des ();
			$password3Des=$Crypt3Des->encrypt ( $_POST['password'] );
			$this->loadModel('Admin');
			$para = array('account'=>$_POST['account'],'password'=>$password3Des);
			$accountStatus = $this->Admin->getAdminByAccount($_POST['account']);
			if ($accountStatus) {
				if($accountStatus['Admin']['password'] == $password3Des)
				{
					$this->Session->write ( "me", $_POST['account']  );
					//系统登录过期时长(分钟)
					$exprie = 120*60 + time (); //120分钟过期
					setcookie ( session_name(), session_id(), $exprie, '/' );
					$this->Admin->updateLoginTime($_POST['account']);//更新登录时间
					$this->redirect ( "/manager/bookList" );
				} else {
					$this->set("error","密码错误！");
				}
			} else {
				$this->set("error","没有该管理员信息！");
			}
		}
	}
	
	function logout() {
	
		$this->layout = "empty";
		$this->Session->read ( "me" );
		$this->Session->delete ( "me" );//有效果
		$exprie = time () - 1; //过期
		setcookie ( session_name(), '', $exprie, '/' );
		$this->redirect ( "/" );
	}
	
	//TODO---------------------------------------辅助函数趋区域-----------------------------------------
// 	function log(){
// 		App::import ( 'Vendor', 'log/LogFactory' );
// 		$log = LogFactory::getLogger ( "log" );
// 		return $log;
// 	}
}