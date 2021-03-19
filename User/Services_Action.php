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
	<title>Services</title>
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
			.heading{color:blue;display:inline; border-bottom: 2px solid #f90e65;}
			#content{ min-height: 390px;}
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

	<!--Content-->
	<div id="content" class="w3-container w3-col m12 l12 w3-center">
		<div class="w3-bar" style="border-bottom: 2px solid #f90e65; margin:0px; padding:0px; color:blue;" align="center"><h1 class="w3-bar-item"> Services -> </h1>

<?php
	$con=new mysqli('localhost','root','','test') or die("Failed to connect to MySQL ".mysqli_error($con));
	$ser=$_GET['ser'];
	$ac=$_SESSION['ac_no'];

	if($ser=="dc"||$ser=="cc")
	{
		$a=mt_rand(5600,9999);
		$b=mt_rand(1000,9999);
		$c=mt_rand(1000,9999);
		$d=mt_rand(1000,9999);
		$no=$a." ".$b." ".$c." ".$d;
		$month=mt_rand(1,12);
		if($month/10<1)
			$month="0".$month;
		$year=mt_rand(2023,2035);
		$cvv=mt_rand(101,999);
		if($ser=="dc")
			$query="UPDATE SERVICES SET Debit_Card='$no' WHERE AC_NO='$ac';";
		else
			$query="UPDATE SERVICES SET Credit_Card='$no' WHERE AC_NO='$ac';";
		$data=mysqli_query($con,$query) or die(mysqli_error($con));
		if($data)
		{
			if($ser=="dc")
			{
				?>
				<h1 class="w3-bar-item">&nbsp;&nbsp;&nbsp;Debit Card&nbsp;&nbsp;</h1></div><br><br><br>
				<?php
				echo "We are happy to extend our Debit Card Service to you. The details of your virtual credit card are provided below.<br><br>";
				echo "Debit Card No. : $no<br>";
				echo "Expires In : $month/$year<br>";
				echo "CVV : $cvv<br>";
				echo "You will receive a physical copy of this card in a few days by post at the registered address.<br><br>Regards,<br> FBI";
			}
			else
			{
				?>
				<h1 class="w3-bar-item">&nbsp;&nbsp;&nbsp;Credit Card&nbsp;&nbsp;</h1></div><br><br><br>
				<?php
				echo "We are happy to extend our Credit Card Service to you. The details of your virtual credit card are provided below.<br><br>";
				echo "Credit Card No. : $no<br>";
				echo "Expires In : $month/$year<br>";
				echo "CVV : $cvv<br>";
				echo "Card Type : Platinum<br><br>";
				echo "You will receive a physical copy of this card in a few days by post at the registered address.<br><br>Regards,<br> FBI";
			}				
		}		
		else
			echo "<h2>Problem processing the request.Please try later...</h2>";
	}
	else if($ser=="chq")
	{
		?>
		<h1 class="w3-bar-item">&nbsp;&nbsp;&nbsp;New Cheque Book&nbsp;&nbsp;</h1></div><br><br><br>
		<?php
		$a=mt_rand(20000,99999);
		$b=mt_rand(20000,99999);
		$chq="$a"."$b";
		$query="UPDATE SERVICES SET ChequeBook='$chq' WHERE AC_NO='$ac';";
		$data=mysqli_query($con,$query) or die(mysqli_error($con));
		if($data)
		{
			echo "Your request for a new Cheque Book has been recieved.<br>";
			echo "Cheque Book No. : $chq<br><br>";
			echo "You will receive a new Cheque Book with above number in a few days by post at the registered address.<br><br>Regards,<br> FBI";
		}
		else
			echo "<h2>Problem processing the request.Please try later...</h2>";
	}
	else
	{
		?>
		<h1 class="w3-bar-item">&nbsp;&nbsp;&nbsp;Mobile Banking&nbsp;&nbsp;</h1></div><br><br><br>
		<?php
		$query="SELECT PHONE FROM CUSTOMERS WHERE AC_NO='$ac'";
		$data=mysqli_query($con,$query) or die(mysqli_error($con));
		$info=mysqli_fetch_assoc($data);
		$mob=$info['PHONE'];
		$query="UPDATE SERVICES SET Mobile_Banking='$mob' WHERE AC_NO='$ac';";
		$data=mysqli_query($con,$query) or die(mysqli_error($con));
		
		if($data)
		{
			echo "Welcome to the Mobile Banking service of FBI.<br>";
			echo "Registered Mobile No. : $mob<br><br>Mobile Banking has been activated on above number.<br><br>";
			echo "Regards,<br> FBI";
		}
		else
			echo "<h2>Problem processing the request.Please try later...</h2>";
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