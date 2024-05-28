<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<?php
 $isValidityExpire =  isset($_GET['isValidity']) ? $_GET['isValidity'] : 'false';

 function getCallbackUrl(){
  $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
  return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . 'response.php';
}
?>



<?php

    $postdata = isset( $_POST) ?  $_POST : '0' ;
    $msg = '';

$orderId = isset($postdata['orderId']) ? $postdata['orderId'] : '0';
$orderAmount = isset($postdata["orderAmount"]) ? $postdata['orderAmount']: '0';
$referenceId = isset($postdata["referenceId"]) ? $postdata['referenceId']: '0';
$txStatus = isset($postdata["txStatus"]) ? $postdata['txStatus']: '0';
$paymentMode = isset($postdata["paymentMode"]) ? $postdata['paymentMode']: '0';
$txMsg = isset($postdata["txMsg"]) ? $postdata['txMsg']: '0';
$txTime = isset($postdata["txTime"]) ? $postdata['txTime']: '0';
$signature = isset($postdata["signature"]) ? $postdata['signature']: '0';

    if ($txStatus == 'SUCCESS') {

    $msg = '<div class="alert alert-success" role="alert">Transaction Successful. Thank you for your payment againt the platform fee.</div>';
    //Do success order processing here...
    }
    else {
    //tampered or failed
    $msg = '<div class="alert alert-danger" role="alert">Payment failed, Please try again.</div>';
    }
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper newDashboard">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="pull-left col-md-4">
            <h1>
                My Transactions
                <small>New</small>
            </h1>
        </div>
        <div class="pull-right mobileDiv_1">
            <a href="viewCurrentDayDeals" class="fl">
                <button type="button" class="btn btn-outline graOutLine pull-right marR15 oxyPartnerLender"> <b>Today
                        Deals</b> <i class="fa fa-bell alertnoOfLoanResponses"></i>
                </button>
            </a>
            <a href="viewmyDeals" class="fl">
                <button type="button" class="btn btn-primary pull-right marR15 oxyPartnerLender"><i
                        class="fa fa-angle-double-right"></i> <b>My Participated Deals</b>
                </button>
            </a>

            <a href="refereeRegisteredInfo" class="fl refEarnings refaral_info_newDb" style="display:none">
                <button type="button" class="btn btn-warning pull-right marR15"> <b>Referral Earnings</b>
                </button>
            </a>

            <a href="paymembership" class="fl refEarnings getmembership_new">
                <button type="button" class="btn btn-warning pull-right marR15"> <b>
                        <i class="fa fa-angle-double-right"></i> Get Membership</b>
                </button>
            </a>

           <!--  <a href="#" class="fl refEarnings getmembership_new" onclick="paynewlenderannualfee()" style="display:none">
                <button type="button" class="btn btn-warning pull-right marR15"> <b>
                        <i class="fa fa-angle-double-right"></i> Get Membership</b>
                </button>
            </a> -->
        </div></br></br>
    </section>



    <div class="clear"></div>
    <!-- Main content -->
    <section class="content showloader">
        <div class="row">
            <form id="redirectForm" method="post" action="https://test.cashfree.com/billpay/checkout/post/submit">
                <input type="hidden" name="appId" id="appId" value="" />
                <input type="hidden" name="orderId" id="orderId" value="" />
                <input type="hidden" name="orderAmount" id="orderAmount" value="" />
                <input type="hidden" name="orderCurrency" id="orderCurrency" value="" />
                <input type="hidden" name="orderNote" id="orderNote" value="" />
                <input type="hidden" name="customerName" id="customerName" value="" />
                <input type="hidden" name="customerEmail" id="customerEmail" value="" />
                <input type="hidden" name="customerPhone" id="customerPhone" value="" />
                <input type="hidden" name="returnUrl" id="returnUrl" value="" />
                <input type="hidden" name="notifyUrl" id="notifyUrl" value="" />
                <input type="hidden" name="signature" id="signature" value="" />
            </form>
            <!--4 Boxes start -->
            <div class="dbLinks mtop">

                <a href="#" class="getfincalLoadData">
                    <div class="col-lg-3 col-md-3 col-xs-6">
                        <i class="fa fa-spinner fa-spin financialLoading mx-3"></i>
                        <div class="small-box bg-aqua">
                            <div class="inner" style="padding:25px">
                                <span>
                                    <h3 class="earnedFinancial">0</h3>
                                </span>
                            </div>
                            <div class="icon"
                                style="color: white; font-weight: bold; top:-5px; font-family:sans-serif;">
                                <h4 class="fy-year">FY 23-24</h4>
                            </div>
                            <span class="small-box-footer fy-options dropdown">
                                <i class="fa fa-star" aria-hidden="true"
                                    style="color:yellow; margin-right: 5px; "></i><b>Earnings FY
                                    <select class="dropdown-toggle financialSectionSelect "
                                        style="color: black; outline: none; width: 50px; text-align:center; margin-left:5px"
                                        onchange="getFincialData(); " data-toggle="dropdown">
                                        <option value="24-25" selected>24-25</option>
                                        <option value="23-24">23-24</option>
                                        <option value="22-23">22-23</option>
                                       
                                    </select></b>
                                <button class="btn btn-xs  btn-outline mobile_View_Hide" style="margin-left:10px"
                                    id="viewReportOfFy">View</button>
                            </span>

                        </div>
                    </div>
                </a>

                <!-- ./col -->
                <a href="viewmyDeals">
                    <div class="col-lg-3 col-md-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green ">
                            <div class="inner">
                                <h3 class="activeDeals"></h3>

                                <p><b>INR</b> <span class="activeDealsValue"></span> </p>
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
                    <div class="col-lg-3 col-md-3 col-xs-6">
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

                <div class="col-lg-3 col-md-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3 class="disbursedDeal"></h3>

                            <p class="disbursedDealValue">0</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">No.of Disbursed Deals</a>
                    </div>
                </div>

            </div>
            <!--4 Boxes Ends -->
        </div>
        <!-- STATS ENDS -->
        <div class="row displayvalidity" style="display:none;">
            <div class="col-lg-5 pull-left">
                <p class="membershipDate pull-left"><b>Membership Validity Date : </b>
                    <span class="mebershipexpiry"></span>
                </p>

            </div>
        </div>


        <div class="row">
            <div class="firstrow">
                <div class="col-md-6 investmentsectionbox">
                    <!-- general form elements -->

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Investment / Wallet</h3>
                            <small class="pull-right">
                                <form>
                                    <div class="form-group">
                                        <select class="form-select myformSelcInvestment myformSelc"
                                            id="myformSelcInvestment" aria-label="Default select example">
                                            <option value="" selected>-- Sort by --</option>
                                            <option value="ASC">ASC by Date</option>
                                            <option value="DESC">DESC by Date</option>
                                        </select>
                                    </div>
                                </form>
                            </small>
                        </div>
                        <div class="content-wrapperN">
                            <div class="row">
                                <div class="col-md-6 pull-right fontchange invBlock">
                                    <span><b>Total Investment :</b></span>
                                    <span class="totalInvestment">1000000</span>
                                </div>
                            </div>
                        </div>
                        <!-- form start -->
                        <div class="showinvestmentbtn"> <button class="btn btn-primary"
                                onclick="loadnewDBInvestmentInfo('DESC')">View Investment Data</button></div>
                        <table class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody id="investmentsData" class="invetmentblur investmentSection">

                                <tr style="display: none;" class="nodataFoundinvestmentsData">
                                    <td colspan="8">No Record Found </td>
                                </tr>

                                <tr class="interestStaticdata">
                                    <td> 2023-03-16</td>
                                    <td>Wallet Loaded</td>
                                    <td> 5900</td>
                                </tr>

                                <tr class="interestStaticdata">
                                    <td> 2023-03-16</td>
                                    <td>Wallet Loaded</td>
                                    <td> 5900</td>

                                </tr>

                                <tr class="interestStaticdata">
                                    <td> 2023-03-16</td>
                                    <td>Wallet Loaded</td>
                                    <td> 5900</td>

                                </tr>
                                <tr class="interestStaticdata">
                                    <td> 2023-03-16</td>
                                    <td>Wallet Loaded</td>
                                    <td> 5900</td>

                                </tr>




                            </tbody>

                        </table>
                        <div class="box-footer investmentfooter investmentSection" style="border-top-left-radius: 0;
                    border-top-right-radius: 0;
                    border-bottom-right-radius: 3px;
                   border-bottom-left-radius: 3px;
                    border-top: 1px solid #f4f4f4;
                        /* padding: 10px; */
                       background-color: #fff;
                        height: 60px;">
                            <div class="pull-left investmentfooterbtn" style="display:none">
                                <a href="javascript:void(0)">
                                    <button class="btn btn-primary detailedStBtn"
                                        onclick="downloadExcelNewDB('WALLETCREDITED');"><i
                                            class="fa fa-file-excel-o fa-1.5x downloadexcelIcon"> </i>

                                        Download Investment Report
                                    </button>
                                </a>
                            </div>

                            <div class="investmentsPagination pull-right">
                                <ul class="pagination pull-right notopMargin"></ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (left) -->
                <!-- COL 2right column -->
                <div class="col-md-6 interestsSection">
                    <!-- general form elements -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Interest Earnings</h3>
                            <small class="pull-right">
                                <form>
                                    <div class="form-group">
                                        <select class="form-select myformSelcInterests myformSelc"
                                            id="myformSelcInterests" aria-label="Default select example">
                                            <option value="" selected>-- Sort by --</option>
                                            <option value="ASC">ASC by Date</option>
                                            <option value="DESC">DESC by Date</option>
                                            <!-- <option value="dealwise">Deal wise</option> -->
                                        </select>
                                    </div>
                                </form>
                            </small>
                        </div>
                        <!-- /.box-header -->
                        <div class="content-wrapperN">
                            <div class="row">
                                <div class="col-md-6 pull-right fontchange invBlock">
                                    <span><b>Total Earnings :</b></span>
                                    <span class="totalEarnings">1000000</span>
                                </div>
                            </div>
                        </div>
                        <!-- form start -->
                        <div class="showinterestEarningsbtn"> <button class="btn btn-success"
                                onclick="loadnewDBInterestsInfo('DESC')">View Interest Earnings Data</button></div>
                        <table class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Deal Name</th>
                                    <th>Days</th>
                                    <th>Profit</th>

                                </tr>
                            </thead>
                            <tbody id="interesTearnedData" class="interestEarningblur interestEarningSection">
                                <tr style="display: none;" class="nodataFoundInterest">
                                    <td colspan="8">No Record Found</td>
                                </tr>



                                <tr class="interestEarningStaticsdata">
                                    <td> 2023-09-06</td>
                                    <td>36MLock_RoI1.8_NoATW Interest</td>
                                    <td> 30</td>
                                    <td> 9900</td>
                                </tr>
                                <tr class="interestEarningStaticsdata">
                                    <td> 2023-09-06</td>
                                    <td>36MLock_RoI1.8_NoATW Interest</td>
                                    <td> 30</td>
                                    <td> 9900</td>
                                </tr>
                                <tr class="interestEarningStaticsdata">
                                    <td> 2023-09-06</td>
                                    <td>36MLock_RoI1.8_NoATW Interest</td>
                                    <td> 30</td>
                                    <td> 9900</td>
                                </tr>
                                <tr class="interestEarningStaticsdata">
                                    <td> 2023-09-06</td>
                                    <td>36MLock_RoI1.8_NoATW Interest</td>
                                    <td> 30</td>
                                    <td> 9900</td>
                                </tr>



                            </tbody>
                        </table>
                        <div class="box-footer interestEaringfooter interestEarningSection" style="border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #f4f4f4;
    /* padding: 10px; */
    background-color: #fff;
    height: 60px;">
                            <div class="pull-left interestEarningfooterbnt" style="display:none;">
                                <a href="javascript:void(0)" class="">
                                    <button class="btn  btn-success detailedStBtn"
                                        onclick="downloadExcelNewDB('LENDERINTEREST');"><i
                                            class="fa fa-file-excel-o fa-1.5x downloadexcelIcon"> </i>
                                        <!--    View Detailed Statement -->
                                        Download Interest Report
                                    </button>
                                </a>
                            </div>

                            <div class="interestsPagination pull-right">
                                <ul class="pagination bootpag"></ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!--/.col (right) -->
            <!-- COL 3 left column -->
            <div class="secondrow">
                <div class="col-md-6 principalReturn">
                    <!-- general form elements -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Principal Returned </h3>
                            <small class="pull-right">
                                <form>
                                    <div class="form-group">
                                        <select class="form-select myformSelcPrincipal myformSelc"
                                            id="myformSelcPrincipal" aria-label="Default select example">
                                            <option value="" selected>-- Sort by --</option>
                                            <option value="ASC">ASC by Date</option>
                                            <option value="DESC">DESC by Date</option>
                                        </select>
                                    </div>
                                </form>
                            </small>
                        </div>
                        <!-- /.box-header -->

                        <!-- form start -->
                        <div class="content-wrapperN">
                            <div class="row">
                                <div class="col-md-6 pull-right fontchange invBlock">
                                    <span><b>Principal Returned Amount :</b></span>
                                    <span class="totalprincipalAmount">1000000</span>
                                </div>
                            </div>
                        </div>
                        <div class="showPrincipalbtn"> <button class="btn btn-info"
                                onclick="loadnewDBPrincipalInfo('DESC')">View Principal Returned Data</button></div>
                        <table class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Deal Name</th>
                                    <th>Amount Lent</th>
                                    <th>Returned Amount</th>
                                    <th>Deal Bal</th>
                                </tr>
                            </thead>
                            <tbody id="principalReturnData" class="principalReturnblur principalReturnSection">
                                <tr class="nodataFoundPrincipal" style="display: none;">
                                    <td colspan="8">No Record Found</td>
                                </tr>


                                <tr class="principalreturnstatic">
                                    <td>2023-09-02</td>
                                    <td>SD-2S-20L-31MAY23</td>
                                    <td>30000</td>
                                    <td>Returned to wallet(S)</td>
                                    <td>0</td>
                                </tr>

                                <tr class="principalreturnstatic">
                                    <td>2023-09-02</td>
                                    <td>SD-2S-20L-31MAY23</td>
                                    <td>30000</td>
                                    <td>Returned to wallet(S)</td>
                                    <td>0</td>
                                </tr>

                                <tr class="principalreturnstatic">
                                    <td>2023-09-02</td>
                                    <td>SD-2S-20L-31MAY23</td>
                                    <td>30000</td>
                                    <td>Returned to wallet(S)</td>
                                    <td>0</td>
                                </tr>

                                <tr class="principalreturnstatic">
                                    <td>2023-09-02</td>
                                    <td>SD-2S-20L-31MAY23</td>
                                    <td>30000</td>
                                    <td>Returned to wallet(S)</td>
                                    <td>0</td>
                                </tr>

                            </tbody>

                        </table>
                        <div class="box-footer principalReturnfooter principalReturnSection" style="border-top-left-radius: 0;
          border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #f4f4f4;
    background-color: #fff;
    height: 60px;">
                            <div class="pull-left principalReturnfooterbtn" style="display:none">
                                <a href="javascript:void(0)" class="">
                                    <button class="btn  btn-info detailedStBtn"
                                        onclick="downloadExcelNewDB('LENDERPRICIPAL');"><i
                                            class="fa fa-file-excel-o fa-1.5x downloadexcelIcon"></i>
                                        <!--    View Detailed Statement -->
                                        Download Principal Report
                                    </button>
                                </a>
                            </div>

                            <div class="principalReturnPaging pull-right">
                                <ul class="pagination pull-right notopMargin"></ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (left) -->
                <!-- COL 4 left column -->
                <div class="col-md-6  referralBonusPayment">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Referral Earnings</h3>
                            <small class="pull-right">
                                <form>
                                    <div class="form-group">
                                        <select class="form-select myformSelc" aria-label="Default select example"
                                            id="selectReferralOrder">
                                            <option value="" selected>-- Sort by --</option>
                                            <option value="ASC">ASC by Date</option>
                                            <option value="DESC">DESC by Date</option>
                                        </select>
                                    </div>
                                </form>
                            </small>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="content-wrapperN">
                            <div class="row">
                                <div class="col-md-6 pull-right fontchange invBlock">
                                    <span><b>Unpaid Referral Amount :</b></span>
                                    <span class="unpaidreferralEarnings">1000000</span>
                                </div>
                                <div class="col-md-6 pull-left fontchange invBlock">
                                    <span><b>Paid Referral Amount</b></span>
                                    <span class="paidReferralAmount">1000000</span>
                                </div>
                            </div>
                        </div>
                        <div class="showReferralEarningsbtn"> <button class="btn btn-danger"
                                onclick="loadnewDBReferralInfo('DESC')">View Referral Earnings Data</button></div>
                        <table class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Lender</th>
                                    <th>Deal Name</th>

                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="referralData" class="referalEarningblur referalEarningsSection">
                                <tr style="display: none;" class="nodataFoundReferral">
                                    <td colspan="8">No Record Found</td>
                                </tr>

                                <tr class="referalEarningStaticdata">
                                    <td> 2023-09-11</td>
                                    <td>GAYATHRI SRINIVASAN</td>
                                    <td> SD-LB-5CR-36M-1.7ROI-MlyPayOut-SEP23</td>
                                    <td> Unpaid</td>
                                </tr>

                                <tr class="referalEarningStaticdata">
                                    <td> 2023-09-11</td>
                                    <td>GAYATHRI SRINIVASAN</td>
                                    <td> SD-LB-5CR-36M-1.7ROI-MlyPayOut-SEP23</td>
                                    <td> Unpaid</td>
                                </tr>

                                <tr class="referalEarningStaticdata">
                                    <td> 2023-09-11</td>
                                    <td>GAYATHRI SRINIVASAN</td>
                                    <td> SD-LB-5CR-36M-1.7ROI-MlyPayOut-SEP23</td>
                                    <td> Unpaid</td>
                                </tr>

                                <tr class="referalEarningStaticdata">
                                    <td> 2023-09-11</td>
                                    <td>GAYATHRI SRINIVASAN</td>
                                    <td> SD-LB-5CR-36M-1.7ROI-MlyPayOut-SEP23</td>
                                    <td> Unpaid</td>
                                </tr>

                            </tbody>

                        </table>
                        <div class="box-footer  referalEarningfooter referalEarningsSection" style="border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #f4f4f4;
    /* padding: 10px; */
    background-color: #fff;
    height: 60px;">
                            <div class="pull-left referalearningfooterbtn" style="display:none;">
                                <a href="javascript:void(0)" class="">
                                    <button class="btn  btn-danger detailedStBtn"
                                        onclick="downloadExcelNewDB('REFERRALBONUS');"><i
                                            class="fa fa-file-excel-o fa-1.5x downloadexcelIcon"> </i>
                                        <!-- View Detailed Statement -->
                                        Download Referral Report
                                    </button>
                                </a>

                                <a href="https://sites.google.com/oxyloans.com/referrer-faq/home"
                                    target="_blank"><button class="btn btn-danger btn-xs detailedStBtn"
                                        style="margin-left:1px;padding: 7px;">FAQ</button></a>

                            </div>

                            <div class="refferralPagination pull-right">
                                <ul class="pagination pull-right notopMargin"></ul>
                            </div>

                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!--/.col (left) -->
            <!-- COL 4 left column -->
            <div class="col-md-12 principalDetails">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Deals Vs Earnings</h3>
                        <small class="pull-right">
                            <form>
                                <div class="form-group">
                                    <select class="form-select myformSelc" aria-label="Default select example"
                                        id="lendingPrincipalDetails">
                                        <option value="" selected>-- Sort by --</option>
                                        <option value="ASC">ASC by Date</option>
                                        <option value="DESC">DESC by Date</option>
                                        <option value="dealwise">Deal wise</option>
                                        <option value="closed">Closed</option>
                                        <option value="running">Running</option>
                                    </select>
                                </div>
                            </form>
                        </small>
                    </div>
                    <!-- /.box-header -->
                    <br />
                    <div class="content-wrapperN">
                        <div class="row">
                            <div class="col-md-3">
                                <span>Participated Value</span><span class="runningLoansValuePag"></span> (<span
                                    class="countOfRunningDeals"></span>
                            </div>
                            <div class="col-md-3">
                                <span>Closed Deals Value</span><span class="closedLoansValuePag"></span>
                            </div>
                            <div class="col-md-3">
                                <span>Equity Deals Value</span><span class="equityLoansValuePag"></span>
                            </div>
                            <div class="col-md-3">
                                <span>Running Loans Value</span><span class="runningLoansValuePag"></span>
                            </div>
                        </div>
                    </div>
                    <br />
                    <!-- form start -->
                    <div class="showDealEarningsbtn"> <button class="btn btn-primary"
                            onclick="loadnewDBPrincipalDetailsInfo('DESC')">View Deals Vs Earnings Data</button></div>
                    <table class="table table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Deal Name</th>
                                <th>RoI</th>
                                <th>Tenure </br> In Months</th>
                                <th>Date</th>
                                <th>Closed Date</th>
                                <th>Amount</th>
                                <th>Loan Status</th>
                            </tr>
                        </thead>
                        <tbody id="newDBPrincipalLendingDetails"
                            class="dealsEarni9ngsSectionblur dealsEarni9ngsSection">
                            <tr>
                            <tr style="display: none;" class="nodataFoundDealEarning">
                                <td colspan="8">No Record Found</td>
                            </tr>


                            <tr class="dealprincipalEarningstatic">
                                <td>1</td>
                                <td> SD-LB-5CR-36M-1.7ROI-MlyPayOut-SEP23</td>
                                <td>1.7</td>
                                <td>36</td>
                                <td>2023-09-04</td>
                                <td> Running</td>
                                <td>50000</td>

                                <td> Running</td>
                            </tr>
                            <tr class="dealprincipalEarningstatic">
                                <td>1</td>
                                <td> SD-LB-5CR-36M-1.7ROI-MlyPayOut-SEP23</td>
                                <td>1.7</td>
                                <td>36</td>
                                <td>2023-09-04</td>
                                <td> Running</td>
                                <td>50000</td>

                                <td> Running</td>
                            </tr>
                            <tr class="dealprincipalEarningstatic">
                                <td>1</td>
                                <td> SD-LB-5CR-36M-1.7ROI-MlyPayOut-SEP23</td>
                                <td>1.7</td>
                                <td>36</td>
                                <td>2023-09-04</td>
                                <td> Running</td>
                                <td>50000</td>

                                <td> Running</td>
                            </tr>
                            <tr class="dealprincipalEarningstatic">
                                <td>1</td>
                                <td> SD-LB-5CR-36M-1.7ROI-MlyPayOut-SEP23</td>
                                <td>1.7</td>
                                <td>36</td>
                                <td>2023-09-04</td>
                                <td> Running</td>
                                <td>50000</td>

                                <td> Running</td>
                            </tr>
                            <tr class="dealprincipalEarningstatic">
                                <td>1</td>
                                <td> SD-LB-5CR-36M-1.7ROI-MlyPayOut-SEP23</td>
                                <td>1.7</td>
                                <td>36</td>
                                <td>2023-09-04</td>
                                <td> Running</td>
                                <td>50000</td>

                                <td> Running</td>
                            </tr>
                            </tr>
                        </tbody>
                    </table>
                    <div class="box-footer dealsEarni9ngsSectionfooter  dealsEarni9ngsSection">
                        <div class="pull-left dealsRunningsfooterbtn" style="display:none">
                            <a href="javascript:void(0)" class="">
                                <button class="btn  btn-primary detailedStBtn"
                                    onclick="downloadExcelNewDB('LENDERPATICIPATION');"><i
                                        class="fa fa-file-excel-o fa-1.5x downloadexcelIcon"> </i>
                                    Download Principal Lending Report
                                </button>
                            </a>
                        </div>

                        <div class="principalDetailsPagination pull-right">
                            <ul class="pagination pull-right notopMargin"></ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (left) -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
</div>
<!-- ./wrapper -->

<div class="modal modal-success fade" id="modal-success-unsubscribeNotification">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title">Update</h5>
            </div>
            <div class="modal-body">
                <p>
                    You have unsubscribed from the oxyloans renewal, and you will no longer receive renewal
                    notifications.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-info fade" id="modal-Kyc-NotUpdated-Lender">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title">Please Upload your Kyc documents.</h5>
            </div>
            <div class="modal-body">
                <p class="messagebody">
                    You're one step away to submit your lending application, Please Upload your Kyc documents.
                    <b>Pan,One address proof are mandatory.</b>
                </p>
            </div>
            <div class="modal-footer">
                <a href="lender_profilePage?userScore=0" class="personalProfileLink">
                    <button type="button" class="btn btn-outline pull-left">Update</button>
                </a>
            </div>
        </div>

    </div>

</div>

<!-- <div class="modal modal-warning fade" id="modal-validitydate-expiring">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Alert</h4>
            </div>
            <div class="modal-body">
                <p class="text-profileCheck">
                    <b> Your membership is expiring on <span class="mebershipexpiry"
                            style="font-size: 16px;"></span></b>.
                </p> </br>

                <p> <b>NOTE : </b>If you paid the renewal fee to Bank account, kindly share the screenshot image in
                    write to us.<a href="lenderInquiries" style="margin-left:1.2px; color: white;">Click here to upload
                        the screenshot </a></p>


                <p class="payThroughwallet">Added new options. wallet and payment gateway By using these options, you
                    can pay your validity fee of INR 5900</p>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right updateProfile-OnLoad" data-dismiss="modal"
                    onclick="skipvalidity();">SKIP</button>

                <button type="button" class="btn btn-outline pull-right updateProfile-OnLoad"
                    onclick="renewalValidityFee('<?php echo $isValidityExpire?>');" style="margin-right:5px">Payment
                    Gateway</button>

                <button type="button" class="btn btn-outline pull-right renwel_paythroughWallet"
                    onclick="modalPayThtoughwallet();" style="margin-right:5px;"> Wallet</button>
            </div>
        </div>
    </div>
</div> -->


<!-- <div class="modal modal-warning fade" id="modal-validitydate-expired">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Alert</h4>
            </div>
            <div class="modal-body">
                <p class="text-profileCheck">
                    <b> Your membership has expired on <span class="mebershipexpiry"
                            style="font-size: 16px;"></span></b>.
                </p></br>

                <p class="text_doc"> <b>NOTE : </b>If you paid the renewal fee to your bank account, kindly share the screenshot image with us.<a href="lenderInquiries" style="margin-left:1.5px;  color: white;">Click here to upload the screenshot.</a></p>

                <p class="payThroughwallet">added new options. wallet and payment gateway By using these options, you can pay your validity fee of INR 5,900.</p>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right updateProfile-OnLoad" data-dismiss="modal"
                    onclick="skipvalidity();">Skip</button>

                <button type="button" class="btn btn-outline pull-right updateProfile-OnLoad"
                    onclick="renewalValidityFee('<?php echo $isValidityExpire?>');" style="margin-right:5px">Payment
                    Gateway</button>

                <button type="button" class="btn btn-outline pull-right renwel_unsubscribe"
                    onclick="renewalUnsbscribtion();" style="margin-right:5px;">Unsubscribe Notifications</button>

                <button type="button" class="btn btn-outline pull-right pay_Through-wallet"
                    onclick="modalPayThtoughwallet();" style="margin-right:5px;"> Wallet</button>
            </div>
        </div>

    </div>

</div> -->
<!--
<div class="modal fade" id="modal-approve-walletFeepayThrough" tabindex="-1" role="dialog"
    aria-labelledby="modal-borrower-approve-user" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure want to pay Validity fee through wallet ?</h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success approveuser-Btn" data-reqid='' data-clickedid=""
                    onclick="payThroughwalletFunction();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div> -->
<script id="interestsDataScript" type="text/template">
    {{#data}}
<tr>
<td>{{returedDate}}</td>
<td>{{remarks}}</td>
<!--  <td>{{dealName}}</td>
<td>{{roi}}</td> -->
<td>{{differencInDays}}</td>
<td>{{amount}}</td>

</tr>
{{/data}}
</script>
<script id="investmentDataScript" type="text/template">
    {{#data}}
<tr>
<td>{{walletLoaded}}</td>
<td>{{remarks}}</td>
<td>{{amount}}</td>
</tr>
{{/data}}
</script>
<script id="principalReturnScript" type="text/template">
    {{#data}}
<tr>
<td>{{returedDate}}</td>
<td>{{dealName}}</td>
<td>{{amount}}</td>
<td>{{remarks}}</td>
<td>{{currentAmount}}</td>
</tr>
{{/data}}
</script>
<script id="referralBonusScript" type="text/template">
    {{#data}}
<tr>
<td>{{participatedDate}}</td>
<td>{{refereeName}}</td>
<td>{{dealName}}</td>
<!-- <td>{{participatedAmount}}</td> -->
<td>{{paymentStatus}}</td>
</tr>
{{/data}}
</script>
<script id="lendingPrincipalScript" type="text/template">
    {{#data}}
<tr class="scriptFinancialYear">
<td>{{sno}}</td>
<td>{{dealName}}</td>
<td>{{rateofinterest}}</td>
<td>{{tenure}}</td>
<td>
{{participatedDate}}
</td>
<td>
{{#dealClosedDate}}
{{dealClosedDate}}
{{/dealClosedDate}}
{{^dealClosedDate}}
Running
{{/dealClosedDate}}

</td>
<td>{{participatedAmount}}</td>

<!-- <td></td>
<td></td>
<td></td> -->
<td>{{pricipaleReturnedStatus}}</td>
</tr>
{{/data}}
</script>





<?php if ($txStatus == 'SUCCESS'){ ?>
<script type="text/javascript">
$("#modal-validitydate-expired").modal('hide');
$("#modal-validitydate-expiring").modal('hide');

// updateLenderFeeDetails(<?php echo "'";?><?php echo $orderId; ?><?php echo "'";?>,
//     <?php echo "'";?><?php echo $referenceId; ?><?php echo "'";?>,
//     <?php echo "'";?><?php echo $txStatus; ?><?php echo "'";?>);

updatenewmembershipLenderFeeDetails(<?php echo "'";?><?php echo $orderId; ?><?php echo "'";?>, <?php echo "'";?><?php echo $referenceId; ?><?php echo "'";?>,
    <?php echo "'";?><?php echo $txStatus; ?><?php echo "'";?>);
</script>
<?php } ?>
<script type="text/javascript">
<?php if($txStatus == 'FLAGGED' ||  $txStatus == 'PENDING'|| $txStatus == 'FAILED'|| $txStatus == 'CANCELLED'|| $txStatus == 'USER_DROPPED' ){?>
window.onload = loadFalureFunc();
<?php } else if ($txStatus == 'SUCCESS'){ ?>
console.log("payment call success");
$('#modal-validitydate-expired').modal('hide');
$("#modal-validitydate-expiring").modal('hide');
$(".loadingSec").show();
$(document).ready(function() {
    setTimeout(function() {
        $(".loadingSec").hide();
        $("#modal-validitydate-renewal").modal("show");
    }, 3000);
});

<?php }
?>
</script>


<script type="text/javascript">
 window.onload=getUserDetails();
 window.onload = dealsStats();
window.onload = getFincialData('2024-04-01', '2025-03-31');
window.onload=getuserMembershipValidity();
window.onload=checkresendactivastionLink();
 // window.onload = paylenderfee();
 //Displaying Borrowers info to the lenders
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js?oxyloans=<?php echo time(); ?>"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Exo&family=Montserrat:wght@200&display=swap" rel="stylesheet">
<?php include 'footer.php';?>