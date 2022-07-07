<td class="tdmain">
<?php
$cart=$_SESSION['cart'];
$str="Select * From tbl_product Where id in ($cart)";
$result=mysqli_query($conn,$str);
$total=0;
while ($rows=mysqli_fetch_array($result)){
$total=$total+$rows['price'];
?>
Tên: <?php echo $rows['name'];?> 
- Giá: <font color="red"><?php echo $rows['price'];?></font>
- <a href="index.php?mod=cart&act=del_cart&id=<?php echo $rows['id'];?>">[Xóa]</a>
	<br /> 	<hr />
<?php
}
$t=number_format($total);
echo "Tong tien: $t đ";
?>
</td>
