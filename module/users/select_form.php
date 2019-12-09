<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$con=mysqli_connect("localhost","root","","grant_company_limited");
	mysqli_set_charset($con,"UTF8");
	
	mysqli_query($con,"SELECT * FROM users") or die ("Mysqli_error =>>>".mysqli_error($con));
	echo "<table border='2' class='table'>";
		echo "<tr>";
			echo "<th>รหัสบัตรประชาชน</th>";
			echo "<th>ชื่อ</th>";
			echo "<th>สกุล</th>";
			echo "<th>อายุ</th>";
			echo "<th>ที่อยู่</th>";
			echo "<th>เบอร์โทร</th>";
			echo "<th>แก้ไข</th>";
			echo "<th>บล</th>";
		echo "</tr>";
	echo "</table>";


?>
</body>
</html>