<?php 
session_start();
if(!isset($_SESSION['id_user'])){
	header('location: login.php');
}

include 'Class/Db.php';
include 'Class/Vivid_vision.php';
$database = new Db();
$db = $database->connect();
$vivid_vision = new Vivid_vision($db);

if(isset($_GET['id'])){
	$row = $vivid_vision->get_version($_GET['id']);
}
?>
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
									<div class="pull-right">
										<button id="showVersions" class="btn btn-warning btn-round btn-sm"><i class="far fa-folder-open"></i>My Versions</button>
										<a href="function/logout.php" class="btn btn-white btn-border btn-round mr-2 btn-sm"><i class="fas fa-sign-out-alt"></i> Logout</a>
									</div>
									<div class="pull-left mt-3">
										<h2 class="text-white pb-2 fw-bold">Vivid Vision Outline</h2>
										<h5 class="text-white op-7 mb-2">In the form below, input your information into the blank fields.</h5>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<form method="POST" id="myForm" action="function/vivid_vision.php" enctype="multipart/form-data">
						<div class="row mt--2">
							<div class="col-md-12">
								<div class="container">
									<div class="card full-height">
										<div class="card-body status_border">
											<div class="row px-3 mt-1">
												
												<div class="col-md-12 text-center ">
													<img id="imagePreview" src="assets/img/upload/logo/<?php echo isset($row['logo']) ? $row['logo'] : 'default_pic.png' ?>" class="logo-img pulse my-4" alt="">
													<input hidden type="file" id="imageInput"  name="image" >
													<h1 class="fw-bold mb-5 mt-4"><u><input type="text" name="company" placeholder="company name" 
													value ="<?php echo isset($row['company']) ? $row['company'] : '' ?>"> Vivid Vision</u></h1>
												</div>
		
												<!-- Status Field -->
												<div class="col-md-4">
													<div class="form-group form-group-default">
														<label><span class="text-danger"></span> Status: </label>
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
														<label><span class="text-danger"></span> Owner: </label>
														<input  type="text" name="owner" id="owner" class="form-control" placeholder="Owner Name"
														value ="<?php echo isset($row['owner']) ? $row['owner'] : $_SESSION['name'] ?>" required>
													</div>
												</div>
												<div class="col-md-8"></div>
		
												<!-- Last Updated Field  -->
												<div class="col-md-4">
													<div class="form-group form-group-default">
														<label><span class="text-danger"></span> Last Updated: </label>
														<input type="date" name="last_update" id="last_update" class="form-control" placeholder=""
														value ="<?php echo isset($row['last_update']) ? $row['last_update'] : date('Y-m-d') ?>" required>
													</div>
												</div>
												<div class="col-md-8"></div>
		
												<div class="col-md-12">
													<h1 class="text-center fw-bold mb-4"><u>Your Vivid Vision</u></h1>
													<p>
														<textarea name="vivid_mission" id="vivid_mission" rows="4" cols="50"  class="form-control" placeholder="Write something about your vivid vision..." required><?php echo isset($row['vivid_mission']) ? $row['vivid_mission'] : '' ?></textarea>
														<input type="date" name="date_vivid_mission" id="date_vivid_mission" class="form-control mt-2" style="width:150px"
														value ="<?php echo isset($row['date_vivid_mission']) ? $row['date_vivid_mission'] : date('Y-m-d') ?>" required>.
													</p>
												</div>

												<div class="col-md-12">
													<p>
														It's December 31st, <input type="number" id="date_accomp" name="date_accomp" min="1900" max="2099" placeholder="YYYY" 
														value ="<?php echo isset($row['date_accomp']) ? $row['date_accomp'] : date('Y') ?>" required>. We're ending the single best year of our company history, and the company is riding a major high. We have just...
													</p>
													<div class="form-group form-group-default">
														<label><span class="text-danger"></span> Accomplishment 1: </label>
														<textarea name="accom1" id="accom1" rows="4" cols="50" class="form-control" placeholder="Write something about your accomplishment..." required><?php echo isset($row['accom1']) ? $row['accom1'] : '' ?></textarea>
													</div>
													<div class="form-group form-group-default">
														<label><span class="text-danger"></span> Accomplishment 2: </label>
														<textarea name="accom2" id="accom2" rows="4" cols="50"  class="form-control" placeholder="Write something about your accomplishment..."><?php echo isset($row['accom2']) ? $row['accom2'] : '' ?></textarea>
													</div>
													<div class="form-group form-group-default">
														<label><span class="text-danger"></span> Accomplishment 3: </label>
														<textarea name="accom3" id="accom3" rows="4" cols="50"  class="form-control" placeholder="Write something about your accomplishment..."><?php echo isset($row['accom3']) ? $row['accom3'] : '' ?></textarea>
													</div>
												</div>

												<div class="col-md-12 mt-4">
													<h4 class="fw-bold">WHO WE ARE</h4>
													<p>
													At <input type="text" name="wwa1" placeholder="company name" 
													value ="<?php echo isset($row['wwa1']) ? $row['wwa1'] : '' ?>"  required>,
													we are a  <input type="text" name="wwa2" class="mt-2" value ="<?php echo isset($row['wwa2']) ? $row['wwa2'] : '' ?>" placeholder="write something..."> 
													company for <input type="text" name="wwa3" class="mt-2" value ="<?php echo isset($row['wwa3']) ? $row['wwa3'] : '' ?>" placeholder="write something...">.
													We work with <input type="text" name="wwa4" class="mt-2" value ="<?php echo isset($row['wwa4']) ? $row['wwa4'] : '' ?>"  placeholder="write something...">
													</p>
												</div>

												<div class="col-md-12 mt-4">
													<h4 class="fw-bold">OUR MISSION</h4>
													<p>
													Our BHAG (Big Hairy Audacious Goal) is 
													<textarea name="mission" id="mission" rows="4" cols="50"  class="form-control" placeholder="Explain your goal/mission..." required><?php echo isset($row['mission']) ? $row['mission'] : '' ?></textarea>
													</p>
												</div>

												<div class="col-md-12 mt-4">
													<h4 class="fw-bold">WHAT WE DO</h4>
													<p>
													<textarea name="wwd" id="wwd" rows="4" cols="50"  class="form-control" placeholder="Explain your core products / pillars..." required><?php echo isset($row['wwd']) ? $row['wwd'] : '' ?></textarea>
													</p>
												</div>

												
												<div class="col-md-12 my-5">
												<hr>
												</div>
												
												<div class="col-md-12 mt-3">
													<p>Our bread and butter is 
														<input type="text" name="vv21" class="mt-2" value ="<?php echo isset($row['vv21']) ? $row['vv21'] : '' ?>" placeholder="write something..."> .
														This is our 
														<input type="text" name="vv22" class="mt-2" value ="<?php echo isset($row['vv22']) ? $row['vv22'] : '' ?>" placeholder="write something..."> 
														program designed for 
														<input type="text" name="vv23" class="mt-2" value ="<?php echo isset($row['vv23']) ? $row['vv23'] : '' ?>" placeholder="write something..."> 
														We are #1 in the world for what we do in this program because
														<textarea name="vv24" id="vv24" rows="4" cols="50"  class="form-control" placeholder="Explain your goal/mission..." required><?php echo isset($row['vv24']) ? $row['vv24'] : '' ?></textarea>
													</p>
												</div>

												<div class="col-md-12 mt-4">
													<h4 class="fw-bold">THE DETAILS</h4>
													<p>
													We are based in 
													<input type="text" name="vv25" class="mt-2" value ="<?php echo isset($row['vv25']) ? $row['vv25'] : '' ?>" placeholder="write something...">
													and have a team all throughout the world. At our headquarters - a modern, clean, open office in 
													<input type="text" name="vv26" class="mt-2" value ="<?php echo isset($row['vv26']) ? $row['vv26'] : '' ?>" placeholder="write something...">
													- we have over 
													<input type="text" name="vv27" class="mt-2" value ="<?php echo isset($row['vv27']) ? $row['vv27'] : '' ?>" placeholder="write something...">
													of our team including most of the core Leadership team. We also have satellite locations outside of the 
													<input type="text" name="vv28" class="mt-2" value ="<?php echo isset($row['vv28']) ? $row['vv28'] : '' ?>" placeholder="write something...">, 
													with our growing global footprint and business opportunities. 
													</p>
												</div>

												<div class="col-md-12 mt-4">
													<p>
													We do what we do to transform the world for the better, 
													<input type="text" name="vv29" class="mt-2" value ="<?php echo isset($row['vv29']) ? $row['vv29'] : '' ?>" placeholder="write something...">
													and a lot more growth to be able to make a bigger impact. 
													</p>
												</div>

												<div class="col-md-12 mt-4">
													<p>
													This ripple effect of the companies that we work with reaches 
													<input type="text" name="vv210" class="mt-2" value ="<?php echo isset($row['vv210']) ? $row['vv210'] : '' ?>" placeholder="write something...">
													 all throughout the world. 
													</p>
												</div>

												<div class="col-md-12 mt-4">
													<h4 class="fw-bold">OUR CORE VALUES</h4>
													<p>
													We live by our Core Value of 
													<input type="text" name="vv211" class="mt-2" value ="<?php echo isset($row['vv211']) ? $row['vv211'] : '' ?>" placeholder="write something...">
													and attract a world-class type of person to our brand and programs. We protect who we work with and serve at the highest level, and are proud of this impact that the ripple effect is making across the globe.
													</p>

													<p>
													We are looked upon as an elite, world-class team and company. We have started winning various awards for our team, our culture, and are known as an elite place to work. We have grown exponentially fast and within 
													<input type="number" name="vv212" min="1900" max="2099" placeholder="YYYY" value ="<?php echo isset($row['vv212']) ? $row['vv212'] : date('Y') ?>"> 
													years of operations and have a healthy mix of 
													<input type="text" name="vv213" class="mt-2" value ="<?php echo isset($row['vv213']) ? $row['vv213'] : '' ?>" placeholder="write something...">
													setting us up for an even more incredible future.
													</p>
												</div>

												<div class="col-md-12 mt-5">
													<p>
														Why do we have such a high success rate? Largely in part to our team, but also to our culture; one that is driven by
														<input type="text" name="vv214" class="mt-2" value ="<?php echo isset($row['vv214']) ? $row['vv214'] : '' ?>" placeholder="write something...">,
														<input type="text" name="vv215" class="mt-2" value ="<?php echo isset($row['vv215']) ? $row['vv215'] : '' ?>" placeholder="write something...">, and
														<input type="text" name="vv216" class="mt-2" value ="<?php echo isset($row['vv216']) ? $row['vv216'] : '' ?>" placeholder="write something...">. 
														 We are the best in the world at 
														 <input type="text" name="vv217" class="mt-2" value ="<?php echo isset($row['vv217']) ? $row['vv217'] : '' ?>" placeholder="write something...">, 
														 and these Core Values help us drive consistent, repeatable, and scalable results.
													</p>
												</div>

												<div class="col-md-12 mt-5">
													<div class="btn-group">
														<button type="submit" id="btnSave" class="btn btn-primary"><i class="far fa-file-pdf"></i> Save and Export as PDF</button>
													</div>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<div class="container">
						<nav class="pull-left">
							<ul class="nav">
								<li class="nav-item">
									Copyright © 2024 Vivid Vision App
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
	<!-- Modal for Class Form -->
	<?php include('modal/versions_modal.php')?>
	<!--   Core JS Files   -->
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>

	<!-- Sweet Alert -->
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="assets/js/atlantis.min.js"></script>

	<script src="assets/js/vivid_vision.js"></script>
	<?php include('function/notification.php'); ?>
</body>
</html>