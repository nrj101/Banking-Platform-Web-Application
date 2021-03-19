<?php
session_start();
if(!isset($_SESSION['ID']))
{
	header('location:../HomePage.php');
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>:: AADHAAR Seeding:: </title>
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
			#content-form{ min-height: 420px; float:none;  padding-bottom:100px;}
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
			<img src="images/building-image-7.jpg" alt="logo.jpg" class="LogoImg" align="left">
			<h1 class="heading" ><!--style="border:2px solid #f90e65;"--> <abbr title="Father's Bank Of India">:: FBI</abbr> -> Link Aadhaar ::</h1>
		</div>
		
		<!--Navigation Bar-->
		<div id="navigation" class="w3-bar">
			<a href="HomePage.php" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Home</a>	
			<a href="Online_application.php" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Apply Online</a>	
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Products</a>
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Services</a>
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">FAQ</a>
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Support</a>
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">About Us</a>
		</div>
	</div>
<?php
if  (!isset($_POST['Register'])) 
{ 
?>	
	<!--Content-->
	<div id="content-form" class="w3-container w3-col m12 l12 w3-center simple-form">	
			<form id="form-container" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
				<h2 class="form-name w3-bar">&nbsp;&nbsp;&nbsp;Aadhaar Linking Form&nbsp;&nbsp;&nbsp;</h2><br>
				<label>Account No. : </label><input type="text" name="ac_no" maxLength="7" pattern="[1][0][1][0-9]{4}" title="Required Valid 7 digit A/C No." id="button" required placeholder="Enter Your Account Number"><br><br>
				<label>Aadhaar No. : </label><input type="text" name="aadhaar" maxLength="12"  pattern="[0-9]{12}" title="Required Valid 12-digit AADHAAR No." id="button" required placeholder="Enter Your Aadhaar Number "><br><br>
				<input type="submit" name="Register" value="Link" id="butt">
            </form>
<?php
}
else
{
?>
	<!--Content-->
	<div id="content-php" class="w3-container w3-col m12 l12 w3-center">
<?php
	AADHAAR();
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

function AADHAAR()
{
    $con=new mysqli('localhost','root','','test') or die("Failed to connect to MySQL ".mysqli_error($con));
    
    if(!empty($_POST['ac_no']))
    {
        $query="SELECT * FROM CUSTOMERS WHERE AC_NO='$_POST[ac_no]'";
        $result=mysqli_query($con,$query) or die(mysqli_error($con));

        if(mysqli_num_rows($result)<1)
           {
            echo " Account Number Invalid  !!";        
        }
        else
        {
            $ac_no=$_POST['ac_no'];
            $aadhaar=$_POST['aadhaar'];
            $row=mysqli_fetch_assoc($result);
            if($row['AADHAAR']!=NULL)
            {
                echo "<h2>Aadhaar number is already seeded.</h2>If you want to change/update the AADHAAR number, fill in the KYC form.";
            }
            else
            {
                 $query="UPDATE CUSTOMERS SET AADHAAR='$aadhaar' WHERE AC_NO='$ac_no'";
                 $data=mysqli_query($con,$query) or die(mysqli_error($con));
                 if($data)
                 {
                     echo "AADHAAR entered successfully";
                 }
                else
                {
                     echo "An Error Occuered";
                 }
            }
             
            
        }
    }
}
?>
