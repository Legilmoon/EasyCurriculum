<?php

class SpecializationsController extends AppController
{
	public function add(){
			$LanguageList = Configure::read('LanguageList');
			$this->set('LanguageList', $LanguageList);
					

		if (!empty($this->request->data)){
			$this->set('defaultname', $this->data['Specialization']['name']);
			if ($this->Specialization->save($this->data)) {
				foreach ($this->data['SpecializationTranslation'] as $translation) {
					$this->Specialization->SpecializationTranslation->create();
					$translation['specialization_id'] = $this->Specialization->getLastInsertId();
					$this->Specialization->SpecializationTranslation->save($translation);

				}
			$this->Session->setFlash('Specialization added', 'alert_success');
			return $this->redirect(array('action' => 'index', 'controller'=>'Specializations'));
			}
		}
	}



	public function index(){
		$this->set('ListOfSpecs', $this->Specialization->find('all'));
	}




	public function edit($id=null){
		$LanguageList = Configure::read('LanguageList');
		$this->set('LanguageList', $LanguageList);

		if (!$id) {
			throw new NotFoundException(__('Unknown ID'));
		}
		$spec = $this->Specialization->findById($id);
		if(!$spec){
			throw new NotFoundException(__('Unknown Specialization'));
		}
		
		if (!$this->request->data) {
			$this->request->data = $spec;
			$this->set('spec', $spec);
			$this->Specialization->SpecializationTranslation->set('lang','fr');
		}
		else {
			if ($this->request->is(array('put'))){
				if ($this->Specialization->saveAll($this->request->data)) {
					$this->Session->setFlash($spec['Specialization']['name'] . ' specialization has been updated.', 'alert_success');
					return $this->redirect(array('action' => 'index', 'controller'=>'Specializations'));
				}
				else{
					$this->Session->setFlash('Unable to update this specialization', 'alert_warning');
				}
			}
		}
	}





	public function delete($id){
		if (!$id) {
			throw new NotFoundException(__('Unknown ID'));
		}
		$spec = $this->Specialization->findById($id);
		$spectrans =$this->Specialization->SpecializationTranslation->findAllBySpecializationId($id);
		foreach($spectrans as $spectransunit){
			$this->Specialization->SpecializationTranslation->delete($spectransunit['SpecializationTranslation']['id'], $cascade = true);
		}
		if ($this->Specialization->delete($id, $cascade = true)) {
			$this->Session->setFlash(( $spec['Specialization']['name'] . '\' specialization has been removed from database.'), 'alert_success');
			$this->redirect(array('action' => 'index', 'controller'=>'Specializations'));
		}
	}
}