<?php session_start();
if(!(isset($_SESSION['status']) && $_SESSION['unm']=='admin'))
{
	header("location:../index.php");
}
include("../includes/config.php");
$q="delete from faq where faq_id='".$_GET['cat']."'";
mysqli_query($link,$q) or die ("wrong query");
mysqli_close($link);
header("location:manage_faq.php");
?>
