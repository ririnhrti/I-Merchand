<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>I-Merchand Informatics Shop</title>

	<!-- Style Sheet -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css') ?>" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!-- Javascript -->	
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
	<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
	<header>
		<div class="container">
			<div class="brand">
				<div class="logo">
					<a href="index.html">
						<img src="<?php echo base_url('assets/img/icons/online_shopping.png') ?>">
						<div class="logo-text">
							<p class="big-logo">I-Merchand</p>
							<p class="small-logo">Informatics shop</p>
						</div>
					</a>
				</div> <!-- logo -->
				<div class="shop-icon">
					<div class="dropdown">
						<img src="<?php echo base_url('assets/img/icons/account.png') ?>">
						<div class="dropdown-menu">
							<ul>
								<?php if (isLogged()): ?>
									<li><a href="<?php echo base_url('account') ?>">My Account</a></li>
									<li><a href="<?php echo base_url('orders') ?>">My Orders</a></li>
									<li><a href="<?php echo base_url('logout') ?>">Logout</a></li>
								<?php else: ?>
									<li><a href="<?php echo base_url('login') ?>">Login</a></li>
									<li><a href="<?php echo base_url('register') ?>">Register</a></li>
								<?php endif ?>
							</ul>
						</div>
					</div>
					<div class="dropdown">
						<?php if (isLogged()): ?>
							<a href="<?php echo base_url('wishlist') ?>">
								<img src="<?php echo base_url('assets/img/icons/heart.png') ?>">
							</a>
						<?php else: ?>
							<a href="<?php echo base_url('login') ?>">
								<img src="<?php echo base_url('assets/img/icons/heart.png') ?>">
							</a>
						<?php endif ?>
						<!-- <div class="dropdown-menu wishlist-item">
							<table border="1">
								<thead>
									<tr>
										<th>Image</th>
										<th>Product Name</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><img src="<?php echo base_url('assets/img/product/img1.png') ?>"></td>
										<td>product name</td>
									</tr>
									<tr>
										<td><img src="<?php echo base_url('assets/img/product/img2.jpg') ?>"></td>
										<td>product name</td>
									</tr>
								</tbody>
							</table>
						</div> -->
					</div>
					<div class="dropdown">
						<?php if (isLogged()): ?>
							<a href="<?php echo base_url('cart') ?>">
								<img src="<?php echo base_url('assets/img/icons/shopping_cart.png') ?>">
							</a>
						<?php else: ?>
							<a href="<?php echo base_url('login') ?>">
								<img src="<?php echo base_url('assets/img/icons/shopping_cart.png') ?>">
							</a>
						<?php endif ?>
						<!-- <div class="dropdown-menu cart-item">
							<table border="1">
								<thead>
									<tr>
										<th>Image</th>
										<th>Product Name</th>
										<th class="center">Price</th>
										<th class="center">Qty.</th>
										<th class="center">Amount</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><img src="<?php echo base_url('assets/img/product/img1.png') ?>"></td>
										<td>product name</td>
										<td class="center">1200</td>
										<td class="center">2</td>
										<td class="center">2400</td>
									</tr>
									<tr>
										<td><img src="<?php echo base_url('assets/img/product/img2.jpg') ?>"></td>
										<td>product name</td>
										<td class="center">1500</td>
										<td class="center">2</td>
										<td class="center">3000</td>
									</tr>
								</tbody>
							</table>
						</div> -->
					</div>
				</div> <!-- shop icons -->
			</div> <!-- brand -->

			<div class="menu-bar">
				<div class="menu">
					<ul>
						<li><a href="<?php echo base_url('home') ?>">Home</a></li>
						<li><a href="<?php echo base_url('catalog') ?>">Catalog</a></li>
						<li><a href="<?php echo base_url('about') ?>">About</a></li>
						<li><a href="<?php echo base_url('contact') ?>">Contact</a></li>
					</ul>
				</div>
				<div class="search-bar">
					<form>
						<div class="form-group">
							<input type="text" class="form-control" name="search" placeholder="Search">
							<img src="<?php echo base_url('assets/img/icons/search.png') ?>">
						</div>
					</form>
				</div>
			</div> <!-- menu -->
		</div> <!-- container -->
	</header>
	<div class="container">
		<main>
			
		