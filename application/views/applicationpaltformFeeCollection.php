<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            OVERALL EMIS
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
                            <thead class="mobileDiv_4">
                                <tr>
                                    <th>Lender Name</th>
                                    <th>Application Id</th>
                                    <th>Loan Status</th>
                                    <th>Loan Amount</th>
                                    <th>Emi amount</th>
                                    <th>EMIs Paid</th>
                                    <th>Duration</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody id="displayRequests" class="displayRequests mobileDiv_3">
                                <tr id="displayNoRecords" class="displayRequests">
                                    <td colspan="8">No Offers found!</td>
                                </tr>


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
    <div class="modal-dialog user_emi">
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
                        <tr class="mobileDiv_4">

                            <th>EMI No</th>
                            <th>EMI Amount</th>


                            <th>Remaining EMI Amount</th>

                            <th>Due on</th>
                            <th>Part Payment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="displayEMIRecords" class="mobileDiv_3">

                        </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
<script id="displayallRequests" type="text/template">
    {{#data}}
    <tr class="divBlock_Mob_001">
      <td>
        <span class="lable_mobileDiv"> Name</span>
      {{name}} </td>

      <td>
        <span class="lable_mobileDiv"> applicationId</span>
      {{applicationId}}</td>


      <td>
        <span class="lable_mobileDiv">loanStatus</span>
      {{loanStatus}}</td>

      <td>
        <span class="lable_mobileDiv"> loanAmount</span>
      {{loanAmount}}</td>

      <td>
        <span class="lable_mobileDiv"> emiAmount</span>
      {{emiamount}}</td>


      <td>
        <span class="lable_mobileDiv"> noOfEmisPaid</span>
      {{emisPaid}}</td>
      </td>

      <td>
        <span class="lable_mobileDiv"> duration</span>
      {{duration}} M</td>
      </td> 

      <td>
        <span class="lable_mobileDiv"> Pay Now</span>
        <a href="#" onclick="getAppLevelEMITABLE()"><b>PAY EMI</b></a></td>
      </tr>
      {{/data}}
      </script>

<script id="emiRecordsCallTpl" type="text/template">
    {{#data}}
      <tr class="divBlock_Mob_001">
    
        <td>
             <span class="lable_mobileDiv"> Emi NO</span>
        {{emiNumber}}
      </td>
        <td>
             <span class="lable_mobileDiv">Emi AMOUNT</span>
        {{emiAmount}}
      </td>
    
    
   
        <td>
             <span class="lable_mobileDiv"> Remaining Emi</span>
        {{remainingEmiAmount}}
      </td>
     
     
        <td>
             <span class="lable_mobileDiv"> Emi Due On</span>
        {{emiDueOn}}
      </td>
        <td>
             <span class="lable_mobileDiv"> Actions</span>
          <div class="form-check m-L50 pull-left">
          <input type="checkbox" class="form-check-input" id="partPaymentCheckBox{{id}}" onclick="enablePartPayment({{id}})">
          <label class="form-check-label"  for="partPaymentCheckBox">Part Payment</label>
         </div>
             <input class="pay-you" type="text" id="partPaymentinput{{id}}" placeholder="Enter Part Payment" style="display:none"></input>
            <span class="error partPayAmounterror{{id}}" style="display: none;">Please enter Part Payment Amount</span></td>
          <td> <a href="javascript:void(0)" onclick="loadpaymentDetailsPage({{loanId}},{{emiNumber}},{{id}})"><button   class="btn btn-primary emiStatus{{emiStatus}}">Pay</button></a>
      </tr>
      {{/data}}
      </script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".loadingSec").show();
});
setTimeout(function() {
    applicationLevelEmiInfo();
}, 1000);
</script>
<?php include 'footer.php';?>