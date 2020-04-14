
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>



	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/bootstrap.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/font-awasome.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/animate.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/hamburgers.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/main.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/select2.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/util.css')?>">
<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url('assets/images/img-01.png')?>">
				</div>

				<form class="login100-form validate-form"method="POST" action="<?php echo base_url('login/aksi_register') ?>" novalidate="novalidate" onSubmit="return validasi()">
					<span class="login100-form-title">
						Register Member
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" id="username" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" id="password" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

          <div class="wrap-input100 validate-input">
						<input class="input100" id="confirmpass" type="password" name="confirmpass" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">

						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="<?php echo base_url('login/register') ?>">
							Username / Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
  <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
        function validasi() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var confirmpass = document.getElementById("confirmpass").value;
            if (password == confirmpass) {
                return true;
            }else{
                alert('Password tidak sama');
                return false;
            }
        }
    </script>




</body>

</html>
