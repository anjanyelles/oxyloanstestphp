<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <div class="pull-left">
            <small style="display: none">
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </small>
            <p><br />Total Requested Amount : <span class="requestedAmount"></span></p>

            <input type="hidden" name="referral-borrower" id="borrowerRefLinkU">
            <input type="hidden" name="referral-lender" id="refLinkU">
        </div>

        <div class="pull-right">

            <a href="#" class="fl btnsMobilePur">
                <button type="button" class="btn  btn-info pull-right marR15 btn-ref-borrower autoimp"
                    onclick="copyBorrowerrefLink('#borrowerRefLinkU');" data-toggle="tooltip" title="Share this link"
                    data-placement="left"> <b>Invite a Borrower</b> <i class="fa fa-clipboard fa_copyRefLink"
                        aria-hidden="true"></i>
                </button>
            </a>


            <a href="#" class="fl btnsMobilePur">
                <button type="button" class="btn  btn-warning pull-right marR15 btn-ref autoimp"
                    onclick="copyrefLink('#refLinkU');" data-toggle="tooltip" title="Share this link"
                    data-placement="left"> <b>Invite a Lender <i class="fa fa-user-o fa_copyRefLink"
                            aria-hidden="true"></i></b>
                </button>
            </a>


            <a href="borrowerraisealoanrequest" style="display: none;">
                <button type="button" class="btn btn-success pull-right" id="hideloanrequest"><i
                        class="fa fa-angle-double-right"></i> <b class="btnNameofIncreaseLoan">Submit Loan
                        Application</b>
                </button>
            </a>


            <a href="borrowerNewLoanRequests" class="borrowerUserType btnsMobilePur">
                <button type="button" class="btn btn-success pull-right shownewLoan"><i
                        class="fa fa-angle-double-right"></i> <b>New loan request</b>
                </button>
            </a>


            <a href="borroweragreedloans" id="pay_only_Interest_btn" class="btnsMobilePur">
                <button type="button" class="btn btn-primary pull-right marR15"><i
                        class="fa fa-angle-double-right"></i><b>Agreed Loans</b>
                </button>
            </a>
        </div>

        <!-- Stps-->
        <div class="clear"></div>

        <div class="row statusProcessRow">
            <div class="col-xs-12">
                <form id="msform">
                    <!-- progressbar -->
                    <ul id="progressbar" class="active">
                        <li id="step1">Registration</li>
                        <li id="step2">Profile Completion</li>
                        <li id="step3">Loan Offer by Admin (Accept/Reject)</li>
                        <li id="step4">Responses to his Request</li>
                        <li id="step5">Waiting for e-Sign</li>
                        <li id="step6">Waiting for eNach</li>
                        <li id="step7">Disbursement</li>
                    </ul>
                </form>
            </div>
        </div>
        <!-- Speps ends -->

    </section>
    <div class="cls"></div>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-lg-3 col-xs-6">

                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3 class="commitmentAmount">0</h3>
                        <p>
                            <!-- Offer Available  : <span class= "outstandingAmount"></span>-->
                            &nbsp;
                        </p>


                    </div>
                    <div class="icon">
                        <i class="ion ion-android-apps"></i>
                    </div>

                    <!--  <a href="#" onclick="knowMoreApps()" class="small-box-footer knowMoreApps">No.of Applications (<span class="noOfApps" ></span>)</a> -->
                    <a href="viewMyloanApplications" class="small-box-footer knowMoreApps">No.of Applications (<span
                            class="noOfApps"></span>)</a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3 class="noOfActiveApps"></h3>


                        <p><b>INR</b> <span class="outstandingAmount"></span></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="javascript:void(0)" class="small-box-footer">No.of Active Applications</a>
                </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3 class="noOfClosedLoans"></h3>
                        <p class="closedLoansValue">0</p>

                    </div>
                    <div class="icon">
                        <i class="ion ion-person-stalker"></i>
                    </div>
                    <a href="#" class="small-box-footer">Closed Applications</a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3 class="noOfDisbursedLoans"></h3>

                        <p class="noOfDisbursedLoansValue">No.of Disbursed Loans</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">No.of Disbursed Applications</a>
                </div>
            </div>
            <!-- ./col 
         <a href="javascript:void(0)" class="viewmorestats pull-right">View More Stats</a>
        <a href="javascript:void(0)" class="hideStats pull-right" style="display: none;">Show Less Stats</a>
      </div>
     /.row -->
    </section>
    <!-- /.content -->

    <div class="row moreStatsDisplay">


        <!-- CARD -->
        <div class="col-lg-3 col-12">
            <div class="card amtdis">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa success font-large-2 float-left">&#8594;</i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="noOfLoanRequests">64.89 %</h3>
                                <span>No.Of Loan requests</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CARD ENDS -->


        <!-- CARD -->
        <div class="col-lg-3 col-12">
            <div class="card amtdis">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-hand-o-right success font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="noofferssentValue"></h3>
                                <span>Requests in process</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CARD ENDS -->

        <!-- CARD -->
        <div class="col-lg-3 col-12">
            <div class="card intPid">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-arrow-up success font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="interestPaid">64.89 %</h3>
                                <span>Interest Paid</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CARD ENDS -->

        <!-- CARD -->
        <div class="col-lg-3 col-12">
            <div class="card failemis">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-bell success font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="noOfFailedEmis">64.89 %</h3>
                                <span>No. Of EMIs failed</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CARD ENDS -->



        <!-- CARD -->
        <div class="col-lg-3 col-12">
            <div class="card amtdis">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa success font-large-2 float-left">&#8592;</i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="noOfLoanResponses">64.89 %</h3>
                                <span>No.Of Loan Responses</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CARD ENDS -->




        <!-- CARD -->
        <div class="col-lg-3 col-12">
            <div class="card failemis">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-dot-circle-o success font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="principalReceived"></h3>
                                <span>Principal Paid</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CARD ENDS -->

        <!-- CARD -->
        <div class="col-lg-3 col-12">
            <div class="card amtdisb">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-money success font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="totalTransactionFee">64.89 %</h3>
                                <span>Fee Paid</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CARD ENDS -->

        <!-- CARD -->
        <div class="col-lg-3 col-12">
            <div class="card oxysc1">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-dashboard success font-large-2 float-left"></i>

                            </div>
                            <div class="media-body text-right">
                                <h3 class="oxyscore"></h3>
                                <span>OxyScore</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CARD ENDS -->
    </div>


    <div class="cls"></div>
    <section class="content-header" style="display:none;">
        <h1>
            Latest lending commitments
        </h1>
        <div class="row customFormQ">
            <!-- left column -->
            <div class="col-md-12">
                <div class="cls"></div>
                <div class="pull-right">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashBoardPagination">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="cls"></div>
                <div class="loadLendersListings" id="loadLendersListings">

                </div>
            </div>

            <!-- box 1 -->


            <script id="loanListiongsTpl" type="text/template">
                {{#data}}
        <div class="col-md-4">
          <div class="box box-widget widget-user">
            <div class="widget-user-header bg-green">
              <h3 class="widget-user-username">{{user.firstName}} {{user.lastName}}</h3>
              <h5 class="widget-user-desc">LR{{userDisplayId}}</h5>
              <h5 class="widget-user-desc"> {{loanRequest}}</h5>
              <h5 class="widget-user-desc">Duration: {{duration}}

                       <span style='display:none' class="loanTypeisI loanTypeis{{durationType}}"> M</span>

                          <span style='display:none' class="loanTypeisDays loanTypeis{{durationType}}"> Days</span>

              </h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="{{user.profilePicUrl}}" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{loanRequestAmount}}</h5>
                    <span class="description-text">Offered</span>
                  </div>
                </div>
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{rateOfInterest}}%</h5>
                    <span class="description-text">Interest</span>
                  </div>
                </div>
               
              </div>
              <div class="cls"></div>
              <div class="box-footer">
                 <div>
                   <progress value="{{loanDisbursedAmount}}" max="{{loanRequestAmount}}" style="width: 100%;"></progress>
                 </div>

                 <div class="clear"></div>
                 <div>
                   Amount available on:- {{expectedDate}}
                 </div>
                 <div class="pull-left padt20" style="display: none;">
                  <a href="javascript:void(0)" onclick="participatedlenders({{loanRequestId}})"><button type="submit" class="btn btn-success">Participated Lenders</button></a>
                </div>										
				<div class="pull-right padt20"> 
                 <!-- <a onclick="checkOutstandingAmount({{loanRequestId}},{{outStandingAmount}})">-->
                   <a href="borrowerviewloanoffer?loanid={{loanRequestId}}&pageNo=3&requestorderNo=1">
                  <button type="submit" class="btn btn-primary">Application</button></a>
                </div>               				
              </div>
            </div>
          </div>
        </div>
{{/data}}
</script>




        </div>
