<?php

	include("includes/config.php");
	
	session_start();
	
	if(empty($_POST))
	{
		exit;
	}
	$msg=array();
	if(empty($_POST['nm'])|| empty($_POST['email'])|| empty($_POST['addr'])||
	empty($_POST['ph'])|| empty($_POST['mobile'])|| empty($_POST['cl'])|| empty($_POST['cas'])||
	empty($_POST['cindustry'])||empty($_POST['quali'])|| empty($_POST['profile']) || empty($_POST['pwd'] ))
	{
		$msg[]="One of your field is empty";
	}
	if(strlen($_POST['pwd'])<6)
	{
		$msg[]="Please enter atlist 6 digit password";
	}

	if(strlen($_POST['ph'])!=10)
	{
	
		$msg[]="Please enter 10 digit number";

	}
	if(strlen($_POST['mobile'])!=10)
	{
		$msg[]="Please enter 10 digit number";
	}
	if(!is_numeric($_POST['cas']))
	{
		$msg[]="Only numeric value is valid in Current Anual Salary";
	}
	$flg = true;
	if(empty($_FILES['resume']['name']))
	{
		$flg= false;
		
	}
	
	if($_FILES['resume']['error']>0 && $flg)
	{
		$msg[] = "Error uploading file";
	}
	
	if(file_exists("uploads/".$_FILES['resume']['name']) && $flg)
	{
		$msg[] = "This file is already uploaded.";
	}
	
	//echo strtoupper(substr($_FILES['resume']['name'],-4));

	if(!(strtoupper(substr($_FILES['resume']['name'],-4))=='.PDF') && $flg)
	{
		$msg[] = "Wrong file type";
	}

	if(!empty($msg))
	{
		$err = "<b> Errors:</b><br>";
		foreach($msg as $k)
		{
			$err .= "<li>".$k."</li>";
		}
		header("location:employeeregister.php?error=$err");
	}
	else
	{
		
		
		$nm=$_POST['nm'];
		$email=$_POST['email'];
		$addr=$_POST['addr'];
		$ph=$_POST['ph'];
		$mobile=$_POST['mobile'];
		$cl=$_POST['cl'];
		$cas=$_POST['cas'];
		$cindustry=$_POST['cindustry'];
		$quali=$_POST['quali'];
		$profile=$_POST['profile'];
		$pwd=$_POST['pwd'];
		$eid = $_SESSION['eeid'];
		if ($flg) {
			$randstr = rand();
			move_uploaded_file($_FILES['resume']['tmp_name'],"uploads/".$randstr.$_FILES['resume']['name']);
			$path = "uploads/".$randstr.$_FILES['resume']['name'];
			

			
			$q="update  employees set ee_resume ='$path',ee_pwd ='$pwd',ee_fnm ='$nm',ee_email ='$email',ee_add='$addr',ee_phno='$ph',ee_mobileno='$mobile',ee_current_location='$cl',ee_annualsalary ='$cas',ee_current_industry='$cindustry',ee_qualification='$quali',ee_profile='$profile' where ee_id = $eid";
		}
		else {
			$q="update  employees set ee_pwd ='$pwd',ee_fnm ='$nm',ee_email ='$email',ee_add='$addr',ee_phno='$ph',ee_mobileno='$mobile',ee_current_location='$cl',ee_annualsalary ='$cas',ee_current_industry='$cindustry',ee_qualification='$quali',ee_profile='$profile' where ee_id = $eid";
		}
		//echo $q;  
		mysqli_query($link,$q)or die("wrong query");
		mysqli_close($link);
		echo "<script>alert('Employer Successfully registered');window.location.href = 'index.php';</script>";
		//header("location:employeeregister.php");
	}
?>
