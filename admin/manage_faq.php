<?php session_start();
if(!(isset($_SESSION['status']) && $_SESSION['unm']=='admin'))
{
	header("location:../index.php");
}
?>

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
		<div class="post">
			<h1 class="title">Delete FAQ</h1>
			<p class="byline"><small></small></p>
			
			<div class="entry">
			<br>
			<table border="1" width="100%">
		
			<tr>
			<td width="25%"><b>Question</b>
			<td width="65%"><b>Answer</b>
			<td width="10%"><b>DEL</b>
			</tr>
			
			
			
			<?php
			include("../includes/config.php");
			
			$q="select * from faq";
			$res=mysqli_query($link,$q)or die("can not connect");
			
			while($row=mysqli_fetch_assoc($res))
			{
				echo'
						<tr>
						<td>
						'.$row['faq_qs'].'
						<td>'.$row['faq_ans'].'
						<td><a href="process_delete_faq.php?cat='.$row['faq_id'].'"><img src = "delete.png"></a>
						</tr>
			
				';
			}
			?>
			</table>
			
			</div>
			<p class="meta"></p>
		</div>
		<div class="post">
			<h1 class="title">Add FAQ</h1>
			<p class="byline"><small></small></p>
			
			<div class="entry">
			<br>
			<form action="process_faq_add.php" method="post">
				Question <br><br><input type="text" name="qs" required>
				<br><br> Answer <br><br> <textarea name="ans"rows="5" cols="32" required></textarea>
				<center><br><br> <input type="submit" value="submit"></center>
					</form>			
			</div>
			<p class="meta"></p>
		</div>
		
	</div>
	<!-- end content -->
	
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
