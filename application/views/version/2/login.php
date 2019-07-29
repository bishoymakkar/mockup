       <div class="container-fluid minh-100vh">
            <div class="row minh-100vh">
                <div class="col-md-6 minh-100vh bg-white">
                    <div class="d-flex flex-column justify-content-center align-items-center h-100">
                        <div class="login-logo d-block mb-3">
                            <img src="assets/images/logo-purple.svg" alt="" />
                        </div>
                        <?php if ($this->session->flashdata('errors')): ?>
                            <?php echo $this->session->flashdata('errors') ?>
                        <?php endif ?>
                        <form action="<?php echo site_url('home/login') ?>" method="POST">
                            <div class="form-group">
                                <label for="loginMail">Email address</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="mdi mdi-account" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="loginMail" placeholder="Email" name="email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="loginPass">Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="mdi mdi-lock" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control" id="loginPass" placeholder="Password" autocomplete="off" name="password" />
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="#" class="text-muted">Forgot password?</a>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                              <div class="form-login-acc">
             <button class="loginBtnn loginBtnn--facebook">
            Login with Facebook
        </button>
         <button class="loginBtnn loginBtnn--google">
         Login with Google
         </button>
         <style type="text/css">
/* Shared */
.loginBtnn {
  box-sizing: border-box;
  position: relative;
  /* width: 13em;  - apply for fixed size */
  margin: 0.2em;
  padding: 0 15px 0 46px;
  border: none;
  text-align: left;
  line-height: 34px;
  white-space: nowrap;
  border-radius: 0.2em;
  font-size: 16px;
  color: #FFF;
}
.loginBtnn:before {
  content: "";
  box-sizing: border-box;
  position: absolute;
  top: 0;
  left: 0;
  width: 34px;
  height: 100%;
}
.loginBtnn:focus {
  outline: none;
}
.loginBtnn:active {
  box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
}


/* Facebook */
.loginBtnn--facebook {
  background-color: #4C69BA;
  background-image: linear-gradient(#4C69BA, #3B55A0);
  /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
  text-shadow: 0 -1px 0 #354C8C;
}
.loginBtnn--facebook:before {
  border-right: #364e92 1px solid;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
}
.loginBtnn--facebook:hover,
.loginBtnn--facebook:focus {
  background-color: #5B7BD5;
  background-image: linear-gradient(#5B7BD5, #4864B1);
}


/* Google */
.loginBtnn--google {
  /*font-family: "Roboto", Roboto, arial, sans-serif;*/
  background: #DD4B39;
}
.loginBtnn--google:before {
  border-right: #BB3F30 1px solid;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
}
.loginBtnn--google:hover,
.loginBtnn--google:focus {
  background: #E74B37;
}</style>
          </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-sm-none login-bg d-flex flex-column justify-content-center align-items-center minh-100vh">
                    <div class="text-white text-center text-shadow">
                        <h2>mockup studio</h2>
                        <h4>All you need for interior design</h4>
                    </div>
                </div>
            </div>
        </div>
