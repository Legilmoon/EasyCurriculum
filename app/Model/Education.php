<?php



class Education extends AppModel{

	public $belongsTo = array(
		'Degree'=>array(),
		'People',
		'Country'=>array()
		);


}





