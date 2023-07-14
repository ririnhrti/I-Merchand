<h3>User</h3>
<div class="content-data">
	<div class="content-form">
		<form method="post">
			<a href="<?php echo base_url('admin/user'); ?>"><h4>Add User</h4></a>
			<h4>Update User</h4>
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="user_name" value="<?php echo $detail['user_name'] ?>">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="user_email" value="<?php echo $detail['user_email'] ?>">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="user_password">
			</div>
			<div class="form-group">
				<label></label>
				<input type="submit" value="Update User">
			</div>
		</form>
	</div>
	<div class="content-detail">
		<h4>All Categories</h4>
		<table>
			<thead>
				<tr>
					<th>No.</th>
					<th>Name</th>
					<th>Email</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($user as $key => $value): ?>
					<tr>
						<td><?php echo $key+1 ?></td>
						<td><?php echo $value['user_name'] ?></td>
						<td><?php echo $value['user_email'] ?></td>
						<td>
							<a href="<?php echo base_url('admin/user/update/'.$value['user_id']) ?>">Update</a>
							<a href="<?php echo base_url('admin/user/delete/'.$value['user_id']) ?>">Delete</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>