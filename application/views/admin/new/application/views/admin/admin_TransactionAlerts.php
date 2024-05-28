<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="pull-left">
            Transactions Alerts Info
        </h1>
    </section><br />
    <!-- Main content -->

    <section class="content">

        <div class="row transactionAlertsearch">
            <div class="col-xs-2 text-center">
                <input type="text" name="" placeholder="From date" id="alertFromDate" style="padding:5px">
            </div>
            <div class="col-xs-2 text-center">
                <input type="text" name="" placeholder="TO date" id="alertToDate" style="padding:5px">
            </div>

            <div class="col-xs-2  TransactionsAlertmonth">
                <select class="form-control qraccountType" name="transmonth">
                    <option value="">Transaction Type</option>
                    <option value="CREDITED">CREDITED</option>
                    <option value="DEBITED">DEBITED</option>

                </select>
            </div>
            <div class="col-xs-2  TransactionsAlertmonth">
                <select class="form-control qraccountNo" name="transmonth">
                    <option value="">Account Type</option>
                    <option value="777705849442">777705849442</option>
                    <option value="777705849441">777705849441</option>

                </select>
            </div>

            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="transactionsalertInfo()"><i
                        class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6 downloadExcelpathrow">
                            <input type="hidden" name="downloadExcel" id="downloadExcelpath">
                            <h3 class="box-title">Transactions Info</h3></br>
                            <button class="btn btn-info btn-sm downloadTransaction"
                                onclick="downloadTransactionExcel();"><i class="fa fa fa-download"></i> Download
                            </button>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="viewlenderwallet pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Account No</th>
                                    <th>Transaction Date</th>
                                    <th>Amount</th>
                                    <th>Transaction Type</th>


                                </tr>
                            </thead>
                            <tbody id="displayTransactionInfo">

                                </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>


<script id="displayTransactionTpl" type="text/template">
    {{#data}}
  <tr>
    <td>{{accountNumber}}</td>
    <td>{{transactionDate}}</td>
    <td>{{amount}}</td>
    <td>{{transactionType}}</td>
    
  </tr>
  {{/data}}
  </script>


<script type="text/javascript">
$(document).ready(function() {
    window.onload = currentMonthTransactionsalertInfo();
});
</script>
<!--   <script type="text/javascript">
  $(document).ready(function() {
  window.onload=currentMonthTransactionsalertInfo();


  </script> -->

<script type="text/javascript">
$(document).ready(function() {
    $("#alertFromDate,#alertToDate").datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        changeMonth: true,
        changeYear: true,
        endDate: "today"
    });
});
</script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>