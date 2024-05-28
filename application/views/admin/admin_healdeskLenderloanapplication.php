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
            Lenders Loan Applications
        </h1>
    </section><br />

    <!-- Main content -->

    <section class="content">

        <span class="requestidFromClick hide"><?php echo $requestidFromClick; ?></span>

        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="lenderSearch">
                    <option value="">-- Choose --</option>
                    <option value="name">Name</option>
                    <option value="id">LENDER ID</option>
                    <option value="roi">ROI</option>
                    <option value="amount">Amount</option>
                    <option value="amount&city">Amount&city</option>
                    <option value="city">City</option>
                    <option value="mobileNumber">Mobile Number</option>
                    <option value="utm">UTM</option>
                    <option value="utm&amount">UTM&Amount</option>
                    <option value="utm&city">UTM&city</option>
                    <!-- <option value="oxyscore">Oxyscore</option> -->
                </select>
                <span class="errorsearch" style="display: none;">Please choose option.</span>
            </div>

            <div class="col-xs-3 text-center name" style="display: none;">
                <input type="text" name="name" class="form-control name" placeholder="Name">
            </div>

            <div class="col-xs-2 text-center utm" style="display: none;">
                <select class="form-control " id="utmValue">
                    <option value="">-- Choose UTM --</option>
                </select>
            </div>

            <div class="col-xs-3 text-center id" style="display: none;">
                <input type="text" name="id" class="form-control id" placeholder="LENDER ID">
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

            <div class="col-xs-3 text-center oxyscore" style="display: none;">
                <input type="text" name="oxyscore" class="form-control oxyscore" placeholder="Oxyscore">
            </div>
            <div class="col-xs-3 text-center mobileNumber" style="display: none;">
                <input type="text" name="mobileNumber" class="form-control mobileNumber" placeholder="mobileNumber">
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

                <!-- <input type="text" name="city" id="cityValue" class="form-control city" placeholder="City"> -->
            </div>

            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn " onclick="searchLenderUers('LENDER');"><i
                        class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>



        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Lenders info</h3>
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="displayUTMResults" style="display: none;">
                                        <span><b>UTM :</b></span> <span class="utnNameV"></span><br />
                                        <span><b>Count :</b></span> <span class="totalutm"></span><br />
                                        <button class="btn btn-sm btn-info" onclick="downloadUtmUsers('LENDER');"> <i
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
                            <div class="searchlenderPagination pull-right" style="display: none;">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="box-body" style="overflow-x: auto;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">

                                    <th>Lender ID</th>
                                    <th>Regd Date & Exp Date</th>
                                    <th>Name & Mobile</th>
                                    <th>Email & Address</th>

                                    <!--     <th>Amount & ROI</th> -->
                                    <th>View Documents</th>


                                    <th>Change Role & User Status</th>

                                </tr>
                            </thead>


                            <tbody id="loadLendersList">

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

    <script id="loadLendersListTpl" type="text/template">
        {{#data}}
      <tr>
        <td>
          <a href="lenderstatistics?lenderId=LR{{lenderUser.id}}">LR{{lenderUser.id}}</a>
          <br/>
        <b>Loan Process Type:-</b>{{loanProcessType}}<br/>
         <b>Lender Group ID:</b>{{groupId}}<br/>
          <b>Lender Group:-</b>{{groupName}}<br/>
         <span class="referredBy-{{referredBy}}"><br/>
         <b>Referred By</b>: {{referredBy}}
       </span

      </td>
    <td><b>Regd Date</b>:- {{loanRequestedDate}}<br/>
            <b>Exp Date</b>:- {{expectedDate}}<br/><br/><br/>

            Wallet Value:- <b>{{walletAmount}}</b>
            <br/><br/>
            <b>PAN NUMBER </b>{{user.panNumber}}
            <br/><br/>
            <b>DOB :</b>{{lenderUser.dob}}
        </td>

        <td>{{user.firstName}} {{user.lastName}}   {{user.mobileNumber}}<br/>
          <b>UTM From</b>: {{user.utmSource}}<br/>
           <b>City : {{lenderUser.city}}</b> <br/>

           INR <span>{{loanRequestAmount}}  <br/>

             {{rateOfInterest}}% PA</span>





        </td>
       
          <td>{{user.email}} <br/> {{user.address}}<br/><br/>
              <b>Bank Account Details</b><br/>
              {{lenderUser.userNameAccordingToBank}}<br/>
              {{lenderUser.accountNumber}}<br/>
              {{lenderUser.ifscCode}}<br/>
              {{lenderUser.branchName}}<br/>

          </td>
       <!--    <td><b>{{lenderUser.city}}</b> </td> -->

      <!--   <td>INR <span>{{loanRequestAmount}}  {{rateOfInterest}}% PA</span></td> -->
        
       <!-- <td>{{rateOfInterest}}% PA</td>
        

        <td>{{user.mobileNumber}}</td>
        <td>DAMODER GARU??</td> -->
       

       <td style="display:none;"><b>Nominee name</b>:- {{lenderUser.nomineeResponseDto.name}}<br/>
            <b>Relation</b>:- {{lenderUser.nomineeResponseDto.relation}}<br/>
            <b>MobileNumber</b>:- {{lenderUser.nomineeResponseDto.mobileNumber}}<br/>
            <b>Email</b>:- {{lenderUser.nomineeResponseDto.emial}}<br/>
            <b>AccountNumber</b>:- {{lenderUser.nomineeResponseDto.accountNumber}}<br/>
            <b>BankName</b>:- {{lenderUser.nomineeResponseDto.bankName}}<br/>
            <b>BranchName</b>:- {{lenderUser.nomineeResponseDto.branchName}}<br/>
            <b>IFSCcode</b>:- {{lenderUser.nomineeResponseDto.ifscCode}}<br/>
            <b>City</b>:- {{lenderUser.nomineeResponseDto.city}}
        </td>

         
<td class="user-ViewDocs{{lenderUser.id}}">
            <a style="display:none" href="javascript:void(0)"  class="viewPan showPAN" onclick="viewDoc({{lenderUser.id}}, 'PAN')">PAN</a>
         
            <a style="display:none" href="javascript:void(0)"  class="viewAADHAR showAADHAR" onclick="viewDoc({{lenderUser.id}}, 'AADHAR')" >AADHAR</a>
           
             <a style="display:none" href="javascript:void(0)"  class="viewPASSPORT   showPASSPORT" onclick="viewDoc({{lenderUser.id}},'PASSPORT')" >Passport</a>
         
             <a style="display:none" href="javascript:void(0)"  class="viewBANKSTATEMENT  showBANKSTATEMENT" onclick="viewDoc({{lenderUser.id}}, 'BANKSTATEMENT')"  >Bank Statement</a> 
          
            <a style="display:none" href="javascript:void(0)"  class="viewCONTACTS   showCONTACTS" onclick="viewDoc({{lenderUser.id}}, 'CONTACTS')"  >Contacts<br/></a>

            <a style="display:none" href="javascript:void(0)"  class="viewPAYSLIPS  showPAYSLIPS" onclick="viewDoc({{lenderUser.id}}, 'PAYSLIPS')"  >PAYSLIPS</a>

            <a style="display:none" href="javascript:void(0)"  class="viewDRIVINGLICENCE  showDRIVINGLICENCE" onclick="viewDoc({{lenderUser.id}}, 'DRIVINGLICENCE')">DRIVING LICENCE</a>

            <a style="display:none" href="javascript:void(0)"  class="viewCHEQUELEAF  showCHEQUELEAF" onclick="viewDoc({{lenderUser.id}}, 'CHEQUELEAF')">CHEQUELEAF</a>

            <a style="display:none" href="javascript:void(0)" class="viewVOTERID  showVOTERID "onclick="viewDoc({{lenderUser.id}}, 'VOTERID')" >VOTERID</a><br>
            <button type="button" class="btn btn-warning pull-left btn-xs" onclick="sendlenderMonthlyStatements({{lenderUser.id}},'LENDER')" data-reqid = "{{lenderUser.id}}" > <b>send loan statement</b></button><br><br>

            <button type="button" class="btn btn-warning pull-left btn-xs" onclick="updateEmiComments({{lenderUser.id}})" data-reqid = "{{lenderUser.id}}" > <b>update emi Comments</b></button>

        </td>



        

     <!--    <td><span class="updateComments" data-currComment="{{comments}}" data-loanid="{{loanRequestId}}">
         <button class="btn btn-xs btn-primary">Write comments </button>
          {{comments}}&nbsp;</span>
        </td> -->
      

         <td>
                        
         <button type="button" class="btn btn-warning pull-left btn-xs" onclick="changePrimarytype('BORROWER',{{lenderUser.id}})" data-reqid = "{{lenderUser.id}}" > <b>Change to Borrower</b></button>
          <br> <br>
   
            <a href="#" onclick="updateUserStatus({{user.id}},'{{user.status}}');" data-reqid='{{user.id}}' data-status='{{user.status}}'>
            <button  class="btn btn-success btn-xs user{{user.status}}" id='{{lenderUser.id}}'>
            Interested</button>  
            </a>   <br> <br>



            <span class="updateComments" data-currComment="{{comments}}" data-loanid="{{loanRequestId}}">
         <button class="btn btn-xs btn-primary">Write to comments </button>
          {{comments}}&nbsp;</span>  <br>



        </td>


      </tr>   
  {{/data}}
</script>

    <div class="modal fade" id="modal-activateLender" tabindex="-1" role="dialog"
        aria-labelledby="modal-borrower-activateLender" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div align="center">
                        <h4>Are You Sure ?</h4>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn  btn-success activateLender-Btn" data-reqid='' data-status=''
                        onclick="activateLender();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
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
                    User activation successful.
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

    <div class="modal modal-success fade" id="modal-emicardcomments">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    please update emi comments to send loan statement
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

    <div class="modal modal-success fade" id="modal-emicardcommentsupdate">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    emi comments are updated
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

    <div class="modal modal-success fade" id="modal-emailsendstatement">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    email sent successfully
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
    window.onload = loadLendersApplications();
    window.onload = loadUTMfields();
    </script>
    <script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>


    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <?php include 'admin_footer.php';?>