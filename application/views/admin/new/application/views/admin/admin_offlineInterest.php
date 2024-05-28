<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="text-bold">
            Offline Interest/Principal
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
                            <h3 class="box-title text-bold"> Fill deal Details </h3>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group row col-xs-12">
                            <div class="col-xs-5">
                                <label for="lenderId" class="lenderID">Deal Id</label>
                                <input type="text" class="form-control offlinedealId" id="offlinedealId"
                                    placeholder="Enter the  Deal ID" name="offlinedealId" data
                                    validation="offlinedealId">
                                <span class="error errordealId" style="display: none;">Please enter The deal ID</span>
                            </div>
                            <div class="col-md-5">
                                <label for="lendergroup" class="groupID">status</label>
                                <select class="form-control statusoffline" id="offlineFileStatus" data
                                    validation="status">
                                    <option value="">Choose Status</option>
                                    <option value="APPROVED">APPROVED</option>
                                    <option value="ONHOLD">ONHOLD</option>
                                </select>
                                <span class="error offlinestatus" style="display: none;">Please choose The status</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="form-group row col-xs-12">
                            <div class="col-xs-5">
                                <label for="email" class="email">Total Amount</label>
                                <input type="text" class="form-control offlineamount" id="offlineamount"
                                    placeholder="Enter The Amount" name="offlineamount" data validation="offlineamount">
                                <span class="error errortotalamount" style="display: none;">Please enter The Total
                                    Amount</span>
                            </div>
                            <div class="col-md-5">
                                <label for="amount" class="mobileNumber">payment Date</label>
                                <input type="text" class="form-control offlinepayment" id="offlinepayment"
                                    placeholder="Enter The payment date" name="date" data validation="date">
                                <span class="error errorpaymentdate" style="display: none;">Please choose date</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="form-group row col-xs-12">
                            <div class="col-xs-5">
                                <label for="lenderReturnType" class="lrReturnType"> Original Payment Date</label>
                                <input type="text" class="form-control orginalDate" id="orginalDate"
                                    placeholder="Enter The  Orginal Date" name="date" data validation="orginalDate">
                                <span class="error errororginalPayment" style="display: none;">Please enter The orginal
                                    payment date</span>
                            </div>

                            <div class="col-xs-5">
                                <button type="button" class="btn btn-md btn-primary pull-left"
                                    onclick="offlineInterestPrincipal();"
                                    style="position: absolute; margin-top: 24px;">Submit</button>
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


<div class="modal modal-primary fade" id="modal-h2happroveOfflinePayments">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confimation</h4>
            </div>
            <div class="modal-body">
                <p id="text">

                    Are you sure you want to read this record data ?
                </p>

            </div>
            <div class="modal-footer">
                <div align="right">

                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" id="approvalOfflineH2h"
                        onclick="">Approve</button>

                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Reject</button>
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