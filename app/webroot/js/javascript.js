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
			//alert($(this).attr('name').replace('[0]', '['+j+']'));
			$(this).find('input').attr('name').replace('[0]', '['+j+']');
			j++;
		});
		
		$('.childs').children().show();	
	});
});