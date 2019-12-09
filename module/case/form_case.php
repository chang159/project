<?php
include('function/connect_db.php');

$court=mysqli_query($con,"SELECT * FROM court") or die ("Mysqli error title =>>>".mysqli_error($con));

?>

<form id="formcase" action="index.php?module=2&action=13" method="post" class='table'> <!--ส่งค่าไปไฟล์ insert_case-->
  <!--ฟอร์มกรอกข้อมูลรายละเอียดคดี-->

<div class="row mb-3"><div class="col-md text-center"><h3 class='titleh'>เพิ่มรายละเอียดคดี</h3></div></div>
<b>ศาล</b>
<div class='shadow-sm p-3 mb-1 bg-white rounded border border-dark rounded'>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="">ศาล</label>
        <select class="form-control selectpicker" name="t_name" data-live-search='true' placeholder="ศาลจังหวัด/ศาลแขวง" data-size='6'>
          <?php 
          while(list($idc,$namec)=mysqli_fetch_row($court)){
            echo  "<option value='$idc'>$namec</option>";
          } 
          ?>
        </select> 
    </div>
    <div class="form-group col-md-2">
      <label for="">เลขคดีดำ</label>
      <input type="text" class="form-control"  placeholder="คดีดำ" name="nobk"  required>
    </div>
    <div class="form-group col-md-2">
      <label for="">เลขคดีแดง</label>
      <input type="text" class="form-control"  placeholder="คดีแดง" readonly>
    </div>
    <div class="form-group col-md-2">
      <label for="">วันนัดศาล</label>
      <input type="date" class="form-control" min="<?php echo date("Y-m-d")?>"  placeholder="วันนัดหมาย" name="date" required>
    </div>
    <div class="form-group col-md-2">
      <label for="">เวลานัดศาล</label>
      <input type="time" class="form-control"  placeholder="เวลานัดหมาย" min="08:00" max="17:00" name="time" required>
    </div>
  </div>
</div>
<br>
  <b>โจทย์</b>
<div  class='shadow-sm p-3 mb-1 bg-white rounded border border-dark rounded' >
<div class="form-row">
    <ul id="listp" class="list-group w-100">
      <li class="list-group-item">
        <div class="form-group row">
          <label for="" class="col-md-1  col-form-label">โจทย์ </label>
          <div class="col-md-3">
            <input type="text" name='titpt'  class="form-control" id="" value="" required>
          </div>
          <label for="" class="col-md-1 col-form-label">โดย </label>
          <div class="col-md-2">
            <input type="text"  class="form-control" name="pt[]" id="id1" value="" readonly  required>
          </div>
          <div class="col-md-3">
            <input type="text"  class="form-control disky" name="" id="name1" value="" readonly required>
          </div>
          <label for="" class="col-md-2"><button type="button" class="btn btn-primary choose btn-block" data-id="1" data-idcheck='1' >เลือก</button></label>
        </div>
      </li>
      <li class="list-group-item">
        <div class="form-group row">
          <label for="" class="col-md-1  col-form-label" style='font-size:15px'>และ/หรือ </label>
          <div class="col-md-2">
            <input type="text"  class="form-control" name="pt[]" id="id2" value="<?php echo $_SESSION['userid'] ?>" readonly  required>
          </div>
          <div class="col-md-3">
            <input type="text"  class="form-control disky" name="" id="name2" value="<?php echo $_SESSION['fristname']." ".$_SESSION['surename'] ?>" readonly required>
          </div>
          <!-- <label for="" class="col-md-2"><button type="button" class="btn btn-primary choose btn-block" data-id="2" data-idcheck='1' >เลือก</button></label> -->
        </div>
      </li>

    </ul>    
  </div> 
    <div class="form-row mt-1 mb-2">
      <button type="button" class="btn btn-secondary" id="addp1">เพิ่มโจทย์</button>
    </div>
</div>
<br>
<b>จำเลย</b>
<div  class='shadow-sm p-3 mb-1 bg-white rounded border border-dark rounded'>
    <div class="form-row">
      <ul id="plain" class="list-group w-100">
          <li  class="list-group-item" >
             <div class="form-group row">
                <label for="" class="col-md-1  col-form-label">จำเลย </label>
                <div class="col-md-2">
                  <input type="text"  class="form-control" name="ac[]" id="id21" value="" readonly required>
                </div>
                <div class="col-md-3">
                  <input type="text"  class="form-control" name="" id="name21" value="" readonly required>
                </div>
                <label for="" class="col-md-2"><button type="button" class="btn btn-primary choose btn-block" data-id="1" data-idcheck='2' >เลือก</button></label>
             </div>
          </li>
      </ul>
   
    <div id="loadplain"></div>
    <ul class="loadpeple2 list-group2"></ul>
    </div>
    <div class="form-row mt-1 mb-2">
      <button type="button" class="btn btn-secondary" id="addp2">เพิ่มจำเลย</button>
    </div>
</div>

<br>
<p style="text-align:center">
  <button class="btn btn-primary" type="submit"  id="save">บันทึก</button>
  <button class="btn btn-danger" type="button" id="cancel">ยกเลิก</button>
</p>
  
