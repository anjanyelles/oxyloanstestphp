<?php include 'header1.php';?>
<!-- wrapper starts -->
<?php
   $urlfromBroweser = $_SERVER['REQUEST_URI'];
  //echo $urlfromBroweser;
  $lenderuniquenumber =  isset($_GET['ref']) ? $_GET['ref'] : '0';
  $lendermobileNumber =  isset($_GET['mobileNumber']) ? $_GET['mobileNumber'] : '';
  $lenderemail =  isset($_GET['email']) ? $_GET['email'] : '';
   $utmValue =  isset($_GET['utm']) ? $_GET['utm'] : 'WEB';
?>

<div class="">

    <!-- Header Starts -->

    <!-- Header ends -->

    <!-- maincontent starts -->


    <div class="main-cont">
        <div class="container">
            <div class="middle-block">
                <div class="form-block1 block-loan">
                    <div class="row">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-10">
                            <h3 style="color:#149bd7;">Register as a NRI Lender</h3>
                            </center>
                        </div>
                        <div class="col-xs-1"></div>
                    </div>
                    <br /><br />
                    <form id="lenderNRImobileSection" autocomplete="off" method="post">
                        <div class="lenderstep1">
                            <div class="form-lft">
                                <label for="first name">First Name<i>*</i></label>
                                <div class="fld-block">
                                    <input type="text" id="lenderfirstname" name="lenderfirstname" class="text-fld1"
                                        placeholder="First Name as per PAN card"> <!-- UTM Value -->
                                    <input type="hidden" id="utmSource" name="utmSource" class="text-fld1"
                                        value="<?php echo$utmValue?>" placeholder="First Name as per PAN card">
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="form-lft">
                                <label>Email<i>*</i></label>
                                <div class="fld-block">
                                    <input type="email" placeholder="Enter your email" id="lenderemail"
                                        name="lenderemail" class="text-fld1">
                                    <input type="hidden" id="lenderunique" name="lenderunique" class="text-fld1"
                                        value="<?php echo $lenderuniquenumber;?>"
                                        placeholder="First Name as per PAN card">

                                    <span class="error emailValue-error" style="display: none;">Registation already done
                                        using this email.</span>

                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="form-lft">
                                <label>Mobile No<i>*</i></label>
                                <div class="fld-block">
                                    <input id="lmobileNumber" class="form-control" name="lmobileNumber" type="tel">
                                    <!-- <button class="btn btn-success btn-md">OTP</button> -->

                                    <span class="error mobileError_Message" style="display: none;">Registation already
                                        done using this mobile number.</span>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>


                            <div class="form-lft">
                                <label for="pin code" id="labelpincode">password <i>*</i></label>
                                <div class="fld-block">
                                    <input type="password" placeholder="Enter your  password" id="lenderNRIpassword"
                                        name="lenderNRIpassword" class="text-fld1">
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>




                            <div class="clear"></div>
                            <button type="button col-xs-12" class="f-submitBtn btn btn-flat btn-frwd"
                                data-toggle="modal" data-target="#myModal"><img data-toggle="tooltip" title="Next"
                                    src="<?php echo base_url(); ?>assets/images/arrow.png" alt="arrow"></button>
                            <a href="register" class="btn-back" data-toggle="tooltip" title="Back">
                                <button type="button" class="btn btn-flat f-submitBtn">
                                    <img src="<?php echo base_url(); ?>assets/images/left_arrow.png" alt="left_arrow">
                                </button>
                            </a>
                            <div class="clear"></div>
                        </div>
                    </form>

                    <form id="lenderemailSection" autocomplete="off" method="post">
                        <div class="lenderstep2" style="display: none">
                            <div class="headSec-NewRegister">
                                <img src="<?php echo base_url(); ?>/assets/images/green-Tick.png" width="60" />
                                <h4>Thank you for registering with us!</h4>
                            </div>
                            <div class="contSec-NewRegister">
                                <span class="mysmtext">
                                    We have sent you an e-mail with the activation link. Please check your email and
                                    activate your
                                    <b>OxyLoans</b> account to strat <b>Lend</b>.
                                </span>
                            </div>
                            <div class="footer-NewRegister footer-NewRegister_step3">
                                <!-- ShareThis BEGIN -->
                                <div class="sharethis-inline-follow-buttons"></div>
                                <!-- ShareThis END -->
                            </div>

                            <div class="clear"></div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal modal-warning fade" id="modal-mobileerror">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body">
                <p>The mobile has already been registered. Please Login.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right loginbtn" data-dismiss="modal">Login</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-warning fade" id="modal-emailerror">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body">
                <p>This Email is already exists,Please <a href="<?php echo base_url(); ?>userlogin"><b>Signin</b></a>OR
                    Try another Email.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-danger fade" id="modal-emailSentAlready">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">You have already <b>Registered</b> with us.</h4>
            </div>
            <div class="modal-body">
                <p class="text-profileCheck">
                    You have already registered with us!
                    <br /><br /> We have sent you an email with the activation link.
                    Please activate and proceed.
                </p>
            </div>
            <div class="modal-footer">
                <span class="pull-left displayEmailText" style="display: none;">
                    <b>We've sent an activation link to <span class='myprevRegEmailId'></span></b>
                </span>
                <button type="button" class="btn btn-outline pull-right sendActivationLink" href="userlogin"
                    data-userID="">Re-Send Activation Link</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal modal-warning fade" id="modal-emailAlreadyRegistered">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Email Already registered</h4>
            </div>
            <div class="modal-body">
                <p class="text-profileCheck">
                    Email is already registered, Please entere other email id.
                </p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-info fade" id="modal-emailerror">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body">
                <p>This Email ID is already register Please Enter New Email ID.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left " data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-success fade" id="modal-activateUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p><b>Now, </b>Your account is activated and password has been set. Please login.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<div class="modal modal-success fade" id="modal-RegisterSuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Congratulations!</h4>
            </div>
            <div class="modal-body">
                <p>Thanks for registering with OxyLoans.com! We've sent an email inbox/spam to activate your account.
                    Please login and check your account to activate.</p>
            </div>
            <div class="modal-footer">
                <a href="/user/login">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- iCheck -->
