<?php include 'header1.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="beforeLoginContentWrapper">
    <div class="col-xs-12 leftBoxStyles">
        <div class="login-box">
            <!-- /.login-logo -->
            <!-- <h1 class="userLoginH1">User Login</h1> -->
            <div class="login-box-body">
                <div class="btnvalue">
                    <!--  <button type="submit" class="btn btn-primary btn-block btn-flat form-control emailbtnValue">
           <i aria-hidden="true"></i> Login with Email or Mobile
         </button> -->

                    <!-- <p class="text-center"  >- OR -</p> -->
                    <!-- <button type="submit" class="btn btn-primary btn-block btn-flat form-control  mobilebtnValue" >
           <i class="fa fa-mobile" aria-hidden="true"></i>
            Login Using Mobile OTP
          </button>
 -->
                    <p class="text-center"><br /><br /><b>NEW USER? <a href="#" onclick="signOut();"
                                style="text-align: center">Sign out</a></b></p>

                    <!--  <a href="<?php echo base_url(); ?>register">
          <button type="submit" class="btn btn-success btn-block btn-flat form-control" >
           REGISTER NOW 
        </button>
        </a> -->
                    <!-- 
        <p class="text-center"  >- OR -</p> -->
                    <div class="row">


                        <div class="col-md-6">

                            <div class="g-signin2" data-onsuccess="onSignIn" data-width="200" data-height="32"
                                data-longtitle="true" theme="dark"></div>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-block btn-social btn-facebook  col-md-6"
                                scope="public_profile,email" onclick="fbLogin();" id="fbLink">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                Sign in with Facebook
                            </button>

                        </div>

                    </div>

                </div>






            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->


        <!-- iCheck -->
    </div>
</div>
<div class="clear"></div>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="913092980453-4dqej3qkl7rke1631rcu9s4bfvesu9hj.apps.googleusercontent.com">


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


<script type="text/javascript" src="https://otpless.com/auth.js"></script>
<!-- Get user's whatsapp number and name -->
<script type="text/javascript">
function otpless(otplessUser) {
    alert(JSON.stringify(otplessUser));
}
</script>

<script>
function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}
</script>

<script>
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function() {
        console.log('User signed out.');
    });
}
</script>

<!-- 
 <script type="text/javascript" src="https://otpless.com/auth.js"></script>
<script type="text/javascript">
  function otpless(otplessUser) {
   Otplessintegration(otplessUser);
}
</script>  -->

<?php include 'footer.php';?>