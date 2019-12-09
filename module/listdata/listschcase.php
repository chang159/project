<?php
SESSION_START();
include('../../function/connect_db.php');

  $sql = "SELECT c.case_id,c.title_plaintiffs,p.profile_fname,p.profile_lname
  FROM cases AS c 
  INNER JOIN profiles AS p ON p.profile_id = c.profile_id
  WHERE (SELECT sch.case_id FROM schedule AS sch WHERE sch.case_id=c.case_id)  IS NULL AND c.profile_id = '$_SESSION[userid]'

  ";
 $re = mysqli_query($con,$sql) or die(mysqli_error($con));
 ?> 

<br>
<div class="table-responsive-xl">
     <table class="table table-striped table-hover" id='Datatable' style='width:100%' >
            <thead>
                  <tr>
                      <th>เลือก</th>
                      <th>เลขคดี</th>
                      <th>โจทย์</th>
                      <th>ทนายรับผิดชอบ</th> 
                  </tr>
            </thead>
            <tbody>
            <?php
              while(list($case_id,$title_plaintiffs,$profile_fname,$profile_lname )=mysqli_fetch_row($re)){
                echo "<tr>
                        <td><button class='btn btn-primary choosecaseid' data-caseid='$case_id'>เลือก</button></td>
                        <td>$case_id</td>
                        <td>$title_plaintiffs</td>
                        <td>$profile_fname $profile_lname</td> 
                        
                      </tr> 
                ";
              }
              mysqli_free_result($re);
              mysqli_close($con);
            ?>
            </tbody>
          </table>
</div>
<script type="text/javascript">
$.getScript( "js/mydatatable.js" );
</script>
        