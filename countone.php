<?php
	$host = "pepagora.czbtqebrad9v.ap-southeast-1.rds.amazonaws.com";
	$user = "root";
	$pass = "pepdbinstance";
	$database1 = "peplistings";
	$database2 = "pepveda";
	
	$link_peplist = mysqli_connect($host, $user, $pass, $database1) or die ('Unable to connect to MySQL server.<br ><br >Please make sure your PORTAL details are correct.'.mysqli_error());



 //No. of products in apparel main category having at least 5 attributes and 50 words in product description. 
 $sql = "SELECT ppii.product_id, ppii.main_cat_id, ppa.attribute_id FROM `pep_browse_com_prods` AS ppii JOIN pepveda.`pep_product_attributes` AS ppa ON(ppii.product_id = ppa.product_id) WHERE ppii.status = 0 AND ppii.display = 0 AND LENGTH(ppii.`prod_short_desc`)>=50 AND ppii.main_cat_id = 39 AND ppa.attribute_id != 0";
	
	$result_set = mysqli_query($link_peplist, $sql) or die('Error: '. mysqli_error($link_peplist));
	if(mysqli_num_rows($result_set) > 0){
		$i = 0;
		while($rows = mysqli_fetch_object($result_set)){
			$arr = explode('####',$rows->attribute_id );
			$cat_id = $rows->main_cat_id;
			if(count($arr)>=3){
				$i = $i+1;
			}
		}
		echo 'Category ID : '.$cat_id.'<br/>';
		echo 'TOTAL COUNT : <strong>'. $i.'<strong>';
	}
?>
