<?php include 'header1.php';?>
<!-- wrapper starts -->
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$expertEmail =  isset($_GET['expertEmail']) ? $_GET['expertEmail'] : '0';
$userId =  isset($_GET['userId']) ? $_GET['userId'] : '';
$userName =  isset($_GET['userName']) ? $_GET['userName'] : '';
?>

<div class="">
    <div class="main-cont">
        <div class="container">
            <div class="seeker-block">
                <div class="expert-block1 block-loan">
                    <center>
                        <h3 style="color:#149bd7;">
                            ASK EXPERT</h3>
                    </center>

                    <div class="clear"></div>
                    <form id="adviceSeekersection" autocomplete="off" method="post">
                        <div class="lenderstep1 mar15">
                            <br /><br />
                            <div class="form-lft">
                                <label for="first name">Name<em class="mandatory">*</em></label>
                                <div class="fld-block">
                                    <input type="text" id="expertfirstname" name="advicefirstname" class="text-fld1"
                                        placeholder="Enter your Name">
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="form-lft">
                                <label>Mobile No<em class="mandatory">*</em></label>
                                <div class="fld-block">
                                    <div class="input-group">
                                        <div class="whatappNO">
                                            <input type="tel" placeholder="" id="expertMobilenumber"
                                                name="expertMobileNumber">
                                        </div>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-success btn-textchangeforexpert"
                                                id="expertMobileverifybutton" onclick="getexpertMobileOtp();"><span>Send
                                                    OTP</span></button>
                                        </span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <input type="hidden" name="seekeremail" id="seekeremail"
                                    value="<?php echo $expertEmail; ?>">
                                <input type="hidden" name="seekerId" id="seekerId" value="<?php echo $userId; ?>">
                                <div class="clear"></div>
                            </div>
                            <div class="form-lft">
                                <label>Mobile OTP<em class="mandatory">*</em></label>
                                <div class="fld-block">
                                    <input type="text" placeholder="OTP" id="expertotpvalue" name="expertotpvalue"
                                        class="text-fld1">
                                    <span class="errorotp" style="display:none; color: red;">Invalid OTP value please
                                        check.</span>
                                    <input type="hidden" id="expertmobilesession">
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>

                            <div class="form-lft">
                                <label>Email ID<em class="mandatory">*</em></label>
                                <div class="fld-block verify_block">
                                    <input type="email" placeholder="Enter Your E-mail..." name="expertEmailValue"
                                        id="expertemailValue" class="text-fld text-fld1">
                                    <div class="verify_btn">
                                        <button type="button" class="btn  btn-success btn-textchangeforemail"
                                            id="expertEmailverifybutton" onclick="getexpertEmailOtp();">
                                            <span>Send OTP</span></button>


                                    </div>
                                    <div class="clear"></div>
                                    <label id="emailerror"
                                        style="color:red; font-size:11px; width:100%; display:none;">please enter your
                                        email id</label>

                                    <input type="hidden" id="expertEmailsesession">
                                    <input type="hidden" id="expertsaltsesession">
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="form-lft">
                                <label>Email OTP<em class="mandatory">*</em></label>
                                <div class="fld-block">
                                    <input type="text" placeholder="OTP" name="expertemailotpvalue"
                                        id="expertemailotpvalue" class="text-fld text-fld1">
                                    <span class="errorotp" style="display:none; color: red;">Invalid OTP value please
                                        check.</span>

                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="form-lft">
                                <label>Social Login URL<em class="mandatory">*</em></label>
                                <div class="fld-block">
                                    <input type="text" placeholder="FB URL" name="lenderemailotpvalue" id="expertFBURL"
                                        class="text-fld text-fld1" style="width:30%;">

                                    <input type="text" placeholder="Twitter URL" name="experttwitterURL"
                                        id="experttwitterURL" class="text-fld text-fld1"
                                        style="width:30%; margin-left:20px;">
                                    <input type="text" placeholder="Linkedin URL" name="linkedinUrl"
                                        id="expertLinkedinURL" class="text-fld text-fld1"
                                        style="width:30%;margin-left:20px;">

                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="form-lft">
                                <label>FAQ<em class="mandatory">*</em></label>
                                <div class="fld-block">
                                    <select class="commanFaq" id="seekerFAQ">
                                        <option value="What is the minimum and maximum amount I can lend">What is the
                                            minimum and maximum amount I can lend</option>
                                        <option value="How safe is my money">How safe is my money</option>
                                        <option value="What is the maximum loan amount for a borrower">What is the
                                            maximum loan amount for a borrower</option>
                                        <option value="What is the maximum duration for a loan">What is the maximum
                                            duration for a loan</option>
                                        <option value="What is the rate of interest that I can ask for">What is the rate
                                            of interest that I can ask for</option>
                                        <option value="What is the maximum time frame for a loan">What is the maximum
                                            time frame for a loan</option>

                                    </select>

                                    <div class="clear"></div>

                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="form-lft">
                                <label>Message<em class="mandatory">*</em></label>
                                <div class="fld-block">
                                    <textarea readonly class="expert-message" placeholder="write message"
                                        style="height: 100px;width: 100%;" name="expertText"></textarea>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                            <div class="btn-Expert">
                                <button type="submit" class="btn btn-lg btn-info" id="submissionRequest">Submit</button>

                            </div>
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
                <p>The mobile has already been registered.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right loginbtn" data-dismiss="modal">OK</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-success fade" id="modal-adviceSucess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>You will get Responses soon from the Expert, Thank you for Connecting with us</p>
            </div>
            <div class="modal-footer">
                <a href="https://oxyloans.com">
                    <button type="button" class="btn btn-outline pull-right loginbtn"
                        data-dismiss="modal">OK</button></a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    var input = document.querySelector("#expertMobilenumber");
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
<script type="text/javascript">
$(document).ready(function() {
    var seekername = $("#expertfirstname").val();
    var textMessageContent = "Hi <?php echo $userName?>,\n I am Interested to Know about peer to peer.";
    $(".expert-message").html(textMessageContent);
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