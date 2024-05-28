<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Expired Borrower Loan Applications
        </h1>
    </section><br />

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="userName">Name</option>
                    <option value="borrowerID">Borrower ID</option>
                    <option value="roi">ROI</option>
                    <option value="amount">Amount</option>
                    <option value="amount&city">Amount&city</option>
                    <option value="city">City</option>
                    <option value="mobileNumber">Mobile Number</option>

                </select>
                <span class="errorsearch" style="display: none;">Please choose option.</span>
            </div>

            <div class="col-xs-3 text-center loanid" style="display: none;">
                <input type="text" name="loanid" class="form-control loanid" placeholder="Loan ID">
            </div>

            <div class="col-xs-3 text-center userName" style="display: none;">
                <input type="text" name="userName" class="form-control userName" placeholder="Borrower Name">
            </div>

            <div class="col-xs-2 text-center city" style="display: none;">
                <!--  <input type="text" name="city" class="form-control city cityInputs autocomplete" placeholder="City"> -->
                <select class="form-control" name="city" id="cityValue" class="form-control city">
                    <option value=""> Select City</option>
                    <option value="Hyderabad">Hyderabad</option>
                    <option value="Bangalore">Bangalore</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Chennai">Chennai</option>
                    <option value="Pune">Pune</option>
                    <option value="Visakhapatnam">Visakhapatnam</option>
                    <option value="Vijayawada">Vijayawada</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="col-xs-3 text-center applicationid" style="display: none;">
                <input type="text" name="applicationid" class="form-control applicationid" placeholder="Application ID">
            </div>

            <div class="col-xs-3 text-center lenderid" style="display: none;">
                <input type="text" name="lenderid" class="form-control lenderid" placeholder="Lender ID">
            </div>

            <div class="col-xs-3 text-center borrowerid" style="display: none;">
                <input type="text" name="borrowerid" class="form-control borrowerid" placeholder="Borrower ID">
            </div>

            <div class="col-xs-2 text-center amount" style="display: none;">
                <input type="text" name="amount" class="form-control minAmount" placeholder="Min Amount">
            </div>

            <div class="col-xs-2 text-center amount" style="display: none;">
                <input type="text" name="amount" class="form-control maxAmount" placeholder="Max Amount">
            </div>

            <div class="col-xs-3 text-center roi" style="display: none;">
                <input type="text" name="ROI" class="form-control minRoi" placeholder="Min ROI">
            </div>

            <div class="col-xs-3 text-center roi" style="display: none;">
                <input type="text" name="ROI" class="form-control maxRoi" placeholder="Max ROI">
            </div>

            <div class="col-xs-3 text-center mobileNumber" style="display: none;">
                <input type="text" name="mobileNumber" class="form-control mobileNumber" placeholder="mobileNumber">
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
                            <h3 class="box-title">Borrower info</h3>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="dashBoardPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                            <div class="searchborrowerPagination pull-right" style="display: none;">
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
                                    <th>Borrower Id</th>
                                    <th>Regd Date & Exp Date</th>
                                    <th>Name & Mobile</th>
                                    <th>Email & Address</th>
                                    <th>City</th>
                                    <th>Utm source</th>
                                    <th>Amount & ROI</th>
                                    <th>View Documents</th>
                                    <th>Comments</th>
                                    <th>Oxy Score</th>


                                </tr>
                            </thead>
                            <tbody id="loadBorrowersList">


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

