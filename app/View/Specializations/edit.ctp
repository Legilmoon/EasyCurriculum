<!-- -Specialization edit - -->

<div>
	<!--Form to edit a specialization -->
	<h1>Edit a Specialization</h1>


	<?php 


	echo $this->Form->create('Specialization',
		array(
			'inputDefaults' => array(
				'div' => 'form-group',
				'label' => array('class' => 'col col-md-3 control-label'),
				'wrapInput' => 'col col-md-9',
				'class' => 'form-control'),
			'class' => 'well form-horizontal'));
	echo $this->Form->input('id',array('type'=>'hidden'));
	echo $this->Form->input('name');
	foreach ( $LanguageList as $cnt => $language){
		echo $this->Form->input('SpecializationTranslation.'.$cnt.'.id', array('type'=>'hidden'));
		echo $this->Form->input('SpecializationTranslation.'.$cnt.'.lang', array('type'=>'hidden'));
		echo $this->Form->input('SpecializationTranslation.'.$cnt.'.specialization_id', array('type'=>'hidden'));
		echo $this->Form->input('SpecializationTranslation.'.$cnt.'.name', array('label'=>'specialization translation ('.$language.')' ));
	}
	echo $this->Form->end('Edit Specialization');

	?>
	<!-- Add The Sidebar-->
	<?php echo $this->element('SidebarMenu', array("actionSelected" => $this->action, "controllerUsed" => $this->params['controller']));?>
</div>	