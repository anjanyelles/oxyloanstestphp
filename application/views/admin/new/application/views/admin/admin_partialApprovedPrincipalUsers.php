<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealId =  isset($_GET['dealId']) ? $_GET['dealId'] : '0';
$status =  isset($_GET['status']) ? $_GET['status'] : 'INITIATED';
if($status=="INITIATED"){
$amountType="Principal";
}else{
$amountType="Interest";
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="row">
            <h3 class="pull-left col-md-6">
                INITIATED / PRINCIPAL RETURNED
                </h1>
                <div class="pull-right col-md-6">
                    <input type="hidden" name="h2hprincipalHidden" id="hiddenDealH2hPrincipal"
                        value="<?php echo $dealId?>">
                    <a href="partialApprovedPrincipalUsers?dealId=<?php echo$dealId ?>&status=INITIATED">
                        <button class=" btn btn-success btnRoundUp" style="border-radius: 20px;">
                            Initiated Users
                        </button>
                    </a>
                    <a href="partialApprovedPrincipalUsers?dealId=<?php echo$dealId?>&status=PRINCIPALRETURNED"
                        class="compleated-Btn">
                        <button class=" btn btn-warning btnRoundUp" style="border-radius: 20px; margin-left: 10px;">
                            Principal Returned Users
                        </button>
                    </a>

                </div>
        </div>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="col-md-6">
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
                        <p class="pull-left"> Total Amount : <span class="sumofPrinInterest">0</span> </p>

                        <button class="pull-right btn btn-info btn-sm h2hInitiatedUsers"
                            style="margin: 10px; display: none"
                            onclick="moveinitiatedTransactionprincipal('INITIATED','<?php echo $dealId?>');">principal
                            to h2h</button>
                        <button class="pull-right btn btn-info btn-sm h2hPrincipalUsers"
                            style="display: none; margin-right:20px;"
                            onclick="moveinitiatedTransaction('PRINCIPALRETURNED','<?php echo $dealId?>');">interest to
                            h2h</button></br></br>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">

                                    <th>Lender Name</th>
                                    <th>User Id</th>
                                    <th><?php echo $amountType?> Amount</th>
                                    <th>No of Days</th>
                                    <th>Bank Deatils</th>

                                </tr>
                            </thead>
                            <tbody id="displayinitiatedData">

                                <tr class="dispalyNodata" style="display:none">
                                    <td colspan="12">No data found</td>

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

</div>
<!-- /.modal-dialog -->
</div> -->
<div class="modal modal-success fade" id="modal-movedPrincipalToh2h2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                This data has been moved to h2h
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
<div class="modal modal-danger fade" id="modal-already-moved-h2h">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                you had already sent the principal to H2H.
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

<div class="modal  fade" id="modal-ApprovePrincipalAmount">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title approve-ConfirmText">Approval Confirmation</h4>
            </div>
            <div class="modal-body">
                <form>

                    <label class="col-md-3 label-account" style="padding-left:0px!important">Account Type </label>
                    <div class="col-md-12 label-dropdown">
                        <select class="principaldebitedAccount form-group-data col-md-12" id="debitedAcc"
                            style="padding: 5px; margin-left:-17px;">
                            <option value="DISBURSMENT">DISBURSMENT</option>
                            <option value="REPAYMENT">REPAYMENT</option>
                        </select>
                    </div>
                </form>
            </div></br></br>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm dealPrincipal_Btn" data-status=""
                        data-dealId="" onclick="moveinitiatedprincipal()">Save</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script id="displayInitiatedScript" type="text/template">
    {{#data}}
<tr>
  <td>{{lenderName}}</td>
  <td>LR{{userId}}</td>
  <td>{{amount}}</td>
   <td>{{differenceInDays}}</td>
  <td>
    accountNumber: {{accountNumber}}</br>
    ifscCode: {{ifscCode}}</br>
  </td>
  
</tr>
{{/data}}
</script>
<script type="text/javascript">
window.onload = partialApprovedUsersinitiated('<?php echo $dealId; ?>', '<?php echo $status; ?>');
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('.h2hprincipalInterest').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        // startDate: new Date(),
        autoclose: true
    });
});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<?php include 'admin_footer.php';?>