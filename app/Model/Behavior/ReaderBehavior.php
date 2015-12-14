<?php
class ReaderBehavior extends ModelBehavior {
	public function test(Model $Model){
		var_dump('11');exit();
	}
	//添加数据
	public function addReader(Model $Model,$data){
		$dataAll = array(
				'reader-name' => $data['reader-name'],
				'sex' => $data['sex'],
				'birthday' => $data['birthday'],
				'phone' => $data['phone'],
				'Mobile' => $data['Mobile'],
				'card-name' => $data['card-name'],
				'card-id' => $data['card-id'],
				'level' => $data['level'],
				'day'=>time()
		);
		if (isset($data['imagUrl'])){
			$dataAll['imagUrl'] = $data['imagUrl'];
			//array_push($dataAll, 'imagUrl',$data['imagUrl']);
		}
		$ret = $Model->saveAll ( $dataAll );
		if ($ret) {
			$addedId = $Model->find ( 'first', array (
					'conditions' => array (
								'phone' => $data['phone']
					)
			) );
			return $addedId;
		} else {
			return false;
		}
		
	}
	
	//编辑读者信息
	public function editReader(Model $Model,$data,$id){
		if (isset($data['imagUrl'])){
			$imagUrl = $data['imagUrl'];
		}else {
			$imagUrl = "/adminImag/gravatar.jpg";
		}
		$name = $data['reader-name'];
		$sex = $data['sex'];
		$birthday = $data['birthday'];
		$phone = $data['phone'];
		$Mobile = $data['Mobile'];
		$cardName = $data['card-name'];
		$CardId = $data['card-id'];
		$level = $data['level'];
		$ret = $Model->updateAll(
				array(
						'reader-name' => "'$name'",
						'sex' => "'$sex'",
						'birthday' => "'$birthday'",
						'phone' => "'$phone'",
						'Mobile' => "'$Mobile'",
						'card-name' => "'$cardName'",
						'card-id' => "'$CardId'",
						'level' => "$level",
						'imagUrl' => "'$imagUrl'",
				),
				array('reader-id' => $id)
		);
		if ($ret) {
			return true;
		}else{
			return false;
		}
	
	}
	//判断是否创建该管理员账户
// 	public function getAdminByAccount(Model $Model, $Account) {
// 		$ret = $Model->find ( 'first', array (
// 				'conditions' => array (
// 						'account' => $Account
// 				)
// 		) );
// 		return $ret;
// 	}

	//查询所有读者用户信息
	public function getAllReader(Model $Model, $delete = 0) {
		$ret = $Model->find ( 'all', array (
				'conditions' => array (
						'deleted' => $delete
				)
		) );
		return $ret;
	}
	
	
	//根据id获取读者信息
	public function getReaderById(Model $Model, $id) {
		$ret = $Model->find ( 'first', array (
				'conditions' => array (
						'reader-id' => $id
				)
		) );
		return $ret;
	}
	
	//修改密码
// 	public function updatePassword(Model $Model, $account, $password) {
// 		$admin = $Model->getAdminByAccount($account);
// 		if (empty($admin)) {
			
// 		} else {
// 			$ret = $Model->updateAll(
// 					array('password' => $password,'modify_time'=>time()),array('account' => $account)
// 			);
// 		}
// 		return $ret;
// 	}
	
	//更新登录时间
// 	public function updateLoginTime(Model $Model, $account) {
// 		$admin = $Model->getAdminByAccount($account);
// 		if (empty($admin)) {
				
// 		} else {
// 			$ret = $Model->updateAll(
// 					array('login_time'=>time()),array('account' => $account)
// 			);
// 		}
// 		return $ret;
// 	}
	
	//删除管理员
	public function deleteReader(Model $Model, $id) {
		$ret = $Model->updateAll(
				array('deleted'=>'1'),array('reader-id' => $id)
		);
		return $ret;
	}
	
	//修改管理员权限
// 	public function updaAdminRight(Model $Model, $id ,$level) {
// 		$ret = $Model->updateAll(
// 				array('level'=>$level),array('id' => $id)
// 		);
// 		return $ret;
// 	}
	
	
}