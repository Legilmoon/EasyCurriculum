<div class='col-sm-12 col-md-10 col-md-offset-1'>
	<!--Form to create a new person -->
	<h1>Selection Criteria</h1>

	<?php 
		echo $this->form->create('People',array('action'=>'search'));
		echo $this->form->input('WorldRegion', array(
			'label' =>'World Regions',// ici le nom du champ!!
			'type' => 'select',
			'options'=> $WorldRegionList,
			'multiple' => 'checkbox'));

		echo $this->form->end('search');


	?>

</div>