<?php
	$connection = mysqli_connect("localhost","root","","school_system");
	$query = "update students set name='$_POST[name]',father_name='$_POST[father_name]',Class=$_POST[Class],mobile='$_POST[mobile]',email='$_POST[email]',password='$_POST[password]',remarks='$_POST[remarks]' where roll_no = $_POST[roll_no]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Details edited successfully.");
	window.location.href = "student_dashboard.php";
</script>
