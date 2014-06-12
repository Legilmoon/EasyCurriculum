<?php

class Language extends AppModel{


	public $hasMany = array(
		'PersonKnowsLanguage',
		'LanguageTranslation'
		);
}