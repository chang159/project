<div class="modal fade bd-example-modal-xl" id="plainform" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">ข้อมูลทั่วไป</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">ค้นหา</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">สร้างลูกค้า</a>
          
          
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"></div>
        <div class="tab-pane fade " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"></div> 
        
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    loadlistprofile()
    
    function loadlistprofile(){

      var a = {
    id: <?php echo $_POST['id'] ?> ,
    idprofile : "<?php echo empty($_POST['idprofile'])?"' '": $_POST['idprofile']?>",
    idcheck : <?php echo $_POST['idcheck'] ?> 
    }

       $.post( "module/listdata/listprofile.php", a ).done(function(data){
             $("#nav-home").html(data);   
         })
    }

    $('#nav-home-tab').click(function(){
      loadlistprofile()
    })

    $('#nav-profile-tab').click(function(){
      loadaddprofile()
    })
  
    function loadaddprofile(){

      $.post( "module/case/plainform2.php" ).done(function(data){
            $("#nav-profile").html(data);   
        })
      }

      

    

})
</script>
