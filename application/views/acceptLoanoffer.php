<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Loan Offer Details

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Loan Offer</li>
        </ol>
    </section>

    <!-- Main content -->


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <!-- maincontent starts -->
                    <div class="main-cont email_login">

                        <div class="middle-block">
                            <div class="form-block1 block-loan">
                                <table width="600" style="border:20px #74a0c1 solid">
                                    <tr>
                                        <td colspan="3">
                                            <table width="100%">
                                                <tr>
                                                    <td width="100%"
                                                        style="text-align: center;margin: 15px auto; background:#fff; padding:10px 0;">
                                                        <img class="logo-res"
                                                            src="https://oxyloans.com/wp-content/themes/oxyloan/oxyloan/_ui/images/logo4.png" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="res-br"
                                                        style="font-family: arial;font-size: 12px;padding: 25px;"><br />

                                                        <strong><em></strong><br />
                                                        <strong
                                                            style="color:#5c9b43; padding-bottom: 8px;display: block;">
                                                            Below is the Loan Offer Request,Please Accept or Reject the
                                                            loan offer. </strong>

                                                        <table
                                                            style="font-family: arial, sans-serif; border-collapse: collapse;width: 100%; background:#fff;">
                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        style="font-size:14px;border: 1px solid #dddddd;text-align: left;padding: 8px;width: 50%;">
                                                                        <strong>Loan Amount:</strong>
                                                                    </td>
                                                                    <td
                                                                        style="font-size:14px;border: 1px solid #dddddd;text-align: left;padding: 8px;width: 50%;">
                                                                        &nbsp;INR <span id="loanAmount"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        style="font-size:14px;border: 1px solid #dddddd;text-align: left;padding: 8px;width: 50%;">
                                                                        <strong>
                                                                            Processing Fees:(including GST
                                                                            &documentation charges)Rs /- </strong>
                                                                    </td>
                                                                    <td
                                                                        style="font-size:14px;border: 1px solid #dddddd;text-align: left;padding: 8px;width: 50%;">
                                                                        INR <span id="loanAmountFee"></span>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        style="font-size:14px;border: 1px solid #dddddd;text-align: left;padding: 8px;width: 50%;">
                                                                        <strong>Net Disbursement to customer: </strong>
                                                                    </td>
                                                                    <td
                                                                        style="font-size:14px;border: 1px solid #dddddd;text-align: left;padding: 8px;width: 50%;">
                                                                        INR
                                                                        <span id="netDisbursementAmount"></span>&nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        style="font-size:14px;border: 1px solid #dddddd;text-align: left;padding: 8px;width: 50%;">
                                                                        <strong>Tenure:</strong>
                                                                    </td>
                                                                    <td
                                                                        style="font-size:14px;border: 1px solid #dddddd;text-align: left;padding: 8px;width: 50%;">
                                                                        <span id="duaration"></span> <span
                                                                            id="duarationType"></span>&nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        style="font-size:14px;border: 1px solid #dddddd;text-align: left;padding: 8px;width: 50%;">
                                                                        <strong><span id="Month"></span> <span
                                                                                id="Days"></span></strong>
                                                                    </td>
                                                                    <td
                                                                        style="font-size:14px;border: 1px solid #dddddd;text-align: left;padding: 8px;width: 50%;">
                                                                        <span id="emiAmount"></span>&nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        style="font-size:14px;border: 1px solid #dddddd;text-align: left;padding: 8px;width: 50%;">
                                                                        <strong>EMI Date:</strong>
                                                                    </td>
                                                                    <td
                                                                        style="font-size:14px;border: 1px solid #dddddd;text-align: left;padding: 8px;width: 50%;">
                                                                        5th of Every Month</td>
                                                                </tr>
                                                            </tbody>
                                                        </table><br />





                                                        <button type="button" class="btn btn-info btn-xs accept-btn "
                                                            onclick="acceptLoanOffer();">Accept</button>

                                                        <button type="button" class="btn btn-danger btn-xs reject-btn"
                                                            onclick="rejectLoanOffer();"> Reject</button>

                                                        <br />
                                                        <br /><br />
                                                        <strong>Disclaimer:</strong>
                                                        <p>The company is having a valid certificate of Registration
                                                            dated Feb 06 2019 issued by the Reserve Bank of India under
                                                            Section 45 IA of the Reserve Bank of India Act, 1934.
                                                            However, ​the RBI does not accept any responsibility or
                                                            guarantee about the present position as to the financial
                                                            soundness of the company or for the correctness of any of
                                                            the statements or representations made or opinions expressed
                                                            by the company and for repayment of deposits/discharge of
                                                            liabilities by the company.</p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </div>
    </section>
</div>

<!-- main-content -->


<div class="modal modal-success fade" id="modal-successfullAcceptedOffer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                Congratulations! Now your loan application is live , you can check the status in your dashboard.
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal modal-warning fade" id="modal-acceptofferalready">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> !Oops</h4>
            </div>
            <div class="modal-body">
                This Loan Offer Action already accepeted.
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<div class="modal modal-warning fade" id="modal-alreadyAcceptedOffer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">!Oops</h4>
            </div>
            <div class="modal-body">
                This Loan Offer Action already accepeted .
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-danger fade" id="modal-offerRejected">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                You're Rejected This Offer .
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<script type="text/javascript">
setTimeout(function() {
    loadofferDetails();
}, 1000);
$(document).ready(function() {
    noprofileCheck = "no";
    noROICheck = "no";


});
</script>

<?php include 'footer.php';?>