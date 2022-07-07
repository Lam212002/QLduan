<td class="tdmain">
<?php
$id=$_GET['id'];
if (!isset($_SESSION['cart']))
	$_SESSION['cart']=$id;
else
   $_SESSION['cart']=$_SESSION['cart'].','.$id;//mảng session lưu trữ các id của sp chọn vào giỏ hàng
	header('location:index.php?mod=cart');//chuyển trang
?>
</td>
