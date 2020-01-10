<?php session_start();

$link=mysqli_connect("localhost","root","","jobscope")or die("can not connect");
//mysqli_select_db("jobscope",$link) or die("can not select database");

$q="select * from jobs where j_active=1 order by j_id desc ";
$res=mysqli_query($link,$q) or die ("can not select database");


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
		if(!isset($_SESSION['employer']))
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
					
					<h2 class="title"><center><b>WELCOME TO JOBSCOPE</b></center></a></h2>
					
					<p class="meta"></p>
					<div class="entry">
						
					</div>
				</div>
				<?php
				        if(isset($_GET['s']))
                                        {
                                                $q="SELECT * FROM `jobs` WHERE`j_active` = 1 AND `j_title` like '%".$s=$_GET['s']."%' limit 0,5";
                                        }
                                        else
				                $q="SELECT * FROM `jobs` WHERE`j_active` = 1 limit 0,5";
                                        $res=mysqli_query($link,$q) or die ("can not select database");
                                        $i=0;
                                        while($row = mysqli_fetch_assoc($res))
					{
					        $i++;

				?>
				
				<div class="post">
					<h2 class="title"><a href="job_details.php?id=<?php echo $row['j_id']; ?>"><?php echo $row['j_title']; ?></a></h2>
					<p class="meta">Category: <?php echo $row['j_category'].", Experience :".$row['j_experience']." years, Salary :Rs. ".$row['j_salary']; ?></p>
					<div class="entry">
						<p><?php echo $row['j_discription']; ?></p>
					</div>
				</div>

				<?php } 
				if($i != 0)
				{
				?>
				
				<div class="post">
					<div class="entry">
						<p><a href="employeeregister.php">Login to see more</a></p>
					</div>
				</div>
				<?php
				}
				else
				{
				?>
				<div class="post">
					<div class="entry">
						<p>Nothing to show</p>
					</div>
				</div>
				<?php
				}
				?>
			</div>
			<!-- end #content -->
			<div id="sidebar">
			<? if(isset($_GET['ms'])) {
		                echo $_GET['ms']."<br><br>";
                        }
                        ?>
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
