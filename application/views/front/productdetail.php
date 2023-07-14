<div class="breadcrumb">
	<ul>
		<li><a href="<?php echo base_url('') ?>">Home</a></li>
		<li> / </li>
		<li><a href="<?php echo base_url('catalog') ?>">Catalog</a></li>
		<li> / </li>
		<li>Product</li>
	</ul>
</div>

<div class="single-product">
	<div class="images-section">
		<div class="larg-img">
			<img src="<?php echo base_url('assets/img/product/'.$product['product_image']) ?>">
		</div>
	</div>

	<div class="product-detail">
		<div class="product-name">
			<h2><?php echo $product['product_name'] ?></h2>
		</div>
		<div class="product-price">
			<h3>Rp. <?php echo number_format($product['product_price'], 0, ',', '.') ?>,-</h3>
		</div>
		<hr>
		<div class="product-description">
			<p><?php echo $product['product_overview'] ?></p>
		</div>
		<hr>
		<div class="product-cart">
			<form id="cart-form" method="POST">
				<div class="form-group">
					<input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
					<input type="number" class="cart-number" name="cart_qty" value="1" min="1" max="<?php echo $product['product_stock'] ?>">
					<input type="submit" value="Add To Cart">
				</div>
			</form>
			<form id="wishlist-form">
				<div class="form-group">
					<input type="checkbox" class="wishlist" name="wishlist"> Add To Wishlist
				</div>
			</form>
		</div>
		<hr>
		<div class="product-meta">
			<p><b>Category: </b> <?php echo $product['category_name'] ?></p>
			<p><b>Share This Product: </b> Facebook, Twitter, Instagram, Tiktok</p>
		</div>
	</div>
</div>

<hr>

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