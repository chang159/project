<?php
	include('../../function/connect_db.php');

	//แสดงข้อมูลอำเภอ
    $district=mysqli_query($con,"SELECT id,name_in_thai FROM districts WHERE province_id='$_POST[id]'") 
	or die ("Mysqli error districts=>>>".mysqli_error($con));
   //ดึงข้อมูลอำเภอ
	while(list($id,$name_thai)=mysqli_fetch_row($district)){
		if($id == $_POST['idd']){
			echo "<option selected='selected' value='$id'>$name_thai</option>";
		}else{
			echo "<option value='$id'>$name_thai</option>";
		}
		
	}
    
    


?>