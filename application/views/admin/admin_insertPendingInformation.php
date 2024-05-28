<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="text-bold">
        Lender pending Amount
        </h1>
        <div class="alert offlineSuccessInterest" role="alert"
            style="background-color:#D0f0C0; display: none; margin-top:50px">
            <strong>Thanks! </strong> A record of data successfully saved in our database <br>
        </div>
    </section>

    
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title text-bold"> Fill the Details </h3>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group row col-xs-12">
                            <div class="col-xs-5">
                                <label for="lenderpendinguserId" class="lenderID">User Id</label>
                                <input type="text" class="form-control userId" id="lenderpendinguserId"
                                    placeholder="Enter the  user ID" name="userId" data
                                    validation="userId">
                                <span class="error errorlenderpendinguserId" style="display: none;">Please enter The user ID</span>
                            </div>
                            <div class="col-md-5">
                                <label for="pendingamountType" class="amountType">Amount Type</label>
                                <select class="form-control amountType" id="pendingamountType" data
                                    validation="status">
                                    <option value="">Choose Status</option>
                                    <option value="LENDERINTEREST">LENDER INTEREST</option>
                                    <option value="LENDERPRINCIPAL">LENDER PRINCIPAL</option>
                                       <option value="REFERRALBONUS">REFERRAL BONUS</option>
                             
                                </select>
                                <span class="error errorpendingamountType" style="display: none;">Please choose The pending amount Type</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="form-group row col-xs-12">
                            <div class="col-xs-5">
                                <label for="pendingamount" class="email">Amount</label>
                                <input type="text" class="form-control amount" id="pendingamount"
                                    placeholder="Enter The Amount" name="amount" data validation="amount">
                                <span class="error errorpendingamount" style="display: none;">Please enter The 
                                    Amount</span>
                            </div>
                            <div class="col-md-5">
                                <label for="pendingdealId" class="mobileNumber">deal Id</label>
                                <input type="text" class="form-control pendingdealId" id="pendingdealId"
                                    placeholder="Enter The deal Id" name="dealId" data validation="dealId">
                                <span class="error errorpendingdealId" style="display: none;">Enter the Deal Id</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="form-group row col-xs-12">
                            <div class="col-xs-5">
                                <label for="lenderReturnType" class="lrReturnType">Reason</label>
                                <input type="text" class="form-control reason" id="pendingreason"
                                    placeholder="Enter The Pending Amount Reason" name="date" data validation="reason">
                                <span class="error errorLendingReason" style="display: none;">Please enter Reason</span>
                            </div>

                             <div class="col-md-5">
                                <label for="lendergroup" class="amountType">Transaction Type</label>
                                <select class="form-control amountType" id="pendingTransactiontype" data
                                    validation="status">
                                    <option value="">Choose transactionType</option>
                                    <option value="DISBURSMENT">DISBURSMENT</option>
                                    <option value="LENDERPRINCIPAL">LENDER PRINCIPAL</option>
                                       <option value="REPAYMENT">RE PAYMENT</option>
                             
                                </select>
                                <span class="error offlinependingTransactiontype" style="display: none;">Please choose The Transaction Type</span>
                            </div>
</div>
                        <div class="form-group row col-xs-12">
                            <div class="col-xs-5">
                                <label for="lendningnoOfDays" class="lrReturnType">No Of Days</label>
                                <input type="text" class="form-control noOfDays" id="lendningnoOfDays"
                                    placeholder="Enter The  no Of Days" name="date" data validation="noOfDays">
                                <span class="error errorrnoOfDays" style="display: none;">Please enter The No of dates</span>
                            </div>

                              <div class="col-xs-5">
                                <button type="button" class="btn btn-md btn-primary pull-left"
                                    onclick="lenderPendingAmountFile();"
                                    style="position: absolute; margin-top: 24px;">Submit</button>
                            </div> 

                            </div>

                            <div class="clear"></div>
                            <div class="clear"></div>
                            <div class="clear"></div>

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


<div class="modal modal-success fade" id="modal-lenderpendingsuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks</h4>
            </div>
            <div class="modal-body">
                <p id="text">
                  User details were successfully saved.
                </p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<div class="modal modal-warning fade" id="modal-offlineInterestAndPrincipal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Status</h4>
            </div>
            <div class="modal-body">
                <p id="display_text"></p>

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
$(document).ready(function() {
    borrowersemiamount();
    $("#offlinepayment,#orginalDate").datepicker({
        todayHighlight: true,
        format: 'dd-mm-yyyy',
        changeMonth: true,
        changeYear: true,
        endDate: "today",
    });
});
</script>


<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>