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
                <!-- firs t Login Section Ends-->
                <!-- Email Section -->
                <div class="enterUSERLOGINSection">
                    <h1>Login to OxyLoans</h1><br />
                    <form autocomplete="off" id="userloginSection">

                        <div class="login-box-modal">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control emailValue imdFgW"
                                    placeholder="Email or phone number" id="emailValue" name="emailValue" data
                                    validations="emailValue" required="required">
                                <span class="error useremailError" style="display:none;">Enter your registered phone
                                    number or email address here</span>
                            </div>
                            <div class="has-feedback" id="show_hide_password">
                                <input type="password" class="form-control passwordValue imdFgW" placeholder="Password"
                                    id="password" name="password" data-validation="password" required="required">
                                <a><i class="fa fa-eye-slash fa-1x hiddeneye"></i></a>
                                <span class="error userpasswordError" style="display:none;">Please enter a valid
                                    password.</span>



                                <span class="logOTP">
                                    <a href="#" class="mobilebtnValue">
                                        Login with OTP
                                    </a>
                                </span>
                            </div>
                            <div class="row mtop">
                                <div class="col-xs-12">

                                    <span class="erroruser" style="display:none; color: red;">Invalid username or
                                        password.
                                    </span>

                                    <p class="notverified" style="display:none; color: red;">Your email is not verified,
                                        so
                                        we have sent an email activation link to <span
                                            class="useremailtoverify"></span>&nbsp;(<a class="sendActiveOnEmail"
                                            href="#">Change Email</a> )</p>


                                    <p class="sentemailActivation" style="display:none; color: green;">so
                                        We have sent an email activation link to the given email </p>

                                    <div class="checkbox icheck" style="display: none;">
                                        <label>
                                            <input type="checkbox"> Remember Me
                                        </label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-xs-12 fr">
                                    <a href="" class="fr">
                                        <button type="submit" class="btn btn-flat f-submitBtn btn-loginnew"
                                            id="userloginNewSection">Sign In
                                            <span class="displayScreenFlowArw filler">&rarr;</span>
                                            <span class="displayScreenFlowRefresh filler" style="display: none;">
                                                <svg class="spinner" width="18px" height="20px" viewBox="0 0 66 66"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle class="path" fill="none" stroke-width="6"
                                                        stroke-linecap="round" cx="33" cy="33" r="30"
                                                        style="color:#FFFFFF"></circle>
                                            </span>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="whatAppOtpBlock" style="display:none">
                            <div class="form-group has-feedback">

                                <div>
                                <input type="tel" name="" id="whatsappNumber" name="whatsappLoginNumber">
                                <span class="error whatsapplogInOtp" style="display:none;">Enter WhatsApp
                                    number</span>
                                </div>


                                <div class="" id="mappeduserslect" style="display:none;margin: 19px 0px 12px 0px !important;">
                                    <select class="form-control emailValue imdFgW" id="whatsappmappedUsersId" style="padding:0!important; "></select>

                                </div>

                                <div>
                                <input type="text" class="form-control emailValue imdFgW" id="whatsappOtpNumber"
                                    name="registerWhatsapp" placeholder="WhatsApp Otp" validations="whatsAppValue"
                                    required="required" style="display:none; margin: 5px 0px 10px 0px !important;">
                                    <span class="error whatsapplogInOtperror" style="display:none;">Enter WhatsApp
                                    OTP</span>

                                  </div>

                                <div class="col-xs-12 fr" id="whatsappOtpBlock">
                                    <button type="button" class="btn btn-flat f-submitBtn btn-loginWhatsApp"
                                        id="getWhatsAppLogin">Get OTP
                                        <span class="displayScreenFlowArw filler">&rarr;</span>
                                        <span class="displayScreenFlowRefresh filler" style="display: none;">
                                            <svg class="spinner" width="18px" height="20px" viewBox="0 0 66 66"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle class="path" fill="none" stroke-width="6" stroke-linecap="round"
                                                    cx="33" cy="33" r="30" style="color:#FFFFFF"></circle>
                                        </span>
                                    </button>

                                </div>


                                <div class="col-xs-12 fr" id="whatsLoginDiv" style="display:none">
                                    <button type="button" class="btn btn-flat f-submitBtn btn-loginWhatsApp"
                                        id="whatsLoginDivsignIn">Sign-In
                                        <span class="displayScreenFlowArw filler">&rarr;</span>
                                        <span class="displayScreenFlowRefresh filler" style="display: none;">
                                            <svg class="spinner" width="18px" height="20px" viewBox="0 0 66 66"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle class="path" fill="none" stroke-width="6" stroke-linecap="round"
                                                    cx="33" cy="33" r="30" style="color:#FFFFFF"></circle>
                                        </span>
                                    </button>

                                </div>
                                </br></br>

                            </div>

                        </div>


                    </form>
                    <div class="social-auth-links text-center">
                        <center>
                            <p>- OR -</p>

                            <button id="whatsAppLogin"
                                class="btn btn-block btn-social btn-whatsApp btn-flat  text-white">
                                <i class="fa fa-whatsapp text-center" style="padding:4px"></i> Sign in using
                                WhatsApp
                            </button>


                            <button id="credential_Login"
                                class="btn btn-block btn-social btn-google btn-flat  text-white signwith_cred">
                                <i class="fa fa-lock text-center" style="padding:4px"></i> Sign in with Credentials
                            </button>


                        </center>

                    </div>
                    <div class="forgotpwdN">
                        <a class="pull-left" href="<?php echo base_url(); ?>forgotpassword">Forgotten password?</a>

                        <a class="pull-right" href="https://www.oxyloans.com/new/partnerLogin">Partner
                            Login</a><br />&nbsp;
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

                        <p class="notverified" style="display:none; color: red;">Your email is not verified, so we have
                            sent an email activation link to <span class="useremailtoverify"></span>&nbsp;(<a
                                class="sendActiveOnEmail" href="#">Change Email</a> )</p>

                        <p class="sentemailActivation" style="display:none; color: green;">so
                            We have sent an email activation link to the given email </p>



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

                                <span class="erroruser" style="display:none; color: red;">Invalid username or password.
                                </span>

                                <span class="errorinvalidOtp" style="display:none; color: red;">Invalid OTP value please
                                    check. </span>




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
                        <a href="<?php echo base_url(); ?>register" class="text-center">Register with us</a>
                    </div>
                </div>
                <!--  user email null sections -->
                <div class="enteremailnullSection" style="display: none;">
                    <h1>Enter the Email</h1>
                    <br />
                    <form autocomplete="off" id="enteredemailnullSection">
                        <input type="hidden" name="nulluserId" id="getnullUserId">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control enteremailid imdFgW" placeholder=" Enter your email"
                                id="nullUseremail" name="emailnullValue" data validations="emailValue">

                            <span class="nullEmailRegistered" style="display: none; color: red;">Registation already
                                done using this email</span>
                        </div>
                        <div class="col-xs-12 fr">
                            <a href="" class="fr">
                                <button type="submit" class="btn btn-flat f-submitBtn btn-loginnew">Submit
                                    <span class="displayScreenFlowArw filler">&rarr;</span>
                                    <span class="displayScreeneEmailSection filler" style="display: none;">
                                        <svg class="spinner" width="18px" height="20px" viewBox="0 0 66 66"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle class="path" fill="none" stroke-width="6" stroke-linecap="round"
                                                cx="33" cy="33" r="30" style="color:#FFFFFF"></circle>
                                    </span>
                                </button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <div class="modal  fade" id="modal-resendEmialagain">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update your Email</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <input type="text" value="" placeholder="Enter your Email" name="verifiedUser"
                                id="verifiedUserEmail" style="padding:5px!important">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div align="right">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"
                                id="highest">Close</button>
                            <button type="button" class="btn btn-default btn-sm" id="sendActivationEmail">Send
                                Activation Link</button>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
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



<script type="text/javascript">
$(document).ready(function() {
    var mywnum = document.querySelector("#whatsappNumber");
    window.intlTelInput(mywnum, {
        utilsScript: "build/js/utils.js",
        separateDialCode: true,
        hiddenInput: "full",
        initialCountry: "IN",
        preferredCountries: ["us"],
    });
});
</script>

<style type="text/css">
#whatsappNumber {

    margin: 0 auto !important;
    height: 45px !important;
    width: 100% !important;
    border: 1px solid #ccc !important;
    background-color: #fff !important;
    background-image: none;
    outline: none;

}

.iti {
    width: 100%;
}

</style <script src="https://apis.google.com/js/client:platform.js?onload=renderButton"async defer></script><meta name="google-signin-client_id"content="913092980453-4dqej3qkl7rke1631rcu9s4bfvesu9hj.apps.googleusercontent.com"><?php include 'footer.php';
?>