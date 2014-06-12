
<div>

	<div class ='row'>
		<div class='col-md-3'>
			<h1><?php echo $project['Project']['project_name'];?> </h1>
		</div>
		<div class='col-md-2'>
			<h5>Stucky Ref: <?php echo $project['Project']['stucky_ref_number'];?></h5>
		</div>
		<div class='col-md-3'>
			<h3>View this Project in: 
				<?php foreach($LanguageList as $lang )
				echo $this->Html->link ( $lang , array('controller' => 'Projects', 'action' => 'view', $project['Project']['id'], $lang), array('class'=>'label label-default')).' ';	
				?>
			</h3>
		</div>
	</div>
	
	<div class ='row'>
		<div class='col-md-8'>
			<div class='panel panel-info'>
				<div class='panel-heading'><h5 class='panel-title'> Client Name</h5></div>
				<div class='panel-body'>
					<?php 
					echo $project['Project']['client_name'];
					?>
				</div>
			</div>
		</div>
	</div>
	<div class ='row'>
		<div class='col-md-8'>
			<div class='panel panel-info'>
				<div class='panel-heading'><h5 class='panel-title'> Location </h5></div>
				<div class='panel-body'>
					<?php 
					$counter=0;
					echo'<b>';
					foreach ($countryList as $countrytrad){
						$counter++;
						echo $countrytrad .($counter == count($countrytrad)? ', ':'<br>');
					}
					echo'</b>';
					echo $project['Project']['location'];
					?>
				</div>
			</div>
		</div>
	</div>

	<div class ='row'>
		<div class='col-md-8'>
			<div class='panel panel-info'>
				<div class='panel-heading'><h5 class='panel-title'> Client informations</h5></div>
				<div class='panel-body'>
					<?php echo $project['Project']['client_name'];?>	
				</div>
			</div>
		</div>
	</div>
	<div class ='row'>
		<div class='col-md-8'>
			<div class='panel panel-info'>
				<div class='panel-heading'><h5 class='panel-title'> General Characteristics</h5></div>
				<div class='panel-body'>
					<?php echo $genCharTranslation;?>	
				</div>
			</div>
		</div>
	</div>



	<!-- sidebar -->
	<?php echo $this->element('SidebarMenu', array("actionSelected" => 'index', "controllerUsed" => $this->params['controller']));?>
</div>
