<?php
	include('function/connect_db.php');

	//select คำนำหน้าชื่อ
	$title=mysqli_query($con,"SELECT * FROM titles") or die ("Mysqli error title =>>>".mysqli_error($con));

	$user=mysqli_query($con,"SELECT profile_id,title_id,profile_fname,profile_lname,profile_idcard,profile_nationality,profile_ethnicity,
  house_no,village_no,road,lane,subdistrict_id,phone,email,permission,ds.id,province_id
		FROM profiles AS em  INNER JOIN subdistricts AS sd ON (em.subdistrict_id=sd.id) INNER JOIN districts AS ds ON (sd.district_id=ds.id) WHERE profile_id='$_SESSION[userid]'") or die ("Mysqli error title =>>>".mysqli_error($con));

	list($user_id,$title_id,$user_fristname,$user_surename,$user_idcard,$user_nationality,$user_ethnicity,
		$user_home_id,$user_moo_home,$user_road,$user_lone,$user_subdistrict_id,$user_phone,$user_mail,$permission,$districtid,$provincesid)=mysqli_fetch_row($user);

?>
	<!--ฟอร์มกรอกข้อมูลทนายความ-->
<h3 class='titleh'>แก้ไขข้อมูลทนายความ</h3>
<form action="index.php?module=2&action=9" method="post" class='table'>
<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
<div class='col-12'><h6><b>ข้อมูลส่วนตัว</b></h6></div>
<div class='shadow-sm p-3 mb-2 bg-white rounded border bg-light'>
    <div class="form-row">
      <div class="col">
    <label for="validationCustom05">ชื่อผู้ใช้งาน</label>
      <input type="text" class="form-control" placeholder="Username" name="uname" required value="">
    </div>
    <div class="col">
    <label for="validationCustom05">รหัสผ่าน</label>
      <input type="password" class="form-control" placeholder="Password" name="pwd" required value="">
    </div>
    <div class="col">

    <label for="validationCustom05">รหัสบัตรประชาชน</label>
      <input type="text" class="form-control" placeholder="รหัสบัตรประชาชน" name="idcard" maxlength="" required value="<?php echo $user_idcard ?>" onkeyup='autoTab2(this,1)'>
    </div>
	</div>

    <div class="form-row mt-3">
    <div class="col-2">
    <label for="validationCustom05">คำนำหน้าชื่อ</label>
      <select name="title" class="form-control" required>
    	<?php
		//ดึงข้อมูลคำนำหน้าชื่อ
			while(list($id,$name)=mysqli_fetch_row($title)){
				if($id==$title_id){
					echo "<option selected='selected' value='$id'>$name</option>";
					}else{
						echo "<option value='$id'>$name</option>";
						}
			}
		?>
    </select>
    </div>
    <div class="col">
    <label for="validationCustom05">ชื่อ</label>
      <input type="text" class="form-control" placeholder="ชื่อ" name="name" required value="<?php echo $user_fristname ?>">
    </div>
    <div class="col">
    <label for="validationCustom05">นามสกุล</label>
      <input type="text" class="form-control" placeholder="นามสกุล" name="lname" required value="<?php echo $user_surename ?>">
    </div>
     <div class="col">
    <label for="validationCustom05">เชื้อชาติ</label>
      <input type="text" class="form-control" placeholder="เชื้อชาติ" name="natio" required value="<?php echo $user_nationality ?>">
    </div>
     <div class="col">
    <label for="validationCustom05">สัญชาติ</label>
      <input type="text" class="form-control" placeholder="สัญชาติ" name="ethni" required value="<?php echo $user_ethnicity ?>">
    </div>
  </div>

  <div class="form-row mt-3">
      <div class="col">
      <label for="validationCustom05">เบอร์โทร</label>
       <input type="text" class="form-control" placeholder="เบอร์โทร" name="tel" maxlength="10" required value="<?php echo $user_phone ?>">
      </div>
      <div class="col">
      <label for="validationCustom05">E-mail</label>
       <input type="email" class="form-control" placeholder="จดหมายอิเล็กทรอนิกส์" name="email" required value="<?php echo $user_mail ?>">
      </div>
  </div>
</div>
<div class='col-12'><h6><b>ที่อยู่</b></h6></div>
<div class='shadow-sm p-3 mb-5 bg-white rounded border bg-light'>
    <div class="form-row">
     <div class="col">
     <label for="validationCustom05">บ้านเลขที่</label>
      <input type="text" name="number" class="form-control" placeholder="บ้านเลขที่" required value="<?php echo $user_home_id ?>">
     </div>
     <div class="col">
     <label for="validationCustom05">หมูที่</label>
      <input type="text" name="moo" class="form-control" placeholder="หมู่ที่" required value="<?php echo $user_moo_home ?>">
     </div>
     <div class="col">
     <label for="validationCustom05">ถนน</label>
      <input type="text" name="road" class="form-control" placeholder="ถนน" required value="<?php echo $user_road ?>">
     </div>
    <div class="col">
    <label for="validationCustom05">ซอย</label>
      <input type="text" name="lone" class="form-control" placeholder="ซอย" required value="<?php echo $user_lone ?>">
     </div>

</div>

    <div class="form-row mt-2">
    <div class="col-md mb-3">
      <label for="validationCustom03">จังหวัด</label>
      <select name="provinces" id='provinces' class="form-control selectpicker" data-live-search="true" data-container="body" data-size="6"
      required>
    	<?php
			//แสดงข้อมูลจังหวัด
    		$province=mysqli_query($con,"SELECT id,name_in_thai FROM provinces")
			or die ("Mysqli error provinces=>>>".mysqli_error($con));
    		//ดึงข้อมูลจังหวัด
			while(list($id,$name_thai)=mysqli_fetch_row($province)){
				if($id==$provincesid){
					echo "<option selected='selected' value='$id'>$name_thai</option>";
				}
				else{
					echo "<option value='$id'>$name_thai</option>";
					}

			}

    	?>

    </select>

    </div>
    <div class="col-md mb-3" >
      <label for="validationCustom04">อำเภอ</label>
      <select name="district" id="district" class="form-control " data-live-search="true" data-container="body" disabled data-size="6">
    	<option selected="selected" >อำเภอ</option>
    </select>

    </div>
    <div class="col-md mb-3">
      <label for="validationCustom05">ตำบล/แขวง</label>
        <select name="subdistricts" id="subdistricts" class="form-control " data-live-search="true" data-container="body" disabled data-size="6">
      	 <option selected="selected" disabled>ตำบล/แขวง</option>
        </select>

    </div>
  </div>
  <div class="form-row mt-1 mb-2">
      <div class="col-3 mb-3">
        <label >รหัสไปรษณีย์</label>
        <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="รหัสไปรษณีย์" readonly >
      </div>
  </div>
</div>
  <div class="text-center">
      <button class="btn btn-primary " type="submit">บันทึก</button>
      <button class="btn btn-secondary " type="reset">ยกเลิก</button>
  </div>
</form>

<script type="text/javascript">
  $(document).ready(function() {

		$.get( "js/function.js");

	 loaddata($("#provinces option:selected").val(),"<?php echo $districtid ?>","<?php echo $provincesid ?>");

	 function loaddata(idpv,iddt,idsdt){
		   destroyselectdistrict()
      destroyselectsubdistricts()



       $.post('module/users/loaddatadistricts_update.php', {id: idpv,idd:iddt}).done(function(data){
          //alert(data);
          $('#district').prop('disabled', false);
          $('#subdistricts').html('');
          $('#district').html(data);
          $('#district').selectpicker();

		  idmds = $('#district option:selected').val();

           $.post('module/users/loaddatasubdistrict_update.php', {id: idmds,idsd:idsdt}).done(function(data){
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
    loaddata(idpv,"","")

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

  })
</script>
