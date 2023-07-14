<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>

	<link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<style>
        body { background-color: #c9c9c9; }
    </style>
</head>
<body>
	<div id="container-register">
		<div id="title">
            <i class="material-icons lock">lock</i> Register
        </div>

        <form method="post">
            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">email</i>
                </div>
                <input name="member_email" id="email" placeholder="Email" type="email" required class="validate" autocomplete="off">
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">vpn_key</i>
                </div>
                <input name="member_password" id="password" placeholder="Password" type="password" required class="validate" autocomplete="off">
            </div>

            <div class="remember-me">
               <!--  <input type="checkbox">
                <span style="color: #757575">I accept Terms of Service</span> -->
            </div>

            <input type="submit" value="Register">
        </form>

        <div class="register">
            <span style="color: #657575">Do you already have an account?</span>
            <a href="<?php echo base_url('login') ?>"><button id="login-link">Login here</button></a>
        </div>
	</div>

</body>
</html>