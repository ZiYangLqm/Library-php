<?php
class AdminBehavior extends ModelBehavior {
	public function test(Model $Model){
		var_dump('11');exit();
	}
	//添加数据
	public function addAdmin(Model $Model,$data){
		$admin = $Model->getAdminByAccount($data['account']);
		if (empty($admin)) {
			$dataAll =  array(
					'account' => $data['account'],
					'password' => $data['password'],
					'level' => $data['level'],
					'create_admin' => $data['create_admin'],
					'create_time'=>time(),
					'modify_time'=>time()
			);
			if (isset($data['imagUrl'])){
				$dataAll['imagUrl'] = $data['imagUrl'];
				//array_push($dataAll, 'imagUrl',$data['imagUrl']);
			}
			$ret = $Model->saveAll ( $dataAll );
			if ($ret) {
				return $Model->read();
			} else {
				return false;
			}
		} else {
			return $admin;
		}
		
	}
	
	
	//判断是否创建该管理员账户
	public function getAdminByAccount(Model $Model, $Account) {
		$ret = $Model->find ( 'first', array (
				'conditions' => array (
						'account' => $Account
				)
		) );
		return $ret;
	}

	//查询所有管理员信息
	public function getAllAdmin(Model $Model, $delete = 0) {
		$ret = $Model->find ( 'all', array (
				'conditions' => array (
						'deleted' => $delete
				)
		) );
		return $ret;
	}
	
	
	//根据id获取管理员信息
	public function getAdminById(Model $Model, $id) {
		$ret = $Model->find ( 'first', array (
				'conditions' => array (
						'id' => $id
				)
		) );
		return $ret;
	}
	
	//修改密码
	public function updatePassword(Model $Model, $account, $password) {
		$admin = $Model->getAdminByAccount($account);
		if (empty($admin)) {
			
		} else {
			$ret = $Model->updateAll(
					array('password' => $password,'modify_time'=>time()),array('account' => $account)
			);
		}
		return $ret;
	}
	
	//更新登录时间
	public function updateLoginTime(Model $Model, $account) {
		$admin = $Model->getAdminByAccount($account);
		if (empty($admin)) {
				
		} else {
			$ret = $Model->updateAll(
					array('login_time'=>time()),array('account' => $account)
			);
		}
		return $ret;
	}
	
	//删除管理员
	public function deleteAdmin(Model $Model, $id) {
		$ret = $Model->updateAll(
				array('deleted'=>'1'),array('id' => $id)
		);
		return $ret;
	}
	
	//修改管理员权限
	public function updaAdminRight(Model $Model, $id ,$level) {
		$ret = $Model->updateAll(
				array('level'=>$level),array('id' => $id)
		);
		return $ret;
	}
	
	
}