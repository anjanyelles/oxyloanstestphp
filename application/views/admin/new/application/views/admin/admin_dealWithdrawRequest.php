<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>


<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$requestStatus =  isset($_GET['status']) ? $_GET['status'] : 'LIVE';

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="margin-left: 30px;">
         <?php echo $requestStatus; ?> Lender Withdrawal info
        </h1>
    </section><br />
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                               <a href="dealWithdrawRequest?status=LIVE"><button class="btn btn-warning btn-md">View Live User <i class="fa fa-angle-double-right"></i></button></a>
                               
                          <a href="dealWithdrawRequest?status=TEST"><button class="btn btn-primary btn-md">View Test User <i class="fa fa-angle-double-right"></i></button></a>


                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="lenderswithdrawalPagination pull-right">
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
                                    <th>LR ID & Name</th>
                                    <th>Deal Name</th>
                                    <th>Withdraw Amount</th>
                                    <th>Requested on</th>
                                    <th>Bank Details</th>
                                    <th>Withdrawal Status</th>
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
     LR{{userId}}<br/>
      {{lenderName}}
    </td>
    <td> {{dealName}} </br>
     Deal Id  :{{dealId}} 
    </td>
    <td>{{amount}}  </td>
    <td> {{requestDate}}</td>
    <td>AC NO:{{accountNumber}}<br/>
      <span class=withdrawal_Ifsc>IFSC: {{ifsc}}</span>
    </td>
    <td class="dealApprovalStatus_{{status}}">
    {{status}}<br/><br/>
     <a href="h2h2WithdrawalApprove?userId={{id}}"> <button type="button" class="btn btn-info btn-xs" onclick="#" style=" width: 100%;"><b>view Withdraw Interest</b></button></a>
    </td>

    <td>

     <div class="w2w-block-{{status}}" style="display:none">
      <button type="button" class="btn btn-success  btn-xs btn-withdraw{{status}} h2hmove_{{status}}"id="arrove-{{id}}" onclick="dealwithdrawalApproveAlert('{{id}}',{{dealId}})" data-clikedId="{{id}}"><b>Approve</b></button><br/><br/>
      <button type="button" class="btn btn-danger btn-xs btn-withdraw{{status}} h2hmove_{{status}}" onclick="dealwithdrawalRejectAlert('{{id}}',{{dealId}})" style=" width: 72%;"><b>Reject</b></button>
        </div>

            <div class="w2w-blockShow-{{status}}" style="display:none">
              {{status}}
            </div>



    </td>
  </tr>
  {{/data}}
  </script>
<div class="modal  fade" id="modal-ApprovedTheWithdrawalRequest">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title approve-ConfirmText">Approval Confirmation</h4>
            </div>
            <div class="modal-body">
                <form>

                    <label class="withdrwalapprove-Text">Aprroved Date<em class="mandatory">*</em> </label>
                    <div class="input-group date" data-date-format="dd/mm/yyyy">
                        <input type="text" class="form-control withdrawalDisbursementDate dobformat"
                            id="withdrawalDisbursementDate" placeholder="DD/MM/YYYY" name="withdrawalDisbursementDate">
                        <span class="error withdrawalDisbursementDateError" style="display: none;">Please enter
                            disbursement date</span>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                    </div></br>


                    <label class="col-md-3 label-account" style="padding-left:0px!important">Account </label>
                    <div class="col-md-12 label-dropdown">
                        <select class="debitedAccount form-group-data col-md-12" id="debitedAcc"
                            style="padding: 5px; margin-left:-17px;">
                            <option value="DISBURSMENT">DISBURSMENT</option>
                            <option value="REPAYMENT">REPAYMENT</option>
                        </select>
                    </div>


                    <div class="col-md-12 divPartshow" style="display:none">
                        <label class="textContent">comments</label>
                        <textarea class="rejectionCommenmts" placeholder="Enter the comments"></textarea></br>
                        <span class="error rejectionSpan" style="display:none"> Enter the Rejectio Comments</span>
                    </div>

                </form>
            </div></br></br>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm dealWithdraw_Btn" data-loanid=""
                        onclick="approvedDealwithdrawalConfirms()">Save</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal  fade RejectApprovewithdrawal" id="modal-withdrawalApproveReject">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update</h4>
            </div>
            <div class="modal-body">
                <span class="withdrawal-Text"></span>
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
window.onload = lenderDealWithdrawalRequest('<?php echo $requestStatus; ?>');
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