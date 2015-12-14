<?php
class MemberLevelBehavior extends ModelBehavior {
	
	
	
	//根据level获取信息
	public function getInfoByLevel(Model $Model, $level) {
		$ret = $Model->find ( 'first', array (
				'conditions' => array (
						'level' => $level,
						'deleted' => 0
				)
		) );
		return $ret;
	}
	
	
}