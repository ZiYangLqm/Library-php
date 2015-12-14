<?php

class UserController extends AppController {
	var $name = "user";

	var $components = array (
			'Session',
			//'RequestHandler',
	);
	var $helpers = array (
			'Html',
			'Session'
	);
	
	var $userInfo;//当前用户信息
	function beforeFilter() {
 		$this->layout = "reader";
 		header("Content-Type:text/html; charset=utf-8");
 		$this->loadModel('ReaderLogin');
 		$session_user = $this->Session->read ( 'user' );
		if (!empty($session_user)) {
			$this->userInfo = $this->ReaderLogin->getLoginInfoByAccount($session_user);
		}else {
			//$this->redirect ( "/user/login" );
			//return;
		}
	}
	function userIndex(){
		
	}
	
	function login(){
		$this->layout = "empty";
		$session_user = $this->Session->read ( 'user' );
		if( !empty($session_user)) {
			$this->redirect ( "/user/bookList" );
			return;
		}
		
		
		$this->layout = "empty";
		if (isset ( $_POST ) && !empty($_POST)) {
			App::import ( 'Vendor', 'Crypt/Crypt3Des' );
			$Crypt3Des = new Crypt3Des ();
			$password3Des=$Crypt3Des->encrypt ( $_POST['password'] );
			$para = array('account'=>$_POST['account'],'password'=>$password3Des);
			$accountStatus = $this->ReaderLogin->getLoginInfoByAccount($_POST['account']);
			if ($accountStatus) {
				if($accountStatus['ReaderLogin']['password'] == $password3Des)
				{
					$this->Session->write ( "user", $_POST['account']  );
					//系统登录过期时长(分钟)
					$exprie = 120*60 + time (); //120分钟过期
					setcookie ( session_name(), session_id(), $exprie, '/' );
					$this->ReaderLogin->updateLoginTime($_POST['account']);//更新登录时间
					$this->redirect ( "/user/bookList" );
				} else {
					$this->set("error","密码错误！");
				}
			} else {
				$this->set("error","没有该管理员信息！");
			}
		}
	}
	
	function bookList(){
		$session_user = $this->Session->read ( 'user' );
		if(empty($session_user)) {
			$this->redirect ( "/user" );
			return;
		}
		if ($this->userInfo) {
			$this->set('myInfo',$this->userInfo['ReaderLogin']);
		}
	
		$this->loadModel('Book');
		$allBook = $this->Book->getAllBook(0);
		$this->loadModel('BookCategory');
		if ($allBook) {
			foreach ($allBook as &$v){
				$sinfo = $this->BookCategory->getBookCategoryById($v['Book']['category-id']);
				$v['Book']['category-id'] = $sinfo['BookCategory']['category'];
			}
			$this->set("allBook",$allBook);
		}
	}
	function borrowBook($id = 0){
		$this->loadModel('MemberLevel');
		$this->loadModel('Borrow');
		$this->loadModel('Book');
		$borrowBookStatus = $this->Book->borrowBookUpdate($id);//书籍出借数家加1
// 		if ($borrowBookStatus) {
// 			var_dump($id);
// 			var_dump($borrowBookStatus);exit();
// 		}
		$levelInfo = $this->MemberLevel->getInfoByLevel($this->userInfo['ReaderLogin']['level']);
		$dataAll = array(
				'reader-id' => $this->userInfo['ReaderLogin']['reader-id'],
				'book-id' => $id,
				'levelDay' => $levelInfo['MemberLevel']['days'],
		);
		$addBorrowInfo = $this->Borrow->addBorrowInfo($dataAll);
		if ($addBorrowInfo) {
			$this->redirect ( "/user/borrowList" );
		}
	}
	function borrowList(){
		$session_user = $this->Session->read ( 'user' );
		if(empty($session_user)) {
			$this->redirect ( "/user" );
			return;
		}
		if ($this->userInfo) {
			$this->set('myInfo',$this->userInfo['ReaderLogin']);
		}
		
		$this->loadModel('Borrow');
		$borrowInfo = $this->Borrow->getAllBorrowInfo(0,$this->userInfo['ReaderLogin']['reader-id']);
		$this->loadModel('BookCategory');
		$this->loadModel('Book');
		if ($borrowInfo) {
			foreach ($borrowInfo as &$v){
				$bookInfo = $this->Book->getBookById($v['Borrow']['book-id']);
				$CategoryInfo = $this->BookCategory->getBookCategoryById($bookInfo['Book']['category-id']);
				$bookInfo['Book']['category-id'] = $CategoryInfo['BookCategory']['category'];
				array_push($v, $bookInfo['Book']);
			}
			$this->set("borrowInfo",$borrowInfo);
		}
	}
	
