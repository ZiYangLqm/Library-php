<?php
class BorrowBehavior extends ModelBehavior {
	//添加借书信息
	public function addBorrowInfo(Model $Model,$data){
		$days = $data['levelDay'];
		$dataAll =  array(
			'reader-id' => $data['reader-id'],
			'book-id' => $data['book-id'],
			'date-return' => strtotime("+ $days day"),
			'date-borrow' => time()
		);
		$ret = $Model->saveAll ( $dataAll );
		if ($ret) {
			return true;
		}else {
			return false;
		}
	}
	
	//编辑书籍
	public function editBook(Model $Model,$data,$id){
		if (isset($data['imagUrl'])){
			$imagUrl = $data['imagUrl'];
		}else {
			$imagUrl = "/adminImag/gravatar.jpg";
		}
		$name = $data['book-name'];
		$author = $data['author'];
		$publishing = $data['publishing'];
		$category = $data['category-id'];
		$price = $data['price'];
		$quantity = $data['quantity-in'];
		$ret = $Model->updateAll(
				array(
						'book-name' => "'$name'",
						'author' => "'$author'",
						'publishing' => "'$publishing'",
						'category-id' => "$category",
						'price' => "$price",
						'quantity-in' => "$quantity",
						'imagUrl' => "'$imagUrl'",
				),
				array('book-id' => $id)
		);
		if ($ret) {
			return true;
		}else{
			return false;
		}
	
	}
	
	
	//判断是否创建该管理员账户
	public function getBookByName(Model $Model, $bookName) {
		$ret = $Model->find ( 'first', array (
				'conditions' => array (
						'book-name' => $bookName
				)
		) );
		return $ret;
	}

	//查询借阅信息
	public function getAllBorrowInfo(Model $Model, $delete = 0 ,$readerId = 0) {
		$ret = $Model->find ( 'all', array (
				'conditions' => array (
						'deleted' => $delete,
						'reader-id' => $readerId
				)
		) );
		return $ret;
	}
	
	
	//根据id获取信息
	public function getBookById(Model $Model, $id) {
		$ret = $Model->find ( 'first', array (
				'conditions' => array (
						'book-id' => $id
				)
		) );
		return $ret;
	}
	
	//挂失书籍
	public function lossBookById(Model $Model, $id) {
		$ret = $Model->updateAll(
				array('loss'=>'1'),array('id' => $id)
		);
		return $ret;
	}
	//取消挂失书籍
	public function unLossBookById(Model $Model, $id) {
		$ret = $Model->updateAll(
				array('loss'=>'0'),array('id' => $id)
		);
		return $ret;
	}
	
	//删除书籍
	public function deleteBook(Model $Model, $id) {
		$ret = $Model->updateAll(
				array('deleted'=>'1'),array('book-id' => $id)
		);
		return $ret;
	}
	
	
	
}