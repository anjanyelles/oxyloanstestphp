<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Intrested Borrower Loan Applications
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
                    onclick="searchUsersIntrested('BORROWER');"><i class="fa fa-angle-double-right"></i> <b>Search</b>
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
                                <tr>
                                    <th>Borrower Id</th>
                                    <th>Req Date & Exp Date</th>
                                    <th>Name & Mobile</th>
                                    <th>Email & Address</th>
                                    <th>Amount & ROI</th>
                                    <th>View documents</th>
                                    <th>Comments</th>
                                    <th>Risk calculations & send offer</th>
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
      




 <td><span class="updateComments updateComments-{{loanRequestId}}" data-currComment="{{comments}}" data-loanid="{{loanRequestId}}" onclick="updateComments({{loanRequestId}})">{{comments}}&nbsp;</span></td>
         

        
       <!--  <td><span class="oxyscoresampleClick" onclick="oxyscore({{userDisplayId}})" data-currComment="{{oxyscore}}" data-userid="{{userDisplayId}}">{{user.oxyScore}}&nbsp;</span></td> -->
         

           
<td> 
  <button type="button" class="btn btn-warning pull-left btn-xs" onclick="userRiskcalculate({{borrowerUser.id}})" data-clickedid = "{{borrowerUser.id}}" > <b>Risk calculate</b></button><br/><br/>


 <button type="button" class="btn btn-success btn-xs" onclick="usercibilScore({{borrowerUser.id}})" data-clickedid = "{{borrowerUser.id}}" > <b>Cibil score</b></button><br/><br/>
  
  <button  type="button" class="btn btn-primary btn-xs " onclick="userSendOffer('{{loanRequest}}',{{borrowerUser.id}})" data-clickedid ="{{borrowerUser.id}}" data-reqid='{{loanRequest}}'>Send Offer</button>

</td>



      </tr>
<tr>
 <!-- <td style="display:none;" colspan="14" class="viewLoanRequests viewLoanRequests-{{id}}">
        
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
                  <th>Approve the loanrequest</th>
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

    </tr> -->





  {{/data}}
</script>



