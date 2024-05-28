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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="particpatedPage" style="height: 1100px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Welcome to <span class="deal-Name" style="font-size: 18px; font-weight: bold;"></span>
            Deal</h1><br /><br />
        <div class="row">
            <!-- cashfree account -->
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
        </div>


        <div class="col-xs-12">
            <div class="box box-primary" style="height: 150vh!important;">
                <div class="box-body">
                    <h3>Deal Info</h3>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="mobileDiv_4">
                            <tr id="example">
                                <th> Name</th>
                                <th>Value</th>
                                <th>Available Limit</th>
                                <th>Tenure</th>
                                <th>ROI</th>
                                <th>Payout</th>
                                <th>Min Amount</th>
                                <th>Max Amount</th>
                            </tr>

                        </thead>
                        <tbody id="displayDealsData" class="mobileDiv_3">

                        </tbody>
                    </table>
                    <div class="clear"></div>
                    <div class="fundingStatus-Closed" style="display:none">
                        This Deal is Closed.
                    </div>

                    <div class="fundingStatus-Happening">
                        <div class="form-row participationTop">
                            <div class="row col-md-12 amountPrincipal">

                                <div class="principalTransferMethod col-md-12">

                                    <div class="movePrincipalTObank_transfer">
                                        <div class="participation_text">
                                            Return Principal To :

                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="moveprincipal" value="WALLET">
                                            <label class="wallet"> Principal To Wallet</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="moveprincipal" value="BANKACCOUNT">
                                            <label class="wallet">Principal To Bank</label>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="clear"></div>
                            <div class="clear"></div>
                            <div class="col-md-12 mb-3">

                                     <div class="text-center note_wallet_selection"  style="margin-top:30px;display: none;">
                                     <span  style=" font-family: sans-serif; line-height: 20px; font-size:14px"><code>Note : </code> As per the new RBI guidelines, the option to transfer money back to the wallet is being disabled. We apologize for the inconvenience </span>
                                </div> 
                                <div></div>

                                <div class="col-md-12 mb-3 deal-participation_amount">
                                    <div class="note text-center text-bold NewLender_NoteDiv" style="display:none">
                                        <h3 class="NewLender_NotePoint"><code>Note:</code>You are requested to pay a 1%
                                            processing fee on your Lending Amount.<h3>
                                    </div>
                                    </br>
                                    <div class="col my-4">
                                        <h4 class="text-center participation_text_div">Your participation to this deal
                                            is </h4>
                                    </div>
                                    <div class="col-md-3 mb-3"></div>
                                    <div class="col-md-6 mb-3">

                                        <input type="text" class="form-control" id="myparticipation"
                                            placeholder="Enter participation amount here" value="" required>
                                        <i class="fa fa-info-circle fl myinfos mobile_View_Hide" data-toggle="tooltip"
                                            data-placement="top"
                                            title="Please enter the amount that you wish to participate in this deal."></i>



                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <div class="btn btn-lg btn-success new_btn_NewLender_participation"
                                            onclick="pDealonlyNewLneder('ISNewLender', '<?php echo $dealId ?>')"> <i
                                                class="fa fa fa-angle-double-right"></i> Participate</div>
                                    </div>



                                    <div style="margin: 0 auto;text-align: center;width: 100%;">
                                        <div class="alert alert-error showWalletError" role="alert"
                                            style="display: none;margin: 0 auto; width: 50%;">
                                            <strong>Error!</strong> Your participation amount is greater than your
                                            wallet balance.
                                        </div>
                                    </div>

                                </div>
                                <span class="groupId" style="display: none"></span>
                            </div>


                            <!-- <div class="clear"></div> -->

                            <!--        <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 switchCondition" style="display:none">
                                    <label class="switch mx-5">
                                        <input type="checkbox" checked value="INTEREST" name="checkDealExtension">
                                        <span class="slider round"></span>
                                    </label>
                                    <span class="checkIsDurationIncrement">
                                        Deal Extension Consents ?
                                    </span>
                                </div>
                                <div class="col-md-3"></div>
                            </div> -->

                            <!--   <div class="movePrincipalTObank_transfer">

                                <h1>Transfer principal payment method </h1>
                                <span class="move_principal"> <input type="radio" name="moveprincipal" value="WALLET">
                                    <label class="wallet">Move Principal to wallet</label></span>


                                <span class="move_Wallet"><input type="radio" name="moveprincipal" value="BANKACCOUNT">
                                    <label class="wallet">Move Principal to Bank</label></span>



                                <p class="error move_principal_error"
                                    style="display:none; color: red ; font-weight: bold; font-size: 14px; letter-spacing: 1px; text-transform:uppercase; margin-left: 46px; margin-top:4px">
                                    Error: PLEASE SELECT A TRANSFER METHOD.</p>

                            </div> -->
                            <!-- <div class="clear"></div> -->


                            <div class="cardsInfo">
                                <div id="pricing" class="participatePricingBlock">
                                    <div class="container py-4">
                                        <div class="row" style="display:none">
                                            <div class="col text-center my-4">
                                                <h2 class="headmypro">Choose your Membership Plans</h2>
                                            </div>
                                        </div>
                                        <div class="alert alert-error displayPayoutError" role="alert"
                                            style="display: none; margin: 0 auto; width: 50%;">
                                            <strong>Error!</strong> Please choose payout method.
                                        </div>

                                        <div class="newLenderMembershipOption row text-center" style="display:none">


                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="newlendermembership"
                                                    id="multiplenew" value="multipledeals"
                                                    onchange="handleChangeNewmembership(this)" checked>
                                                <label class="form-check-label" for="multiplenew">Multiple Deals
                                                    Participation</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="newlendermembership"
                                                    id="perdealnew" value="perdeal"
                                                    onchange="handleChangeNewmembership(this)">
                                                <label class="form-check-label" for="perdealnew">Per Deal
                                                    Participation</label>
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 mb-4 theUserISPremLender"
                                                style="display:none">
                                                <div class="card border-success text-center">
                                                    <h4 class="card-header text-white py-4 bg-primary">Oxy Premium
                                                        Lender</h4>
                                                    <div class="card-body">

                                                        <h6 class="choospayoutBox">Choose Your Interest Payout
                                                            Method</h6>


                                                        <ul class="list-group list-group-flush lead">
                                                            <li class="list-group-item premMonthlycheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="oxyprem" id="premMonthly" />
                                                                <label for="premMonthly">
                                                                    <a data-percentage="1.58%" href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Monthly Interest
                                                                        pay-out <span
                                                                            data-modalChoosen="monthlyInterest"
                                                                            class="percentageSec1 monthlyInterestForOxyPrem hidden"></span>
                                                                        <span class="OxyPremmonthly">%</span></a>
                                                                </label>
                                                            </li>
                                                            <li class="list-group-item premQuarterlycheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="oxyprem" id="premQuarterly" />
                                                                <label for="premQuarterly">
                                                                    <a data-percentage="24%" href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Quarterly
                                                                        Interest <span
                                                                            data-modalChoosen="quartlyInterest"
                                                                            class="percentageSec1 quartlyInterestOxyPrem hidden">24%</span>
                                                                        <span class="OxyPremquartly">%</span>
                                                                    </a>
                                                                </label>
                                                            </li>
                                                            <li class="list-group-item halfInterestOxyPremCheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="oxyprem" id="premHalf-Yearly" />
                                                                <label for="premHalf-Yearly">
                                                                    <a data-percentage="24%" href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Half-Yearly
                                                                        Interest Pay-out <span
                                                                            data-modalChoosen="halfInterest"
                                                                            class="percentageSec1 halfInterestOxyPrem hidden">24%</span>
                                                                        <span class="OxyPremhalfYearly">%</span>
                                                                    </a>
                                                                </label>
                                                            </li>
                                                            <li class="list-group-item yearlyInterestOxyPremcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="oxyprem" id="premYearly" />
                                                                <label for="premYearly">
                                                                    <a data-percentage="24%" href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Yearly Interest
                                                                        Pay-out <span data-modalChoosen="yearlyInterest"
                                                                            class="percentageSec1 yearlyInterestOxyPrem hidden">24%</span>
                                                                        <span class="OxyPremyearly">%</span>
                                                                    </a>
                                                                </label>
                                                            </li>
                                                            <li class="list-group-item premEndoftheDealCheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="oxyprem" id="premEndoftheDeal" />
                                                                <label for="premEndoftheDeal">
                                                                    <a data-percentage="19%" href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">End of Deal
                                                                        Interest Pay-out <span
                                                                            data-modalChoosen="endofthedealInterest"
                                                                            class="percentageSec1 endofthedealInterestOxyPrem">19%</span><span>%</span>
                                                                    </a>
                                                                </label>
                                                            </li>


                                                        </ul>

                                                    </div>

                                                    <div class="card-footer">

                                                        <button type="button"
                                                            class="btn btn-primary btn-lg mt-4 hide-btn"
                                                            onclick="participateinthisDeal('OxyPremium', '<?php echo $dealId ?>')">Participate
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 mb-4 theUserISNewLenderOXYMAR09"
                                                style="display:none">
                                                <div class="card border-success text-center">
                                                    <h4 class="card-header text-white py-4 bg-primary">OXY FOUNDING
                                                        LENDER </h4>
                                                    <div class="card-body">

                                                        <div class="insideCardCopy" style="display:none;">
                                                            <ul>
                                                                <li>If you want to participate in multiple deals and
                                                                    Invest amount is greater than 5 lakhs, then
                                                                    Paying INR 5000 annual fee + GST is good!</li>
                                                                <li>In General, If you are aware of lending, then
                                                                    Paying INR 5000 annual fee + GST is good!</li>

                                                            </ul>
                                                        </div>

                                                        <h6 class="choospayoutBox">Choose Your Interest Payout
                                                            Method</h6>
                                                        <ul class="list-group list-group-flush lead">
                                                            <li class="list-group-item monthlyInterestcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="newlender" id="newMonthly" />
                                                                <label for="newMonthly"><a data-percentage="1.58%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Monthly Interest
                                                                        pay-out <span
                                                                            data-modalChoosen="monthlyInterest"
                                                                            class="percentageSec1 monthlyInterest hidden"></span><span
                                                                            class="OXYMARCH09monthly"></span></a>
                                                                </label>
                                                            </li>
                                                            <li class="list-group-item quartlyInterestcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="newlender" id="newQuarterly" />
                                                                <label for="newQuarterly"><a data-percentage="24%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Quarterly
                                                                        Interest <span
                                                                            data-modalChoosen="quartlyInterest"
                                                                            class="percentageSec1 quartlyInterest hidden"></span><span
                                                                            class="OXYMARCH09quartly">%</span>
                                                                    </a></label>
                                                            </li>
                                                            <li class="list-group-item halfInterestcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="newlender" id="newHalf" />
                                                                <label for="newHalf"><a data-percentage="24%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Half-Yearly
                                                                        Interest Pay-out <span
                                                                            data-modalChoosen="halfInterest"
                                                                            class="percentageSec1 halfInterest hidden"></span><span
                                                                            class="OXYMARCH09halfYearly"></span>
                                                                    </a></label>
                                                            </li>
                                                            <li class="list-group-item yearlyInterestcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="newlender" id="newYearly" />
                                                                <label for="newYearly"><a data-percentage="24%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Yearly Interest
                                                                        Pay-out <span data-modalChoosen="yearlyInterest"
                                                                            class="percentageSec1 yearlyInterest hidden"></span>
                                                                        <span class="OXYMARCH09yearly">
                                                                        </span>
                                                                    </a></label>
                                                            </li>
                                                            <li class="list-group-item endofthedealInterestcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="newlender" id="newendofthedeal" />
                                                                <label for="newendofthedeal"><a data-percentage="19%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">End of Deal
                                                                        Interest Pay-out <span
                                                                            data-modalChoosen="endofthedealInterest"
                                                                            class="percentageSec1 endofthedealInterest hidden"></span><span
                                                                            class="OXYMARCH09Endofthedeal"></span>
                                                                    </a></label>
                                                            </li>
                                                        </ul>

                                                    </div>

                                                    <div class="card-footer">
                                                        <button
                                                            onclick="participateinthisDeal('OXYMARCH09', '<?php echo $dealId ?>')"
                                                            type="button"
                                                            class="btn btn-primary btn-lg mt-4 newLenderFeeBtn"
                                                            data-fee="" data-from="newLenderBtn">Participate
                                                            Now</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 mb-4 oxyFoundingLendersSecFee"
                                                style="display:none">
                                                <div class="card text-center ">
                                                    <h4 class="card-header text-white bg-success py-4"><span
                                                            class="fa fa-star"></span> Multiple Deals Participation
                                                    </h4>
                                                    <div class="card-body">
                                                        <!-- OxyFounding Lender -->
                                                        <div class="insideCardCopy">
                                                            <ul>
                                                                <li>If you want to participate in multiple deals and
                                                                    your investment amount exceeds 5 lakhs, it's
                                                                    advisable to pay an annual membership fee along with
                                                                    GST.</li>
                                                                <li>In general, if you are well-acquainted with lending,
                                                                    opting for the annual fee, plus GST, is a wise
                                                                    choice.</li>

                                                                <li>You can conveniently make your membership payment
                                                                    using either a wallet or a payment gateway.</li>

                                                            </ul>
                                                        </div>


                                                        <div class="row membershipBlock">
                                                            <label class="choospayoutBox"> Choose Your
                                                                membership Tenure</label>
                                                            <select class="form-control form-select custom-select"
                                                                id="membershipTenure">
                                                                <option value="">--- Select Membership Tenure ---

                                                                </option>
                                                                <option value="MONTHLY"> Monthly</option>
                                                                <option value="QUARTERLY">Quarterly</option>
                                                                <option value="HALFYEARLY">Half-Yearly
                                                                </option>
                                                                <option value="PERYEAR">Yearly</option>
                                                                <option value="FIVEYEARS">Five Years</option>
                                                                <option value="TENYEARS">Ten Year</option>
                                                                <option value="LIFETIME">Life Time</option>

                                                            </select>

                                                            <span class="text-green  text-bold tenure-info note_fee_new"
                                                                style="display:none;">Your
                                                                membership amount will be INR
                                                                <span class="membershipAmount">0</span></span>



                                                        </div>

                                                        <h6 class="choospayoutBox">Choose Your Interest Payout
                                                            Method</h6>

                                                        <ul class="list-group list-group-flush lead">
                                                            <li
                                                                class="list-group-item monthlyInterestForOxyFoundingcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="oxyfoundingPay" id="oxyFPayMonthly" />
                                                                <label for="oxyFPayMonthly"><a data-percentage="1.58%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Monthly Interest
                                                                        pay-out <span
                                                                            data-modalChoosen="monthlyInterest"
                                                                            class="percentageSec1 monthlyInterestForOxyFounding hidden">1.58</span>
                                                                        <span class="oxyfoundmonthly"></span></a>
                                                                </label>
                                                            </li>
                                                            <li class="list-group-item quartlyInterestOxyFoundingcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="oxyfoundingPay" id="oxyFQ" />
                                                                <label for="oxyFQ"><a data-percentage="24%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Quarterly
                                                                        Interest <span
                                                                            data-modalChoosen="quartlyInterest"
                                                                            class="percentageSec1 quartlyInterestOxyFounding hidden">24</span>
                                                                        <span class="oxyfoundquartly"></span>
                                                                    </a></label>
                                                            </li>
                                                            <li class="list-group-item halfInterestOxyFoundingcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="oxyfoundingPay" id="oxyFH" />
                                                                <label for="oxyFH"><a data-percentage="24%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Half-Yearly
                                                                        Interest Pay-out <span
                                                                            data-modalChoosen="halfInterest"
                                                                            class="percentageSec1 halfInterestOxyFounding hidden">24</span>
                                                                        <span class="oxyfoundhalfYearly">%</span>
                                                                    </a></label>
                                                            </li>
                                                            <li class="list-group-item yearlyInterestOxyFoundingcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="oxyfoundingPay" id="oxyFY" />
                                                                <label for="oxyFY"><a data-percentage="24%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Yearly Interest
                                                                        Pay-out <span data-modalChoosen="yearlyInterest"
                                                                            class="percentageSec1 yearlyInterestOxyFounding hidden">24</span>
                                                                        <span class="oxyfoundyearly">%</span>
                                                                    </a></label>
                                                            </li>
                                                            <li
                                                                class="list-group-item endofthedealInterestOxyFoundingcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="oxyfoundingPay" id="oxyEY" />
                                                                <label for="oxyEY"><a data-percentage="19%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">End of Deal
                                                                        Interest Pay-out <span
                                                                            data-modalChoosen="endofthedealInterest"
                                                                            class="percentageSec1 endofthedealInterestOxyFounding">19%</span><span>%</span>
                                                                    </a></label>
                                                            </li>
                                                        </ul>

                                                    </div>

                                                    <div class="card-footer">
                                                        <button
                                                            onclick="pDealonlyNewLneder('ISNewLenderFee', '<?php echo $dealId ?>')"
                                                            data-fee="" type="button" id="ouxyFeeId"
                                                            data-from="oxyFounderBtn" data-minimum=""
                                                            class="btn btn-success newLenderFeeBtnfee mt-4 btn-lg">Participate
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 mb-4 theUserISNewLender"
                                                style="display:none">
                                                <div class="card border-success text-center">
                                                    <h4 class="card-header text-white py-4 bg-primary"><span
                                                            class="fa fa-star"> </span>Single Deal Participate
                                                    </h4>
                                                    <div class="card-body">
                                                        <div class="insideCardCopy insideCard_Ul" style="display:none">

                                                            <div>
                                                                <h3><code>Note : </code><b> 1% fee on the participation
                                                                        amount</b></h3>
                                                            </div>
                                                            <ul>
                                                                <li class="feeContent">If you want to participate in a
                                                                    single deal with an investment of less than 5 lakhs,
                                                                    paying a 1% processing fee on your investment, plus
                                                                    GST, is a favorable option.
                                                                </li>
                                                                <li class="feeContent">
                                                                    If you are new to lending and are testing the
                                                                    concept, paying a 1% processing fee on your
                                                                    investment, along with GST, is a suitable choice.
                                                                </li>

                                                                <li>You can make your membership payment using either a
                                                                    wallet or a payment gateway.</li>


                                                            </ul>
                                                        </div>




                                                        <!--  <h6 class="choospayoutBox">Choose Your Interest Payout
                                                            Method
                                                        </h6> -->

                                                        <ul class="list-group list-group-flush lead">
                                                            <li class="list-group-item monthlyInterestcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="newlender" id="newMonthly" />
                                                                <label for="newMonthly"><a data-percentage="1.58%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Monthly Interest
                                                                        pay-out <span
                                                                            data-modalChoosen="monthlyInterest"
                                                                            class="percentageSec1 monthlyInterest hidden">1.5</span>
                                                                        <span class="newlenderMonthly">%</span></a>
                                                                </label>
                                                            </li>
                                                            <li class="list-group-item quartlyInterestcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="newlender" id="newQuarterly" />
                                                                <label for="newQuarterly"><a data-percentage="24%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Quarterly
                                                                        Interest <span
                                                                            data-modalChoosen="quartlyInterest"
                                                                            class="percentageSec1 quartlyInterest hidden">24%</span>
                                                                        <span class="newlenderquartly">%</span>
                                                                    </a></label>
                                                            </li>
                                                            <li class="list-group-item halfInterestcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="newlender" id="newHalf" />
                                                                <label for="newHalf"><a data-percentage="24%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Half-Yearly
                                                                        Interest Pay-out <span
                                                                            data-modalChoosen="halfInterest"
                                                                            class="percentageSec1 halfInterest hidden">24%</span>
                                                                        <span class="newlenderhalfYearly">%</span>
                                                                    </a></label>
                                                            </li>
                                                            <li class="list-group-item yearlyInterestcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="newlender" id="newYearly" />
                                                                <label for="newYearly"><a data-percentage="24%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Yearly Interest
                                                                        Pay-out <span data-modalChoosen="yearlyInterest"
                                                                            class="percentageSec1 yearlyInterest hidden">24%</span>
                                                                        <span class="newlenderyearly">%</span>
                                                                    </a></label>
                                                            </li>
                                                            <li class="list-group-item endofthedealInterestcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="newlender" id="newendofthedeal" />
                                                                <label for="newendofthedeal"><a data-percentage="19%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">End of Deal
                                                                        Interest Pay-out <span
                                                                            data-modalChoosen="endofthedealInterest"
                                                                            class="percentageSec1 endofthedealInterest">19%</span><span>%</span>
                                                                    </a></label>
                                                            </li>
                                                        </ul>


                                                    </div>

                                                    <div class="card-footer">
                                                        <button
                                                            onclick="pDealonlyNewLneder('ISNewLender', '<?php echo $dealId ?>')"
                                                            type="button"
                                                            class="btn btn-primary btn-lg mt-4 newLenderFeeBtn feePayment-Btn"
                                                            data-fee="" data-minimum=""
                                                            data-from="newLenderBtn">Participate </button>
                                                    </div>
                                                </div>
                                            </div>










                                            <div class="col-md-6 col-sm-12 mb-4 theUserISNewLendervalidityExpire"
                                                style="display:none">
                                                <div class="card border-success text-center">
                                                    <h4 class="card-header text-white py-4 bg-primary">Per Deal
                                                        Participation
                                                    </h4>
                                                    <div class="card-body">
                                                        <div class="insideCardCopy insideCard_Ul" style="display:none">
                                                            <ul>
                                                                <li class="feeContent">If you want to participate in a
                                                                    single deal with an investment of less than 5 lakhs,
                                                                    paying a 1% processing fee on your investment, plus
                                                                    GST, is a favorable option.
                                                                </li>
                                                                <li class="feeContent">If you are new to lending and are
                                                                    testing the concept, paying a 1% processing fee on
                                                                    your investment, along with GST, is a suitable
                                                                    choice.
                                                                </li>

                                                                <li>You can make your membership payment using either a
                                                                    wallet or a payment gateway.</li>


                                                            </ul>
                                                        </div>




                                                        <h6 class="choospayoutBox">Choose Your Interest Payout
                                                            Method
                                                        </h6>

                                                        <ul class="list-group list-group-flush lead">
                                                            <li class="list-group-item monthlyInterestcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="newlender" id="newMonthly" />
                                                                <label for="newMonthly"><a data-percentage="1.58%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Monthly Interest
                                                                        pay-out <span
                                                                            data-modalChoosen="monthlyInterest"
                                                                            class="percentageSec1 monthlyInterest hidden">1.5</span>
                                                                        <span class="newlenderMonthly">%</span></a>
                                                                </label>
                                                            </li>
                                                            <li class="list-group-item quartlyInterestcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="newlender" id="newQuarterly" />
                                                                <label for="newQuarterly"><a data-percentage="24%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Quarterly
                                                                        Interest <span
                                                                            data-modalChoosen="quartlyInterest"
                                                                            class="percentageSec1 quartlyInterest hidden">24%</span>
                                                                        <span class="newlenderquartly">%</span>
                                                                    </a></label>
                                                            </li>
                                                            <li class="list-group-item halfInterestcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="newlender" id="newHalf" />
                                                                <label for="newHalf"><a data-percentage="24%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Half-Yearly
                                                                        Interest Pay-out <span
                                                                            data-modalChoosen="halfInterest"
                                                                            class="percentageSec1 halfInterest hidden">24%</span>
                                                                        <span class="newlenderhalfYearly">%</span>
                                                                    </a></label>
                                                            </li>
                                                            <li class="list-group-item yearlyInterestcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="newlender" id="newYearly" />
                                                                <label for="newYearly"><a data-percentage="24%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">Yearly Interest
                                                                        Pay-out <span data-modalChoosen="yearlyInterest"
                                                                            class="percentageSec1 yearlyInterest hidden">24%</span>
                                                                        <span class="newlenderyearly">%</span>
                                                                    </a></label>
                                                            </li>
                                                            <li class="list-group-item endofthedealInterestcheck">
                                                                <input class="form-check-input" type="radio"
                                                                    name="newlender" id="newendofthedeal" />
                                                                <label for="newendofthedeal"><a data-percentage="19%"
                                                                        href="javascript:void(0)"
                                                                        onclick="getClickedInfo()">End of Deal
                                                                        Interest Pay-out <span
                                                                            data-modalChoosen="endofthedealInterest"
                                                                            class="percentageSec1 endofthedealInterest">19%</span><span>%</span>
                                                                    </a></label>
                                                            </li>
                                                        </ul>


                                                    </div>

                                                    <div class="card-footer">
                                                        <button
                                                            onclick="pDealonlyNewLnedervalidityExpire('ISNewLender', '<?php echo $dealId ?>')"
                                                            type="button"
                                                            class="btn btn-primary btn-lg mt-4 newLenderFeeBtn feePayment-Btn"
                                                            data-fee="" data-minimum=""
                                                            data-from="newLenderBtn">Participate </button>
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
                        We are reserving <i class="amountLendEntered"></i> for <i class="dealNamePop"></i>.<br />
                        Your new wallet balance: <i class="latestWalletBalance"></i>
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
                            class="dealNamePop"></i>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
