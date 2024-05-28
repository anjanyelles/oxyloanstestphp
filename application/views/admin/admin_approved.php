<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>


<?php
   $urlfromBroweser = $_SERVER['REQUEST_URI'];
  //echo $urlfromBroweser;
  $requestidFromClick =  $_GET['getfornotifications'];
  //$receivedEmailToken = $_GET['emailToken'];
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Lender and Borrower agreed loans </h1>
        <span class="requestidFromClick hide"><?php echo $requestidFromClick; ?></span>

    </section><br />

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="userName">Name</option>
                    <option value="borrowerID">Borrower ID</option>
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
                <button type="button" class="btn bg-gray pull-left search-btn"
                    onclick="searchUsersApprovedtoEsign('BORROWER');"><i class="fa fa-angle-double-right"></i>
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
                            <div class="interstedPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>

                            <div class="searchinterstedPagination pull-right" style="display: none;">
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
                                    <th>Req Date & Exp Date</th>
                                    <th>Name & Mobile</th>
                                    <th>Email & Address</th>
                                    <th>Amount & ROI</th>
                                    <th>View documents</th>
                                    <th>Comments</th>
                                    <th>No.of loan requests</th>

                                </tr>
                            </thead>
                            <tbody id="loadBorrowersInterestedList">

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

