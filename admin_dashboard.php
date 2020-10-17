<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
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

         <center style="font-size:30px;"> School Management System</center> <br> <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Name: &nbsp;&nbsp;<?php  echo  $_SESSION['name']; ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  Email: &nbsp;&nbsp; <?php echo  $_SESSION['email'];?>   &nbsp;&nbsp; <a href="logout.php"  style="color:red">Logout</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Admins_Access</center>

      </div>
      <span id="marquee"> <marquee>Note:- Only Authourized Admins can enter and  change the Records in system which related to student and Teachers.   </marquee> </span>

      <div class="left-side">

           <form class="" action="admin_dashboard.php" method="post">
             <table>
               <tr>
                  <td>
                      <input type="submit" name="search_student" value="search_student">
                  </td>
               </tr>
               <tr>
                  <td>
                      <input type="submit" name="edit_student" value="edit_student">
                  </td>
               </tr>
               <tr>
                  <td>
                      <input type="submit" name="add_new_student" value="add_new_student">
                  </td>
               </tr>
               <tr>
                  <td>
                      <input type="submit" name="delete_student" value="delete_student">
                  </td>
               </tr>
               <tr>
			       		<td>
					     	<input type="submit" name="show_teacher" value="Show Teachers">
				       	</td>
				</tr>
             </table>

           </form>
      </div>

      <div class="right-side"><br><br>
        <div id="demo">
<!-- #Code for search student details-Start-->
          <?php
                   if(isset($_POST['search_student'])){
                      ?>
                      <center>
                        <form class="" action="admin_dashboard.php" method="post">
                        <b> Roll No:</b>
                          <input type="text" name="roll_no" >
                          <input type="submit" name="search_by_roll_no_for_search" value="search" class="click">

                        </form>
                      </center>
                    <?php
               }
                   if(isset($_POST['search_by_roll_no_for_search']))
                   {
                     $query = "select * from students where roll_no = '$_POST[roll_no]'";
                     $query_run = mysqli_query($connection,$query);
                     while($row=mysqli_fetch_array($query_run))
                     {
                       ?>
                         <table class="somedata">
                           <tr>
                             <td><b>Roll No:</b></td></b>
                             <td> <input type="text" name="" value=" <?php echo $row['roll_no'];?>"   disabled > </td>
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
  									<input type="text" value="<?php echo $row['password']?>" disabled>
  								</td>
  							</tr>
  							<tr>
  								<td>
  									<b>Remark About students:</b>
  								</td>
  								<td>
  									<textarea rows="3" cols="40" disabled><?php echo $row['remarks']?></textarea>
  								</td>
  							</tr>
                <?php
                 }
              }

          ?>
  <!-- #Code for edit student details-Start-->
                <?php
                         if(isset($_POST['edit_student'])){
                            ?>
                            <center>
                              <form class="" action="admin_dashboard.php" method="post">
                              <b> Roll No:</b>
                                <input type="text" name="roll_no" >
                                <input type="submit" name="search_by_roll_no_for_edit" value="search" class="click">

                              </form>
                            </center>
                          <?php
                     }
                         if(isset($_POST['search_by_roll_no_for_edit']))
                         {
                           $query = "select * from students where roll_no = '$_POST[roll_no]'";
                           $query_run = mysqli_query($connection,$query);
                           while($row=mysqli_fetch_assoc($query_run))
                           {
                             ?>
                              <form action="admin_edit_student.php" method="post">
                               <table class="somedata">
                                 <tr>
                                   <td><b>Roll No:</b></td></b>
                                   <td> <input type="text" name="roll_no" value=" <?php echo $row['roll_no'];?>"> </td>
                                 </tr>
                                 <tr>
                        <td>
                          <b>Name:</b>
                        </td>
                        <td>
                          <input type="text" name="name" value="<?php echo $row['name']?>" >
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
                          <input type="text" name="Class" value="<?php echo $row['Class']?>" >
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Mobile:</b>
                        </td>
                        <td>
                          <input type="text" name="mobile" value="<?php echo $row['mobile']?>" >
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Email:</b>
                        </td>
                        <td>
                          <input type="text" name="email" value="<?php echo $row['email']?>" >
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Password:</b>
                        </td>
                        <td>
                          <input type="text" name="password" value="<?php echo $row['password']?>" >
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Remark About students:</b>
                        </td>
                        <td>
                          <textarea rows="3" cols="40" name="remarks"  <?php echo $row['remarks']?>> </textarea>
                        </td>
                      </tr>
                      <tr>
						        	<td>
							      	<input type="submit" name="edit" value="Save" class="button">
						        	</td>
						          </tr>
  					        	</table>
                      </form>
                     <?php
                    }
                 }
              ?>
