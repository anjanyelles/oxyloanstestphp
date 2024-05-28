<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pooling Lenders
        </h1>
    </section>
    <div class="cls"></div>

    <section class="content">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- /.box-header -->
                <div class="box-body">
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
                    </div>

                    <div class=" col-md-12 totalSumofPooling">
                        <div class="col-md-4 pull-left"><b>Total Current Amount : <span
                                    class="totalCurrentAmount">1000</span></b></div>
                        <div class="col-md-4"><b> Total Monthly Interest : <span
                                    class="totalMonthlyInterest">10000</span></b></div>
                    </div>
                    <table id="myborrowingsData" class="table table-bordered table-hover">
                        <thead>
                            <tr id="example">

                                <th>Lender Name</th>
                                <th>Current Amount</th>
                                <th>Interest Date For EveryMonth</th>
                                <th>Monthly Interest</th>

                            </tr>
                        </thead>
                        <tbody id="displaywallettrns" class="displaywallettrns">
                            <tr id="displayNoRecords" class="displaywallettrns">
                                <td colspan="8">No records found!</td>
                            </tr>
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
    <td>{{name}}</td>
    <td>{{currentAmount}} </td>
    <td>{{interestDateForEveryMonth}}</td>
    <td>{{monthlyInterest}}</td>
    
  </tr>
  {{/data}}
  </script>



<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    poolingLendersInfo();
});
</script>
<?php include 'admin_footer.php';?>