$(document).ready(function() {
	
	/* Flashmessages na enkele seconden laten verdwijnen. */
	$('.message').animate({opacity: 1.0}, 3000).fadeOut();
	
	/* Aantal kinderen registreren. */
	$('#amount-of-children').change(function() {
		$('.childs').empty();
		for(var i = 0; i < $(this).val(); i++) {
			$('.register-child').children().clone().appendTo('.childs');
		}
		
		var j = 0;
		$('.childs').children().each(function(){
			$(this).find('input').each(function(){
				var indexValue = $(this).attr('name').replace('[0]', '['+j+']');
				$(this).attr('name', indexValue);
			});
			$(this).find('select').each(function(){
				var indexValue = $(this).attr('name').replace('[0]', '['+j+']');
				$(this).attr('name', indexValue);
			});
			j++;
		});
		
		$('.childs').children().show();	
	});
        
        //----------------- Voor Events View------------------------//
    var selectedM = $("select[id=EventPublishOnMonth]").attr('value'); 
    var selectedD = $("select[id=EventPublishOnDay]").attr('value'); 
    var selectedY = $("select[id=EventPublishOnYear]").attr('value'); 
    
    $("select").blur(function(){
        
        if($("select[id=EventPublishOnMonth]").val()<=selectedM)
        {
            if($("select[id=EventPublishOnDay]").val()<=selectedD)
            {
              if($("select[id=EventPublishOnYear]").val()<=selectedY)
                {
                    
                    if(($("select[id=EventPublishOnYear]").val()==selectedY)&&($("select[id=EventPublishOnMonth]").val()==selectedM)&&($("select[id=EventPublishOnDay]").val()==selectedD))
                    {
                      
                    }  
                    else{
                       $("select[id=EventPublishOnYear]").val(selectedY);
                       $("select[id=EventPublishOnMonth]").val(selectedM);
                       $("select[id=EventPublishOnDay]").val(selectedD);
                    }
                }  
            }
        }
    });
    //-----------------------------------------------//
});


