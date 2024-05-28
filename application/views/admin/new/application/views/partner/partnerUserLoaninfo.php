<?php include 'partner_header.php';?>
<?php include 'partner_sidebar.php';?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="pull-left col-md-4">
            <h4 class="text-bold">
                Partner Loan info
            </h4>
        </div>
    </section>
    <div class="cls"></div>
    <section class="content"></br></br>
        <div class="row customFormQ">
            <div class="cls"></div>
            <div class="col-md-12">
                <div class="box box-secondary">
                    <div class="box-body editlendergroup">
                        </br></br>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="mobileDiv_4">
                                <tr id="tabletr" class="partnerTable">

                                    <th>Name</th>
                                    <th>Loan Id</th>
                                    <th>ROI</th>
                                    <th>Disbursed Amount</th>
                                    <th>Tenure</th>
                                    <th>Due/ Total</th>
                                    <th>Future Payments</th>
                                    <th>Loan Status</th>
                                    <th>Agreements</th>
                                </tr>
                            </thead>
                            <tbody id="loadPartnerLoanInfo" class="mobileDiv_3">
                                <tr id="displayLoanNoRecords" class="displayRequests" style="display: none;">
                                    <td colspan="12">No User found!</td>
                                </tr>
                            </tbody>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
    </section>
</div>
</div>


<div class="modal  fade" id="update-paretner-details-mobile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Your Number & Email</h4>
            </div>
            <div class="modal-body">
                <label>phone Number</label>
                <input type="text" name="whastappnumber" id="partnerPhone" class="form-control partnerPhone"></br>
                <label>Email</label>
                <input type="text" name="whastappnumber" id="partnerEmail" class="form-control partnerEmail">
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-info" onclick="partnerUpdateNumberEmail();">Submit</button>
                    <button type="button" class="btn btn-default btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-success fade" id="modal-sucessfully-updated">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Your are successfully updated the Email& Mobile</br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>


<div class="modal modal-info fade" id="message informastion">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">info!</h4>
            </div>
            <div class="modal-body">
                <p>Welcome to oxyloans. Thank you for registering with us.
                    Our partnership will enable your users to Lend/Invest money and borrow money.
                    Enable your user to register as oxyloans lender/investor with the below link:
                    http://182.18.139.198/new/register_lender?utm=NewTest
                    Enable your user to register as oxyloans borrower with the below link:
                    http://182.18.139.198/new/register_borrower?utm=NewTest</br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>


<div class="modal fade" id="modal-viewagreementsToBorrower">
    <div class="modal-dialog user_emi modal-lg">
        <div class="modal-content">
            <div class="modal-header emi_header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-3">
                        <h4 class="modal-title">Agreements</h4>
                    </div>
                </div>
            </div>
            <div class="modal-body emi_body_cont">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr class="mobileDiv_4">
                            <th>Loan Amount</th>
                            <th>Loan Response Id</th>
                        </tr>
                    </thead>
                    <tbody id="displayAgreementsRecords" class="mobileDiv_3">
                        <tr id="displayLoanNoRecords" class="displayRequests" style="display: none;">
                            <td colspan="12">No User found!</td>

                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->

<script id="displayallAgreementsRequests" type="text/template">
    {{#data}}
       <tr class="divBlock_Mob_001">
      <td>
        <span class="lable_mobileDiv"> Loan Amount</span>
       {{loanAmount}}
     </td>
           <td>
             <span class="lable_mobileDiv">Loan Response Id </span>
           {{loanResponseId}}
           </td>
      </tr>
      {{/data}}
</script>



<script id="displayPartnerloanInfo" type="text/template">
    {{#data}}
<tr class="divBlock_Mob_001">
  
  <td>
     <span class="lable_mobileDiv">Name</span>
  {{name}}
</td>
  <td>
     <span class="lable_mobileDiv">Loan ID</span>

    {{loanId}}
  </td>
   <td>
 <span class="lable_mobileDiv">ROI</span>
    {{rateOfInterest}} % PM
  </td>
   <td>
     <span class="lable_mobileDiv">Disbursment Amount</span>

    {{disbursmentAmount}}
  </td>
   <td>
 <span class="lable_mobileDiv">Duration</span>
    {{duration}} M
  </td>
   <td>
 <span class="lable_mobileDiv">DUE</span>

    {{sumOfEmiAmountDue}} / {{sumOfEmiAmountToBePaid}}
  </td>
   <td>
 <span class="lable_mobileDiv">NO Emi</span>

    {{totalNoOfEmisToBePaidInFuture}}
  </td>
   <td>
 <span class="lable_mobileDiv">loan Status</span>

    {{loanStatus}}
  </td>
    <td align="center" class="actions_borrowings">
     <span class="lable_mobileDiv">View</span>
    <a href='javascript:void(0)'class="downloadAgreeent" onclick="showagreements();">
     View
    </a>
  </td>
</tr>
{{/data}}
</script>



<div class="modal modal-info fade" id="modal-welcomeWindow">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Welcome to OxyLoans!</h4>
            </div>
            <div class="modal-body">
                <b>Thank you for registering with us..</b><br /><br />
                Our partnership enables your users to Lend/Invest and borrow money. <br /><br />Enable your user to
                register as oxyloans lender/investor through the below link
                https://www.oxyloans.com/new/register_lender?utm=<span class="partnerUtm"></span> <br /><br />Enable
                your user to register as oxyloans borrower through the below link:
                https://www.oxyloans.com/new/register_borrower?utm=<span class="partnerUtm"></span>
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
window.onload = checkuserTypeBeforeLoad();
window.onload = partnerLoanInfo();
window.onload = viewWalletAmountofPartner();
</script>
<?php include 'partner_footer.php';?>