<script id="loadBorrowersListTpl" type="text/template">
    {{#data}}
      <tr>
       <td>BR{{borrowerUser.id}}<br/><br/><b>Status</b>: {{borrowerUser.status}}</td>
        <td><b>Regd Date</b>:- {{loanRequestedDate}}<br/>
            <b>Exp Date</b>:- {{expectedDate}}
        </td>
        <td>{{user.firstName}} {{user.lastName}}&nbsp; <br/>{{user.mobileNumber}}</td>
        <td>{{user.email}} <br/> {{user.address}} <br/>{{user.pinCode}}  <br/> {{user.state}} <br/></td>
         <td><b>{{borrowerUser.city}}</b> 
         </td>
         <td><b>{{user.utmSource}}</b></td>
        <td>INR <span>{{loanRequestAmount}}</span><br/>{{rateOfInterest}}% PA</td>
        

        <td class="user-ViewDocs{{borrowerUser.id}}">
            <a style="display:none" href="javascript:void(0)"  class="viewPan showPAN" onclick="viewDoc({{borrowerUser.id}}, 'PAN')">PAN</a>
         
            <a style="display:none" href="javascript:void(0)"  class="viewAADHAR showAADHAR" onclick="viewDoc({{borrowerUser.id}}, 'AADHAR')" >AADHAR</a>
           
             <a style="display:none" href="javascript:void(0)"  class="viewPASSPORT   showPASSPORT" onclick="viewDoc({{borrowerUser.id}},'PASSPORT')" >Passport</a>
         
             <a style="display:none" href="javascript:void(0)"  class="viewBANKSTATEMENT  showBANKSTATEMENT" onclick="viewDoc({{borrowerUser.id}}, 'BANKSTATEMENT')"  >Bank Statement</a> 
          
            <a style="display:none" href="javascript:void(0)"  class="viewCONTACTS   showCONTACTS" onclick="viewDoc({{borrowerUser.id}}, 'CONTACTS')"  >Contacts<br/></a>

            <a style="display:none" href="javascript:void(0)"  class="viewPAYSLIPS  showPAYSLIPS" onclick="viewDoc({{borrowerUser.id}}, 'PAYSLIPS')"  >PAYSLIPS</a>

            <a style="display:none" href="javascript:void(0)"  class="viewDRIVINGLICENCE  showDRIVINGLICENCE" onclick="viewDoc({{borrowerUser.id}}, 'DRIVINGLICENCE')">DRIVING LICENCE</a>

            <a style="display:none" href="javascript:void(0)" class="viewVOTERID  showVOTERID "onclick="viewDoc({{borrowerUser.id}}, 'VOTERID')" >VOTERID</a>
          
        </td>
     
        <td><span class="updateComments updateComments-{{loanRequestId}}" data-currComment="{{comments}}" data-loanid="{{loanRequestId}}" >
        <button data-toggle="collapse" data-target="#demo-{{borrowerUser.id}}" class="btn btn-danger btn-xs">Click here to view the comments</button>
                     
          <p id="demo-{{borrowerUser.id}}" class="collapse" class="mytextCheck displayingComments"  style="width:200px;">

            <b>Admin Comments</b><br/><br/>
            Location: {{borrowerCommentsDetails.location}}<br/>
            Residence Address : {{borrowerCommentsDetails.locationResidence}}<br/>
            Company Name: {{borrowerCommentsDetails.companyName}}<br/>
            Company Address : {{borrowerCommentsDetails.companyResidence}}<br/>
            Role : {{borrowerCommentsDetails.role}}<br/>
            Loan Requirement: {{borrowerCommentsDetails.loanRequirement}}<br/>
            Salary : {{borrowerCommentsDetails.salary}}<br/>
            Loan Eligibility: {{borrowerCommentsDetails.eligibility}}<br/>
            Current EMIs: {{borrowerCommentsDetails.emi}}<br/>
            
            PAN Password: {{borrowerCommentsDetails.panPassword}}<br/>
            Payslips Password: {{borrowerCommentsDetails.payslipsPassword}}<br/>
            Aadhar Password: {{borrowerCommentsDetails.aadharPassword}}<br/>
            Bank Password: {{borrowerCommentsDetails.bankPassword}}<br/>
            Cibil Password: {{borrowerCommentsDetails.cibilPassword}}<br/>
            Comments: {{borrowerCommentsDetails.comments}}<br/>

            <b>Commets Section Before Nov 25th 2020:-</b>
            {{comments}}
          </p>
        </td>
         

        <!-- <td><span class="oxyscoresampleClick" onclick="oxyscore({{userDisplayId}})" data-currComment="{{oxyscore}}" data-userid="{{userDisplayId}}">{{user.oxyScore}}&nbsp;</span></td> -->
         
         <td>{{user.oxyScore}}</td>
      

       
   


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



<div class="modal modal-warning fade" id="modal-approveuserKycNotUploaded">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">oops!</h4>
            </div>
            <div class="modal-body">
                Please ask user to upload his/her userkyc documents.
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



<div class="modal modal-success fade" id="modal-useractivate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                User activation successful,now user is in L1 state.
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
<div class="modal modal-warning fade" id="modal-notuploadeddocs">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                User Details and Documents not given.Please ask to fill all details.
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
window.onload = loadExpiredBorrowerApplications();
$(document).ready(function() {
    console.log('you are in admin and at borrower apps');
});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<?php include 'admin_footer.php';?>