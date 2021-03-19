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
	<title>KYC</title>
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
		<form id="form-container" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" >	
			<h2 class="form-name w3-bar">&nbsp;&nbsp;&nbsp;KYC Form&nbsp;&nbsp;&nbsp;</h2><br> 
			<input type="hidden" name="MAX_FILE_SIZE" value="8000000" /> 
			<label>A/C No. : </label><input type="text" name="ac" id="button" maxLength="7" pattern="[1][0][1][0-9]{4}" title="Required Valid 7 digit A/C No." placeholder="Enter Account Number" required ><br><br>
			<label>First Name : </label><input type="text" name="fname" id="button" maxLength="20" onblur="this.value=this.value.toUpperCase()" pattern="[A-Z ]{3,20}" title="Required NAME 3 character or longer" required placeholder="Enter Your First Name"><br><br>
			<label>Last Name : </label><input type="text" name="lname" id="button" maxLength="20" onblur="this.value=this.value.toUpperCase()" pattern="[A-Z ]{3,20}" title="Required NAME 3 character or longer" required placeholder="Enter Your Last Name"><br><br>
			<label>Date Of Birth : </label><input type="date" name="dob" id="button" required placeholder="Enter your dob"><br><br>
			<label>Aadhaar No. : </label><input type="text" name="Aadhaar" maxLength="12"  pattern="[0-9]{12}" title="Required Valid 12-digit AADHAAR No." id="button" required placeholder="Enter your AADHAAR No."><br><br>
			<label>Current Address : </label><textarea name="addr" maxLength="70" rows="2" cols="45" id="button" autocomplete required placeholder="Enter your address in full, with PIN code..."></textarea><br><br>
			<div align="center"><img src="" style="display:none;" height="90" width="90" id="Photo" alt="Photo"/> </div>
			<label>Photo (.jpg only) : </label>			<input type="file" name="Photo" id="PHOTO" onchange="showImage.call(this)" required /><br><br>
			<div align="center"> <img src="" style="display:none;" height="50" width="100" id="Signature" alt="Signature"/> </div>
			<label>Signature (.jpg only) : </label> 	<input type="file" name="Signature" onchange="showImage.call(this)" required /><br><br>
			<div align="center"> <img src="" style="display:none;" height="110" width="120" id="ID" alt="ID"/> </div>
			<label>ID (.jpg only) : </label> 	<input type="file" name="ID" onchange="showImage.call(this)" required /><br><br>
			<input type="submit" name="Submit" value="Upload" id="butt" /><br><br><br><br>
		</form>
		<p align="center">** Warning !! These Details Might Modify The Corresponding Details Provided Earlier.</p>
<?php
}
else
{
?>
	<!--Content-->
	<div id="content-php" class="w3-container w3-col m12 l12 w3-center">
<?php
	KYC_Admin();
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
		<script>
			function showImage(img)
			{
				
				if(this.files && this.files[0])
				{
					var element_id=this.name;					//It works only because name attribute of file input matches exactly with id of corresponding <img> display input
					var obj=new FileReader();
					obj.onload=function(data){
						
						var Image=document.getElementById(element_id);
						Image.src=data.target.result; 
						Image.style.display="block";					
					}
					obj.readAsDataURL(this.files[0]);
				}
			}
		</script>
<?php
 
function KYC_Admin()
	{
		$pTmpname=$_FILES['Photo']['tmp_name'];
		$pName=$_FILES['Photo']['name'];
		$ptype=$_FILES['Photo']['type'];
		$psize=$_FILES['Photo']['size'];
		$p_ext=pathinfo($pName,PATHINFO_EXTENSION);

		$sTmpname=$_FILES['Signature']['tmp_name'];
		$sName=$_FILES['Signature']['name'];
		$stype=$_FILES['Signature']['type'];
		$ssize=$_FILES['Signature']['size'];	
		$s_ext=pathinfo($sName,PATHINFO_EXTENSION);
		
		$idTmpname=$_FILES['ID']['tmp_name'];
		$idName=$_FILES['ID']['name'];
		$idtype=$_FILES['ID']['type'];
		$idsize=$_FILES['ID']['size'];	
		$id_ext=pathinfo($idName,PATHINFO_EXTENSION);
		
		// FILE CHECKS
		$allowedFileTypes  =  array("image/jpeg");
		//  check  if  file  size  is  zero
		if  ($psize == 0){  
			die("ERROR:  Zero  byte  Photo  upload");
		}
		else if($ssize == 0){ 
			die("ERROR:  Zero  byte  Signature  upload");
		}
		else if($idsize == 0){  
			die("ERROR:  Zero  byte  ID  upload");
		}
		//  check  if  file  type  is  allowed 
		if ( (!in_array($ptype,  $allowedFileTypes)) || (!in_array($stype,  $allowedFileTypes))  ||  (!in_array($idtype,  $allowedFileTypes)) )
		{
			die("ERROR:  File  type  not  permitted");
		}
		//  check  if  this  is  a  valid  upload
		if  ( (!is_uploaded_file($pTmpname)) || (!is_uploaded_file($sTmpname)) || (!is_uploaded_file($idTmpname)) )   
		{
			die("ERROR:  Not  a  valid process for file  upload");
		}		
		
		//DATA CHECKS
		$con=new mysqli('localhost','root','','test') or die("Failed to connect to MySQL ".mysqli_error($con));
		$ac_no=$_POST['ac'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];		
		$query="SELECT * FROM customers WHERE AC_NO='$ac_no';";
		$result=mysqli_query($con,$query) or die("Failed to connect to database. ".mysqli_error($con));
		$info=mysqli_fetch_assoc($result);
		if( ($fname!=$info['FNAME']) || ($lname!=$info['LNAME']) )
		{
			die("ERROR:  Names do not match");
		}
		//Input Data
		$dob=$_POST['dob'];
		$addr=$_POST['addr'];
		$aadhaar=$_POST['Aadhaar'];
		
		$pNewName=$ac_no.".".$p_ext;		
		$sNewName=$ac_no.".".$s_ext;	
		$idNewName=$ac_no.".".$id_ext;
		//  set  the  name  of  the  target  directory
		$pUpload  =  "../Uploads/Photos/";
		$sUpload  =  "../Uploads/Signatures/";
		$idUpload  =  "../Uploads/IDs/";
		if( move_uploaded_file($pTmpname,  $pUpload . $pNewName) && move_uploaded_file($sTmpname,  $sUpload . $sNewName)  && move_uploaded_file($idTmpname,  $idUpload . $idNewName) )
		{
			$query="UPDATE CUSTOMERS SET KYC='1',DOB='$dob',ADDRESS='$addr',AADHAAR='$aadhaar' WHERE AC_NO='$ac_no';";
		//	$query="INSERT INTO CUSTOMERS(KYC,DOB,ADDRESS,AADHAAR) VALUES('1','$dob','$addr','$aadhaar') WHERE AC_NO='$ac_no';";
			if(mysqli_query($con,$query))
			{
				//  display  success  message
				echo  "<h2>KYC form received.Account has been activated.</h2>";
			}
			else
				echo "<h2>Error Submitting KYC form!! Please Try Again ..</h2>";			
		}
		else
			echo "<h2>Error Submitting KYC form!! Please Try Again ....</h2>";
			
			
	}
	
?>