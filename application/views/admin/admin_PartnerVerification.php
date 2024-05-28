<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6 verify-mobile">
                <h4>Verify your mobile number</h4>
                <div class="box box-primary">
                    <div class="box-header text-center">
                    </div>
                    <div class="box-body text-center">
                        <div class="imageverify imagesection">
                            <img src="<?php echo base_url(); ?>assets/images/phoneverify.jpg" alt="phoneverify"
                                class="imageverify1" />
                        </div>
                        <div class="inputs-verify">
                            <label style="margin-top: 10px;">Mobile number </label></br>
                            <input type="text" name="partnerno" placeholder="Enter the mobile number" maxlength="10"
                                id="partnerMobileno"></br>
                            <span class="error partnerMobileerror" style="display: none;">Please Enter the mobile number
                            </span></br>
                            <button class="btn btn-primary btn-md btn-otp" onclick="partnerVerifyMobile();"> <i
                                    class="fa fa-mobile fa-lg" aria-hidden="true"> </i> Get OTP</button>
                        </div>

                        <div class="verify-otp" style="display: none;">
                            <label style="margin-top: 10px;"> Mobile OTP </label></br>
                            <div class="input-otp">
                                <form>
                                    <input id="codeBox1" type="number" maxlength="1" onkeyup="onKeyUpEvent(1, event)"
                                        onfocus="onFocusEvent(1)" />
                                    <input id="codeBox2" type="number" maxlength="1" onkeyup="onKeyUpEvent(2, event)"
                                        onfocus="onFocusEvent(2)" />
                                    <input id="codeBox3" type="number" maxlength="1" onkeyup="onKeyUpEvent(3, event)"
                                        onfocus="onFocusEvent(3)" />
                                    <input id="codeBox4" type="number" maxlength="1" onkeyup="onKeyUpEvent(4, event)"
                                        onfocus="onFocusEvent(4)" />
                                    <input id="codeBox5" type="number" maxlength="1" onkeyup="onKeyUpEvent(5, event)"
                                        onfocus="onFocusEvent(5)" />
                                    <input id="codeBox6" type="number" maxlength="1" onkeyup="onKeyUpEvent(6, event)"
                                        onfocus="onFocusEvent(6)" />
                                </form>

                            </div>
                            <button class="btn btn-primary btn-md btn-otp-verify"
                                onclick="partnerVerifyMobileotpsession();"><i class="fa fa-mobile fa-lg"
                                    aria-hidden="true"></i> Submit Otp</button>
                        </div>

                    </div>

                    <div class="mobileverifiydonesection text-center">
                        <div class="imageverify">
                            <img src="<?php echo base_url(); ?>assets/images/verifiedImage.png" alt="phoneverify"
                                class="imageverify1" />
                        </div>
                        <h4>Verified!</h4>
                        <!--   <h4>you have successfully  verified your mobile number</h4> -->
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <h4>Verify Your Email</h4>
                <div class="box box-info">
                    <div class="box-header">
                    </div>
                    <div class="box-body text-center">
                        <div class="imageverify email-section">
                            <img src="<?php echo base_url(); ?>assets/images/emaileverify.png" alt="phoneverify"
                                class="imageverify1" />
                        </div>
                        <div class="inputs-verify-Email">
                            <label style="margin-top: 10px;">Email Id </label></br>
                            <input type="email" name="partnerEmail" placeholder="Enter your  Email"
                                id="partnerEmailid"></br>
                            <span class="error partnerEmailerror" style="display: none;">Please Enter the Email id
                            </span></br>
                            <button class="btn btn-info btn-md btn-otp" onclick="partnerVerifyEmail();"><i
                                    class=" fa fa-envelope fa-md" aria-hidden="true"></i> Get Email OTP</button>
                        </div>
                        <div class="verify-Emailotp" style="display: none;">
                            <label style="margin-top: 10px;">Email OTP </label></br>
                            <div class="input-otp">
                                <form>
                                    <input id="codeBoxE1" type="number" maxlength="1"
                                        onkeyup="onKeyUpEventEmail(1, event)" onfocus="onFocusEventeEmail(1)" />
                                    <input id="codeBoxE2" type="number" maxlength="1"
                                        onkeyup="onKeyUpEventEmail(2, event)" onfocus="onFocusEventeEmail(2)" />
                                    <input id="codeBoxE3" type="number" maxlength="1"
                                        onkeyup="onKeyUpEventEmail(3, event)" onfocus="onFocusEventeEmail(3)" />
                                    <input id="codeBoxE4" type="number" maxlength="1"
                                        onkeyup="onKeyUpEventEmail(4, event)" onfocus="onFocusEventeEmail(4)" />
                                    <input id="codeBoxE5" type="number" maxlength="1"
                                        onkeyup="onKeyUpEventEmail(5, event)" onfocus="onFocusEventeEmail(5)" />
                                    <input id="codeBoxE6" type="number" maxlength="1"
                                        onkeyup="onKeyUpEventEmail(6, event)" onfocus="onFocusEventeEmail(6)" />
                                </form>

                            </div>
                            <button class="btn btn-primary btn-md btn-otp-verify"
                                onclick="partnerVerifyEmailotpsession();"><i class=" fa fa-envelope fa-md"
                                    aria-hidden="true"></i> Submit Email Otp</button>
                        </div>

                    </div>
                    <div class="emailverifiydonesection text-center">
                        <div class="imageverify">
                            <img src="<?php echo base_url(); ?>assets/images/Email-mark.jpg" alt="phoneverify"
                                class="imageverify1" />
                        </div>
                        <h4>Verified!</h4>
                        <!--  <h4>you have successfully  verified your Email</h4> -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal modal-warning fade" id="modal-partnerErrormessages">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body errormessage">
                <p id="data"></p>
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
<div class="modal modal-success fade" id="modal-partnerVerifymobile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body errormessage">
                <p id="text">you have successfully verified the mobile number</p>
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
<div class="modal modal-success fade" id="modal-partnerVerifyEmail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body errormessage">
                <p id="text">you have successfully verified your email</p>
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
<style type="text/css">
h4 {
    font-size: 14px;
    font-weight: 700;
    font-family: sans-serif;
}

