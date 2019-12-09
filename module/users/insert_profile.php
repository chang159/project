<?php
include('../../function/connect_db.php');

$sql = "INSERT INTO profiles VALUES ('',
'$_POST[title]',
'$_POST[fname]',
'$_POST[lname]',
'$_POST[idcard]',
'$_POST[natio]',
'$_POST[ethni]',
'$_POST[number]',
'$_POST[moo]',
'$_POST[road]',
'$_POST[lone]',
'$_POST[subdistricts]',
'$_POST[tel]',
'$_POST[email]',
'4')";

mysqli_query($con,$sql) or die ("mysqli error>>>>>>>>>>".mysqli_error($con));

mysqli_close($con);




?>
