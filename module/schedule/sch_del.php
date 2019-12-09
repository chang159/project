<?php
include('../../function/connect_db.php');

mysqli_query($con,"DELETE FROM schedule WHERE sch_id='$_POST[schid]'") or die ("mysqli error 3>>>>>>>>>>".mysqli_error($con));

mysqli_close($con);
?>