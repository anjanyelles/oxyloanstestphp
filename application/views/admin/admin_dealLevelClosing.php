<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <section class="content-header" style="margin-bottom: 40px;">
        <div class="alert  showDealClosedMessage" role="alert"
            style="background-color: #D0f0C0; display: none; font-size: 18px;">
            <span id="error-DealClosed"><strong>Well done!</strong> Deal Closed Successfully.</span>
        </div>
        <div class="alert  showDealClosedErrorMessage" role="alert"
            style="background-color: orange; display: none; font-size: 18px;">
            <span id="error-DealClosed"><strong>Well done!</strong> Deal Closed Successfully.</span>
        </div>
    </section>
    <div class="row customFormQ">
        <div class="box box-primary">
            <div class="box-body">
                <div class="box-body no-padding">
                    <div class="col-md-12 pull-left" style="margin-top: 35px; padding-left:20%;">
                        <div style="margin-bottom:30px;padding-left:30%;">
                            <h4 class="title-name">Close The Deal</h4>
                        </div>
                        <div class="form-group row">
                            <label for="name " class="col-sm-3 col-form-label">Deal ID<em class="error">*</em> :</label>
                            <div class="col-sm-7">
                                <input type="text" name="CloseDealId" class="form-control loanRequestAmount"
                                    placeholder="Enter The Deal ID " id="closedealId" required="required" />
                                <span class="error error-closed" style="display: none;">Please Enter The Deal Id</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name " class="col-sm-3 col-form-label">Close Date<em class="error">*</em>
                                :</label>
                            <div class="col-sm-7">
                                <input type="text" name="closedate" class="form-control closeDate"
                                    placeholder="Enter The Deal Close date" id="deal-closedDate" required="required" />
                                <span class="error error-close" style="display: none;">Please Enter The Deal Close
                                    Date</span>
                            </div>
                        </div>
                        <button class="col-md-3  btn  btn-lg pull-left" id="query-submit"
                            onclick="dealClosed();">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
<link rel="stylesheet" href="assets/css/selectize.default.css">
<link rel="stylesheet" href="assets/css/dd.css">
<link rel="stylesheet" href="assets/css/animate.css">
<link rel="stylesheet" href="assets/css/responsive.css">
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/style.css">
<script src="<?php echo base_url(); ?>assets/js/myscript.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/animation.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/selectize.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dd.js?oxyloans=<?php echo time(); ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript">
gettingMobileAndEmail()
$(document).ready(function() {
    noprofileCheck = "no";
    noROICheck = "no";
});
</script>
<style type="text/css">
input[type=text],
select {
    width: 40%;
    padding: 12px;
    margin-top: 6px;
    margin-bottom: 16px;
}

input[type=text],
textarea {
    border-radius: 20px;
}

button {
    position: lex;
    margin-left: 260px;
    width: 100%;
    margin-top: 12px;
    background-color: #FFCE30;
}

.title-name {
    font-size: 20px;
}
</style>
<script type="text/javascript">
$(document).ready(function() {

    $("#deal-closedDate").datepicker({
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        // startDate: new Date(),
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