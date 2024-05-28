<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Refer a Friend & Earn INR 1000
        </h1>

        <div class="pull-right mobile_reeSection mobile_View_div">

            <input type="hidden" name="reflender" id="l_partnerUtm" value="">
            <input type="hidden" name="nrirefLinkU" id="nR_partnerUtm" value="">
            <input type="hidden" name="borrowerRefLinkU" id="b_partnerUtm" value="">
            <button onclick="copyLenderrrefLink('#l_partnerUtm');" class="btn pull-left btn-success
      btn-ref nrilnks btn-ref-lender" data-toggle="tooltip" title="Share this link" data-placement="left">
                Invite a Lender <i class="fa fa-user-o fa_copyRefLink" aria-hidden="true"></i></button>
            <!--   <button onclick="copyNrirefLink('#nR_partnerUtm');" class="btn pull-left btn-primary   btn-ref-nri nrilnks"  data-toggle="tooltip"title="Share This link" data-placement="right">
      <i class="fa fa-plane nriimage" aria-hidden="true"></i> Invite an NRI</button> -->
            <button onclick="copyBorrowerrefLink('#b_partnerUtm');"
                class="btn  pull-left btn-warning btn-ref-borrower nrilnks" data-toggle="tooltip"
                title="Share This link" data-placement="bottom">Invite a Borrower <i
                    class="fa fa-clipboard fa_copyRefLink" aria-hidden="true"></i></button>
        </div>
    </section>
    <br />
    <div class="row customFormQ">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-body">
                    <div class="box-body no-padding">
                        <div class="col-xs-12">
                            <div class="pull-left col-xs-12">
                                <div class="reffrimg pull-left col-xs-3 mobile_View_hide">
                                    <img src="<?php echo base_url(); ?>/assets/images/ir.gif" alt="Refer a Friend"
                                        height="100" />
                                </div>
                                <div class="pull-left col-xs-9 emailcontent">
                                    <ul>
                                        <li>Let us grow as a family, while you are lending money through OXYLOANS, we
                                            ourselves a back-up in life for each other in all kinds of times.</li>
                                        <li>Every time your friend lends money, He / She will earn interest and you will
                                            earn a Reference Fee as shown below: Example: You Referred XYZ || XYZ joined
                                            the platform and lent INR 3,00,000.</li>
                                        <li>On the first INR 1,00,000 you will get INR 1000 For the second 1-lakh, you
                                            will get INR 100 For the third 1-lakh, you will get INR 100. In total, you
                                            will get INR 1200.</li>
                                        <li class="disPlayNone"><a
                                                href="https://docs.google.com/document/d/1rvOFDXnLoop8QRsVyOdYmAmXcJJfuFD9C5lPMZ7FCZQ/edit"
                                                target="_blank">FAQ</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="row referralText" style="margin-left: 20px; float: none!important;">
                                <p class="headLineText">
                                    Invite Friends/ Professionals
                                </p>
                            </div>
                            <!-- right side content-->
                            <div id="#tabsForRef" class="refTabBlock">

                                <ul class="nav nav-tabs" role="tablist">

                                    <li><a href="#profile" role="tab" data-toggle="tab"
                                            class="factive mobile_View_hide">
                                            <i class="fa fa-user"></i> Invite
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#messages" role="tab" data-toggle="tab">
                                            <i class="fa fa-envelope"></i> Bulk Invite
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#settings" role="tab" data-toggle="tab">
                                            <i class="fa fa-cog"></i> Referral Links
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#neobank" role="tab" data-toggle="tab">
                                            <i class="fa fa-bank"></i>Set-up NeoBank
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">


                                    <div class="tab-pane fade mobile_View_hide" id="profile">

                                        <div class="pull-left col-xs-12 mns15">
                                            <div class="block-loan">

                                                <div class="content-listhead"></div>
                                                <div class="panel-body" id="userKYCUpload"
                                                    enctype="multipart/form-data">
                                                    <div class="pull-left col-xs-5 mobile_ref_7">
                                                        <div class="form-lft trans_block  mbreff">
                                                            <div class="account_form upload_pdf">
                                                                <span><b>Name:</b><em class="mandatory">*</em></span>
                                                                <input type="text" placeholder="Enter The Name"
                                                                    id="refereename">
                                                                <span class="error name" style="display: none;">Please
                                                                    enter The name</span>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                        <div class="form-group row ">
                                                            <div class="col-sm-12" style="display: none;">
                                                                <label for="typeofReferrer"
                                                                    class="col-sm-6 col-form-label pull-left"
                                                                    style="padding-left:0px!important;">Friend's
                                                                    Location:</label>

                                                                <input type="radio" name="referrerType"
                                                                    id="referrerNON-NRI" value="NONNRI" checked>
                                                                <span class="Rtype"><b>India</b></span>

                                                                <!-- <input type="radio" name="referrerType" id="referrerNRI" value="NRI" style="margin-top:4px; margin-left: 40px;">
                              <span class="Rtype"><b>NRI</b></span> -->
                                                            </div>
                                                            <!--  <span class="error chooseReferrerType" style="display: none; margin-left:9px;">Please select Referrer Type</span> -->
                                                        </div>
                                                        <div class="form-group row ">
                                                            <div class="col-sm-12">
                                                                <label for="typeofReferrer"
                                                                    class="col-sm-6 col-form-label"
                                                                    style="padding-left:0px!important;">Referrer
                                                                    Type:</label>

                                                                <input type="radio" name="primaryreferrerType"
                                                                    id="referrer-Lender" value="LENDER">
                                                                <span class="Rtype"><b>Lender</b></span>

                                                                <input type="radio" name="primaryreferrerType"
                                                                    id="referrerb" value="BORROWER"
                                                                    style="margin-top:4px; margin-left:5px;">
                                                                <span class="Rtype"><b>Borrower</b></span>
                                                            </div>
                                                            <span class="error chooseReferrer type"
                                                                style="display: none; margin-left: 9px;">Please select
                                                                Referrer Type</span>
                                                        </div>

                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="pull-left col-xs-5 mobile_ref_7">
                                                        <div class="form-lft">
                                                            <div class="account_form upload_pdf leftsecblkreff">
                                                                <span><b>Mobile Number:</b><em
                                                                        class="mandatory">*</em></span>

                                                                <input type="text" placeholder="Enter The Mobile Number"
                                                                    id="phoneNumber" class=".referrerPhoneNUmber"
                                                                    maxlength="10">
                                                                <span class="error mobilenumber"
                                                                    style="display: none;">Please enter The mobile
                                                                    Number</span>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>


                                                        <div class="form-lft">
                                                            <div class="account_form upload_pdf leftsecblkreff">
                                                                <span><b>Email:</b><em class="mandatory">*</em></span>
                                                                <input type="text" placeholder=" Enter The Email Id "
                                                                    id="referemail">
                                                                <span class="error email" style="display: none;">Please
                                                                    Enter The Email Id </span>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>



                                                    </div>

                                                    <div class="col-xs-2 sbtBtnsPs">
                                                        <div class="pull-right">
                                                            <!--
                            <button type="button" class="btn btn-lg btn-secondary" id="viewPreview"><b>Preview</b></button> -->

                                                            <button type="button" class="btn btn-lg btn-success"
                                                                id="referee-submit-btn"> <i class="fa fa-user-plus"
                                                                    aria-hidden="true"
                                                                    style="margin-right:30px!important"></i>
                                                                Submit</button>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="messages"></br></br></br>

                                        <div class="bulkinviteRow center">
                                            <a href="javascript:void(0)" id="Gmailcontacts">
                                                <button type="button" class="btn btn-lg i_gmailcontacts">
                                                    <i class="fa fa-envelope">&nbsp;</i>
                                                    <b> Invite from Gmail</b>
                                                </button>
                                            </a>
                                        </div>
                                        <div>
                                            <h1 class="orthis"><span>OR</span></h1>
                                        </div>
                                        <div class="bulkinviteRow">
                                            <button type="button" class="btn btn-lg i_browsefromComputer"
                                                id="bulkinvite">
                                                <i class="fa fa-file-excel-o">&nbsp;</i>
                                                <b>Browse from computer</b>
                                            </button>
                                        </div>
                                        <div class="browseContent pull-left " style="margin-left:50px;">
                                            <b>
                                                <p>Note: 1) File Format should be .xlsx 2) Excel Columns should be
                                                    arranged as flows:Column1: Name, Column2: Email ,Column3:Phone
                                                    Number.
                                                </p>
                                            </b>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="settings">
                                        <div class="row">
                                            <div class="pull-left classcopyrefLink col-md-12">
                                                <div>
                                                    <input type="text" id="refLinkU"
                                                        value="<?php echo $_SERVER['REQUEST_URI']; ?>"
                                                        style="display: none;" />
                                                    <div class="newSTH pull-left">Share Referral Link</div>
                                                    <button onclick="copyLenderrrefLink('#l_partnerUtm');" class="btn btn-success
                        btn-ref pull-left" data-toggle="tooltip" title="Share this link" data-placement="right">
                                                        Invite a Lender <i class="fa fa-user-o fa_copyRefLink"
                                                            aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                            <div class="clear"></div></br>
                                            <div class="pull-left classcopyrefLink col-md-12">
                                                <input type="text" id="nrirefLinkU"
                                                    value="<?php echo $_SERVER['REQUEST_URI']; ?>"
                                                    style="display: none;" />

                                            </div>
                                            <div class="clear"></div></br>
                                            <div class="pull-left classcopyrefLink col-md-12">
                                                <input type="text" id="borrowerRefLinkU" style="display: none;"
                                                    value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                                                <div class="newSTH pull-left mobile_View_hide">Share
                                                    <u><b>Borrower</b></u> Referral Link
                                                </div>
                                                <button onclick="copyBorrowerrefLink('#b_partnerUtm');"
                                                    class="btn btn-warning btn-ref-borrower" data-toggle="tooltip"
                                                    title="Share This link" data-placement="bottom">Invite a Borrower <i
                                                        class="fa fa-clipboard fa_copyRefLink"
                                                        aria-hidden="true"></i></button>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade col-md-12" id="neobank">
                                        <div class="neoText">
                                            <p class="neo-head pull-left">Set-up a NeoBank.</p></br>
                                            </br>
                                            <p class="neo-Oxy pull-left">Welcome to OxyLoans !</p></br></br>
                                            <p class="neo-Oxycontent1 pull-left">In 2019-Feb, we got the RBI NBFC-P2P
                                                license.</p></br></br>
                                            <P class="neo-Oxycontent1 pull-left">
                                                Using this license, We are able to offer p2p lending services.</P>
                                            </br></br>
                                            <p class="neo-Oxycontent1 pull-left">
                                                In p2p lending lenders & borrowers, both are Individuals/companies/PAN
                                                card holders.</p></br></br>
                                            <p class="neo-Oxycontent2 pull-left">Using the following referral links, you
                                                can launch the p2p lending platform which we are calling a Neo bank.</p>
                                            </br></br></br></br>
                                        </div>

                                        <div class="row neo-btns">
                                            <div class="pull-left classcopyrefLink col-md-12">
                                                <div>
                                                    <input type="text" id="refLinkU"
                                                        value="<?php echo $_SERVER['REQUEST_URI']; ?>"
                                                        style="display: none;" />
                                                    <div class="newSTH pull-left">Share Referral Link </div>
                                                    <button onclick="copyLenderrrefLink('#l_partnerUtm');" class="btn pull-left btn-success
                        btn-ref btn-md btn-ref-lender" data-toggle="tooltip" title="Share this link"
                                                        data-placement="left">
                                                        Copy Share this link</button>
                                                </div>
                                            </div>
                                            <div class="clear"></div></br>
                                            <div class="pull-left classcopyrefLink col-md-12">
                                                <input type="text" id="nrirefLinkU"
                                                    value="<?php echo $_SERVER['REQUEST_URI']; ?>"
                                                    style="display: none;" />

                                            </div>
                                            <div class="clear"></div></br>
                                            <div class="pull-left classcopyrefLink col-md-12">
                                                <input type="text" id="borrowerRefLinkU" style="display: none;"
                                                    value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                                                <div class="newSTH pull-left mobile_View_hide">Share
                                                    <u><b>Borrower</b></u> Referral Link
                                                </div>
                                                <button onclick="copyBorrowerrefLink('#b_partnerUtm');"
                                                    class="btn btn-warning btn-ref-borrower" data-toggle="tooltip"
                                                    title="Share This link" data-placement="bottom">Invite a Borrower <i
                                                        class="fa fa-clipboard fa_copyRefLink"
                                                        aria-hidden="true"></i></button>

                                            </div>
                                            <div class="clear"></div>
                                            </br>
                                            <div class="row text-bold" style="margin-left: 10px; font-size: 16px;">
                                                <p class="mobile_View_hide">How to launch a NeoBank in 3 steps,detail
                                                    site with videos <a
                                                        href="https://sites.google.com/oxyloans.com/neobank/home"
                                                        target="_blank">https://sites.google.com/oxyloans.com/neobank/home</a>
                                                </p>

                                                <div class="clear"></div>
                                                </br>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
            </div>
        </div>
    </div>
    <!-- maincontent ends -->
    <!-- container ends -->
    <!-- wrapper ends -->
    <!-- SET: SCRIPTS -->
    <!--  -->
    <!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
    <!-- END: SCRIPTS -->
    <!-- END: SCRIPTS -->
    <style type="text/css">
    .button {
        right: 40px;
    }

    #content {
        width: 400px;
        height: 200px;
        top: 50px;
    }

    #pragraph {
        position: relative;
    }
    </style>
    <script type="text/javascript">
    $(document).ready(function() {
        noprofileCheck = "no";
        noROICheck = "no";
    });
    </script>
    <div class="modal modal-success fade" id="modal-alreadyDoneSendOffers">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p id="text1">Thank you for referring.</p>
                </div>
                <div class="modal-footer">
                    <div align="right">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal modal-warning fade" id="modal-alreadyDoneSendOffertopartner">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p id="text1">Already lender has registered</p>
                </div>
                <div class="modal-footer">
                    <div align="right">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal modal fade" id="modal-uploadBulkInvite">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </br>
                    <center>
                        <div class="row">
                            <H5>
                                Upload Your Contact's File to Invite a Friends</H5>
                            </BR>
                            <div class="col-sm-11" style="padding-left: 90px;">
                                <div class="panel-body" id="userKYCUpload" enctype="multipart/form-data">
                                    <div class="form-lft kycproofs">
                                        <div class="fld-block upload_pdf">
                                            <input class="custom-file-input CibilFileUpload" data-clickedid=""
                                                type='file' onchange="readBulkInviteThroughDoc(this);" id="idfc"
                                                accept="application/pdf,application/xlsx,application/vnd.ms-excel" />
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </center>
                </div>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-success fade" id="modal-fileUploadedSuccessfully">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <p>
                <h2 style="font-size: 16px;">you have successfully invited your friends through the document file.
                    please check your referral status.</h2>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-previewEmail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Here is the email invitation preview</h4>
            </div>
            <div class="modal-body emailcontent">
                <p>Subject:- <span class="getSubject"></span></p>
                <br />
                <p class="pull-right">Date:- <span class="getDate" style="padding: 0px;"></span></p>
                <br />
                <div class="clear"></div>
                <div class="row">
                    <p>Hi <span class="getfrndName" style="padding: 0px;"></span></p><br />
                    <br />
                    <p class="getEmailMessage quote-text"></p>
                    <br />
                    <p><a href="javascript:void(0)">Please join as a Lender / Investor and start earning monthly
                            income.</a></p>
                    <p></p><br />
                    <p>OxyLoans is founded and run by Mr.RadhakrishnaThatavarti! Please review his linkedin profile, <a
                            href=" https://www.linkedin.com/in/venkata-radhakrishna-thatavarti-214b2a213/"
                            target="_blank"> https://www.linkedin.com/in/venkata-radhakrishna-thatavarti-214b2a213/</a>.
                        <!--  . I am sending this e-mail on my own interest, I have experienced good response directly from the founder and respective team. Please feel free to reach me on 221455225 -->
                    </p><br />
                    <p>
                        Thanks & Regards,<br />
                    <p class="usrNameEmail"></p>
                    </p><br />
                    <p></p><br />
                </div>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script type="text/javascript">
$(document).ready(function() {
    getGmailAuthorization();
    loadUtm();
    emailcontent();
    $(".factive").trigger("click");
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    var input = document.querySelector(".referrerPhoneNUmber");
    window.intlTelInput(input, {
        utilsScript: "build/js/utils.js",
        separateDialCode: true,
        hiddenInput: "full",
        preferredCountries: ["in"],
    });
    $("meta[property='og\\title']").attr("content",
        "Peer to Peer Lending platform || OxyLoans || NRI Registration");
    $('.active').trigger("click");
});
</script>
<link rel="stylesheet" type="text/css" href="../build/css/intlTelInput.css">
<link rel="stylesheet" type="text/css" href="../build/css/intlTelInput.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput.min.js"></script>
<style type="text/css">
.referrerPhoneNUmber {
    width: 100%;
}

.iti {
    width: 100%;
}

.nrilnks {
    margin-top: -25px;
    margin-right: 8px;
}
</style>
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css" rel="stylesheet"/> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
<div class="iti__selected-dial-code" style="display: none"></div>
<?php include 'admin_footer.php';?>