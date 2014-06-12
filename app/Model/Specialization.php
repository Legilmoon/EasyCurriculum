<?php



class Specialization extends AppModel{
    
	public $hasAndBelongsToMany = array('Person');

	public $hasMany = array('SpecializationTranslation');

}