<?php
  SESSION_START();
?>
<script src="..\packages\jquery\jquery-3.4.1.min.js"></script>
<script src="..\packages\sweetalert\sweetalert.min.js"></script>


<?php
  include("../function/connect_db.php");

  $result=mysqli_query($con,"SELECT p.profile_id,u.username,u.passwd,p.profile_fname,p.profile_lname,p.permission FROM profiles as p INNER JOIN users as u on p.profile_id=u.profile_id  WHERE u.username='$_POST[user]' AND u.passwd='$_POST[pass]'")or die("MySql 1 Error >>>".mysqli_error($con));

  list($user_id,$user_name,$user_pass,$user_fristname,$user_surename,$permission)=mysqli_fetch_row($result);

  if($user_name==$_POST['user'] AND $user_pass==$_POST['pass']){
    $_SESSION['userid']=$user_id;
    $_SESSION['fristname']=$user_fristname;
    $_SESSION['surename']=$user_surename;
    $_SESSION['permission']=$permission;

  $result2=mysqli_query($con,"SELECT per_name FROM permit WHERE per_id=$permission")or die("MySql 2 Error >>>".mysqli_error($con));

  list($per_name)=mysqli_fetch_row($result2);
    $_SESSION['per_name']=$per_name;

?>
<script>
  $(document).ready(function() {
      swal({
            title: "เข้าสู่ระบบสำเร็จ",
            text: "ยินดีต้อนรับ",
            icon: "success",
            button: false,
            timer:1500,
      });
     
      setTimeout(function(){  window.location='../index.php' }, 1500);

  })       
</script>
<?php

   /* echo "<script>alert('เข้าสู่เข้าสู่ระบบสำเร็จ')</script>";
    echo "<script>window.location='../index.php'</script>";*/
  }
    else{
      // echo "<script>alert('ชื่อผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง')</script>";
      // echo "<script>window.location='../index.php'</script>";
      ?>
<script>
  $(document).ready(function() {
      swal({
            title: "เกิดข้อผิดผลาด",
            text: "ชื่อผู้ใช้หรือรหัสผิด",
            icon: "error",
            button: false,
            timer:1500,
      });
     
      setTimeout(function(){  window.location='login.php' }, 1500);

  })       
</script>
<?php


    }

?>




