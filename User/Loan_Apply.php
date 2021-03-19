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
	<title>Loan Application</title>
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
					<a href="Transfer.php" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-green w3-hover-lime">Transfer</a>
					<a href="../LogOut.php" id="logout" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-green w3-hover-lime"> <!--style="float:right; clear:right;"-->LogOut</a>
				
				</div>
		<div id="welcome" style="margin-right:1%; float:right; clear:both;">
			<p class="w3-text-white" ><?php echo $_SESSION['Welcome']?></p>
		</div>
	</div>
	
<?php
if(!isset($_POST['Apply']))
{
?>
	<!--Content-->	
	<div id="content-form" class="w3-container w3-col m12 l12 w3-center simple-form">
		<form id="form-container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<h2 class="form-name w3-bar">&nbsp;&nbsp;&nbsp;Loan Application Form&nbsp;&nbsp;&nbsp;</h2><br>
			<label> Loan Type : </label><select name="LT" class="drop-select type">
				<option value="PL" selected="selected">Personal Loan</option>
				<option value="CR" >Car Loan</option>
				<option value="ED">Education Loan</option>
				<option value="AG">Agriculture Loan</option>
				<option value="BS">Business Loan</option>
			</select><br><br>
			<label> City : </label><input type="text" name="City" id="button" onblur="this.value=this.value.toUpperCase()" pattern="[A-Z]{3,20}" title="Required Proper City Name as applicable" required placeholder="Current City" ><br><br>
			<label> Residence Type : </label><select name="RT" class="drop-select type">
				<option value="SO">Self/Spouse Owned</option>
				<option value="FO" selected >Owned by Family/Sibling</option>
				<option value="RWF">Rented With Family</option>
				<option value="RA">Rented Alone</option>
				<option value="PG">Paying Guest</option>
				<option value="CP">Company Provided</option>
			</select><br><br>
			<label> Employment Type : </label><select name="ET" class="drop-select type">
				<option value="SAL" selected="selected">Salaried</option>
				<option value="SED" >Self Employed</option>
				<option value="RTR">Retired</option>
				<option value="STU">Student</option>
				<option value="HM">Homemaker</option>
			</select><br><br>
			<label> Contact No. : </label> <select class="drop-select" name="code"><option selected>+91</option><option>+92</option><option>+93</option></select>
											<input type="text" name="num" maxLength="10" pattern="[789][0-9]{9}" title="Required Valid Mobile Number" placeholder="Enter Your Mobile Number" id="phone" required><br><br>
			<label> Loan Amount : </label><input type="number" name="Amount" id="button" min="10000" max="5000000.00" step="0.01" pattern="\d+(\.\d{1,2})" title="Minimum: INR 10000.00  Maximum: INR 5000000.00" required placeholder="Enter Loan Amount" ><br><br>
			<label> Aadhaar No. : </label><input type="text" name="Aadhaar" id="button" maxLength="12"  pattern="[0-9]{12}" title="Required Valid 12-digit AADHAAR No." required placeholder="Your Aadhaar No" ><br><br><br>
			<label> PAN : </label><input type="text" name="PAN" maxLength="10" id="button"  pattern="[A-Z]{5}[0-9]{4}[A-Z]" title="Required Valid PAN" onblur="this.value=this.value.toUpperCase()" required placeholder="Enter PAN" ><br><br><br>
			<input type="submit" name="Apply" value="Apply" id="butt">
	  </form>
<?php
}
else
{
?>
	<!--Content-->
	<div id="content-php" class="w3-container w3-col m12 l12 w3-center">
<?php
	$ac_no=$_SESSION['ac_no'];	
	$con=new mysqli('localhost','root','','test') or die("Failed to connect to MySQL ".mysqli_error($con));
	$query="SELECT * FROM SERVICES WHERE AC_NO='$ac_no';";
	$result=mysqli_query($con,$query);
	$info=mysqli_fetch_assoc($result);
	if($info['Loan1']==NULL || $info['Loan2']==NULL )
	{	
		Apply();
	}
	else
		echo "<h2>Error !  You cannot apply for more than 2 loans from one account</h2>";
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

function Apply()
{
	$ac_no=$_SESSION['ac_no'];	
	$con=new mysqli('localhost','root','','test') or die("Failed to connect to MySQL ".mysqli_error($con));
	$query="SELECT * FROM customers WHERE AC_NO=$ac_no;";
	$result=mysqli_query($con,$query);
	$info=mysqli_fetch_assoc($result);
	$Name=$info['FNAME']." ".$info['LNAME'];
	$Contact=$_POST['code'].$_POST['num'];;
	$LT=$_POST['LT'];
	$City=$_POST['City'];
	$RT=$_POST['RT'];
	$ET=$_POST['ET'];
	$Amount=$_POST['Amount'];
	$Aadhaar=$_POST['Aadhaar'];
	$PAN=$_POST['PAN'];
	
	$query="INSERT INTO loan_applications VALUES(NULL,'$ac_no','$Name','$Contact',NOW(),'$LT','$City','$RT','$ET','$Amount','$Aadhaar','$PAN');";
	$result=mysqli_query($con,$query);
	if($result)
	{
		echo "<div align=\"center\"><h3>Your application has been received. You will receive an E-mail upon approval of your request...</h3>";
		echo "You will be automatically redirected to your homepage in few seconds...";
				
		echo "<script language=\"javascript\"> setTimeout(Myfunction,8000); ";
		echo "function Myfunction(){window.location=\"http://localhost/SEProject/Project/User/User_Home.php\";}</script>";
	}
	else
	{
		echo "<div align=\"center\"><h3>Some error occured !  Please try again..</h3>";
		echo "You will be automatically redirected to your homepage in few seconds...";
				
		echo "<script language=\"javascript\"> setTimeout(Myfunction,8000); ";
		echo "function Myfunction(){window.location=\"http://localhost/SEProject/Project/User/User_Home.php\";}</script>";
	}
}	
?>