<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="test-bold">
            PayU Transactions
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
                        <table id="payuLendersData" class="table table-bordered table-hover">
                            <thead>
                                <tr style="background-color: #B0C4DE; border: 3px solid lightgrey;">
                                    <th>User ID</th>
                                    <th>Lender Name</th>
                                    <th>Amount</th>
                                    <th>Deal Id</th>
                                    <th>paymentDate</th>
                                </tr>
                            </thead>
                            <tbody id="displayPayulenders" class="displayPayuTrans">
                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script id="payuTransactions" type="text/template">
    {{#data}}
  <tr>
    <td>LR{{userId}}</td>
    <td>{{lenderName}}</td>
    <td>{{amount}}</td>
    <td>{{dealId}}</td>
     <td>{{paymentDate}}</td>
  </tr>
  {{/data}}
  </script>
<script type="text/javascript">
$(document).ready(function() {
    payuTransactionslist();
});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<?php include 'admin_footer.php';?>