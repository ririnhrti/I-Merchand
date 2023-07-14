<h3>Account</h3>
<div class="content-data">
	<div class="content-form">
		<form method="post">
			<h4>User Account</h4>
			<input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>">
			<div class="form-group">
				<label>Full Name</label>
				<input type="text" name="user_name" value="<?php echo $user['user_name'] ?>">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="user_email" value="<?php echo $user['user_email'] ?>">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="user_password">
			</div>
			<div class="form-group">
				<label></label>
				<input type="submit" value="Save Account">
			</div>
		</form>
	</div>
</div>