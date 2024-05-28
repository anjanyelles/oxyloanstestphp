<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>
            Your Virtual Account with OxyLoans
            <small>Virtual Account</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="">OxyTrade Details</li>
            <li class="active">My Van Account</li>
        </ol>
        <div>
            <h4>
                <ul>
                    <li>Please find your virtual account details here.</li>
                    <li>Please add the account as a beneficiary to transfer the funds and update the transaction details
                        by sending a mail to <a href="mailto:subbu@oxyloans.com">subbu@oxyloans.com</a>.</li>

                </ul>
            </h4><br>
        </div>
    </section>
    <div class="row customFormQ">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Virtual Account</h3>
                </div>
                <div class="box-body">
                    <div class="box-body no-padding">
                        <table class="table table-striped">

                            <tr>
                                <td>Account Name</td>
                                <td>SRS FINTECHLABS PVT LTD</td>
                            </tr>
                            <tr>
                                <td>Account Number</td>
                                <td><span class="borrowerVirtualID">0</span></td>
                            </tr>

                            <tr>
                                <td>IFSC Code</td>
                                <td>PAYTM0123456</td>
                            </tr>
                            <tr>
                                <td>BANK</td>
                                <td>Paytm Payment Bank Ltd</td>
                            </tr>
                            <tr>
                                <td>BRANCH</td>
                                <td>Noida Branch</td>
                            </tr>

                            <!-- <tr> 
  <td>Account Type</td> 
  <td>Current account</td> 
</tr> 
<tr> 
  <td>Mode of transfer</td> 
  <td> NEFT only</td>
   </tr> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->
<script type="text/javascript">
window.onload = getBorrowerVanNumber();
</script>

<?php include 'footer.php';?>