.imageverify img {
    height: 100px;
    width: 100px;
    border-radius: 70%;
}

.inputs-verify input,
.inputs-verify-Email input {
    width: 60%;
    margin: 10px;
    padding: 10px;
    background: #f9fafd;
    border: 1px solid #dce1ee;
    border-radius: 4px !important;
    outline: none;
    shadow: none;
    margin-left: 30px;
}

.btn-otp-verify {
    margin: 20px;
    padding: 6px;
}

.btn-otp {
    padding: 5px;
    margin: 3px;
}

.box {
    box-shadow: 0 2px 4px rgb(0 0 0 / 10%), 0 8px 16px rgb(0 0 0 / 10%);
    padding: 2.5rem 0px 3.5rem;
    box-sizing: border-box;
    margin-top: 0 !important;
    height: 400px;
    width: 100%;
}
</style>
<style>
input[type=number] {
    height: 45px;
    width: 45px;
    font-size: 25px;
    text-align: center;
    margin: 7px;
    padding: 2px;
    background: #f9fafd;
    border: 1px solid #dce1ee;
    border-radius: 4px !important;
    shadow: none;
    outline: none;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>
<script>
function getCodeBoxElement(index) {
    return document.getElementById('codeBox' + index);
}

function onKeyUpEvent(index, event) {
    const eventCode = event.which || event.keyCode;
    if (getCodeBoxElement(index).value.length === 1) {
        if (index !== 6) {
            getCodeBoxElement(index + 1).focus();
        } else {
            getCodeBoxElement(index).blur();
            // Submit code
            console.log('submit code ');
        }
    }
    if (eventCode === 8 && index !== 1) {
        getCodeBoxElement(index - 1).focus();
    }
}

function onFocusEvent(index) {
    for (item = 1; item < index; item++) {
        const currentElement = getCodeBoxElement(item);
        if (!currentElement.value) {
            currentElement.focus();
            break;
        }
    }
}

function getCodeBoxEmail(index) {
    return document.getElementById('codeBoxE' + index);
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
partnerVerifySession();
</script>
<?php include 'admin_footer.php';?>