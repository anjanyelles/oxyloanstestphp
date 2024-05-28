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
                            <div id="stepThreeForm">
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
<script type="text/javascript">
window.onload = loadCreditReport();

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