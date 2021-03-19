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
			#content-form{ min-height: 420px; float:none;  padding-bottom:80;}
			#content-php{ min-height: 420px; padding: 100px 60px 0px 60px;}
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

<?php if(!isset($_POST['Submit']))
{
?>
	<!--Content-->
	<div id="content-form" class="w3-container w3-col m12 l12 w3-center simple-form">
       <form id="form-container" class="w3-container w3-center" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
			<h2 class="form-name w3-bar">&nbsp;&nbsp;&nbsp;Registration Form&nbsp;&nbsp;&nbsp;</h2><br>
            <label>First Name : </label><input type="text" name="fname" onblur="this.value=this.value.toUpperCase()" pattern="[A-Z ]{3,20}" title="Required NAME 3 character or longer" id="button" required placeholder="Enter Your First Name"><br><br>
            <label >Last Name : </label><input type="text" name="lname" onblur="this.value=this.value.toUpperCase()" pattern="[A-Z ]{3,20}" title="Required NAME 3 character or longer" id="button" required placeholder="Enter Your Last Name"><br><br>
<!--Cool Date placeholder hack-->			
			<label >DOB : </label><input type="text" name="dob" id="button" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" required placeholder="Enter Your DOB"><br><br>
<!---->		<label >Gender : </label><select class="drop-select" name="Gender"><option value="Male" selected>Male</option><option value="Female">Female</option><option value="Others">Others</option></select><br><br>
<!---->		<label >A/C Type : </label><select class="drop-select type" name="Type"><option value="Current">Current A/C</option><option value="Savings" selected>Savings A/C</option><option value="Recurring Deposit">Recurring Deposit A/C</option><option value="Fixed Deposit">Fixed Deposit A/C</option><option value="PPF">PPF A/C</option></select><br><br>
<!---->		<label >Father's Name : </label><input type="text" name="Father" onblur="this.value=this.value.toUpperCase()" maxLength="20" pattern="[A-Z ]{6,20}" title="Required FULL NAME 6 character or longer" id="button" required placeholder="No titles (eg. Mr./Dr. etc)"><br><br>
<!---->		<label >Mother's Name : </label><input type="text" name="Mother" onblur="this.value=this.value.toUpperCase()" maxLength="20" pattern="[A-Z ]{5,20}" title="Required FULL NAME 5 character or longer" id="button" required placeholder="No titles (eg. Mrs./Dr. etc)"><br><br>
            <label >Your Email : </label><input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Required Valid E-mail address" id="button" required placeholder="Enter Your email id"><br><br>
            <label >Current Address : </label><textarea name="addr" rows="2" cols="45" maxLength="70" id="button" label="Enter correct correspondence address" required placeholder="Enter your address in full, with PIN code..."></textarea><br><br>
            <label >AADHAAR No. : </label><input type="text" name="aadhaar" id="button" maxLength="12" pattern="[0-9]{12}" title="Required Valid 12-digit AADHAAR No." placeholder="Enter your aadhaar no." required><br><br>
			<label >PAN : </label><input type="text" name="PAN" id="button" onblur="this.value=this.value.toUpperCase()" maxLength="10" pattern="[A-Z]{5}[0-9]{4}[A-Z]" title="Required Valid PAN" required placeholder="Enter your PAN no."><br><br>
            <label >Mobile No. : </label><select class="drop-select" name="code"><option  selected>+91</option><option>+92</option><option>+93</option></select>
            <input type="text" name="num" maxLength="10" pattern="[789][0-9]{9}" title="Required Valid Mobile Number" required placeholder="Enter Your Mobile Number" id="phone"><br><br>
            <input type="submit" name="Submit" value="Submit" id="butt">
            </form>
<?php
}
else
{
?>
	<!--Content-->
	<div id="content-php" class="w3-container w3-col m12 l12 w3-center">
<?php
	Verify();
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
function newUser(){
    $con=new mysqli('localhost','root','','test') or die("Failed to connect to MySQL ".mysqli_error($con));
	$gender=$_POST['Gender'];
	$fname=$_POST['fname'];
    $lname=$_POST['lname'];
	$father=$_POST['Father'];
	$mother=$_POST['Mother'];
	$gender=$_POST['Gender'];
	$ac_type=$_POST['Type'];
    $email=$_POST['email'];
    $addr=$_POST['addr'];
    $dob=$_POST['dob'];
    $num=$_POST['code'].$_POST['num'];
    $aadhaar=$_POST['aadhaar'];
	$PAN=$_POST['PAN'];

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
		
		$query2="INSERT INTO SERVICES(AC_NO,NetBanking_ID,NetBanking_Pass) VALUES ('$ac','$f','$mixed');";
		$data2=mysqli_query($con,$query2) or die(mysqli_error($con));
		echo "<br>A/C No : $ac<br>";
			
		if($data2)
		{
			if(mail($email,'Father\'s Bank Of India','Greetings !! Dear Customer, You have successfully opened an account with us.  Your account no. : '.$ac.'  Your Internet Banking id='.$f.'   Your Password='.$mixed.'.  You will need to complete your KYC details before you can use our Online Banking Services.    Regards , FBI' ))
				echo "E-mail with ID & Password sent successfully";
			else
				echo "<br>Error Sending E-mail<br>";
		}

		// To create table for user with Account No.

		$query="CREATE TABLE `customers`.`$ac` ( `T_No` INT(6) NOT NULL AUTO_INCREMENT , `Description` VARCHAR(50) NOT NULL , `Date` DATE NOT NULL , `Credit` DECIMAL NOT NULL , `Debit` DECIMAL NOT NULL , `Balance` DECIMAL NOT NULL , PRIMARY KEY (`T_No`)) ENGINE = InnoDB;";
		$con=new mysqli('localhost','root','','customers') or die("Failed to connect to MySQL ".mysqli_error($con));
		$data=mysqli_query($con,$query) or die(mysqli_error($con));
		$query="INSERT INTO `$ac` VALUES ('151000','Start', NOW(),'0.00','0.00','0.00')";
		$result=mysqli_query($con,$query) or die(mysqli_error($con));
	}
		
	else
		echo "<h3>Registration failed</h3>";
}

function Verify()
{
    $con=new mysqli('localhost','root','','test') or die("Failed to connect to MySQL ".mysqli_error($con));
    
    if(!empty($_POST['num']))
    {
        $query="SELECT * FROM CUSTOMERS WHERE PHONE='$_POST[num]'";
        $result=mysqli_query($con,$query) or die(mysqli_error($con));

        if(mysqli_num_rows($result)<1)
           {
            newUser();          
        }
        else
        {
            echo " SORRY.. YOU ARE ALREADY REGISTERED";
        }
    }
}
?>