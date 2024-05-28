<?php include 'header1.php';?>
<div class="beforeLoginContentWrapper">
    <div class="col-xs-12 leftBoxStyles">
        <div class="login-box">
            <div class="login-box-body">
                <div class="registrationStep1">
                    <form autocomplete="off" id="userHiddenLoginSection">
                        <div class="form-Step-1">
                            <h1 class="userLoginH1">Adming View for the Lender / Borrower</h1><br />
                            <div class="">
                                <input type="text" class="form-control nameAsperPAN imdFgW"
                                    placeholder="Enter The Lender/Borrower ID" id="hiddenUserId" name="nameHidenUser"
                                    data validations="nameAsperPAN" />
                            </div></br>
                            <div class="newMobileDiv">
                                <input type="password" class="form-control regMobileNumber imdFgW"
                                    placeholder="Enter the Password" id="hiddenPrimary" name="userPrimaryType" data
                                    validations="regMobileNumber" />
                                <span class="error hidenpassword" style="display:none;">Invalid Password</span>
                            </div>


                            </br>
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
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script src="app.js"></script>
<?php include 'footer.php';?>