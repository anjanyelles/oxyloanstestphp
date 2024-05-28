<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="text-bold">
            Deal Creation Notification
        </h1>
        <div class="alert offlineSuccessInterest" role="alert"
            style="background-color:#D0f0C0; display: none; margin-top:50px">
            <strong>Thanks! </strong> Notifications Sent Successfully<br>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title text-bold"> Fill deal Details </h3>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group row col-xs-12">
                            <div class="col-xs-5">
                                <label for="lenderId" class="lenderID">Message Type</label>
                                <select class="form-control statusoffline" id="offlineFileStatus" data
                                    validation="status" onchange="dealCreateNotification();">
                                    <option value="DEALCREATION">DEALCREATION</option>
                                    <option value="NORMAL">NORMAL</option>
                                </select>

                            </div>

                        </div>

                        <div class="typeDEALCREATION">
                            <div class="form-group row col-xs-12">
                                <div class="col-xs-5">
                                    <label for="lenderId" class="lenderID">Minimum Participation</label>
                                    <input type="text" class="form-control minimumparticiationAmount"
                                        id="minimumparticiationAmount"
                                        placeholder="Enter the  minimum Participation Amount"
                                        name="minimumparticiationAmount" data validation="minimumparticiationAmount">
                                    <span class="error errorminimumparticiationAmount" style="display: none;">Please
                                        enter The minimum Participation Amount</span>
                                </div>
                                <div class="col-md-5">
                                    <label for="lendergroup" class="groupID">Maximum Participation</label>
                                    <input type="text" class="form-control minimumparticiationAmount"
                                        id="maximummumparticiationAmount"
                                        placeholder="Enter the  maximum Participation Amount"
                                        name="maximummumparticiationAmount" data
                                        validation="maximummumparticiationAmount">

                                    <span class="error errormaximumparticiationAmount" style="display: none;">Please
                                        Enter The maximum Amount</span>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="form-group row col-xs-12">
                                <div class="col-xs-5">
                                    <label for="email" class="email">ROI</label>
                                    <input type="text" class="form-control rateofinterest" id="dealrateofinterest"
                                        placeholder="Enter The ROI" name="rateofinterest" data
                                        validation="offlineamount">
                                    <span class="error errorrateofinterest" style="display: none;">Please enter The
                                        ROI</span>
                                </div>
                                <div class="col-md-5">
                                    <label for="amount" class="mobileNumber">Tenure</label>
                                    <input type="text" class="form-control tenureDeal" id="dealtenure"
                                        placeholder="Enter The tenure " name="tenure" data validation="date">
                                    <span class="error errortenure" style="display: none;">Please Enter tenure </span>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="form-group row col-xs-12">
                                <div class="col-xs-5">
                                    <label for="lenderReturnType" class="lrReturnType">Participation Extending
                                        Amount</label>
                                    <input type="text" class="form-control participationExtendingAmount"
                                        id="participationExtendingAmount" placeholder="Enter The  Extending Amount"
                                        name="participationExtendingAmount" data validation="orginalDate" value="0.0">
                                    <span class="error errorparticipationExtendingAmount" style="display: none;">Please
                                        enter The Extending Amount</span>
                                </div>
                                <div class="col-xs-5">
                                    <label for="dealDiscription" class="dealDiscription">Deal Description </label>
                                    <textarea class="dealDiscriptionData" rows="6"
                                        style="width: 380px;height: 120px; outline:none; resize: none;"></textarea>
                                    <span class="error errordealDiscription" style="display: none;">Please enter The
                                        Deal Description </span>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="form-group row col-xs-12">
                                <div class="col-xs-5">
                                    <button type="button" class="btn btn-md btn-primary pull-left"
                                        onclick="dealNotification();"
                                        style="position: absolute; top: -90px; padding-right: 20px; text-align:center;">Submit</button>
                                </div>

                            </div>
                        </div>

                        <div class="typeMessageDealNotification" style="display:none">
                            <div class="form-group row col-xs-12">

                                <div class="col-xs-6">
                                    <label for="dealDiscription" class="dealDiscription">First Input </label>
                                    <textarea class="dealDiscriptionnormal" rows="4"
                                        style="width: 454px; height: 143px; resize: none!important;"></textarea>
                                    <span class="error errordealDiscriptionText" style="display: none;">Please enter The
                                        Deal Description </span>
                                </div>

                                <div class="col-xs-6">
                                    <label for="dealDiscription" class="dealDiscription">Second Input</label>
                                    <textarea class="dealDiscriptionnormalText" rows="6"
                                        style="width: 454px; height: 143px; resize:none!important;"></textarea>
                                    <span class="error errordealDiscriptionNormal" style="display: none;">Please enter
                                        The Deal Description </span>

                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="form-group row col-xs-12">
                                <div class="col-xs-5">
                                    <button type="button" class="btn btn-md btn-primary pull-left"
                                        onclick="dealNotificationNormal();">Submit</button>
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


<div class="modal modal-primary fade" id="modal-h2happroveOfflinePayments">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confimation</h4>
            </div>
            <div class="modal-body">
                <p id="text">
                    Are you sure you want to read this record data ?
                </p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" id="approvalOfflineH2h"
                        onclick="">Approve</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Reject</button>
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


<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>