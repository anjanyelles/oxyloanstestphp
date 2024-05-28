<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Reference Details
        </h1>
    </section><br />
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title text-bold"> Edit Reference Details </h3>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group row col-xs-12">
                            <div class="col-xs-5">
                                <label for="RefereeId" class="referenceID">RefereeId</label>
                                <input type="text" class="form-control approvedate" id="referenceID"
                                    placeholder="Enter the  RefereeId" name="PaidDate" data validation="expectedDate">
                                <span class="error erroruserrefereeid" style="display: none;">Please enter The
                                    RefereeId</span>
                            </div>
                            <div class="col-md-5">
                                <label for="ReferrerId" class="referenceID">ReferrerId</label>

                                <input type="text" class="form-control approvedate" id="referrerId"
                                    placeholder="Enter The ReferrerId " name="PaidDate" data validation="expectedDate">
                                <span class="error erroruserreferrerId" style="display: none;">Please enter The Referre
                                    Id</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="form-group row col-xs-12">
                            <div class="col-xs-5">
                                <label for="email" class="email">Email</label>
                                <input type="text" class="form-control userEmail" id="userEmail"
                                    placeholder="Enter The Email" name="PaidDate" data validation="userEmail">
                                <span class="error errorusermail" style="display: none;">Please enter The Email</span>
                            </div>
                            <div class="col-md-5">
                                <label for="mobileNumber" class="mobileNumber">MobileNumber</label>

                                <input type="text" class="form-control mobileNumber" id="userMobileNumber"
                                    placeholder="Enter The Mobile Number" name="PaidDate" data
                                    validation="expectedDate">
                                <span class="error erroruserMobile" style="display: none;">Please enter The Mobile
                                    Number</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="form-group row col-xs-12">
                            <div class="col-xs-5">
                                <label for="refereename" class="refereename">Name</label>
                                <input type="text" class="form-control refereename" id="refereeName"
                                    placeholder="Enter The Referee Name" name="refereename" data
                                    validation="refereeename">
                                <span class="error errorusername" style="display: none;">Please enter The Name</span>
                            </div>
                            <div class="col-md-5">
                                <label for="primaryType" class="primaryType">PrimaryType</label>

                                <select class="form-control primaryType " name="primaryType" id="primaryType" data
                                    validation="primaryType">
                                    <option value="">-- Choose Primary Type --</option>
                                    <option value="LENDER">Lender</option>
                                    <option value="BORROWER">Borrower</option>

                                </select>
                                <span class="error erroruserprimaryType" style="display: none;">Please Choose Primary
                                    Type</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="form-group row col-xs-12">
                            <div class="col-xs-5">
                                <label for="userstatus" class="userstatus">Status</label>
                                <select class="form-control userstatus " name="userstatus" id="userstatus" data
                                    validation="userstatus">
                                    <option value="">-- Choose Status --</option>
                                    <option value="Invited">Invited</option>
                                    <option value="Registered">Registered</option>
                                    <option value="Lent">Lent</option>

                                </select>
                                <span class="error erroruserstatus" style="display: none;">Please Choose Status</span>
                            </div>
                            <div class="col-xs-5">
                                <label for="refereeamount" class="referenceamount">Amount</label>
                                <input type="text" class="form-control referenceamount" id="referenceamount"
                                    placeholder="Enter The Amount" name="referenceamount" data
                                    validation="referenceamount">
                                <span class="error erroruserAmount" style="display: none;">Please Enter Amount</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="form-group row col-xs-12">
                            <div class="col-xs-5">
                                <label for="superadmincomments" class="superadmincomments">Super Admin Comments</label>
                                <select class="form-control superadmincomments" name="superadmincomments"
                                    id="superadmincomments" data validation="radhaSirComments">
                                    <option value="">-- Choose Status --</option>
                                    <option value="Hold">Hold</option>
                                    <option value="Approved">Approved</option>
                                </select>
                                <span class="error errorsuperadmincomments" style="display: none;">Please Choose Super
                                    Admin Comments</span>
                            </div>
                            <div class="col-md-5">
                                <label for="referredOn" class="referredOn">ReferredOn</label>

                                <input type="text" class="form-control refereeddate" id="approvedate"
                                    placeholder="YYYY-MM-DD" name="PaidDate" data validation="expectedDate">
                                <span class="error errorreferredOn" style="display: none;">Please select Referred
                                    Date</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="form-group row col-xs-12">
                            <div class="col-xs-5">
                                <label for="mailSubject" class="mailSubject">MailSubject</label>
                                <textarea class="form-control" cols="10" rows="5" placeholder="Email Subject"
                                    id="MailSubject"></textarea>
                                <span class="error errormailsubject" style="display: none;">Please Enter Email
                                    Subject</span>

                            </div>
                            <div class="col-md-5">
                                <label for="mailContent" class="mailContent">MailContent</label>
                                <textarea class="form-control" cols="10" rows="5" placeholder="Email content"
                                    id="mailcontent"></textarea>
                                <span class="error  errormailcontent" style="display: none;">Please Enter Email
                                    Content</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="clear"></div>

                        <div class="col-md-6">
                            <button type="button" class="btn btn-lg btn-primary col-md-4 pull-right"
                                onclick="edit_ReferenceDetails();">Submit</button>

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


<div class="modal modal-success fade" id="modal-editreferenceDetails">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Status</h4>
            </div>
            <div class="modal-body">
                Successfully Updated
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


<div class="modal modal-danger fade" id="modal-transactiondanger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                



            Error
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
    
            </div>
            <div class="modal-body">
                
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


<div class="modal modal-danger fade" id="modal-transactiondanger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                



            Error
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
    
            </div>
            <div class="modal-body">
                
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
<div class="modal modal-warning fade" id="modal-displayAlreadyReferred">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Status</h4>
            </div>
            <div class="modal-body">
                <p id="display_text"></p>

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
$(document).ready(function() {
    $('#approvedate').datepicker({
        todayHighlight: true,
        format: 'yyyy-mm-dd',


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