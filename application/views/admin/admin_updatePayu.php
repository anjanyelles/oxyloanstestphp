<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-bold">
            Update PayU Transactions Details.
        </h1></br></br>
        <div class="alert payUupdateSuccessMessage" role="alert" style="display: none; background-color: #D0f0C0;">
            <strong>Updated Successfully</strong>
        </div>
        <div class="alert alert-warning awarningMessage" role="alert" style="display: none;">
            <strong><span class="warningmessage"></span></strong>
        </div>
    </section>
    <div class="cls"></div>
    </br>
    </br>
    <section class="content">
        <div class="cls"></div>
        <div class="row customFormQ">
            <div class="cls"></div>
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-secondary"></br></br></br></br>
                    <div class="box-body updatePayu">
                        <div class="form-group row">
                            <label for="pauuser " class="col-sm-2 col-form-label">User Id <em class="error">*</em>
                                :</label>
                            <div class="col-sm-3">
                                <input type="text" name="user" class="form-control payuUserId"
                                    placeholder="Enter The User ID" required="required" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lenderGroup " class="col-sm-2 col-form-label ">Payment Date<em
                                    class="error">*</em> :</label>
                            <div class="col-sm-3">
                                <input type="text" name="payDate" class="form-control payDate"
                                    placeholder="Enter The Payment Date" required="required" />

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dealId " class="col-sm-2 col-form-label ">Deal Id<em class="error">*</em>
                                :</label>
                            <div class="col-sm-3">
                                <input type="text" name="dealId" class="form-control payDealId"
                                    placeholder="Enter The Deal Id" required="required" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Amount" class="col-sm-2 col-form-label ">Amount <em class="error">*</em>
                                :</label>
                            <div class="col-sm-3">
                                <input type="text" name="Amount" class="form-control payuAmount"
                                    placeholder="Enter The Amount" required="required" />
                            </div>
                        </div>
                        <div class="row">
                            <label for="duration" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-lg btn-primary pull-right"
                                    onclick="updatePayUtransaction();">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
$(document).ready(function() {

});
</script>
<script>
$(function() {
    $(".payDate").datepicker({
        changeMonth: true,
        changeYear: true,
        format: 'dd/mm/yyyy',
        todayHighlight: true,
    });
});
</script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>


<?php include 'admin_footer.php';?>