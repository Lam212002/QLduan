<?php
 chk_login();
 $a = $_GET['act'];
switch ($a){
case 'detail':
include('modules/product/detail.php');
break;
default:
include('modules/product/list.php');
break;
}
?>
