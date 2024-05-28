<?php include 'header1.php';?>
<?php 
 $userRefSource =  isset($_GET['ref']) ? $_GET['ref'] : '0';
 $lenderUserId =  isset($_GET['plid']) ? $_GET['plid'] : '0';
$userUtmSource =isset($_GET['utm']) ? $_GET['utm'] : 'WEB';
$refForPartner =isset($_GET['refForPartner']) ? $_GET['refForPartner'] : null;
?>

<script type='text/javascript'
    src='https://platform-api.sharethis.com/js/sharethis.js#property=60992a3f18d187001189f084&product=sop'
    async='async'></script>

<div class="beforeLoginContentWrapper partnerRegisterSectionWrapper">
    <div class="col-xs-12 leftBoxStyles">
        <div class="login-box-partner">
            <div class="login-box-body">
                <div class="registrationStep1">
                    <form autocomplete="off" id="partnerRegisterSection">
                        <div class="form-Step-1 col-md-12 pull-right">
                            <h1 class="userLoginH1 titlePartner">Register as a Partner</h1><br />

                            <input type="hidden" class="form-control partnerReferrer imdFgW" id="partnerReferrer"
                                name="partnerReferrerUtm" value="<?php echo$refForPartner;?>">

                            <div class="form-group">
                                <input type="text" class="form-control partnerName imdFgW" placeholder="Partner Name"
                                    id="nameAsperPAN" name="partnerName" data validations="nameAsperPAN" maxlength="20">
                            </div>

                            <div class="form-group newemailDiv">
                                <input type="text" class="form-control partneremailValue imdFgW"
                                    placeholder="Partner Email" id="partnerValue" name="PartneremailValue" data
                                    validations="emailValue" required="required" />
                            </div>

                            <div class="form-group">
                                <input type="tel" class="form-control partnerMobile imdFgW" placeholder="Phone number"
                                    id="partNo" name="partnerPhone" data validations="phonenumber" required="required"
                                    maxlength="10">
                            </div>

                            <code class="notePoint"
                                style="background-color: #BCE5EF;"><small><i style="color:#3F4141;">SPOC (Single Point of Contact)</i></small></code></br>

                            <div class="form-group newMobileDiv">
                                <input type="text" class="form-control partnerUtm  imdFgW" placeholder="SPOC Name"
                                    id="partUtm" name="partnerUtm" data validations="partnerUtm"
                                    required="required" /></br>



                                <div class="form-group">
                                    <input type="number" class="form-control partnerphoneData imdFgW" name="PPhoneData"
                                        placeholder="SPOC Mobile number" maxlength="10">
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control partnerEmailentered imdFgW"
                                        placeholder="SPOC Email" name="PPEmailData" required="required">
                                </div>

                                <span class="error mobileError_Message" style="display: none;">Registration has already
                                    been done using this mobile number.</span>
                            </div>

                            <div class="form-group">
                                <small><i>By clicking Sign Up, you agree to our <a href="" target="_blank">Terms &
                                            Conditions</a></i></small>
                            </div>


                            <div class="col-xs-12 fr pull-left ptnBtn">
                                <a href="">
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


                </div>


                </form>
            </div>
        </div>
    </div>
</div>
</div>


<div class="modal modal-success fade registerSuccess" id="modal-partnerRegister">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks</h4>
            </div>
            <div class="modal-body">
                <p id="partnerErrorBody">Thanks for registering with us, we have sent login credientials to the
                    registered e-mail. </p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <a href="https://www.oxyloans.com/new/partnerLogin">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Login</button>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script type="text/javascript">
$(document).ready(function() {
    $("#partneraddMore").click(function() {
        $(".point-of-contact").append(
            '<div><input type="number" class="form-control imdFgW" placeholder="contact phone number" name="PPhoneData"  required="required" maxlength="10"/></br><input type="email" class="form-control partnerPhoneData imdFgW" placeholder="contact Email" name="PPEmailData" required="required"/><a href="#" class="remove_field">Remove</a></div>'
        );
    });

    $(".point-of-contact").on("click", ".remove_field", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
    });
});
</script>
<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
<meta name="google-signin-client_id" content="913092980453-4dqej3qkl7rke1631rcu9s4bfvesu9hj.apps.googleusercontent.com">
<?php include 'footer.php';?>