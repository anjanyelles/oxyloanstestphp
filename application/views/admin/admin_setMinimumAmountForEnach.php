<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Set Minimum EMI Amount For eNach
        </h1>
    </section>

    <!-- Main content -->


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <!-- maincontent starts -->
                    <div class="main-cont borrowerprofile">
                        <div class="container">
                            <div class="middle-block">
                                <div class="form-block1 block-loan">
                                    <form id="emiAmountSection" autocomplete="off" method="post">

                                        <div class="offer_popup_cont clearfix">
                                            <div class="offer_popup_field1 clearfix">
                                                <label>Borrower ID:</label>
                                                <div class="fld-block">
                                                    <input type="text" class="borrowerId" id="borrowerId"
                                                        placeholder="Borrower ID ex:45">
                                                    <span class="error borrowerIdError" style="display: none;">Please
                                                        enter Borrower ID.</span>

                                                    <div class="clear"></div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="offer_popup_field1 clearfix">
                                                <label>Application ID:</label>
                                                <div class="fld-block">
                                                    <input type="text" class="appId" id="applicationId"
                                                        placeholder="Application ID ex:APBR456">
                                                    <span class="error appIdError" style="display: none;">Please enter
                                                        Application ID.</span>

                                                    <div class="clear"></div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>


                                            <div class="offer_popup_field1 clearfix">
                                                <label>Months Period:</label>
                                                <div class="fld-block">
                                                    <select class="form-control " id="tenure">
                                                        <option value="">-- Choose How many months to provide --
                                                        </option>
                                                        <option value="1">1Month</option>
                                                        <option value="2">2Months</option>
                                                        <option value="3">3Months</option>
                                                        <option value="4">4Months</option>
                                                        <option value="5">5Months</option>
                                                        <option value="6">6Months</option>
                                                        <option value="7">7Months</option>
                                                        <option value="8">8Months</option>
                                                        <option value="9">9Months</option>
                                                        <option value="10">10Months</option>
                                                    </select>
                                                    <span class="error tenureError" style="display: none;">Please Select
                                                        How many months do you want to Provide.</span>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="offer_popup_field1 clearfix">
                                                <label>EMI Amount:</label>
                                                <div class="fld-block">
                                                    <input type="text" class="emiAmount" id="emiAmount"
                                                        placeholder="EMI Amount">
                                                    <span class="error emiAmountError" style="display: none;">Please
                                                        enter EMI Amount.</span>

                                                    <div class="clear"></div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <!--  <div class="offer_popup_field1 clearfix">
                 <label>  EMI Date : </label>
                <div class="fld-block input-group date"  data-date-format="dd/mm/yyyy">
                          <input type="text" class="form-control emiDate " id="emiDate" placeholder="DD/MM/YYYY" name="emiDate">
                          <span class="error emiDateError" style="display: none;">Please enter EMI Date.</span>
                          <div class="clear"></div>
                      </div>
                       <div class="clear"></div>
                    </div> -->





                                            <div class="offer_popup_field1 clearfix">
                                                <div align="right">
                                                    <button type="button" class="btn  btn-primary btn-flat"
                                                        id="minimumeNACHamount">Submit</button>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
</div>



<div class="modal modal-success fade" id="modal-setMinimumeNACHSuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Updated</h4>
            </div>
            <div class="modal-body">
                Successfully updated the Minimum eNACH to this user.
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

<div class="modal modal-warning fade" id="modal-noLoansPresent">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text">gdfgf</p>
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

    $('#emiDate').datepicker({
        todayHighlight: true,
        dateFormat: 'dd/mm/yy',
        // startDate: new Date(),
        autoclose: true
    });
});
</script>


<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>


<?php include 'admin_footer.php';?>