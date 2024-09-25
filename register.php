<?php 
session_start(); 
if(isset($_SESSION['id_user'])){
	header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Vivid Vision Outline</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.min.css">
	<link rel="stylesheet" href="assets/css/login.css">
</head>
<style>

</style>
<body class="login">
    <div class="wrapper wrapper-login wrapper-login-full p-0">
		<div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg text-white">
			<h1 class="title fw-bold mb-3">Vivid Vision Outline</h1>
			<p class="subtitle op-7">@2024 Vivid Vision App. All Rights Reserved.</p>
		</div>
		<div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
            <form method="POST" action="function/register_function.php">
                <div class="container container-login container-transparent animated fadeIn">
                    <h3 class="text-center">Create new Account</h3>

                    <div class="login-form">
                        <div class="form-group">
                            <label for="name" class="placeholder"><b>Name</b></label>
                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="placeholder"><b>Email</b></label>
                            <input type="text" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="placeholder"><b>Password</b></label>
                            <div class="position-relative">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                                <div class="show-password">
                                    <i class="icon-eye"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-action-d-flex">
                            <button type="submit"  class="btn btn-primary btn-block btn-block float-right mt-sm-0 fw-bold">Sign Up</button>
                        </div>
                        <div class="login-account">
                            <span class="msg">Already have an account?</span>
                            <a href="login.php" class="link">Login</a>
                        </div>
                    </div>

                </div>

             
            </form>
		</div>
	</div>
	<!--   Core JS Files   -->
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<!-- Sweet Alert -->
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<!-- Atlantis JS -->
	<script src="assets/js/atlantis.min.js"></script>
    <?php include('function/notification.php'); ?>
</body>
</html>