<?php
	error_reporting(E_ALL & ~E_NOTICE);
	//include("includes/config.php");

	// header("Content-type: text/csv");
	// header("Content-Disposition: attachment; filename=effected_prod_ids.csv");
	// header("Pragma: no-cache");
	// header("Expires: 0");

	$host = "pepagora.czbtqebrad9v.ap-southeast-1.rds.amazonaws.com";
	$user = "root";
	$pass = "pepdbinstance";
	$database1 = "peplistings";
	$database2 = "pepveda";
	
	$link_peplist = mysqli_connect($host, $user, $pass, $database1) or die ('Unable to connect to MySQL server.<br ><br >Please make sure your PORTAL details are correct.'.mysqli_error());
	$link_pepveda = mysqli_connect($host, $user, $pass, $database2) or die ('Unable to connect to MySQL server.<br ><br >Please make sure your PORTAL details are correct.'.mysqli_error());

	$arr_pure = [565,567,578,579,581,582,583,584,587,942,1409,1411,1659,1855,1856,1876,2964,2976,2977,2984,4790,7336,8482,8502,8703,8704,8949,8951,8955,8957,8958,8959,8964,8991,8992,9364,9388,9579,9580,9600,10289,10355,10482,12983,12984,12985,13943,14104,14105,14106,14108,14206,14423,14436,14437,14530,15204,15225,17566,26417,26444,26445,26448,26449,26450,26458,26459,26468,26469,26470,26895,27070,27165,27630,27668,27669,27797,27798,28309,28739,31988,32412,32612,32755,32756,33557,33655,33750,34094,34387,34401,34414,34835,35938,35941,35943,35944,35946,35947,35949,35951,35953,35955,35957,35959,35961,35962,35964,35966,35967,35968,35970,35971,36287,37395,37402,37800,37909,37910,37911,37913,37917,37918,38458,38460,40256,41097,41099,41101,41495,44238,44637,44638,44639,45588,45590,46043,46887,47050,47052,50756,50765,50771,50908,50913,50915,50926,51288,53306,53307,53308,53309,53310,53863,53864,53865,53866,53867,53868,53869,53870,53871,53872,54258,55746,55754,60372,60373,60374,60375,60376,60377,60378,60379,60380,60381,60382,60383,62473,62474,62475,62477,62478,63895,63896,64167,64170,64363,66270,66273,66282,68700,68701,69824,69839,70671,70672,70848,70849,70850,71153,71752,73095,73096,73097,73098,73099,73100,73104,73105,73106,73142,73143,73144,73163,73164,73165,74637,74775,77341,77363,77364,77365,79069,79397,81752,84818,86972,87362,87363,87364,87365,87366,87367,87370,87372,87914,98278,98279,98280,98381,98859,99004,99005,99007,99010,99013,99015,99016,99182,99446,99892,99893,99894,99896,99897,99930,101488,112212,112921,113196,114166,114174,114218,115103,115104,115941,115943,115945,115950,115952,115954,119110,119298,119987,122122,122127,122128,122129,123961,123963,123966,123967,127188,127274,154691,154692,154693,154694,154696,154697,154718,154719,154860,154866,156152,156153,156156,156169,156171,156285,157358,157550,158376,158377,158460,159796,160182,160183,160184,160185,160356,160377,160378,160379,160380,160381,160382,163542,163627,163628,163630,163631,163895,163914,163915,163916,164174,164405,164604,164606,164607,164944,165170,166528,166537,166698,166890,166893,166894,166899,167253,167254,167255,167256,167258,167261,167263,168016,168017,168018,168019,168020,168021,168022,168023,168024,168025,168026,168027,168028,168029,168030,168120,168234,168235,168236,168238,168239,168240,168242,168243,168586,168587,168589,168989,170099,170100,170375,170801,170803,170807,170810,171190,171225,171269,171299,171886,173709,173710,173711,173712,173713,173714,173715,174084,174085,174086,174087,174088,174089,174090,174091,174910,177576,177686,177689,177691,177692,177694,177736,177737,177738,177739,177740,177741,177742,177743,177744,177745,177746,177747,177748,177749,177750,178878,180326,180327,180653,181230,181231,181232,181233,181234,181235,181236,181237,181238,181239,181240,181241,181242,181247,182389,182392,182396,182399,182401,182402,182405,182406,182409,182475,182476,182551,182564,183138,183139,183140,183238,185705,186026,186048,186545,186573,186579,186594,186595,186596,186599,186600,186602,186603,187535,188396,188401,188403,188406,188415,188418,188419,188422,188425,188428,189263,189780,190509,191002,191697,191701,191899,191900,191901,191906,191907,191909,191911,191912,192073,192357,192358,192359,192360,192361,192367,194775,197111,197113,197114,198650,198659,198664,198665,198666,198667,198668,198669,198670,198671,198700,198701,198702,198703,198704,198705,198706,198707,198708,198709,198710,198711,198712,198713,198714,200147,200148,200149,201182,201183,202268,207887,210374,210376,210980,210987,210989,210992,210996,211228,211230,211231,211232,211233,211234,211235,211236,211237,211238,211239,211240,211661,211662,211664,211665,211667,211669,211672,213145,213588,217072,219966,219971,221497,222513,223896,223897,223899,223900,223911,223913,223914,223916,223918,223919,223921,223922,223923,225934,226280,226353,226356,226366,226369,226379,226699,226700,226701,226703,226704,226706,226707,226710,226712,226713,226714,226716,226717,226719,226720,227001,227236,227237,227238,227239,227241,228343,228345,228348,228353,228356,228359,228360,228363,228366,228367,228580,228584,228587,228588,228590,228594,228599,228605,228609,228610,229681,230550,230555,230561,230568,230856,230984,231002,231012,231114,231118,231646,233644,233649,233655,233659,233665,233667,233670,233671,233673,233674,233679,233682,234451,234566,234570,234573,234577,234580,234589,234594,234597,234600,234882,234883,237575,237583,237610,237625,240134,240219,240221,240222,240677,240678,240680,240682,240685,240687,241143,241149,241152,241171,241178,242771,247086,247113,247119,247317,247416,247420,247870,247871,247872,248706,249491,249494,249496,249498,249501,249504,249509,249885,249914,249924,250711,250716,250719,250722,250727,250729,250733,250738,250740,250743,250746,250747,250751,250753,250756,250945,251330,251758,251761,251764,251765,251767,251770,251772,251774,251777,251780,251782,251786,251791,252998,253002,253007,253012,253017,253022,253030,253033,253034,253036,253041,253046,253239,253242,253247,253250,253251,253267,254489,255311,255313,255315,255341,256133,256944,256945,256948,256950,256953,256957,256958,256961,256962,256965,256968,256972,256974,256980,256983,257270,257432,257451,257455,258602,258653,259158,259165,259168,259169,259173,259175,259176,259177,259179,259181,259183,259186,259187,260137,261267,261401,262276,263271,263940,263942,265723,265746,265912,265914,265916,266231,266232,266280,266548,266556,266557,267033,267035,267037,267038,267040,267727,267816,268195,270366,270372,270386,270389,270394,271539,271540,271541,271545,271547,272973,272977,272981,272987,272990,273029,274006,274010,274478,274481,274524,274635,275079,275731,275735,275737,275745,275750,275753,275755,277376,277775,277778,278424,278464,279240,279241,279290,280660,280663,280665,280668,281269,281326,283517,285314,285426,288307,291027,291182,292519,292577,292768,292769,292786,292788,292792,292796,292798,292801,292802,292803,292805,292806,292807,292809,292810,293293,293303,293318,293327,293875,294004,294257,294270,294766,294769,294772,295471,295476,295477,295478,295479,296268,297128,298737,299745,300563,300617,306302,306343,309635,310594,311742,312918,313832,313873,314411,314417,314457,315734,315832,315919,316078,316079,316084,316087,316089,316276,316841,317085,317086,317087,317088,317089,317090,317226,317227,317521,317523,317524,317882,317978,317979,317980,317981,317982,317983,317984,318196,318290,318723,318734,318736,318920,318922,318925,318927,318928,318935,318936,319174,319212,319220,319320,319506,319510,319733,319783,319836,319860,319866,320433,320652,320654,320656,320666,320667,320668,320670,320674,320675,320812,320814,320815,320816,320822,320823,320836,320837,320928,320929,321779,321998,322050,322128,322129,322130,322199,322205,322209,322210,322215,322222,322228,322229,322243,322244,322246];
	$result_set = mysqli_query($link_peplist,"SELECT pbcp.product_id FROM peplistings.`pep_browse_com_prods` AS pbcp LEFT JOIN pepveda.`pep_access` AS pa ON(pbcp.com_id = pa.com_id) WHERE pa.status = 0 AND pa.state_id IN (2,4,5,8,26) AND pbcp.status = 0 AND pbcp.display = 0") or die(mysqli_error($link_peplist)); 
	
	if(mysqli_num_rows($result_set)>0){
		while ($data = mysqli_fetch_object($result_set)) {
			$arr_semi_clean[] = $data->product_id; 
		}
		$arr_unmatched = array_diff($arr_semi_clean, $arr_pure);
		$arr_matched 	= array_intersect($arr_pure, $arr_semi_clean);
		$str_unmatched = implode(',', $arr_unmatched);
		$str_arr_pure = implode(',', $arr_pure);

		$resp1 = mysqli_query($link_pepveda,"UPDATE pep_product_info_india_1_1 SET no_follow = 0 WHERE product_id IN($str_unmatched)") or die(mysqli_error($link_pepveda));
		if($resp1){
			echo "pep_product_info_india_1_1 UNmatched updated..!";
		}
		else{
			echo "update error..!";
		}
		die;

		// echo 'Pure Data: '. count($arr_pure);
		// echo 'Semi Clean Data: '. count($arr_semi_clean);
		// echo 'Unmatched Data: '.count($arr_unmatched);
		// echo 'Matched Data: '. count($arr_matched);
		// die;

		/*$resp = mysqli_query($link_pepveda,"UPDATE pep_product_additional_info SET other_prod_detail = '' WHERE product_id IN($str_unmatched)") or die(mysqli_error($link_pepveda)); 
		if($resp){
 			echo '<p style="color: green;">pep_product_additional_info updated..!</p>';
 		}
		$resp1 = mysqli_query($link_pepveda,"UPDATE pep_product_info_india_1_1 SET short_description = '' WHERE product_id IN($str_unmatched)") or die(mysqli_error($link_pepveda)); 
		if($resp1){
			echo 'pep_product_info_india_1_1 Updated..!';
		}
		$resp1 = mysqli_query($link_pepveda,"UPDATE pep_product_info_india_1_1 SET short_description = '' WHERE product_id IN($str_unmatched)") or die(mysqli_error($link_pepveda)); 
 		if($resp1){
 			echo '<p style="color: green;>pep_product_info_india_1_1 updated..!</p>';
 		}
 		$resp2 = mysqli_query($link_peplist,"UPDATE pep_browse_com_prods SET prod_short_desc = '' WHERE product_id IN($str_unmatched)") or die(mysqli_error($link_peplist)); 
 		if($resp2){
 			echo '<p style="color: green;>pep_browse_com_prods updated..!</p>';
 		}	*/	
	}
?>
 
