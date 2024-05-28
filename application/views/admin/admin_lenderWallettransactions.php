<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>



<?php
   $urlfromBroweser = $_SERVER['REQUEST_URI'];
  //echo $urlfromBroweser;
  $requestidFromClick =  $_GET['getfornotifications'];
  //$receivedEmailToken = $_GET['emailToken'];
?>

<?php 
    session_start(); // Start the session
    $basePATH_URL = $this->uri->uri_string(); 

    // Check if the user type is set in the session
    if(isset($_COOKIE['sUserType'])) {
        $userType = $_COOKIE['sUserType'];
        
    }
?> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lender Transactions
        </h1>
        <span class="requestidFromClick hide"><?php echo $requestidFromClick; ?></span>

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

            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="pull-right">

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
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    <th>Lender Id</th>
                                    <th>Lender Name</th>
                                    <th>Account Number</th>
                                    <th>Amount</th>
                                    <th>Transaction Date</th>
                                    <th>Transaction Screen Shot</th>
                                    <th>Status</th>
                                
                                    <?php if ($userType === 'MASTERADMIN'): ?>
        <th>Approve</th>
    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody id="displaywallettrns" class="displaywallettrns">
                                <tr id="displayNoRecords" class="displaywallettrns">
                                    <td colspan="7">No Transactions found!</td>
                                </tr>
                                <!-- <td><a href="lenderAcceptedoffers?appNumber={{loanRequestId}}">{{loanRequest}}</a></td>
            -->
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
<!-- /.content-wrapper -->


<script id="wallettransactiondetails" type="text/template">
    {{#data}}
                <tr>  
                  <td>LR{{userId}}</td>
                  <td>{{firstName}} {{lastName}}</td>               
                  <td>{{scrowAccountNumber}}</td>
                  <td>{{transactionAmount}}</td>
                  <td>{{transactionDate}}</td>
                  <td> <a href="javascript:void(0)" onclick="downLoadWalletTrnsImage({{userId}},{{documentUploadedId}},<?php echo "'";?>{{documentSubType}}<?php echo "'";?>)">{{fileName}}</a></td>  
                  <td class={{status}}>{{status}}</td>

                  <?php if ($userType === 'MASTERADMIN'): ?>

                    <td>
                  <button type="button" class="btn btn-success  btn-xs btn-{{status}}"  id={{id}} onclick="lenderwalletTransactionApprove({{id}})" data-clikedId="{{id}}"><b>Approve</b></button><br/><br/>

                  <button type="button" class="btn btn-danger btn-xs btn-{{status}}"   onclick="lenderwalletTransactionReject({{id}})" data-clikedId="{{id}}"><b>Reject</b></button>
                  </td>
                  <?php endif; ?>
                </tr>
            {{/data}}
   </script>




<script id="wallettransactionbyloanid" type="text/template">
    {{#data}}
                <tr>  
                  <td>LR{{userId}}</td>
                  <td>{{firstName}} {{lastName}}</td>               
                  <td>{{scrowAccountNumber}}</td>
                  <td>{{transactionAmount}}</td>
                  <td>{{transactionDate}}</td>
                  <td> <a href="javascript:void(0)" onclick="downLoadWalletTrnsImage({{userId}},{{documentUploadedId}},<?php echo "'";?>{{documentSubType}}<?php echo "'";?>)">{{fileName}}</a></td>
                 
                  <td class={{status}}>{{status}}</td>
                  <?php if ($userType === 'MASTERADMIN'): ?>    <td>
                  <button type="button" class="btn btn-success  btn-xs btn-{{status}} "  id={{id}} onclick="lenderwalletTransactionApprove({{id}})" data-clikedId="{{id}}"><b>Approve</b></button><br/><br/>

                  <button type="button" class="btn btn-danger btn-xs btn-{{status}}"   onclick="lenderwalletTransactionReject({{id}})" data-clikedId="{{id}}"><b>Reject</b></button>
                  </td>
                  <?php endif; ?>
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

<div class="modal modal-warning fade" id="modal-walletapprovedreject">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops</h4>
            </div>
            <div class="modal-body">
              <p id="display_text"></p>
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


<div class="modal  fade" id="modal-approveComments">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Comments</h4>
            </div>
            <div class="modal-body">
                <form>
                    <textarea type="text" name="" class="form-control approveComment"></textarea><br />
                </form>

            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm saveApproveCommentsBtn" data-dismiss="modal"
                        data-clikedId="" onclick="updatewalletApproveComments()">Save</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-lenderwalletApproveComments" tabindex="-1" role="dialog"
    aria-labelledby="modal-lenderwalletApproveComments" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You sure you want to approve the transaction ?</h4>

                </div>

                <div align="left">
                    <label class="">Approved By</label>
                    <select class="form-control walletApproveddBy" name="updating" id="walletApprovedUsers" data
                        validation="updating">
                        <option value="">-- Choose Your Name --</option>
                        <option value="Radha">Radha</option>
                        <option value="Bhargav">Bhargav</option>
                        <option value="Subash">Subash</option>
                        <option value="Ramadevi">Ramadevi</option>
                        <option value="Archana">Archana</option>
                        <option value="Narendra">Narendra</option>
                        <option value="Guna">Guna</option>



                    </select>
                    <span class="error walletApprovedError" style="display:none">choose Approved User</span>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success lenderApproveCommentsBtn" data-clikedId=""
                    onclick="saveupdatewalletApproveComments();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>


<div class="modal  fade" id="modal-rejectComments">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Comments</h4>
            </div>
            <div class="modal-body">
                <form>
                    <textarea type="text" name="" class="form-control rejectComment"></textarea><br />
                </form>

            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm saveRejectCommentsBtn" data-dismiss="modal"
                        data-clikedId="" onclick="updatewalletRejectComments()">Save</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-lenderwalletRejectComments" tabindex="-1" role="dialog"
    aria-labelledby="modal-lenderwalletApproveComments" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure?</h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success lenderRejectCommentsBtn" data-clikedId=""
                    onclick="saveupdatewalletRejectComments();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
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
    loadWalletDetails();
});
</script>

<?php include 'admin_footer.php';?>