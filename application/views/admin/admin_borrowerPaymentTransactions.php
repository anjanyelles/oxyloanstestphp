<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="test-bold">
            Borrower Fee Transactions
        </h1>
    </section>
    <div class="cls"></div>
    <section class="content">
        <div class="cls"></div>

        <div class="row customFormQ">
            <div class="cls"></div>
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
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
                        <div class="pull-right">
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-3 pull-left">
                            <p>Total Borrower Fee : <b><span class="borrowerfee">0</span></b></p>
                        </div>
                        <div class="col-md-3 pull-left">
                            <p>Total Lender Fee : <b><span class="lenderfee">0</span></b></p>
                        </div>
                        <div class="col-md-3 pull-left">
                            <p>Total Amount Disbursed : <b><span class="amountDisbursedfee">0</span></b></p>
                        </div>
                        <div class="col-md-3 pull-left">
                            <p>Current Month Lender Fee : <b><span class="lenderCurrentfee">0</span></b></p>
                        </div>

                        <table id="payuLendersData" class="table table-bordered table-hover">
                            <thead>
                                <tr style="background-color: #B0C4DE; border: 3px solid lightgrey;">
                                    <th>User ID</th>
                                    <th>User Name</th>
                                    <th>Amount</th>

                                </tr>
                            </thead>
                            <tbody id="borrowerdisplayPayulenders" class="displayPayuTrans">
                                <tr class="displaynone" style="display:none">
                                    <td colspan="8">No data found</td>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script id="borrowerpayuTransactions" type="text/template">
    {{#data}}
  <tr>
    <td>BR{{borrowerId}}</td>
    <td>{{borrowerName}}</td>
    <td>{{processingFee}}</td>
   
  </tr>
  {{/data}}
  </script>
<script type="text/javascript">
$(document).ready(function() {
    BorrowerFeeTransactionslist();
});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<?php include 'admin_footer.php';?>