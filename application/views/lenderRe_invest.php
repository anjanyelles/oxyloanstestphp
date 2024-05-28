<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Re-Invest Details
        </h1>
        <div class="pull-left">
            <small>
                <ol class="breadcrumb">
                    <li><a href="idb"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">Re-invest</li>
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


                                                <div class="form-lft trans_block">
                                                    <div class="form-lft form_radio form_check ">
                                                        <div class="st_checkbox no_bdr">
                                                            <label class="checkbox">I want to Re_Lend my EMI's
                                                                <input type="checkbox" value="Active" name="checkbox"
                                                                    id="agreeCheckBox"><span> &nbsp;</span>
                                                            </label>
                                                        </div>
                                                        <span class="error displayautoesignError"
                                                            style="display: none;">Please agree the Re_Lend
                                                            EMI's.</span>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>


                                                <br />
                                                <div class="form-lft trans_block">
                                                    <div class="form-lft form_radio form_check ">
                                                        <div class="st_checkbox no_bdr">
                                                            <label class="checkbox">I have read <a
                                                                    href="https://oxyloans.com/terms-and-conditions/"
                                                                    target="_blank">Terms </a> &amp; <a
                                                                    href="#">Conditions</a>
                                                                <input type="checkbox" value="true" name="checkbox-1"
                                                                    id="agreeCheckBox1"><span> &nbsp;</span>
                                                            </label>
                                                        </div>
                                                        <span class="displayTermsError error"
                                                            style="display: none;">Please agree to the terms and
                                                            conditions.</span>
                                                        <div class="clear"></div>
                                                    </div>

                                                    <div class="clear"></div>
                                                </div>




                                                <!--- buttons ------------------>
                                                <div>
                                                    <button type="button"
                                                        class="btn btn-primary pull-right reinvest-btn"
                                                        id="btn-Reinvest"> Save</button>

                                                    <button type="button"
                                                        class="btn btn-primary pull-right updateReinvest-btn"
                                                        id="updateReinvest-btn"> Update</button>


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

<div class="modal modal-success fade" id="modal-Reinvestsuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>
                    Thanks for ReInvesting your EMIs.You will be notified through mobile and Email when the money is
                    disbursed to the borrowers.</p>
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
<div class="modal modal-success fade" id="modal-ReinvestUpadate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Thanks for Updating the Re-Investment.</p>
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



<div class="modal modal-warning fade" id="modal-notupdatedanythinginpage">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p>There is no any update in the feilds please update feilds.</p>
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
<!--<link rel="stylesheet" href="assets/css/bootstrap.css">
 <link rel="stylesheet" href="assets/css/font-awesome.css"> -->
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
loadReInvestdata();


function showChange() {
    var selected_material = document.getElementById("employmentType").value;
    if (selected_material == "SELFEMPLOYED") {
        document.getElementById("changeText").innerText = "Anuual Income Range";

    } else {
        document.getElementById("changeText").innerText = "Salary Range";

    }
}
</script>

<style type="text/css">
.st_checkbox {
    float: left;
    margin: 0 10px 0 18px;
    width: 30% !important;
}

.st_checkbox .checkbox {
    padding: 5px 0 0 30px !important;
    width: 100%;
}


.updateReinvest-btn,
.reinvest-btn {
    border: none;
    color: white;
    padding: 8px 18px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
    float: right;
    border-radius: 4px;
}
</style>


<?php include 'footer.php';?>