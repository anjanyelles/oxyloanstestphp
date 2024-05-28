<!-- Content Wrapper. Cotains page content -->
<?php
   $urlfromBroweser = $_SERVER['REQUEST_URI'];
  //echo $urlfromBroweser;
  $requestidFromClick =  $_GET['loanid'];
  //$receivedEmailToken = $_GET['emailToken'];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            View Loan Offer
            <span class="requestidFromClick hide"><?php echo $requestidFromClick?></span>

        </h1>
        <div class="pull-left">
            <small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Loan Listings</a></li>
                    <li class="active">View Loan Offer</li>
                </ol>
            </small>
        </div>
        <div class="pull-right">
            <a href="loanlistings">
                <button type="button" class="btn btn-primary pull-right marR15"><i class="fa fa-angle-double-left"></i>
                    <b>Back to Loan listings</b>
                </button>
            </a>
        </div>
    </section>
    <div class="cls"></div>
    <!-- Main content -->
    <section class="content">
        <div class="row customFormQ">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">View Loan Offer</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Description</th>
                                <th>Info</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Application Number</td>
                                <td>
                                    <span class="loanRequest">APLR100187</span>
                                </td>
                            </tr>

                            <tr>
                                <td>2.</td>
                                <td>Application Amount</td>
                                <td>
                                    <span class="loanRequestAmount">50000</span>
                                </td>
                            </tr>


                            <tr>
                                <td>3.</td>
                                <td>Applicant Balance Amount</td>
                                <td>
                                    <span class="">45000</span>
                                </td>
                            </tr>

                            <tr>
                                <td>4.</td>
                                <td>Loan Duration</td>
                                <td>
                                    <span class="duration"> 24</span> Months
                                </td>
                            </tr>

                            <tr>
                                <td>5.</td>
                                <td>Re-Payment Method</td>
                                <td>
                                    <span class="repaymentMethod"> Principal Interest Flat</span>
                                </td>
                            </tr>


                            <tr>
                                <td>6.</td>
                                <td>Funds release date</td>
                                <td>
                                    <span class="loanRequestedDate"> 23-Apr-2018</span>
                                </td>
                            </tr>

                            <tr>
                                <td>7.</td>
                                <td>Rate of Interest per Annam </td>
                                <td>
                                    <span class="rateOfInterest"> 16.00% </span>
                                </td>
                            </tr>

                            <tr>
                                <td>8.</td>
                                <td>Application Status</td>
                                <td>
                                    Lending Committed
                                </td>
                            </tr>


                            <tr>
                                <td>9.</td>
                                <td>Description</td>
                                <td>
                                    <span class="loanPurpose"> Personal Loan</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="pull-right">

                                        <a href="createloanrequest">
                                            <button type="button" class="btn btn-success pull-right "><i
                                                    class="fa fa-angle-double-right"></i> <b>Send Offer</b>
                                            </button>
                                        </a>

                                        <a href="loanlistings">
                                            <button type="button" class="btn btn-primary pull-left marR15"><i
                                                    class="fa fa-angle-double-right"></i> <b>Back to Loan Listings</b>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script type="text/javascript">
loadviewLoanoffer();
</script>
<?php include 'footer.php';?>