<?php

use WebSmser\src\SendSms\SendSms;

$data=filter_input_array(INPUT_POST);
$phone_number=$data['phone_number'];
$sms_message=$data['sms_message'];

$smsSender=new SendSms();
$smsSender->setMessage($sms_message);
$smsSender->setReceiver($phone_number);
$messgageStatus=$smsSender->sendSms();