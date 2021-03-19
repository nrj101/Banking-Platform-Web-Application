<?php
	session_start();
	$_SESSION['ID']="guest";
?>
<!DOCTYPE html>
<html>
<head>
	<title>::HomePage::</title>
	<link rel="stylesheet" type="text/css" href="w3-4.css">
	<style>
		body{background:linear-gradient(rgba(12, 248, 252,0.4),rgba(10, 2, 242,1));}
		.w3-green{color:#ffffff; background-color:green;}
		#page{/*border:2px solid #05fc2e;*/ margin:5px auto 5px auto; padding:5px;}
		.header{/*background-color:#f7f7fc;*/margin:inherit;padding:inherit;}
		#logo{text-align:center;margin:inherit;padding:inherit;}
		img.LogoImg{height:150px;border:1px solid #a35501; vertical-align:bottom;}
		abbr[title]{text-decoration:none; border:none;}
		.heading{color:blue;display:inline;}
		.w3-button{margin:10px 2px 10px 2px;}
		.content{margin:0 auto; height:400px; padding:inherit;text-align:center;}
		#sidebar1{width:20%; height:400px; margin:0 0.8%; padding:0.2%; float:left;clear:left; border:2px solid #f90e65;}
		.w3-ul li{border-bottom: 1px solid #f90e65;}
		.w3-ul.w3-hoverable li:hover{background-color:green;}
		#sidebar2{width:25%; height:400px; margin:0 0.8%; padding:0.8%; float:left;clear:right; border:2px solid #f90e65;}
		#main{width:50%; min-height:400px; margin:0 0.7%; float:left; /*border:2px solid #f90e65;*/}
		.mySlides {display:none; border:1px solid #f90e65;}
		.footer{height:50px; color:white; text-align:right; margin:0px auto 5px auto; padding:20px 15px 0px 0px;}
		.footer a{text-decoration:none;}
	</style>
	
</head>


<body>
<div id="page" class="w3-container">
	<!--Header-->
	<div class="header w3-container w3-col m12 l12 w3-center">
		<div id="logo">
			<img src="images/building-image-7.jpg" alt="logo.jpg" class="LogoImg" align="left">
			<h1 class="heading">Think banking, think <abbr title="Father's Bank Of India">FBI.</abbr> </h1>
		</div>
		<!--Navigation Bar-->
		<div id="navigation" class="w3-bar">
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-red w3-hover-lime">Home</a>	
			<a href="Online_application.php" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Apply Online</a>	
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Products</a>
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Services</a>
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">FAQ</a>
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Support</a>
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">About Us</a>
		</div>
		<p class="w3-text-white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**Important : FBI will never ask for confidential information such as NetBanking Id, Password, Debit/Credit Card PIN or OTP etc.
						Beware of fraudsters.</p>
	</div>
	<!--Content-->	
	<div class="content w3-container w3-col m12 l12 w3-center">
		<!--Left SideBar-->	
		<div id="sidebar1">
			<h4 class="w3-text-red">Quick Links</h4>
			<div class="w3-container">
				<ul class="w3-ul w3-hoverable">
					<li class="w3-bar">
						<a href="aadhaar.php"><img src="images/Aadhaar-Emblem.jpg" class="w3-bar-item w3-circle w3-hide-small" style="width:90px">
						<div class="w3-bar-item">
							<span class="w3-medium w3-text-white">Link AADHAAR</span>
						</div></a>
					</li>

					<li class="w3-bar">
						<a href="PAN.php"><img src="images/pan-avatar.jpg" class="w3-bar-item w3-circle w3-hide-small" style="width:100px">
						<div class="w3-bar-item">
							<span class="w3-medium w3-text-white">Link PAN</span>
						</div></a>
					</li>

					<li class="w3-bar">
						<a href="KYC.php"><img src="images/photo-avatar.png" class="w3-bar-item w3-circle w3-hide-small" style="width:80px">
						<div class="w3-bar-item">
							<span class="w3-medium w3-text-white">Upload KYC</span>
						</div></a>
					</li>
				</ul>
			</div>
		</div>
		
		
		
		<!--Central Column / Main Content / Photos-->
		<div id="main" class="w3-center">

			<div class="w3-content w3-display-container w3-center" style="max-width:95%;">
				<img class="mySlides" src="images/main-image-6.jpg" style="width:100%">
				<img class="mySlides" src="images/main-image-4.jpg" style="width:100%">
				<img class="mySlides" src="images/main-image-3.jpg" style="width:100%">
				<img class="mySlides" src="images/main-image-1.jpg" style="width:100%">
				<img class="mySlides" src="images/main-image-5.jpg" style="width:100%">
				<img class="mySlides" src="images/main-image-8.jpg" style="width:100%">
				<img class="mySlides" src="images/main-image-9.jpg" style="width:100%">
				<img class="mySlides" src="images/mobile-banking-1.jpg" style="width:100%">
				<img class="mySlides" src="images/products-image-1.jpg" style="width:100%">
			</div>

			<script>
				var slideIndex = 1;
				showDivs();

				function showDivs() {
				  var i;
				  var x = document.getElementsByClassName("mySlides");
				  if (slideIndex > x.length) {slideIndex = 1}
				  for (i = 0; i < x.length; i++) {
				     x[i].style.display = "none";  
				  }
				  x[slideIndex-1].style.display = "block";
				  slideIndex++;
				  setTimeout(showDivs,3000);
				}
			</script>
			<p class="w3-text-white" style="border:1px solid #f90e65; max-width:550px; margin:10px auto 10px auto;">FBI's internet banking portal provides personal banking services that gives you complete control over all your banking demands online.<br>
					</p>
		</div>
		
		
		
		<!--Right SideBar   ** Contains Login Forms for user and admin-->
		<div id="sidebar2">
			<!--User Login-->
			<div class="w3-container">
				<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-round-xxlarge w3-green w3-xlarge w3-hover-lime" style="margin-top:60px; margin-bottom:40px;">Personal Login</button>
				<div id="id01" class="w3-modal">
					<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
						<div class="w3-center"><br>
						<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-round w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
						<img src="images/login-avatar.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
						</div>

						<form class="w3-container" action="User/login_user.php" method="post">
							<div class="w3-section">
								<label><b>Username</b></label>
								<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="user_id" required>
								<label><b>Password</b></label>
								<input class="w3-input w3-border" type="password" placeholder="Enter Password" name="pass" required>
								<button class="w3-button w3-round w3-block w3-green w3-section w3-padding w3-hover-lime" type="submit" name="submit" value="LogIn">Login</button>
								<input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me
							</div>
						</form>

						<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
							<button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-round w3-pink w3-hover-red">Cancel</button>
							<span class="w3-right w3-padding w3-hide-small"><a href="User/Forgot_Password.php">Forgot password?</a></span>
						</div>

					</div>
				</div>
			</div>
			
			<!--Admin Login-->
			<div class="w3-container">
				<button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-round-xxlarge w3-green w3-xlarge w3-hover-lime">Employee Login</button>
				<div id="id02" class="w3-modal">
					<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
						<div class="w3-center"><br>
						<span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-round w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
						<img src="images/login-avatar.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
						</div>

						<form class="w3-container" action="admin/login_admin.php" method="post">
							<div class="w3-section">
								<label><b>Username</b></label>
								<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="user_id" required>
								<label><b>Password</b></label>
								<input class="w3-input w3-border" type="password" placeholder="Enter Password" name="pass" required>
								<button class="w3-button w3-round w3-block w3-green w3-section w3-padding w3-hover-lime" type="submit" name="submit" value="LogIn">Login</button>
								<input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me
							</div>
						</form>

						<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
							<button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-round w3-pink w3-hover-red">Cancel</button>
							<span class="w3-right w3-padding w3-hide-small"><a href="#">Forgot password?</a></span>
						</div>

					</div>
				</div>
			</div>
		
		</div>
	</div>


	
	<!--Footer-->
	<div class="footer w3-container w3-col m12 l12">
		<a href="#">Help</a>&nbsp;|&nbsp;<a href="#">Privacy Policy</a>&nbsp;|&nbsp;<a href="#">T&amp;C</a>&nbsp;|&nbsp;<a href="#">&copy;2018 <abbr title="Father's Bank Of India">FBI</abbr></a>
	</div>
</div>	
</body>
</html>