<script id="displayDealsScript" type="text/template">
    {{#data}}
      <tr class="divBlock_Mob_001" >
        <td class="displayedDealName" deal_name={{dealName}}>
            <span class="lable_mobileDiv"><b>Deal Name</b></span>

            {{dealName}}


        </td>

        <td>
         <span class="lable_mobileDiv"><b>Deal Amount</b></span>
        {{dealAmount}}</td>

        <td>
        <!-- {{borrowerName}} -->
        <span class="lable_mobileDiv"><b>Available Limit</b></span>
        {{remainingAmountInDeal}}


    </td>
        <td>

      <span class="lable_mobileDiv"><b>Duration</b></span>
        {{duration}} M</td>
        <td>
        <span class="lable_mobileDiv"><b>ROI</b></span>
        {{rateOfInterest}}
       </td>
        <td>
       <span class="lable_mobileDiv"><b>Payout</b></span>
        {{payout}}</td>
        <td>
       <span class="lable_mobileDiv dealMinimumAmount" value="{{minimumPaticipationAmount}}" ><b>Minimum Participation</b></span>
        {{minimumPaticipationAmount}}</td>
        <td>
           <span class="lable_mobileDiv"><b>Maximum Participation</b></span>
        {{lenderParticiptionLimit}}</td>
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
                        <label>Lending Amount :- INR </label> <span class="amountLendEntered">200000</span></b><br />
                        <label>Deal Name :-</label> <span class="dealNamePop">Deal Nadergul</span></b><br />
                        <!-- <label>RoI :-</label> <span class="dealRoI">21</span><br /> -->
                        <label>Pay-out Method :</label> <span class="tupeOfInt"></span><br />
                        <label>Processing Fee:</label> <b> 0 </b>.
                        <br /><br />

                    </div>
                    <div class="clear"></div>
                    <div class="popbtns">
                        <button type="button" class="btn btn-success btn-lg yesBTN4Equity" data-reqID="" data-type=""
                            onclick="submitPaticipation()">Yes, Confirm & Pay </button>

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
                        <label>Lending Amount :- INR </label> <span class="amountLendEntered">200000</span></b><br />
                        <label>Deal Name :-</label> <span class="dealNamePop">Deal Nadergul</span></b><br />
                        <!-- <label>RoI :-</label> <span class="dealRoI">21</span>
                        <span>% </span><br /> -->
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


                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="dealConfirmationFromLenderNEW" role="dialog" aria-labelledby="dealConfirmationFromLender">
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
                        <label>Lending Amount :- INR </label> <span class="amountLendEntered">200000</span></b><br />
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




<div class="modal fade" id="successfullypaidParticipated" role="dialog" aria-labelledby="paymentFailed">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label=""><span>CLOSE</span></button>
            </div>
            <div class="modal-body">
                <div class="thank-you-pop">
                    <img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" width="100"
                        alt="">
                    <h3 class="text-center">payment Details<h3>
                            <div>
                                You successfully paid the membership fee

                            </div>
                            <!--        <div class="clear">
                                <div class="participateDeal"><a href="viewmyDeals"><button class="btn btn-success">View Participated Deals</button></a></div>  
                            </div> -->
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
                    </div>
                    <div class="clear"></div>
                    <div class="btnsADDudate">
                        <button type="button" class="btn btn-success btn-lg yesBTN4Deal" data-reqID="" data-type=""
                            onclick="newLenderPartcipatedAmount()">ADD, Confirm</button>

                        <button type="button" class="btn btn-success btn-lg updateBTNDeal" data-reqID="UPDATE"
                            data-type="" onclick="newLenderUpdatePartcipationAmount()">Update</button>
                    </div>

                </div>
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
                        <label>Lending Amount :- INR </label> <span class="amountLendEntered">200000</span></b><br />
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



<div class="modal fade" id="addDealConfirmationFromLender" role="dialog" aria-labelledby="dealConfirmationFromLender">
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
                        <label>Lending Amount :- INR </label> <span class="amountLendEntered">200000</span></b><br />
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
                        <label>Lending Amount :- INR </label> <span class="amountLendEntered">200000</span></b><br />
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

<div class="modal fade" id="modal-approve-walletFeepayThroughparticipatedeal" tabindex="-1" role="dialog"
    aria-labelledby="modal-borrower-approve-user" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Processing Fee</h4>
            </div>

            <div class="modal-body">
                <div class="heading_fee">
                    <h4 class="participate_text">
                        Pay your membership fee through the below options..</h4>
                </div></br>

                <div class="fee_notePoint"><b class="text-warning"> NOTE : </b>
                    <h4> If you don't pay the membership fee now, the same amount will be deducted from your interest.
                    </h4>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-info feewalet-Btn" data-reqid="" data-clickedid="" data-fee=""
                    onclick="participationfeepayThroughwallet('<?php echo $dealId ?>','isNewLender');">Wallet </button>
                &nbsp;

                <button type="button" class="btn  btn-success feePaymentGateway-Btn" data-reqid='' data-clickedid=""
                    onclick="participationfeepayThroughcashfree();">Payment gateway </button>&nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>



<div class="modal modal-warning  fade" id="modal-approve-chosenMembershipExpiredUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">To proceed with the deal, please select a membership plan and proceed with
                    payment to participate.
                </h4>
            </div>
            <div class="modal-body">

                <div class="feepaymembership_body">

                    <div class="radio">
                        <label>
                            <input type="radio" name="feeCheckradio" value="monthly"
                                onclick="calculateMembershipFee('PERDEAL');">
                            1% on Investment + GST

                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="feeCheckradio" value="monthly"
                                onclick="calculateMembershipFee('MONTHLY');">
                            One Month
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="feeCheckradio" value="quarterly"
                                onclick="calculateMembershipFee('QUARTERLY');">
                            Quarterly
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="feeCheckradio" value="halfyearly"
                                onclick="calculateMembershipFee('HALFYEARLY');">
                            Half-Yearly
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="feeCheckradio" value="peryear"
                                onclick="calculateMembershipFee('PERYEAR');">
                            One Year
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="feeCheckradio" value="fiveyears"
                                onclick="calculateMembershipFee('FIVEYEARS');">
                            Five Years
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="feeCheckradio" value="tenyears"
                                onclick="calculateMembershipFee('TENYEARS');">
                            Ten Years
                        </label>
                    </div>

                    <div class="radio">
                        <label>
                            <input type="radio" name="feeCheckradio" value="lifetime"
                                onclick="calculateMembershipFee('LIFETIME');">
                            life Time
                        </label>
                    </div>
                </div>

                <div class="paymentAmount" style="display:none">Your membership amount is <span
                        class="membershipamount"></span></div>
                <div class="membershipError" style="display:none">Note : Chose Your Membership</div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-outline btn-outline pull-left fee_pay_expired" deal-Id=""
                    onclick="checkValidityExpire();">
                    Payment Gateway</button>

                <button type="button" class="btn btn-outline btn-outline pull-left existingpaywallet_btn" deal-Id=""
                    onclick="();">
                    Pay Through Wallet </button>

                <button type="button" class="btn btn-outline btn-outline pull-left onePercentage_btn" deal-Id=""
                    onclick="();" style="display:none">
                    1 % fee Participate </button>


                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-pay-feeon-participating" tabindex="-1" role="dialog"
    aria-labelledby="modal-borrower-approve-user" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4 class="membership_title_point">
                        Pay your membership fee through below options

                    </h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success paymembership_throughdeal" deal-Id='' deal-fee=""
                    onclick="participationfeepaythroughParticipatedDeal();">Wallet</button> &nbsp;
                <button type="button" class="btn  btn-info paymembership_throughdealcashfree" deal-Id='' deal-fee=""
                    onclick="fetchNewMembershipCashFreeThroughParticipated();">Payment Gateway</button>

                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

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


.my-element {
    display: inline-block;
    margin: 0 0.5rem;
    position: absolute;
    /* referring directly to the animation's @keyframe declaration */
    animation-duration: 30s;
    /* don't forget to set a duration! */
    height: 200px;
    width: 250px;
    margin-bottom: 200px;
    float: right;
    background-color: #FFA500;
    font-family: sans-serif;
}

.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked+.slider {
    background-color: #2196F3;
}

input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
}

input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
    border-radius: 34px;
}

