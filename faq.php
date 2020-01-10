<?php session_start();

$link=mysqli_connect("localhost","root","","jobscope")or die("can not connect");
//mysqli_select_db("jobscope",$link) or die("can not select database");



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
					
					<h2 class="title"><center><b>FAQS</b></center></a></h2>
					
					<p class="meta"></p>
					<div class="entry">
						
					</div>
				</div>
				<?php
			                $q="SELECT * FROM `faq`";
                                        $res=mysqli_query($link,$q) or die ("can not select database");
                                        $i=0;
                                        while($row = mysqli_fetch_assoc($res))
					{
					        $i++;

				?>
				
				<div class="post">
					<h2 class="title"><a href="#"><?php echo $row['faq_qs']; ?></a></h2>
					<div class="entry">
						<p><?php echo $row['faq_ans']; ?></p>
					</div>
				</div>

				<?php } 
				if($i == 0)
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
