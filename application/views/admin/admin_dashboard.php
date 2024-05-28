<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<?php
  $urlfromBroweser = $_SERVER['REQUEST_URI'];
  $writecommentsForborrower =  isset($_GET['writeComments']) ? $_GET['writeComments'] : '0';
  $approvalforlenderreferenceAmount =  isset($_GET['ApprovalForLenderReferralBonus'])? $_GET['ApprovalForLenderReferralBonus'] : '0';
    // echo "<script>alert('$approvalforlenderreferenceAmount');</script>";
 ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text ">Registered Users</span>
                        <span class="info-box-number registeredusers">10000</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="lendersapplications?getfornotifications=0">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ion-android-contacts"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Lenders</span>
                            <span class="info-box-number  totalLenders">2000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="borrowersapplications?getfornotifications=0">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="ion-android-contacts"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Borrowers</span>
                            <span class="info-box-number  totalBorrowers">8000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Today's Registerd users</span>
                        <span class="info-box-number todaysUsers">

                            <!-- <span class="lenderRegistered" style="color: #3c8dbc !important; margin-right: 20PX;"> </span> <span class="borrowerRegistred" style="color: #3c8dbc !important;"></span> -->

                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-8">

                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                              <div class="row searchcmsapplication" >
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="dashboardGraph">Start/End Date</option>
                </select>
                <span class="errorsearch" style="display: none;">Please choose option.</span>
            </div>

            <div class="col-xs-3 text-center dasboardgraphStart" style="display: none;">
               <input type="text" name="fdinvoicestartdate" class="form-control dashboardStart"
                    placeholder="start Date">
            </div>

            <div class="col-xs-3 text-center dasboardgraphEnd" style="display: none;">
              <input type="text" name="invoiceenddate" class="form-control dashboardEnd" placeholder="End date">
            </div>
      
            <div class="col-xs-1 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="dashboardgraphViewFunction()"><i
                        class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>


        </div>
                    </div>
   
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
    
                           
                        
                        <canvas id="myChart"></canvas>
                         <!--    <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>Loan ID</th>
                                        <th>AppID</th>
                                        <th>Amount</th>
                                        <th>Agreement Status</th>
                                    </tr>
                                </thead>
                                <tbody id="displaylists" class="displaylists">




                                </tbody>
                            </table> -->
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix" style="display: none">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All
                            Orders</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>

            <!-- ************************-->
            <div class="col-md-4">
                <!-- EMI Section for EMIs-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Current Month EMIs Information</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="progress-group">
                                            <span class="progress-text">No of EMI processed</span>
                                            <span class="progress-number"><b id="emiprocessed">160</b>/<span
                                                    id=totalemis>200</span></span>
                                            <div>
                                                <progress id="progressbar" value="" max=""
                                                    style="width: 100%;height: 8px;"></progress>
                                            </div>

                                        </div>

                                        <div class="progress-group">
                                            <span class="progress-text">No of EMI Not processed</span>
                                            <span class="progress-number"><b id="emiNotprocessed">160</b>/<span
                                                    class=totalemis>200</span></span>
                                            <div>
                                                <progress id="progressbar1" value="" max=""
                                                    style="width: 100%;height: 8px;"></progress>
                                            </div>
                                        </div>
                                        <!-- /.progress-group -->
                                        <div class="progress-group">
                                            <span class="progress-text">Amount Received</span>
                                            <span class="progress-number"><b id="amountReceived">310</b>/<span
                                                    id=totalemisAmount>200</span></span>

                                            <div>
                                                <progress id="progressbar2" value="" max=""
                                                    style="width: 100%;height: 8px;"></progress>
                                            </div>
                                        </div>
                                        <div class="progress-group">
                                            <span class="progress-text">Amount Not Received</span>
                                            <span class="progress-number"><b id="amountNotReceived">310</b>/<span
                                                    class=totalemisAmount>200</span></span>

                                            <div>
                                                <progress id="progressbar3" value="" max=""
                                                    style="width: 100%;height: 8px;"></progress>
                                            </div>
                                        </div>
                                        <!-- /.progress-group -->
                                        <div class="progress-group">
                                            <span class="progress-text">Earned Amount</span>
                                            <span class="progress-number"><b id="earnedAmount">480</b>/<span
                                                    id=totalemisEarnedAmount>200</span></span>
                                            <div>
                                                <progress id="progressbar4" value="" max=""
                                                    style="width: 100%;height: 8px;"></progress>
                                            </div>
                                        </div>
                                        <!-- /.progress-group -->
                                        <div class="progress-group">
                                            <span class="progress-text">No OF EMIS pending</span>
                                            <span class="progress-number"><b id="pendingEMIS">250</b>/<span
                                                    id=totalpendingemis>200</span></span>

                                            <div>
                                                <progress id="progressbar5" value="" max=""
                                                    style="width: 100%;  height: 8px;"></progress>
                                            </div>
                                        </div>
                                        <!-- /.progress-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- ./box-body -->
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-3 col-xs-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-yellow"><i
                                                    class="fa fa-caret-left"></i> <b id="countof30daysUsers">15</b>
                                                Users</span>
                                            <h5 class="description-header" id="amountof30Days">₹5000</h5>
                                            <span class="description-text">30 days Bucket</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 col-xs-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-yellow"><i
                                                    class="fa fa-caret-left"></i> <b id="countof60daysUsers">15</b>
                                                Users</span>
                                            <h5 class="description-header" id="amountof60Days">₹5000</h5>
                                            <span class="description-text">60 days Bucket</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 col-xs-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-yellow"><i
                                                    class="fa fa-caret-left"></i> <b id="countof90daysUsers">15</b>
                                                Users</span>
                                            <h5 class="description-header" id="amountof90Days">₹5000</h5>
                                            <span class="description-text">90 days Bucket</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 col-xs-6">
                                        <div class="description-block">
                                            <span class="description-percentage text-yellow"><i
                                                    class="fa fa-caret-left"></i> <b id="countof91daysUsers">15</b>
                                                Users</span>
                                            <h5 class="description-header" id="amountof91Days">₹1200</h5>
                                            <span class="description-text">NPA Bucket</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- New Admin Section for EMIs ENDS-->
                <!-- Info Boxes Style 2 -->
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="ion ion-android-contacts"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Borrowers</span>
                        <span class="info-box-number totalborrowersRequestedAmount">INR 150000000</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 50%"></div>
                        </div>
                        <span class="progress-description">
                            Total Borrower requests
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="ion ion-android-contacts"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Lenders</span>
                        <span class="info-box-number totallendersCommitedAmount">9000000</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                        </div>
                        <span class="progress-description">
                            Total Lender offers
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>

                <!-- /.info-box -->
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="ion ion-android-contacts"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Admin Offer Amount</span>
                        <span class="info-box-number totalOfferAmount">200</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 40%"></div>
                        </div>
                        <span class="progress-description">
                            Amount stage
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->

                <!-- /.info-box -->
                <div class="info-box bg-teal">
                    <span class="info-box-icon"><i class="ion ion-android-contacts"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Disbursed Amount</span>
                        <span class="info-box-number totalDisbursedAmount">200</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 40%"></div>
                        </div>
                        <span class="progress-description">
                            Amount stage
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->



                <!-- /.info-box -->
                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Agreements</span>
                        <span class="info-box-number toatalAgreements">1200</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                            Total Agreements
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-maroon">
                    <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Conversation Stage</span>
                        <span class="info-box-number totalConversationStage">200</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 40%"></div>
                        </div>
                        <span class="progress-description">
                            Agreeement stage
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->







                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
