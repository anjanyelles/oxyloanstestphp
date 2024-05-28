<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<?php

   $urlfromBroweser = $_SERVER['REQUEST_URI'];
   
  $userID   = isset($_GET['userid']) ? $_GET['userid'] : '0';
  $adminID  = isset($_GET['aID']) ? $_GET['aID'] : '0';
  
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            View Borrower info
        </h1>

        <div class="pull-right">
            <a href="salariedDeals">
                <button type="button" class="btn btn-primary pull-right marR15"><i class="fa fa-angle-double-left"></i>
                    <b>Back to Deal</b>
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

                <!-- /.box-header -->
                <div class="box viewLoanOfferSection">
                    <div class="box-body no-padding ">

                        <div class="box-header">
                            <div class="col-md-12 borrowerUserInfo">
                                <div class="col-md-6">
                                    <h3 class="box-title">
                                        <b>Name:- </b><span class="toImLending"></span>
                                    </h3>
                                    <br />
                                    <b>City:-</b> <span class="borrowerCity"></span><br />
                                    <b>Company:-</b> <span class="borrowerCompany"></span> <br />
                                    <b>Salary:-</b> <span class="borrowerSalary"></span> <br />
                                    <b>mobile Number:-</b> <span class="borrowerRiskCat"></span> <br />
                                </div>
                                <div class="col-md-3" style="display: none;">
                                    <h3 class="box-title">
                                        <span class="toImLending"></span>'s Documents
                                    </h3><br />

                                    <a href="javascript:void(0)" class="placeUserIDHere" data-userID=""
                                        onclick="viewBorrowerDoc('PAN');">View PAN</a><br />
                                    <a href="javascript:void(0)" onclick="viewBorrowerDoc('AADHAR');">View
                                        AADHAR</a><br />
                                    <a href="javascript:void(0)" onclick="viewBorrowerDoc('PAYSLIPS');">View Payslip</a>
                                </div>

                                <div class="col-md-3">
                                    <h3 class="box-title">
                                        Verified
                                    </h3><br />
                                    <div>
                                        <span><img src="<?php echo base_url(); ?>/assets/images/tick-verified.png"
                                                width="14" /></span> <span> &nbsp;&nbsp;PAN</span><br />
                                        <span><img src="<?php echo base_url(); ?>/assets/images/tick-verified.png"
                                                width="14" /></span> <span> &nbsp;&nbsp;AADHAR</span><br />
                                        <span><img src="<?php echo base_url(); ?>/assets/images/tick-verified.png"
                                                width="14" /></span><span> &nbsp;&nbsp;Physical
                                            Verification</span><br />
                                        <span><img src="<?php echo base_url(); ?>/assets/images/tick-verified.png"
                                                width="14" /></span><span> &nbsp;&nbsp;PAYSLIPS</span><br />

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <!-- <button type="button" class="btn btn-primary placeUserIDHere"data-userID ="" id="favouriteBorrower" onclick="favouriteThisBorrower();"> <b>Favourite</b>
                        </button>
                         <button type="button" class="btn btn-danger placeUserIDHere" id="unfavouriteBorrower" data-userID ="" onclick="unfavouriteThisBorrower();"style="display: none;"> <b>Un Favourite</b>
                        </button>
                        -->
                                    <!--    <div class="display360info pull-right">
                        <a href="javascript:void(0)" onclick="loadBorrowerInfo()" class="display360">
                          <button class="btn btn-warning">View borrower 360&deg; Info</button>
                        </a>
                    </div> -->
                                </div>

                            </div>
                        </div>
                        <table class="table table-striped">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Description</th>
                                <th>Info</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Dob</td>
                                <td>
                                    <span class="loanRequestDisplay"></span>
                                </td>
                            </tr>

                            <tr>
                                <td>2.</td>
                                <td>Email</td>
                                <td>
                                    <span class="offeredAmountByAdmin"></span>
                                </td>
                            </tr>

                            <tr>
                                <td>3.</td>
                                <td>AADHAR</td>
                                <td>
                                    <a href="javascript:void(0)" class="relbtn viewPan showPAN"
                                        onclick="viewBorrowerDoc(<?php echo$userID ?>, 'AADHAR')">View AADHAR</a>
                                </td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>PAN</td>
                                <td>
                                    <a href="javascript:void(0)" class="relbtn viewPan showPAN"
                                        onclick="viewBorrowerDoc(<?php echo$userID ?>, 'PAN')">View pan</a>
                                </td>
                            </tr>

                            <tr>
                                <td>5.</td>
                                <td>PAYSLIPS</td>
                                <td>
                                    <a href="javascript:void(0)" class="relbtn viewPan showPAN"
                                        onclick="viewBorrowerDoc(<?php echo$userID ?>, 'PAYSLIPS')">View PAYSLIPS</a>


                                    <!--                  <embed src=
