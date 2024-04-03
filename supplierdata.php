<?php
	include("includes/config.php");
	$arr = ["1","2","3","4","5","6","7","8","9","10","11",];
	$cat = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44"];
	$manufacturer = $buying_office = $trading_company = $distributor = $retailer = $broker = $exporter = $government = $ngo = $business = $importer = 0;
	
	for($i=1;$i<=count($cat);$i++)
	{	
		$cat_nam = mysqli_query($link,"SELECT main_cat_name FROM `pep_bank_maincategory` AS pbm WHERE pbm.main_cat_id=$i") or die(mysqli_error($link)); 
		$data = mysqli_query($browse,"SELECT pbcp.com_id , pbcp.main_cat_id, pbcp.btype_id FROM `pep_browse_com_prods` AS pbcp JOIN `web_company_info` AS wci ON(wci.com_id = pbcp.com_id) WHERE pbcp.main_cat_id=$i AND wci.user_type=0") or die(mysqli_error($browse)); 
		
		while($name = mysqli_fetch_object($cat_nam))
		{
			echo "<br><br>".$name->main_cat_name."<br><br>";
		}
		
		while($var = mysqli_fetch_object($data))
		{
			$explode = explode(",",$var->btype_id);
			if(in_array("1", $explode))
			{
					$manufacturer++;
			}
			if(in_array("2", $explode))
			{
					$buying_office++;
			}
			if(in_array("3", $explode))
			{
					$trading_company++;
			}
			if(in_array("4", $explode))
			{
					$distributor++;
			}
			if(in_array("5", $explode))
			{
					$retailer++;
			}
			if(in_array("6", $explode))
			{
					$broker++;
			}
			if(in_array("7", $explode))
			{
					$exporter++;
			}
			if(in_array("8", $explode))
			{
					$government++;
			}
			if(in_array("9", $explode))
			{
					$ngo++;
			}
			if(in_array("10", $explode))
			{
					$business++;
			}
			if(in_array("11", $explode))
			{
					$importer++;
			}	
			
		}
		echo "Manufacturer = ".$manufacturer." Suppliers<br>buying_office = ".$buying_office." Suppliers<br>trading_company = ".$trading_company." Suppliers<br>distributor = ".$distributor." Suppliers<br>retailer = ".$retailer." Suppliers<br>broker = ".$broker." Suppliers<br>exporter = ".$exporter." Suppliers<br>government = ".$government." Suppliers<br>ngo = ".$ngo." Suppliers<br>business = ".$business." Suppliers<br>importer = ".$importer." Suppliers<br>";
	}
	
	
	echo "Com_id----  Cat_id  ----  Btype<br>" ;
	
	

	
	die;
	
?>
 
