<!-- -People view (CV presentation) - -->


<div>
	<div class ='row'>
		<div class='col-md-4'>
			<h1><?php echo $person['Person']['name'] . ' ' . $person['Person']['firstname']; ?> </h1>
		</div>
		<div class='col-md-4'>
			<h3>View this CV in: 
				<?php foreach($LanguageList as $lang )
				echo $this->Html->link ( $lang , array('controller' => 'People', 'action' => 'view', $person['Person']['id'], $lang), array('class'=>'label label-default')).' ';	
				?>
			</h3>
		</div>
	</div>
	<div class ='row'>
		<div class='col-md-4'>
			<div class='panel panel-info'>
				<div class='panel-heading'><h5 class='panel-title'> Date of birth</h5></div>
				<div class='panel-body'>
					<?php echo $person['Person']['birth_date']?> 			
				</div>
			</div>
		</div>
		<div class='col-md-4'>
			<div class='panel panel-info'>
				<div class='panel-heading'><h5 class='panel-title'> Highest Degree</h5></div>
				<div class='panel-body'>
					<?php echo $person['Degree']['degree']?> 			
				</div>
			</div>
		</div>
	</div>
	<div class ='row'>
		<div class='col-md-8'>
			<div class='panel panel-info'>
				<div class='panel-heading'><h5 class='panel-title'> Education</h5></div>
				<div class='panel-body'>
					<?php
					echo '<table class="table table-hover table-striped">';
					echo'<th class="col-md-3"> School </th>
					<th class="col-md-3"> Country </th>
					<th class="col-md-2"> Years </th>
					<th class="col-md-3"> Original Title </th>
					<th class="col-md-1"> Equivalent Title </th>';
					foreach($educationList as $educ){
						echo $this->Html->tableCells(array(array(
							$educ['school_name'],
							$educ['country'],
							$educ['begin_date'].'-'.$educ['end_date'],
							$educ['original_title'],
							$educ['degree']
							//$educ['orignial_title'].' ('.$educ['degree'].')'
							)
						));
					}
					echo'</table>';

					?>
				</div>
			</div>

		</div>
	</div>
	<div class ='row'>
		<div class='col-md-8'>
			<div class='panel panel-info'>
				<div class='panel-heading'><h5 class='panel-title'> Key competences</h5></div>
				<div class='panel-body'>
					<?php echo $key_competences ?> 			
				</div>
			</div>

		</div>
	</div>
	<div class ='row'>
		<div class='col-md-8'>
			<div class='panel panel-info'>
				<div class='panel-heading'><h5 class='panel-title'> Specializations </h5></div>
				<div class='panel-body'>
					<ul>
						<?php 
						foreach($specializationList as $spec)
							echo '<li>'. $spec . '</li>'
						?> 	
					</ul>		
				</div>
			</div>
		</div>
	</div>

	<div class ='row'>
		<div class='col-md-8'>
			<div class='panel panel-info'>
				<div class='panel-heading'><h5 class='panel-title'> Known Languages </h5></div>
				<div class='panel-body'>
					<?php 
					echo '<table class="table table-hover table-striped">';
					echo'<th> Language </th><th> Read Level </th><th> Speak Level </th><th> Write Level </th>';
					foreach($knownLanguageList as $knownLanguage){
						echo $this->Html->tableCells(array(array(
							$knownLanguage['language'],
							$knownLanguage['read'].'/5',
							$knownLanguage['speak'].'/5',
							$knownLanguage['write'].'/5')
						));
					}
					echo '</table>';
					?>	
				</div>
			</div>
		</div>
	</div>

	<div class ='row'>
		<div class='col-md-8'>
			<div class='panel panel-info'>
				<div class='panel-heading'><h5 class='panel-title'> Nationality </h5></div>
				<div class='panel-body'>
					<ul>
						<?php 
						foreach($nationalityList as $natio)
							echo '<li>'. $natio . '</li>'
						?> 	
					</ul>		
				</div>
			</div>
		</div>
	</div>
	<div class ='row'>
		<div class='col-md-8'>
			<div class='panel panel-info'>
				<div class='panel-heading'><h5 class='panel-title'> Working Experience</h5></div>
				<div class='panel-body'>
					<?php
					echo '<table class="table table-hover table-striped">';
					echo'<th class="col-md-3"> Company </th>
					<th class="col-md-2"> From </th>
					<th class="col-md-2"> To </th>
					<th class="col-md-5"> Positions </th>';
					foreach($ProfexpeList as $proExp){
						echo $this->Html->tableCells(array(array(
							$proExp['Profexpe']['employer'],
							$proExp['Profexpe']['begin_date'],
							$proExp['Profexpe']['end_date'],
							$proExp['ProfexpeTranslation']['positions_dates']
							)
						));
					}
					echo'</table>';

					?>
				</div>
			</div>

		</div>
	</div>
	<div class ='row'>
		<div class='col-md-8'>
			<div class='panel panel-info'>
				<div class='panel-heading'><h5 class='panel-title'> Worked In </h5></div>
				<div class='panel-body'>
					<ul>
						<?php 
						foreach($countryList as $country)
							echo '<li>'. $country . '</li>';
						?> 	
					</ul>		
				</div>
			</div>
		</div>
	</div>
	<div class ='row'>
		<div class='col-md-8'>
			<div class='panel panel-info'>
				<div class='panel-heading'><h5 class='panel-title'> Affiliations </h5></div>
				<div class='panel-body'>
					<ul>
						<?php 
						foreach($person['Affiliation'] as $cnt => $Affiliation)
							echo '<li>'. $Affiliation['affiliation'] . '</li>';
						?> 	
					</ul>		
				</div>
			</div>
		</div>
	</div>
	<div class ='row'>
		<div class='col-md-8'>
			<div class='panel panel-info'>
				<div class='panel-heading'><h5 class='panel-title'> Publications </h5></div>
				<div class='panel-body'>
					<ul>
						<?php 
						foreach($person['Publication'] as $cnt => $Publication)
							echo '<li><b>'. $Publication['title'] .'</b> '.$Publication['text'].'</li>';
						?> 	
					</ul>		
				</div>
			</div>
		</div>
	</div>
	<!-- sidebar -->
	<?php echo $this->element('SidebarMenu', array("actionSelected" => 'index', "controllerUsed" => $this->params['controller']));?>
</div>








