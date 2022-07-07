<td class="main"><?php
$str = "SELECT * FROM tbl_product LIMIT 8";	
$result = mysqli_query($conn,$str);
?>
<table border="0" align="center">
<tr> <td style="background-color:#F00; font-size:24px"  colspan="4"> SẢN PHẨM </td></tr>
<tr>
<?php
   $d = 0;
while($rows = mysqli_fetch_array($result)){
$d = $d + 1;
?>
  <td width="160" align="center" valign="top">
	<img src="<?php echo $rows['photo'];?>" width="150" height="150" /><br /><br />
	<a style="text-decoration: none;" 
         href="index.php?mod=product&act=detail&id=<?php echo $rows['id'];?>">
	<b style="color:blue;"><?php echo $rows['name'];?></b><br />
	</a>
	<b style="color: red;"><?php echo number_format($rows['price']);?></b>đ
	<br /><br /><br />
  </td>
<?php	
if($d%4==0)
	echo "</tr><tr>";
}
?>
</tr>
</table>
</td>			  
