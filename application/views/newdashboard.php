<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <br /><br />
                    <!-- New Code -->
                    <table class="table table-bordered">
                        <tr>
                            <td scope="col" class="highlSec col-sm-1 w1">S#</td>
                            <td scope="col" class="highlSec col-sm-2 w2">Date</td>
                            <td scope="col" class="highlSec col-sm-7 w3">Transaction Description</td>
                            <td scope="col" class="highlSec col-sm-1 w4">Deposits & Interest</td>
                            <td scope="col" class="highlSec col-sm-1 w5">Withdrawls & Principal Returns</td>
                        </tr>
                        <tbody style="border: 0px">
                            <tr data="principalAsonApr1st">
                                <td colspan="3">Total Principal As on Apr 1st 2021</td>
                                <td class="principalAsonApr1st"></td>
                                <td></td>
                            </tr>
                            <!-- One -->
                            <tr>
                                <td colspan="3" class="highlSec">My Principal - Deposits through Wallet Tranactions</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="">
                        <tbody id="principalAmtThroughWTransData" style="border: 0px;">
                            <!--principalAmtThroughWTransTpl for the code base-->
                        </tbody>
                        </tr>
                        <!-- One Ends -->

                        <!-- One -->
                        <tr>
                            <td colspan="3" class="highlSec">My Earnings - Interest Received</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <tbody id="lenderInterestEarnedData" style="border: 0px;">
                                <!--principalAmtThroughWTransTpl for the code base-->
                            </tbody>
                        </tr>
                        <!-- One Ends -->

                        <!-- One -->
                        <tr>
                            <td colspan="3" class="highlSec">My Principal - Funds Returned upon Borrower Re-Payment</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <tbody id="lenderPrincipalReturnedData" style="border: 0px;">
                                <!--principalAmtThroughWTransTpl for the code base-->
                            </tbody>
                        </tr>
                        <!-- One Ends -->

                        <!-- One -->
                        <tr>
                            <td colspan="3" class="highlSec">My Principal - Funds returned upon Withdraw Request</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <tbody id="lenderWithDrawData" style="border: 0px;">
                                <!--principalAmtThroughWTransTpl for the code base-->
                            </tbody>
                        </tr>
                        <!-- One Ends -->

                        <!-- One -->
                        <tfoot>
                            <th colspan="3" class="highlSec alcenter">
                                Total Principal in Lending:
                                <span class="totalPrincipalInLending"></span>
                            </th>
                            <td colspan="2" class="highlSec alcenter">
                                Total Interest Earned from Apri 1st 2021 - Till Date:
                                <span class="sumOfInterestAmount"></span>
                            </td>
                        </tfoot>
                        <tr class="">
                            <tbody id="lenderWithDrawData" style="border: 0px;">
                                <!--principalAmtThroughWTransTpl for the code base-->
                            </tbody>
                        </tr>
                        <!-- One Ends -->


                        </tbody>
                    </table>
                    <br /><br /><br />&nbsp;
                </div>
                <!-- New Code Ends -->


            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>




