<?php
	if(empty($_POST))
	{
		exit;
	}
	$msg=array();
	if(empty($_POST['qs'])|| empty($_POST['ans']))
	{
		$msg[]="one of your field is empty";
	}
	echo $_POST['qs'].$_POST['ans'];

	if(!empty($msg))
	{
		$err = "<b>Errors:</b><br>";
		foreach($msg as $k)
		{
			$err .= "<li>".$k."</li>";
		}
		header("location:manage_faq.php?error=$err");
	}
	else
	{
		include("../includes/config.php");
		
		$nm=$_POST['qs'];
		$query=$_POST['ans'];
		

		$q="INSERT INTO `faq` (`faq_qs`, `faq_ans`) VALUES ('$nm','$query')";
		   
		mysqli_query($link,$q)or die("wrong query");
		mysqli_close($link);
		header("location:manage_faq.php");
	}
?>
