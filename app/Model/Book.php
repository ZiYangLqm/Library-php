<?php
class Book extends AppModel {
	public $name = 'Book';
	public $useTable = 'lib_books';
	public $actsAs = array('Book');
}