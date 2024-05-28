<?php include 'header1.php';?>
<div class="beforeLoginContentWrapper">
    <div class="beforeChooseOption">
        <div class="row">
            <div class="col-xs-6 leftBorrower">
                <br /><br />
                <div class="col-xs-9 borderBot_Sec">
                    <h1><i class="fa fa-money" aria-hidden="true"></i> Are You Looking for a Loan?</h1>
                    <div>
                        <a href="javascript:void(0)" class="borrowerClick">
                            Register as a Borrower <i class="fa fa-arrow-right"></i><br />
                            <span>
                                <img src="<?php echo base_url(); ?>assets/images/needloan.jpg?oxy=1">
                            </span>
                        </a>
                    </div>

                </div>

            </div>
            <div class="col-xs-6 rightLender">
                <br /><br />
                <div class="col-xs-9 borderBot_Sec">
                    <h1><i class="fa fa-line-chart" aria-hidden="true"></i>
                        Lend and Earn Better Returns?</h1>
                    <div>
                        <a href="javascript:void(0)" class="lenderClick">
                            Register as a Lender <i class="fa fa-arrow-right"></i><br />
                            <span>
                                <img src="<?php echo base_url(); ?>assets/images/giveloan.jpg?oxy=1">
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xs-1"></div>

        </div>
        <small><code>Note: </code>Currently, we are processing loans to students who opt for global education
            only.</small>
    </div>

    <!-- Content Wrapper. Contains page content -->
    <div class="login-box" style="display: none;">
        <div class="displayRegistrationOptions" style="display: none;">
            <div>
                <div class="row displayimgImages">
                    <div class="col-12">
                        <span class="borrowerClick">
                            <img src="<?php echo base_url(); ?>/assets/images/borrower-click.jpg?oxy=1" />
                        </span>

                        <span class="lenderClick">
                            <img src="<?php echo base_url(); ?>/assets/images/lender-click.jpg?oxy=1" />
                        </span>

                        <span class="l">
                            <img src="<?php echo base_url(); ?>/assets/images/highlytrustedplatform.jpg" />
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="displayRegistrationSection">
            <div class="lenderregistrationSection" style="display:none;">
                <!-- Lender Starts -->
                <div class="lenderTab" id="lender" aria-labelledby="lender-tab">
                    <h1>Register as a Lender</h1><br /><br />
                    <form id="lenderSection" autocomplete="off" method="post">
                        <div class="lenderSection">

                            <div>
                                <div class="form-group">
                                    <div><label for="lender"> I Want To Lend</label></div>
                                    <div><input type="" class="form-control lenderAmtValue" placeholder="Enter amount"
                                            id="lenderAmtValue" name="lenderAmtValue" data-validation="lenderAmtValue">
                                    </div>
                                </div>
                                <!-- hidden field for the user type -->
                                <input type="" class="form-control lenderuserType" placeholder="Enter amount"
                                    id="lenderuserType" name="lenderuserType" value="LENDER" style="display: none;">
                                <!-- hidden field for the user type  ends-->

                                <div class="form-group">
                                    <div><label for="Mobile number">Mobile number</label></div>
                                    <div><input type="Mobile number" class="lmobileNumber form-control"
                                            placeholder="Enter number" name="lmobileNumber" id="lmobileNumber"
                                            data-validation="lmobileNumber">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div><label for="city">City</label></div>
                                    <div>
                                        <input type="text" class="cityInputs form-control autocomplete"
                                            placeholder="Enter city" name="city" id="city" data-validation="city">
                                    </div>
                                </div>
                                <button type="submit " class="btn btn-info  btn-flat f-submitBtn" data-toggle="modal"
                                    data-target="#myModal">SUBMIT <i class="fa fa-arrow-right"></i></button>

                                <a href="register">
                                    <button type="button" class="btn btn-flat f-submitBtn">BACK</button>
                                </a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="borrowerregistrationSection" style="display:none;">
                <!--Borrower starts-->
                <div id="borrower" role="tabpanel" aria-labelledby="borrower-tab">
                    <h1>Register as a Borrower</h1>
                    <br /><br />
                    <form id="borrowerSection" autocomplete="off" method="post">
                        <div class="borrowerSection">
                            <div>
                                <div class="form-group">
                                    <div><label for="Borrow"> I Want To Borrow</label></div>
                                    <div><input type="" class="form-control borrowerAmtValue" placeholder="Enter amount"
                                            id="borrowerAmtValue" name="borrowerAmtValue"
                                            data-validation="borrowerAmtValue"></div>
                                </div>
                                <!-- hidden field for the user type -->
                                <div class="form-group">
                                    <div> <label for="Mobile number">Mobile number</label></div>
                                    <div><input type="Mobile number" class="bmobileNumber form-control"
                                            placeholder="Enter number" name="bmobileNumber" id="bmobileNumber"
                                            data-validation="bmobileNumber"></div>
                                    <!-- hidden field for the user type  ends-->

                                </div>

                                <div class="form-group">
                                    <div><label for="city">City</label></div>
                                    <div>
                                        <input type="text" class="city  cityInputs form-control autocomplete"
                                            placeholder="Enter city" name="city" id="cityValue" data-validation="city">
                                    </div>
                                </div>


                                <button type="button col-xs-12" class="f-submitBtn btn btn-info btn-flat"
                                    data-toggle="modal" data-target="#myModal">SUBMIT <i
                                        class="fa fa-arrow-right"></i></button>

                                <a href="register">
                                    <button type="button" class="btn btn-flat f-submitBtn">BACK</button>
                                </a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Borrower ends -->
        </div>


        <div class="register-box-body">
            <div class="tab-content" id="myTabContent">
                <!--otp starts-->
                <div class="row enterOTPSection" style="display:none;">
                    <form id="otpSection" autocomplete="off" method="PATCH" action="" role="form">
                        <h3>Please enter The OTP to continue</h3>
                        <div>
                            <div class="form-group">
                                <div><label for="OTP"> OTP</label></div>
                                <div><input type="" class="form-control otpValue" placeholder="Enter OTP" id="otpValue"
                                        name="otpValue" data validation="otpValue"></div>
                            </div>

                            <div class="form-group">
                                <div> <label for="Email"> Email</label></div>
                                <div><input type="" class="form-control emailValue" placeholder="Enter Email"
                                        id="emailValue" name="emailValue" data validation="emailValue"></div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label class="lbchkbox">
                                        <input type="checkbox" name="checkbox" />
                                        I accept the <a href="https://oxyloans.com/terms-and-conditions/"
                                            target="_blank">Terms of Use</a> &amp; <a href="#">Privacy Policy</a>
                                    </label>
                                    <br />
                                    <label id="checkbox-error" class="error" for="checkbox"></label>
                                </div>
                            </div>

                        </div>
                        <button type="button " class="btn btn-info btn-lg" data-toggle="modal"
                            data-target="#myModal">submit</button>
                </div>
                </form>
            </div>
            <!-- 
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>
-->

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->




    <!-- -->
