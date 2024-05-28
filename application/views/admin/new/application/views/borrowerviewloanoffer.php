<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>

<!-- Content Wrapper. Cotains page content -->
<?php
   $urlfromBroweser = $_SERVER['REQUEST_URI'];
  //echo $urlfromBroweser;
  $requestidFromClick =  $_GET['loanid'];
  //$receivedEmailToken = $_GET['emailToken'];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            View Loan Offer
            <span class="requestidFromClick hide"><?php echo $requestidFromClick?></span>

        </h1>
        <div class="pull-left">
            <small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Loan Listings</a></li>
                    <li class="active">View Loan Offer</li>
                </ol>
            </small>
        </div>
        <div class="pull-right">
            <a href="loanlistings">
                <button type="button" class="btn btn-primary pull-right marR15"><i class="fa fa-angle-double-left"></i>
                    <b>Back to Loan listings</b>
                </button>
            </a>
        </div>
    </section>
    <div class="cls"></div>
    <!-- Main content -->
    <section class="content">
        <div class="row customFormQ">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box viewLoanOfferSection">
                    <div class="box-header">
                        <h3 class="box-title">
                            <b>Name:- </b><span class="toImLending"></span>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Description</th>
                                <th>Info</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Application Number</td>
                                <td>
                                    <span class="loanRequestDisplay"></span>
                                </td>
                            </tr>

                            <tr>
                                <td>2.</td>
                                <td>Given Offer</td>
                                <td>
                                    <span class="loanRequestAmountDisplay"></span>
                                </td>
                            </tr>

                            <tr>
                                <td>3.</td>
                                <td>Lender can offer you</td>
                                <td>
                                    <span>INR 5,000 - 50,000 (Min-Max)</span>
                                </td>
                            </tr>

                            <tr>
                                <td>4.</td>
                                <td>Loan Duration</td>
                                <td>
                                    <span class="durationDisplay"></span> <span class="Duration">Months</span>
                                </td>
                            </tr>

                            <tr>
                                <td>5.</td>
                                <td>Re-Payment Method</td>
                                <td>
                                    <span class="repaymentMethodDisplay"> Principal Interest Flat</span>
                                </td>
                            </tr>


                            <tr>
                                <td>6.</td>
                                <td>Funds release date</td>
                                <td>
                                    <span class="loanRequestedDateDisplay"> 23-Apr-2018</span>
                                </td>
                            </tr>

                            <tr>
                                <td>7.</td>
                                <td>Rate of Interest</td>
                                <td>
                                    <span class="rateOfInterestDisplay">16.00% </span> <span class="valuedisplay">
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td>8.</td>
                                <td>Application Status</td>
                                <td>
                                    Lending Committed
                                </td>
                            </tr>


                            <tr>
                                <td>9.</td>
                                <td>Description</td>
                                <td>
                                    <span class="loanPurpose"> Personal Loan</span>
                                </td>
                            </tr>
                        </table>
                        <div class="pull-right col-md-10">

                            <!-- <a href="borrowercreateloanrequest?loanId=<?php echo $requestidFromClick?>">
                              <button type="button" class="btn btn-success pull-right "><i class="fa fa-angle-double-right"></i> <b>Send Request</b>
                            </button>
                           </a> -->

                            <div align="right" class="col-md-7"></div>
                            <div align="right" class="col-md-5 mobile_Btn_pad">
                                <a href="javascript:void(0)" class="borrowerSendingrequest">
                                    <button type="button" class="btn btn-success pull-right" data-toggle="tooltip"
                                        title="Max you can request INR 50000 from one Lender"><i
                                            class="fa fa-angle-double-right"></i> <b>Send Request</b>
                                    </button>
                                </a>
                                <a href="loanlistings">
                                    <button type="button" class="btn btn-primary pull-left marR15"><i
                                            class="fa fa-angle-double-right"></i> <b>Back to Loan Listings</b>
                                    </button>
                                </a>
                            </div>
                        </div>
                        &nbsp;<br />&nbsp;<br />&nbsp;
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- REQUEST FORM -->
                <div id="showRequestSection" style="display: none;">
                    <form autocomplete="off" id="raisealoanrequest">
                        <div class="col-xs-10">

                            <div class="form-group row">
                                <label for="loanRequestAmount" class="col-sm-2 col-form-label">Loan offer Amount</label>
                                <div class="col-sm-10">
                                    <input type="text" name="loanRequestAmount" class="form-control loanRequestAmount"
                                        placeholder="Enter your Amount" id="loanRequestAmount" data
                                        validation="loanRequestAmount" required="required" />
                                    <span class="error loanRequestAmountError" style="display: none;">Please enter loan
                                        amount value</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="rateOfInterest" class="col-sm-2 col-form-label">Rate of Interest</label>
                                <div class="col-sm-10">
                                    <!--  <input  type="text" class="form-control rateOfInterest" name="rateOfInterest" placeholder="Enter your rateOfInterest" id="rateOfInterest" data validation="rateOfInterest">-->
                                    <select class="form-control rateOfInterest" name="rateOfInterest"
                                        id="rateOfInterest" data validation="rateOfInterest">
                                        <option value="">-- Choose ROI --</option>
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

                                    <span class="error rateOfInterestError" style="display: none;">Please choose Rate of
                                        Interest</span>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="duration" class="col-sm-2 col-form-label">Loan Duration </label>
                                <div class="col-sm-10">
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

                                    <span class="error durationError" style="display: none;">Please choose
                                        duration</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Durationtype" class="col-sm-2 col-form-label">Duration Type</label>
                                <div class="col-sm-10">

                                    <label>
                                        <input type="radio" id="Months" name="Durationtype" value="Months" />
                                        Months
                                    </label>

                                    <label>
                                        <input type="radio" id="Days" name="Durationtype" value="Days" />
                                        Days
                                    </label>


                                    <span class="error DurationtypeError" style="display: none;">Please choose Duration
                                        Type</span>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="repaymentMethod" class="col-sm-2 col-form-label">Preferred Re-Payment
                                    Method</label>
                                <div class="col-sm-10">

                                    <label>
                                        <input type="radio" id="principleMethod" name="repaymentMethod" value="PI" />
                                        Pay (P + I) monthly by Flat EMI method)<span class="displayEMIvalue"
                                            style="display: none;">Your EMI is <span class="emiValueIs">0</span></span>
                                    </label>
                                    <label>
                                        <input type="radio" id="interestMethod" name="repaymentMethod" value="I" />
                                        Pay Monthly Interest (I) Only &amp; Principal (P) at the end of the term.
                                        <span class="displayEMIvalue" style="display: none;">Your Interest is <span
                                                class="payonlyint">0</span></span>
                                    </label>


                                    <span class="error repaymentMethodError" style="display: none;">Please choose
                                        repayment method</span>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="loanPurpose" class="col-sm-2 col-form-label">Loan Purpose</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control  loanPurpose"
                                        placeholder="Enter your loanPurpose" name="loanPurpose" id="loanPurpose" data
                                        validation="loanPurpose" value="">
                                    <span class="error loanPurposeError" style="display: none;">Please choose loan
                                        purpose </span>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="expectedDate" class="col-sm-2 col-form-label">Expected Date </label>
                                <div class="col-sm-10">

                                    <div class="input-group date" data-date-format="dd/mm/yyyy">
                                        <input type="text" class="form-control expectedDateValue" id="expectedDate"
                                            placeholder="dd/mm/yyyy" name="expectedDate" data validation="expectedDate">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>

                                    </div>
                                    <span class="error expectedDateError" style="display: none;">Please choose date when
                                        you're expected loan</span>

                                </div>
                            </div>



                            <center> <button type="button" class="btn btn-lg btn-primary"
                                    id="createloan-submit-btn">Submit</button>

                            </center>
                            <div>&nbsp;</div>
                        </div>
                    </form>
                </div>


            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<div class="modal modal-info fade" id="modal-displayBalanceError">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body">
                <p>You don't have suffecient requested amount, please raise a loan request.</p>
            </div>
            <div class="modal-footer">
                <a href="loanlistings">
                    <button type="button" class="btn btn-outline pull-left">Close</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-success fade" id="modal-raisealoan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Your request is sent to the lender.You will be notified through SMS & Email,if the lender
                    accepts/rejects your request.You can also check the same in My Borrowings>requests sent </p>
            </div>
            <div class="modal-footer">
                <a href="loanlistings">
                    <button type="button" class="btn btn-outline pull-left">Close</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-danger fade" id="modal-ReqAlreadySent">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body">
                <p>You've already sent a request to this user and she/he responded to your request.</p>
            </div>
            <div class="modal-footer">
                <a href="loanlistings">
                    <button type="button" class="btn btn-outline pull-left">Close</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-warning fade" id="modal-errorforRejected">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body">
                <p id="#text">User don't have loan offer.</p>
            </div>
            <div class="modal-footer">
                <a href="loanlistings">
                    <button type="button" class="btn btn-outline pull-left">Close</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script type="text/javascript">
loadborrowerDashboardData();
setTimeout(function() {
    loadviewLoanoffer();
}, 100);
</script>
<?php include 'footer.php';?>