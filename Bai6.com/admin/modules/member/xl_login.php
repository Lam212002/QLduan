<td class="tdmain">
<?php
 $u = $_POST['user'];
 $p = $_POST['pass'];
 $str = "SELECT * FROM tbl_user WHERE username='$u' AND password='$p' ";
 $result = mysqli_query($conn,$str);
 $rows = mysqli_fetch_array($result);
//Nếu đăng nhập thành công (gõ đúng user và pass trong tbl_user) thì gán $_SESSION['ok']= 1
if($rows){
$_SESSION['ok']= 1;
echo "Dang nhap thanh cong!";
 }
 else
echo "Dang nhap that bai!";
 ?>
</td>