<?php
	include('../../function/connect_db.php');
	
	mysqli_query($con,"DELETE FROM profiles WHERE profile_id='$_GET[id]'");
	
	mysqli_close($con);
	
?>