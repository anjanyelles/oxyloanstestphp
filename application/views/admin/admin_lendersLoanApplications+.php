<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lenders Loan Applications
        </h1>
    </section><br />

    <!-- Main content -->

    <section class="content">

        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="lenderSearch">
                    <option value="">-- Choose --</option>
                    <option value="name">Name</option>
                    <option value="id">Id</option>
                    <option value="roi">ROI</option>
                    <option value="amount">Amount</option>
                    <option value="oxyscore">Oxyscore</option>
                </select>
                <span class="errorsearch" style="display: none;">Please choose option.</span>
            </div>

            <div class="col-xs-3 text-center name" style="display: none;">
                <input type="text" name="name" class="form-control name" placeholder="Name">
            </div>

            <div class="col-xs-3 text-center id" style="display: none;">
                <input type="text" name="id" class="form-control id" placeholder="ID">
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

            <div class="col-xs-3 text-center oxyscore" style="display: none;">
                <input type="text" name="oxyscore" class="form-control oxyscore" placeholder="Oxyscore">
            </div>

            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn"><i class="fa fa-angle-double-right"></i>
                    <b>Search</b>
                </button>
            </div>
        </div>



        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Lenders info</h3>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="dashBoardPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Lender ID</th>
                                    <th>Name</th>
                                    <th>Commitment Amount</th>
                                    <th>ROI</th>
                                    <th>Mobile Number</th>
                                    <th>Address</th>
                                    <th>View Documents</th>
                                    <th>Comments</th>
                                    <th>Oxy Score</th>
                                    <th>Change Role</th>
                                </tr>
                            </thead>
                            <tbody id="loadLendersList">

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

    <script id="loadLendersListTpl" type="text/template">
        {{#data}}
      <tr>
        <td>LR{{lenderUser.id}}</td>
        <td>{{user.firstName}} {{user.lastName}}</td>
        <td>INR <span>{{loanRequestAmount}}</span></td>
        <td>{{rateOfInterest}}% PA</td>
        <td>{{user.mobileNumber}}</td>
        <td>DAMODER GARU??</td>
        <td>
          <a href="javscript:void(0)" rel="{{user.aadharFileUrl}}" class="viewPan">View PAN</a><br/>
          <a href="javscript:void(0)" rel="{{user.panUrl}}"  class="viewPan">View AADHAR</a><br/>
          <a href="javscript:void(0)" rel="{{user.passportUrl}}"  class="viewPan">View PASSPORT</a>
        </td>
        <td><span class="updateComments" data-currComment="{{comments}}" data-loanid="{{loanRequestId}}">{{comments}}&nbsp;</span></td>
        <td><span class="oxyscoresampleClick" onclick="oxyscore({{userDisplayId}})" data-currComment="{{oxyscore}}" data-userid="{{userDisplayId}}">{{oxyscore}}&nbsp;</span></td>

         <td>
                        
         <button type="button" class="btn btn-warning pull-left btn-xs" onclick="changePrimarytype('BORROWER',{{lenderUser.id}})" data-reqid = "{{lenderUser.id}}" > <b>Change to Borrower</b></button>
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
    window.onload = loadLendersApplications();
    </script>
    <script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
    <?php include 'admin_footer.php';?>