</div>




</section>
<!-- /.content -->


</div>

<div class="modal  modal-info fade" id="modal-feeStatus">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p>Updated the Amount.</p>
            </div>
            <div class="modal-footer">
                <div align="right">

                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>

    </div>

</div>

<div class="modal modal-info  fade" id="modal-feePaid">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Enter Fee Amount</h4>
            </div>
            <div class="modal-body">
                <input type="text" name="" class="form-control loandId" style="display: none;">
                <input type="text" name="" class="form-control userType" style="display: none;">
                <input type="text" name="" class="form-control enteredFeeValue"><br />

            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn-submitFeeinfo btn btn-outline">Submit</button>
                    <button type="button" class="btn btn-default btn-outline" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-info fade" data-easein="slideLeftBigIn" id="loadBoxforWriteComments">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Enter SUPER ADMIN Comments</h4>
            </div>
            <div class="modal-body">
                <textarea class="form-control superAdminComments" cols="10" rows="4"
                    placeholder="Please enter admin comments"></textarea>

                <div class="starRating">
                    <div class="star-rating">
                        <span class="fa fa-star-o" data-rating="1"></span>
                        <span class="fa fa-star-o" data-rating="2"></span>
                        <span class="fa fa-star-o" data-rating="3"></span>
                        <span class="fa fa-star-o" data-rating="4"></span>
                        <span class="fa fa-star-o" data-rating="5"></span>
                        <input type="hidden" name="whatever1" class="rating-value" value="">
                    </div>
                </div>

                </br>


                <div class="form-group row">
                    <label for="repaymentMethod" class="col-sm-3 col-form-label">Duration Type</label>
                    <div class="col-sm-9">

                        <label>
                            <input type="radio" id="months" name="durationtype" value="Months">
                            Months
                        </label>

                        <label>
                            <input type="radio" id="days" name="durationtype" value="Days" />
                            Days

                        </label>
                        <span class="error brepaymentMethodError" style="display: none;">Please choose Duration
                            Type</span>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="rateOfInterest " class="col-sm-3 col-form-label">Rate of Interest to the borrower per
                        month</label>
                    <div class="col-sm-9">
                        <!--  <input  type="text" class="form-control rateOfInterest" name="rateOfInterest" placeholder="Enter your rateOfInterest" id="rateOfInterest" data validation="rateOfInterest">-->
                        <select class="form-control rateOfInterest" name="rateOfInterest" id="rateOfInterestb" data
                            validation="rateOfInterest">
                            <option value="">-- Choose Rate Of Interest --</option>
                            <option value="1">1</option>
                            <option value="1.25">1.25</option>
                            <option value="1.50">1.50</option>
                            <option value="1.75">1.75</option>
                            <option value="2">2</option>
                            <option value="2.25">2.25</option>
                            <option value="2.50">2.50</option>
                            <option value="2.75">2.75</option>
                            <option value="3">3</option>
                            <option value="3.25">3.25</option>
                            <option value="3.50">3.50</option>
                            <option value="3.75">3.75</option>
                            <option value="4">4</option>

                        </select>

                        <span class="error brateOfInterestError" style="display: none;">Please choose Rate of Interest
                            for borrower</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="rateOfInterest " class="col-sm-3 col-form-label">Rate of Interest to the borrower per
                        day </label>
                    <div class="col-sm-9">
                        <!--  <input  type="text" class="form-control rateOfInterest" name="rateOfInterest" placeholder="Enter your rateOfInterest" id="rateOfInterest" data validation="rateOfInterest">-->
                        <select class="form-control rateOfInterest" name="rateOfInterest" id="rateOfInterestd" data
                            validation="rateOfInterest">
                            <option value="">-- Choose Rate Of Interest Per Day --</option>
                            <option value="100">100</option>
                            <option value="110">110</option>
                            <option value="120">120</option>
                            <option value="130">130</option>
                            <option value="140">140</option>
                            <option value="150">150</option>
                            <option value="160">160</option>
                            <option value="170">170</option>
                            <option value="180">180</option>
                            <option value="190">190</option>
                            <option value="200">200</option>
                            <option value="210">210</option>
                            <option value="220">220</option>
                            <option value="230">230</option>
                            <option value="240">240</option>
                            <option value="250">250</option>
                            <option value="260">260</option>
                            <option value="270">270</option>
                            <option value="280">280</option>
                            <option value="290">290</option>
                            <option value="300">300</option>
                            <option value="310">310</option>
                            <option value="320">320</option>
                            <option value="330">330</option>
                            <option value="340">340</option>
                            <option value="350">350</option>
                            <option value="360">360</option>
                            <option value="380">380</option>
                            <option value="390">390</option>
                            <option value="400">400</option>
                            <option value="410">410</option>
                            <option value="420">420</option>
                            <option value="430">430</option>
                            <option value="440">440</option>
                            <option value="450">450</option>

                            <option value="460">460</option>
                            <option value="470">470</option>
                            <option value="480">480</option>
                            <option value="490">490</option>
                            <option value="500">500</option>

                            <option value="510">510</option>
                            <option value="520">520</option>
                            <option value="530">530</option>
                            <option value="540">540</option>
                            <option value="550">550</option>
                            <option value="560">560</option>
                            <option value="570">570</option>
                            <option value="600">600</option>
                        </select>

                        <span class="error brateOfInterestError" style="display: none;">Please choose Rate of Interest
                            for borrower</span>
                    </div>
                </div>




                <div class="form-group row">
                    <label for="rateOfInterest " class="col-sm-3 col-form-label">Rate of Interest to the lender per
                        month</label>
                    <div class="col-sm-9">

                        <select class="form-control rateOfInterest" name="rateOfInterest" id="rateOfInterestl" data
                            validation="rateOfInterest">
                            <option value="">-- Choose Rate Of Interest --</option>
                            <option value="1">1</option>
                            <option value="1.25">1.25</option>
                            <option value="1.50">1.50</option>
                            <option value="1.75">1.75</option>
                            <option value="2">2</option>
                            <option value="2.25">2.25</option>
                            <option value="2.50">2.50</option>
                            <option value="2.75">2.75</option>
                            <option value="3">3</option>
                            <option value="3.25">3.25</option>
                            <option value="3.50">3.50</option>
                            <option value="3.75">3.75</option>
                            <option value="4">4</option>

                        </select>

                        <span class="error lrateOfInterestError" style="display: none;">Please choose Rate of Interest
                            for Lender</span>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="duration" class="col-sm-3 col-form-label">Loan Duration </label>
                    <div class="col-sm-9">
                        <!--<input type="text" class="form-control durationValue" placeholder="Enter your duration time" name="duration" id="duration" data validation="duration"> -->

                        <select class="form-control durationValue" name="duration" id="duration" data
                            validation="duration">
                            <option value="">-- Choose Loan Duration --</option>
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

                        </select>

                        <span class="error durationError" style="display: none;">Please choose duration</span>
                    </div>
                </div>



                <div class="form-group row">
                    <label for="repaymentMethod" class="col-sm-3 col-form-label">Re-Payment Method to borrower</label>
                    <div class="col-sm-9">

                        <label>
                            <input type="radio" id="principleMethod" name="repaymentMethodb" value="PI" checked />
                            Pay (P + I) monthly by Flat EMI method)<span class="displayEMIvalue"
                                style="display: none;">Your EMI is <span class="emiValueIs"
                                    id="emiValueIs">0</span></span>
                        </label>
                        <br />
                        <label>
                            <input type="radio" id="interestMethod" name="repaymentMethodb" value="I" />
                            Pay Interest (I) monthly and Principal (P) at the end of the term.
                            <span class="displayEMIvalue" style="display: none;">Your Interest is <span
                                    class="payonlyint">0</span></span>
                        </label>


                        <span class="error brepaymentMethodError" style="display: none;">Please choose repayment method
                            for borrower</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="repaymentMethod" class="col-sm-3 col-form-label">Re-Payment Method to Lender</label>
                    <div class="col-sm-9">

                        <label>
                            <input type="radio" id="principleMethod" name="repaymentMethodl" value="PI" />
                            Pay (P + I) monthly by Flat EMI method)<span class="displayEMIvalue"
                                style="display: none;">Your EMI is <span class="emiValueIs"
                                    id="emiValueIs">0</span></span>
                        </label>
                        <br />
                        <label>
                            <input type="radio" id="interestMethod" name="repaymentMethodl" value="I" checked />
                            Pay Interest (I) monthly and Principal (P) at the end of the term.
                            <span class="displayEMIvalue" style="display: none;">Your Interest is <span
                                    class="payonlyint">0</span></span>
                        </label>


                        <span class="error lrepaymentMethodError" style="display: none;">Please choose repayment method
                            for lender</span>
                    </div>
                </div>


            </div>

        </div>






        <div class="modal-footer">
            <div align="right">
                <button type="button" class="pidforComment saveAdminComments btn btn-outline"
                    onclick="saveAdminComments()" data-id="">Save Comments</button>
                <button type="button" class="btn btn-default btn-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<div class="modal  fade" id="loadBoxforapprovereferencebouns">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-6">
                        <h4 class="modal-title text-bold">Approve The Reference Amount</h4>
                    </div>
                    <div class="col-xs-6">
                        <div class="acceptedPagination pull-right">
                            <ul class="pagination bootpag">
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>

                            <th>Referee ID</th>
                            <th>Referrer ID</th>
                            <th>Referee Name</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody id="displayPaymentsinfo">
                        <tr>
                            <td>LR160</td>
                            <td>LR5</td>
                            <td>ANUSHA</td>
                            <td>Lent</td>
                            <td>3000</td>
                            <td>unpaid</td>

                        </tr>

                        </tfoot>
                </table>

            </div>
            <div class="modal-footer">
                <div class="row col-xs-12">
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-lg btn-secondary col-xs-5 pull-right"
                            onclick="holdreferenceamount('Hold');">Hold</button>
                    </div>
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-lg btn-success pull-left col-xs-5"
                            onclick="approvereferrebonusamount('Approved');">Approve</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>







