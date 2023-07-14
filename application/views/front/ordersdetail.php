<div class="breadcrumb">
	<ul>
		<li><a href="<?php echo base_url('') ?>">Home</a></li>
		<li> / </li>
		<li><a href="<?php echo base_url('account') ?>">Account</a></li>
		<li> / </li>
		<li><a href="<?php echo base_url('orders') ?>">Orders</a></li>
		<li> / </li>
		<li>Detail #<?php echo $orders['checkout_number'] ?></li>
	</ul>
</div>

<h2>Orders Detail | <?php echo ucfirst($orders['checkout_status']) ?></h2>
<div class="cart-page">
	<div class="cart-items">
		<table>
			<thead>
				<tr>
					<th colspan="3">Orders Items</th>
				</tr>
			</thead>
			<tbody>
				<?php $product	= 0; ?>
				<?php $item		= 0; ?>
				<?php $total	= 0; ?>
				<?php foreach ($orders['product'] as $key => $value): ?>
					<tr>
						<td style="width: 20%;"><img src="<?php echo base_url('assets/img/product/'.$value['product_image']) ?>"></td>
						<td style="width: 60%;">
							<h2><?php echo $value['product_name'] ?></h2>
							<h3>Price: Rp. <?php echo number_format($value['product_price'], 0, ',', '.') ?>,-</h3>
							<br>
							<h3>Qty: <?php echo $value['checkout_product_qty'] ?></h3>
							<h3>Total: Rp. <?php echo number_format($value['product_price']*$value['checkout_product_qty'], 0, ',', '.') ?>,-</h3>
						</td>
					</tr>
					<?php $product	+= 1 ?>
					<?php $item		+= $value['checkout_product_qty'] ?>
					<?php $total	+= $value['product_price']*$value['checkout_product_qty'] ?>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<div class="order-summary">
		<div class="checkout-total">
			<?php $total	= 0; ?>
			<?php $delivery	= 15000 ?>
			<?php foreach ($orders['product'] as $key => $value): ?>
				<?php $total += $value['product_price']*$value['checkout_product_qty'] ?>
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
				<li>Payment: <span><?php echo $orders['checkout_payment'] == 'cod' ? 'Cash on Delivery' : 'Bank Transfer' ?></span></li>
				<hr>
				<li>
					<?php if ($orders['checkout_status'] == 'pending'): ?>
						<form class="checkout-form" method="post" enctype="multipart/form-data">
							<input type="hidden" name="checkout_id" value="<?php echo $orders['checkout_id'] ?>">
							<div class="form-group">
								<label>Upload Payment</label>
								<input type="file" id="checkout_file" name="checkout_file">
							</div>
							<input type="submit" class="buynow" value="Upload">
						</form>
					<?php else: ?>
						File: <span><a target="_blank" href="<?php echo base_url('assets/img/payment/'.$orders['checkout_file']) ?>">Go to File Payment</a></span>
					<?php endif ?>					
				</li>
				<hr>
			</ul>
		</div>
	</div>
</div>

<form class="checkout-form" method="post">
	<div class="checkout-page">
		<div class="billing-detail">
			<h4>Shipping Detail</h4>
			<div class="form-inline">
				<div class="form-group">
					<label>First Name</label>
					<input type="text" id="fname" name="destination_first_name" value="<?php echo $orders['destination_first_name'] ?>">
				</div>
				<div class="form-group">
					<label>Last Name</label>
					<input type="text" id="lname" name="destination_last_name" value="<?php echo $orders['destination_last_name'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label>Company Name (Optional)</label>
				<input type="text" id="cname" name="destination_company_name" value="<?php echo $orders['destination_company_name'] ?>">
			</div>
			<div class="form-inline">
				<div class="form-group">
					<label>Country</label>
					<select id="country" name="destination_country">
						<option>---Select a Country---</option>
						<option value="Indonesia" <?php echo $orders['destination_country'] == 'Indonesia' ? 'selected' : '' ?>>Indonesia</option>
					</select>
				</div>
				<div class="form-group">
					<label>City</label>
					<select id="cityy" name="destination_city">
						<option>---Select a City---</option>
						<option value="Yogyakarta" <?php echo $orders['destination_city'] == 'Yogyakarta' ? 'selected' : '' ?>>Yogyakarta</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label>Address</label>
				<textarea style="resize:none" id="address" name="destination_address" rows="3"><?php echo $orders['destination_address'] ?></textarea>
			</div>
			<h4>Contact Detail</h4>
			<div class="form-inline">
				<div class="form-group">
					<label>Tel</label>
					<input type="text" id="telp" name="destination_telp" value="<?php echo $orders['destination_telp'] ?>">
				</div>
				<div class="form-group">
					<label>Mobile</label>
					<input type="text" id="mobile" name="destination_mobile" value="<?php echo $orders['destination_mobile'] ?>">
				</div>
			</div>
			<h4>Additional Information (Optional)</h4>
			<div class="form-group">
				<label>Order Note</label>
				<textarea style="resize:none" id="address" name="destination_notes" rows="3"></textarea>
			</div>
		</div>
	</div>
</form>