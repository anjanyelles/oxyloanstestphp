<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Raise a loan request
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Payments</li>
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

                        <div class="col-xs-1"></div>
                        <form autocomplete="off" id="raisealoanrequest">
                            <div class="col-xs-10">

                                <div class="form-group row">
                                    <label for="loanRequestAmount " class="col-sm-2 col-form-label">Loan Request
                                        Amount</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="loanRequestAmount"
                                            class="form-control loanRequestAmount" placeholder="Enter your Amount"
                                            id="loanRequestAmount" data validation="loanRequestAmount"
                                            required="required">
                                        <span class="error loanRequestAmountError" style="display: none;">Please enter
                                            loan amount value</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rateOfInterest " class="col-sm-2 col-form-label">Rate of Interest
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control rateOfInterest" name="rateOfInterest"
                                            placeholder="Enter your rateOfInterest" id="rateOfInterest" data
                                            validation="rateOfInterest">
                                        <span class="error rateOfInterestError" style="display: none;">Please choose
                                            Rate of Interest</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="duration" class="col-sm-2 col-form-label">Duration</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control durationValue"
                                            placeholder="Enter your duration time" name="duration" id="duration" data
                                            validation="duration">
                                        <span class="error durationError" style="display: none;">Please choose
                                            duration</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="repaymentMethod" class="col-sm-2 col-form-label">Repayment
                                        Method</label>
                                    <div class="col-sm-10">
                                        <!-- 
                      <input type="text" class="form-control repaymentMethod" placeholder="Enter your repaymentMethod" name="repaymentMethod" id="repaymentMethod" data validation="repaymentMethod"> 
                    -->

                                        <input type="radio" id="principleMethod" name="repaymentMethod" value="PI" />
                                        <label for="principleMethod">Principal Interest (P+I)</label>
                                        &nbsp;&nbsp;
                                        <input type="radio" id="interestMethod" name="repaymentMethod" value="I" />
                                        <label for="interestMethod">Interest</label>


                                        <span class="error repaymentMethodError" style="display: none;">Please choose
                                            repayment method</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="loanPurpose" class="col-sm-2 col-form-label">Loan Purpose</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control  loanPurpose"
                                            placeholder="Enter your loanPurpose" name="loanPurpose" id="loanPurpose"
                                            data validation="loanPurpose">
                                        <span class="error loanPurposeError" style="display: none;">Please choose
                                            purpose loan</span>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="expectedDate" class="col-sm-2 col-form-label">Expected Date </label>
                                    <div class="col-sm-10">

                                        <input type="date" class="form-control expectedDateValue" placeholder=""
                                            name="expectedDate" id="expectedDate" data validation="expectedDate">
                                        <span class="error expectedDateError" style="display: none;">Please choose date
                                            when you're expectin loan</span>
                                    </div>
                                </div>



                                <center> <button type="button" class="btn btn-lg btn-primary"
                                        id="loan-submit-btn">Submit</button>

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
<div class="modal modal-success fade" id="modal-raisealoan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>We accepted your loan request.If any lender intrested we will inform to you. </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php include 'footer.php';?>