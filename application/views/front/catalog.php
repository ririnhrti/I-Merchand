<div class="breadcrumb">
	<ul>
		<li><a href="<?php echo base_url('home') ?>">Home</a></li>
		<li> / </li>
		<li>Shop</li>
	</ul>
</div>

<div class="new-product-section shop">
	<div class="sidebar">
		<div class="sidebar-widget">
			<h3>Category</h3>
			<ul>
				<?php foreach ($category as $key_category => $per_category): ?>
					<li>
						<a href="<?php echo base_url('category/detail/'.$per_category['category_id']) ?>">
							<?php echo $per_category['category_name'] ?>
						</a>
					</li>
				<?php endforeach ?>
			</ul>
		</div>
		<div class="sidebar-widget">
			<h3>Range Filter</h3>
			<p>
			  <label for="amount"></label>
			  <input type="text" id="amount" readonly style="border:0; color:#800000;  margin-bottom: 5px;">
			</p>
			<div id="slider-range"></div>
		</div>
	</div>
	<div class="product-content">
		<?php foreach ($product as $key_product => $per_product): ?>
			<div class="product">
				<a href="<?php echo base_url('product/detail/'.$per_product['product_id']) ?>">
					<img src="<?php echo base_url('assets/img/product/'.$per_product['product_image']) ?>">
				</a>
				<div class="product-detail">
					<h3>
						<?php if ($per_product['product_gender'] != ''): ?>
							<?php echo $per_product['product_gender'] ?> / 
						<?php endif ?>
						<?php echo $per_product['category_name'] ?>
					</h3>
					<a class="product-name" href="<?php echo base_url('product/detail/'.$per_product['product_id']) ?>">
						<?php echo $per_product['product_name'] ?>
					</a>
					<a class="add-to-cart" href="<?php echo base_url('cart/add/'.$per_product['product_id']) ?>">Add to Cart</a>
					<p>Rp. <?php echo number_format($per_product['product_price'], 0, ',', '.') ?>,-</p>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>