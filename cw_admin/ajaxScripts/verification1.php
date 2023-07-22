<?php ob_start(); error_reporting(0);
extract($_POST);
$qs=strip_tags($_POST['qs']);
$code = rand(1000,9999);

$to = $qs;


    $amessage = $code." is your signup OTP for visitcart.com. Treat this as confidential.";
    $asms=str_replace(" ","%20",$amessage); 
    $aphone = $qs;
     //$aurl = "http://145.239.206.220/smsapi/index.jsp?username=AdsChronicle&pwd=ads890&msisdn=$aphone&msg=$asms&senderid=ADSCHR";
    // $aurl = "http://api.smscountry.com/SMSCwebservice_bulk.aspx?User=adschronicle&passwd=62480249&mobilenumber=$aphone&message=$asms&sid=smscntry&mtype=N&DR=Y";
    $url = "http://145.239.206.220:9091/SMSPANELAPI?username=AdsChronicle&pwd=ads890&msisdn=$aphone&msg=$asms&senderid=ADSCHR&pe_id=1001516986856829022";
//    fopen($aurl, "r");
//if(fopen($aurl, "r")){
    session_start();
    $_SESSION['signup_verificationcode']=$code;
    echo "sent"; exit;
//}

