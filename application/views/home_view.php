<html>
    <head>
        <script>
            var Chartkick = { language: 'de' };
        </script>
        <title>Home</title>
        <?php include( 'includes.php' ) ?>
    </head>
    <body class="login-page">
        <div class="alert alert-success" style="display: none; z-index: 1000; opacity: 1; position: fixed; top: 50px; left: 0px; right: 0px; margin: auto; width: 50%;" role="alert"></div>
        <!-- <div class="layer"></div> -->
        <div class="container-fluid text-white" style="min-height:100vh;padding:0;">
            <div class="row row-no-gutters" style="min-height:100vh">
                <div class="col-md-6 col-sm-none" style="min-height:100vh">
                    <div class="login-left">
                        <div class="login-left__caption">
                            <p class="">mockup studio</p>
                            <h3>
                                All you need for interior design
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="min-height:100vh">
                    <div class="login-right p-5 d-flex flex-column justify-content-center align-items-center" style="min-height:100vh">
                        <div class="login-logo">
                            <img src="<?php echo base_url(); ?>public/img/logo-color.svg" />
                        </div>
                        <div class="login-title">
                            <h4>Log in</h4>
                        </div>
                        <div class="login-form">
                            <div class="row">
                                <div class="col-md-11">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    <label>Email address</label>

                                    <input type="text" id="loginMail" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-11">
                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                    <label>Password</label>
                                    <input type="password" id="loginPass" class="form-control" />
                                </div>
                            </div>
                            <div class="login-forgit">
                                <a href="#">Forgot password?</a>
                            </div>
                            <div class="row marBot0">
                                <div class="col-md-4">
                                    <div class="login-btn" onclick="login()">Log in</div>
                                </div>
                                <div class="login-or">
                                    <h2 class="main-line-title">or</h2>
                                </div>
                                <div class="col-md-12 login-sign__social">
                                    <button class="login-sign__social-fb" type="button" class="btn btn-default">
                                        <img src="<?php echo base_url(); ?>public/img/facebook.svg" style="width:20px; margin-right:11px" usemap="#planmap" />

                                        Log in with Facebook
                                    </button>
                                    <button class="login-sign__social-google" type="button" class="btn btn-default">
                                        <img src="<?php echo base_url(); ?>public/img/search.svg" style="width:20px; margin-right:11px" usemap="#planmap" />
                                        Log in with Goolge
                                    </button>
                                </div>
                                <div class="login-creat__account">
                                    <p>
                                        Don’t have an account?
                                        <a href="#">Sign up here</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/home.js"></script>
    </body>
</html>
