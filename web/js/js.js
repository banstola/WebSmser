$(document).ready(function (){
    
    
    $('#get-sms').on('click',function(e){
        e.preventDefault();
        
        getAction=$.get('../src/GetInbox.php');
        getAction.done(function(data){
            data=$.parseJSON(data);
           
           $.each(data, function (index, value) {
  $('#to-number').append('<p class="alert alert-info">'+value['from']+'</p>');
   $('#message-body').append('<p class="alert alert-info">'+value['message']+'</p>');
});
            
        });

        
        
    });
 
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

data=$.parseJSON(data);
     if(data["status"]==="1"){
   
   $('#result-panel').css('display','block');
   $('#result-panel').removeClass('alert-danger');
   $('#result-panel').addClass('alert-success');
   $('#result-panel').html('<p>Message send successfully</p>');
   $('#phone-number').val('');
   $('#sms-message').val('');
   $('#result-panel').fadeOut(3000);
     return;
     }
     
     $('#result-panel').removeClass('alert-success');
     $('#result-panel').addClass('alert-danger');
     $('#result-panel').html("<p>Message couldn't be sent.</p><br>"+data['message']+"</br>");
     $('#result-panel').fadeOut(3000);
     
   
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



