<div class="slider">
	<?php foreach ($slider as $key_slider => $per_slider): ?>
		<div class="slide-1">
			<img src="<?php echo base_url('assets/img/slider/'.$per_slider['slider_image']) ?>">
			<div class="slider-text">
				<h3>Sale <?php echo $per_slider['slider_sale'] ?>% off</h3>
				<h2><?php echo $per_slider['slider_name'] ?></h2>
				<a href="product3.html">Shop Now</a>
			</div>
		</div>	
	<?php endforeach ?>
</div>

<div class="new-product-section">
	<div class="product-section-heading">
		<h2>Tranding Products <img src="<?php echo base_url('assets/img/icons/increase.png') ?>"></h2>
		<h3>Most selling product for the month</h3>
	</div>
	<div class="product-content">
		<?php foreach ($home as $key_home => $per_home): ?>
			<div class="product">
				<a href="<?php echo base_url('product/detail/'.$per_home['product_id']) ?>">
					<img src="<?php echo base_url('assets/img/product/'.$per_home['product_image']) ?>">
				</a>
				<div class="product-detail">
					<h3>
						<?php if ($per_home['product_gender'] != ''): ?>
							<?php echo $per_home['product_gender'] ?> / 
						<?php endif ?>
						<?php echo $per_home['category_name'] ?>
					</h3>
					<a class="product-name" href="<?php echo base_url('product/detail/'.$per_home['product_id']) ?>">
						<?php echo $per_home['product_name'] ?>
					</a>
					<a class="add-to-cart" href="<?php echo base_url('cart/add/'.$per_home['product_id']) ?>">Add to Cart</a>
					<p>Rp. <?php echo number_format($per_home['product_price'], 0, ',', '.') ?>,-</p>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>

<div class="collection">
	<div class="men-collection">
		<h2>Men's Collection</h2>
	</div>
	<div class="women-collection">
		<h2>Women's Collection</h2>
	</div>
</div>

<div class="new-product-section">
	<div class="product-section-heading">
		<h2>Recommend Products <img src="<?php echo base_url('assets/img/icons/good_quality.png') ?>"></h2>
		<h3>OUR BEST PRODUCTS RECOMMENDED FOR YOU</h3>
	</div>
	<div class="product-content">
		<?php foreach ($recommend as $key_recommend => $per_recommend): ?>
			<div class="product">
				<a href="<?php echo base_url('product/detail/'.$per_recommend['product_id']) ?>">
					<img src="<?php echo base_url('assets/img/product/'.$per_recommend['product_image']) ?>">
				</a>
				<div class="product-detail">
					<h3>
						<?php if ($per_recommend['product_gender'] != ''): ?>
							<?php echo $per_recommend['product_gender'] ?> / 
						<?php endif ?>
						<?php echo $per_recommend['category_name'] ?>
					</h3>
					<a class="product-name" href="<?php echo base_url('product/detail/'.$per_recommend['product_id']) ?>">
						<?php echo $per_recommend['product_name'] ?>
					</a>
					<a class="add-to-cart" href="<?php echo base_url('cart/add/'.$per_recommend['product_id']) ?>">Add to Cart</a>
					<p>Rp. <?php echo number_format($per_recommend['product_price'], 0, ',', '.') ?>,-</p>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>