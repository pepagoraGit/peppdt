<?php
	
	//include("includes/config.php");
	
	$host = "pepagora.czbtqebrad9v.ap-southeast-1.rds.amazonaws.com";
	$user = "root";
	$pass = "pepdbinstance";
	$database1 = "peplistings";
	$database2 = "pepveda";
	
	$link_peplist = mysqli_connect($host, $user, $pass, $database1) or die ('Unable to connect to MySQL server.<br ><br >Please make sure your PORTAL details are correct.'.mysqli_error());
	//$link_pepveda = mysqli_connect($host, $user, $pass, $database2) or die ('Unable to connect to MySQL server.<br ><br >Please make sure your PORTAL details are correct.'.mysqli_error());
	//$sql	= "SELECT pbcp.product_id, ppa.attribute_id FROM `pep_browse_com_prods` AS pbcp LEFT JOIN pepveda.pep_product_attributes AS ppa ON(pbcp.product_id = ppa.product_id) WHERE pbcp.status = 0 AND pbcp.display = 0 AND ppa.status = 0 AND ppa.attribute_id = 0";
	//$result_set = mysqli_query($link_peplist, $sql) or die('Error: '. mysqli_error($link_peplist));
	//$rows = mysqli_num_rows($result_set);
	//echo 'TOTAL COUNT : <strong>'. $rows.'<strong>';
	
	//$sql	= "SELECT pbcp.product_id, ppa.attribute_id FROM `pep_browse_com_prods` AS pbcp LEFT JOIN pepveda.pep_product_attributes AS ppa ON(pbcp.product_id = ppa.product_id) WHERE pbcp.status = 0 AND pbcp.display = 0 AND ppa.status = 0 AND ppa.attribute_id != 0";
	//$sql = "SELECT ppii.product_id, ppa.attribute_id FROM `pep_browse_com_prods` AS ppii JOIN pepveda.`pep_product_attributes` AS ppa ON(ppii.product_id = ppa.product_id) WHERE ppii.status = 0 AND ppii.display = 0 AND LENGTH(ppii.`prod_short_desc`)>100 AND ppii.image =''";
	
	//Number of products having 100+ words, 1+ attributes & < 5 attributes & no images
	//$sql = "SELECT ppii.product_id, ppa.attribute_id FROM `pep_browse_com_prods` AS ppii JOIN pepveda.`pep_product_attributes` AS ppa ON(ppii.product_id = ppa.product_id) WHERE ppii.status = 0 AND ppii.display = 0 AND LENGTH(ppii.`prod_short_desc`)>100 AND ppii.image ='' AND ppa.attribute_id != 0";
	
	//Number of products having 100+ words, no attributes & no image/s
	/*$sql = "SELECT ppii.product_id, ppa.attribute_id FROM `pep_browse_com_prods` AS ppii JOIN pepveda.`pep_product_attributes` AS ppa ON(ppii.product_id = ppa.product_id) WHERE ppii.status = 0 AND ppii.display = 0 AND LENGTH(ppii.`prod_short_desc`)>100 AND ppii.image ='' AND ppa.attribute_id = 0";
	$result_set = mysqli_query($link_peplist, $sql) or die('Error: '. mysqli_error($link_peplist));
	$rows = mysqli_num_rows($result_set);
	echo 'TOTAL COUNT : <strong>'. $rows.'<strong>';*/
	
	//Number of products having < 100 words, 5+ attributes & images
	//$sql = "SELECT ppii.product_id, ppa.attribute_id FROM `pep_browse_com_prods` AS ppii JOIN pepveda.`pep_product_attributes` AS ppa ON(ppii.product_id = ppa.product_id) WHERE ppii.status = 0 AND ppii.display = 0 AND LENGTH(ppii.`prod_short_desc`)<100 AND ppii.image !='' AND ppa.attribute_id != 0";
	
	//Number of products having < 100 words, no attributes & atleast 1 images
	//$sql = "SELECT ppii.product_id, ppa.attribute_id FROM `pep_browse_com_prods` AS ppii JOIN pepveda.`pep_product_attributes` AS ppa ON(ppii.product_id = ppa.product_id) WHERE ppii.status = 0 AND ppii.display = 0 AND LENGTH(ppii.`prod_short_desc`)<100 AND ppii.image !='' AND ppa.attribute_id = 0";

	//Number of products having < 100 words, no attributes & no images
	//$sql = "SELECT ppii.product_id, ppa.attribute_id FROM `pep_browse_com_prods` AS ppii JOIN pepveda.`pep_product_attributes` AS ppa ON(ppii.product_id = ppa.product_id) WHERE ppii.status = 0 AND ppii.display = 0 AND LENGTH(ppii.`prod_short_desc`)<100 AND ppii.image ='' AND ppa.attribute_id = 0";

	//Number of products having 50+ and having < 100 words, no attributes & no images
	//$sql = "SELECT ppii.product_id, ppa.attribute_id FROM `pep_browse_com_prods` AS ppii JOIN pepveda.`pep_product_attributes` AS ppa ON(ppii.product_id = ppa.product_id) WHERE ppii.status = 0 AND ppii.display = 0 AND LENGTH(ppii.`prod_short_desc`)>50 AND LENGTH(ppii.`prod_short_desc`)<100 AND ppii.image ='' AND ppa.attribute_id = 0";

	//Number of products having 50+ words but <100 words and atleast 1 image and No attributes
	//$sql = "SELECT ppii.product_id, ppa.attribute_id FROM `pep_browse_com_prods` AS ppii JOIN pepveda.`pep_product_attributes` AS ppa ON(ppii.product_id = ppa.product_id) WHERE ppii.status = 0 AND ppii.display = 0 AND LENGTH(ppii.`prod_short_desc`)>50 AND LENGTH(ppii.`prod_short_desc`)<100 AND ppii.image !='' AND ppa.attribute_id = 0";

	//$result_set = mysqli_query($link_peplist, $sql) or die('Error: '. mysqli_error($link_peplist));
	//$rows = mysqli_num_rows($result_set);
	//echo 'TOTAL COUNT : <strong>'. $rows.'<strong>';
	
	//Number of products having 50+ words but <100 words and atleast 1 image and atleast 1 attributes
	/*$sql = "SELECT ppii.product_id, ppa.attribute_id FROM `pep_browse_com_prods` AS ppii JOIN pepveda.`pep_product_attributes` AS ppa ON(ppii.product_id = ppa.product_id) WHERE ppii.status = 0 AND ppii.display = 0 AND LENGTH(ppii.`prod_short_desc`)>50 AND LENGTH(ppii.`prod_short_desc`)<100 AND ppii.image !='' AND ppa.attribute_id != 0";

	//Number of products having < 50 words and atleast 1 image and No attributes
	$sql = "SELECT ppii.product_id, ppa.attribute_id FROM `pep_browse_com_prods` AS ppii JOIN pepveda.`pep_product_attributes` AS ppa ON(ppii.product_id = ppa.product_id) WHERE ppii.status = 0 AND ppii.display = 0 AND LENGTH(ppii.`prod_short_desc`)<50 AND ppii.image !='' AND ppa.attribute_id = 0";
	*/
	
	$sql = "SELECT ppii.product_id, ppa.attribute_id FROM `pep_browse_com_prods` AS ppii JOIN pepveda.`pep_product_attributes` AS ppa ON(ppii.product_id = ppa.product_id) WHERE ppii.status = 0 AND ppii.display = 0 AND LENGTH(ppii.`prod_short_desc`)<50 AND ppii.image !='' AND ppa.attribute_id != 0";
	
	$result_set = mysqli_query($link_peplist, $sql) or die('Error: '. mysqli_error($link_peplist));
	$rows = mysqli_num_rows($result_set);
	echo 'TOTAL COUNT : <strong>'. $rows.'<strong>';
	
	
	
	//Number of products having 50+ words but <100 words and atleast 1 image and atleast 1 attributes
	//$sql = "SELECT ppii.product_id, ppa.attribute_id FROM `pep_browse_com_prods` AS ppii JOIN pepveda.`pep_product_attributes` AS ppa ON(ppii.product_id = ppa.product_id) WHERE ppii.status = 0 AND ppii.display = 0 AND LENGTH(ppii.`prod_short_desc`)>50 AND LENGTH(ppii.`prod_short_desc`)<100 AND ppii.image !='' AND ppa.attribute_id != 0";
	
	//Number of products having < 50 words and atleast 1 image and No attributes
	/*$sql = "SELECT ppii.product_id, ppa.attribute_id FROM `pep_browse_com_prods` AS ppii JOIN pepveda.`pep_product_attributes` AS ppa ON(ppii.product_id = ppa.product_id) WHERE ppii.status = 0 AND ppii.display = 0 AND LENGTH(ppii.`prod_short_desc`)<50 AND ppii.image !='' AND ppa.attribute_id = 0";
	
	$result_set = mysqli_query($link_peplist, $sql) or die('Error: '. mysqli_error($link_peplist));
	if(mysqli_num_rows($result_set) > 0){
		$i = 0;
		while($rows = mysqli_fetch_object($result_set)){
			$arr = explode('####',$rows->attribute_id );
			if(count($arr)>0){
				if(in_array("0", $arr)){
					$i = $i + 1;
				}
			}
		}
		echo 'TOTAL COUNT : <strong>'. $i.'<strong>';
	}*/
