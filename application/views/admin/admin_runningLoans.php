<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Running Loans</h1>
    </section>
    <br />

    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option> -->
                    <option value="userName">Name</option>
                    <option value="borrowerID">Borrower ID</option>
                </select> <span class="errorsearch" style="display: none;">Please
                    choose option.</span>
            </div>

            <div class="col-xs-3 text-center loanid" style="display: none;">
                <input type="text" name="loanid" class="form-control loanid" placeholder="Loan ID">
            </div>

            <div class="col-xs-3 text-center userName" style="display: none;">
                <input type="text" name="userName" class="form-control firstName" placeholder="First Name">
            </div>
            <div class="col-xs-3 text-center userName" style="display: none;">
                <input type="text" name="userName" class="form-control lastName" placeholder="Last Name">
            </div>
            <div class="col-xs-3 text-center date1" style="display: none;">
                <div class="input-group date" data-date-format="yyyy/mm/dd">
                    <input type="text" class="form-control date1" id="date1Value" placeholder="YYYY/MM/DD" name="date1">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
            </div>
            <div class="col-xs-3 text-center date2" style="display: none;">
                <div class="input-group date" data-date-format="yyyy/mm/dd">
                    <input type="text" class="form-control date2 " id="date2Value" placeholder="YYYY/MM/DD"
                        name="date2">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
            </div>

            <div class="col-xs-3 text-center applicationid" style="display: none;">
                <input type="text" name="applicationid" class="form-control applicationid" placeholder="Application ID">
            </div>

            <div class="col-xs-3 text-center lenderid" style="display: none;">
                <input type="text" name="lenderid" id="lenderid" class="form-control lenderid" placeholder="Lender ID">
            </div>

            <div class="col-xs-3 text-center borrowerid" style="display: none;">
                <input type="text" name="borrowerid" id="borrowerid" class="form-control borrowerid"
                    placeholder="Borrower ID">
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
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="searchRunningloans();">
                    <i class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>

        <div class="alert alert-primary noLoanstoDisplay" role="alert" style="display: none">
            Provided user don't have any running loans in the system.
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Running Loans info</h3>
                            <p style="display: none;" class="totalActiveLoans"></p>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="runningLoansPagination pull-right">
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
                                    <!-- <th>Loan ID</th>
									<th>App ID</th>
									<th>LR ID & Name</th>
									<th>BR ID & Name</th>
									<th>Loan Details</th>
									<th>Disbursement Date</th>

									<th>Loan EMI Details</th>
									<th>Agreement</th>-->
                                    <!--<th>View Record</th> -->
                                    <th>App ID</th>
                                    <th>BR ID & Name</th>
                                    <th>BR Email</th>
                                    <th>Disbursement Amount</th>
                                    <th>Disbursement Date</th>
                                    <th>EMI Details </th>
                                    <th>Update App Level Emi</th>
                                    <th>View Lenders For this Loan</th>
                                </tr>
                            </thead>
                            <tbody id="displayRecords">



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
     <td>{{applicationId}}</td>
    <td>
    	<b>{{borrowerUser.firstName}} {{borrowerUser.lastName}}</b><br/>BR{{borrowerUser.id}}<br/>
    
        <b>city :</b>{{borrowerUser.city}}
      <br/><b>oxyScore :</b> {{borrowerUser.oxyScore}}
        
        </td>
      <td>{{borrowerUser.email}}<br/>{{borrowerUser.mobileNumber}}</td>
     <td>{{disbursmentAmount}}</td>

     <td>{{disbursedDate}}</td>
  
   <td>
    <!-- <b>First EMIAmount :</b> {{firstMonthEmi}}<br/>
    <b>Remaining EMIAmount :</b> {{secondMonthEmi}}<br/>
    <b>NO of EMIS Not Paid:</b> {{emiNotPaid}}<br/>
    <b>EMIAmount Not Paid:</b> {{applicationAmountNotPaid}}<br/>
    <b>Penalty Amount :</b> {{penaltyAmount}}<br/>
    <b>EMIAmount Paid:</b> {{applicationAmountPaid}}<br/>

		--> 

		<button  type="button" class="btn btn-success btn-sm" onclick="emiDetails({{parentId}}, '{{borrowerUser.firstName}} {{borrowerUser.lastName}}')"
		usrnametodisplay ="{{borrowerUser.firstName}} {{borrowerUser.lastName}}">Emi Info</button>
		<br/><br/>

		<button  type="button" class="btn btn-warning btn-sm" onclick="emiDetailsforSummary({{parentId}}, '{{borrowerUser.firstName}} {{borrowerUser.lastName}}')"
		usrnametodisplay ="{{borrowerUser.firstName}} {{borrowerUser.lastName}}">Emi Summary</button>
    
   </td>
 
 <td>
 	<button  type="button" class="btn btn-primary btn-sm " onclick="UpdateEmiAppLevel('{{applicationId}}',{{penaltyAmount}})">Update EMI</button> <br><br>





 </td>

