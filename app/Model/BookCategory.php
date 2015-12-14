<?php
class BookCategory extends AppModel {
	public $name = 'BookCategory';
	public $useTable = 'lib_book-category';
	public $actsAs = array('BookCategory');
}