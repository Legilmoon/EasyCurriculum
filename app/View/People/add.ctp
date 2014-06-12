	<div class='col-sm-12 col-md-10 col-md-offset-1'>
		<!--Form to create a new person -->
		<h1>Add a new Employee</h1><!--two comments-->

		<?php 
		echo $this->Form->create('Person',array(
			'inputDefaults' => array(
				'div' 		=> 'form-group',
				'label' 	=> array('class' => 'col col-md-2 control-label'),
				'wrapInput' => 'col col-md-10',
				'class' 	=> 'form-control'),
			'class' 		=> 'form-horizontal'));

////////////////////---------------------- General Informations ----------------------////////////////////

		echo ('<div class="panel panel-success"> <div class="panel-heading">General Informations about the project</div><div class="panel-body">');

		echo $this->Form->input('name', array(
			'placeholder' => 'ex: Smith'
			));

		echo $this->Form->input('firstname',array(
			'placeholder' => 'ex: John'

			));

		echo $this->Form->input('birth_date', array(
			'minYear'=> 1930,
			'maxYear'=> 2100, 
			'beforeInput' => '<div class="form-inline">',
			'afterInput' => '</div>'
			)); 

		echo $this->Form->input('Nationality', array(
			'label'=>'Nationalities',
			'options'=> $nationalities
			));

		echo ('</div></div>');


///////////////////////------------------------- Education -------------------------///////////////////////
		echo ('<div class="panel panel-success"> <div class="panel-heading">Education</div><div class="panel-body">');
	//highest education level
		echo $this->Form->input('degree_id', array(
			'options' => $degrees,
			'label' =>'Highest Education Level'
			));
		echo $this->Form->input('Specialization', array(
			'label' =>'Specializations',// ici le nom du champ!!
			'type' => 'select',
			'multiple' => 'checkbox'));
	//detailed Education (table)
		echo '<div class="col-sm-12 col-md-12 col-md-offset-0">';

		echo '<table class="table table-striped table-dynamic">';
		echo'<th class="col-md-2"> School </th>
		<th class="col-md-2"> Country </th>
		<th class="col-md-2"> Begin date </th>
		<th class="col-md-2"> End date </th>
		<th class="col-md-3"> Original Title </th>
		<th class="col-md-1"> Equivalent Title </th>
		<th class="col-md-1"> add/remove </th>';

		echo'<tr id="EducationRow0">';

		echo $this->Form->input ('Education.0.id', array('type'=>'hidden'));
		echo $this->Form->input ('Education.0.person_id', array('type'=>'hidden'));

		echo '<td>'.$this->Form->input('Education.0.school_name', array(
			'label'=>false,
			'wrapInput' => 'col col-md-12',
			'placeholder' => 'ex: Ecole Polytechnique Fédérale de Lausanne (EPFL)'
			)).'</td>';
		echo '<td>'.$this->Form->input('Education.0.country_id', array(
			'label'=>false,
			'wrapInput' => 'col col-md-12',
			'options'=> $countries
			)).'</td>';	
		echo '<td>'.'<div class ="form-group" >'.'<div class = "col col-md-12">'.
		$this->Form->year('Education.0.begin_date',1930,2100, array(
			'label'=>false,
			'class'=>'form-control',
			'name' => 'data[Education][0][begin_date]',
			'empty' => "Year"
			)).'</div>'.'</div>'.'</td>';
		echo '<td>'.'<div class ="form-group" >'.'<div class = "col col-md-12">'.
		$this->Form->year('Education.0.end_date',1930,2100, array(
			'label'=>false,
			'class'=>'form-control',
			'empty' => "Year",
			'name' => 'data[Education][0][end_date]'
			)).'</div>'.'</div>'.'</td>';
		echo '<td>'.$this->Form->input('Education.0.original_title', array(
			'label'=>false,
			'wrapInput' => 'col col-md-12',
			'placeholder' => 'ex: ingenieur civil dipl. EPFL'
			)).'</td>';


		echo '<td>'.$this->Form->input('Education.0.degree_id', array(
			'label'=>false,
			'wrapInput' => 'col col-md-12',
			'options'=> $degrees
			)).'</td>';

		echo '<td>
		<button id="Education0AddButton" type="button" class="btn btn-success btn-xs" onclick="addEducation()"><span class="glyphicon glyphicon-plus"></span></button>
		<button id="Education0RemoveButton" type="button" class="btn btn-danger btn-xs hidden" onclick="removeEducation(0)"><span class="glyphicon glyphicon-remove"></span></button>
	</td></tr>';


	echo '</table>';
	echo ('</div></div></div>');
