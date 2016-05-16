<?php

namespace WebSmser\src\SendSms;

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

/**
 * A class for sending SMS using Twilio API. It provides with all the methods to set Twilio authentication and token. 
 */
class SendSms {

    /** Twilio client for API access**/
    private $client;
    /**Content of SMS message**/
    private $message;
    /**Twilio number for sending message. Typically this is a constant value**/
    private $sender;
    /**The number being sent SMS to**/
    private $receiver;
    /**Twilio accountId. This can be obtained from Twilio console**/
    private $accountId;
    /**Authentican alphanumerica code provided by Twilio**/
    private $authToken;
    
    /**Location of Twilio crediantials and number**/
    const CONFIG_FILE=  "/../config/dist/sms_creds.yml";

    /**Set the sender number.**/
    public function setSender($sender) {
        $this->sender = $sender;
    }
    /**Set receiver phone number**/
    public function setReceiver($receiver) {
        $this->receiver = $receiver;
    }
    /**Set the message to be sent to Twilio API**/
    public function setMessage($message) {
        $this->message = $message;
    }

    private function setClient() {
          
        $this->client=new Services_Twilio(  $this->accountId,$this->authToken);
    }
    
    private function getClient(){
        return $this->client;
    }

    public function __construct() {
        $this->setConfiguration();
        $this->setClient();
    }

    /**
     * 
     * @return string The REST api message if successful else error report
     */
    public function sendSms() {

        return $this->client->account->messages->sendMessage($this->sender, $this->receiver
                        , $this->message);
    }

    
    private function setConfiguration() {
        $creads=Yaml::parse(file_get_contents(__DIR__.self::CONFIG_FILE));
        $this->authToken=$creads['creds']['auth_token'];
        $this->accountId=$creads['creds']['account_id']; 
        $this->setSender($creads['creds']['sender']);
        
    }

}
