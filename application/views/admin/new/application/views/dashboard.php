<?php include 'header.php';?>
<?php include 'sidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="loadingFirstSet">
            amountDisbursed: <span class="amountDisbursed">0</span><br />
            interestPaid: <span class="interestPaid">0</span><br />
            noOfActiveLoans: <span class="noOfActiveLoans">0</span><br />
            noOfClosedLoans: <span class="noOfClosedLoans">0</span><br />
            noOfDisbursedLoans: <span class="noOfDisbursedLoans">0</span><br />
            noOfFailedEmis: <span class="noOfFailedEmis">0</span><br />
            noOfLoanRequests: <span class="noOfLoanRequests">0</span><br />
            outstandingAmount: <span class="outstandingAmount">0</span><br />
            principalReceived: <span class="principalReceived">null</span><br />
            totalTransactionFee: <span class="totalTransactionFee">0</span>
        </div><br />
        <h1>
            Dashboard
        </h1>
        <div class="pull-left">
            <small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </small>
        </div>
        <div class="pull-right">
            <a href="newloan.php">
                <button type="button" class="btn btn-success pull-right"><i class="fa fa-angle-double-right"></i>
                    <b>Apply for a Loan</b>
                </button>
            </a>
            <a href="agreedLoans.php">
                <button type="button" class="btn btn-primary pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Agreed Loans</b>
                </button>
            </a>
        </div>
    </section>
    <div class="cls"></div>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3 class="requestedloansID">015</h3>

                        <p class="requestedloansAmount"><b>INR</b> 1500000</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-apps"></i>
                    </div>
                    <a href="#" class="small-box-footer">Requested Loans <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3 class="runningloans">8</h3>

                        <p class="runningloansAmount"><b>INR</b> 120000</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">Running Loans <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3 class="acceptedoffers">04</h3>

                        <p>Accepted offers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3 class="rejectedoffers">02</h3>

                        <p>Rejected offers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-stalker"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <a href="javascript:void(0)" class="viewmorestats pull-right">View More Stats</a>
            <a href="javascript:void(0)" class="hideStats pull-right" style="display: none;">Show Less Stats</a>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <div class="row moreStatsDisplay" style="display: none;">
        <!-- CARD -->
        <div class="col-lg-3 col-12 amtdisb">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-rocket success font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="amountDisbursed">64.89 %</h3>
                                <span>Amount Disbursed</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CARD ENDS -->


        <!-- CARD -->
        <div class="col-lg-3 col-12">
            <div class="card amtdis">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-hand-o-right success font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="availableForInvestment">64.89 %</h3>
                                <span>Aval for Investment</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CARD ENDS -->

        <!-- CARD -->
        <div class="col-lg-3 col-12">
            <div class="card intPid">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-arrow-up success font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="interestPaid">64.89 %</h3>
                                <span>Interest Received</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CARD ENDS -->

        <!-- CARD -->
        <div class="col-lg-3 col-12">
            <div class="card failemis">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-bell success font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="noOfFailedEmis">64.89 %</h3>
                                <span>No. Of EMIs failed</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CARD ENDS -->

        <!-- CARD -->
        <div class="col-lg-3 col-12">
            <div class="card amtdis">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-exchange success font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="noOfLoanRequests">64.89 %</h3>
                                <span>No.Of Loan requests</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CARD ENDS -->


        <!-- CARD -->
        <div class="col-lg-3 col-12">
            <div class="card intPid">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-eye success font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="outstandingAmount">64.89 %</h3>
                                <span>Outstanding Amount</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CARD ENDS -->

        <!-- CARD -->
        <div class="col-lg-3 col-12">
            <div class="card failemis">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-dot-circle-o success font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="principalReceived">64.89 %</h3>
                                <span>Principal Received</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CARD ENDS -->

        <!-- CARD -->
        <div class="col-lg-3 col-12">
            <div class="card amtdisb">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-money success font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="totalTransactionFee">64.89 %</h3>
                                <span>Fee Paid</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CARD ENDS -->
    </div>


    <div class="cls"></div>
    <section class="content-header">
        <h1>
            Latest lending commitments
        </h1>
        <div class="row customFormQ">
            <!-- left column -->
            <div class="col-md-12">
                <div class="cls"></div>
                <div class="pull-right">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="pagination marR15">
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="cls"></div>


                <!-- box 1 -->
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-gray">
                            <h3 class="widget-user-username">AleXXXrXXXio</h3>
                            <h5 class="widget-user-desc">LR1001243</h5>
                            <h5 class="widget-user-desc">Funds:- 45000</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="dist/img/user1-128x128.jpg" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">50,000</h5>
                                        <span class="description-text">committed</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">26%</h5>
                                        <span class="description-text">Interest</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">23/04/18</h5>
                                        <span class="description-text">Lends on</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="cls"></div>
                            <div class="box-footer">
                                <div class="pull-left">
                                    <span class="secduration">Duration : 6 months</span>
                                </div>
                                <div class="pull-right">
                                    <a href="viewLoanOffer.php"><button type="submit" class="btn btn-primary">View Loan
                                            Offer</button></a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <!-- box 1 ends -->

                <!-- box 1 -->
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-gray">
                            <h3 class="widget-user-username">AleXXXrXXXio</h3>
                            <h5 class="widget-user-desc">LR1001943</h5>
                            <h5 class="widget-user-desc">Funds:- 15000</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="dist/img/user7-128x128.jpg" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">50,000</h5>
                                        <span class="description-text">committed</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">36%</h5>
                                        <span class="description-text">Interest</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">23/04/18</h5>
                                        <span class="description-text">Lends on</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="cls"></div>
                            <div class="box-footer">
                                <div class="pull-left">
                                    <span class="secduration">Duration : 12 months</span>
                                </div>
                                <div class="pull-right">
                                    <a href="viewLoanOffer.php"><button type="submit" class="btn btn-primary">View Loan
                                            Offer</button></a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <!-- box 1 ends -->

                <!-- box 1 -->
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-gray">
                            <h3 class="widget-user-username">SdfXXXrXXXio</h3>
                            <h5 class="widget-user-desc">LR1002017</h5>
                            <h5 class="widget-user-desc">Funds:- 75000</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="dist/img/user7-128x128.jpg" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">50,000</h5>
                                        <span class="description-text">committed</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">40%</h5>
                                        <span class="description-text">Interest</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">23/04/18</h5>
                                        <span class="description-text">Lends on</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="cls"></div>
                            <div class="box-footer">
                                <div class="pull-left">
                                    <span class="secduration">Duration : 8 months</span>
                                </div>
                                <div class="pull-right">
                                    <a href="viewLoanOffer.php"><button type="submit" class="btn btn-primary">View Loan
                                            Offer</button></a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <!-- box 1 ends -->



            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
window.onload = loadborrowerDashboardData;
</script>
<!-- /.content-wrapper -->
<?php include 'footer.php';?>