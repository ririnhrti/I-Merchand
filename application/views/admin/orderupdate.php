<h3>Order Detail #<?php echo ucfirst($detail['checkout_number']) ?> | <?php echo ucfirst($detail['checkout_status']) ?></h3>
<div class="content-data">
	<div class="content-detail">
		<h4>Order Items</h4>
		<table>
			<thead>
				<tr>
					<th>No.</th>
					<th>Product</th>
					<th>Price</th>
					<th>Qty</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($detail['product'] as $key => $value): ?>
					<tr>
						<td><?php echo $key+1 ?></td>
						<td><?php echo $value['product_name'] ?></td>
						<td>Rp. <?php echo number_format($value['product_price'], 0, ',', '.') ?>,-</td>
						<td><?php echo $value['checkout_product_qty'] ?></td>
						<td>Rp. <?php echo number_format($value['product_price']*$value['checkout_product_qty'], 0, ',', '.') ?>,-</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<div class="content-detail">
		<h4>Order Summary</h4>
		<table>
			<tbody>
				<tr>
					<td>Amount</td>
					<td>Rp. <?php echo number_format($detail['checkout_total'], 0, ',', '.') ?>,-</td>
				</tr>
				<tr>
					<td>Delivery Charges</td>
					<td>Rp. <?php echo number_format($detail['checkout_delivery'], 0, ',', '.') ?>,-</td>
				</tr>
				<tr>
					<td>Discount</td>
					<td>Rp. <?php echo number_format($detail['checkout_discount'], 0, ',', '.') ?>,-</td>
				</tr>
				<tr>
					<td>Total Amount</td>
					<td>
						Rp. <?php echo number_format($detail['checkout_total'] + $detail['checkout_delivery'] - $detail['checkout_discount'], 0, ',', '.') ?>,-
					</td>
				</tr>
				<tr>
					<td>Payment</td>
					<td><?php echo $detail['checkout_payment'] == 'cod' ? 'Cash on Delivery' : 'Bank Transfer' ?></td>
				</tr>
				<tr>
					<td>File</td>
					<td><a target="_blank" href="<?php echo base_url('assets/img/payment/'.$detail['checkout_file']) ?>">Go to File Payment</a></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="content-data">
	<div class="content-detail">
		<h4>Shipping Detail</h4>
		<table>
			<tbody>
				<tr>
					<td>First Name <br> <?php echo $detail['destination_first_name'] ?></td>
					<td>Last Name <br> <?php echo $detail['destination_last_name'] ?></td>
				</tr>
				<tr>
					<td>Company Name</td>
					<td><?php echo $detail['destination_company_name'] ?></td>
				</tr>
				<tr>
					<td>Country <br> <?php echo $detail['destination_country'] ?></td>
					<td>City <br> <?php echo $detail['destination_city'] ?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><?php echo $detail['destination_address'] ?></td>
				</tr>
				<tr>
					<td>Telp <br> <?php echo $detail['destination_telp'] ?></td>
					<td>Mobile <br> <?php echo $detail['destination_mobile'] ?></td>
				</tr>
				<tr>
					<td>Order Note</td>
					<td><?php echo $detail['destination_notes'] ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="content-detail">
		<h4>Order Status</h4>
		<form method="post">
			<div class="form-group">
				<label>Status</label>
				<select name="checkout_status">
					<option>---Select a Status---</option>
					<option value="pending" <?php echo $detail['checkout_status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
					<option value="checking" <?php echo $detail['checkout_status'] == 'checking' ? 'selected' : '' ?>>Checking</option>
					<option value="packing" <?php echo $detail['checkout_status'] == 'packing' ? 'selected' : '' ?>>Packing</option>
					<option value="sending" <?php echo $detail['checkout_status'] == 'sending' ? 'selected' : '' ?>>Sending</option>
					<option value="finished" <?php echo $detail['checkout_status'] == 'finished' ? 'selected' : '' ?>>Finished</option>
					<option value="canceled" <?php echo $detail['checkout_status'] == 'canceled' ? 'selected' : '' ?>>Canceled</option>
				</select>
			</div>
			<div class="form-group">
				<label></label>
				<input type="submit" value="Update Status">
			</div>
		</form>
	</div>
</div>