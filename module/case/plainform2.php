<?php
include('../../function/connect_db.php');
  //select คำนำหน้าชื่อ
$text_tit="";
$title=mysqli_query($con,"SELECT * FROM titles") or die ("Mysqli error title =>>>".mysqli_error($con));
//ดึงข้อมูลคำนำหน้าชื่อ
    while(list($id,$name)=mysqli_fetch_row($title)){
       $text_tit.="<option value='$id'>$name</option>";  
    }
  $text_prov="";
    $province=mysqli_query($con,"SELECT id,name_in_thai FROM provinces")
    or die ("Mysqli error provinces=>>>".mysqli_error($con));
//ดึงข้อมูลจังหวัด
    while(list($id,$name_thai)=mysqli_fetch_row($province)){
      $text_prov.= "<option value='$id' data-tokens='$id'>$name_thai</option>";
    }
?>
<br>
<form id="formaddprofile" style="font-size:14px">
<div class='col-12'><h6><b>ข้อมูลส่วนตัว</b></h6></div>
<div class='shadow-sm p-3 mb-2 bg-white rounded border bg-light'>
                <div class='form-group row'>
                    <label for='validationCustom05' class="col-md-1 col-form-label">คำนำหน้า</label>
                        <div class="col-md-2">
                            <select name='title' class='form-control' required>
                                <?php  echo"\"".$text_tit."\"+";  ?>
                            </select>
                        </div>
                    <label for='' class="col-md-1 col-form-label">ชื่อ</label>
                        <div class="col-md-3">
                            <input type='text' name='fname' class='form-control'  placeholder='ชื่อ' required>
                        </div>
                    <label for='' class="col-md-1 col-form-label">นามสกุล</label>
                        <div class="col-md-3">
                            <input type='text' name='lname' class='form-control'  placeholder='นามสกุล' required>     
                        </div>
                </div>
                <div class='form-group row'>
                    <label for='validationCustom05' class="col-md-2 col-form-label">เลขบัตรประชาชน</label>
                        <div class='col-md-2'>
                            <input type='text' class='form-control allownumericwithoutdecimal' placeholder='เลขบัตรประชาชน' name='idcard' maxlength='13' required  onkeyup=''>
                        </div>
                    <label for='validationCustom05' class="col-md-1 col-form-label">เชื้อชาติ</label>
                        <div class='col-md-2'>
                             <input type='text' class='form-control' placeholder='เชื้อชาติ' name='natio' required value=''>
                         </div>                   
                    <label for='validationCustom05' class="col-md-1 col-form-label">สัญชาติ</label>
                        <div class='col-md-2'>
                             <input type='text' class='form-control' placeholder='สัญชาติ' name='ethni' required value=''>
                        </div>
                </div>
                <div class="form-group row">
                    <label for='validationCustom05' class="col-md-1 col-form-label" >โทรศัพท์</label>
                        <div class=' col-md-2'>
                            <input type='text' class='form-control allownumericwithoutdecimal' placeholder='โทรศัพท์' name='tel' maxlength='10' required value=''>
                        </div>
                            <label for='validationCustom05' class="col-md-1 col-form-label">โทรสาร</label>
                        <div class='col-md-2'>
                            <input type='text' class='form-control' placeholder='โทรสาร' name='fax' maxlength='10'  value=''>
                        </div>
                            <label for='validationCustom05'class="col-md-2 col-form-label">จดหมายอิเล็กทรอนิกส์</label>
                        <div class='col-md-3'>
                            <input type='email' class='form-control' placeholder='จดหมายอิเล็กทรอนิกส์' name='email'  value=''>
                        </div>
                </div>
