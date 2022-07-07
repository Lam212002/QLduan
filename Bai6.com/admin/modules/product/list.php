<td valign="top" class="tdmain">
<b style="color: red; font-size: 20px;"> DANH SÁCH SẢN PHẨM: </b> <br />
<?php
$soproduct = 8;
$base_url= 'index.php?mod=product&';
If ($_GET['start'])
$s = $_GET['start'];
else
$s = 1;
$query = mysqli_query($conn,"SELECT * FROM tbl_product");
$tongsodong = mysqli_num_rows($query);
if($tongsodong==0){
?>
 Sản phẩm chưa được cập nhật!<br />
<?php
}
if($tongsodong >= $soproduct)
$str = mysqli_query($conn,"SELECT * FROM tbl_product limit $s,$soproduct");
else
$str = mysqli_query($conn,"SELECT * FROM tbl_product");
?>
<table width="100%" border="0">
<?php
while($rows = mysqli_fetch_array($str)){
?>
<tr onmouseover="this.bgColor='#D1D1D1'" onmouseout="this.bgColor='#fff'">
 <td align="center">
<img src="../<?php echo $rows['photo']; ?>" width="50" height="50"/>
 </td>
 <td width="400">
<font style="color: blue; font-weight: bold;">
<a href="index.php?mod=product&act=detail&id=<?php echo $rows['id']; ?>">
<?php echo $rows['name']; ?>
</a>
</font>
 </td>
 <td>
<font style="color: red; font-weight: bold;">
Giá: <?php echo $rows['price']; ?>
</font>
 </td>
</tr>
<?php
}
?>
<tr>
<td colspan="5" align="center">
<?php
echo pagenav($base_url, $s, $tongsodong, $soproduct);
?>		  
