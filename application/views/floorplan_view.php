<html>
    <head>
        <script> var Chartkick = {"language": "de"}; </script>
        <title>{conf_title}</title>

        <?php include( 'includes.php' ) ?>
    </head>

    <body class="mockup-body">
        <div class="layer"></div>
        <div class="container txt-white">
            {header}
            <h1 class="taL">YOUR FLOOR PLAN</h1>
        </div>

        <div class="white-sec floorplan">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                          <!-- <li><a href="#">Home</a></li> -->
                          <li><a href="<?php echo base_url(); ?>style_items">Style options</a></li>
                          <li class="active">Floorplan</li>
                        </ol>
                    </div>
                </div>

                <div class="map">
                    <img src="<?php echo base_url(); ?>public/img/configurations/{conf_img}" usemap="#planmap">
                    {layouts}
                    <div class="area" style="width:{width}; height: {height}; top: {pos_y}; left: {pos_x}" onclick="manage_config_area_layouts({id})"></div>
                    {/layouts}
                </div>
            </div>
        </div>

        <div class="container">
            <h2 class="taL">YOUR CART</h2>

            <div class="row">
                <div class="col-md-1">
                    <div class="slider-btn" id="slide_left"><img src="<?php echo base_url(); ?>public/img/slider-left.png"></div>
                </div>

                <div class="col-md-10">
                    <div class="cart-cont">
                        <div class="wrap">
                            {cart_items}
                            <div class="item">
                                <div class="cart-item" itemid="{item_id}">
                                    <div class="close-btn">x</div>
                                    <img src="<?php echo base_url(); ?>public/img/objects/{item_img}">
                                </div>

                                <h4 class="taL">{item_name}</h4>
                                <h5 class="taL">${item_price}</h5>
                            </div>
                            {/cart_items}
                        </div>
                    </div>
                </div>

                <div class="col-md-1">
                    <div class="slider-btn" id="slide_right"><img src="<?php echo base_url(); ?>public/img/slider-right.png"></div>
                </div>
            </div>

            <div class="row purchase-row">
                <div class="col-md-2 col-md-offset-9">
                    <div class="login-btn purchase-btn fR" onclick="purchase()">
                    Purchase
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/floorplan.js"></script>
    </body>
</html>