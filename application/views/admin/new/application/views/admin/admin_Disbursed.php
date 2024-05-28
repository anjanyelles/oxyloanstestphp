<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

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
            Disbursed Borrower Loan Applications
        </h1>
        <span class="requestidFromClick hide"><?php echo $requestidFromClick; ?></span>

    </section><br />

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="loanID">Loan ID</option>
                    <option value="lenderID">Lender ID</option>
                    <option value="borrowerID">Borrower ID</option>


                </select>
                <span class="errorsearch" style="display: none;">Please choose option</span>
            </div>

            <div class="col-xs-3 text-center loanid" style="display: none;">
                <input type="text" name="loanid" class="form-control loanid" placeholder="Loan ID">
            </div>

            <div class="col-xs-3 text-center userName" style="display: none;">
                <input type="text" name="userName" class="form-control userName" placeholder="Name">
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
                    onclick="searchUsersDisbursedloans('BORROWER');"><i class="fa fa-angle-double-right"></i>
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
                            <div class="approvedPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                            <div class="searchapprovedPagination pull-right" style="display: none;">
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
                                    <th>Loan ID</th>
                                    <th>App ID</th>
                                    <th>LR ID & Name</th>
                                    <th>BR ID & Name</th>
                                    <th>Loan Details</th>
                                    <th>Bank Details</th>
                                    <th>BR documents</th>
                                    <th>Disbursed</th>
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
        <td><a href="javascript:void(0)" onclick="displayLoanInformation('{{id}}')">{{loanId}}</a></td>
        
        <td>{{loanRequest}}</td>
        <td>LR{{lenderUserId}}<br/>{{lenderUser.firstName}} {{lenderUser.lastName}} 
        <br/><b>city :</b>{{lenderUser.city}}<br/>
        <b>Loan Process Type:-</b>{{loanProcessType}}
        </td>
        <td>BR{{borrowerUserId}}<br/>{{borrowerUser.firstName}} {{borrowerUser.lastName}} 
          <br/><b>city :</b>{{borrowerUser.city}}
        <br/><b>oxyScore :</b> {{borrowerUser.oxyScore}}</td>


        <td><b>Loan Value</b>: <span>{{loanRequestAmount}}</span><br/>
  
            <b>ROI</b>: {{rateOfInterest}}
                        <span style='display:none' class="loanTypeisI loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> % PA</span>
                        <span style='display:none' class="loanTypeisDays loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Per Day</span>


            <br/>
            <b>Duration</b>: {{duration}} 

                     <span style='display:none' class="loanTypeisI loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Months</span>

                          <span style='display:none' class="loanTypeisDays loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Days</span>

                          

            <br/>
            
        
           </td>

            
            <td> 
              <b>Bank name</b>: {{borrowerUser.bankName}}<br/>
            <b>Account number</b>: {{borrowerUser.accountNumber}}<br/>
            <b>IFSC code </b>: {{borrowerUser.ifscCode}}<br/>
            <b>Branch</b>: {{borrowerUser.branchName}}
          
        
           </td>



             <td class="user-ViewDocs{{borrowerUserId}}">
            <a style="display:none" href="javascript:void(0)"  class="viewPan showPAN" onclick="viewDoc({{borrowerUserId}}, 'PAN')">PAN</a>
         
            <a style="display:none" href="javascript:void(0)"  class="viewAADHAR showAADHAR" onclick="viewDoc({{borrowerUserId}}, 'AADHAR')" >AADHAR</a>
           
             <a style="display:none" href="javascript:void(0)"  class="viewPASSPORT   showPASSPORT" onclick="viewDoc({{borrowerUserId}},'PASSPORT')" >Passport</a>
         
             <a style="display:none" href="javascript:void(0)"  class="viewBANKSTATEMENT  showBANKSTATEMENT" onclick="viewDoc({{borrowerUserId}}, 'BANKSTATEMENT')"  >Bank Statement</a> 
          
            <a rel='{{borrowerUser.id}}' style="display:none" href="javascript:void(0)"  class="relbtn vviewCONTACTS   showCONTACTS" onclick="viewDoc({{borrowerUserId}}, 'CONTACTS')">Contacts<br/></a>

            <a style="display:none" href="javascript:void(0)"  class="viewPAYSLIPS  showPAYSLIPS" onclick="viewDoc({{borrowerUserId}}, 'PAYSLIPS')"  >PAYSLIPS</a>

            <a style="display:none" href="javascript:void(0)"  class="viewDRIVINGLICENCE  showDRIVINGLICENCE" onclick="viewDoc({{borrowerUserId}}, 'DRIVINGLICENCE')">DRIVING LICENCE</a>

            <a style="display:none" href="javascript:void(0)" class="viewVOTERID  showVOTERID "onclick="viewDoc({{borrowerUserId}}, 'VOTERID')" >VOTERID</a>
          
        </td>
      

      

    <td>
    
    
      <button type="button" class="btn btn-warning pull-left btn-xs userDisbursed" id="user-{{oxyLoanAdminComments}}"onclick="userDisbursed('{{loanId}}',this)" data-reqid = "{{loanId}}" data-loanid="{{loanId}}"> <b>Disbursed</b></button>
      <br><br>
      
