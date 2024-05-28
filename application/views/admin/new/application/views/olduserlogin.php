<?php include 'header1.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="beforeLoginContentWrapper">
    <div class="col-xs-12 leftBoxStyles">
        <div class="login-box">
            <!-- /.login-logo -->
            <h1 class="userLoginH1">User Login</h1>
            <div class="login-box-body">
                <div class="btnvalue">
                    <button type="submit" class="btn btn-primary btn-block btn-flat form-control emailbtnValue">
                        <i aria-hidden="true"></i> Login with Email or Mobile
                    </button>

                    <p class="text-center">- OR -</p>
                    <button type="submit" class="btn btn-primary btn-block btn-flat form-control  mobilebtnValue">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        Login Using Mobile OTP
                    </button>

                    <p class="text-center"><br /><br /><b>NEW USER?</b></p>
                    <a href="<?php echo base_url(); ?>register">
                        <button type="submit" class="btn btn-success btn-block btn-flat form-control">
                            REGISTER NOW
                        </button>
                    </a>

                    <!--  <p class="text-center"  >- OR -</p>
         <div class="row">

          
       <div class="col-md-6">

        <div id="gSignIn"></div>
          
      <button id="gSignIn2" class="btn gl-button btn-default" type="submit"><img alt="Google" title="Sign in with Google" class="gl-button-icon js-lazy-loaded qa-js-lazy-loaded" src="https://assets.gitlab-static.net/assets/auth_buttons/google_64-9ab7462cd2115e11f80171018d8c39bd493fc375e83202fbb6d37a487ad01908.png" loading="lazy">
<span>
Sign With Google
</span>
</button>
          </div>
          <div class="col-md-6">
           <button type="submit" class="btn btn-block btn-social btn-facebook  col-md-6"scope="public_profile,email" onclick="fbLogin();" id="fbLink">
           <i class="fa fa-facebook" aria-hidden="true" ></i>
            Sign in with Facebook
          </button>

          </div>

</div> -->

                </div>

                <!-- Email Section -->

                <div class="enterUSERLOGINSection" style="display: none;">
                    <h1>Enter Email or Mobile</h1><br />
                    <form autocomplete="off" id="userloginSection">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control emailValue" placeholder="Email/Mobile"
                                id="emailValue" name="emailValue" data validations="emailValue" required="required">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                        </div>
                        <!--  <div class="form-group has-feedback">
            <input type="password" class="form-control passwordValue" placeholder="Password"  id="password"name="password" data-validation="password" required="required">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>-->
                        <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control passwordValue" placeholder="Password"
                                id="password" name="password" data-validation="password" required="required">
                            <div class="input-group-addon">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="row mtop">
                            <div class="col-xs-8">
                                <span class="erroruser" style="display:none; color: red;">Invalid username or
                                    password.</span>
                                <div class="checkbox icheck" style="display: none;">
                                    <label>
                                        <input type="checkbox"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-8 fr">
                                <a href="" class="fr">
                                    <button type="submit" class="btn btn-info  btn-flat f-submitBtn">Sign In</button>
                                </a>
                                <a href="userlogin" class="fr">
                                    <button type="button" class="btn btn-flat f-submitBtn">BACK</button>
                                </a>
                                <br /><br /><br />
                            </div>
                            <!-- /.col -->

                        </div>
                    </form>
                    <div class="social-auth-links text-center" style="display: none;">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i
                                class="fa fa-facebook"></i> Sign in using
                            Facebook</a>
                        <a class="btn btn-block btn-social btn-google btn-flat gmailbtn"><i
                                class="fa fa-google-plus"></i> Sign in using
                            Google+</a>
                    </div>
                    <!-- /.social-auth-links -->
                    <a href="<?php echo base_url(); ?>forgotpassword">I forgot my password</a><br>
                    <a href="<?php echo base_url(); ?>register" class="text-center">Register a new membership</a>

                </div>

                <!-- Mobile Number Section -->

                <div class="enterMOBILESection" style="display: none;">
                    <h1>Login with using Mobile No.</h1>
                    <form autocomplete="off" id="moblieSection">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control mobilenumberValue" placeholder=" Enter mobile number"
                                id="mobilenumber" name="mobilenumber" data validations="mobilenumber">
                            <span class="mobilenumbererror" style="display: none; color: red;">Please enter mobile
                                number.</span>
                            <span class="mobileerror" style="display: none; color: red;">Please enter valid mobile
                                number.</span>
                        </div>



                        <div class="form-group has-feedback enterotpSection" style="display: none;">
                            <input type="" class="form-control otpValue" placeholder="Enter mobile OTP" id="otpValue"
                                name="otpValue" data-validation="otpValue" required="required">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            <span class="otperror" style="display: none; color: red;">Please enter OTP.</span>
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="checkbox icheck" style="display: none;">
                                    <label>
                                        <input type="checkbox"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-6">

                                <button type="submit" class="btn btn-primary btn-block btn-flat otpbtn">Send OTP to
                                    Login</button>




                                <button type="button" class="btn btn-primary btn-block btn-flat showloginBtn"
                                    style="display: none;">Login with OTP</button>


                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <div class="social-auth-links text-center" style="display: none;">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i
                                class="fa fa-facebook"></i> Sign in using
                            Facebook</a>
                        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i
                                class="fa fa-google-plus"></i> Sign in using
                            Google+</a>
                    </div>
                    <!-- /.social-auth-links -->

                    <a href="<?php echo base_url(); ?>forgotpassword">I forgot my password</a><br>
                    <a href="<?php echo base_url(); ?>register" class="text-center">Register a new membership</a>
                </div>



            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <div class="modal modal-warning fade" id="modal-gmailUserError">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <p id="text1">Email already registered.Please use your password to continue.</p>
                    </div>
                    <div class="modal-footer">
                        <div align="right">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"
                                id="highest">Close</button>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal modal-warning fade" id="modal-moblie">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Oops!</h4>
                    </div>
                    <div class="modal-body">
                        <p>Please Enter Your Registered Mobile Number.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- iCheck -->
    </div>
