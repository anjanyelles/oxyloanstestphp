<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Membership Transactions History
        </h1>
    </section>
    <div class="cls"></div>

    <!-- Main content -->
    <section class="content">
        <div class="row customFormQ">
            <div class="cls"></div>
            <div class="pull-right">

            </div>
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row pull-right">
                            <div class="col-md-12">
                                <div class="acceptedPagination">
                                    <ul class="pagination bootpag">
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <table id="myborrowingsData" class="table table-bordered table-hover ">
                            <thead class="mobileDiv_4">
                                <tr>
                                    <th>Payment Date</th>
                                    <th>Transaction Number</th>
                                    <th>Amount</th>
                                    <th>Paid Through</th>

                                </tr>
                            </thead>
                            <tbody id="displayvaliditywallettrns" class="displaywallettrns mobileDiv_3">
                                <tr id="displaywalletNoRecords" class="displaywallettrns">
                                    <td colspan="8">No Transactions found!</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box -->



    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script id="validitywallettransactiondetails" type="text/template">
    {{#data}}
                <tr class="divBlock_Mob_001"> 
                  <td>
                    <span class="lable_mobileDiv">Payment Date </span>
                  {{paymentDate}}
                   </td>
                  <td>
                    <span class="lable_mobileDiv">Transaction Number </span>
                  {{transactionNumber}}
                   </td>
                  <td>
                    <span class="lable_mobileDiv">Amount</span>
                  {{amount}}
                  </td>
                  <td>
                    <span class="lable_mobileDiv">Paid Through</span>
                  {{paidType}}
                </td>
                </tr>
            {{/data}}
  </script>

<script type="text/javascript">
$(document).ready(function() {
    usermembershipWalletTransactions();
});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'footer.php';?>