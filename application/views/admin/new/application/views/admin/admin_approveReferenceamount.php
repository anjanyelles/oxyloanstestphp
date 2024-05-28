<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Reference Amount
        </h1>
    </section><br />
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Reference Amount Transfered Date</h3>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group row col-xs-12">

                            <div class="col-xs-4 pull-left">
                                <label for="name" class="pull-right col-md-5">Transfered Date<em class="error">*</em>
                                    :</label>
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control approvedate" id="approvedate"
                                    placeholder="dd-mm-yyyy" name="PaidDate" data validation="expectedDate">
                            </div>
                        </div>
                        <div class="clear"></div>

                        <div class="row">
                            <div class="col-md-6 pull-right">
                                <button type="button" class="btn btn-lg btn-primary col-md-3 list_admin_Module_reference"  style="display:none" 
                                    onclick="referenceupdatedate();">Submit</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-lg btn-secondary col-md-3 pull-right"
                                    onclick="loadAprrovedReferencelist();">list</button>
                            </div>
                        </div>

  
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
<div class="modal  fade" id="loadBoxforapprovereferencebouns">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-6">
                        <h4 class="modal-title text-bold">Reference List</h4>
                    </div>
                    <div class="col-xs-6">
                        <div class="acceptedPagination pull-right">
                            <ul class="pagination bootpag">
                            </ul>
                        </div>
                    </div>
                    <!--  <div class="col-xs-9">
  <div class="pull-left text-bold">Sum Of Reference Amount :
    <span id="disbursmentAmount">3000</span>
  </div>
 </div> -->
                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Referee ID</th>
                            <th>Referrer ID</th>
                            <th>Referee Name</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Payment Status</th>
                            <th>Admin Comments</th>
                        </tr>
                    </thead>
                    <tbody id="displayPaymentsinfo">
                        <tr>
                            <td>LR160</td>
                            <td>LR5</td>
                            <td>ANUSHA</td>
                            <td>Lent</td>
                            <td>3000</td>
                            <td>unpaid</td>
                            <td>Hold</td>
                        </tr>

                        </tfoot>
                </table>

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


<div class="modal modal-success fade" id="modal-updatedate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Status</h4>
            </div>
            <div class="modal-body">
                Successfully Updated The Referenece Amount Date
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
$(document).ready(function() {
    $('#approvedate').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        // startDate: new Date(),
        autoclose: true
    });
});
</script>

<script id="userPaymentstatus" type="text/template">
    {{#data}}
               <tr>
                  <td>LR{{refereeId}}</td> 
                  <td>LR{{referrerId}}</td> 
                  <td>{{refereeName}}</td> 
                  <td>{{status}}</td>
                  <td>{{amount}}</td> 
                  <td>{{paymentStatus}}</td> 
                  <td>{{radhaSirComments}}</td> 
                </tr> 
  {{/data}}
 </script>


<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>