<?php
	if(empty($_GET))
	{
		header("location:index.php");
	}
	
		include("includes/config.php");
		
		$q="delete from jobs where j_id=".$_GET['id'];
		
		mysqli_query($link,$q);
		
		header("location:manage.php");	
?>
