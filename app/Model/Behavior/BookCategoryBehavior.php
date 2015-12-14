<?php
class BookCategoryBehavior extends ModelBehavior {
	//根据
	public function addBookCategory(Model $Model,$category){
		$admin = $Model->getBookCategoryBycategory($category);
		if (empty($admin)) {
			$dataAll =  array(
					'category' => $category,
			);
			$ret = $Model->saveAll ( $dataAll );
			if ($ret) {
				$rett = $Model->find ( 'first', array (
						'conditions' => array (
								'category' => $category
						)
				) );
				return $rett;
				
			} else {
				return false;
			}
		} else {
			return $admin;
		}
		
	}
	
	
	//判断是否存在改类别
	public function getBookCategoryBycategory(Model $Model, $category) {
		$ret = $Model->find ( 'first', array (
				'conditions' => array (
						'category' => $category
				)
		) );
		return $ret;
	}
	
	//查询所有类别信息
	public function getBookCategory(Model $Model, $delete = 0) {
		$ret = $Model->find ( 'all', array (
				'conditions' => array (
						'deleted' => $delete
				)
		) );
		return $ret;
	}
	
	
	//根据id获取信息
	public function getBookCategoryById(Model $Model, $id) {
		$ret = $Model->find ( 'first', array (
				'conditions' => array (
						'category-id' => $id
				)
		) );
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