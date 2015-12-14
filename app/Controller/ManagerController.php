<?php

class ManagerController extends AppController {
	var $name = "manager";

	var $components = array (
			'Session',
			//'RequestHandler',
	);
	var $helpers = array (
			'Html',
			'Session'
	);
	
	var $adminInfo;//当前管理员信息
	function beforeFilter() {
		header("Content-Type:text/html; charset=utf-8");
		$this->loadModel('Admin');
		$session_me = $this->Session->read ( 'me' );
		if (!empty($session_me)) {
			$this->adminInfo = $this->Admin->getAdminByAccount($session_me);
		}
	}
	
	
	//TODO ---------------------------------------Manager---------------------------------------
	function myInfo(){
		$session_me = $this->Session->read ( 'me' );
		if(empty($session_me)) {
			$this->redirect ( "/" );
			return;
		}
		if ($this->adminInfo) {
			$this->set('myInfo',$this->adminInfo['Admin']);
		}
	}
	
	function managerManage(){
		$session_me = $this->Session->read ( 'me' );
		if(empty($session_me)) {
			$this->redirect ( "/" );
			return;
		}
		if ($this->adminInfo) {
			$this->set('myInfo',$this->adminInfo['Admin']);
		}
		$needDeleted = 0;//是否需要已删除的管理员信息
		$allAdmin = $this->Admin->getAllAdmin($needDeleted);
		if ($allAdmin) {
			$this->set('allAdmin',$allAdmin);
		}
	}
	function editManager($id = 0){
		if (isset($_POST['level'])) {
			$updateStatus = $this->Admin->updaAdminRight($_POST['id'],$_POST['level']);
			if ($updateStatus) {
				$this->redirect ( "/manager/managerManage" );
				return;
			}
		}
		$queryStatus = $this->Admin->getAdminById($id);
		if ($queryStatus){
			$this->set('editAdmin',$queryStatus['Admin']);
		}
	}
	function deleteManager($id = 0){
		$deleteStatus = $this->Admin->deleteAdmin($id);
		if ($deleteStatus){
			$this->redirect ( "/manager/managerManage" );
			return;
		}
	}
	function addManager(){
		$session_me = $this->Session->read ( 'me' );
		if(empty($session_me)) {
			$this->redirect ( "/" );
			return;
		}
		
		if ($this->adminInfo) {
			$this->set('myInfo',$this->adminInfo['Admin']);
		}
		
		if (!empty($_POST)) {
			$imagUrl = '';
			if ($_FILES["file"]["name"] != "") {
				$filename = $_FILES["file"]["name"];
				$filetype = $_FILES["file"]["type"];
				$filesize = $_FILES["file"]["size"] / 1024;  // kb
				$filetmp = $_FILES["file"]["tmp_name"];
				$date = date('YmdHis',time());
				$checkname = explode(".", $filename);
				$filename = $checkname[0].'_'.$date.'.'.$checkname[1];
				$path = HOST_ROOT."/app/webroot/adminImag/";
				$url = "/adminImag/$filename";
				
				if (file_exists($path . $filename))
				{
					echo $filename . " already exists. ";exit();
				}else {
					$rec = move_uploaded_file($filetmp,$path.$filename);
					if($rec){
						$imagUrl = $url;
							
					}else{
						echo "move upload file fail!";exit();
					}
				}
			}
			App::import ( 'Vendor', 'Crypt/Crypt3Des' );
			$Crypt3Des = new Crypt3Des ();
			$password3Des=$Crypt3Des->encrypt ( $_POST['password'] );
			$dataAll = array(
					'account' => $_POST['account'],
					'password' => $password3Des,
					'level' => $_POST['level'],
					'create_admin' => $this->adminInfo['Admin']['account'],
			);
			if ($imagUrl != '') {
				$dataAll['imagUrl'] = $imagUrl;
				//array_push($dataAll, 'imagUrl',$imagUrl);
			}
			$addStatus = $this->Admin->addAdmin($dataAll);
			if ($addStatus) {
				$this->redirect ( "/manager/managerManage" );
				return;
			}
		}
		
	}
	