</div>
<div class="clear"></div>
<!--<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>-->
<script>
$(document).ready(function() {
    /*
     setTimeout(function(){
        $(".loadingSec").show(); 
        checkCookie();
        $(".loadingSec").hide();
      }, 1000);
      */
});
</script>
<script>
$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("fa-eye-slash");
            $('#show_hide_password i').removeClass("fa-eye");
        } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("fa-eye-slash");
            $('#show_hide_password i').addClass("fa-eye");
        }
    });
});
</script>
<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
<meta name="google-signin-client_id" content="913092980453-4dqej3qkl7rke1631rcu9s4bfvesu9hj.apps.googleusercontent.com">
<?php include 'footer.php';?>

<?php include 'header1.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="beforeLoginContentWrapper">
    <div class="col-xs-12 leftBoxStyles">
        <div class="login-box">
            <!-- /.login-logo -->
            <h1 class="userLoginH1">User Login</h1>
            <div class="login-box-body">
                <div class="btnvalue">
                    <button type="submit" class="btn btn-primary btn-block btn-flat form-control emailbtnValue">
                        <i aria-hidden="true"></i> Login with Email or Mobile
                    </button>

                    <p class="text-center">- OR -</p>
                    <button type="submit" class="btn btn-primary btn-block btn-flat form-control  mobilebtnValue">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        Login Using Mobile OTP
                    </button>

                    <p class="text-center"><br /><br /><b>NEW USER?</b></p>
                    <a href="<?php echo base_url(); ?>register">
                        <button type="submit" class="btn btn-success btn-block btn-flat form-control">
                            REGISTER NOW
                        </button>
                    </a>

                    <!--  <p class="text-center"  >- OR -</p>
         <div class="row">

          
       <div class="col-md-6">

        <div id="gSignIn"></div>
          
      <button id="gSignIn2" class="btn gl-button btn-default" type="submit"><img alt="Google" title="Sign in with Google" class="gl-button-icon js-lazy-loaded qa-js-lazy-loaded" src="https://assets.gitlab-static.net/assets/auth_buttons/google_64-9ab7462cd2115e11f80171018d8c39bd493fc375e83202fbb6d37a487ad01908.png" loading="lazy">
<span>
Sign With Google
</span>
</button>
          </div>
          <div class="col-md-6">
           <button type="submit" class="btn btn-block btn-social btn-facebook  col-md-6"scope="public_profile,email" onclick="fbLogin();" id="fbLink">
           <i class="fa fa-facebook" aria-hidden="true" ></i>
            Sign in with Facebook
          </button>

          </div>