///////////////////////------------------------- Known Languages -------------------------///////////////////////

	echo ('<div class="panel panel-success"> <div class="panel-heading">Known Languages</div><div class="panel-body">');
	echo '<div class="col-sm-12 col-md-12 col-md-offset-0">';
	echo '<table class="table table-striped table-dynamic">';
	echo'<th class="col-md-2"> Language </th><th class="col-md-3"> Read Level </th><th class="col-md-3"> Write Level </th><th class="col-md-3"> Speak Level </th><th class="col-md-2"> add/remove </th>';

	echo'<tr id="LanguageRow0" >';

	echo $this->Form->input ('PersonKnowsLanguage.0.id', array('type'=>'hidden'));
	echo $this->Form->input ('PersonKnowsLanguage.0.person_id', array('type'=>'hidden'));

	echo '<td>'.$this->Form->input('PersonKnowsLanguage.0.language_id', array(
		'label'=>false,
		'options'=> $languages,
		'wrapInput' => 'col col-md-12'
		)).'</td>';

	echo '<td>'.$this->Form->input('PersonKnowsLanguage.0.read_level', array(
		'label' => false,
		'options' => $levels,
		'wrapInput' => 'col col-md-12'
		)).'</td>';

	echo '<td>'.$this->Form->input('PersonKnowsLanguage.0.write_level', array(
		'label' => false,
		'options' => $levels,
		'wrapInput' => 'col col-md-12'
		)).'</td>';

	echo '<td>'.$this->Form->input('PersonKnowsLanguage.0.speak_level', array(
		'label' => false,
		'options' => $levels,
		'wrapInput' => 'col col-md-12'
		)).'</td>';

	echo '<td>
	<button id="PersonKnowsLanguage0AddButton" type="button" class="btn btn-success btn-xs" onclick="addLanguage()"><span class="glyphicon glyphicon-plus"></span></button>
	<button id="PersonKnowsLanguage0RemoveButton" type="button" class="btn btn-danger btn-xs hidden" onclick="removeLanguage(0)"><span class="glyphicon glyphicon-remove"></span></button>
</td>
</tr>';
echo '</table>';
echo ('</div></div></div>');	
///////////////////////------------------------- Working Experience -------------------------///////////////////////

echo ('<div class="panel panel-success"> <div class="panel-heading"> Countries visited</div><div class="panel-body">');
echo $this->Form->input('WorkedIn', array(
	'label'=>'Countries in which the person worked',
	'options'=> $countries
	));
echo ('</div></div>');

echo ('<div class="panel panel-success"> <div class="panel-heading">Professional Experience</div><div class="panel-body">');
echo '<div class="col-sm-12 col-md-12 col-md-offset-0">';
echo '<table class="table table-striped table-dynamic" id="ProfexpeTable">';
echo'<th class="col-md-3"> Society </th><th class="col-md-2">Begin Date</th><th class = "col-md-1">Not Finished</th><th class="col-md-2">End Date</th><th class="col-md-3"> Positions </th><th class="col-md-1"> add/remove </th>';

