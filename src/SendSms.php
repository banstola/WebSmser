<?php

require_once __DIR__ . '/../vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;

class SendSms {

    private $client;
    private $message = null;
    private $sender;
    private $receiver;
    private $accountId;
    private $authToken;

    const CONFIG_LOC= __DIR__.'/../config/sms_creds.yml';

    function setSender($sender) {
        $this->sender = $sender;
    }

    function setReceiver($receiver) {
        $this->receiver = $receiver;
    }

    function setMessage($message) {
        $this->message = $message;
    }

    /**
     * SendSms is used to set the sender number </br>
     * receiver number and the message
     */
    public function __construct() {
        $this->setDataForSending();
        $this->client = $this->getClient();
    }

    /**
     * 
     * @return string The REST api message if successful else error report
     */
    public function sendSms() {

        return $this->client->account->messages->sendMessage($this->sender, $this->receiver
                        , $this->message
        );
    }
    
    private function getClient() {
          
          $client=new Services_Twilio(  $this->accountId,$this->authToken);
          return $client;
    }
    
    private function setDataForSending() {
        $creads=Yaml::parse(file_get_contents(self::CONFIG_LOC));
        $this->authToken=$creads['creds']['auth_token'];
        $this->accountId=$creads['creds']['account_id'];        
        
    }

}
