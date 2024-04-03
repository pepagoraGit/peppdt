<?php 
/*
------------------------------------------------------------------------------------------------------------------------------------
Company Name	: Floret Media
Date			: 11/08/2016
Author			: Nagarajan.B
Purpose			: 
------------------------------------------------------------------------------------------------------------------------------------
*/

include('includes/config.php');
require("includes/class.phpmailer.php");
include('includes/email_common_html.php'); 
include('includes/connectorClass.php');

$start_time 		= date('Y-m-d H:i:s');
$date_2 			= strtotime($start_time.' + 5 minute');
$end_time 			= date('Y-m-d H:i:s', $date_2);


//SMTP Credentials
$fields 			= "password, host_name, user_name,port";
$conditions 		= "status='2'";
$select_password 	= $objGuruConnect->select($adminEmailSettings,$fields,$conditions);
if(mysqli_num_rows($select_password)>0)
{
	$get_details 	= mysqli_fetch_object($select_password);
    $port 			= $get_details ->port;
    $host_name 		= $get_details ->host_name;
    $user_name 		= $get_details ->user_name;
    $pwd 			= base64_decode($get_details ->password);
    $password 		= substr($pwd, $len_salt_string, strlen($pwd));
}
$rem_data 			= mysqli_query($link,"SELECT * FROM $msgReminder as mr LEFT JOIN $companyMainInfo as cmi ON(cmi.com_id = mr.com_id) LEFT JOIN $login as pa ON(pa.com_id = mr.com_id) WHERE DATE_FORMAT(remainder_date_time,'%Y-%m-%d %H:%i:%s') >= '$start_time' AND DATE_FORMAT(remainder_date_time,'%Y-%m-%d %H:%i:%s') <= '$end_time' AND pa.status = 0");
if(mysqli_num_rows($rem_data)>0)
{
	while($remainder 	= mysqli_fetch_object($rem_data))
	{
		$firstname		= " ";$lastname 		= " ";$com_name 		= " ";$other_headers  = " ";$subject 		= " ";$desc 			= " ";
		$rem_type		= urlencode($remainder->remainder_type);
		$mail_to 		= $remainder->email;
		$firstname		= urlencode($remainder->user_fname);
		$lastname 		= urlencode($remainder->user_lname);
		$com_name 		= urlencode($remainder->company_name);
		$other_headers  = urlencode($remainder->other_headers);
		$subject 		= urlencode($remainder->remainder_display_header);
		$desc 			= urlencode($remainder->remainder_display_description);
		$from_date 		= urlencode($remainder->from_date);
		$to_date 		= urlencode($remainder->to_date);
		$pwr 			= urlencode($portalwwwroot);
		$mail_content 	= file_get_contents("$portaladminwwwroot/includes/emailers/send_remainder_mail.php?rem_type=$rem_type&fname=$firstname&lname=$lastname&com_name=$com_name&sub=$subject&other_headers=$other_headers&desc=$desc&portalwwwroot=$pwr&fd=$from_date&td=$to_date");
		// Send mail
		$name 			= $firstname." ".$lastname;
		$subj 			= "Remainder at pepagora.com";
		$mail 			= new PHPMailer();
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug= 0;  // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true;  // authentication enabled
		$mail->Host 	= $host_name;
		$mail->Port 	= $port;
		$mail->Username = $user_name;
		$mail->Password = $password;
		if($port!=25){
		  	//SSL Assign
			$mail->SMTPSecure = 'ssl';
		}
		$mail->SetFrom($sentfrom,$norplyFromName);
		$mail->AddAddress($mail_to,$name);
		$mail->Subject = $subj;
		$mail->MsgHTML($mail_content);
		$mail->AltBody = 'pepagora.com';
		$mail->Send();
	
	}

}
?>