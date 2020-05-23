
  $(document).ready(function(){

        
    $('.shortener').on('submit', function(event){      
      event.preventDefault();
      var link_data = $('.query_link').val(); 
      var btn = $(this).find('.submit').val();    
      var result = $('.result'); 
      
      $.ajax({
        url: 'server.php',
        type: 'POST',
        data: {
          'query_link':link_data,
          'submit_request': btn
        },        
        cache:false,        
        dataType: 'json',

        success: function(response){ 
        
            result.html(response.link_data);
            //$('.shortener')[0].reset();
                   
        }, error: function () {
          console.log('is error');
        }
      });       

    });

$(document).on('click', '.result_link', function(event){
    event.preventDefault();
    var link = $(this)[0].outerHTML;
    
    
    $.ajax({
      url: 'server.php',
      type: 'POST',
      data: {
          'clicked':link 

        },        
      cache:false,
      success: function(response){ 
        
            
      }, error: function () {
          console.log('is error');
        }
      }); 
    });

});

  