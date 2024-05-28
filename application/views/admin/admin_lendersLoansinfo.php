<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lender Loans Information
        </h1>
    </section><br />

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="lenderID">Lender ID</option>
                </select>
            </div>
            <div class="col-xs-3 text-center lenderid" style="display: none;">
                <input type="text" name="lenderid" id="lenderid" class="form-control lenderid" placeholder="Lender ID">
            </div>

            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="searchlendersloansInfo()">
                    <i class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>

        </div>


        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Lender info</h3>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="interstedPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>

                            <div class="searchinterstedPagination pull-right" style="display: none;">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    <th>Lender Id</th>
                                    <th>Lender Name</th>
                                    <th>Loan Amount</th>
                                    <th>Principal Outstanding</th>
                                    <th>Profit</th>

                                    <th>DownLoad & View</th>
                                </tr>
                            </thead>
                            <tbody id="loadLendersList">
                                <td>LR 12234</td>
                                <td>63564</td>
                                <td>2646</td>
                                <td>134235435</td>
                                <td>134235435</td>
                                <td>
                                    <a href="lendersLoansview">
                                        <button type="button" class="btn btn-primary pull-left btn-xs">
                                            <b>Download</b></button> </a><br> <br>

                                    <a href="lendersLoansview">
                                        <button type="button" class="btn btn-warning pull-left btn-xs"><b>View
                                                More</b></button></a>
                                </td>

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

<script id="loadLendersListTpl" type="text/template">
    {{#data}}
      <tr>
       <td>LR{{lenderId}}</td>
       <td>{{lenderName}}</td>
       <td>{{totalDisbursementAmount}}</td>
       <td>{{totalPrincipalRecevied}}</td>
       <td>{{totalProfit}}</td>
       
      
    <td>
     <button type="button" class="btn btn-primary  btn-xs" onclick="downloadTotalLoanLendersInfo('{{lenderId}}')"> <b>Download Report</b></button>
      <br><br>
     <a href="lendersLoansview?lenderid={{lenderId}}"> 
     <button  type="button" class="btn btn-warning  btn-xs">View More List</button></a>
   
    </td>


      </tr>

  {{/data}}
</script>




<script type="text/javascript">
window.onload = loadlendersLoansInfo();
</script>



<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>