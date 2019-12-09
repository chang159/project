<?php
include('function/connect_db.php');

	//select คำนำหน้าชื่อ
	$title=mysqli_query($con,"SELECT * FROM titles") or die ("Mysqli error title =>>>".mysqli_error($con));
?>
	<!--ฟอร์มกรอกข้อมูลทนายความ-->
<h3 class="titleh" >เพิ่มข้อมูลผู้ใช้งาน</h3>


<form action="index.php?module=2&action=4" method="post" class='table'>
<div class='col-12'><h6><b>ข้อมูลส่วนตัว</b></h6></div>
<div class='shadow-sm p-3 mb-2 bg-white rounded border bg-light'>
    <div class="form-row ">
      <div class="col-3" >
    <label for="validationCustom05">ชื่อผู้ใช้งาน</label>
      <input type="text" id="formu" class="form-control" placeholder="ชื่อผู้ใช้งาน" name="uname" required>
    </div>
    <div class="col-3">
    <label for="validationCustom05">รหัสผ่าน</label>
      <input type="password" id="formp" class="form-control" placeholder="รหัสผ่าน" name="pwd" required>
    </div>
    <div class="col-3" ">

    <label for="validationCustom05">รหัสบัตรประชาชน</label>
      <input type="text" class="form-control" placeholder="รหัสบัตรประชาชน" name="idcard" maxlength="13" required>
    </div>
	</div>



    <div class="form-row mt-3">
    <div class="col-1">
    <label for="validationCustom05">คำนำหน้าชื่อ</label>
      <select name="title" class="form-control" required>
    	<?php
		//ดึงข้อมูลคำนำหน้าชื่อ
			while(list($id,$name)=mysqli_fetch_row($title)){
				echo "<option value='$id'>$name</option>";
			}
		?>
    </select>
    </div>
    <div class="col-3">
    <label for="validationCustom05">ชื่อ</label>
      <input type="text" class="form-control" placeholder="ชื่อ" name="name" required>
    </div>
    <div class="col-3">
    <label for="validationCustom05">นามสกุล</label>
      <input type="text" class="form-control" placeholder="นามสกุล" name="lname" required>
    </div>
     <div class="col-2">
    <label for="validationCustom05">เชื้อชาติ</label>
      <input type="text" class="form-control" placeholder="เชื้อชาติ" name="natio" required>
    </div>
     <div class="col-2">
    <label for="validationCustom05">สัญชาติ</label>
      <input type="text" class="form-control" placeholder="สัญชาติ" name="ethni" required>
    </div>
  </div>

  <div class="form-row mt-3">

      <div class="col-4">
      <label for="validationCustom05">เบอร์โทร</label>
       <input type="text" class="form-control" placeholder="เบอร์โทร" name="tel" maxlength="10" required>
      </div>
      <div class="col-4">
      <label for="validationCustom05">E-mail</label>
       <input type="email" class="form-control" placeholder="จดหมายอิเล็กทรอนิกส์" name="email" required>
      </div>
  </div>
</div> 
<div class='col-12'><h6><b>ที่อยู่</b></h6></div>
<div class='shadow-sm p-3 mb-5 bg-white rounded border bg-light'>
    <div class="form-row mt-2">
     <div class="col">
     <label for="validationCustom05">บ้านเลขที่</label>
      <input type="text" name="number" class="form-control" placeholder="บ้านเลขที่" required>
     </div>
     <div class="col">
     <label for="validationCustom05">หมูที่</label>
      <input type="text" name="moo" class="form-control" placeholder="หมู่ที่" required>
     </div>
     <div class="col">
     <label for="validationCustom05">ถนน</label>
      <input type="text" name="road" class="form-control" placeholder="ถนน" required>
     </div>
    <div class="col">
    <label for="validationCustom05">ซอย</label>
      <input type="text" name="lone" class="form-control" placeholder="ซอย" required>
     </div>

