<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="text-bold">
            Lender participation
        </h1>
        <div class="alert lenderParticipationinDeal" role="alert" style="background-color:#D0f0C0; display: none;">
            <strong>Thank!</strong> Successfully update the lender deatils,<br>
        </div>
    </section><br />
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title text-bold"> Fill Lender Details </h3>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group row col-xs-12">
                            <div class="col-xs-5">
                                <label for="lenderId" class="lenderID">User Id</label>
                                <input type="text" class="form-control participatedlender" id="participatedlenderid"
                                    placeholder="Enter the  Lender ID" name="participatedid" data
                                    validation="expectedDate">
                                <span class="error erroruserid" style="display: none;">Please enter The Lender ID</span>
                            </div>
                            <div class="col-md-5">
                                <label for="lendergroup" class="groupID">Group Id</label>
                                <input type="text" class="form-control lenderbelogs" id="lendergroupid"
                                    placeholder="Enter The lender Group ID " name="participatedGroup" data
                                    validation="expectedDate">
                                <span class="error lenderparticipategroup" style="display: none;">Please enter The Group
                                    Id</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="form-group row col-xs-12">
                            <div class="col-xs-5">
                                <label for="email" class="email">Deal Id</label>
                                <input type="text" class="form-control dealid" id="participateddealid"
                                    placeholder="Enter The Deal Id" name="dealID" data validation="adminDealId">
                                <span class="error errordealid" style="display: none;">Please enter The Email</span>
                            </div>
                            <div class="col-md-5">
                                <label for="amount" class="mobileNumber">Participated Amount</label>
                                <input type="text" class="form-control participatedAmount" id="amountParticipated"
                                    placeholder="Enter The Participated Amount" name="Amount" data validation="pAmount">
                                <span class="error errorParticipatedAmount" style="display: none;">Please enter The
                                    Amount</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="form-group row col-xs-12">
                            <div class="col-xs-5">
                                <label for="lenderReturnType" class="lrReturnType">Lender Return Type</label>
                                <input type="text" class="form-control lenderReturnType" id="returnType"
                                    placeholder="Enter The Return Type" name="refereename" data
                                    validation="refereeename">
                                <span class="error errortype" style="display: none;">Please enter The Return Type</span>
                            </div>
                            <div class="col-md-5">
                                <label for="primaryType" class="rateofinteresttolender">ROI</label>
                                <input type="text" class="form-control roioflender" id="lenderroi"
                                    placeholder="Enter The ROI" data validation="roi">
                                <!-- <select class="form-control roioflender" id="lenderroi" data validation="primaryType" >
                  <option value="">-- Choose rate of interest --</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                  <option value="32">32</option>
                  <option value="33">33</option>
                  <option value="34">34</option>
                  <option value="35">35</option>
                  <option value="36">36</option>
                  
                </select> -->
                                <span class="error erroruseRoi" style="display: none;">Please Choose ROI</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="form-group row col-xs-12">
                            <div class="col-xs-5">
                                <label for="processingFee" class="feeamount">Processing Fee</label>
                                <input type="text" class="form-control fee" id="feeforprocessing"
                                    placeholder="Enter The Processing Fee" name="feeamount" data
                                    validation="amountforprocessing">
                                <span class="error erroruserprocessing" style="display: none;">Please Enter
                                    Amount</span>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                        <div class="clear"></div>
                        <div class="clear"></div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-lg btn-primary col-md-4 pull-right"
                                onclick="lenderparticipationdeal();">Submit</button>
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
<div class="modal modal-warning fade" id="modal-displaylenderfeenotpaid">
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
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>