<script id="loadBorrowersInterestedListTpl" type="text/template">
    {{#data}}
      <tr>
        <td>BR{{borrowerUser.id}}<br/><br/><b>Status</b>: {{borrowerUser.status}}</td>
         <td><b>Req Date</b>:- {{loanRequestedDate}}<br/>
            <b>Exp Date</b>:- {{expectedDate}}
         </td>
         <td>{{user.firstName}} {{user.lastName}}&nbsp; <br/>{{user.mobileNumber}}
          <br/><b>city :</b>{{borrowerUser.city}}
           <br/><b>oxyScore :</b> {{borrowerUser.oxyScore}}
          </td>
           <td>{{user.email}} <br/> {{user.address}}</td>
            <td>INR <span>{{loanRequestAmount}}</span><br/>{{rateOfInterest}}% Monthly</td>
       
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

            <td><span class="updateComments updateComments-{{loanRequestId}}" data-currComment="{{comments}}" data-loanid="{{loanRequestId}}">

           <button data-toggle="collapse" data-target="#demo-{{borrowerUser.id}}" class="btn btn-info btn-xs">Click here to view the comments</button>

            <p id="demo-{{borrowerUser.id}}" class="collapse" class="mytextCheck displayingComments"  style="width:200px;">
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

            <br/><b>Commets Section Before Nov 25th 2020:-</b>
            {{comments}}
          </p>

 </td>
         
       <!--  <td><span class="oxyscoresampleClick" onclick="oxyscore({{userDisplayId}})" data-currComment="{{oxyscore}}" data-userid="{{userDisplayId}}">{{user.oxyScore}}&nbsp;</span></td> -->
        <td>   

       <a href="javascript:void(0)" class="viewLoanRequests"onclick="viewLoanRequestsAccepted({{id}},{{borrowerUser.id}})" >View Requests & Responses to this borrower</a><br><br>
      <button  type="button" class="btn btn-danger btn-xs " onclick="userRejectOffer({{loanRequestId}},{{borrowerUser.id}})" data-clickedid ='{{borrowerUser.id}}' data-reqid='{{loanRequestId}}'>Reject Offer</button>
        <br/><br/> 
       <button  type="button" class="btn btn-warning btn-xs " onclick="applicationlevelapproved({{borrowerUser.id}})">APP Level Approved</button>
       <br/><br/> 
      </td>
      </tr>
<tr>
  <td style="display:none;" colspan="14" class="viewLoanRequestsAccepted viewLoanRequestsAccepted-{{id}}">

      <div class="col-md-6 pull-right">
                    <div class="interstedPagination1 pull-right">
                      <ul class="pagination bootpag">
                    </ul>
                  </div>
                </div>
        
         <table class="table table-bordered table-hover">
              <thead>
               <tr style="background-color: aqua;">
                <th>Lender Id</th>
                  <th>Req Date & Exp Date</th>
                  <th>Name & Mobile</th>
                  <th>Email & Address</th>
                  <th>Amount & ROI</th>
                  <th>View documents</th>
                  <th>Comments</th>
                  <th>Approve For E-sign</th> 
              </tr>
              </thead>
              <tbody id="viewLoanRequestsAccepted-{{id}}">                   
               <tr id="displayNoLoanRecords" class="displayNoLoanRecords" >
                    <td colspan="8">No Offers found!</td>
                </tr>  
                </tbody>   
              </tfoot>
            </table>
          </td>
        </tr>

  {{/data}}
</script>

<script id="loadloanRequestsAccepted" type="text/template">
    {{#data}}
      <tr>
        <td>LR{{lenderUserId}}<br/>
        <b>Loan Process Type:-</b>{{loanProcessType}}</td>
        <td><b>Req Date</b>:- {{loanRequestedDate}}<br/>
            <b>Exp Date</b>:- {{expectedDate}}
        </td>
        <td>{{lenderUser.firstName}} {{lenderUser.lastName}}&nbsp; <br/>{{lenderUser.mobileNumber}}</td>
        <td>{{lenderUser.email}} <br/> {{lenderUser.address}}</td>
        <td>INR <span>{{loanRequestAmount}}</span><br/>{{rateOfInterest}}


                      <span style='display:none' class="loanTypeisI loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> % Monthly</span>
                        <span style='display:none' class="loanTypeisDays loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Per Day</span>

                        <span style='display:none' class="loanTypeisI loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"></span>

                       <span style='display:none' class="loanTypeisDays loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"></span>




        </td>
        
     <td class="user-ViewDocs{{lenderUser.id}}">
            <a style="display:none" href="javascript:void(0)"  class="viewPan showPAN" onclick="viewDoc({{lenderUser.id}}, 'PAN')">PAN</a>
         
            <a style="display:none" href="javascript:void(0)"  class="viewAADHAR showAADHAR" onclick="viewDoc({{lenderUser.id}}, 'AADHAR')" >AADHAR</a>
           
             <a style="display:none" href="javascript:void(0)"  class="viewPASSPORT   showPASSPORT" onclick="viewDoc({{lenderUser.id}},'PASSPORT')" >Passport</a>
         
             <a style="display:none" href="javascript:void(0)"  class="viewBANKSTATEMENT  showBANKSTATEMENT" onclick="viewDoc({{lenderUser.id}}, 'BANKSTATEMENT')"  >Bank Statement</a> 
          
            <a style="display:none" href="javascript:void(0)"  class="viewCONTACTS   showCONTACTS" onclick="viewDoc({{lenderUser.id}}, 'CONTACTS')"  >Contacts<br/></a>

            <a style="display:none" href="javascript:void(0)"  class="viewPAYSLIPS  showPAYSLIPS" onclick="viewDoc({{lenderUser.id}}, 'PAYSLIPS')"  >PAYSLIPS</a>

            <a style="display:none" href="javascript:void(0)"  class="viewDRIVINGLICENCE  showDRIVINGLICENCE" onclick="viewDoc({{lenderUser.id}}, 'DRIVINGLICENCE')">DRIVING LICENCE</a>

            <a style="display:none" href="javascript:void(0)" class="viewVOTERID  showVOTERID "onclick="viewDoc({{lenderUser.id}}, 'VOTERID')" >VOTERID</a>
          
        </td>

      <!--  <td>{{comments}}</td> -->
 
 <td>
            {{comments}}
        <td>   
      <button type="button" id={{lenderUserId}}  class="btn btn-warning pull-left btn-xs btn-{{loanAdminComments}}" onclick="userApproved('{{loanId}}',{{lenderUserId}})" data-reqid = "{{loanId}}" > <b>Approved</b></button> <br/><br/>

       <button type="button" class="btn btn-success pull-left btn-xs" id=user-{{enachType}} onclick="userManualenachApproval({{borrowerUser.id}},'{{loanId}}')" data-reqid = "{{borrowerUser.id}}"  data-loanId ='{{loanId}}'> <b>Manual enach</b></button><br/><br/>

       <button type="button" class="btn btn-success pull-left btn-xs" id=user-{{loanEmiCardStatus}}   onclick="userManualEsignApproval('{{loanId}}')" data-loanID = "{{loanId}}"> <b>Manual Esign</b></button>
       <br/><br/>
 
     
<button  type="button" class="btn btn-danger btn-xs " onclick="userRejectOffers('{{loanId}}')">Reject Loan</button>

 
     

    
      </td>

      </tr>
  {{/data}}
</script>



<div class="modal fade" id="modal-approve-user" tabindex="-1" role="dialog"
    aria-labelledby="modal-borrower-approve-user" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure ?</h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success approveuser-Btn" data-reqid='' data-clickedid=""
                    onclick="approveUsertoBorrower();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
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

<div class="modal modal-success fade" id="modal-userloanApprove">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                User loan Aprroval successful.this loan record will be in L4.
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
<div class="modal modal-warning fade" id="modal-userloanApprovestage">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                Loan is not active,Please ask to users to Esign.
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


<div class="modal fade" id="modal-borrower-rejectoffer" tabindex="-1" role="dialog"
    aria-labelledby="modal-borrower-sendoffer" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure, do you want to Reject the offer to this user?</h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success borrowerRejectofferBtn" data-reqid='' data-clickedid=''
                    onclick="borrowersRejectoffer();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>




<div class="modal modal-danger fade" id="modal-adminrejectedoffer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                Rejected this offer and Lender can't see this application in loan listings. </div>
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


<div class="modal fade" id="modal-borrower-maualenach" tabindex="-1" role="dialog"
    aria-labelledby="modal-borrower-maualenach" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure, do you want to Accept eNACH to this user?</h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success borrowermaualenachBtn" data-reqid='' data-loanId=''
                    onclick="borrowersmaualenach();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>


<div class="modal modal-success fade" id="modal-adminmanualeNACH">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                Admin Successfully Done for this user Manual eNACH.
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


<div class="modal fade" id="modal-borrowerManualEsign" tabindex="-1" role="dialog"
    aria-labelledby="modal-borrowerManualEsign" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure ?</h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success borrowerManualEsign-Btn" data-reqid='' data-clickedid=""
                    onclick="borrowerManualEsign();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>



<div class="modal modal-success fade" id="modal-adminmanualEsign">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                Admin Successfully Done for this user Manual Esign.
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

<div class="modal modal-warning fade" id="modal-loandisbursedcompleted">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                This loan Amount is already disbursed.
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

<div class="modal fade" id="modal-borrower-rejectoffers" tabindex="-1" role="dialog"
    aria-labelledby="modal-borrower-sendoffer" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure, do you want to Reject the offer to this user?</h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success borrowerRejectofferBtn" data-reqid='' data-clickedid=''
                    onclick="borrowersRejectoffers();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
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
window.onload = loadofferAcceptedUsers();
</script>

<style type="text/css">
/* .btn-APPROVED{opacity: 0.5; cursor: not-allowed;}*/
.btn-APPROVED,
#user-MANUALENACH,
#user-True {
    pointer-events: none;
    cursor: not-allowed;
    opacity: 0.65;
    filter: alpha(opacity=65);
    -webkit-box-shadow: none;
    box-shadow: none;
}
</style>

<style type="text/css">
.btn-APPROVED {
    opacity: 0.5;
    cursor: not-allowed;
}
</style>
<style type="text/css">
.btn-APPROVED {
    opacity: 0.5;
    cursor: not-allowed;
}
</style>
<style type="text/css">
span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisDays.loanTypeisDays {
    display: inline !important;
}

span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisI.loanTypeisI,
span.loanTypeisI.loanTypeis {
    display: inline !important;
}

span.loanTypeisI.loanTypeisDays {
    display: none !important;
}

span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisDays.loanTypeis {
    display: none !important;
}

span.loanTypeisDays.loanTypeisMonths {
    display: none !important;
}
</style>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>