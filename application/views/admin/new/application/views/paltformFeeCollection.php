<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="cls"></div>

    <!-- Main content -->
    <section class="content">



        <div class="cls"></div>
        <div class="col-md-3"></div>
        <div class="col-md-6 customFormQ">
            <div class="cls"></div>
            <div class="pull-right">
                <div class="row">
                    <div class="col-md-12">
                        <div class="acceptedPagination">
                            <ul class="pagination bootpag">
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Pay Platform Fee</h3>
                        <div class="pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body mt20">
                        <div class="row">
                            <div class="col-md-6">App ID:- APPR1234</div>
                            <div class="col-md-6">Loan Value:- INR <span class="loanValueForFee">500000</span></div>

                            <div class="col-md-12 mt20">
                                <div class="col-md-3">
                                    <label class="fleft">Amount</label>
                                </div>
                                <div class="col-md-9">
                                    20000
                                </div>
                            </div>

                            <div class="col-md-12 mt20">
                                <div class="col-md-3">
                                    <label class="fleft">GST + 18%</label>
                                </div>
                                <div class="col-md-9">
                                    3600
                                </div>
                            </div>

                            <div class="col-md-12 mt20">
                                <div class="col-md-3">
                                    <label class="fleft">Payble Amount</label>
                                </div>
                                <div class="col-md-9">
                                    INR <span>23600</span>
                                </div>
                            </div>

                            <div class="col-md-12 mt20">
                                <div class="col-md-3">
                                    <label class="fleft">&nbsp;</label>
                                </div>
                                <div class="col-md-9">
                                    <button class="btn btn-info">Pay Platform Fee</button>
                                </div>
                            </div>

                            <div class="col-md-12 mt20">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6">
                                    Email:- support@oxyloans.com <br />
                                    Mobile: 99 66 88 88 25
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- form start -->

            </div>
            <!-- /.box -->
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->








<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".loadingSec").show();
});
setTimeout(function() {
    loadActiveLoans();
}, 1000);
</script>
<?php include 'footer.php';?>