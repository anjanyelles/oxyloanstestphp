<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
//echo $urlfromBroweser;
$dealId =  isset($_GET['id']) ? $_GET['id'] : '0';
$loanRequestID =  isset($_GET['loanrequestId']) ? $_GET['loanrequestId'] : '0';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Create New Deal!!!
        </h1>


    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <!-- maincontent starts -->
                        <div class="main-cont createDealFormSection">

                            <div class="form-row mtop30">
                                <legend>Deal Details:</legend>
                                <div class="col-md-3 mb-3 formTopRows">
                                    <label for="dealName">Deal Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="dealName" placeholder="Deal Name"
                                            onchange="fetchWhatsappChatID();" required>
                                    </div>

                                    <span class="error dealLengtherror" style="display: none;">Length of deal name
                                        should not exceed 100 char</span>
                                </div>
                                <div class="col-md-3 mb-3 formTopRows">
                                    <label for="primaryBorrower">Primary Borrower</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="borrowerName"
                                            placeholder="Primary Borrower" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3 formTopRows">
                                    <label for="dealAmount">Loan Amount</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="dealAmount"
                                            placeholder="Loan Amount" aria-describedby="inputGroupPrepend2" required>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3 formTopRows">
                                    <label for="borrowerRateOfInterest" class="col-2 col-form-label">RoI from
                                        Borrower</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" value="" id="borrowerRateOfInterest" placeholder="Roi From Borrower">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3 formTopRows">
                                    <label for="fundsAcceptanceStartDate" class="col-2 col-form-label">Funds 
                                        Start Date</label>
                                    <div class="input-group">
                                        <input class="form-control" data-provide="datepicker" type="text" value=""
                                            id="fundsAcceptanceStartDate" data-date-format="mm-dd-yyyy"
                                            placeholder="dd/mm/yyyy" onchange="getautodate();">
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3 formTopRows">
                                    <label for="fundsAcceptanceEndDate" class="col-2 col-form-label">Funds 
                                        End Date</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="dd/mm/yyyy" value=""
                                            id="fundsAcceptanceEndDate">
                                    </div>
                                    <code class="errorfundsEndDate"
                                        style="display: none;"><small>End-date should be greater than fund start date.</small></code>

                                </div>


                                <div class="col-md-3 mb-3">
                                    <label for="dealLink" class="col-2 col-form-label">Project URL</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" value="" id="dealLink" placeholder="project URL">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="duration" class="col-2 col-form-label">Tenure in Months</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" value="" id="duration" placeholder="Deal Tenure">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="loanActiveDate" class="col-2 col-form-label">First Interest 
                                            Date</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" placeholder="dd/mm/yyyy" value=""
                                                id="loanActiveDate" onchange="checkFirstInterestDate();">
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <label for="feefromBorrower" class="col-2 col-form-label">Minimum 
                                            Amount</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" value="" id="minimumLimit"
                                                placeholder="Minimum limit">
                                            <span class="error participationMinierror" style="display: none;">Enter the
                                                minimum participation Amount</span>
                                        </div>

                                    </div>

                                    <div class="col-md-3">
                                        <label for="ParticipationLimit" class="col-2 col-form-label">Maximum
                                             Amount</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" value="" id="participationLimit"
                                                placeholder="Maximum limit">
                                            <span class="error participationLimiterror" style="display: none;">Amount
                                                Should be 50000 as per RBI</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="ParticipationLimit" class="col-2 col-form-label">Deal Type</label>
                                        <div class="input-group">
                                            <select class="form-control" name="dealtype" id="dealtype" data
                                                validation="dealtype">
                                                <option value="">-- Choose Deal Type --</option>
                                                <!-- <option value="EQUITY">EQUITY</option>
                                                <option value="NORMAL">NORMAL</option>
                                                <option value="ESCROW">ESCROW</option> -->
                                                <option value="TEST">TEST</option>
                                                <!-- <option value="PERSONAL">PERSONAL</option> -->
                                                <!--   <option value="SELFEMPLOYED">SELFEMPLOYED</option> -->
                                            </select>
                                            <span class="error dealTypeError" style="display: none;">Please Select Deal
                                                Type</span>
                                        </div>
                                    </div>

                                </div>



                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="feefromBorrower" class="col-2 col-form-label">Borrowers Ids Mapped
                                            To Deal</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" value="" id="mappedUsers" placeholder="Enter Borrower Ids">
                                        </div>
                                        <code><small>Note:user's id seperated By ','</small></code>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="feefromBorrower" class="col-2 col-form-label">Mapped Users Loan
                                            Amount</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" value="" id="userLoanAmpuntmap" placeholder="Enter Mapped User Amount">
                                        </div>
                                        <code><small>Loan amount seperated By ','</small></code>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="feefromBorrower" class="col-2 col-form-label">Enach Status</label>
                                        <div class="input-group">
                                            <select class="form-control enachTypeUsers" name="enachTypeUsers" data
                                                validation="enachType" id="enachTypeUsers">
                                                <option value="">-- Choose options-----</option>
                                                <option value="true">True</option>
                                                <option value="false">False</option>
                                            </select>
                                            <span class="error enachTypeError" style="display: none;">Please choose
                                                Enach Type</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="roiforBorrower" class="col-2 col-form-label">Fee ROI for
                                            Borrower</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" value="" id="roiBorrower" placeholder="Fee Roi From Borrower">

                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="feefromBorrower" class="col-2 col-form-label">Fee Collected From
                                            Borrower</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" value="" id="feeBorrower" placeholder="Fee Collected Amount From
                                            Borrower">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="feefromBorrower" class="col-2 col-form-label">AnyTime
                                            Withdraw</label>
                                        <div class="input-group">
                                            <select class="form-control anyTimeWithdraw col-md-3" name="selectWithdraw"
                                                data validation="anyTimeWithdraw" id="anyTimeWithRequest">
                                                <option value="">-- Choose option-----</option>
                                                <option value="YES">YES</option>
                                                <option value="NO">NO</option>
                                            </select>
                                            <span class="error anttimewithError" style="display: none;">Please choose
                                                Withdraw Type</span>
                                        </div>
                                    </div>



                                    <div class="col-md-3">
                                        <label for="participcationLenderType"
                                            class="col-2 col-form-label">Participcation Lender Type</label>
                                        <div class="input-group">
                                            <select class="form-control participcationLenderType col-md-3"
                                                name="participcationLenderType" data
                                                validation="participcationLenderType" id="participcationLenderType">
                                                <option value="">-- Choose option-----</option>
                                                <option value="NEW">NEW LENDER</option>
                                                <option value="ANY">ANY LENDER</option>
                                            </select>
                                            <span class="error participcationLenderTypeError"
                                                style="display: none;">Please choose Lender Participation Type</span>
                                        </div>
                                    </div>


                                     <div class="col-md-3">
                                        <label for="feefromBorrower" class="col-2 col-form-label">Fee To
                                            Participate</label>
                                        <div class="input-group">
                                            <select class="form-control feeParticipation" name="feeParticipation" data
                                                validation="feeParticipation" id="feeParticipation">
                                                <option value="">-- Choose options-----</option>
                                                <option value="MANDATORY">MANDATORY</option>
                                                <option value="OPTIONAL">OPTIONAL</option>
                                            </select>
                                            <span class="error errorFeeStatus" style="display: none;">Please choose fee
                                                Status</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">


                                    <div class="col-md-3">
                                        <label for="feefromBorrower" class="col-2 col-form-label">WhatsApp Chat
                                            Id</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" value="" id="dealWhatsappChatId" placeholder="Enter WhatsApp Chat
                                            Id">
                                        </div>
                                        <span class="error dealChatidError" style="display: none;">Enter Whatsapp Chat
                                            ID</span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="feefromBorrower" class="col-2 col-form-label">WhatsApp Response
                                            Link</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" value="" id="dealWhatsappDealLink" placeholder="Enter WhatsApp Response
                                            Link">
                                        </div>
                                        <span class="error dealChatidLinkError" style="display: none;"> Enter Deal
                                            Response Link</span>
                                    </div>


                                        <div class="col-md-3 dealNotification">
                                        <label for="deallunch" class="col-2 col-form-label"> Create/Edit Deal Notification</label>
                                        <div class="input-group">
                                            <select class="form-control " name="dealnotification" data validation=""
                                                id="dealnotification">
                                                <option value="">-- Choose  Deal Notification</option>
                                                <option value="true">YES</option>
                                                <option value="false">NO</option>
                                            </select>
                                            <span class="error errordealnotification" style="display: none;">Please choose
                                               Deal Notification type</span>
                                        </div>
                                    </div>

                                         <div class="col-md-3">
                                        <label for="deallunch" class="col-2 col-form-label">Deal Launch</label>
                                        <div class="input-group">
                                            <select class="form-control dealLunchType" name="deallunchType" data
                                                validation="" id="dealLunchType">
                                                <option value="">-- Choose option-----</option>
                                                <option value="NOW">NOW</option>
                                                <option value="FUTURE">FUTURE</option>
                                            </select>
                                            <span class="error errordealLunchype" style="display: none;">Please choose
                                                Deal Launch type</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-3 chooseDealWaiver">
                                        <label for="deallunch" class="col-2 col-form-label">life Time Fee
                                            waive-off</label>
                                        <div class="input-group">
                                            <select class="form-control " name="deallunchType" data validation=""
                                                id="lifetimewaiver">
                                                <option value="">-- Choose Deal Fee waive-off-----</option>
                                                <option value="true">YES</option>
                                                <option value="false" selected>NO</option>
                                            </select>
                                            <span class="error errordealwaivertype" style="display: none;">Please choose
                                                Deal waive-off type</span>
                                        </div>
                                    </div>






                                    <!--  <div class="col-md-3 processingFeedeal">
                                        <label for="processingFeeparticular" class="col-2 col-form-label">Processing Fee
                                            percentage
                                        </label>
                                        <div class="input-group">
                                            <input class="form-control eachDealFeeToParticipate" type="text" />
                                        </div>
                                        <span class="error deallProcessingError" style="display: none;"> Enter
                                            Participated Fee</span>
                                    </div> -->


                                           <div class="col-md-3 dealLunchDate" style="display:none;">
                                        <label for="dealLunchDate" class="col-2 col-form-label">Deal Launch Date
                                        </label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" value="" id="dealLunchDate" placeholder="Enter Deal Launch Date">
                                        </div>
                                        <span class="error dealLunchdateError" style="display: none;">Choose Deal Launch
                                            Date</span>
                                    </div>
                                    <div class="col-md-3 dealLunchTime" style="display:none;">

                                        <label for="feefromBorrower" class="col-2 col-form-label">Deal Launch Time
                                        </label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" value="" id="dealLunchTimePicker" placeholder="Enter Deal Launch Time">
                                        </div>
                                        <span class="error deallunchHoursError" style="display: none;"> Enter Deal
                                            Launch Hours</span>
                                    </div>


                                     <div class="col-md-3 dealTypeSub" style="display:none;">
                                        <label for="roiforBorrower" class="col-2 col-form-label">Deal Sub Type</label>
                                        <div class="input-group">
                                            <select class="form-control dealsubtype" name="dealsubtype" data
                                                validation="dealsubtype" id="dealsubtype">
                                                <option value="">-- Choose option-----</option>
                                                <option value="ASSET">ASSET</option>
                                                <option value="STUDENT">STUDENT</option>
                                            </select>
                                            <span class="error errordealsubtype" style="display: none;">Please choose
                                                Deal Sub Type</span>
                                        </div>
                                    </div>




                                    <div class="col-md-3 dealwaiverAmount" style="display:none">
                                        <label for="dealwaiverAmountlabel" class="col-2 col-form-label">Fee waive-off
                                            Amount
                                        </label>
                                        <div class="input-group">
                                            <input class="form-control dealwaiverAmounttext" type="text" placeholder="Fee waive-off Amount" />
                                        </div>
                                        <span class="error errorWaiverAmount" style="display: none;"> Enter
                                            Fee waive-off Amount</span>
                                    </div>


                                     <div class="col-md-3 withdrawAmountRequest" style="display: none;">
                                        <label for="feefromBorrower" class="col-2 col-form-label">ROI for AnyTime
                                            Withdraw </label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" value="" id="anytimeWithRoiText" placeholder="Enter Anytime Withdraw Roi">
                                        </div>
                                    </div>

                                         <div class="col-md-3 whatsappdealNotification">
                                        <label for="deallunch" class="col-2 col-form-label"> WhatsApp Notification</label>
                                        <div class="input-group">
                                            <select class="form-control " name="dealnotification" data validation=""
                                                id="dealwhatsappnotification">
                                                <option value="">-- Choose  Deal Notification</option>
                                                <option value="true">YES</option>
                                                <option value="false">NO</option>
                                            </select>
                                            <span class="error errordealwhatsnotification" style="display: none;">Please choose
                                               WhatsApp Notification type</span>
                                        </div>
                                    </div>


                                         <div class="col-md-3 emaildealNotification">
                                        <label for="deallunch" class="col-2 col-form-label"> Email Notification</label>
                                        <div class="input-group">
                                            <select class="form-control " name="dealnotification" data validation=""
                                                id="dealemailnotification">
                                                <option value="">-- Choose  Deal Notification</option>
                                                <option value="true">YES</option>
                                                <option value="false">NO</option>
                                            </select>
                                            <span class="error errordealemailnotification" style="display: none;">Please choose
                                               Email Notification type</span>
                                        </div>
                                    </div>



                                </div>

                                <div>
                                    <div class="clear"></div>

                                    <div class="form-row mtop30 tableDivs">
                                        <!-- Row Head -->
                                        <div class="col-md-2 mb-3 cell">
                                            <label for="dealName">Offer No</label>
                                        </div>
                                        <div class="col-md-2 mb-3 cell">
                                            <label for="dealName">Payout Mode</label>
                                        </div>
                                        <div class="col-md-2 mb-3 cell displayHide1">
                                            <label for="dealName">S#OxyFoundingLenders</label>
                                        </div>
                                        <div class="col-md-2 mb-3 cell displayHide1">
                                            <label for="dealName">OxyFoundingLenders</label>
                                        </div>
                                        <div class="col-md-2 mb-3 cell setColumn">
                                            <label for="dealName">Oxy Premium Lenders</label>
                                        </div>
                                        <div class="col-md-2 mb-3 cell setColumn">
                                            <label for="dealName">New Lenders</label>
                                        </div>
                                        <!-- Row Head -->
                                        <div class="row">
                                            <div class="col-md-1 mb-3 cell">
                                                <label for="dealName">#1</label>
                                            </div>
                                            <div class="col-md-3 mb-3 cell">
                                                <label for="dealName">Monthly Interest pay-out</label>
                                            </div>
                                            <div class="col-md-2 mb-3 cell displayHide1">
                                                <input type="text" class="form-control"
                                                    id="satishOxyFoundingMonthlyInterest" placeholder="RoI in %"
                                                    value="" required>
                                            </div>
                                            <div class="col-md-2 mb-3 cell displayHide1">
                                                <input type="text" class="form-control" id="oxyFoundingMonthlyInterest"
                                                    placeholder="RoI in %" value="" required>
                                            </div>
                                            <div class="col-md-2 mb-3 cell setColumn">
                                                <input type="text" class="form-control" id="oxyPremiumMonthlyInterest"
                                                    placeholder="RoI in %" value="" required>
                                            </div>
                                            <div class="col-md-2 mb-3 cell setColumn">
                                                <input type="text" class="form-control" id="newLendersMonthlyInterest"
                                                    placeholder="RoI in %" value="" required>
                                            </div>
                                        </div>
                                        <!-- -->
                                        <div class="row">
                                            <div class="col-md-1 mb-3 cell">
                                                <label for="dealName">#2</label>
                                            </div>
                                            <div class="col-md-3 mb-3 cell">
                                                <label for="dealName">Yearly Interest Pay-out
                                                    (Please Re-Lend My Funds for Next Deal)</label>
                                            </div>
                                            <div class="col-md-2 mb-3 cell displayHide1">
                                                <input type="text" class="form-control"
                                                    id="satishOxyFoundingYearlyInterest" placeholder="RoI in %" value=""
                                                    required>
                                            </div>
                                            <div class="col-md-2 mb-3 cell displayHide1">
                                                <input type="text" class="form-control" id="oxyFoundingYearlyInterest"
                                                    placeholder="RoI in %" value="" required>
                                            </div>
                                            <div class="col-md-2 mb-3 cell setColumn">
                                                <input type="text" class="form-control" id="oxyPremiumYearlyInterest"
                                                    placeholder="RoI in %" value="" required>
                                            </div>
                                            <div class="col-md-2 mb-3 cell setColumn">
                                                <input type="text" class="form-control" id="newLendersYearlyInterest"
                                                    placeholder="RoI in %" value="" required>
                                            </div>
                                        </div>
                                        <!-- -->
                                        <!-- -->
                                        <div class="row">
                                            <div class="col-md-1 mb-3 cell">
                                                <label for="dealName">#3</label>
                                            </div>
                                            <div class="col-md-3 mb-3 cell">
                                                <label for="dealName">End of Deal Interest Pay-out
                                                    (Tenure Would be 1-12 Months)</label>
                                            </div>
                                            <div class="col-md-2 mb-3 cell displayHide1">
                                                <input type="text" class="form-control"
                                                    id="satishOxyFoundingEndOfTheDealInterest" placeholder="RoI in %"
                                                    value="" required>
                                            </div>
                                            <div class="col-md-2 mb-3 cell displayHide1">
                                                <input type="text" class="form-control"
                                                    id="oxyFoundingEndOfTheDealInterest" placeholder="RoI in %" value=""
                                                    required>
                                            </div>
                                            <div class="col-md-2 mb-3 cell setColumn">
                                                <input type="text" class="form-control"
                                                    id="oxyPremiumEndOfTheDealInterest" placeholder="RoI in %" value=""
                                                    required>
                                            </div>
                                            <div class="col-md-2 mb-3 cell setColumn">
                                                <input type="text" class="form-control"
                                                    id="newLendersEndOfTheDealInterest" placeholder="RoI in %" value=""
                                                    required>
                                            </div>
                                        </div>
                                        <!-- -->
                                        <!-- -->
                                        <div class="row">
                                            <div class="col-md-1 mb-3 cell">
                                                <label for="dealName">#4</label>
                                            </div>
                                            <div class="col-md-3 mb-3 cell">
                                                <label for="dealName">Quarterly Interest Pay-out</label>
                                            </div>
                                            <div class="col-md-2 mb-3 cell displayHide1">
                                                <input type="text" class="form-control"
                                                    id="satishOxyFoundingQuartelyInterest" placeholder="RoI in %"
                                                    value="" required>
                                            </div>
                                            <div class="col-md-2 mb-3 cell displayHide1">
                                                <input type="text" class="form-control" id="oxyFoundingQuartelyInterest"
                                                    placeholder="RoI in %" value="" required>
                                            </div>
                                            <div class="col-md-2 mb-3 cell setColumn">
                                                <input type="text" class="form-control" id="oxyPremiumQuartelyInterest"
                                                    placeholder="RoI in %" value="" required>
                                            </div>
                                            <div class="col-md-2 mb-3 cell setColumn">
                                                <input type="text" class="form-control" id="newLendersQuartelyInterest"
                                                    placeholder="RoI in %" value="" required>
                                            </div>
                                        </div>
                                        <!-- -->
                                        <!-- -->
                                        <div class="row">
                                            <div class="col-md-1 mb-3 cell">
                                                <label for="dealName">#5</label>
                                            </div>
                                            <div class="col-md-3 mb-3 cell">
                                                <label for="dealName">Half-Yearly Interest pay-out</label>
                                            </div>
                                            <div class="col-md-2 mb-3 cell displayHide1">
                                                <input type="text" class="form-control"
                                                    id="satishOxyFoundingHalfInterest" placeholder="RoI in %" value=""
                                                    required>
                                            </div>
                                            <div class="col-md-2 mb-3 cell displayHide1">
                                                <input type="text" class="form-control" id="oxyFoundingHalfInterest"
                                                    placeholder="RoI in %" value="" required>
                                            </div>
                                            <div class="col-md-2 mb-3 cell setColumn">
                                                <input type="text" class="form-control" id="oxyPremiumHalfInterest"
                                                    placeholder="RoI in %" value="" required>
                                            </div>
                                            <div class="col-md-2 mb-3 cell setColumn">
                                                <input type="text" class="form-control" id="newLendersHalfInterest"
                                                    placeholder="RoI in %" value="" required>
                                            </div>
                                        </div>
                                        <!-- -->
                                    </div>
                                    <div class="row submissionPart">

                                        <div class="whatsAppMessageBlock col-md-4">

                                            <div>
                                                <div class="pull-left">
                                             <label for="name " class="col-form-label">WhatsAPP Group<em
                                                    class="error">*</em> :</label>      </div>

                                                <div class="pull-right">
                                               <input id="selectAll" type="checkbox" class="selectWhatsApp">
                                              <label for='selectAll'>Select All</label>

                                            
                                                    </div>

                                               </div>

                                               <div class="multipleSelection">
                                                <div class="selectBox" onclick="showCheckboxes()">
                                                    <select>
                                                        <option>Select options</option>
                                                    </select>
                                                    <div class="overSelect"></div>
                                                </div>

                                                <div id="checkBoxes">
                                                    <div id="whatsappgroup">
                                                    </div>

                                                </div>
                                            </div>


                                        </div>

                                        <div class="textArea col-md-4">

                                            <label for="name " class="col-form-label">Text Message<em
                                                    class="error">*</em> :</label>
                                            <textarea class="form-control pull-right" cols="10" rows="5"
                                                placeholder="WhatsApp Text Message" id="whatstextmessage"
                                                style="resize: none!important;"></textarea>

                                        </div>


                                        <div class="sub-btn col-md-4">
                                         <button class="btn btn-success btn-lg pull-right" type="submit"
                                            onclick="createAdeal('<?php echo $dealId?>','<?php echo $loanRequestID?>',false)"
                                            style="margin-top:15px;">Create
                                            Deal</button>


                                        </div>





                                     <!--    <div class="checkboxforWhatspp pull-left  col-md-4">
                                            <p class="text-bold">Enable WhatsAPP Messages For Selected Below Group</p>
                                            <div class="multipleSelection">
                                                <div class="selectBox" onclick="showCheckboxes()">
                                                    <select>
                                                        <option>Select options</option>
                                                    </select>
                                                    <div class="overSelect"></div>
                                                </div>

                                                <div id="checkBoxes">
                                                    <div id="whatsappgroup">
                                                    </div>

                                                </div>
                                            </div>
                                        </div> -->


                                    <!--     <div class="whatsapp col-md-3 pull-left WhatsAppGroups" style="display: none;">
                                            <input id="selectAll" type="checkbox" class="selectWhatsApp">
                                            <label for='selectAll'>Select All WhatsApp Groups</label>
                                        </div> -->
