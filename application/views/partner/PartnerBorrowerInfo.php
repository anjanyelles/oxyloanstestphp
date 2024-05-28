 <?php include 'partner_header.php';?>
 <?php include 'partner_sidebar.php';?>
 <?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$userID =isset($_GET['userid']) ? $_GET['userid'] : 0;
?>
 <div class="content-wrapper">
     <section class="content-header">
         <h1 style="margin-left: 20px;">
             View Borrower Info
         </h1>
     </section><br />
     <section class="content">
         <div class="container">
             <div class="row">

                 <div class="col-md-12">
                     <div class="alert user_not_kyc_profile" role="alert"
                         style="background-color: indianred; color: white; font-size: 15px; font-weight: 600; display: none;">
                         <span><strong>Oops! </strong><span id="error-message">The user did not complete the profile
                                 section. (<span class="bank"></span>) </span></span>
                     </div>


                     <!-- Nav tabs -->
                     <div class="card">
                         <ul class="nav nav-tabs" role="tablist">
                             <li role="tab" class="active"><a href="#home" aria-controls="home" role="tab"
                                     data-toggle="tab"><i class="fa fa-user"></i> <span>User Info</a></li>
                             <li role="tab"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i
                                         class="fa fa-file" aria-hidden="true"></i> <span> Documents</span></a></li>
                             <li role="tab"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i
                                         class="fa fa-money" aria-hidden="true"></i> <span>Loan Info</a></li>

                             <li role="tab"><a href="#settings" aria-controls="messages" role="tab" data-toggle="tab"><i
                                         class="fa fa-university" aria-hidden="true"></i> <span>Bank Details</a></li>

                             <li role="tab"><a href="#extra" aria-controls="messages" role="tab" data-toggle="tab"><i
                                         class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>Take Action</a>
                             </li>

                             <li role="tab"><a href="#emi" aria-controls="messages" role="tab" data-toggle="tab"><i
                                         class="fa fa-money" aria-hidden="true"></i> <span>Amount Info</a></li>

                         </ul>

                         <!-- Tab panes -->
                         <div class="tab-content">
                             <div class="tab-pane active" id="home">
                                 <div class="" style="width:100%;">
                                     <ul class="list-group list-group-flush">
                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 Name

                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="pborrowerName">livin mandeva</span>
                                             </div>

                                         </li>
                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 User Id

                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="pborrowerid">livin mandeva</span>
                                             </div>

                                         </li>
                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 Mobile
                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="pborrowemobile">7569084614</span>
                                             </div>

                                         </li>

                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 UTM SOURCE
                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="pborrowerutm">OXY_PFINOO</span>
                                             </div>

                                         </li>
                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 PAN NUMBER
                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="pborrowerPAN">YUYUI0909Y</span>
                                             </div>

                                         </li>
                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 ADDRESS
                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="pborrowerADDRESS">HYD</span>
                                             </div>

                                         </li>
                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 DOB
                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="pborrowerdob">20/04/1997</span>
                                             </div>

                                         </li>
                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 REFERRED BY
                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="pborrowerreferrby"></span>
                                             </div>

                                         </li>
                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 Email
                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="pborroweremail">livinmandeva</span>
                                             </div>

                                         </li>
                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 CIF NO
                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="pborrowecifno">livinmandeva</span>
                                             </div>

                                         </li>
                                     </ul>
                                 </div>


                             </div>
                             <div class="tab-pane" id="profile">

                                 <div class="" style="width:100%;">


                                     <ul class="list-group list-group-flush">
                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 PAN

                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <a href="javascript:void(0)" class="relbtn viewAADHAR showAADHAR"
                                                     onclick="viewDoc('<?php echo$userID?>','PAN')">PAN</a>
                                             </div>

                                         </li>
                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 AADHAR CARD

                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">

                                                 <a href="javascript:void(0)" class="relbtn viewAADHAR showAADHAR"
                                                     onclick="viewDoc('<?php echo$userID?>','AADHAR')">AADHAR</a>
                                             </div>

                                         </li>
                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 PAY SLIPS
                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <a href="javascript:void(0)" class="relbtn viewAADHAR showAADHAR"
                                                     onclick="viewDoc('<?php echo$userID?>','PAYSLIPS')">PAYSLIPS</a>
                                             </div>

                                         </li>

                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 CHEQUE LEAF
                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <a href="javascript:void(0)" class="relbtn viewAADHAR showAADHAR"
                                                     onclick="viewDoc('<?php echo$userID?>','CHEQUELEAF')">CHEQUELEAF</a>
                                             </div>

                                         </li>
                                     </ul>
                                 </div>

                             </div>
                             <div class="tab-pane" id="messages">


                                 <div class="" style="width:100%;">
                                     <ul class="list-group list-group-flush">

                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 LOAN REQUEST AMOUNT
                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="borrowerLoanamount">2000</span>
                                             </div>

                                         </li>

                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 ROI
                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="borrowerLoanroi">2000 </span> % Per Month
                                             </div>

                                         </li>
                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 DURATION
                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="borrowerLoanduration">2000</span>
                                             </div>

                                         </li>

                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 DURATION TYPE
                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="borrowerdurationType">PI</span>
                                             </div>

                                         </li>


                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 RE-PAYMENT Method
                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="borrowerLoanrepay">PI</span>
                                             </div>

                                         </li>


                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 LOAN EXPECTED DATE
                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="borrowerLoanExecpted">PI</span>
                                             </div>

                                         </li>

                                     </ul>

                                 </div>


                             </div>
                             <div class="tab-pane" id="settings">


                                 <div class="" style="width:100%;">
                                     <ul class="list-group list-group-flush">

                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 Name as per Bank
                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="bankasname"></span>
                                             </div>

                                         </li>

                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 ACCOUNT NO

                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="bankasaccount"></span>
                                             </div>

                                         </li>
                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 IFSC

                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="bankifsc"></span>
                                             </div>

                                         </li>
                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 BRANCH
                                             </div>
                                             <div class="col-md-6 pull-right text-bold center-text text_Updates">
                                                 <span class="bankbranch"></span>
                                             </div>

                                         </li>




                                     </ul>
                                 </div>

                             </div>
                             <div class="tab-pane" id="extra">

                                 <div class="" style="width:100%;">
                                     <ul class="list-group list-group-flush">

                                         <li class="list-group-item">

                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 Reject Loan Request
                                             </div>
                                             <div class="col-md-6 pull-right text-bold">
                                                 <button class="btn btn-xs btn-warning loanstatus"
                                                     onclick="partnerloanapprovals('PartnerReject','<?php echo$userID?>')">Reject</button></br>
                                             </div>

                                         </li>


                                         <li class="list-group-item">
                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 Short List
                                             </div>
                                             <div class="col-md-6 pull-right text-bold">
                                                 <button class="btn btn-xs btn-primary loanstatus"
                                                     onclick="partnerloanapprovals('PartnerShortList','<?php echo$userID?>')">Short
                                                     List</button>
                                             </div>

                                         </li>

                                         <li class="list-group-item">
                                             <div class="col-md-6 pull-left text-bold center-text">
                                                 Edit Loan Request
                                             </div>
                                             <div class="col-md-6 pull-right text-bold">
                                                 <button class="btn btn-xs btn-default loanstatus"
                                                     onclick="partnerloaneditrequest();"
                                                     style="background-color: black; color: white;">Edit &
                                                     approve</button>
                                             </div>

                                         </li>


                                     </ul>
                                 </div>


                             </div>





                             <div class="tab-pane" id="emi">
                                 <div class="" style="width:100%;">

                                     <div class="col-md-12">
                                         <div class="alert feealertErrormessages" role="alert"
                                             style="background-color: indianred; color: white; font-size: 15px; font-weight: 600; display: none;">
                                             <span><strong>Oops! </strong><span id="error-message"></span></span>
                                         </div>
                                         <div class="box"
                                             style="border-top:none!important; box-shadow: none!important;">
                                             <div class="box-body editlendergroup">
                                                 <table id="example2" class="table table-bordered table-hover">
                                                     <thead>
                                                         <tr id="tabletr" class="partnerTable">

                                                             <th>Loan Info</th>
                                                             <th>ROI Info</th>
                                                             <th>Fee Info</th>
                                                             <th>Disbursment</th>

                                                         </tr>
                                                     </thead>
                                                     <tbody id="loadPartnerLoanInfofee">
                                                         <tr id="displayLoanNoRecords" class="displayRequests"
                                                             style="display: none;">
                                                             <td colspan="12">No Data found!</td>
                                                         </tr>
                                                     </tbody>
                                                     </tfoot>
                                                 </table>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="modal modal-primary fade" id="modal-approveLoanconfirmastion">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span></button>
                             <h4 class="modal-title">Confirmation</h4>
                         </div>
                         <div class="modal-body">
                             <div class="confirmastion">
                                 Do you want to approve his loan request?
                             </div>
                         </div>
                         <div class="modal-footer">
                             <div align="right">

                                 <button type="button" class="btn btn-default btn-sm"
                                     onclick="partnerloanapprovals('PartnerApproved','<?php echo$userID?>')">Approve</button>
                                 <button type="button" class="btn btn-default btn-sm"
                                     onclick="partnerloanapprovals('PartnerReject','<?php echo$userID?>')">Reject</button>
                                 <button type="button" class="btn btn-default btn-sm"
                                     onclick="partnerloanapprovals('PartnerShortList','<?php echo$userID?>')">ShortList</button>

                                 <button type="button" class="btn btn-default btn-sm"
                                     data-dismiss="modal">Close</button>
                             </div>
                         </div>
                     </div>
                     <!-- /.modal-content -->
                 </div>
                 <!-- /.modal-dialog -->
             </div>
             <div class="modal modal-warning fade" id="modal-showerrormessagesfotApproveingUser">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span></button>
                             <h4 class="modal-title">Oops</h4>
                         </div>
                         <div class="modal-body">
                             <span class="errormessage"></span>
                         </div>
                         <div class="modal-footer">
                             <div align="right">
                                 <button type="button" class="btn btn-default btn-sm"
                                     data-dismiss="modal">Close</button>
                             </div>
                         </div>
                     </div>
                     <!-- /.modal-content -->
                 </div>
                 <!-- /.modal-dialog -->
             </div>

             <div class="modal  fade" id="modal-Sendofferamount">
                 <div class="modal-dialog">
                     <div class="modal-content offer_popup">
                         <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span></button>
                             <h4 class="modal-title">ASKED LOAN INFORMATION</h4>
                         </div>
                         <div class="offer_popup_cont clearfix">

                             <div class="offer_popup_field clearfix">
                                 <label>Loan Amount<em class="mandatory">*</em></label>
                                 <div class="fld-block">
                                     <input type="text" class="loanAmount" id="loanOfferAmount"
                                         placeholder="Loan Amount">
                                     <span class="error loanAmountError" style="display: none;">Please enter loan
                                         amount.</span>
                                     <div class="clear"></div>
                                 </div>
                                 <div class="clear"></div>
                             </div>


                             <div class="offer_popup_field clearfix">
                                 <label>Duration<em class="mandatory">*</em></label>
                                 <div class="fld-block">
                                     <select class="form-control " id="tenure">
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
                                     <span class="error tenureError" style="display: none;">Please select Tenure.</span>

                                     <div class="clear"></div>
                                 </div>
                                 <div class="clear"></div>
                             </div>


                             <div class="offer_popup_field clearfix">
                                 <label>Duration Type:</label>
                                 <div class="fld-block">
                                     <select class="form-control percentage" id="durationtype">
                                         <option value="">-- Choose Duration Type--</option>
                                         <option value="Months">Months</option>
                                         <option value="Days">Days</option>

                                     </select>

                                     <div class="clear"></div>
                                     <span class="error duratrionError" style="display: none;">Please choose Duration
                                         Type.</span>
                                 </div>
                                 <div class="clear"></div>
                             </div>

                             <div class="offer_popup_field clearfix">
                                 <label>ROI To Borrower: </br> (Per month)</label>
                                 <div class="fld-block">
                                     <select class="form-control percentage" id="rateOfInterestToBorrower">
                                         <option value="">-- Rate Of Interest To Borrower Per Month --</option>
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
                                     </select>

                                     <div class="clear"></div>

                                     <span class="error rateOfInterestToBorrower" style="display: none;">Please choose
                                         roi of borrower.</span>
                                 </div>


                                 <div class="clear"></div>


                             </div>


                             <div class="offer_popup_field clearfix">
                                 <label>ROI To Lender: </br> (Per Month)</label>
                                 <div class="fld-block">
                                     <select class="form-control percentage" id="rateOfInterestToLender">
                                         <option value="">-- Rate Of Interest To Lender Per Month --</option>
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
                                     </select>

                                     <div class="clear"></div>

                                     <span class="error rateOfInterestToLender" style="display: none;">Please choose roi
                                         of Lender.</span>
                                 </div>

                                 <div class="clear"></div>
                             </div>



                             <div class="offer_popup_field clearfix">
                                 <label>Repayment type of Borrower:</label>
                                 <div class="fld-block">
                                     <select class="form-control percentage" id="repaymentTypeToBorrower">
                                         <!--  <option value="">-- repayment Type To Borrower --</option> -->
                                         <option value="I">Interest Only</option>
                                         <option value="PI">Principal + Interest</option>

                                     </select>

                                     <div class="clear"></div>
                                     <span class="error repaymentTypeToBorrower" style="display: none;">Please choose
                                         repayment type of borrower.</span>
                                 </div>

                                 <div class="clear"></div>
                             </div>


                             <div class="offer_popup_field clearfix">
                                 <label>Repayment type of Lender:</label>
                                 <div class="fld-block">
                                     <select class="form-control percentage" id="repaymentTypeToLender">
                                         <!--    <option value="">-- Repayment Type To Lender --</option> -->
                                         <option value="I">Interest Only</option>
                                         <option value="PI">Principal + Interest</option>

                                     </select>

                                     <div class="clear"></div>
                                     <span class="error repaymentTypeToLender" style="display: none;">Please choose
                                         repayment type of Lender.</span>
                                 </div>

                                 <div class="clear"></div>
                             </div>

                             <div class="offer_popup_field clearfix">
                                 <label style="width:35%!important">Borrower Fee : <input type="checkbox"
                                         name="borrowerfeeStatus" id="checkBoxPartner"
                                         style="position: absolute;left: 22%;top: 82.5%;width: 20px;font-size: 20px; height:20px"
                                         onclick="onClickHandler(this)"></label>

                                 <div class="fld-block" style="display:none;" id="borrowerfeetoPartner">

                                     <small style="color:red;">This fee is in addition to the partner and
                                         oxyloans.</small>
                                     <select class="form-control percentagetopartner">

                                         <option value="">Choose fee percentage to partner</option>
                                         <option value="1">1</option>
                                         <option value="2">2</option>
                                         <option value="2.25">2.25</option>
                                         <option value="2.5">2.5</option>
                                         <option value="3">3</option>
                                         <option value="3.25">3.25</option>
                                         <option value="3.5">3.5</option>
                                         <option value="4">4</option>
                                         <option value="4.25">4.25</option>
                                         <option value="4.5">4.5</option>
                                         <option value="5">5</option>
                                         <option value="5.25">5.25</option>
                                         <option value="5.5">5.5</option>
                                         <option value="6">6</option>
                                         <option value="6.25">6.25</option>
                                         <option value="6.5">6.5</option>
                                         <option value="7">7</option>
                                         <option value="7.25">7.25</option>
                                         <option value="7.5">7.5</option>
                                         <option value="8">8</option>
                                         <option value="8.25">8.25</option>
                                         <option value="8.5">8.5</option>
                                         <option value="9">9</option>
                                         <option value="10">10</option>
                                         <option value="11">11</option>
                                         <option value="12">12</option>
                                     </select>

                                     <div class="clear"></div>
                                     <span class="error borrowerfeetoPartnerError" style="display: none;">Please choose
                                         borrowr fee to partner.</span>
                                 </div>

                                 <div class="clear"></div>
                             </div>

                             <div class="modal-footer">
                                 <div align="right">
                                     <button type="button" class="btn btn-primary btn-sm sendLoanoffer" data-reqid=''
                                         data-clickedid="" onclick="sendUserOffer('<?php echo$userID?>');">Send
                                         Offer</button>
                                     <button type="button" class="btn btn-default btn-sm"
                                         data-dismiss="modal">Close</button>
                                 </div>
                             </div>
                         </div>
                         <!-- /.modal-content -->
                     </div>
                     <!-- /.modal-dialog -->
                 </div>

                 <script type="text/javascript">
                 window.onload = loadBorrowerApplications("<?php echo $userID?>");
                 window.onload = knowEmaiInfoBorrower("<?php echo $userID?>");
                 window.onload = checkuserTypeBeforeLoad();
                 $("#modal-checkEsign").modal("hide");
                 $("#modal-checkEnach").modal("hide");
                 </script>

                 <script>
                 function onClickHandler(e) {
                     if (e.checked) {
                         $("#borrowerfeetoPartner").show();
                         $('#checkBoxPartner').attr("style",
                             "position: absolute;left: 22%;top: 79%;width: 20px;font-size: 20px; height:20px");
                     } else {
                         $("#borrowerfeetoPartner").hide();
                     }


                 }
                 </script>


                 <script id="displayPartnerloanInfofee" type="text/template">
                     {{#data}}
<tr>
  
  <td> Loan Amount : {{loanAmount }} </br>
     Duration: {{duration}} M</br>
     Net Disbursment :{{netDisbursment}}</br>
     GST of Oxyloans : {{gstToOxyloans}}  % </br>
     GSt amount to Oxyloans : {{proceessingFeeWithGstToOxyloans}}


  </td>

  <td>
     RoI to Borrower : {{rateOfIntegerToBorrower }} % </br>
     RoI to Lender: {{rateOfIntegerToLender}} %</br>
     Borrower Repayment :{{repaymentToBorrower}}</br>
     Lender Repayment : {{repaymentToLender}}  

  </td>
   <td>

      Processing Fee : {{totalProcessingFee }} </br>
     <!-- Fee in Percentaga: {{processFeePercentaga}}</br>
     Proceessing Fee With Gst :{{proceessingFeeWithGst}}</br> -->
      GST of Partner : {{gstToPartner}}  %</br>
      GST amount to Partner : {{proceessingFeeWithGstToPartner}}
      
  </td>
   <td>

      Principal Amount : {{principalAmount }} </br>
      Payble: {{payble}}</br>
      Net Disbursment :{{netDisbursment}}</br>
      Interest Amount : {{interestAmount}}  
  </td>
   
</tr>
{{/data}}
</script>


                 <style type="text/css">
                 .nav-tabs {
                     border-bottom: 2px solid #DDD;
                 }

                 .nav-tabs>li.active>a,
                 .nav-tabs>li.active>a:focus,
                 .nav-tabs>li.active>a:hover {
                     border-width: 0;
                 }

                 .nav-tabs>li>a {
                     border: none;
                     color: #ffffff;
                     background: #1e5959;
                 }

                 .nav-tabs>li.active>a,
                 .nav-tabs>li>a:hover {
                     border: none;
                     color: #1E5959 !important;
                     background: #fff;
                 }

                 .nav-tabs>li>a::after {
                     content: "";
                     background: #5a4080;
                     height: 2px;
                     position: absolute;
                     width: 100%;
                     left: 0px;
                     bottom: -1px;
                     transition: all 250ms ease 0s;
                     transform: scale(0);
                 }

                 .nav-tabs>li.active>a::after,
                 .nav-tabs>li:hover>a::after {
                     transform: scale(1);
                 }

                 .tab-nav>li>a::after {
                     background: #1E5959 none repeat scroll 0% 0%;
                     color: #fff;
                 }

                 .tab-pane {
                     padding: 30px 0;
                 }

                 .tab-content {
                     padding: 10px
                 }

                 .nav-tabs>li {
                     width: 15%;
                     text-align: center;
                 }

                 .card {
                     background: #FFF none repeat scroll 0% 0%;
                     box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3);
                     margin-bottom: 30px;
                     min-height: 450px;
                 }

                 i {
                     margin-left: 3px;
                 }

                 .list-group-flush .list-group-item {
                     padding-bottom: 30px;
                     background-color: #F5F5F5;
                 }

                 @media all and (max-width:724px) {
                     .nav-tabs>li>a>span {
                         display: none;
                     }

                     .nav-tabs>li>a {
                         padding: 5px 5px;
                     }
                 }

                 @media (min-width: 1200px) {
                     .container {
                         width: 1030px !important;
                     }

                     .text_Updates {
                         color: #3c8dbc;
                     }

                 }
                 </style>
                 <script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
                 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                 <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                 <?php include 'partner_footer.php';?>