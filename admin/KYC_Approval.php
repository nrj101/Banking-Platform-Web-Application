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
	<title>KYC</title>
	<link rel="stylesheet" type="text/css" href="w3-4.css">
	<link rel="stylesheet" type="text/css" href="forms.css">
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
			<a href="Admin_Home.php" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-green w3-hover-lime">Home</a>		
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

<?php
else
{
	$con=new mysqli('localhost','root','','test') or die("Failed to connect to MySQL ".mysqli_error($con));
	$ac=$_GET['ac'];
	if(isset($_GET['Approve']))
	{
		$query="SELECT * FROM KYC WHERE AC_NO='$ac'";   
		$result=mysqli_query($con,$query);
		$info=mysqli_fetch_assoc($result);
		$dob=$info['DOB'];
		$addr=$info['ADDRESS'];
		$aadhaar=$info['Aadhaar'];
		$query="UPDATE CUSTOMERS SET KYC='1',DOB='$dob',ADDRESS='$addr',AADHAAR='$aadhaar' WHERE AC_NO='$ac' ;";
		$data=mysqli_query($con,$query) or die(mysqli_error($con));
		if($data)
		{
			echo "<h2>KYC Approved...</h2><br><br>";
			
			//To delete corresponding entry from KYC requests
			$query="DELETE FROM `KYC` WHERE `AC_NO` = $ac;";
			$data=mysqli_query($con,$query) or die(mysqli_error($con));
		}
		
		else
			echo "<h2>Failed to Approve KYC</h2>";
	}
	else
	{
		//To delete corresponding entry from pending KYC requests
		$query="DELETE FROM `KYC` WHERE `AC_NO` = $ac;";
		$data=mysqli_query($con,$query) or die(mysqli_error($con));
	}
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