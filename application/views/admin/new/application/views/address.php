 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             Address Details
             <small>Your Address information</small>
         </h1>
         <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
             <li class="active">Myprofile
             </li>
         </ol>
     </section>
     <!-- Main content -->
     <section class="content">
         <div class="row">
             <div class="col-xs-12">
                 <div class="box">
                     <div class="box-header">

                     </div>
                     <!-- /.box-header -->
                     <div class="box-body table-responsive no-padding">

                         <div class="col-xs-1"></div>
                         <form autocomplete="off" id="addressdetaisSection">
                             <div class="col-xs-10">

                                 <div class="form-group row">
                                     <h2>Add Your Permanent Address Details </h2>

                                     <div class="col-sm-10">
                                         <input type="text" class="permanent" value="PERMANENT" style="display: none;">
                                     </div>
                                 </div>
                                 <!-- permanent  -->
                                 <div class="permanent-Block">
                                     <div class="form-group row">
                                         <label for="housenumber " class="col-sm-2 col-form-label">House Number</label>
                                         <div class="col-sm-10">
                                             <span class="displaypermanentNum udisplaysec1"></span>
                                             <input type="text" name="permanent_housenumber"
                                                 class="form-control permanent_housenumberValue"
                                                 placeholder="Enter your permanent_housenumber"
                                                 id="permanent_housenumber" data validation="permanent_housenumber">
                                             <span class="error permanent_housenumberError "
                                                 style="display: none;">Please enter your house number</span>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="street " class="col-sm-2 col-form-label"> Street </label>
                                         <div class="col-sm-10">
                                             <span class="displaypermanentstreet udisplaysec1"></span>
                                             <textarea type="text" class="form-control permanent_streetValue"
                                                 name="street" placeholder="Enter your permanent_street"
                                                 id="permanent_street" data validation="permanent_street"></textarea>
                                             <span class="error permanent_streetError" style="display: none;">Please
                                                 enter your street</span>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="area" class="col-sm-2 col-form-label">Area</label>
                                         <div class="col-sm-10">
                                             <span class="displaypermanentarea udisplaysec1"></span>
                                             <textarea type="text" class="form-control permanent_areaValue "
                                                 placeholder="Enter your  area" name="permanent_area"
                                                 id="permanent_area" data validation="area"></textarea>
                                             <span class="error permanent_areaError" style="display: none;">Please enter
                                                 your area</span>
                                         </div>
                                     </div>

                                     <div class="form-group row">
                                         <label for="city" class="col-sm-2 col-form-label">City</label>
                                         <div class="col-sm-10">
                                             <span class="displaypermanentcity udisplaysec1"></span>
                                             <input type="text" class="form-control permanent_cityValue"
                                                 placeholder="Enter your city" name="permanent_city" id="permanent_city"
                                                 data validation="permanent_city">
                                             <span class="error permanent_cityError" style="display: none;">Please enter
                                                 your city</span>
                                         </div>
                                     </div>

                                     <p align="right">
                                         <button type="button" class="btn btn-sm btn-primary" id="address1-submit-btn">
                                             Submit</button>

                                         <button type="button" class="btn btn-info btn-sm" id="address1-edit-btn">
                                             <span class="glyphicon glyphicon-pencil"></span> Edit
                                         </button>
                                     </p>
                                     </br>
                                 </div>
                                 <!-- permanent Div close -->

                                 <div class="row">
                                     <div class="col-xs-12">
                                         <div class="box">
                                             <div class="box-header">

                                             </div>
                                             <div class="form-group row">
                                                 <div>
                                                     <h2>Add Your Present Address Details </h2>
                                                     <a class="pull-right sameasAbove" href="javascript:void(0)">
                                                         <h4> Same as above </h4>
                                                     </a>
                                                 </div>
                                                 <div class="col-sm-10">
                                                     <input type="text" value="PRESENT" style="display: none;">
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="housenumber " class="col-sm-2 col-form-label">House
                                                     Number</label>
                                                 <div class="col-sm-10">
                                                     <span class="displaypresenthousenumber udisplaysec2"></span>
                                                     <input type="text" name="present_housenumber"
                                                         class="form-control present_housenumberValue"
                                                         placeholder="Enter your present_housenumber"
                                                         id="present_housenumber" data validation="present_housenumber">
                                                     <span class="error present_housenumberError "
                                                         style="display: none;">Please enter your house number</span>
                                                 </div>
                                             </div>
                                             <div class="form-group row">
                                                 <label for="street " class="col-sm-2 col-form-label"> Street </label>
                                                 <div class="col-sm-10">
                                                     <span class="displaypresentstreet udisplaysec2"></span>
                                                     <textarea type="text" class="form-control present_streetValue"
                                                         name="present_street" placeholder="Enter your street"
                                                         id="present_street" data
                                                         validation="present_street"></textarea>
                                                     <span class="error present_streetError"
                                                         style="display: none;">Please enter your street</span>
                                                 </div>
                                             </div>
                                             <div class="form-group row">
                                                 <label for="area" class="col-sm-2 col-form-label">Area</label>
                                                 <div class="col-sm-10">
                                                     <span class="displaypresentarea udisplaysec2"></span>
                                                     <textarea type="text" class="form-control present_areaValue "
                                                         placeholder="Enter your  area" name="present_area"
                                                         id="present_area" data validation="present_area"></textarea>
                                                     <span class="error present_areaError" style="display: none;">Please
                                                         enter your area</span>
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="city" class="col-sm-2 col-form-label">City</label>
                                                 <div class="col-sm-10">
                                                     <span class="displaypresentcity udisplaysec2"></span>
                                                     <input type="text" class="form-control present_cityValue"
                                                         placeholder="Enter your city" name="present_city"
                                                         id="present_city" data validation="present_city">
                                                     <span class="error present_cityError" style="display: none;">Please
                                                         enter your city</span>
                                                 </div>
                                             </div>

                                             <p align="right">
                                                 <button type="button" class="btn btn-sm btn-primary"
                                                     id="address2-submit-btn"> Submit</button>
                                                 <button type="button" class="btn btn-info btn-sm"
                                                     id="address2-edit-btn">
                                                     <span class="glyphicon glyphicon-pencil"></span> Edit
                                                 </button>
                                             </p>
                                             </br>

                                             <div class="row">
                                                 <div class="col-xs-12">
                                                     <div class="box">
                                                         <div class="box-header">

                                                         </div>
                                                         <div class="form-group row">
                                                             <h2>Add Your Office Address Details </h2>
                                                             <div class="col-sm-10">
                                                                 <input type="text" value="OFFICE"
                                                                     style="display: none;">
                                                             </div>
                                                         </div>

                                                         <div class="form-group row">
                                                             <label for="housenumber "
                                                                 class="col-sm-2 col-form-label">Office Plot
                                                                 Number</label>
                                                             <div class="col-sm-10">
                                                                 <span
                                                                     class="displayofficehousenumber udisplaysec3"></span>
                                                                 <input type="text" name="office_housenumber"
                                                                     class="form-control office_housenumberValue"
                                                                     placeholder="Enter your office plot number"
                                                                     id="office_housenumber" data
                                                                     validation="office_housenumber">
                                                                 <span class="error office_housenumberError "
                                                                     style="display: none;">Please enter your office
                                                                     plot number</span>
                                                             </div>
                                                         </div>
                                                         <div class="form-group row">
                                                             <label for="street " class="col-sm-2 col-form-label">
                                                                 Street </label>
                                                             <div class="col-sm-10">
                                                                 <span class="displayofficestreet udisplaysec3"></span>
                                                                 <textarea type="text"
                                                                     class="form-control office_streetValue"
                                                                     name="office_street"
                                                                     placeholder="Enter your street" id="office_street"
                                                                     data validation="office_street"></textarea>
                                                                 <span class="error office_streetError"
                                                                     style="display: none;">Please enter your
                                                                     street</span>
                                                             </div>
                                                         </div>
                                                         <div class="form-group row">
                                                             <label for="area"
                                                                 class="col-sm-2 col-form-label">Area</label>
                                                             <div class="col-sm-10">
                                                                 <span class="displayofficearea udisplaysec3"></span>
                                                                 <textarea type="text"
                                                                     class="form-control office_areaValue "
                                                                     placeholder="Enter your  area" name="office_area"
                                                                     id="office_area" data
                                                                     validation="office_area"></textarea>
                                                                 <span class="error office_areaError"
                                                                     style="display: none;">Please enter your
                                                                     area</span>
                                                             </div>
                                                         </div>

                                                         <div class="form-group row">
                                                             <label for="city"
                                                                 class="col-sm-2 col-form-label">City</label>
                                                             <div class="col-sm-10">
                                                                 <span class="displayofficecity udisplaysec3"></span>
                                                                 <input type="text"
                                                                     class="form-control office_cityValue"
                                                                     placeholder="Enter your city" name="office_city"
                                                                     id="office_city" data validation="office_city">
                                                                 <span class="error office_cityError"
                                                                     style="display: none;">Please enter your
                                                                     city</span>
                                                             </div>
                                                         </div>

                                                         <p align="right">
                                                             <button type="button" class="btn btn-sm btn-primary"
                                                                 id="address3-submit-btn"> Submit</button>
                                                             <button type="button" class="btn btn-info btn-sm"
                                                                 id="address3-edit-btn">
                                                                 <span class="glyphicon glyphicon-pencil"></span> Edit
                                                             </button>
                                                         </p>
                                                         </center>
                                                         </br>
                                                     </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
 </div>
 </div>
 <div class="col-xs-1"></div>
 </div>
 <!-- /.box-body -->
 </div>
 <!-- /.box -->
 </div>
 </div>
 </section>
 <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 <div class="modal modal-success fade" id="modal-address1Success">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Thanks!</h4>
             </div>
             <div class="modal-body">
                 <p>Your Permanent Address Details have successfully entered.</p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>



 <div class="modal modal-success fade" id="modal-address2Success">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Thanks!</h4>
             </div>
             <div class="modal-body">
                 <p>Your Present Address Details have successfully entered.</p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>


 <div class="modal modal-success fade" id="modal-address3Success">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Thanks!</h4>
             </div>
             <div class="modal-body">
                 <p>Your Office Address Details have successfully entered.</p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>


 <div class="modal modal-danger fade" id="modal-address-error">

     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title"></h4>
             </div>
             <div class="modal-body">
                 <p>Please Enter Valid Address Details. </p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>




 <script type="text/javascript">
loadaddressDetails();
 </script>

 <?php include 'footer.php';?>