	//TODO ---------------------------------------Book---------------------------------------
	function bookList(){
		$session_me = $this->Session->read ( 'me' );
		if(empty($session_me)) {
			$this->redirect ( "/" );
			return;
		}
		if ($this->adminInfo) {
			$this->set('myInfo',$this->adminInfo['Admin']);
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
	
	function editBook($id = 0){
		$this->loadModel('Book');
		$this->loadModel('BookCategory');
		$queryStatus = $this->Book->getBookById($id);
		if ($queryStatus){
			$sinfo = $this->BookCategory->getBookCategoryById($queryStatus['Book']['category-id']);
			//header("Content-Type:text/html; charset=utf-8");
			$queryStatus['Book']['category-id'] = $sinfo['BookCategory']['category'];
			$this->set('editBook',$queryStatus['Book']);
		}
	}
	function deleteBook($id = 0){
		$this->loadModel('Book');
		$deleteStatus = $this->Book->deleteBook($id);
		if ($deleteStatus){
			$this->redirect ( "/manager/bookList" );
			return;
		}
	}
	
	function addBook(){
		$session_me = $this->Session->read ( 'me' );
		if(empty($session_me)) {
			$this->redirect ( "/" );
			return;
		}
		if ($this->adminInfo) {
			$this->set('myInfo',$this->adminInfo['Admin']);
		}
		
		
		$this->loadModel('BookCategory');
		$this->loadModel('Book');
		if (isset($_POST['bookName'])) {
			$BookCategoryId = $this->BookCategory->addBookCategory($_POST['categoryId']);//得到相应id，如果是新的则先创建后返id
			$dataAll = array(
					'book-name' => $_POST['bookName'],
					'author' => $_POST['author'],
					'publishing' => $_POST['publishing'],
					'category-id' => $BookCategoryId['BookCategory']['category-id'],
					'price' => $_POST['price'],
					'quantity-in' => $_POST['quantityIn'],
					
			);
			$imagUrl = '';
			if ($_FILES["file"]["name"] != "") {
				$filename = $_FILES["file"]["name"];
				$filetype = $_FILES["file"]["type"];
				$filesize = $_FILES["file"]["size"] / 1024;  // kb
				$filetmp = $_FILES["file"]["tmp_name"];
				$date = date('YmdHis',time());
				$checkname = explode(".", $filename);
				$filename = $checkname[0].'_'.$date.'.'.$checkname[1];
				$path = HOST_ROOT."/app/webroot/bookImag/";
				$url = "/bookImag/$filename";
			
				if (file_exists($path . $filename))
				{
					echo $filename . " already exists. ";exit();
				}else {
					$rec = move_uploaded_file($filetmp,$path.$filename);
					if($rec){
						$imagUrl = $url;
							
					}else{
						echo "move upload file fail!";exit();
					}
				}
			}
			
			if ($imagUrl != '') {
				$dataAll['imagUrl'] = $imagUrl;
			}
			if (isset($_POST['id'])){
				$addBookStatus = $this->Book->editBook($dataAll,$_POST['id']);
			} else {
				$addBookStatus = $this->Book->addBook($dataAll);
			}
			if ($addBookStatus){
				$this->redirect ( "/manager/bookList" );
				return;
			}
		}
		
		$BookCategory = $this->BookCategory->getBookCategory(0);
		$this->set('BookCategory',$BookCategory);
		//var_dump($BookCategory);exit();
	}
	
	//TODO ---------------------------------------Reader---------------------------------------
	function addReader(){
		$session_me = $this->Session->read ( 'me' );
		if(empty($session_me)) {
			$this->redirect ( "/" );
			return;
		}
		if ($this->adminInfo) {
			$this->set('myInfo',$this->adminInfo['Admin']);
		}
	
		if (isset($_POST['level'])) {
			$dataAll = array(
					'reader-name' => $_POST['ReaderName'],
					'sex' => $_POST['sex'],
					'birthday' => $_POST['birthday'],
					'phone' => $_POST['phone'],
					'Mobile' => $_POST['Mobile'],
					'card-name' => $_POST['cardName'],
					'card-id' => $_POST['cardId'],
					'level' => $_POST['level'],
			);
			$imagUrl = '';
			if ($_FILES["file"]["name"] != "") {
				$filename = $_FILES["file"]["name"];
				$filetype = $_FILES["file"]["type"];
				$filesize = $_FILES["file"]["size"] / 1024;  // kb
				$filetmp = $_FILES["file"]["tmp_name"];
				$date = date('YmdHis',time());
				$checkname = explode(".", $filename);
				$filename = $checkname[0].'_'.$date.'.'.$checkname[1];
				$path = HOST_ROOT."/app/webroot/readerImag/";
				$url = "/readerImag/$filename";
					
				if (file_exists($path . $filename))
				{
					echo $filename . " already exists. ";exit();
				}else {
					$rec = move_uploaded_file($filetmp,$path.$filename);
					if($rec){
						$imagUrl = $url;
							
					}else{
						echo "move upload file fail!";exit();
					}
				}
			}
				
			if ($imagUrl != '') {
				$dataAll['imagUrl'] = $imagUrl;
			}
			$this->loadModel('Reader');
			if (isset($_POST['id'])){
				$addReaderStatus = $this->Reader->editReader($dataAll,$_POST['id']);
			} else {
				$addReaderStatus = $this->Reader->addReader($dataAll);
				if ($addReaderStatus){
					App::import ( 'Vendor', 'Crypt/Crypt3Des' );
					$Crypt3Des = new Crypt3Des ();
					$abc=substr($_POST['phone'],-6);
					$password3Des = $Crypt3Des->encrypt ( $abc );
					$dataLigin = array(
							'reader-id' => $addReaderStatus['Reader']['reader-id'],
							'account' => $_POST['phone'],
							'level' => $_POST['level'],
							'password' => $password3Des,
							'create_admin' => $this->adminInfo['Admin']['account'],
							'imagUrl' => $addReaderStatus['Reader']['imagUrl'],
					);
					$this->loadModel('ReaderLogin');
					$addLoginStatus = $this->ReaderLogin->addReaderLogin($dataLigin);
					$this->redirect ( "/manager/readerList" );
					return;
				}
			}
			
		}
		
		
	}
	
	function readerList(){
		$session_me = $this->Session->read ( 'me' );
		if(empty($session_me)) {
			$this->redirect ( "/" );
			return;
		}
		if ($this->adminInfo) {
			$this->set('myInfo',$this->adminInfo['Admin']);
		}
	
		$this->loadModel('Reader');
		$allReader = $this->Reader->getAllReader(0);
		if ($allReader) {
			$this->set("allReader",$allReader);
		}
	}
	function editReader($id = 0){
		$this->loadModel('Reader');
		$queryStatus = $this->Reader->getReaderById($id);
		if ($queryStatus){
			$this->set('editReader',$queryStatus['Reader']);
		}
	}
	function deleteReader($id = 0){
		$this->loadModel('Reader');
		$deleteStatus = $this->Reader->deleteReader($id);
		if ($deleteStatus){
			$this->redirect ( "/manager/readerList" );
			return;
		}
	}
// 	function getBookCategoryById(){
// 		if (isset($_POST['uuid'])) {
// 			$para['uuid'] = $_POST['uuid'];;
// 		}
// 		$this->loadModel('BookCategory');
// 		$sinfo = $this->BookCategory->getBookCategoryById(1);
// 		if($sinfo){
// 			die(json_encode(array("success"=>$sinfo['BookCategory']['category'])));
// 		}else{
// 			die(json_encode(array("fail"=>'fail')));
// 		}
// 	}

}
