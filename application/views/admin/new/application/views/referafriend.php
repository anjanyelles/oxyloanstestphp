<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Refer a Friend & Earn INR 1000
        </h1>

        <div class="pull-right mobile_reeSection">
            <button onclick="copyrefLink('#refLinkU');" class="btn pull-left btn-success
      btn-ref nrilnks" data-toggle="tooltip" title="Share this link" data-placement="left">
                Invite a Lender <i class="fa fa-user-o fa_copyRefLink" aria-hidden="true"></i></button>
            <button onclick="copyNrirefLink('#nrirefLinkU');" class="btn pull-left btn-primary   btn-ref-nri nrilnks"
                data-toggle="tooltip" title="Share This link" data-placement="right">
                <i class="fa fa-plane nriimage" aria-hidden="true"></i>Invite an NRI</button>
            <button onclick="copyBorrowerrefLink('#borrowerRefLinkU');"
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
                                <div class="reffrimg pull-left col-xs-3 disPlayNone">
                                    <img src="<?php echo base_url(); ?>/assets/images/ir.gif" alt="Refer a Friend"
                                        height="100" />
                                </div>
                                <div class="pull-left col-xs-9 emailcontent">
                                    <ul>
                                         <li>Lenders who are eligible for a Lifetime fee waiver/ paid annual fee are only eligible for the Referral bonus!!</li>

                                           <li>Every lender can refer and the referral bonus is calculated for them, but it will be paid once they become eligible  </li>

                                        <li>Let's grow as a family while you engage with OXYLOANS' lending platform. We
                                            can become a support system for each other in all circumstances.</li>
                                        <li>Every time your friend lends money, both you and your friend will benefit.
                                            Your friend will earn interest on the lent amount, and you will receive a
                                            Reference Fee based on the example below:</li>


                                        <li>For instance, you referred XYZ, and when XYZ joined the platform and lent
                                            INR 3,00,000, here's how your Reference Fee would be calculated,For the
                                            first INR 1,00,000, you will get INR 1000.
                                            For the second INR 1,00,000, you will get INR 100.
                                            For the third INR 1,00,000, you will get INR 100.
                                            In total, you will receive INR 1200 as your Reference Fee.
                                        </li>
                                        <li class="disPlayNone">For more information and frequently asked questions,
                                            please visit<a
                                                href="https://sites.google.com/oxyloans.com/oxyloansfaq/referral-faq?authuser=0"
                                                target="_blank"> FAQS / MORE </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="row referralText" style="margin-left: 20px;">
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
                                                                <span><b>Friend's Name:</b><em
                                                                        class="mandatory">*</em></span>
                                                                <input type="text" placeholder="Enter The Name"
                                                                    id="refereename">
                                                                <span class="error name" style="display: none;">Please
                                                                    enter The name</span>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                        <div class="form-lft">
                                                            <div class="account_form upload_pdf leftsecblkreff">
                                                                <span><b>Friend's Email:</b><em
                                                                        class="mandatory">*</em></span>
                                                                <input type="text" placeholder=" Enter The Email Id "
                                                                    id="referemail">
                                                                <span class="error email" style="display: none;">Please
                                                                    Enter The Email Id </span>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        <div class="form-group row ">
                                                            <div class="col-sm-12">
                                                                <label for="typeofReferrer"
                                                                    class="col-sm-6 col-form-label">Friend's
                                                                    Location:</label>

                                                                <input type="radio" name="referrerType"
                                                                    id="referrerNON-NRI" value="NONNRI">
                                                                <span class="Rtype"><b>India</b></span>

                                                                <input type="radio" name="referrerType" id="referrerNRI"
                                                                    value="NRI"
                                                                    style="margin-top:4px; margin-left: 40px;">
                                                                <span class="Rtype"><b>NRI</b></span>
                                                            </div>
                                                            <span class="error chooseReferrerType"
                                                                style="display: none; margin-left: 30px;">Please select
                                                                Referrer Type</span>
                                                        </div>
                                                        <div class="form-group row ">
                                                            <div class="col-sm-12">
                                                                <label for="typeofReferrer"
                                                                    class="col-sm-6 col-form-label">Keep me in cc:</label>

                                                                <input type="radio" name="userinviation"
                                                                    id="userinvite-yes" value="YES">
                                                                <span class="Rtype"><b>Yes</b></span>

                                                                <input type="radio" name="userinviation" id="userinvite-no"
                                                                    value="NO"
                                                                    style="margin-top:4px; margin-left: 40px;">
                                                                <span class="Rtype"><b>No</b></span>
                                                            </div>
                                                            <span class="error chooseuserInviteType"
                                                                style="display: none; margin-left: 30px;">Please choose the invitation type.</span>
                                                        </div>
                                                        <div class="form-lft">
                                                            <div class="account_form upload_pdf leftsecblkreff">
                                                                <label>Email Subject:<em
                                                                        class="mandatory">*</em></label>
                                                                <input type="text" placeholder="Enter The Mail Subject"
                                                                    id="mailSubject">
                                                                <span class="error mailSubject"
                                                                    style="display: none;">Please enter The Email
                                                                    Subject</span>
                                                                <input type="hidden" id="emailsubject">
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="pull-left col-xs-5 mobile_ref_7">
                                                        <div class="form-lft">
                                                            <div class="account_form upload_pdf leftsecblkreff">
                                                                <span><b>Friend's Mobile Number:</b><em
                                                                        class="mandatory">*</em></span>
                                                                <input type="text" placeholder="Enter The Mobile Number"
                                                                    id="refereemobilenumnber"
                                                                    class="referrerPhoneNUmber">
                                                                <span class="error mobilenumber"
                                                                    style="display: none;">Please enter The mobile
                                                                    Number</span>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                        <div class="form-lft">
                                                            <label>Email Content:<em class="mandatory">*</em></label>
                                                            <textarea class="form-control" cols="10" rows="6"
                                                                placeholder="Email content" id="mailcontent"></textarea>
                                                            <span class="error mailcontent"
                                                                style="display: none;">Please enter The Email
                                                                content</span>
                                                            <input type="hidden" id="emailcontent">
                                                            <input type="hidden" id="buttomemailcontent">
                                                        </div>
                                                    </div>

                                                    <div class="pull-left col-xs-2 sbtBtnsPs">
                                                        <div class="pull-right">

                                                            <button type="button" class="btn btn-lg btn-secondary"
                                                                id="viewPreview"><b>Preview</b></button>

                                                            <button type="button" class="btn btn-lg btn-success"
                                                                id="referee-submit-btn">Invite</button>
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
                                        <div class="browseContent pull-left">
                                            <b>
                                                <p><code>Note:</code> The file format should be .xlsx, The columns in
                                                    Excel should be arranged as follows: Column 1: Name, Column 2:
                                                    Email, Column 3: Phone Number.
                                                </p>
                                            </b>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="settings">
                                        <div class="row mobile_ResReff">
                                            <div class="pull-left classcopyrefLink col-md-12">
                                                <div>
                                                    <input type="text" id="refLinkU"
                                                        value="<?php echo $_SERVER['REQUEST_URI']; ?>"
                                                        style="display: none;" />
                                                    <div class="newSTH pull-left">Share Referral Link</div>
                                                    <button onclick="copyrefLink('#refLinkU');" class="btn btn-success
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
                                                <div class="newSTH pull-left">Share <u><b>NRI</b></u> Referral Link
                                                </div>
                                                <button onclick="copyNrirefLink('#nrirefLinkU');"
                                                    class="btn btn-primary  btn-ref-nri" data-toggle="tooltip"
                                                    title="Share This link" data-placement="right"><i
                                                        class="fa fa-plane nriimage" aria-hidden="true"></i> Invite an
                                                    NRI</button>
                                            </div>
                                            <div class="clear"></div></br>
                                            <div class="pull-left classcopyrefLink col-md-12">
                                                <input type="text" id="borrowerRefLinkU" style="display: none;"
                                                    value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                                                <div class="newSTH pull-left">Share <u><b>Borrower</b></u> Referral Link
                                                </div>
                                                <button onclick="copyBorrowerrefLink('#borrowerRefLinkU');"
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
                                                    <button onclick="copyrefLink('#refLinkU');" class="btn pull-left btn-success
                                                    btn-ref btn-md" data-toggle="tooltip" title="Share this link"
                                                        data-placement="left">
                                                        Invite a Lender <i class="fa fa-user-o fa_copyRefLink"
                                                            aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                            <div class="clear"></div></br>
                                            <div class="pull-left classcopyrefLink col-md-12">
                                                <input type="text" id="nrirefLinkU"
                                                    value="<?php echo $_SERVER['REQUEST_URI']; ?>"
                                                    style="display: none;" />
                                                <div class="newSTH pull-left">Share <u><b>NRI</b></u> Referral Link
                                                </div>
                                                <button onclick="copyNrirefLink('#nrirefLinkU');"
                                                    class="btn btn-primary btn-md  btn-ref-nri" data-toggle="tooltip"
                                                    title="Share This link" data-placement="right"><i
                                                        class="fa fa-plane nriimage" aria-hidden="true"></i> Invite an
                                                    NRI</button>
                                            </div>
                                            <div class="clear"></div></br>
                                            <div class="pull-left classcopyrefLink col-md-12">
                                                <input type="text" id="borrowerRefLinkU" style="display: none;"
                                                    value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                                                <div class="newSTH pull-left mobile_View_hide">Share
                                                    <u><b>Borrower</b></u> Referral Link
                                                </div>
                                                <button onclick="copyBorrowerrefLink('#borrowerRefLinkU');"
                                                    class="btn btn-warning btn-ref-borrower" data-toggle="tooltip"
                                                    title="Share This link" data-placement="bottom">Invite a Borrower <i
                                                        class="fa fa-clipboard fa_copyRefLink"
                                                        aria-hidden="true"></i></button>

                                            </div>
                                            <div class="clear"></div>
                                            </br>
                                            <div class="row text-bold mobile_View_hide"
                                                style="margin-left: 10px; font-size: 16px;">
                                                <p>How to launch a NeoBank in 3 steps,detail site with videos <a
                                                        href="https://sites.google.com/oxyloans.com/neobank/home"
                                                        target="_blank">: Click Here</a></p>

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
    <link rel="stylesheet" href="assets/css/selectize.default.css">
    <link rel="stylesheet" href="assets/css/dd.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!--<link rel="stylesheet" href="assets/css/font-awesome.css"> -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
    <script src="<?php echo base_url(); ?>assets/js/myscript.js?oxyloans=<?php echo time(); ?>"></script>
    <script src="<?php echo base_url(); ?>assets/js/animation.js?oxyloans=<?php echo time(); ?>"></script>
    <script src="<?php echo base_url(); ?>assets/js/selectize.js?oxyloans=<?php echo time(); ?>"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.dd.js?oxyloans=<?php echo time(); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>
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
    emailcontent();
    $(document).ready(function() {
        noprofileCheck = "no";
        noROICheck = "no";
    });
    </script>

    
    <div class="modal modal-success fade modal-referred" id="modal-alreadyDoneSendOffers">
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
    <div class="modal modal-warning fade" id="modal-alreadyDoneSendOffer">
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
                <h4 class="modal-title"> Here is the email invitation preview</h4>
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
                    <p class="">

                        Hope this message finds you well. I wanted to share an exciting opportunity that I came across
                        recently. It's about peer-to-peer lending through a platform called OxyLoans. I know you're
                        always looking for ways to explore new investment avenues, and this one seems promising.

                        OxyLoans is an RBI-approved platform allowing individuals to lend money and earn profits as a
                        bank operates. I've been using it for some time now and have had a positive experience. By
                        investing in multiples of INR 50,000 across various deals, I've been able to distribute risk and
                        maximize my monthly profits.
                        On average, I'm earning around 1.75% per month, and some of my friends from renowned MNCs have
                        also started investing and are seeing great returns. If you're interested, you can check out the
                        platform and get in touch with the founder, Mr. Radhakrishna Thatavarti, who has been very
                        responsive.
                    </p>
                    <br />
                    <p><a href="javascript:void(0)">Please join as a Lender / Investor and start earning monthly
                            income.</a></p>
                    <p></p><br />
                    <p>Take a look at his LinkedIn profile <a
                            href=" https://www.linkedin.com/in/venkata-radhakrishna-thatavarti-214b2a213/"
                            target="_blank"> https://www.linkedin.com/in/venkata-radhakrishna-thatavarti-214b2a213/</a>.

                        Feel free to reach out if you want more details or have any questions. It could be a great
                        opportunity to earn some passive income.
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



<div class="modal modal-warning fade" id="modal-fileNotUploadedData">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">!Oops</h4>
            </div>
            <div class="modal-body">
                <p>
                <h2 style="font-size: 16px;">file not uploaded</h2>
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


<script type="text/javascript">
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script type="text/javascript">
$(document).ready(function() {
     window.onload=getUserDetails();
    getGmailAuthorization();
    $(".factive").click();
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
<link rel="stylesheet" type="text/css" href="build/css/intlTelInput.css">
<link rel="stylesheet" type="text/css" href="build/css/intlTelInput.min.css">
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

<?php include 'footer.php';?>