<?php 
session_start();
include("includes/config.php");
//$_SESSION['eeid']
$q = "SELECT * FROM `employees` WHERE `ee_id` = ".$_SESSION['eeid'];

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
					
					<h2 class="title">REGISTER</a></h2>
					<p class="meta">Please fill up the form</p>
					<div class="entry">
					        <? if(isset($_GET['error'])) {
					                echo $_GET['error']."<br><br>";
                                                }
                                                ?>
						<form action="process_update_employee_register.php" method="post" enctype="multipart/form-data">
							FULL NAME <br> <input type="text" name="nm" style="width:200px; " value ="<?php echo $row['ee_fnm']?>" >
							<br><br> PASSWORD<br><input type="password" name="pwd" value ="<?php echo $row['ee_pwd']?>">
							<br><BR> EMAIL <BR> <INPUT TYPE = "TEXT" name="email" style="width:200px;" value ="<?php echo $row['ee_email']?>">
							<BR><BR> ADDRESS <BR> <TEXTAREA name="addr" style="width:200px;"><?php echo htmlentities($row['ee_add'])?></TEXTAREA>
							<BR><BR> PHONE NO. <BR> <INPUT TYPE = "TEXT" name="ph" style="width:200px;" value ="<?php echo $row['ee_phno']?>">
							<BR> <BR>MOBILE NO.<BR> <INPUT TYPE = "TEXT" name="mobile" style="width:200px;" value ="<?php echo $row['ee_mobileno']?>">
							<br><br>CURRENT LOCATION <BR><INPUT TYPE="TEXT" name="cl" style="width:200px;" value ="<?php echo $row['ee_current_location']?>">
							<BR><BR>CURRENT ANNUAL SALARY <BR><INPUT TYPE="TEXT" name="cas" style="width:200px;" value ="<?php echo $row['ee_annualsalary']?>">
							<BR><BR>CURRENT INDUSTRY<BR><INPUT TYPE ="TEXT" name="cindustry" style="width:200px;" value ="<?php echo $row['ee_current_industry']?>">
							
							<BR><BR>QUALIFICATION<BR><INPUT TYPE = "TEXT" name="quali" style="width:200px;" value ="<?php echo $row['ee_qualification']?>">
							<BR><BR>PROFILE<BR> <TEXTAREA name="profile" style="width:200px;"><?php echo $row['ee_profile']?> </TEXTAREA>
							<br><br>RESUME<br><input type="file" name="resume" style="width:200px;" >
							<center><br><br> <input type="submit" value="submit"></center>					
						</form>
						
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