</div>

<!-- maincontent ends -->


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



<script>
var urlUserType;
var urlAmount;
var urlemail;

$(document).ready(function() {

    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };

    urlUserType = getUrlParameter('money_type');
    urlAmount = getUrlParameter('amount');
    urlemail = getUrlParameter('email');

    setTimeout(function() {
        checkisUserComesFromUrl(urlUserType, urlAmount, urlemail);
    }, 1000);
    console.log(urlUserType + ", " + urlAmount + ", " + urlemail);





    // $("#lender-tab").trigger("click");
    $(".borrowerClick").click(function() {
        // window.location.href="borrowerregister";  
        window.location.href = "register_borrower";
    });

    $(".lenderClick").click(function() {
        // window.location.href="lender_register";    
        window.location.href = "register_lender";
    });

    $(".borrowerClick").mouseover(function() {
        $(".fa-money").addClass("hoverblue");
    });

    $(".borrowerClick").mouseout(function() {
        $(".fa-money").removeClass("hoverblue");
    });

    $(".lenderClick").mouseover(function() {
        $(".fa-line-chart").addClass("hoverblue");
    });

    $(".lenderClick").mouseout(function() {
        $(".fa-line-chart").removeClass("hoverblue");
    });
});


$(function() {
    $('input').iCheck({
        //checkboxClass: 'icheckbox_square-blue',
        // radioClass: 'iradio_square-blue',
        // increaseArea: '20%' /* optional */
    });
});


function checkisUserComesFromUrl(urlUserType, urlAmount, urlemail) {
    console.log(urlUserType, urlAmount, urlemail);
    console.log(urlUserType);
    if (urlUserType == "Lend Money") {
        console.log("im");
        $("a.lenderClick").trigger("click");
        $(".lenderAmtValue").val(urlAmount);
        $(".emailValue").val(urlemail);

    } else if (urlUserType == "Borrow Money") {
        $("a.borrowerClick").trigger("click");
        $(".borrowerAmtValue").val(urlAmount);
        $(".emailValue").val(urlemail);
    }
}
</script>

<style type="text/css">
.lbchkbox label {
    font-style: 0px;
}
</style>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<?php include 'footer.php';?>