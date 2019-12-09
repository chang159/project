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


<form id="foreditbrc">
    <div class="modal fade" id="plainform" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" >
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header headtitle " style="background-color:black; color:white; ">
                    <h5 class="modal-title" id="exampleModalLabel"><b>เพิ่มโจทย์</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <div class="modal-body">
            <div class="col-sm" >
                <div class='form-group row'>
                    <label for=''  class="col-sm-2 col-form-label">โจทย์</label>
                        <div class="col-sm-5">
                            <input type='text' class='form-control no1'   placeholder='ผู้ร้อง'>
                        </div>
                </div>
                <div class='form-group row'>
                    <label for='validationCustom05' class="col-sm-2 col-form-label">คำนำหน้า</label>
                        <div class="col-sm-2">
                            <select name='title1[]' class='form-control' required>
                                <?php  echo"\"".$text_tit."\"+";  ?>
                            </select>
                        </div>
                    <label for='' class="col-sm-1 col-form-label">ชื่อ</label>
                        <div class="col-sm-3">
                            <input type='text' name='fname1[]' class='form-control'  placeholder='ชื่อ'>
                        </div>
                    <label for='' class="col-sm-1 col-form-label">นามสกุล</label>
                        <div class="clo-sm-3">
                            <input type='text' name='lname1[]' class='form-control'  placeholder='นามสกุล'>     
                        </div>
                </div>
                <div class='form-group row'>
                    <label for='validationCustom05' class="col-sm-2 col-form-label">รหัสบัตรประชาชน</label>
                        <div class='col-md-2'>
                            <input type='text' class='form-control' placeholder='รหัสบัตรประชาชน' name='idcard1[]' maxlength='13' required  onkeyup=''>
                        </div>
                    <label for='validationCustom05' class="col-sm-1 col-form-label">เชื้อชาติ</label>
                        <div class='col-md-2'>
                             <input type='text' class='form-control' placeholder='เชื้อชาติ' name='natio1[]' required value=''>
                         </div>                   
                    <label for='validationCustom05' class="col-sm-1 col-form-label">สัญชาติ</label>
                        <div class='col-md-2'>
                             <input type='text' class='form-control' placeholder='สัญชาติ' name='ethni1[]' required value=''>
                        </div>
                </div>
                <div class="form-group row">
                    <label for='validationCustom05' class="col-sm-2 col-form-label">โทรศัพท์</label>
                        <div class=' col-md-2'>
                            <input type='text' class='form-control' placeholder='โทรศัพท์' name='tel1[]' maxlength='10' required value=''>
                        </div>
                            <label for='validationCustom05' class="col-sm-1 col-form-label">โทรสาร</label>
                        <div class='col-md-2'>
                            <input type='text' class='form-control' placeholder='โทรสาร' name='fax1[]' maxlength='10' required value=''>
                        </div>
                            <label for='validationCustom05'class="col-sm-2 col-form-label">จดหมายอิเล็กทรอนิกส์</label>
                        <div class='col-md-2'>
                            <input type='email' class='form-control' placeholder='จดหมายอิเล็กทรอนิกส์' name='email1[]' required value=''>
                        </div>
                </div>
                <div class="form-group row">
                    <label for='validationCustom05'class="col-sm-2 col-form-label">บ้านเลขที่</label>
                        <div class='col-md-2'>
                            <input type='text' name='number1[]' class='form-control' placeholder='บ้านเลขที่' required value=''>
                        </div>                    
                    <label for='validationCustom05'class="col-sm-1 col-form-label">หมูที่</label>
                    <div class='col-md-2'>
                        <input type='text' name='moo1[]' class='form-control' placeholder='หมู่ที่' required value=''>
                    </div>
                    <label for='validationCustom05' class="col-sm-1 col-form-label">ถนน</label>
                        <div class='col-md-2'>
                            <input type='text' name='road1[]' class='form-control' placeholder='ถนน' required value=''>
                        </div>
                </div>
           
            
                <div class='form-group row'>
                    <label for='validationCustom03' class="col-sm-2 col-form-label">จังหวัด</label>
                        <div class='col-md-2'>
                            <select name='provinces1[]' id='' class='form-control  provinces' data-live-search='true'  data-size='6' required>
                                <?php  echo"\"".$text_prov."\"+";  ?>
                            </select>
                        </div>
                   
                        <label for='validationCustom04' class="col-sm-1 col-form-label">อำเภอ</label>
                        <div class='col-md mb-3' >
                            <select name='district1[]' id='district' class='form-control ' data-live-search='true'  disabled data-size='6'>
                                <option selected='selected' >อำเภอ</option>
                            </select>
                    </div>
                        <label for='validationCustom05' class="col-sm-1 col-form-label">ตำบล/แขวง</label>
                        <div class='col-md mb-2'>
                            <select name='subdistricts1[]' id='subdistricts' class='form-control ' data-live-search='true'  disabled data-size='6'>
                                <option selected='selected' disabled>ตำบล/แขวง</option>
                            </select>
                    </div>
                </div>
                    <div class='form-group row'>
                        
                        <label   class="col-sm-1 col-form-label">รหัสไปรษณีย์</label>
                        <div class='col-md-3'>
                            <input type='text' name='zipcode1[]' id='zipcode' class='form-control' placeholder='รหัสไปรษณีย์' readonly >
                        </div>
                    </div>
            </div>
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-primary" id="updatesu">บันทึก</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
  $(document).ready(function() {
    $("#addp2").click(function(){
        //alert("ggg")
        // e.preventDefault();
        pople2()
        focustext2()
    })

    $("#cancel").click(function(){
      swal({
  title: "คุณต้องการยกเลิกใช่หรือไม่?",
  text: "",
  icon: "warning",
  buttons: true,
  dangerMode: true,
  buttons: ["ยกเลิก", "ตกลง"],
})
.then((willDelete) => {
  if (willDelete) {
    swal("ยกเลิกไม่บันทึกแล้ว", {
      icon: "success",
    });
  } else {
   // swal("Your imaginary file is safe!");
  }
});
    })
     function focustext1(){
      $( ".no1" ).focus();
     }
     function focustext2(){
      $( ".no2" ).focus();
     }
     no=0;
     function pople(){

       count=$('.loadpeple').length
       if(count<10&&count >=0){
        no++;
         var text="<li class='list-group-item rem'>"
  +"<div class='form-row'>"
      +"<div class='form-group col-md-2'>"
         +"<label for=''>โจทย์</label>"
         +"<input type='text' class='form-control no1'   placeholder='ผู้ร้อง'"+"value="+count+">"
      +"</div>"
      +"<div class='form-group col-md-2'>"
         +"<label for='validationCustom05'>คำนำหน้าชื่อ</label>"
            +"<select name='title1[]' class='form-control' required>"
              + <?php  echo"\"".$text_tit."\"+";  ?>
          "</select>"
        +"</div>"
          
      +"<div class='form-group col-md'>"
          +"<label for=''>ชื่อ</label>"
          +"<input type='text' name='fname1[]' class='form-control'  placeholder='ชื่อ'>"
      +"</div>"
      +"<div class='form-group col-md-4'>"
          +"<label for=''>นามสกุล</label>"
          +"<input type='text' name='lname1[]' class='form-control'  placeholder='นามสกุล'>"
      +"</div>"
      +"</div>"

         +"<input type='hidden' name='user_id1[]' >"
  +"<div class='form-row'>"
      +"<div class='form-group col-md-2'>"
        +"<label for='validationCustom05'>รหัสบัตรประชาชน</label>"
        +"<input type='text' class='form-control' placeholder='รหัสบัตรประชาชน' name='idcard1[]' maxlength='13' required  onkeyup=''>"
      +"</div>"
      +"<div class='form-group col-md-2'>"
        +"<label for='validationCustom05'>เชื้อชาติ</label>"
        +"<input type='text' class='form-control' placeholder='เชื้อชาติ' name='natio1[]' required value=''>"
        +"</div>"
      +"<div class='form-group col-md-2'>"
        +"<label for='validationCustom05'>สัญชาติ</label>"
        +"<input type='text' class='form-control' placeholder='สัญชาติ' name='ethni1[]' required value=''>"
      +"</div>"
      +"<div class='form-group col-md-2'>"
        +"<label for='validationCustom05'>โทรศัพท์</label>"
        +"<input type='text' class='form-control' placeholder='โทรศัพท์' name='tel1[]' maxlength='10' required value=''>"
      +"</div>"
      +"<div class='form-group col-md-2'>"
        +"<label for='validationCustom05'>โทรสาร</label>"
        +"<input type='text' class='form-control' placeholder='โทรสาร' name='fax1[]' maxlength='10' required value=''>"
      +"</div>"
      +"<div class='form-group col-md-2'>"
        +"<label for='validationCustom05'>จดหมายอิเล็กทรอนิกส์</label>"
        +"<input type='email' class='form-control' placeholder='จดหมายอิเล็กทรอนิกส์' name='email1[]' required value=''>"
      +"</div>"
      +"<div class='col'>"
        +"<label for='validationCustom05'>บ้านเลขที่</label>"
        +"<input type='text' name='number1[]' class='form-control' placeholder='บ้านเลขที่' required value=''>"
      +"</div>"
      +"<div class='col'>"
        +"<label for='validationCustom05'>หมูที่</label>"
        +"<input type='text' name='moo1[]' class='form-control' placeholder='หมู่ที่' required value=''>"
      +"</div>"
      +"<div class='col'>"
        +"<label for='validationCustom05'>ถนน</label>"
        +"<input type='text' name='road1[]' class='form-control' placeholder='ถนน' required value=''>"
      +"</div>"
      +"<div class='col'>"
        +"<label for='validationCustom05'>ซอย</label>"
        +"<input type='text' name='lone1[]' class='form-control' placeholder='ซอย' required value=''>"
      +"</div>"
  +"</div>"
  +"<div class='form-row mt-2'>"
      +"<div class='col-md'>"
          +"<label for='validationCustom03'>จังหวัด</label>"
            +"<select name='provinces1[]' id='' class='form-control  provinces ' data-live-search='true'  data-size='6' required>"
            + <?php  echo"\"".$text_prov."\"+";  ?>
          "</select>"

      +"</div>"

        +"<div class='col-md mb-3' >"
              +"<label for='validationCustom04'>อำเภอ</label>"
                  +"<select name='district1[]' id='district' class='form-control ' data-live-search='true'  disabled data-size='6'>"
                      +"<option selected='selected' >อำเภอ</option>"
                  +"</select>"

        +"</div>"
        +"<div class='col-md mb-3'>"
            +"<label for='validationCustom05'>ตำบล/แขวง</label>"
                +"<select name='subdistricts1[]' id='subdistricts' class='form-control ' data-live-search='true'  disabled data-size='6'>"
                    +"<option selected='selected' disabled>ตำบล/แขวง</option>"
                +"</select>"

        +"</div>"
  +"</div>"
        +"<div class='form-row mt-1 mb-2'>"
            +"<div class='col-3 mb-3'>"
                +"<label >รหัสไปรษณีย์</label>"
                +"<input type='text' name='zipcode1[]' id='zipcode' class='form-control' placeholder='รหัสไปรษณีย์' readonly >"
            +"</div>"
        +"</div>"
        +"</li>"
        
        $('.loadpeple').append(text)
       }
          $(".provinces").change(function(event) {
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

     function destroyselectdistrict(){
        $('#district').selectpicker('destroy');
    }

     function destroyselectsubdistricts(){
        $('#subdistricts').selectpicker('destroy');
    }  
  }

  function pople2(){
       count=$('.loadpeple2').length
       if(count<10&&count >=0){
        
         var text="<li class='list-group-item rem'>"
  +"<div class='form-row'>"
      +"<div class='form-group col-md-2'>"
         +"<label for=''>จำเลย</label>"
         +"<input type='text' class='form-control no2'  placeholder='จำเลย'"+"value="+count+">"
      +"</div>"
      +"<div class='form-group col-md-2'>"
         +"<label for='validationCustom05'>คำนำหน้าชื่อ</label>"
            +"<select name='title2[]' class='form-control' required>"
              + <?php  echo"\"".$text_tit."\"+";  ?>
          "</select>"
        +"</div>"
          
      +"<div class='form-group col-md'>"
          +"<label for=''>ชื่อ</label>"
          +"<input type='text' name='fname2[]' class='form-control'  placeholder='ชื่อ'>"
      +"</div>"
      +"<div class='form-group col-md-4'>"
          +"<label for=''>นามสกุล</label>"
          +"<input type='text' name='lname2[]' class='form-control'  placeholder='นามสกุล'>"
      +"</div>"
      +"</div>"

         +"<input type='hidden' name='user_id2[]' >"
  +"<div class='form-row'>"
      +"<div class='form-group col-md-2'>"
        +"<label for='validationCustom05'>รหัสบัตรประชาชน</label>"
        +"<input type='text' class='form-control' placeholder='รหัสบัตรประชาชน' name='idcard2[]' maxlength='13' required  onkeyup=''>"
      +"</div>"
      +"<div class='form-group col-md-2'>"
        +"<label for='validationCustom05'>เชื้อชาติ</label>"
        +"<input type='text' class='form-control' placeholder='เชื้อชาติ' name='natio2[]' required value=''>"
        +"</div>"
      +"<div class='form-group col-md-2'>"
        +"<label for='validationCustom05'>สัญชาติ</label>"
        +"<input type='text' class='form-control' placeholder='สัญชาติ' name='ethni2[]' required value=''>"
      +"</div>"
      +"<div class='form-group col-md-2'>"
        +"<label for='validationCustom05'>โทรศัพท์</label>"
        +"<input type='text' class='form-control' placeholder='โทรศัพท์' name='tel2[]' maxlength='10' required value=''>"
      +"</div>"
      +"<div class='form-group col-md-2'>"
        +"<label for='validationCustom05'>โทรสาร</label>"
        +"<input type='text' class='form-control' placeholder='โทรสาร' name='fax2[]' maxlength='10' required value=''>"
      +"</div>"
      +"<div class='form-group col-md-2'>"
        +"<label for='validationCustom05'>จดหมายอิเล็กทรอนิกส์</label>"
        +"<input type='email' class='form-control' placeholder='จดหมายอิเล็กทรอนิกส์' name='email2[]' required value=''>"
      +"</div>"
      +"<div class='col'>"
        +"<label for='validationCustom05'>บ้านเลขที่</label>"
        +"<input type='text' name='number2[]' class='form-control' placeholder='บ้านเลขที่' required value=''>"
      +"</div>"
      +"<div class='col'>"
        +"<label for='validationCustom05'>หมูที่</label>"
        +"<input type='text' name='moo2[]' class='form-control' placeholder='หมู่ที่' required value=''>"
      +"</div>"
      +"<div class='col'>"
        +"<label for='validationCustom05'>ถนน</label>"
        +"<input type='text' name='road2[]' class='form-control' placeholder='ถนน' required value=''>"
      +"</div>"
      +"<div class='col'>"
        +"<label for='validationCustom05'>ซอย</label>"
        +"<input type='text' name='lone2[]' class='form-control' placeholder='ซอย' required value=''>"
      +"</div>"
  +"</div>"
  +"<div class='form-row mt-2'>"
      +"<div class='col-md'>"
          +"<label for='validationCustom03'>จังหวัด</label>"
            +"<select name='provinces2[]' id='' class='form-control  provinces2 ' data-live-search='true'  data-size='6' required>"
            + <?php  echo"\"".$text_prov."\"+";  ?>
          "</select>"

      +"</div>"

        +"<div class='col-md mb-3' >"
              +"<label for='validationCustom04'>อำเภอ</label>"
                  +"<select name='district2[]' id='district2' class='form-control ' data-live-search='true'  disabled data-size='6'>"
                      +"<option selected='selected' >อำเภอ</option>"
                  +"</select>"

        +"</div>"
        +"<div class='col-md mb-3'>"
            +"<label for='validationCustom05'>ตำบล/แขวง</label>"
                +"<select name='subdistricts2[]' id='subdistricts2' class='form-control ' data-live-search='true'  disabled data-size='6'>"
                    +"<option selected='selected' disabled>ตำบล/แขวง</option>"
                +"</select>"

        +"</div>"
  +"</div>"
        +"<div class='form-row mt-1 mb-2'>"
            +"<div class='col-3 mb-3'>"
                +"<label >รหัสไปรษณีย์</label>"
                +"<input type='text' name='zipcode2[]' id='zipcode2' class='form-control' placeholder='รหัสไปรษณีย์' readonly >"
            +"</div>"
        +"</div>"
        +"</li>"
        
        $('.loadpeple2').append(text)
       }
          $(".provinces2").change(function(event) {
           var idpv = $(this).val()
           //alert(idpv)
        loaddata2(idpv)
        });
        $("#district2").change(function(event) {
       destroyselectsubdistricts()
       var idpv = $(this).val()

       $.post('module/users/loaddatasubdistrict.php', {id: idpv}).done(function(data){
          //lert(data);
          $('#subdistricts2').prop('disabled', false);
          $('#subdistricts2').html(data);
          $('#subdistricts2').selectpicker();
          $('#district2').selectpicker();

          $('#zipcode2').val($("option:selected","#subdistricts2").data('zipcode2'))  // LOAD zipcode
       }) 
    });
    $('#subdistricts2').change(function(event) {

    $('#zipcode2').val($("option:selected",this).data('zipcode2'))
    });

     loaddata2('1')

	 function loaddata2(data){
		   destroyselectdistrict()
       destroyselectsubdistricts()
	  var idpv = data;
       $.post('module/users/loaddatadistricts.php', {id: idpv}).done(function(data){
          //alert(data);
          $('#district2').prop('disabled', false);
          $('#subdistricts2').html('');
          $('#district2').html(data);
          $('#district2').selectpicker();

           var idpv = $("#district2").val()

           $.post('module/users/loaddatasubdistrict.php', {id: idpv}).done(function(data){
         // alert(data);
          $('#subdistricts2').prop('disabled', false);
          $('#subdistricts2').html(data)
          $('#subdistricts2').selectpicker();

          $('#zipcode2').val($("option:selected",'#subdistricts2').data('zipcode2')) // LOAD zipcode
          })
       })
		 } 

     function destroyselectdistrict(){
        $('#district').selectpicker('destroy');
    }

     function destroyselectsubdistricts(){
        $('#subdistricts').selectpicker('destroy');
    }  
    function destroyselectdistrict(){
        $('#district2').selectpicker('destroy');
    }

     function destroyselectsubdistricts(){
        $('#subdistricts2').selectpicker('destroy');
    }  
  }

    
  })
</script>