<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Running Loans
        </h1>
        <div class="pull-left" style="display: none;">
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
                        <h3 class="box-title"></h3>
                        <div class="pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead class="mobileDiv_4">
                                <tr>
                                    <!--<th>Lender Name</th>
                  <th>Loan ID</th>
                  <th>Loan Amount</th>
                  <th>Rate of Interest</th>
                  <th>EMI</th>
                  <th>Tenure</th>
                  <th>EMIs Paid</th>
                  <th>EMI Info</th>
                  <th>Status</th> -->
                                    <th>App ID</th>
                                    <th>BR ID & Name</th>
                                    <th>BR Email</th>
                                    <th>Disbursement Amount</th>
                                    <th>Disbursement Date</th>
                                    <!-- <th>View Emi Table</th> -->
                                    <th>View Lenders For this Loan</th>

                                </tr>
                            </thead>
                            <tbody id="displayRequests" class="displayRequests mobileDiv_3">
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


<div class="modal modal-info fade" id="modal-viewEMIBorrower">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header emi_header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-3">
                        <h4 class="modal-title">User EMIs</h4>
                    </div>
                </div>
            </div>
            <div class="modal-body emi_body_cont">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Loan ID</th>
                            <th>EMI Amount</th>
                            <th>Due on</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody id="displayEMIRecords1">

                        </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.modal-dialog -->


<script id="displayallRequests" type="text/template">
    {{#data}}
                <tr class="divBlock_Mob_001">
                <td>
             <span class="lable_mobileDiv">Deal Name</span>
                {{applicationId}}

              </td>
                <td class="mobileDiv_4">

              <span class="lable_mobileDiv">Deal Name</span>


                  BR{{borrowerUser.id}}<br/>
                  {{borrowerUser.firstName}} {{borrowerUser.lastName}}<br/>
                  <b>city :</b>{{borrowerUser.city}}
                  <br/><b>oxyScore :</b> {{borrowerUser.oxyScore}}
                </td>
                <td>
                 <span class="lable_mobileDiv">Borrower info</span>


                  {{borrowerUser.email}}<br/>{{borrowerUser.mobileNumber}}</td>
                <td>

                  <span class="lable_mobileDiv">Amount</span>
                {{disbursmentAmount}}</td>
                <td>
           <span class="lable_mobileDiv">Date</span>

                {{disbursedDate}}</td>
               
               <!-- <td><a href="javascript:void(0)" class="viewEMIcard" onclick="viewEMICARD();" data-loanid = "{{parentId}}">View EMI Plan</a></td> -->
                
                <td class="mobileDiv_4"><a href="javascript:void(0)" class="viewLoanLenders"onclick="viewLoanLenders({{parentId}},{{borrowerUser.id}})" >View Loans</a></td>
                 

                 <!-- <td>{{lenderUser.firstName}} {{lenderUser.lastName}}</td>
                  <td>{{loanRequest}}</td>
                  <td>{{loanRequestAmount}}</td>
                  <td>{{rateOfInterest}} % per month</td>
                  <td>{{emiAmount}}</td>
                  <td>{{duration}}</td>
                  <td>{{noOfEmisPaid}}</td>
                   <td>
                    <b>Total EMIs</b>: {{duration}}<br/>
                    <b>EMI Amount</b>: {{emiAmount}}<br/>
                    <a href="javascript:void(0)" class="viewEMIcard" onclick="viewEMICARD();" data-loanid = "{{id}}">View EMI Table</a>
                  </td>
                  <td>{{loanStatus}}</td>		-->		  
                </tr>

<tr>
  <td style="display:none;" colspan="14" class="viewrunningLoanLenders viewrunningLoanLenders-{{parentId}}">

      <div class="col-md-6 pull-right">
                    <div class="interstedPagination1 pull-right">
                      <ul class="pagination bootpag">
                    </ul>
                  </div>

                </div>
        
       <table class="table table-bordered table-hover">
              <thead >
               <tr style="background-color: aqua;">
                  <th>Loan ID</th>
                  <th>App ID</th>
                  <th>LR ID & Name</th>
                  <th>BR ID & Name</th>
                  <th>Loan Details</th>
                  <th>Disbursement Date</th>
                  <th>Loan EMI/Interest Details</th>
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

                
            {{/data}}
  </script>

<script id="emiRecordsCallTpl1" type="text/template">
    {{#data}}
      <tr>
        <td>{{loanId}}</td>
        <td>{{emiAmount}}</td>
        <td>{{emiDueOn}}</td>       
        <td>Success</td>
		<td><a href="javascript:void(0)" onclick="loadpaymentDetailsPage({{loanId}},{{emiNumber}})"><button class="btn btn-primary">Pay</button></a></td>

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
            <b>EMI/Interest</b>: {{emiAmount}}<br/>
            <b>ROI</b>: {{rateOfInterest}}<span style='display:none' class="loanTypeisI loanTypeis{{borrowerUser.commentsRequestDto.durationType}} "> % Per Month</span>
                        <span style='display:none' class="loanTypeisDays loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Per Day</span><br/>
                        <b>Duration</b>: {{duration}} 
                       <span style='display:none' class="loanTypeisI loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Months</span>

                     <span style='display:none' class="loanTypeisDays loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Days</span>
            <br/>
            <b>EMI/Interest</b>: {{emiAmount}}<br/>
           <b>Due</b>: {{dueEmiAmount}}<br/>
           
        </td>
        <td>
          {{borrowerDisbursementDate}}
        </td>
      
        <td><a href="javascript:void(0)" class="viewEMIcard" onclick="viewEMICARD();" data-loanid = "{{id}}">View EMI/Interest Plan</a>
          <br/>
          <b>No of Interests Paid</b>: {{noOfEmisPaid}}<br/>
           <b>No Remaining Interests</b>: {{noRemaingEmis}}<br/>
            <b>Principal Amount Pending</b>: {{principalAmountPending}}<br/>
            <b>profit</b>: {{profit}} <br/>
            <b>Total Amount Pending</b>: {{totalAmountPending}}<br/>
        </td>
      </tr>
  {{/data}}
</script>


<div class="modal  fade" id="modal-viewEMI">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-9">
                        <h4 class="modal-title">EMI/Interest Table</h4><br />If you've any queries please write to us <a
                            href="borrowerInquiries">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Loan ID</th>
                            <th>EMI/Interest Amount</th>
                            <!-- <th>Penalty</th> -->
                            <th>Remaining EMI/Interest Amount</th>
                            <!-- <th>Excess of Interest Amount</th> -->
                            <th>Status</th>

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
         <!-- <td>{{penalty}}</td> -->
        <td>{{remainingEmiAmount}}</td> 
         <!-- <td>{{excessOfEmiAmount}}</td> -->
        <td>{{emiStatusBasedOnPayment}}</td>
     <!-- <td>{{#emiStatus}}
              <b>Paid</b>
            {{/emiStatus}}
            {{^emiStatus}}
             <b> Not Paid</b>
            {{/emiStatus}}
        </td> -->

      </tr>
  {{/data}}
</script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    isStudentOrNot();
});
// setTimeout(function() {
// loadActiveRunningLoans();
// isStudentOrNot();
// loadStudentRunningLoans();
// loadborrowerRunningLoans();
// }, 1000);
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
<?php include 'footer.php';?>