<?php include 'admin_header.php';?>
<?php include 'admin_helpdesksidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
//echo $urlfromBroweser;
$requestidFromClick =  $_GET['getfornotifications'];
//$receivedEmailToken = $_GET['emailToken'];
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Borrower Loan Applications
        </h1>
    </section><br />
    <!-- Main content -->
    <section class="content">
        <span class="requestidFromClick hide"><?php echo $requestidFromClick; ?></span>
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
                    <option value="oxyscore">Oxyscore</option>
                    <option value="utm">UTM</option>
                    <option value="utm&amount">UTM&Amount</option>
                    <option value="utm&city">UTM&city</option>
                    <option value="panumber">Pan Number</option>
                </select>
                <span class="errorsearch" style="display: none;">Please choose option.</span>
            </div>

            <div class="col-xs-3 text-center loanid" style="display: none;">
                <input type="text" name="loanid" class="form-control loanid" placeholder="Loan ID">
            </div>

            <div class="col-xs-2 text-center utm" style="display: none;">
                <select class="form-control " id="utmValue">
                    <option value="">-- Choose UTM --</option>
                </select>
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
            <div class="col-xs-3 text-center oxyscore" style="display: none;">
                <input type="text" name="oxyscore" class="form-control oxyscore" placeholder="Oxyscore">
            </div>
            <div class="col-xs-3 text-center panNumber" style="display: none;">
                <input type="text" name="panNumber" class="form-control panNumber" placeholder="Pan Number">
            </div>
            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn"
                    onclick="searchUsersPhase1('BORROWER');"><i class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Borrower info</h3><br>
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="displayUTMResults" style="display: none;">
                                        <span><b>UTM :</b></span> <span class="utnNameV"></span><br />
                                        <span><b>Count :</b></span> <span class="totalutm"></span><br />
                                        <button class="btn btn-sm btn-info" onclick="downloadUtmUsers('BORROWER');"> <i
                                                class="fa fa-download"></i>
                                            Download Utm Users
                                        </button>
                                    </h4>

                                </div>
                            </div>
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
                    <div class="box-body" style="overflow-x: auto;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    <th>Borrower Info</th>
                                    <!--  <th>Regd Date & Exp Date</th> -->
                                    <th>Name & Mobile</th>
                                    <th>Email & Address</th>
                                    <th>Amount & ROI</th>
                                    <th>View Documents</th>
                                    <th>Comments</th>
                                    <th>Change Role & User Status</th>

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
    <td>BR{{borrowerUser.id}}<br/>
      <br/><b>Status</b>: {{borrowerUser.status}}<br/>
      
      <span class="referredBy-{{referredBy}}">
        <b>Referred By</b>: {{referredBy}}
      </span><br/>

      <b>Regd Date</b>:- {{loanRequestedDate}}<br/>
      <b>Exp Date</b>:- {{expectedDate}}
      
      <br/><br/>
      <b>CIF NO : 
        {{cifNumber}}
     

      </b>
      <br/><br/>
      
      <b>Fino Employee NO : 
       
         {{finoEmployeeMobileNumber}}
         


      </b>


    </td>
 <!--    <td><b>Regd Date</b>:- {{loanRequestedDate}}<br/>
      <b>Exp Date</b>:- {{expectedDate}}
      
      <br/><br/>
      <b>CIF NO : {{cifNumber}}</b>
      <br/><br/>
      
      <b>Fino Employee NO : {{finoEmployeeMobileNumber}}</b>
     

    </td> -->
    <td>{{user.firstName}} {{user.lastName}}&nbsp; <br/>{{user.mobileNumber}}<br/>
      {{borrowerUser.city}}
      <br/><br/>
      <b>UTM SOURCE </b>{{user.utmSource}}
      <br/><br/>
      <b>OXY SCORE </b>{{user.oxyScore}}
      <br/><br/>
      <b>PAN NUMBER </b>{{user.panNumber}}
      <br/><br/>
      <b>DOB:</b> {{user.dob}}
      <br/><br/>
      <b>Van NO: {{user.vanNumber}}</b>
   
      
       
    </td>
    
    <td>{{user.email}} <br/> {{user.address}} <br/>{{user.pinCode}}  <br/> {{user.state}} <br/>
      <br/><br/>
      <b>Bank Account Details</b><br/>
      {{borrowerUser.userNameAccordingToBank}}<br/>
      {{borrowerUser.accountNumber}}<br/>
      {{borrowerUser.ifscCode}}<br/>
      {{borrowerUser.branchName}}<br/>
    </td>
    
    <td>INR <span>{{loanRequestAmount}}</span><br/>{{rateOfInterest}}% Monthly
    
  </td>
  
  <td class="col-md-1 user-ViewDocs{{borrowerUser.id}}">
    <a rel='{{borrowerUser.id}}' style="display:none" href="javascript:void(0)"  class="relbtn viewPan showPAN" onclick="viewDoc({{borrowerUser.id}}, 'PAN')">PAN</a>
    
    <a rel='{{borrowerUser.id}}' style="display:none" href="javascript:void(0)"  class="relbtn viewAADHAR showAADHAR" onclick="viewDoc({{borrowerUser.id}}, 'AADHAR')" >AADHAR</a>
    <a rel='{{borrowerUser.id}}' style="display:none" href="javascript:void(0)"  class="relbtn viewPASSPORT   showPASSPORT" onclick="viewDoc({{borrowerUser.id}},'PASSPORT')" >Passport</a>
    
    <a rel='{{borrowerUser.id}}' style="display:none" href="javascript:void(0)"  class="relbtn viewBANKSTATEMENT  showBANKSTATEMENT" onclick="viewDoc({{borrowerUser.id}}, 'BANKSTATEMENT')"  >Bank Statement</a>
    
    <a rel='{{borrowerUser.id}}' style="display:none" href="javascript:void(0)"  class="relbtn vviewCONTACTS   showCONTACTS" onclick="viewDoc({{borrowerUser.id}}, 'CONTACTS')"  >Contacts<br/></a>
    <a rel='{{borrowerUser.id}}' style="display:none" href="javascript:void(0)"  class="relbtn viewPAYSLIPS  showPAYSLIPS" onclick="viewDoc({{borrowerUser.id}}, 'PAYSLIPS')"  >PAYSLIPS</a>
    <a rel='{{borrowerUser.id}}' style="display:none" href="javascript:void(0)"  class="relbtn viewDRIVINGLICENCE  showDRIVINGLICENCE" onclick="viewDoc({{borrowerUser.id}}, 'DRIVINGLICENCE')">DRIVING LICENCE</a>
    <a rel='{{borrowerUser.id}}' style="display:none" href="javascript:void(0)"  class="relbtn viewCHEQUELEAF  showCHEQUELEAF" onclick="viewDoc({{borrowerUser.id}}, 'CHEQUELEAF')">CHEQUELEAF</a>
    <a rel={{borrowerUser.id}}' style="display:none" href="javascript:void(0)" class="relbtn viewVOTERID  showVOTERID" onclick="viewDoc({{borrowerUser.id}}, 'VOTERID')" >VOTERID</a>
    <a rel={{borrowerUser.id}}' style="display:none" href="javascript:void(0)" class="relbtn viewEXPERIAN  showEXPERIAN" onclick="viewDoc({{borrowerUser.id}}, 'EXPERIAN')" >EXPERIAN</a>
    <a rel={{borrowerUser.id}}' style="display:none" href="javascript:void(0)" class="relbtn viewCIBILSCORE  showCIBILSCORE" onclick="viewDoc({{borrowerUser.id}}, 'CIBILSCORE')" >CIBILSCORE</a>



     <a rel={{borrowerUser.id}}' style="display:none" href="javascript:void(0)" class="relbtn viewCOMPANYPAN  showCOMPANYPAN" onclick="viewDoc({{borrowerUser.id}}, 'COMPANYPAN')" >COMPANYPAN</a>

      <a rel={{borrowerUser.id}}' style="display:none" href="javascript:void(0)" class="relbtn viewMEMORANDUMOFASSOCIATION  showMEMORANDUMOFASSOCIATION" onclick="viewDoc({{borrowerUser.id}}, 'MEMORANDUMOFASSOCIATION')" >MEMORANDUMOFASSOCIATION</a>

       <a rel={{borrowerUser.id}}' style="display:none" href="javascript:void(0)" class="relbtn viewCERTIFICATEOFINSURANCE  showCERTIFICATEOFINSURANCE" onclick="viewDoc({{borrowerUser.id}}, 'CERTIFICATEOFINSURANCE')" >CERTIFICATEOFINSURANCE</a>

        <a rel={{borrowerUser.id}}' style="display:none" href="javascript:void(0)" class="relbtn viewGST  showGST" onclick="viewDoc({{borrowerUser.id}}, 'GST')" >GST</a>

         <a rel={{borrowerUser.id}}' style="display:none" href="javascript:void(0)" class="relbtn viewTAN  showTAN" onclick="viewDoc({{borrowerUser.id}}, 'TAN')" >TAN</a>

          <a rel={{borrowerUser.id}}' style="display:none" href="javascript:void(0)" class="relbtn viewCOMPANYBANKSTMT  showCOMPANYBANKSTMT" onclick="viewDoc({{borrowerUser.id}}, 'COMPANYBANKSTMT')" >COMPANYBANKSTMT</a>
          
           <a rel={{borrowerUser.id}}' style="display:none" href="javascript:void(0)" class="relbtn viewAOI  showAOI" onclick="viewDoc({{borrowerUser.id}}, 'AOI')" >AOI</a>  </br>

           
      
              {{#driveLink}}
              {{#driveLink}}
             <a href="{{driveLink}} class="getDealerDocs" target="_blank"<button class="viewCompanyDoc  btn btn-sm btn-success" >view Dealer documents</button></a>
            {{/driveLink}}
            {{^driveLink}}
   
            {{/driveLink}}
             {{/driveLink}}


    
  </td>
  
  <td>
    <button type="button" class="btn btn-danger pull-left btn-xs sendbtn{{loanRequestId}}  updateComments-{{loanRequestId}}" onclick="admincomments({{loanRequestId}})"
    data-location="{{borrowerCommentsDetails.location}}"
    data-aadharPassword="{{borrowerCommentsDetails.aadharPassword}}"
    data-bankPassword="{{borrowerCommentsDetails.bankPassword}}"
    data-cibilPassword="{{borrowerCommentsDetails.cibilPassword}}"
    data-comments="{{borrowerCommentsDetails.comments}}"
    data-companyName="{{borrowerCommentsDetails.companyName}}"
    data-companyResidence="{{borrowerCommentsDetails.companyResidence}}"
    data-eligibility="{{borrowerCommentsDetails.eligibility}}"
    data-emi="{{borrowerCommentsDetails.emi}}"
    data-loanRequirement="{{borrowerCommentsDetails.loanRequirement}}"
    data-locationResidence="{{borrowerCommentsDetails.locationResidence}}"
    data-panPassword="{{borrowerCommentsDetails.panPassword}}"
    data-payslipsPassword="{{borrowerCommentsDetails.payslipsPassword}}"
    data-role="{{borrowerCommentsDetails.role}}"
    data-salary="{{borrowerCommentsDetails.salary}}"
    
    data-currComment="{{comments}}" > <b>Comments By Admin</b></button><br/><br/>
    
    <button type="button" class="btn btn-info pull-left btn-xs  updateComments-{{loanRequestId}}" onclick="UpdateCibil({{borrowerUser.id}})" > <b>Upload Cibil</b></button><br/><br/>
    
    <!-- <button type="button" class="btn btn-info pull-left btn-xs  updateComments-{{loanRequestId}}" onclick="UpdateExperian({{borrowerUser.id}})" > <b>Upload Experian</b></button><br/><br/> -->
    
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
      <!--  <b>Commets Section Before Nov 25th 2020:-</b>
      {{comments}} -->
    </p>
  </td>
  
  <!--
  <span class="updateComments-{{loanRequestId}}" data-currComment="{{comments}}" data-loanid="{{loanRequestId}}"
  >{{comments}}&nbsp;</span>
  onclick="updateComments({{loanRequestId}});"-->
  
  <!-- <td><span class="oxyscoresampleClick" onclick="oxyscore({{userDisplayId}})" data-currComment="{{oxyscore}}" data-userid="{{userDisplayId}}">{{user.oxyScore}}&nbsp;</span></td> -->
  <td>
    <button type="button" class="btn btn-warning pull-left btn-xs" onclick="changePrimarytype('LENDER',{{borrowerUser.id}})" data-reqid = "{{borrowerUser.id}}" > <b>Change to Lender</b></button>
    <br><br>
    <button type="button" class="btn btn-success pull-left btn-xs btn-{{user.adminComments}}" id={{borrowerUser.id}} onclick="userIntrested('BORROWER',{{borrowerUser.id}},'{{user.adminComments}}')" data-reqid = "{{borrowerUser.id}}"> <b>Interested</b></button>
    <br><br>
    <button type="button" class="btn btn-info pull-left btn-xs"  onclick="viewExperianReport({{borrowerUser.id}})"data-clickedID= "{{borrowerUser.id}}"> <b>View Experian Report</b></button>

    <br><br>
  
  </td>
  
  <!--   <td>
    <a href="javascript:void(0)" onclick="updateUserStatus({{user.id}},'{{user.status}}');">
      <button  class="btn btn-warning btn-xs user{{user.status}}">
      Approve User</button>
    </a>
  </td> -->
</tr>
{{/data}}
</script>
<div class="modal  fade" id="modal-experianReport">
    <div class="modal-dialog">
        <div class="modal-content offer_popup">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Experian Summary Report</h4>
            </div>
            <div class="modal-body">


                <div class="row">
                    <div class="col-sm-6 salary_profile">
                        <label for=""> Active Credit Accounts:</label>
                        <span id="creditAccountActive"></span>
                    </div>
                    <div class="col-sm-6 salary_profile">
                        <label for=""> Closed Credit Accounts:</label>
                        <span id="creditAccountClosed"></span>
                    </div>
                </div>
                <div class=" row">
                    <div class="col-sm-6 salary_profile">
                        <label for=""> Total Credit Accounts:</label>
                        <span id="creditAccountTotal"></span>
                    </div>
                    <div class="col-sm-6 salary_profile">
                        <label for="">utstanding Balance All:</label>
                        <span id="outstandingBalanceAll"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 salary_profile">
                        <label for="">Outstanding Balance Secured:</label>
                        <span id="outstandingBalanceSecured"></span>
                    </div>
                    <div class="col-sm-6 salary_profile ">
                        <label for=""> Outstanding Balance UnSecured: </label>
                        <span id="outstandingBalanceUnSecured"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 salary_profile">
                        <label for="">Score</label>
                        <span id="score"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
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
                Comments are saved successfully.
                <br /><br />
                Page will refresh in 2 sec.
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
<div class="modal  fade" id="modal-riskCalculation">
    <div class="modal-dialog">
        <div class="modal-content offer_popup">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <h3> Profile Details</h3>

                <div class="row">
                    <div class="col-sm-6 salary_profile p-24">
                        <label for=" Salary/Income"> Salary/Income:</label>
                        <span id="diaplaySalary"></span>
                        <span id="diaplayIncome"></span>
                    </div>
                    <div class="col-sm-6 salary_profile">
                        <label for="Organization found/Experiance"> Organization found/Experiance:</label>
                        <span id="diaplayExperiance"></span>
                        <span id="diaplayOrganizationfound"></span>
                    </div>
                </div>
                <div class=" row">
                    <div class="col-sm-6 salary_profile p-24">
                        <label for="Organization/Companey"> Organization/Company:</label>
                        <span id="diaplayCompaney"></span>
                        <span id="diaplayOrganization"></span>
                    </div>
                    <div class="col-sm-6 salary_profile">
                        <label for="Experian Score"> Experian Score:</label>
                        <span id="diaplayScore"></span>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <div align="right">
                    <!--  <button type="button" class="btn  btn-primary btn-sm riskCalculationBtn"  data-clickedid="">calculate</button> -->
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-interested-borrower" tabindex="-1" role="dialog"
    aria-labelledby="modal-interested-borrower" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure ?</h4>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success userInterestedBtn " data-reqID=""
                    onclick="borrowerInteresteduser();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-warning fade" id="modal-usernothaveexperianscore">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text"> User don't have experian.</p>
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
<div class="modal fade" id="modal-borrower-update" tabindex="-1" role="dialog" aria-labelledby="modal-borrower-update"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure, you want to give the comments? </h4>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-success AdminCommentsscoreBtn" data-dismiss="modal"
                    data-clickedid="" onclick="admincomments();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<!-- Admin Comments Form Starts -->
<div class="modal  fade" id="modal-admincomment">
    <div class="modal-dialog">
        <div class="modal-content offer_popup">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Admin Comments</h4>
            </div>
            <div class="modal-body">

                <div class="offer_popup_cont clearfix">


                    <div class="statepin clearfix">
                        <label>Location :</label>
                        <div class="fld-block">
                            <input type="text" name="location" class="form-control" id="Location">

                            <div class="clear"></div>
                        </div>
                        <span class="error LocationError" style="display: none;">Please Enter The Location</span>
                        <div class="clear"></div>
                    </div>

                    <div class="statepin clearfix">
                        <label>Residence Address :</label>
                        <div class="fld-block">
                            <input type="text" name="location" class="form-control" id="LocationResidence">

                            <div class="clear"></div>
                        </div>
                        <span class="error Residence" style="display: none;">Please Enter The Residence Address</span>
                        <div class="clear"></div>
                    </div>
                    <div class="statepin">
                        <label>Company Name :</label>
                        <div class="fld-block">
                            <input type="text" name="companyname" class="form-control" id="Companyname">


                            <div class="clear"></div>
                        </div>
                        <span class="error Companyname" style="display: none;">Please Enter The Company Name</span>
                        <div class="clear"></div>
                    </div>
                    <div class="statepin">
                        <label>Company Address :</label>
                        <div class="fld-block">
                            <input type="text" name="companyname" class="form-control" id="CompanynameResidence">


                            <div class="clear"></div>
                        </div>
                        <span class="error Companyresidence" style="display: none;">Please Enter The Company
                            Address</span>
                        <div class="clear"></div>
                    </div>
                    <div class="statepin">
                        <label>Role :</label>
                        <div class="fld-block">
                            <input type="text" name="role" class="form-control" id="Role">


                            <div class="clear"></div>
                        </div>
                        <span class="error Role" style="display: none;">Please Enter The Role</span>
                        <div class="clear"></div>
                    </div>
                    <div class="statepin">
                        <label>Loan Requirement :</label>
                        <div class="fld-block">
                            <input type="text" name="role" class="form-control" id="LoanRequirment">


                            <div class="clear"></div>
                        </div>
                        <span class="error LoanRequirement" style="display: none;">Please Enter The Loan
                            Requirement</span>
                        <div class="clear"></div>
                    </div>

                    <div class="statepin">
                        <label>Salary :</label>
                        <div class="fld-block">
                            <input type="text" name="salary" class="form-control" id="Salary">


                            <div class="clear"></div>
                        </div>
                        <span class="error Salary" style="display: none;">Please Enter The Salary</span>
                        <div class="clear"></div>
                    </div>

                    <div class="statepin">
                        <label>Loan Eligibility :</label>
                        <div class="fld-block">
                            <input type="text" name="eligibility" class="form-control" id="Eligibility">

                            <div class="clear"></div>
                        </div>
                        <span class="error Eligibility" style="display: none;">Please Enter The Loan Eligibility
                            Amount</span>

                        <div class="clear"></div>
                    </div>

                    <div class="statepin">
                        <label>Cibil Password :</label>
                        <div class="fld-block">
                            <input type="text" name="eligibility" class="form-control" id="CibilPassword">

                            <div class="clear"></div>
                        </div>
                        <span class="error Password" style="display: none;">Please Enter cibil password</span>
                        <div class="clear"></div>
                    </div>
                    <div class="statepin">
                        <label>Aadhar Password :</label>
                        <div class="fld-block">
                            <input type="text" name="eligibility" class="form-control" id="AadharPassword">


                            <div class="clear"></div>
                        </div>
                        <span class="error Aadhar" style="display: none;">Please Enter Aadhar password</span>
                        <div class="clear"></div>
                    </div>
                    <div class="statepin">
                        <label>Pan Password :</label>
                        <div class="fld-block">
                            <input type="text" name="eligibility" class="form-control" id="PanPassword">

                            <div class="clear"></div>
                        </div>
                        <span class="error Pan" style="display: none;">Please Enter Pan password</span>
                        <div class="clear"></div>
                    </div>
                    <div class="statepin">
                        <label>BankStatements Password :</label>
                        <div class="fld-block">
                            <input type="text" name="eligibility" class="form-control" id="BankStatementsPassword">


                            <div class="clear"></div>
                        </div>
                        <span class="error Bank" style="display: none;">Please Enter Bankstatment password</span>
                        <div class="clear"></div>
                    </div>
                    <div class="statepin">
                        <label>Payslips Password :</label>
                        <div class="fld-block">
                            <input type="text" name="eligibility" class="form-control" id="PayslipsPassword">


                            <div class="clear"></div>
                        </div>
                        <span class="error Payslips" style="display: none;">Please Enter Payslips password</span>
                        <div class="clear"></div>
                    </div>
                    <div class="statepin">
                        <label>Current Emi :</label>
                        <div class="fld-block">
                            <input type="text" name="emi" class="form-control" id="Emi">

                            <div class="clear"></div>
                        </div>
                        <span class="error EMI" style="display: none;">Please Enter The Current EMI</span>

                        <div class="clear"></div>
                    </div>

                    <div class="statepin">
                        <label>Comments :</label>
                        <div class="fld-block">
                            <input type="text" name="comments" class="form-control" id="Comments">

                            <!-- <select class="form-control" id="gradeValue">
                <option value="" >--Select your Grade---</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
              </select>  -->
                            <div class="clear"></div>
                        </div>
                        <span class="error Comments" style="display: none;"> Please Enter The comments</span>
                        <div class="clear"></div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-info" data-clickedid="" onclick="postcom()">Submit</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Form Details Ends here -->
<div class="modal  fade" id="modal-updatecibil">
    <div class="modal-dialog">
        <div class="modal-content offer_popup">

            <div class="modal-body">

                <div class="offer_popup_cont clearfix">

                    <div class="panel-body" id="userKYCUpload" enctype="multipart/form-data">
                        <div class="form-lft kycproofs">
                            <label>CIBIL<b style="color:red"> (Cibil)</b></label>
                            <div class="fld-block upload_pdf">
                                <input class="custom-file-input CibilFileUpload" data-clickedid="" type='file'
                                    onchange="readCibil(this);" id="Cibil" accept="application/pdf" />
                                <a href="#" class="Passportdoc1" onclick="viewDoc1('CIBILSCORE')"></a>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <br /><br />

                        </br></br>
                    </div>
                    <br /><br /><br />

                </div />
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>
<div class="modal  fade" id="modal-updateExperian">
    <div class="modal-dialog">
        <div class="modal-content offer_popup">

            <div class="modal-body">

                <div class="offer_popup_cont clearfix">

                    <div class="panel-body" id="userKYCUpload" enctype="multipart/form-data">
                        <div class="form-lft kycproofs">
                            <label>EXPERIAN<b style="color:red"> (Experian)</b></label>
                            <div class="fld-block upload_pdf">
                                <input class="custom-file-input ExperianFileUpload" data-clickedid="" type='file'
                                    onchange="readExperian(this);" id="Experian" accept="application/pdf" />
                                <a href="#" class="Passportdoc1" onclick="viewDoc1('EXPERIAN')"></a>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <br /><br />

                        </br></br>
                    </div>
                    <br /><br /><br />

                </div />
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>
<div class="modal modal-success fade" id="modal-fileUploadedSuccessfully">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <p>
                <h2 style="font-size: 16px;">File uploaded successfully.</h2>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal  fade" id="modal-updatecibilscore">
    <div class="modal-dialog">
        <div class="modal-content offer_popup">

            <div class="modal-body">

                <div class="offer_popup_cont clearfix">

                    <div class="panel-body" id="userKYCUpload" enctype="multipart/form-data">
                        <div class="form-lft kycproofs">
                            <label>CIBILdvdvdvd<b style="color:red"> (Cibiffedvvl)</b></label>
                            <div class="fld-block upload_pdf">
                                <input class="custom-file-input CibilFileUpload" data-clickedid="" type='file'
                                    onchange="readCibil(this);" id="Cibil"
                                    accept="application/pdf, application/vnd.ms-excel" />
                                <a href="#" class="cibildoc" onclick="viewDoc1('CIBILSCORE')"></a>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <br /><br />

                        </br></br>
                    </div>
                    <br /><br /><br />

                </div />
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>
<div class="modal  fade" id="modal-updateExperian">
    <div class="modal-dialog">
        <div class="modal-content offer_popup">

            <div class="modal-body">

                <div class="offer_popup_cont clearfix">

                    <div class="panel-body" id="userKYCUpload" enctype="multipart/form-data">
                        <div class="form-lft kycproofs">
                            <label>EXPERIAN<b style="color:red">(Experian)</b></label>
                            <div class="fld-block upload_pdf">
                                <input class="custom-file-input ExperianFileUpload" data-clickedid="" type='file'
                                    onchange="readExperian(this);" id="Experian"
                                    accept="application/pdf, application/vnd.ms-excel" />
                                <a href="#" class="experiandoc" onclick="viewDoc1('EXPERIAN')"></a>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <br /><br />

                        </br></br>
                    </div>
                    <br /><br /><br />

                </div />
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>
<div class="modal modal-success fade" id="modal-fileUploadedSuccessfully">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <p>
                <h2 style="font-size: 16px;">File uploaded successfully.</h2>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-warning fade" id="modal-alreadyDoneSendOffer">
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
<script type="text/javascript">
window.onload = loadBorrowerApplications();
window.onload = loadUTMfields();
$(document).ready(function() {
    console.log('you are in admin and at borrower apps');
});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php include 'admin_footer.php';?>