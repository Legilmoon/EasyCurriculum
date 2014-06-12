<?php

class ProjectsController extends AppController
{
	/*------------------------------------------------------------------
	-----------------------------index----------------------------------
	------------------------------------------------------------------*/
	public function index(){
		$ListOfProjects = $this->paginate('Project');
		$this->set('ListOfProjects', $ListOfProjects);
	}
//blabla

	/*------------------------------------------------------------------
	-----------------------------view-----------------------------------
	------------------------------------------------------------------*/
	public function view($id, $lang='en'){
		$LanguageList = Configure::read('LanguageList');
		$this->set('LanguageList', $LanguageList);
		if (!$id) {
			throw new NotFoundException(__('Unknown ID'));
		}
		$project = $this->Project->findById($id);
		if(!$this->Project->findById($id)){
			throw new NotFoundException(__('Cant find Project with this ID in Database'));
		}
		$this->set('project', $project);
		//------------------------------- country transltion------------------------
		foreach ($project['Country'] as $cnt=>$country){

			$countryId[$cnt] = $country['id'];
		}
		$conditions = array(
			'CountryTranslation.lang'		=>	$lang,
			'CountryTranslation.country_id' =>	$countryId);

		$List = $this->Project->Country->CountryTranslation->find('all', array('conditions' => $conditions, 'fields'=>'name'));
		foreach ($List as $cnt => $countryTrad){
			$countryList[$cnt] = $countryTrad['CountryTranslation']['name'];
		}
		$this->set('countryList', $countryList);
		
		//------------------------------- General characteristics transltion------------------------
		foreach ($project['GeneralCharacteristic'] as $cnt=>$genCharacteristics){
			if($genCharacteristics['lang']==$lang)
				$genCharTranslation = $genCharacteristics['description'];
		}
		$this->set('genCharTranslation', $genCharTranslation);


	}

	/*------------------------------------------------------------------
	-------------------------------add----------------------------------
	------------------------------------------------------------------*/
	public function add(){
		$LanguageList = Configure::read('LanguageList');
		$this->set('LanguageList', $LanguageList);
		$this->set('countries', $this->Project->Country->find('list', array('fields'=>array('name'))));

		if (!empty($this->request->data)){
			$project = $this->request->data;
			$this->Project->saveAssociated($this->request->data, array('deep' => true));
			$this->Session->setFlash($project['Project']['project_name'] .' has been added to the database', 'alert_success');
			return $this->redirect(array('action' => 'index', 'controller'=>'Projects'));
		}
	}
	/*------------------------------------------------------------------
	-------------------------------edit--------------------------------
	------------------------------------------------------------------*/
	public function edit($id){
		$LanguageList = Configure::read('LanguageList');
		$this->set('LanguageList', $LanguageList);
		$this->set('countries', $this->Project->Country->find('list', array('fields'=>array('name'))));
		$project = $this->Project->findById($id);

		if (!$id) {
			throw new NotFoundException(__('Unknown ID'));
		}
		if(!$project){
			throw new NotFoundException(__('Unknown Project'));
		}

		if (!$this->request->data) {
			$this->request->data = $project;
		}
		else{
			if ($this->request->is(array('put'))){
/*				foreach( $project['Country'] as $CountryItem)
					$this->Project->Country->delete($CountryItem['id']);
*/				
				$project = $this->request->data;
				if ($this->Project->saveAssociated($project,array('deep' => true))){
					$this->Session->setFlash($project['Project']['project_name'] .' has been updated.', 'alert_success');
					return $this->redirect(array('action' => 'index', 'controller'=>'Projects'));
				}
				else{
					$this->Session->setFlash('Unable to update this Project', 'alert_warning');
				}

			}
		}

/*
		if (!empty($this->request->data)){
			$project = $this->request->data;
			$this->Project->saveAssociated($this->request->data, array('deep' => true));
			$this->Session->setFlash($project['Project']['project_name'] .' has been added to the database', 'alert_success');
			return $this->redirect(array('action' => 'index', 'controller'=>'Projects'));
		}
*/	}



	/*------------------------------------------------------------------
	-------------------------------delete-------------------------------
	------------------------------------------------------------------*/
	public function delete($id){
		if (!$id ) {
			throw new NotFoundException(__('Unknown ID'));
		}
		$project = $this->Project->findById($id);
		if(!$project){
			throw new NotFoundException(__('Cant find Project with this ID in Database'));
		}

		foreach($project['GeneralCharacteristic'] as $genCharItem){
			$this->Project->GeneralCharacteristic->delete($genCharItem['id']);
		}
		if($this->Project->delete($project['Project']['id'])){
			$this->Session->setFlash(( $project['Project']['project_name'] .'has been removed from database.'), 'alert_success');
			$this->redirect(array('action' => 'index', 'controller'=>'Projects'));
		}
	}



}