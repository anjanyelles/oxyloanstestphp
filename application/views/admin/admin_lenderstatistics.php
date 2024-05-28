<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$userId =  isset($_GET['lenderId']) ? $_GET['lenderId'] : '';

 // echo "<script>alert('$gmailcode');</script>";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <left>Lender Deal Info </left>
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
                                    placeholder="Enter The Lender ID " id="lenderId" required="required"
                                    value="<?php  echo $userId ?>" />
                                <span class="error iderror" style="display: none;">Please Enter Lender ID</span>
                            </div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-xm btn-primary" id="profit-submit-btn"
                                    onclick="lenderDealStatisticsInfo();">Submit</button>
                            </div>
                        </div>

                        <div class="box-body lenderDealInfo" style="display: none">
                            <div class="form-group row">
                                <div class="box-header">
                                    <div class="pull-left col-md-6">
                                        <div class="row">
                                            <b> Lender Name: <span class="dealsUser"></span>
                                                <p class="mobileno" style="margin-left: 0px;">
                                                    Mobile No:<span class="dealUserNO"></span></p>
                                            </b>
                                        </div>
                                    </div>

                                    <div class="col-md-6 pull-right">
                                        <div class="searchDealsPagination pull-right">
                                            <ul class="pagination bootpag">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-hover">
    <thead>
        <tr id="example">
            <th>Deal Name</th>
            <th>Deal Id</th>
            <th>Participated Amount</th>
            <th>ROI</th>
            <th>Duration</th>
            <th>Payment Type</th>
            <th>Deal Status</th>
        </tr>
    </thead>
    <tbody id="displayStatistics" style="display:none">
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>




                                    </br>
                                    </br>

                                </div>
                                <!-- /.
                  
                  /.box-header -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
    </section>

    <div class="modal modal-danger fade" id="modal-transactiondanger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Error 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
    
            </div>
            <div class="modal-body">
       
            </div>
            <div class="modal-footer">
                <a href="#">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">OK</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
    <!-- /.content -->
</div>
<script id="displayLenderDealinfo" type="text/template">
    {{#data}}
      <tr>
        <td>{{dealName}}</td>
           <td>{{dealId}}</td>
          
          <td>
            {{paticipatedAmount}}
          </td>
          
          <td>
            {{rateOfInterest}}
          </td>
          
          <td>
            
            {{dealDuration}}
          </td>
          
          <td>
            {{lederReturnType}}
            
          </td>
          <td>
            {{pricipalReturnedStatus}}
            
          </td>
          
          
          
        </tr>
        {{/data}}
        </script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>