.slider.round:before {
    border-radius: 50%;
}
</style>



<script>
$(document).ready(function() {
    $("#membershipTenure").change(function() {
        var tenuretype = $("#membershipTenure").val();
        let membershipfiled = {
            monthly: 1000,
            quarterly: 2900,
            halfyearly: 5600,
            peryear: 9800,
            lifetime: 100000,
            fiveyears: 50000,
            tenyears: 90000
        };

        const newMembershipAmount = (amount) => {
            let calculate = (amount * 118 / 100)
            return calculate;
        }

        if (tenuretype == "MONTHLY") {
            $(".membershipAmount").html(newMembershipAmount(membershipfiled.monthly));
            $(".newLenderFeeBtnfee").attr("data-fee", newMembershipAmount(membershipfiled.monthly));
            $(".note_fee_new").show();
        } else if (tenuretype == "QUARTERLY") {
            $(".membershipAmount").html(newMembershipAmount(membershipfiled.quarterly));
            $(".newLenderFeeBtnfee").attr("data-fee", newMembershipAmount(membershipfiled.quarterly));
            $(".note_fee_new").show();
        } else if (tenuretype == "HALFYEARLY") {
            $(".membershipAmount").html(newMembershipAmount(membershipfiled.halfyearly));
            $(".newLenderFeeBtnfee").attr("data-fee", newMembershipAmount(membershipfiled.halfyearly));
            $(".note_fee_new").show();
        } else if (tenuretype == "PERYEAR") {
            $(".membershipAmount").html(newMembershipAmount(membershipfiled.peryear));
            $(".newLenderFeeBtnfee").attr("data-fee", newMembershipAmount(membershipfiled.peryear));
            $(".note_fee_new").show();
        } else if (tenuretype == "FIVEYEARS") {
            $(".membershipAmount").html(newMembershipAmount(membershipfiled.fiveyears));
            $(".newLenderFeeBtnfee").attr("data-fee", newMembershipAmount(membershipfiled.fiveyears));
            $(".note_fee_new").show();
        } else if (tenuretype == "TENYEARS") {
            $(".membershipAmount").html(newMembershipAmount(membershipfiled.tenyears));
            $(".newLenderFeeBtnfee").attr("data-fee", newMembershipAmount(membershipfiled.tenyears));
            $(".note_fee_new").show();
        } else if (tenuretype == "LIFETIME") {
            $(".membershipAmount").html(newMembershipAmount(membershipfiled.lifetime));
            $(".newLenderFeeBtnfee").attr("data-fee", newMembershipAmount(membershipfiled.lifetime));
            $(".note_fee_new").show();
        } else if (tenuretype == "") {
            $(".membershipAmount").html(0);
            $(".note_fee_new").hide();
        }
    });
});
</script>


<!-- <script type="text/javascript">
     $(document).ready(function() {
      $('input[name="moveprincipal"]').change(function() {
         const selectedValue = $(this).val();
         if(selectedValue=='WALLET'){
             $(this).attr("checked", false); 
           $(this).attr("disabled",true); 
         $(".note_wallet_selection").show();
         }else{
         $(this).attr("disabled", false); 
         $(".note_wallet_selection").hide();
         }

      });
          });
</script> -->

<script type="text/javascript">
<?php if($paymentStatus == "failure" && $dealId == 0){?>
window.onload = loadFalureFunc();
<?php }
 else {?>
$(".loadingSec").show();
window.onload = viewSingleDeal("<?php echo $dealId; ?>");
<?php }
 ?>

getuserMembershipValidity();
</script>

<?php include 'footer.php';?>