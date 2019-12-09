<?php
	include('function/connect_db.php');

	mysqli_query($con,"UPDATE profiles SET title_id='$_POST[title]',profile_fname='$_POST[name]',
	profile_lname='$_POST[lname]',profile_idcard='$_POST[idcard]',profile_nationality='$_POST[natio]',profile_ethnicity='$_POST[ethni]',
	house_no='$_POST[number]',village_no='$_POST[moo]',	road='$_POST[road]',	lane='$_POST[lone]',
	subdistrict_id='$_POST[subdistricts]',
	phone='$_POST[tel]',email='$_POST[email]' WHERE profile_id='$_POST[user_id]'")
	or die("Mysql Error =>>>".mysqli_error($con));

	mysqli_query($con,"UPDATE users SET username='$_POST[uname]',passwd='$_POST[pwd]' WHERE profile_id='$_POST[user_id]'")
	or die("Mysql Error =>>>".mysqli_error($con));


	mysqli_close($con);

	echo "<script></script>";

?>

<script>
  $(document).ready(function() {
      swal({
            title: "บันทึกข้อมูลสำเร็จ",
            text: " ",
            icon: "success",
            button: false,
            timer:1500,
      });
     
      setTimeout(function(){  window.location = 'index.php?module=2&action=8' }, 1500);

  })       
</script>
