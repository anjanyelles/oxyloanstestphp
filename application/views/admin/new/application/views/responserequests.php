<?php include 'header.php';?>
<?php include 'sidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Responses to my Requests
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
                        <form autocomplete="off" id="loanlistingsSection">
                            <div class="col-xs-10">

                                <div class="form-group row">
                                    <label for="loanRequestAmount "
                                        class="col-sm-2 col-form-label">loanRequestAmount</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="loanRequestAmount"
                                            class="form-control loanRequestAmount" placeholder="Enter your Amount"
                                            id="loanRequestAmount" data validation="loanRequestAmount">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rateOfInterest " class="col-sm-2 col-form-label">rateOfInterest </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control rateOfInterest" name="rateOfInterest"
                                            placeholder="Enter your rateOfInterest" id="rateOfInterest" data
                                            validation="rateOfInterest">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="duration" class="col-sm-2 col-form-label">duration</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control durationValue"
                                            placeholder="Enter your duration time" name="duration" id="duration" data
                                            validation="duration">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="repaymentMethod" class="col-sm-2 col-form-label">repaymentMethod</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control repaymentMethod"
                                            placeholder="Enter your repaymentMethod" name="repaymentMethod"
                                            id="repaymentMethod" data validation="repaymentMethod">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="loanPurpose" class="col-sm-2 col-form-label">loanPurpose</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control  loanPurpose"
                                            placeholder="Enter your loanPurpose" name="loanPurpose" id="loanPurpose"
                                            data validation="loanPurpose">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="expectedDate" class="col-sm-2 col-form-label"> expectedDate </label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control expectedDateValue" placeholder=""
                                            name="expectedDate" id="expectedDate" data validation="expectedDate">
                                    </div>
                                </div>



                                <center> <button type="button" class="btn btn-lg btn-primary" id="loan-submit-btn">
                                        Submit</button></center>

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
<div class="modal modal-success fade" id="modal-loanlistingsSuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Your personal Details has been succssfully enterd.</p>
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