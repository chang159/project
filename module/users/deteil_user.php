
<h3 class="titleh"  >ระบบจัดการผู้ใช้</h3>
<div class="table-responsive">
	<table  class='table table-striped table-hover text-center' id='Datatable'>
	<thead>
    	<tr >
        	<th>ลำดับที่</th>
            <th>ชื่อ</th>
            <th>สกุล</th>
			<th>เลขที่</th>
			<th>หมู่ที่</th>
			<th>ถนน</th>
			<th>ซอย</th>
			<th>ตำบล</th>
			<th>อำเภอ</th>
            <th>จังหวัด</th>
            <th>รหัสไปรษณีย์</th>
			<th>ประเภท</th>
        </tr>
	</thead>
<tbody>		
<?php
	include('function/connect_db.php');

	$sql = "SELECT * FROM profiles";
	//or die("Mysql_error >>>").mysql_error;
	if($result = $con->query($sql)){
		//print_r($result);
		while($data = $result->fetch_assoc()){
			//print_r($data);

			echo "<tr>";
			echo "<td>$data[profile_id]</td>";
			echo "<td>$data[profile_fname]</td>";
			echo "<td>$data[profile_lname]</td>";
			echo "<td>$data[house_no]</td>";
			echo "<td>$data[village_no]</td>";
			echo "<td>$data[road]</td>";
			echo "<td>$data[lane]</td>";
			$subdistrict=$data["subdistrict_id"];
			$result3=mysqli_query($con,"SELECT district_id,name_in_thai,zip_code FROM subdistricts WHERE id='$subdistrict'")or die("Mysql_error 3==>>>".mysqli_error($con));
			list($district_id,$name_in_thai1,$zip_code)=mysqli_fetch_row($result3);

			$result4=mysqli_query($con,"SELECT province_id,name_in_thai FROM districts WHERE id='$district_id'")or die("Mysql_error 3==>>>".mysqli_error($con));
			list($province_id,$name_in_thai2)=mysqli_fetch_row($result4);

			$result5=mysqli_query($con,"SELECT name_in_thai FROM provinces WHERE id='$province_id'")or die("Mysql_error 3==>>>".mysqli_error($con));
			list($name_in_thai3)=mysqli_fetch_row($result5);

			$result6=mysqli_query($con,"SELECT 	per_name FROM  permit WHERE per_id='".$data['permission']."'")or die("Mysql_error 3==>>>".mysqli_error($con));
			list($permit)=mysqli_fetch_row($result6);

			echo "<td>$name_in_thai1</td>";
			echo "<td>$name_in_thai2</td>";
			echo "<td>$name_in_thai3</td>";
			echo "<td>$zip_code</td>";
			echo "<td>$permit</td>";
			echo "</tr>";

		}
	}
	mysqli_close($con);
?>
<tbody>
</table>
</div>

<script>
	$(document).ready(function() {

	$.getScript( "js/mydatatable.js" );

	})
	
</script>