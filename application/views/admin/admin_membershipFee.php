<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="text-bold">
           Update Membership Plan
        </h1>
        <div class="alert offlineSuccessInterest" role="alert"
            style="background-color:#D0f0C0; display: none; margin-top:50px">
            <strong>Thanks! </strong> A record of data successfully saved in our database <br>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-12">
                            <h3 class="box-title text-bold"> <b>Note : </b><code> It allows the admin to modify or edit Lender Membership Plans, and the changes will be  reflected in Lender Membership Fee page </code> </h3>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group row col-xs-12">
                            <div class="col-xs-5">
                                <label for="lenderId" class="lenderID">Fee Amount</label>
                                <input type="number" class="form-control offlinedealId" id="membershipamount"
                                    placeholder="Enter the  Amount" name="offlinedealId" data
                                    validation="offlinedealId">
                                <span class="error errormembershipAmount" style="display: none;">Please enter The Amount</span>
                            </div>
                            <div class="col-md-5">
                                <label for="lendergroup" class="groupID">Tenure</label>
                                <select class="form-control membershipTenure" id="membershipFeeTenure" data
                                    validation="status">
                                    <option value="">Choose Tenure</option>
                                    <option value="MONTHLY">MONTHLY</option>
                                    <option value="QUARTERLY">QUARTERLY</option>
                                    <option value="HALFYEARLY">HALFYEARLY</option>
                                    <option value="PERYEAR">PERYEAR</option>
                                 
                                     <option value="FIVEYEARS">FIVEYEARS</option>
                                    <option value="TENYEARS">TENYEARS</option>
                                    <option value="LIFETIME">LIFETIME</option>
                                </select>
                                <span class="error errormembershipTenure" style="display: none;">Please choose The tenure</span>
                            </div>
                        </div>

                        <div>
                             <div class="row col-12">
                                <button type="button" class="btn btn-md btn-primary mx-3" style="margin-left:15px" 
                                    onclick="updatenewMembershipFee();"
                                   >Submit</button>
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


<div class="modal modal-success fade" id="modal-membershipUpdate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Congratulation</h4>
            </div>
            <div class="modal-body">
                <p id="text">
                   Fee Successfully Updated
                </p>

            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal modal-warning fade" id="modal-offlineInterestAndPrincipal">
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

<?php include 'admin_footer.php';?>