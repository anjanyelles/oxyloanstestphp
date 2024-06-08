<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>


<?php
   $urlfromBroweser = $_SERVER['REQUEST_URI'];
   $requestidFromClick =  $_GET['getfornotifications'];
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <!-- Lenders Loan Applications -->
            Active lenders
        </h1>
    </section>
    <br />
    <!-- Main content -->
    <section class="content">
        <span class="requestidFromClick hide"><?php echo $requestidFromClick; ?></span>
        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="lenderSearch">
                    <option value="">-- Choose --</option>
                    <!-- <option value="name">Name</option> -->
                    <option value="id">LENDER ID</option>
                    <!-- <option value="roi">ROI</option>
                    <option value="amount">Amount</option>
                    <option value="amount&city">Amount&city</option>
                    <option value="city">City</option>
                    <option value="mobileNumber">Mobile Number</option>
                    <option value="utm">UTM</option>
                    <option value="utm&amount">UTM&Amount</option>
                    <option value="utm&city">UTM&city</option> -->
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

            </div>

            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn " onclick="loadapproverefereamountlender()"><i
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
                                    <th>Name</th>
                                  
                               

                                    <!--     <th>Amount & ROI</th> -->
                                    <th>Bank  details</th>  
            
                                      <th> Address Info </th>
                                    <th>Wallet Info</th>
                                  
                                    <!-- <th>Change Role & User Status</th> -->

                                </tr>
                            </thead>


                            <tbody id="activeLendersResponseContainer">

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

    <script id="activeLendersResponse11" type="text/template">

        <!-- {{#data}} -->
        {{console.log(data)}}
      <tr  id="activeLendersResponseContainer">
      
        <td>LR{{lenderId}}  
            <br>
            <br>
            Lender GroupId :- {{lenderGroupId}}   <br>
            <strong>UTM :- </strong> {{utm}}
            <br>
            <strong>Regd Date :- </strong> {{userRegisterDate}}
        </td>
                <!-- <td>{{lenderName}}</td> -->

                <td>Name : {{lenderName}}
                    <br>
                    <br>
        
               dob : {{dob}} <br>
               Whtno : {{whatsupNumber}}
             <br>
               <br>
              
              <strong> PAN NUMBER: </strong>{{panNumber}}
              <br>
              AadharNumber : {{aadharNumber}}
               
                </td>
           
                <td>bankAccNumber : {{bankAccNumber}} 
                    <br>
                    ifsc  : {{ifsc}} <br>
                    bankName  : {{bankName}}  <br>
                    branchName : {{branchName}}   <br>
                </td>
           
                <td>
          
                Email: {{email}}  <br>
               Moblie: {{mobileNumber}}  <br>
               <br>
              <strong>  Address :- </strong>{{address}}  <br>
               city: {{city}}  <br>
               state: {{state}}  <br>
               pincode: {{pincode}}  <br>
             
                </td>
                <td><strong>TotalParticipationAmount:- </strong> {{totalParticipationAmount}}  
                    <br>
                  <strong>  WalletAmount     </strong>  :{{currentWalletAmount}}
                </td>
                <!-- <td>WalletAmount {{currentWalletAmount}}</td> -->
                
      

   
   

      </tr>   
  {{/data}}
</script>


  <div class="modal  fade" id="modal-comments-updateUserDob">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Update User DOB</h4>
                </div>
                <div class="modal-body">

                     <div class="form-group row col-xs-12">
                    <label class="userdob" name="userOlddobupdate" class="form-label">User  DOB</label>
                    <input type="text" name="userOlddobupdate"  id="userOldDobUpdatDate" class="form-control" readonly>
                   </div>

                   <div class="form-group row col-xs-12">
                    <label class="userdob" name="userdobupdate" class="form-label">Actually DOB</label>
                    <input type="text" name="userdobupdate"  id="userDobUpdatDate" class="form-control">
                    <span class="error errorDobUpdate" style="display:none;">Enter The New DOB </span>
                   </div>

                </div>
                <div class="modal-footer">
                    <div align="right">
                        <button type="button" class="btn  btn-primary btn-sm updateUserBtn" data-id="" 
                             onclick="updateUserDobOnProfile()">Save</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



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
                    You have successfully Update the data , 
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
    // window.onload = loadLendersApplications();
    // window.onload = loadUTMfields();
    window.onload = loadapproverefereamount11();
    </script>


 <script type="text/javascript">
   $(document).ready(function() {
    $('#userDobUpdatDate').datepicker({
     dateFormat: 'dd-mm-yy',
    changeMonth: true,
    changeYear: true,
    yearRange: "1900:2024"
    });
    
});

    </script>
    <script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>


    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <?php include 'admin_footer.php';?>