<?php



class Degree extends AppModel{
	public $hasMany = array(
		'Person'=>array(
			
			'fields' => array('id') 
			)
		);
	
}