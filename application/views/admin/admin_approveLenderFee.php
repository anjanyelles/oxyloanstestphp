<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lender Processing Fee
        </h1>
    </section>
    <div class="cls"></div>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="lenderSearch">
                    <option value="">-- Choose --</option>
                    <!-- <option value="name">Name</option> -->
                    <option value="id">LENDER ID</option>
                </select>

            </div>
            <div class="col-xs-3 text-center name" style="display: none;">
                <input type="text" name="firstName" class="form-control firstName" placeholder="First Name">
            </div>
            <div class="col-xs-3 text-center name" style="display: none;">
                <input type="text" name="lastName" class="form-control lastName" placeholder="Last Name">
            </div>

            <div class="col-xs-3 text-center id" style="display: none;">
                <input type="text" name="id" class="form-control id" placeholder="LENDER ID">
            </div>

            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="searchwalletbyLoanid();"><i
                        class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>


        <div class="cls"></div>

        <div class="row customFormQ">
            <div class="cls"></div>
            <div class="pull-right">
                <div class="row">
                    <div class="col-md-12">
                        <div class="acceptedPagination">
                            <ul class="pagination bootpag">
                            </ul>
                        </div>
                        <div class="searchlenderwalletPagination pull-right" style="display: none;">
                            <ul class="pagination bootpag">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    <th>Lender Id</th>
                                    <th>lender Fee Loaded Date</th>
                                    <th>Scrow Account Number</th>
                                    <th>TransactionAmount</th>
                                    <th>Approve</th>
                                </tr>
                            </thead>
                            <tbody id="displaywallettrns" class="displaywallettrns">
                                <tr id="displayNoRecords" class="displaywallettrns">
                                    <td colspan="8">No Transactions found!</td>
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
<script id="wallettransactionbyloanid" type="text/template">
    {{#data}}
                <tr>  
                  <td>LR{{userId}}</td>  
                  <td>{{lenderFeeLoadedDate}}</td>
                  <td>{{scrowAccountNumber}}</td>
                  <td>{{transactionAmount}}</td>
                   <td>
                  <button type="button" class="btn btn-success  btn-xs" onclick=" updateLenderFeeapprove('{{id}}')"><b>Approve</b></button></br></br>
                  <button type="button" class="btn btn-danger btn-xs"   onclick="rejectLenderFee('{{id}}')"><b>Reject</b></button>
                  </td>
                </tr>
            {{/data}}
   </script>
<div class="modal modal-success fade" id="modal-transactionAprrove">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                You have Approved this Trancation.
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

<div class="modal modal-danger fade" id="modal-transactionReject">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                You have Reject this Trancation.
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


<div class="modal fade" id="modal-approveLenderfee" tabindex="-1" role="dialog"
    aria-labelledby="modal-lenderwalletApproveComments" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure?</h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success lenderFeeApproveCommentsBtn" data-clikedId=""
                    onclick="saveupdateLenderFee();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>



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

<div class="modal fade" id="modal-lenderFeeReject" tabindex="-1" role="dialog"
    aria-labelledby="modal-lenderwalletApproveComments" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure?</h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success lenderfeeRejectCommentsBtn" data-clikedId=""
                    onclick="rejectupdateLenderFee();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    noprofileCheck = "no";
    noROICheck = "no";
    loadLenderFeeDetails();
});
</script>

<?php include 'admin_footer.php';?>