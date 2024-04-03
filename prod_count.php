<?php
die;
include('/opt/lampp/htdocs/includes/config.php');
error_reporting(E_ALL);

// %%%%%%%%%%%%%%%%%% Sub Category %%%%%%%%%%%%%%%%%%%%%%
// $select_prods 		= mysqli_query($link_peplist,"SELECT pbcp.sub_cat_id,count(pbcp.sub_cat_id) as count,pb.sub_cat_name,pm.main_cat_name FROM pep_browse_com_prods as pbcp LEFT JOIN pepveda.pep_product_info_india_1_1 AS ppii ON(pbcp.product_id = ppii.product_id) LEFT JOIN pepveda.pep_bank_subcategory as pb ON(pbcp.sub_cat_id = pb.sub_cat_id) LEFT JOIN pepveda.pep_bank_maincategory as pm ON(pb.main_cat_id = pm.main_cat_id) WHERE pbcp.sub_cat_id!=0 AND pbcp.prod_cat_id=0 AND pbcp.status=0 AND pbcp.display=0 AND ppii.authorize = 0 AND  ppii.no_follow = 0 GROUP BY pbcp.sub_cat_id ORDER BY pb.sub_cat_name ASC");


// $select_prod_count 	= mysqli_query($browse,"SELECT pbcp.sub_cat_id,count(pbcp.sub_cat_id) as count FROM pep_browse_com_prods as pbcp WHERE pbcp.sub_cat_id!=0 AND pbcp.prod_cat_id=0 AND pbcp.status=0 AND pbcp.display=0 GROUP BY pbcp.sub_cat_id") or die(mysqli_error($browse));

// while($prod_count 	= mysqli_fetch_object($select_prod_count))
// {
// 	$total_count[$prod_count->sub_cat_id]=$prod_count->count;
// }



// $i =1;
// header('Content-Type: application/excel');
// header('Content-Disposition: attachment; filename="sub_cat_prods.csv"');

// $user_CSV[0] = array('Main Category Name','Sub Category Name','Link','No Follow Count','Total Count');

// while($prod = mysqli_fetch_object($select_prods))
// {
// 	$main_cat_name 				= $prod->main_cat_name;
// 	$sub_cat_id 				= $prod->sub_cat_id;
// 	$sub_cat_name 				= $prod->sub_cat_name;
// 	$sub_cat_name 				= str_replace('&','and',$sub_cat_name);
// 	$sub_cat_name 				= preg_replace('/[^a-z0-9]+/', '-', strtolower($sub_cat_name));
// 	$sub_cat_name 				= rtrim($sub_cat_name,"-");
// 	$sub_cat_name 				= ltrim($sub_cat_name,"-");
// 	$sub_cat_name 				= preg_replace('/-+/', '-', strtolower($sub_cat_name));
// 	$link 						= "http://www.pepagora.com/product/".$sub_cat_name;

// 	$sub_cat_nam 				= $prod->sub_cat_name;
// 	$count_no_follow 			= $prod->count;
// 	$count_total 				= $total_count[$sub_cat_id];
// 	$i++;
// 	$user_CSV[$i] 				= array($main_cat_name,$sub_cat_name,$link,$count_no_follow,$count_total);	
// }


// $fp = fopen('php://output', 'w');
// foreach ($user_CSV as $line) {
//     fputcsv($fp, $line, ',');
// }
// fclose($fp);


// %%%%%%%%%%%%%%%%%% Product Category %%%%%%%%%%%%%%%%%%%%%%

$select_prods 		= mysqli_query($link_peplist,"SELECT pbcp.prod_cat_id,count(pbcp.prod_cat_id) as count,pp.prod_cat_name,pb.sub_cat_name,pm.main_cat_name FROM pep_browse_com_prods as pbcp LEFT JOIN pepveda.pep_product_info_india_1_1 AS ppii ON(pbcp.product_id = ppii.product_id) LEFT JOIN pepveda.pep_bank_productcategory as pp ON(pbcp.prod_cat_id = pp.prod_cat_id) LEFT JOIN pepveda.pep_bank_subcategory as pb ON(pp.sub_cat_id = pb.sub_cat_id) LEFT JOIN pepveda.pep_bank_maincategory as pm ON(pb.main_cat_id = pm.main_cat_id) WHERE pbcp.prod_cat_id!=0 AND pbcp.status=0 AND pbcp.display=0 AND ppii.authorize = 0 AND  ppii.no_follow = 0 GROUP BY pbcp.prod_cat_id ORDER BY pp.prod_cat_name ASC") or die(mysqli_error($browse));


$select_prod_count 	= mysqli_query($browse,"SELECT pbcp.prod_cat_id,count(pbcp.prod_cat_id) as count FROM pep_browse_com_prods as pbcp WHERE pbcp.prod_cat_id!=0 AND pbcp.status=0 AND pbcp.display=0 GROUP BY pbcp.prod_cat_id") or die(mysqli_error($browse));

while($prod_count 	= mysqli_fetch_object($select_prod_count))
{
	$total_count[$prod_count->prod_cat_id]=$prod_count->count;
}

$i =1;
header('Content-Type: application/excel');
header('Content-Disposition: attachment; filename="prod_cat_prods.csv"');

$user_CSV[0] = array('Main Category Name','Sub Category Name','Product Category Name','Link','No Follow Count','Total Count');

while($prod = mysqli_fetch_object($select_prods))
{

	$sub_cat_name 				= $prod->sub_cat_name;
	$main_cat_name 				= $prod->main_cat_name;
	$prod_cat_id 				= $prod->prod_cat_id;
	$prod_cat_name 				= $prod->prod_cat_name;
	$prod_cat_name 				= str_replace('&','and',$prod_cat_name);
	$prod_cat_name 				= preg_replace('/[^a-z0-9]+/', '-', strtolower($prod_cat_name));
	$prod_cat_name 				= rtrim($prod_cat_name,"-");
	$prod_cat_name 				= ltrim($prod_cat_name,"-");
	$prod_cat_name 				= preg_replace('/-+/', '-', strtolower($prod_cat_name));
	$link 						= "http://www.pepagora.com/products/".$prod_cat_name;

	$prod_cat_nam 				= $prod->prod_cat_name;
	$count_no_follow 			= $prod->count;
	$count_total 				= $total_count[$prod_cat_id];
	// $s[$i]['main_cat_name'] 	= $prod->main_cat_name;
	// $s[$i]['sub_cat_name'] 		= $prod->sub_cat_name;
	// $s[$i]['name'] 				= $prod_cat_nam;
	// $s[$i]['link'] 				= $link;
	// $s[$i]['count'] 			= $count;
	$i++;
	$user_CSV[$i] 				= array($main_cat_name,$sub_cat_name,$prod_cat_nam,$link,$count_no_follow,$count_total);	

}


$fp = fopen('php://output', 'w');
foreach ($user_CSV as $line) {
    fputcsv($fp, $line, ',');
}
fclose($fp);