<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Vivid Vision Outline</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

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

	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="wrapper">

		<div class="">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div class="container">
								<div>
									<h2 class="text-white pb-2 fw-bold">Vivid Vision Outline</h2>
									<h5 class="text-white op-7 mb-2">In the form below, input your information into the blank fields.</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="container">
								<div class="card full-height">
									<div class="card-body status_border">
										<div class="row px-3 mt-4">
											
											<div class="col-md-12">
												<h1 class="text-center fw-bold mb-4"><input type="text" placeholder="Company Name"> <u>Vivid Vision</u></h1>
											</div>
	
											<!-- Status Field -->
											<div class="col-md-4">
												<div class="form-group form-group-default">
													<label><span class="text-danger">*</span> Status: </label>
													<select name="status" id="status" class="form-control" required>
														<option value="Live">Live</option>
														<option value="Draft">Draft</option>
													</select>
												</div>
											</div>
											<div class="col-md-8"></div>
	
											<!-- Owner Field -->
											<div class="col-md-4">
												<div class="form-group form-group-default">
													<label><span class="text-danger">*</span> Owner: </label>
													<input  type="text" class="form-control" placeholder="" required>
												</div>
											</div>
											<div class="col-md-8"></div>
	
											<!-- Last Updated Field  -->
											<div class="col-md-4">
												<div class="form-group form-group-default">
													<label><span class="text-danger">*</span> Last Updated: </label>
													<input type="date" class="form-control" placeholder="" value ="<?= date('Y-m-d')?>" required>
												</div>
											</div>
											<div class="col-md-8"></div>
	
											<div class="col-md-12">
												<h1 class="text-center fw-bold mb-4"><u>Your Vivid Vision</u></h1>
												<p>
													<b>Vivid Vision Overview:</b> 
													<textarea name="" id="" rows="4" cols="50"  class="form-control" placeholder="Write something about your vivid vision..."></textarea>
													<input type="date" class="form-control mt-2" style="width:150px" value ="<?= date('Y-m-d')?>">.
												</p>
											</div>

											<div class="col-md-12">
												<p>
													It's December 31st, <input type="date" >. We're ending the single best year of our company history, and the company is riding a major high. We have just...
												</p>
												<div class="form-group form-group-default">
													<label><span class="text-danger">*</span> Accomplishment 1: </label>
													<textarea name="" id="" rows="4" cols="50" class="form-control" placeholder="Write something about your accomplishment..."></textarea>
												</div>
												<div class="form-group form-group-default">
													<label><span class="text-danger">*</span> Accomplishment 2: </label>
													<textarea name="" id="" rows="4" cols="50"  class="form-control" placeholder="Write something about your accomplishment..."></textarea>
												</div>
												<div class="form-group form-group-default">
													<label><span class="text-danger">*</span> Accomplishment 3: </label>
													<textarea name="" id="" rows="4" cols="50"  class="form-control" placeholder="Write something about your accomplishment..."></textarea>
												</div>
											</div>
											<div class="col-md-12 mt-5">
												<div class="btn-group">
													<button class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
													<button class="btn btn-warning"><i class="far fa-file-pdf"></i> Generate PDF</button>
												</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<div class="container">
						<nav class="pull-left">
							<ul class="nav">
								<li class="nav-item">
									<a class="nav-link" href="#">
										Copyright © 2024 Vivid Vision App
									</a>
								</li>
							</ul>
						</nav>
						<div class="copyright ml-auto">
							Powered by Red Vivid Vision
						</div>	
					</div>			
				</div>
			</footer>
		</div>
		

	</div>
	<!--   Core JS Files   -->
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- Sweet Alert -->
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="assets/js/atlantis.min.js"></script>

	<script src="assets/js/vivid_vision.js"></script>

</body>
</html>