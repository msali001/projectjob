<?php
	if(empty($_GET))
	{
		header("location:index.php");
	}
	
		include("../includes/config.php");
		
		$q="update jobs
			set j_active=1
			where j_id=".$_GET['id'];
		
		mysqli_query($link,$q);
		
		header("location:verify.php");	
?>