	function lossBook($bookId = 0, $borrowId = 0){
		$session_user = $this->Session->read ( 'user' );
		if(empty($session_user)) {
			$this->redirect ( "/user" );
			return;
		}
		if ($this->userInfo) {
			$this->set('myInfo',$this->userInfo['ReaderLogin']);
		}
		
		$this->loadModel('Book');
		$this->loadModel('Borrow');
		$lossBorrow = $this->Borrow->lossBookById($borrowId);
		$lossBook = $this->Book->lossBook($bookId);
		if ($lossBorrow && $lossBook){
			$this->redirect ( "/user/borrowList" );
		}
		
	}
	
	function unLossBook($bookId = 0, $borrowId = 0){
		$session_user = $this->Session->read ( 'user' );
		if(empty($session_user)) {
			$this->redirect ( "/user" );
			return;
		}
		if ($this->userInfo) {
			$this->set('myInfo',$this->userInfo['ReaderLogin']);
		}
	
		$this->loadModel('Book');
		$this->loadModel('Borrow');
		$lossBorrow = $this->Borrow->unLossBookById($borrowId);
		$lossBook = $this->Book->unLossBook($bookId);
		if ($lossBorrow && $lossBook){
			$this->redirect ( "/user/borrowList" );
		}
	
	}
// 	function myInfo(){
// 		$session_me = $this->Session->read ( 'me' );
// 		if(empty($session_me)) {
// 			$this->redirect ( "/" );
// 			return;
// 		}
// 		if ($this->adminInfo) {
// 			$this->set('myInfo',$this->adminInfo['Admin']);
// 		}
// 	}
	
// 	function managerManage(){
// 		$session_me = $this->Session->read ( 'me' );
// 		if(empty($session_me)) {
// 			$this->redirect ( "/" );
// 			return;
// 		}
// 		if ($this->adminInfo) {
// 			$this->set('myInfo',$this->adminInfo['Admin']);
// 		}
// 		$needDeleted = 0;//是否需要已删除的管理员信息
// 		$allAdmin = $this->Admin->getAllAdmin($needDeleted);
// 		if ($allAdmin) {
// 			$this->set('allAdmin',$allAdmin);
// 		}
// 	}
// 	function editManager($id = 0){
// 		if (isset($_POST['level'])) {
// 			$updateStatus = $this->Admin->updaAdminRight($_POST['id'],$_POST['level']);
// 			if ($updateStatus) {
// 				$this->redirect ( "/manager/managerManage" );
// 				return;
// 			}
// 		}
// 		$queryStatus = $this->Admin->getAdminById($id);
// 		if ($queryStatus){
// 			$this->set('editAdmin',$queryStatus['Admin']);
// 		}
// 	}
// 	function deleteManager($id = 0){
// 		$deleteStatus = $this->Admin->deleteAdmin($id);
// 		if ($deleteStatus){
// 			$this->redirect ( "/manager/managerManage" );
// 			return;
// 		}
// 	}
// 	function addManager(){
// 		$session_me = $this->Session->read ( 'me' );
// 		if(empty($session_me)) {
// 			$this->redirect ( "/" );
// 			return;
// 		}
		
// 		if ($this->adminInfo) {
// 			$this->set('myInfo',$this->adminInfo['Admin']);
// 		}
		
// 		if (!empty($_POST)) {
// 			$imagUrl = '';
// 			if ($_FILES["file"]["name"] != "") {
// 				$filename = $_FILES["file"]["name"];
// 				$filetype = $_FILES["file"]["type"];
// 				$filesize = $_FILES["file"]["size"] / 1024;  // kb
// 				$filetmp = $_FILES["file"]["tmp_name"];
// 				$date = date('YmdHis',time());
// 				$checkname = explode(".", $filename);
// 				$filename = $checkname[0].'_'.$date.'.'.$checkname[1];
// 				$path = HOST_ROOT."/app/webroot/adminImag/";
// 				$url = "/adminImag/$filename";
				
// 				if (file_exists($path . $filename))
// 				{
// 					echo $filename . " already exists. ";exit();
// 				}else {
// 					$rec = move_uploaded_file($filetmp,$path.$filename);
// 					if($rec){
// 						$imagUrl = $url;
							
// 					}else{
// 						echo "move upload file fail!";exit();
// 					}
// 				}
// 			}
// 			App::import ( 'Vendor', 'Crypt/Crypt3Des' );
// 			$Crypt3Des = new Crypt3Des ();
// 			$password3Des=$Crypt3Des->encrypt ( $_POST['password'] );
// 			$dataAll = array(
// 					'account' => $_POST['account'],
// 					'password' => $password3Des,
// 					'level' => $_POST['level'],
// 					'create_admin' => $this->adminInfo['Admin']['account'],
// 			);
// 			if ($imagUrl != '') {
// 				$dataAll['imagUrl'] = $imagUrl;
// 				//array_push($dataAll, 'imagUrl',$imagUrl);
// 			}
// 			$addStatus = $this->Admin->add($dataAll);
// 			if ($addStatus) {
// 				$this->redirect ( "/manager/myInfo" );
// 				return;
// 			}
// 		}
		
// 	}

}
