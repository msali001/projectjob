<?php session_start();
if(!(isset($_SESSION['status']) && $_SESSION['unm']=='admin'))
{
	header("location:../index.php");
}
include("../includes/config.php");
$q="delete from contact where cont_fnm='".$_GET['cat']."'";
mysqli_query($link,$q) or die ("wrong query");
mysqli_close($link);
header("location:contact.php");
?>
