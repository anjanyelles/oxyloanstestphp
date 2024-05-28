<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lender Auto Invest list
        </h1>
    </section><br />

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="lenderID">Lender ID</option>
                    <option value="userName">Name</option>
                </select>
            </div>
            <div class="col-xs-3 text-center lenderid" style="display: none;">
                <input type="text" name="lenderid" id="lenderid" class="form-control lenderid" placeholder="Lender ID">
            </div>
            <div class="col-xs-3 text-center userName" style="display: none;">
                <input type="text" name="userName" class="form-control firstName" placeholder="First Name">
            </div>
            <div class="col-xs-3 text-center userName" style="display: none;">
                <input type="text" name="userName" class="form-control lastName" placeholder="Last Name">
            </div>
            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="searchlendersautoinvest()">
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
                            <div class="lendersautoinvestPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>

                            <div class="searchlendersautoinvestPagination pull-right" style="display: none;">
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
                                    <th rowspan="2">Lender Details</th>
                                    <th colspan="9">
                                        <center> Auto Invest Configuration</center>
                                    </th>
                                </tr>
                                <tr id="example">
                                    <th>Gender</th>
                                    <th>City</th>
                                    <th>Risk Category & Oxyscore</th>
                                    <th>Employment Type & Salary Range</th>
                                    <th>Max Loan Amount</th>
                                    <th> Duration & ROI </th>
                                    <th>Created on</th>
                                    <th>Status</th>
                                    <th>View Auto invest History</th>
                                </tr>
                            </thead>
                            <tbody id="loadlendersautoinvestList">




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

<script id="loadlendersAutoinvestListTpl" type="text/template">
    {{#data}}
      <tr>
       <td><b>Userid:</b> LR{{userId}} <br/>
        <b>Name:</b>{{firstName}} {{lastName}}<br/>
        <b>Wallet Amount:</b> {{lenderWalletAmount}} <br/>  
       </td>
  
    <td> {{gender}} </td>
    <td> {{city}} </td>
  <td><b> RiskCategory:</b>{{riskCategory}} <br/>
    <b>Oxyscore :</b> {{oxyScore}}</td>
        <td>
       <b> Employment Type:</b>{{employmentType}} <br/>
        <b>Salary Range:</b> {{salaryRange}} <br/>
       </td>
       <td>{{maxAmount}}</td>
       <td>
        <b>Duration:</b> {{duration}}<br/>
        <b>RateOfInterest:</b> {{rateOfInterest}} <br/>
       </td>
         <td>{{createdOn}}  </td>
          <td>{{status}}  </td>

      
        
    <td>
      <a href="displaylenderautoinvestHistory?lenderid={{userId}}"> 
     <button  type="button" class="btn btn-warning  btn-xs">View History</button></a>
    </td>
      </tr>


  {{/data}}
</script>




<script type="text/javascript">
window.onload = loadlendersAutoinvestList();
</script>


<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>