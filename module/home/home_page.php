<?php
    include('function/connect_db.php');
    $sql="SELECT * FROM cases ";
    $result=mysqli_query($con,$sql)or die ("mysqli_error >>>".mysqli_error($con));
?>
<h3 class='titleh' > แสดงรายการคดี</h3>
<div class="table-responsive">
<table id='Datatable' class="table table-hover">
            <thead>
                  <tr>
                      <th>เลือก</th>
                      <th>โจทย์</th>
                      <th>จำเลย</th>
                      <th>ศาล</th> 
                      <th>คดีดำ</th>  
                      <th>คดีแดง</th>  
                      <th>รายการนัด(ประเภทนัด)</th>   
                      <th>วันที่นัด</th>     
                  </tr>
            </thead>
            <tbody>
            <?php
              while(list($case_id,$cas_stus,$caseidred,$profile_id,$tri_id,$title_plaintiffs,$case_date,$case_time)=mysqli_fetch_row($result)){
                
                echo "<tr>
                        <td><button type='button' class='btn btn-primary choosec ' data-id='$case_id' data-name='' >เลือก</button></td>";
            ?>
                        <td>
           <?php       //โจทย์
           $sql2="SELECT no,profile_id FROM plaintiffs WHERE case_id='$case_id'";
                         $result_plaintiff=mysqli_query($con,$sql2)or die ("mysqli2_error >>>".mysqli_error($con));
                         while(list($plain_no,$profile_id)=mysqli_fetch_row($result_plaintiff)){
                              $sql_plain=mysqli_query($con,
                              "SELECT titles.title_name,profile_fname,profile_lname FROM profiles
                              INNER JOIN titles
                              ON profiles.title_id=titles.title_id
                              WHERE profile_id='$profile_id'") or die ("sql_plain.error >>>".mysqli_error($con));
                              while(list($tittle_plain,$plain_fname,$plain_lname)=mysqli_fetch_row($sql_plain)){
                                  echo $plain_no," ",$tittle_plain,$plain_fname," ",$plain_lname,"<br>";
                              }
                         }
            ?>
                        </td>
                        <td>
                        <?php       //จำเลย
           $sql3="SELECT no,profile_id FROM accuseds WHERE case_id='$case_id'";
                         $result_plaintiff=mysqli_query($con,$sql3)or die ("mysqli2_error >>>".mysqli_error($con));
                         while(list($plain_no,$profile_id)=mysqli_fetch_row($result_plaintiff)){
                              $sql_acc=mysqli_query($con,
                              "SELECT titles.title_name,profile_fname,profile_lname FROM profiles
                              INNER JOIN titles
                              ON profiles.title_id=titles.title_id
                              WHERE profile_id='$profile_id'") or die ("sql_plain.error >>>".mysqli_error($con));
                              while(list($tittle_plain,$plain_fname,$plain_lname)=mysqli_fetch_row($sql_acc)){
                                  echo $plain_no," ",$tittle_plain,$plain_fname," ",$plain_lname,"<br>";
                              }
                              mysqli_free_result($sql_acc);
                         }
                         mysqli_free_result($result_plaintiff);
                         
            ?> 
                        </td>
        <?php    
        //ศาล 
                         $re_court=mysqli_query($con,
                         "SELECT court_name  
                         FROM court 
                         WHERE court_id='$tri_id'") or die("SQL_re_court.error".mysqli_error($con));
                         list($court_name)=mysqli_fetch_row($re_court);
            echo"       <td>$court_name</td>
                        <td>$case_id</td>
                        <td></td>
                        <td></td>
                        <td>วันที่ $case_date<br> เวลา $case_time </td>
                      </tr> 
                ";
              }
            ?>
            </tbody>
          </table>
</div>     
<script>
  $(document).ready(function() {
    $.getScript( "js/mydatatable.js" ); //datat
  })
</script>


<?php
mysqli_close($con);

?>