
<div class="col-sm-3 col-sm-offset-9 col-md-2 col-md-offset-10 sidebar">
	<ul class="nav nav-sidebar">
		<?php
		//People fields
		$fields = array(
			'index'=> 'CV',
			'add' => 'Add a CV',
			'search'=>'**Search CVs**'
			);
		foreach ($fields as $actionName => $title){
			if ($actionName == $actionSelected && $controllerUsed == 'People')
				$activity  = "<li class='active'>" . $this->Html->link( $title , array('controller' => 'People', 'action' => $actionName)) ."";
			else 
				$activity = "<li>" . $this->Html->link( $title , array('controller' => 'People', 'action' => $actionName)) ."";
			echo $activity;
		}
		?>

	</ul>
	<ul class="nav nav-sidebar">
		<?php
		//Projects fields
		$fields = array(
			'index'=> 'Projects',
			'add' => 'Add a Project',
			'search'=>'**Search Projects**'
			);
		foreach ($fields as $actionName => $title){
			if ($actionName == $actionSelected && $controllerUsed == 'Projects')
				$activity  = "<li class='active'>" . $this->Html->link( $title , array('controller' => 'Projects', 'action' => $actionName)) ."";
			else 
				$activity = "<li>" . $this->Html->link( $title , array('controller' => 'Projects', 'action' => $actionName)) ."";
			echo $activity;
		}
		?>

	</ul>
	
	<ul class="nav nav-sidebar">
		<?php

		//'Admin' Fields 
		$fields = array(
			'index' => 'Specializations',
			'add'=> 'Add a Specialization',

			);
		foreach ($fields as $actionName => $title){
			if ($actionName == $actionSelected&& $controllerUsed == 'Specializations')
				$activity  = "<li class='active'>" . $this->Html->link( $title , array('controller' => 'Specializations', 'action' => $actionName)) ."";
			else 
				$activity = "<li>" . $this->Html->link( $title , array('controller' => 'Specializations', 'action' => $actionName)) ."";
			echo $activity;
		}
		?>

	</ul>
</div>
