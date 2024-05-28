<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<?php
    $urlfromBroweser = $_SERVER['REQUEST_URI'];
    //echo $urlfromBroweser;
    $dealId =  isset($_GET['id']) ? $_GET['id'] : '0';
    // participateDeal?type=failure
    $paymentStatus =  isset($_GET['type']) ? $_GET['type'] : 'failure';

function getCallbackUrl(){
  $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
  return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . 'response.php';
}
?>

<!-- <?php 
$postdata = $_POST;
$msg = '';
if (isset($postdata ['key'])) {
    $key                =   $postdata['key'];   
    $txnid              =   $postdata['txnid'];
    $amount             =   $postdata['amount'];
    $productInfo        =   $postdata['productinfo'];
    $firstname          =   $postdata['firstname'];
    $email              =   $postdata['email'];
    $udf5               =   $postdata['udf5'];
    $mihpayid           =   $postdata['mihpayid'];
    $status             =   $postdata['status'];
    $resphash           =   $postdata['hash'];


    if ($status == 'success') {
        $msg = '<div class="alert alert-success" role="alert">Transaction Successful. Thank you for your payment againt the platform fee.</div>';
        //Do success order processing here...
    }
    else {
        //tampered or failed
        $msg = '<div class="alert alert-danger" role="alert">Payment failed, Please try again.</div>';
    } 
}
else exit(0);
?>
 -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="particpatedPage">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            Welcome to <span class="deal-Name" style="font-size: 18px; font-weight: bold;"></span>
            Deal</h1><br /><br />

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

            <div class="col-xs-12">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <h3>Deal Info</h3>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    <th>Deal Name</th>
                                    <th>Loan Amount</th>
                                    <th>Primary Borrower</th>
                                    <th>Tenure in Months</th>
                                    <th>Funding Start Date</th>
                                    <th>Funding End Date</th>
                                    <th>participation Limit</th>
                                </tr>

                            </thead>
                            <tbody id="displayDealsData">
                                <tr>
                                    <td>Deal Nader gul</td>
                                    <td>200</td>
                                    <td>Mahender Reddy</td>
                                    <td>6</td>
                                    <td>26%</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="clear"></div>
                        <div class="fundingStatus-Closed" style="display:none">
                            This Deal is Closed.
                        </div>

                        <div class="fundingStatus-Happening">

                            <div class="form-row participationTop">
                                <div class="col-md-12 mb-3">
                                    <div class="col text-center my-4">
                                        <h2 class="">Your participation to this deal is</h2>
                                    </div>
                                    <div class="clear"></div>

                                    <div class="clear"></div>
                                    <div class="col-md-12 mb-3">
                                        <div class="col-md-3 mb-3"></div>
                                        <div class="col-md-6 mb-3">
                                            <input type="text" class="form-control" id="myparticipation"
                                                placeholder="Enter participation amount here" value="" required>
                                            <i class="fa fa-info-circle fl myinfos" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Please enter the amount that you wish to participate in this deal."></i>
                                        </div>
                                        <div class="col-md-3 mb-3"></div>

                                        <div style="margin: 0 auto;text-align: center;width: 100%;">
                                            <div class="alert alert-error showWalletError" role="alert"
                                                style="display: none;margin: 0 auto; width: 50%;">
                                                <strong>Error!</strong> Your participation amount is less than wallet
                                                balance.
                                            </div>
                                        </div>
                                        <span class="groupId" style="display: none"></span>
                                    </div>
                                </div>

                                <div class="clear"></div>
                                <div class="cardsInfo">
                                    <div id="pricing" class="participatePricingBlock">
                                        <div class="container py-4">
                                            <div class="row">
                                                <div class="col text-center my-4">
                                                    <h2 class="headmypro">Choose your pay out method</h2>
                                                </div>
                                            </div>
                                            <div class="alert alert-error displayPayoutError" role="alert"
                                                style="display: none; margin: 0 auto; width: 50%;">
                                                <strong>Error!</strong> Please choose payout method.
                                            </div>
                                            <div class="row">

                                                <div class="theUserISShashLender" style="display:none">
                                                    <!-- Also Oxywheels Investors for -->
                                                    <div class="card border-success text-center">
                                                        <h4
                                                            class="card-header text-white py-4 bg-primary ppcolor loadGrpNameI">
                                                            Satish#OxyFounding Lenders</h4>
                                                        <div class="card-body">

                                                            <ul class="list-group list-group-flush lead">
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="sHash" id="sHashMonthly" />
                                                                    <label for="sHashMonthly"><a data-percentage="1.58%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Monthly Interest
                                                                            pay-out <span
                                                                                data-modalChoosen="monthlyInterest"
                                                                                class="sHASHmonthlyInterest percentageSec1 ">1.58%</span><span>%</span></a>
                                                                    </label>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="sHash" id="sHashQuarterly" />
                                                                    <label for="sHashQuarterly"><a data-percentage="24%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Quarterly
                                                                            Interest <span
                                                                                data-modalChoosen="quartlyInterest"
                                                                                class="sHASHquartlyInterest percentageSec1 ">24%</span><span>%</span>
                                                                            (Please Re-Lend My Funds for Next
                                                                            Deal)</a></label>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="sHash" id="sHashHalfYearly" />
                                                                    <label for="sHashHalfYearly"> <a
                                                                            data-percentage="24%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Half-Yearly
                                                                            Interest Pay-out <span
                                                                                data-modalChoosen="halfInterest"
                                                                                class="sHASHhalfInterest percentageSec1 ">24%</span><span>%</span>
                                                                            (Please Re-Lend My Funds for Next
                                                                            Deal)</a></label>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="sHash" id="sHashYearly" />
                                                                    <label for="sHashYearly"><a data-percentage="24%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Yearly Interest
                                                                            Pay-out <span
                                                                                data-modalChoosen="yearlyInterest"
                                                                                class="sHASHyearlyInterest percentageSec1 ">24%</span><span>%</span>
                                                                            (Please Re-Lend My Funds for Next
                                                                            Deal)</a></label>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="sHash" id="sHashendofthedeal" />
                                                                    <label for="sHashendofthedeal"><a
                                                                            data-percentage="19%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">End of Deal
                                                                            Interest Pay-out <span
                                                                                data-modalChoosen="endofthedealInterest"
                                                                                class="percentageSec1 sHASHendofthedealInterest">19%</span><span>%</span>
                                                                            (Tenure Would be 1-12 Months)</a></label>
                                                                </li>
                                                            </ul>

                                                            <button type="button"
                                                                class="btn btn-primary btn-lg mt-4 ppcolor"
                                                                onclick="participateinthisDeal('Satish#OXYFoundingLenders', '<?php echo $dealId ?>')">Participate
                                                                Now</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="theUserISPremLender" style="disaply:none">
                                                    <div class="card border-success text-center">
                                                        <h4 class="card-header text-white py-4 bg-primary">Oxy Premium
                                                            Lender</h4>
                                                        <div class="card-body">

                                                            <ul class="list-group list-group-flush lead">
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="oxyprem" id="premMonthly" />
                                                                    <label for="premMonthly">
                                                                        <a data-percentage="1.58%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Monthly Interest
                                                                            pay-out <span
                                                                                data-modalChoosen="monthlyInterest"
                                                                                class="percentageSec1 monthlyInterestForOxyPrem">1.58%</span><span>%</span></a>
                                                                    </label>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="oxyprem" id="premQuarterly" />
                                                                    <label for="premQuarterly">
                                                                        <a data-percentage="24%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Quarterly
                                                                            Interest <span
                                                                                data-modalChoosen="quartlyInterest"
                                                                                class="percentageSec1 quartlyInterestOxyPrem">24%</span><span>%</span>
                                                                            (Please Re-Lend My Funds for Next Deal)</a>
                                                                    </label>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="oxyprem" id="premHalf-Yearly" />
                                                                    <label for="premHalf-Yearly">
                                                                        <a data-percentage="24%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Half-Yearly
                                                                            Interest Pay-out <span
                                                                                data-modalChoosen="halfInterest"
                                                                                class="percentageSec1 halfInterestOxyPrem">24%</span><span>%</span>
                                                                            (Please Re-Lend My Funds for Next Deal)</a>
                                                                    </label>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="oxyprem" id="premYearly" />
                                                                    <label for="premYearly">
                                                                        <a data-percentage="24%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Yearly Interest
                                                                            Pay-out <span
                                                                                data-modalChoosen="yearlyInterest"
                                                                                class="percentageSec1 yearlyInterestOxyPrem">24%</span><span>%</span>
                                                                            (Please Re-Lend My Funds for Next Deal)</a>
                                                                    </label>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="oxyprem" id="premEndoftheDeal" />
                                                                    <label for="premEndoftheDeal">
                                                                        <a data-percentage="19%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">End of Deal
                                                                            Interest Pay-out <span
                                                                                data-modalChoosen="endofthedealInterest"
                                                                                class="percentageSec1 endofthedealInterestOxyPrem">19%</span><span>%</span>
                                                                            (Tenure Would be 1-12 Months)</a>
                                                                    </label>
                                                                </li>
                                                            </ul>

                                                            <button type="button" class="btn btn-primary btn-lg mt-4"
                                                                onclick="participateinthisDeal('OxyPremium', '<?php echo $dealId ?>')">Participate
                                                                Now</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-12 mb-4 oxyFoundingLendersSec"
                                                    style="disaply:none">
                                                    <div class="card text-center">
                                                        <h4 class="card-header text-white bg-success py-4">OxyFounding
                                                            Lender</h4>
                                                        <div class="card-body">
                                                            <ul class="list-group list-group-flush lead">
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="OxyFoudningRadio" id="oFoudingM" />

                                                                    <label for="oFoudingM"><a data-percentage="1.58%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Monthly Interest
                                                                            pay-out <span
                                                                                data-modalChoosen="monthlyInterest"
                                                                                class="percentageSec1 oxyfoundingmonthlyInterest">1.58%</span>
                                                                            <span>%</span></a> </label>
                                                                </li>
                                                                <li class="list-group-item">

                                                                    <input class="form-check-input" type="radio"
                                                                        name="OxyFoudningRadio" id="oFoudingQ" />

                                                                    <label for="oFoudingQ">
                                                                        <a data-percentage="24%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Quarterly
                                                                            Interest <span
                                                                                data-modalChoosen="quartlyInterest"
                                                                                class="percentageSec1 oxyfoundingquartlyInterest">24%</span>
                                                                            <span>%</span>
                                                                            (Please Re-Lend My Funds for Next Deal)</a>
                                                                    </label>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="OxyFoudningRadio" id="oFoudingH" />

                                                                    <label for="oFoudingH">
                                                                        <a data-percentage="24%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Half-Yearly
                                                                            Interest Pay-out <span
                                                                                data-modalChoosen="halfInterest"
                                                                                class="percentageSec1 oxyfoundinghalfInterest">24%</span>
                                                                            <span>%</span>
                                                                            (Please Re-Lend My Funds for Next Deal)</a>
                                                                    </label>
                                                                </li>
                                                                <li class="list-group-item">

                                                                    <input class="form-check-input" type="radio"
                                                                        name="OxyFoudningRadio" id="oFoudingY" />

                                                                    <label for="oFoudingY"> <a data-percentage="24%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Yearly Interest
                                                                            Pay-out <span
                                                                                data-modalChoosen="yearlyInterest"
                                                                                class="percentageSec1 oxyfoundingyearlyInterest">24%</span>
                                                                            <span>%</span>
                                                                            (Please Re-Lend My Funds for Next
                                                                            Deal)</a></label>

                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="OxyFoudningRadio" id="oFoudingE" />
                                                                    <label for="oFoudingE">
                                                                        <a data-percentage="19%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">End of Deal
                                                                            Interest Pay-out <span
                                                                                data-modalChoosen="endofthedealInterest"
                                                                                class="percentageSec1 oxyfoundingendofthedealInterest">19%</span><span>%</span>
                                                                            (Tenure Would be 1-12 Months)</a>
                                                                    </label>
                                                                </li>
                                                            </ul>
                                                            <button
                                                                onclick="participateinthisDeal('oxyFoundingLender', '<?php echo $dealId ?>')"
                                                                type="button"
                                                                class="btn btn-success mt-4 btn-lg">Participate
                                                                Now</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-12 mb-4 theUserISNewLender"
                                                    style="disaply:none">
                                                    <div class="card border-success text-center">
                                                        <h4 class="card-header text-white py-4 bg-primary">New Lender
                                                        </h4>
                                                        <div class="card-body">
                                                            <div class="insideCardCopy">
                                                                <ul>
                                                                    <li>If you want to participate in just one deal and
                                                                        Invest amount is less than 5 lakhs, then Paying
                                                                        1% on Investment as a processing fee + GST is
                                                                        good!</li>
                                                                    <li>If you are new to lending and testing the
                                                                        concept, then Paying 1% on Investment as a
                                                                        processing fee + GST is good!</li>
                                                                    <li>No! processing fee for the equity deals.</li>
                                                                </ul>
                                                            </div>

                                                            <h6 class="choospayoutBox">Choose Your Interest Payout
                                                                Method</h6>

                                                            <ul class="list-group list-group-flush lead">
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="newlender" id="newMonthly" />
                                                                    <label for="newMonthly"><a data-percentage="1.58%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Monthly Interest
                                                                            pay-out <span
                                                                                data-modalChoosen="monthlyInterest"
                                                                                class="percentageSec1 monthlyInterest">1.5</span><span>%</span></a>
                                                                    </label>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="newlender" id="newQuarterly" />
                                                                    <label for="newQuarterly"><a data-percentage="24%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Quarterly
                                                                            Interest <span
                                                                                data-modalChoosen="quartlyInterest"
                                                                                class="percentageSec1 quartlyInterest">24%</span><span>%</span>
                                                                            (Please Re-Lend My Funds for Next
                                                                            Deal)</a></label>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="newlender" id="newHalf" />
                                                                    <label for="newHalf"><a data-percentage="24%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Half-Yearly
                                                                            Interest Pay-out <span
                                                                                data-modalChoosen="halfInterest"
                                                                                class="percentageSec1 halfInterest">24%</span><span>%</span>
                                                                            (Please Re-Lend My Funds for Next
                                                                            Deal)</a></label>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="newlender" id="newYearly" />
                                                                    <label for="newYearly"><a data-percentage="24%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Yearly Interest
                                                                            Pay-out <span
                                                                                data-modalChoosen="yearlyInterest"
                                                                                class="percentageSec1 yearlyInterest">24%</span><span>%</span>
                                                                            (Please Re-Lend My Funds for Next
                                                                            Deal)</a></label>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="newlender" id="newendofthedeal" />
                                                                    <label for="newendofthedeal"><a
                                                                            data-percentage="19%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">End of Deal
                                                                            Interest Pay-out <span
                                                                                data-modalChoosen="endofthedealInterest"
                                                                                class="percentageSec1 endofthedealInterest">19%</span><span>%</span>
                                                                            (Tenure Would be 1-12 Months)</a></label>
                                                                </li>
                                                            </ul>

                                                            <button
                                                                onclick="pDealonlyNewLneder('NewLender', '<?php echo $dealId ?>')"
                                                                type="button"
                                                                class="btn btn-primary btn-lg mt-4 newLenderFeeBtn"
                                                                data-fee="" data-from="newLenderBtn">Participate
                                                                Now</button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-6 col-sm-12 mb-4 oxyFoundingLendersSecFee"
                                                    style="disaply:none">
                                                    <div class="card text-center">
                                                        <h4 class="card-header text-white bg-success py-4"><span
                                                                class="fa fa-star"></span> OxyFounding Lender</h4>
                                                        <div class="card-body">
                                                            <div class="insideCardCopy">
                                                                <ul>
                                                                    <li>If you want to participate in multiple deals and
                                                                        Invest amount is greater than 5 lakhs, then
                                                                        Paying INR 5000 annual fee + GST is good!</li>
                                                                    <li>In General, If you are aware of lending, then
                                                                        Paying INR 5000 annual fee + GST is good!</li>
                                                                    <li>No! processing fee for the equity deals.</li>
                                                                </ul>
                                                            </div>

                                                            <h6 class="choospayoutBox">Choose Your Interest Payout
                                                                Method</h6>

                                                            <ul class="list-group list-group-flush lead">
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="oxyfoundingPay" id="oxyFPayMonthly" />
                                                                    <label for="oxyFPayMonthly"><a
                                                                            data-percentage="1.58%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Monthly Interest
                                                                            pay-out <span
                                                                                data-modalChoosen="monthlyInterest"
                                                                                class="percentageSec1 monthlyInterestForOxyFounding">1.58</span><span>%</span></a>
                                                                    </label>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="oxyfoundingPay" id="oxyFQ" />
                                                                    <label for="oxyFQ"><a data-percentage="24%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Quarterly
                                                                            Interest <span
                                                                                data-modalChoosen="quartlyInterest"
                                                                                class="percentageSec1 quartlyInterestOxyFounding">24</span><span>%</span>
                                                                            (Please Re-Lend My Funds for Next
                                                                            Deal)</a></label>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="oxyfoundingPay" id="oxyFH" />
                                                                    <label for="oxyFH"><a data-percentage="24%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Half-Yearly
                                                                            Interest Pay-out <span
                                                                                data-modalChoosen="halfInterest"
                                                                                class="percentageSec1 halfInterestOxyFounding">24</span><span>%</span>
                                                                            (Please Re-Lend My Funds for Next
                                                                            Deal)</a></label>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="oxyfoundingPay" id="oxyFY" />
                                                                    <label for="oxyFY"><a data-percentage="24%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">Yearly Interest
                                                                            Pay-out <span
                                                                                data-modalChoosen="yearlyInterest"
                                                                                class="percentageSec1 yearlyInterestOxyFounding">24</span><span>%</span>
                                                                            (Please Re-Lend My Funds for Next
                                                                            Deal)</a></label>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="oxyfoundingPay" id="oxyEY" />
                                                                    <label for="oxyEY"><a data-percentage="19%"
                                                                            href="javascript:void(0)"
                                                                            onclick="getClickedInfo()">End of Deal
                                                                            Interest Pay-out <span
                                                                                data-modalChoosen="endofthedealInterest"
                                                                                class="percentageSec1 endofthedealInterestOxyFounding">19%</span><span>%</span>
                                                                            (Tenure Would be 1-12 Months)</a></label>
                                                                </li>
                                                            </ul>
                                                            <button
                                                                onclick="pDealonlyNewLneder('oxyFoundingLender', '<?php echo $dealId ?>')"
                                                                data-fee="5900.0" type="button" id="ouxyFeeId"
                                                                data-from="oxyFounderBtn"
                                                                class="btn btn-success mt-4 btn-lg">Participate
                                                                Now</button>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
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
<!-- /.content -->
<div class="modal fade" id="confirm-Participation-Deal" tabindex="-1" role="dialog"
    aria-labelledby="modal-interested-borrower" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>This amount willl be added to your existing participation amount</h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success userConfirmBtn " data-reqID=""
                    onclick="yesAddPartcipatedAmount();">Confirm</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-comfirmSuccess" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label=""><span>CLOSE</span></button>
            </div>
            <div class="modal-body">

                <div class="thank-you-pop">
                    <img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
                    <h1>Congratulations!</h1>
                    <p>
                        We are holding <i class="amountLendEntered"></i> towards <i class="dealNamePop"></i>.<br />
                        Your new wallet balance will be <i class="latestWalletBalance"></i>
                    </p>
                    <a href="viewmyDeals" class="cupon-pop">View Participated Deals
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-processingFeeSuccess" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label=""><span>CLOSE</span></button>
            </div>
            <div class="modal-body">

                <div class="thank-you-pop">
                    <img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
                    <h1>Congratulations!</h1>
                    <p>
                        We are holding INR <i class="feeProcessing"></i> Proceessing Fee towards <i
                            class="dealNamePop"></i>.
                        <!-- <br/>
                            Your new wallet balance will be <i class="latestWalletBalance"></i> -->
                    </p>
                    <!--  <a href="viewmyDeals" class="cupon-pop">View Participated Deals
                        </a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<script id="displayDealsScript" type="text/template">
    {{#data}}
      <tr>
        <td class="displayedDealName">{{dealName}}</td>
        <td>{{dealAmount}}</td>
        <td>{{borrowerName}}</td>
        <td>{{duration}}</td>
        <td>{{fundStartDate}}</td>
        <td>{{fundEndDate}}</td>
        <td>{{lenderParticiptionLimit}}</td>
    </tr>            
  {{/data}}
</script>

<div class="modal fade" id="equityDealConfirmationFromLenderNEW" role="dialog"
    aria-labelledby="dealConfirmationFromLender">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label=""><span>CLOSE</span></button>
            </div>
            <div class="modal-body">
                <div class="thank-you-pop">
                    <img src="<?php echo base_url(); ?>/assets/images/yellow-circle-info.jpg" width="100" alt="">
                    <h3 class="text-center">Please review the lending details!</h3>
                    <div class="bodyContentNewPopUp">
                        <label>Lending Amount :-</label> <span class="amountLendEntered">200000</span></b><br />
                        <label>Deal Name :-</label> <span class="dealNamePop">Deal Nadergul</span></b><br />
                        <label>RoI :-</label> <span class="dealRoI">21</span><br />
                        <label>Pay-out Method :</label> <span class="tupeOfInt"></span>.
                        <label>Processing Fee :</label> <b> 0 </b>.
                        <br /><br />

                    </div>
                    <div class="clear"></div>
                    <div class="popbtns">
                        <button type="button" class="btn btn-success btn-lg yesBTN4Equity" data-reqID="" data-type=""
                            onclick="submitPaticipation()">Yes, Confirm & Pay</button>

                        <button type="button" class="btn btn-danger btn-lg noBTN4Equity" data-dismiss="modal">No, I want
                            to change</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="lenderPaymentTransactions" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label=""><span>CLOSE</span></button>
            </div>
            <div class="modal-body">
                <div align="center">
                    <h4>you want to pay INR <b><span class="calProcessingFee" style="font-size: 16px;"></span></b>
                        processing fee through your Wallet/PayU?</h4>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-success yesPayFrom" data-clickedid=""
                    onclick="yesPayThrouhWallets();">Wallet</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-info btn-lg" onclick="payThrouhWallets();"
                    data-clickedid="">PayU</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="dealConfirmationFromLender" role="dialog" aria-labelledby="dealConfirmationFromLender">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label=""><span>CLOSE</span></button>
            </div>
            <div class="modal-body">
                <div class="thank-you-pop">
                    <img src="<?php echo base_url(); ?>/assets/images/yellow-circle-info.jpg" width="100" alt="">
                    <h3 class="text-center">Please review the lending details!</h3>
                    <div class="bodyContentNewPopUp">
                        <label>Lending Amount :-</label> <span class="amountLendEntered">200000</span></b><br />
                        <label>Deal Name :-</label> <span class="dealNamePop">Deal Nadergul</span></b><br />
                        <label>RoI :-</label> <span class="dealRoI">21</span>
                        <span>% </span><br />
                        <label>Pay-out Method :</label> <span class="tupeOfInt"></span>.
                        <br /><br />
                    </div>
                    <div class="clear"></div>
                    <div class="popbtns">
                        <button type="button" class="btn btn-success btn-lg yesBTN4Deal" data-reqID="" data-type=""
                            onclick="yesLetmePartcipate()">Yes, Confirm</button>

                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">No, I want to
                            change</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="lenderParticiptionAdd" role="dialog" aria-labelledby="lenderParticiptionAdd">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label=""><span>CLOSE</span></button>
            </div>
            <div class="modal-body">
                <div class="thank-you-pop">
                    <img class="revieImage" src="<?php echo base_url(); ?>/assets/images/review1.jpg" alt="">


                    <div class="bodyContentNewParticipation">
                        <p class="participat-Text"> You have already participated in this deal with INR <span
                                class="participated-Amount text-bold"> INR 00000</span>.
                        <div class="addParticipation-Text">



                            <p class="yes">If You Want to participate with INR <span
                                    class="currentParticipationAmount text-bold">INR 1000 </span> more, Your
                                Participation Amount Will be INR:<span
                                    class="nEWparticaipationAmount text-bold">400000</span>

                                <button type="button" class="btn btn-success btn-sm yesBTN4Deal" data-reqID=""
                                    data-type="" onclick="lenderConfirmParticipationDeal()">Confirm</button>
                            </p>
                        </div>


                        <!-- <div class="addParticipation-Text">
                           <p class="Update">If You Want to participate with  INR <span class="currentParticipationAmount text-bold">INR 10000</span>,Your Participation Amount will be INR:<span class="currentParticipationAmount text-bold"></span>

                             <button type="button" class="btn btn-success btn-sm updateBTNDeal" data-reqID="UPDATE" data-type="" onclick="yesUpdatePartcipationAmount()">Please,Confirm</button></p>
                              </div> -->



                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="dealConfirmationFromLenderNEW" role="dialog"
        aria-labelledby="dealConfirmationFromLender">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label=""><span>CLOSE</span></button>
                </div>
                <div class="modal-body">
                    <div class="thank-you-pop">
                        <img src="<?php echo base_url(); ?>/assets/images/yellow-circle-info.jpg" width="100" alt="">
                        <h3 class="text-center">Please review the lending details!</h3>
                        <div class="bodyContentNewPopUp">
                            <label>Lending Amount :-</label> <span class="amountLendEntered">200000</span></b><br />
                            <label>Deal Name :-</label> <span class="dealNamePop">Deal Nadergul</span></b><br />
                            <label>RoI :-</label> <span class="dealRoI">21</span>
                            <span>%</span><br />
                            <label>Pay-out Method :</label> <span class="tupeOfInt"></span>.
                            <label>Processing Fee :</label> <b><span class="processingFeeNew"></span></b>.
                            <br /><br />

                        </div>
                        <div class="clear"></div>
                        <div class="popbtns">
                            <button type="button" class="btn btn-success btn-lg yesBTN4Deal" data-reqID="" data-type=""
                                onclick="yesLetmePartcipateForNEWLENDER()">Yes, Confirm & Pay</button>

                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">No, I want to
                                change</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="paymentFailed" role="dialog" aria-labelledby="paymentFailed">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label=""><span>CLOSE</span></button>
            </div>
            <div class="modal-body">
                <div class="thank-you-pop">
                    <img src="<?php echo base_url(); ?>/assets/images/red-circle-danger.jpg" width="100" alt="">
                    <h3 class="text-center">Payment failed, Please try again<h3>
                            <div>
                                If it the payment is deducted from your account, pelase contact subbu@oxyloans.com
                            </div>
                            <div class="clear"></div>
                            <div class="popbtns">
                                <button type="button" class="btn btn-info btn-lg" data-dismiss="modal">Please try
                                    again.</button>
                            </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="left">
                    <h4>Congratulations!</h4>


                </div>
            </div>
            <div class="modal-footer">
                <div class="thisisYESbtnajaxImg" style="display: none;">
                    <img src="<?php echo base_url(); ?>/assets/images/loading.gif?oxy=1" width="50" />
                </div>



            </div>
        </div>
    </div>
</div>
<div class="modal modal-warning fade" id="modal-exceedingLimit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text1">You have exceeded the participation limit.Please check and participate again</p>
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
<!-- Fee Details -->

<!-- Fee Details ENDS-->

<div class="modal fade" id="newlenderParticiptionAddUpdate" role="dialog" aria-labelledby="lenderParticiptionAdd">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label=""><span>CLOSE</span></button>
            </div>
            <div class="modal-body">
                <div class="thank-you-pop">
                    <img class="revieImage" src="<?php echo base_url(); ?>/assets/images/review1.jpg" alt="">
                    <!--  <h3 class="text-center">Please review the lending details!</h3> -->

                    <div class="bodyContentNewParticipation">
                        <p class="participat-Text"> You have already participated in this deal with INR <span
                                class="participated-Amount text-bold"> 00000</span>, Do you want to Add/Update INR <span
                                class="participated-new-Amount text-bold">00000</span>, To The existing amount Please
                            Confirm.</p>

                        <p class="yes">If You Want to Add INR <span class="currentParticipationAmount">INR 1000
                            </span>,Your Participation Amount Will be : INR <span
                                class="nEWparticaipationAmount">400000</span></p>

                        <p class="Update">If You Want Update INR <span class="currentParticipationAmount">INR
                                10000</span>,Your Participation Amount will be : INR <span
                                class="currentParticipationAmount"></span></p>



                        <!-- <label>Lending Amount :-</label> <span class="amountLendEntered">200000</span></b><br/>
                            <label>Deal Name :-</label> <span class="dealNamePop">Deal Nadergul</span></b><br/>
                            <label>RoI :-</label> <span class="dealRoI">21</span>
                            <span>% Per Annum.</span><br/>
                            <label>Pay-out Method :</label> <span class="tupeOfInt"></span>.
                        <br/><br/> -->
                    </div>
                    <div class="clear"></div>
                    <div class="btnsADDudate">
                        <button type="button" class="btn btn-success btn-lg yesBTN4Deal" data-reqID="" data-type=""
                            onclick="newLenderPartcipatedAmount()">ADD, Confirm</button>

                        <button type="button" class="btn btn-success btn-lg updateBTNDeal" data-reqID="UPDATE"
                            data-type="" onclick="newLenderUpdatePartcipationAmount()">Update</button>
                    </div>
                    <!--  <div class="clear"></div>
                      <div class="confirmationMessage">
                        <span class=""></span>

                    </div> -->
                </div>
            </div>
        </div>
    </div>






    <div class="modal fade" id="dealConfirmationFromLenders" role="dialog" aria-labelledby="dealConfirmationFromLender">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label=""><span>CLOSE</span></button>
                </div>
                <div class="modal-body">
                    <div class="thank-you-pop">
                        <img src="<?php echo base_url(); ?>/assets/images/yellow-circle-info.jpg" width="100" alt="">
                        <h3 class="text-center">Please review the lending details!</h3>
                        <div class="bodyContentNewPopUp">
                            <label>Lending Amount :-</label> <span class="amountLendEntered">200000</span></b><br />
                            <label>Deal Name :-</label> <span class="dealNamePop">Deal Nadergul</span></b><br />
                            <label>RoI :-</label> <span class="dealRoI">21</span>
                            <span>%</span><br />
                            <label>Pay-out Method :</label> <span class="tupeOfInt"></span>.
                            <br /><br />
                        </div>
                        <div class="clear"></div>
                        <div class="popbtns">
                            <button type="button" class="btn btn-success btn-lg yesBTN4Deal" data-reqID="" data-type=""
                                onclick="yesUpdatePartcipationAmount()">Yes, Confirm</button>

                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">No, I want to
                                change</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="addDealConfirmationFromLender" role="dialog"
        aria-labelledby="dealConfirmationFromLender">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label=""><span>CLOSE</span></button>
                </div>
                <div class="modal-body">
                    <div class="thank-you-pop">
                        <img src="<?php echo base_url(); ?>/assets/images/yellow-circle-info.jpg" width="100" alt="">
                        <h3 class="text-center">Please review the lending details!</h3>
                        <div class="bodyContentNewPopUp">
                            <label>Lending Amount :-</label> <span class="amountLendEntered">200000</span></b><br />
                            <label>Deal Name :-</label> <span class="dealNamePop">Deal Nadergul</span></b><br />
                            <label>RoI :-</label> <span class="dealRoI">21</span>
                            <span>%.</span><br />
                            <label>Pay-out Method :</label> <span class="tupeOfInt"></span>.
                            <br /><br />
                        </div>
                        <div class="clear"></div>
                        <div class="popbtns">
                            <button type="button" class="btn btn-success btn-lg yesBTN4Deal" data-reqID="" data-type=""
                                onclick="yesAddPartcipatedAmount()">Yes, Confirm</button>

                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">No, add</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="addDealConfirmationFromLenderNEW" role="dialog"
        aria-labelledby="dealConfirmationFromLender">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label=""><span>CLOSE</span></button>
                </div>
                <div class="modal-body">
                    <div class="thank-you-pop">
                        <img src="<?php echo base_url(); ?>/assets/images/yellow-circle-info.jpg" width="100" alt="">
                        <h3 class="text-center">Please review the lending details!</h3>
                        <div class="bodyContentNewPopUp">
                            <label>Lending Amount :-</label> <span class="amountLendEntered">200000</span></b><br />
                            <label>Deal Name :-</label> <span class="dealNamePop">Deal Nadergul</span></b><br />
                            <label>RoI :-</label> <span class="dealRoI">21</span>
                            <span>%</span><br />
                            <label>Pay-out Method :</label> <span class="tupeOfInt"></span>.
                            <label>Processing Fee :</label> <b><span class="processingFeeNew"></span></b>.
                            <br /><br />

                        </div>
                        <div class="clear"></div>
                        <div class="popbtns">
                            <button type="button" class="btn btn-success btn-lg yesBTN4Deal" data-reqID="" data-type=""
                                onclick="newLenderPartcipatedAmount()">Yes, Confirm & Pay</button>

                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">No, new want to
                                change</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $paymentStatus; ?>

<style type="text/css">
.list-group-item label {
    width: 85%;
    font-weight: normal;
}

.list-group-item label a {
    width: 100%;
}

input[type=radio] {
    vertical-align: top;
}
</style>
<!-- <script type="text/javascript">
  <?php if($paymentStatus == "failure" && $dealId == 0){?>
     window.onload = loadFalureFunc();
  <?php } else if ($paymentStatus == "success"){ ?>
    console.log("payment call success");
    $(document).ready(function () {
        $(".loadingSec").show();
    });
    feePayementisDone = "PAID";
    window.onload = loadParticipationSuccess();
  <?php } else {?>
    $(".loadingSec").show();
    window.onload = viewSingleDeal("<?php echo $dealId; ?>");
  <?php } ?>
  
</script>     -->
<!-- /.content -->

<!-- <div class="loadingSec" style="display: none;text-align:center;">
    <img src="<?php echo base_url(); ?>/assets/images/loading.gif?oxy=1" width="125"/>
</div> -->


<!-- <script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="3c8dbc" bolt-logo="https://oxyloans.com/wp-content/themes/oxyloan/oxyloan/_ui/images/logo4.png"></script> -->

<!-- <script type="text/javascript"><!--
  function launchBOLT() {
    bolt.launch({
      key: $('#key').val(),
      salt: $('#salt').val(),
      txnid: $('#txnid').val(), 
      hash: $('#hash').val(),
      amount: $('#amount').val(),
      firstname: $('#fname').val(),
      email: $('#email').val(),
      phone: $('#mobile').val(),
      productinfo: $('#pinfo').val(),
      udf5: $('#udf5').val(),
      surl : $('#surl').val(),
      furl: $('#surl').val(),
      mode: 'dropout'
    },
    { 
      responseHandler: function(BOLT){
      console.log( BOLT.response.txnStatus );   
      console.log( BOLT.response.mihpayid );   
      console.log( BOLT.response.status );   
    },
      catchException: function(BOLT){
      alert( BOLT.message );
    }
    });
  }
//--
</script> -->

<!-- 

<?php echo $msg; 
      echo $key; ?>
<?php if ($paymentStatus == "success"){ ?>
    <script type="text/javascript">
        alert("loading...");
        updateLenderFeeDetails(<?php echo "'";?><?php echo $txnid; ?><?php echo "'";?>,<?php echo "'";?><?php echo $mihpayid; ?><?php echo "'";?>,<?php echo "'";?><?php echo $status; ?><?php echo "'";?>);
    </script>
<?php } ?>
<?php include 'footer.php';?> -->