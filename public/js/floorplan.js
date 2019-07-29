// GET THE WIDTH OF THE SINGLE CART ITEM ..
var item_width = 164;
// VARIABLE FOR TOTAL NUMBER OF ITEMS IN USER CART ..
var n_cart_items;
// VARIABLE FOR TOTAL NUMBER OF ITEMS IN SELECTION SLIDER ..
var n_selection_items;

$( document ).ready( function(){

	// CLICKING A SELECTION ..
	$( '.set' ).click( function(){
		select_object( $( this ) );
	});

	// SELECT THE FIRST SELECTION ..
	$( '.set:first' ).click();

	// SET THE WIDTH OF THE SLIDER WRAP ..
	n_cart_items = $( '.cart-cont .cart-item' ).length;
	// GET THE TOTAL NUMBER OF SELECTIONS ..
	n_selection_items = $( '.selection-cont .cart-item' ).length;
	
	// COUNT CART ITEMS ..
	var total_cart_items = $( '.cart-cont .cart-item' ).length;
	// IF NO CART ITEMS, HIDE PURCHASE BUTTON ..
	if ( total_cart_items == 0 )
	{
		$( '.purchase-btn' ).hide();
	}
	else
	{
		$( '.purchase-btn' ).show();
	}

	// GET THE ACTUAL WIDTH OF THE CART CONTAINER ..
	var container_width = $( '.cart-cont' ).width();
	// DIVIDE BY THE WIDTH OF THE ITEM ..
	var shown_cart_items = Math.floor( container_width / 164 );
	var shown_selections = Math.floor( container_width / 164 );

	// HOVER EFFECT FOR CART ITEMS ..
	$( '.cart-cont .cart-item' ).hover( function(){
		$( this ).find( '.close-btn' ).fadeIn( 100 );
	}, function(){
		$( this ).find( '.close-btn' ).fadeOut( 100 );
	});

	// CLICKING ITEM'S CLOSE BUTTON ..
	$( '.close-btn' ).click( function(){
		remove_cart_item( $( this ).parent().attr( 'itemid' ), $( this ) );
	});

	var wrap_width = (item_width * n_cart_items) + ( n_cart_items * 50 );
	$( '.cart-cont .wrap' ).css({ 'width': wrap_width });

	var selections_wrap_width = (item_width * n_selection_items) + ( n_selection_items * 50 );
	$( '.selection-cont .wrap' ).css({ 'width': selections_wrap_width });

	// CLICKING THE RIGHT SLIDER ARROW ..
	$( '#slide_right' ).click( function(){
		n_cart_items = $( '.cart-cont .cart-item' ).length;
		if ( shown_cart_items < n_cart_items )
		{
			var wrap_left = parseInt( $( '.cart-cont .wrap' ).css( 'left' ) );
			$( '.cart-cont .wrap' ).css({ 'left': wrap_left - ( item_width + 12 ) });
			shown_cart_items++;
		}
	});

	// CLICKING THE LEFT SLIDER ARROW ..
	$( '#slide_left' ).click( function(){
		n_cart_items = $( '.cart-cont .cart-item' ).length;
		if ( shown_cart_items > (Math.floor( container_width / 164 )) )
		{
			var wrap_left = parseInt( $( '.cart-cont .wrap' ).css( 'left' ) );
			$( '.cart-cont .wrap' ).css({ 'left': wrap_left + ( item_width + 12 ) });
			shown_cart_items--;
		}
	});

	// CLICKING THE RIGHT SLIDER ARROW ..
	$( '#selection_slide_right' ).click( function(){
		n_selection_items = $( '.selection-cont .cart-item' ).length;
		if ( shown_selections <= n_selection_items )
		{
			var wrap_left = parseInt( $( '.selection-cont .wrap' ).css( 'left' ) );
			$( '.selection-cont .wrap' ).css({ 'left': wrap_left - ( item_width + 12 ) });
			shown_selections++;
		}
	});

	// CLICKING THE LEFT SLIDER ARROW ..
	$( '#selection_slide_left' ).click( function(){
		n_selection_items = $( '.selection-cont .cart-item' ).length;
		console.log( shown_selections );
		if ( shown_selections > (Math.floor( container_width / 164 )) )
		{
			var wrap_left = parseInt( $( '.selection-cont .wrap' ).css( 'left' ) );
			$( '.selection-cont .wrap' ).css({ 'left': wrap_left + ( item_width + 12 ) });
			shown_selections--;
		}
	});

	// CONVERT IMAGE PERCENTAGE COORDINATES TO PIXELS ..
	setTimeout( function(){
		if ( $( '.big-img' ).length > 0 )
		{
			// $( '.area.layout_obj_area' ).each( function(){
			// 	var posx = parseInt( $( this ).css( 'left' ) );
			// 	var posy = parseInt( $( this ).css( 'top' ) );
			// 	var width = parseInt( $( this ).css( 'width' ) );
			// 	var height = parseInt( $( this ).css( 'height' ) );

			// 	var map_img_width = parseInt( $( '.big-img' ).width() );
			// 	var map_img_height = parseInt( $( '.big-img' ).height() );

			// 	$( this ).css({
			// 		'left': ( posx / 100 ) * map_img_width + 'px',
			// 		'top': ( posy / 100 ) * map_img_width + 'px',
			// 		'width': ( width / 100 ) * map_img_width + 'px',
			// 		'height': ( height / 100 ) * map_img_width + 'px',
			// 	});
			// });
		}
	}, 500);

	// SAME THING FOR THE MAP ..
	if ( $( '.map' ).length > 0 )
	{
		$( '.conf-area' ).each( function()
		{
			var posx = parseInt( $( this ).attr( 'frameleft' ) );
			var posy = parseInt( $( this ).attr( 'frametop' ) );
			var frame_width = parseInt( $( this ).attr( 'framewidth' ) );
			var frame_height = parseInt( $( this ).attr( 'frameheight' ) );

			var map_img_width = parseInt( $( '#map_img' ).width() );
			var map_img_height = parseInt( $( '#map_img' ).height() );

			$( this ).css({
				'left': parseInt( ( posx / 100 ) * map_img_width ) + 'px',
				'top': parseInt( ( posy / 100 ) * map_img_height ) + 'px',
				'width': parseInt( ( frame_width / 100 ) * map_img_width ) + 'px',
				'height': parseInt( ( frame_height / 100 ) * map_img_height ) + 'px',
			});
		});
	}
});

