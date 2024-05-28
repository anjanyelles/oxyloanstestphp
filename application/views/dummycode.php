<div class="theUserISShashLender" style="display:none">
    <!-- Also Oxywheels Investors for -->
    <div class="card border-success text-center">
        <h4 class="card-header text-white py-4 bg-primary ppcolor loadGrpNameI">Satish#OxyFounding Lenders</h4>
        <div class="card-body">

            <ul class="list-group list-group-flush lead">
                <li class="list-group-item">
                    <input class="form-check-input" type="radio" name="sHash" id="sHashMonthly" />
                    <label for="sHashMonthly"><a data-percentage="1.58%" href="javascript:void(0)"
                            onclick="getClickedInfo()">Monthly Interest pay-out <span
                                data-modalChoosen="monthlyInterest"
                                class="sHASHmonthlyInterest percentageSec1 ">1.58%</span><span>%</span></a> </label>
                </li>
                <li class="list-group-item">
                    <input class="form-check-input" type="radio" name="sHash" id="sHashQuarterly" />
                    <label for="sHashQuarterly"><a data-percentage="24%" href="javascript:void(0)"
                            onclick="getClickedInfo()">Quarterly Interest <span data-modalChoosen="quartlyInterest"
                                class="sHASHquartlyInterest percentageSec1 ">24%</span><span>%</span>
                            (Please Re-Lend My Funds for Next Deal)</a></label>
                </li>
                <li class="list-group-item">
                    <input class="form-check-input" type="radio" name="sHash" id="sHashHalfYearly" />
                    <label for="sHashHalfYearly"> <a data-percentage="24%" href="javascript:void(0)"
                            onclick="getClickedInfo()">Half-Yearly Interest Pay-out <span
                                data-modalChoosen="halfInterest"
                                class="sHASHhalfInterest percentageSec1 ">24%</span><span>%</span>
                            (Please Re-Lend My Funds for Next Deal)</a></label>
                </li>
                <li class="list-group-item">
                    <input class="form-check-input" type="radio" name="sHash" id="sHashYearly" />
                    <label for="sHashYearly"><a data-percentage="24%" href="javascript:void(0)"
                            onclick="getClickedInfo()">Yearly Interest Pay-out <span data-modalChoosen="yearlyInterest"
                                class="sHASHyearlyInterest percentageSec1 ">24%</span><span>%</span>
                            (Please Re-Lend My Funds for Next Deal)</a></label>
                </li>
                <li class="list-group-item">
                    <input class="form-check-input" type="radio" name="sHash" id="sHashendofthedeal" />
                    <label for="sHashendofthedeal"><a data-percentage="19%" href="javascript:void(0)"
                            onclick="getClickedInfo()">End of Deal Interest Pay-out <span
                                data-modalChoosen="endofthedealInterest"
                                class="percentageSec1 sHASHendofthedealInterest">19%</span><span>%</span>
                            (Tenure Would be 1-12 Months)</a></label>
                </li>
            </ul>

            <button type="button" class="btn btn-primary btn-lg mt-4 ppcolor"
                onclick="participateinthisDeal('Satish#OXYFoundingLenders', '<?php echo $dealId ?>')">Participate
                Now</button>
        </div>
    </div>
</div>


<div class="col-md-6 col-sm-12 mb-4 oxyFoundingLendersSec" style="disaply:none">
    <div class="card text-center">
        <h4 class="card-header text-white bg-success py-4">OxyFounding Lender</h4>
        <div class="card-body">
            <ul class="list-group list-group-flush lead">
                <li class="list-group-item">
                    <input class="form-check-input" type="radio" name="OxyFoudningRadio" id="oFoudingM" />

                    <label for="oFoudingM"><a data-percentage="1.58%" href="javascript:void(0)"
                            onclick="getClickedInfo()">Monthly Interest pay-out <span
                                data-modalChoosen="monthlyInterest"
                                class="percentageSec1 oxyfoundingmonthlyInterest">1.58%</span> <span>%</span></a>
                    </label>
                </li>
                <li class="list-group-item">

                    <input class="form-check-input" type="radio" name="OxyFoudningRadio" id="oFoudingQ" />

                    <label for="oFoudingQ">
                        <a data-percentage="24%" href="javascript:void(0)" onclick="getClickedInfo()">Quarterly Interest
                            <span data-modalChoosen="quartlyInterest"
                                class="percentageSec1 oxyfoundingquartlyInterest">24%</span> <span>%</span>
                            (Please Re-Lend My Funds for Next Deal)</a>
                    </label>
                </li>
                <li class="list-group-item">
                    <input class="form-check-input" type="radio" name="OxyFoudningRadio" id="oFoudingH" />

                    <label for="oFoudingH">
                        <a data-percentage="24%" href="javascript:void(0)" onclick="getClickedInfo()">Half-Yearly
                            Interest Pay-out <span data-modalChoosen="halfInterest"
                                class="percentageSec1 oxyfoundinghalfInterest">24%</span> <span>%</span>
                            (Please Re-Lend My Funds for Next Deal)</a>
                    </label>
                </li>
                <li class="list-group-item">

                    <input class="form-check-input" type="radio" name="OxyFoudningRadio" id="oFoudingY" />

                    <label for="oFoudingY"> <a data-percentage="24%" href="javascript:void(0)"
                            onclick="getClickedInfo()">Yearly Interest Pay-out <span data-modalChoosen="yearlyInterest"
                                class="percentageSec1 oxyfoundingyearlyInterest">24%</span> <span>%</span>
                            (Please Re-Lend My Funds for Next Deal)</a></label>

                </li>
                <li class="list-group-item">
                    <input class="form-check-input" type="radio" name="OxyFoudningRadio" id="oFoudingE" />
                    <label for="oFoudingE">
                        <a data-percentage="19%" href="javascript:void(0)" onclick="getClickedInfo()">End of Deal
                            Interest Pay-out <span data-modalChoosen="endofthedealInterest"
                                class="percentageSec1 oxyfoundingendofthedealInterest">19%</span><span>%</span>
                            (Tenure Would be 1-12 Months)</a>
                    </label>
                </li>
            </ul>
            <button onclick="participateinthisDeal('oxyFoundingLender', '<?php echo $dealId ?>')" type="button"
                class="btn btn-success mt-4 btn-lg">Participate Now</button>
        </div>
    </div>
