<?php include 'header1.php';?>
<?php 
 $userRefSource =  isset($_GET['ref']) ? $_GET['ref'] : '0';
 $lenderUserId =  isset($_GET['plid']) ? $_GET['plid'] : '0';
 $userUtmSource =isset($_GET['utm']) ? $_GET['utm'] : 'WEB';
 $utmForPartner =isset($_GET['utmForPartner']) ? $_GET['utmForPartner'] : null;
 $finoFIF =isset($_GET['usrFrom']) ? $_GET['usrFrom']:'null';
 $finoempNo =isset($_GET['userNo']) ? $_GET['userNo']:'0';

?>



<script type='text/javascript'
    src='https://platform-api.sharethis.com/js/sharethis.js#property=60992a3f18d187001189f084&product=sop'
    async='async'></script>

<div class="beforeLoginContentWrapper">
    <div class="col-xs-12 leftBoxStyles">
        <div class="login-box">
            <div class="login-box-body">
                <div class="registrationStep1">
                    <form autocomplete="off" id="borrowerRegisterSection">
                        <div class="form-Step-1">
                            <h1 class="userLoginH1">Register as a Borrower</h1><br />
                            <div class="form-group">
                                <input type="text" class="form-control nameAsperPAN imdFgW"
                                    placeholder="NAME AS PER PAN CARD" id="nameAsperPAN" name="nameAsperPAN" data
                                    validations="nameAsperPAN">
                            </div>

                            <div class="form-group newemailDiv">
                                <input type="text" class="form-control emailValue imdFgW" placeholder="EMAIL"
                                    id="emailValue" name="emailValue" data validations="emailValue" required="required">
                                <!-- HIDDEN FIELDS -->
                                <input type="text" class="form-control citeZenShipVal imdFgW" value="NONNRI"
                                    id="citeZenShipVal" name="citeZenShipVal" data validations="citeZenShipVal"
                                    required="required" style="display:none">

                                <input type="text" class="form-control pUserType imdFgW" value="BORROWER" id="pUserType"
                                    name="pUserType" data validations="pUserType" required="required"
                                    style="display:none">

                                <input type="text" class="form-control refUTMVal imdFgW"
                                    value="<?php echo $userRefSource;?>" id="refUTMVal" name="refUTMVal" data
                                    validations="refUTMVal" required="required" style="display:none" />


                                <input type="text" class="form-control refUTMValPartner imdFgW"
                                    value="<?php echo $utmForPartner;?>" id="utmForPartner" name="repartnerVal" data
                                    validations="refpartnerVal" required="required" style="display:none" />

                                <input type="text" class="form-control userUTMVal imdFgW"
                                    value="<?php echo $userUtmSource;?>" id="userUTMVal" name="userUTMVal" data
                                    validations="userUTMVal" required="required" style="display:none" />



                                <input type="text" class="form-control userUTMVal imdFgW" value="<?php echo $finoFIF;?>"
                                    id="finoUtm" name="finoUtm" data validations="finoUtm" required="required"
                                    style="display:none" />

                                <!-- HIDDEN FIELDS ENDS -->
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control password imdFgW" placeholder="PASSWORD"
                                    id="password" name="password" data validations="password" required="required">
                            </div>



                            <div class="newMobileDiv referreridBlock" style="display:none; margin-bottom:15px">
                                <code class="notePoint"
                                    style="background-color: #BCE5EF;"><small><i style="color:#3F4141;">If you are referred by an existing Borrower,Please enter his/her referrer id ( EX : BR100001)</i></small></code>
                                <input type="text" class="form-control referrerid imdFgW"
                                    placeholder="ENTER THE REFERRER ID " name="referrerid" data validations="referrerid"
                                    id="referrerid" />

                                <span class="error  referrerError_Message" style="display: none;">The user ID you are
                                    trying to retrieve actually not exists in the database</span>
                            </div>

                            <div class="form-group newMobileDiv">
                                <input type="text" class="form-control regMobileNumber imdFgW"
                                    placeholder="MOBILE NUMBER" id="regMobileNumber" name="regMobileNumber" data
                                    validations="regMobileNumber" required="required" />

                                <span class="error mobileError_Message" style="display: none;">Registration has already
                                    been done using this mobile number.</span>
                            </div>




                            <div class="form-group newMobileDiv finofifid" style="display:none">
                                <input type="number" class="form-control finnoCif imdFgW"
                                    placeholder="ENTER YOUR FINO CIF ID" id="cifID" name="fINNOCIFFno" data
                                    validations="FINNOCIFFno" required="required" />


                            </div>

                            <div class="form-group newMobileDiv finoEmpIdno" style="display:none">
                                <input type="text" class="form-control finoEmpId imdFgW"
                                    placeholder="ENTER THE FINO EMPLOYEE MOBILE NO" id="finoEmpId" name="finoEmpid" data
                                    validations="empid" required="required" value="<?php echo $finoempNo?>" readonly />


                            </div>

                            <div class="form-group">
                                <small><i>Agree to
                                        <a href="https://oxyloans.com/terms-and-conditions/" target="_blank">Terms &
                                            Conditions</a> by Clicking Submit</i></small>
                            </div>
                            <div class="col-xs-12 fr">
                                <a href="" class="fr">
                                    <button type="submit" class="btn btn-flat f-submitBtn btn-loginnew">Sign Up
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

                    <div class="form-Step-1-of-2" style="display:none;">
                        <div class="headSec-NewRegister">
                            <h1>Enhanced Security for Registering on OxyLoans</h1>
                            <span>

                                Identity verification is required before registration for enhanced security.
                            </span>
                        </div>
                        <div class="contSec-NewRegister">
                            <div align="text-center">
                                <i class="fa fa-lock"></i><br />
                                <span>
                                    OTP sent successfully to your registered mobile number.
                                </span>
                            </div>
                            <div class="newReg-OTPBlock">
                                <!-- <input id="partitionedInput" class="enteredOTP" type="text" maxlength="6" /> -->
                                <div class="input-otp inputs-verify">
                                    <input id="otpBoxE1" type="number" maxlength="1"
                                        onkeyup="onKeyUpEventEmail(1, event)" onfocus="onFocusEventeEmail(1)"
                                        class="otpBoxone" />
                                    <input id="otpBoxE2" type="number" maxlength="1"
                                        onkeyup="onKeyUpEventEmail(2, event)" onfocus="onFocusEventeEmail(2)"
                                        class="optBoxtwo" />
                                    <input id="otpBoxE3" type="number" maxlength="1"
                                        onkeyup="onKeyUpEventEmail(3, event)" onfocus="onFocusEventeEmail(3)"
                                        class="optBoxthree" />
                                    <input id="otpBoxE4" type="number" maxlength="1"
                                        onkeyup="onKeyUpEventEmail(4, event)" onfocus="onFocusEventeEmail(4)"
                                        class="optBoxfour" />
                                    <input id="otpBoxE5" type="number" maxlength="1"
                                        onkeyup="onKeyUpEventEmail(5, event)" onfocus="onFocusEventeEmail(5)"
                                        class="optBoxfive" />
                                    <input id="otpBoxE6" type="number" maxlength="1"
                                        onkeyup="onKeyUpEventEmail(6, event)" onfocus="onFocusEventeEmail(6)"
                                        class="optBoxsix" />
                                </div>
                            </div>
                        </div>

                        <div class="footer-NewRegister">
                            <button type="button"
                                class="btn btn-flat f-submitBtn btn-loginnew nbrd btn-loginborrower-verify"
                                id="btn_login_borrower">Verify & Proceed
                                <span class="displayScreenFlowArw-2 filler">&rarr;</span>
                                <span class="displayScreenFlowRefresh-2 filler" style="display: none;">
                                    <svg class="spinner" width="18px" height="20px" viewBox="0 0 66 66"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33"
                                            cy="33" r="30" style="color:#FFFFFF"></circle>
                                </span>
                            </button>

                            <button type="button" class="btn btn-back-reg">BACK </button>
                        </div>
                    </div>

                    <div class="form-Step-1-of-3" style="display: none;">
                        <div class="headSec-NewRegister">
                            <img src="<?php echo base_url(); ?>/assets/images/green-Tick.png" width="60" />
                            <h1>Thank you for registering with us!</h1>
                        </div>
                        <div class="contSec-NewRegister">
                            <span class="mysmtext">
                                An activation link has been sent to your registered e-mail. Please check your email and
                                activate your
                                <b>OxyLoans</b> account to start <b>Lend</b>
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

                    We have sent you an email with the activation link.
                    Please activate and proceed.
                </p>
            </div>
            <div class="modal-footer">
                <span class="pull-left displayEmailText" style="display: none;">
                    <b>We've sent an activation link to <span class='myprevRegBEmailId'></span></b>
                </span>
                <button type="button" class="btn btn-outline pull-right sendbActivationLink" href="userlogin"
                    data-buserID="">Re-Send Activation Link</button>

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



