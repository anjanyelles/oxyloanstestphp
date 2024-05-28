<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Email Activation Link
            <small></small>
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
                                    <form id="useremailandmobile" autocomplete="off" method="post">
                                        <div class="step1">
                                            <div class="panel-body" id="userKYCUpload" enctype="multipart/form-data">

                                                <div class="form-group row upload_Block">
                                                    <label class="col-sm-3 col-form-label">Mobile Number<em
                                                            class="error">*</em>:</label>
                                                    <div class="col-sm-7 uploadInput">
                                                        <input type="text" placeholder="Enter The Mobile Number"
                                                            class="updateMobileNo"></br>
                                                        <span class="error errormobileNumber" style="display: none;">Please
                                                            enter User Mobile Number</span>
                                                        <div class="clear"></div>
                                                    </div>

                                                    <div class="clear"></div>
                                                </div>
                                              
                                                <div class="form-group row upload_Block">
                                                    <label class="col-sm-3 col-form-label">Email<em
                                                            class="error">*</em>:</label>
                                                    <div class="col-sm-7 uploadInput">
                                                        <input type="text" placeholder="Enter  Email"
                                                            id="userEmailActivation"></br>
                                                        <span class="error errorEmail" style="display: none;">Please
                                                            enter Email</span>

                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>

                                            <div class="loadWallet">
                                                <button type="button" class="btn btn-primary"
                                                    id="useremailandmobileActivation">
                                                    Submit</button>
                                            </div>

                                            <div class="clear">


                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>`
    </section>
</div>
</div>
<!-- maincontent ends -->
<!-- container ends -->
<!-- wrapper ends -->
<!-- SET: SCRIPTS -->

<div class="modal modal-danger fade" id="modal-transactiondanger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"> Error
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
    
            </div>
            <div class="modal-body">
             
            </div>
            <div class="modal-footer">
          
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-success fade" id="modal-UpdateSuccess-activation-Link">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p> successfully Sent The activation Linl</br>
                </p>
            </div>
            <div class="modal-footer">
                <a href="#">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">OK</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php include 'admin_footer.php';?>