<?php
include('function/connect_db.php');

if(empty($_POST['uname']) AND empty($_POST['pwd'])){
    $sql = "INSERT INTO profiles VALUES ('','$_POST[title]','$_POST[name]','$_POST[lname]','$_POST[idcard]','$_POST[natio]','$_POST[ethni]',
    '$_POST[number]','$_POST[moo]','$_POST[road]','$_POST[lone]','$_POST[subdistricts]','$_POST[tel]','$_POST[email]','$_POST[per]')";
    mysqli_query($con,$sql) or die ("mysqli1 error>>>>>>>>>>".mysqli_error($con));
}else{
    $sql = "INSERT INTO profiles VALUES ('','$_POST[title]','$_POST[name]','$_POST[lname]','$_POST[idcard]','$_POST[natio]','$_POST[ethni]',
    '$_POST[number]','$_POST[moo]','$_POST[road]','$_POST[lone]','$_POST[subdistricts]','$_POST[tel]','$_POST[email]','$_POST[per]')";
    mysqli_query($con,$sql) or die ("mysqli2 error>>>>>>>>>>".mysqli_error($con));

    $sql2 = "SELECT max(profile_id) FROM profiles";
    $re=mysqli_query($con,$sql2) or die ("mysqli3 error>>>>>>>>>>".mysqli_error($con));
    list($maxid) = mysqli_fetch_row($re);

    $sql3 = "INSERT INTO users VALUES ('','$_POST[uname]','$_POST[pwd]')";
    mysqli_query($con,$sql3) or die ("mysqli4 error>>>>>>>>>>".mysqli_error($con));



}





mysqli_close($con);

echo "<script>window.location = 'index.php?module=2&action=3'</script>";


?>