</div> -->

                </div>

                <!-- Email Section -->

                <div class="enterUSERLOGINSection" style="display: none;">
                    <h1>Enter Email or Mobile</h1><br />
                    <form autocomplete="off" id="userloginSection">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control emailValue" placeholder="Email/Mobile"
                                id="emailValue" name="emailValue" data validations="emailValue" required="required">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                        </div>
                        <!--  <div class="form-group has-feedback">
            <input type="password" class="form-control passwordValue" placeholder="Password"  id="password"name="password" data-validation="password" required="required">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>-->
                        <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control passwordValue" placeholder="Password"
                                id="password" name="password" data-validation="password" required="required">
                            <div class="input-group-addon">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="row mtop">
                            <div class="col-xs-8">
                                <span class="erroruser" style="display:none; color: red;">Invalid username or
                                    password.</span>
                                <div class="checkbox icheck" style="display: none;">
                                    <label>
                                        <input type="checkbox"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-8 fr">
                                <a href="" class="fr">
                                    <button type="submit" class="btn btn-info  btn-flat f-submitBtn">Sign In</button>
                                </a>
                                <a href="userlogin" class="fr">
                                    <button type="button" class="btn btn-flat f-submitBtn">BACK</button>
                                </a>
                                <br /><br /><br />
                            </div>
                            <!-- /.col -->

                        </div>
                    </form>
                    <div class="social-auth-links text-center" style="display: none;">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i
                                class="fa fa-facebook"></i> Sign in using
                            Facebook</a>
                        <a class="btn btn-block btn-social btn-google btn-flat gmailbtn"><i
                                class="fa fa-google-plus"></i> Sign in using
                            Google+</a>
                    </div>
                    <!-- /.social-auth-links -->
                    <a href="<?php echo base_url(); ?>forgotpassword">I forgot my password</a><br>
                    <a href="<?php echo base_url(); ?>register" class="text-center">Register a new membership</a>

                </div>

                <!-- Mobile Number Section -->

                <div class="enterMOBILESection" style="display: none;">
                    <h1>Login with using Mobile No.</h1>
                    <form autocomplete="off" id="moblieSection">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control mobilenumberValue" placeholder=" Enter mobile number"
                                id="mobilenumber" name="mobilenumber" data validations="mobilenumber">
                            <span class="mobilenumbererror" style="display: none; color: red;">Please enter mobile
                                number.</span>
                            <span class="mobileerror" style="display: none; color: red;">Please enter valid mobile
                                number.</span>
                        </div>



                        <div class="form-group has-feedback enterotpSection" style="display: none;">
                            <input type="" class="form-control otpValue" placeholder="Enter mobile OTP" id="otpValue"
                                name="otpValue" data-validation="otpValue" required="required">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            <span class="otperror" style="display: none; color: red;">Please enter OTP.</span>
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="checkbox icheck" style="display: none;">
                                    <label>
                                        <input type="checkbox"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-6">

                                <button type="submit" class="btn btn-primary btn-block btn-flat otpbtn">Send OTP to
                                    Login</button>




                                <button type="button" class="btn btn-primary btn-block btn-flat showloginBtn"
                                    style="display: none;">Login with OTP</button>


                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <div class="social-auth-links text-center" style="display: none;">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i
                                class="fa fa-facebook"></i> Sign in using
                            Facebook</a>
                        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i
                                class="fa fa-google-plus"></i> Sign in using
                            Google+</a>
                    </div>
                    <!-- /.social-auth-links -->

                    <a href="<?php echo base_url(); ?>forgotpassword">I forgot my password</a><br>
                    <a href="<?php echo base_url(); ?>register" class="text-center">Register a new membership</a>
                </div>



            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <div class="modal modal-warning fade" id="modal-gmailUserError">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <p id="text1">Email already registered.Please use your password to continue.</p>
                    </div>
                    <div class="modal-footer">
                        <div align="right">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"
                                id="highest">Close</button>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal modal-warning fade" id="modal-moblie">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Oops!</h4>
                    </div>
                    <div class="modal-body">
                        <p>Please Enter Your Registered Mobile Number.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- iCheck -->
    </div>
</div>
<div class="clear"></div>
<!--<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>-->
<script>
$(document).ready(function() {
    /*
     setTimeout(function(){
        $(".loadingSec").show(); 
        checkCookie();
        $(".loadingSec").hide();
      }, 1000);
      */
});
</script>
<script>
$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("fa-eye-slash");
            $('#show_hide_password i').removeClass("fa-eye");
        } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("fa-eye-slash");
            $('#show_hide_password i').addClass("fa-eye");
        }
    });
});
</script>
<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
<meta name="google-signin-client_id" content="913092980453-4dqej3qkl7rke1631rcu9s4bfvesu9hj.apps.googleusercontent.com">
<?php include 'footer.php';?>

------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------














