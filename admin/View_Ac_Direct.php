<?php
session_start();
if(!isset($_SESSION['Admin_ID']))
{
	header('location:../HomePage.php');
}
	$ac=$_GET['ac'];
	$con=new mysqli('localhost','root','','test') or die("Failed to connect to MySQL ".mysqli_error($con));
	$query="SELECT * FROM customers WHERE AC_NO='$ac'";  
	$result=mysqli_query($con,$query);
	$info=mysqli_fetch_assoc($result);
	$con2=new mysqli('localhost','root','','customers') or die("Failed to connect to MySQL ".mysqli_error($con));
	$query2="SELECT Balance,Date FROM `$ac` ORDER BY T_No DESC LIMIT 1;";  
	$result2=mysqli_query($con2,$query2);
	if($result2)
	{
		$info2=mysqli_fetch_assoc($result2);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Account Info</title>
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
			#content{ min-height: 360px;}
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
			<a href="View_Ac.php" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-red w3-hover-lime">View A/C</a>
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
	
		<h2 align="center">Account Information Page</h2>

		<table title="Account Info." border=4 width="65%" align="center" style="background-color:#010; color:#fff;">
		
		<tr><td>A/C No.</td><td><?php echo $ac;?></td></tr>
		<tr><td>A/C Type.</td><td><?php echo $info['AC_Type'];?></td></tr>
		<tr><td>Name</td><td><?php echo $info['FNAME']." ".$info['LNAME'];?></td></tr>
		<tr><td>Father's Name : </td><td><?php echo $info['Father'];?></td></tr>
		<tr><td>Mother's Name : </td><td><?php echo $info['Mother'];?></td></tr>
		<tr><td>Gender : </td><td><?php echo $info['Gender'];?></td></tr>
		<tr><td>DOB</td><td><?php echo $info['DOB'];?></td></tr>
		<tr>
		<td>Images</td><td>
		Photo : <img src="../Uploads/Photos/<?php echo $info['AC_NO'];?>.jpg" height="100" width="100">
		Signature : <img src="../Uploads/Signatures/<?php echo $info['AC_NO'];?>.jpg" height="100" width="100">
		ID : <img src="../Uploads/IDs/<?php echo $info['AC_NO'];?>.jpg" height="100" width="100"></td>
		</tr>
		<tr><td>A/C Opened On :</td><td><?php echo $info['DOJ'];?></td></tr>
		<tr><td>Address :</td><td><?php echo $info['ADDRESS'];?></td></tr>
		<tr><td>Aadhaar No. :</td><td><?php echo $info['AADHAAR'];?></td></tr>
		<tr><td>PAN :</td><td><?php echo $info['PAN'];?></td></tr>
		<tr><td>Last Transaction Date :</td><td><?php echo $result2 ? $info2['Date']:"No Transactions Yet";?></td></tr>
		<tr><td>Available Balance :</td><td><?php echo $result2 ? "INR ".$info2['Balance']:"No Transactions Yet";?></td></tr>
		<tr><td>KYC</td><td><?php if($info['KYC']==1) echo "Approved" ; else  echo "Not Approved";?></td></tr>
		
		</table><br>
		<a href="Ac_Statement.php?ac=<?php echo $ac;?>" >
		<div >
			<span class="w3-button w3-round-xlarge w3-medium w3-padding-large w3-green w3-hover-lime">Get A/C Statement</span>
		</div></a>
	</div>
	
	<!--Footer-->
	<div class="footer w3-container w3-col m12 l12">
		<a href="#">Help</a>&nbsp;|&nbsp;<a href="#">Privacy Policy</a>&nbsp;|&nbsp;<a href="#">T&amp;C</a>&nbsp;|&nbsp;<a href="#">&copy;2018 <abbr title="Father's Bank Of India">FBI</abbr></a>
	</div>
</div>
</body>
</html>
	
