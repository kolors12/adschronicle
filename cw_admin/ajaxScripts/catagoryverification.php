<?php ob_start(); error_reporting(0);
extract($_POST);
extract($_GET);
session_start();
require "../lib/config.php";
$qs=strip_tags($_POST['qs']);
$code = rand(1000,9999);

$to = $qs;


    // $amessage = $code." is your OTP to send message for Job Seeker,adschronicle.";
    // $amessage = $code." is your OTP to send message for Job Seeker,adschronicle.";
    $amessage = "Dear Employer, OTP to verify your mobile number is $code. Thank you, AdsChronicle.com";
    $asms=str_replace(" ","%20",$amessage); 
    $aphone = $qs;
    // $aurl = "http://api.smscountry.com/SMSCwebservice_bulk.aspx?User=adschronicle&passwd=62480249&mobilenumber=$aphone&message=$asms&sid=smscntry&mtype=N&DR=Y";
	
// 	$url = "http://145.239.206.220:9091/SMSPANELAPI?username=AdsChronicle&pwd=ads890&msisdn=$aphone&msg=$asms&senderid=ADSCHR&pe_id=1001516986856829022";
	$url = "https://49.50.67.32/smsapi/httpapi.jsp?username=adschron&password=54321&from=ADSCHR&to=$aphone&text=$asms&coding=0&pe_id=1001516986856829022&template_id=1007341713315118350";
	function get_data($aurl) {
			$ch = curl_init();
			$timeout = 5;
			curl_setopt($ch, CURLOPT_URL, $aurl);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$data = curl_exec($ch);
			curl_close($ch);
			return $data;
			}
			get_data($url);
	
	 session_start();
    $_SESSION['signup_verificationcode']=$code;
    echo "sent"; exit;
    
 /*  fopen($aurl, "r");
if(fopen($aurl, "r")){
    session_start();
    $_SESSION['signup_verificationcode']=$code;
    echo "sent"; exit;
} */

