<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            ADD THE LOAN OWNER
        </h1>
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
                <div class="box box-primary">
                    <div class="box-header">
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
                        <div class="pull-right">
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group row">
                            <label for="name " class="col-sm-3 col-form-label ">Borrower ID :<em class="error">*</em>
                                :</label>
                            <div class="col-sm-3">
                                <input type="text" name="loanRequestAmount" class="form-control borrowerId"
                                    placeholder="Enter The Borrower ID" required="required" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name " class="col-sm-3 col-form-label ">Loan Owner Name<em class="error">*</em>
                                :</label>
                            <div class="col-sm-3">
                                <select class="form-control durationValue" name="updating" id="loanOwner" data
                                    validation="updating">
                                    <option value="">-- Loan Owner Name--</option>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label for="duration" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-lg btn-primary pull-right"
                                    onclick="addloanowners();">Submit</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<div class="modal modal-success fade" id="modal-agreement-already">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Your are successfully Added The Loan Owner.</br>
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
<div class="modal modal-warning fade" id="modal-alreadyAddedinDb">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text1"> You are successfully added the loan owner name</p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"
                        id="highest">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    getloanownernames();

});
</script>

<?php include 'admin_footer.php';?>