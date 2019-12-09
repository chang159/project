<?php
 include("function/connect_db.php");

 
 $re=mysqli_query($con,"SELECT sch_id,sch_name,sch.case_id,sch_date 
 FROM schedule AS sch , cases AS c 
 WHERE sch_status=0 AND sch.case_id = c.case_id AND c.profile_id='$_SESSION[userid]'") or die(mysqli_error($con));
?>
<style>
#cont {
  margin: 40px 10px;
  padding: 0;
  font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
  font-size: 14px;
}

#calendar {
  max-width: 80%;
  margin: 0 auto;
}

.fc-event, .fc-event:hover {
    color: #fff !important;
    text-decoration: none;
}

</style>
<div class="row mb-3"><div class="col-md text-center"><h3 class='titleh'>ตารางงาน</h3></div></div>
<div id='cont'>
<div id='calendar'></div>
</div>
<div id='loaddataschadd'></div>
<div id='loaddataschedit'></div>
<script>

function cleardiv(){
  $("#loaddataschadd").html("");
  $("#loaddataschedit").html("");
}

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid' ],
      header: {
        left: 'prevYear,prev,',
        center: 'title',
        right: 'today next,nextYear'
      },
      defaultDate: '<?php echo date("Y-m-d") ?>',
      navLinks: false, // can click day/week names to navigate views
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      selectable: true,
      locale: 'th',
      events: [
        // {
        //   title: 'All Day Event',
        //   start: '2019-08-01',
        //   id:'555'
        // },
        <?php
         
          $i=1;
          while(list($sch_id,$sch_name,$case_id,$sch_date)=mysqli_fetch_row($re)){
            if($i == 1){
              echo "{ title: '$sch_name $case_id',start: '$sch_date',id:'$sch_id' }";
            }else{
              echo ",{ title: '$sch_name $case_id',start: '$sch_date',id:'$sch_id' }";
            }
            $i++;
          }

          mysqli_free_result($re);
          mysqli_close($con);
        ?>
      ]
      ,
      dateClick: function(info) {
    //lert('Date: ' + info.dateStr);
    cleardiv()
    if(date_diff_indays('<?php echo date('Y-m-d') ?>',info.dateStr )  > 0 )
    $.post( "module/schedule/sch_add.php", { schid: info.dateStr } ).done(function(data){
            $("#loaddataschadd").html(data);
          
           $('#schmodeladd').modal('show');
        })
  }
  ,
  eventClick: function(info) {
    cleardiv()
   // alert('Event: ' + info.event.title);
    ///alert('Event: ' + info.event.id);
    $.post( "module/schedule/sch_edit_del.php", { schid: info.event.id } ).done(function(data){
            $("#loaddataschedit").html(data);
          
           $('#schmodeladd').modal('show');
        })
  }
    });

    calendar.render();
  });

  var date_diff_indays = function(date1, date2) {
dt1 = new Date(date1);
dt2 = new Date(date2);
return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24));
}
</script>
