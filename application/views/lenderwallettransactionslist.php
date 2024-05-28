<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            My Transactions History
        </h1>
    </section>
    <div class="cls"></div>


    <!-- Main content -->
    <section class="content">
        <div class="row customFormQ">
            <div class="cls"></div>
            <div class="pull-right">
                <div class="row">
                    <div class="col-md-12">
                        <div class="acceptedPagination">
                            <ul class="pagination bootpag">
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        

                        <button class="btn btn-success" onclick="downloadLenderTransaction();">Download Transaction
                            History</button>
                    </div>
                    <div class="pull-right">
                    </div>


                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myborrowingsData" class="table table-bordered table-hover ">
                            <thead class="mobileDiv_4">
                                <tr>
                                    <th>Transaction Date</th>
                                    <!-- <th>Account Number</th> -->
                                    <!--   <th>withdraw  </th> -->
                                    <th>Credited Amount</th>
                                    <th>Debited Amount</th>
                                    <th>Status </th>

                                    
                                    <!--      <th>Withdraw Amount</th> -->

                                    <!-- <th>Transaction Screen Shot</th>
                  <th>Status</th>   -->
                                </tr>
                            </thead>
                            <tbody id="displaywallettrns" class="displaywallettrns mobileDiv_3">
                                <tr id="displayNoRecords" class="displaywallettrns">
                                    <td colspan="8">No Transactions found!</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- form start -->
            </div>
        </div>
        <!-- /.box -->



    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script id="wallettransactiondetails" type="text/template">
    {{#data}}
                <tr class="divBlock_Mob_001"> 
                  
                  <td>
                    <span class="lable_mobileDiv">transactionDate</span>
                  {{transactionDate}}
                </td>


           <!--   <td>
                  <span class="lable_mobileDiv">Account details</span>
                   <span id="cd-{{creditedAmount}}">{{accountNumber}}</span>  
                 </td> -->

                  <td>
                     <span class="lable_mobileDiv">Credited Amount</span>
                     {{creditedAmount}}
                </td>
               

                      <td>
                     <span class="lable_mobileDiv">debited Amount</span>
                  {{debitedAmount}}
                </td>

                   <td>
                     <span class="lable_mobileDiv">Amount From</span>
                  {{amountFrom}}
                </td>

             <!--    <td>
                     <span class="lable_mobileDiv">Withdraw Amount</span>
                  {{withdrawAmount}}
                </td> -->


                  <!-- <td>
                    <span class="lable_mobileDiv">disbursed Amount</span>
                  {{disbursedAmount}}
                </td>
                  <td>
              <span class="lable_mobileDiv">Wallet Balance</span>
                  {{walletBalance}}</td> -->
                 
                  <!--  <td> <a href="javascript:void(0)" onclick="downLoadWalletTrnsImage({{userId}},{{documentUploadedId}},<?php echo "'";?>{{documentSubType}}<?php echo "'";?>)">{{fileName}}</a></td>	
                  <td>{{status}}</td> -->
                </tr>
            {{/data}}
  </script>

<div class="modal modal-success fade" id="modal-downloadWallet">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                Lender Transaction History Downloaded Successfully.
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
$(document).ready(function() {
    noprofileCheck = "no";
    noROICheck = "no";
    loadWalletTransactionHistory();
});
</script>


<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<?php include 'footer.php';?>