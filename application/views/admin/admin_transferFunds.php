<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header text-bold">
        <h1 style="margin-left:20px" class="text-bold">
            <left>Transfer The Funds</left>
        </h1>
    </section><br />

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="col-md-6">

                        </div>

                        

                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row col-md-12 hold-amount-box ">
                            <div class="row col-md-6 pull-left fdtransferPayment">

                                <div class="row col-md-12">
                                    <label for="" class="form-label col-md-4">Borrower Id :<em class="error">*</em>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" class="col-md-12 form-fd-input" name="" id="fetchborrowerfD"
                                            placeholder="Enter the Borrower Id" aria-describedby="helpId"
                                            placeholder="">
                                        <span class="error transferBorrowerId" style="display:none">Enter The Borrower
                                            Id</span>
                                    </div>
                                    <button type="button" class="btn btn-success pull-right col-md-2"
                                        onclick="fetchFDBorrowerFundsTrasfers();">Fetch Details</button>


                                </div>


                                <div class="row col-md-12 transferFeeAmountfromSystem" style="display:none">
                                    <label for="" class="form-label col-md-4">Loan Amount Through System:<em
                                            class="error">*</em>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-fd-input col-md-12" name="" id="fdAmountSystem"
                                            placeholder="Enter the Loan Amount" aria-describedby="helpId">
                                        <span class="error transferFdAmount" style="display:none">Trasfer Amount Should
                                            Be Less Than 1000000</span>
                                    </div>
                                </div>


                                 <div class="row col-md-12 transferFeeAmount" style="display:none">
                                    <label for="" class="form-label col-md-4">Fee Amount
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-fd-input col-md-12" name="" id="fdFeeAmount"
                                            placeholder="Enter the Fee Amount" aria-describedby="helpId">
                                        <span class="error transFeeAmount" style="display:none">Amount </span>
                                    </div>
                                </div>

                                <div class="col-md-12 fd-amount-payment text-center transfer_button" style="display:none">
                                    <label for="" class="form-label col-md-4"></label>
                                    <button class="btn btn-primary col-md-3" type="button" id="transferFd_Submit"
                                        onclick="fdFundsTrasfer();">Generate H2H File</button>

                                </div>
                            </div>



                            <div class="interest-info col-md-6 pull-right">
                                <div class="container interestCard showFdTransferDetails" style="display:none">
                                    <h4 class="text-bold">Bank Details</h4>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="interestDays">
                                                <div>User Name : <span class="fdtrasfterUsername"></span></div>
                                                <div> Account No : <span class="fdtrasfterAccount"></span></div>
                                                <div> IFSC : <span class="fdifsccode"></span> </div>
                                                <div> Branch : <span class="fdbranch"></span> </div>
                                                <div> FD Amount : <span class="fdAmount"></span> </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
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

<div class="modal  fade modal-success" id="modal-paymentfiletocms">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body loansUserSuccessMessage">
                <p class="info-message">The file was successfully Generated , Check The File in Cms Folder</p>

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


<div class="modal  fade modal-warning" id="modal-payment-failed">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body paymentTrasfer">
                <p id="info-errormessage"></p>

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

</script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>