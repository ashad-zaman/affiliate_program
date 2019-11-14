<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/admin/css/icons/icomoon/styles.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/admin/css/bootstrap.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/admin/css/core.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/admin/css/components.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/admin/css/colors.css')?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/loaders/pace.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/admin/js/core/libraries/jquery.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/admin/js/core/libraries/bootstrap.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/loaders/blockui.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/ui/nicescroll.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/ui/drilldown.js')?>"></script>
	<!-- /core JS files -->

	

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/visualization/d3/d3.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/visualization/d3/d3_tooltip.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/forms/styling/switchery.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/forms/styling/uniform.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/forms/selects/bootstrap_multiselect.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/ui/moment/moment.min.js')?>"></script>
	
	<!-- /theme JS files -->

	<script type="text/javascript" src="<?=base_url('assets/admin/js/core/app.js');?>"></script>
	<script type="text/javascript" src="<?php //base_url('assets/admin/js/pages/dashboard.js');?>"></script>
	

</head>

<body>
<?php
	$user_details 	= $this->session->userdata('userDetails');
	$fullname 		= "";
	if( !empty($user_details) ):
		$fullname = $user_details['login_info']->f_name;
	endif;
?>	
<!-- Main navbar -->
<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="javascript:void(0)"><img src="<?=base_url('assets/admin/images/logo_light1.png')?>" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			
			<ul class="nav navbar-nav navbar-right">

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?=base_url('assets/images/placeholder.jpg')?>" alt="">
						<span><?=ucwords($fullname);?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="javascript:void(0)"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="javascript:void(0)"><i class="icon-coins"></i> Change password</a></li>
						<li class="divider"></li>
						<li><a href="<?=base_url('logout');?>"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>

	<!-- /main navbar -->
	<!-- Second navbar -->
	<div class="navbar navbar-default" id="navbar-second">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second-toggle">
			<ul class="nav navbar-nav">

				<li class="<?=$this->uri->segment(1) == "dashboard" ? 'active' : "" ?>">
					<a href="<?=base_url('dashboard')?>"><i class="icon-display4 position-left"></i> Dashboard</a>
				</li>

				<li class="dropdown">

					<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-store2 position-left"></i> Store <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">
						<li><a href="<?=base_url('collect-product')?>"><i class="icon-user-plus"></i> Collect Product</a></li>
						<li><a href="<?=base_url('product-list')?>"><i class="icon-users4"></i> Product List</a></li>
					</ul>
				</li>

				<li class="dropdown <?=$this->uri->segment(1) == "add-nav-menu" ? 'active' : "" ?>">

					<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-gear position-left"></i> Setting <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">
						<li><a href="<?=base_url('add-nav-menu')?>"><i class="icon-address-book2"></i> Add Nav catagory</a></li>
						<li><a href="<?=base_url('banner-manager')?>"><i class="icon-address-book2"></i> Banner</a></li>
						<li><a href="<?=base_url('menu-settings')?>"><i class="icon-address-book2"></i> Menu Settings</a></li>
						
					</ul>
				</li>
				
			</ul>

		</div>
	</div>
	<!-- /second navbar -->

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">