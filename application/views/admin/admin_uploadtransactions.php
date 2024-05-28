<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<?php
   $urlfromBroweser = $_SERVER['REQUEST_URI'];
  //echo $urlfromBroweser;
  $requestidFromClick =  $_GET['getfornotifications'];
  //$receivedEmailToken = $_GET['emailToken'];
?>

<?php 
    session_start(); // Start the session
    $basePATH_URL = $this->uri->uri_string(); 

    // Check if the user type is set in the session
    if(isset($_COOKIE['sUserType'])) {
        $userType = $_COOKIE['sUserType'];
        
    }
?>     
                                   <?php if ($userType === 'MASTERADMIN'): ?>
        <th>Approve</th>
    <?php endif; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Transaction Details
            <small>Upload Lender Transactions Details</small>
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

                                                <div class="form-group row upload_Block">
                                                    <label class="col-sm-3 col-form-label">Lender ID<em
                                                            class="error">*</em>:</label>
                                                    <div class="col-sm-7 uploadInput">
                                                        <input type="text" placeholder="Lender ID" id="lenderid">

                                                        <span class="error transactionAmounterror"
                                                            style="display: none;">Please enter an amount.</span>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="form-group row upload_Block">
                                                    <label for="name " class="col-sm-3 col-form-label">Virtual Account
                                                        Number<em class="error">*</em>:</label>
                                                    <div class="col-sm-7 uploadInput">
                                                        <input type="text" placeholder="Virtual Account Number"
                                                            id="transactionaccountnumber">

                                                        <span class="error accountNumbererror"
                                                            style="display: none;">Please enter your virtual account
                                                            number.</span>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="form-group row upload_Block">
                                                    <label class="col-sm-3 col-form-label">Transaction Amount<em
                                                            class="error">*</em>:</label>
                                                    <div class="col-sm-7 uploadInput">
                                                        <input type="text" placeholder="Transaction Amount"
                                                            id="transactionamount">

                                                        <span class="error transactionAmounterror"
                                                            style="display: none;">Please enter the transaction
                                                            amount.</span>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="form-group row upload_Block">
                                                    <label class="col-sm-3 col-form-label">Transaction Date<em
                                                            class="error">*</em>:</label>
                                                    <div class="col-sm-7 uploadInput">
                                                        <input type="text" placeholder="dd/mm/yyyy"
                                                            id="transactiondatepicker" name="dob" class="text-fld1">
                                                        <!-- <i><img src="<?php echo base_url(); ?>assets/images/calender.png" alt="calender" id=""></i> -->

                                                        <span class="error transactionDaterror"
                                                            style="display: none;">Please select the transaction
                                                            date.</span>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>


                                                <div class="form-group row upload_Block">
                                                    <label class="col-sm-3 col-form-label">Upload Transaction Screen
                                                        Shot<em class="error">*</em>:</label>
                                                    <div class="col-sm-7">
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
                                            <div class="loadWallet">
                                                <button type="button" class="btn btn-primary" id="btnsrcrowtrn">
                                                    Submit</button>
                                            </div>
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
// loadpersonalallDetails();
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
                <h2 style="font-size: 16px;">File uploaded successfully.</h2>
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
                <p>Your transaction details are saved successfully.</br>
                    please wait for 2s page will refresh automatically
                </p>
            </div>
            <div class="modal-footer">
                <a href="#">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">OK</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-danger fade" id="modal-transactiondanger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
    
            </div>
            <div  class="modal-title">
             
</div>
            <div class="modal-body">
             
            </div>
            <div class="modal-footer">
          
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
$(document).ready(function() {
    $("#transactiondatepicker").datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        // startDate: new Date(),
        changeMonth: true,
        changeYear: true,
        endDate: "today",
    });
});
</script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<?php include 'admin_footer.php';?>