<div class="modal modal-info fade" data-easein="slideLeftBigIn" id="loadBoxforWriteCommentsadmin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Enter SUPER ADMIN Comments</h4>
            </div>
            <div class="modal-body">

                <div class="form-group row">
                    <label for="name " class="col-sm-3 col-form-label">Loan Request Id</label>
                    <div class="col-sm-9">
                        <input type="text" name="loanRequestAmount" class="form-control loanRequestAmount"
                            placeholder="Enter The Borrower Loan Request Id " id="loanrequestid" required="required" />
                        <span class="error unique" style="display: none;">Please Enter The Borrower Loan Request Id
                        </span>
                    </div>

                </div>


                <textarea class="form-control" class="superAdminComments" id="comments" cols="10" rows="4"
                    placeholder="Please enter admin comments"></textarea>

                <div class="starRating">
                    <div class="star-rating">
                        <span class="fa fa-star-o" data-rating="1"></span>
                        <span class="fa fa-star-o" data-rating="2"></span>
                        <span class="fa fa-star-o" data-rating="3"></span>
                        <span class="fa fa-star-o" data-rating="4"></span>
                        <span class="fa fa-star-o" data-rating="5"></span>
                        <input type="hidden" name="whatever1" class="rating-value" value="">
                    </div>
                </div>

                </br>

                <div class="form-group row">
                    <label for="rateOfInterest " class="col-sm-3 col-form-label">Rate of Interest to the
                        borrower</label>
                    <div class="col-sm-9">
                        <!--  <input  type="text" class="form-control rateOfInterest" name="rateOfInterest" placeholder="Enter your rateOfInterest" id="rateOfInterest" data validation="rateOfInterest">-->
                        <select class="form-control rateOfInterest" name="rateOfInterest" id="roib" data
                            validation="rateOfInterest">
                            <option value="">-- Choose Rate Of Interest --</option>
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
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>

                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                        </select>

                        <span class="error brateOfInterestError" style="display: none;">Please choose Rate of Interest
                            for borrower</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="rateOfInterest " class="col-sm-3 col-form-label">Rate of Interest to the lender</label>
                    <div class="col-sm-9">
                        <!--  <input  type="text" class="form-control rateOfInterest" name="rateOfInterest" placeholder="Enter your rateOfInterest" id="rateOfInterest" data validation="rateOfInterest">-->
                        <select class="form-control rateOfInterest" name="rateOfInterest" id="roil" data
                            validation="rateOfInterest">
                            <option value="">-- Choose Rate Of Interest --</option>
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
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>

                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                        </select>

                        <span class="error lrateOfInterestError" style="display: none;">Please choose Rate of Interest
                            for Lender</span>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="duration" class="col-sm-3 col-form-label">Loan Duration</label>
                    <div class="col-sm-9">
                        <!--<input type="text" class="form-control durationValue" placeholder="Enter your duration time" name="duration" id="duration" data validation="duration"> -->

                        <select class="form-control durationValue" name="duration" id="months" data
                            validation="duration">
                            <option value="">-- Choose Loan Duration --</option>
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

                        </select>

                        <span class="error durationError" style="display: none;">Please choose duration</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="repaymentMethod" class="col-sm-3 col-form-label">Duration Type</label>
                    <div class="col-sm-9">

                        <label>
                            <input type="radio" id="months" name="durationtypes" value="Months" checked />
                            Months
                        </label>

                        <label>
                            <input type="radio" id="days" name="durationtypes" value="Days" />
                            Days

                        </label>
                        <span class="error brepaymentMethodError" style="display: none;">Please choose Duration
                            Type</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="repaymentMethod" class="col-sm-3 col-form-label">Re-Payment Method to borrower</label>
                    <div class="col-sm-9">

                        <label>
                            <input type="radio" id="principleMethod" name="repaymentMethodb" value="PI" checked />
                            Pay (P + I) monthly by Flat EMI method)<span class="displayEMIvalue"
                                style="display: none;">Your EMI is <span class="emiValueIs"
                                    id="emiValueIs">0</span></span>
                        </label>
                        <br />
                        <label>
                            <input type="radio" id="interestMethod" name="repaymentMethodb" value="I" />
                            Pay Interest (I) monthly and Principal (P) at the end of the term.
                            <span class="displayEMIvalue" style="display: none;">Your Interest is <span
                                    class="payonlyint">0</span></span>
                        </label>


                        <span class="error brepaymentMethodError" style="display: none;">Please choose repayment method
                            for borrower</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="repaymentMethod" class="col-sm-3 col-form-label">Re-Payment Method to Lender</label>
                    <div class="col-sm-9">

                        <label>
                            <input type="radio" id="principleMethod" name="repaymentMethodl" value="PI" />
                            Pay (P + I) monthly by Flat EMI method)<span class="displayEMIvalue"
                                style="display: none;">Your EMI is <span class="emiValueIs"
                                    id="emiValueIs">0</span></span>
                        </label>
                        <br />
                        <label>
                            <input type="radio" id="interestMethod" name="repaymentMethodl" value="I" checked />
                            Pay Interest (I) monthly and Principal (P) at the end of the term.
                            <span class="displayEMIvalue" style="display: none;">Your Interest is <span
                                    class="payonlyint">0</span></span>
                        </label>


                        <span class="error lrepaymentMethodError" style="display: none;">Please choose repayment method
                            for lender</span>
                    </div>
                </div>


            </div>

        </div>


        <div class="modal-footer">
            <div align="right">
                <button type="button" class="pidforComment saveAdminComments btn btn-outline"
                    onclick=" saveAdminCommentsbyadmin()" data-id="">Save Comments</button>
                <button type="button" class="btn btn-default btn-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>







