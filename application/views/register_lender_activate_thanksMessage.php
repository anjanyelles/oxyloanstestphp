<?php include 'header1.php';?>

<script type='text/javascript'
    src='https://platform-api.sharethis.com/js/sharethis.js#property=60992a3f18d187001189f084&product=sop'
    async='async'></script>

<div class="beforeLoginContentWrapper thxPage">
    <div class="col-xs-12 leftBoxStyles">
        <div class="login-box">
            <div class="login-box-body">
                <div class="registrationStep2">
                    <div class="form-Step-2-of-3">
                        <div class="headSec-NewRegister">
                            <img src="<?php echo base_url(); ?>/assets/images/green-Tick.png" width="60" />
                            <h1>Thank you for registering with us!</h1>
                        </div>
                        <div class="contSec-NewRegister">
                            <span class="mysmtext">

                                Your account has been activated. Please log in to OxyLoans to <b> lend/borrow </b> and
                                earn higher returns. <br />

                                &nbsp;
                            </span>
                            <div>
                                <a href="userlogin">
                                    <button type="button"
                                        class="btn btn-flat f-submitBtn btn-loginnew nbrd btn-loginnew-verify">Login
                                        <span class="displayScreenFlowArw-2 filler">&rarr;</span>
                                    </button>
                                </a>
                            </div>
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
<script>
$(function() {
    $('#datetimepicker1').datetimepicker();
});
$(function() {
    $('#datetimepicker1 input').datepicker({
        format: "dd/mm/yyyy",
        maxDate: '-18Y',
    });
});
</script>
<?php include 'footer.php';?>