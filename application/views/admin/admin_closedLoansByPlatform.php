<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<?php 
    session_start(); // Start the session
    $basePATH_URL = $this->uri->uri_string(); 

    // Check if the user type is set in the session
    if(isset($_COOKIE['sUserType'])) {
        $userType = $_COOKIE['sUserType'];
        
    }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Closed by Platform
        </h1>
    </section><br />

    <!-- Main content -->

    <section class="content">

        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="loanID">Loan ID</option>

                </select>
                <span class="errorsearch" style="display: none;">Please choose option.</span>
            </div>

            <div class="col-xs-3 text-center loanid" style="display: none;">
                <input type="text" name="loanid" class="form-control loanid" placeholder="Loan ID">
            </div>

            <div class="col-xs-3 text-center applicationid" style="display: none;">
                <input type="text" name="applicationid" class="form-control applicationid" placeholder="Application ID">
            </div>

            <div class="col-xs-3 text-center lenderid" style="display: none;">
                <input type="text" name="lenderid" class="form-control lenderid" placeholder="Lender ID">
            </div>

            <div class="col-xs-3 text-center borrowerid" style="display: none;">
                <input type="text" name="borrowerid" class="form-control borrowerid" placeholder="Borrower ID">
            </div>

            <div class="col-xs-3 text-center amount" style="display: none;">
                <input type="text" name="amount" class="form-control minAmount" placeholder="Min Amount">
            </div>

            <div class="col-xs-3 text-center amount" style="display: none;">
                <input type="text" name="amount" class="form-control maxAmount" placeholder="Max Amount">
            </div>

            <div class="col-xs-3 text-center roi" style="display: none;">
                <input type="text" name="ROI" class="form-control minRoi" placeholder="Min ROI">
            </div>

            <div class="col-xs-3 text-center roi" style="display: none;">
                <input type="text" name="ROI" class="form-control maxRoi" placeholder="Max ROI">
            </div>


            <div class="col-xs-3 text-center city" style="display: none;">
                <input type="text" name="city" class="form-control city" placeholder="City">
            </div>

            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn"
                    onclick="searchLoanClosedByPlatform();"><i class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Closed By Platform info</h3>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="runningLoansPagination pull-right">
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
                                    <th> Loan ID</th>
                                    <th> Application ID</th>
                                    <th>Lender ID</th>
                                    <th>Borrower ID</th>
                                    <th>Loan Amount</th>
                                    <th>ROI</th>
                                    <th>Tenure</th>
                                    <th>Emi's Paid</th>
                                    <th>Due Amount</th>
                                    <th>Profit</th>
                                  <?php if ($userType === 'SUPERADMIN'): ?>
                                    <th>Agreement</th>
<?php endif; ?>
                                </tr>
                            </thead>
                            <tbody id="displayRecords">

                                <tr>
                                    <td>LN123</td>
                                    <td>AP123</td>
                                    <td>LR123</td>
                                    <td>BR123</td>
                                    <td>INR <span>500000</span></td>
                                    <td>2000</td>
                                    <td> 28% PA </td>
                                    <td>12 months </td>
                                    <td>6</td>
                                    <td>INR <span>500000</span></td>
                                    
                                    <?php if ($userType === 'SUPERADMIN'): ?>
                                        <td>
                                        <a href='javascript:void(0)'>
                                            <i class="fa fa-download" aria-hidden="true"></i>
                                        </a>
                                    </td>
<?php endif; ?>

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
        <td>{{loanId}}</td>
        <td>{{loanRequest}}</td>
        <td>LR{{lenderUser.id}}</td>
        <td>BR{{borrowerUser.id}}</td>
        <td>INR <span>{{loanDisbursedAmount}}</span></td>
        <td>{{rateOfInterest}}
                       <span style='display:none' class="loanTypeisI loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> % PA</span>
                        <span style='display:none' class="loanTypeisDays loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Per Day</span>

         </td>
        <td>{{duration}}

                    <span style='display:none' class="loanTypeisI loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Months</span>

                          <span style='display:none' class="loanTypeisDays loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Days</span><br/>


         </td>
        <td>{{noOfEmisPaid}}</td>
        
        <td>INR <span>{{dueEmiAmount}}</span></td>
        <td>{{profit}}</td>
        <td> 
           <a href='javascript:void(0)'  data-reqid = "{{id}}" class="downloadAgreeent">
              <i class="fa fa-download" aria-hidden="true"  class="downloadAgreeent"></i>
           </a>
          </td>
      </tr>   
  {{/data}}
</script>
<script id="displayPlatformClosedRecordes" type="text/template">
    {{#data}}
      <tr>
        <td>{{loanId}}</td>
        <td>{{loanRequest}}</td>
        <td>LR{{lenderDisplayId}}</td>
        <td>BR{{borrowerDisplayId}}</td>
        <td>INR <span>{{loanAmount}}</span></td>
        <td>{{rateOfInterest}}
        </td>
        <td>{{duration}} {{durationType}}
         </td>
        <td>{{emisPaid}}</td>
        
        <td>INR <span>{{dueAmount}}</span></td>
        <td>{{profit}}</td>
        
          <?php if ($userType === 'SUPERADMIN'): ?>
            <td> 
           <a href='javascript:void(0)'  data-reqid = "{{id}}" class="downloadAgreeent">
              <i class="fa fa-download" aria-hidden="true"  class="downloadAgreeent"></i>
           </a>
          </td>
<?php endif; ?>
      </tr>   
  {{/data}}
</script>
<script type="text/javascript">
window.onload = loadLoans("CLOSEDBYPLATFORM");
</script>
<style type="text/css">
span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisDays.loanTypeisDays {
    display: inline !important;
}

span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisI.loanTypeisI,
span.loanTypeisI.loanTypeis {
    display: inline !important;
}

span.loanTypeisI.loanTypeisDays {
    display: none !important;
}

span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisDays.loanTypeis {
    display: none !important;
}

span.loanTypeisDays.loanTypeisMonths {
    display: none !important;
}
</style>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>