<div class="modal modal fade" id="modal-uploadIDFCPayments">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </br>
                <div class="row">
                    <center>
                        <H4>
                            Upload IDFC Payment File </H4>
                    </center>
                    </BR>

                    <label for="name " class="col-sm-2 col-form-label dates"> Date :</label>
                    <div class="col-sm-3 dates">
                        <input type="text" placeholder="dd-mm-yyyy" id="idfcstartdate" name="dob" class="text-fld1">
                    </div>


                    <div class="col-sm-4">
                        <div class="panel-body" id="userKYCUpload" enctype="multipart/form-data">
                            <div class="form-lft kycproofs">
                                <label>IDFC :<b style="color:red"></b></label>
                                <div class="fld-block upload_pdf">
                                    <input class="custom-file-input CibilFileUpload" data-clickedid="" type='file'
                                        onchange="readidfc(this);" id="idfc"
                                        accept="application/pdf,application/xlsx,application/vnd.ms-excel" />
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>




<div class="modal modal fade" id="modal-downloadidfc">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </br>
                <div class="row">
                    <center>
                        <H4>
                            dowload IDFC Payments File </H4>
                    </center>
                    </BR>

                    <label for="name " class="col-sm-2 col-form-label"> Date</label>
                    <div class="col-sm-4">
                        <input type="text" placeholder="dd-mm-yyyy" id="idfcstartdates" name="dob" class="text-fld1">
                    </div>

                    <div class="col-sm-6">
                        <button type="button" class="btn btn-xm btn-primary" id="profit-submit-btn"
                            onclick="idfcdownload();">Submit</button>

                    </div>

                </div>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal modal fade" id="modal-viewlenderprofit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </br>
                <div class="row">
                    <center>
                        <H4>LenderScrowWalletDetails Based On StartDate
                            And EndDate</H4>
                    </center></br>
                    </br>
                    <label for="name " class="col-sm-2 col-form-label">Start Date</label>
                    <div class="col-sm-3">
                        <input type="text" placeholder="yyyy-mm-dd" id="startdate" name="dob" class="text-fld1">
                        <div class="clear"></div>
                    </div>

                    <label for="name " class="col-sm-2 col-form-label">End Date</label>
                    <div class="col-sm-3">
                        <input type="text" placeholder="yyyy-mm-dd" id="enddate" name="dob" class="text-fld1">
                        <div class="clear"></div>
                    </div>


                    <div class="col-sm-2">
                        <button type="button" class="btn btn-xm btn-primary" id="profit-submit-btn"
                            onclick="lenderwallet();">Submit</button>

                    </div>
                </div>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal modal fade" id="modal-lenderloaninformation">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </br>
                <div class="row">
                    <center>
                        <H4>Lenders Loan Information Based On Month
                            And Year </H4>
                    </center></br>
                    </br>
                    <label for="name " class="col-sm-2 col-form-label">MONTH</label>
                    <div class="col-sm-3">
                        <select name="loaninformation" id="monthvalue">
                            <option value=""> Select Month</option>
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
                        </select>
                        <div class="clear"></div>
                    </div>

                    <label for="name " class="col-sm-2 col-form-label">YEAR</label>
                    <div class="col-sm-3">
                        <input type="text" placeholder="YEAR" id="year" name="dob" class="text-fld1">
                        <div class="clear"></div>
                    </div>


                    <div class="col-sm-2">
                        <button type="button" class="btn btn-xm btn-primary" id="profit-submit-btn"
                            onclick="lendersLoanInformationdownload();">Submit</button>

                    </div>
                </div>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal modal-success fade" id="modal-getLenderinformation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <p>
                <h2 style="font-size: 16px;">fileStatus: Lender Information
                    </br>
                    Email Sent to The Admin.</h2>
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

