 <?php include 'header.php';?>
 <?php include 'borrowersidebar.php';?>

 <div class="content-wrapper">
     <section class="content-header">
         <left>
             <h1>
                 Referral Info
             </h1>
         </left>
         <div class="row">
             <div class="pull-right classcopyrefLink">
                 <input type="text" id="refLinkU" style="display: none;"
                     value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                 <button onclick="copyrefLink('#refLinkU');" class="btn btn-success btn-ref btn-md"
                     data-toggle="tooltip" title="Share this link" data-placement="left"><img
                         src="<?php echo base_url(); ?>/assets/images/indiaflag.png" alt="India flag"
                         class="flagimageforRef"> Invite a Lender <i class="fa fa-user-o fa_copyRefLink"
                         aria-hidden="true"></i></button>
             </div>
             <div class="pull-right classcopyrefLink" style="display: none;">
                 <input type="text" id="nrirefLinkU" style="display: none;"
                     value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                 <button onclick="copyNrirefLink('#nrirefLinkU');" class="btn btn-primary btn-md  btn-ref-nri"
                     data-toggle="tooltip" title="Share This link" data-placement="right"><i
                         class="fa fa-plane nriimage" aria-hidden="true"></i> Invite an NRI</button>

             </div>
             <div class="pull-right classcopyrefLink">
                 <input type="text" id="borrowerRefLinkU" style="display: none;"
                     value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                 <button onclick="copyBorrowerrefLink('#borrowerRefLinkU');" class="btn btn-warning btn-ref-borrower"
                     data-toggle="tooltip" title="Share This link" data-placement="bottom">Invite a Borrower <i
                         class="fa fa-clipboard fa_copyRefLink" aria-hidden="true"></i></button>

             </div>
             <div class="pull-right dowloadReferralStatus">
                 <button onclick="downloadReferralStatus();" class="btn btn-danger btn-md" data-toggle="tooltip"
                     title="Download Referral Status" data-placement="right" target="_blank"><i class="fa fa-download"
                         aria-hidden="true"></i> Referral Status</button>
             </div>
         </div>
     </section>
     <div class="cls"></div>
     <!-- Main content -->
     <section class="content">
         <div class="cls"></div>
         <div class="row customFormQ">
             <div class="cls"></div>
             <!-- left column -->
             <div class="col-md-12">
                 <!-- general form elements -->
                 <div class="box box-primary">
                     <div class="box-header">
                         <div class="pull-left reff">
                             <div class="info">
                                 <code><strong>Note:</strong></code><br />
                                 <strong>Invited:</strong> You have invited but your friend is not yet registered.<br />
                                 <strong>Registered:</strong> Your friend has registered and reviewing borrowing
                                 opportunities.<br />
                                 <strong>Disbursed Money:</strong> Your friend has borrow the money and You started
                                 earning.
                             </div>
                         </div>
                         <div class="pull-right">
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="acceptedPagination">
                                         <ul class="pagination bootpag">
                                         </ul>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="pull-right">
                         </div>
                     </div>
                     <!-- /.box-header -->
                     <div class="box-body">
                         <table id="myborrowingsData" class="table table-bordered table-hover">
                             <thead class="mobileDiv_4">
                                 <tr>
                                     <th>User Name</th>
                                     <th>Email</th>
                                     <th>MobileNumber</th>
                                     <th>Status </th>
                                     <th>Referred On</th>
                                     <th>View Referee</th>
                                 </tr>
                             </thead>
                             <tbody id="displaywallettrns" class="displaywallettrns mobileDiv_3">
                                 <tr id="displayNoRecords" class="displayRequests">
                                     <td colspan="8">No User found!</td>
                                 </tr>

                                 </tfoot>
                         </table>
                     </div>
                 </div>
             </div>

         </div>
     </section>

 </div>
 <!-- /.content-wrapper -->
 <script id="wallettransactiondetails" type="text/template">
     {{#data}}
  <tr class="divBlock_Mob_001">
    <td>
      <span class="lable_mobileDiv">Referee Name</span>
    {{refereeName}}</td>
    <td>
      <span class="lable_mobileDiv">Email</span>
    {{refereeEmail}}</td>
    <td>
      <span class="lable_mobileDiv">Mobile</span>
    {{refereeMobileNumber}}</td>
    <td>
      <span class="lable_mobileDiv">Status</span>
    {{status}}</td>
    <td>
      <span class="lable_mobileDiv">ReferredOn</span>
    {{referredOn}}</td>
       <td>
      <span class="lable_mobileDiv"></span>
      <a href="javascript:void(0)" class="viewSubReferee" onclick="viewSubereferreals('{{refereeId}}')">{{refereeName}} </a>

  </td>
    
  </tr>
  <tr class="divBlock_Mob_001 solidToggle_{{refereeId}}">
    <td style="display:none;" colspan="14" class="viewQueryadmin  viewSubquery-{{refereeId}}">
      <div class="col-md-6 pull-right">
        <div class="interstedPagination1 pull-right">
          <ul class="pagination bootpag">
          </ul>
        </div>
      </div>
      
      <table class="table table-bordered table-hover" >
        <thead class="mobileDiv_4">
          <tr style="background-color: #ADD8E6; border: 1px solid lightgrey;"> 
           
                  <th>User Name</th>
                  <th>Email</th>
                  <th>MobileNumber</th>
                  <th>Status </th>
                  <th>Referred On</th>
              
          </tr>
        </thead>
        <tbody id="displayUserQuery-{{refereeId}}" class="mobileDiv_3">

       <tr class="viewQueryAdminComments" style='display:none;'>
        <td class="nodataFound col-md-8">
          No Data Found
        </td>

       </tr>

        </tbody>
        </tfoot>
      </table>
    </td>
  </tr> 
  {{/data}}
  </script>
 <script type="text/javascript">
$(document).ready(function() {
    lenderreferrerinfo();
});
 </script>



 <script id="viewgetSubreferreeUser" type="text/template">
     {{#data}}
  <tr class="divBlock_Mob_001">
    <td>
      <span class="lable_mobileDiv">Referee Name</span>
    {{refereeName}}</td>
    <td>
      <span class="lable_mobileDiv">Email</span>
    {{refereeEmail}}</td>
    <td>
      <span class="lable_mobileDiv">Mobile</span>
    {{refereeMobileNumber}}</td>
    <td>
      <span class="lable_mobileDiv">Status</span>
    {{status}}</td>
    <td>
      <span class="lable_mobileDiv">ReferredOn</span>
    {{referredOn}}</td>
  </tr>
 
  {{/data}}
  </script>
 <script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
 <?php include 'footer.php';?>