uservalidityfee<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>
<?php 
$postdata = $_POST;
$msg = '';
if (isset($postdata ['key'])) {
	$key				=   $postdata['key'];	
	$txnid 				= 	$postdata['txnid'];
    $amount      		= 	$postdata['amount'];
	$productInfo  		= 	$postdata['productinfo'];
	$firstname    		= 	$postdata['firstname'];
	$email        		=	$postdata['email'];
	$udf5				=   $postdata['udf5'];
	$mihpayid			=	$postdata['mihpayid'];
	$status				= 	$postdata['status'];
	$resphash			= $postdata['hash'];

	//Calculate response hash to verify	
	//$keyString 	  		=  	$key.'|'.$txnid.'|'.$amount.'|'.$productInfo.'|'.$firstname.'|'.$email.'|||||'.$udf5.'|||||';
	//$keyArray 	  		= 	explode("|",$keyString);
	//$reverseKeyArray 	= 	array_reverse($keyArray);
	//$reverseKeyString	=	implode("|",$reverseKeyArray);
	//$CalcHashString 	= 	strtolower(hash('sha512', $salt.'|'.$status.'|'.$reverseKeyString));
	
	
	if ($status == 'success') {
		$msg = '<div class="alert alert-success" role="alert">Transaction Successful. Thank you for your payment againt the EMI.</div>';
		//Do success order processing here...
	}
	else {
		//tampered or failed
		$msg = '<div class="alert alert-danger" role="alert">Payment failed, Please try again.</div>';
	} 
}
else exit(0);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Payment Status
        </h1>

    </section>
    <div class="cls"></div>

    <!-- Main content -->
    <section class="content">
        <div class="cls"></div>
        <div class="row">
            <div class=" col-lg-12">
                <div class="box">
                    <div class="row">
                        <div class="col-md-12"><?php echo $msg; ?></div>
                    </div>
                    <table class="table table-striped table-bordered payment_status">
                        <thead>
                            <tr>
                                <th scope="col">Transaction/Order ID</th>
                                <td><?php echo $txnid; ?></td>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Amount</th>
                                <td><?php echo $amount; ?></td>
                            </tr>
                            <tr>
                                <th>Product Info</th>
                                <td><?php echo $productInfo; ?></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><?php echo $firstname; ?></td>
                            </tr>
                            <tr>
                                <th>Email ID</th>
                                <td><?php echo $email; ?></td>
                            </tr>
                            <tr>
                                <th>Mihpayid</th>
                                <td><?php echo $mihpayid; ?></td>
                            </tr>
                            <tr>
                                <th>Transaction Status</th>
                                <td><?php echo $status; ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
$(document).ready(function() {
    updateTransactionStatus(<?php echo "'";?><?php echo $txnid; ?><?php echo "'";?>,
        <?php echo "'";?><?php echo $mihpayid; ?><?php echo "'";?>,
        <?php echo "'";?><?php echo $status; ?><?php echo "'";?>,
        <?php echo "'";?><?php echo $amount; ?><?php echo "'";?>);
});
</script>

<?php include 'footer.php';?>