<div class="modal modal-danger fade" id="modal-agreement-already">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">OOPS!</h4>
            </div>
            <div class="modal-body">
                <p>Something went wrong, Try again.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>

<div class="modal modal-success fade" id="modal-referee-success">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Status!</h4>
            </div>
            <div class="modal-body">
                <p>Thank You For Approve The Reference Amount</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>
<div class="modal modal-success fade" id="modal-referenceamount-hold">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Status!</h4>
            </div>
            <div class="modal-body">
                <p>You have Successfully Hold The Reference Amount</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>


<div class="modal modal fade" id="modal-uploadDisbursement">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </br>
                <div class="row">
                    <center>
                        <H4>
                            Upload Disbusement File </H4>
                    </center>
                    </BR>

                    <label for="name " class="col-sm-2 col-form-label dates"> DATE :</label>
                    <div class="col-sm-3 dates">
                        <input type="text" placeholder="dd-mm-yyyy" id="startdatedis" name="dob" class="text-fld1">
                    </div>


                    <div class="col-sm-4 file">
                        <div class="panel-body" id="userKYCUpload" enctype="multipart/form-data">
                            <div class="form-lft kycproofs">
                                <label>FILE :<b style="color:red"></b></label>
                                <div class="fld-block upload_pdf">
                                    <input class="custom-file-input CibilFileUpload" data-clickedid="" type='file'
                                        onchange="readdisbursement(this);" id="Disbursed"
                                        accept="application/pdf,application/xlsx,application/vnd.ms-excel" />
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>