<!-- 
                                        <div class="textboxformessage pull-left  col-md-4">
                                            <label for="name " class="col-sm-4 col-form-label ">Text Message<em
                                                    class="error">*</em> :</label>
                                            <textarea class="form-control" cols="10" rows="5"
                                                placeholder="WhatsApp Text Message" id="whatstextmessage"
                                                style="resize: none!important;"></textarea>
                                        </div> -->

                                     <!--    <button class="btn btn-success btn-lg pull-right" type="submit"
                                            onclick="createAdeal('<?php echo $dealId?>','<?php echo $loanRequestID?>',false)"
                                            style="margin-top:15px;">Create
                                            Deal</button></br></br> -->

                                    </div>
                                </div>
                            </div>
    </section>
</div>


<div class="modal modal-success fade" id="showdealSuccessMessage">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="#"> <strong>Well done!</strong> Deal created successfully.</p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"
                        id="highest">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-warning fade" id="showdealDealWarmimg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="#"> <strong>Oops!</strong> Deal name already present in database.</p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"
                        id="highest">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-warning fade" id="showborrowerloanderrormessage">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

                <p id="#"> <strong>Oops!</strong><span class="errormessage">Deal Amount is not matching with offersent
                        amount please check</span> </p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"
                        id="highest">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal  fade" id="isTestDealCreation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="#">Are you sure you want to create a test deal? </p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-sucess btn-sm" id="testDealCheck" onclick="">Create</button>

                    <button type="button" class="btn btn-info btn-sm" data-dismiss="modal" id="highest">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal modal-warning fade" id="showerrorfundsStartDate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><strong>Oops!</strong></h4>
            </div>
            <div class="modal-body">
                <p id="#"><span class="fundsStartDate">Funds start date is not validate please check</span> </p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"
                        id="highest">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>


