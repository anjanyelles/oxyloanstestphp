<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Borrowers Responses/Requests From Lenders
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
                    <!-- <option value="roi">ROI</option>
      <option value="amount">Amount</option>
      <option value="amount&city">Amount&city</option> 
      <option value="city">City</option>
      <option value="mobileNumber">Mobile Number</option>-->

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
                <button type="button" class="btn bg-gray pull-left search-btn"
                    onclick="searchUsersofferAccepted('BORROWER');"><i class="fa fa-angle-double-right"></i>
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
        <td>INR <span>{{loanRequestAmount}}</span><br/>{{rateOfInterest}}%  Monthly
                     


        </td>
       
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
      




 <td> 
          </td>
         

        
       <!--  <td><span class="oxyscoresampleClick" onclick="oxyscore({{userDisplayId}})" data-currComment="{{oxyscore}}" data-userid="{{userDisplayId}}">{{user.oxyScore}}&nbsp;</span></td> -->
         

        <td>   

 <a href="javascript:void(0)" class="viewLoanRequests"onclick="viewLoanRequests('{{id}}',{{borrowerUser.id}})">View Requests & Responses to this borrower</a><br><br>
      
<button  type="button" class="btn btn-danger btn-xs" onclick="userRejectOffer({{loanRequestId}},{{borrowerUser.id}})" data-clickedid ='{{borrowerUser.id}}' data-reqid='{{loanRequestId}}'>Reject Offer</button>

      
      </td>




      </tr>
<tr>
  <td style="display:none;" colspan="14" class="viewLoanRequests viewLoanRequests-{{id}}">

    
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
                 <!-- <th>Approve the loanrequest</th> -->
              </tr>
              </thead>
              <tbody id="viewLoanRequestsIntrested-{{id}}">                   
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




<script id="loadloanRequestsIntrested" type="text/template">
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

          </td>
   

       <!--   <td>   

     
      <button type="button" id={{lenderUserId}}  class="btn btn-warning pull-left btn-xs btn-{{loanAdminComments}}" onclick="userApproved('{{loanId}}',{{lenderUserId}})" data-reqid = "{{loanId}}" > <b>Approved</b></button> 
      </td> -->

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

<div class="modal modal-success fade" id="modal-userloanApprove">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                User loan Aprroval successful.this loan record will be in L2.
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