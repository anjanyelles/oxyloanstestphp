<?php include 'header1.php';?>
<title>Loan EMI Calculator: Online EMI Calculator for Personal Loan | OxyLoans P2P NBFC</title>
<meta name="description"
    content="Loan EMI calculator by OxyLoans helps to calculate the EMI for your personal loan. Use OxyLoans personal loan calculator & apply online now!" />

<!-- Content Wrapper. Contains page content -->
<div class="loancalc">
    <div class="col-xs-12 leftBoxStyles">
        <div class="container">
            <div class="row">
                <div class="calcForm col-md-6 mx-auto calculate-form">
                    <div class="card card-body text-center mt-5">
                        <h1 class="userLoginH1">Loan Calculator</h1>
                        <form id="loan-form">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="input-group-text input-group-text1">₹</span>
                                    </div>
                                    <input type="number" class="form-control" id="amount" placeholder="Loan Amount" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="input-group-text input-group-text1">%</span>
                                    </div>
                                    <input type="number" class="form-control" id="interest" placeholder="Interest" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="input-group-text input-group-text1">Tenure in Months</span>
                                    </div>
                                    <input type="number" id="years" class="form-control"
                                        placeholder="Months To Repay" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <input type="submit" value="Calculate" class="btn btn-dark dark-btnW btn-block" />
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 resultDisplay">
                    <!-- Loader Here -->
                    <div id="loading">
                        <img src="https://media.giphy.com/media/jAYUbVXgESSti/giphy.gif" alt="" />
                    </div>
                    <!-- Results -->
                    <div id="result">
                        <h3>EMI / Principal Details</h3>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="input-group-text input-group-text1">Monthly Payment</span>
                                </div>
                                <input type="number" class="form-control" id="monthly-payment" disabled />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="input-group-text input-group-text1">Total Payment</span>
                                </div>
                                <input type="number" class="form-control" id="total-payment" disabled />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="input-group-text input-group-text1">Total Interest</span>
                                </div>
                                <input type="number" class="form-control" id="total-interest" disabled />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->

</div>
</div>
<div class="clear"></div>
<!--<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>-->
<script>
$(document).ready(function() {
    /// Listen for Submit
    document.getElementById("loan-form").addEventListener("submit", function(e) {
        // Hide Results
        document.getElementById("result").style.display = "none";

        // Show Loader
        document.getElementById("loading").style.display = "block";

        setTimeout(calculateResults, 2000);

        e.preventDefault();
    });

    // Calculate Results
    function calculateResults() {
        // UI Vars
        var amount = document.getElementById("amount");
        var interest = document.getElementById("interest");
        var years = document.getElementById("years");
        var monthlyPayment = document.getElementById("monthly-payment");
        var totalPayment = document.getElementById("total-payment");
        var totalInterest = document.getElementById("total-interest");

        var principal = parseFloat(amount.value);
        var calculatedInterest = parseFloat(amount.value) * parseFloat(interest.value);
        calculatedInterest = calculatedInterest / 100;
        //alert(calculatedInterest);
        calculatedInterest = calculatedInterest / 12;
        //alert(calculatedInterest);
        calculatedInterest = calculatedInterest * parseFloat(years.value);

        //alert(calculatedInterest);

        var calculatedPayments = parseFloat(years.value);
        // Computed Monthly payment
        var x = Math.pow(1 + calculatedInterest, calculatedPayments);
        var monthly = (principal + calculatedInterest) / calculatedPayments;


        if (isFinite(monthly)) {
            monthlyPayment.value = monthly.toFixed(2);
            totalPayment.value = (monthly * calculatedPayments).toFixed(2);
            totalInterest.value = (monthly * calculatedPayments - principal).toFixed(2);

            // Show Results
            document.getElementById("result").style.display = "block";
            $('html, body').animate({
                scrollTop: $("#result").offset().top
            }, 2000);
            // Hide Loader
            document.getElementById("loading").style.display = "none";
        } else {
            showError("Please check number inputs");
        }
    }

    // Show Error
    function showError(error) {
        // Hide Results
        document.getElementById("result").style.display = "none";

        // Hide Loader
        document.getElementById("loading").style.display = "none";

        // Create a div
        const errorDiv = document.createElement("div");

        // Get Elements
        const card = document.querySelector(".card");
        const heading = document.querySelector(".heading");

        // Add class
        errorDiv.className = "alert alert-danger";

        // Create text node and append div
        errorDiv.appendChild(document.createTextNode(error));

        // Insert error above heading
        card.insertBefore(errorDiv, heading);

        // Clear Error after 3 seconds
        setTimeout(clearError, 3000);

        // Clear Error
        function clearError() {
            document.querySelector(".alert").remove();
        }
    }

});
</script>

<meta name="google-signin-client_id" content="913092980453-4dqej3qkl7rke1631rcu9s4bfvesu9hj.apps.googleusercontent.com">
<?php include 'footer.php';?>