<button  type="button" class="btn btn-danger btn-xs" onclick="userRejectOffer({{loanRequestId}},{{borrowerUserId}},this)" data-clickedid ='{{borrowerUser.id}}' data-reqid='{{loanRequestId}}'>Reject Offer</button>
<br/><br/>

 <button  type="button" class="btn btn-danger btn-xs " onclick="userRejectOffers('{{loanId}}')" data-clickedid ='{{borrowerUser.id}}' data-reqid='{{loanRequestId}}'>Reject Loan</button>
 <br/><br/>
    </td>

     

       

      </tr>   
  {{/data}}
</script>






<div class="modal  fade" id="modal-Disbursementdate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Disbursement Date</h4>
            </div>
            <div class="modal-body">
                <form>

                    <label> Disbursement Date<em class="mandatory">*</em> </label>
                    <div class="input-group date" data-date-format="dd/mm/yyyy">
                        <input type="text" class="form-control borrowerDisbursementDate dobformat"
                            id="borrowerDisbursementDate" placeholder="DD/MM/YYYY" name="borrowerDisbursementDate">
                        <span class="error brDisbursedDateError" style="display: none;">Please enter disbursement
                            date</span>

                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                    </div>

                    <!--<textarea type="" name="borrowerDisbursementDate" class="borrowerDisbursementDate  form-control" ></textarea><br/>-->

                    <!-- Emi Start Date: <textarea type="" name="emidate" class="emidate form-control" ></textarea><br/>-->

                </form>

            </div>
            <div class="modal-footer">
                <div align="right">
                    <!-- <button type="button" class="btn  btn-primary btn-sm saveEmidateBtn" data-dismiss="modal" data-loanid="" onclick="updateDisbursementDate()">Save</button> -->
                    <button type="button" class="btn  btn-primary btn-sm saveEmidateBtn" data-loanid=""
                        onclick="updateDisbursementDate()">Save</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-enterDisbursementDate" tabindex="-1" role="dialog"
    aria-labelledby="modal-enterDisbursementDate" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure, you want to give the Disbursement Date ?</h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success userDisbursementDate" data-loanid=""
                    onclick="saveDisbursementDate();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>


<div class="modal modal-warning fade" id="modal-loanActive">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">oops!</h4>
            </div>
            <div class="modal-body">
                This loan is in accepted state ,Please activate the loan.
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


<div class="modal modal-success fade" id="modal-disbursementdatesuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                Successfully entered the disbursement date,Now this record seen in running loans.
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


<div class="modal modal-danger fade" id="modal-adminrejectedoffer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                Rejected this offer and Lender can't see this application in loan listings.
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


<script type="text/javascript">
window.onload = loadApprovedApplications();

$(document).ready(function() {

    $('#borrowerDisbursementDate').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        // startDate: new Date(),
        autoclose: true
    });
});
</script>


<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>


<style type="text/css">
/* .btn-APPROVED{opacity: 0.5; cursor: not-allowed;}*/
#user-DISBURSED {
    pointer-events: none;
    cursor: not-allowed;
    opacity: 0.65;
    filter: alpha(opacity=65);
    -webkit-box-shadow: none;
    box-shadow: none;
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


<?php include 'admin_footer.php';?>