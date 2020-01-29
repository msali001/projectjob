<ul>
					<li>
					<?php


				if(isset($_SESSION['status']))
				{
					echo '<h2 class="title">Hello '.$_SESSION['unm'].'!</h2>';
				}
				else
				{
					echo'
						<form action="process_login.php" method=POST>
						<b>Login:</b><br> <input type="text" name="unm" >
						<br>
						<br>
						<b>Password:</b><br><input type="password" name="pwd">
						<br>
						<br>
						<b>TYPE:<br><br><select name="cat">
										<option> employee
										<option> employer
										</select>
						
						<b><input style="float : right; height:30px;background-color: #008CBA;color: white;" type="submit" value="Login">
						</form>
					';
					
				}
				?>
					</li>
					<li>
						<h2>Categories </h2>
						<ul>
					<?php
						$link=mysqli_connect("localhost","root","","jobscope")or die("can not connect");
						$q="select * from categories";
						$res=mysqli_query($link,$q) or die("cant connect");
						while($row=mysqli_fetch_assoc($res))
						{
							echo '<li><a href="jobs_by_category.php?cat='.$row['cat_nm'].'">'.$row['cat_nm'].'</a></li>';
						}
						mysqli_close($link);
					?>
	
						</ul>
					</li>
					<li>
						<h2>Sort By</h2>
						<form action="index.php" method="get">
						<fieldset>
						<p>
						<label>Category</label>
						<select name="category">
						<option value = "any">Any</option>
						<?php
						$link=mysqli_connect("localhost","root","","jobscope")or die("can not connect");
						$q="select * from categories";
						$res=mysqli_query($link,$q) or die("cant connect");
						while($row=mysqli_fetch_assoc($res))
						{
							echo '<option value="'.$row['cat_nm'].'">'.$row['cat_nm'].'</option>';
						}
						mysqli_close($link);
					?>
						</select>
						</p>
						<p>
						<label>Experience </label>
						<select name="experience">
							<option value=">=0">Any</option>
							<option value="=0">No Experience</option>
							<option value="=1">One year</option>
							<option value="<2">less than 2</option>
							<option value="<3">less than 3</option>
							<option value=">3">3 and Above</option>

						</select>
						</p>
						<p>
						<label>Salary </label>
						<select name="salary">
							<option value=">=0">Any</option>
							<option value="<20000">&lt; 20000</option>
							<option value="<30000">&lt; 30000</option>
							<option value="<40000">&lt; 40000</option>
							<option value="<50000">&lt; 50000</option>
							<option value=">60000">&gt; 60000</option>
						</select>
						</p>
						<p>
						<label></label>
						<button type="submit">Submit</button>
						</form>
					</li>
					
				</ul>
