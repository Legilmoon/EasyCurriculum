<?php



class Country extends AppModel{

public $hasMany = array('CountryTranslation','Education');
public $hasAndBelongsToMany = array(
	'Regions' => array(
		'className' 	=> 'WorldRegion',
		'joinTable' 	=> 'countries_has_world_regions',
		'foreignKey' 	=> 'country_id',
		'associationForeignKey' => 'world_region_id')


	);
}