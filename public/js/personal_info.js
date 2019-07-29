$( document ).ready( function(){

	// EVENT HANDLER FOR CLICKING CUSTOM RADIO BUTTONS ..
	$( '.mockup-radiobtn' ).click( function(){
		select_radio( $( this ).children() );
	});

	// EVENT HANDLER FOR CLICKING CUSTOM CHECK BOXES ..
	$( '.mockup-checkbox' ).click( function(){
		tick_checkbox( $( this ) );
	});

	// EVENT HANDLER FOR CUSTOM SELECT BOX ..
	$( '.mockup-select' ).click( function(){
		toggle_select_box( $( this ) );
	});

	$( 'html' ).click( function( e ){
		var target = e.target;
		if ( $( target ).hasClass( 'select-opts' ) == false && $( target ).hasClass( 'mockup-select' ) == false && $( target ).parent().hasClass( 'select-opts' ) == false )
		{
			$( '.select-opts' ).remove();
			$( '.mockup-select' ).each( function(){
				$( this ).attr( 'state', 'collapsed' );
			});
		}
	});
});

// FUNCTION TO SELECT RADIO BUTTON ..
function select_radio( elem ){
	//CLEAR ALL SELECTED ELEMENTS ..
	$( '.mockup-radiobtn .inner' ).each( function(){
		$( this ).removeClass( 'active' );
	});
	$( elem ).addClass( 'active' );
}

// FUNCTION TO TICK A CHECKBOX ..
function tick_checkbox( elem ){
	var status = $( elem ).attr( 'ticked' );
	if ( status == "yes" )
	{
		$( elem ).attr( 'ticked', 'no' );
		$( elem ).html( '' );
	}
	else
	{
		$( elem ).attr( 'ticked', 'yes' );
		$( elem ).html( '<img class="checkbox-tick" src="' + base_url + 'public/img/tick.png">' );
	}
}

function toggle_select_box( elem ){
	var state = $( elem ).attr( 'state' );
	if ( state == "expanded" )
	{
		$( elem ).next().remove();
		$( elem ).attr( 'state', 'collapsed' );
	}
	else
	{
		$( elem ).parent().append('<div class="select-opts"><div>option 1</div><div>option 2</div><div>option 3</div></div>');
		$( elem ).attr( 'state', 'expanded' );
	}
}

function finalize_purchase()
{
  location.href = base_url + "purchase/finalize_purchase";
}
