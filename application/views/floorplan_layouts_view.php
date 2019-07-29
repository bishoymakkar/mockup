<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            var Chartkick = {"language": "de"};
            $( window ).scrollTop( 0 );
            $( document ).ready( function(){
                $('html, body').animate({
                    scrollTop: "400px"
                }, 500);
            });
        </script>
        <title>Configuration styles</title>

        <?php include( 'includes.php' ) ?>
    </head>

    <body class="mockup-body">

    <div class="overlay">
        <div class="popup_prod_img_div">
        </div>
    </div>

        <div class="alert alert-success" style="display: none; z-index: 1000; opacity: 1; position: fixed; top: 50px; left: 0px; right: 0px; margin: auto; width: 50%;" role="alert"></div>
        <div class="layer"></div>
        <div class="container txt-white">
        	{header}
            <!-- <h1 class="taL">YOUR FLOOR PLAN</h1> -->
      	</div>

        <div class="white-sec floorplan inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <ol class="breadcrumb"> -->
                          <!-- <li><a href="<?php echo base_url(); ?>style_items">Style options</a></li> -->
                          <!-- <li class="active">Layouts</li> -->
                        <!-- </ol> -->
                    </div>
                </div>

                <h4 class="taC">{msg}</h4>

            



<!-- Start Furnture Slider  Custmize --> 

<div class="Furntur">
    <div class="container">

<div class="Furntur-btn">Furniture </div>
<h3> Customize your layout and choose the furniture matching your style. </h3>
        </div>
<div class="container-fluid">
                                <div class="map map-defalut">
                                    <div class="img-cont">
                                        <div class="img-map-cont">
                                        <img id="map_img" src="<?php echo base_url(); ?>public/img/configurations/{conf_img}" class="{conf_img_disp}" usemap="#planmap">
                                        {areas}
                                        <div class="area conf-area {class}" framewidth="{width}" frameheight="{height}" frameleft="{pos_x}" frametop="{pos_y}" style="width:{width}; height: {height}; top: {pos_y}; left: {pos_x}" onclick="manage_config_area_layouts({id})"></div>
                                        {/areas}
                                    </div>
                                    </div>
                                </div>
                        </div>      
      <!-- Start Carousel -->
      <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="0">
        <div class="row clearfix">
      
          
          <div class="column"> 
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
                <div class="container-fluid">
                  <div class="row">
                      <div class="graph">
                        <div class="graph-content"> 


                           <div class="map">
                            <!-- <img class="big-img {preload_disp}" src="<?php echo base_url(); ?>public/img/{big_img}"> -->
                            {big_img}
                            <div class="map_obj_cont">
                            </div>
                        </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            
              <!-- End Item --> 
            </div>
            
          </div>
          
              <div class="column">
            <div class="controls">
              <p> Alternative sets for this selection </p>
              <ul class="nav">

                <li data-target="#custom_carousel" data-slide-to="0" class="active">
                    
        

                    {layouts_handle}
                            {layouts}
                                <div class="set" id="{id}">
                                    <img class="check" src="<?php echo base_url(); ?>public/img/selection-check.svg">
                                    <img class="selection-img" src="<?php echo base_url(); ?>public/img/layouts/{img}">
                            </div>
                            {/layouts}
                        </div>
                        
                </a>
            
            
            </li>
              </ul>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

            <!-- End Furnture Slider  Custmize --> 

<div class="floor-holder">

        <div class="container-fluid no-padding {preload_disp} layouts-sets-cont">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-11 col-md-offset-1">
                            <h2 class="taL">Selection Overview</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1 col-xs-2">
                            <div class="slider-btn" id="selection_slide_left"><img src="<?php echo base_url(); ?>public/img/slider-left.png"></div>
                        </div>

                        <div class="col-md-10 col-xs-8">
                            <div class="selection-cont {preload_disp}">
                                <div class="wrap">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-1 col-xs-2">
                            <div class="slider-btn" id="selection_slide_right"><img src="<?php echo base_url(); ?>public/img/slider-right.png"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-11 col-md-offset-1">
                            <h2 class="taL">Your shopping card</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1 col-xs-2">
                            <div class="slider-btn" id="slide_left"><img src="<?php echo base_url(); ?>public/img/slider-left.png"></div>
                        </div>

                        <div class="col-md-10 col-xs-8">
                            <div class="cart-cont {preload_disp}">
                                <div class="wrap">
                                    {cart_items}
                                    <div class="item" onclick="view_prod_inner( '{item_id}', event )">
                                        <div class="cart-item" itemid="{item_id}">
                                            <div class="close-btn">x</div>
                                            <img src="<?php echo base_url(); ?>public/img/objects/{item_img}">
                                        </div>

                                        <h4 class="cart-name">{item_name}</h4>
                                        <h5 class="taL">${item_price}</h5>
                                    </div>
                                    {/cart_items}
                                </div>
                            </div>
                            <div class="cart__button-holder">
                    <div class="login-btn purchase-btn" onclick="purchase()">
                    Go to shopping card
                </div>
                
               
                </div>
                        </div>

                        <div class="col-md-1 col-xs-2">
                            <div class="slider-btn" id="slide_right"><img src="<?php echo base_url(); ?>public/img/slider-right.png"></div>
                        </div>
                    </div>
                   
            </div>

                
            </div>                </div>


        </div>



<!-- Single product view -->
    <div id="inner_overlay"></div>
      <script type="text/javascript" src="<?php echo base_url(); ?>public/js/floorplan.js"></script>

      <script>
          $(document).ready(function(ev){
    $('#custom_carousel').on('slide.bs.carousel', function (evt) {
      $('#custom_carousel .controls li.active').removeClass('active');
      $('#custom_carousel .controls li:eq('+$(evt.relatedTarget).index()+')').addClass('active');
    })
});
          </script>
    </body>
</html>
