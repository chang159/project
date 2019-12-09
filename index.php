<?php
  SESSION_START();
  include("function/menu.php");
  if(empty($_SESSION['userid']) OR empty($_SESSION['fristname']) OR empty($_SESSION['surename']) OR empty($_SESSION['permission'])){
    echo "<script>window.location='login/login.php' </script>";
  }

 ?>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="packages/fontawesome/css/all.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="packages\bootstrapselect\bootstrap-select.css">
    <!-- sweetalert -->
    <script src="packages\sweetalert\sweetalert.min.js"></script>

<link href='packages/core/main.css' rel='stylesheet' />
<link href='packages/daygrid/main.css' rel='stylesheet' />
<script src='packages/core/main.js'></script>
<script src='packages/interaction/main.js'></script>
<script src='packages/daygrid/main.js'></script>
<script src='packages/core/locales-all.min.js'></script>

<script src="packages\jquery\jquery-3.4.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="packages\dataable\datatables.min.css"/>
<script type="text/javascript" src="packages\dataable\datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="packages\dataable\DataTables-1.10.18\css\dataTables.bootstrap4.min.css"/>
<script type="text/javascript" src="packages\dataable\DataTables-1.10.18\js\dataTables.bootstrap4.min.js"></script>


<script>
$(document).ready(function() {
$.fn.selectpicker.Constructor.BootstrapVersion = '4';
})
</script>

    <title>ระบบทนาย</title>
</head>
<style>

	#menu_top{
		position: fixed;
		z-index: 1;
		top: 0;
		left: 0;
		width:85%;

  }
  
  .titleh{
    text-align:center;
    padding: 1rem;
    background-color: #6c757d;
    color: white;
  }

  @media only screen and (min-width: 1200px) {
    .container {
        max-width: 95%; !important
       }
    .navbar,.dropdown-menu{
        font-size:15px;
      }       
    }

    @media only screen and (max-width: 989px) {

       .navbar,.dropdown-menu{
        font-size:16px;
      } 
    }


  body{
    font-family: 'Sarabun', sans-serif;
  }


</style>
<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
<?php
	include("function/module.php");
?>
<!--<body style="background:#935116">-->
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-success col sticky-top h-auto" >
  <a class="navbar-brand" href="#" style='font-size:18px'>
    <i class="fas fa-balance-scale"></i>
    กรัณฑ์การกฎหมาย | <?php echo $_SESSION['per_name'] ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
    <ul class="navbar-nav  ml-md-auto  d-md-flex " >

    <?php
      if(!empty($_GET['action'])){
        menu($_SESSION['permission']);
      }else{
        menu($_SESSION['permission']);
      }
     
    ?>
     
      <li class="nav-item">
        <a class="nav-link text-white" href="#" id="exit" > <i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
      </li>
      <!-- href="login/logout.php" -->
    </ul>

  </div>
</nav>
<!-- Image and text -->
<!-- <div id="menu_size">
	<ul class="nav flex-column">
<?php
    // menu($_SESSION['permission']);
?>
     </ul>
</div> -->

<div class="container mt-1 shadow p-3 mb-5 bg-white rounded" >

<div id="main" class='row '>

	
    	<div class='col' id='conten'>
        <?php
        if(empty($_GET['module']) || empty($_GET['action'])){
          switch ($_SESSION['permission']) {
            case '1': // admin
              $m=2;
              $a=3;
              break;
            case '2': // เจ้าของ
              $m=2;
              $a=3;
              break;
            case '3': // ทนาย
              $m=1;
              $a=1;
              break;  

              // code...
              break;
            default:
              $m="404";
              $a="404";
              break;
          }
        

        }else{
			       $m=$_GET['module'];
            $a=$_GET['action'];
		}
		modules($m,$a);
		?>
        </div>
    </div>
   </div>
</body>
</html>

<script>
 $(document).ready(function() {

      $("#exit").click(function(e){
        e.preventDefault()
        swal({
        title: "คุณต้องการออกจากระบบ",
        text: " ",
        icon: "warning",
        buttons: ["ยกเลิก", "ตกลง"],
      })
      .then((willDelete) => {
        if (willDelete) {
          swal({
            title: "คุณได้ออกจากระบบแล้ว",
            text: " ",
            icon: "success",
            buttons: false,
            timer:1500,
          });
          setTimeout(function(){  window.location='login/logout.php' }, 1500);
        } else {
          
        }
      });
      })

      
     $(".nav-item .nav-link").on("click", function(){
       $(".nav-item").find(".active").removeClass("active");
       $(this).addClass("active");
    });


      
 })

</script>

<script src="packages\popper\popper.min.js"></script>

<script src="bootstrap/js/bootstrap.min.js" ></script>
<!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->

<!-- Latest compiled and minified JavaScript -->
<script src="packages\bootstrapselect\bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="packages\bootstrapselect\defaults-en_US.js"></script>