<td><a href="javascript:void(0)" class="viewLoanLenders"onclick="viewLoanLenders({{parentId}},{{borrowerUser.id}})" >View Loans</a></td>

 </tr>



<tr>
  <td style="display:none;" colspan="14" class="viewrunningLoanLenders viewrunningLoanLenders-{{parentId}}">

      <div class="col-md-6 pull-right" style="display:none">
                    <div class="interstedPagination1 pull-right">
                      <ul class="pagination bootpag">
                    </ul>
                  </div>

                </div>
        
       <table class="table table-bordered table-hover">
               <thead>
                 <tr style="background-color: aqua;">
                  <th>Loan ID</th>
				  <th>App ID</th>
				  <th>LR ID & Name</th>
				  <th>BR ID & Name</th>
				  <th>Loan Details</th>
				  <th>Disbursement Date</th>
				  <th>Loan EMI Details</th>
				  <th>Interest Details</th>
              </tr>
              </thead>
              <tbody id="viewrunningLoanLenders-{{parentId}}">                   
               <tr id="displayNoLoanRecords" class="displayNoLoanRecords" >
                    <td colspan="8">No Offers found!</td>
                </tr>  
                </tbody>   
              </tfoot>
            </table>
      </td>

    </tr>


     <!--  <td><a href="javascript:void(0)" onclick="displayLoanInformation('{{id}}')">{{loanId}}</a></td>
        
        <td>{{loanRequest}}</td>
        <td>LR{{lenderUser.id}}<br/>{{lenderUser.firstName}} {{lenderUser.lastName}}<br/><b>city :</b>{{lenderUser.city}}</td>
        <td>BR{{borrowerUser.id}}<br/>{{borrowerUser.firstName}} {{borrowerUser.lastName}}<br/><b>city :</b>{{borrowerUser.city}}
        <br/><b>oxyScore :</b> {{borrowerUser.oxyScore}}
        
        </td>


        <td><b>Loan Value</b>: <span>{{loanDisbursedAmount}}</span><br/>
            <b>EMI</b>: {{emiAmount}}<br/>
            <b>ROI</b>: {{rateOfInterest}} 
            <span style='display:none' class="loanTypeisI loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Per Day</span>
                        <span style='display:none' class="loanTypeisDays loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> % PA</span>
            <br/>
            <b>Duration</b>: {{duration}}
            <span style='display:none' class="loanTypeisI loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Days</span>

                          <span style='display:none' class="loanTypeisDays loanTypeis{{borrowerUser.commentsRequestDto.durationType}}">Months</span>

            <br/>
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
          </td>-->
          <!--   <td><a href="viewLoanRecord?bid={{borrowerUser.id}}">View Record</a></td> -->
      <!--   </tr> -->



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

                <tr class="displayNodata">
                   <td colspan="8">No data found</td>
                </tr>
                
              </tfoot>
            </table>
      </td>
    </tr>

    

  {{/data}}
</script>



