<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Credit Report
            <small>Your credit information</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Myprofile</li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <p class="displayError-myprofile error" style="display: none;">

                        </p>

                        <div class="col-xs-1"></div>

                        <div id="gettingUserCreditReport">




                            <!--STEP 1-->

                            <div id="stepOneForm">
                                <form autocomplete="off" id="personalinfoSection">

                                    <div class="row setup-content" id="step-1">
                                        <div class="col-xs-12">
                                            <div class="col-md-12 personal_info">

                                                <h3 style="color: #6074a7;">Customer Consent Form</h3>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-xs-3 personal_info_in">
                                                            <label for="gender">Gender <i class="error">*</i></label>

                                                            <div class="gendar-block">
                                                                <label class="redioboxes"><img
                                                                        src="assets/images/icon1.png" alt="icon1">
                                                                    <input type="radio" name="gender" value="2"
                                                                        id="genderRadioMale">
                                                                    <span class="checkmark"></span>
                                                                    <!--  <small>MAN</small> -->
                                                                </label>
                                                                <label class="redioboxes"><img
                                                                        src="assets/images/icon2.png" alt="icon1">
                                                                    <input type="radio" name="gender" value="1"
                                                                        id="genderRadioFeMale">
                                                                    <span class="checkmark"></span>
                                                                    <!--  <small>WOMAN</small> -->
                                                                </label>
                                                                <div class="clear"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-3 personal_info_in">
                                                            <label for="firstname">First name <i
                                                                    class="error">*</i></label>
                                                            <input id="firstname" name="name" type="text"
                                                                class="form-control firstnameValue required">
                                                            <span class="error firstnameError"
                                                                style="display: none;">Please enter your First
                                                                name</span>
                                                        </div>
                                                        <div class="col-xs-3 personal_info_in">
                                                            <label for="firstname">Last name <i
                                                                    class="error">*</i></label>
                                                            <input id="lastname" name="name" type="text"
                                                                class="form-control firstnameValue required">
                                                            <span class="error lastnameError"
                                                                style="display: none;">Please enter your Last
                                                                name</span>
                                                        </div>
                                                        <div class="col-xs-3  personal_info_in date"
                                                            data-date-format="dd/mm/yyyy">

                                                            <label for="dateofbirth">Date of birth <i
                                                                    class="error">*</i></label>
                                                            <input id="dateofbirthCR" placeholder="DD/MM/YYYY"
                                                                class="form-control dateofbirthValue" type="text"
                                                                class="required" name="dateofbirth">
                                                            <span class="error dateofbirthCRError"
                                                                style="display: none;">Please enter your Date of
                                                                birth</span>
                                                        </div>
                                                    </div><br>



                                                    <div class="row">
                                                        <div class="col-xs-3 personal_info_in">
                                                            <label for="panNumber">PAN Number <i
                                                                    class="error">*</i></label>
                                                            <input id="panNumber" name="PIN" type="text"
                                                                class="form-control panValue required">
                                                            <span class="error panNumberError"
                                                                style="display: none;">Please enter your PAN
                                                                Number</span>
                                                        </div>
                                                        <div class="col-xs-3 personal_info_in">
                                                            <label for="email">Email <i class="error">*</i></label>
                                                            <input id="email" name="email" type="email"
                                                                class="form-control required emailValue">
                                                            <span class="error emailError" style="display: none;">Please
                                                                enter your Email</span>
                                                        </div>


                                                        <div class="col-xs-3 personal_info_in">
                                                            <label for="mobile-2">Mobile Number <i
                                                                    class="error">*</i></label>
                                                            <input id="mobile-2" name="mobile" type="number"
                                                                class="form-control mobilenumberValue required">
                                                            <span class="error mobile-2Error"
                                                                style="display: none;">Please enter your Mobile
                                                                Number</span>
                                                        </div>

                                                        <div class="col-xs-3 personal_info_in">
                                                            <label for="pincode">PIN Code <i class="error">*</i></label>
                                                            <input id="pincode" name="PIN" type="text"
                                                                class="form-control pincode required">
                                                            <span class="error pincodeError"
                                                                style="display: none;">Please enter your pincode</span>
                                                        </div>

                                                    </div><br>

                                                    <div class="row">
                                                        <div class="col-xs-3 personal_info_in">
                                                            <label for="city">City<i class="error">*</i></label>
                                                            <input id="city" name="city" type="text"
                                                                class="form-control cityValue">
                                                            <span class="error cityError" style="display: none;">Please
                                                                enter your city</span>
                                                        </div>
                                                        <div class="col-xs-5 personal_info_in personal_edit">
                                                            <label for="flatno">Flat No/Door No/House No<i
                                                                    class="error">*</i></label>
                                                            <textarea class="form-control flatnoValue" cols="3" rows="3"
                                                                placeholder="Enter Flat No/Door No/House No"
                                                                id="residentaddress"></textarea>
                                                            <span class="error flatnoError"
                                                                style="display: none;">Please enter your Flat No/Door
                                                                No/House No</span>
                                                        </div>
                                                    </div><br><br>


                                                    <div class="row">
                                                        <div class="col-xs-12 terms_text">
                                                            <span class="termsError"
                                                                style="display: none; color: red;top: -20px;position:absolute;">please
                                                                agree the terms and conditions.</span>
                                                            <input id="acceptTerms-2" name="acceptTerms" type="checkbox"
                                                                class="required acceptTerms">


                                                            <label for="acceptTerms-2">YOU HEREBY CONSENT TO OXYLOANS
                                                                BEING APPOINTED AS YOUR AUTHORISED REPRESENTATIVE TO
                                                                RECIVE YOUR CREDIT INFORMATION FROM EXPERIAN FOR THE
                                                                PURPOSE OF LOAN.
                                                                <br><br>
                                                                BY EXECUTING THIS AGREEMENT / CONSENT FROM, YOU ARE
                                                                EXPRESSLY AGREEING TO ACCESS THE EXPERIAN CREDIT REPORT
                                                                AND CREDIT SCORE,AGGREGATE SCORES,INFERENCES REFERENCES
                                                                AND DETAILS (AS DEFIND BELOW)(TOGETHER REFERRED
                                                                AS"CREDIT INFORMATION").YOU HEREBY ALSO IRREVOCABLY AND
                                                                UNCONDITIONALLY CONSENT TO SUCH CREDIT INFORMATION BEING
                                                                PROVIDED BY EXPERIAN TO YOU AND OXYLOANS BY USING
                                                                EXPERIAN TOOLS, ALGORITHMS AND DEVICES AND YOU HEREBY
                                                                AEREE,ACKNOWLEDGE AND ACCEPT THE
                                                                <a class="termAndconditions" style="color: blue;">TERMS
                                                                    AND CONDITIONS </a> SET FORTH HEREIN.</label>
                                                            <img src="<?php echo base_url(); ?>/assets/images/Experian_New Logo.jpg"
                                                                / width=20% align="right">
                                                            <div class="clear"></div>
                                                            <button
                                                                class="btn btn-success decline_button  btn-lg pull-right"
                                                                id="getcredireportbtn" type="button">Accept</button>
                                                            <button
                                                                class="btn btn-success decline_button1  btn-lg pull-right"
                                                                id="decline-btn" type="button">Decline</button>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </fieldset>

                                            </div>
                                        </div>
                                    </div>


                                </form>
                            </div>
                            <div id="stepThreeForm" style="display: none;">
                                <form autocomplete="off" id="summaryReportSection">


                                    <div class="row setup-content" id="step-3">
                                        <div class="col-xs-12">
                                            <div class="col-md-12 user_summary">
                                                <h3> Experian Summary Report</h3>
                                                <label class="size"><i class="fa fa-angle-double-right"></i>
                                                    &nbsp;&nbsp;Active Credit Accounts: &nbsp;&nbsp;<span
                                                        class="creditAccountActive all"></span></label>
                                                <label class="size"> <i class="fa fa-angle-double-right"></i>
                                                    &nbsp;&nbsp;Closed Credit Accounts: &nbsp;&nbsp;<span
                                                        class="creditAccountClosed all"></span></label>
                                                <label class="size"> <i class="fa fa-angle-double-right"></i>
                                                    &nbsp;&nbsp;Total Credit Accounts: &nbsp;&nbsp;<span
                                                        class="creditAccountTotal all"></span></label>
                                                <label class="size"><i class="fa fa-angle-double-right"></i>
                                                    &nbsp;&nbsp;Outstanding Balance All: &nbsp;&nbsp;<span
                                                        class="outstandingBalanceAll all"></span></label>
                                                <label class="size"><i class="fa fa-angle-double-right"></i>
                                                    &nbsp;&nbsp;Outstanding Balance Secured: &nbsp;&nbsp;<span
                                                        class="outstandingBalanceSecured all"></span></label>
                                                <label class="size"><i class="fa fa-angle-double-right"></i>
                                                    &nbsp;&nbsp;Outstanding Balance UnSecured: &nbsp;&nbsp;<span
                                                        class="outstandingBalanceUnSecured all"></span></label>
                                                <label class="size"><i class="fa fa-angle-double-right"></i>
                                                    &nbsp;&nbsp;Score: &nbsp;&nbsp;<span
                                                        class="score all"></span></label>
                                                <button class="btn btn-success btn-lg pull-right" type="submit"
                                                    style="margin: 0 0 20px;">Finish</button><br>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<style type="text/css">
