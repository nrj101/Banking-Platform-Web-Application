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
	<title>Transfer</title>
	<link rel="stylesheet" type="text/css" href="w3-4.css">
	<link rel="stylesheet" type="text/css" href="forms.css">
	<style>
			body{background:linear-gradient(rgba(12, 248, 252,0.4),rgba(10, 2, 242,1));}
			#page{/*border:2px solid #05fc2e;*/ margin:5px auto 5px auto; padding:5px;} 
			#header{/*background-color:#f7f7fc; border:2px solid #f90e65;*/ margin:inherit;padding:inherit;}
			#logo{text-align:center;margin:inherit;padding:inherit;}
			img.LogoImg{ width:32%; height:150px;border:1px solid #a35501; vertical-align:bottom;}
			#navigation{float:left; margin:0px 15px;/* border:2px solid #f90e65;*/}
			abbr[title]{text-decoration:none; border:none;}
			.heading{color:blue;display:inline;}
			#content-form{ min-height: 420px; float:none;  padding-bottom:50px;}
			#content-php{ min-height: 420px; padding: 100px 60px 0px 60px;}
			#form-container{padding: 10px 0px 95px 0px;}
			.w3-button{margin:10px 3px 10px 3px;}
			#logout{ margin-left:120px;}
			
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
			<h1 class="heading" ><!--style="border:2px solid #f90e65;"--> <abbr title="Father's Bank Of India">:: FBI</abbr> -> User Dashboard ::</h1>
		</div>
		<!--Navigation Bar-->
				<div id="navigation" class="w3-bar">
					<a href="User_Home.php" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-green w3-hover-lime">Home</a>	
					<div class="w3-dropdown-hover">
					    <button class="w3-button w3-round-xlarge w3-green w3-hover-lime">My Profile <img src="../images/photo-avatar.png" alt="logo.jpg" style="width:30px"/> </button>
						<div id="profile" class="w3-dropdown-content w3-bar-block  w3-round-xlarge w3-aqua w3-animate-zoom">
							<a href="Profile.php" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">View Profile</a>
							<a href="Change_Login_Details.php" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Change Login Details</a>
					    </div>
					</div>
						
					<a href="Balance.php" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-green w3-hover-lime">Balance</a>
					<a href="Mini-Statement.php" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-green w3-hover-lime">Mini-Statement</a>
					<a href="Transfer.php" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-red w3-hover-lime">Transfer</a>
					<a href="../LogOut.php" id="logout" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-green w3-hover-lime"> <!--style="float:right; clear:right;"-->LogOut</a>
				
				</div>
		<div id="welcome" style="margin-right:1%; float:right; clear:both;">
			<p class="w3-text-white" ><?php echo $_SESSION['Welcome']?></p>
		</div>
	</div>

<?php
if(!isset($_POST['Transfer']))
{
?>
	<!--Content-->	
	<div id="content-form" class="w3-container w3-col m12 l12 w3-center simple-form">
		<form id="form-container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<h2 class="form-name w3-bar">&nbsp;&nbsp;&nbsp;Money Transfer Form&nbsp;&nbsp;&nbsp;</h2><br>
				<label> Transfer To : </label><input type="text" name="AC_NO" id="button" pattern="[0-9]{7,}" title="Required Valid A/C No. 7-digit or more"  placeholder="Destination Account No." required> <br><br>
				<label> Account Holder : </label><input type="text" name="name" id="button" maxLength="20" onblur="this.value=this.value.toUpperCase()" pattern="[A-Z ]{3,20}" title="Required NAME 3 character or longer" placeholder="Name of Recipient" required><br><br>
				<label> Name of Bank : </label><input type="text" name="Bank" id="button" required maxLength="20" onblur="this.value=this.value.toUpperCase()" pattern="[A-Z ]{3,20}" title="Required NAME 3 character or longer"  placeholder="Bank Name" ><br><br>
				<label> IFSC : </label><input type="text" name="IFSC" id="button" required maxLength="11"  pattern="[A-Z]{4}[0-9]{7}" title="Required Valid IFSC" onblur="this.value=this.value.toUpperCase()"  placeholder="IFSC" ><br><br>
				<label> Amount : </label><input type="number" name="Amount" id="button" min="100" max="99999999.99" step="0.01" pattern="\d+(\.\d{1,2})" title="Minimum: INR 100.00  Maximum: INR 99000000" placeholder="Enter Amount (INR)" required ><br><br><br>
				<input type="submit" name="Transfer" value="Transfer" id="butt">
		</form>
<?php
}
else
{
?>
	<!--Content-->
	<div id="content-php" class="w3-container w3-col m12 l12 w3-center">
<?php
	Transfer();
}
?>
	</div>
	<!--Footer-->
	<div class="footer w3-container w3-col m12 l12">
		<a href="#">Help</a>&nbsp;|&nbsp;<a href="#">Privacy Policy</a>&nbsp;|&nbsp;<a href="#">T&amp;C</a>&nbsp;|&nbsp;<a href="#">&copy;2018 <abbr title="Father's Bank Of India">FBI</abbr></a>
	</div>
</div>
</body>
</html>
<?php

function Transfer()
{
	$con=new mysqli('localhost','root','','customers') or die("Failed to connect to MySQL ".mysqli_error($con));
	$ac_no=$_SESSION['ac_no'];
	$AC_NO=$_POST['AC_NO'];
	$bank=$_POST['Bank'];
	$Amount=$_POST['Amount'];
		
	$query="SELECT Balance FROM `$ac_no` ORDER BY T_No DESC LIMIT 1;";  
	$result=mysqli_query($con,$query);
	$info=mysqli_fetch_assoc($result);
	$Balance=$info['Balance']-$Amount;
		
	if($Amount>$info['Balance'])
		echo "<br><h2>Insufficient Balance !! Aborting Transaction.</h2>";
	else
	{
		$query="INSERT INTO `$ac_no` VALUES (NULL,' - Transfer to $bank A/c $AC_NO', NOW(), '0.00','$Amount','$Balance')";
		$result=mysqli_query($con,$query) or die(mysqli_error($con));
		if($result)
		{
			echo "<div align=\"center\"><br><h2>Transaction Successful</h2>";
			echo "<br>Rs. $Amount Transferred to $bank A/c : $AC_NO.  Available Balance is Rs.$Balance</div>";
		}
	}
	echo "You will be automatically redirected to your homepage in few seconds...";
	echo "<script language=\"javascript\"> setTimeout(Myfunction,8000); ";
	echo "function Myfunction(){window.location=\"http://localhost/SEProject/Project/User/User_Home.php\";}</script>";
				
}	
?>