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
	<title>Deposit Money</title>
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
			#content-form{ min-height: 420px; float:none;  padding-bottom:50px;}
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
					<a href="Deposit.php" class="w3-bar-item w3-button w3-round-xlarge w3-padding-large w3-red w3-hover-lime">Deposit</a>
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

<?php if(!isset($_POST['Deposit']))
{
?>
	<!--Content-->	
	<div id="content-form" class="w3-container w3-col m12 l12 w3-center simple-form">
		<form id="form-container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<h2 class="form-name w3-bar">&nbsp;&nbsp;&nbsp;Deposit Form&nbsp;&nbsp;&nbsp;</h2><br>
				<label> Deposit Into : </label><input type="text" name="AC_NO" id="button" maxLength="7" pattern="[1][0][1][0-9]{4}" title="Required Valid 7 digit A/C No." placeholder="Account No." required><br><br>
				<label> Account Holder : </label><input type="text" name="name" id="button" required pattern="[A-Z ]{3,20}" title="Required NAME 3 character or longer" onblur="this.value=this.value.toUpperCase()" placeholder="Name of Recipient" ><br><br>
				<label> Mode Of Deposit : </label><input type="text" name="Details" id="button" required pattern="[A-Z- 0-9]{4,20}" title="For Cheque/DD: CHQ/DD-< Cheque/DD No. >" onblur="this.value=this.value.toUpperCase()" placeholder="Cash / Cheque No. / DD No." ><br><br>
				<label> Amount : </label><input type="number" name="Amount" id="button" min="100" max="99999999.99" step="0.01" pattern="\d+(\.\d{1,2})" title="Minimum: INR 100.00  Maximum: INR 99000000" placeholder="Enter Amount (INR)" required ><br><br>
				<label> Depositor : </label><input type="text" name="Depositor" id="button" required pattern="[A-Z ]{3,20}" title="Required NAME 3 character or longer" onblur="this.value=this.value.toUpperCase()" placeholder="Name of Depositor" ><br><br>
				<input type="submit" name="Deposit" value="Deposit" id="butt" ><br><br><br><br>
		</form>
<?php
}
else
{
?>
	<!--Content-->
	<div id="content-php" class="w3-container w3-col m12 l12 w3-center">
<?php
	Deposit();
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
	
	function Deposit()
	{
		$con=new mysqli('localhost','root','','test') or die("Failed to connect to MySQL ".mysqli_error($con));
		$ac_no=$_POST['AC_NO'];
		$Amount=$_POST['Amount'];
		$Details=" + ".$_POST['Details']." by ".$_POST['Depositor'];
		
		$query="SELECT * FROM CUSTOMERS WHERE AC_NO='$ac_no'";
        $result=mysqli_query($con,$query) or die(mysqli_error($con));
        if(mysqli_num_rows($result)<1)
        {
			echo "Error 404! Account No. not found";            
        }
		else
		{
			$con=new mysqli('localhost','root','','customers') or die("Failed to connect to MySQL ".mysqli_error($con));
			//For Current Balance
			$query="SELECT Balance FROM `$ac_no` ORDER BY T_No DESC LIMIT 1;";  
			$result=mysqli_query($con,$query) or die(mysqli_error($con));
			$info=mysqli_fetch_assoc($result);
			$Balance=$info['Balance']+$Amount;
			
			$query="INSERT INTO `$ac_no` VALUES (NULL,'$Details', NOW(),'$Amount','0.00','$Balance')";
			$result=mysqli_query($con,$query) or die(mysqli_error($con));
			if($result)
			{
				echo "<div align=\"center\"><br><h3>Transaction Successful</h3>";
				echo "<br>Rs. $Amount Deposited to A/c : $ac_no.  Available Balance is Rs.$Balance</div>";
				echo "Returning to homepage in few seconds...";
				
				echo "<script language=\"javascript\"> setTimeout(Myfunction,8000); ";
				echo "function Myfunction(){window.location=\"http://localhost/SEProject/Project/Admin/Admin_Home.php\";}</script>";
				
			}
			
		}
	}
	
?>