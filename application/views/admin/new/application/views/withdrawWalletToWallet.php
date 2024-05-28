<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Transfer money from your wallet to another wallet.
        </h1>
        <div class="pull-left">
            <small>
                <ol class="breadcrumb">
                    <li><a href="https://sites.google.com/view/wallet-to-wallet/home" target="_blank"><i
                                class="fa fa-angle-double-right"> </i> Help</a></li>
                    <li><a href="idb"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                    <li class="active">Withdrawa Funds</li>
                </ol>
            </small>
        </div>
    </section>

    <!-- Main content -->


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div>
                            <p class="note_point"><code>
                                Note:
                            </code>
                                You can transfer funds from your wallet to your family's or friend's wallet (this sends
                                a request to admin, and after the approval,funds will be debited from your account and
                                credited to the requested account). </p>
                        </div>

                    </div>

                    <div class="main-cont borrowerprofile">
                        <div class="container">
                            <div class="middle-block">
                                <div class="form-block1 block-loan">
                                    <form id="borrowermobileSection" autocomplete="off" method="post">
                                        <!--  Auto Invest form Starts -->
                                        <div class="step1">
                                            <div class="panel-body " id="userKYCUpload" enctype="multipart/form-data">


                                                <div class="form-lft trans_block">
                                                    <label>Sender Id:<em class="mandatory">*</em></label>
                                                    <div class="fld-block account_form upload_pdf">
                                                        <input type="text" placeholder="Enter Sender Id" id="senderId"
                                                            readonly>
                                                        <span class="error senderIderror" style="display: none;">Please
                                                            Enter Sender Id </span>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>


                                                <div class="form-lft trans_block">
                                                    <label>Receiver Id:<em class="mandatory">*</em></label>
                                                    <div class="fld-block account_form upload_pdf">
                                                        <input type="text" placeholder="Receiver Id" id="receiver">
                                                        <span class="error receivererror" style="display: none;">Please
                                                            Enter Receiver Id</span>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>



                                                <div class="form-lft trans_block">
                                                    <label>Transfer Amount:<em class="mandatory">*</em></label>
                                                    <div class="fld-block account_form upload_pdf">
                                                        <input type="text" placeholder="Transfer Amount"
                                                            id="transferAmount">
                                                 <span class="error transferAmounterror"
                                                             style="display:none;">Please enter Transfer Amount</span>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>

                                                <div style="margin-top: 20px;">
                                                    <button type="button" class="btn pull-right  btn-info mblStars"
                                                        id="btn-withdrawal-w2w" style="margin-right: 20px;"
                                                        onclick="w2wWithdrawal();"> Submit</button>
                                                    <div class="clear"></div>
                                                </div>


                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>



                </div>
            </div>
        </div>
    </section>
    <!-- container ends -->
</div>
<!-- wrapper ends -->

<div class="modal modal-success fade" id="modal-withdrawalfundssuccess-w2w">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>
                    The wallet to wallet transfer was successful. Your withdrawal request has been initiated, and the
                    receiver will receive the wallet amount after OxyAdmin's approval. </p>
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

<div class="modal modal-warning fade" id="modal-withdrawalfundserrorforAmount-w2w">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body">
                <p id="text-w2w">There is no sufficient balance in your wallet to raise a withdrawal request.</p>
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
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

/****** Style Star Rating Widget *****/

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