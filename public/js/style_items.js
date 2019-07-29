$( document ).ready( function(){
	if($('.slider-home > *').length > 0){
		var elem = $('.slider-home').children(":first");
		set_selected_room_type(elem);
	}
	$( '.thumb' ).hover( function(){
		$( this ).find( '.layer' ).fadeIn( 300 );
	}, function(){
		$( this ).find( '.layer' ).fadeOut( 150 );
	});
	checkScrollArrow();
	$('.scroll-right-cont').click(function(e){
		e.stopPropagation();
		var leftPos = $('.slider-home').scrollLeft();
		var elWidth = $('.slider-home').width();
		$('.slider-home').animate({scrollLeft: leftPos + 200}, 800);
		setTimeout(function(){
			checkScrollArrow()
		},
		100);
	})

	$('.scroll-left-cont').click(function(e){
		e.stopPropagation();
		var leftPos = $('.slider-home').scrollLeft();
		var elWidth = $('.slider-home').width();
		$('.slider-home').animate({scrollLeft: leftPos - 200}, 0);
		setTimeout(function(){
			checkScrollArrow()
		},
		100);
	})
});

function checkScrollArrow(){
	var leftPos = $('.slider-home').scrollLeft();
	var scrollWidth = $('.slider-home')[0].scrollWidth;
	var outerWidth = $('.slider-home').outerWidth();
	if(scrollWidth - outerWidth === leftPos){
		$('.scroll-right-cont').hide();
	}
	else {
		$('.scroll-right-cont').show();
	}
	if(leftPos === 0 ){
		$('.scroll-left-cont').hide();
	}
	else{

		$('.scroll-left-cont').show();
	}
}

var current_room_type;

function get_room_type_styles(){
	location.href=base_url + "style_items/room_type_styles/" + current_room_type;
}

function get_style_configurations(){
	location.href=base_url + "floorplan/style_configurations/" + current_room_type;
}

function set_selected_room_type(elem){
	current_room_type = $(elem).attr('room-type-id');
	var img = $(elem).find('img').attr('src');
	var title = $(elem).find('h4').html();
	$('.header-sel-img img').attr('src', img);
	$('.carusal-content h2').html(title);	
	$('.active-li').removeClass('active-li');
	$('.active-thumbnail').removeClass('active-thumbnail');
	$('.active-img').removeClass('active-img');
	$('.check-active').removeClass('check-active');
	$(elem).addClass('active-li');
	$(elem).find('.thumbnail-placeholder:first').addClass('active-thumbnail');
	$(elem).find('img').addClass('active-img');
	$(elem).find('.selected-check').addClass('check-active');
}

function hide_welcome_popup()
{
	$( '.home-overlay' ).fadeOut( 200 );
}