<?php
	session_start();
	if(!isset($_SESSION['User_ID']))
	{
		header('location:../HomePage.php');
	}
?>
<!DOCTYPE html>
<html>
	<head> 
		<title>::User_Home::</title>
		<link rel="stylesheet" type="text/css" href="w3-4.css">
		<style>
			body{background:linear-gradient(rgba(12, 248, 252,0.4),rgba(10, 2, 242,1)); color:white;}
			#page{/*border:2px solid #05fc2e;*/ margin:5px auto 5px auto; padding:5px;} 
			#header{/*background-color:#f7f7fc; border:2px solid #f90e65;*/ margin:inherit;padding:0 5px;}
			#logo{text-align:center;margin:inherit;padding:inherit;}
			img.LogoImg{ width:32%; height:150px;border:1px solid #a35501; vertical-align:bottom;}
			#navigation{float:left; margin:0px 15px;/* border:2px solid #f90e65;*/}
			abbr[title]{text-decoration:none; border:none;}
			.heading{color:blue;display:inline;}
			.w3-button{margin:10px 3px 10px 3px;}
			#logout{ margin-left:120px;}
			#profile{padding:0px 4px;}
			#profile .w3-button{ margin:4px 0px;}
			
			#content{margin:0 auto; height:420px; padding:inherit;text-align:center;}			
			#sidebar1{width:25%; height:420px; margin:0 1.1%;; float:left;clear:left; border:2px solid #f90e65;}
			.w3-ul li{border-bottom: 1px solid #f90e65;}
			.w3-ul.w3-hoverable li:hover{background-color:green;}
			
			#midbar{width:70%; height:420px; float:left; clear:right; border:2px solid #f90e65; margin:0 1.1%; padding:0.2%; }
			h4{color:#f90e65; padding-bottom:1px;  text-decoration: underline solid white; }
			.w3-hover-green:hover{ background-color:green;}
			.spanbutton:hover{ background-color:#cddc39; cursor:pointer;}
			.footer{height:50px; color:white; text-align:right; margin:10px auto 5px auto; padding:20px 15px 0px 0px;}
			.footer a{text-decoration:none;}
		</style>
	</head>

	<body>
		<div id="page" class="w3-container">
		<!--Header-->
			<div id="header"class="w3-container w3-col m12 l12 w3-center">
				<div id="logo">
					<img src="../images/building-image-7.jpg" alt="logo.jpg" class="LogoImg" align="left">
					<h1 class="heading" ><!--style="border:2px solid #f90e65;"--> <abbr title="Father's Bank Of India">:: FBI</abbr> -> Online Banking Service ::</h1>
				</div>
				<?php
				if(!$_SESSION['KYC'])
				{
					?>
						<a href="../LogOut.php" id="logout" class="w3-button w3-round-xlarge w3-bar-item w3-padding-large w3-green w3-hover-lime"> <!--style="float:right; clear:right;"-->LogOut</a>
						<div id="welcome" style="float:right; clear:both;">
							<p class="w3-text-white" ><?php echo $_SESSION['Welcome']?></p>
						</div>
					<?php
					echo "<div id=\"content\" align=\"center\" style=\"margin: 70px 20px; height:280px; display:block; float:left; clear:both;\"><h3>IMPORTANT !! Your account has been temporarily suspended. Please fill the KYC form to continue enjoying our uninterrupted services.Ignore, if already done.<h3>";
					?>					
					<a href="../KYC.php" >
					<div >
						<span class="w3-button w3-round-xlarge w3-bar-item w3-padding-large w3-green w3-hover-lime">Fill Up KYC</span>
					</div></a>

					<!--Footer-->
					<div class="footer w3-container w3-col m12 l12" style="height:30px;">
						<a href="#">Help</a>&nbsp;|&nbsp;<a href="#">Privacy Policy</a>&nbsp;|&nbsp;<a href="#">T&amp;C</a>&nbsp;|&nbsp;<a href="#">&copy;2018 <abbr title="Father's Bank Of India">FBI</abbr></a>
					</div>
					<?php
				}
				else
				{
				?>
				<!--Navigation Bar-->
				<div id="navigation" class="w3-bar">
					<a href="User_Home.php" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-red w3-hover-lime">Home</a>	
					<div class="w3-dropdown-hover">
					    <button class="w3-button w3-round-xlarge w3-green w3-hover-lime">My Profile <img src="../images/photo-avatar.png" alt="logo.jpg" style="width:30px"/> </button>
						<div id="profile" class="w3-dropdown-content w3-bar-block  w3-round-xlarge w3-aqua w3-animate-zoom">
							<a href="Profile.php" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">View Profile</a>
							<a href="Change_Login_Details.php" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Change Login Details</a>
					    </div>
					</div>
						
					<a href="Balance.php" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-green w3-hover-lime">Balance</a>
					<a href="Mini-Statement.php" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-green w3-hover-lime">Mini-Statement</a>
					<a href="Transfer.php" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-green w3-hover-lime">Transfer</a>
					<a href="../LogOut.php" id="logout" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-green w3-hover-lime"> <!--style="float:right; clear:right;"-->LogOut</a>
				
				</div>
				<div id="welcome" style="float:right; clear:both;">
					<p class="w3-text-white" ><?php echo $_SESSION['Welcome']?></p>
				</div>
			</div>
		<!--Content-->
			<div id="content" class="w3-container w3-col m12 l12 w3-center">
			<!--Left SideBar-->	
				<div id="sidebar1">
					<h4 >&nbsp;&nbsp; Quick Links&nbsp;&nbsp;&nbsp; </h4>
					<div class="w3-container">
						<ul class="w3-ul w3-hoverable">
							<li class="w3-bar">
							<a href="../aadhaar.php"><img src="../images/Aadhaar-Emblem.jpg" class="w3-bar-item w3-circle w3-hide-small" style="width:100px"><br>
							<div class="w3-bar-item">
								<span class="w3-medium w3-text-white">Link AADHAAR</span>
							</div></a>
							</li>

							<li class="w3-bar">
								<a href="../PAN.php"><img src="../images/pan-avatar.jpg" class="w3-bar-item w3-circle w3-hide-small" style="width:90px"><br>
								<div class="w3-bar-item">
									<span class="w3-medium w3-text-white">Link PAN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
								</div></a>
							</li>

							<li class="w3-bar">
								<a href="../KYC.php"><img src="../images/photo-avatar.png" class="w3-bar-item w3-circle w3-hide-small" style="width:80px"><br>
								<div class="w3-bar-item">
									<span class="w3-medium w3-text-white">Upload KYC</span>
								</div></a>
							</li>
						</ul>
					</div>
				</div>
				<!--Middle Bar-->
				<div id="midbar">
					<!--Side 1-->
					<div  id="mid-left" class="w3-container" style="width:50%; float:left; border-right: 2px solid #f90e65; padding-left:10%;padding-right:10%;">
						<h4 class="w3-text-red">&nbsp;&nbsp;&nbsp;Services : &nbsp;&nbsp;&nbsp;</h4>
						
						<form action="Services_Action.php" method="get">
							<a href="Services_Action.php?ser=dc" >
							<div class="w3-center w3-hover-green" style="clear:both; border-bottom: 1px dotted white;">
								<span class="w3-button w3-round-xlarge w3-medium w3-padding-large w3-green w3-hover-lime">Debit Card</span>
							</div></a>
							
							<a href="Services_Action.php?ser=cc" >
							<div class="w3-center w3-hover-green" style="clear:both; border-bottom: 1px dotted white;">
								<span class="w3-button w3-round-xlarge w3-medium w3-padding-large w3-green w3-hover-lime">Credit Card</span>
							</div></a>
							
							<a href="Loan_Apply.php" >
							<div class="w3-center w3-hover-green" style="clear:both; border-bottom: 1px dotted white;">
								<span class="w3-button w3-round-xlarge w3-medium w3-padding-large w3-green w3-hover-lime" style="cursor:pointer;">Apply For Loan</span>
							</div></a>
							
							<a href="Services_Action.php?ser=mob" >
							<div class="w3-center w3-hover-green" style="clear:both; border-bottom: 1px dotted white;">
								<span class="w3-button w3-round-xlarge w3-medium w3-padding-large w3-green w3-hover-lime">Mobile Banking</span>
							</div></a>
							
							<a href="Services_Action.php?ser=chq" >
							<div class="w3-center w3-hover-green" style="clear:both; border-bottom: 1px dotted white;">
								<span class="w3-button w3-round-xlarge w3-medium w3-padding-large w3-green w3-hover-lime">New Cheque Book</span>
							</div></a>
						</form>
						<br>
					</div>
					<!--Side 2-->
					<div  id="mid-right" class="w3-container" style="width:50%; float:left; padding-left:10%;padding-right:10%;">
						<h4 class="w3-text-red">&nbsp;&nbsp;&nbsp;Other Services : &nbsp;&nbsp;&nbsp;</h4>
							<a href="#" >
							<div class="w3-center w3-hover-green" style="clear:both; border-bottom: 1px dotted white;">
								<span class="w3-button w3-round-xlarge w3-medium w3-padding-large w3-green w3-hover-lime">Insurance</span>
							</div></a>
							<a href="#" >
							<div class="w3-center w3-hover-green" style="clear:both; border-bottom: 1px dotted white;">
								<span class="w3-button w3-round-xlarge w3-medium w3-padding-large w3-green w3-hover-lime">&nbsp;Demat A/C&nbsp;</span>
							</div></a>
							<a href="#" >
							<div class="w3-center w3-hover-green" style="clear:both; border-bottom: 1px dotted white;">
								<span class="w3-button w3-round-xlarge w3-medium w3-padding-large w3-green w3-hover-lime">Pay At A Merchant</span>
							</div></a>
							<a href="#" >
							<div class="w3-center w3-hover-green" style="clear:both; border-bottom: 1px dotted white;">
								<span class="w3-button w3-round-xlarge w3-medium w3-padding-large w3-green w3-hover-lime">Block Debit/Credit Card</span>
							</div></a>
					</div>
				</div>
				
			</div>
			<!--Footer-->
			<div class="footer w3-container w3-col m12 l12">
				<a href="#">Help</a>&nbsp;|&nbsp;<a href="#">Privacy Policy</a>&nbsp;|&nbsp;<a href="#">T&amp;C</a>&nbsp;|&nbsp;<a href="#">&copy;2018 <abbr title="Father's Bank Of India">FBI</abbr></a>
			</div>
			<?php
			}
			?>
		</div>
	</body>
</html>


