<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Current Month Pending EMIs
        </h1>
    </section><br />

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="appID">Application ID</option>
                    <option value="borrowerID">Borrower ID</option>
                </select>
            </div>
            <div class="col-xs-3 text-center applicationid" style="display: none;">
                <input type="text" name="applicationid" class="form-control applicationid" id="applicationid"
                    placeholder="Application ID">
            </div>
            <div class="col-xs-3 text-center borrowerid" style="display: none;">
                <input type="text" name="borrowerid" id="borrowerid" class="form-control borrowerid"
                    placeholder="Borrower ID">
            </div>

            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn"
                    onclick="searchsforpendingEmis('current')">
                    <i class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>

        </div>


        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Current Month Pending EMIs</h3>
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
                            <button class="btn btn-success" data-varName="downloadPendingEMIInfo" class="downloadReport"
                                onclick="downloadReportClick();">Download Report</button>
                            <div id="downloadPendingEMIInfo" style="display: none;"></div>
                        </div><br>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    <th>App ID</th>
                                    <th>BR ID</th>
                                    <th>Name</th>
                                    <th>Email & mobile number</th>
                                    <th>City</th>
                                    <th>Disbursement Amount</th>
                                    <th>View Lenders For this Loan</th>
                                </tr>
                            </thead>
                            <tbody id="loadPendingEMIsList">

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

<script id="loadPendingEMIsListTpl" type="text/template">
    {{#data}}
     <tr>
      <td>{{applicationNumber}}</td>
      <td>BR{{borrowerUserId}}</td>
      <td>{{borrowerName}}</td>
      <td>{{email}} <br/>{{mobileNumber}} </td>
      <td>{{city}}</td>
      <td>{{disburmentAmount}}</td>
          <td><a href="javascript:void(0)" class="viewLoanLendersforpendingemis"onclick="viewLoanLendersforpendingemis('current',{{borrowerUserId}})" >View Loans</a></td>
      </tr> 
<tr>
  <td style="display:none;" colspan="14" class="viewpendingemisLoanLenders viewpendingemisLoanLenders-{{borrowerUserId}}">

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
                  <th>Disbursement Amount</th>
                  <th>Disbursement Date</th>
                  <th>View EMI card</th>
              </tr>
              </thead>
              <tbody id="viewpendingemisLoanLenders-{{borrowerUserId}}">                   
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

<script id="loadLenderspendingemisloans" type="text/template">
    {{#data}}
      <tr>
        <td>{{loanId}}</td>
      <td>LR{{lenderUser.id}}<br/>{{lenderUser.firstName}} {{lenderUser.lastName}}</td>
        <td>BR{{borrowerUser.id}}<br/>{{borrowerUser.firstName}} {{borrowerUser.lastName}} </td>


        <td>{{loanDisbursedAmount}}</td>
        <td>
          {{borrowerDisbursementDate}}
        </td>
          
        <td><a href="javascript:void(0)" class="viewPendingEMIcard" onclick="viewPendingEMIcard('current',{{id}})">View EMI</a>
        </td>
      </tr>
  {{/data}}
</script>

<div class="modal modal fade" id="modal-viewPendingEMIcard">
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
                            <th>Due on date</th>
                            <th>Penality</th>

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
                <td>{{emiDueOnDate}}</td>
                <td>{{penality}}</td>         

</tr>
  {{/data}}
</script>


<script type="text/javascript">
window.onload = loadPendingEMIsList('current');
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>