</div>
</section>
</div>


<div class="modal modal-info fade" id="modal-checkOutstandingAmount">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p>Reached maximum limit. Please<a href="borrowerraisealoanrequest" style="color: red;"> click here
                    </a>to increase loan amount.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal modal-info fade" id="modal-checkmaxAmount">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p>this lender reached his maximum amount to lend . Please select another lender.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<div class="modal modal-info fade" id="modal-Kyc-NotUpdated-Borrower">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Please Upload your Kyc documents.</h4>
            </div>
            <div class="modal-body">
                <p>
                    You're one step away to submit your lending application, Please Upload your Kyc documents. Pan,One
                    address proof are mandatory.

                </p>
            </div>
            <div class="modal-footer">
                <a href="borrower_profilePage?userScore=0" class="personalProfileLink">
                    <button type="button" class="btn btn-outline pull-left">Update</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script id="loadApplicationTpl" type="text/template">
    {{#data}}
    <tr>
        <td>{{applicationId}}</td>
        <td>{{loanreRequestAmount}}</td>
        <td>{{loanOfferAmount}}</td>
        <td>{{rateOfInterest}}</td>
        <td>{{offerSentDate}}</td>
        <td>{{offerAccpetedDate}}</td>
        <td>{{offerStatus}}</td>  
    </tr>
  {{/data}}
</script>

<div class="modal modal fade" id="displayApplicationInfo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Your Application info</h4>
            </div>
            <div class="modal-body">
                <table border="1" width="100%"
                    style="font-family: arial, sans-serif; border-collapse: collapse;width: 100%; background:#fff;">
                    <tr style="background: #999999">
                        <th>App ID</th>
                        <th>Requested</th>
                        <th>Offered</th>
                        <th>RoI</th>
                        <th>Offer Sent Date</th>
                        <th>Offer Accpeted Date</th>
                        <th>Offer Status</th>
                    </tr>
                    <tbody id="loadApplicationData">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script type="text/javascript">
window.onload=getUserDetails();
window.onload=loadborrowerDashboardData();
window.onload=loadLendersListings();

// window.onload = loadLendersListings;
//Displaying Lender info to the Borrowers
</script>
<style type="text/css">
span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisDays.loanTypeisDays {
    display: inline !important;
}

span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisI.loanTypeisI,
span.loanTypeisI.loanTypeis {
    display: inline !important;
}

span.loanTypeisI.loanTypeisDays {
    display: none !important;
}

span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisDays.loanTypeis {
    display: none !important;
}

span.loanTypeisDays.loanTypeisMonths {
    display: none !important;
}
</style>
<!-- /.content-wrapper -->
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>


<?php include 'footer.php';?>