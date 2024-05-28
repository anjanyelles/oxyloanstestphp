<?php include 'header1.php';?>
<?php 
 $userType =  isset($_GET['userType']) ? $_GET['userType'] : 'Lending';
?>
<script type='text/javascript'
    src='https://platform-api.sharethis.com/js/sharethis.js#property=60992a3f18d187001189f084&product=sop'
    async='async'></script>
<div class="beforeLoginContentWrapper">
    <div class="col-xs-12 leftBoxStyles">
        <div class="login-box">
            <div class="login-box-body">
                <div class="registrationStep1">

                    <div class="form-Step-1-of-3">
                        <div class="headSec-NewRegister">
                            <img src="<?php echo base_url(); ?>/assets/images/green-Tick.png" width="60" />
                            <h1>
                                You are one step away from completing registration.</h1>
                        </div>
                        <div class="contSec-NewRegister">
                            <span class="mysmtext">
                              <b>  An activation link has been sent to your registered e-mail.</b> Please check your inbox and
                                activate your
                                <b>OxyLoans</b> account to start <span class="reg_Userb_type"
                                    value="<?php echo $userType;?>"><b><?php echo $userType;?></b></span>
                            </span>
                        </div>
                        <div class="footer-NewRegister footer-NewRegister_step3">
                            <!-- ShareThis BEGIN -->
                            <div class="sharethis-inline-follow-buttons"></div>
                            <!-- ShareThis END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
<meta name="google-signin-client_id" content="913092980453-4dqej3qkl7rke1631rcu9s4bfvesu9hj.apps.googleusercontent.com">
<?php include 'footer.php';?>