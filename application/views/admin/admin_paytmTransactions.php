<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>MONTHLY PAYTM HISTORY</center>
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
                <select class="form-control" name="city" id="paytmMonth" class="form-control city">
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
                <input type="text" name="amount" class="form-control paytmyear" placeholder="Enter The Year">
            </div>
            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="paytmTransactionsSearch();"><i
                        class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Paytm Transactions</h3>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="viewPaytmdetails pull-right">

                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                            <div class="viewPaytmdetailsSearch pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr style="background-color: #B0C4DE; border: 3px solid lightgrey;">
                                    <th>Borrower Name</th>
                                    <th>Borrower Id</th>
                                    <th>Amount</th>
                                    <th>Remitter Name</th>
                                    <th>Transfer Mode</th>
                                    <th>Transaction Date</th>
                                </tr>
                            </thead>
                            <tbody id="displayPaytmTransactions">
                                <tr id="displayNoRecords" class="displayRequests" style="border: 3px solid lightgrey;">
                                    <td colspan="1">No Data Found!</td>
                                </tr>
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

<script id="displayPaytm" type="text/template">
    {{#data}}
  <tr>
    <td>{{borrowerName}}</td>
    <td>{{borrowerId}}</td>
    <td>{{amount}}</td>
    <td>{{remitterName}}</td>
    <td>{{transferMode}}</td>
    <td>{{transactionDate}}</td>
  </tr>
  {{/data}}
  </script>
<script type="text/javascript">
window.onload = paytmTransactions();
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>