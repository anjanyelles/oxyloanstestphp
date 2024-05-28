<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <left>Lenders Running loans</left>
        </h1>
    </section><br />
    <!-- Main content -->

    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box"></br></br>
                    <div class="box-body">

                        <div class="row">
                            <label for="name" class="col-sm-4 col-form-label" id="names"> </h4>Lender ID :</h4></label>
                            <div class="col-sm-4">
                                <input type="text" name="lenderid" class="form-control"
                                    placeholder="Enter The Lender ID " id="lenderid" required="required" />
                                <span class="error mobile" style="display: none;">Please Enter Lender ID</span>
                            </div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-xm btn-primary" id="profit-submit-btn"
                                    onclick=" loadLenderEmiStats();">Submit</button>

                            </div>

                        </div>
                        <div class="box-body lenderunningsloans" style="display: none">
                            <div class="form-group row">
                                <div class="box-header">

                                    <div class="col-md-6 pull-right">
                                        <div class="viewlenderwallet pull-right">
                                            <ul class="pagination bootpag">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr id="example">
                                                <th>Borrower ID</th>
                                                <th>Borrower Name</th>
                                                <th>Loan ID</th>
                                                <th>No.Of EMIs Paid</th>
                                                <th>Profit</th>
                                                <th>Disburment Amount</th>

                                            </tr>
                                        </thead>
                                        <tbody id="displayoffers">
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                            </tr>
                                            </tfoot>
                                    </table>
                                    </br>
                                    </br>

                                </div>
                                <!-- /.
                  
                  /.box-header -->

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
          <td>BR{{borrowerId}}</td>
          <td>{{borrowerName}}</td>
          <td>{{loanId}}</td>
          <td>{{numbersOfEmisPaid}}</td>
          <td>{{profit}}</td>
          <td>{{disburmentAmount}}</td>
          <!-- <td>{{emisReceived}}</td> -->
        </tr>
        {{/data}}
        </script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>