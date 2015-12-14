<?php
class Borrow extends AppModel {
	public $name = 'Borrow';
	public $useTable = 'lib_borrow';
	public $actsAs = array('Borrow');
}