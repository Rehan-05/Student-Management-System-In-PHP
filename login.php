<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="system.css">
    <title>login page</title>
    <style media="screen">
      *{
        background-color: rgba(0,188,212,1);
        color: rgba(55,71,79 ,1);
      }
      .div1{
        padding-bottom: 10px;
        margin: 15px;
      }
    </style>
  </head>
  <body>
    <div class="div1">
  	  <center><br><br>
  	  	<h1> School Management System </h1><br>
        <form action="" method="POST">
        	<input type="submit" value="admin_login" name="admin_login"> &nbsp;&nbsp; &nbsp;&nbsp;
        	<input type="submit" value="student_login" name="student_login">
        </form>
        <?php

          if(isset($_POST['admin_login']))
          {
          	  header("Location:admin_login.php");
          }
          if(isset($_POST['student_login']))
          {
          	  header("Location:student_login.php");
          }

        ?>
    </center>
    </div>
  </body>
</html>
