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
                        <div class="form-group has-feedback" id="show_hide_password">
                            <input type="password" class="form-control passwordValue imdFgW" placeholder="Password"
                                id="password" name="password" data-validation="password" required="required">
                            <span class="logOTP">
                                <a href="#" class="mobilebtnValue">
                                    Login with OTP
                                </a>
                            </span>
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
                            <div class="col-xs-12 fr">
                                <a href="" class="fr">
                                    <button type="submit" class="btn btn-flat f-submitBtn btn-loginnew">Sign In
                                        <span class="displayScreenFlowArw filler">&rarr;</span>
                                        <span class="displayScreenFlowRefresh filler" style="display: none;">
                                            <svg class="spinner" width="18px" height="20px" viewBox="0 0 66 66"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle class="path" fill="none" stroke-width="6" stroke-linecap="round"
                                                    cx="33" cy="33" r="30" style="color:#FFFFFF"></circle>
                                        </span>
                                    </button>
                                </a>
                            </div>

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

                    <div class="forgotpwdN">
                        <a href="<?php echo base_url(); ?>forgotpassword">Forgotten password?</a>
                    </div>

                    <div class="i_registerPN">
                        <a href="<?php echo base_url(); ?>register" class="text-center">Register with us</a>
                    </div>

                    <!-- /.social-auth-links -->
                    <div class="row">


                    </div>

                </div>

                <!-- Mobile Number Section -->

                <div class="enterMOBILESection" style="display: none;">
                    <h1>Login with OTP</h1>
                    <br />
                    <form autocomplete="off" id="moblieSection">

                        <div class="form-group has-feedback">
                            <input type="text" class="form-control mobilenumberValue imdFgW"
                                placeholder=" Enter mobile number" id="mobilenumber" name="mobilenumber" data
                                validations="mobilenumber">
                            <span class="mobilenumbererror" style="display: none; color: red;">Please enter mobile
                                number.</span>
                            <span class="mobileerror" style="display: none; color: red;">Please enter valid mobile
                                number.</span>
                        </div>



                        <div class="form-group has-feedback enterotpSection" style="display: none;">
                            <input type="" class="form-control otpValue imdFgW" placeholder="Enter mobile OTP"
                                id="otpValue" name="otpValue" data-validation="otpValue" required="required">

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
                            <div class="col-md-12">
                                <button type="submit"
                                    class="btn btn-primary btn-block btn-flat otpbtn  btn-loginnew">Send OTP to
                                    Login</button>
                                <button type="button"
                                    class="btn btn-primary btn-block btn-flat showloginBtn btn-loginnew"
                                    style="display: none;">LOGIN</button>
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

                    <div class="forgotpwdN">
                        <a href="<?php echo base_url(); ?>forgotpassword">Forgotten password?</a>
                    </div>

                    <div class="i_registerPN">
                        <a href="<?php echo base_url(); ?>register" class="text-center">Register as a New Member</a>
                    </div>
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