<script id="loadLendersRunningloans" type="text/template">
    {{#data}}
      <tr>
      	<td>{{loanId}}</td>        
        <td>{{loanRequest}}</td>
        <td>LR{{lenderUser.id}}<br/>{{lenderUser.firstName}} {{lenderUser.lastName}}<br/><b>city :</b>{{lenderUser.city}}</td>
        <td>BR{{borrowerUser.id}}<br/>{{borrowerUser.firstName}} {{borrowerUser.lastName}}<br/><b>city :</b>{{borrowerUser.city}}
        <br/><b>oxyScore :</b> {{borrowerUser.oxyScore}}
        
        </td>

        <td><b>Loan Value</b>: <span>{{loanDisbursedAmount}}</span><br/>
            <b>EMI</b>: {{emiAmount}}<br/>
            <b>ROI</b>: {{rateOfInterest}}

                    <span style='display:none' class="loanTypeisI loanTypeis{{durationType}} "> % PA</span>
                        <span style='display:none' class="loanTypeisDays loanTypeis{{durationType}}"> Per Day</span>


            <br/>
            <b>Duration</b>: {{duration}} 

                         <span style='display:none' class="loanTypeisI loanTypeis{{durationType}}"> Months</span>

                          <span style='display:none' class="loanTypeisDays loanTypeis{{durationType}}"> Days</span>



            <br/>
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
            <b>Principal Amount </b>: {{principalAmountPending}}<br/>
            <b>profit</b>: {{profit}} <br/>
            <b>Total Amount </b>: {{totalAmountPending}}<br/>
        </td>
         <td>
         	Interest on this loan:- 
         	{{interestPendingTillDate}}
         	<!-- <button  type="button" class="btn btn-primary btn-xs " onclick="UpdateEmiloanLevel('{{loanId}}')" data-loanID='{{loanId}}'>Update EMI</button>
         	--><br/><br/>
         	<button class="btn btn-small btn-danger" onclick="givesmeDiwaiveOff('{{loanId}}', '{{borrowerUser.id}}', '{{borrowerUser.firstName}} {{borrowerUser.lastName}}', '{{lenderUser.firstName}} {{lenderUser.lastName}}', '{{interestPendingTillDate}}')">Give Interest waive off</button>
         </td>
      </tr>
  {{/data}}
</script>



<div class="modal modal fade" id="modal-viewEMI">
    <div class="modal-dialog modal-lg">
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
                    <div class="col-xs-3">
                        <button class="btn btn-warning preClose" onclick="UpdatePreclose();">Pre Close</button>
                    </div>
                    <div class="col-xs-2">
                        <button class="btn btn-warning preClose" onclick="UpdatePreclosebyplatform();">Pre Close by
                            Platform </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead style="background-color:#ADD8E6">
                        <tr>
                            <th>EMI No</th>
                            <th>EMI AMT</th>
                            <th>Interest Amount</th>
                            <th>Days Delayed</th>
                            <th>Due on</th>
                            <th>Paid Amount</th>
                            <th>Due Amount</th>
                            <th>Penalty</th>
                            <th>Excess Of EMI Amount</th>
                            <th>Previous Pending EMI Amount</th>
                            <th>Status</th>
                            <th>Mode of Transaction</th>
                            <th> Emi Paid date</th>
                            <th>Upate Emi COmments</th>
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
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">EMI STATUS</h4>
            </div>
            <div class="modal-body">EMI updated successfully.</div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->

<div class="modal modal-info fade" id="modal-preclose">
    <div class="modal-dialog  modal-sm">
        <di` .v class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">PRE CLOSE STATUS</h4>
            </div>
            <div class="modal-body">This Loan Closed, Please check in closed
                loans.</div>
    </div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->


<div class="modal modal-info fade" id="modal-preclosebyplatform">
    <div class="modal-dialog  modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">PRE CLOSE BY PLATFORM STATUS</h4>
            </div>
            <div class="modal-body">This Loan Closed, Please check in closed by platform
                loans.</div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->

<script id="emiRecordsCallTpl" type="text/template">
    {{#data}}
      <tr>
               <td data-loanId={{loanId}} class="getLoanID">{{emiNumber}}</td>
                <td>{{emiAmount}}</td>
                <td>{{interestAmount}}</td>
                <td>{{differenceInDays}}</td>
                <td>{{emiDueOn}}</td>
                <td>{{remainingEmiAmount}}</td>
                <td>{{dueAmount}}</td>
                <td>{{penalty}}</td>
                
                <td>{{excessOfEmiAmount}}</td>
                <td>{{remainingPenaltyAndRemainingEmi}}</td>
                <td>
                    {{emiStatusBasedOnPayment}}
                </td>
                <td>{{modeOfPayment}}</td>
                <td>
                  {{emiPaidOn}}



                    <!-- OLD BUTTON <button data-loanId = {{loanId}} class="getLoanID btn btn-info updatingEMI emiStatus{{emiStatus}} emiStatusForView{{emiStatus}} getLoanID-{{emiNumber}}"  onclick="updatingEMI({{loanId}}, {{emiNumber}}, 'getLoanID-{{emiNumber}}')" data-emiNo = {{emiNumber}}>Full Payment Received{{emiNumber}}</button><br/>-->

                 <!--   <button onclick="displayUpdate_emi_Block({{emiNumber}})" data-emiNum={{emiNumber}} 
                            data-loanId={{loanId}} 
                            class="showUpdateBlock getLoanID btn btn-info updatingEMI emiStatus{{emiStatus}} emiStatusForView{{emiStatusBasedOnPayment}} getLoanID-{{emiNumber}}"
                            data-emiNo={{emiNumber}}>Update EMI{{emiNumber}}</button>-->
                    <!-- onclick="updatingEMI({{loanId}}, {{emiNumber}}, 'getLoanID-{{emiNumber}}')" -->
                </td>
<td><button type="button" class="btn btn-success  btn-xs btn-{{status}} "  id={{id}} onclick="updateEMiComment({{loanId}},{{emiNumber}})" data-clikedId="{{loanId}}" data-clikedemiNumber="{{emiNumber}}"><b>UpdateEmiComments</b></button><br/><br/></td>
                <td style="display:none;">
                    <a href="javascript:void(0)">Update Part EMI</a>

                    <input style="display:none;" data-loanId={{loanId}} class="partupdatingEMI emiStatus{{emiStatus}}" />
                </td>
            </tr>
    <tr>
        <td colspan="8" class="display_emi_block-{{emiNumber}}" style="display:none;">
            <table border="0" width="100%">
            <tr>
                <td colspan="8" class="container emiDisplayBlock">
                    <div class="row"><div class="col-xs-8"><h3>Update Payment  Details</h3><br/></div></div>
                     <div class="row">
                        <div class="col-xs-4">
                            <select class="paymentStatus">
                                <option>-- Payment Type</option>
                                <option value ="PARTPAID">PART Payment</option>
                                <option value ="FULLYPAID">FULL Payment</option>
                            </select>
                          </div>
                          <div class="col-xs-4">
                            <select class="modeOfPayment">
                                <option>-- Select Mode of Payment </option>
                                <option value ="ecs">ECS</option>
                                <option value ="icici">Transfer to ICICI Re-Payment</option>
                                <option value ="idfc">Transfer to IDFC Re-Payment</option>
                                <option value ="payumoneu">Paid through PayUMoney</option>
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <input type="text" class=" form-control  transactionRefernceNumber" placeholder="Reference">
                        </div>
                       <!-- <div class="col-xs-3">
                            <input type="text" class="penalty" class="form-control" placeholder="Penalty">
                        </div> -->
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-xs-4">
                            <input type="text" class="form-control receivedAmount" placeholder="Received Amount">
                        </div>
                        <div class="col-xs-4">

                        <div class="input-group date"  data-date-format="dd/mm/yyyy">
                          <input type="text" class="form-control   amountPaidDate" id="amountPaidDate" name="amountPaidDate" placeholder="DD/MM/YYYY" onclick="datepicker()">
                          <div class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                      </div> 

                <!--   <input type='text' class="form-control datepicker amountPaidDate" /> -->
                        </div>
                        <div class="col-xs-4">
                           <button class="btn-success btn" onclick="updateEMI_newFunc({{id}},{{loanId}},{{emiNumber}})">Update</button>
                            <button class="btn-danger btn" onclick="cancelupdateEMI({{emiNumber}});">Cancel</button>
                        </div>
                    </div>
                </td>
            </tr>
    </table>
    </td>
    </tr>
</tr>
  {{/data}}
</script>


<div class="modal modal-warning fade" id="modal-emiNotPresent">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text">gdfgf</p>
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


<div class="modal  fade" id="modal-UpdateEmiAppLevel">
    <div class="modal-dialog">
        <div class="modal-content offer_popup">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Payment Details</h4><br />
                <h3 style="background-color: #87CEFA;">App ID :- <span class="loanIdDisplay"></span></h3>

            </div>
            <h3 style="background-color: #fff;">Penality for this application <span class="penaltyvalue"></span></h3>

            <div class="offer_popup_cont clearfix">
                <div class="offer_popup_field clearfix">
                    <label>Application ID:</label>
                    <div class="fld-block">
                        <input type="text" class="applicationId" id="applicationId" placeholder="Application ID"
                            readonly="true">
                        <span class="error applicationIdError" style="display: none;">Please enter Application
                            ID.</span>

                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="offer_popup_field clearfix">
                    <label>Recived Amount :</label>
                    <div class="fld-block">
                        <input type="text" class="partialPaymentAmount" id="partialPaymentAmount"
                            placeholder="Recived Amount">
                        <span class="error partialPaymentAmountError" style="display: none;">Please enter Recived
                            Amount.</span>

                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="offer_popup_field clearfix">
                    <label>Penalty waive off:</label>
                    <div class="fld-block">
                        <input type="text" class="penalty" id="penalty" placeholder="penalty">
                        <span class="error penaltyError" style="display: none;">Please enter penalty Amount.</span>

                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>


                <div class="offer_popup_field clearfix">
                    <label>Interest waive off for APP ID:</label>
                    <div class="fld-block">
                        <input type="text" class="interestWOff" id="interestWOff" placeholder="Interest Waive Off">
                        <span class="error interestWOffError" style="display: none;">Please enter interest Waive off
                            amount.</span>

                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>



                <div class="offer_popup_field clearfix">
                    <label>Transaction Reference Number:</label>
                    <div class="fld-block">
                        <input type="text" class="transactionRefernceNumber" id="transactionRefernceNumber"
                            placeholder="Reference No">
                        <span class="error referenceNoError" style="display: none;">Please enter Transaction Refernce
                            Number .</span>

                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="offer_popup_field clearfix">
                    <label>Mode of Payment:</label>
                    <div class="fld-block">
                        <select class=" form-control modeOfPayment" id="modeOfPayment">
                            <option value="">-- Select Mode of Payment </option>
                            <option value="ecs">ECS</option>
                            <option value="icici">Transfer to ICICI Re-Payment</option>
                            <option value="idfc">Transfer to IDFC Re-Payment</option>
                            <option value="payumoneu">Paid through PayUMoney</option>
                        </select>
                        <span class="error modeOfPaymentError" style="display: none;">Please select Mode of
                            Payment.</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>


                <div class="offer_popup_field clearfix">
                    <label>Emi Paid Date:</label>
                    <div class="fld-block">
                        <div class="input-group date" data-date-format="dd/mm/yyyy">
                            <input type="text" class="form-control amountPaidDate" id="amountPaidDate"
                                name="amountPaidDate" placeholder="DD/MM/YYYY" onclick="datepicker()">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </div>
                        </div>
                        <span class="error amountPaidDateError" style="display: none;">Please enter Emi Paid
                            Date.</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>

            </div>

            <div class="offer_popup_field clearfix" style="width: 90%;margin: 0 auto;">
                <label>EMI Updating By:</label>
                <div class="fld-block">
                    <select class=" form-control updatingby" id="updatingby">
                        <option value="">-- Choose Your Name </option>
                        <option value="Megha">Megha</option>
                        <option value="Muni">Muni</option>
                        <option value="Lakshmi">Lakshmi</option>
                        <option value="Sekhar">Sekhar</option>
                        <option value="Bhargav">Bhargav</option>
                        <option value="Subash">Subash</option>
                    </select>
                </div>
                <span class="error emiupdatingByError" style="display: none;">Please choose Your Name.</span>
                <div class="clear"></div>
            </div>

            <div class="modal-footer">
                <div align="right">
                    <button class="btn-success btn updateEMI_AppLevel" onclick="updateEMI_AppLevel()">Update</button>
                    <span class="plswait" style="display: none;">Please Wail...</span>

                    <button type="button" class="btn btn-danger " data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-success fade" id="modal-emiupdateAppLevel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                EMI updated Successfully.
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


<div class="modal  fade" id="modal-UpdateEmiloanLevel">
    <div class="modal-dialog">
        <div class="modal-content offer_popup">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Payment loan level EMI Details</h4><br />
                <h3 style="background-color: #87CEFA;">App ID :- <span class="loanIdDisplay"></span></h3>

            </div>
            <div class="offer_popup_cont clearfix">

                <div class="offer_popup_field clearfix">
                    <label>Recived Amount :</label>
                    <div class="fld-block">
                        <input type="text" class="PaymentAmount" id="PaymentAmount" placeholder="Recived Amount">
                        <span class="error PaymentAmountError" style="display: none;">Please enter Recived
                            Amount.</span>

                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="offer_popup_field clearfix">
                    <label>Payment Status:</label>
                    <div class="fld-block">
                        <select class=" form-control paymentStatus" id="paymentStatus1">

                            <option value="">-- Payment Type</option>
                            <option value="PARTPAID">PART Payment</option>
                            <option value="FULLYPAID">FULL Payment</option>

                        </select>
                        <span class="error paymentStatus1Error" style="display: none;">Please Payment Status.</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="offer_popup_field clearfix">
                    <label>Transaction Reference Number:</label>
                    <div class="fld-block">
                        <input type="text" class="transactionNumber" id="transactionNumber" placeholder="Reference No">
                        <span class="error transactionNumberError" style="display: none;">Please enter Transaction
                            Refernce Number .</span>

                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="offer_popup_field clearfix">
                    <label>Mode of Payment:</label>
                    <div class="fld-block">
                        <select class=" form-control modeOfPayment" id="modeOfPayment1">
                            <option value="">-- Select Mode of Payment </option>
                            <option value="ecs">ECS</option>
                            <option value="icici">Transfer to ICICI Re-Payment</option>
                            <option value="idfc">Transfer to IDFC Re-Payment</option>
                            <option value="payumoneu">Paid through PayUMoney</option>
                        </select>
                        <span class="error modeOfPaymentError1" style="display: none;">Please select Mode of
                            Payment.</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="offer_popup_field clearfix">
                    <label>Emi Paid Date:</label>
                    <div class="fld-block">
                        <div class="input-group date" data-date-format="dd/mm/yyyy">
                            <input type="text" class="form-control amountPaidDateloanlevel" id="amountPaidDateloanlevel"
                                name="amountPaidDate" placeholder="DD/MM/YYYY" onclick="datepicker()">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </div>
                        </div>
                        <span class="error amountPaidDateloanlevelError" style="display: none;">Please enter Emi Paid
                            Date.</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>


            </div>
            <div class="modal-footer">
                <div align="right">
                    <button class="btn-success btn updateEMIloanLevel_btn" data-loanID=""
                        onclick="updateEMI_loanLevel()">Update</button>

                    <button type="button" class="btn btn-danger " data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-success fade" id="modal-emiupdateLoanLevel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                EMI updated Successfully.
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


<div class="modal modal fade" id="modal-EmiDetails">
    <!-- EMI SUMMARY -->
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>DURATION</th>
                            <th>EMI START DATE</th>
                            <th>1st EMI AMOUNT</th>
                            <th>FUTURE EMI Amt</th>
                            <th>EMI TO BE PAID TILL DATE</th>
                            <th>EMI PAID</th>
                            <th>PENDING EMIS</th>
                            <th>FUTURE EMIS</th>
                            <th>Due AMOUNT</th>
                            <th>To Pre Close</th>
                            <th>Interest Waive off Till date</th>
                        </tr>

                    </thead>

                    <tr>
                        <td><span id="duration"></span></td>
                        <td><span id="emistartdate"></span></td>
                        <td><span id="emiamount"></span></td>
                        <td><span id="secondmonthemi"></span></td>
                        <td><span id="eminotpaidcurrentdate"></span></td>
                        <td><span id="emipaidcurrntdate"></span></td>
                        <td><span id="totalemipending"></span></td>
                        <td><span id="featureemis"></span></td>
                        <td><span id="due"></span></td>
                        <td><span id="toprecolse"></span></td>
                        <td><span id="intWoff"></span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>




<div class="modal modal-warning fade" id="modal-interestWF">
    <!-- EMI SUMMARY -->
    <div class="modal-dialog modal-sg">
        <div class="modal-content">
            <div class="modal-header">
                <span>Interest Waive Off Section || <br /><small>Please check with the lender before waive off also get
                        an email from the lender regarding the wavie off.</small></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Borrower Name :- <span class="brName"></span><br />
                Lender Name :- <span class="lrName"></span><br />
                Current Interest:- <span class="currInterest"></span><br />


                <div>

                    <input type="text" name="" class="addDiscAmount" style="color: #000" />
                    <button class="btn btn-danger placeLoanId" data-loanId=""
                        onclick="saveWaiveOffInfo()">Update</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->


<div class="modal modal fade" id="modal-viewAPPEMI">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="row">
                    <div class="col-xs-6">
                        <h4 class="modal-title">
                            <b>Borrower Name:-</b> <span class="borrowerNameFromEmiInfo"></span><br />
                            <span class="loanIdDisplay"></span>
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
                            <th>Interest<br />Amount</td>
                            <th>Difference<br />In Days</td>
                            <th>Emi <br />Due On</th>
                            <th>Amount Paid</th>
                            <th>Due<br />Penality</th>
                            <th>Penalty</th>
                            <th>status</th>
                            <th>Paid<br />On</th>
                            <th>Interest<br />Paid</th>
                        </tr>
                    </thead>
                    <tbody id="emiRecordsCall1">

                    </tbody>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<script id="emiRecordsCallTpl1" type="text/template">
    {{#data}}
      <tr>
                <td>{{emiNumber}}</td>
                <td>{{emiAmount}}</td>
                <td>{{interestAmount}}</td>
                <td>{{differenceInDays}}</td>
                <td>{{emiDueOn}}</td>
                <td>{{totalAmountPaid}}</td>
                <td>{{dueAmountWithPenality}}</td>
                <td>{{penalty}}</td>
                <td>{{status}}</td>
                <td>{{emiPaidOn}}</td>
                <td>{{interestAmountPaid}}</td>
                
                
    </tr>            
  {{/data}}
</script>






<div class="modal  fade" id="modal-approveComments">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Comments</h4>
            </div>
            <div class="modal-body">
                <form>
                    <textarea type="text" name="" class="form-control approveComment"></textarea><br />
                </form>

            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm saveApproveCommentsBtn" data-dismiss="modal"
                        data-clikedId="" data-clikedemiNumber="" onclick="emicomment()">Save</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-lenderwalletApproveComments" tabindex="-1" role="dialog"
    aria-labelledby="modal-lenderwalletApproveComments" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure?</h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success lenderApproveCommentsBtn" data-clikedId=""
                    data-clikedemiNumber="" onclick="saveUpdateEmiComments();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
//window.onload=loadLoans("Active");
window.onload = loadRunningLoans();

function updateEMI(loanID, tenure, noOfEMIsPAID) {
    $("#modal-viewEMI").modal("show");
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    var pendingEMIs = tenure - noOfEMIsPAID;
    var emiSectionHTML = "";
    // body...
}
//window.onload = $( ".datepicker" ).datepicker();
function cancelupdateEMI(emiNumber) {
    $('.display_emi_block-' + emiNumber).hide();
}

function datepicker() {
    $(".amountPaidDate").datepicker({
        format: 'dd/mm/yyyy',
        todayHighlight: true,
        autoclose: true,
        changeMonth: true,
        changeYear: true
    });
}
$(document).ready(function() {

    $("#date1Value,#date2Value").datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        autoclose: true,
        changeMonth: true,
        changeYear: true
    });

    $("#amountPaidDate,#amountPaidDateloanlevel").datepicker({
        format: 'dd/mm/yyyy',
        todayHighlight: true,
        autoclose: true,
    });
});
</script>

<style type="text/css">
span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisDays.loanTypeisDays {
    display: inline !important;
}

span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisI.loanTypeisI,
span.loanTypeisI.loanTypeis {
    display: inline !important;
}

span.loanTypeisI.loanTypeisDays {
    display: none !important;
}

span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisDays.loanTypeis {
    display: none !important;
}

span.loanTypeisDays.loanTypeisMonths {
    display: none !important;
}
</style>



<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<?php include 'admin_footer.php';?>