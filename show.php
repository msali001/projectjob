<?php session_start();
        include("includes/config.php");
	if(! isset($_SESSION['status']))
	{
		header("location:index.php");
	}
		
		
		$q="select * from employees where ee_id in(select a_uid from applicants where a_jid=".$_GET['id']." )";
	
		$res=mysqli_query($link,$q) or die ("wrong query");
		
		
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Flowerily 
Description: A two-column, fixed-width design for 1024x768 screen resolutions.
Version    : 1.0
Released   : 20090906

-->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php
include("includes/head.inc.php");
?>
</head>
<body>
<div id="header-wrapper">
	<div id="header">
	<div id="menu">
		<?php
		include("includes/menu.inc.php");
		?>
		</div>
		<!-- end #menu -->
		<div id="search">
		<?php
		
		include("includes/search.inc.php");
		?>
		</div>
		<!-- end #search -->
	</div>
</div>
<!-- end #header -->
<!-- end #header-wrapper -->
<div id="logo">
	<?php
	include("includes/logo.inc.php");
	?>
	</div>
<div id="wrapper">
	<div id="page">
		<div id="page-bgtop">
			<hr />
			<!-- end #logo -->
			<div id="content">
				<div class="post">
					
					<h2 class="title"><?php echo $_GET['nm']; ?></h2>
					<p class="meta"></p>
					<div class="entry">
				
					<table border="0" width="100%">
				
				<tr>
						<td width="5%">No</td>
						<td width="40%">Name</td>
						<td width="15%">Resume</td>
						<td width="40%">Contact</td>
						
					</tr>
				
				<form action="accept_off.php" method="post" id="formacc" onsubmit="return confirm('Confirm Job Accept');">
					<input type="hidden" name="jid" value="<?php echo $_GET['id'];?>" >
					<input type="hidden" name="nm" value="<?php echo $_GET['nm'];?>" >
				</form>
				<form action="reject_off.php" method="post" id="formrj" onsubmit="return confirm('Confirm Job Reject');">
					<input type="hidden" name="jid" value="<?php echo $_GET['id'];?>" >
					<input type="hidden" name="nm" value="<?php echo $_GET['nm'];?>" >
				</form>
				<?php
				$count=1;
					while($row=mysqli_fetch_array($res))
					{
						$qq="SELECT `status` FROM `applicants` WHERE `a_uid` = ".$row['ee_id']." AND `a_jid`=".$_GET['id'];
						//echo $qq;
						$ress=mysqli_query($link,$qq) or die ("wrong query");
						$roow=mysqli_fetch_array($ress);
						echo '<tr> <td width="5%">'.$count.'
								<td width="40%">'.$row['ee_fnm'].'
								<td width="15%"><a href="'.$row['ee_resume'].'">resume</a>
								<td width="40%"><a href=mailto:'.$row['ee_email'].'>'.$row['ee_email'].'</a>
								<td>
								';
						if($roow['status'] === "ACCEPTED") {
							echo '<button disabled style="width: 100%" value='.$row['ee_id'].' name="eid" id=a'.$row['ee_id'].' form="formacc">Accept</button>
							<button style="width: 100%" value='.$row['ee_id'].' name="eid" id=r'.$row['ee_id'].' form="formrj">Reject</button></td>';
						}
						else if ($roow['status'] === "REJECTED") {
							echo '<button style="width: 100%" value='.$row['ee_id'].' name="eid" id=a'.$row['ee_id'].' form="formacc">Accept</button>
							<button disabled style="width: 100%" value='.$row['ee_id'].' name="eid" id=r'.$row['ee_id'].' form="formrj">Reject</button></td>';
						}
						else {
							echo '<button style="width: 100%" value='.$row['ee_id'].' name="eid" id=a'.$row['ee_id'].' form="formacc">Accept</button>
							<button style="width: 100%" value='.$row['ee_id'].' name="eid" id=r'.$row['ee_id'].' form="formrj">Reject</button></td>';
						}
							$count++;
					}
				?>
				
				
					</table>
						
					</div>
				</div>
				
			</div>
			<!-- end #content -->
			<div id="sidebar">
			<?php
		include("includes/sidebar.inc.php");
		?>	
			</div>
			<!-- end #sidebar -->
			<div style="clear: both;">&nbsp;</div>
		</div>
	</div>
</div>
<!-- end #page -->
<div id="footer-bgcontent">
	<div id="footer">
		<?php
		include("includes/footer.inc.php");
		?>	
	</div>
</div>
<!-- end #footer -->
</body>
</html>
