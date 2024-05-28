<?php include 'header1.php';?>
<div class="beforeLoginContentWrapper">
    <div class="col-xs-12 leftBoxStyles">
        <div class="login-box">
            <div class="login-box-body">
                <div class="registrationStep1">
                    <form autocomplete="off" id="partnerUserLoginSection">
                        <div class="form-Step-1">
                            <h1 class="userLoginH1">Partner Login</h1><br />
                            <div class="">
                                <input type="text" class="form-control nameAsperPAN partnerUtm imdFgW"
                                    placeholder="Enter Partner UTM Name" id="partnerUser" name="partnerUtm" data
                                    validations="partnerUtm" />
                            </div></br>
                            <div class="newMobileDiv" id="show_hide_password">
                                <input type="password" class="form-control passwordPartner imdFgW"
                                    placeholder="Partner Password" id="passwordPartner" name="passwordPartner" data
                                    validations="passwordPartner" />
                                <a><i class="fa fa-eye-slash fa-1x hiddeneyePartner"></i></a>

                                <span class="error passwordemailValue-partner text-center"
                                    style="display: none;">Invalid username or password.</span>
                            </div></br>
                            <div class="col-xs-12 fr">
                                <a href="" class="fr">
                                    <button type="submit" class="btn btn-flat f-submitBtn btn-loginnew">Sign In
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

                            <div align="center" style="margin-top: 10px;text-align: center;width:100%;">
                                <br />&nbsp;
                                <a href="partner_Register">
                                    <br /><b>Partner Registration</b>
                                </a>
                            </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("fa-eye-slash");
            $('#show_hide_password i').removeClass("fa-eye");
        } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("fa-eye-slash");
            $('#show_hide_password i').addClass("fa-eye");
        }
    });
});
</script>

<script src="app.js"></script>
<?php include 'footer.php';?>