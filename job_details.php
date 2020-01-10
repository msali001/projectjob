<?php session_start();


	include("includes/config.php");

	        	
	$q = "select * from jobs where j_id =".$_GET['id'];
	
	$res = mysqli_query($link,$q) or die("Wrong Query");
	
	$row = mysqli_fetch_assoc($res);
	
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
<style>
.example_e {
border: none;
background: #404040;
color: #ffffff !important;
font-weight: 100;
padding: 10px;
text-transform: uppercase;
border-radius: 6px;
display: inline-block;
transition: all 0.3s ease 0s;
}
.example_e:hover {
color: #404040 !important;
font-weight: 700 !important;
letter-spacing: 3px;
background: none;
-webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
-moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
transition: all 0.3s ease 0s;
}
</style>

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
					
					
					<h2 class="title"><a href="job_details.php?id=<?php echo $row['j_id']; ?>"><?php echo $row['j_title']; ?> </a></h2>
					<p class="meta"></p>
					<div class="entry">
						<table width="100%" border="0">
							
						<?php
						
						echo '<tr><td width="30%"><b>Category:</b><br><td>'.$row['j_category'].'</td></tr>
								<tr><td><b>Salary:</b></td><td>'.$row['j_salary'].'</td></tr>
								<tr><td><b>Hours:</b></td><td>'.$row['j_hours'].'</td></tr>
								<tr><td><b>Experience:</b></td><td>'.$row['j_experience'].'</td></tr>
								<tr><td><b>City:</b></td><td>'.$row['j_city'].'</td></tr>
								<tr><td><b>Description:</b></td><td>'.$row['j_discription'].'</tr>
								';
						
						?>
						<br>
						<br>
					
		
						</table>
					
					
						
					</div>
					<?php
	
				if(isset($_SESSION['status']) && $_SESSION['cat']=="employee")
				{
					echo '<div class="button_cont" align="center"><a class="example_e" href="process_apply.php?jid='.$row['j_id'].'" target="_blank" rel="nofollow noopener">Apply Now</a></div>';
					//echo'<tr><td colspan="2"><center><a href="process_apply.php?jid='.$row['j_id'].'"> Apply </center></td></tr></a>';
				}
	
		?>
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
