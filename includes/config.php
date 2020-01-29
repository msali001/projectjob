<?php
        //error_reporting(E_ALL ^ E_NOTICE);
	$dbhost="localhost";
	$dbusr="root";
	$dbpass="";
	$database="jobscope";
	$link = mysqli_connect($dbhost,$dbusr,$dbpass,$database) or die("databse not connected");
?>
