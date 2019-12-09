<?php
include('../../function/connect_db.php');

//print_r($_POST['pt']);


// print_r($_POST['ac']);

// case_id
// case_status
// case_nred
// profile_id
// tribunal_name
// title_plaintiffs
// case_date
// case_time

$sql = "INSERT INTO cases VALUES (
    '$_POST[nobk]',
    '1',
    '',
    '".$_POST['pt'][1]."',
    '$_POST[t_name]',
    '$_POST[titpt]',
    '$_POST[date]',
    '$_POST[time]'
    )";

//echo $sql

mysqli_query($con,$sql) or die ("mysqli error>>>>>>>>>>".mysqli_error($con));


$maxid = $_POST['nobk'];
$sql3 = "INSERT INTO plaintiffs VALUES";

// plain_no
// profile_id
// no
// case_id 

$i=1;
foreach($_POST['pt'] as $v){
    if($i==1){
        $sql3 .= " ('','$v','$i','$maxid') ";
    }else{
        $sql3 .= ",('','$v','$i','$maxid')";
    }
    $i++;
}

//echo $sql3;

mysqli_query($con,$sql3) or die ("mysqli error 3>>>>>>>>>>".mysqli_error($con));

$sql4 = "INSERT INTO accuseds VALUES";

	
// accused_no
// profile_id
// no
// case_id

$i=1;
foreach($_POST['ac'] as $v){
    if($i==1){
        $sql4 .= " ('','$v','$i','$maxid')";
    }else{
        $sql4 .= ",('','$v','$i','$maxid')";
    }
    $i++;
}

// echo $sql4;
mysqli_query($con,$sql4) or die ("mysqli error 4>>>>>>>>>>".mysqli_error($con));

mysqli_close($con);

//echo "<script>window.location = 'index.php?module=2&action=3'</script>";

?>
