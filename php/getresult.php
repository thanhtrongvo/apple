<?php
require_once('../database/connection.php');
require_once("pagination.class.php");
include('product.php');
$perPage = new PerPage();
$sql = "SELECT * from product";
$paginationlink = "php/getresult.php?page=";	
$pagination_setting = $_GET["pagination_setting"];
$priceRange = $_GET["priceRange"];

$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

if(empty($_GET["rowcount"])) { 
$num = mysqli_query($conn,$sql);
$_GET["rowcount"] = mysqli_num_rows($num);
}

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query =  $sql . " limit " . $start . "," . $perPage->perpage; 
$result = mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result)) {
	$product[] = $row;
}

if($pagination_setting == "prev-next") {
	$perpageresult = $perPage->getPrevNext($_GET["rowcount"], $paginationlink,$pagination_setting);	
} else {
	$perpageresult = $perPage->getAllPageLinks($_GET["rowcount"], $paginationlink,$pagination_setting);
}
$output = '';
foreach($product as $k=>$v) {
 $output .= toStringProduct($product[$k]['thumbnail'],$product[$k]['title'],$product[$k]['price'],$product[$k]['id']);
}
if(!empty($perpageresult)) {
$output .= '<div id="pagination">' . $perpageresult . '</div>';
}
print $output;

?>