<div class="modal modal-warning fade" id="modal-borrowerMobilesessionExpired">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Session Time Out</h4>
            </div>
            <div class="modal-body">
                <p class="mobile-bsession">
                    The mobile OTP session has expired. Click on Resend to get the OTP.
                </p>
            </div>
            <div class="modal-footer">

                <div align="right">

                    <button type="button" class="btn btn-outline pull-right borrowerresendOtpSession"
                        data-userID="">Re-Send</button>


                </div>


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
$(document).ready(function() {
    var finiuserUtm = $("#finoUtm").val();
    var referrerId = $("#refUTMVal").val();

    if (finiuserUtm == 'null') {
        $(".finofifid,.finoEmpIdno").hide();
    } else {
        $(".userLoginH1").html("welcome to Fino")
        $(".finofifid,.finoEmpIdno").show();
    }


    if (referrerId == "0") {
        $('.referreridBlock').show();
    } else {
        $('.referreridBlock').show();
        $("#referrerid").val(referrerId);
        // $('#referrerid').attr("disabled", true);
    }

});
</script>

<script>
function getCodeBoxEmail(index) {
    return document.getElementById('otpBoxE' + index);
}



function onKeyUpEventEmail(index, event) {
    const eventCode = event.which || event.keyCode;
    if (getCodeBoxEmail(index).value.length === 1) {
        if (index !== 6) {
            getCodeBoxEmail(index + 1).focus();
        } else {
            getCodeBoxEmail(index).blur();
            // Submit code
            console.log('submit code ');
        }
    }
    if (eventCode === 8 && index !== 1) {
        getCodeBoxEmail(index - 1).focus();
    }
}

