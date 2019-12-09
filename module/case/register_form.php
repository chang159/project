<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<form action="insert_member.php" method="post"> 
    	<p>User Name : <input type="text" name="username"></p>
        <p>Pass Word : <input type="password" name="pass"></p>
        <p>คำนำหน้า : <select name="title"> 
        				<option value="1">นาย</option>
                        <option value="2">นาง</option>
                        <option value="3">นางสาว</option>             
        			</select></p>
        <p>ชื่อ : <input type="text" name="fname"></p>
        <p>นามสกุล : <input type="text" name="sname"></p>
        <P>ที่อยู่่ : <textarea role="50" cols="20" name="add"></textarea></P>
        <p>วันเกิด : <input type="date" name="birth"></p>
        <p>เบอร์โทร : <input type="text" name="tel"></p>
        <p><input type="submit" value="ตกลง"> <input type="reset" value="ยกเลิก"></p>           
    </form>
</body>
</html>