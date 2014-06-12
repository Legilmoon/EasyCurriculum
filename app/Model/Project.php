<?php



class Project extends AppModel{

	public $hasAndBelongsToMany = array(
		'Person',
		'Country'=> array(
			'className' 	=> 'Country',
			'joinTable' 	=> 'project_is_in_countries',
			'foreignKey' 	=> 'project_id',
			'associationForeignKey' => 'country_id',
			'fields'		=>array('id','name')
			)
		
		);
	
	public $hasMany = array(
		'GeneralCharacteristic'
	);

}