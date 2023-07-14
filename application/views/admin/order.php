<h3>Orders</h3>
<div class="content-detail">
	<table>
		<thead>
			<tr>
				<th>Date</th>
				<th>Order Ref#</th>
				<th>User</th>
				<th>Amount</th>
				<th>Payment Mode</th>
				<th>Status</th>
				<th>Option</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($order as $key => $value): ?>
				<tr>
					<td><?php echo date('Y-m-d', strtotime($value['checkout_datetime'])); ?></td>
					<td>#<?php echo $value['checkout_number'] ?></td>
					<td><?php echo $value['member_first_name'].' '.$value['member_last_name'] ?></td>
					<td>Rp. <?php echo number_format($value['checkout_total'] + $value['checkout_delivery'] - $value['checkout_discount'], 0, ',', '.') ?>,-</td>
					<td><?php echo $value['checkout_payment'] == 'cod' ? 'Cash On Delivery' : 'Bank Transfered' ?></td>
					<td><?php echo ucfirst($value['checkout_status']) ?></td>
					<td>
						<a href="<?php echo base_url('admin/order/update/'.$value['checkout_id']) ?>">Update</a>
						<a href="<?php echo base_url('admin/order/delete/'.$value['checkout_id']) ?>">Delete</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>