<?php
include('../../function/connect_db.php');

mysqli_query($con,"INSERT INTO schedule VALUES ('','$_POST[title]','$_POST[caseid]','$_POST[date]','$_POST[time]','0') ") or die ("mysqli error 3>>>>>>>>>>".mysqli_error($con));

mysqli_close($con);
?>