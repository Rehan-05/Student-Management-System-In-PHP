<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="system.css">
   <?php
       session_start();
       $connection = mysqli_connect("localhost","root","","school_system");
    ?>
    <style media="screen">
    #td{
          border: 1px solid black;
          padding-left: 2px;
          text-align: left;
          width: 210px;
        }
    </style>

  </head>
  <body>
      <div class="header">

         <center style="font-size:30px;"> School Management System</center> <br> <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Name:<?php  echo  $_SESSION['name']; ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  Email: <?php echo  $_SESSION['email'];?>   &nbsp;&nbsp; <a href="logout.php" style="color:red">Logout</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Students_Access  </center>

      </div>
      <span id="marquee"> <marquee>Note:- Authourized Students check the  Records in system which related to student and Teachers.   </marquee> </span>

      <div class="left-side">

           <form class="" action="student_dashboard.php" method="post">
             <table>

               <tr>
                  <td>
                      <input type="submit" name="show_detail" value="show details">
                  </td>
               </tr>

               <tr>
                  <td>
                      <input type="submit" name="edit_detail" value="edit detial">
                  </td>
               </tr>

             </table>

           </form>
      </div>

      <div class="right-side"><br><br>
        <div id="demo">
          <?php
          if(isset($_POST['show_detail']))
{
$query = "select * from students where email = '$_SESSION[email]'";
$query_run = mysqli_query($connection,$query);
while ($row = mysqli_fetch_assoc($query_run))
{
?>
<table>
  <tr>
    <td>
      <b>Roll No:</b>
    </td>
    <td>
      <input type="text" value="<?php echo $row['roll_no']?>" disabled>
    </td>
  </tr>
  <tr>
    <td>
      <b>Name:</b>
    </td>
    <td>
      <input type="text" value="<?php echo $row['name']?>" disabled>
    </td>
  </tr>
  <tr>
    <td>
      <b>Father's Name:</b>
    </td>
    <td>
      <input type="text" value="<?php echo $row['father_name']?>" disabled>
    </td>
  </tr>
  <tr>
    <td>
      <b>Class:</b>
    </td>
    <td>
      <input type="text" value="<?php echo $row['Class']?>" disabled>
    </td>
  </tr>
  <tr>
    <td>
      <b>Mobile:</b>
    </td>
    <td>
      <input type="text" value="<?php echo $row['mobile']?>" disabled>
    </td>
  </tr>
  <tr>
    <td>
      <b>Email:</b>
    </td>
    <td>
      <input type="text" value="<?php echo $row['email']?>" disabled>
    </td>
  </tr>
  <tr>
    <td>
      <b>Password:</b>
    </td>
    <td>
      <input type="password" value="<?php echo $row['password']?>" disabled>
    </td>
  </tr>
  <tr>
    <td>
      <b>Remark:</b>
    </td>
    <td>
      <textarea rows="3" cols="40" disabled><?php echo $row['remarks']?></textarea>
    </td>
  </tr>
</table>
<?php
}
}
?>
<?php
			if(isset($_POST['edit_detail']))
			{
				$query = "select * from students where email = '$_SESSION[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run))
				{
					?>
					<form action="edit_student.php" method="post">
						<table>
						<tr>
							<td>
								<b>Roll No:</b>
							</td>
							<td>
								<input type="text" name="roll_no" value="<?php echo $row['roll_no']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Name:</b>
							</td>
							<td>
								<input type="text" name="name" value="<?php echo $row['name']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Father's Name:</b>
							</td>
							<td>
								<input type="text" name="father_name" value="<?php echo $row['father_name']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Class:</b>
							</td>
							<td>
								<input type="text" name="Class" value="<?php echo $row['Class']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Mobile:</b>
							</td>
							<td>
								<input type="text" name="mobile" value="<?php echo $row['mobile']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Email:</b>
							</td>
							<td>
								<input type="text" name="email" value="<?php echo $row['email']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Password:</b>
							</td>
							<td>
								<input type="password" name="password" value="<?php echo $row['password']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Remark:</b>
							</td>
							<td>
								<textarea rows="3" cols="40" name="remarks"><?php echo $row['remarks']?></textarea>
							</td>
						</tr><br>
						<tr>
							<td></td>
							<td>
								<input type="submit" value="Save">
							</td>
						</tr>
					</table>
					</form>
					<?php
				}
			}
			?>
      </div>
    </div>
  </body>
</html>
