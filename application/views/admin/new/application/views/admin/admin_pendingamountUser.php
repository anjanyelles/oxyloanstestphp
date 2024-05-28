 <?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="margin-left:20px" class="text-bold">
            <left>Pending Amount Users</left>
        </h1>

    </section><br />
    

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="col-md-6 pull-right">
                            <div class="fdverifiedUserList pull-right">
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
                                    <th>User Info</th>
                                    <th>Amount </th>
                                    <th>Transaction Type  </th>
                                    <th>Action </th>

                                </tr>
                            </thead>
                            <tbody id="displayBorrowerVerifiedList">
                                <tr class="nodatapendingamount" style="display:none">
                                    <td colspan="8">No data found</td>
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

<div class="modal  fade modal-success" id="modal-movefiletocms">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body loansUserSuccessMessage">
                <p class="info-message">The file was successfully Moved to the cms.</p>

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


<div class="modal  fade" id="modal-add-loanBorrowerApplication">
    <div class="modal-dialog">
        <div class="modal-content offer_popup">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Pending Amount Details </h4>
            </div>
            <div class="offer_popup_cont clearfix">

                <div class="offer_popup_field clearfix">
                    <label>User ID<em class="mandatory">*</em></label>
                    <div class="fld-block">
                        <input type="text" class="loanAmount" id="editpendingloanUserid" placeholder="User ID" readonly>
                        <span class="error editpendingloanUseriderror" style="display: none;">Please Enter Borrower Id</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>



                <div class="offer_popup_field clearfix">
                    <label> Amount<em class="mandatory">*</em></label>
                    <div class="fld-block">
                        <input type="text" class="loanAmounttoBr" placeholder=" Amount" id="pendingLoanAmount">
                        <span class="error erroreditpendingLoanAmount" style="display: none;">Please Enter the Amount.</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="offer_popup_field clearfix">
                    <label>Deal Id<em class="mandatory">*</em></label>
                    <div class="fld-block">
                        <input type="text" class="editpendingloanAmountid" placeholder="Enter The Deal Id"
                            id="editpendingloanAmountid">
                        <span class="error erroreditpendingloanAmountid" style="display: none;">Please Enter Deal Id</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="offer_popup_field clearfix">
                    <label>Reason <em class="mandatory">*</em></label>
                    <div class="fld-block">
                        <input type="text" class="editloandpendingReason" placeholder="Enter The Reason" id="editloandpendingReason">
                        <span class="error erroreditloandpendingReason" style="display: none;">Please Enter The Reason</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="offer_popup_field clearfix">
                    <label>No of Daya <em class="mandatory">*</em></label>
                    <div class="fld-block">
                        <input type="text" class="editloadnDays" placeholder="Enter No of Days" id="editloadnDays">
                        <span class="error erroreditloadnDays" style="display: none;">Please Enter No of Days</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                 <div class="offer_popup_field clearfix">
                    <label>Amount Type <em class="mandatory">*</em></label>
                    <div class="fld-block">
                      <select class="form-control amountType" id="pendingamountType" data
                                    validation="status">
                                    <option value="">Choose Status</option>
                                    <option value="LENDERINTEREST">LENDER INTEREST</option>
                                    <option value="LENDERPRINCIPAL">LENDER PRINCIPAL</option>
                                       <option value="REFERRALBONUS">REFERRAL BONUS</option>
                             
                                </select>
                        <span class="error errorpendingamountType" style="display: none;">Please choose Amount Type</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>



                 <div class="offer_popup_field clearfix">
                    <label>Transaction Type<em class="mandatory">*</em></label>
                    <div class="fld-block">
                        <select class="form-control amountType" id="pendingTransactiontype" data
                                    validation="status">
                                    <option value="">Choose transactionType</option>
                                    <option value="DISBURSMENT">DISBURSMENT</option>
                                    <option value="LENDERPRINCIPAL">LENDER PRINCIPAL</option>
                                       <option value="REPAYMENT">RE PAYMENT</option>
                             
                                </select>
                         <span class="error pendingLoanEmountTransactiontype" style="display: none;">Please choose The Transaction Type</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>

            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-primary btn-sm editpendingloanaamountUserForm" data-userID=""
                        data-AmountType="" data-Amount="" data-dealId="" data-reason="" data-transactionType=""
                        data-noofdays="" data-id="" onclick="formeditlenderPendingAmount()">Submit</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade modal-warning" id="modal-movefilenodata">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body">
                <p class="info-message">No data was selected; kindly select the Loan users.</p>

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


<div class="modal modal-success fade" id="modal-lenderpendingsuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks</h4>
            </div>
            <div class="modal-body">
                <p id="text">
                  User details were successfully saved.
                </p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<div class="modal modal-warning fade" id="modal-offlineInterestAndPrincipal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Status</h4>
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


<div class="modal modal-success fade" id="modal-h2hfilegeneratedLendingPendingAmount">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks</h4>
            </div>
            <div class="modal-body">
                <p id="display_text">File successfully generated</p>

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


<div class="modal  modal-info fade" id="modal-confirm-generateFile">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmation!</h4>
            </div>
            <div class="modal-body loansUserSuccessMessage">
                <p class="#">
                    Are Sure You want to Generate H2h File for the Pending Amount
                </p>

            </div>
            <div class="modal-footer">
                <div align="right">
                 <button type="button" class="btn btn-default btn-sm cmsfilePendingAmount" data-id="" onclick="generateh2hfilependingamount();">Generate H2h File</button>

                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
window.onload = pendingamountUsersList();
</script>


<script id="scriptBankverifiedUser" type="text/template">

    {{#data}}
     <tr class="">
                                     <td>LR{{userId}}
                                  
                                    
                                    
                                     </td>
                                         <td> Amount : INR {{amount}} </br>
                                          Created Date : {{createdDate}} </br>
                                          Deal Id: {{dealId}}
                                          
                                      
                                     </td>

                                    <td>
                                    Reason : {{reason}}</br>
                                    Status : {{status}}</br>
                                    Amount Type : {{amountType}}</br>
                                    Transaction Type : {{transactionType}}</br>
                                    No Of Days : {{noOfDays}}

                                </td>
                                    
                                   

                                <td>
                               <button class="btn btn-xs btn-primary" onclick="editPendingLoanAmount('{{userId}}','{{amountType}}','{{amount}}', '{{dealId}}','{{reason}}','{{transactionType}}','{{noOfDays}}','{{id}}');"> Edit</button></br></br>

                                <button class="btn btn-xs btn-warning"  onclick="generateh2hconfirmationfilependingamount('{{id}}');"> H2h File</button>

                                </td>



                                </tr>
                                {{/data}}
</script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>