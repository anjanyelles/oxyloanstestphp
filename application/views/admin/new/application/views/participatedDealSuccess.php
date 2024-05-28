<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<?php

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
  $secretkeyval = "b4c68e6f071f0201a19f11f5a8b2f8e4d59304a6";
} else {
  $secretkeyval = "a93a8c0ce15fc87f572ef17509d7ed91f8526a62";
}

         $msg = '';
         $secretkey = $secretkeyval;
         $orderId =isset($_POST["orderId"]) ? $_POST['orderId'] : '0';
         $orderAmount =  isset($_POST["orderAmount"]) ? $_POST["orderAmount"]:"0" ;
         $referenceId = isset($_POST["referenceId"]) ? $_POST["referenceId"] : "0";
         $txStatus =  isset($_POST["txStatus"])?  $_POST["txStatus"] : "0" ;
         $paymentMode =  isset($_POST["paymentMode"] )? $_POST["paymentMode"] : "0";
         $txMsg =  isset($_POST["txMsg"]) ?  $_POST["txMsg"] : "0";
         $txTime =  isset($_POST["txTime"]) ?  $_POST["txTime"] : "0";
         $signature =  isset($_POST["signature"] )? $_POST["signature"] : "0";
         $data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
         $hash_hmac = hash_hmac('sha256', $data, $secretkey, true) ;
         $computedSignature = base64_encode($hash_hmac);
         if ($signature == $computedSignature) {
        ?>

<div class="content-wrapper" id="particpatedPage">
    <section class="content-header">
        <div style="margin: 0 auto;text-align: center;width: 100%;">
            <div class="alert alert-error showWalletError" role="alert"
                style="display: none;margin: 0 auto; width: 50%;">
                <strong>Error!</strong> Your participation amount is greater than your
                wallet balance.
            </div>
        </div>
        <div class="col-xs-6">

            <div class="box-body">

                <table class="table table-bordered table-hover">
                    <thead class="tablehead" style="background-color: red;">
                        <H4>PAYMENT INFORMATION</H4>
                    </thead>
                    <tbody>
                        <tr id="example">
                            <th>OrderId</th>
                            <td><?php  echo $orderId ?></td>
                        </tr>
                        <tr id="example">
                            <th>AMOUNT</th>
                            <td><?php echo  $orderAmount ?></td>
                        </tr>
                        <tr id="example">
                            <th>ReferenceId</th>
                            <td><?php  echo $referenceId ?></td>
                        </tr>
                        <tr id="example">
                            <th>TxStatus</th>
                            <td><?php  echo $txStatus ?></td>
                        </tr>
                        <tr id="example">
                            <th>PaymentMode</th>
                            <td><?php echo  $paymentMode ?></td>
                        </tr>

                        <tr id="example">
                            <th>Time</th>
                            <td><?php echo $txTime ?></td>
                        </tr>

                        <tr id="example">
                            <th>Signature</th>
                            <td><?php  echo $signature ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="footer center">
                    <center> <a href="viewmyDeals"><button class="btn btn-info btn-md"> Back To Participated
                                Deal</button></a></center>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
        } else {

     ?>

<div class="content-wrapper" id="particpatedPage">
    <section class="content-header">
        <div class="col-xs-6">

            <div class="box-body">

                <table class="table table-bordered table-hover">
                    <thead class="tablehead" style="background-color: red;">
                        <H4>PAYMENT INFO</H4>
                    </thead>
                    <tbody>
                        <tr id="example">
                            <th>OrderId</th>
                            <td><?php  echo $orderId ?></td>
                        </tr>
                        <tr id="example">
                            <th>AMOUNT</th>
                            <td><?php echo  $orderAmount ?></td>
                        </tr>
                        <tr id="example">
                            <th>ReferenceId</th>
                            <td><?php  echo $referenceId ?></td>
                        </tr>
                        <tr id="example">
                            <th>TxStatus</th>
                            <td><?php  echo $txStatus ?></td>
                        </tr>
                        <tr id="example">
                            <th>PaymentMode</th>
                            <td><?php echo  $paymentMode ?></td>
                        </tr>

                        <tr id="example">
                            <th>Time</th>
                            <td><?php echo $txTime ?></td>
                        </tr>

                        <tr id="example">
                            <th>Signature</th>
                            <td><?php  echo $signature ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="footer center">
                    <center> <a href="viewmyDeals"><button class="btn btn-info btn-md"> Back To Participated
                                Deal</button></a></center>
                </div>
            </div>
        </div>
    </section>
</div>


<?php

        }
     ?>


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

<style type="text/css">
#example {
    background-color: white;
    font-size: 16px;
    color: grey;
    border: 1px solid black;
}
.footer {}
</style>
<?php if ($txStatus == 'SUCCESS'){?>
<script type="text/javascript">
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
$(document).ready(function() {
    $(".loadingSec").show();
    setTimeout(function() {
        loadParticipationSuccess();
    }, 4000);
});
// feePayementisDone = "PAID";
<?php }
?>
</script>

<?php include 'footer.php';?>