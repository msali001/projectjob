<?php
        include("includes/config.php");
	if(empty($_POST))
	{
		exit;
	}
	$msg=array();
	if(empty($_POST['nm'])|| empty($_POST['cnm'])|| empty($_POST['addr'])||
	empty($_POST['ph'])|| empty($_POST['email'])|| empty($_POST['profile']) ||empty($_POST['pwd']))
	{
		$msg[]="One of your field is empty";
	}

	
	if(strlen($_POST['pwd'])<6)
	{
		$msg[]="Please enter atlist 6 digit password";
		echo $_POST['pwd'];
	}
	if(strlen($_POST['ph'])!=10)
	{////
	
		$msg[]="Please enter 10 digit number";

	}

	if(!empty($msg))
	{
		$err = "<b> Errors:</b><br>";
		foreach($msg as $k)
		{
			$err .= "<li>".$k."</li>";
		}
		header("location:employerregister.php?error=$err");
	}
	else
	{
		
		
		$nm=$_POST['nm'];
		$cnm=$_POST['cnm'];
		$addr=$_POST['addr'];
		$ph=$_POST['ph'];
		$email=$_POST['email'];
		$profile=$_POST['profile'];
		$pwd=$_POST['pwd'];
		
		
		$q="insert into employers(er_fnm,er_pwd,er_company,er_add,er_ph,er_email,er_company_profile)
		   values ('$nm','$pwd','$cnm','$addr','$ph','$email','$profile')";
		//echo $q;   
		mysqli_query($link,$q)or die("wrong query");
		mysqli_close($link);
		echo "<script>alert('Employer Successfully registered');window.location.href = 'employerregister.php';</script>";
		//header("location:employerregister.php");
	}
?>
