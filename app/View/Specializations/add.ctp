<!-- -Specialization add - -->

<div>
	<!--Form to create a new specialization -->
<h1>Add a Specialization</h1>


	<?php 


	echo $this->Form->create('Specialization',
		array(
			'inputDefaults' => array(
				'div' => 'form-group',
				'label' => array('class' => 'col col-md-3 control-label'),
				'wrapInput' => 'col col-md-9',
				'class' => 'form-control'),
				'class' => 'well form-horizontal'));

	echo $this->Form->input('Specialization.name', array('label'=>'Default Specialization Name'));
	echo $this->Form->input('Specialization.id', array('type'=>'hidden'));
	foreach ($LanguageList as $cnt => $language){
		echo $this->Form->input('SpecializationTranslation.'. $cnt .'.name', array('label'=> 'Specialization name ('.$language.')'));
		echo $this->Form->hidden('SpecializationTranslation.'. $cnt .'.lang', array('value'=>$language));
	}
	echo $this->Form->end('Add Specialization');
		
	?>

		<!-- Add The Sidebar-->
		<?php echo $this->element('SidebarMenu', array("actionSelected" => $this->action, "controllerUsed" => $this->params['controller']));?>
	</div>	