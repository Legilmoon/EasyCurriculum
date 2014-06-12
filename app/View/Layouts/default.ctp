
<!DOCTYPE html>


<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="../../assets/ico/favicon.ico">

	<title>Theme Template for Bootstrap</title>

	<!-- Bootstrap core CSS -->
	<?= $this->Html->css('bootstrap')?>
	<?= $this->Html->css('bootstrap-theme')?>
	<?= $this->Html->css('dashboard')?>
	<?= $this->Html->css("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css")?>
	<?= $this->fetch('css')?>

	<!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>



  <body>

  	<!-- Top Menu-->
  	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  		<div class="container-fluid">
  			<div class="navbar-header">
  				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
  					<span class="sr-only">Toggle navigation</span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  				</button>
  				<a class="navbar-brand" href="#">EasyCV</a>
  			</div>
  			<div class="navbar-collapse collapse">
  				<ul class="nav navbar-nav navbar-right">
  					<li><a href="#">Dashboard</a></li>
  					<li><a href="#">Settings</a></li>
  					<li><a href="#">Profile</a></li>
  					<li><a href="#">Help</a></li>
  				</ul>
  			</div>
  		</div>
  	</div>

  	<div id="debuggings">
  		<?= $this->fetch('debug');?>
  	</div>
  	<div class="container-fluid">
  		<div class="col-sm-9 col-md-10">
  			<div class="row">
  				<?php echo $this->Session->Flash();?>
  				<div id="content">

  					<?= $this->fetch('content');?>
  				</div>
  			</div>	
  		</div>
  	</div>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') ?>
    <?= $this->Html->script('bootstrap') ?>
    <?= $this->Html->script('DashboardControl') ?>
</body>
</html>
