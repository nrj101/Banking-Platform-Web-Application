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
	<title>Change Login Details</title>
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
					    <button class="w3-button w3-round-xlarge w3-red w3-hover-lime">My Profile <img src="../images/photo-avatar.png" alt="logo.jpg" style="width:30px"/> </button>
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
		<div id="welcome" style="margin-right:1%; float:right; clear:both;">
			<p class="w3-text-white" ><?php echo $_SESSION['Welcome']?></p>
		</div>
	</div>

<?php
if(!isset($_POST['Submit']))
{
?>
	<!--Content-->	
	<div id="content-form" class="w3-container w3-col m12 l12 w3-center simple-form">
		<form id="form-container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<h2 class="form-name w3-bar">&nbsp;&nbsp;&nbsp;Change Login Details&nbsp;&nbsp;&nbsp;</h2><br>
				<label> New User ID : </label><input type="text" name="user_id" id="button" placeholder="Enter Your New User ID" maxLength="15" pattern="[a-zA-Z0-9_.]{6,15}" title="a-z  A-Z 0-9  Symbols allowed ._   6 to 15 characters long" required><br><br>
				<label> New Password : </label><input type="password" name="pass1" id="button" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required placeholder="Enter new password" ><br><br>
				<label> Confirm New Password : </label> <input type="password" name="pass2" id="button" required placeholder="Re-enter new password" ><br><br><br>			
				<input type="submit" name="Submit" value="Change" id="butt">
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
	$user_id=$_POST['user_id'];
	$pass1=$_POST['pass1'];
	$pass2=$_POST['pass2'];
	if($pass1==$pass2)
	{
		$query="SELECT * FROM `SERVICES` WHERE NetBanking_ID='$user_id';";  
		$result=mysqli_query($con,$query);
		$rows=mysqli_num_rows($result);
		if($rows>0)
		{
			echo "Sorry, this User ID is already taken";
		}
		else
		{
			$ac=$_SESSION['ac_no'];
			$query="SELECT * FROM `CUSTOMERS` WHERE AC_NO='$ac';";  
			$result=mysqli_query($con,$query);
			$info=mysqli_fetch_assoc($result);
			$Email=$info['EMAIL'];
			$query="UPDATE SERVICES SET NetBanking_ID='$user_id',NetBanking_Pass='$pass1' WHERE AC_NO='$ac';";
			$result=mysqli_query($con,$query);
			if($result)
			{
				echo "<br>You have successfully changed your login credentials. <br>";
				// To send e-mail
				if(mail($Email,'Father\'s Bank Of India','Greetings !! Dear Customer, You have requested for new NetBanking ID & Password.    Your New Internet Banking id='.$user_id.'   Password='.$pass1.'.  If it was not you, immediately contact Home_Branch.    Regards , FBI' ))
					echo "Your ID & Password has been sent to your e-mail";
				else
					echo "<br>However,due to some technical error, your ID & Password could not be e-mailed to you. <br>";
				
				echo "<br>You will be logged out in few seconds. <h3>LogIn again with new login credentials.</h3><br><br>";
				session_destroy();
				echo "<script language=\"javascript\"> setTimeout(Myfunction,12000); ";
				echo "function Myfunction(){window.location=\"http://localhost/SE%20Project/Project/User/login_user.php\";}</script>";
			}
		}
	}
	else
		echo "Entered Passwords Do Not Match !!";
				
}	
?>