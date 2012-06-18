$(document).ready(function() {
	
	/* Flashmessages na enkele seconden laten verdwijnen. */
	$('.message').animate({opacity: 1.0}, 3000).fadeOut();
	
	/* Aantal kinderen registreren. */
	$('#amount-of-children').change(function() {
		if($(this).val() == 1) {
			$('#submit-register').show();
		} else {
			$('#next').show();
			$('#submit-register').hide();
		}
		
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
		
		$('.current').hide();
		$('.current').removeClass('current');
		
		current.next().show().addClass('current');
	});
	
	// Teruggaan naar vorige stap.
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
		
		$('.current').hide();
		$('.current').removeClass('current');
		
		current.prev().show().addClass('current');
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
	
	$('.datetimepicker-dateOfBirth').datepicker({
		inline: true,
		dateFormat: "yy-mm-dd",
		changeMonth: true,
		changeYear: true
	});
	
	
	// Accordion
	$('#accordion').accordion();
	
	// Selecteer alle groepen
	$('#all-groups').click(function(e){
		e.preventDefault();
		$(this).parent().find(':checkbox').attr('checked', 'checked');
	});
	
	// image mouse over activiteiten index
    $(".event_image").hover(function() {
        $(this).stop().animate({ opacity: 0.80 }, 500);
    },
    function() {
       $(this).stop().animate({ opacity: 1.0 }, 500);
    });
    
    $('#picto .checkbox').each(function(){
    	var image = $(this).children('label').html();
    	$(this).children('label').html('<img src="img/icons/'+image+'.png" alt="" />');
    });

});


