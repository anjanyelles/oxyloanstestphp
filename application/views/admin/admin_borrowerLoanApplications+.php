<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Borrower Loan Applications
        </h1>
    </section><br />

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="loanID">Loan ID</option>
                    <option value="appID">Application ID</option>
                    <option value="lenderID">Lender ID</option>
                    <option value="borrowerID">Borrower ID</option>
                    <option value="roi">ROI</option>
                    <option value="amount">Amount</option>
                    <option value="city">City</option>
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
                    onclick="searchUsersPhase1('Borrower');"><i class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Borrower info</h3>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="dashBoardPagination pull-right">
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
                                    <th>Borrower Id</th>
                                    <th>Requested Date</th>
                                    <th>Expected Date</th>
                                    <th>Name</th>
                                    <th>Requested Amount</th>
                                    <th>ROI</th>
                                    <th>Mobile Number</th>
                                    <th>Address</th>
                                    <th>View Documents</th>
                                    <th>Comments</th>
                                    <th>Oxy Score</th>
                                    <th>Change Role</th>
                                </tr>
                            </thead>
                            <tbody id="loadBorrowersList">


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

<script id="loadBorrowersListTpl" type="text/template">
    {{#data}}
      <tr>
        <td>BR{{borrowerUser.id}}</td>
        <td>{{loanRequestedDate}}</td>
        <td>{{loanRequestedDate}}</td>
        <td>{{user.firstName}} {{user.lastName}}</td>
        <td>INR <span>{{loanRequestAmount}}</span></td>
        <td>{{rateOfInterest}}% PA</td>
        <td>{{user.mobileNumber}}</td>
        <td>DAMODER GARU??</td>
        <td>
           <a href="javascript:void(0)" target="_blank" class="viewPan" onclick="viewDoc({{borrowerUser.id}}, 'PAN')">View PAN</a><br/>
          <a onclick="viewDoc({{borrowerUser.id}}, 'AADHAR')" href="javascript:void(0)" target="_blank" class="viewAADHAR">View A'DHAR</a><br/>
          <a onclick="viewDoc({{borrowerUser.id}}, "PASSPORT')" href="javascript:void(0)" target="_blank" class="viewPASSPORT">View PASSPORT</a>
          <a onclick="viewDoc({{borrowerUser.id}}, 'BANKSTATEMENT')" href="javascript:void(0)" target="_blank" class="viewBANKSTATEMENT">View BANK STATEMENT</a>
        </td>
     
        <td><span class="updateComments" data-currComment="{{comments}}" data-loanid="{{loanRequestId}}" onclick="updateComments({{loanRequestId}})">{{comments}}&nbsp;</span></td>
         <td><span class="oxyscoresampleClick" onclick="oxyscore({{userDisplayId}})" data-currComment="{{oxyscore}}" data-userid="{{userDisplayId}}">{{user.oxyScore}}&nbsp;</span></td>
         

       <td>                
        <button type="button" class="btn btn-warning pull-left btn-xs" onclick="changePrimarytype('LENDER',{{borrowerUser.id}})" data-reqid = "{{borrowerUser.id}}" > <b>Change to Lender</b></button>
      </td>

      </tr>   
  {{/data}}
</script>

<div class="modal  fade" id="modal-comments">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Comments</h4>
            </div>
            <div class="modal-body">
                <form>
                    <textarea type="text" name="" class="adminComment" class="form-control "></textarea><br />
                </form>

            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm saveCommentBtn" data-dismiss="modal"
                        data-clickedid="" onclick="postComment()">Save</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
                Updated comment. Please refresh the page and see.
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


<div class="modal  fade" id="modal-oxyscore">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oxy Score</h4>
            </div>
            <div class="modal-body">
                <form>
                    <input type="text" name="" class="userOxyScore" /><br />
                </form>

            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm postOxyscore" data-dismiss="modal"
                        data-clickedid="" onclick="postOxyscore()">Save</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal modal-success fade" id="modal-oxyscoreSuccesss">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Updated</h4>
            </div>
            <div class="modal-body">
                Updated oxyscore. Please refresh the page and see.
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
window.onload = loadBorrowerApplications();
$(document).ready(function() {

});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>