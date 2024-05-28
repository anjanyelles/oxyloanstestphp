 <?php include 'partner_header.php';?>
 <?php include 'partner_sidebar.php';?>

 <div class="content-wrapper">
     <section class="content-header">
         <h1>
             Reset Credentials
         </h1>
     </section>
     <div class="cls"></div>
     </br>
     </br>
     <section class="content">
         <div class="cls"></div>

         <div class="row customFormQ">
             <div class="cls"></div>
             <!-- left column -->
             <div class="col-md-12">
                 <!-- general form elements -->
                 <div class="box box-primary">
                     <div class="box-header">
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
                         <div class="form-group row">
                             <label for="name " class="col-sm-3 col-form-label ">Utm name <em class="error">*</em>
                                 :</label>
                             <div class="col-sm-3">
                                 <input type="text" name="utmPartnerName" class="form-control utmPartnerName"
                                     placeholder="Enter The Utm Name" required="required" readonly />
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="name " class="col-sm-3 col-form-label ">Password<em class="error">*</em>
                                 :</label>
                             <div class="col-sm-3">
                                 <input type="text" name="partnerPassword" class="form-control partnerPassword"
                                     placeholder="Enter The Reset Password" required="required" />
                             </div>
                         </div>
                         <div class="row">
                             <label for="duration" class="col-sm-3 col-form-label"></label>
                             <div class="col-sm-2">
                                 <button type="button" class="btn btn-lg btn-primary pull-right"
                                     onclick="resetPartnerCredentials();">Submit</button>

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
     </section>
 </div>
 <div class="modal modal-success fade" id="modal-partner-credentials-reset">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Thanks!</h4>
             </div>
             <div class="modal-body">
                 <p>Your are successfully reseted the credentials</br>
                     please wait for 2s page will refresh automatically</p>
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
 <script type="text/javascript">
window.onload = updateEmailMobile();
window.onload = checkuserTypeBeforeLoad();
 </script>

 <script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
 <?php include 'partner_footer.php';?>