<?php
require_once('../database/connection.php');
require_once("pagination.class.php");
include('product.php');
$perPage = new PerPage();
$sql = "SELECT * from product";
$paginationlink = "php/getresult.php?page=";	
$pagination_setting = $_GET["pagination_setting"];
$priceRange = $_GET["priceRange"];
$searchInput = $_GET["searchInput"];
$whereFlag = 0;
//Search
if($searchInput != ""){
	$sql.=" WHERE title LIKE '%".$searchInput."%'";
	$whereFlag = 1;
}

//Them khoang gia
if($priceRange != 0){
	if($whereFlag == 0){
		$sql .= " WHERE";
	}else{
		$sql .= " AND";
	}
}
switch ($priceRange){
	case 1:
		$sql.=" price < '500'";
		break;
	case 2:
		$sql.=" price BETWEEN '500' AND '1000'";
		break;
	case 3:
		$sql.=" price BETWEEN '1000' AND '1500'";
		break;
	case 4:
		$sql.=" price BETWEEN '1500' AND '2000'";
		break;
	case 5:
		$sql.=" price > '2000'";
		break;
	default:
		break;
}
function console_log($output, $with_script_tag = true){
	$jscode = 'console.log('.json_encode($output,JSON_HEX_TAG).');';
	if($with_script_tag){
		$jscode = '<script>'.$jscode.'</script>';
	}
	echo $jscode;
}
console_log($searchInput);
console_log($sql);
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

if($row=mysqli_fetch_assoc($result)){
	$product[] = $row;
while($row=mysqli_fetch_assoc($result)){
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
}
else print "No result";
?>