<div class="modal modal fade" id="modal-downloaddisbursment">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </br>
                <div class="row">
                    <center>
                        <H4>
                            Download Disbursed Loans Information </H4>
                    </center>
                    </BR>

                    <label for="name " class="col-sm-2 col-form-label"> Date :</label>
                    <div class="col-sm-4">
                        <input type="text" placeholder="dd-mm-yyyy" id="downdisbursment" name="dob" class="text-fld1">
                    </div>

                    <div class="col-sm-6">
                        <button type="button" class="btn btn-xm btn-primary" id="profit-submit-btn"
                            onclick="disbursedownload();">Submit</button>

                    </div>

                </div>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal fade" id="modal-UpdateDisbursedLoans">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </br>
                <div class="row">
                    <center>
                        <H4>
                            Update Disbursed Loans Information </H4>
                    </center>
                    </BR>

                    <label for="name " class="col-sm-2 col-form-label"> Date :</label>
                    <div class="col-sm-4">
                        <input type="text" placeholder="dd-mm-yyyy" id="UpdateDisbursedLoans" name="dob"
                            class="text-fld1">
                    </div>

                    <div class="col-sm-6">
                        <button type="button" class="btn btn-xm btn-primary" id="profit-submit-btn"
                            onclick="updatedisbursedLoansinformation();">Update</button>

                    </div>

                </div>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-success fade" id="modal-fileUploadedSuccessfully">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <p>
                <h2 style="font-size: 16px;">File uploaded successfully.</h2>
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


