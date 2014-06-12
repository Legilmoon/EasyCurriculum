<?php

class PersonKnowsLanguage extends AppModel{

	public $belongsTo = array(
		'Person',
		'Language',
		'Level'
		);
}