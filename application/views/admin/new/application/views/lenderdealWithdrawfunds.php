<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealId =  isset($_GET['dealId']) ? $_GET['dealId'] : '0';
$currentAmount =  isset($_GET['currentAmount']) ? $_GET['currentAmount'] : '0';
$requestedAmount =  isset($_GET['requestedAmount']) ? $_GET['requestedAmount'] : '0';
$dealName =  isset($_GET['dealName']) ? $_GET['dealName'] : '';
$roi =  isset($_GET['roi']) ? $_GET['roi'] : '';
?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Withdrawal Deal Funds
        </h1>
        <div class="pull-left">
            <small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">Withdrawal Funds</li>
                </ol>
            </small>
        </div></br></br>

        <input type="hidden" name="raised-withdrawal-amount" id="withdrawalAmount">
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
                                        <!--  Auto Invest form Starts -->
                                        <div class="step1">
                                            <div class="panel-body " id="userKYCUpload" enctype="multipart/form-data">

                                                <div class="form-lft  trans_block">
                                                    <label>Deal Name:<em class="mandatory">*</em></label>
                                                    <div class="fld-block account_form upload_pdf">
                                                        <input type="text" placeholder="enter Deal name" id="dealName"
                                                            value="<?php  echo $dealName ?>" readOnly>
                                                        <span class="error feedbackerror" style="display: none;">Please
                                                            enter Deal Name</span>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>

                                                <div class="form-lft trans_block">
                                                    <label>Deal ID:<em class="mandatory">*</em></label>
                                                    <div class="fld-block account_form upload_pdf">
                                                        <input type="text" placeholder="Deal Id" id="withdrawDealId"
                                                            value="<?php  echo $dealId ?>" readOnly>
                                                        <span class="error WithdrawDealerror"
                                                            style="display: none;">Please enter Withdraw Deal ID</span>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>

                                                <div class="form-lft trans_block">
                                                    <label>ROI:<em class="mandatory">*</em></label>
                                                    <div class="fld-block account_form upload_pdf">
                                                        <input type="text" placeholder="ROI Id" id="roi"
                                                            value="<?php  echo $roi ?>" readOnly>
                                                        <span class="error Withdrawroierror"
                                                            style="display: none;">Please enter roi</span>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>


                                                <div class="form-lft trans_block">
                                                    <label>Participated Amount:<em class="mandatory">*</em></label>
                                                    <div class="fld-block account_form upload_pdf">
                                                        <input type="text" placeholder="Participated Amount"
                                                            id="ParticipatedAmount"
                                                            value="<?php  echo $currentAmount ?>" readOnly>
                                                        <span class="error WithdrawAmounterror"
                                                            style="display: none;">Please enter Participated
                                                            Amount</span>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                    <input type="hidden" name="requestedAmount" value="<?php
                          echo $requestedAmount?>" id="dealRequestedAmount">
                                                </div>



                                                <div class="form-lft trans_block">
                                                    <label>Withdrawal Amount:<em class="mandatory">*</em></label>
                                                    <div class="fld-block account_form upload_pdf">
                                                        <input type="text" placeholder="Withdrawal Amount"
                                                            id="dealwithdrawamount">
                                                        <span class="error dealWithdrawAmounterror"
                                                            style="display: none;">Please enter Withdrawal Amount</span>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>



                                                <div>


                                                    <span><small><span style="color: #c7254e;
                  background-color: #f9f2f4; padding: 2px 3px; margin-right: 30px;">Note :</span>Funds Will be Credited
                                                            to your bank account within 30 working days.
                                                        </small></span>
                                                </div>
                                                <div class="mobile_btn_p">
                                                    <button type="button" class="btn pull-right btnWithdraw"
                                                        id="btn-withdrawDealFunds">Submit</button>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- maincontent ends -->

                </div>
            </div>
        </div>
    </section>
    <!-- container ends -->
</div>
<!-- wrapper ends -->
<div class="modal modal-success fade" id="modal-withdrawalfundssuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>
                    Your withdrawal request has been initiated successfully. You will receive mobile and email alerts
                    once the amount is credited to your registered bank account. <br /><br />

                    <b>Note:</b> If you raise a request to withdraw funds from a deal, please note that the funds will
                    be credited to your bank account within 30 working days.
                </p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <a href="idb">
                        <button type="button" class="btn btn-default btn-sm">OK</button></a>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-warning fade" id="modal-withdrawalfundserrorforAmount">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body">
                <p id="text1">There is no sufficient balance in your wallet to raise a withdrawal request.</p>
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


<div class="modal modal-warning fade" id="modal-withdrawal-error-messages">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="model-body modal-body-withdraw">
                <span id="withdrawdeal"></span>
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
<!-- SET: SCRIPTS -->
<link rel="stylesheet" href="assets/css/selectize.default.css">
<link rel="stylesheet" href="assets/css/dd.css">
<link rel="stylesheet" href="assets/css/animate.css">
<link rel="stylesheet" href="assets/css/responsive.css">
<link rel="stylesheet" href="assets/css/bootstrap.css">
<!--<link rel="stylesheet" href="assets/css/font-awesome.css"> -->
<link rel="stylesheet" href="assets/css/style.css">
<script src="<?php echo base_url(); ?>assets/js/myscript.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/animation.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/selectize.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dd.js?oxyloans=<?php echo time(); ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>
<style type="text/css">
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

.rating {
    border: none;
    float: left;
}

.rating>input {
    display: none;
}

.rating>label:before {
    margin: 5px;
    font-size: 1.25em;
    font-family: FontAwesome;
    display: inline-block;
    content: "\f005";
}

.rating>.half:before {
    content: "\f089";
    position: absolute;
}

.rating>label {
    color: #ddd;
    float: right;
}

/***** CSS Magic to Highlight Stars on Hover *****/
.rating>input:checked~label,
/* show gold star when clicked */
.rating:not(:checked)>label:hover,
/* hover current star */
.rating:not(:checked)>label:hover~label {
    color: #FFD700;
}

/* hover previous stars in list */
.rating>input:checked+label:hover,
/* hover current star when changing rating */
.rating>input:checked~label:hover,
.rating>label:hover~input:checked~label,
/* lighten current selection */
.rating>input:checked~label:hover~label {
    color: #FFED85;
}

.withdraw {
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
    window.onload = getWithdrawCondition();
    $('#withdrawDate').datepicker({
        todayHighlight: true,
        dateFormat: 'dd/mm/yy',
        startDate: new Date(),
        changeMonth: true,
        changeYear: true,
        autoclose: true,
        minDate: 0
    });
});
</script>
<?php include 'footer.php';?>