<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            My Loans EMI Earnings
        </h1>
        <div class="pull-left">
            <small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">Loan Requests</li>
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
                        <h3 class="box-title">Running Loans</h3>
                        <div class="pull-right">
                            <!-- 
                  <a href="lenderagreedloans">
                    <button type="button" class="btn btn-success pull-right marR15"><i class="fa fa-angle-double-right"></i> <b>Agreed Loans</b>
                  </button>
                 </a>

                 <a href="lenderrejectedrequests">
                    <button type="button" class="btn btn-warning pull-right marR15"><i class="fa fa-angle-double-right"></i> <b>Rejected Offers</b>
                  </button>
                 </a>
                 
                 <a href="lenderacceptedrequests">
                    <button type="button" class="btn btn-primary pull-right marR15"><i class="fa fa-angle-double-right"></i> <b>Accepted Offers</b>
                  </button>
                 </a>

                 <a href="lenderresponsestoMyrequests?appNumber=787" class="viewLendersOffers">
                    <button type="button" class="btn btn-info pull-right marR15"><i class="fa fa-angle-double-right"></i> <b>Responses to my offer</b>
                  </button>
                 </a>
             -->
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Borrower Name</th>
                                    <th>Application Number</th>
                                    <th>Loan Amount</th>
                                    <th>Rate of Interest</th>
                                    <th>Targeted Profit</th>
                                    <th>EMI Earnings</th>
                                    <th>EMI Info</th>
                                    <!--<th>Loan Released Date</th>-->
                                    <th>Status</th>

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
                  <td class="usrName">{{borrowerUser.firstName}} {{borrowerUser.lastName}}</td>
                  <td>{{loanRequest}}</td>
                  <td>{{loanRequestAmount}}</td>
                  <td>{{rateOfInterest}}%</td>
                  <td>{{profit}}</td>
                   <td>
                    <b>No.Of EMIs Paid</b>: {{noOfEmisPaid}}<br/>
                    <b>No.Of Remaing EMIs </b>: {{noRemaingEmis}}<br/>
                    <b>Total EMIs Amount</b>: {{totalAmountPaid}}<br/>
                    <b>Total EMI Amount Pending</b>: {{totalAmountPending}}
                  </td>
                  <td>
                    <b>Total EMIs</b>: {{duration}}<br/>
                    <b>EMI Amount</b>: {{emiAmount}}<br/>
                    <a href="javascript:void(0)" class="viewEMIcard" onclick="viewEMICARD();" data-loanid = "{{id}}">View EMI Table</a>
                  </td>
                  <td>{{loanStatus}}</td>
                </tr>
            {{/data}}
  </script>




<div class="modal  fade" id="modal-viewEMI">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-9">
                        <h4 class="modal-title">EMI Table</h4><br />If you've any queries please write to us <a
                            href="lenderInquiries">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Loan ID</th>
                            <th>EMI Amount</th>
                            <th>Status</th>
                            <th style="display: none">Pending</th>
                        </tr>
                    </thead>
                    <tbody id="displayEMIRecords">

                        </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>


<script id="emiRecordsCallTpl" type="text/template">
    {{#data}}
      <tr>
        <td>{{loanId}}</td>
        <td>{{emiAmount}}</td>
        <td>{{#emiStatus}}
              <b>Received</b>
            {{/emiStatus}}
            {{^emiStatus}}
              Not Received
            {{/emiStatus}}
        </td>  
        <td style="display: none">
          <a href="" style="color:#FFFFFF;">Update Part EMI</a>
          <input style="display:none;" data-loanId = {{loanId}} class="partupdatingEMI emiStatus{{emiStatus}}" />
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
    loadActiveRunningLoans();
}, 1000);
</script>
<?php include 'footer.php';?>