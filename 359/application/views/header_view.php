<!DOCTYPE html>
<html>
<head>
	<title>359</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="author" content="" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="Robots" content="index,follow" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/themes/smoothness/jquery-ui.css" />
	<script type="text/javascript" src="<?php echo(JS.'/tinymce/tinymce.min.js'); ?>"></script>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link href="<?php echo(CSS.'bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo(CSS.'font-awesome.css'); ?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo(CSS.'bootstrap-select.css'); ?>" />
     	<script src="<?php echo(JS.'jquery.cookie.js'); ?>"></script>
	<script src="<?php echo(JS.'bootstrap.js'); ?>"></script>
        <script src="<?php echo(JS.'bootstrap-select.js');  ?>"></script>
        <script src="<?php echo(JS.'jquery-ui.js'); ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo(CSS.'style.css'); ?>" media="screen" />

	<!--[if lt IE 9]>
			  	<script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			 	<script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
			 	<script type='text/javascript'  src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
				<link href="<?php echo(CSS.'fkinIE.css'); ?>" rel="stylesheet">
	<![endif]-->


</head>
<body style="">
<div class="container">
<div class="row" style="height: 53px;">
		<nav id="navbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
   		<div class="container">
			 <div class="row">
				<div class="col-md-12" >
							<div class="col-md-3">
								<div class="navbar-header">
								    <a style="font-size: 30px;" class="navbar-brand" href="<?php echo URL; ?>">359degrees</a>
								</div>

							  </div>
							<div class="col-md-6">
							  <ul class="nav navbar-nav">

								 <li class="active"><a onclick="activtab(this)" id="about" href="#home">HOME</a></li>
								 <li><a onclick="activtab(this)" id="athis" href="#work">WORK</a></li>
								 <li><a onclick="activtab(this)" id="gallery" href="#whoweare">WHO WE ARE</a></li>
								 <li><a onclick="activtab(this)" id="projects" href="#mcontact">CONTACT</a></li>

							</div>
							 <div class="col-md-3">
							     <?php
							     if ($this->model->islogged()==1)
								     { ?>
									      <button type="button"  class="btn navbar-btn btn-default" onclick="javascript:window.location = '<?php echo URL.'index.php/main/logout'; ?>';">logout</button>
							     <?php 	} else {
								       ?>
									<span id="button" style="margin-top: 33px;" class="glyphicon glyphicon-chevron-down slideani"></span>
									<?php  } ?>
							 </div>
			</div>	   </div>
		</div>
              </nav>

</div>
<div class="row" style="display: none; margin-top: 10px; height: 45px;"   id="loginslide">
						  <form role="form" action="<?php echo URL.'index.php/login/verifylogin'; ?>" method="POST">
							<div class="col-md-4 col-md-offset-2">

							  <div class="input-group">
							    <span class="input-group-addon glyphicon glyphicon-user" style="top:0px;">

							    </span>
							    <input type="text" name="username" class="form-control">
							  </div><!-- /input-group -->
							</div><!-- /.col-lg-6 -->
							<div class="col-lg-4">
							  <div class="input-group">
								<input type="text" name="password" class="form-control">
								<span class="input-group-addon" style="padding: 0px;">
								   <button type="submit" name="navigate"   class="btn btn-default btn-md " style="line-height: 1.4"><span  class="glyphicon glyphicon-share-alt" style="top:0px;"></span></button>
								</span>
							  </div>
							</div>
							<div class="col-lg-2">
							  <div class="input-group">


							  </div>
							</div>
						 </form>
</div><!-- /.row -->
