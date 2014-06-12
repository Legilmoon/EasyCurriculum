<?php


class WorldRegion extends AppModel{

public $hasAndBelongsToMany = array(
	'Country'=>array(
		'Regions' => array(
		'className' 	=> 'Country',
		'joinTable' 	=> 'countries_has_world_regions',
		'foreignKey' 	=> 'world_region_id',
		'associationForeignKey' => 'country_id')
		)
	);

}