<!-- #Code for add new student details-Start-->
          <?php
          if(isset($_POST['add_new_student']))
          {
          ?>
            <center><h4>Fill the given detail</h4></center>

            <form class="" action="add_student.php" method="post">
              <table>
                <tr>
                  <td>Roll No::</td>

                <td>
                  <input type="text" name="roll_no" required>
                </td>
                </tr>
                <tr>
                  <td>Name::</td>

                <td>
                  <input type="text" name="name" required>
                </td>
                </tr>
                <tr>
                  <td>father_name::</td>

                <td>
                  <input type="text" name="father_name" required>
                </td>
                </tr>
                <tr>
                  <td>Class::</td>

                <td>
                  <input type="text" name="Class" required>
                </td>
                </tr>
                <tr>
                  <td>Mobile#::</td>

                <td>
                  <input type="text" name="mobile" required>
                </td>
                </tr>
                <tr>
                  <td>Email::</td>

                <td>
                  <input type="text" name="email" required>
                </td>
                </tr>
                <tr>
                  <td>Password::</td>

                <td>
                  <input type="text" name="password" required>
                </td>
                </tr>
                <tr>
                  <td>Remarks::</td>

                <td>
                  <textarea name="remarks" rows="3" cols="40"></textarea>
                </td>
                <td> <input type="submit" name="add" value="add_student"> </td>
                </tr>
              </table>
            </form>
            <?php
          }
     ?>

         <?php
          if(isset($_POST['delete_student']))
          {
            ?>
            <center>
              <h3>Enter  &nbsp;&nbsp;Roll no &nbsp;&nbsp; to  &nbsp;&nbsp;delete  &nbsp;&nbsp;Record</h3><br><br>
             <form class="" action="delete_student.php" method="post">
               Roll No:>
               <input type="text" name="roll_no" value="">
               <input type="submit" name="search_by_roll_no_for_delete" value="Delete student">
             </form>
            </center>
            <?php
          }
          ?>
          <?php
				if(isset($_POST['show_teacher']))
				{
					?>
					<center>
						<h2 style=" border-collapse: collapse;  border:2px solid red; background-color: gray;">Teacher's Details</h2>
						<table style="border-collapse: collapse; border: 1px solid black; text-align:center;">

							<tr>
								<td id="td"><b>ID</b></td>
								<td id="td"><b>Name</b></td>
								<td id="td"><b>Mobile</b></td>
								<td id="td"><b>Courses</b></td>
								<td id="td"><b>Email</b></td>
							</tr>
						</table>
					</center>
					<?php
					$query = "select * from teachers";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run))
					{
						?>
						<center>
						<table style="border-collapse: collapse; border: 1px solid black;">
							<tr>
								<td id="td"><?php echo $row['Teacher_ID']?></td>
								<td id="td"><?php echo $row['name']?></td>
								<td id="td"><?php echo $row['mobile']?></td>
								<td id="td"><?php echo $row['courses']?></td>
								<td id="td"><?php echo $row['Email']?></td>
							</tr>
						</table>
						</center>
						<?php
					}
				}
			?>


      </div>
    </div>
  </body>
</html>
