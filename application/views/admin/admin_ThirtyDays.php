<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>Last 30 Days Uploaded Borrowers</center>
        </h1>
    </section><br />

    <!-- Main content -->

    <section class="content">

        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="lenderID">Status</option>
                </select>
                <span class="errorsearch" style="display: none;">Please choose option.</span>
            </div>
            <div class="col-xs-2 text-center lenderID" style="display: none;">
                <!--  <input type="text" name="city" class="form-control city cityInputs autocomplete" placeholder="City"> -->
                <select class="form-control" name="city" id="userstatus" class="form-control userstatus">
                    <option value=""> Select Satus</option>
                    <option value="APPROVED">APPROVED</option>
                    <option value="NOTYETREFLECTED">NOTYETREFLECTED</option>
                    <option value="UPLOADED">UPLOADED</option>

                </select>
            </div>


            <!-- <div class="col-xs-3 text-center lenderid" style="display: none;"> -->
            <!-- <input type="text" name="lenderid" class="form-control userstatus" placeholder="Enter The Status"> -->
            <!-- </div> -->
            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="ThirtyDaysuploaded()"><i
                        class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>




        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Borrowers Info</h3>
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
                                    <th> Borrower Name</th>
                                    <th>UNique Number</th>
                                    <th>Amount</th>
                                    <th>Payment Type</th>
                                    <th>Paid Date</th>
                                    <th>User Status</th>

                                </tr>
                            </thead>
                            <tbody id="displaywallet">

                                <tr>
                                    <td>LN123</td>
                                    <td>AP123</td>
                                    <td>LR123</td>
                                    <td>BR123</td>
                                    <td>INR <span>500000</span></td>
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
<script id="displaywalletTpl" type="text/template">
    {{#data}}
      <tr>
        <td>{{borrowerName}}</td>
        <td>{{borrowerUniqueNumber}}</td>
        <td>{{amount}}</td>
        <td>{{paymentType}}</td>
        <td>{{paidDate}}</td>
         <td>{{status}}</td>
       
      </tr>   
  {{/data}}
</script>

<script type="text/javascript">
window.onload = ThirtyDaysuploadeds();
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>