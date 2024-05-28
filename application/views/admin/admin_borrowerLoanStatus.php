<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="margin-left:20px" class="text-bold">
            <left>Verifed FD Users</left>
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

                               <div class="row col-12 search-fd-bar">
                                        <div class="search-container">

                                            <span class="fa fa-search"></span>
                                            <input type="text" placeholder="Search  User Id" name="search"
                                                id="searchCalloffbankVerified">
                                            <p class="error searchCalloffdallverifiederror" style="display: none;">Enter User id
                                            </p>
                                        </div>
                                        <button class="btn btn-success btn-md fd searchbar_btn col-md-3" type="button"
                                            onclick="searchFduser('bankVerified');">Submit</button>
                                    </div>
                            <thead>
                                <tr id="example">
                                    <th>Borrower Info</th>
                                    <th>FD INFO </th>
                                    <th>Bank Info </th>
                                   
                                    <th>FD Amount </th>
                                    <th>Edit </th>

                                </tr>
                            </thead>
                            <tbody id="displayBorrowerVerifiedList">





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
                <h4 class="modal-title">Edit the Bank Details </h4>
            </div>
            <div class="offer_popup_cont clearfix">

                <div class="offer_popup_field clearfix">
                    <label>Borrower ID<em class="mandatory">*</em></label>
                    <div class="fld-block">
                        <input type="text" class="loanAmount" id="borrowerIdLoanAmount" placeholder="Borrower ID">
                        <span class="error loanBorrowerId" style="display: none;">Please Enter Borrower Id</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>



                <div class="offer_popup_field clearfix">
                    <label>FD Amount<em class="mandatory">*</em></label>
                    <div class="fld-block">
                        <input type="text" class="loanAmounttoBr" placeholder="Loan Amount" id="borrowerLoanAmount">
                        <span class="error loanAmoutError" style="display: none;">Please Enter Loan Amount.</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="offer_popup_field clearfix">
                    <label>Account Number <em class="mandatory">*</em></label>
                    <div class="fld-block">
                        <input type="text" class="loanAccountNumber" placeholder="Account Number"
                            id="loanUserAccountNo">
                        <span class="error accountNumberError" style="display: none;">Please Enter Bank Account
                            Number.</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="offer_popup_field clearfix">
                    <label>Name As Per Bank <em class="mandatory">*</em></label>
                    <div class="fld-block">
                        <input type="text" class="loanBorrowerName" placeholder="Name As Per Bank" id="nameLoanOwner">
                        <span class="error loanNameError" style="display: none;">Please Enter Name As per Bank.</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="offer_popup_field clearfix">
                    <label>IFSC <em class="mandatory">*</em></label>
                    <div class="fld-block">
                        <input type="text" class="userLoanIfsc" placeholder="IFSC code" id="loanUserIfsccode">
                        <span class="error ifscErrorError" style="display: none;">Please Enter ifsc code.</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                 <div class="offer_popup_field clearfix">
                    <label>Loan Type <em class="mandatory">*</em></label>
                    <div class="fld-block">
                       <select class="form-control" id="loanType">
                        <option value="">Choose loan Type</option>
                        <option value="STUDENT">STUDENT</option>
                        <option value="ASSET">ASSET</option>
                    </select>
                        <span class="error loanTypeError" style="display: none;">Please choose Loan Type</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>

            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-primary btn-sm editbankDetailsStudent" data-choosenbankName=""
                        data-bankName="" data-leadBy="" data-consultancy="" data-roi="" data-fundingType=""
                        data-country="" data-university="" data-studentMobileNumber="" data-fdAmount="" data-city=""
                        data-branch=""  data-loanType="" data-paymentcollection="" onclick="addTheBorrowerLoansOfferToDeal()">Submit</button>
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


<div class="modal  fade modal-success" id="modal-studentDetails-fd">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body loansUserSuccessMessage">
                <p class="#">Borrower details have been saved.</p>

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
window.onload = fdverifedUsers();
</script>


<script id="scriptBankverifiedUser" type="text/template">

    {{#data}}
     <tr class="">
                                     <td>ID : BR {{userId}}  </br>
                                    Name : {{userName}}<br> 
                                       Funding Type : {{fundingType}}</br>
                                          <b>Fee payer : {{paymentsCollection}}</b>
                                    
                                    
                                     </td>


                                         <td>Amount : {{fdAmount}} </br>
                                         Lead By : {{leadBy}}</br>
                                          RoI : {{roi}} % PM </br>
                                       
                                      
                                     </td>
                                    <td>
                                    Ac No :{{accountNumber}}</br>
                                    Ifsc : {{ifsc}}</br>
                                    Bank Name : {{bankName}}

                                </td>
                                    
                                    <td>{{fdAmount}}</br>
                                    Loan Type : {{loanType}}



                                    </td>
                                    <td>
                               <button class="btn btn-xs btn-primary" onclick="editLoanBorrowerProcess('{{userId}}','{{fdAmount}}','{{accountNumber}}', '{{ifsc}}','{{userName}}','{{bankName}}','{{bankName}}','{{leadBy}}','{{consultancy}}','{{roi}}','{{fundingType}}','{{country}}','{{university}}','{{studentMobileNumber}}','{{fdAmount}}','{{city}}','{{branch}}','{{loanType}}','{{paymentsCollection}}');"> Edit</button></td>
                                </tr>
                                {{/data}}
</script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>