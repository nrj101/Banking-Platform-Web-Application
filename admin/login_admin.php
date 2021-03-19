<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>::Admin Login::</title>
	<link rel="stylesheet" type="text/css" href="w3-4.css">
	<style>
		body{background:linear-gradient(rgba(12, 248, 252,0.4),rgba(10, 2, 242,1));}
		.w3-green{color:#ffffff; background-color:green;}
		#page{/*border:2px solid #05fc2e;*/ margin:5px auto 5px auto; padding:5px;}
		.header{/*background-color:#f7f7fc;*/margin:inherit;padding:inherit;}
		#logo{text-align:center;margin:inherit;padding:inherit;}
		img.LogoImg{height:150px;border:1px solid #a35501; vertical-align:bottom;}
		abbr[title]{text-decoration:none; border:none;}
		.heading{color:blue;display:inline;}
		.w3-button{margin:10px 2px 10px 2px;}
		
		.content{margin:10px auto 10px auto; height:400px; padding:inherit;text-align:center;}
		#sidebar1{width:20%; height:400px; margin:0 0.8%; padding:0.2%; float:left;clear:left; border:2px solid #f90e65;}
		.w3-ul li{border-bottom: 1px solid #f90e65;}
		.w3-ul.w3-hoverable li:hover{background-color:green;}
		#sidebar2{width:25%; height:400px; margin:0 0.8%; padding:0.8%; float:left;clear:right; border:2px solid #f90e65;}
		#main{width:50%; height:400px; margin:0 0.7%; float:left; /*border:2px solid #f90e65;*/}
		.mySlides {display:none; border:1px solid #f90e65;}
		.footer{height:50px; color:white; text-align:right; margin:10px auto 5px auto; padding:20px 15px 0px 0px;}
		.footer a{text-decoration:none;}
	</style>
	
</head>


<body>
<div id="page" class="w3-container">
	<!--Header-->
	<div class="header w3-container w3-col m12 l12 w3-center">
		<div id="logo">
			<img src="../images/building-image-7.jpg" alt="logo.jpg" class="LogoImg" align="left">
			<h1 class="heading">Think banking, think <abbr title="Father's Bank Of India">FBI.</abbr> </h1>
		</div>
		<!--Navigation Bar-->
		<div id="navigation" class="w3-bar">
			<a href="../HomePage.php" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Home</a>	
			<a href="../Online_application.php" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Apply Online</a>	
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Products</a>
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Services</a>
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">FAQ</a>
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">Support</a>
			<a href="#" class="w3-bar-item w3-button w3-round-xlarge w3-green w3-hover-lime">About Us</a>
		</div>
	</div>
	<!--Content-->	
	<div class="content w3-container w3-col m12 l12 w3-center">
<?php
session_start();
$con=new mysqli('localhost','root','','test') or die("Failed to connect to MySQL ".mysqli_error($con));
if(isset($_POST['submit'])){
    if(empty($_POST['user_id'])||empty($_POST['pass']))
    {
        echo "Both fields are required ";
    }
    else
    {
        $user_id=$_POST['user_id'];
        $pass=$_POST['pass'];
		$query="SELECT * FROM ADMINS WHERE PASSWORD='$pass' AND USER_ID='$user_id';";
        $result=mysqli_query($con,$query);
        $row=mysqli_num_rows($result);
        if($row==1)
        {
			$info=mysqli_fetch_assoc($result);
			$_SESSION['Welcome']="Welcome, Mr.".$info['FNAME']." ".$info['LNAME'];
			$_SESSION['Admin_ID']="$user_id";
            header("location: Admin_Home.php");                    
        }
		else
        {
              echo "<h2>Incorrect username or password</h2>";
        }
	}
}
else
{
	header("location: ../HomePage.html");
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