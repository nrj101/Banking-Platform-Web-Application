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
	<title>New A/C Registration</title>
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
	$con=new mysqli('localhost','root','','test') or die("Failed to connect to MySQL ".mysqli_error($con));
	$app_no=$_GET['ac'];
	$query="SELECT * FROM ac_applications WHERE AC_NO='$app_no'";   
	$result=mysqli_query($con,$query);
	if(isset($_GET['Approve']))
	{		
		$info=mysqli_fetch_assoc($result);
		$gender=$info['Gender'];
		if($gender=="Male")
			$fname="Mr. ".$info['FNAME'];
		else if($gender=="Female")
			$fname="Mrs. ".$info['FNAME'];
		else
			$fname=$info['FNAME'];
		$lname=$info['LNAME'];
		$father=$info['Father'];
		$mother=$info['Mother'];
		$ac_type=$info['AC_Type'];
		$email=$info['EMAIL'];
		$num=$info['PHONE'];
		$dob=$info['DOB'];
		$doj=$info['DOJ'];
		$addr=$info['ADDRESS'];
		$aadhaar=$info['AADHAAR'];
		$PAN=$info['PAN'];
		
		// To send e-mail
		$upp="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$low1="abcdefghijklmnopqrstuvwxyz";
		$list_num="0123456789";
		$sp="!@#$%&";
		$gen_upp=substr(str_shuffle($upp),0,2);
		$gen_low=substr(str_shuffle($low1),0,2);
		$gen_num=substr(str_shuffle($list_num),0,2);
		$gen_sp=substr(str_shuffle($sp),0,2);
		$mixed="$gen_upp$gen_low$gen_num$gen_sp";
		$f=uniqid();
		
		$query="INSERT INTO CUSTOMERS VALUES(NULL,'0','$fname','$lname','$father','$mother','$gender','$ac_type','$email','$num','$dob',NOW(),'$addr','$aadhaar','$PAN');";
		$data=mysqli_query($con,$query) or die(mysqli_error($con));
		
		if($data)
		{
			echo "<h2>REGISTRATION COMPLETE...</h2><br><br>";
			
			$query="SELECT AC_NO FROM customers WHERE PHONE='$num';";
			$data=mysqli_query($con,$query) or die(mysqli_error($con));
			$info=mysqli_fetch_assoc($data);
			$ac=$info['AC_NO'];
			echo "<br>A/C No : $ac<br>";
			$query2="INSERT INTO SERVICES(AC_NO,NetBanking_ID,NetBanking_Pass) VALUES ('$ac','$f','$mixed');";
			$data2=mysqli_query($con,$query2) or die(mysqli_error($con));
			
			if($data2)
			{
				if(mail($email,'Father\'s Bank Of India','Greetings !! Dear Customer, You have successfully opened an account with us.  Your account no. : '.$ac.'  Your Internet Banking id='.$f.'   Your Password='.$mixed.'.  You will need to complete your KYC details before you can use our Online Banking Services.    Regards , FBI' ))
					echo "E-mail with ID & Password sent successfully";
				else
					echo "<br>Error Sending E-mail<br>";
			}
			
			
			//To delete corresponding entry from pending applications
			$query="DELETE FROM `ac_applications` WHERE `AC_NO` = '$app_no';";
			$data=mysqli_query($con,$query) or die(mysqli_error($con));
			
			// To create table for user with generated Account No.

			$con=new mysqli('localhost','root','','customers') or die("Failed to connect to MySQL ".mysqli_error($con));
			$query="CREATE TABLE `customers`.`$ac` ( `T_No` INT(6) NOT NULL AUTO_INCREMENT , `Description` VARCHAR(50) NOT NULL , `Date` DATE NOT NULL , `Credit` DECIMAL NOT NULL , `Debit` DECIMAL NOT NULL , `Balance` DECIMAL NOT NULL , PRIMARY KEY (`T_No`)) ENGINE = InnoDB;";
			$data=mysqli_query($con,$query) or die(mysqli_error($con));
			$query="INSERT INTO `$ac` VALUES ('151000','Start', NOW(),'0.00','0.00','0.00')";
			$result=mysqli_query($con,$query) or die(mysqli_error($con));
		}
		
		else
			echo "<h2>Registration failed !  Try Again Later..</h2>";
	}
	else
	{
		//To delete corresponding entry from pending applications
		$query="DELETE FROM `ac_applications` WHERE `AC_NO` = '$app_no';";
		$data=mysqli_query($con,$query) or die(mysqli_error($con));
		echo "<h2>Application Disposed Successfully </h2>";
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