</div>


<div class="col-md-6 col-sm-12 mb-4 oxyFoundingLendersSecFee" style="disaply:none">
    <div class="card text-center">
        <h4 class="card-header text-white bg-success py-4"><span class="fa fa-star"></span> OxyFounding Lender</h4>
        <div class="card-body">
            <div class="insideCardCopy">
                <ul>
                    <li>If you want to participate in multiple deals and Invest amount is greater than 5 lakhs, then
                        Paying INR 5000 annual fee + GST is good!</li>
                    <li>In General, If you are aware of lending, then Paying INR 5000 annual fee + GST is good!</li>
                    <li>No! processing fee for the equity deals.</li>
                </ul>
            </div>

            <h6 class="choospayoutBox">Choose Your Interest Payout Method</h6>

            <ul class="list-group list-group-flush lead">
                <li class="list-group-item">
                    <input class="form-check-input" type="radio" name="oxyfoundingPay" id="oxyFPayMonthly" />
                    <label for="oxyFPayMonthly"><a data-percentage="1.58%" href="javascript:void(0)"
                            onclick="getClickedInfo()">Monthly Interest pay-out <span
                                data-modalChoosen="monthlyInterest"
                                class="percentageSec1 monthlyInterestForOxyFounding">1.58</span><span>%</span></a>
                    </label>
                </li>
                <li class="list-group-item">
                    <input class="form-check-input" type="radio" name="oxyfoundingPay" id="oxyFQ" />
                    <label for="oxyFQ"><a data-percentage="24%" href="javascript:void(0)"
                            onclick="getClickedInfo()">Quarterly Interest <span data-modalChoosen="quartlyInterest"
                                class="percentageSec1 quartlyInterestOxyFounding">24</span><span>%</span>
                            (Please Re-Lend My Funds for Next Deal)</a></label>
                </li>
                <li class="list-group-item">
                    <input class="form-check-input" type="radio" name="oxyfoundingPay" id="oxyFH" />
                    <label for="oxyFH"><a data-percentage="24%" href="javascript:void(0)"
                            onclick="getClickedInfo()">Half-Yearly Interest Pay-out <span
                                data-modalChoosen="halfInterest"
                                class="percentageSec1 halfInterestOxyFounding">24</span><span>%</span>
                            (Please Re-Lend My Funds for Next Deal)</a></label>
                </li>
                <li class="list-group-item">
                    <input class="form-check-input" type="radio" name="oxyfoundingPay" id="oxyFY" />
                    <label for="oxyFY"><a data-percentage="24%" href="javascript:void(0)"
                            onclick="getClickedInfo()">Yearly Interest Pay-out <span data-modalChoosen="yearlyInterest"
                                class="percentageSec1 yearlyInterestOxyFounding">24</span><span>%</span>
                            (Please Re-Lend My Funds for Next Deal)</a></label>
                </li>
                <li class="list-group-item">
                    <input class="form-check-input" type="radio" name="oxyfoundingPay" id="oxyEY" />
                    <label for="oxyEY"><a data-percentage="19%" href="javascript:void(0)" onclick="getClickedInfo()">End
                            of Deal Interest Pay-out <span data-modalChoosen="endofthedealInterest"
                                class="percentageSec1 endofthedealInterestOxyFounding">19%</span><span>%</span>
                            (Tenure Would be 1-12 Months)</a></label>
                </li>
            </ul>
            <button onclick="pDealonlyNewLneder('oxyFoundingLender', '<?php echo $dealId ?>')" data-fee="5900.0"
                type="button" id="ouxyFeeId" data-from="oxyFounderBtn" class="btn btn-success mt-4 btn-lg">Participate
                Now</button>
        </div>
    </div>
</div>