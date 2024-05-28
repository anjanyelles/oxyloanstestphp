<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="margin-left: 30px;">
            FD Executed From system
            

        </h1>
    </section><br />
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                           

                             <a class="fdExcelSheetDownload" target="_blank" href="#"> <button class="btn btn-primary btn-sm pull-left"><i class="fa fa-download"> </i>  Download Excel</button></a>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="fdrepaymentinfodetails pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                            <div class="searchlenderswithdrawalPagination pull-right" style="display: none;">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover" border="1">
                            <thead>
                                <tr>
                                    <th>User ID & Name</th>
                                    <th>fd Created Date</th>
                                    <th>Bank Name</th>
                                    <th>Amount Info</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="dealwithdrawfundslist">
                                <tr id="noRecordFound" class="noRecordFound" style="display: none;">
                                    <td colspan="8">No User found!</td>

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
<script id="loadDealwithdrawfundslistTpl" type="text/template">
    {{#data}}
  <tr>
    <td>
     BR{{borrowerId}}
    </td>
    <td> {{fdCreatedDate}} 
    </td>
    <td>{{bankName}}  </td>

    <td> To Repayment : {{amountRetunredToRepayment}} </br>
         To Another : {{amountReturnedToAnother}} </br> 
         Total Amount :{{totalAmount}} </br> 
         Remaining Repayment Amount : {{remainingRepaymentAmount}} </br> 
         
    </td>
    <td>
      <button type="button" class="btn btn-info btn-xs " onclick="updatefdexecutedInfo('{{loanId}}')">Update</button>
    </td>
  </tr>
  {{/data}}
  </script>


<div class="modal  fade" id="modal-fdexecutedPaymentDetailsInfo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title approve-ConfirmText">Update the Repayment Amount </h4>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="fdrepaymentamount" class="form-label">Amount Returned To Repayment</label>
                    <input type="text" class="form-control" name="fdrepaymentamount" id="fdrepaymentamount"
                        aria-describedby="helpId" placeholder="Enter The Repayment Amount">
                    <small id="fdrepaymentamounttoerror" class="form-text text-muted error" style="display:none">Enter Repayment  Amount</small>
                </div>
                <div class="mb-3">
                    <label for="fdreturntoanother" class="form-label">Amount Returned To Another</label>
                    <input type="text" class="form-control" name="fdreturntoanother" id="fdreturntoanother"
                        aria-describedby="helpId" placeholder="enter the repayment to another">
                    <small id="fdrepaymentamounttoAnothererror" class="form-text text-muted error" style="display:none">Enter Repayment Another Amount</small>
                </div>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm" id="fdrepaymentbtn" data-loanid=""
                        onclick="confirmFdClosedRepaymentInfo()">Save</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal  fade modal-success" id="modal-fdupdatedatesaveconfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update</h4>
            </div>
            <div class="modal-body">
                <span class="withdrawal-Text"> You have successfully updated the data </span>
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
window.onload = fdExecutedPaymentDetails();
window.onload =fetchDownloadExcelSheetOfFD();
</script>
<style type="text/css">
#example2 tr th,
#example2 tr td {
    border: 1px solid #000;
}

#example2 tr th {
    background-color: #D3D3D3;
}

.btn-withdrawAPPROVED,
.btn-withdrawREJECTED,
.h2hmove_H2HAPPROVAL {
    pointer-events: none;
    cursor: not-allowed;
    opacity: 0.65;
    filter: alpha(opacity=65);
    -webkit-box-shadow: none;
    box-shadow: none;
}

.withdrawal_Ifsc {
    text-transform: uppercase;
}

.rejectionCommenmts {
    width: 551px;
    height: 49px;
    margin-top: -100px;
}

,
.textContent {
    margin-top: -120px !important;
}
</style>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#withdrawalDisbursementDate").datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        startDate: new Date(),
        changeMonth: true,
        changeYear: true,

    });
});
</script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<?php include 'admin_footer.php';?>