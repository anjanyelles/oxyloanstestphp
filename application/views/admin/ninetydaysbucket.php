<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ninety days Borrower Loan Applications
        </h1>
    </section><br />

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="borrowerID">Borrower ID</option>
                </select>
            </div>
            <div class="col-xs-3 text-center borrowerid" style="display: none;">
                <input type="text" name="borrowerid" id="borrowerid" class="form-control borrowerid"
                    placeholder="Borrower ID">
            </div>

            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn"
                    onclick="searchforBucketdays(61,90,'90days');">
                    <i class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>

        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Borrower info</h3>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="dashBoardPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                            <div class="searchborrowerPagination pull-right" style="display: none;">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="fright">
                            <button class="btn btn-success" class="downloadReport"
                                onclick="download90daysReport();">Download Report</button>
                        </div><br>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    <th>APP ID</th>
                                    <th>BR ID</th>
                                    <th>BR Name</th>
                                    <th>BR Email & Mobile</th>
                                    <th>Loan offer Amount</th>
                                    <th>View Lenders For this Loan</th>
                                </tr>
                            </thead>

                            <tbody id="loadBorrowersList">


                                </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<script id="loadBorrowersListTpl" type="text/template">
    {{#data}}
      <tr>
      <td>{{applicationId}}</td>
        <td>BR{{borrowerUser.id}}</td>
         <td>{{borrowerUser.firstName}} {{borrowerUser.lastName}}</td>
        <td>{{borrowerUser.mobileNumber}} <br/>{{borrowerUser.email}}  </td>
        <td>{{loanOfferedAmount}}</td>
   

   <td><a href="javascript:void(0)" class="viewLoanLendersforbuckets"onclick="viewbucketLoanLenders(61,90,'90days',{{borrowerUser.id}})" >View Loans</a></td>

      </tr> 


<tr>
  <td style="display:none;" colspan="14" class="viewbucketLoanLenders viewbucketLoanLenders-{{borrowerUser.id}}">

      <div class="col-md-6 pull-right">
                    <div class="interstedPagination1 pull-right">
                      <ul class="pagination bootpag">
                    </ul>
                  </div>

                </div>
        
       <table class="table table-bordered table-hover">
              <thead>
               <tr style="background-color: aqua;">
                  <th>Loan ID</th>
          <th>LR ID & Name</th>
          <th>BR ID & Name</th>
          <th>Loan Details</th>
          <th>Disbursement Date</th>
          <th>90days  bucket pending EMI's</th>
              </tr>
              </thead>
              <tbody id="viewbucketLoanLenders-{{borrowerUser.id}}">                   
               <tr id="displayNoLoanRecords" class="displayNoLoanRecords" >
                    <td colspan="8">No Offers found!</td>
                </tr>  
                </tbody>   
              </tfoot>
            </table>
      </td>

    </tr>
  {{/data}}
</script>


<script id="loadLendersbucketloans" type="text/template">
    {{#data}}
      <tr>
        <td>{{loanId}}</td>
      <td>LR{{lenderUser.id}}<br/>{{lenderUser.firstName}} {{lenderUser.lastName}}</td>
        <td>BR{{borrowerUser.id}}<br/>{{borrowerUser.firstName}} {{borrowerUser.lastName}} </td>


        <td><b>Loan Value</b>: <span>{{loanDisbursedAmount}}</span></td>
        <td>
          {{borrowerDisbursementDate}}
        </td>
      
        <td><a href="javascript:void(0)" class="viewDelayEMIcard" onclick="viewDelayEMIcard(61,90,'90days','{{id}}');">View 90days bucket delay EMI</a>
        </td>
      </tr>
  {{/data}}
</script>


<div class="modal modal fade" id="modal-viewDealyEMItable">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="row">
                    <div class="col-xs-3">
                        <h4 class="modal-title">
                            Loan ID:- <span class="loanIdDisplay"></span>
                        </h4>
                    </div>

                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead style="background-color:#ADD8E6">
                        <tr>
                            <th>EMI No</th>
                            <th>EMI AMT</th>
                            <th>Due on</th>
                            <th>No of Dealy days</th>

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
                <td>{{emiNumber}}</td>
                <td>{{emiAmount}}</td>
                <td>{{emiDueOn}}</td>
                <td>{{daysDiff}}</td>         

</tr>
  {{/data}}
</script>

<div class="modal modal-success fade" id="modal-ninetydaysbucketdownload">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                Ninety days bucket downloaded Successfully .
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
<script type="text/javascript">
window.onload = loadPndingbucketsApplications(61, 90, "90days");
$(document).ready(function() {
    console.log('you are in admin and at borrower apps');
});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>


<?php include 'admin_footer.php';?>