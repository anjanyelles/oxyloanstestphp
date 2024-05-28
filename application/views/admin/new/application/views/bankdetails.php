<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Bank Details
            <small>Your bank details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Myprofile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <p class="displayError-myprofile error" style="display: none;">
                        </p>

                        <div class="col-xs-1"></div>
                        <form autocomplete="off" id="bankdetailsSection">
                            <div class="col-xs-10">

                                <div class="form-group row">
                                    <label for="account number" class="col-sm-3 col-form-label">Account Number</label>
                                    <div class="col-sm-9">
                                        <span class="displayaccountnumber udisplaysec"></span>


                                        <input type="text" name="accountnumber" class="form-control accountnumberValue"
                                            placeholder="Enter your Account Number" id="accountnumber" data
                                            validation="accountnumber">



                                        <span class="error accountnumberError" style="display: none;">Please enter your
                                            Account Number</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bank name" class="col-sm-3 col-form-label">Bank Name</label>
                                    <div class="col-sm-9">
                                        <span class="displaybankname udisplaysec"></span>
                                        <input type="text" name="bankname" class="form-control banknameValue"
                                            placeholder="Enter your Bank Name" id="bankname" data validation="bankname">
                                        <span class="error banknameError" style="display: none;">Please enter your Bank
                                            Name</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="branch name" class="col-sm-3 col-form-label">Branch Name</label>
                                    <div class="col-sm-9">
                                        <span class="displaybranchname udisplaysec"></span>
                                        <input type="text" name="branchname" class="form-control branchnameValue"
                                            placeholder="Enter your Branch Name" id="branchname" data
                                            validation="branchname">
                                        <span class="error branchnameError" style="display: none;">Please enter your
                                            Branch Name</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="account type" class="col-sm-3 col-form-label">Account Type</label>
                                    <div class="col-sm-9">
                                        <span class="displayaccounttype udisplaysec"></span>

                                        <select name="accounttype" class="form-control accounttypeValue" data
                                            validation="accounttype" id="accounttype">
                                            <option value="">-- Select AccountType--</option>
                                            <option value="Savings Account">Savings Account</option>
                                            <option value="Current Account">Current Account</option>
                                        </select>

                                        <span class="error accounttypeError" style="display: none;">Please select your
                                            Account Type</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ifsc code" class="col-sm-3 col-form-label">IFSC Code</label>
                                    <div class="col-sm-9">
                                        <span class="displayifsccode udisplaysec"></span>

                                        <input type="text" name="ifsccode" class="form-control ifsccodeValue"
                                            placeholder="Enter your IFSC Code" id="ifsccode" data validation="ifsccode">
                                        <span class="error ifsccodeError" style="display: none;">Please enter your IFSC
                                            Code</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 col-form-label">Bank Address</label>
                                    <div class="col-sm-9">
                                        <span class="displayaddress udisplaysec"></span>
                                        <textarea type="text" name="address" class="form-control addressValue"
                                            placeholder="Enter your Bank Address" id="address" data
                                            validation="address"></textarea>
                                        <span class="error addressError" style="display: none;">Please enter Bank
                                            Address</span>
                                    </div>
                                </div>

                                <p align="center">
                                    <button type="button" class="btn btn-flat btn-primary" id="bank-submit-btn">
                                        Submit</button>
                                    <button type="button" class="btn btn-info btn-sm" id="bank-edit-btn">
                                        <span class="glyphicon glyphicon-pencil"></span> Edit
                                    </button>
                                </p>


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
<div class="modal modal-success fade" id="modal-bankSuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Your Bank Details have successfully entered.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
loadbankDetails();
</script>

<?php include 'footer.php';?>