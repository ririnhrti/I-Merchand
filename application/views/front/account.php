<div class="breadcrumb">
	<ul>
		<li><a href="<?php echo base_url('') ?>">Home</a></li>
		<li> / </li>
		<li>Account</li>
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
		<h2>Account</h2>
		<div class="billing-detail">
			<form class="checkout-form" method="post">
				<input type="hidden" name="member_id" value="<?php echo $account['member_id'] ?>">
				<div class="form-inline">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" id="fname" name="member_first_name" value="<?php echo $account['member_first_name'] ?>">
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" id="lname" name="member_last_name" value="<?php echo $account['member_last_name'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label>Company Name (Optional)</label>
					<input type="text" id="cname" name="member_company_name" value="<?php echo $account['member_company_name'] ?>">
				</div>
				<div class="form-inline">
					<div class="form-group">
						<label>Country</label>
						<select id="country" name="member_country">
							<option selected>---Select a Country---</option>
							<option value="Indonesia" <?php echo $account['member_country'] == 'Indonesia' ? 'selected' : '' ?>>Indonesia</option>
						</select>
					</div>
					<div class="form-group">
						<label>City</label>
						<select id="city" name="member_city">
							<option selected>---Select a City---</option>
							<option value="Yogyakarta" <?php echo $account['member_city'] == 'Yogyakarta' ? 'selected' : '' ?>>Yogyakarta</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label>Address</label>
					<textarea style="resize:none" id="address" name="member_address" rows="3"><?php echo $account['member_address'] ?></textarea>
				</div>
				<div class="form-inline">					
					<div class="form-group">
						<label>Tel</label>
						<input type="text" id="telp" name="member_telp" value="<?php echo $account['member_telp'] ?>">
					</div>
					<div class="form-group">
						<label>Mobile</label>
						<input type="text" id="mobile" name="member_mobile" value="<?php echo $account['member_mobile'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label></label>
					<input type="submit">
				</div>
			</form>
		</div>
	</div>
</div>