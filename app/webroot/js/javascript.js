$(document).ready(function() {
	
	/* Flashmessages na enkele seconden laten verdwijnen. */
	$('.message').animate({opacity: 1.0}, 3000).fadeOut();
	
	/* Aantal kinderen registreren. */
	$('#amount-of-children').change(function() {
		$('#next').show();
		$('#submit-register').hide();
		
		$('.childs').empty();
		for(var i = 0; i < $(this).val(); i++) {
			$('.register-child').children().clone().appendTo('.childs');
		}
				
		var j = 0;
		$('.childs').children().each(function(){
			switch(j) {
				// eerste
				case 0:
				$(this).children('h3').html('Registreer uw eerste kind');
				break;
				// tweede
				case 1:
				$(this).children('h3').html('Registreer uw tweede kind');
				break;
				// derde
				case 2:
				$(this).children('h3').html('Registreer uw derde kind');
				break;
				// vierde
				case 3:
				$(this).children('h3').html('Registreer uw vierde kind');
				break;
				// vijfde
				case 4:
				$(this).children('h3').html('Registreer uw vijfde kind');
				break;
				// zesde
				case 5:
				$(this).children('h3').html('Registreer uw zesde kind');
				break;
			}
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
		
		$('#prev').show();
		
		var countedChilds = $('.childs').children().size();
		var current = $('.current');
		
		if(current.is(':nth-child('+(countedChilds-1)+')')) {
			$('#next').hide();
			$('#prev').show();
			$('#submit-register').show();
		}
		
		$('.current').slideUp();
		$('.current').removeClass('current');
		
		current.next().fadeIn().addClass('current');
	});
	
	$('#prev').click(function(e) {
		e.preventDefault();
		
		$('#next').show();
		$('#submit-register').hide();
		
		var countedChilds = $('.childs').children().size();
		var current = $('.current');
		
		if(current.is(':nth-child(2)')) {
			$('#next').show();
			$('#prev').hide();
		}
		
		$('.current').slideDown().hide();
		$('.current').removeClass('current');
		
		current.prev().fadeIn().addClass('current');
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


