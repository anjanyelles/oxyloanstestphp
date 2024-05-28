<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" align="center">
        <h1>Upload borrower payment details</h1>
    </section>
    <br />
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">

                        <div class="col-xs-1"></div>
                        <form autocomplete="readPaymemt" id="raisealoanrequest">
                            <div class="col-xs-10">

                                <div class="form-group row">
                                    <label for="name " class="col-sm-3 col-form-label">Borrower Unique Number</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="loanRequestAmount"
                                            class="form-control loanRequestAmount getBorrowerName"
                                            placeholder="Enter The Borrower Unique Number " id="Unique"
                                            required="required" />

                                        <span class="error unique" style="display: none;">Please Enter The Borrower
                                            Unique Number</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <button class="btn btn-primary btn-small" onclick="getBorrowerName();">Get
                                            Borrower Name</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name " class="col-sm-3 col-form-label">Borrower Name</label>
                                    <div class="col-sm-9">
                                        <!-- <input disabled="disabled" type="text" name="loanRequestAmount" class="form-control loanRequestAmount" placeholder="Enter The Borrower Name" id="name"  required="required"> -->
                                        <select id="loadBorrowerNames" class="borrowerNameValue form-control">
                                            <option id="" value="">--Choose Borrower Names--</option>
                                        </select>
                                        <span class="error name" style="display: none;">Please Enter The Borrower
                                            Name</span>
                                    </div>
                                </div>

                                <div class="form-group row" style="display: none;">
                                    <label for="name " class="col-sm-3 col-form-label">Borrower Mobile Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="borrowermobile" class="form-control borrowermobile"
                                            placeholder="Enter The Borrower Mobile Number " id="Mobile"
                                            required="required" />
                                        <span class="error mobile" style="display: none;">Please Enter The Borrower
                                            Mobile Number</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="amount" class="col-sm-3 col-form-label">Received Amount</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control  loanPurpose"
                                            placeholder="Enter  The Received Amount" name="amount" id="amount">
                                        <span class="error amount" style="display: none;">Please Enter The Amount
                                            Greater Than Zeo</span>
                                    </div>
                                    <div class=col-sm-2>
                                        <input type="radio" id="PartPayment" name="payment" value="PARTPAYMENT">
                                        <label for="PartPayment">Part</label><br>
                                    </div>
                                    <div class=col-sm-2>
                                        <input type="radio" id="FullPayment" name="payment" value="FULLPAYMENT">
                                        <label for="FullPayment">Full</label><br>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="paidDate" class="col-sm-3 col-form-label">Paid Date </label>
                                    <div class="col-sm-9">
                                        <div class="input-group date" data-date-format="dd/mm/yyyy">
                                            <input type="text" class="form-control expectedDateValue" id="paidDate"
                                                placeholder="dd/mm/yyyy" name="PaidDate" data validation="expectedDate">
                                            <span class="error Paid" style="display: none;">Please Enter The Paid
                                                Date</span>
                                            <div class="input-group-addon">
                                                <span class=" glyphicon glyphicon-calendar"></span>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="paidDate" class="col-sm-3 col-form-label"> File </label>
                                    <div class="col-sm-9">
                                        <div class="panel-body" id="userKYCUpload" enctype="multipart/form-data">
                                            <div class="form-lft kycproofs">
                                                <div class="fld-block upload_pdf">
                                                    <input class="custom-file-input FileUpload" data-clickedid=""
                                                        type='file' onchange="readPaymemt(this);"
                                                        onclick="$('.FileUpload')" id="File" accept="image/*" />

                                                    <a href="#" class="PaymentId"
                                                        onclick="downloadPaymemt('PAYMENTSCREENSHOT')"> </a>
                                                    <input type="hidden" id="documnetId"> </a>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="duration" class="col-sm-3 col-form-label">Updating By</label>
                                    <div class="col-sm-9">
                                        <!--<input type="text" class="form-control durationValue" placeholder="Enter your duration time" name="duration" id="duration" data validation="duration"> -->
                                        <select class="form-control durationValue" name="updating" id="updating" data
                                            validation="updating">
                                            <option value="">-- Choose Your Name --</option>
                                            <option value="Radha">Radha</option>
                                            <option value="Megha">Megha</option>
                                            <option value="Muni">Muni</option>
                                            <option value="Lakshmi">Lakshmi</option>
                                            <option value="Sekhar">sekhar</option>
                                            <option value="Bhargav">Bhargav</option>
                                            <option value="Subash">Subash</option>
                                            <option value="Ramadevi">Ramadevi</option>
                                            <option value="Livin">Livin</option>
                                            <option value="Pranav">Pranav</option>
                                            <option value="Anusha">Anusha</option>
                                            <option value="Archana">Archana</option>
                                            <option value="Narendra">Narendra</option>


                                        </select>
                                    </div>
                                </div>
                                </br>
                                </br>
                                <center> <button type="button" class="btn btn-lg btn-primary"
                                        id="payment-submit-btn">Submit</button>
                                </center>
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
<div class="modal modal-danger fade" id="modal-agreement-already">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">OOPS!</h4>
            </div>
            <div class="modal-body">
                <p>Something went wrong, Try again.</p>
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
<script id="displayBorrowersList" type="text/template">
    {{#data}}
<option id="{{id}}" value="{{firstName}}">{{firstName}}</option>
{{/data}}
</script>
<script type="text/javascript">
$(document).ready(function() {
    noprofileCheck = "no";
    noROICheck = "no";
});
</script>
<?php include 'admin_footer.php';?>