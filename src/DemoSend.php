<?php

include './SendSms.php';

$smsSender=new SendSms();
$smsSender->setMessage("Web interface message");
$smsSender->setSender($sender);
$smsSender->setReceiver($receiver);
$messgageStatus=$smsSender->sendSms();

print $messgageStatus->sid;
