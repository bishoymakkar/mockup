<html>
    <head>
        <script> var Chartkick = {"language": "de"}; </script>
        <title>Contact</title>
        
        <?php include( 'includes.php' ); ?>
    </head>

    <body class="mockup-body">
        <div class="container txt-white">
            {header}
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <h2 class="taL">GET IN TOUCH</h2>
                    </div>

                    <div class="row">
                        <h4 class="taL">EMAIL</h4>
                        <h5 class="taL">mockupstudio@mockupstudio.com</h5>
                    </div>

                    <div class="row">
                        <h4 class="taL">TELEPHONE</h4>
                        <h5 class="taL">+00 000 0000 000</h5>
                    </div>
                </div>

                <div class="col-md-7 col-md-offset-1">
                    <div class="cont-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>SMALL TEXT</label>
                                    <input id="contact_small_txt" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-5 col-md-offset-1">
                                <div class="form-group">
                                    <label>DROP DOWN</label><br>
                                    <div class="mockup-select">
                                        <span class="fL">TEXT</span>
                                        <div class="arw fR"></div>
                                        <div class="c"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row marBot0">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>LARGE TEXT</label><br>
                                    <textarea id="contact_large_txt" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-5 col-md-offset-1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group marBot0">
                                            <label>CHECK BOXES</label><br>
                                            <ul class="list-inline">
                                                <li>
                                                    <div class="mockup-checkbox">
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="mockup-checkbox">
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>RADIO BUTTONS</label>
                                            <ul class="list-inline">
                                                <li>
                                                    <div class="mockup-radiobtn">
                                                        <div class="inner"></div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="mockup-radiobtn">
                                                        <div class="inner"></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/contact.js"></script>
    </body>
</html>