$(document).ready(function() {
	
	/* Flashmessages na enkele seconden laten verdwijnen. */
	$('.message').animate({opacity: 1.0}, 3000).fadeOut();
	
	/* Aantal kinderen registreren. */
	$('#amount-of-children').change(function() {
		$('#submit-register').attr("disabled", true);
		$('#submit-register').hide();
		
		$('.childs').empty();
		for(var i = 0; i < $(this).val(); i++) {
			$('.register-child').children().clone().appendTo('.childs');
		}
		
		var countChilds = $('.childs').children().size();
		
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
		
		$('.childs').children().hide();
		$('.childs').children(':first-child').show().addClass('current');
	});
	
	// In stappen doorlopen.
	$('#next').click(function(e) {
		e.preventDefault();
		
		var current = $('.current');
		
		if(current.next() == 0) {
			$('#next').hide();
			$('#submit-register').show();
		}
		
		$('.current').hide();
		$('.current').removeClass('current');
		
		current.next().show().addClass('current');
	});
	
	// Datepickers voor de volgende selectos.
	$('#datetimepicker-date').datetimepicker({
		inline: true,
		dateFormat: "yy-mm-dd"
	});
	
	$('#datetimepicker-publish').datepicker({
		inline: true,
		dateFormat: "yy-mm-dd",
		minDate: 0,
	});
	
	$('#datetimepicker-dateOfBirth').datepicker({
		inline: true,
		dateFormat: "yy-mm-dd",
		minDate: 0,
	});
});


