<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            DashBoard
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Payments</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-xl-3 col-sm-3 mb-xl-0 mb-4">
                <div class="card info-card">
                    <div class="card-body p-3">

                        <div class="col-md-7">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Register</p>
                                <h5 class="font-weight-bolder">
                                    4
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">Total Lenders </span></br>
                                    5
                                </p>
                            </div>
                        </div>
                        <div class="col-md-5 card-footer" style="background-color:#c1cdd9!important">
                            <span class="partner-icon"><i class="ionicons ion-ios-people-outline"></i></i></span>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-3 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">

                        <div class="col-md-7">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Register</p>
                                <h5 class="font-weight-bolder">
                                    5
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">Total Borrower :</span></br>
                                    25
                                </p>
                            </div>
                        </div>
                        <div class="col-md-5 bg-warning card-footer">
                            <span class="partner-icon"><i class="ionicons ion-android-contacts"></i></span>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-3 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">

                        <div class="col-md-7">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Running Loans</p>
                                <h5 class="font-weight-bolder">
                                    10
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">Running Amount</span></br>
                                    15489556
                                </p>
                            </div>
                        </div>
                        <div class="col-md-5 bg-success card-footer">
                            <span class="partner-icon"><i class="ionicons ion-cash"></i></span>



                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-3 mb-xl-0 mb-4 ">
                <div class="card">
                    <div class="card-body p-3">

                        <div class="col-md-7">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">No Closed Loans</p>
                                <h5 class="font-weight-bolder">
                                    5
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">Disbursed Value</span>
                                    4582854546
                                </p>
                            </div>
                        </div>
                        <div class="col-md-5 bg-info card-footer">
                            <span class="partner-icon"><i class="ionicons ion-connection-bars"></i></span>



                        </div>

                    </div>


                </div>
            </div>

        </div>

        <div class="row pull-right partdashFee">
            <p><b> Total Fee Paid to the Platform :</b><span class="platformFee">10000</span></p>
        </div>
        <div class="row col-xs-12">
            <div class="col-md-12 investmentSection">
                <!-- general form elements -->
                <div class="box box-primary" style="margin-top:0px!important">
                    <div class="box-header with-border">
                        <h3 class="box-title">My Earning</h3>
                        <small class="pull-right">
                            <form>
                                <div class="dropdown" style="display:flex!important;">
                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                        data-toggle="dropdown">Choose Status
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Through Lender</a></li>
                                        <li><a href="#">Through Borrower</a></li>
                                        <li><a href="#">Through Referral</a></li>
                                    </ul>
                                </div>
                            </form>
                        </small>
                    </div>
                    <div class="content-wrapperN">
                        <div class="row">
                            <div class="col-md-6 pull-right fontchange invBlock">
                                <span><b>Total Investment :</b></span>
                                <span class="totalInvestment">1000000</span>
                            </div>
                        </div>
                    </div>
                    <!-- form start -->
                    <table class="table table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Register Type</th>
                                <th>Invested Amount</th>
                                <th>Referral Amount</th>
                                <th>Paid Status</th>
                            </tr>
                        </thead>
                        <tbody id="investmentsData">
                            <tr>
                                <td>Liveen</td>
                                <td>Lender</td>
                                <td>50000</td>
                                <td>550</td>
                                <td>Un paid</td>
                            </tr>
                        </tbody>

                    </table>
                    <div class="box-footer">
                        <div class="pull-left">

                            </button>
                        </div>
                        <!--  <div class="downloadReport pull-left">
              <a href="javascript:void(0)">
                <i class="fa fa-file-excel-o"></i>
              </a>
            </div> -->
                        <div class="investmentsPagination pull-right">
                            <ul class="pagination pull-right notopMargin"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <script type="text/javascript">
    window.load = loadpartner();
    </script>

    <?php include 'admin_footer.php';?>