<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <section class="content-header hold-headsection">
        <h1 style="margin-left:20px" class="text-bold">
            <left>Add FD Data</left>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row col-md-12 hold-amount-box ">
                            <div class="row col-md-6 hold-amount-inputs">
                                <div class="col-md-12 row">
                                    <label for="" class="form-label col-md-4">Borrower Id :<em class="error">*</em>
                                    </label>

                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="" id="createFdUserId"
                                            placeholder="Enter The Borrower Id" aria-describedby="helpId">
                                        <p class="error fdborrowerIderror" style="display: none;">Enter The Borrower Id
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12 row">
                                    <label for="" class="form-label col-md-4">Amount :<em class="error">*</em> </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="" id="createFdUserAmount"
                                            placeholder="Enter The Fd Amount" aria-describedby="helpId">
                                        <p class="error fdborrowerUserAmount" style="display: none;">Enter The Fd Amount
                                        </p>

                                    </div>


                                </div>


                                <div class="col-md-12 row">
                                    <label for="" class="form-label col-md-4">Created on :<em
                                            class="error">*</em></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="" id="fdcreated_Date"
                                            placeholder="Enter The Create Date" aria-describedby="helpId"
                                            placeholder="">
                                        <span class="error fdcreated" style="display:none;">Enter The Created Date
                                        </span>
                                    </div>

                                </div>


                                <div class="col-md-12 row">
                                    <label for="" class="form-label col-md-4"> </label>
                                    <div class="col-md-8">
                                        <button class="btn btn-primary col-md-12" type="button" id="submit_fd_data"
                                            onclick="createFdRequest();"> Save Fd</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
</div>

<div class="modal modal-success fade" id="modal-uploadedfddataBorrower">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>
                <h2 style="font-size:16px;">Sucessfully Updated the Fd Details</h2>
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

<?php include 'admin_footer.php';?>