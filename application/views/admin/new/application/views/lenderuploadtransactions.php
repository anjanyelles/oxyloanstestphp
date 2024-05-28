<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Transaction Details
            <small>Upload Your Transactions Details</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <!-- maincontent starts -->
                    <div class="main-cont borrowerprofile">
                        <div class="container">
                            <div class="middle-block">
                                <div class="form-block1 block-loan">
                                    <form id="borrowermobileSection" autocomplete="off" method="post">
                                        <div class="step1">
                                            <!-- Upload transaction form Starts -->

                                            <div class="panel-body" id="userKYCUpload" enctype="multipart/form-data">

                                                <div class="form-lft trans_block">
                                                    <label>Virtual Account Number:<em class="mandatory">*</em></label>
                                                    <div class="fld-block account_form upload_pdf">
                                                        <input type="text" placeholder="Account Number"
                                                            id="transactionaccountnumber" readonly="true">

                                                        <span class="error accountNumbererror"
                                                            style="display: none;">Please enter SCROW Account
                                                            Number</span>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="form-lft">
                                                    <label>Transaction Amount:<em class="mandatory">*</em></label>
                                                    <div class="fld-block account_form upload_pdf">
                                                        <input type="text" placeholder="Transaction Amount"
                                                            id="transactionamount">

                                                        <span class="error transactionAmounterror"
                                                            style="display: none;">Please enter Amount</span>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="form-lft">
                                                    <label>Transaction Date:<em class="mandatory">*</em></label>
                                                    <div class="fld-block account_form upload_pdf">
                                                        <input type="text" placeholder="dd/mm/yyyy"
                                                            id="transactiondatepicker" name="dob" class="text-fld1">

                                                        <i><img src="<?php echo base_url(); ?>assets/images/calender.png"
                                                                alt="calender" id=""></i>

                                                        <span class="error transactionDaterror"
                                                            style="display: none;">Please select Transaction Date</span>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>

                                                <div class="form-lft kycproofs">
                                                    <label>Upload Transaction Screen Shot:</label>
                                                    <div class="fld-block upload_pdf">

                                                        <input
                                                            class="custom-file-input transactionUpload pan-file-upload-content"
                                                            id="pan" type='file'
                                                            onchange="uploadScrowTransactionScreesShot(this);"
                                                            onclick="$('.transactionUpload')" accept="image/*" />
                                                        <a href="#" class="transactiondetailsId"
                                                            onclick="downLoadTransactionSS('TRANSACTIONSS')"> </a>
                                                        <input type="hidden" id="documnetId"> </a>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>

                                            </div>

                                            <button type="button" class="btn btn-primary pull-right" id="btnsrcrowtrn">
                                                Submit</button>
                                            <div class="clear"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
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





<script type="text/javascript">
loadpersonalallDetails();

$(document).ready(function() {
    noprofileCheck = "no";
    noROICheck = "no";

});
</script>



<div class="modal modal-success fade" id="modal-fileUploadedSuccessfully">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <p>
                <h2>File uploaded successfully.</h2>
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



<div class="modal modal-success fade" id="modal-transactionSuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Your transaction details are saved successfully.</p>
            </div>
            <div class="modal-footer">
                <a href="#">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal"
                        onclick="location.href='mywallettransactionslist'">OK</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<?php include 'footer.php';?>