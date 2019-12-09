<?php
	include('../../function/connect_db.php');

	$idprovinces = $_POST['id'];


	//แสดงข้อมูลอำเภอ
    $district=mysqli_query($con,"SELECT id,name_in_thai FROM districts WHERE province_id='$idprovinces'") 
	or die ("Mysqli error districts=>>>".mysqli_error($con));
   //ดึงข้อมูลอำเภอ
	while(list($id,$name_thai)=mysqli_fetch_row($district)){
		echo "<option value='$id'>$name_thai</option>";
	}
    
    


?>