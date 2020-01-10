<?php
	if(empty($_POST))
	{
		exit;
	}
	$msg=array();
	if(empty($_POST['nm'])|| empty($_POST['email'])|| empty($_POST['query']))
	{
		$msg[]="one of your field is empty";
	}

	if(!empty($msg))
	{
		$err = "<b>Errors:</b><br>";
		foreach($msg as $k)
		{
			$err .= "<li>".$k."</li>";
		}
		header("location:Contact.php?error=$err");
	}
	else
	{
		include("includes/config.php");
		
		$nm=$_POST['nm'];
		$email=$_POST['email'];
		$query=$_POST['query'];
		
		$q="insert into contact(cont_fnm,cont_email,cont_query)
		   values ('$nm','$email','$query')";
		   
		mysqli_query($link,$q)or die("wrong query");
		mysqli_close($link);
		header("location:contact.php");
	}
?>