</div>

    <div class="form-row mt-2">
    <div class="col-md mb-3">
      <label for="validationCustom03">จังหวัด</label>
      <select name="provinces" id='provinces' class="form-control selectpicker" data-live-search="true"  data-size="6"
      required>
    	<?php
			//แสดงข้อมูลจังหวัด
    		$province=mysqli_query($con,"SELECT id,name_in_thai FROM provinces")
			or die ("Mysqli error provinces=>>>".mysqli_error($con));
    		//ดึงข้อมูลจังหวัด
			while(list($id,$name_thai)=mysqli_fetch_row($province)){
				echo "<option value='$id'>$name_thai</option>";
			}

    	?>

    </select>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md mb-3" >
      <label for="validationCustom04">อำเภอ</label>
      <select name="district" id="district" class="form-control " data-live-search="true"  disabled data-size="6">
    	<option selected="selected" >อำเภอ</option>


    </select>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>
    <div class="col-md mb-3">
      <label for="validationCustom05">ตำบล/แขวง</label>
        <select name="subdistricts" id="subdistricts" class="form-control " data-live-search="true"  disabled data-size="6">
      	 <option selected="selected" disabled>ตำบล/แขวง</option>
        </select>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>
  </div>
  <div class="form-row mt-1 mb-2">
      <div class="col-3 mb-3">
        <label >รหัสไปรษณีย์</label>
        <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="รหัสไปรษณีย์" readonly >
      </div>
  </div>
  <div class="form-row mt-1 mb-2">
      <div class="col-3 mb-3">
        <label >กำหนดสิทธิ์ผู้ใช้งาน</label>
        <?php
			$per=mysqli_query($con,"SELECT * FROM permit") or die ("Mysql error >> ".mysqli_error($con));

			echo "<select name='per' id='selper' class='form-control'>";
			while(list($id,$name)=mysqli_fetch_row($per)){
				echo "<option value='$id'>$name</option>";
 				}
			echo "</select>";
		?>
      </div>
  </div>
</div>
<div class="text-center">
    <button class="btn btn-secondary" type="submit">ตกลง</button>
    <button class="btn btn-secondary" type="reset">ยกเลิก</button>
</div>    
</form>

<script type="text/javascript">
  $(document).ready(function() {
	  loaddata('1')

	 function loaddata(data){
		   destroyselectdistrict()
      destroyselectsubdistricts()
	  var idpv = data;

       $.post('module/users/loaddatadistricts.php', {id: idpv}).done(function(data){
          //alert(data);
          $('#district').prop('disabled', false);
          $('#subdistricts').html('');
          $('#district').html(data);
          $('#district').selectpicker();

           var idpv = $("#district").val()

           $.post('module/users/loaddatasubdistrict.php', {id: idpv}).done(function(data){
          //alert(data);
          $('#subdistricts').prop('disabled', false);
          $('#subdistricts').html(data)
          $('#subdistricts').selectpicker();

          $('#zipcode').val($("option:selected",'#subdistricts').data('zipcode')) // LOAD zipcode
          })

       })
		 }

    $("#provinces").change(function(event) {
	var idpv = $(this).val()
    loaddata(idpv)

    });

    $("#district").change(function(event) {
       destroyselectsubdistricts()
       var idpv = $(this).val()

       $.post('module/users/loaddatasubdistrict.php', {id: idpv}).done(function(data){
          //lert(data);
          $('#subdistricts').prop('disabled', false);
          $('#subdistricts').html(data);
          $('#subdistricts').selectpicker();
          $('#district').selectpicker();

          $('#zipcode').val($("option:selected","#subdistricts").data('zipcode'))  // LOAD zipcode

       })

    });


    $('#subdistricts').change(function(event) {

        $('#zipcode').val($("option:selected",this).data('zipcode'))
    });


    function destroyselectdistrict(){
        $('#district').selectpicker('destroy');
    }

     function destroyselectsubdistricts(){
        $('#subdistricts').selectpicker('destroy');
    }

    $("#selper").change(function(){
        //alert($(this).val())
        if($(this).val() == 4){
          $("#formu").prop( "disabled", true );
          $("#formp").prop( "disabled", true );
        }else{
          $("#formu").prop( "disabled", false );
          $("#formp").prop( "disabled", false );
        }
        
    })

    
    

  })
</script>
