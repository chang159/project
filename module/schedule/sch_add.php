<form id='formaddsch'>
<div class="modal fade" id="schmodeladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> เพื่มตารางนัด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="" class='col-md-2'>หัวข้อ</label>
          <input type="text" class="form-control col-md-8" name="title" id="" placeholder="" required>
        </div>
        <div class="form-group row">  
          <label for="" class='col-md-2'>เลขคดี</label><br>
          <input type="text" class="form-control col-md-4 " name="caseid" id="caseid"   readonly required>
          <div class='col-md-2'>
            <a data-toggle="modal" href="#choosecase" class="btn btn-primary">เลือก</a>
          </div>
          
        </div>  
        <div class="form-group row">  
          <label for="" class='col-md-2'>วันที่</label>
          <input type="text" class="form-control col-md-3" name="date" id="" value='<?php echo $_POST['schid'] ?>' readonly  placeholder="">
        </div>  
        <div class="form-group row">  
          <label for="" class='col-md-2'>เวลา</label>
          <input type="time" class="form-control col-md-4" name="time" id="" value='' min='8' max='17'   placeholder="" required>
        </div>

      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="submit" class="btn btn-primary" id='btnschadd'>บันทึก</button>
      </div>
    </div>
  </div>
</div>
</form>

<style>
#choosecase {
   z-index: 1052;
}

.modal-backdrop + .modal-backdrop {
   z-index: 1051;
}
</style>
<script>

      $('#formaddsch').submit(function(e){
    e.preventDefault();
      if($("#caseid").val() != ""){
      swal({
          title: "คุณต้องการบันทึกข้อมูลใช่ไหม",
          text: "",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
          
              $.post( "module/schedule/insert_sch.php", $( "#formaddsch" ).serialize() ).done(function(data){
                // $('#schmodeladd').modal('');
                //alert(data);
                swal("บันทึกข้อมูลสำเร๊จ", {
              icon: "success",
              buttons: false,
              timer:1000
              });

              setTimeout(function(){  location.reload(); }, 1200);
                
              })
          } 
      });
      }else{
        swal("เกิดข้อผิดผลาด", "กรุณาเลือกข้อมูลด้วย", "error");
      }

    })  

  
</script>


<!-- เลือกเลบคดี -->
<div class="modal fade" id="choosecase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> เพื่มตารางนัด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body listschcase" id='listschcase'>
        <?php 
         // include("../listdata/listschcase.php");
        ?>

      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

$(document).ready(function() {
  $('#listschcase').on('click','.choosecaseid',function(){
///  $('.choosecaseid').click(function(){
    ///alert($(this).data('caseid'));
    $('#caseid').val($(this).data('caseid'));
   $('#choosecase').modal('hide')
   
  })
  $(".listschcase").load("module/listdata/listschcase.php")
})
</script>   




