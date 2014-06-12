<!-- -People index - -->

<div>
	<table class="table table-hover table-striped">

		<?php
		// Table headers  
		$paginator = $this->Paginator;
		$sortkey = $this->Paginator->sortKey();
		$type = $this->Paginator->sortDir() === 'asc' ? 'up' : 'down';
		$fields = array(
			'Project.project_name' => 'Project Name',
			'Project.client_name'=>'Client Name'
			);
		?>
		<th><?php echo '#' ?></th>
		<?php
		foreach ($fields as $field => $title){
			if ($field == $sortkey)
				$icon = "<i class='fa fa-arrow-" . $type . "'></i>";
			else 
				$icon = "";
			$FullTitle = "$title $icon"

			?>
			<th><?php echo $paginator->sort($field, $FullTitle, array('escape' => false)) ?></th>
			<?php
		} ?>
		<th><?php echo 'Countries'?></th>
		<th><?php echo 'Action' ?></th>
		<?php
		
		// table Content order must match titles!!!!!!!!!!!!!!!!!!
		$projectCounter =0;
		foreach ($ListOfProjects as $project)
		{	
			$countryCounter=1;
			$countrytrad = '';
			foreach ($project['Country'] as $cnt => $country){
				$countrytrad = $countrytrad.$country['name'];
				$countrytrad = $countrytrad.($countryCounter < count($project['Country'])? ', ':'');
				$countryCounter++;
			}
			$projectCounter++;
			echo $this->Html->tableCells(array(array(
				$projectCounter,
				$project['Project']['project_name'],
				$project['Project']['client_name'],
				$countrytrad,
				$this->Html->link ( 'View This Project' , array('controller' => 'Projects', 'action' => 'view', $project['Project']['id'])).'<br>'.
				$this->Html->link ( 'Edit This Project' , array('controller' => 'Projects', 'action' => 'edit', $project['Project']['id'])).'<br>'.
				
				$this->Form->postLink('Delete this Project',array('controller' => 'Projects', 'action' => 'delete', $project['Project']['id']),array('confirm' => 'Are you sure to delete?'))
				)
			));
		}

		?>
	</table>

	<!--Sidebar menu -->
	<?php echo $this->element('SidebarMenu', array("actionSelected" => $this->action, "controllerUsed" => $this->params['controller']));?>
</div>
