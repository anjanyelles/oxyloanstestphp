<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">



    <section class="content" style="min-height:1000px!important">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="pull-left content-header">Upload The Sheet</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <form autocomplete="readPaymemt" id="raisealoanrequest">
                            <div class="col-xs-12">


                                <div class="form-group row">
                                    <label for="name " class="col-sm-4 col-form-label">Debit Amount<em
                                            class="error">*</em> :</label>
                                    <div class="col-sm-6">
                                        <select class="form-control durationValue" name="updating" id="Repayment" data
                                            validation="updating">
                                            <option value="">-- Choose Debit Amount --</option>
                                            <option value="IDFCREPAYMENT">IDFC REPAYMENT</option>
                                            <option value="ICICIREPAYMENT">ICICI REPAYMENT</option>
                                            <option value="ICICIDISBURSMENT"> ICICI DISBURSMENT</option>
                                        </select>
                                        <span class="error repaymentsheet" style="display: none;">Please choose
                                            Repayment Type</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name " class="col-sm-4 col-form-label">Debit Towards<em
                                            class="error">*</em> :</label>
                                    <div class="col-sm-6">
                                        <select class="form-control durationValue" name="updating" id="sheetname" data
                                            validation="updating">
                                            <option value="">-- Choose Debit Towards--</option>
                                            <option value="LENDERINTEREST">LENDER INTEREST</option>
                                            <option value="LENDEREMI">LENDER EMI</option>
                                            <option value="LENDERPRINCIPAL">LENDER PRINCIPAL</option>
                                            <option value="LENDERWITHDRAW"> LENDER WITHDRAW</option>
                                            <option value="DISBURSEDLOANS">DISBURSED LOANS</option>
                                            <option value="LENDERRELEND">LENDER RELEND</option>
                                            <option value="LENDERPOOLINGINTEREST">LENDER POOLING INTEREST</option>
                                            <option value="IDFCPAYMENTS">IDFC PAYMENTS</option>
                                        </select>
                                        <span class="error sheetname" style="display: none;">Please Choose Debit
                                            Towards</span>

                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="paidDate" class="col-sm-4 col-form-label">Uploading Date<em
                                            class="error">*</em> :</label>
                                    <div class="col-sm-6">

                                        <div class="input-group date" data-date-format="dd-mm-yyyy">
                                            <input type="text" class="form-control UploadedDate" id="UploadedDate"
                                                placeholder="dd-mm-yyyy" name="PaidDate" data validation="expectedDate">
                                            <span class="error Paid" style="display: none;">Please Choose Paid
                                                Date</span>
                                            <div class="input-group-addon">
                                                <span class=" glyphicon glyphicon-calendar"></span>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="paidDate" class="col-sm-4 pull-left"> Upload File <em
                                            class="error">*</em> :</label>
                                    <div class="col-sm-1">
                                        <div class="panel-body" id="userKYCUpload" enctype="multipart/form-data">
                                            <div class="form-lft kycproofs">
                                                <div class="fld-block upload_pdf">
                                                    <input class="custom-file-input FileUpload" data-clickedid=""
                                                        type='file' onchange="Uploadsheet(this);"
                                                        onclick="$('.FileUpload')" id="File"
                                                        accept=".xls,application/xlsx" />


                                                    <div class="clear"></div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="duration" class="col-sm-4 col-form-label">Remarks <em
                                            class="error">*</em>:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control durationValue" name="updating" id="Remarks" data
                                            validation="updating">
                                            <option value="">-- Loan Owner Name--</option>

                                        </select>
                                        <!--  <textarea class="form-control" cols="10" rows="4" placeholder="Remarks" id="Remarks"></textarea> -->
                                        <span class="error remarks" style="display: none;">Please Enter The
                                            Remarks</span>
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-sm-6 pull-right">

                                        <button type="button" class="btn btn-lg btn-primary"
                                            id="payment-sheet-btn">Submit</button>

                                        <br /><br />
                                        <button type="button" class="btn btn-lg btn-success" id="updatesheet"
                                            onclick="lenderreturnstodatabase();">Update</button>

                                    </div>
                                </div>
                            </div>



                            <div class="failedUsersInfo">
                                <br /><br /><br /><br />
                                <h4>Here are the failed users info</h4>
                                <div id="displayFailedUsersInfo">

                                </div>
                            </div>

                            <br /><br /><br /><br /><br /><br /><br /><br />
                            <input type="text" id="documnetId" placeholder="documnetId" readonly="readonly"><br />
                            <input type="text" id="uploadeddate" placeholder="uploadeddate" readonly="readonly"> <br />
                            <input type="text" id="uploadedType" placeholder="uploadedType" readonly="readonly">
                        </form>

                    </div>
                    <!-- /.box-body -->
                    <div class="hidden">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Loan Owner Name</th>
                                    <!-- <th>Sum Of Emi Amount</th> -->
                                </tr>
                            </thead>
                            <tbody id="displaywallettrns" class="displaywallettrns">
                                </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- Second box -->
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="pull-left content-header">Upload Referal Sheets</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding" style="height:800px;">
                        <form autocomplete="readPaymemt" id="raisealoanrequest">
                            <div class="col-xs-12">


                                <div class="form-group row">
                                    <label for="name " class="col-sm-4 col-form-label">Status<em class="error">*</em>
                                        :</label>
                                    <div class="col-sm-6">
                                        <select class="form-control referralStatusFile" name="updating" id="status" data
                                            validation="updating">
                                            <option value="">-- Choose Status --</option>
                                            <option value="Approved">Approved</option>
                                            <option value="Reject">Reject</option>
                                        </select>
                                        <span class="error repaymentsheet" style="display: none;">Please choose Status
                                            Type</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="paidDate" class="col-sm-4 pull-left"> Upload File <em
                                            class="error">*</em> :</label>
                                    <div class="col-sm-1">
                                        <div class="panel-body" id="userReferralDoc" enctype="multipart/form-data">
                                            <div class="form-lft kycproofs">
                                                <div class="fld-block upload_pdf">
                                                    <input class="custom-file-input FileReferralUpload"
                                                        data-clickedid="" type='file' id="FileReferralUploaddoc"
                                                        accept=".xls,application/xlsx" />


                                                    <div class="clear"></div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-sm-8 pull-right">

                                        <button type="button" class="btn btn-lg btn-primary"
                                            onclick="UploadsheetReferal();">Submit</button>

                                        <br /><br />

                                    </div>
                                </div>
                            </div>

                            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                        </form>

                    </div>
                    <!-- /.box-body -->
                    <div class="hidden">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Loan Owner Name</th>
                                    <!-- <th>Sum Of Emi Amount</th> -->
                                </tr>
                            </thead>
                            <tbody id="displaywallettrns" class="displaywallettrns">
                                </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script id="displayFailedUsersInfoTpl" type="text/template">
    {{#data}}
      <span>{{accountNumber}}</span><br/>
  {{/data}}
</script>


<div class="modal  fade" id="modal-viewEMI">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-9">
                        <h4 class="modal-title">Primary Borrower's Info</h4><br />If you've any queries please contact
                        <a href="mailto:subbu@oxyloans.com">subbu@oxyloans.com</a>
                    </div>
                </div></br>
                <div class="row col-xs-9">
                    <div class="pull-left text-bold">Total Number Of Borrowers:
                        <span id="totalborrowers">50000</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
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
                <p>Your transaction details are saved successfully.</br>
                </p>
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



<div class="modal modal-success fade" id="modal-fileUploadedSuccessfully">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <p>
                <h2 style="font-size: 16px;">File uploaded successfully.</h2>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-warning fade" id="modal-alreadyUploadedTheSheet">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text1">file not uploaded.</p>
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

<div class="modal modal-success fade" id="modal-databasesheetuploaded">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

                <p class="text-bold">Count value for Update the lender is :
                    <span id="countvalue">50000</span>
                </p>

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


<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/ion.rangeSlider.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    borrowersemiamount();
    $(".UploadedDate").datepicker({
        todayHighlight: true,
        format: 'dd-mm-yyyy',
        // startDate: new Date(),
        changeMonth: true,
        changeYear: true,
        endDate: "today",
    });
});
</script>
<script id="wallettransactiondetails" type="text/template">
    {{#data}}
                <tr> 
                  <td><a href="javascript:void(0)" class="viewLoanLenders"
                    onclick="viewborrowersemi('{{loanOwner}}')">{{loanOwner}}</a>
                  </td> 
                
                
                </tr>

 {{/data}}
  </script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<style type="text/css">
.failedUsersInfo {
    padding: 20px;
}
</style>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>