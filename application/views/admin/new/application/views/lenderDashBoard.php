<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            New &#x3B2; Dashboard Showing All Transactions
        </h1>
        <div class="pull-left">
            <small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </small>
        </div>
        <br /><br />
        <div class="pull-right mobileDiv_6">
            <div class="col-md-12 mrt15">
                <a href="lenderresponsestoMyrequests?appNumber=0" class="fl" style="display:none;">
                    <button type="button" class="btn btn-outline graOutLine pull-right marR15"> <b>Responses</b> <i
                            class="fa fa-bell alertnoOfLoanResponses"></i> <span
                            class="noOfLoanResponses alertnoOfLoanResponses"></span>
                    </button>
                </a>

                <a href="viewDeals" class="fl">
                    <button type="button" class="btn btn-outline graOutLine pull-right marR15"> <b>Ongoing Deals</b> <i
                            class="fa fa-bell alertnoOfLoanResponses"></i>
                    </button>
                </a>




                <a href="viewmyDeals" class="fl">
                    <button type="button" class="btn btn-primary pull-right marR15"><i
                            class="fa fa-angle-double-right"></i> <b>My Participated Deals</b>
                    </button>
                </a>

                <a href="refereeRegisteredInfo" class="fl refEarnings">
                    <button type="button" class="btn btn-warning pull-right marR15"> <b>Referral Earnings</b>
                    </button>
                </a>

                <a href="#" class="fl" id="oxyTradeLi" onclick="durationIncrement();" style="display: none;">
                    <button type="button" class="btn btn-warning pull-right marR15">
                        <i class="fa fa-calendar"></i> Duration Increment for Sreedevi Cars
                    </button>
                </a>

                <!-- <a href="#" class="fl">
            <button type="button" class="btn btn-success pull-right btn-seekers" onclick="permissionToseekers();"><i class="fa fa-angle-double-right"></i> <b class="btnNameofIncreaseLoan">Enable permission to seekers</b>
            </button>
          </a> -->



            </div>
        </div>

        <!-- Stps-->
        <div class="clear"></div>

        <div class="row" style="display: none;">
            <div class="col-lg-12">
                <form id="msform">
                    <!-- progressbar -->
                    <ul id="progressbar1" class="active">
                        <li id="step1">Registration</li>
                        <li id="step2">Profile Completion</li>
                        <!-- <li id="lenderstep3">Load Funds in Wallet</li> -->
                        <li id="lenderstep4">Requests to his Offer</li>
                        <li id="lenderstep5">Waiting for e-Sign</li>
                        <li id="lenderstep7">Disbursement</li>
                    </ul>
                </form>
            </div>
        </div>
        <!-- Speps ends -->


    </section>
    <div class="cls"></div>
    <!-- Main content -->
    <section class="content">

        <!-- New Dashboard -->
        <section class="content noTopPadding">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!--4 Boxes start -->
                        <div class="dbLinks mtop" style="display:none">
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <!-- <span><h3 class="lenderWalletAmount">0</h3></span>-->
                                        <span>
                                            <h3 class="intEarnedyearly"></h3>
                                        </span>
                                        <p>&nbsp;</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-android-apps"></i>
                                    </div>
                                    <div class="interestEarnedAmount" style="color: white;">
                                        <small>Interest Earned In This Financial Year of 2021-2022:</small><span
                                            class="  intEarnedyearly">12456</span>
                                    </div>
                                    <a href="#" class="small-box-footer">Earnings FY 21-22</a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <a href="viewmyDeals">
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-yellow">
                                        <div class="inner">
                                            <h3 class="disbursedDeal"></h3>

                                            <p><b>INR</b> <span class="disbursedDealValue"></span> </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">Number of Active Deals</a>
                                    </div>
                                </div>
                            </a>
                            <!-- ./col -->

                            <!-- ./col -->
                            <a href="myClosedDeals">
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-red">
                                        <div class="inner">
                                            <h3 class="closedDeals"></h3>

                                            <p class="closedDealsValue">0</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-stalker"></i>
                                        </div>
                                        <a href="myClosedDeals" class="small-box-footer">No.of Closed Loans</a>
                                    </div>
                                </div>
                            </a>
                            <!-- ./col -->

                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3 class="activeDeals"></h3>

                                        <p class="activeDealsValue">0</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">No.of Disbursed Deals</a>
                                </div>
                            </div>
                            <!--
        <a href="javascript:void(0)" class="viewmorestats pull-right">View More Stats</a>
        <a href="javascript:void(0)" class="hideStats pull-right" style="display: none;">Show Less Stats</a>
      -->
                        </div>
                        <!--4 Boxes Ends -->


                        <div class="pull-left reff col-md-12 dnmP">
                            <div class="info">
                                <code><strong>Note:</strong></code> Our immediate goal is to showcase your wallet
                                transactions, interest earnings, principal returns and principal return upon withdrawal
                                request. In the Future, We will be adding much more meaningful details and map them to
                                Running Loans.<br />
                            </div>
                        </div>

                        <br /><br /><br />
                        <div class="newDBbtn pull-right">
                            <a href="newDB">
                                <button class="btn btn-info btn-md"> New &#x3B2; Dashboard</button>
                            </a>
                        </div><br />
                        <br /><br />
                        <br />

                        <!-- New Code -->
                        <table class="table table-bordered">
                            <tr>
                                <td scope="col" class="highlSec col-sm-1 w1 newheadBGfodb">S#</td>
                                <td scope="col" class="highlSec col-sm-2 w2 newheadBGfodb">Date</td>
                                <td scope="col" class="highlSec col-sm-7 w3 newheadBGfodb">Transaction Description</td>
                                <td scope="col" class="highlSec col-sm-1 w4 newheadBGfodb">Deposits & Interest</td>
                                <td scope="col" class="highlSec col-sm-1 w5 newheadBGfodb" alt="To the bank account">
                                    Withdrawls & Principal Returns</td>
                            </tr>
                            <tbody style="border: 0px">
                                <tr data="principalAsonApr1st" class="hide">
                                    <td colspan="3">Total Principal As on Apr 1st 2021</td>
                                    <td class="principalAsonApr1st"></td>
                                    <td></td>
                                </tr>
                                <!-- One -->
                                <tr>
                                    <td colspan="3" class="highlSec">My Principal - Deposits through Wallet Transactions
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="">
                            <tbody id="principalAmtThroughWTransData" style="border: 0px;">
                                <!--principalAmtThroughWTransTpl for the code base-->
                            </tbody>
                            </tr>
                            <!-- One Ends -->

                            <!-- One -->
                            <tr>
                                <td colspan="3" class="highlSec">My Earnings - Interest Received</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="">
                                <tbody id="lenderInterestEarnedData" style="border: 0px;">
                                    <!--principalAmtThroughWTransTpl for the code base-->
                                </tbody>
                            </tr>
                            <!-- One Ends -->

                            <!-- One -->
                            <tr>
                                <td colspan="3" class="highlSec">My Principal - Funds Returned upon Borrower Re-Payment
                                    to <b>Your Bank Account</b></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="">
                                <tbody id="lenderPrincipalReturnedData" style="border: 0px;">
                                    <!--principalAmtThroughWTransTpl for the code base-->
                                </tbody>
                            </tr>
                            <!-- One Ends -->

                            <!-- One -->
                            <tr>
                                <td colspan="3" class="highlSec">My Principal - Funds returned upon Withdraw Request
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="">
                                <tbody id="lenderWithDrawData" style="border: 0px;">
                                    <!--principalAmtThroughWTransTpl for the code base-->
                                </tbody>
                            </tr>
                            <!-- One Ends -->

                            <!-- One -->
                            <tfoot>
                                <!-- <th colspan="3" class="highlSec alcenter ">
              <div class="hide">
                Total Principal in Lending:
                <span class="totalPrincipalInLending"></span>
               </div> 
            </th>-->
                                <td colspan="5" class="highlSec alcenter">
                                    Total Interest Earned from Apri 1st 2021 - Till Date:
                                    <span class="sumOfInterestAmount"></span>
                                </td>
                            </tfoot>
                            <tr class="">
                                <tbody id="lenderWithDrawData" style="border: 0px;">
                                    <!--principalAmtThroughWTransTpl for the code base-->
                                </tbody>
                            </tr>
                            <!-- One Ends -->


                            </tbody>
                        </table>
                        <br /><br /><br />&nbsp;
                    </div>
                    <!-- New Code Ends -->
                    <!-- New Dashboard ends-->

                    <!-- Small boxes (Stat box) -->
                    <div class="row dbLinks">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3 class="commitmentAmount">0</h3>
                                    <p><b>Still you can offer</b> <span class="data-lender-commitement"></span></p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-apps"></i>
                                </div>
                                <a href="#" class="small-box-footer">Total Lending Commitment</a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <a href="lenderRunningLoans">
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3 class="noOfActiveLoans"></h3>

                                        <p><b>INR</b> <span class="amountDisbursed"></span> </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Number of Active Loans</a>
                                </div>
                            </div>
                        </a>
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
                                <a href="#" class="small-box-footer">No.of Closed Loans</a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3 class="noOfDisbursedLoans"></h3>

                                    <p class="noOfDisbursedLoansValue">0</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">No.of Disbursed Loans</a>
                            </div>
                        </div>
                        <!--
        <a href="javascript:void(0)" class="viewmorestats pull-right">View More Stats</a>
        <a href="javascript:void(0)" class="hideStats pull-right" style="display: none;">Show Less Stats</a>
      -->
                    </div>

                    <div class="row moreStatsDisplay">
                        <!-- CARD -->
                        <div class="col-lg-3 col-12 amtdisb">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <span class="arwFont  float-left">&#8594;</span>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3 class="noOfLoanRequests">64.89 %</h3></span>
                                                <span>No.Of Offers Sent</span>
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
                                                <i class="fa fa-hand-o-right  font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3 class="availableForInvestment">64.89 %</h3>
                                                <span>Offers in process</span>
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
                                                <i class="fa fa-arrow-up  font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3 class="interestPaid">64.89 %</h3>
                                                <span>Interest Received</span>
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
                                                <i class="fa fa-bell  font-large-2 float-left"></i>
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
                                                <span class="arwFont  float-left">&#8592;</span>
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
                            <div class="card intPid">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class="fa fa-eye  font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3 class="outstandingAmount">64.89 %</h3>
                                                <span>Outstanding Amount</span>
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
                                                <i class="fa fa-dot-circle-o  font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3 class="principalReceived">64.89 %</h3>
                                                <span>Principal Received</span>
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
                    </div>

                    <!-- /.row -->
        </section>
        <!-- /.content -->
        <div class="cls"></div>
        <section class="content-header">
            <h1>
                Latest Borrowers Loan Applications
            </h1>
            <div class="row customFormQ">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="loanListingsSection">
                        <div class="cls"></div>
                        <div class="pull-right">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="lenderDashBoardPagination">
                                        <ul class="pagination bootpag">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cls"></div>
                        <div class="loadBorrowersListings" id="loadBorrowersListings">

                        </div>
                    </div>
                    <script id="loanListingsTpl" type="text/template">
                        {{#data}}
        <div class="col-md-4 loanpercentage{{loanDisbursedPercentage}}">
          <div class="box box-widget widget-user">
            <div class="widget-user-header bg-green">
              <h3 class="widget-user-username">{{user.firstName}} {{user.lastName}} </h3>
              <h5 class="widget-user-desc">BR{{userDisplayId}}</h5>
              <h5 class="widget-user-desc"> {{loanRequest}}</h5>
              <h5 class="widget-user-desc">Duration:{{offerSentDetails.duaration}}
                <span style='display:none' class="loanTypeisI loanTypeis{{user.commentsRequestDto.durationType}}">M</span>
                          <span style='display:none' class="loanTypeisDays loanTypeis{{user.commentsRequestDto.durationType}}">Days</span>

              </h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="{{user.profilePicUrl}}" alt="User Avatar">
            </div>



            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{offerSentDetails.loanOfferedAmount}}</h5>
                    <span class="description-text">Required</span>
                  </div>
                </div>

                 <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{offerSentDetails.rateOfInterestToLender}}%</h5>
                    <span class="description-text">Lender Interest</span>
                  </div>
                </div>

                
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Oxy Score </h5>
                    <span class="description-text oxyScore-0{{user.oxyScore}}">
                      {{#user.oxyScore}}
                          {{user.oxyScore}}
                      {{/user.oxyScore}}

                      {{^user.oxyScore}}
                         YTR
                      {{/user.oxyScore}}
                    </span>
                  </div>
                </div>
              </div>
              <div class="cls"></div>
              <div class="box-footer">
                 <div>
                   <progress value="{{loanDisbursedAmount}}" max="{{offerSentDetails.loanOfferedAmount}}" style="width: 100%;"></progress>
                 </div>

                 <div class="clear"></div>
                 <div>
                   Amount Required on:- {{expectedDate}}
                 </div>
                 <div class="pull-left padt20">
                  <a href="javascript:void(0)" onclick="participatedlenders({{user.id}})"><button type="submit" class="btn btn-success">Participated Lenders</button></a>
                </div>
                <div class="pull-right padt20">
                 {{@index}}
                  <a href="lenderviewloanoffer?loanid={{loanRequestId}}&pageNo=3&requestorderNo=1"><button type="submit" class="btn btn-primary">Application</button></a>
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


<div class="modal fade" id="modal-participatedlenders">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Responses to this Request.</h4>
            </div>
            <div class="modal-body">
                <table id="" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Lender</th>
                            <th>Loan Amount</th>
                            <th>ROI</th>
                            <th>Profit</th>
                        </tr>
                    </thead>
                    <tbody id="displayRequests" class="displayRequests">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-info fade-info" id="modal-durationIncrement">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </br>
                <div class="row">
                    <center>
                        <H4 id="mater">
                            Are you sure you want to extend the duration for 6 more months to Sreedevi Cars & Related
                            Borrowers?</H4>
                    </center>
                    </BR>
                    </BR>
                    <center>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-xm btn-primary button" id="profit-submit-btn"
                                onclick="durationIncr();">Yes</button>
                    </center>
                </div>

            </div>

        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>


<style type="text/css">
.button {
    height: 50px;
    width: 100px;
    border: 2px solid black;
    background-color: green;
    text-align: center;
}

#mater {
    font-size: 20x;
    font-family: arial;
    background-color: : grey;

}
</style>

<div class="modal modal-success fade" id="modal-agreement-duration">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                Your request is updated.
                <br /><br />
                Page will refresh in 2 sec.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script id="displayallparticipatedRequests" type="text/template">
    {{#data}}
                <tr class="nodata-pl">
                  <td>LR{{lenderDisplayId}}</td>
                  <td>{{loanRequestAmount}}</td>
                  <td>{{rateOfInterest}}%</td>
                  <td style="color: green;"><b>{{profit}}</b></td>
                </tr>
            {{/data}}
            </script>



<!-- New DashBoard Code -->
<script id="principalAmtThroughWTransTpl" type="text/template">
    {{#data}}
    <tr>
        <td>{{sno}}</td>
        <td>{{paidDate}}</td>
        <td>Investment</td>
        <td><span class="plusCredit">+</span>{{amountCredited}}</td>
        <td>&nbsp;</td>
    </tr>
 {{/data}}
</script>

<script id="lenderInterestEarnedTpl" type="text/template">
    {{#data}}
    <tr>
      <td>{{sno}}</td>
      <td>{{paidDate}}</td>
      <td>{{remarksFromSheet}}</td>
      <td><span class="plusCredit">+</span>{{amountPaid}}</td>
      <td>&nbsp;</td>
    </tr>
 {{/data}}
</script>

<script id="lenderPrincipalReturnedDataTpl" type="text/template">
    {{#data}}
        <tr>
            <td>{{sno}}</td>
            <td>{{paidDate}}</td>
            <td>{{remarksFromSheet}}</td>
            <td>&nbsp;</td>
            <td><span class="minusDebit">-</span> {{amountPaid}}</td>
        </tr>
 {{/data}}
</script>

<script id="lenderWithDrawTpl" type="text/template">
    {{#data}}
        <tr>
          <td>{{sno}}</td>
          <td>{{paidDate}}</td>
          <td>{{remarksFromSheet}}</td>
          <td></td>
          <td><span class="minusDebit">-</span> {{amountPaid}}</td>
        </tr>
 {{/data}}
</script>




<script id="displaywalletTpl234---" type="text/template">
    {{#data}}          
  <tr>
    <td colspan="3">S#</td>
    <td colspan="3">DATE</td>
    <td colspan="3">DESCRIPTION</td>
    <td colspan="3">AMOUNT</td>


    <tr>
      <td colspan="10">Total Principal on 1st april</td>
      <td colspan="2">{{totalPrincipalOnFirstApril}}</td>
    </tr>
    <tr>
     <th colspan="6">My  Principal Deposit Through Wallet Transcations </th>
     <th colspan="6"></th>
     <tr>
       <td colspan="3">{{lenderPricipalAmountThroughWalletTransaction.amountCredited}}</td>
       <td colspan="3" >{{lenderPricipalAmountThroughWalletTransaction.paidDate}}</td>
       <td colspan="3">{{}}</td>
       <td colspan="3">{{}}</td>
     </tr>
     <tr>
       <td colspan="3">2</td>
       <td colspan="3" >DD/MM/YYYY</td>
       <td colspan="3"> Interest Earned Towards Tollgates</td>
       <td colspan="3">600000</td>
     </tr>

   </tr>      
   <tr>
     <th colspan="6">My Earning - Interests Received </th>
     <th colspan="6">{{sumOfInterestAmount}}</th>
     <tr>
       <td colspan="3">1</td>
       <td colspan="3" >DD/MM/YYYY</td>
       <td colspan="3">KKD</td>
       <td colspan="3">23456</td>
     </tr>

   </tr>      
   <tr>
     <th colspan="6">My Principal-Funds Returned Upon Borrower Re-Payment</th>
     <th colspan="6"></th>
     <tr>
       <td colspan="3">1</td>
       <td colspan="3" >DD/MM/YYYY</td>
       <td colspan="3">Tollgates</td>
       <td colspan="3">1000000</td>
     </tr>             
   </tr>      
   <tr>
    <center> <th colspan="6">My Principal -Funds Returned Upon Withdraw Request</th></center>
    <th colspan="6"></th>
    <tr>
     <td colspan="3">1</td>
     <td colspan="3" >DD/MM/YYYY</td>
     <td colspan="3">GOGINENI</td>
     <td colspan="3">200000</td>
   </tr>
   <tr>                    
   </tr>
   <tr>
     <th colspan="6">Total  Principal in Lending  </th>
     <th colspan="6">{{totalPrincipalInLending}}</th>
   </tr>  
   <tr>
    <th colspan="6">Total interest earned from april 1st -Till date </th>
    <th colspan="6">20000000</th>
  </tr>    
</tr>

</tr>

{{/data}}
</script>




<script type="text/javascript">
window.onload = newdashboardcall();
</script>
<style type="text/css">
.table-bordered>thead>tr>th,
.table-bordered>tbody>tr>th,
.table-bordered>tfoot>tr>th,
.table-bordered>thead>tr>td,
.table-bordered>tbody>tr>td,
.table-bordered>tfoot>tr>td {
    border: 1px solid #696969;
}

.table-bordered {
    border: 1px solid #696969;
    width: 96%;
    margin: 0 auto 20px auto;
    padding-bottom: : 90px;
}

.w1 {
    width: 10%;
}

.w2 {
    width: 15%;
}

.w3 {
    width: 48%;
}

.w4 {
    width: 13%;
}

.w5 {
    width: 15%;
}

.newheadBGfodb {
    background: #16D39A !important;
    color: #FFFFFF;
}
</style>
<!-- New DashBoard Code ENDS ***** -->
<script type="text/javascript">
loadDashboardData();
window.onload = loadBorrowersListings;
window.onload = dealsStats; //Displaying Borrowers info to the lenders
$(".oxyScore-00").html("YTR");
</script>
<!-- /.content-wrapper -->
<script src="<?php echo base_url(); ?>/assets/js/mustache.js?oxyloans=<?php echo time(); ?>"></script>
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
<?php include 'footer.php';?>