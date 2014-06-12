<?php


class Profexpe extends AppModel{
	public $belongsTo =array(
		'Person'
		);

	public $hasMany = array(
		'ProfexpeTranslation'
	);


}