foreach($LanguageList as $cnt => $lang){
	echo'<tr id="ProfexpeRow0'.$cnt.'" >';
	if ($cnt == 0){
		echo $this->Form->input ('Profexpe.0.id',array('type'=>'hidden'));
		echo $this->Form->input ('Profexpe.0.person_id',array('type'=>'hidden'));
		echo '<td rowspan="2">'.
			$this->Form->input('Profexpe.0.employer',array(
				'placeholder'=>'ex: Smith & Smith S.A.',
				'label'=>false,
				'class'=>'form-control')
			).'</td>';
		echo '<td rowspan="2">'.
			$this->Form->input ('Profexpe.0.begin_date', array(
				'minYear'=> 1930,
				'maxYear'=> 2100, 
				'label'=>false,
				'beforeInput' => '<div class="form-inline">',
				'afterInput' => '</div>')
			).'</td>';
		echo '<td rowspan="2">'.
			$this->Form->input('Profexpe.0.ongoing', array(
				'beforeInput' => '<div class="form-inline">',
				'afterInput' => '</div>',
				'label'=> false)
			).'</td>';
		echo '<td rowspan="2">'.
			$this->Form->input ('Profexpe.0.end_date', array(
				'minYear'=> 1930,
				'maxYear'=> 2100,
				'label'=>false, 
				'beforeInput' => '<div class="form-inline">',
				'afterInput' => '</div>')
			).'</td>';
 		echo '<td>'.
 			$this->Form->input('Profexpe.0.ProfexpeTranslation.'.$cnt.'.positions_dates',array(
				'placeholder'=>'ex: Director (2003-2004), Assistant (2000-2001)',
				'label'=>'('.$lang.')',
				'class'=>'form-control')
			).'</td>';
		echo $this->Form->input('Profexpe.0.ProfexpeTranslation.'.$cnt.'.id', array('type'=>'hidden'));
		echo $this->Form->input('Profexpe.0.ProfexpeTranslation.'.$cnt.'.profexpe_id', array('type'=>'hidden'));
		echo $this->Form->input('Profexpe.0.ProfexpeTranslation.'.$cnt.'.lang', array('type'=>'hidden', 'value'=>$lang));

		echo '<td rowspan="2">
			<button id="Profexpe0AddButton" type="button" class="btn btn-success btn-xs" onclick="addProfexpe('.count($LanguageList).')"><span class="glyphicon glyphicon-plus"></span></button>
			<button id="Profexpe0RemoveButton" type="button" class="btn btn-danger btn-xs hidden" onclick="removeProfexpe(0)"><span class="glyphicon glyphicon-remove"></span></button>
		</td>';
	}
	else{
		echo '<td>'.
 			$this->Form->input('Profexpe.0.ProfexpeTranslation.'.$cnt.'.positions_dates',array(
				'placeholder'=>'ex: Position('.$lang.') (2001-2003), Assistant (2000-2001)',
				'label'=>'('.$lang.')',
				'class'=>'form-control')
			).'</td>';
			echo $this->Form->input('Profexpe.0.ProfexpeTranslation.'.$cnt.'.id', array('type'=>'hidden'));
		echo $this->Form->input('Profexpe.0.ProfexpeTranslation.'.$cnt.'.profexpe_id', array('type'=>'hidden'));
		echo $this->Form->input('Profexpe.0.ProfexpeTranslation.'.$cnt.'.lang', array('type'=>'hidden', 'value'=>$lang));
	}
	echo '</tr>';
}
echo '</table>';
echo '</div>';
echo ('</div></div>');




echo ('<div class="panel panel-success"> <div class="panel-heading">Key Competences</div><div class="panel-body">');
foreach($LanguageList as $cnt => $lang){
	echo $this->Form->input ('KeyCompetence.'. $cnt .'.key_competences', array('label'=> 'Key Competences ('.$lang.')'));
	echo $this->Form->hidden('KeyCompetence.'. $cnt .'.lang', array('value'=>$lang));
	echo $this->Form->input ('KeyCompetence.'. $cnt .'.id', array('type'=>'hidden'));
	echo $this->Form->input ('KeyCompetence.'. $cnt .'.person_id', array('type'=>'hidden'));
}
echo ('</div></div>');
	///////////////////////------------------------- Affiliations -------------------------///////////////////////
