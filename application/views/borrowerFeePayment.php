<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Borrower Fee Payment
        </h1>
        <div class="pull-left" style="display: none;">
            <small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Payments</a></li>
                    <li class="active">EMI</li>
                </ol>
            </small>
        </div>

    </section>
    <div class="cls"></div>
    <!-- Main content -->
    <section class="content">
        <div class="cls"></div>

        <div class="row customFormQ">
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
                        <h3 class="box-title"></h3>
                        <div class="pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Borrower Name</th>
                                    <th>Application No</th>
                                    <th>Loan Amount</th>
                                    <th>Rate of Interest</th>
                                    <th>Tenure</th>
                                    <th>EMI</th>
                                    <th>Fee Amount</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody id="displayRequests" class="displayRequests">
                                <tr id="displayNoRecords" class="displayRequests">
                                    <td colspan="8">No Offers found!</td>
                                </tr>
                                <!-- <td><a href="lenderAcceptedoffers?appNumber={{loanRequestId}}">{{loanRequest}}</a></td>
                -->
                                </tfoot>
                        </table>
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

<script id="displayallRequests" type="text/template">
    {{#data}}
  <tr>
    <td>{{borrowerUser.firstName}} {{borrowerUser.lastName}}</td>
    <td>{{loanRequest}}</td>
    <td>{{offerSentDetails.loanOfferedAmount}}</td>
    <td>{{offerSentDetails.rateOfInterest}}%</td>
    <td>{{offerSentDetails.duaration}}</td>
    <td>{{offerSentDetails.emiAmount}}</td>
    <td>{{offerSentDetails.borrowerFee}}</td>
    <td>
      <a href="#" id="feepay" class="btn btn-info  btn-xs"
      onclick="loadBorrowerFeePayPage({{borrowerUser.id}},{{offerSentDetails.borrowerFee}});"><b>Fee Pay</b></a>
      <a href="#" class="btn btn-success btn-xs" id="feepaidsuccess">
      <b>Fee Paid Successfully</b></a>
      
      
    </td>
  </tr>
  {{/data}}
  </script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".loadingSec").show();
});
setTimeout(function() {
    loadBorrowerFeePayment();
}, 1000);
</script>
<?php include 'footer.php';?>