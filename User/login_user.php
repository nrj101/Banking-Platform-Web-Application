<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>::User Login::</title>
	<link rel="stylesheet" type="text/css" href="w3-4.css">
	<style>
		body{background:linear-gradient(rgba(12, 248, 252,0.4),rgba(10, 2, 242,1));}
		.w3-green{color:#ffffff; background-color:green;}
		#page{/*border:2px solid #05fc2e;*/ margin:5px auto 5px auto; padding:5px;}
		.header{/*background-color:#f7f7fc;*/margin:inherit;padding:inherit;}
		#logo{text-align:center;margin:inherit;padding:inherit;}
		img.LogoImg{width:32%; height:150px;border:1px solid #a35501; vertical-align:bottom;}
		abbr[title]{text-decoration:none; border:none;}
		.heading{color:blue;display:inline;}
		#content{ min-height: 390px;}
		.w3-button{margin:10px 2px 10px 2px;}
		.content{margin:10px auto 10px auto; height:400px; padding:inherit;text-align:center;}
		
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
					<a href="User_Home.php" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-green w3-hover-lime">Home</a>	
					<div class="w3-dropdown-hover">
					    <button class="w3-button w3-round-xlarge w3-green w3-hover-lime">My Profile <img src="../images/photo-avatar.png" alt="avatar.png" style="width:30px"/> </button>
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
	</div>
	<!--Content-->	
	<div class="content w3-container w3-col m12 l12 w3-center">
<?php
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
		$query="SELECT AC_NO FROM SERVICES WHERE NetBanking_Pass='$pass' AND NetBanking_ID='$user_id';";
        $result=mysqli_query($con,$query);
        $row=mysqli_num_rows($result);
        if($row==1)
        {
			$info=mysqli_fetch_assoc($result);
			$ac_no=$info['AC_NO'];
			$query="SELECT * FROM CUSTOMERS WHERE AC_NO='$ac_no';";
			$result=mysqli_query($con,$query);
			$info=mysqli_fetch_assoc($result);	
			
			$_SESSION['ac_no']=$ac_no;
			$_SESSION['User_ID']=$user_id;
			$_SESSION['KYC']=$info['KYC'];
			$_SESSION['Welcome']="Welcome,".$info['FNAME']." ".$info['LNAME'];
            header("location: User_Home.php");                    
        }
		else
        {
              echo "<h2>Incorrect username or password</h2>";
        }
	}
}
else
{
	header("location: ../HomePage.php");
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