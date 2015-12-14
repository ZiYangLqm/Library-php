<?php
class BookBehavior extends ModelBehavior {
	//添加书籍
	public function addBook(Model $Model,$data){
		$book = $Model->getBookByName($data['book-name']);
		if (empty($book)) {
			$dataAll =  array(
					'book-name' => $data['book-name'],
					'author' => $data['author'],
					'publishing' => $data['publishing'],
					'category-id' => $data['category-id'],
					'price' => $data['price'],
					'quantity-in' => $data['quantity-in'],
					'date-in'=>time(),
			);
			if (isset($data['imagUrl'])){
				$dataAll['imagUrl'] = $data['imagUrl'];
			}
			$ret = $Model->saveAll ( $dataAll );
			if ($ret) {
				return true;
			} else {
				return false;
			}
		} else {
			return true;
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

	//查询书籍信息
	public function getAllBook(Model $Model, $delete = 0) {
		$ret = $Model->find ( 'all', array (
				'conditions' => array (
						'deleted' => $delete
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
	
	//出借书籍
	public function borrowBookUpdate(Model $Model, $id) {
		$ret = $Model->updateAll(
				array(
						'quantityOut' => "quantityOut + 1",
				),
				array(
						'book-id' => $id)
		);
		return $ret;
	}
	
	//挂失书籍
	public function lossBook(Model $Model, $id) {
		$ret = $Model->updateAll(
				array(
						'quantityLoss'=> "quantityLoss + 1",
						'quantityOut' => "quantityOut - 1"
		),
				array(
						'book-id' => $id)
		);
		return $ret;
	}
	
	//挂失书籍
	public function unLossBook(Model $Model, $id) {
		$ret = $Model->updateAll(
				array(
						'quantityLoss'=> "quantityLoss - 1",
						'quantityOut' => "quantityOut + 1"
				),
				array(
						'book-id' => $id)
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