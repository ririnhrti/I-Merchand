<div class="breadcrumb">
	<ul>
		<li><a href="<?php echo base_url('') ?>">Home</a></li>
		<li> / </li>
		<li><a href="<?php echo base_url('catalog') ?>">Catalog</a></li>
		<li> / </li>
		<li><a href="<?php echo base_url('cart') ?>">Cart</a></li>
		<li> / </li>
		<li>Checkout</li>
	</ul>
</div>

<h2>Billing Detail</h2>
<form class="checkout-form" method="post">
	<div class="checkout-page">
		<div class="billing-detail">
			<h4>Shipping Detail</h4>
			<div class="form-inline">
				<div class="form-group">
					<label>First Name</label>
					<input type="text" id="fname" name="destination_first_name" value="<?php echo $account['member_first_name'] ?>">
				</div>
				<div class="form-group">
					<label>Last Name</label>
					<input type="text" id="lname" name="destination_last_name" value="<?php echo $account['member_last_name'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label>Company Name (Optional)</label>
				<input type="text" id="cname" name="destination_company_name" value="<?php echo $account['member_company_name'] ?>">
			</div>
			<div class="form-inline">
				<div class="form-group">
					<label>Country</label>
					<select id="country" name="destination_country">
						<option>---Select a Country---</option>
						<option value="Indonesia" <?php echo $account['member_country'] == 'Indonesia' ? 'selected' : '' ?>>Indonesia</option>
					</select>
				</div>
				<div class="form-group">
					<label>City</label>
					<select id="cityy" name="destination_city">
						<option>---Select a City---</option>
						<option value="Yogyakarta" <?php echo $account['member_city'] == 'Yogyakarta' ? 'selected' : '' ?>>Yogyakarta</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label>Address</label>
				<textarea style="resize:none" id="address" name="destination_address" rows="3"><?php echo $account['member_address'] ?></textarea>
			</div>
			<h4>Contact Detail</h4>
			<div class="form-inline">
				<div class="form-group">
					<label>Tel</label>
					<input type="text" id="telp" name="destination_telp" value="<?php echo $account['member_telp'] ?>">
				</div>
				<div class="form-group">
					<label>Mobile</label>
					<input type="text" id="mobile" name="destination_mobile" value="<?php echo $account['member_mobile'] ?>">
				</div>
			</div>
			<h4>Additional Information (Optional)</h4>
			<div class="form-group">
				<label>Order Note</label>
				<textarea style="resize:none" id="address" name="destination_notes" rows="3"></textarea>
			</div>
		</div>
		<div class="order-summary">
			<div class="checkout-total">
				<?php $total	= 0; ?>
				<?php $delivery	= 15000 ?>
				<?php foreach ($cart as $key => $value): ?>
					<?php $total += $value['product_price']*$value['cart_qty'] ?>
				<?php endforeach ?>
				<?php $discount	= $total * 0.1 ?>
				<h3>Order Summary</h3>
				<ul>
					<li>Cart Amount: <span>Rp. <?php echo number_format($total, 0, ',', '.') ?>,-</span></li>
					<li>Delivery Charges: <span>Rp. <?php echo number_format($delivery, 0, ',', '.') ?>,-</span></li>
					<li>Less: Discount @ 10%: <span>Rp. <?php echo number_format($discount, 0, ',', '.') ?>,-</span></li>
					<hr>
					<li>Total Amount: <span>Rp. <?php echo number_format($total + $delivery - $discount, 0, ',', '.') ?>,-</span></li>
					<hr>
					<li><input type="radio" name="checkout_payment" value="transfer" checked> Bank Transferred</li>
					<hr>
				</ul>
				<input type="hidden" name="checkout_total" value="<?php echo $total ?>">
				<input type="hidden" name="checkout_delivery" value="<?php echo $delivery ?>">
				<input type="hidden" name="checkout_discount" value="<?php echo $discount ?>">
				<input type="submit" class="buynow" value="Buy Now">
			</div>
		</div>
	</div>
</form>