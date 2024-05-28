<?php
   $urlfromBroweser = $_SERVER['REQUEST_URI'];
  //echo $urlfromBroweser;
  $userID = $_GET['bid'];
?>
<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            View Loan Record
        </h1>
    </section><br />

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <h3 class="box-title" style="color:blue;">Personal Details</h3>
                        <div class="form-group row">
                            <label for="First name" class="col-sm-2 col-form-label">Borrower Name:</label>
                            <div class="col-sm-10">
                                <span class=" "></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="First name" class="col-sm-2 col-form-label">Mobile Number:</label>
                            <div class="col-sm-10">
                                <span class=" "></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="First name" class="col-sm-2 col-form-label">Address:</label>
                            <div class="col-sm-10">
                                <span class=" "></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="First name" class="col-sm-2 col-form-label">Email Id:</label>
                            <div class="col-sm-10">
                                <span class=" "></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="First name" class="col-sm-2 col-form-label">PAN No:</label>
                            <div class="col-sm-10">
                                <span class=" "></span>
                            </div>
                        </div>

                        <h3 class="box-title" style="color:blue;">Loan Details</h3>

                        <div class="form-group row">
                            <label for="First name" class="col-sm-2 col-form-label">Application Number:</label>
                            <div class="col-sm-10">
                                <span class=" "></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="First name" class="col-sm-2 col-form-label">Disbursement Date:</label>
                            <div class="col-sm-10">
                                <span class=" "></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="First name" class="col-sm-2 col-form-label">Lenders:</label>
                            <div class="col-sm-10">
                                <span class=" "></span>
                            </div>
                        </div>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>SNO</th>
                                    <th>LR ID</th>
                                    <th>LR Name</th>
                                    <th>Amount</th>
                                    <th>ROI & Tenure </th>
                                    <th>EMI Amount</th>

                                </tr>
                            </thead>
                            <tbody id="displayRecords">

                                </tfoot>
                        </table>



                        <h3 class="box-title" style="color:blue;">Loan Statement</h3>

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>SNO</th>
                                    <th>Date</th>
                                    <th>Debit Amount</th>
                                    <th>Credit Amount</th>

                                    <th>Balance Amount </th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody id="displayRecords">

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
<td></td>
<td></td>
<td></td>
<td></td>
    </tr>
      
    
    

  {{/data}}
</script>


<script type="text/javascript">
window.onload = viewLoanRecord("<?php echo $userID; ?>");
window.onload = getUserPersonalDetails("<?php echo $userID; ?>");
</script>







<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>