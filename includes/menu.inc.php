
<ul>
		<li><a href="index.php" class="first">Home</a></li>
	
		<?php
	
				if(!isset($_SESSION['employee']) && !isset($_SESSION['employer']))
				{
					echo '<li><a href="employeeregister.php">Employee Register</a></li>';
					echo '<li><a href="employerregister.php">Employer Register</a></li>';
					echo '<li><a href="faq.php">FAQS</a></li>';
				}
	
		?>
		
				
		<?php
	
			//	if(!isset($_SESSION['employer']))
			//	{
			//		echo '<li><a href="employerregister.php">Employer Register</a></li>';
			//	}
	
		?>
			            
				<li><a href="Contact.php">Contact</a></li>

		<?php
				if(isset($_SESSION['employee']))
				{
					echo '<li><a href="employeeprofileupdate.php">Update Profile</a></li>';
					echo '<li><a href="application.php">Job Application</a></li>';
				}

	
		?>		
		<?php
				if(isset($_SESSION['employer']))
				{
					echo '<li><a href="postjob.php">Post Job</a></li>';
				}
	
		?>	
		
		<?php

				if(isset($_SESSION['employer']))
				{
					echo '<li><a href="manage.php">Manage Job</a></li>';
				}
	
		?>		
	


	

		
		<?php
	
				if(isset($_SESSION['status'])&& $_SESSION['unm']=='admin')
				{
					echo '<li><a href="admin/index.php">Admin</a></li>';
				}
	
		?>

		
		<?php
	
				if(isset($_SESSION['status']))
				{
					echo '<li><a href="process_logout.php">Logout</a></li>';
				}
	
				?>
</ul>
		