</form>
<?php
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
<script type="text/javascript">
  $(document).ready(function() {

    $('.selectpicker').selectpicker();

    $("#addp1").click(function(){
      // $.post( "module/case/plainform.php", { id: "gg"  } ).done(function(data){
      //       $("#loadplain").html(data);
      //       $('#plainform').modal('show');
      //   })

      // เพิ่ม โจทย์
      var cot = $("#listp").children().length;
                     
      var text ="<li class='list-group-item'>"
                +"  <div class='form-group row'>"
                +"    <label class='col-md-1 col-form-label' style='font-size:15px'>และ/หรือ</label>"
                +"    <div class='col-md-2'>"
                +"    <input type='text'  class='form-control' name='pt[]' id='id"+(cot+1)+"' value='' readonly required>"
                +"  </div>"
                +"  <div class='col-md-3'>"
                +"    <input type='text'  class='form-control' name='' id='name"+(cot+1)+"' value='' readonly required>"
                +"  </div>"
                +"    <label for='' class='col-md-2'><button type='button' class='btn btn-primary choose btn-block' data-id='"+(cot+1)+"' data-idcheck='1'>เลือก</button></label>"
                +"    <label for='' class='col-md-2'><button type='button' class='btn btn-danger del btn-block' >ลบ</button></label>"
                +"  </div>"
                +"</li>"

      $("#listp").append(text);    // เพิ่มต่อท้าย ol  ID listp

    })

    // ลบ โจทย์
    $("#listp").on("click",".del",function(){
      $(this).closest("li").remove();
    }) 
    $("#plain").on("click",".del",function(){
      $(this).closest("li").remove();
    }) 

    $("#addp2").click(function(){
         var cot = $("#plain").children().length;
                     
      var text ="<li class='list-group-item'>"
                +"  <div class='form-group row'>"
                +"    <label class='col-md-1 col-form-label' style='font-size:15px'>และ</label>"
                +"    <div class='col-md-2'>"
                +"    <input type='text'  class='form-control' name='ac[]' id='id2"+(cot+1)+"' value='' readonly required>"
                +"  </div>"
                +"  <div class='col-md-3'>"
                +"    <input type='text'  class='form-control' name='' id='name2"+(cot+1)+"' value='' readonly required>"
                +"  </div>"
                +"    <label for='' class='col-md-2'><button type='button' class='btn btn-primary choose btn-block' data-id='"+(cot+1)+"' data-idcheck='2' >เลือก</button></label>"
                +"    <label for='' class='col-md-2'><button type='button' class='btn btn-danger del btn-block' >ลบ</button></label>"
                +"  </div>"
                +"</li>"

      $("#plain").append(text);    // เพิ่มต่อท้าย ol  ID listp
     
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
      buttons: false,
      timer: 1000,
    });
    $('#formcase').trigger("reset");
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


  function  countid (){
    var cot = $("#listp").children().length;
      var ids = new Array() 
      for (i = 1; i <= cot; i++) { 
        var m = $("#id"+i).val()
        if(m != ""){
          ids.push(m);  // เก็บ id profile
        }   
      }

    var cot2 = $("#plain").children().length;  
      for (i = 1; i <= cot2; i++) { 
        var m = $("#id2"+i).val()
        if(m != ""){
          ids.push(m);  // เก็บ id profile
        }   
      }
      return  ids.toString();
  }  


  $("#listp").on('click','.choose',function(){
   
      //alert(ids.toString()+" "+cot); // CHECK ARRAY

      var a = {
    id: $(this).data("id") ,
    idprofile : countid(),
    idcheck : $(this).data("idcheck")
    };
      $.post( "module/case/model_choose.php", a ).done(function(data){
            $("#loadplain").html(data);
            $('#plainform').modal('show');
        })
    })

    $("#plain").on('click','.choose',function(){
   
      //alert(ids.toString()+" "+cot); // CHECK ARRAY

      var a = {
    id: $(this).data("id") ,
    idprofile : countid(),
    idcheck : $(this).data("idcheck")
    };
      $.post( "module/case/model_choose.php", a ).done(function(data){
            $("#loadplain").html(data);
            $('#plainform').modal('show');
        })
    })

    $("#formcase").submit(function(e){
      e.preventDefault()
      var checkemptys = checkempty();
      if(checkemptys == "empty"){
        swal("เกิดข้อผิดผลาด", "กรุณาเลือกข้อมูลด้วย", "error");
      }else {
        swal({
          title: "คุณต้องการบันทึกข้อมูลใช่ไหม",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          buttons: ["ปิด","บันทึก"]
        })
        .then((willDelete) => {
          if (willDelete) {
              $.post( "module/case/insert_case.php", $("#formcase").serialize()  ).done(function(data){
                    swal({
                      title: "Good job!",
                      text: "You clicked the button!",
                      icon: "success",
                      buttons: false,
                      timer: 2000,
                    });
                    setTimeout(function(){
                      window.location = 'index.php?module=1&action=1';
                    }, 2000);
                   
                  
              })
          } 
        });
      }
    })

    $(".disky").keypress(function (evt) {

      $(".disky").val($(".disky").val());

    })

    function  checkempty (){
    var cot = $("#listp").children().length;
    var text =""
      
      for (i = 1; i <= cot; i++) { 
        var m = $("#id"+i).val()
        if(m == ""){
          text="empty" 
          break;
        }   
      }

    var cot2 = $("#plain").children().length;  
      for (i = 1; i <= cot2; i++) { 
        var m = $("#id2"+i).val()
        if(m == ""){
          text="empty"
          break;
        }   
      }
      return text;
  }  
  
  })
</script>