// FUNCTION TO VIEW LAYOUTS OF A CONFIGURATION AREA ..
function manage_config_area_layouts( config_area_id )
{
	location.href = base_url + "floorplan/layouts/" + config_area_id;
}

// GO TO PURCHASE PAGE ..
function purchase(){
	location.href = base_url + "purchase";
}

// HIDE PRODUCT INFORMATION POPUP ..
function hide_product_popup(){
	$( '#prod_popup' ).fadeOut();
}

// VIEW PRODUCT SINGLE PAGE WITH INFORMATION ..
function view_prod_inner( id, event )
{
	var target = event.target;
	if ( $( target ).hasClass( 'close-btn' ) == false )
	{
		$.ajax({
	        type: "POST",
	        url: base_url + "floorplan/product",
	        data: { id: id },
	        dataType: "json",
	        success: function( data ){
	        	$( '#inner_overlay' ).html( data.html );
	        	$( '#prod_popup' ).fadeIn( 200 );
			}
	    });
	}
}

// SELECT AN OBJECT IN THE MAP ..
function select_object( elem )
{
	$.ajax({
        type: "POST",
        url: base_url + "purchase/get_layout_objects",
        data: { layout_id: $( elem ).attr( 'id' ) },
        dataType: "json",
        success: function( data ){
        	// ADD THE CHECK SIGN ..
        	$( '.set' ).each( function(){
        		$( this ).find( '.check' ).fadeOut( 50 );
        		$( this ).attr( 'isselected', 'no' );
        	});

        	$( elem ).find( '.check' ).fadeIn( 250 );
			$( elem ).attr( 'isselected', 'yes' );

			// Load the big image ..
			var new_src = $( elem ).find( '.selection-img' ).attr( 'src' );
			$( '.big-img' ).attr( 'src', new_src );

			if ( data.html != "" )
        	{
        		var selection_width = parseInt( $( '.selection-cont .wrap' ).css( 'width' ) );
	        	// UPDATE THE WIDTH OF THE CONTAINERS ..
	        	$( '.selection-cont .wrap' ).css({ 'width': selection_width + ( 205 * data.objects.length ) });

	        	$( '.selection-cont .wrap' ).html( data.html );

	        	// LOAD LAYOUT OBJECTS IN THE IMAGE MAP ..
	        	$( '.map_obj_cont' ).html( "" + data.map_objects_html ).promise().done(function(){});

	        	$( '.layout_obj_area' ).each( function(){
	        		var oldposx = parseInt( $( this ).attr( 'posxattr' ) );
			        var oldposy = parseInt( $( this ).attr( 'posyattr' ) );
			        var oldframe_width = parseInt( $( this ).attr( 'framewidthattr' ) );
			        var oldframe_height = parseInt( $( this ).attr( 'frameheightattr' ) );

			        var big_img_width = parseInt( $( '.big-img' ).width() );
					var big_img_height = parseInt( $( '.big-img' ).height() );

					var left = parseInt( ( oldposx / 100 ) * big_img_width ) + 'px';
					var top = parseInt( ( oldposy / 100 ) * big_img_height ) + 'px';
					var width = parseInt( ( oldframe_width / 100 ) * big_img_width ) + 'px';
					var height = parseInt( ( oldframe_height / 100 ) * big_img_height ) + 'px';
					
					$( this ).css({
						'left': left,
						'top': top,
						'width': width,
						'height': height,
					});

					$( '.layout_obj_area' ).fadeIn( 300 );
	        	});
        	}
        	else
        	{
        		$( '.selection-cont .wrap' ).html( '' );
        		$( '.map_obj_cont' ).html( "" );
        	}
		}
    });
}

