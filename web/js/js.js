$(document).ready(function (){
    
 
 $('#send-sms-btn').on('click',function(e){
     
     e.preventDefault();
     console.log("send sms");
     phoneNumber=$('#phone-number').val();
     smstext= $('#sms-message').val();
     posturl= "../src/DemoSend.php";

    if(phoneNumber.length <= 0){
        
        
        
        
    }
  postAction=$.post( posturl, { "phone_number": phoneNumber, "sms_message": smstext });
  
  postAction.done(function (data){
        $('#phone-number').val('');
     $('#sms-message').val('');
     console.log(data);
   
  });


 });
var clicked_item=0;
 $('.view-message').on('click',function(e){

  if(clicked_item !==0){
      $(clicked_item).removeClass('active');
  }
     e.preventDefault();
     console.log("view individual message");
     $(this).addClass('active');
     message=$(this).data('message');
     $('.show-message-details').css('display','block');
     $('.show-message-details').html('<p>'+message+'</p>');
    
clicked_item=this;
     
 });


});



