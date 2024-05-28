<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            eNach Activate Users
        </h1>
    </section><br />

    <!-- Main content -->

    <section class="content">

        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="loanID">Loan ID</option>
                    <option value="appID">Application ID</option>
                    <option value="lenderID">Lender ID</option>
                    <option value="borrowerID">Borrower ID</option>
                    <option value="roi">ROI</option>
                    <option value="amount">Amount</option>
                    <option value="city">City</option>
                </select>
                <span class="errorsearch" style="display: none;">Please choose option.</span>
            </div>

            <div class="col-xs-3 text-center loanid" style="display: none;">
                <input type="text" name="loanid" class="form-control loanid" placeholder="Loan ID">
            </div>

            <div class="col-xs-3 text-center applicationid" style="display: none;">
                <input type="text" name="applicationid" class="form-control applicationid" placeholder="Application ID">
            </div>

            <div class="col-xs-3 text-center lenderid" style="display: none;">
                <input type="text" name="lenderid" class="form-control lenderid" placeholder="Lender ID">
            </div>

            <div class="col-xs-3 text-center borrowerid" style="display: none;">
                <input type="text" name="borrowerid" class="form-control borrowerid" placeholder="Borrower ID">
            </div>

            <div class="col-xs-3 text-center amount" style="display: none;">
                <input type="text" name="amount" class="form-control minAmount" placeholder="Min Amount">
            </div>

            <div class="col-xs-3 text-center amount" style="display: none;">
                <input type="text" name="amount" class="form-control maxAmount" placeholder="Max Amount">
            </div>

            <div class="col-xs-3 text-center roi" style="display: none;">
                <input type="text" name="ROI" class="form-control minRoi" placeholder="Min ROI">
            </div>

            <div class="col-xs-3 text-center roi" style="display: none;">
                <input type="text" name="ROI" class="form-control maxRoi" placeholder="Max ROI">
            </div>


            <div class="col-xs-3 text-center city" style="display: none;">
                <input type="text" name="city" class="form-control city" placeholder="City">
            </div>

            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="searchRunningloans();"><i
                        class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>




        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">eNACH users info</h3>
                            <p style="display: none;" class="totalActiveLoans"></p>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="enachPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>

                            <div class="searchrunningloansPagination pull-right" style="display: none;">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    <th>Loan ID</th>
                                    <th>App ID</th>
                                    <th>LR ID & Name</th>
                                    <th>BR ID & Name</th>
                                    <th>Loan Details</th>
                                    <th>Disbursement Date</th>

                                    <th>Loan EMI Details</th>
                                    <th>Agreement</th>
                                    <!--  <th>View Record</th> -->
                                </tr>
                            </thead>
                            <tbody id="displayRecords">

                                <tr>
                                    <td>LN123</td>
                                    <td>AP123</td>
                                    <td>LR123</td>
                                    <td>BR123</td>
                                    <td>INR <span>500000</span></td>
                                    <td>2000</td>
                                    <td> 28% PA </td>
                                    <td>12 months </td>
                                    <td>6</td>
                                    <td>INR <span>500000</span></td>
                                    <td><a href="javascript:void(0)" class="viewEMIcard" onclick="viewEMICARD();"
                                            data-loanid="{{id}}">View EMI</a></td>
                                </tr>
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
<script id="displayRecordsTpl" type="text/template">
    {{#data}}
      <tr class="loanStatus-{{loanStatus}}">
        <td><a href="javascript:void(0)" onclick="displayLoanInformation('{{id}}')">{{loanId}}</a></td>
        
        <td>{{loanRequest}}</td>
        <td>LR{{lenderUser.id}}<br/>{{lenderUser.firstName}} {{lenderUser.lastName}}<br/><b>city :</b>{{lenderUser.city}}</td>
        <td>BR{{borrowerUser.id}}<br/>{{borrowerUser.firstName}} {{borrowerUser.lastName}}<br/><b>city :</b>{{borrowerUser.city}}
        <br/><b>oxyScore :</b> {{borrowerUser.oxyScore}}
        
        </td>


        <td><b>Loan Value</b>: <span>{{loanDisbursedAmount}}</span><br/>
            <b>EMI</b>: {{emiAmount}}<br/>
            <b>ROI</b>: {{rateOfInterest}}% PA<br/>
            <b>Duration</b>: {{duration}} months<br/>
            <b>EMI</b>: {{emiAmount}}<br/>
           <b>Due</b>: {{dueEmiAmount}}<br/>
           
        </td>
        <td>
          {{borrowerDisbursementDate}}
        </td>
      
        <td><a href="javascript:void(0)" class="viewEMIcard" onclick="viewEMICARD();" data-loanid = "{{id}}">View EMI</a>
          <br/>
          <b>No of EMIs Paid</b>: {{noOfEmisPaid}}<br/>
           <b>No Remaing Emis</b>: {{noRemaingEmis}}<br/>
            <b>Principal Amount Pending</b>: {{principalAmountPending}}<br/>
            <b>profit</b>: {{profit}} <br/>
            <b>Total Amount Pending</b>: {{totalAmountPending}}<br/>
        </td>
        <td> 
           <a href='{{agreementUrl}}' data-loanid = "{{id}}">
              <i class="fa fa-download" aria-hidden="true"  class="downloadAgreeent"></i>
           </a>
          </td>
          <!--   <td><a href="viewLoanRecord?bid={{borrowerUser.id}}">View Record</a></td> -->
      </tr>
<tr>
  <td style="display:none;" colspan="14" class="displayAllLoansInfo displayLoanInformation-{{id}}">
        
       <table class="table table-bordered table-hover">
              <thead>
               <tr>
                <th>Loan ID</th>
                <th>EMI Amount</th>
                <th>Due On</th>
                <th>EMI No</th>
                <th>Update Emi</th>
                <th>Part Payment</th>
                <th>EMI Not received?</th>
              </tr>
              </thead>
              <tbody id="displayEMIRecordsAtAT-{{id}}">
                
              </tfoot>
            </table>
      </td>
    </tr>

    

  {{/data}}
</script>


<div class="modal modal-info fade" id="modal-viewEMI">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-3">
                        <h4 class="modal-title">User EMIs</h4>
                    </div>
                    <div class="col-xs-3">
                        <button class="btn btn-warning preClose" onclick="UpdatePreclose();">Pre Close</button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Loan ID</th>
                            <th>EMI Amount</th>
                            <th>Due on</th>
                            <th>EMI No</th>
                            <th>Update Emi</th>
                            <th>Part Payment</th>

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


<div class="modal modal-info fade" id="modal-updataedEMI">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">EMI STATUS</h4>
            </div>
            <div class="modal-body">
                EMI updated successfully.
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->

<div class="modal modal-info fade" id="modal-preclose">
    <div class="modal-dialog  modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">PRE CLOSE STATUS</h4>
            </div>
            <div class="modal-body">
                This Loan Closed, Please check in closed loans.
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->


<script id="emiRecordsCallTpl" type="text/template">
    {{#data}}
      <tr>
        <td>{{loanId}}</td>
        <td>{{emiAmount}}</td>
        <td>{{emiDueOn}}</td>
        <td>{{emiNumber}}</td>
        <td><button data-loanId = {{loanId}} class="getLoanID btn btn-outline updatingEMI emiStatus{{emiStatus}}"  onclick="updatingEMI({{loanId}}, {{emiNumber}} )" data-emiNo = {{emiNumber}}>Update EMI No {{emiNumber}}</button></td>  
        
        <td>
          <a href="" style="color:#FFFFFF;" >Update Part EMI</a>
          <input style="display:none;" data-loanId = {{loanId}} class="partupdatingEMI emiStatus{{emiStatus}}" />
        </td>

        <td><button class="btn btn-danger emiStatus{{emiStatus}}" onclick="updateEMIStatus({{loanId}}, {{emiNumber}} )" data-emiNo = {{emiNumber}}>EMI Not Received{{emiNumber}}</button></td>

      </tr>
  {{/data}}
</script>

<script type="text/javascript">
window.onload = loadeNACHActiveUSers();
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>