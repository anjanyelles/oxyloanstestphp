<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <h3 class="col-md-6">
                Lenders Transactions History
            </h3>
            <div class="col-md-6 pull-right">
                <a href="walletbalance"><button class="col-sm-3 btn btn-lg btn-info  crrtWalletBlans">Wallet
                        Balance</button></a>

            </div>
        </div>
    </section>
    <div class="cls"></div>

    <!-- Main content -->
    <section class="content">



        <div class="cls"></div>

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
                        <div class="pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Lender ID</th>
                                    <th>scrow Account Number</th>
                                    <th>lender Name</th>
                                    <th>wallet Amount</th>
                                    <th>status</th>


                                    <!-- <th>Transaction Screen Shot</th>
                  <th>Status</th>   -->
                                </tr>
                            </thead>
                            <tbody id="displaywallettrns" class="displaywallettrns">
                                <!-- <td><a href="lenderAcceptedoffers?appNumber={{loanRequestId}}">{{loanRequest}}</a></td>
            -->
                                </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- form start -->

            </div>
            <!-- /.box -->
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script id="wallettransactiondetails" type="text/template">
    {{#data}}
                <tr> 
                  <td><a href="javascript:void(0)" class="viewLoanLenders"onclick="viewLoanLender({{id}})">LR{{id}}</a>
                  </td>
                  <td>{{scrowAccountNumber}}</td>
                  <td>{{lenderName}}</td>
                  <td>{{walletAmount}}</td>
                  <td>{{status}}</td>
                </tr>






<tr>
  <td style="display:none;" colspan="14" class="viewrunningLoanLenders  viewrunningLoanLenders-{{id}}">

      <div class="col-md-6 pull-right">
                    <div class="interstedPagination1 pull-right">
                      <ul class="pagination bootpag">
                    </ul>
                  </div>

                </div>
        
             <table class="table table-bordered table-hover">
              <thead>
               <tr style="background-color: aqua; border: 3px solid lightgrey;">
                  <th>Account Number</th>
                  <th>Credited Amount</th>
                  <th>Loan Id</th>
                  <th>Transaction Date</th>
                  <th>wallet Balance</th>
                  <th>creditedStatus</th>

              </tr>
              </thead>
              <tbody id="viewrunningLoanLenders-{{id}}">                   
               <tr id="displayNoLoanRecords" class="displayNoLoanRecords" >
                    <td colspan="8">No Offers found!</td>
                </tr>  
                </tbody>   
              </tfoot>
            </table>
      </td>
</br>
</br>
    </tr>
            {{/data}}
  </script>

<script type="text/javascript">
$(document).ready(function() {
    noprofileCheck = "no";
    noROICheck = "no";
    //loadWalletDetails();   
    loadWalletTransactionHistory();
});
</script>

<script id="loadLendersRunningloans" type="text/template">
    {{#data}}
      <tr style="border: 3px solid lightgrey;">
        <td>{{accountNumber}}</td>
        <td>{{creditedAmount}}</td>
        <td>{{loanId}}</td>
       <td>{{transactionDate}}</td>
        <td>{{walletBalance}}</td>
         <td>{{creditedStatus}}</td>


      </tr>
  {{/data}}
</script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<?php include 'admin_footer.php';?>