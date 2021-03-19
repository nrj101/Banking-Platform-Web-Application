<?php 
session_start();
if(!isset($_SESSION['ID']))
{
	header('location:../HomePage.php');
}
?>
<!DOCTYPE html>
<head>
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="w3-4.css">
	<link rel="stylesheet" type="text/css" href="forms.css">
	<style>
			body{background:linear-gradient(rgba(12, 248, 252,0.4),rgba(10, 2, 242,1));}
			#page{/*border:2px solid #05fc2e;*/ margin:5px auto 5px auto; padding:5px;} 
			#header{/*background-color:#f7f7fc; border:2px solid #f90e65;*/ margin:inherit;padding:inherit;}
			#logo{text-align:center;margin:inherit;padding:inherit;}
			img.LogoImg{ width:32%; height:150px;border:1px solid #a35501; vertical-align:bottom;}
			#navigation{float:left; margin:0px 7%;/* border:2px solid #f90e65;*/}
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
			<h1 class="heading" ><!--style="border:2px solid #f90e65;"--> <abbr title="Father's Bank Of India">:: FBI</abbr> -> Forgot Password ::</h1>
		</div>
		
		<!--Navigation Bar-->
		<div id="navigation" class="w3-bar">
			<a href="../HomePage.php" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Home</a>	
			<a href="Online_application.php" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Apply Online</a>	
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Products</a>
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Services</a>
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">&nbsp;&nbsp;FAQ&nbsp;&nbsp;</a>
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Support</a>
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">About Us</a>
		</div>
	</div>
	
<?php
if(!isset($_POST['Submit']))
{
?>
	<!--Content-->	
	<div id="content-form" class="w3-container w3-col m12 l12 w3-center simple-form">		
		<form id="form-container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<h2 class="form-name w3-bar">&nbsp;&nbsp;&nbsp;Verification Form&nbsp;&nbsp;&nbsp;</h2><br>
			<label> Account No. : </label><input type="text" maxLength="7" name="AC_NO" id="button" pattern="[1][0][1][0-9]{4}" title="Required Valid 7 digit A/C No." required placeholder="Enter your Account No." ><br><br>
			<label> Registered E-mail : </label><input type="text" name="Email" id="button" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Required Valid E-mail address" required placeholder="Enter your e-mail address" ><br><br>
			<label> Registered Mobile No. : </label>  <select name="code" class="drop-select" ><option selected>+91</option><option>+92</option><option>+93</option></select>
											<input type="text" name="Phone" maxLength="10" pattern="[789][0-9]{9}" title="Required Valid Mobile Number" required placeholder="Enter your Mobile Number" id="phone"><br><br><br>			
				<input type="submit" name="Submit" id="butt" value="Submit">	
		</form>
<?php
}
else
{
?>
	<!--Content-->	
	<div id="content-php" class="w3-container w3-col m12 l12 w3-center">
	<?php
	Validate();
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


function Validate()
{
	$con=new mysqli('localhost','root','','test') or die("Failed to connect to MySQL ".mysqli_error($con));
	$AC_NO=$_POST['AC_NO'];
	$Email=$_POST['Email'];
	$mob=$_POST['code'].$_POST['Phone'];
		
	$query="SELECT * FROM `CUSTOMERS` WHERE AC_NO='$AC_NO';";  
	$result=mysqli_query($con,$query);
	if($result)
	{
		$info=mysqli_fetch_assoc($result);
		if( ($AC_NO==$info['AC_NO']) && ($Email==$info['EMAIL']) && ($mob==$info['PHONE']))
		{			
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
			$query="UPDATE SERVICES SET NetBanking_ID='$f',NetBanking_Pass='$mixed' WHERE AC_NO='$AC_NO';";  
			$result=mysqli_query($con,$query);
			if($result)
			{
				// To send e-mail
				if(mail($Email,'Father\'s Bank Of India','Greetings !! Dear Customer, You have requested for new NetBanking ID & Password.    Your New Internet Banking id='.$f.'   Password='.$mixed.'.  If it was not you, immediately contact Home_Branch.    Regards , FBI' ))
					echo "New NetBanking ID & Password has been sent to you registered e-mail address";
				else
					echo "<br>Some Error occurred.Please try again later.. <br>";
			}
			else
				echo "<br>Some Error occurred.Please try again later.. <br>";
		}
		else
			echo "<br><h3>Provided details are incorrect.Please visit Home-Branch for further assistance.</h3><br>";
		
	}
	else
		echo "<br><h3>Provided details are incorrect.Please visit Home-Branch for further assistance.</h3><br>";
				
}	
?>