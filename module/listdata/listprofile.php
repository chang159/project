<?php
  include('../../function/connect_db.php');

  $sql = "SELECT profile_id,profile_fname,profile_lname,profile_idcard,pm.per_name
  FROM profiles as pf
  INNER JOIN permit as pm ON pf.permission=pm.per_id
  WHERE pf.permission != 1 AND pf.permission != 2
  ";

  $idpro = $_POST['idprofile'];

  if(!empty($idpro)){

    $idpro_ex = explode(",",$idpro); // แยก ip PROFILE   EX 006,007,008

    //print_r($idpro_ex);
  
    $count=1;
    foreach($idpro_ex as $value){
       if($count==1){
        $sql .= " AND profile_id !='$value'";
       }else{
        $sql .= " AND profile_id !='$value'";
       }
       $count++;
    }
  }

  $sql .= " ORDER BY profile_id DESC";
 // echo $sql;
  $re = mysqli_query($con,$sql) or die(mysqli_error($con));
?>

<br>
<div class="table-responsive">
     <table class="table table-striped table-hover" id='Datatable' style='width:100%'>
            <thead>
                  <tr>
                      <th class='text-center'> เลือก</th>
                      <th class='text-center'>แก้ไข</th>
                      <th>รหัส</th>
                      <th>ชื่อ</th>
                      <th>สุกล</th> 
                      <th>รหัสประจำตัว</th>
                      <th>ประเภท</th>
                  </tr>
            </thead>
            <tbody>
            <?php
              while(list($profile_id,$profile_fname,$profile_lname,$profile_idcard,$per_name )=mysqli_fetch_row($re)){
                echo "<tr>
                        <td class='text-center'><button type='button' class='btn btn-primary choosec ' data-id='$profile_id' data-name='$profile_fname $profile_lname' ><i class='fas fa-check'></i> เลือก</button></td>
                        <td class='text-center'><button type='button' class='btn btn-primary editprofile ' data-id='$profile_id' data-name='$profile_fname $profile_lname' ><i class='fas fa-edit'></i>แก้ไข</button></td>
                        <td>$profile_id</td>
                        <td>$profile_fname</td>
                        <td>$profile_lname</td> 
                        <td>$profile_idcard</td>
                        <td>$per_name</td>
                      </tr> 
                ";
              }
              mysqli_close($con);
            ?>
            </tbody>
          </table>
</div>

<script type="text/javascript">

$(document).ready(function() {
  $.getScript( "js/mydatatable.js" );
<?php
  if($_POST['idcheck'] == 1){ // โจทย์
?>
    $(".choosec").click(function(){
      var id = $(this).data('id');
      var name = $(this).data('name');
    $("#name<?php echo $_POST['id'] ?>").val(name);
    $("#id<?php echo $_POST['id'] ?>").val(id);

    $('#plainform').modal('hide');
  })

<?php
}
  if($_POST['idcheck'] == 2){ // จำเลย
?>
  $(".choosec").click(function(){
      var id = $(this).data('id');
      var name = $(this).data('name');
    $("#name2<?php echo $_POST['id'] ?>").val(name);
    $("#id2<?php echo $_POST['id'] ?>").val(id);

    $('#plainform').modal('hide');
  })
<?php
}
?>

});
</script>           