<?php


function __autoload($class_name) 
{

    require_once "./".$class_name.".php" ;
}

$data=filter_input_array(INPUT_POST);
$phone_number=$data['phone_number'];
$sms_message=$data['sms_message'];

$smsSender=new Sender();
$smsSender->setMessage($sms_message);
$smsSender->setReceiver($phone_number);
$messgageStatus="";
$message="";
$status='1';
try {
    
$smsSender->sendSms();
} catch (Services_Twilio_RestException $e) {
    $status='0';
    $message= $e->getMessage();
}



echo json_encode(array('status'=>$status,"message"=>$message));