span.all {
    color: green;
}

.size,
.all {
    font-size: 20px;
}
</style>
<div class="modal modal-default fade" id="modal-termsSuccesss">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title">
                    <center>
                        Terms and Conditions
                    </center>
                </h2>
            </div>
            <div class="modal-body">


                <p align="justify"><b>SRS FINTECHLABS PVT LTD (OxyLoans.com)</b> shall access your Credit Information as
                    your authorized representative and <b>SRS FINTECHLABS PVT LTD (OxyLoans.com)</b> shall use the
                    Credit Information for limited End Use Purpose consisting of and in relation to the services
                    proposed to be availed by you from <b>SRS FINTECHLABS PVT LTD (OxyLoans.com)</b>. We shall not
                    aggregate, retain, store, copy,reproduce, republish, upload, post, transmit, sell or rent the Credit
                    Information to any other person and the same cannot be copied or reproduced other than as agreed
                    herein and infurtherance to CICRA.The Parties agree to protect and keep confidential the Credit
                    Information both online and offline.The Credit Information shared by you, or received on by us on
                    your behalf shall be destroyed,purged, erased promptly within 1 (one) Business Day of upon the
                    completion of the transaction/ End Use Purpose for which the Credit Information report was
                    procured.Governing Law and Jurisdiction The relationship between you and<b>SRS FINTECHLABS PVT LTD
                        (OxyLoans.com)</b>shall be governed by laws of India and all claims ordisputes arising there
                    from shall be subject to the exclusive jurisdiction of the courts ofMumbai.Definitions:Capitalised
                    terms used here in but not defined above shall have the following meanings:“Business Day” means a
                    day (other than a publicholiday) on which banks are open forgeneral business in Mumbai.“Credit
                    Information Report” “means the credit information / scores/ aggregates / variables /inferences or
                    reports which shall be generated by Experian;“Credit Score” means the score which shall be mentioned
                    on the Credit Information Report which shall be computed by Experian.“CICRA” shall mean the Credit
                    Information Companies (Regulation) Act, 2005 read with theCredit Information Companies Rules, 2006
                    and the Credit Information CompaniesRegulations, 2006, and shall include any other rules and
                    regulations prescribed there under.<b>PLEASE READ THE ABOVEMENTIONED TERMS AND CONDITIONS AND CLICK
                        ON“ACCEPT” FOLLOWED BY THE LINK BELOW TO COMPLETE THE AUTHORISATIONPROCESS/ YOUR SELF ATTESTED
                        KYC DOCUMENTATION IN PHYSICALCOPIES> FOR SHARING OF YOUR CREDIT INFORMATION BY EXPERIAN WITH SRS
                        FINTECHLABS PVT LTD (OxyLoans.com) IN ITS CAPACITY AS YOUR AUTHORISED REPRESENTATIVE.BY CLICKING
                        “ACCEPT” YOU AGREE AND ACCEPT THE DISCLAIMERS AND TERMS
                        AND CONDITIONS SET OUT HEREIN.</b>
                </p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button class="btn btn-success  btn-lg pull-right" type="button"
                        data-dismiss="modal">Accept</button>
                    <button class="btn btn-success  btn-lg pull-right" id="back-credit-report"
                        type="button">Decline</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-danger fade" id="modal-experianerror">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Error!</h4>
            </div>
            <div class="modal-body">
                <p class="text-profileCheck" id="experianerrormessage">

                </p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<!--
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
-->
<script type="text/javascript">
window.onload = loadpersonalDetailsforCreditReport();

// submitDataToExperianCreditReport();
//loadpersonalDetailsforCreditRepor();
$(document).ready(function() {
    noprofileCheck = "no";
    noROICheck = "no";

    $('#dateofbirthCR').datepicker({
        format: 'dd-M-yyyy',
        endDate: '-18y'
    });

});
//alert(noprofileCheck);
</script>


<?php include 'footer.php';?>