<div class="modal modal-success fade" id="modal-filedownloadedSuccessfully">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <p>
                <h2 style="font-size: 16px;">File downloaded successfully.</h2>
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



<div class="modal modal-success fade" id="modal-updatethedisbursmentsheet">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <p>
                <h2 style="font-size: 16px;">Thank you For Updating the sheet.</h2>
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

<div class="modal   fade" id="modal-viewuserdetails">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-6">
                        <h4 class="modal-title">User Loan Details</h4>
                    </div>

                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Loan ID</th>
                            <th>LR ID</th>
                            <th>BR ID</th>
                            <th>Loan Amount</th>
                            <th>ROI &Tenure</th>
                            <!-- <th>EMI</th> -->

                            <!--  <th>Emi's Paid</th>
                            <th>profit</th>
                            <th>Due Emi Amount</th> -->




                        </tr>
                    </thead>

                    <tbody id="displayloanRecords">

                        </tfoot>

                </table>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>



<div class="modal fade" id="modal-adminCmsRejectedFiles">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-6 pull-left">
                        <h4 class="modal-title">Principal / Interest Cms Rejected Files </h4>
                    </div>
                    <div class="col-xs-6 pull-right">
                        <!--   <button type="button" class="btn btn-warning btn-xs interest_btn" onclick="rejectedCmsFilesofinterest();">Interest Files</button> 
                 <button  type="button" class="btn btn-success btn-xs princial_btn" onclick="rejectedCmsFilesofPrincipal();">Principal Files</button>  -->

                        <button type="button" class="btn btn-danger btn-xs principalrejected"
                            onclick="skipRejected('principalRejected');" style="display:none">Skip</button>

                        <button type="button" class="btn btn-danger btn-xs interestRejected"
                            onclick="skipRejected('interestRejected');" style="display:none">Skip</button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead class="mobileDiv_4">
                        <tr style="background-color: #B0C4DE; border: 1px solid lightgrey;">
                            <th>Deal Id</th>
                            <th>Amount</th>
                            <th>Amount Date</th>
                            <th>Lender Id</th>
                            <th>Description </th>

                        </tr>
                    </thead>
                    <tbody id="viewCmsRejectedFiles" class="mobileDiv_3">
                        <tr id="displayNoRecords" class="displayRequests" style="display:none;">
                            <td colspan="8">No Data found!</td>
                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->

<!-- 
  <div class="modal fade" id="modal-adminCmsRejectedFiles"role="dialog" aria-labelledby="modal-borrower-sendoffer" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <div class="row">
            <div class="col-xs-6 pull-left">
              <h4 class="modal-title">Principal / Interest Cms Rejected Files </h4></div>
              <div class="col-xs-6 pull-right">
                <button type="button" class="btn btn-warning btn-xs interest_btn" onclick="rejectedCmsFilesofinterest();">Interest Files</button> 
                 <button  type="button" class="btn btn-success btn-xs princial_btn" onclick="rejectedCmsFilesofPrincipal();">Principal Files</button> 

                  <button  type="button" class="btn btn-danger btn-xs principalrejected" onclick="skipRejected('principalRejected');" style="display:none">Skip</button> 

                 <button  type="button" class="btn btn-danger btn-xs interestRejected" onclick="skipRejected('interestRejected');" style="display:none">Skip</button> 
            </div>
          </div>
           </div>
            <div class="modal-body">
               <table id="example2" class="table table-bordered table-hover">
                 <thead class="mobileDiv_4">
                <tr style="background-color: #B0C4DE; border: 1px solid lightgrey;">
                  <th>Deal Id</th>
                  <th>Amount</th>
                  <th>Amount Date</th>
                  <th>Lender Id</th>
                  <th>Description </th>

                </tr>
                </thead>
                <tbody id="viewCmsRejectedFiles" class="mobileDiv_3">
                <tr id="displayNoRecords" class="displayRequests" style="display:none;">
                    <td colspan="8">No Data found!</td>
                </tr>
                </tfoot>
              </table>
      </div>
    </div>
  </div>
 -->