<script id="principalAmtThroughWTransTpl" type="text/template">
    {{#data}}
    <tr>
        <td>{{sno}}</td>
        <td>{{paidDate}}</td>
        <td>Investment</td>
        <td><span class="plusCredit">+</span>{{amountCredited}}</td>
        <td>&nbsp;</td>
    </tr>
 {{/data}}
</script>

<script id="lenderInterestEarnedTpl" type="text/template">
    {{#data}}
    <tr>
      <td>{{sno}}</td>
      <td>{{paidDate}}</td>
      <td>{{remarksFromSheet}}</td>
      <td><span class="plusCredit">+</span> {{amountPaid}}</td>
      <td>&nbsp;</td>
    </tr>
 {{/data}}
</script>

<script id="lenderPrincipalReturnedDataTpl" type="text/template">
    {{#data}}
        <tr>
            <td>{{sno}}</td>
            <td>{{paidDate}}</td>
            <td>{{remarksFromSheet}}</td>
            <td>&nbsp;</td>
            <td><span class="minusDebit">-</span> {{amountPaid}}</td>
        </tr>
 {{/data}}
</script>

<script id="lenderWithDrawTpl" type="text/template">
    {{#data}}
        <tr>
          <td>{{sno}}</td>
          <td>{{paidDate}}</td>
          <td>{{remarksFromSheet}}</td>
          <td></td>
          <td><span class="minusDebit">-</span> {{amountPaid}}</td>
        </tr>
 {{/data}}
</script>




<script id="displaywalletTpl234---" type="text/template">
    {{#data}}          
  <tr>
    <td colspan="3">S#</td>
    <td colspan="3">DATE</td>
    <td colspan="3">DESCRIPTION</td>
    <td colspan="3">AMOUNT</td>


    <tr>
      <td colspan="10">Total Principal on 1st april</td>
      <td colspan="2">{{totalPrincipalOnFirstApril}}</td>
    </tr>
    <tr>
     <th colspan="6">My  Principal Deposit Through Wallet Transcations </th>
     <th colspan="6"></th>
     <tr>
       <td colspan="3">{{lenderPricipalAmountThroughWalletTransaction.amountCredited}}</td>
       <td colspan="3" >{{lenderPricipalAmountThroughWalletTransaction.paidDate}}</td>
       <td colspan="3">{{}}</td>
       <td colspan="3">{{}}</td>
     </tr>
     <tr>
       <td colspan="3">2</td>
       <td colspan="3" >DD/MM/YYYY</td>
       <td colspan="3"> Interest Earned Towards Tollgates</td>
       <td colspan="3">600000</td>
     </tr>

   </tr>      
   <tr>
     <th colspan="6">My Earning - Interests Received </th>
     <th colspan="6">{{sumOfInterestAmount}}</th>
     <tr>
       <td colspan="3">1</td>
       <td colspan="3" >DD/MM/YYYY</td>
       <td colspan="3">KKD</td>
       <td colspan="3">23456</td>
     </tr>

   </tr>      
   <tr>
     <th colspan="6">My Principal-Funds Returned Upon Borrower Re-Payment</th>
     <th colspan="6"></th>
     <tr>
       <td colspan="3">1</td>
       <td colspan="3" >DD/MM/YYYY</td>
       <td colspan="3">Tollgates</td>
       <td colspan="3">1000000</td>
     </tr>             
   </tr>      
   <tr>
    <center> <th colspan="6">My Principal -Funds Returned Upon Withdraw Request</th></center>
    <th colspan="6"></th>
    <tr>
     <td colspan="3">1</td>
     <td colspan="3" >DD/MM/YYYY</td>
     <td colspan="3">GOGINENI</td>
     <td colspan="3">200000</td>
   </tr>
   <tr>                    
   </tr>
   <tr>
     <th colspan="6">Total  Principal in Lending  </th>
     <th colspan="6">{{totalPrincipalInLending}}</th>
   </tr>  
   <tr>
    <th colspan="6">Total interest earned from april 1st -Till date </th>
    <th colspan="6">20000000</th>
  </tr>    
</tr>

</tr>

{{/data}}
</script>
<script type="text/javascript">
window.onload = newdashboardcall();
</script>
<style type="text/css">
.table-bordered>thead>tr>th,
.table-bordered>tbody>tr>th,
.table-bordered>tfoot>tr>th,
.table-bordered>thead>tr>td,
.table-bordered>tbody>tr>td,
.table-bordered>tfoot>tr>td {
    border: 1px solid #000;
}

.table-bordered {
    border: 1px solid #000;
    width: 90%;
    margin: 0 auto 20px auto;
    padding-bottom: : 90px;
}

.w1 {
    width: 10%;
}

.w2 {
    width: 15%;
}

.w3 {
    width: 48%;
}

.w4 {
    width: 13%;
}

.w5 {
    width: 15%;
}
</style>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'footer.php';?>