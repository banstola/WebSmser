<?php

class SendSms {

    private $client;
    private $message = null;
    private $sender;
    private $receiver;

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
    public function __construct($client) {
        $this->client = $client;
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

}
