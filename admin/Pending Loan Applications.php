<?php
session_start();
if(!isset($_SESSION['Admin_ID']))
{
	header('location:../HomePage.php');
}
$con=new mysqli('localhost','root','','test') or die("Failed to connect to MySQL ".mysqli_error($con));
$query="SELECT * FROM loan_applications ORDER BY AC_NO ASC LIMIT 30;";   
$result=mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Loan Applications</title>
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
			#content{ min-height: 390px;}
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
		<h2 align="center">Pending Loan Applications</h2>
		<table title="Loan Applications" border=4 width="100%" align="center" style="background-color:#010; color:#fff;">
		
		<tr> <th>ACTION 1</th><th>ACTION 2</th><th>AC_NO</th><th>LOAN_NO</th><th>NAME</th><th>CONTACT</th><th>DOA</th><th>LOAN TYPE</th><th>CITY</th><th>RES TYPE</th><th>EMP TYPE</th><th>AMOUNT (in Rs.)</th><th>AADHAAR</th></tr>
<?php
if(!$result)
{
	?>
	<h2 align="center">Zero Loan Applications pending for approval. </h2>
	<?php
}
else
{
	while($info=mysqli_fetch_assoc($result))
	{ 
		$ln=$info['LOAN_NO'];
		?>
		<tr>
		<td class="w3-center w3-hover-green"> 
				<a href="Loan_Approval.php?ln=<?php echo $ln ?>&Approve=Approve" >
				<div >
					<span class="w3-button w3-round-xlarge w3-medium w3-padding-large w3-green w3-hover-lime">Approve</span>
				</div></a>
				
		</td>
		<td class="w3-center w3-hover-green">    
				<a href="Loan_Approval.php?ln=<?php echo $ln ?>&Decline=Decline" >
				<div >
					<span class="w3-button w3-round-xlarge w3-medium w3-padding-large w3-green w3-hover-lime">Decline</span>
				</div></a>	
		</td>
		<td class="w3-center w3-hover-green">
				<a href="View_Ac_Direct.php?ac=<?php  echo $info['AC_NO'] ?>" >
				<div >
					<span class="w3-button w3-round-xlarge w3-medium w3-padding-large w3-green w3-hover-lime"><?php  echo $info['AC_NO'] ?></span>
				</div></a>
		</td>
		<td><?php  echo $info['LOAN_NO'] ?></td>		
		<td><?php  echo $info['NAME'] ?></td>
		<td><?php  echo $info['Contact'] ?></td>
		<td><?php  echo $info['DOA'] ?></td>
		<td><?php  echo $info['Loan_Type'] ?></td>
		<td><?php  echo $info['City'] ?></td>
		<td><?php  echo $info['Res_Type'] ?></td>
		<td><?php  echo $info['Emp_Type'] ?></td>
		<td><?php  echo $info['Amount'] ?></td>
		<td><?php  echo $info['AADHAAR'] ?></td>
		<td><?php  echo $info['PAN'] ?></td>
		<tr> 
		<?php
	}
}
?>
	</table><br>
	</div>
	<!--Footer-->
	<div class="footer w3-container w3-col m12 l12">
		<a href="#">Help</a>&nbsp;|&nbsp;<a href="#">Privacy Policy</a>&nbsp;|&nbsp;<a href="#">T&amp;C</a>&nbsp;|&nbsp;<a href="#">&copy;2018 <abbr title="Father's Bank Of India">FBI</abbr></a>
	</div>
</div>
</body>
</html>