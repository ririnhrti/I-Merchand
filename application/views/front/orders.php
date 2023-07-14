<div class="breadcrumb">
	<ul>
		<li><a href="<?php echo base_url('') ?>">Home</a></li>
		<li> / </li>
		<li><a href="<?php echo base_url('account') ?>">Account</a></li>
		<li> / </li>
		<li>Orders</li>
	</ul>
</div>

<div class="account-page">
	<div class="profile">
		<div class="profile-img">
			<img src="<?php echo base_url('assets/img/default-avatar.png') ?>">
			<h2><?php echo $account['member_first_name'].' '.$account['member_last_name'] ?></h2>
			<p><?php echo $account['member_email'] ?></p>
		</div>						
		<ul>
			<li><a href="<?php echo base_url('account') ?>">Account <span>></span></a></li>
			<li><a href="<?php echo base_url('orders') ?>">My Orders <span>></span></a></li>
			<li><a href="<?php echo base_url('logout') ?>">Logout <span>></span></a></li>
		</ul>
	</div>
	<div class="account-detail">					
		<h2>My Orders</h2>
		<div class="order-detail">
			<table>
				<thead>
					<tr>
						<th>Date</th>
						<th>Order Ref#</th>
						<th>Amount</th>
						<th>Payment Mode</th>
						<th>Status</th>
						<th>View</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($orders as $key => $value): ?>
						<tr>
							<td><?php echo date('Y-m-d', strtotime($value['checkout_datetime'])); ?></td>
							<td>#<?php echo $value['checkout_number'] ?></td>
							<td>
								Rp. <?php echo number_format($value['checkout_total'] + $value['checkout_delivery'] - $value['checkout_discount'], 0, ',', '.') ?>,-
							</td>
							<td><?php echo $value['checkout_payment'] == 'cod' ? 'Cash' : 'Transfer' ?></td>
							<td><?php echo ucfirst($value['checkout_status']) ?></td>
							<td><a href="<?php echo base_url('orders/detail/'.$value['checkout_id']) ?>">View</a></td>
						</tr>						
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>