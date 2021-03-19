<?php
	session_start();
	if(!isset($_SESSION['Admin_ID']))
	{
		header('location:../HomePage.php');
	}
?>
<!DOCTYPE html>
<html>
<head> 
	<title>::Admin Home::</title>
	<link rel="stylesheet" type="text/css" href="w3-4.css">
	<style>
			body{background:linear-gradient(rgba(12, 248, 252,0.4),rgba(10, 2, 242,1));}
			#page{/*border:2px solid #05fc2e;*/ margin:5px auto 5px auto; padding:5px;} 
			#header{/*background-color:#f7f7fc; border:2px solid #f90e65;*/ margin:inherit;padding:inherit;}
			#logo{text-align:center;margin:inherit;padding:inherit;}
			img.LogoImg{ width:32%; height:150px;border:1px solid #a35501; vertical-align:bottom;}
			#navigation{float:left; margin:0px 3%;/* border:2px solid #f90e65;*/}
			abbr[title]{text-decoration:none; border:none;}
			.heading{color:blue;display:inline;}
			.w3-button{margin:10px 3px 10px 3px;}
			#logout{ margin-left:120px; float:right; clear:right; }
			#content{ height:300px; margin:50px 0px;}
			
			h3{color:#f90e65; text-decoration: underline dotted white; }
			.footer{height:50px; color:white; text-align:right; margin:10px auto 5px auto; padding:20px 15px 0px 0px;}
			.footer a{text-decoration:none;}
	</style>
</head>
<body>
	<div id="page" class="w3-container">
		<!--Header-->
			<div id="header" class="w3-container w3-col m12 l12 w3-center">
				<div id="logo">
					<img src="../images/building-image-7.jpg" alt="logo.jpg" class="LogoImg" align="left">
					<h1 class="heading" ><!--style="border:2px solid #f90e65;"--> <abbr title="Father's Bank Of India">:: FBI</abbr> -> Admin Dashboard ::</h1>
				</div>
				<!--Navigation Bar-->
				<div id="navigation" class="w3-bar">
					<a href="Admin_Home.php" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-red w3-hover-lime">Home</a>		
					<a href="Withdrawal.php" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-green w3-hover-lime">Withdraw</a>
					<a href="Deposit.php" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-green w3-hover-lime">Deposit</a>
					<a href="Transfer.php" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-green w3-hover-lime">Transfer</a>
					<a href="View_Ac.php" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-green w3-hover-lime">View A/C</a>
					<div id="logout">
						<a href="../LogOut.php"  class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-green w3-hover-lime"> <!--style="float:right; clear:right;"-->LogOut</a>
					</div>
				</div>
				<div id="welcome" style="margin-right:1%; float:right; clear:both;">
					<p class="w3-text-white" ><?php echo $_SESSION['Welcome']?></p>
				</div>
			</div>
		<!--Content-->
		<div id="content" class="w3-container w3-col m12 l12 w3-center">
			<!--Vertical Bar 1-->
			<div id="Vbar1" class="w3-container w3-center" style="width:29%; float:left; clear:left; margin-right:1%; padding-right:3%; border-right: 2px solid #f90e65;">  <!-- padding-left:10%;padding-right:10%;"-->
				<h3>&nbsp;&nbsp;Customer&nbsp;&nbsp;</h3>
				<a href="register.php" class="w3-button w3-round-xlarge w3-green w3-xlarge w3-hover-lime" style="margin-bottom:50px;">Register New Customer</a>
				<a href="Pending.php" class="w3-button w3-round-xlarge w3-green w3-xlarge w3-hover-lime">Approve A/C Applications</a>
			</div>
			<!--Vertical Bar 2-->
			<div id="Vbar2" class="w3-container w3-center" style="width:21%;float:left;padding-right:auto 1%; border-right: 2px solid #f90e65;">  <!-- padding-left:10%;padding-right:10%;"-->
				<h3>&nbsp;&nbsp;KYC&nbsp;&nbsp;</h3>
				<a href="KYC_Admin.php" class="w3-button w3-round-xlarge w3-green w3-xlarge w3-hover-lime" style="margin-bottom:50px;">KYC Upload</a>
				<a href="Pending_KYC.php" class="w3-button w3-round-xlarge w3-green w3-xlarge w3-hover-lime">&nbsp;Pending KYC&nbsp;</a>
			</div>
			<!--Vertical Bar 3-->
			<div id="Vbar3" class="w3-container w3-center" style="width:22%;float:left; border-right: 2px solid #f90e65;">  <!-- padding-left:10%;padding-right:10%;"-->
				<h3>&nbsp;&nbsp;Seeding&nbsp;&nbsp;</h3>
				<a href="../PAN.php" class="w3-button w3-round-xlarge w3-green w3-xlarge w3-hover-lime" style="margin-bottom:50px;">Link PAN</a>
				<a href="../aadhaar.php" class="w3-button w3-round-xlarge w3-green w3-xlarge w3-hover-lime">Link AADHAAR</a>
			</div>
			<!--Vertical Bar 4-->
			<div id="Vbar4" class="w3-container w3-center" style="width:25%; float:left; clear:right;">
				<h3>&nbsp;&nbsp;Loans&nbsp;&nbsp;</h3>
				<a href="Approved_Loans.php" class="w3-button w3-round-xlarge w3-green w3-xlarge w3-hover-lime" style="margin-bottom:50px;">Approved Loans</a>
				<a href="Pending Loan Applications.php" class="w3-button w3-round-xlarge w3-green w3-xlarge w3-hover-lime">Pending Loan Requests</a>
			</div>
		</div>
		<!--Footer-->
		<div class="footer w3-container w3-col m12 l12">
			<a href="#">Help</a>&nbsp;|&nbsp;<a href="#">Privacy Policy</a>&nbsp;|&nbsp;<a href="#">T&amp;C</a>&nbsp;|&nbsp;<a href="#">&copy;2018 <abbr title="Father's Bank Of India">FBI</abbr></a>
		</div>
	</div>
</body>
</html>
<!--
<body>
	<h2 align="center" >Father's Bank Of India :: Online Banking System</h2>
	<form action="../LogOut.php" method="POST" align="right" style="margin: 0px 200px;">
	<?php echo $_SESSION['Welcome']?><input name="LogOut" type="submit" value="LogOut" style="margin: 0px 10px;">
	</form>		/===
	<ol>
		<li><a href="register.php">Register New Customer</a></li><br>
		<li><a href="Pending.php">Pending Applications</a></li><br>
		<li><a href="Pending_KYC.php">Pending KYC Approval Requests</a></li><br>
		<li><a href="KYC_Admin.php">KYC Upload</a></li><br>
		<li><a href="../PAN.php">Link PAN</a></li><br>
		<li><a href="../aadhaar.php">Link AADHAAR</a></li><br>
		<li><a href="Pending Loan Applications.php">Pending Loan Applications</a></li><br>
		<li><a href="Approved_Loans.php">Approved Loans</a></li><br>
		<li><a href="View_Ac.php">View An Account</a></li><br>		/===
		<li><a href="Withdrawal.php">Withdraw Money</a></li><br>	/===
		<li><a href="Deposit.php">Deposit Money</a></li><br>		/===
		<li><a href="Transfer.php">Transfer Money</a></li><br>		/===
		<li><a href="#">Cheque Book</a></li><br>
		<li><a href="#">Other Services</a></li><br>
	
	</ol>

</body>
</html>
-->