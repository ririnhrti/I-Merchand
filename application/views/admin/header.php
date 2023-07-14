<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMINISTRATOR | I-Merchand Informatics Shop</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/admin-style.css') ?>" />
</head>
<body>
	<header>
		<div class="container">
			<div class="brand">
				<div class="logo">
					<a href="index.html">
						<img src="<?php echo base_url('assets/img/icons/online_shopping.png') ?>">
						<div class="logo-text">
							<p class="big-logo">Ecommerce</p>
							<p class="small-logo">online shop</p>
						</div>
					</a>
				</div> <!-- logo -->
				<div class="shop-icon">
					<div class="dropdown">
						<img src="<?php echo base_url('assets/img/icons/account.png') ?>">
						<div class="dropdown-menu">
							<ul>
								<li><a href="<?php echo base_url('admin/account') ?>">My Account</a></li>
								<li><a href="<?php echo base_url('admin/logout') ?>">Logout</a></li>
							</ul>
						</div>
					</div>
				</div> <!-- shop icons -->
			</div> <!-- brand -->
		</div> <!-- container -->
	</header>

	<main>
		
		<div class="main-content">
			<div class="sidebar">
				<h3>Menu</h3>
				<ul>
					<li>
						<a class="<?php echo $this->uri->segment(2) == 'home' ? 'active' : '' ?>" href="<?php echo base_url('admin/home') ?>">
							Home
						</a>
					</li>
					<li>
						<a class="<?php echo $this->uri->segment(2) == 'order' ? 'active' : '' ?>" href="<?php echo base_url('admin/order') ?>">
							Orders
						</a>
					</li>
					<li>
						<a class="<?php echo $this->uri->segment(2) == 'category' ? 'active' : '' ?>" href="<?php echo base_url('admin/category') ?>">
							Category
						</a>
					</li>
					<li>
						<a class="<?php echo $this->uri->segment(2) == 'product' ? 'active' : '' ?>" href="<?php echo base_url('admin/product') ?>">
							Product
						</a>
					</li>
					<li>
						<a class="<?php echo $this->uri->segment(2) == 'user' ? 'active' : '' ?>" href="<?php echo base_url('admin/user') ?>">
							Users
						</a>
					</li>
				</ul>
			</div>
			<div class="content">