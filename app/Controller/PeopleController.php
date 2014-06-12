<?php

class PeopleController extends AppController
{


	public function index(){
		$ListOfPersons = $this->paginate('Person');
		$this->set('ListOfPersons', $ListOfPersons);
	}


	public function view($id, $lang='en'){
		$LanguageList = Configure::read('LanguageList');
		$this->set('LanguageList', $LanguageList);
		if (!$id) {
			throw new NotFoundException(__('Unknown ID'));
		}
		$person = $this->Person->findById($id);
		if(!$this->Person->findById($id)){
			throw new NotFoundException(__('Cant find Person with this ID in Database'));
		}
		$this->set('person', $person);
		//-----------------------------Education Traduction-------------------------------	
		foreach($person['Education'] as $cnt=> $EducationItem){

			$EducationList[$cnt]['begin_date'] = $EducationItem['begin_date'];
			$EducationList[$cnt]['end_date'] = $EducationItem['end_date'];
			$EducationList[$cnt]['original_title'] = $EducationItem['original_title'];
			$EducationList[$cnt]['school_name'] = $EducationItem['school_name'];
			
			$conditions = array(
				'Degree.id' 	=>	$EducationItem['degree_id']);
			$reqResult = $this->Person->Degree->find('first', array('conditions' => $conditions, 'fields'=>'degree'));
			
			$EducationList[$cnt]['degree'] = $reqResult['Degree']['degree'];

			$conditions = array(
				'CountryTranslation.lang'		=>	$lang,
				'CountryTranslation.country_id' =>	$EducationItem['country_id']);
			$this->loadModel('Country');
			$CntryResult = $this->Country->CountryTranslation->find('first', array('conditions' => $conditions));
			$EducationList[$cnt]['country'] = $CntryResult['CountryTranslation']['name'];
		}

		$this->set('educationList', $EducationList);

		//-----------------------------Key Competences Traduction-------------------------		
		foreach($person['KeyCompetence'] as $cnt => $KeyCompItem){
			if ($KeyCompItem['lang'] == $lang)
				$keyCompetence = $KeyCompItem['key_competences'];
		}
		$this->set('key_competences',$keyCompetence);

		//-----------------------------Specialization Traduction-------------------------
		foreach ( $person['Specialization'] as $cnt => $spec){
			$specId[$cnt] = $spec['id'];
		}
		$conditions = array(
			'SpecializationTranslation.lang'				=>	$lang,
			'SpecializationTranslation.specialization_id' 	=>	$specId);
		
		$List = $this->Person->Specialization->SpecializationTranslation->find('all', array('conditions' => $conditions, 'fields'=>'name'));
		foreach ($List as $cnt => $specializationTrad){
			$specializationList[$cnt] = $specializationTrad['SpecializationTranslation']['name'];
		}
		$this->set('specializationList', $specializationList);
		


		//------------------------------Language Traduction------------------------------
		foreach ( $person['PersonKnowsLanguage'] as $cnt => $knowsLang){
			$knowsLangId[$cnt] = $knowsLang['language_id'];
		}
		$conditions = array(
			'Language.id' => $knowsLangId
			);

		$List = $this->Person->PersonKnowsLanguage->Language->find('all', array('conditions'=>$conditions));
		foreach ($List as $cnt => $entry){
			foreach($entry['LanguageTranslation'] as $trad ){
				if($trad['lang'] == $lang){
					$knownLanguageList[$cnt]['language'] = $trad['language'];
				}
				
			}
			foreach($entry['PersonKnowsLanguage'] as $personKnowsLang){
				if ($personKnowsLang['person_id'] == $person['Person']['id']){
					$knownLanguageList[$cnt]['read'] = $personKnowsLang['read_level'];
					$knownLanguageList[$cnt]['write'] = $personKnowsLang['write_level'];
					$knownLanguageList[$cnt]['speak'] = $personKnowsLang['speak_level'];
				}
			}
		}
		$this->set('knownLanguageList',$knownLanguageList);

		//------------------------------Nationality Traduction---------------------------
		foreach ( $person['Nationality'] as $cnt => $natio){
			$natioId[$cnt] = $natio['id'];
		}
		$conditions = array(
			'CountryTranslation.lang'		=>	$lang,
			'CountryTranslation.country_id' =>	$natioId);

		$List = $this->Person->Nationality->CountryTranslation->find('all', array('conditions' => $conditions, 'fields'=>'nationality'));
		foreach ($List as $cnt => $nationalityTrad){
			$nationalityList[$cnt] = $nationalityTrad['CountryTranslation']['nationality'];
		}
		$this->set('nationalityList', $nationalityList);
		
		//------------------------------Worked In Traduction---------------------------
		foreach ( $person['WorkedIn'] as $cnt =>$workedIn){
			$workedInId[$cnt] = $workedIn['id'];
		}
		$conditions = array(
			'CountryTranslation.lang'		=>	$lang,
			'CountryTranslation.country_id' =>	$workedInId);

		$List = $this->Person->WorkedIn->CountryTranslation->find('all', array('conditions' => $conditions, 'fields'=>'name'));
		foreach ($List as $cnt => $countryTrad){
			$countryList[$cnt] = $countryTrad['CountryTranslation']['name'];
		}
		$this->set('countryList', $countryList);
		

		//------------------------------Professional Experience---------------------------
		foreach ( $person['Profexpe'] as $cnt =>$Profexpe){
			$ProfexpeID[$cnt] = $Profexpe['id'];
		}
		$conditions = array(
			'ProfexpeTranslation.lang'		=>	$lang,
			'ProfexpeTranslation.profexpe_id' =>	$ProfexpeID);

		$List = $this->Person->Profexpe->ProfexpeTranslation->find('all', array('conditions'=> $conditions));
		foreach ($List as $cnt => $profexTrad){
			$ProfexpeList[$cnt] = $profexTrad;
		}
		$this->set('ProfexpeList', $ProfexpeList);
	}