<?php include 'header1.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="beforeLoginContentWrapper">
    <div class="col-xs-12 leftBoxStyles">
        <div class="login-box">
            <div class="login-box-body">
                <!-- first Login Section -->
                <div class="firstLoginSection" style="display: none">
                    <!-- /.login-logo -->
                    <h1 class="userLoginH1">User Login</h1>
                    <div class="btnvalue">
                        <button type="submit" class="btn btn-primary btn-block btn-flat form-control emailbtnValue">
                            <i aria-hidden="true"></i> Login with Email or Mobile
                        </button>

                        <p class="text-center">- OR -</p>
                        <button type="submit" class="btn btn-primary btn-block btn-flat form-control  mobilebtnValue">
                            <i class="fa fa-mobile" aria-hidden="true"></i>
                            Login Using Mobile OTP
                        </button>

                        <p class="text-center"><br /><br /><b>NEW USER?</b></p>
                        <a href="<?php echo base_url(); ?>register">
                            <button type="submit" class="btn btn-success btn-block btn-flat form-control">
                                REGISTER NOW
                            </button>
                        </a>
                    </div>
                </div>
                <!-- first Login Section Ends-->
                <!-- Email Section -->

                <div class="enterUSERLOGINSection">
                    <h1>Log In to OxyLoans</h1><br />
                    <form autocomplete="off" id="userloginSection">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control emailValue imdFgW" placeholder="Email/Mobile"
                                id="emailValue" name="emailValue" data validations="emailValue" required="required">
                            <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->

                        </div>
                        <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control passwordValue" placeholder="Password"
                                id="password" name="password" data-validation="password" required="required">
                            <div class="input-group-addon">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="row mtop">
                            <div class="col-xs-8">
                                <span class="erroruser" style="display:none; color: red;">Invalid username or
                                    password.</span>
                                <div class="checkbox icheck" style="display: none;">
                                    <label>
                                        <input type="checkbox"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-8 fr">
                                <a href="" class="fr">
                                    <button type="submit" class="btn btn-info  btn-flat f-submitBtn">Sign In</button>
                                </a>
                                <a href="userlogin" class="fr">
                                    <button type="button" class="btn btn-flat f-submitBtn">BACK</button>
                                </a>
                                <br /><br /><br />
                            </div>
                            <!-- /.col -->

                        </div>
                    </form>
                    <div class="social-auth-links text-center" style="display: none;">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i
                                class="fa fa-facebook"></i> Sign in using
                            Facebook</a>
                        <a class="btn btn-block btn-social btn-google btn-flat gmailbtn"><i
                                class="fa fa-google-plus"></i> Sign in using
                            Google+</a>
                    </div>
                    <!-- /.social-auth-links -->
                    <a href="<?php echo base_url(); ?>forgotpassword">I forgot my password</a><br>
                    <a href="<?php echo base_url(); ?>register" class="text-center">Register a new membership</a>

                </div>

                <!-- Mobile Number Section -->

                <div class="enterMOBILESection" style="display: none;">
                    <h1>Login with using Mobile No.</h1>
                    <form autocomplete="off" id="moblieSection">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control mobilenumberValue" placeholder=" Enter mobile number"
                                id="mobilenumber" name="mobilenumber" data validations="mobilenumber">
                            <span class="mobilenumbererror" style="display: none; color: red;">Please enter mobile
                                number.</span>
                            <span class="mobileerror" style="display: none; color: red;">Please enter valid mobile
                                number.</span>
                        </div>



                        <div class="form-group has-feedback enterotpSection" style="display: none;">
                            <input type="" class="form-control otpValue" placeholder="Enter mobile OTP" id="otpValue"
                                name="otpValue" data-validation="otpValue" required="required">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            <span class="otperror" style="display: none; color: red;">Please enter OTP.</span>
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="checkbox icheck" style="display: none;">
                                    <label>
                                        <input type="checkbox"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-6">

                                <button type="submit" class="btn btn-primary btn-block btn-flat otpbtn">Send OTP to
                                    Login</button>




                                <button type="button" class="btn btn-primary btn-block btn-flat showloginBtn"
                                    style="display: none;">Login with OTP</button>


                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <div class="social-auth-links text-center" style="display: none;">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i
                                class="fa fa-facebook"></i> Sign in using
                            Facebook</a>
                        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i
                                class="fa fa-google-plus"></i> Sign in using
                            Google+</a>
                    </div>
                    <!-- /.social-auth-links -->

                    <a href="<?php echo base_url(); ?>forgotpassword">I forgot my password</a><br>
                    <a href="<?php echo base_url(); ?>register" class="text-center">Register a new membership</a>
                </div>



            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <div class="modal modal-warning fade" id="modal-gmailUserError">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <p id="text1">Email already registered.Please use your password to continue.</p>
                    </div>
                    <div class="modal-footer">
                        <div align="right">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"
                                id="highest">Close</button>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal modal-warning fade" id="modal-moblie">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Oops!</h4>
                    </div>
                    <div class="modal-body">
                        <p>Please Enter Your Registered Mobile Number.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- iCheck -->
    </div>
</div>
<div class="clear"></div>
<!--<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>-->
<script>
$(document).ready(function() {
    /*
     setTimeout(function(){
        $(".loadingSec").show(); 
        checkCookie();
        $(".loadingSec").hide();
      }, 1000);
      */
});
</script>
<script>
$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("fa-eye-slash");
            $('#show_hide_password i').removeClass("fa-eye");
        } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("fa-eye-slash");
            $('#show_hide_password i').addClass("fa-eye");
        }
    });
});
</script>
<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
<meta name="google-signin-client_id" content="913092980453-4dqej3qkl7rke1631rcu9s4bfvesu9hj.apps.googleusercontent.com">
<?php include 'footer.php';?>