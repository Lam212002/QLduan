<td class="tdmain">
<?php 
$id = $_GET['id'];
$str = "SELECT * FROM tbl_product WHERE id=$id";
$result = mysqli_query($conn,$str);
$rows = mysqli_fetch_array($result);
?>
<center>
<img src="<?php echo $rows['photo'];?>" width="500" align="center" /><br />
<font style="font-size: 18px; font-weight: bold;color:blue;"><?php  echo $rows['name'];?>
</font><br />
Giá: <font style="font-weight: bold; color: red;">
		<?php echo number_format($rows['price']);?> đ
	</font><br />
<?php echo $rows['detail'];?>
</center>
</td>