	public function add(){
		$LanguageList = Configure::read('LanguageList');
		$this->set('LanguageList', $LanguageList);

		$this->set('degrees', $this->Person->Degree->find('list', array('fields'=>array('degree'))));
		$this->set('specializations', $this->Person->Specialization->find('list', array('fields'=>array('name'))));
		$this->set('nationalities', $this->Person->Nationality->find('list', array('fields'=>array('nationality'))));
		$this->set('countries', $this->Person->WorkedIn->find('list', array('fields'=>array('name'))));
		$this->set('languages', $this->Person->PersonKnowsLanguage->Language->find('list', array('fields'=>array('name'))));
		$this->set('levels', $this->Person->PersonKnowsLanguage->Level->find('list', array('fields'=>array('name'))));

		if (!empty($this->request->data)){
			$person = $this->request->data;
			unset($this->Person->KeyCompetence->validate['person_id']);
			unset($this->Person->PersonKnowsLanguage->validate['person_id']);
			unset($this->Person->Education->validate['person_id']);
			unset($this->Person->Profexpe->validate['person_id']);
			
			$this->Person->saveAssociated($this->request->data, array('deep' => true));
			$this->Session->setFlash($person['Person']['firstname'] .' '. $person['Person']['name']. '\'s CV has been added to the database', 'alert_success');
			return $this->redirect(array('action' => 'index', 'controller'=>'People'));
		}
	}


