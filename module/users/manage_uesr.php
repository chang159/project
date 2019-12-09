
<h3 class="titleh" >
  <div class='row'>
    <div class='col-md-4'></div>
    <div class='col-md'>ระบบจัดการผู้ใช้ </div>
    <div class='col-md-4 text-right'>
      <a href="index.php?module=2&action=2"><button type="button" class="btn btn-light">เพื่มบุคลากร</button>  </a>
    </div>
</h3>  
<div class="table-responsive">
	<table  class='table table-striped text-center' id='Datatable'>
    <thead>
    	<tr class="bg-info text-light">
        	<th>รหัส</th>
            <th class='text-center'>ชื่อ</th>
            <th class='text-center'>สกุล</th>
            <th class='text-center'>ประเภท</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
        </tr>
    </thead>
<tbody>
<?php
	$con = mysqli_connect("localhost","root","","grant_company_limited");
	mysqli_set_charset($con,"utf8");

	$sql = "SELECT * FROM  profiles";
	//or die("Mysql_error >>>").mysql_error;
	if($result = $con->query($sql)){
		//print_r($result);
		while($data = $result->fetch_assoc()){
      //print_r($data);
      
      $result6=mysqli_query($con,"SELECT 	per_name FROM  permit WHERE per_id='".$data['permission']."'")or die("Mysql_error 3==>>>".mysqli_error($con));
			list($permit)=mysqli_fetch_row($result6);

			echo "<tr >";
			echo "<td>$data[profile_id]</td>";
			echo "<td class='text-center'>$data[profile_fname]</td>";
      echo "<td class='text-center'>$data[profile_lname]</td>";
      echo "<td class='text-center'>$permit</td>";
			echo "<td ><a href='index.php?module=2&action=5&id=".$data['profile_id']." '><i class='fas fa-pen-square fa-3x'></i></a></td>";
			echo "<td ><a  class='text-danger deluser' data-iduser='".$data['profile_id']."'><i class='fas fa-user-minus fa-3x'></i></a></td>";
			echo "</tr>";

		}
  }
  
  mysqli_close($con);
?>
</tbody>
</table>
</div>
<!--<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <button type="button" class="btn btn-secondary">1</button>
    <button type="button" class="btn btn-secondary">2</button>
    <button type="button" class="btn btn-secondary">3</button>
    <button type="button" class="btn btn-secondary">4</button>
  </div>
  <div class="btn-group mr-2" role="group" aria-label="Second group">
    <button type="button" class="btn btn-secondary">5</button>
    <button type="button" class="btn btn-secondary">6</button>
    <button type="button" class="btn btn-secondary">7</button>
  </div>
  <div class="btn-group" role="group" aria-label="Third group">
    <button type="button" class="btn btn-secondary">8</button>
  </div>
</div>-->


<script>
	$(document).ready(function() {

    $.getScript( "js/mydatatable.js" );

		$(".deluser").click(function(e){
			e.preventDefault()
		//	alert($(this).data("iduser"))

  // window.location.href = "index.php=?module=2&action=6"

			// index.php?module=2&action=6&id=".$data['profile_id']

      var ids = $(this).data("iduser")

			swal({
        title: "คุณต้องลบรหัส "+ids,
        text: "",
        icon: "warning",
        buttons: ["ยกเลิก", "ใช่"],
      })
      .then((willDelete) => {
        if (willDelete) {
     

        $.get( "module/users/delete_user.php", { id: ids } )
        .done(function( data ) {
         // alert( "Data Loaded: " + data );

         $.get( "module/users/manage_uesr.php" )
        .done(function( data ) {

          swal("ลบสำเร๊จแล้ว", {
            icon: "success",
            buttons: false,
            timer:1500,
          });
          
          setTimeout(function(){  $("#conten").html(data);  }, 1500);
        });	

        })	
        }
      })
       
     
		})

	})

</script>	

