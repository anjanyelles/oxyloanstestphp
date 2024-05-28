 <?php include 'partner_header.php';?>
 <?php include 'partner_sidebar.php';?>
 <div class="content-wrapper">
     <section class="content-header">
         <div class="pull-left col-md-3">
             <h4 class="text-bold">
                 Registered Borrowers
             </h4>
         </div>

         <div class="row">
             <div class="col-xs-2 text-center">
                 <select class="form-control choosenType" id="Search">
                     <option value="">-- Choose --</option>
                     <option value="Borrower id">Borrower ID</option>

                 </select>
             </div>
             <div class="col-xs-2 text-center applicationid" style="display: none;">
                 <input type="text" name="applicationid" class="form-control borrowerid" id="borrowerid"
                     placeholder="Borrower ID">
             </div>


             <div class="col-xs-2 text-center">
                 <button type="button" class="btn bg-gray pull-left search-btn" onclick="seachcallofborrower()">
                     <i class="fa fa-angle-double-right"></i> <b>Search</b>
                 </button>
             </div>


             <div class="pull-right col-md-8 mytopPa mobile_View_div">
                 <button class=" btn btn-info btn-ref-lender pull-right"
                     onclick="copyLenderrrefLink('#lenderRefLinkU');">
                     Invite a Lender <i class="fa fa-user-o fa_copyRefLink" aria-hidden="true"></i>
                 </button>
                 <button class="btn btn-warning btn-ref-borrower pull-right"
                     onclick="copyBorrowerrefLink('#borrowerRefLinkU');" style="margin-right:5px">
                     Invite a Borrower <i class="fa fa-clipboard fa_copyRefLink" aria-hidden="true"></i>
                 </button>
                 <button class="btn btn-primary btn-ref-partner pull-right"
                     onclick="copyReferresSubLink('#partnerSubRegister_LinkU');" style="margin-right:5px"><i
                         class="fa fa-user-plus"></i>
                     Invite a Partner
                 </button>
                 <input type="text" class="l_partnerUtm" id="lenderRefLinkU" value="" style="display:none;" />
                 <input type="text" class="b_partnerUtm" id="borrowerRefLinkU" value="" style="display:none;" />

                 <input type="text" class="l_partnerRegister" id="partnerRegister_LinkU" value=""
                     style="display:none;" />

                 <input type="text" class="b_partnerRegister" id="partnerbRegister_LinkU" value=""
                     style="display:none;" />

                 <input type="text" class="sub_partnereferrer" id="partnerSubRegister_LinkU" value=""
                     style="display:none;" />
             </div>

         </div>
     </section>
     <div class="cls"></div>
     <section class="content"></br></br>
         <div class="row customFormQ">
             <div class="cls"></div>
             <div class="col-md-12">
                 <div class="box box-secondary">
                     <div class="box-header MobDiv_05">
                         Registered Borrowers
                     </div>
                     <div class="box-body editlendergroup">


                         <div class="box-header">

                             <div class="col-md-6 pull-right">
                                 <div class="viewpartnerRegisteredBorrowers pull-right">
                                     <ul class="pagination bootpag">
                                     </ul>
                                 </div>
                                 <div class="searchborrowerPagination pull-right" style="display: none;">
                                     <ul class="pagination bootpag">
                                     </ul>
                                 </div>
                             </div>
                         </div>


                         <table id="example2" class="table table-bordered table-hover">
                             <thead class="mobileDiv_4">
                                 <tr class="partnerTable">
                                     <th>User Info</th>

                                     <th>Loan Request Status</th>
                                     <th>Loan Info</th>
                                     <th>Bank Info</th>
                                     <th>More</th>
                                 </tr>
                             </thead>
                             <tbody id="loadDealsInfo" class="displayoffers mobileDiv_3">
                                 <tr id="displayNoRecords" class="displayRequests" style="display: none;">
                                     <td colspan="8">No User found!</td>
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

     </div>

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
 <script id="displayInterestScript" type="text/template">
     {{#data}}
<tr class="divBlock_Mob_001">
  <td>
     <span class="lable_mobileDiv">name</span>
    {{user.firstName}} {{user.lastName}}</br>
    User id : BR{{borrowerUser.id}}</br>
    Mobile :{{user.mobileNumber}}</br>
    Email :  {{user.email}}</br>
</td>

 <td>
 <span class="lable_mobileDiv">Status </span>
 {{#loanStatus}}
     {{loanStatus}}
  {{/loanStatus}}

  {{^loanStatus}}
  Not yet Requested
  {{/loanStatus}}
</td>
    <td>
    <span class="lable_mobileDiv">Loan Info</span>
   Requested Amount :{{loanRequestAmount}}</br>
    RoI :{{rateOfInterest}}% Per Month </br>
    Duration :  {{duration}} {{durationType}}</br>
    Re-Payment Type: {{repaymentMethod}}
</td>
  <td>


   <span class="lable_mobileDiv">Bank Info</span>

     {{#borrowerUser.accountNumber}}
      
      AC No :  {{borrowerUser.accountNumber}}</br>
     IFSC  :{{borrowerUser.ifscCode}}</br>
     Branch :  {{borrowerUser.branchName}}

    {{/borrowerUser.accountNumber}}
    {{^borrowerUser.accountNumber}}
     <div class="user_notcompletedBank" style="color: red; font-size:14px; font-weight:800">
     User did n't Fill The Bank Details
      </div>
    {{/borrowerUser.accountNumber}} 


</td>
  <td>
 <span class="lable_mobileDiv">email</span>
 
   <a href="PartnerBorrowerInfo?userid={{borrowerUser.id}}"> <button class="btn btn-xs btn-primary">View More</button></a>

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
     </div>
 </div>
 <script type="text/javascript">
window.onload = getListOfPartnersUsers();
// window.onload = updateEmailMobile();
// window.onload = checkuserTypeBeforeLoad();
window.onload = loadAllThepartnerBorrowers();
window.onload = viewWalletAmountofPartner();
 </script>


 <script type="text/javascript">
$(document).ready(function() {
    $("#Search").on("change", function() {


        if ($(".choosenType").val() == "Borrower id") {
            $(".applicationid").show();

        }
    });
});
 </script>
 <?php include 'partner_footer.php';?>