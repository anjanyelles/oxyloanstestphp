<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<?php
   $urlfromBroweser = $_SERVER['REQUEST_URI'];
  //echo $urlfromBroweser;
  $requestidFromClick =  $_GET['lenderid'];
  //$receivedEmailToken = $_GET['emailToken'];
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lender Auto Invest History
        </h1>
    </section><br />

    <!-- Main content -->
    <section class="content">

        <div class="pull-right">
            <a href="displaylenderAutoinvestlist">
                <button type="button" class="btn btn-info pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Back to lender Autoinvest list</b>
                </button>
            </a>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title" style="color: #008B8B; ">Lender info</h3><br />
                            <span class="requestidFromClick hide"><?php echo $requestidFromClick?></span>

                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="displaylenderdetails">
                                        <span><b>UserId :</b></span> LR<span class="displayUserId"></span><br />
                                        <span><b>Name :</b></span> <span class="displayName"></span><br />
                                        <span><b>City :</b></span> <span class="displaycity"></span><br />
                                        <span><b>Email :</b></span> <span class="displayEmail"></span><br />
                                        <span><b>Mobile Number :</b></span> <span class="displayMobileNumber"></span>

                                    </h5>

                                </div>
                            </div>
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
                                    <th>Created on</th>
                                    <th>Risk Category</th>
                                    <th>Gender</th>
                                    <th>City</th>
                                    <th>Oxyscore</th>
                                    <th>Employment Type & Salary Range</th>
                                    <th>Max Loan Amount</th>
                                    <th>Duration & ROI</th>

                                    <th>Status</th>
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
       <td>{{createdOn}}  </td>
       <td>{{riskCategory}}</td>
       <td> {{gender}}</td>
       <td>{{city}}</td>
       <td>{{oxyScore}}</td>
         <td>
         <b> Employment Type:</b>{{employmentType}} <br/>
        <b>Salary Range:</b> {{salaryRange}} <br/>
       </td>
       <td>{{maxAmount}}</td>
       <td>
        <b>Duration:</b> {{duration}}<br/>
        <b>RateOfInterest:</b> {{rateOfInterest}} <br/>
       </td>
         
         <td>{{status}}  </td>   
      </tr>

  {{/data}}
</script>






<script type="text/javascript">
window.onload = loadlendersAutoinvesthistory();
</script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>



<?php include 'admin_footer.php';?>