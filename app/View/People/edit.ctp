
<div class='col-sm-12 col-md-10 col-md-offset-1'>
	<!--Form to edit a person -->
	<h1>Edit a CV</h1>
	
	<?php
	echo $this->Form->create('Person',array(
		'inputDefaults' => array(
			'div' => 'form-group',
			'label' => array('class' => 'col col-md-3 control-label'),
			'wrapInput' => 'col col-md-9',
			'class' => 'form-control'),
		'class' => 'form-horizontal'));
	
	echo $this->Form->input('Person.id',array('type'=>'hidden'));
	
	////////////////////---------------------- General Informations ----------------------////////////////////
	echo ('<div class="panel panel-success"> <div class="panel-heading">General Informations</div><div class="panel-body">');

	echo $this->Form->input('Person.name');
	
	echo $this->Form->input('Person.firstname');
	
	echo $this->Form->input('Person.birth_date',array(
		'minYear'=> 1930,
		'maxYear'=> 2100,
		'beforeInput' => '<div class="form-inline">',
		'afterInput' => '</div>'
		));

	echo $this->Form->input('Nationality', array(
		'options' => $natio,
		'label' =>'Nationalities'
		));

	echo ('</div></div>');

///////////////////////------------------------- Education -------------------------///////////////////////
	echo ('<div class="panel panel-success"> <div class="panel-heading">Education</div><div class="panel-body">');
	
	echo $this->Form->input('degree_id', array(
		'options' => $degrees,
		'label' =>'Highest Degree'
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
	$numberOfDefaultEducations=0;
	foreach ($person['Education'] as $cnt => $Education){
		$numberOfDefaultEducations++;
		echo'<tr id="EducationRow'.$cnt.'" >';
		echo $this->Form->input ('Education.'.$cnt.'.id', array('type'=>'hidden'));
		echo $this->Form->input ('Education.'.$cnt.'.person_id', array('type'=>'hidden'));
		echo '<td>'.$this->Form->input('Education.'.$cnt.'.school_name', array(
			'label'=>false,
			'wrapInput' => 'col col-md-12',
			'placeholder' => 'ex: Ecole Polytechnique Fédérale de Lausanne (EPFL)'
			)).'</td>';	
		echo '<td>'.$this->Form->input('Education.'.$cnt.'.country_id', array(
			'label'=>false,
			'wrapInput' => 'col col-md-12',
			'options'=> $countries
			)).'</td>';	
		echo '<td>'.'<div class ="form-group" >'.'<div class = "col col-md-12">'.
		$this->Form->year('Education.'.$cnt.'.begin_date',1930,2100, array(
			'label'=>false,
			'class'=>'form-control',
			'name' => 'data[Education]['.$cnt.'][begin_date]',
			'empty' => "Year"
			)).'</div>'.'</div>'.'</td>';
		echo '<td>'.'<div class ="form-group" >'.'<div class = "col col-md-12">'.
		$this->Form->year('Education.'.$cnt.'.end_date',1930,2100, array(
			'label'=>false,
			'class'=>'form-control',
			'name' => 'data[Education]['.$cnt.'][end_date]',
			'empty' => "Year"
			)).'</div>'.'</div>'.'</td>';
		echo '<td>'.$this->Form->input('Education.'.$cnt.'.original_title', array(
			'label'=>false,
			'wrapInput' => 'col col-md-12',
			'placeholder' => 'ex: ingenieur civil dipl. EPFL'
			)).'</td>';
		echo '<td>'.$this->Form->input('Education.'.$cnt.'.degree_id', array(
			'label'=>false,
			'wrapInput' => 'col col-md-12',
			'options'=> $degrees
			)).'</td>';
		echo '<td><button id="Education'.$cnt.'AddButton" type="button" class="btn btn-success btn-xs" onclick="addEducation()"><span class="glyphicon glyphicon-plus"></span></button> ';
		if ($cnt == 0)
			echo'<button id="Education'.$cnt.'RemoveButton" type="button" class="btn btn-danger btn-xs hidden" onclick="removeEducation('.$cnt.')"><span class="glyphicon glyphicon-remove"></span></button></td>';
		else{
			echo'<button id="Education'.$cnt.'RemoveButton" type="button" class="btn btn-danger btn-xs" onclick="removeEducation('.$cnt.')"><span class="glyphicon glyphicon-remove"></span></button></td>';
		}

		echo'</tr>';
	}
	echo'</table>';
	echo ('</div></div></div>');

	///////////////////////------------------------- Known Languages -------------------------///////////////////////
	echo '<div class="panel panel-success"> <div class="panel-heading">Known Languages</div><div class="panel-body">';
	echo '<div class="col-sm-12 col-md-12 col-md-offset-0">';
	echo '<table class="table table-striped table-dynamic">';
	echo'<th class="col-md-2"> Language </th><th class="col-md-3"> Read Level </th><th class="col-md-3"> Write Level </th><th class="col-md-3"> Speak Level </th><th class="col-md-2"> add/remove </th>';
	$numberOfDefaultLanguages=0;
	foreach ($person['PersonKnowsLanguage'] as $cnt => $knownLanguage){
		$numberOfDefaultLanguages++;
		echo'<tr id="LanguageRow'.$cnt.'" >';
		echo $this->Form->input ('PersonKnowsLanguage.'.$cnt.'.id', array('type'=>'hidden'));
		echo $this->Form->input ('PersonKnowsLanguage.'.$cnt.'.person_id', array('type'=>'hidden'));
		echo '<td>'.$this->Form->input('PersonKnowsLanguage.'.$cnt.'.language_id', array(
			'label'=>false,
			'options'=> $languages,
			'wrapInput' => 'col col-md-12'
			)).'</td>';

		echo '<td>'.$this->Form->input('PersonKnowsLanguage.'.$cnt.'.read_level', array(
			'label' => false,
			'options' => $levels,
			'wrapInput' => 'col col-md-12'
			)).'</td>';

		echo '<td>'.$this->Form->input('PersonKnowsLanguage.'.$cnt.'.write_level', array(
			'label' => false,
			'options' => $levels,
			'wrapInput' => 'col col-md-12'
			)).'</td>';

		echo '<td>'.$this->Form->input('PersonKnowsLanguage.'.$cnt.'.speak_level', array(
			'label' => false,
			'options' => $levels,
			'wrapInput' => 'col col-md-12'
			)).'</td>';

		echo '<td>
		<button id="PersonKnowsLanguage'.$cnt.'AddButton" type="button" class="btn btn-success btn-xs" onclick="addLanguage()"><span class="glyphicon glyphicon-plus"></span></button> ';
		if($cnt ==0)
			echo'<button id="PersonKnowsLanguage'.$cnt.'RemoveButton" type="button" class="btn btn-danger btn-xs hidden" onclick="removeLanguage('.$cnt.')"><span class="glyphicon glyphicon-remove"></span></button></td>';
		else {
			echo'<button id="PersonKnowsLanguage'.$cnt.'RemoveButton" type="button" class="btn btn-danger btn-xs" onclick="removeLanguage('.$cnt.')"><span class="glyphicon glyphicon-remove"></span></button></td>';
		}
		echo'</tr>';
	}

	echo '</table>';
	echo '</div></div></div>';

///////////////////////------------------------- Working Experience -------------------------///////////////////////

	echo ('<div class="panel panel-success"> <div class="panel-heading"> Countries visited</div><div class="panel-body">');
	echo $this->Form->input('WorkedIn', array(
		'options' => $countries,
		'label' =>'Countries in which the person worked'
		));
	echo ('</div></div>');

	echo ('<div class="panel panel-success"> <div class="panel-heading">Professional Experience</div><div class="panel-body">');
	echo '<div class="col-sm-12 col-md-12 col-md-offset-0">';
	echo '<table class="table table-striped table-dynamic" id="ProfexpeTable">';
	echo'<th class="col-md-3"> Society </th><th class="col-md-2">Begin Date</th><th class = "col-md-1">Not Finished</th><th class="col-md-2">End Date</th><th class="col-md-3"> Positions </th><th class="col-md-1"> add/remove </th>';

	$numberOfDefaultProfexpes=0;
	foreach ($person['Profexpe'] as $XPcnt => $proExp){
		$numberOfDefaultProfexpes++;
		foreach($LanguageList as $Langcnt => $lang){
			echo'<tr id="ProfexpeRow'.$XPcnt.$Langcnt.'" >';
			if ($Langcnt == 0){
				echo $this->Form->input ('Profexpe.'.$XPcnt.'.id',array('type'=>'hidden'));
				echo $this->Form->input ('Profexpe.'.$XPcnt.'.person_id',array('type'=>'hidden'));
				echo '<td rowspan="2">'.
				$this->Form->input('Profexpe.'.$XPcnt.'.employer',array(
					'placeholder'=>'ex: Smith & Smith S.A.',
					'label'=>false,
					'class'=>'form-control')
				).'</td>';
				echo '<td rowspan="2">'.
				$this->Form->input ('Profexpe.'.$XPcnt.'.begin_date', array(
					'minYear'=> 1930,
					'maxYear'=> 2100, 
					'label'=>false,
					'beforeInput' => '<div class="form-inline">',
					'afterInput' => '</div>')
				).'</td>';
				echo '<td rowspan="2">'.
				$this->Form->input('Profexpe.'.$XPcnt.'.ongoing', array(
					'beforeInput' => '<div class="form-inline">',
					'afterInput' => '</div>',
					'label'=> false)
				).'</td>';
				echo '<td rowspan="2">'.
				$this->Form->input ('Profexpe.'.$XPcnt.'.end_date', array(
					'minYear'=> 1930,
					'maxYear'=> 2100,
					'label'=>false, 
					'beforeInput' => '<div class="form-inline">',
					'afterInput' => '</div>')
				).'</td>';
				echo '<td>'.
				$this->Form->input('Profexpe.'.$XPcnt.'.ProfexpeTranslation.'.$Langcnt.'.positions_dates',array(
					'placeholder'=>'ex: Director (2003-2004), Assistant (2000-2001)',
					'label'=>'('.$lang.')',
					'class'=>'form-control')
				).'</td>';
				echo $this->Form->input('Profexpe.'.$XPcnt.'.ProfexpeTranslation.'.$Langcnt.'.id', array('type'=>'hidden'));
				echo $this->Form->input('Profexpe.'.$XPcnt.'.ProfexpeTranslation.'.$Langcnt.'.profexpe_id', array('type'=>'hidden'));
				echo $this->Form->input('Profexpe.'.$XPcnt.'.ProfexpeTranslation.'.$Langcnt.'.lang', array('type'=>'hidden', 'value'=>$lang));

				echo '<td rowspan="2">
				<button id="Profexpe'.$XPcnt.'AddButton" type="button" class="btn btn-success btn-xs" onclick="addProfexpe('.count($LanguageList).')"><span class="glyphicon glyphicon-plus"></span></button>';
				if ($XPcnt==0)
					echo'<button id="Profexpe'.$XPcnt.'RemoveButton" type="button" class="btn btn-danger btn-xs hidden" onclick="removeProfexpe('.$XPcnt.','.count($LanguageList).')"><span class="glyphicon glyphicon-remove"></span></button>';
				else
					echo'<button id="Profexpe'.$XPcnt.'RemoveButton" type="button" class="btn btn-danger btn-xs" onclick="removeProfexpe('.$XPcnt.','.count($LanguageList).')"><span class="glyphicon glyphicon-remove"></span></button>';

				echo'</td>';



			}
			else {echo '<td>'.
				$this->Form->input('Profexpe.'.$XPcnt.'.ProfexpeTranslation.'.$Langcnt.'.positions_dates',array(
					'placeholder'=>'ex: Position('.$lang.') (2001-2003), Assistant (2000-2001)',
					'label'=>'('.$lang.')',
					'class'=>'form-control')
			).'</td>';
			echo $this->Form->input('Profexpe.'.$XPcnt.'.ProfexpeTranslation.'.$Langcnt.'.id', array('type'=>'hidden'));
			echo $this->Form->input('Profexpe.'.$XPcnt.'.ProfexpeTranslation.'.$Langcnt.'.profexpe_id', array('type'=>'hidden'));
			echo $this->Form->input('Profexpe.'.$XPcnt.'.ProfexpeTranslation.'.$Langcnt.'.lang', array('type'=>'hidden', 'value'=>$lang));


		}
		echo '</tr>';
	}
}
echo '</table>';
echo '</div>';
echo ('</div></div>');


echo ('<div class="panel panel-success"> <div class="panel-heading">Key Competences</div><div class="panel-body">');
foreach ( $person['KeyCompetence'] as $cnt => $Keycomp){
	$language = $Keycomp['lang'];
	echo $this->Form->input('KeyCompetence.'.$cnt.'.id', array('type'=>'hidden'));
	echo $this->Form->input('KeyCompetence.'.$cnt.'.lang', array('type'=>'hidden'));
	echo $this->Form->input('KeyCompetence.'.$cnt.'.key_competences_id', array('type'=>'hidden'));
	echo $this->Form->input('KeyCompetence.'.$cnt.'.key_competences', array('label'=>'Key Competences translation ('.$language.')' ));
}
echo ('</div></div>');
//////////////////////---------------------- Affiliations----------------------/////////////////////
echo ('<div class="panel panel-success"> <div class="panel-heading"> Affiliations </div><div class="panel-body">');
echo '<div class="col-sm-12 col-md-12 col-md-offset-0">';
echo '<table class="table table-striped table-dynamic">';
echo'<th class="col-md-5"> Affiliation to society/group </th><th class="col-md-2"> add/remove </th>';
$numberOfDefaultAffiliations=0;
foreach ($person['Affiliation'] as $cnt => $affiliation){
	$numberOfDefaultAffiliations++;
	echo'<tr id="AffiliationRow'.$cnt.'" >';
	echo $this->form->input ('Affiliation.'.$cnt.'.id',array('type'=>'hidden'));
	echo $this->form->input ('Affiliation.'.$cnt.'.person_id',array('type'=>'hidden'));
	echo '<td>'.$this->Form->input('Affiliation.'.$cnt.'.affiliation', array(
		'label' => false,
		'placeholder' => 'ex: International Geologic Society'
		)).'</td>';
	echo '<td><button id="Affiliation'.$cnt.'AddButton" type="button" class="btn btn-success btn-xs" onclick="addAffiliation()"><span class="glyphicon glyphicon-plus"></span></button> ';
	if($cnt == 0)
		echo'<button id="Affiliation'.$cnt.'RemoveButton" type="button" class="btn btn-danger btn-xs hidden" onclick="removeAffiliation('.$cnt.')"><span class="glyphicon glyphicon-remove"></span></button>';
	else
		echo'<button id="Affiliation'.$cnt.'RemoveButton" type="button" class="btn btn-danger btn-xs" onclick="removeAffiliation('.$cnt.')"><span class="glyphicon glyphicon-remove"></span></button>';

	echo'</td>';
	echo '</tr>';

}
echo'</table>'; 
echo('</div></div>');

///////////////////////------------------------- Submit Form -------------------------///////////////////////
?>
<div class="form-group">
	<div class="col col-md-9 col-md-offset-5">
		<?php echo $this->Form->submit('Edit User', array(
			'div' => false,
			'class' => 'btn btn-lg btn-success'
			)); ?>
		</div>
	</div>
	<?php
	echo $this->Form->end();
	?>


	<!-- add the sidebar-->
	<?php echo $this->element('SidebarMenu', array("actionSelected" => $this->action, "controllerUsed" => $this->params['controller']));?>

	<!-- javascript for dynamic language forms-->

	<?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') ?>
	<?php echo $this->Html->script('DynamicLanguageForm');?>
	<?php echo $this->Html->script('DynamicEducationForm');?>
	<?php echo $this->Html->script('DynamicProfexpeForm');?>
	<?php echo $this->Html->script('DynamicAffiliationForm');?>
	<script type='text/javascript'>
		$( document ).ready(function() {
			var numberOfDefaultLanguages = '<?php echo ($numberOfDefaultLanguages); ?>';
			setDefaultNumberOfLanguages(numberOfDefaultLanguages-1);
			var numberOfDefaultEducations = '<?php echo ($numberOfDefaultEducations); ?>';
			setDefaultNumberOfEducations(numberOfDefaultEducations-1);
			var numberOfDefaultProfexpes = '<?php echo $numberOfDefaultProfexpes; ?>';
			setDefaultNumberOfProfexpes(numberOfDefaultProfexpes)
			for(var x=0; x<ProfexpeRows;x++){
				$('#Profexpe'+x+'Ongoing').each(function(index){
					this.setAttribute('onclick', 'toggleEndDateField('+x+')');
					toggleEndDateField(x);
				});
			}
			var numberOfDefaultAffiliations = '<?php echo $numberOfDefaultAffiliations; ?>';
			setDefaultNumberOfAffiliations(numberOfDefaultAffiliations-1);
		});
	</script>

</div>