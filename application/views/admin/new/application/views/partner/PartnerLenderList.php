 <?php include 'partner_header.php';?>
 <?php include 'partner_sidebar.php';?>
 <div class="content-wrapper">
     <section class="content-header">
         <div class="pull-left col-md-6">
             <h4 class="text-bold">
                 Registered Lenders
             </h4>
         </div>
         <div class="row">
             <div class="col-xs-3 text-center">
                 <select class="form-control choosenType" id="Search">
                     <option value="">-- Choose --</option>
                     <option value="Lender Id">Lender ID</option>

                 </select>
             </div>
             <div class="col-xs-3 text-center applicationid" style="display: none;">
                 <input type="text" name="applicationid" class="form-control lnderuserid" id="lnderuserid"
                     placeholder="Lender ID">
             </div>


             <div class="col-xs-3 text-center">
                 <button type="button" class="btn bg-gray pull-left search-btn" onclick="searchcallregisteredLender()">
                     <i class="fa fa-angle-double-right"></i> <b>Search</b>
                 </button>
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
                         Registered Lenders
                     </div>
                     <div class="box-body editlendergroup">
                         <div class="box-header">


                             <div class="col-md-6 pull-left lenderwalletinfopartner">
                                 <h4 class="headWallet">Total Wallet Amount of Lenders : <span
                                         class="partnerLenderAmount">10000</span></h4>
                             </div>

                             <div class="col-md-6 pull-left diswarningmessage error" style="display:none">
                                 <h4 class="warningmessagetext"></h4>
                             </div>

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
                                     <th>Name</th>
                                     <th>User Id</th>
                                     <th>Mobile Number</th>
                                     <th>Email</th>

                                 </tr>
                             </thead>
                             <tbody id="loadDealsInfo" class="displayoffers mobileDiv_3">
                                 <tr id="displayNoRecords" class="displayRequests" style="display: none;">
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
 <script id="displayInterestScript" type="text/template">
     {{#data}}
<tr class="divBlock_Mob_001">
  <td>
<span class="lable_mobileDiv">name</span>
  {{lenderUser.firstName}} {{lenderUser.lastName}}</br>
 DOB : {{lenderUser.dob}}</br>
 Address : {{lenderUser.address}}</br>

</td>
  <td>
<span class="lable_mobileDiv">userId</span>
 LR {{userDisplayId}}</br>
Group : {{groupName}}</br>

UTM : {{lenderUser.utmSource}}</br>



</td>

  <td>
     <span class="lable_mobileDiv">mobileNumber</span>
    {{lenderUser.mobileNumber}}</br>
    PAN NO : {{lenderUser.panNumber}}</br>
    Referred By : {{referredBy}}
  </td>
  <td>
<span class="lable_mobileDiv">email</span>
    {{lenderUser.email}}</br>
    wallet : {{walletAmountToLender}}
  </td>
</tr>
{{/data}}
</script>
 <script type="text/javascript">
// window.onload = getListOfLendersList();
// window.onload = updateEmailMobile();
window.onload = viewpartnerLenderList();
 </script>

 <script type="text/javascript">
$(document).ready(function() {
    $("#Search").on("change", function() {


        if ($(".choosenType").val() == "Lender Id") {
            $(".applicationid").show();

        }
    });
});
 </script>

 <?php include 'partner_footer.php';?>