<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
	 <link rel="stylesheet" href="system.css">
</head>
<body>
	<center><br><br>
		<h3>Student LogIn Page</h3><br>
		<form action="" method="post">
			Email ID: <input type="text" name="email" required><br><br>
			Password: <input type="password" name="password" required><br><br>
			<input type="submit" name="submit" value="LogIn">
		</form><br>

		<?php

			if(isset($_POST['submit'])){
         session_start();
				$connection = mysqli_connect("localhost","root","","school_system");
				$query = "select * from students where email = '$_POST[email]'";
				$query_run = mysqli_query($connection,$query);

				while ($row = mysqli_fetch_assoc($query_run)){
					if($row['email'] == $_POST['email']){
						if($row['password'] == $_POST['password']){
							$_SESSION['name'] =$row['name'];
							 $_SESSION['email']=$row['email'];

						   header("Location:student_dashboard.php");
						}
						else {
							  echo "Password incorrect";
						}
					}
					else{
						 echo "Email incorrect";
					}

				}
			}
		?>
	</center>
</body>
</html>
