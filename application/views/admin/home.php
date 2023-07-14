<h3>Dashboard</h3>
<div class="content-data">
	<div class="content-detail">
		<h4>Recent Orders</h4>
		<table>
			<thead>
				<tr>
					<th>Date</th>
					<th>Order Ref#</th>
					<th>User</th>
					<th>Amount</th>
					<th>Status</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($recent as $key => $value): ?>
					<tr>
						<td><?php echo date('Y-m-d', strtotime($value['checkout_datetime'])); ?></td>
						<td>#<?php echo $value['checkout_number'] ?></td>
						<td><?php echo $value['member_first_name'].' '.$value['member_last_name'] ?></td>
						<td>Rp. <?php echo number_format($value['checkout_total'] + $value['checkout_delivery'] - $value['checkout_discount'], 0, ',', '.') ?>,-</td>
						<td><?php echo ucfirst($value['checkout_status']) ?></td>
						<td>
							<a href="<?php echo base_url('admin/order/update/'.$value['checkout_id']) ?>">Update</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<div class="content-detail">
		<h4>Completed Orders</h4>
		<table>
			<thead>
				<tr>
					<th>Date</th>
					<th>Order Ref#</th>
					<th>User</th>
					<th>Amount</th>
					<th>Status</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($completed as $key => $value): ?>
					<tr>
						<td><?php echo date('Y-m-d', strtotime($value['checkout_datetime'])); ?></td>
						<td>#<?php echo $value['checkout_number'] ?></td>
						<td><?php echo $value['member_first_name'].' '.$value['member_last_name'] ?></td>
						<td>Rp. <?php echo number_format($value['checkout_total'] + $value['checkout_delivery'] - $value['checkout_discount'], 0, ',', '.') ?>,-</td>
						<td><?php echo ucfirst($value['checkout_status']) ?></td>
						<td>
							<a href="<?php echo base_url('admin/order/update/'.$value['checkout_id']) ?>">Update</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
<div class="content-data">
	<div class="content-detail">
		<h4>Low Stock Report</h4>
		<table>
			<thead>
				<tr>
					<th>Category</th>
					<th>Product</th>
					<th>Price</th>
					<th>Qty</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($product as $key => $value): ?>
					<tr>
						<td><?php echo $value['category_name'] ?></td>
						<td><?php echo $value['product_name'] ?></td>
						<td>Rp. <?php echo number_format($value['product_price'], 0, ',', '.') ?>,-</td>
						<td><?php echo $value['product_stock'] ?></td>
					</tr>					
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>