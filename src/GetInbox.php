<?php


function __autoload($class_name) 
{

    require_once "./".$class_name.".php" ;
}

    
    $sender=new Sender();
    
    $all_message=array();
       
    
    
    foreach ($sender->getClient()->account->messages->getIterator(0, 50, array(
    'From' => '+17874900489',
)) as $message) {
        
        $each_message=array();
        $each_message['from']=$message->from;
        $each_message['to']=$message->to;
$each_message['message']=$message->body;        
   
array_push( $all_message,$each_message);
}

    echo json_encode($all_message);
    
    
    
    