<!-- <script id="loadloanRequestsIntrested" type="text/template">
  {{#data}}
      <tr>
        <td>LR{{lenderUserId}}</td>
        <td><b>Req Date</b>:- {{loanRequestedDate}}<br/>
            <b>Exp Date</b>:- {{expectedDate}}
        </td>
        <td>{{lenderUser.firstName}} {{lenderUser.lastName}}&nbsp; <br/>{{lenderUser.mobileNumber}}</td>
        <td>{{lenderUser.email}} <br/> {{lenderUser.address}}</td>
        <td>INR <span>{{loanRequestAmount}}</span><br/>{{rateOfInterest}}% PA</td>
        
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

    
 
 <td><span class="updateComments updateComments-{{loanRequestId}}" data-currComment="{{comments}}" data-loanid="{{loanRequestId}}" onclick="updateComments({{loanRequestId}})">{{comments}}&nbsp;</span></td>
   

        <td>   
 <button type="button" class="btn btn-warning pull-left btn-xs btn-{{loanAdminComments}} onclick="userApprovedLoans('{{loanId}}')" data-reqid= "('{{loanId}}')"> <b>Approved</b></button> 
     
      <button type="button" id={{lenderUserId}}  class="btn btn-warning pull-left btn-xs btn-{{loanAdminComments}}" onclick="userApproved('{{loanId}}',{{lenderUserId}})" data-reqid = "{{loanId}}" > <b>Approved</b></button>
      </td>

      </tr>
  {{/data}}
</script> -->

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




<div class="modal  fade" id="modal-borrowerFeeRoi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update BorrowerFeeROI</h4>
            </div>
            <div class="modal-body">
                <form>

                    <label>BorrowerFeeROI: </label>
                    <div class="form-group">
                        <input type="text" class="form-control borrowerFeeRoi" id="borrowerRoi" name="borrowerRoi">

                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm saveEmidateBtn" data-dismiss="modal"
                        data-clickedid="" onclick="updateBorrowerFeeROI()">calculate</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-warning fade" id="modal-borrowerFeeError">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                borrower Fee caculation completed.
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

<div class="modal modal-success fade" id="modal-borrowerFeesuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                borrower Fee caculation completed successfully.
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
                <h4 class="modal-title">Risk calcualtion</h4>
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



                <h3> Risk Calculations Points</h3>
                <div class="offer_popup_cont clearfix">
                    <div class="offer_popup_field clearfix">
                        <label>Experian Score:</label>
                        <div class="fld-block">
                            <input type="text" name="Experian" class="form-control experian" id="experianPoints">
                            <span class="error experianPointsError" style="display: none;">Please enter Experian Score
                                Points.</span>

                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>


                    <div class="offer_popup_field clearfix">
                        <label> Salary/Income:</label>
                        <div class="fld-block">
                            <input type="text" name=" Salary/Income" class="form-control salary" id="salaryPoints">
                            <span class="error salaryPointsError" style="display: none;">Please enter Salary/Income
                                Points.</span>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="offer_popup_field clearfix">
                        <label> Organization/Company:</label>
                        <div class="fld-block">
                            <input type="text" name="Organization/Companey" class="form-control companey"
                                id="companeyPoints">
                            <span class="error companeyPointsError" style="display: none;">Please enter
                                Organization/Company Points.</span>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>


                    <div class="offer_popup_field clearfix">
                        <label> Organization found/Experiance:</label>
                        <div class="fld-block">
                            <input type="text" name="Experiance" class="form-control experiance" id="experiancePoints">
                            <span class="error experiancePointsError" style="display: none;">Please enter
                                Organization/Company Experiance Points.</span>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="offer_popup_field clearfix">
                        <label>Grade:</label>
                        <div class="fld-block">
                            <input type="text" name="grades" class="form-control" id="gradeValue">
                            <!-- <select class="form-control" id="gradeValue">
                              <option value="" >--Select your Grade---</option>
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                              <option value="D">D</option>
                            </select>  -->
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>


                </div>


            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm riskCalculationBtn" data-clickedid=""
                        onclick="riskCalculation()">calculate</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal  fade" id="modal-Sendofferamount">
    <div class="modal-dialog">
        <div class="modal-content offer_popup">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Loan offer </h4>
            </div>
            <div class="offer_popup_cont clearfix">

                <div class="offer_popup_field clearfix">
                    <label>Loan Amount:</label>
                    <div class="fld-block">
                        <input type="text" class="loanAmount" id="loanOfferAmount" placeholder="Loan Amount">
                        <span class="error loanAmountError" style="display: none;">Please enter loan amount.</span>

                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="offer_popup_field clearfix">
                    <label>Fee Percentage:</label>
                    <div class="fld-block">
                        <select class="form-control percentage" id="percentageValue">
                            <option value="">-- Choose Percentage --</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                        </select>

                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="offer_popup_field clearfix">
                    <label>Rate of Interest per Annum:</label>
                    <div class="fld-block">
                        <select class="form-control " id="rateOfInterest">
                            <option value="">-- Choose ROI --</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="36">36</option>
                            <option value="48">48</option>
                        </select>
                        <span class="error roiError" style="display: none;">Please select ROI.</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>


                <div class="offer_popup_field clearfix">
                    <label>Tenure:</label>
                    <div class="fld-block">
                        <select class="form-control " id="tenure">
                            <option value="">-- Choose Loan Duration --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="7">7</option>
                            <option value="6">6</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                        </select>
                        <span class="error tenureError" style="display: none;">Please select Tenure.</span>
                        <!-- <input type="text" placeholder="12 MONTHS"> -->
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- <div class="offer_popup_field clearfix">
                        <label>EMI Amount:</label>
                        <div class="fld-block">                         
                            <input type="text" placeholder="Rs.5667/-"> 
                            <div class="clear"></div>
                        </div>                            
                        <div class="clear"></div>
                    </div> -->
                <div class="offer_popup_field clearfix">
                    <label>Processing Fees:</label>
                    <div class="fld-block">
                        <input type="text" class="displayprocessingFees" placeholder="Processing Fees"
                            id="processingFee">
                        <span class="error processingFeeError" style="display: none;">Please enter processingFee.</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="offer_popup_field clearfix">
                    <label>Other Details:</label>
                    <div class="fld-block">
                        <textarea col="4" rows="4" id="comments" placeholder="Text"></textarea>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>

            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm sendLoanoffer " data-reqid='' data-clickedid=""
                        onclick="sendUserOffer()">Send offer</button>

                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-success fade" id="modal-sucessriskCalculation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                Risk calculation Successfully Done.
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

<div class="modal modal-warning fade" id="modal-riskCalWithoutScore">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <!-- <p id="text"> Risk calculation Successfully Done.</p> -->
                User not filled the personal details or experian score, If you want to give risk points ask to the user
                to fill all details and documents.
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


<div class="modal modal-success fade" id="modal-SendOfferSent">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                Offer Sent Sucessfully.
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


<div class="modal  fade" id="modal-cibilScore">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Enter the Cibil score</h4>
            </div>
            <div class="modal-body">
                <form>

                    <label>Cibil Score: </label>
                    <div class="form-group">
                        <input type="number" class="form-control cibilScore" id="cibilScoreValue" name="">
                        <span class="error cibilError" style="display: none;">Please enter cibil score.</span>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm savecibilscoreBtn" data-clickedid=""
                        onclick="updateCibilScore()">Submit</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
window.onload = loadIntrestedApplications();
</script>

<style type="text/css">
.btn-APPROVED {
    opacity: 0.5;
    cursor: not-allowed;
}
</style>


<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>