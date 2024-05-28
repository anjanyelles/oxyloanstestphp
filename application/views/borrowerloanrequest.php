<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>
<?php
   $urlfromBroweser = $_SERVER['REQUEST_URI'];
    $loanRequest =  isset($_GET['loanRequest']) ? $_GET['loanRequest'] : 'Requested';

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Review your loan application
            <small></small>
        </h1>
        <div class="loanEligilibilityValue pull-right" name="loanEligilibilityValue">
            Your Loan Eligibility is : INR <span class="loanEligilibilityAmount">100</span>
        </div>

        <input type="hidden" name="loanRequest" id="loanrequestEditAccess" value="<?php echo $loanRequest ?>">
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
                                    <label for="loanRequestAmount " class="col-sm-3 col-form-label">Cibil Score</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="rateOfInterest" id="userCibil" data
                                            validation="rateOfInterest">
                                            <option value="">-- Choose Your Cibil Score --</option>
                                            <option value="400-500">400-500</option>
                                            <option value="500-600">500-600</option>
                                            <option value="600-700">600-700</option>
                                            <option value="700-800">700-800</option>
                                            <option value="800-900">800-900</option>
                                        </select>

                                        <span class="error loanRequestCibilError" style="display: none;">Please Choose
                                            Your Cibil Score</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="loanRequestAmount " class="col-sm-3 col-form-label">Salary in
                                        INR</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="loanRequestAmount"
                                            class="form-control loanRequestAmountpartner"
                                            placeholder="Enter your Salary" id="salary" data
                                            validation="loanRequestAmount" required="required">
                                        <span class="error loanRequestSalaryError" style="display: none;">Please enter
                                            Your Salary</span>
                                        <!--  hidden fields for get cibil score -->

                                        <input type="hidden" name="loanRequestAmountmul"
                                            class="form-control loanRequestAmountmul" id="partnermulsalary">
                                        <input type="hidden" name="cibilscore1" class="form-control cibilscore1"
                                            id="cibilscore1">
                                        <input type="hidden" name="cibilscore2" class="form-control cibilscore2"
                                            id="cibilscore2">
                                        <input type="hidden" name="cibilscore3" class="form-control cibilscore3"
                                            id="cibilscore3">
                                        <input type="hidden" name="cibilscore4" class="form-control cibilscore4"
                                            id="cibilscore4">
                                        <input type="hidden" name="cibilscore5" class="form-control cibilscore5"
                                            id="cibilscore5">


                                        <!--  hidden fields for get cibil score -->

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="loanRequestAmount " class="col-sm-3 col-form-label">Loan Request
                                        Amount</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="loanRequestAmount"
                                            class="form-control partnerloanAmount" placeholder="Enter your Amount"
                                            id="partnerloanAmount" data validation="partnerloanAmount"
                                            required="required" value="" readonly>
                                        <span class="error loanRequestAmountError" style="display: none;">Please enter
                                            loan amount value</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rateOfInterest " class="col-sm-3 col-form-label">Rate of Interest Per
                                        Month</label>
                                    <div class="col-sm-9">
                                        <select class="form-control rateOfInterest" name="rateOfInterest"
                                            id="rateOfInterest" data validation="rateOfInterest" readonly>
                                            <option value="">-- Choose Rate of Interest --</option>
                                            <option value="1">1</option>
                                            <option value="1.25">1.25</option>
                                            <option value="1.5">1.5</option>
                                            <option value="1.75">1.75</option>
                                            <option value="2">2</option>
                                            <option value="2.25">2.25</option>
                                            <option value="2.5">2.5</option>
                                            <option value="2.75">2.75</option>
                                            <option value="3">3</option>
                                            <option value="3.25">3.25</option>
                                            <option value="3.5">3.5</option>
                                            <option value="3.75">3.75</option>
                                            <option value="4">4</option>
                                            <option value="4.25">4.25</option>
                                            <option value="4.5">4.5</option>
                                            <option value="4.75">4.75</option>
                                            <option value="5">5</option>
                                            <option value="5.25">5.25</option>
                                            <option value="5.5">5.5</option>
                                            <option value="5.75">5.75</option>
                                            <option value="6">6</option>
                                            <option value="6.25">6.25</option>
                                            <option value="6.5">6.5</option>
                                            <option value="6.75">6.75</option>
                                            <option value="7">7</option>
                                            <option value="7.25">7.25</option>
                                            <option value="7.5">7.5</option>
                                            <option value="7.75">7.75</option>
                                            <option value="8">8</option>
                                            <option value="8.25">8.25</option>
                                            <option value="8.5">8.5</option>
                                            <option value="8.75">8.75</option>
                                            <option value="9">9</option>
                                            <option value="9.25">9.25</option>
                                            <option value="9.5">9.5</option>
                                            <option value="9.75">9.75</option>
                                            <option value="10">10</option>
                                            <option value="10.25">10.25</option>
                                            <option value="10.5">10.5</option>
                                            <option value="10.75">10.75</option>
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
                                    <label for="duration" class="col-sm-3 col-form-label">Loan Duration in
                                        months</label>
                                    <div class="col-sm-9">

                                        <select class="form-control partnerdurationValue" name="duration" id="duration">
                                            <option value="">-- Choose Loan Duration in months--</option>
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
                                        </select>
                                        <span class="error durationError" style="display: none;">Please choose
                                            duration</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="repaymentMethod" class="col-sm-3 col-form-label">Preferred Re-Payment
                                        Method</label>
                                    <div class="col-sm-9">
                                        <label>
                                            <input type="radio" id="interestMethod" name="repaymentMethod" value="I" />
                                            Pay Monthly Interest (I) Only &amp; Principal (P) at the end of the term.

                                        </label>
                                        <br />
                                        <label>
                                            <input type="radio" id="principleMethod" name="repaymentMethod"
                                                value="PI" />
                                            Pay (P + I) monthly by Flat EMI method
                                        </label>
                                        <br />

                                        <b>NOTE : If Any Month Interest is not Paid Principal Cheque will be
                                            Triggered</b>

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


                            </div>



                    </div></br>
                    <center> <button type="button" class="btn btn-lg btn-primary"
                            id="loanrequest-submit-btn">Submit</button>
                    </center>

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
<div class="modal modal-success fade" id="modal-raisealoan-zaggle">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>We will get back to you with a decision. Your loan application has been submitted.</p>
            </div>
            <div class="modal-footer">

                <a href="borrowerDashboard">
                    <button type="button" class="btn btn-outline pull-left">Close</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-success fade" id="modal-fileUploadedSuccessfully">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <p>
                <h2 style="font-size: 16px;"><span class="error_text">File uploaded successfully.</span></h2>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                Loan Eligibility Criteria for a borrower:</br></br>
                You should prove your monthly salary — upload your salary slip in the system.</br></br>
                If your salary is INR 24,000 per month and one user registers through your referral link, then your loan
                eligibility will be INR 2400 (24,000/10=2400).</br></br>
                If 50 people join logically, your loan eligibility will be 50*2400=INR 1,20000, but we consider your
                salary i.e., INR 24000 as your maximum loan eligibility.
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
$(document).ready(function() {
    $("#userCibil").change(function() {
        var cibil = $("#userCibil").val();
        var cibil1 = $("#cibilscore1").val();
        var cibil2 = $("#cibilscore2").val();
        var cibil3 = $("#cibilscore3").val();
        var cibil4 = $("#cibilscore4").val();
        var cibil5 = $("#cibilscore5").val();

        if (cibil1 == 0 && cibil2 == 0 && cibil3 == 0 && cibil4 == 0 && cibil5 == 0) {
            $('.rateOfInterest').prop("disabled", false);
        } else {

            if (cibil == "400-500") {
                $(".rateOfInterest").val(cibil1);
                $('.rateOfInterest').prop("disabled", true);
            } else if (cibil == "500-600") {
                $(".rateOfInterest").val(cibil2);
                $('.rateOfInterest').prop("disabled", true);
            } else if (cibil == "600-700") {
                $(".rateOfInterest").val(cibil3);
                $('.rateOfInterest').prop("disabled", true);
            } else if (cibil == "700-800") {
                $(".rateOfInterest").val(cibil4);
                $('.rateOfInterest').prop("disabled", true);
            } else if (cibil == "800-900") {
                $(".rateOfInterest").val(cibil5);
                $('.rateOfInterest').prop("disabled", true);
            }
        }
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    loanEligibilitybyreferring();
    $("#salary").keyup(function() {
        var usersalary = $("#salary").val();
        var mulsalary = $("#partnermulsalary").val();
        $("#partnerloanAmount").val(usersalary * mulsalary);
    });
});
</script>