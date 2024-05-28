<!DOCTYPE html>
<html>

<head>
    <title>Cash free</title>
</head>

<body>
    <h1>Cash free</h1>
    <?php

 $secretKey = "a93a8c0ce15fc87f572ef17509d7ed91f8526a62";
// $merchantData = array(
//      "key1" => "value1",
//      "key2" => "value2",
//      "key3" => "value3"
// );
// $merchantData = base64_encode(json_encode($merchantData));
$FourDigitRandomNumber = mt_rand(1111,9999);


$appId="14194736ea98bc14aa9043ed44749141";
$orderId="order_".$FourDigitRandomNumber;
$orderAmount="100.00";
$orderCurrency= "INR";
$orderNote= "test";
$customerName= "livin";
$customerPhone= "7569084614";
$customerEmail= "livinmandeva@gmail.com";

$returnUrl= "http://182.18.139.198/new/payUtest";
$notifyUrl= "http://182.18.139.198/new/payUtest";


$postData = array(

  "appId" => $appId,
  "orderId" => $orderId,
  "orderAmount" => $orderAmount,
  "orderCurrency" => $orderCurrency,
  "orderNote" => $orderNote,
  "customerName" => $customerName,
  "customerPhone" => $customerPhone,
  "customerEmail" => $customerEmail,  
  "returnUrl" => $returnUrl,
  "notifyUrl" => $notifyUrl,
);
 // get secret key from your config
 ksort($postData);
 $signatureData = "";
 foreach ($postData as $key => $value){
      $signatureData .= $key.$value;
 }

 echo $signatureData;


 $signature = hash_hmac('sha256', $signatureData, $secretKey,true);
 $signature = base64_encode($signature);

?>




    <form id="redirectForm" method="post" action="https://test.cashfree.com/billpay/checkout/post/submit">
        <label>appid :</label>
        <input type="text" name="appId" value="<?php echo $appId ?>" /></br>
        <label>orderId :</label>
        <input type="text" name="orderId" value="<?php echo $orderId ?>" /></br>
        <label>orderAmount :</label>
        <input type="text" name="orderAmount" value="<?php echo $orderAmount ?>" /></br>
        <label>orderCurrency :</label>
        <input type="text" name="orderCurrency" value="<?php echo $orderCurrency ?>" /></br>
        <label>orderNote :</label>
        <input type="text" name="orderNote" value="<?php echo $orderNote ?>" /></br>
        <label>customerName :</label>
        <input type="text" name="customerName" value="<?php echo $customerName ?>" /></br>
        <label>customerEmail :</label>
        <input type="text" name="customerEmail" value="<?php echo $customerEmail ?>" /></br>
        <label>customerPhone :</label>
        <input type="text" name="customerPhone" value="<?php echo $customerPhone ?>" /></br>
        <label>returnUrl :</label>
        <input type="text" name="returnUrl" value="<?php echo $returnUrl ?>" /></br>
        <label>notifyUrl :</label>
        <input type="text" name="notifyUrl" value="<?php echo $notifyUrl ?>" /></br>
        <label>signature :</label>
        <input type="text" name="signature" value="<?php echo $signature ?>" /></br>

        <input type="submit" value="Pay">
</body>

</html>




<?php 
$postdata = $_POST;
$msg = '';
if (isset($postdata ['orderId'])) {

 $orderId = $postdata["orderId"];
 $orderAmount = $postdata["orderAmount"];
 $referenceId = $postdata["referenceId"];
 $txStatus = $postdata["txStatus"];
 $paymentMode = $postdata["paymentMode"];
 $txMsg = $postdata["txMsg"];
 $txTime = $postdata["txTime"];
 $signature = $postdata["signature"];

 

    
    if ($txStatus == 'SUCCESS') {

        echo "<script>alert('$orderId');</script>";
         echo "<script>alert('$orderAmount');</script>";
          echo "<script>alert('$referenceId');</script>";
           echo "<script>alert('$txStatus');</script>";
            echo "<script>alert('$paymentMode');</script>";
             echo "<script>alert('$txMsg');</script>";
              echo "<script>alert('$txTime');</script>";
               echo "<script>alert('$signature');</script>";

  
        $msg = '<div class="alert alert-success" role="alert">Transaction Successful.</div>';
        //Do success order processing here...
    }
    else {
        //tampered or failed
        $msg = '<div class="alert alert-danger" role="alert">Payment failed, Please try again.</div>';


        
    } 
}


?>