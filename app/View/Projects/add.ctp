<div class='col-sm-12 col-md-10 col-md-offset-1'>
	<!--Form to create a new project -->
	<h1>Add a new Project</h1>

	<?php 
	echo $this->Form->create('Project',array(
		'inputDefaults' => array(
			'div' 		=> 'form-group',
			'label' 	=> array('class' => 'col col-md-2 control-label'),
			'wrapInput' => 'col col-md-10',
			'class' 	=> 'form-control'),
		'class' 		=> 'form-horizontal'));

	echo ('<div class="panel panel-success"> <div class="panel-heading">General Informations</div><div class="panel-body">');

	echo $this->Form->input('project_name', array(
		'placeholder' 	=> 'ex: Grande Dixence'
		));

	echo $this->Form->input('client_name',array(
		'placeholder' 	=> 'ex: Forces Motrices du Valais'
		));
	echo $this->Form->input('dates',array(
		'placeholder' 	=> 'ex: 2002-2006'
		));
	
	echo $this->Form->input('stucky_ref_number',array(
		'placeholder' 	=> 'ex: 003452'
		));
	foreach ($LanguageList as $cnt=>$lang){
		echo $this->Form->input('GeneralCharacteristic.'.$cnt.'.description',array(////////////////////////// noooooon en plusieurs langues!!!!!!!!!!!!!!!!!!!!!!
			'label'			=> 'General Characteristics of the project('.$lang.')',
			'placeholder' 	=> '200 MW, Weight dam, .... bla bla'
			));
		echo $this->Form->hidden('GeneralCharacteristic.'. $cnt .'.lang', array('value'=>$lang));
		echo $this->Form->input ('GeneralCharacteristic.'. $cnt .'.id', array('type'=>'hidden'));
		echo $this->Form->input ('GeneralCharacteristic.'. $cnt .'.person_id', array('type'=>'hidden'));
	}
	echo ('</div></div>');
	

	//------------------------------------------Location ------------------------------------------------
	echo ('<div class="panel panel-success"> <div class="panel-heading">Location</div><div class="panel-body">');
	echo $this->Form->input('Country', array(
		'label'			=>'Countries',
		'options'		=> $countries
		));
	echo $this->Form->input('location',array(
		'placeholder' 	=> 'ex: Valais, val d\'Hérens'
		));

	echo ('</div></div>');

///////////////////////------------------------- Submit -------------------------///////////////////////
	?>
	<div class="form-group">
		<div class="col col-md-9 col-md-offset-3">
			<?php echo $this->Form->submit('Add Project', array(
				'div' => false,
				'class' => 'btn btn-lg btn-success'
				));
				?>
			</div>
		</div>
		<?php
		echo $this->Form->end();
		?>

		<?php echo $this->element('SidebarMenu', array("actionSelected" => 'add', "controllerUsed" => $this->params['controller']));?>
	</div>