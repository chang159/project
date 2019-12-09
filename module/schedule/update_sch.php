<?php
include('../../function/connect_db.php');

mysqli_query($con,"UPDATE schedule SET sch_name='$_POST[title]', sch_date = '$_POST[date]',times = '$_POST[time]' WHERE sch_id = '$_POST[schid]'") or die ("mysqli error 3>>>>>>>>>>".mysqli_error($con));

mysqli_close($con);
?>