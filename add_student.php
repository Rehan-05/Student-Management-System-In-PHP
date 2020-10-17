<?php
  $connection = mysqli_connect("localhost","root","","school_system");

  $query = "insert into students values ('$_POST[roll_no]','$_POST[name]','$_POST[mobile]','$_POST[email]','$_POST[password]','$_POST[father_name]','$_POST[Class]','','','','','$_POST[remarks]','')";

	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("student edited successfully.");
	window.location.href = "admin_dashboard.php";
</script>
