<?php
class Admin extends AppModel {
	public $name = 'Admin';
	public $useTable = 'lib_admin';
	public $actsAs = array('Admin');
}