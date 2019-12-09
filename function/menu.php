<?php
  function menu($id){
    switch ($id) {
      case '1': //ผู้ดูแลระบบ
?>

      <li class="nav-item">
        <a class="nav-link text-white" href="index.php?module=2&action=10"><i class="far fa-address-card"></i> ข้อมูลผู้ใช้งานระบบ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="index.php?module=2&action=3"><i class="fas fa-tasks"></i> จัดการข้อมูลบุคลากร</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="index.php?module=2&action=8"><i class="far fa-edit"></i> แก้ไขข้อมูลส่วนตัว</a>
      </li>

      <?php
        break;
        case '2': //เจ้าของบริษัท
  ?>
        <li class="nav-item">
          <a class="nav-link text-white" href="index.php"><i class="fas fa-home"></i> หน้าแรก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="index.php?module=2&action=3"><i class="fas fa-tasks"></i> จัดการข้อมูลบุคลากร</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">ผลหมาย</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">คำคู่ความ</a>
        </li>
  <?php
      break;
      case '3': //ทนาย
?>
      <li class="nav-item">
        <a class="nav-link active text-white" href="index.php?module=1&action=1"> <i class="fas fa-home"></i> หน้าแรก</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link text-white" href="index.php?module=3&action=12"><i class="fas fa-folder"></i> เพื่มสำนวนคดี</a>
      </li> -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-folder"></i> สำนวนคดี
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="index.php?module=1&action=1"><i class="fas fa-folder-open"></i> แสดงรายการสำนวนคดี</a>
          <a class="dropdown-item" href="index.php?module=3&action=12"><i class="fas fa-folder-plus"></i> เพื่มสำนวนคดี</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white" href="index.php?module=4&action=14"><i class="far fa-calendar-alt"></i> ตารางงาน</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link text-white" href="#"><i class="fas fa-pen"></i> ฟอร์มเอกสาร</a>
      </li> -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-th-list"></i> ฟอร์มเอกสาร
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#"><i class="far fa-file-alt"></i> ฟอร์มคำฟ้อง</a>
          <a class="dropdown-item" href="#"><i class="far fa-file-alt"></i> ฟอร์มคำร้อง</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-users"></i> ข้อมูลลูกค้า
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#"><i class="fas fa-user-tie"></i> แสดงรายข้อมูลลูกค้า</a>
          <a class="dropdown-item" href="#"><i class="fas fa-user-plus"></i> เพื่มข้อมูลลูกค้า</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="index.php?module=2&action=8"><i class="far fa-edit"></i> แก้ไขข้อมูลส่วนตัว</a>
      </li>
      <?php
        break;
    }
  }
 ?>
