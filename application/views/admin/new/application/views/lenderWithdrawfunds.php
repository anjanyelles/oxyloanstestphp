<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lender Withdrawal Funds
        </h1>
        <div class="pull-left">
            <small>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dealWithdrawfunds"><i class="fa fa-dashboard"></i> Withdraw From Deal </a></li>
                    <li class="breadcrumb-item"><a href="idb"><i class="fa fa-dashboard"></i> Dashboard </a></li>

                    <li class="breadcrumb-item"> <a href="https://sites.google.com/view/withdrawalfromwallet/home"
                            target="_blank">Help</a></li>
                </ol>
            </small>
        </div>

          <div class="pull-right">
           <a href="dealWithdrawfunds"><button class="btn btn-primary"> <i class="fa fa-angle-double-right"></i> Withdraw From Deals</button></a>
           
        </div>


        </br></br>

        <div class="alert withdrawSuccess" role="alert" style="background-color:orange; display: none;">
            <p class="message-withdrawal">you have already raised the INR <span
                    class="raised-withdrawal-amount">5000</span> withdrawal request, again you want to add INR <span
                    class="new-withdrawal-amount"> INR 1000</span>, your withdrawal request will be INR <span
                    class="added-withdrawal-amount">INR 10000</span>, or update your withdrawal amount will be INR <span
                    class="update-withdrawal-amount"> INR 10000</span>.</p>
            <button class="btn btn-sm addTheWithdraw" onclick="addLenderWithdrawalAmount();">Add</button>
            <button class="btn btn-sm updateTheWithdraw" onclick="addLenderWithdrawalAmount();">Update</button>
        </div>
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

                                                <!------------>
                                                <div class="form-lft trans_block">
                                                    <label>Withdrawal Amount:<em class="mandatory">*</em></label>
                                                    <div class="fld-block account_form upload_pdf">
                                                        <input type="text" placeholder="Withdrawal Amount"
                                                            id="withdrawamount">
                                                        <span class="error WithdrawAmounterror"
                                                            style="display: none;">Please enter Withdraw Amount</span>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <!------------>

                                                <div class="form-lft  trans_block">
                                                    <label>Withdrawal Date:<em class="mandatory">*</em></label>
                                                    <div class="fld-block account_form upload_pdf">
                                                        <input type="text" placeholder="dd/mm/yyyy" id="withdrawDate"
                                                            name="dob" class="text-fld1">
                                                        <i><img src="<?php echo base_url(); ?>assets/images/calender.png"
                                                                alt="calender" id=""></i>
                                                        <span class="error withdrawDaterror"
                                                            style="display: none;">Please select Withdraw Date</span>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>

                                                <!------------>
                                                <div class="form-lft  trans_block">
                                                    <label>Reason:<em class="mandatory">*</em></label>
                                                    <div class="fld-block citydrop">
                                                        <select name="reason" id="reason" class="form-control">
                                                            <option value=""> Select Reason</option>
                                                            <option value="Personal">Personal</option>

                                                        </select>

                                                        <span class="error reasonError" style="display: none;">Select
                                                            the Reason</span>

                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>

                                                <!------------>
                                                <div class="form-lft  mblStars">
                                                    <label>Rating:<em class="mandatory">*</em></label>
                                                    <div class="fld-block account_form upload_pdf">
                                                        <b style="padding-left:12px;">please rate us?</b>
                                                        <div class="rating mblRating" id="rating">

                                                            <input type="radio" id="star5" name="rating" value="5" />
                                                            <label class="full" for="star5"
                                                                title="Awesome - 5 stars"></label>

                                                            <input type="radio" id="star4" name="rating" value="4" />
                                                            <label class="full" for="star4"
                                                                title="Pretty good - 4 stars"></label>

                                                            <input type="radio" id="star3" name="rating" value="3" />
                                                            <label class="full" for="star3"
                                                                title="Meh - 3 stars"></label>

                                                            <input type="radio" id="star2" name="rating" value="2" />
                                                            <label class="full" for="star2"
                                                                title="Kinda bad - 2 stars"></label>


                                                            <input type="radio" id="star1" name="rating" value="1" />
                                                            <label class="full" for="star1"
                                                                title="Sucks big time - 1 star"></label>

                                                        </div>
                                                        <div class="fld-block">
                                                            <span class="error ratingerror"
                                                                style="display: none;">Please give your rating</span>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>

                                                </div>
                                                <!------------>
                                                <div class="form-lft  trans_block">
                                                    <label>Feedback:<em class="mandatory">*</em></label>
                                                    <div class="fld-block account_form upload_pdf">
                                                        <input type="text" placeholder="Feedback" id="feedback">
                                                        <span class="error feedbackerror" style="display: none;">Please
                                                            enter Feedback</span>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>




                                                <!--- buttons ------------------>


                                                <div class="form-lft  trans_block">
                                                    <span><small><span style="color: #c7254e;
    background-color: #f9f2f4; padding: 2px 3px; margin-right: 30px;">Note :</span>Funds will be Credited to your Bank
                                                            account within 7 working days.
                                                        </small></span>

                                                </div>
                                                <div style="margin-top: 20px;">
                                                    <button type="button" class="btn pull-right  btn-info mblStars"
                                                        id="btn-withdrawal" style="margin-right: 20px;"> Submit</button>
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
                <p> Your withdrawal request has been initiated successfully. You will receive mobile and email alerts
                    when the amount is credited to your registered bank account.

                    <br /></br><b>Note: </b>If you raise a request to withdraw funds from the wallet, please note that
                    the funds will be credited to your bank account within 2 to 7 bank working days.
                </p>
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