</div>    
<div class='col-12'><h6><b>ที่อยู่</b></h6></div>
<div class='shadow-sm p-3 mb-2 bg-white rounded border bg-light'>            
                <div class="form-group row">
                    <label for='validationCustom05'class="col-sm-1 col-form-label">บ้านเลขที่</label>
                        <div class='col-md-2'>
                            <input type='text' name='number' class='form-control' placeholder='บ้านเลขที่' required value=''>
                        </div>                    
                    <label for='validationCustom05'class="col-sm-1 col-form-label">หมูที่</label>
                    <div class='col-md-2'>
                        <input type='text' name='moo' class='form-control' placeholder='หมู่ที่' required value=''>
                    </div>
                    <label for='' class="col-sm-1 col-form-label">ซอย</label>
                        <div class='col-md-2'>
                            <input type='text' name='lone' class='form-control' placeholder='ซอย'  value=''>
                        </div>
                    <label for='validationCustom05' class="col-sm-1 col-form-label">ถนน</label>
                        <div class='col-md-2'>
                            <input type='text' name='road' class='form-control' placeholder='ถนน'  value=''>
                        </div>
                        
                </div>
                <div class='form-group row'>
                    <label for='validationCustom03' class="col-sm-1 col-form-label">จังหวัด</label>
                        <div class='col-md-2'>
                            <select name='province' id='provincess' class='form-control' data-live-search='true' data-size='6' required>
                                <?php  echo"\"".$text_prov."\"+";  ?>
                            </select>
                        </div>
                   
                        <label for='validationCustom04' class="col-sm-1 col-form-label">อำเภอ</label>
                        <div class='col-md-2' >
                            <select name='districts' id='districts' class='form-control' data-live-search='true'  disabled data-size='6'>
                                <option selected='selected' >อำเภอ</option>
                            </select>
                    </div>
                        <label for='validationCustom05' style="" class="col-md-1 col-form-label">ตำบล</label>
                        <div class='col-md-2'>
                            <select name='subdistricts' id='subdistricts' class='form-control ' data-live-search='true'  disabled data-size='6'>
                                <option selected='selected' disabled>ตำบล/แขวง</option>
                            </select>
                    </div>
                </div>
                    <div class='form-group row'>
                        <label   class="col-md-2 col-form-label">รหัสไปรษณีย์</label>
                        <div class='col-md-3'>
                            <input type='text' name='zipcode' id='zipcodes' class='form-control' placeholder='รหัสไปรษณีย์' readonly >
                        </div>
                </div> 
    </div>            
                <div class='row '>
                    <div class="col-md text-center"> <button type="submit" class="btn btn-primary " id='addbtn'>บันทึกข้อลูกค้า</button></div>
                </div>               
</form>

<script type="text/javascript">
  $(document).ready(function() {
    $("#provincess").selectpicker();

    loaddata(1)
   
      $("#provincess").change(function(event) {
      var idpv = $(this).val()
        loaddata(idpv)
        });

      $("#districts").change(function(event) {
       destroyselectsubdistricts()
       var idpv = $(this).val()

       $.post('module/users/loaddatasubdistrict.php', {id: idpv}).done(function(data){
          //lert(data);
          $('#subdistricts').prop('disabled', false);
          $('#subdistricts').html(data);
          $('#subdistricts').selectpicker();
          $('#districts').selectpicker();
          $('#zipcodes').val($("option:selected","#subdistricts").data('zipcode'))  // LOAD zipcode
       }) 
    });

    $('#subdistricts').change(function(event) {

    $('#zipcode').val($("option:selected",this).data('zipcode'))
    });

	 function loaddata(data){
		  destroyselectdistrict()
      destroyselectsubdistricts()
	  var idpv = data;
       $.post('module/users/loaddatadistricts.php', {id: idpv}).done(function(data){
          //alert(data);
          $('#districts').prop('disabled', false);
          $('#subdistricts').html('');
          $('#districts').html(data);
          $('#districts').selectpicker();

           var idpv = $("#districts").val()

           $.post('module/users/loaddatasubdistrict.php', {id: idpv}).done(function(data){
          //alert(data);
          $('#subdistricts').prop('disabled', false);
          $('#subdistricts').html(data)
          $('#subdistricts').selectpicker();

          $('#zipcodes').val($("option:selected",'#subdistricts').data('zipcode')) // LOAD zipcode
          })
       })
		
     destroyselectdistrict()
     destroyselectsubdistricts()
      
  }

  function destroyselectdistrict(){
        $('#districts').selectpicker('destroy');
    }

     function destroyselectsubdistricts(){
        $('#subdistricts').selectpicker('destroy');
    } 

   
        $("#formaddprofile").submit(function(e){
            e.preventDefault()
            var r = confirm("ตุณต้องการบันทึกของข้อมูลใช่ไหม?");
            if (r == true) {
                $.post('module/users/insert_profile.php', $(this).serialize()).done(function(data){
                    alert(data)
                    $('#nav-home-tab').trigger("click")
                })
            } 
        }); 


        $(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    /// NUMBER ONLY
           $(this).val($(this).val().replace(/[^\d].+/, "")); 
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
   
  })
</script>