<!DOCTYPE html>
<html>

<head>
    <title>Getepay Test Payment</title>

</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <h1>Getepay Test Payment</h1>

    <?php

 date_default_timezone_set('Asia/Calcutta');
 $date = date('D M d H:i:s') . ' IST ' . date('Y');
  $returnUrl="http://localhost/oxyloans_fe/payUtest2";


     $request=array(
        
            "mid"=>"168",
            "amount"=>"52.00",
            "merchantTransactionId"=>date("YmdHis"),
            "transactionDate"=>"Wed Oct 19 13:54:33 IST 2022",
            "terminalId"=>"Getepay.adaasd51021@icici",
            "udf1"=>"9322286054",
            "udf2"=>"Test",
            "udf3"=>"test@gmail.com",
            "udf4"=>"",
            "udf5"=>"",
            "udf6"=>"",
            "udf7"=>"",
            "udf8"=>"",
            "udf9"=>"",
            "udf10"=>"",
            "ru"=>$returnUrl,
            "callbackUrl"=>"",
            "currency"=>"INR",
            "paymentMode"=>"ALL",
            "bankId"=>"",
            "txnType"=>"single",
            "productType"=>"IPG",
            "txnNote"=>"Test Txn",
            "vpa"=>"Getepay.adaasd51021@icici"
        );
?>

    <form id="paymentDateWayGetepay" action="#" autocomplete="off">
        <br>
        <input type="text" name="mid" value="<?php echo $request["mid"]?>">
        <br>
        <input type="text" name="amount" value="<?php echo $request["amount"]?>">
        <br>
        <input type="text" name="merchantTransactionId" value="<?php echo $request["merchantTransactionId"] ?>">
        <br>
        <input type="text" name="transactionDate" value="<?php echo $request["transactionDate"]?>">
        <br>
        <input type="text" name="terminalId" value="<?php echo $request["terminalId"] ?>">
        <br>
        <input type="text" name="udf1" value="<?php echo $request["udf1"] ?>">
        <br>
        <input type="text" name="udf2" value="<?php echo $request["udf2"] ?>">
        <br>
        <input type="text" name="udf3" value="<?php echo $request["udf3"] ?>">
        <br>
        <input type="text" name="udf4" value="<?php echo $request["udf4"] ?>">
        <br>
        <input type="text" name="udf5" value="<?php echo $request["udf5"] ?>">
        <br>
        <input type="text" name="udf6" value="<?php echo $request["udf6"] ?>">
        <br>
        <input type="text" name="udf7" value="<?php echo $request["udf7"] ?>">
        <br>
        <input type="text" name="udf8" value="<?php echo $request["udf8"] ?>">
        <br>
        <input type="text" name="udf9" value="<?php echo $request["udf9"] ?>">
        <br>
        <input type="text" name="ru" value="<?php echo $request["ru"] ?>">
        <br>
        <input type="text" name="callbackUrl" value="<?php echo $request["callbackUrl"] ?>">
        <br>
        <input type="text" name="currency" value="<?php echo $request["currency"] ?>">
        <br>
        <input type="text" name="paymentMode" value="<?php echo $request["paymentMode"] ?>">
        <br>
        <input type="text" name="bankId" value="<?php echo $request["bankId"] ?>">
        <br>
        <input type="text" name="txnType" value="<?php echo $request["txnType"] ?>">
        <br>
        <input type="text" name="productType" value="<?php echo $request["productType"] ?>">
        <br>
        <input type="text" name="txnNote" value="<?php echo $request["txnNote"] ?>">
        <br>
        <input type="text" name="vpa" value="<?php echo $request["vpa"] ?>">
        <br>
        <input type="submit" name="submit" value="Paynow" id="sbtcashfree">
    </form>
</body>


<script type="text/javascript">
document.getElementById("paymentDateWayGetepay").addEventListener("click", function(event) {
    event.preventDefault();
    <?php  

        $json_requset = json_encode($request);
        $key = base64_decode('JoYPd+qso9s7T+Ebj8pi4Wl8i+AHLv+5UNJxA3JkDgY=');
        $iv = base64_decode('hlnuyA9b4YxDq6oJSZFl8g');

        $ciphertext_raw = openssl_encrypt($json_requset, "AES-256-CBC", $key, $options = OPENSSL_RAW_DATA, $iv);
        $ciphertext = bin2hex($ciphertext_raw);
        $newCipher = strtoupper($ciphertext);

           $request=array(
            "mid"=>'168',
            "terminalId"=>'Getepay.adaasd51021@icici',
            "req"=>$newCipher
        );
  ;?>

    var javaScriptVar = "<?php echo $request; ?>";

    alert(javaScriptVar);
    $.ajax({
        type: 'POST',
        url: "https://p.getepay.in:8443/getepayPortal/pg/generateInvoice",
        contentType: 'application/x-www-form-urlencoded; charset=utf-8',
        crossDomain: true,
        cache: true,
        dataType: 'json',
        data: datacashfree

        success: function(data) {
            // $('#response').html(JSON.stringify(data, null, " "));;

            console.log(data);
        },
        error: function(e) {
            $('#response').html(e.responseText);
        }
    });

});
</script>

</html>


<?php 
$postdata = $_POST;
$msg = '';
if (isset($postdata ['getepayTxnId'])) {
    $key                =   $postdata['getepayTxnId'];   
    $mid                =   $postdata['mid'];
    $txnAmount          =   $postdata['txnAmount'];
    $txnStatus          =   $postdata['txnStatus'];
    $merchantOrderNo    =   $postdata['merchantOrderNo'];
    $mobile             =   $postdata['udf1'];
    $email              =   $postdata['udf2'];
    $signature          =   $postdata['signature'];
    

   
    if ($txnStatus == 'SUCCESS') {


         echo "<script>alert('$key');</script>";
         echo "<script>alert('$mid');</script>";
          echo "<script>alert('$txnAmount');</script>";
           echo "<script>alert('$txnStatus');</script>";
            echo "<script>alert('$merchantOrderNo');</script>";
             echo "<script>alert('$mobile');</script>";
              echo "<script>alert('$email');</script>";
               echo "<script>alert('$signature');</script>";


        $msg = '<div class="alert alert-success" role="alert">Transaction Successful. Thank you for your payment againt the platform fee.</div>';
        
         
    }
    else {
       
        $msg = '<div class="alert alert-danger" role="alert">Payment failed, Please try again.</div>';
    } 
}
else exit(0);
?>