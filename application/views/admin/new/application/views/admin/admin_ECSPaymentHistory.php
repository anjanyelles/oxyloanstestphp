<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>MONTHLY PAYMENTS HISTORY</center>
        </h1>
    </section><br />
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose Month and year --</option>
                    <option value="amount&city">MONTH&YEAR</option>
                </select>
                <span class="errorsearch" style="display: none;">Please Choose Month And Year.</span>
            </div>
            <div class="col-xs-2 text-center city" style="display: none;">
                <select class="form-control" name="city" id="monthvalue" class="form-control city">
                    <option value=""> Select Month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
            </div>
            <div class="col-xs-2 text-center amount" style="display: none;">
                <input type="text" name="amount" class="form-control year" placeholder="Enter The Year">
            </div>
            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="ecssearch();"><i
                        class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>

        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-4 pull-left">
                            <h3 class="box-title">ECS & NON ECS AMOUNT INFO</h3>
                        </div>
                        <div class="col-md-8 pull-right ecspaymentBtns">

                            <a href="lendersPayUtransactions"><button type="submit"
                                    class="btn btn-md btn-primary paydetails"
                                    style="border-radius: 16px; margin-right:10px">View PayU Transaction</button>

                                <a href="borrowerPaymentTransactions "><button type="submit"
                                        class="btn btn-md btn-info paydetails" style="border-radius: 16px;">Borrower fee
                                        Transaction</button></a>

                        </div>
                    </div>

                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <tbody id="displaywallet">
                                </tfoot>
                        </table>
                    </div>

                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<style type="text/css">
#example2 {
    font-family: arial;
    box-sizing: border-box;
}

th,
td {
    border: 1px solid lightgrey;
    text-align: left;
}

th {
    background-color: #6482BD;
    color: white;
}

td,
tr:nth-child(odd) {
    background-color: lightgrey;
}

td {
    font-size: 18px;
}
</style>
<script id="displaywalletTpl234" type="text/template">
    {{#data}}
  <tr>
    <th colspan="1"> Total Amount</th>
    <td colspan="3">{{totalAmount}}</td>
  </tr>
  <tr>
    <td rowspan="2"><b>Amount through payment screenshot:{{amountThroughPaymentScreenShot}} </b></td>
    <th><center>Full Payment</center></th>
    <th colspan="3"><center>Part Payment</center></th>
  </tr>
  <tr>
    <td>{{paymentScreenshotFullPayment}}</td>
    <td colspan="3">{{paymentScreenshotPartPayment}}</td>
  </tr>
  <tr>
    <td rowspan="2"><b>Total Amount through ECS  :{{amountThroughEcs}}</b> </td>
    <th><center> Amount On 5th ECS</center></th>
    <th colspan="3"><center>Amount On 20 ECS</center></th>
  </tr>
  <tr>
    <td>{{amountOnFifthEcs}}</td>
    <td colspan="3">{{amountOnTwentyEcs}}</td>
  </tr>
  <tr>
    <td rowspan="2"><b>Total Amount through IDFC  :{{amountThroughIdfc}}</b> </td>
    <th><center> IDFC  Amount On 10 TH</center></th>
    <th colspan="3"><center>IDFC Amount On 5 TH</center></th>
    
  </tr>
  <tr>
    <td>{{idfcAmountOnTenth}}</td>
    <td colspan="3">{{idfcAmountOnFifth}}</td>
  </tr>
  <tr>
    <th colspan="1">Total ECS Amount </th>
    <td colspan="3">{{totalEcsAmount}}</td>
  </tr>
  <tr>
    <th colspan="1">Amount Through PayU </th>
    <td colspan="3">{{amountThroughPayU}}</td>
  </tr>
  <tr>
    <th colspan="1">Total Processing Fee </th>
    <td colspan="3">{{totalProcessingFee}}</td>
  </tr>
  <tr>
    <td rowspan="3">Lender's PayU</td>
    <th><center>Total Lender Fee Through PayU</th>
    <th><center>Lender Fee Through Payu</center></th>
    <th><center>Paytm Amount</center></th>
  </tr>
  <tr>
    <td>{{totalLenderFeeThroughPayu}}</td>
    <td>{{lenderFeeThroughPayu}}</td>
    <td>{{sumOfPaytmAmount}}</td>
  </tr>
  {{/data}}
  </script>
<script id="displaywalletTpl1" type="text/template">
    {{#data}}
  <tr>
    <td>{{borrowerName}}</td>
    <td>{{borrowerUniqueNumber}}</td>
    <td>{{amount}}</td>
    <td>{{paymentType}}</td>
    <td>{{paidDate}}</td>
    <td>{{updatedName}}</td>
    <td>{{status}}</td>
  </tr>
  {{/data}}
  </script>
<script type="text/javascript">
window.onload = ecspayment();
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>