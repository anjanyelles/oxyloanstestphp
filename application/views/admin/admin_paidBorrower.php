<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Paid Borrowers
        </h1>
    </section><br />

    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="appID">Application ID</option>

                </select> <span class="errorsearch" style="display: none;">Please
                    choose option.</span>
            </div>

            <div class="col-xs-3 text-center applicationid" style="display: none;">
                <input type="text" name="applicationID" class="form-control applicationID" placeholder="Application ID">
            </div>


            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="paidborrowerssearch();">
                    <i class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>



        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Paid Borrowers info</h3>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="paidBorrowers pull-right">
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
                                    <th>Application ID</th>
                                    <th> Borrower Name</th>
                                    <th>Mobile Number</th>
                                    <th>Borrower EMail</th>
                                    <th>Paid EMI</th>
                                    <th>Paid Date</th>
                                </tr>
                            </thead>
                            <tbody id="displayoffers">

                                <tr>
                                    <td>LN123</td>
                                    <td>AP123</td>
                                    <td>LR123</td>
                                    <td>BR123</td>
                                    <td>BR123</td>
                                    <td>INR <span>500000</span></td>
                                </tr>
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
<script id="displayRecordsTpl" type="text/template">
    {{#data}}
      <tr>
        <td>{{applicationId}}</td>
        <td>{{borrowerUser.firstName}}</td>
        <td>{{borrowerUser.mobileNumber}}</td>
        <td>{{borrowerUser.email}}</td>
        <td>{{currentApplicationAmountPaid}}</td>
        <td>{{borrowerUser.amountPaidDate}}</td>
        
      </tr>   
  {{/data}}
</script>





<script type="text/javascript">
window.onload = paidBorrowers();
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>