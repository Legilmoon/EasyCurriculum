<?php



class Person extends AppModel{
	var $uses = array('Country', 'Language', 'Education', 'WorldRegion');

	public $belongsTo = array(
		'Degree'=>array(
			'fields' => array('id',' degree'),
			)

		);

	public $hasMany = array(
		'Affiliation',
		'KeyCompetence',
		'PersonKnowsLanguage',
		'Education',
		'Profexpe',
		'Publication'
		);
	
	public $hasAndBelongsToMany = array(
		'Specialization',
		'Nationality' => array(
			'className' 	=> 'Country',
			'joinTable' 	=> 'person_has_nationalities',
			'foreignKey' 	=> 'person_id',
			'associationForeignKey' => 'country_id',
			'fields'		=>array('id','nationality')
			)
		,
		'WorkedIn' => array(
			'className' 	=> 'Country',
			'joinTable' 	=> 'person_worked_in_countries',
			'foreignKey' 	=> 'person_id',
			'associationForeignKey' => 'country_id',
			'fields'		=>array('id','name')
			)
		);




	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
			'message' => 'Vous devez entrer un Nom'
			),
		'firstname' => array(
			'rule' => 'notEmpty',
			'message' => 'Vous devez entrer un Prénom'
			)



		);

}