<style type="text/css">
.alert-success {
    background-color: #dff0d8 !important;
    border-color: #d0e9c6 !important;
    color: #3c763d !important;
    margin-top: 15px;
}

.multipleSelection {
    width: 300px;

}

.selectBox {
    position: relative;

}

.selectBox select {
    width: 100%;
    font-weight: bold;
}

.overSelect {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
}

#checkBoxes {
    display: none;
    border: 1px #8DF5E4 solid;
}

#checkBoxes label {
    display: block;
}
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/selectize.default.css?oxyloans=<?php echo time(); ?>">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dd.css?oxyloans=<?php echo time(); ?>">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css?oxyloans=<?php echo time(); ?>">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css?oxyloans=<?php echo time(); ?>">

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="<?php echo base_url(); ?>assets/js/animation.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/selectize.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dd.js?oxyloans=<?php echo time(); ?>"></script>
<!-- iCheck -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
getwhatsappGroupsnames();
$("#fundsAcceptanceStartDate, #fundsAcceptanceEndDate,#loanActiveDate,#dealLunchDate").datepicker({
    dateFormat: "dd/mm/yy",
    changeMonth: true,
    changeYear: true,
    startDate: new Date(),
});
</script>
<script>
var show = true;

function showCheckboxes() {
    $(".WhatsAppGroups").show();
    var checkboxes =
        document.getElementById("checkBoxes");

    if (show) {
        checkboxes.style.display = "block";
        show = false;
    } else {
        checkboxes.style.display = "none";
        show = true;
    }
}
</script>
<script>
$('#selectAll').on('click', function() {
    $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $("#anyTimeWithRequest").change(function() {
        var withdrawRequest = $("#anyTimeWithRequest").val();
        if (withdrawRequest == "YES") {
            $(".withdrawAmountRequest").show();
        }
        if (withdrawRequest == "NO") {
            $(".withdrawAmountRequest").hide();
        }
    });

    $("#dealLunchType").change(function() {
        var dealLunchType = $("#dealLunchType").val();
        if (dealLunchType == "FUTURE") {
            $(".dealLunchDate,.dealLunchTime").show();
        } else {
            $(".dealLunchDate,.dealLunchTime").hide();
        }
    });


    $("#lifetimewaiver").change(function() {
        var dealwaiveoff = $("#lifetimewaiver").val();
        if (dealwaiveoff == "true") {
            $(".dealwaiverAmount").show();
        } else {
            $(".dealwaiverAmount").hide();
        }
    });

});
</script>

<script>
$(document).ready(function() {
    $("#dealtype").change(function() {
        var dealtype = $("#dealtype").val();
        var particationLimit = $("#participationLimit").val();

        if (dealtype == "SALARIED" && particationLimit > 50000) {
            $(".participationLimiterror").show();
        } else if (dealtype == "SELFEMPLOYED" && particationLimit > 50000) {
            $(".participationLimiterror").show();
        } else if (dealtype == "NORMAL") {
            $(".dealTypeSub").show();
        } else {
            $(".participationLimiterror").hide();
            $(".dealTypeSub").hide();
        }

    });
});
</script>

<script type="text/javascript">
fetchborrowerdetails('<?php echo $loanRequestID?>');

if (<?php echo $dealId?> == '0') {
    $(".displayHide1").hide();
    $(".setColumn").removeClass("col-md-2").addClass("col-md-4");
    // $(".setColumn").addClass("col-md-4");
}


$(document).ready(function() {
    $('#dealLunchTimePicker').timepicker({
        timeFormat: 'HH:mm',
        startTime: '10:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });
});
</script>

<!-- main-content -->
<?php include 'admin_footer.php';?>