function hide_overlay(){
	$( '.overlay' ).fadeOut( 300 );
}

// SHOW PRODUCT POPUP ..
function popup_prod_img( id, img, name, desc )
{
	$( '.overlay' ).fadeIn( 200 );
	$( '.popup_prod_img_div' ).html( '<div class="close" onclick="hide_overlay()">x</div><img src="' + base_url + 'public/img/objects/' + img + '"><h3>' + name + '</h3><p> ' + desc + ' </p><a class="btn" onclick=\'add_item_to_cart( ' + id + ' );hide_overlay();\'>ADD THIS ITEM TO CART</a>' );
}

// ADD AN ITEM TO USER CART ..
function add_item_to_cart( id )
{
	$.ajax({
        type: "POST",
        url: base_url + "purchase/add_item_to_cart",
        data: { id: id },
        dataType: "json",
        success: function( data ){
        	if ( data.flag == 1 )
        	{
        		$( ' .alert' ).attr( 'class', 'alert alert-success' );
        		$( ' .alert' ).html( '<h4 class="marBot0"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Item successfully added to your cart</h4>' );
        		$( '.alert' ).fadeIn( 50 );
        		$( '.purchase-btn' ).show();

        		setTimeout( function(){
        			$( '.alert' ).fadeOut( 1000 );
        		}, 2500);

        		// APPEND ITEM TO CART ..
        		var cart_width = parseInt( $( '.cart-cont .wrap' ).css( 'width' ) );
        		$( '.cart-cont .wrap' ).css({ 'width': cart_width + 205 });
        		$( '.cart-cont .wrap' ).append( data.html );

        		// HOVER EFFECT FOR CART ITEMS ..
				$( '.cart-cont .cart-item' ).hover( function(){
					$( this ).find( '.cart-cont .cart-item .close-btn' ).fadeIn( 100 );
				}, function(){
					$( this ).find( '.cart-cont .cart-item .close-btn' ).fadeOut( 100 );
				});

				// CLICKING THE RIGHT SLIDER ARROW ..
				var n_cart_items = $( '.cart-cont .item' ).length;
				var container_width = $( '.cart-cont' ).width();
				var shown_cart_items = Math.floor( container_width / 164 );
				$( '#slide_right' ).click( function(){
					if ( shown_cart_items < n_cart_items )
					{
						var wrap_left = parseInt( $( '.cart-cont .wrap' ).css( 'left' ) );
						$( '.cart-cont .wrap' ).css({ 'left': wrap_left - ( item_width + 12 ) });
						shown_cart_items++;
					}
				});

				// CLICKING THE LEFT SLIDER ARROW ..
				$( '#slide_left' ).click( function(){
					if ( shown_cart_items > 1 )
					{
						var wrap_left = parseInt( $( '.cart-cont .wrap' ).css( 'left' ) );
						$( '.cart-cont .wrap' ).css({ 'left': wrap_left + ( item_width + 12 ) });
						shown_cart_items--;
					}
				});
        	}
        	else
        	{
        		$( ' .alert' ).attr( 'class', 'alert alert-danger' );
        		$( ' .alert' ).html( '<h4 class="marBot0"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;' + data.flag + '</h4>' );
        		$( '.alert' ).fadeIn( 50 );
        		setTimeout( function(){
        			$( '.alert' ).fadeOut( 1000 );
        		}, 2500);
        	}
        }
    });
}

