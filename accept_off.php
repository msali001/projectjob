<?php session_start();
	if(isset($_POST['eid']))
	{
        include("includes/config.php");
        $q="UPDATE `applicants` SET `status` = 'ACCEPTED' WHERE `applicants`.`a_uid` = ".$_POST['eid']." AND `applicants`.`a_jid` = ".$_POST['jid'];
        //echo $q;
        mysqli_query($link,$q) or die("wrong query");
        header("location:show.php?id=".$_POST['jid']."&nm=".$_POST['nm']);
	
	}
	
	
?>
