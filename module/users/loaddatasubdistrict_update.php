<?php
	include('../../function/connect_db.php');

	$iddistrict = $_POST['id'];
	//echo "$iddistrict";

			//แสดงข้อมูลตำบล/แขวง
    		$subdistrict=mysqli_query($con,"SELECT id,name_in_thai,zip_code FROM subdistricts WHERE district_id='$iddistrict'") 
			or die ("Mysqli error subdistricts =>>>".mysqli_error($con));
    		//ดึงข้อมูลตำบล/แขวง
			while(list($id,$name_thai,$zip_code)=mysqli_fetch_row($subdistrict)){
				if($id == $_POST['idsd']){
					echo "<option selected='selected' value='$id' data-zipcode='$zip_code'>$name_thai</option>";
				}else{
						echo "<option value='$id' data-zipcode='$zip_code'>$name_thai</option>";
						}
				
			}
  
  

?>