echo ('<div class="panel panel-success"> <div class="panel-heading"> Affiliations </div><div class="panel-body">');
echo '<div class="col-sm-12 col-md-12 col-md-offset-0">';
echo '<table class="table table-striped table-dynamic">';
echo'<th class="col-md-10"> Affiliation to society/group </th><th class="col-md-2"> add/remove </th>';

echo'<tr id="AffiliationRow0" >';
echo $this->form->input ('Affiliation.0.id',array('type'=>'hidden'));
echo $this->form->input ('Affiliation.0.person_id',array('type'=>'hidden'));
echo '<td>'.$this->Form->input('Affiliation.0.affiliation', array(
		'label' => false,
		'placeholder' => 'ex: International Geologic Society, National Scientific Congress'
		)).'</td>';
echo '<td><button id="Affiliation0AddButton" type="button" class="btn btn-success btn-xs" onclick="addAffiliation()"><span class="glyphicon glyphicon-plus"></span></button>
		<button id="Affiliation0RemoveButton" type="button" class="btn btn-danger btn-xs hidden" onclick="removeAffiliation(0)"><span class="glyphicon glyphicon-remove"></span></button>
		</td>';
echo '</tr>';
echo'</table>'; 
echo('</div></div>');


	///////////////////////------------------------- Publications -------------------------///////////////////////

echo ('<div class="panel panel-success"> <div class="panel-heading"> Publications </div><div class="panel-body">');
echo '<div class="col-sm-12 col-md-12 col-md-offset-0">';
echo '<table class="table table-striped table-dynamic">';
echo'<th class="col-md-5"> Publication Title </th><th class="col-md-5">  Other Informations / Reference </th><th class="col-md-2"> add/remove </th>';

echo'<tr id="PublicationRow0" >';
echo $this->form->input ('Publication.0.id',array('type'=>'hidden'));
echo $this->form->input ('Publication.0.person_id',array('type'=>'hidden'));
echo '<td>'.$this->Form->input('Publication.0.title', array(
		'label' => false,
		'placeholder' => 'ex: A study of chaos and vacuum'
		)).'</td>';
echo '<td>'.$this->Form->input('Publication.0.text', array(
		'label' => false,
		'placeholder' => 'ex: (2003), Johnsson et al, Journal of Natural Science doi:0999998739273'
		)).'</td>';

echo '<td><button id="Publication0AddButton" type="button" class="btn btn-success btn-xs" onclick="addPublication()"><span class="glyphicon glyphicon-plus"></span></button>
		<button id="Publication0RemoveButton" type="button" class="btn btn-danger btn-xs hidden" onclick="removePublication(0)"><span class="glyphicon glyphicon-remove"></span></button>
		</td>';
echo '</tr>';
echo'</table>'; 
echo('</div></div>');

	///////////////////////------------------------- Submit -------------------------///////////////////////
?>

<div class="form-group">
	<div class="col col-md-9 col-md-offset-3">
		<?php echo $this->Form->submit('Add User', array(
			'div' => false,
			'class' => 'btn btn-lg btn-success'
			));
			?>
		</div>
	</div>
	<?php
	echo $this->Form->end();
	?>
	<!-- Add The Sidebar-->
	<?php echo $this->element('SidebarMenu', array("actionSelected" => $this->action , "controllerUsed" => $this->params['controller']));?>

	<!-- Javascript element-->
	<?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') ?>
	<?php echo $this->Html->script('DynamicLanguageForm');?>
	<?php echo $this->Html->script('DynamicEducationForm');?>
	<?php echo $this->Html->script('DynamicProfexpeForm');?>
	<?php echo $this->Html->script('DynamicAffiliationForm');?>
	<?php echo $this->Html->script('DynamicPublicationForm');?>
	<script type='text/javascript'>
		$( document ).ready(function() {
			// initialize functions
			setDefaultNumberOfLanguages(<?php count($LanguageList)?>);	
			$('#Profexpe0Ongoing').each(function(index){
					this.setAttribute('onclick', 'toggleEndDateField(0)');
					toggleEndDateField(x);
				});		
		});

	</script>


</div>	