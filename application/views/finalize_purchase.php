<html>
    <head>
        <script> var Chartkick = {"language": "de"}; </script>
        <title>Your cart</title>

        <?php include( 'includes.php' ) ?>
    </head>

    <body class="mockup-body">
        <div class="layer"></div>
        <div class="container txt-white">
        	{header}

            <div class="row marBot0">
                <div class="col-md-12">
                    <h1 class="taL ttU">Personal information</h1>
                </div>
            </div>

            <div class="row pers-inf-row">
                <div class="col-md-12">
                    <ul>
                        <li>
                            <h4 class="taL ttU">Title</h4>
                            <h5 class="taL">Nulla vitae elit libero, a pharetra augue.</h5>
                        </li>

                        <li>
                            <h4 class="taL ttU">Title</h4>
                            <h5 class="taL">Nulla vitae elit libero, a pharetra augue.</h5>
                        </li>

                        <li>
                            <h4 class="taL ttU">Title</h4>
                            <h5 class="taL">Nulla vitae elit libero, a pharetra augue.</h5>
                        </li>

                        <li>
                            <h4 class="taL ttU">Title</h4>
                            <h5 class="taL">Nulla vitae elit libero, a pharetra augue.</h5>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row marBot0">
                <div class="col-md-12">
                    <h1 class="taL ttU">YOUR CART</h1>
                </div>
            </div>
      	</div>

        <div class="white-sec floorplan">
            <div class="container">
                <div class="row bordB" id="cart_table">
                    <div class="col-md-1 col-xs-1 cart-col">No</div>
                    <div class="col-md-2 col-xs-2 cart-col">PRODUCT</div>
                    <div class="col-md-3 col-xs-2"></div>
                    <div class="col-md-1 col-xs-3">AMOUNT</div>
                    <div class="col-md-1 col-xs-2"></div>
                    <div class="col-md-2 col-xs-3">PRICE OF UNIT</div>
                    <div class="col-md-1 col-xs-2">SUM</div>
                    <div class="col-md-1 col-xs-1">DEL</div>
                </div>

                {cart_items}
                <div class="row bordB item">
                    <div class="col-md-1 col-xs-1 cart-col">{index}</div>
                    <div class="col-md-2 col-xs-2 cart-col"><img src="<?php echo base_url(); ?>public/img/objects/{item_img}"></div>
                    <div class="col-md-3 col-xs-2">{item_name}</div>
                    <div class="col-md-1 col-xs-3">
                        <input type="text" class="form-control prod-amount-div" id="item_{item_id}_qty" placeholder="Quantity" value="{item_qty}">
                    </div>
                    <div class="col-md-1 col-xs-2">
                        <ul class="qty-arws-list">
                            <li>
                                <a onclick="increment_qty({item_id})"><img class="rot90ccw" src="<?php echo base_url(); ?>public/img/arrow-right.png"></a>
                            </li>

                            <li>
                                <a onclick="decrement_qty({item_id})"><img class="rot90ccw" src="<?php echo base_url(); ?>public/img/arrow-left.png"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-xs-3">$ <span id="item_{item_id}_price">{item_price}</span></div>
                    <div class="col-md-1 col-xs-2">$ <span id="item_{item_id}_total">{total}</span></div>
                    <div class="col-md-1 col-xs-1">
                        <a onclick="remove_cart_item({item_id}, this)"><img src="<?php echo base_url(); ?>public/img/close.png"></a>
                    </div>
                </div>
                {/cart_items}
            </div>
        </div>

        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/floorplan.js"></script>
        <script type="text/javascript">
        $( document ).ready( function(){
            $( '.purchase-btn' ).show();
        });
        </script>
    </body>
</html>