<?php include 'header1.php';?>

<?php
   $urlfromBroweser = $_SERVER['REQUEST_URI']; 
   $borroweruniquenumber = isset($_GET['ref']) ? $_GET['ref'] : '0';
   $utmValue = isset($_GET['utm']) ? $_GET['utm'] : 'Web';


?>
<div class="">
    <div class="main-cont">
        <div class="container">
            <div class="middle-block">
                <div class="form-block1 block-loan">
                    <center>
                        <h3 style="color:#149bd7;">Register as a Borrower</h3>
                    </center>
                    <div class="newRefBox"
                        style="display:flex; justify-content: center; align-items:center; font-size: 14px; font-family:sans-serif;">

                        We have upgraded the registration. Ask your referee to send the new referral link.




                    </div> </br></br>


                    <form id="borrowermobileSection" autocomplete="off" method="post" style="display:none">
                        <div class="step1">
                            <div class="form-lft">
                                <label for="first name">First Name<i>*</i></label>
                                <div class="fld-block">
                                    <input type="text" id="firstname" name="firstname" class="text-fld1"
                                        placeholder="First Name as per PAN card">
                                    <!-- UTM Value -->
                                    <input type="hidden" id="utmSource" name="utmSource" class="text-fld1"
                                        value="<?php echo $utmValue;?>" placeholder="First Name as per PAN card">
                                    <!--  <input type="hidden" id="userRegisterType" name="userRegusterType" class="text-fld1" value="<?php echo $registerUserType;?>">  -->
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="form-lft">
                                <label>Last Name<i>*</i></label>
                                <div class="fld-block">
                                    <input type="text" placeholder="Last Name as per PAN card" id="lastname"
                                        name="lastname" class="text-fld1">
                                    <input type="hidden" id="buniquenumber" name="bunique" class="text-fld1"
                                        value="<?php echo $borroweruniquenumber;?>"
                                        placeholder="First Name as per PAN card">
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="form-lft">
                                <label>Birth Date<i>*</i></label>
                                <div class="fld-block">
                                    <input type="text" placeholder="dd/mm/yyyy" id="dateofbirth" name="dob"
                                        class="text-fld1">
                                    <i><img src="<?php echo base_url(); ?>assets/images/calender.png" alt="calender"
                                            id=""></i>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="form-lft">
                                <label>Loan Amount<i>*</i></label>
                                <select id="select-beast" class="select1" placeholder="Enter or Select the Amount..."
                                    name="borrowerAmtValue">
                                    <option value="">Enter or Select the Amount...</option>
                                    <option value="10000">10000</option>
                                    <option value="20000">20000</option>
                                    <option value="30000">30000</option>
                                    <option value="40000">40000</option>
                                    <option value="50000">50000</option>
                                    <option value="60000">60000</option>
                                    <option value="70000">70000</option>
                                    <option value="80000">80000</option>
                                    <option value="90000">90000</option>
                                    <option value="100000">100000</option>
                                </select>

                                <div class="clear"></div>
                            </div>

                            <div class="form-lft mar-top16">
                                <label>Mobile No<i>*</i></label>
                                <div class="fld-block">
                                    <em class="mobile1">+91</em>
                                    <div class="mobile22"><input type="text" placeholder="xxx-xxx-xxxx"
                                            id="bmobileNumber" name="bmobileNumber" class="mobile2"></div>
                                    <input type="" style="display: none;" class="form-control borroweruserType"
                                        placeholder="Enter amount" id="borroweruserType" name="borroweruserType"
                                        value="BORROWER">
                                    <div class="verify_btn">
                                        <!--<img src="<?php echo base_url(); ?>assets/images/verify.png" alt="arrow" id="mobileverifybutton"> -->
                                        <button type="button" class="btn  btn-success btn-textchange"
                                            id="mobileverifybutton">
                                            <span>Send OTP</span></button>
                                        <span class="sucessotp" style="display:none; color: green;"><b>OTP
                                                Sent</b></span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="form-lft">
                                <label>OTP<i>*</i></label>
                                <div class="fld-block">
                                    <input type="text" placeholder="OTP" id="otpvalue" name="otpvalue"
                                        class="text-fld1">
                                    <span class="errorotp" style="display:none; color: red;">Invalid OTP value please
                                        check.</span>
                                    <input type="hidden" id="mobilesession">
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>

                            <div class="form-lft">
                                <label for="pin code" id="labelpincode">PIN Code<i>*</i></label>
                                <div class="fld-block">
                                    <input type="text" placeholder="PIN Code" id="pincode" name="pincode"
                                        class="text-fld1">
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="form-lft ">
                                <label>Location<i>*</i></label>
                                <div class="fld-block citydrop">
                                    <select name="locality" id="localityValue" class="form-control">
                                        <option value=""> ---- Select locality ----</option>

                                    </select>

                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>


                            <div class="form-lft form-mob">
                                <label>City<i>*</i></label>
                                <div class="fld-block citydrop">
                                    <select name="city" id="cityValue" class="form-control">
                                        <option value=""> ---- Select City ----</option>
                                        <option value="Hyderabad">Hyderabad</option>
                                        <option value="Bangalore">Bangalore</option>
                                        <option value="Mysore">Mysore </option>
                                        <option value="Mumbai">Mumbai</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Kolkata">Kolkata</option>
                                        <option value="Chennai">Chennai</option>
                                        <option value="Pune">Pune</option>
                                        <option value="Visakhapatnam">Visakhapatnam</option>
                                        <option value="Vijayawada">Vijayawada</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <input type="text" name="others" id="others" placeholder='Enter City'
                                        style='display:none;' />

                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="form-lft form-otp">
                                <label>State</label>
                                <div class="fld-block">
                                    <input type="text" placeholder="State" class="text-fld1" name="stateValue"
                                        id="stateValue" readonly="true">
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
                    <form id="borroweremailSection" autocomplete="off" method="post">
                        <div class="step2" style="display: none;">

                            <div class="form-lft">
                                <label>Email ID<i>*</i></label>
                                <div class="fld-block verify_block">
                                    <input type="email" placeholder="E-mail..." name="emailValue" id="emailValue"
                                        class="text-fld text-fld1">
                                    <div class="verify_btn">
                                        <!-- <img src="<?php echo base_url(); ?>assets/images/verify.png" alt="arrow" id="emailverifybutton"> -->
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
                            <div class="form-lft" style="margin-top: 70px;">
                                <label>WhatsApp No (Optional)
                                </label>
                                <div class="fld-block">
                                    <div class="input-group">
                                        <div class="whatappNO">
                                            <input type="tel" placeholder="" id="bWhatsappNo" name="bwhatsappNumber"
                                                class="mobile2">
                                        </div>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-success btn-textchangeforwhatsapp"
                                                id="whatsappverifybutton">Send OTP</button>
                                        </span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <span class="whatsnoerror" style="display:none; color: red;">Please Enter Whatsapp
                                    Mobile Number</span>
                                <input type="hidden" name="country" id="code">
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