<?php

require __DIR__.'/../vendor/twilio/sdk/Services/Twilio.php';
include './SendSms.php';


$receiver="+17877174444";

$client = new Services_Twilio($accountId, $autHToken);
$smsSender=new SendSms($client);
$smsSender->setMessage("Testing from Android app-just sms");
$smsSender->setSender($sender);
$smsSender->setReceiver($receiver);
$messgageStatus=$smsSender->sendSms();

print $messgageStatus->sid;
