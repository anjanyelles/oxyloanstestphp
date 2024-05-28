<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<?php
   $urlfromBroweser = $_SERVER['REQUEST_URI'];
  //echo $urlfromBroweser;
  $requestidFromClick =  $_GET['borrowerid'];
  //$receivedEmailToken = $_GET['emailToken'];
?>


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
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="searchborrowerloansview()">
                    <i class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>

        </div>


        <div class="pull-right">
            <a href="borrowersLoansinfo">
                <button type="button" class="btn btn-info pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Back to BorrowersLoansinfo</b>
                </button>
            </a>
        </div>


        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Lender info</h3>
                            <span class="requestidFromClick hide"><?php echo $requestidFromClick?></span>

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
                        <div class="fright">
                            <button class="btn btn-success" class="downloadReport"
                                onclick="downloadTotalLoanBorrowersInfo1()">Download Report</button>
                            <div id="downloadPendingEMIInfo" style="display: none;"></div>
                        </div><br>

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    <th>Lender Name</th>
                                    <th>Loan Amount</th>
                                    <th>Loan Amount</th>
                                    <th>Principal Outstanding</th>
                                    <th>Profit</th>

                                </tr>
                            </thead>
                            <tbody id="loadborrowersList">

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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

<script id="loadborrowersListTpl" type="text/template">
    {{#data}}
      <tr>
       <td>{{lenderName}}</td>
        <td>{{loanId}}</td>
         <td>{{individualDisburmentAmount}}</td>
          <td>{{individualPrincipalPaid}}</td>
           <td>{{individualProfitPaid}}</td>
        
      </tr>
  {{/data}}
</script>


<div class="modal modal-warning fade" id="modal-noloansforthisborrower">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text"> Loans are not active to this user.</p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
window.onload = loadlenderUsersforborrower();
</script>



<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>