"https://media.geeksforgeeks.org/wp-content/cdn-uploads/20210101201653/PDF.pdf" 
               width="800"
               height="200"> -->
                                </td>
                            </tr>

                            <tr>
                                <td>6.</td>
                                <td>Pan No</td>
                                <td>
                                    <span class="dispalyPan">Principal Interest Flat</span>
                                </td>
                            </tr>


                            <tr>
                                <td>7.</td>
                                <td>loanPurpose</td>
                                <td>
                                    <span class="loanpurposeDisplay"></span>
                                </td>
                            </tr>

                            <tr>
                                <td>8.</td>
                                <td>state</td>
                                <td>
                                    <span class="displayUserstate"> "Telangana" </span>
                                </td>
                            </tr>

                            <tr>
                                <td>9.</td>
                                <td>Application Status</td>
                                <td>
                                    <span class="displayApplicationStatus"> "Telangana" </span>
                                </td>
                            </tr>


                            <tr>
                                <td>10.</td>
                                <td>loan Request Id</td>
                                <td>
                                    <span class="displayloanRequest"> Personal Loan</span>
                                </td>
                            </tr>



                        </table>
                        <div class="pull-right col-md-10">
                            <!-- 
                 <a href="lendercreateloanrequest?loanId=<?php echo $requestidFromClick; ?>">
                      <button type="button" class="btn btn-success pull-right"><i class="fa fa-angle-double-right"></i> <b>Send Offer</b>
                    </button>
                   </a>
                  -->
                            <!--    <div align="right" class="col-md-7"></div>
                  <div align="right" class="col-md-5">
                    <a href="javascript:void(0)" class="lenderSendingOffer">
                      <button type="button" class="btn btn-success pull-right" data-toggle="tooltip" title="Max you can offer INR 50000 to one Borrower"><i class="fa fa-angle-double-right" ></i> <b>Send Offer</b>
                      </button>
                     </a>


                    <a href="lenderloanlistings">
                      <button type="button" class="btn btn-primary pull-left marR15"><i class="fa fa-angle-double-right"></i> <b>Back to Loan Listings</b>
                      </button>
                    </a>
                  </div> -->
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
                                        validation="loanRequestAmount" required="required">
                                    <span class="error loanRequestAmountError" style="display: none;">Please enter loan
                                        amount value</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="rateOfInterest" class="col-sm-2 col-form-label">Rate of Interest per
                                    Annum</label>
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

                                    </select>

                                    <span class="error rateOfInterestError" style="display: none;">Please choose Rate of
                                        Interest</span>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="duration" class="col-sm-2 col-form-label">Loan Duration</label>
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
                                <label for="repaymentMethod" class="col-sm-2 col-form-label">Re-Payment Method</label>
                                <div class="col-sm-10">

                                    <label>
                                        <input type="radio" id="principleMethod" name="repaymentMethod" value="PI" />
                                        Pay (P + I) monthly by Flat EMI method)<span class="displayEMIvalue"
                                            style="display: none;">Your EMI is <span class="emiValueIs">0</span></span>
                                    </label>
                                    <label>
                                        <input type="radio" id="interestMethod" name="repaymentMethod" value="I" />
                                        Pay Interest (I) monthly and Principal (P) at end (Applicable for mortgage loans
                                        only.)
                                        <span class="displayEMIvalue" style="display: none;">Your Interest is <span
                                                class="payonlyint">0</span></span>
                                    </label>


                                    <span class="error repaymentMethodError" style="display: none;">Please choose
                                        repayment method</span>
                                </div>
                            </div>


                            <div class="form-group row" style="display: none;">
                                <label for="loanPurpose" class="col-sm-2 col-form-label">Loan Purpose</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control  loanPurpose"
                                        placeholder="Enter your loanPurpose" name="loanPurpose" id="loanPurpose" data
                                        validation="loanPurpose" value="personal loan">
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
                <p>You don't have suffecient commitment, please add a loan offer.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left " data-dismiss="modal">Close</button>
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
                <p>You've already sent a request to this user and she/he responded to your rquest.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left " data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade modal-info" id="suggetionToLender" tabindex="-1" role="dialog" aria-labelledby="c"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Looks like you've less commitment than the offer!</h4>
            </div>

            <div class="modal-body">
                <div align="center">

                    Looks like you've less commitement i.e <b><span class="whatlenderHas"></span></b>. And you're are
                    trying to offer <span class="whatlenderisOffering"></span>. The balance amount will be adding as a
                    your commitment, <b>Please confirm.</b>


                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-outline yesIncreaseCommitment btn-success" data-reqID=""
                    data-type="" onclick="respondToLoanRequest('')">Yes, Increase</button>
                <button type="button" class="btn  btn-outline btn-danger noLetmeChangeOffer" data-dismiss="modal">No,
                    Let me change the offer!</button>
            </div>
        </div>
    </div>
