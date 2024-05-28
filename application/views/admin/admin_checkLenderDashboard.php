<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Display Lender DASHBOARD
        </h1>
        <span class="requestidFromClick hide"><?php echo $requestidFromClick; ?></span>

    </section>
    <div class="cls"></div>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-3 text-center">
                <input type="text" name="lenderid" class="form-control lenderid" placeholder="Lender ID">
            </div>

            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="lenderDashboardCallTest();"><i
                        class="fa fa-angle-double-right"></i> <b>Get Dashboard</b>
                </button>
            </div>
        </div>


        <div class="modal modal-danger fade" id="modal-transactiondanger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                



            Error
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
    
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <a href="#">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">OK</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

        <!-- New Dashboard -->
        <section class="content noTopPadding">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="pull-left reff col-md-12 dnmP">
                            <div class="info">
                                <code><strong>Note:</strong></code> Our immediate goal is to showcase your wallet
                                transactions, interest earnings, principal returns and principal return upon withdrawal
                                request. In the Future, We will be adding much more meaningful details and map them to
                                Running Loans.<br />
                            </div>
                        </div>

                        <br /><br />
                        <!-- New Code -->
                        <table class="table table-bordered">
                            <tr>
                                <td scope="col" class="highlSec col-sm-1 w1 newheadBGfodb">S#</td>
                                <td scope="col" class="highlSec col-sm-2 w2 newheadBGfodb">Date</td>
                                <td scope="col" class="highlSec col-sm-7 w3 newheadBGfodb">Transaction Description</td>
                                <td scope="col" class="highlSec col-sm-1 w4 newheadBGfodb">Deposits & Interest</td>
                                <td scope="col" class="highlSec col-sm-1 w5 newheadBGfodb">Withdrawls & Principal
                                    Returns</td>
                            </tr>
                            <tbody style="border: 0px">
                                <tr data="principalAsonApr1st" class="hide">
                                    <td colspan="3">Total Principal As on Apr 1st 2021</td>
                                    <td class="principalAsonApr1st"></td>
                                    <td></td>
                                </tr>
                                <!-- One -->
                                <tr>
                                    <td colspan="3" class="highlSec">My Principal - Deposits through Wallet Transactions
                                    </td>
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
                                <td colspan="3" class="highlSec">My Principal - Funds Returned upon Borrower Re-Payment
                                </td>
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
                                <td colspan="3" class="highlSec">My Principal - Funds returned upon Withdraw Request
                                </td>
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
                                <!-- <th colspan="3" class="highlSec alcenter ">
              <div class="hide">
                Total Principal in Lending:
                <span class="totalPrincipalInLending"></span>
               </div> 
            </th>-->
                                <td colspan="5" class="highlSec alcenter">
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
                    <!-- New Dashboard ends-->
                    <!-- New DashBoard Code -->
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
                    <style type="text/css">
                    .table-bordered>thead>tr>th,
                    .table-bordered>tbody>tr>th,
                    .table-bordered>tfoot>tr>th,
                    .table-bordered>thead>tr>td,
                    .table-bordered>tbody>tr>td,
                    .table-bordered>tfoot>tr>td {
                        border: 1px solid #696969;
                    }

                    .table-bordered {
                        border: 1px solid #696969;
                        width: 96%;
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

                    .newheadBGfodb {
                        background: #16D39A !important;
                        color: #FFFFFF;
                    }
                    </style>
                    <!-- New DashBoard Code ENDS ***** -->
                    <script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
                    <?php include 'admin_footer.php';?>