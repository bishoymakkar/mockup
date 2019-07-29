<script type="text/javascript">
    function close_sliding_menu()
    {
        $( '#burger_menu' ).removeClass( 'sliding' );
    }    

    function show_sliding_menu()
    {
        $( '#burger_menu' ).addClass( 'sliding' );
    }
</script>

<div id="burger_menu">
    <div class="row">
        <div class="col-xs-2 col-xs-offset-2 noPadHor">
            <img src="<?php echo base_url(); ?>public/img/burger_icon.png" style="margin: 30px 0px; width: 30px; cursor: pointer;" onclick="close_sliding_menu()">
        </div>

        <div class="col-xs-6 noPadHor">
            <h2 style="margin: 20px 0px;">Menu</h2>
        </div>
    </div>

    <div class="row sliding-menu-row">
        <a href="javascript:void(0)">{logged_user_mail}</a>
    </div>

     <div class="row sliding-menu-row">
        <a href="<?php echo base_url(); ?>contact">Contact</a>
    </div>

    <div class="row sliding-menu-row">
        <a href="<?php echo base_url(); ?>about">About</a>
    </div>

    <div class="row sliding-menu-row">
        {logout_link}
    </div>
</div>
<div class="header-holder">
<div class="container">
    <div class="row header-row">
        <div class="col-lg-2 col-md-2 col-sm-5 col-xs-5">
            <a href="<?php echo base_url(); ?>home"><img src="<?php echo base_url(); ?>public/img/logo-white.svg"></a>
        </div>
       
        <div class="col-lg-7 col-lg-offset-3 col-md-7 col-md-offset-3 col-xs-7 dN" id="burger_icon">
            <a class="btn" onclick="show_sliding_menu()">
                <img src="<?php echo base_url(); ?>public/img/burger_icon.png">
            </a>
        </div>
        

        <div class="col-lg-7 col-lg-offset-3 col-md-7 col-md-offset-3 col-xs-7" id="header_links">
            <ul id="head_inline_links" class="list-inline text-right">
                <li>
                    <a href="javascript:void(0)">{logged_user_mail}</a>
                </li>

                <li>
                    <a href="<?php echo base_url(); ?>contact">Contact</a>
                </li>

                <li>
                    <a href="<?php echo base_url(); ?>about">About</a>
                </li>

                <li>
                    {logout_link}
                </li>
            </ul>
        </div>

        <!-- <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
            
        </div>

        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
            
        </div> -->

            </div>
            <hr class="header-hr">

    </div>
</div>

<div class="row" id="resol_img" style="margin-top: 100px;">
    <div class="col-md-12" style="text-align: center;">
        <img style="margin: auto;" src="<?php echo base_url(); ?>public/img/resolutions-icon.png" width="150">
    </div>
</div>
<h3 id="resolution_msg" class="dN">Sorry, your screen resolution is too low to view this page</h3>