<script id="userloanstatus" type="text/template">
    {{#data}}
               <tr>
                  <td>{{loanId}}</td> 
                  <td>LR{{lenderDisplayId}}</td> 
                  <td>BR{{borrowerDisplayId}}</td> 
                  <td>{{loanRequestAmount}}</td> 
                 
                  <td>{{rateOfInterest}}
                    
 </td> 
                   
                </tr> 
  {{/data}}
 </script>


<script id="showCmsRejectedFiles" type="text/template">
    {{#data}}
                <tr>
                  <td>{{deald}}</td> 
                  <td>{{amount}}</td> 
                  <td>{{amountDate}}</td> 
                  <td>{{lenderId}}</td> 
                  <td>{{description}}
                  </td>  
                </tr> 
  {{/data}}
 </script>

<script id="userPaymentstatus" type="text/template">
    {{#data}}
                 <tr>
                  <td>LR{{refereeId}}</td> 
                  <td>LR{{referrerId}}</td> 
                  <td>{{refereeName}}</td> 
                  <td>{{status}}</td>
                  <td>{{amount}}</td> 
                  <td>{{paymentStatus}}</td> 
                  
                </tr> 
  {{/data}}
 </script>


<script type="text/javascript">
$(document).ready(function() {
    $("#months").click(function() {
        if (this.checked)
            $('#rateOfInterestd').prop('disabled', true);
        $('#rateOfInterestb').prop('disabled', false);

    });
});
</script>


<script type="text/javascript">
$(document).ready(function() {
    $("#days").click(function() {
        if (this.checked)
            $('#rateOfInterestd').prop('disabled', false);
        $('#rateOfInterestb').prop('disabled', true);
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#startdate").datepicker({
        // todayHighlight: true,
        format: 'yyyy-mm-dd',
        // startDate: new Date(),
        changeMonth: true,
        changeYear: true,

    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#enddate").datepicker({
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        // startDate: new Date(),
        changeMonth: true,
        changeYear: true,

    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#idfcstartdate").datepicker({
        todayHighlight: true,
        format: 'dd-mm-yyyy',
        // startDate: new Date(),
        changeMonth: true,
        changeYear: true,

    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#downdisbursment").datepicker({
        todayHighlight: true,
        format: 'dd-mm-yyyy',
        // startDate: new Date(),
        changeMonth: true,
        changeYear: true,

    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#startdatedis").datepicker({
        todayHighlight: true,
        format: 'dd-mm-yyyy',
        // startDate: new Date(),
        changeMonth: true,
        changeYear: true,

    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#idfcstartdates").datepicker({
        todayHighlight: true,
        format: 'dd-mm-yyyy',
        // startDate: new Date(),
        changeMonth: true,
        changeYear: true,

    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#UpdateDisbursedLoans").datepicker({
        todayHighlight: true,
        format: 'dd-mm-yyyy',
        // startDate: new Date(),
        changeMonth: true,
        changeYear: true,

    });
});
</script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>






<script id="adminuserstatus" type="text/template">
    {{#data}}
             <tr>
            <td><a href="javascript:void(0)" class="loanDetails"  onclick="viewloaninfo('{{loanId}}');" data-loanid ='{{loanId}}' > {{loanId}}</a></td>
             <td>{{loanRequest}}</td>
             <td>{{loanRequestAmount}}</td>
                <td>Lender:- {{lenderUser.firstName}} {{lenderUser.lastName}}<br/>
               Borrower:- {{borrowerUser.firstName}} {{borrowerUser.lastName}}</td>
               <td>
                <button  type="button" class="btn label fee-{{lenderFeePaid}}"  onclick="feePaidClick('{{id}}' , 'LENDER')"> Lender</button>
                <button type="button" class=" btn label fee-{{borrowerFeePaid}}" onclick="feePaidClick('{{id}}', 'BORROWER')">Borrower</button>
            </td>
            <td>
              <div class="sparkbar" data-color="#00a65a" data-height="20">{{loanStatus}}</div></td>
          </tr> 
  {{/data}}
 </script>



<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<script type="text/javascript">
var $star_rating = $('.star-rating .fa');

var SetRatingStar = function() {
    return $star_rating.each(function() {
        if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data(
                'rating'))) {
            return $(this).removeClass('fa-star-o').addClass('fa-star');
        } else {
            return $(this).removeClass('fa-star').addClass('fa-star-o');
        }
    });
};

$star_rating.on('click', function() {
    $star_rating.siblings('input.rating-value').val($(this).data('rating'));
    return SetRatingStar();
});

SetRatingStar();
$(document).ready(function() {

});

//loadadminDashbord();
$(document).ready(function() {
    // console.log(<?php echo $writecommentsForborrower?>);
    loadadminDashbord(<?php echo $writecommentsForborrower?>);
    loadapproverefereamount(<?php echo $approvalforlenderreferenceAmount?>);
    window.onload = loadadminLatestloanAgreements();
    loadadminstats();
    loadRefereepaymentlist();
    rejectedCmsFiles();
    lenderdashboardGraphs();
    //feePaidClick();
});
</script>


<?php include 'admin_footer.php';?>