	public function edit($id=null){
		$LanguageList = Configure::read('LanguageList');
		$this->set('LanguageList', $LanguageList);
		$person = $this->Person->findById($id);
		
		if (!$id) {
			throw new NotFoundException(__('Unknown ID'));
		}
		if(!$person){
			throw new NotFoundException(__('Unknown Person'));
		}
		
		foreach ($person['Profexpe'] as $XPcount => $proXP){
			$conditions = array(
				'ProfexpeTranslation.profexpe_id' =>	$proXP['id']);
			$this->loadModel('ProfexpeTranslation');
			$proX = $this->ProfexpeTranslation->find('all', array('conditions'=>$conditions));
			$ProfXPList['Profexpe'][$XPcount]= $proX[0]['Profexpe'];
			foreach($proX as $cnt => $px)
				$ProfXPList['Profexpe'][$XPcount]['ProfexpeTranslation'][$cnt]= $px['ProfexpeTranslation'];	
			$person['Profexpe']= $ProfXPList['Profexpe'];
		}
		
		// populating the lists / dropdowns / checkboxes
		$this->set('degrees', $this->Person->Degree->find('list', array('fields'=>array('degree'))));
		$this->set('specializations', $this->Person->Specialization->find('list', array('fields'=>array('name'))));
		$this->set('natio', $this->Person->Nationality->find('list', array('fields'=>array('nationality'))));
		$this->set('countries', $this->Person->WorkedIn->find('list', array('fields'=>array('name'))));
		$this->set('languages', $this->Person->PersonKnowsLanguage->Language->find('list', array('fields'=>array('name'))));
		$this->set('levels', $this->Person->PersonKnowsLanguage->Level->find('list', array('fields'=>array('name'))));
		$this->set('person', $person);
		
		if (!$this->request->data) {
			$this->request->data = $person;
		}
		else {
			if ($this->request->is(array('put'))){
				foreach( $person['PersonKnowsLanguage'] as $PersonKnowsLanguageItem)
					$this->Person->PersonKnowsLanguage->delete($PersonKnowsLanguageItem['id']);
				foreach ($person['Education'] as $EducationItem)
					$this->Person->Education->delete($EducationItem['id']);
				foreach( $person['Profexpe'] as $ProfexpeItem){
					$query =$this->Person->Profexpe->ProfexpeTranslation->find('all', array('conditions' => array('profexpe_id'=>$ProfexpeItem['id'])));
					foreach ($query as $ProfexpeTranslationItem)
						$this->Person->Profexpe->ProfexpeTranslation->delete($ProfexpeTranslationItem['ProfexpeTranslation']['id']);
					$this->Person->Profexpe->delete($ProfexpeItem['id']);
				}
				$person = $this->request->data;
				//first delete all 'dynamic' entries in DB(before saving them again, otherwise deleting an entry will not work).
				if ($this->Person->saveAssociated($person,array('deep' => true))){
					$this->Session->setFlash($person['Person']['name'] .' '. $person['Person']['firstname'] . '\'s CV has been updated.', 'alert_success');
					return $this->redirect(array('action' => 'index', 'controller'=>'People'));
				}
				else{
					$this->Session->setFlash('Unable to update this CV', 'alert_warning');
				}
			}
		}
	}





	public function delete($id){
		if (!$id ) {
			throw new NotFoundException(__('Unknown ID'));
		}
		$person = $this->Person->findById($id);

		if(!$person){
			throw new NotFoundException(__('Cant find Person with this ID in Database'));
		}

		foreach( $person['KeyCompetence'] as $KeyCompItem)
			$this->Person->KeyCompetence->delete($KeyCompItem['id']);
		foreach( $person['PersonKnowsLanguage'] as $PersonKnowsLanguageItem)
			$this->Person->PersonKnowsLanguage->delete($PersonKnowsLanguageItem['id']);
		foreach( $person['Education'] as $EducationItem)
			$this->Person->Education->delete($EducationItem['id']);
		foreach( $person['Profexpe'] as $ProfexpeItem){
			$query =$this->Person->Profexpe->ProfexpeTranslation->find('all', array('conditions' => array('profexpe_id'=>$ProfexpeItem['id'])));
			foreach ($query as $queryItem)
				$this->Person->Profexpe->ProfexpeTranslation->delete($queryItem['ProfexpeTranslation']['id']);
			$this->Person->Profexpe->delete($ProfexpeItem['id']);
		}
		foreach( $person['Affiliation'] as $AffiliationItem)
			$this->Person->Affiliation->delete($AffiliationItem['id']);
		if ($this->Person->delete($id)) {
			$this->Session->setFlash(( $person['Person']['firstname'] .' '. $person['Person']['name'] . '\'s CV has been removed from database.'), 'alert_success');
			$this->redirect(array('action' => 'index', 'controller'=>'People'));
		}
	}

//////////--------------------------------------------------------SEARCH--------------------------------------------------------------------

	public function search(){
		$this->loadModel('WorldRegion');
		$this->WorldRegion->recursive = 1;
		$List = $this->WorldRegion->find('all');
		//debug($List);
		foreach($List as $cnt => $Region)
			$WorldRegionList[$cnt] = $Region['WorldRegion']['name'];
		$this->set('WorldRegionList', $WorldRegionList);


		if(!$this->request->data){
			debug('New search!!');
		}
		else{
			$data = $this->request->data;
			$selectedRegions = $data['People']['WorldRegion'];
			foreach ($selectedRegions as $cnt=>$Region)
				debug($List[$Region]['Country']);
			//debug($this->request->data['People']['WorldRegion']);
		}



		//$this->redirect(array('action' => 'index', 'controller'=>'People'));
	}




}

