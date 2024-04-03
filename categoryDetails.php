<?php
include('includes/config.php');
die;

// %%%%%%%%%%%%%%%%%%%%%%%%%% Main Category %%%%%%%%%%%%%%%%%%%%%%%%%%%


// $select_main_category = mysqli_query($link,"SELECT main_cat_name,main_cat_id FROM pep_bank_maincategory where status=0 AND main_cat_id!=44 ORDER BY main_cat_name ASC");
// $i =1;
// while($get_main_category = mysqli_fetch_object($select_main_category)){
// 	$main_cat_nam 			= $get_main_category->main_cat_name;
// 	$main_cat_id 			= $get_main_category->main_cat_id;
// 	if (strpos($get_main_category->main_cat_name,'&') == true) {
// 		$newString 			= str_replace(" & ","-and-", strtolower($get_main_category->main_cat_name)); 
// 		$main_cat_name 		= str_replace(" ","-", $newString);
// 	}
// 	else {
// 		$main_cat_name 		= str_replace(" ","-", strtolower($get_main_category->main_cat_name));
// 	}
// 	$s[$i]['id']		= $main_cat_id;
// 	$s[$i]['name']		= $main_cat_nam;
// 	$s[$i]['link'] 		= "http://www.pepagora.com/".$main_cat_name;
// 	$i++;
// }

// header('Content-Type: application/excel');
// header('Content-Disposition: attachment; filename="main_category.csv"');

// $user_CSV[0] = array('Main Category Id', 'Main Category Name', 'Link');

// // very simple to increment with i++ if looping through a database result 
// for($i=1;$i<=count($s);$i++)
// {
// 	$id 				= $s[$i]['id'];
// 	$nam 				= $s[$i]['name'];
// 	$link  				= $s[$i]['link'];
// 	$user_CSV[$i] = array($id, $nam, $link);	
// }

// $fp = fopen('php://output', 'w');
// foreach ($user_CSV as $line) {
//     // though CSV stands for "comma separated value"
//     // in many countries (including France) separator is ";"
//     fputcsv($fp, $line, ',');
// }
// fclose($fp);

// // %%%%%%%%%%%%%%%%%% Sub Category %%%%%%%%%%%%%%%%%%%%%%

// $select_sub_category = mysqli_query($link,"SELECT s.sub_cat_name,s.sub_cat_id,m.main_cat_name FROM pep_bank_subcategory as s LEFT JOIN pep_bank_maincategory as m ON(s.main_cat_id = m.main_cat_id) where s.status=0 ORDER BY s.sub_cat_name ASC");
// $i =1;
// while($get_sub_category 	= mysqli_fetch_object($select_sub_category)){
// 	$sub_cat_nam 			= $get_sub_category->sub_cat_name;
// 	$main_cat_nam 			= $get_sub_category->main_cat_name;
// 	$sub_cat_id 			= $get_sub_category->sub_cat_id;
// 	$sub_cat_name 			= $get_sub_category->sub_cat_name;
// 	$sub_cat_name 			= str_replace('&','and',$sub_cat_name);
// 	$sub_cat_name 			= preg_replace('/[^a-z0-9]+/', '-', strtolower($sub_cat_name));
// 	$sub_cat_name 			= rtrim($sub_cat_name,"-");
// 	$sub_cat_name 			= ltrim($sub_cat_name,"-");
// 	$sub_cat_name 			= preg_replace('/-+/', '-', strtolower($sub_cat_name));
// 	$s[$i]['id']			= $sub_cat_id;
// 	$s[$i]['main_name'] 	= $main_cat_nam;
// 	$s[$i]['name']			= $sub_cat_nam;
// 	$s[$i]['link'] 			= "http://www.pepagora.com/product/".$sub_cat_name;
// 	$i++;
// }

// header('Content-Type: application/excel');
// header('Content-Disposition: attachment; filename="sub_category.csv"');

// $user_CSV[0] = array('Sub Category Id','Main Category Name','Sub Category Name', 'Link');

// // very simple to increment with i++ if looping through a database result 
// for($i=1;$i<=count($s);$i++)
// {
// 	$id 				= $s[$i]['id'];
// 	$main_name 			= $s[$i]['main_name'];
// 	$nam 				= $s[$i]['name'];
// 	$link  				= $s[$i]['link'];
// 	$user_CSV[$i] = array($id, $main_name, $nam, $link);	
// }

// $fp = fopen('php://output', 'w');
// foreach ($user_CSV as $line) {
//     // though CSV stands for "comma separated value"
//     // in many countries (including France) separator is ";"
//     fputcsv($fp, $line, ',');
// }
// fclose($fp);

// %%%%%%%%%%%%%%%%%% Product Category %%%%%%%%%%%%%%%%%%%%%%

// $select_prod_category = mysqli_query($link,"SELECT p.prod_cat_name,p.prod_cat_id,s.sub_cat_name,m.main_cat_name FROM pep_bank_productcategory as p LEFT JOIN pep_bank_subcategory as s ON(p.sub_cat_id = s.sub_cat_id) LEFT JOIN pep_bank_maincategory as m ON(s.main_cat_id = m.main_cat_id) where p.status=0 ORDER BY p.prod_cat_name ASC");
// $i =1;
// while($get_prod_category 	= mysqli_fetch_object($select_prod_category)){
// 	$prod_cat_nam 			= $get_prod_category->prod_cat_name;
// 	$sub_cat_nam 			= $get_prod_category->sub_cat_name;
// 	$main_cat_nam 			= $get_prod_category->main_cat_name;
// 	$prod_cat_id 			= $get_prod_category->prod_cat_id;
// 	$prod_cat_name 			= $get_prod_category->prod_cat_name;
// 	$prod_cat_name 			= str_replace('&','and',$prod_cat_name);
// 	$prod_cat_name 			= preg_replace('/[^a-z0-9]+/', '-', strtolower($prod_cat_name));
// 	$prod_cat_name 			= rtrim($prod_cat_name,"-");
// 	$prod_cat_name 			= ltrim($prod_cat_name,"-");
// 	$prod_cat_name 			= preg_replace('/-+/', '-', strtolower($prod_cat_name));
// 	$s[$i]['id']			= $prod_cat_id;
// 	$s[$i]['main_name'] 	= $main_cat_nam;
// 	$s[$i]['name']			= $sub_cat_nam;
// 	$s[$i]['prod_name'] 	= $prod_cat_nam;
// 	$s[$i]['link'] 			= "http://www.pepagora.com/products/".$prod_cat_name;
// 	$i++;
// }

// header('Content-Type: application/excel');
// header('Content-Disposition: attachment; filename="prod_category.csv"');

// $user_CSV[0] = array('Product Catetgory Id','Main Category Name','Sub Category Name','Product category Name','Link');

// // very simple to increment with i++ if looping through a database result 
// for($i=1;$i<=count($s);$i++)
// {
// 	$id 				= $s[$i]['id'];
// 	$main_name 			= $s[$i]['main_name'];
// 	$nam 				= $s[$i]['name'];
// 	$prod_name 			= $s[$i]['prod_name'];
// 	$link  				= $s[$i]['link'];
// 	$user_CSV[$i] = array($id, $main_name, $nam, $prod_name, $link);	
// }

// $fp = fopen('php://output', 'w');
// foreach ($user_CSV as $line) {
//     // though CSV stands for "comma separated value"
//     // in many countries (including France) separator is ";"
//     fputcsv($fp, $line, ',');
// }
// fclose($fp);

?>