<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Financial Details
            <small>Your financial information</small>
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
                        <form autocomplete="off" id="financialinfoSection">
                            <div class="col-xs-10">


                                <div class="form-group row">
                                    <label for="monthly Emi" class="col-sm-4 col-form-label">Monthly EMI's</label>
                                    <div class="col-sm-8">
                                        <span class="displaymonthlyEmi udisplaysec"></span>
                                        <input type="text" name="monthlyEmi" class="form-control monthlyEmiValue"
                                            placeholder="Enter your monthly EMI" id="monthlyEmi" data
                                            validation="monthlyEmi">
                                        <span class="error monthlyEmiError" style="display: none;">Please enter your
                                            monthly EMI</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="credit Amount" class="col-sm-4 col-form-label">Credit Amount</label>
                                    <div class="col-sm-8">
                                        <span class="displaycreditamount udisplaysec"></span>
                                        <input type="text" name="creditamount" class="form-control creditamountValue"
                                            placeholder="Enter your Credit Amount" id="creditamount" data
                                            validation="creditamount">
                                        <span class="error creditamountError" style="display: none;">Please enter your
                                            Credit Amount</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="existing loan amount" class="col-sm-4 col-form-label">Existing Loan
                                        Amount</label>
                                    <div class="col-sm-8">
                                        <span class="displayexistingloanamount udisplaysec"></span>
                                        <input type="text" name="existingloanamount"
                                            class="form-control existingloanamountValue"
                                            placeholder="Enter your existing loan amount" id="existingloanamount" data
                                            validation="existingloanamount">
                                        <span class="error existingloanamountError" style="display: none;">Please enter
                                            your Existing Loan Amount</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="creditcards repayment amount" class="col-sm-4 col-form-label">Credit
                                        Cards Repayment Amount</label>
                                    <div class="col-sm-8">
                                        <span class="displaycreditcardsrepaymentamount udisplaysec"></span>
                                        <input type="text" name="creditcardsrepaymentamount"
                                            class="form-control creditcardsrepaymentamountValue"
                                            placeholder="Enter your Credit cards Repayment Amount"
                                            id="creditcardsrepaymentamount" data
                                            validation="creditcardsrepaymentamount">
                                        <span class="error creditcardsrepaymentamountError"
                                            style="display: none;">Please enter your Credit Cards Repayment
                                            Amount</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="other sources income" class="col-sm-4 col-form-label">Other Sources
                                        Income</label>
                                    <div class="col-sm-8">
                                        <span class="displayothersourcesincome udisplaysec"></span>
                                        <input type="text" name="othersourcesincome"
                                            class="form-control othersourcesincomeValue"
                                            placeholder="Enter your Other Sources Income" id="othersourcesincome" data
                                            validation="othersourcesincome">
                                        <span class="error othersourcesincomeError" style="display: none;">Please enter
                                            your Other Sources Income</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for=">net monthly income" class="col-sm-4 col-form-label">Salary</label>
                                    <div class="col-sm-8">
                                        <span class="displaynetmonthlyincome udisplaysec"></span>
                                        <input type="text" name="netmonthlyincome"
                                            class="form-control netmonthlyincomeValue"
                                            placeholder="Enter your Net Monthly Income" id="netmonthlyincome" data
                                            validation="netmonthlyincome">
                                        <span class="error netmonthlyincomeError" style="display: none;">Please enter
                                            your Net Monthly Income</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for=" avg monthly expenses" class="col-sm-4 col-form-label">Avg Monthly
                                        Expenses</label>
                                    <div class="col-sm-8">
                                        <span class="displayavgmonthlyexpenses udisplaysec"></span>
                                        <input type="text" name="avgmonthlyexpenses"
                                            class="form-control avgmonthlyexpensesValue"
                                            placeholder="Enter your Avg Monthly expenses" id="avgmonthlyexpenses" data
                                            validation="avgmonthlyexpenses">
                                        <span class="error avgmonthlyexpensesError" style="display: none;">Please enter
                                            your Avg Monthly Expenses </span>
                                    </div>
                                </div>
                                <p align="center">
                                    <button type="button" class="btn btn-flat btn-primary" id="financial-submit-btn">
                                        Submit</button>
                                    <button type="button" class="btn btn-info btn-sm" id="financial-edit-btn">
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
<!-- /.content-wrapper -->
<div class="modal modal-success fade" id="modal-FinancialSuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Your Financial Details have successfully entered.</p>
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
loadfinancialDetails();
</script>

<?php include 'footer.php';?>