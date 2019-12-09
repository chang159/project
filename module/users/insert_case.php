<?php
include('function/connect_db.php');

$sqlcase="INSERT INTO cases
VALUES('$_POST[no]','1','$_SESSION[userid]','$_POST[t_name]','$_POST[date]','$_POST[time]')";
//echo $sqlcase;
mysqli_query($con,$sqlcase) or die ("mysqli error>>>>>>>>>>3".mysqli_error($con));


$tit1=$_POST['title1'];
$fname1=$_POST['fname1'];
$lname1=$_POST['lname1'];
$idcard1=$_POST['idcard1'];
$natio1=$_POST['natio1'];
$ethni1=$_POST['ethni1'];
$tel1=$_POST['tel1'];
$fax1=$_POST['fax1'];
$email1=$_POST['email1'];
$number1=$_POST['number1'];
$moo1=$_POST['moo1'];
$road1=$_POST['road1'];
$lone1=$_POST['lone1'];
$subdistricts1=$_POST['subdistricts1'];

$max1=count($tit1);
for($i=0;$i<$max1;$i++){
    $sql="INSERT INTO customers 
    VALUES('','$tit1[$i]','$fname1[$i]','$lname1[$i]','$idcard1[$i]','$natio1[$i]','$ethni1[$i]','$tel1[$i]','$fax1[$i]','$email1[$i]','$number1[$i]','$moo1[$i]','$road1[$i]','$lone1[$i]','$subdistricts1[$i]')";
   echo $sql,"<hr>";
   mysqli_query($con,$sql) or die ("mysqli error>>>>>>>>>>sql1".mysqli_error($con));

//    $select_id=mysqli_query($con,"SELECT custom_id FROM customers WHERE custom_cardid='$idcard1[$i]'")or die("SQL.error".mysqli_error($con));
//    list($custom_id)=mysqli_fetch_row($select_id);
//    $sqlplain="INSERT INTO plaintiffs
//    VALUES('','$custom_id','$_POST[no]')";
//    mysqli_query($con,$sqlplain)or die("SQL.error>>sqlPlain".mysqli_error($con));
//    echo $sqlplain;
   //echo "<hr>";
}

$tit2=$_POST['title2'];
$fname2=$_POST['fname2'];
$lname2=$_POST['lname2'];
$idcard2=$_POST['idcard2'];
$natio2=$_POST['natio2'];
$ethni2=$_POST['ethni2'];
$tel2=$_POST['tel2'];
$fax2=$_POST['fax2'];
$email2=$_POST['email2'];
$number2=$_POST['number2'];
$moo2=$_POST['moo2'];
$road2=$_POST['road2'];
$lone2=$_POST['lone2'];
$subdistricts2=$_POST['subdistricts2'];

$max2=count($tit2);
for($i=0;$i<$max1;$i++){
    $sql2="INSERT INTO customers 
    VALUES('','$tit2[$i]','$fname2[$i]','$lname2[$i]','$idcard2[$i]','$natio2[$i]','$ethni2[$i]','$tel2[$i]','$fax2[$i]','$email2[$i]','$number2[$i]','$moo2[$i]','$road2[$i]','$lone2[$i]','$subdistricts2[$i]')";
   // echo $sql;
    mysqli_query($con,$sql2) or die ("mysqli error>>>>>>>>>>sql2".mysqli_error($con));
    
    $select_id=mysqli_query($con,"SELECT custom_id FROM customers WHERE custom_cardid='$idcard1[$i]'")or die("SQL.error".mysqli_error($con));
   list($custom_id)=mysqli_fetch_row($select_id);
   $sqlaccuseds="INSERT INTO accuseds
   VALUES('','$custom_id','$_POST[no]')";
   mysqli_query($con,$sqlaccuseds)or die("SQL.error>>sqlPlain".mysqli_error($con));
  echo $sqlaccuseds;
}

mysqli_close($con);
//echo "<script>window.location = 'index.php?module=3&action=12'</script>";


?>
