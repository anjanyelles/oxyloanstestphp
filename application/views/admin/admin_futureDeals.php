<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" align="left">
        <h1>Launch Future Deals</h1>
    </section>
    <br />

    <!-- Main content -->


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">

                        <div class="col-xs-1"></div>
                        <form autocomplete="readPaymemt" id="raisealoanrequest">
                            <div class="col-xs-10">

                                <div class="form-group row">
                                    <label for="name " class="col-sm-3 col-form-label">Deal Name<em class="error">*</em>
                                        :</label>
                                    <div class="col-sm-6">
                                        <div class="input-div">
                                            <input type="text" class="form-control" id="futuredealName"
                                                placeholder="Deal Name" onchange="fetchWhatsappChatID();" required>

                                        </div>
                                        <span class="error futureDealName" style="display: none;">Please Enter The Deal
                                            name</span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name " class="col-sm-3 col-form-label">Deal Id<em class="error">*</em>
                                        :</label>
                                    <div class="col-sm-6">
                                        <div class="input-div">
                                            <input type="text" name="loanRequestAmount"
                                                class="form-control loanRequestAmount" placeholder="Enter The Deal Id"
                                                id="dealidfuture" required="required">

                                        </div>
                                        <span class="error futureDealId" style="display: none;">Please Enter The Deal
                                            Id</span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name " class="col-sm-3 col-form-label">WhatsApp Chat Id<em
                                            class="error">*</em> :</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="loanRequestAmount"
                                            class="form-control loanRequestAmount"
                                            placeholder="Enter The whatsapp Chat Id" id="dealWhatsappChatId"
                                            required="required" />
                                        <span class="error futureDealChatId" style="display: none;">Please Enter The
                                            WhatsApp Chat Id</span>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="name " class="col-sm-3 col-form-label">Deal Type<em class="error">*</em>
                                        :</label>
                                    <div class="col-sm-6">
                                        <select class="form-control futureLaunchDealType">
                                            <option value="">-- Choose Deal Type --</option>
                                            <option value="EQUITY">EQUITY</option>
                                            <option value="NORMAL">NORMAL</option>
                                            <option value="ESCROW">ESCROW</option>
                                            <option value="TEST">TEST</option>
                                            <option value="PERSONAL">PERSONAL</option>
                                        </select>
                                        <span class="error futureDealType" style="display: none;">Please Choose The Deal
                                            Type</span>
                                    </div>

                                </div>
                            </div>
                            <div class="clear"></div>
                            <center>
                                <button type="button" class="btn btn-lg btn-primary" id="launchFutureDeal-submit-btn"
                                    onclick="launchFutureDeal();">Submit</button>
                            </center>
                            <div class="clear"></div>
                    </div>
                    </form>
                    <div class="col-xs-1"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<form id="readPaymemt" enctype="multipart/form-data" style="display:none;">
    <div class="file-upload col-xs-3 FileUpload">
        <button class="file-upload-btn" type="button" onclick="$('.FileUpload').trigger( 'click' )">Add PAYMENT
            Card</button>

        <div class="image-upload-wrap pan-image-upload-wrap">
            <input class="file-upload-input FileUpload" type='file' onchange="readPaymemt(this);" accept="image/*" />
            <div class="drag-text">
                <h3>Drag and drop a file or select add Payment Card</h3>
            </div>
        </div>
        <div class="file-upload-content Payment-file-upload-content">
            <img class="file-upload-image paymemtImage" src="#" alt="your image" />
            <div class="image-title-wrap">
                <button type="button" class="remove-image File-uploadedButton">Uploaded
                </button>
            </div>
        </div>
    </div>
</form>





<div class="modal modal-success fade" id="modal-futuredeal-launched-time">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p> deal is successfully launched, the lender will get the deal notification. </p>
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
        </div>bbbb
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-success fade" id="modal-fileUploadedSuccessfully1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <p>
                <h2 style="font-size: 16px;">Borrower Details uploaded successfully.</h2>
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
<div class="modal modal-warning fade" id="modal-paymentUploadedWarning">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text1">bjhvj.</p>
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

    $("#expectedDateValue").datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        changeMonth: false,
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