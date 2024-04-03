<?php
// header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
// header("Content-Disposition: attachment; filename=productlinks.xls");  //File name extension was wrong
// header("Expires: 0");
// header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
// header("Cache-Control: private",false);
// header("Content-type: text/csv");
// header("Content-Disposition: attachment; filename=productlink.csv");
// header("Pragma: no-cache");
// header("Expires: 0");
include('/opt/lampp/htdocs/includes/config.php');
$select_products = mysqli_query($browse,"SELECT product_id,product_name,status FROM pep_browse_com_prods WHERE status=0 AND display=0");
while ($get_product_details = mysqli_fetch_object($select_products)) {
	$product_id = $get_product_details->product_id;
	$product_name = $get_product_details->product_name;
	$product_name = str_replace(' ', '-',$product_name); 
	$product_name = preg_replace('/[^A-Za-z0-9\-]/', '-',$product_name );
	$product_name = strtolower(trim(preg_replace('/-+/', '-',$product_name ),'-'))."-".$product_id.".html";	
	echo 'http://www.pepagora.com/product/'.$product_name.'<br/>';
}
?>
