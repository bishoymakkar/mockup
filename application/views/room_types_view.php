<html>
    <head>
        <script> var Chartkick = {"language": "de"}; </script>
        <title>Your Room Types</title>

        <?php include( 'includes.php' ) ?>
    </head>

    <body class="homepage" class="mockup-body">
        <div class="home-overlay">
            <div id="welcome_div">
                <h2 class="taC">Welcome to Mockup studios</h2>

                <img style="margin: 0px 0px 25px 0px; " src="<?php echo base_url(); ?>public/img/designs/{map_img}" width="150">

                <p>This is a dummy text for a welcome message to appear in this pop up box after login. please click the button below to continue.</p>

                <div class="mock-btn" onclick="hide_welcome_popup()">Continue</div>
            </div>
        </div>

        <div class="layer"></div>
        <div class="first-step">
        <div class="container txt-white">
        	{header}
            <!-- <h1 class="taL">YOUR OPTIONS</h1> -->
          </div>
        </div>

          


<div class="container-fluid nopadding">
        <div id="main_area" class="home-aria">
                <!-- Slider -->
                    <div class="span12" id="slider">
                        <!-- Top part of the slider -->
                            <div class="span12" id="carousel-bounding-box">
                                <div class="carousel slide" id="myCarousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="active item header-sel-img" data-slide-number="0">
                                            <img src="">
                                        
                                        </div>

                                
                                    <!-- Carousel nav -->
                                </div>
                            </div>


                            <div class="carusal-content">
                                    <h2></h2>
                                    <p></p>
                                
                                    <button type="submit" class="btn btn-primary" onclick="get_room_type_styles()">
						Choose this
                    </button>
                    
                                    </div>



                            
                            </div>
                        </div>
                        </div>

                    </div>
                </div><!--/Slider-->

                <div class="row hidden-phone" id="slider-thumbs">
                    <div class="span12">
                        <!-- Bottom switcher of slider -->

                          <div class="slider-home thumbnails">
                            {room_types}
                            <!-- <li onclick="location.href = '<?php echo base_url(); ?>styles/room_type_styles/{id}'"  class="span2"> -->
                            <div onclick="set_selected_room_type(this)" room-type-id="{id}" class="span2 li">
                                <a class="thumbnail thumbnail-placeholder" id="carousel-selector-0">

                                 <div class="thumb">
                                    <div class="layer" style="background:#51505026 !important; display:block">
                                  
                                    </div>

                            
                                    <img src="<?php echo base_url(); ?>public/img/room_types/{image}" onerror="src='<?php echo base_url(); ?>public/img/no-img.png'">
                                    <h4 class="marTop0 taL ttU">{title}</h4>
                                    <div class="selected-check"><i class="fa fa-check"></i></div>
                                    </a>
                                  
                                </div>  

                            </div>
                            {/room_types}
                        </div>
                <div class="scroll-cont scroll-left-cont">
                    <i class="fa fa-long-arrow-left"></i>
                </div>
                <div class="scroll-cont scroll-right-cont">
                    <i class="fa fa-long-arrow-right"></i>
                </div>
        </div>

        

           


                        <!-- <div class="row">
                            <div class="col-md-12">
                                <h4 class="marTop0 taL ttU">{style_title}</h4>
                                <p class="style-desc">{style_desc}</p>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="col-md-4">
                        <div class="row marBot0">
                            <div class="col-md-12">
                                <div class="thumb">
                                    <div class="layer">Choose me</div>
                                    <img src="<?php echo base_url(); ?>public/img/style-2.jpg">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="marTop0 taL"  style="color: #555;">STYLE NAME</h4>
                                <p>Donec id elit non mi porta gravida at eget metus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="row marBot0">
                            <div class="col-md-12">
                                <div class="thumb">
                                    <div class="layer">Choose me</div>
                                    <img src="<?php echo base_url(); ?>public/img/style-3.jpg">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="marTop0 taL"  style="color: #555;">STYLE NAME</h4>
                                <p>Donec id elit non mi porta gravida at eget metus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
                            </div>
                        </div>
                    </div> -->
            </div>

                  <div class="footer">
                      <div class="container">
                      <hr>
                      <div class="col-md-6">
                      <div class="footer-left">

                   <h4>  © MockUp Studio UG </h4>
                                </div>
                                </div>

                                 <div class="col-md-6">
                                     <div class="footer-right">
                   <h4>   Impressum </h4>
                                </div>
                                </div>
                   </div>
</div>


        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/style_items.js"></script>
    </body>
</html>