<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>








<!-- container ends -->
<!-- wrapper ends -->
<!-- SET: SCRIPTS -->



<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/selectize.default.css?oxyloans=<?php echo time(); ?>">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dd.css?oxyloans=<?php echo time(); ?>">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css?oxyloans=<?php echo time(); ?>">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css?oxyloans=<?php echo time(); ?>">

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<script src="<?php echo base_url(); ?>assets/js/moment.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/myscript.js?oxyloans=<?php echo time(); ?>"></script>

<script src="<?php echo base_url(); ?>assets/js/animation.js?oxyloans=<?php echo time(); ?>"></script>

<script src="<?php echo base_url(); ?>assets/js/selectize.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dd.js?oxyloans=<?php echo time(); ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- END: SCRIPTS -->

<script>
$(function() {
    $("#dob").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1900:2019",
        dateFormat: "dd/mm/yy"
    });
});
</script>



<style type="text/css">
.lbchkbox label {
    font-style: 0px;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    // ("#lmobileNumber").val("<?php echo $lendermobileNumber?>");
    // $("#lenderemailValue").val("<?php echo $lenderemail?>");
    var input = document.querySelector("#lmobileNumber");
    window.intlTelInput(input, {
        utilsScript: "build/js/utils.js",
        separateDialCode: true,
        hiddenInput: "full",
        preferredCountries: ["us"],
    });
    $("meta[property='og\\title']").attr("content",
        "Peer to Peer Lending platform || OxyLoans || NRI Registration");
});
</script>
<style type="text/css">
#lmobileNumber {
    width: 100%;
}

.iti {
    width: 100%;
}
</style>
<?php include 'footer.php';?>