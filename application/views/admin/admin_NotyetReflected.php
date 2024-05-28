<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>Not Yet Refelected Borrowers</center>
        </h1>
    </section><br />

    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="lenderID">Borrower Unique Number</option>
                </select>
                <span class="errorsearch" style="display: none;">Please choose option.</span>
            </div>

            <div class="col-xs-3 text-center lenderid" style="display: none;">
                <input type="text" name="lenderid" class="form-control lenderid" placeholder="Borrower Unique Number">
            </div>
            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn"
                    onclick="statussearch('NOTYETREFLECTED')"><i class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>




        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Borrowers Info</h3>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="viewlenderwallet pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> Borrower Name</th>
                                    <th>UNique Number</th>
                                    <th>Amount</th>
                                    <th>Payment Type</th>
                                    <th>Paid Date</th>
                                    <th>User Status</th>
                                    <th>Payment ScreenShot</th>
                                    <th>comments</th>
                                    <th>Verify</th>

                                </tr>
                            </thead>
                            <tbody id="displaywallet">

                                <tr>
                                    <td>LN123</td>
                                    <td>AP123</td>
                                    <td>LR123</td>
                                    <td>BR123</td>
                                    <td>INR <span>500000</span></td>
                                    <td>INR <span>500000</span></td>
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

<div class="modal modal-success fade" id="modal-commentSuccesss">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Updated</h4>
            </div>
            <div class="modal-body">
                Borrower Status As Approved.
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



<script id="displaywalletTpl" type="text/template">
    {{#data}}
      <tr>
        <td>{{borrowerName}}</td>
        <td>{{borrowerUniqueNumber}}</td>
        <td>{{amount}}</td>
        <td>{{paymentType}}</td>
        <td>{{paidDate}}</td>
         <td>{{status}}</td>
          <td>
 <a href="javascript:void(0)"  class="viewPaymentimage   showImage"  onclick="image('{{status}}','{{paymentUrl}}')"><b>View</b></a>
          </td>

          <td>{{comments}}</td>
         <td>  
         <button type="button" class="btn btn-success pull-left btn-sm"  onclick="updatestatus({{documentUploadId}})"><b>Approve</b></button><br/>
       </td>
       
      </tr>   
  {{/data}}
</script>

<script type="text/javascript">
window.onload = status("NOTYETREFLECTED");
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>