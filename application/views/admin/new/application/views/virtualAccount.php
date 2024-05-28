<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>
            Your Virtual Account with OxyLoans
            <small>Virtual Account</small>
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="https://sites.google.com/view/walletloading/home" target="_blank"><i
                        class="fa fa-angle-double-right"> </i> Help </a></li>
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="withdrawWalletToWallet"><i class="fa fa-wallet"></i> Wallet To
                    Wallet</a></li>
        </ol>
        <div class="row  text-virtualAccount">
            <div class="col-md-12" style="margin-left: 25px;">
                <h4>
                    <ul>
                        <li><b class="virtualID"></b> is your virtual account.</li>

                        <li>Please add the <b class="virtualID"></b> as a beneficiary in your bank account and transfer
                            the funds.</li>

                        <li><code>Note:</code> There is an issue with icici Bank while adding the virtual account Please
                            add </br> the virtual account in other banks (not as an icici payee).
                        </li>

                        <li>
                            Once the funds are transferred to the account, your wallet will be loaded automatically..
                        </li>

                        <li>You will receive notifications on your whatsapp and email with the transaction details.</li>


                        <li>We accept payments in INR only, if you have any queries please write to us : <a
                                class="virtualList" href="lenderInquiries">Click here</a></li>



                    </ul>
                </h4>
            </div>
        </div>
    </section>
    <div class="row customFormQ">
        <!-- left column -->
        <div class="col-md-12">

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
                                <td><span class="virtualID">0</span></td>
                            </tr>
                            <tr>
                                <td>IFSC Code</td>
                                <td>ICIC0000106</td>
                            </tr>
                            <tr>
                                <td>BANK</td>
                                <td>ICICI</td>
                            </tr>
                            <tr>
                                <td>Account Type</td>
                                <td>Current account</td>
                            </tr>
                            <tr>
                                <td>Mode of transfer</td>
                                <td>NEFT / IMPS / RTGS </td>
                            </tr>
                            <tr>
                                <td>Load Your wallet Through QR</td>
                                <td><a href="user_PayQrCode"><button class="btn btn-sm btn-info">Load
                                            Wallet (QR)</button></a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->



<?php include 'footer.php';?>