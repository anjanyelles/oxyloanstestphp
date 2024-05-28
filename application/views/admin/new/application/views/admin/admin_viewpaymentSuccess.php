<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealId =  isset($_GET['deal']) ? $_GET['deal'] : '0';
$paymentDate =  isset($_GET['paymentDate']) ? $_GET['paymentDate'] : '0';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="col-md-6">
            <h1 class="text-bold">
                <span class="interestDealName"></span>Payment Success Users
            </h1>
        </div>
    </section>
    <div class="cls"></div>
    <section class="content">



        <div class="cls"></div>

        <div class="row customFormQ">
            <div class="cls"></div>
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header">
                        <div class="pull-right">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="acceptedPagination">
                                        <ul class="pagination bootpag">
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    <th>S.No</th>
                                    <th>Lender Info</th>


                                    <th>Deal Info</th>

                                    <th>Bank Deatils</th>


                                </tr>
                            </thead>
                            <tbody id="withdrawalListApprove">
                                <tr id="displayNoRecords" class="displayRequests" style="display: none;">
                                    <td colspan="8">No User found!</td>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- form start -->

            </div>
            <!-- /.box -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal modal-success fade" id="modal-H2H-ONHoldSuccessMessage">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <p>
                <h2 style="font-size: 16px;">successfully updated the user's data has to on-hold</h2>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-warning fade" id="modal-view-paymentsuccessUsers">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops</h4>
            </div>
            <div class="modal-body">
                <p class="text-errorMessage"></p>
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
<script id="displayViewPaymentSuccess" type="text/template">
    {{#data}}
  <tr>
    <td>{{sno}}</td>
    <td>Lender Name:{{lenderName}}</br>
      Lender Id : LR{{userId}}</br>
      Group : {{groupName}}
    </td>
   
 
   
    <td>
  Interest : {{interestAmount}} INR</br>
  Roi : {{rateOfInterest}}</br>
Payment Status : {{approvalStatus}}
   </td>
   
    <td>
      Bank Account Number : {{bankAccountNumber}}</br>
      Bank Name : {{bankName}}</br>
      Branch Name :{{branchName}}</br>
      IFSC Code :{{ifscCode}}</br>
      NameAsPerBank :{{nameAsPerBank}}
    </td>
   
   
  </tr>
  {{/data}}
  </script>

<script type="text/javascript">
window.onload = viewPaymentSuccessUsers('<?php echo $dealId ?>', '<?php echo $paymentDate?>');
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<?php include 'admin_footer.php';?>