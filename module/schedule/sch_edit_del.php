<?php 
 include("../../function/connect_db.php");

 $re=mysqli_query($con,"SELECT sch_id,sch_name,case_id,sch_date,times FROM schedule WHERE sch_id = '$_POST[schid]' ");
 list($sch_id,$sch_name,$case_id,$sch_date,$times)=mysqli_fetch_row($re);

 mysqli_free_result($re);
 mysqli_close($con);

?>

<form id='formeditsch'>
<div class="modal fade" id="schmodeladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> แก้ไขตารางนัด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="hidden" class="form-control" name="schid" value='<?php echo $sch_id ?>' required>
        <div class="form-group row">
          <label for="" class='col-md-2'>หัวข้อ</label>
          <input type="text" class="form-control col-md-8" name="title" value='<?php echo $sch_name ?>' placeholder="" required>
        </div>
        <div class="form-group row">  
          <label for="" class='col-md-2'>เลขคดี</label><br>
          <input type="text" class="form-control col-md-4 " name="caseid" id="caseid" value='<?php echo $case_id ?>'  placeholder="" readonly>
          <!-- <div class='col-md-2'>
            <a data-toggle="modal" href="#choosecase" class="btn btn-primary">เลือก</a>
          </div> -->
          
        </div>  
        <div class="form-group row">  
          <label for="" class='col-md-2'>วันที่</label>
          <input type="date" class="form-control col-md-4" name="date" value='<?php echo $sch_date ?>'   placeholder="">
        </div>  
        <div class="form-group row">  
          <label for="" class='col-md-2'>เวลา</label>
          <input type="time" class="form-control col-md-4" name="time" value='<?php echo $times ?>' min='8' max='17'   placeholder="" required>
        </div>

      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-danger" id='delsch'  data-schid='<?php echo $sch_id ?>'>ลบ</button>
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


   $('#formeditsch').submit(function(e){
    e.preventDefault();
    swal({
        title: "คุณต้องการบันทึกข้อมูลใช่ไหม่",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
         
            $.post( "module/schedule/update_sch.php", $( "#formeditsch" ).serialize() ).done(function(data){
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
    })  

    $('#delsch').click(function(e){
    e.preventDefault();
    swal({
        title: "คุณต้องการลบข้อมูลใช่ไหม",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
         
            $.post( "module/schedule/sch_del.php", {schid :  $('#delsch').data('schid')} ).done(function(data){
               // $('#schmodeladd').modal('');
               //alert(data);
               swal("ลบข้อมูลสำเร๊จ", {
            icon: "success",
            buttons: false,
            timer:1000
            });

            setTimeout(function(){  location.reload(); }, 1200);
              
            })
        } 
      });
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
      <div class="modal-body">
        <?php 
          include("../listdata/listschcase.php");
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
  $('.choosecaseid').click(function(){
    ///alert($(this).data('caseid'));
    $('#caseid').val($(this).data('caseid'));
    $('#choosecase').modal('hide')
  })
})
</script>   




