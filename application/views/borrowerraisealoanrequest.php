<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>
<?php
   $urlfromBroweser = $_SERVER['REQUEST_URI'];
    $loanRequest =  isset($_GET['loanRequest']) ? $_GET['loanRequest'] : 'Requested';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Review your loan application
            <small></small>
        </h1>
        <div class="loanEligilibilityValue pull-right" name="loanEligilibilityValue">
            Your Loan Eligibility is : INR <span class="loanEligilibilityAmount">100</span><a href="#"
                id="eligibilityKnowMore">Know more</a>

            <input type="hidden" name="loanRequest" id="loanrequestEditAccess" value="<?php echo $loanRequest ?>">
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">

                        <div class="col-xs-1"></div>
                        <form autocomplete="off" id="raisealoanrequest">
                            <div class="col-xs-10">

                                <div class="form-group row">
                                    <label for="loanRequestAmount " class="col-sm-3 col-form-label">Loan Request
                                        Amount</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="loanRequestAmount"
                                            class="form-control loanRequestAmount" placeholder="Enter your Amount"
                                            id="loanRequestAmount" data validation="loanRequestAmount"
                                            required="required">
                                        <span class="error loanRequestAmountError" style="display: none;">Please enter
                                            loan amount value</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rateOfInterest " class="col-sm-3 col-form-label">Rate of Interest per
                                        Annum</label>
                                    <div class="col-sm-9">
                                        <!--  <input  type="text" class="form-control rateOfInterest" name="rateOfInterest" placeholder="Enter your rateOfInterest" id="rateOfInterest" data validation="rateOfInterest">-->
                                        <select class="form-control rateOfInterest" name="rateOfInterest"
                                            id="rateOfInterest" data validation="rateOfInterest">
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

                                        <span class="error rateOfInterestError" style="display: none;">Please choose
                                            Rate of Interest</span>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="duration" class="col-sm-3 col-form-label">Loan Duration</label>
                                    <div class="col-sm-9">
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
                                    <label for="Durationtype" class="col-sm-3 col-form-label">Duration Type</label>
                                    <div class="col-sm-9">

                                        <label>
                                            <input type="radio" id="Months" name="Durationtype" value="MONTHS" />
                                            Months
                                        </label>

                                        <label>
                                            <input type="radio" id="Days" name="Durationtype" value="DAYS" />
                                            Days
                                        </label>

                                        <span class="error DurationtypeError" style="display: none;">Please choose
                                            Duration Type</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="repaymentMethod" class="col-sm-3 col-form-label">Preferred Re-Payment
                                        Method</label>
                                    <div class="col-sm-9">

                                        <label>
                                            <input type="radio" id="principleMethod" name="existingRepaymentMethod"
                                                value="PI" />
                                            Pay (P + I) monthly by Flat EMI method)<span class="displayEMIvalue"
                                                style="display: none;">Your EMI is <span
                                                    class="emiValueIs">0</span></span>
                                        </label>
                                        <br />
                                        <label>
                                            <input type="radio" id="interestMethod" name="existingRepaymentMethod"
                                                value="I" />
                                            Pay Monthly Interest (I) Only &amp; Principal (P) at the end of the term.
                                            <span class="displayEMIvalue" style="display: none;">Your Interest is <span
                                                    class="payonlyint">0</span></span>
                                        </label>


                                        <span class="error repaymentMethodError" style="display: none;">Please choose
                                            repayment method</span>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="loanPurpose" class="col-sm-3 col-form-label">Loan Purpose</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control  loanPurpose"
                                            placeholder="Enter your loanPurpose" name="loanPurpose" id="loanPurpose"
                                            data validation="loanPurpose">
                                        <span class="error loanPurposeError" style="display: none;">Please enter loan
                                            purpose</span>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="expectedDate" class="col-sm-3 col-form-label">Expected Date </label>
                                    <div class="col-sm-9">

                                        <div class="input-group date" data-date-format="dd/mm/yy">
                                            <input type="text" class="form-control expectedDateValue" id="expectedDate"
                                                placeholder="dd/mm/yyyy" name="expectedDate" data
                                                validation="expectedDate">
                                            <div class="input-group-addon">
                                                <span class=" glyphicon glyphicon-calendar"></span>
                                            </div>

                                        </div>
                                        <span class="error expectedDateError" style="display: none;">Please choose date
                                            when you're expected loan</span>
                                    </div>
                                </div>



                                <center> <button type="button" class="btn btn-lg btn-primary"
                                        id="loan-submit-btn">Submit</button>

                                </center>

                            </div>
                        </form>
                        <div class="col-xs-1"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal modal-success fade" id="modal-raisealoan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p class="utbborrowerFitstTime">Thanks for increasing your loan amount. </p>
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



<div class="modal modal-warning fade" id="modal-raisealoan-errormessage">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body">
                <p class="raiseaerrormessage"></p>
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


<div class="modal modal-info fade" id="modal-loanEligibilityKnowMoreInfo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <strong>Loan Eligibility Criteria:</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <ul style="margin:10px">
                    <li><b>You should prove your monthly salary — upload your salary slip in the system.</b></li><br />
                    <li><b> If your salary is INR 24,000 per month and one user registers through your referral link,
                            then your loan eligibility will be INR 2400 (24,000/10=2400).</b></li><br />

                    <li><b> If 50 people join logically, your loan eligibility will be 50*2400=INR 1,20000, but we
                            consider your salary i.e., INR 24000 as your maximum loan eligibility.</b></li>

                </ul>
            </div>
            <div class="modal-footer">
                <a href="breferafriend"><button type="button" class="btn btn-outline pull-left">Invite a
                        friend</button></a>

                <button type="button" class="btn btn-outline pull-left" style="margin-left:5px;"
                    data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/ion.rangeSlider.min.js"></script>
<script type="text/javascript">
$(".rateOfInterest").ionRangeSlider({
    min: 8,
    max: 48,
    from: 24,
    onChange: function(data) {
        $(".rateOfInterest").val(data);
    }
});
loadborrowerDashboardData();
loanEligibilitybyreferring();

$(document).ready(function() {
    setTimeout(function() {
        $("#loanRequestAmount").val(borrowercommValue);
    }, 500);
});
</script>
<?php include 'footer.php';?>