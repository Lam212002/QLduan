<?php
     $a=$_GET['act'];
     switch ($a){
      case 'detail': // nếu chọn liên kết tên sản phẩm (name) thì gọi detail.php hiển thị chi tiết sp
		include('modules/product/detail.php');
		break;
	  default: // nếu chưa chọn liên kết tên sản phẩm (name) thì gọi list.php hiển thị sp
		include('modules/product/list.php'); 
		break;
}
?>
