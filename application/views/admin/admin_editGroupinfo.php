<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-bold">
            EDIT THE LENDER GROUP
        </h1>
        </br></br>
        <div class="alert payUupdateSuccessMessage" role="alert" style="display: none; background-color: #D0f0C0;">
            <strong> The lender group has been updated successfully.</strong>
        </div>
        <div class="alert alert-warning awarningMessage" role="alert" style="display: none;">
            <strong><span class="warningmessage"></span></strong>
        </div>
    </section>
    <div class="cls"></div>
    </br>
    </br>
    <section class="content">
        <div class="row customFormQ">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-secondary" style="margin-top:none!important">
                    <div class="box-body editlendergroup">
                        <div class="form-group row upload_Block">
                            <label for="lenderId " class="col-sm-3 col-form-label ">Lender ID <em class="error">*</em>
                                :</label>
                            <div class="col-sm-7 uploadInput">
                                <input type="text" name="editlenderId" class="form-control editlenderId"
                                    placeholder="Enter The Lender ID" required="required" />

                                <span class="error lendrIderror" style="display:none">Enter lender Id</span>
                            </div>

                        </div>


                        <div class="form-group row paymentDateforLender upload_Block">
                            <label for="lenderGroup " class="col-sm-3 col-form-label ">Payment Date<em
                                    class="error">*</em> :</label>
                            <div class="col-sm-7 uploadInput">
                                <input type="text" name="payDate" class="form-control payDate"
                                    placeholder="Enter The Payment Date" required="required" />
                                <span class="error paymentDateerror" style="display:none">Enter Payment Date</span>

                            </div>
                        </div>
                        <div class="form-group row paymentAmount upload_Block">
                            <label for="Amount" class="col-sm-3 col-form-label ">Amount <em class="error">*</em>
                                :</label>
                            <div class="col-sm-7 uploadInput">
                                <input type="text" name="Amount" class="form-control payuAmount"
                                    placeholder="Enter The Amount" required="required" />
                                <span class="error payuAmounterror" style="display:none">Enter Amount Id</span>
                            </div>
                        </div>

                        <div class="form-group row transactionID upload_Block">
                            <label for="Amount" class="col-sm-3 col-form-label ">Transaction ID <em class="error">*</em>
                                :</label>
                            <div class="col-sm-7 uploadInput">
                                <input type="text" name="Amount" class="form-control tranctionIdAmount"
                                    placeholder="Enter The Transaction ID" required="required" />

                                <span class="error TransactionIderror" style="display:none">Enter Transaction Id</span>
                            </div>
                        </div>
                        <div class="row upload_Block">
                            <label for="duration" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-lg btn-primary pull-left"
                                    onclick="updateLenderGroup();">Submit</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<div class="modal modal-success fade" id="modal-oxyfundinglenders-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Your are successfully Update.</br>
                    please wait for 2s page will refresh automatically</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script>
$(function() {
    $(".payDate").datepicker({
        changeMonth: true,
        changeYear: true,
        format: 'yyyy-mm-dd',
        todayHighlight: true,
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#paid").click(function() {
        $('#unpaid').prop('checked', false); // Checks it
        $('.paymentAmount').show();
        $('.paymentDateforLender').show();
    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $("#unpaid").click(function() {
        $('#paid').prop('checked', false); // Checks it
        $('.paymentAmount').hide();
        $('.paymentDateforLender').hide();
    });
});
</script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<?php include 'admin_footer.php';?>