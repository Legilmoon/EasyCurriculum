<div>
<h1>Specializations</h1>
	<table class="table table-hover table-striped">



<!-- Table headers --> 
			<th><?php echo '#' ?></th>
			<th><?php echo 'Specialization' ?></th>
			<th><?php echo 'Action' ?></th>
			<?php
// table Content
		$cvCounter =0;
		foreach ($ListOfSpecs as $spec)
		{
			$cvCounter++;
			echo $this->Html->tableCells(array(array(
				$cvCounter,//$pers['Person']['id'],
				$spec['Specialization']['name'],
				$this->Html->link ( 'Edit this Specialization' , array('controller' => 'Specializations', 'action' => 'edit', $spec['Specialization']['id'])).'<br>'.
				$this->Form->postLink('Delete this Specialization',array('controller' => 'Specializations', 'action' => 'delete', $spec['Specialization']['id']),array('confirm' => 'Are you sure to delete?'))
				)
			));
		}

		?>
	</table>

	<!--Sidebar menu -->
	<?php echo $this->element('SidebarMenu', array("actionSelected" => $this->action, "controllerUsed" => $this->params['controller']));?>
</div>
