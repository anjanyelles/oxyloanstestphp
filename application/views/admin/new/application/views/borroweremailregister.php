<?php include 'header1.php';?>
<!-- wrapper starts -->

<?php 
  $borroweruniquenumber =  "0";
  $borrowerUserId =  isset($_GET['plid']) ? $_GET['plid'] : '0';
?>

<div class="">

    <!-- Header Starts -->

    <!-- Header ends -->

    <!-- maincontent starts -->


    <div class="main-cont">
        <div class="container">
            <div class="middle-block">
                <div class="form-block1 block-loan">
                    <center>
                        <h3 style="color:#149bd7; ">Register as a Borrower</h3>
                    </center><br>

                    <form id="borroweremailSection" autocomplete="off" method="post">
                        <div class="step2">
                            <div class="form-lft">
                                <label>Email ID<i>*</i></label>
                                <div class="fld-block verify_block">
                                    <input type="hidden" id="bmobileNumber" name="bmobileNumber">
                                    <input type="email" placeholder="E-mail..." name="emailValue" id="emailValue"
                                        class="text-fld text-fld1">

                                    <input type="hidden" id="buniquenumber" name="bunique" class="text-fld1"
                                        value="<?php echo $borroweruniquenumber;?>"
                                        placeholder="First Name as per PAN card">
                                    <div class="clear"></div>
                                    <div class="verify_btn">
                                        <!--<img src="<?php echo base_url(); ?>assets/images/verify.png" alt="arrow" id="emailverifybutton">-->
                                        <button type="button" class="btn  btn-success btn-textchangeforemail"
                                            id="emailverifybutton">
                                            <span>Send OTP</span></button>
                                        <span class="sucessotp" id="sucessotp"
                                            style="display:none; color: green;"><b>OTP sent</b></span>

                                    </div>
                                    <div class="clear"></div>
                                    <label id="emailerror"
                                        style="color:red; font-size:11px; width:100%; display:none;">please enter your
                                        email id</label>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="form-lft">
                                <label>OTP<i>*</i></label>
                                <div class="fld-block">
                                    <input type="text" placeholder="OTP" name="emailotpvalue" id="emailotpvalue"
                                        class="text-fld text-fld1">
                                    <span class="errorotp" style="display:none; color: red;">Invalid OTP value please
                                        check.</span>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="form-lft">
                                <label>Password<i>*</i></label>
                                <div class="fld-block">
                                    <input type="password" placeholder="password" name="password" id="password"
                                        class="text-fld text-fld1"
                                        onblur="if(this.value == '') { this.value='password'}"
                                        onfocus="if (this.value == 'password') {this.value=''}">
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="form-lft">
                                <label>Confirm Password<i>*</i></label>
                                <div class="fld-block">
                                    <input type="password" placeholder="password" name="confirmpassword"
                                        id="confirmpassword" class="text-fld text-fld1"
                                        onblur="if(this.value == '') { this.value='password'}"
                                        onfocus="if (this.value == 'password') {this.value=''}">
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="form-lft">
                                <label>Gender<i>*</i></label>
                                <div class="gendar-block">

                                    <label class="redioboxes"><img
                                            src="<?php echo base_url(); ?>assets/images/icon1.png" alt="icon1"
                                            id="maleradio">
                                        <input type="radio" name="gender" value="M" id="genderRadioMale">
                                        <span class="checkmark checkman"></span>
                                        <small>Male</small>
                                    </label>
                                    <label class="redioboxes"><img
                                            src="<?php echo base_url(); ?>assets/images/icon2.png" alt="icon2"
                                            id="femaleradio">
                                        <input type="radio" name="gender" value="F" id="genderRadioFeMale">
                                        <span class="checkmark"></span>
                                        <small>Female</small>
                                    </label>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                            <div class="form-lft" style="margin-top: 70px;">
                                <label>WhatsApp No (Optional)</label>
                                <div class="fld-block">
                                    <div class="input-group">
                                        <div class="whatappNO">
                                            <input type="tel" placeholder="" id="bWhatsappNo" name="bwhatsappNumber"
                                                class="mobile2">
                                        </div>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-success btn-textchangeforwhatsapp"
                                                id="borrowerStep2whatsappverification">Send OTP</button>
                                        </span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <span class="whatsnoerror" style="display:none; color: red;">Please Enter Whatsapp
                                    Mobile Number</span>
                                <input type="hidden" name="country" id="code">
                                <input type="hidden" name="country" id="borrwerIdStep2"
                                    value="<?php echo $borrowerUserId;?>">
                                <div class="clear"></div>
                            </div>
                            <div class="form-lft bwhatsappOtpHide" style="display: none;">
                                <label>WhatsApp OTP</label>
                                <div class="fld-block">
                                    <input type="text" placeholder="WhatsApp OTP" name="bwhatsAppotpvalue"
                                        id="botpvalue" class="text-fld text-fld1">
                                    <span class="errorotp" style="display:none; color: red;">Invalid OTP value please
                                        check.</span>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <button type="button col-xs-12" class="f-submitBtn btn btn-flat btn-frwd"
                                data-toggle="modal" data-target="#myModal"><img data-toggle="tooltip" title="Next"
                                    src="<?php echo base_url(); ?>assets/images/arrow.png" alt="arrow"></button>
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
// if(getCookie("smbl")=="" || getCookie("smbl")=='undefined'){
//  window.location = "userlogin";
// }else{
// $("#bmobileNumber").val(getCookie("smbl")); 
// writeCookie('smbl', 'undefined');
// }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    var input = document.querySelector("#bWhatsappNo");
    window.intlTelInput(input, {
        utilsScript: "build/js/utils.js",
        separateDialCode: true,
        hiddenInput: "full",
        preferredCountries: ["in"],
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

<style type="text/css">
.lbchkbox label {
    font-style: 0px;
}
</style>
<?php include 'footer.php';?>