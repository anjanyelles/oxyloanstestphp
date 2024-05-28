 <?php include 'partner_header.php';?>
 <?php include 'partner_sidebar.php';?>
 <?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$userStatus =isset($_GET['status']) ? $_GET['status'] : null;

if($userStatus=='PartnerReject'){
   $update_status="Rejected Users";
}
else if($userStatus=='PartnerApproved'){
  $update_status="Approved Users";
}
else if($userStatus=='PartnerShortList'){
    $update_status="Shortlist Users";
}
?>
 <div class="content-wrapper">
     <section class="content-header">
         <div class="pull-left col-md-6">
             <h4 class="text-bold">
                 <?php echo$update_status ?>
             </h4>
         </div>

         <div class="row">
             <div class="col-xs-3 text-center">
                 <select class="form-control choosenType" id="Search">
                     <option value="">-- Choose --</option>
                     <option value="Borrower id">Borrower ID</option>

                 </select>
             </div>
             <div class="col-xs-3 text-center applicationid" style="display: none;">
                 <input type="text" name="applicationid" class="form-control borrowerid" id="borrowerid"
                     placeholder="Borrower ID">
             </div>


             <div class="col-xs-3 text-center">
                 <button type="button" class="btn bg-gray pull-left search-btn"
                     onclick="srarchcallBasedonUsersStatus('<?php echo$userStatus?>')">
                     <i class="fa fa-angle-double-right"></i> <b>Search</b>
                 </button>
             </div>

     </section>
     <div class="cls"></div>
     <section class="content"></br></br>
         <div class="row customFormQ">
             <div class="cls"></div>
             <div class="col-md-12">
                 <div class="box box-secondary">
                     <div class="box-header MobDiv_05">

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
                                     <th>Name</th>

                                     <th>Email</th>
                                     <th>Loan Status</th>
                                     <th>Borrower Actions</th>
                                     <th>Disburse Loan</th>

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



 <div class="modal  fade" id="modal-App-Level-disbursed">
     <div class="modal-dialog">
         <div class="modal-content offer_popup">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Disburse The Loan</h4>
             </div>
             <div class="offer_popup_cont clearfix">
                 <div class="offer_popup_field clearfix">
                     <label>Disbursed Date<em class="mandatory">*</em></label>
                     <div class="fld-block">
                         <input type="text" class="disbursedDate" id="disbursedDate"
                             placeholder="Enter the disbursed date">
                         <span class="error loanDealError" style="display: none;"> Enter the Disbursed Date</span>
                         <div class="clear"></div>
                     </div>
                     <div class="clear"></div>
                 </div>
             </div>
             <div class="modal-footer">
                 <div align="right">
                     <button type="button" class="btn  btn-primary btn-sm  savedisbursedUser" data-loanid=""
                         onclick="AppLevelDisbursedAmount()">Submit</button>
                     <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                 </div>
             </div>
         </div>

     </div>
 </div>


 <div class="modal  fade modal-success" id="modal-movefiletocms">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Thanks!</h4>
             </div>
             <div class="modal-body">
                 <p>.</p>

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


 <div class="modal modal-warning fade" id="modal-amount-limit-exced">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title"></h4>
             </div>
             <div class="modal-body">
                 <p id="text1">bjhvj.</p>
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
 <script id="displayInterestScript" type="text/template">
     {{#data}}
<tr class="divBlock_Mob_001">
  <td>
<span class="lable_mobileDiv">name</span>
  {{borrowerUser.firstName}} {{borrowerUser.lastName}}</br>

Mobile No :{{borrowerUser.mobileNumber}}</br>

      Address : {{borrowerUser.address}}</br>



</td>
  <td>
   <span class="lable_mobileDiv">email</span>
    {{borrowerUser.email}}</br>
      DOB : {{borrowerUser.dob}}</br>
            User Id : BR {{borrowerUser.id}}</br>
  </td>

   <td>
<span class="lable_mobileDiv">status</span>
    {{loanStatus}} </br>  
Loan Amount : {{loanRequestAmount}}</br>
 Requested Date :{{loanRequestedDate}}
   
  </td>

    <td>
<span class="lable_mobileDiv">Borrower Actions</span>



<span class="offfend_{{loanStatus}}">

  {{#offerAcceptedStatus}}
    <i class="fa fa-check" aria-hidden="true" style="color:green; margin-right:3px"> </i> Offer Acceptance </br>
  {{/offerAcceptedStatus}}
  {{^offerAcceptedStatus}}
    <i class="fa fa-times" aria-hidden="true" style="color:red; margin-right:3px"> </i> Offer Acceptance </br>
  {{/offerAcceptedStatus}}


  
 {{#partnerEsign}}
    <i class="fa fa-check" aria-hidden="true" style="color:green; margin-right:5px"> </i>Esign </br>
  {{/partnerEsign}}
  {{^partnerEsign}}
   <i class="fa fa-times" aria-hidden="true" style="color:red; margin-right:5px"> </i>Esign </br>
  {{/partnerEsign}}


  {{#partnerEnach}}
    <i class="fa fa-check" aria-hidden="true" style="color:green; margin-right:5px"> </i>Enach</br>
  {{/partnerEnach}}
  {{^partnerEnach}}
    <i class="fa fa-times" aria-hidden="true" style="color:red; margin-right:5px"> </i>Enach</br>
  {{/partnerEnach}}


 

</span>


<span class="defend_{{loanStatus}}">
  <i class="fa fa-check" aria-hidden="true" style="color:green; margin-right:3px"> </i> Offer Acceptance </br>
  
  <i class="fa fa-check" aria-hidden="true" style="color:green; margin-right:5px"> </i>Esign</br>

  <i class="fa fa-check" aria-hidden="true" style="color:green; margin-right:5px"> </i>Enach </br>

</span>

 <i class="fa fa-check loansaccepted_{{loanStatus}}" aria-hidden="true" style="color:green; margin-right:5px; display:none"><span style:"color:black!important"> Loan Disbursed</span></i> </br>

  </td>



    <td>
    <button class="btn btn-xs btn-success cmsHideBtn enach_{{partnerEnach}}_{{partnerEsign}}" onclick="isapppLevelDisbursed('{{borrowerUser.id}}')">Disburse Loan</button> 
      </td>
</tr>
{{/data}}
</script>
 <script type="text/javascript">
window.onload = checkuserTypeBeforeLoad();
window.onload = borrowerStatusUserLists('<?php echo$userStatus?>');
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

 <script type="text/javascript">
$(document).ready(function() {

    $("#disbursedDate").datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        startDate: new Date(),
        changeMonth: true,
        changeYear: true,
        endDate: "today",
    });
});
 </script>


 <link rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
 <link rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
 <?php include 'partner_footer.php';?>