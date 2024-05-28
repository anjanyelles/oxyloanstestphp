<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$userStatus =  isset($_GET['status']) ? $_GET['status'] : 'partners';
// echo "<script>alert('$gmailcode');</script>";
if($userStatus =="partners"){
$userStatus="PARTNER";
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <h3 class="pull-left col-md-6">
                View Partners
                </h1>
                <div class="pull-right col-md-6">
                    <a href="viewPartnerAndDealer?status=partners">
                        <button class=" btn btn-success btnRoundUp" style="border-radius: 20px;">
                            View Partners
                        </button>
                    </a>

                </div>
        </div>
        </br></br></br></br></br>
        <div class="alert alert-success dealClosedSuccess" role="alert" style="display: none;">
            <strong>Deal Closed successfully.</strong>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="dealersPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                            <div class="searchPartnerPagination pull-right" style="display: none;">
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
                                    <th>UTM Name</th>
                                    <th>User Type</th>
                                    <th>Loan duration</th>
                                    <th>Repayment Method</th>
                                    <th>CIBIL 400-500 ROI</th>
                                    <th>CIBIL 500-600 ROI</th>
                                    <th>CIBIL 600-700 ROI</th>
                                    <th>CIBIL 700-800 ROI</th>
                                    <th>CIBIL 800-900 ROI</th>
                                    <th>Modify</th>
                                </tr>
                            </thead>
                            <tbody id="displayUserData">
                                <tr>
                                    <td>01</td>
                                    <td>Deal Nader gul</td>
                                    <td>200</td>
                                    <td>Mahender Reddy</td>
                                    <td>29%</td>
                                    <td>26%</td>
                                    <td>Initiated</td>
                                    <td>Initiated</td>
                                    <td><button class="btn btn-warning btn-sm"><span
                                                class="fa fa-edit"></span>Edit</button><br>
                                        <button class="copyPartnerLink btn btn-sm btn-primary"> Copy Utm</button>
                                    </td>

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



    <div class="modal modal-success fade" id="modal-shortprofilefortheborrower">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p id="text1">Thanks for the update. This UTM borrower will get the short profile sections.</p>
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
    <script id="displayUserTypeScript" type="text/template">
        {{#data}}
  <tr>
    <td>{{utmName}}</br></br>


       <b>Name</b>: {{partnerName}}</br>
       <b>Email</b>:{{partnerEmail}}</br>
        <b>Mobile</b>:{{partnerMobileNumber}}</br>
          <b>Referred By</b>:{{referredBy}}


    </td>
    <td>{{type}}</td>
    <td>{{duration}}</td>
    <td>{{repaymentMethod}}</td>
    <td>{{firstCibilScore}}</td>
    <td>{{secondCibilScore}}</td>
    <td>{{thirdCibilScore}}</td>
    <td>{{fourthCibilScore}}</td>
    <td>{{fifthCibilScore}}</td>
    <td>
      <a href="createUtmforpartnerDealer?id={{id}}&edit=0">
      <button class="btn btn-warning btn-sm "><span class="fa fa-edit"></span> Edit</button></a>
      <br><br>

      
      <button class="copyPartnerLink-{{utmName}} btn btn-sm btn-primary" onClick="copyThePartnerUrl('{{utmName}}');">Copy Utm</button><br><br>


        <button class="btn btn-info" onclick="hideBorrowerDetails('{{id}}');">Hide Reference Details</button><br>

    </td>
  </tr>
  {{/data}}
  </script>
    <script type="text/javascript">
    window.onload = viewPartnersANDDealers('<?php echo $userStatus; ?>');
    </script>
    <script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- BS JavaScript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/bootstrap.js"></script>
    <?php include 'admin_footer.php';?>