// REMOVE ITEM FROM USER CART ..
function remove_cart_item( item_id, elem )
{
	$.ajax({
        type: "POST",
        url: base_url + "purchase/remove_cart_item",
        data: { item_id: item_id },
        success: function( data ){
        	if ( data == 1 ) $( elem ).parents( '.item' ).remove();
        	var total_cart_items = $( '.cart-cont .cart-item' ).length;
			if ( total_cart_items == 0 )
			{
				$( '.purchase-btn' ).hide();
			}

        }
    });
}

// INCREMENT CART ITEM QUANTITY ..
function increment_qty( item_id )
{
	var qty = $('#item_' + item_id + '_qty').val();
	$.ajax({
        type: "POST",
        url: base_url + "purchase/update_cart_item",
        data: { qty: parseInt(qty)+1, item_id: item_id },
        success: function( data ){
        	if ( data == 1 )
        	{
        		$('#item_' + item_id + '_qty').val( parseInt(qty)+1 );
        		var price = $( '#item_' + item_id + '_price' ).text();
        		var total = ( parseInt( qty ) + 1 ) * price;
        		$( '#item_' + item_id + '_total' ).text( total );
        	}
        }
    });
}

// DECREMENT CART ITEM QUANTITY ..
function decrement_qty( item_id )
{
	var qty = $('#item_' + item_id + '_qty').val();
	if ( qty > 1 )
	{
		$.ajax({
	        type: "POST",
	        url: base_url + "purchase/update_cart_item",
	        data: { qty: parseInt(qty)-1, item_id: item_id },
	        success: function( data ){
	        	if ( data == 1 )
	        	{
	        		$('#item_' + item_id + '_qty').val( parseInt(qty)-1 );
	        		var price = $( '#item_' + item_id + '_price' ).text();
	        		var total = ( parseInt( qty ) - 1 ) * price;
	        		$( '#item_' + item_id + '_total' ).text( total );
	        	}
	        }
	    });
	}
}


///cart view confirm purchase////
function con_purchase()
{
	location.href = base_url + "personal_info";
}
