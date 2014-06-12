<?php

class SpecializationsController extends AppController
{


	public function index(){
		$this->set('ListOfCountries', $this->Country->find('all'));
	}

}




