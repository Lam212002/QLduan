<?php
$str = "SELECT * FROM tbl_news LIMIT 8";
$result = mysqli_query($conn,$str);
?>
<table border="0" align="center">
<tr> <td style="background-color:#F00; font-size:24px" colspan="2"> TIN TỨC </td></tr>
<tr>
<?php
$d = 0;
//Duyệt từng dòng trong bảng kết quả đưa vào biến mảng kết hợp $rows
while($rows = mysqli_fetch_array($result)){
$d = $d + 1;
?>
<td width="320" align="center">
<table>
<tr>
<td>
<img src="<?php echo $rows['photo'];?>" width="100" height="100" /><br />
</td>
<td>
<b><?php echo truncateString($rows['title'],50,true);?></b><br />
<?php echo truncateString($rows['sumary'],150,true);?>
</td>
</tr>
</table>
</td>
<?php
if($d%2==0)
echo "</tr><tr>";
}
?>
</tr>
</table>