</div>


<div class="modal modal-info fade" id="modal-raisealoan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Your offer is sent to the borrower.You will be notified through SMS & Email,if the borrower
                    accepts/rejects your offer.You can also check the same in My Lendings>offers sent</p>
            </div>
            <div class="modal-footer">
                <a href="lenderloanlistings">
                    <button type="button" class="btn btn-outline pull-left">Close</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-warning fade" id="modal-alreadyDoneSendOffer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text1">Amount should not exceed INR 50000 Your application already disbursed with INR 50000.0</p>
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

<div class="modal modal-warning fade" id="modal-errorforRejected">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body">
                <p id="#text">Amount should not exceed INR 50000 Your application already disbursed</p>
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









<div class="modal fade" id="modal-displayBorrowerInfo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title toImLending"></h4>
                <div class="pull-left"> <b>Risk Category:</b> <span class="borrowerRiskCat"></span></div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <span class="headsep">Address Details:- </span><br />
                            <b>Location :</b> <span class="BorrowerLocation"></span> <br />
                            <b>Location Residence:</b> <span class="BorrowerResidence"></span> <br />
                            <b>City :</b> <span class="borrowerCity"></span>
                        </div>
                        <div class="col-md-6">
                            <span class="headsep">Working Details:- </span><br />

                            <b>Company Name :</b> <span class="BorrowerCompany"></span> <br />
                            <b>Salary :</b> <span class="borrowerSalary"></span> <br />
                            <b>Company Residence :</b> <span class="CompanyResidence"></span> <br />
                            <b>Designation :</b> <span class="Role"></span> <br />
                        </div>
                    </div>
                </div>
                <br />&nbsp;
                <div class="col-md-12">
                    <div class="col-md-6">
                        <span class="headsep">Loan requirement details:- </span><br />
                        <b>Loan Requirement :</b> <span class="loanRequestAmountDisplay"></span><br />
                        <b>Loan Eligibility :</b> <span class="Eligibility"></span> <br />
                        <b>Current Paying Emis:</b> <span class="CurrentEmi"></span> <br />

                    </div>
                    <div class="col-md-6">
                        <span class="headsep">Documents & Creds:- </span><br />
                        <div class="pull-left">
                            <p><a target="_blank" href="" class="aadharA">AADHAR</a><br /><small>(<span
                                        class="AadharPassword"></span>)</small></p>
                            <p><a target="_blank" href="" class="panA">PAN</a><br /><small>(<span
                                        class="AadharPassword"></span>)</small></p>
                        </div>
                        <div class="pull-right">
                            <p><a target="_blank" href="" class="payslipA">PAYSLIP</a><br /><small>(<span
                                        class="PayslipsPassword"></span>)</small></p>
                            <p><a target="_blank" href="" class="bankStatementA">Bank Statement</a><br /><small>(<span
                                        class="BankPassword"></span>)</small></p>
                        </div>
                        <div class="clear"></div>
                        <div class="col-md-12" style="margin-left: -15px;font-size: 10px">
                            <code>If document asks you a password, please find it below the document link from where you clicked.</code>
                        </div>
                    </div>
                    <div class="row ratinDivForLender">
                        <div class="col-md-12 starRating pull-left" style="font-size: 18px;">
                            <div class="pull-left col-md-5" style="font-size: 20px;text-align: left;">Rate this
                                borrower:-</div>
                            <div class="newLenderRating pull-left col-md-4">
                                <span class="fa fa-star-o" data-rating="1"></span>
                                <span class="fa fa-star-o" data-rating="2"></span>
                                <span class="fa fa-star-o" data-rating="3"></span>
                                <span class="fa fa-star-o" data-rating="4"></span>
                                <span class="fa fa-star-o" data-rating="5"></span>
                                <input type="hidden" name="whatever1" class="rating-value" value="0">
                            </div>
                            <div class="error col-md-7 displayZeroRatingError" style="display: none;">Please choose a
                                star.</div>
                            <div class="col-md-7 pull-left showSuccessMessage" style="display: none;">Thanks for rating
                                this borrower!</div>
                            <div class="pull-left col-md-3">
                                <button onclick="rateThisBorrower()" class="btn btn-info btn-xs loadPIDHere"
                                    data-pID="">SAVE</button>
                            </div>
                        </div>
                    </div>

                    <br />&nbsp;
                    <div class="col-md-12 row">
                        <span class="headsep">Comments by Radhakrishna <i style="font-size: 12px;">(CEO &amp; Founder of
                                OxyLoans)</i> :</span>
                        <span class="commentsByRadha"></span><br /><br />
                        <div class="row">
                            <div class="col-md-6">
                                <b>Radhakrishna Rating</b><br />
                                <div class="starRating" style="cursor: not-allowed;">
                                    <div class="adminRating">
                                        <span class="fa fa-star-o" data-rating="1"></span>
                                        <span class="fa fa-star-o" data-rating="2"></span>
                                        <span class="fa fa-star-o" data-rating="3"></span>
                                        <span class="fa fa-star-o" data-rating="4"></span>
                                        <span class="fa fa-star-o" data-rating="5"></span>
                                        <input type="hidden" name="whatever1" class="RatingRadha" value="">
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <b>Experianced Lenders Rating</b>
                                <span class=""></span> <br />
                                <div class="starRating" style="cursor: not-allowed;">
                                    <div class="lenderRating">
                                        <span class="fa fa-star-o" data-rating="1"></span>
                                        <span class="fa fa-star-o" data-rating="2"></span>
                                        <span class="fa fa-star-o" data-rating="3"></span>
                                        <span class="fa fa-star-o" data-rating="4"></span>
                                        <span class="fa fa-star-o" data-rating="5"></span>
                                        <input type="hidden" name="whatever1" class="LenderRating" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left " data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



    <style type="text/css">
    .headsep {
        font-size: 14px;
        text-transform: uppercase !important;
        line-height: 35px;
    }

    .newLenderRating .fa-star {
        color: yellow;
    }

    .ratinDivForLender {
        margin-top: 25px !important;
        margin-bottom: 20px;
        width: 100%;
        float: left;
        background: #ccc;
        padding: 20px 0;
    }
    </style>

    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/ion.rangeSlider.min.js"></script>

    <script type="text/javascript">
    window.onload = searchUsersPhase1("BORROWER", <?php echo$userID ?>, <?php echo$adminID ?>);

    var $star_rating = $('.newLenderRating .fa');

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

    // Set Star Rating
    $star_rating.on('click', function() {
        $star_rating.siblings('input.rating-value').val($(this).data('rating'));
        return SetRatingStar();
    });

    SetRatingStar();





    var $star_rating1 = $('.adminRating .fa');
    var SetRatingStar1 = function() {
        return $star_rating1.each(function() {
            if (parseInt($star_rating1.siblings('input.RatingRadha').val()) >= parseInt($(this).data(
                    'rating'))) {
                return $(this).removeClass('fa-star-o').addClass('fa-star');
            } else {
                return $(this).removeClass('fa-star').addClass('fa-star-o');
            }
        });
    };
    // Set Star Rating
    $star_rating1.on('click', function() {
        $star_rating1.siblings('input.rating-value').val($(this).data('rating'));
        return SetRatingStar1();
    });
    SetRatingStar1();



    var $star_rating2 = $('.lenderRating .fa');
    var SetRatingStar2 = function() {
        return $star_rating2.each(function() {
            if (parseInt($star_rating2.siblings('input.LenderRating').val()) >= parseInt($(this).data(
                    'rating'))) {
                return $(this).removeClass('fa-star-o').addClass('fa-star');
            } else {
                return $(this).removeClass('fa-star').addClass('fa-star-o');
            }
        });
    };
    // Set Star Rating
    $star_rating2.on('click', function() {
        $star_rating2.siblings('input.rating-value').val($(this).data('rating'));
        return SetRatingStar2();
    });
    SetRatingStar2();



    $(document).ready(function() {

    });
    //loadviewLoanoffer();
    $(document).ready(function() {
        $(".loadingSec").show();
    });
    loadDashboardData();
    setTimeout(function() {
        loadviewLoanoffer();
        //loadviewLoanofferfromnewAPI();
    }, 3000);
    //var displayFromRange = data.rateOfInterest;
    </script>
    <?php include 'footer.php';?>