function onFocusEventeEmail(index) {
    for (item = 1; item < index; item++) {
        const currentElement = getCodeBoxEmail(item);
        if (!currentElement.value) {
            currentElement.focus();
            break;
        }
    }
}
</script>


<script type="text/javascript">
$(document).ready(function() {
    $("#referrerid").focusout(function(e) {
        var referrerId = $("#referrerid").val().substring(2);

        const numberPattern = /^\d+$/;
        const stringPattern = /^[a-zA-Z]+$/;

        if (stringPattern.test(referrerId)) {
            console.log("entered the string block");
        } else {
            console.log("entered the number block");
            if (userisIn == "local") {
                var getreferrerId =
                    "http://ec2-15-207-239-145.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
                    referrerId + "/user-uniquenumber";
            } else {
                var getreferrerId =
                    "https://fintech.oxyloans.com/oxyloans/v1/user/" + referrerId +
                    "/user-uniquenumber";
            }

            $.ajax({
                url: getreferrerId,
                type: "GET",
                contentType: "application/json",
                dataType: "json",
                success: function(data, textStatus, xhr) {
                    console.log("function is success");
                    $(".referrerError_Message").hide();

                    sessionStorage.setItem('uniqueIdBorrower', data.uniqueNumber);
                },
                error: function(xhr, textStatus, errorThrown) {
                    sessionStorage.setItem('uniqueIdBorrower', 0);
                    if (arguments[0].responseJSON.errorCode == 404) {
                        $(".referrerError_Message").html(
                            arguments[0].responseJSON.errorMessage
                        );
                        $(".referrerError_Message").fadeOut(100).fadeIn(100).fadeOut(100)
                            .fadeIn(100);
                        $(".referrerError_Message").show();
                    }
                },

            });

        }

    });
});
</script>


<script type="text/javascript">
$(document).ready(function() {
 
    var input = document.querySelector("#regMobileNumber");
    window.intlTelInput(input, {
        utilsScript: "build/js/utils.js",
        separateDialCode: true,
        hiddenInput: "full",
        preferredCountries: ["IN"],
    });
  
});
</script>
<!-- <script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
<meta name="google-signin-client_id" content="913092980453-4dqej3qkl7rke1631rcu9s4bfvesu9hj.apps.googleusercontent.com"> -->
<?php include 'footer.php';?>