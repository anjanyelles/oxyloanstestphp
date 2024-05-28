<?php include 'header1.php';?>
<?php
$lenderuniquenumber =  isset($_GET['id']) ? $_GET['id'] : '0';
$lenderUserId =  isset($_GET['plid']) ? $_GET['plid'] : '0';
$timeInMilliSeconds =  isset($_GET['time']) ? $_GET['time'] : '0';
?>
<script type='text/javascript'
    src='https://platform-api.sharethis.com/js/sharethis.js#property=60992a3f18d187001189f084&product=sop'
    async='async'></script>
<div class="beforeLoginContentWrapper">
    <div class="col-xs-12 leftBoxStyles">
        <div class="login-box">
            <div class="login-box-body">
                <div class="registrationStep2">
                    <form autocomplete="off" id="userRegisterSectionStep2">
                        <div class="form-Step-1">
                            <h1 class="userLoginH1">
                                Final Step: Complete Registration</h1><br />
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' id="dob" name="dob" class="form-control dob " readonly="readonly"
                                        placeholder="Date of Birth" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control panNumber imdFgW" placeholder="PAN NUMBER"
                                    id="panNumber" name="panNumber" data validations="panNumber" required="required">

                                <span class="error isPanRegister" style="display:none">This PAN number is already
                                    registered with us.</span>
                                <!-- HIDDEN FIELDS -->
                                <input type="text" class="form-control userIDfromBrowser imdFgW"
                                    value="<?php echo $lenderuniquenumber;?>" id="userIDfromBrowser"
                                    name="userIDfromBrowser" data validations="userIDfromBrowser" required="required"
                                    style="display:none" />


                                <input type="text" class="form-control timeInMilliSeconds imdFgW"
                                    value="<?php echo $timeInMilliSeconds;?>" id="timeInMilliSeconds"
                                    name="timeInMilliSeconds" data validations="timeInMilliSeconds" required="required"
                                    style="display:none" />
                                <!-- HIDDEN FIELDS ENDS -->
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="address_user" placeholder="Address"
                                    id="address_user" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <small><i>Agree to our <a href="https://oxyloans.com/terms-and-conditions"
                                            target="_blank">Terms &
                                            Conditions</a> by Clicking Submit</i></small>
                            </div>
                            <div class="col-xs-12 fr">
                                <a href="" class="fr">
                                    <button type="submit" class="btn btn-flat f-submitBtn btn-loginnew">SUBMIT
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

                    <div class="form-Step-2-of-3" style="display: none;">
                        <div class="headSec-NewRegister">
                            <img src="<?php echo base_url(); ?>/assets/images/green-Tick.png" width="60" />
                            <h1>Thank you for registering with us!</h1>
                        </div>
                        <div class="contSec-NewRegister">
                            <span class="mysmtext">
                                Your account is activated.
                                Please login and <b> Lend through OxyLoans</b> to earn more.<br />&nbsp;
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
<div class="modal modal-success fade" id="modal-submissionDone">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Congratulations!</h4>
            </div>
            <div class="modal-body">
                <p class="text-profileCheck">
                    You have sucessfully registered with us!
                </p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-warning fade" id="modal-step2emailAlreadyRegistered">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Email Already registered</h4>
            </div>
            <div class="modal-body">
                <p class="text-profileCheck">
                    you had already verified your email.please login
                </p>
            </div>
            <div class="modal-footer">
                <a href="userlogin">
                    <button type="button" class="btn btn-outline pull-left">LOGIN</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-warning fade" id="modal-sessionEmail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body">
                <p class="text-profileCheck">
                    Email activation link has expired
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" id="getsessionEmail"
                    onClick="getsessionexpiredEmail('<?php echo $lenderuniquenumber;?>');">Resend activation
                    link</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-success fade" id="modal-sessionEmailgetEmail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p class="text-profileCheck">
                    We have sent an activation link to your registered email.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Ok</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
<meta name="google-signin-client_id" content="913092980453-4dqej3qkl7rke1631rcu9s4bfvesu9hj.apps.googleusercontent.com">


<script>
$(function() {
    $('#datetimepicker1 input').datepicker({
        dateFormat: 'dd/mm/yy',
        yearRange: "-100:-18",
        clickInput: true,
        changeMonth: true,
        changeYear: true,
        maxDate: "-18Y",
        //Will only allow the selection of dates more than 18 years ago, useful if you need to restrict this
        minDate: "-100Y"
    });
});
</script>



<?php include 'footer.php';?>