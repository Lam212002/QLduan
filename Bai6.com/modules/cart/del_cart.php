<td class="tdmain">
<?php
$id=$_GET['id'];
$cart=$_SESSION['cart'];
$_SESSION['cart']=str_replace($id,0,$cart);  //xóa đi id trong mảng session
header('location:index.php?mod=cart');
?>
</td>
