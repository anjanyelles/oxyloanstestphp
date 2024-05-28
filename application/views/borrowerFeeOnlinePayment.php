<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>

<?php
function getCallbackUrl(){
  $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
  return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . 'response.php';
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Borrower Fee Payment
        </h1>
        <div class="pull-left" style="display: none;">
            <small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">PayU Money Payment</li>
                </ol>
            </small>
        </div>

    </section>
    <div class="cls"></div>



    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body no-padding">



                        <div id="gettingUserCreditReport">
                            <div id="stepOneForm">
                                <form autocomplete="off" id="personalinfoSection">

                                    <div class="row setup-content" id="step-1">
                                        <div class="col-xs-12">
                                            <div class="col-md-12 personal_info">

                                                <fieldset>
                                                    <div class="row customFormQ">
                                                        <div class="cls"></div>
                                                        <br>
                                                        <!-- left column -->
                                                        <div class="col-md-12">
                                                            <form action="#" id="payment_form">
                                                                <input type="hidden" id="udf5" name="udf5" value="" />
                                                                <input type="hidden" id="surl" name="surl"
                                                                    value="<?php echo getCallbackUrl(); ?>" />
                                                                <input type="hidden" id="key" name="key"
                                                                    placeholder="Merchant Key" value="" />
                                                                <input type="hidden" id="salt" name="salt"
                                                                    placeholder="Merchant Salt" value="" />
                                                                <input type="hidden" id="txnid" name="txnid"
                                                                    placeholder="Transaction ID" value="" />
                                                                <input type="hidden" id="amount" name="amount"
                                                                    placeholder="Amount" value="" />
                                                                <input type="hidden" id="pinfo" name="pinfo"
                                                                    placeholder="Product Info" value="" />
                                                                <input type="hidden" id="fname" name="fname"
                                                                    placeholder="First Name" value="" />
                                                                <input type="hidden" id="email" name="email"
                                                                    placeholder="Email" value="" />
                                                                <input type="hidden" id="mobile" name="mobile"
                                                                    placeholder="Mobile Number" value="" />
                                                                <input type="hidden" id="hash" name="hash"
                                                                    placeholder="Hash" value="" />
                                                            </form>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class=" ">
                                                                    <table
                                                                        class="table table-striped table-bordered payment_status">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col"><label
                                                                                        for="inputEmail4">Amount</label>
                                                                                </th>
                                                                                <td><span id="amount_display"></span>
                                                                                </td>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th><label for="inputEmail4">Product
                                                                                        Info</label></th>
                                                                                <td><span id="pinfo_display"></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><label for="inputEmail4">Frist
                                                                                        Name</label></th>
                                                                                <td><span id="fname_display"></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><label
                                                                                        for="inputEmail4">Email</label>
                                                                                </th>
                                                                                <td><span id="email_display"></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><label for="inputEmail4">Mobile/Cell
                                                                                        Number</label></th>
                                                                                <td><span id="mobile_display"></span>
                                                                                </td>
                                                                            </tr>


                                                                        </tbody>
                                                                    </table>
                                                                    <div class="row justify-content-start mt-4">
                                                                        <div class="col  mr45">
                                                                            <button type="submit"
                                                                                class="btn btn-primary mt-4 mr20 float-right"
                                                                                onclick="launchBOLT(); return false;">Pay
                                                                                Now</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>






                                                        <!-- /.box -->
                                                    </div><br>


                                                </fieldset>

                                            </div>
                                        </div>
                                    </div>


                            </div>

                        </div>
                        <div class="col-xs-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>





</div>
<!-- /.content-wrapper -->

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    fetchFeePaymentDetails();
});
</script>

<!-- BOLT Sandbox/test //-->

<!-- <script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script>-->
<script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="3c8dbc"
    bolt-logo="https://oxyloans.com/wp-content/themes/oxyloan/oxyloan/_ui/images/logo4.png"></script>

<!-- <script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script> -->
<script type="text/javascript"><!--
  function launchBOLT() {
    bolt.launch({
      key: $('#key').val(),
      salt: $('#salt').val(),
      txnid: $('#txnid').val(), 
      hash: $('#hash').val(),
      amount: $('#amount').val(),
      firstname: $('#fname').val(),
      email: $('#email').val(),
      phone: $('#mobile').val(),
      productinfo: $('#pinfo').val(),
      udf5: $('#udf5').val(),
      surl : $('#surl').val(),
      furl: $('#surl').val(),
      mode: 'dropout'
    },
    { 
      responseHandler: function(BOLT){
      console.log( BOLT.response.txnStatus );   
      console.log( BOLT.response.mihpayid );   
      console.log( BOLT.response.status );   
    },
      catchException: function(BOLT){
      alert( BOLT.message );
    }
    });
  }
//--
</script> 
<?php include 'footer.php';?>