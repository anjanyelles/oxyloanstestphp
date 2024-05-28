<div class="loadingSec" style="display: none;text-align:center;">
    <img src="<?php echo base_url(); ?>/assets/images/loading.gif?oxy=1" width="125" />
</div>


<!-- <div class="alert alert-warning animate__animated animate__bounceInUp my-element pull-right" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
</div> -->
<!-- <div class="loader" style="display: none; text-align:center;position:absolute;
height: 30%;width:30%;"></div> -->
<div class="modal modal-info fade" id="modal-sendofferacceptance">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                Are you sure to accept this offer.
            </div>
            <div class="modal-footer">
                <div align="right">
                    <a href="acceptLoanoffer?userScore=0">
                        <button type="button" class="btn btn-success sendofferPage" data-dismiss="modal"> <b>View
                                Offer</b>
                        </button></a>


                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-warning fade" id="modal-loanStatementError">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                You don't have any running loans.
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
<div class="modal modal-success fade text-left" id="modal-resetSuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Congratulations!</h4>
            </div>
            <div class="modal-body">
                <p>We've sent an email to reset the password.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-info fade" id="modal-ROI-NotUpdated">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Please update your loan request</h4>
            </div>
            <div class="modal-body">
                <p>
                    You're one step away to submit your lending application, Please Upload your Kyc documents. Pan,One
                    address proof are mandatory.
                </p>
            </div>
            <div class="modal-footer">
                <a href="borrowerraisealoanrequest">
                    <button type="button" class="btn btn-outline pull-left">Update</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-info fade" id="modal-Utm-Partner">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Please update your loan request.</h4>
            </div>
            <div class="modal-body">
                <p>
                    You're one step away to submit your loan application, Please update your preferred Rate of Interest,
                    loan expected date, tenure and Re-Payment Method.
                </p>
            </div>
            <div class="modal-footer">
                <a href="borrowerloanrequest">
                    <button type="button" class="btn btn-outline pull-left">Update</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-success fade" id="modal-validitydate-renewal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks</h4>
            </div>
            <div class="modal-body">
                <p class="text-bold">
                    <b> You have successfully renewed your validity. </b>.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right updateProfile-OnLoad"
                    data-dismiss="modal">Close</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<div class="modal modal-success fade" id="modal-participated-membership">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks</h4>
            </div>
            <div class="modal-body">
                <p class="text-bold">
                    <b> You have successfully paid the membership </b>.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right updateProfile-OnLoad"
                    data-dismiss="modal">Close</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!----------------Popups------------------------>

<div class="modal modal-warning fade" id="modal-whatsappserror">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body whatsappError">
                <p class="message">Limit Reached. Can't sent More than 10 messages</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">OK</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal modal-success fade" id="resend-activation-link">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body whatsappError">
                <p class="">We have sent an activation Link to register email. Please Activate and Proceed</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">OK</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-success fade" id="modal-whatsappsmsg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p><b>Whatsapp Messages Sent to the given mobiles numbers. </b>Thank you for using our service.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-info fade" id="modal-raiseaLoan-PayonlyInterest">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Please update your loan request.</h4>
            </div>
            <div class="modal-body">
                <p>
                    You're one step away to submit your loan application, Please update your preferred Rate of Interest,
                    loan expected date, tenure and Re-Payment Method.
                </p>
            </div>
            <div class="modal-footer">
                <a href="borrowerloanrequest">
                    <button type="button" class="btn btn-outline pull-left">Update</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-info fade" id="modal-ROI-NotUpdated-Lender">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Please update your lending commitment.</h4>
            </div>
            <div class="modal-body">
                <p>
                    You're one step away to submit your lending application, Please update your preferred Rate of
                    Interest, loan release date, tenure and Re-Payment Method.
                </p>
            </div>
            <div class="modal-footer">
                <a href="lenderraisealoanrequest">
                    <button type="button" class="btn btn-outline pull-left">Update</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-info fade" id="modal-checkCity">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">We've upgraded our system for a better experience. Please update the <b>CITY
                    </b> information.
                </h4>
            </div>
            <div class="modal-body">
                <!--   <input type="text" name="city" class="form-control   cityCheck autocomplete  cityInputs" placeholder="Enter city"> -->
                <select class="form-control cityCheck" name="city" id="cityCheck">
                    <option value="">--Select your city---</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Chennai">Chennai</option>
                    <option value="Bangalore">Bangalore</option>
                    <option value="Hyderabad">Hyderabad</option>
                    <option value="Secunderabad">Secunderabad</option>
                    <option value="Pune">Pune</option>
                    <option value="Visakhapatnam">Visakhapatnam</option>
                    <option value="Vijayawada">Vijayawada</option>
                    <option value="Lucknow">Lucknow</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="MadhyaPradesh">Madhya Pradesh</option>
                    <option value="Others">Others</option>
                </select></br>



                <input type="text" name="cityValue" id="userenterCity" placeholder="Enter your city"
                    class="form-control" style="display: none;">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left updateCity">Update</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-info fade" id="modal-checkCreditScore" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close getscore-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Credit score!!!</h4>
            </div>
            <div class="modal-body">
                <p>Please Get your credit score to submit the loan request </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right getscore-btn">Get score</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>





<div class="modal modal-success fade" id="modal-success-cancel-query" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close getscore-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks</h4>
            </div>
            <div class="modal-body">
                <p class="text-message">

                    Your query has been successfully cancelled. If you have any other questions or need further
                    assistance, feel free to write to us.
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







<!-- /.modal -->
<div class="modal modal-info fade" id="modal-newUpdatedBankDeatils">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Bank Details.</h4>
            </div>
            <div class="modal-body">
                <p>
                    Happy to inform that we are automating the monthly interest/principal returns process from this
                    month.</p>
                <p>
                    Please update your name (according to your pan card) bank name, account number, IFSC code </p>
                <p>
                    This will help us to avoid delay in crediting the interest/ principal return ontime</p>
            </div>
            <div class="modal-footer">
                <a href="lender_profilePage?userScore=0">
                    <button type="button" class="btn btn-outline pull-left">Update</button>
                </a>

                <button type="button" class="btn btn-outline pull-left" style="margin-left:10px"
                    onclick="ignoreNewbankDeatils();">Ignore</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-info fade" id="modal-newLoanRequest">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Please raise your loan request.</h4>
            </div>
            <div class="modal-body">
                <p>
                    You're loan request has expired,you want a loan,Please raise a new loan request.
                </p>
            </div>
            <div class="modal-footer">
                <a href="borrowerloanrequest">
                    <button type="button" class="btn btn-outline pull-left">Update</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="displayCropSection" style="display: none;">
    <div class="secArea-1">
        <form id="userPICUpload" enctype="multipart/form-data">
            <div class="row">
                <div>
                    <img src="" class="getFromProfileSec" id="result">
                </div>
                <div align="center">
                    <span class="btn btn-primary btn-file">
                        Edit Profile Picture <input type="file" id="profilePicFile" accept="image/*" />
                    </span>

                    <span class="closeBtn"><button type="button"
                            class="btn btn-outline closePicArea">Close</button></span>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="emailHTML" style="display: none;">
    <div id="emailMessage">
        <div style="padding: 5px;">
            <div id="inner-message" class="alert alert-warning">
                Please verify your email.
                <a class="sendActivationLink" href="#" onclick="rendeactivation();">Resend Activation Link.</a>
            </div>
        </div>
    </div>
</div>


<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2016 <a href="https://oxyloans.com">OxyLoans.com</a>.</strong> All rights
    reserved.
</footer>
<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="<?php echo base_url(); ?>/assets/js/jquery.bootpag.min.js"></script>

<!-- FastClick -->
<script src="<?php echo base_url(); ?>/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="modal modal-info fade" id="modal-checkProfile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Please complete your profile.</h4>
            </div>
            <div class="modal-body">
                <p class="text-profileCheck"></p>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" class="personalProfileLink">
                    <button type="button" class="btn btn-outline pull-left updateProfile-OnLoad">Update Profile</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-info fade" id="modal-updateWhatsappNumber">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    Verify your WhatsApp number.</h4>
            </div>
            <div class="modal-body">
                <input type="text" name="whastappnumber" id="whatsAppNumber" class="form-control whatsAppNumber"
                    maxlength="10">
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn-submitFeeinfo btn btn-outline"
                        onclick="updateWhatsappNumber();">Submit</button>
                    <button type="button" class="btn btn-default btn-outline" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-default  fade" id="modal-verifyWhatsappNumber">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    Verify your WhatsApp number.</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-9 pull-left">
                        <input type="tel" name="verifyWhatsappNumber" id="verifyWhatsappNumber"
                            class="form-control whatsAppNumber col-md-12" placeholder="XXXX-XXXX-XXXX">
                        <input type="hidden" name="phone_number[main]" id="code" />
                    </div>
                    <div class="col-md-3 pull-left">
                        <span class="btn btn-info btn-textchange" onclick="verifyWhatsappNumber();">Send OTP</span>
                    </div>
                </div></br>
                <div class="whats-Otp">
                    <input type="text" name="whastappnumber" id="whatsAppOtp" class="form-control whatsAppNumber"
                        placeholder="Enter the Whatsapp OTP">
                    <span class="otp-warnign" style="display: none; color: red;">Invalid OTP value please check</span>
                </div>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-primary" onclick="verifyWhatsappOtp();">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"
                        onclick="skipwhatsappVerify();">skip</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-default  fade" id="modal-nriVerifyWhatsappNumber">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">WhatsApp Number</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-9 pull-left">
                        <input type="tel" name="verifyWhatsappNumber" id="nriWhatsappNumber"
                            class="form-control whatsAppNumber col-md-12" placeholder="Enter The whatsapp number">
                        <input type="hidden" name="phone_number[main]" id="code" />
                    </div>
                    <div class="col-md-3 pull-left">
                        <span class="btn btn-info btn-textchange" onclick="verifyWhatsappNumber();">Send OTP</span>
                    </div>
                </div></br>
                <div class="whats-Otp">
                    <input type="text" name="whastappnumber" id="nriwhatsAppOtp" class="form-control whatsAppNumber"
                        placeholder="Enter the Whatsapp OTP">
                    <span class="otp-warnign" style="display: none; color: red;">Invalid OTP value please check</span>
                </div>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-primary" onclick="verifyWhatsappOtp();">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-success fade" id="modal-updateWhatsappNumberStatus">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Status</h4>
            </div>
            <div class="modal-body">
                <p class="text-bold">
                    Great! Your WhatsApp number has been successfully updated.</p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-outline" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<div class="modal modal-danger fade" id="modal-checkSession">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">No data found!</h4>
            </div>
            <div class="modal-body">
                <p class="text-profileCheck">
                    please login again.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left updateProfile-OnLoad" data-dismiss="modal"
                    href="userlogin">Login</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-info fade" id="modal-checkEsign">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Update</h4>
            </div>
            <div class="modal-body">
                <p class="text-profileCheck">
                    please complete Esgin
                </p>
            </div>
            <div class="modal-footer">
                <a href="borroweragreedloan">
                    <button type="button" class="btn btn-outline pull-left">Esign</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-info fade" id="modal-checkEnach">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Update</h4>
            </div>
            <div class="modal-body">
                <p class="text-profileCheck">
                    please complete Enach
                </p>
            </div>
            <div class="modal-footer checkApplicationEnach">
                <a href="applicationEmandate">
                    <button type="button" class="btn btn-outline pull-left">Enach</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-info fade" id="modal-TofillReference_details">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reference Details!</h4>
            </div>
            <div class="modal-body">
                <p class="text-profileCheck">
                    Please fill the reference details.
                </p>
            </div>
            <div class="modal-footer">
                <a href="borrower_profilePage?ref=0">
                    <button type="button" class="btn btn-outline pull-right">Ok</button></a>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-success fade" id="modal-paywallet-Suceess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p class="text-profileCheck">

                    You have successfully renewed your validity.
                </p>
            </div>
            <div class="modal-footer">
                <a href="#">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Ok</button></a>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-warning fade" id="modal-validitydate-expiring">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Membership Renewal Reminder </h4>
            </div>
            <div class="modal-body">
                <p class="text-profileCheck">
                    <b> Your membership is expiring on <span class="mebershipexpiry"
                            style="font-size: 16px;"></span></b>.
                </p>

                <p class="text">You can pay a one-time annual fee and participate in multiple deals
                    throughout the validity.
                </p>


                <p> <span><b>NOTE : </b>if you have already paid to our HDFC account, <a href="lenderInquiries"
                            style="color: white;">please click here and upload the screenshot. Your membership validity
                            will be updated asap. </a></p>

                <p class="payThroughwallet">you can pay the membership fee through the below options.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right updateProfile-OnLoad" data-dismiss="modal"
                    style="margin-left:10px;" onclick="skipvalidity();">Skip</button>

                <button type="button" class="btn btn-outline pull-right renwel_unsubscribe"
                    onclick="renewalUnsbscribtion();" style="margin-left:10px;"> Disable Email Notifications</button>



                <button type="button" class="btn btn-warning btn-outline">
                    <a href="paymembership" class="fl refEarnings getmembership_new pull-right btn-outline"
                        style="color:white"><i class="fa fa-angle-double-right"></i> Get Membership </a>

                </button>


                <!--  <button type="button" class="btn btn-outline pull-right updateProfile-OnLoad"
                    onclick="renewalValidityFee('false');" style="margin-right:5px">Payment gatewayy </button>

                <button type="button" class="btn btn-outline pull-right renwel_paythroughWallet"
                    onclick="modalPayThtoughwallet();" style="margin-right:5px;"> Pay through your wallet </button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-warning fade" id="modal-validitydate-expired">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Membership Renewal Reminder</h4>
            </div>
            <div class="modal-body">
                <p class="text-profileCheck">
                    <b> Your membership validity expired  <span class="mebershipexpiry"
                            style="font-size: 16px;"></span></b>.
                </p>

                <p class="text">You can renew with a one-time annual fee to participate in multiple deals throughout the validity.

                </p>

                <!-- <p>You can also pay a fee per deal and participate in that deal.</p> -->

                <p class="text_doc"> <b>NOTE : </b> If you have already paid to our HDFC account,

                    <a href="lenderInquiries" style="margin-left:1.5px;  color: white;">please click here and upload the
                        screenshot. Your membership validity will be updated as soon as possible</a>
                </p>

                <p class="payThroughwallet">
                    You can pay the membership fee through the following options below.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right updateProfile-OnLoad" data-dismiss="modal"
                    onclick="skipvalidity();" style="margin-left:10px;">Skip</button>


                <button type="button" class="btn btn-outline pull-right renwel_unsubscribe"
                    onclick="renewalUnsbscribtion();" style="margin-left:10px;"> Disable Email Notifications</button>

                <button type="button" class="btn btn-warning btn-outline text-white">
                    <a href="paymembership" class="fl refEarnings getmembership_new pull-right text-white"
                        style="color:white"> <i class="fa fa-angle-double-right"></i> Get Membership </a>
                </button>


                <!--    <button type="button" class="btn btn-outline pull-right updateProfile-OnLoad"
                    onclick="renewalValidityFee('false');" style="margin-right:5px">Payment gateway</button>


                <button type="button" class="btn btn-outline pull-right pay_Through-wallet"
                    onclick="modalPayThtoughwallet();" style="margin-right:5px;"> Pay through your wallet</button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-approve-walletFeepayThrough" tabindex="-1" role="dialog"
    aria-labelledby="modal-borrower-approve-user" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">

             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Membership</h4>
            </div>
            <div class="modal-body">
                <div align="center">
                    <h4>
                        Are you sure you want to pay the membership fee using your wallet? </h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success approveuser-Btn" data-reqid='' data-clickedid=""
                    onclick="payThroughwalletFunction();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>





<div class="modal fade" id="modal-approve-newmembership" tabindex="-1" role="dialog"
    aria-labelledby="modal-borrower-approve-user" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
               <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">MEMBERSHIP FEE </h4>
            </div>

            <div class="modal-body">
                <div align="left">
                    <h4>
                        Are you sure you want to pay the membership fee? </h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-warning approveuser-Btn pull-left newmembership_walletbtn"
                    data-reqid='' data-clickedid="" user-choosen="" fee-amount="" style="margin:3px"
                    onclick="payNewmembershipThroughwalletFunction();">Pay Through Wallet</button> &nbsp;&nbsp;
                &nbsp;&nbsp;

                <button type="button" class="btn  btn-success pull-left newmembership_btn" data-reqid=''
                    user-choosen="" style="margin:3px" onclick="paynewmembershiprenewalValidityFee('false');">Payment
                    Gateway</button>
                <button type="button" class="btn  btn-danger pull-left" style="margin:3px"
                    data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal-cancel-queryTicket" tabindex="-1" role="dialog" aria-labelledby="modal-approve-ticket"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
               <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">query</h4>
            </div>
            <div class="modal-body">
                <div align="center">
                    <h4>Are you sure you want to cancel the query?</h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success cancel-query-btn" data-reqid='' data-clickedid=""
                    onclick="cancelQueryRequest();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-cancel-withdrawTicketRequest" tabindex="-1" role="dialog"
    aria-labelledby="modal-approve-ticket" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
               <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">withdrawal</h4>
            </div>
            <div class="modal-body">
                <div align="center">
                    <h4>Are you sure you want to cancel the withdrawal Request ?</h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success cancel-withdraw-btn" data-requestType='' data-requestId=""
                    onclick="cancelWithdrawRequest();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>


<div class="modal modal-warning fade" id="modal-check-session-expire">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Warning!</h4>
            </div>
            <div class="modal-body">
                <p class="text-profileCheck">
                    Your Session will Expire Automatically in 5 Minutes.</br>
                    Select Continue Session to Extend Your session.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Ok</button>
                <button type="button" class="btn btn-outline btn-outline pull-left" onclick="getNewTime();">Continue
                    Session</button>
                <button type="button" class="btn btn-outline pull-left" onclick="signout();">End session now</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>





<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-84545654-1"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());
gtag('config', 'UA-84545654-1');
</script>
<!-- <link rel="stylesheet" type="text/css" href="build/css/intlTelInput.css">
<link rel="stylesheet" type="text/css" href="build/css/intlTelInput.min.css"> -->


<link rel="stylesheet" type="text/css" href="build/css/intlTelInput.css">
<link rel="stylesheet" type="text/css" href="build/css/intlTelInput.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput.min.js"></script>


<script type="text/javascript">
$(document).ready(function() {
    var mywnum = document.querySelector("#verifyWhatsappNumber");
    window.intlTelInput(mywnum, {
        utilsScript: "build/js/utils.js",
        separateDialCode: true,
        hiddenInput: "full",
        initialCountry: "IN",
        preferredCountries: ["us"],
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    var nri = document.querySelector("#nriWhatsappNumber");
    window.intlTelInput(nri, {
        utilsScript: "build/js/utils.js",
        separateDialCode: true,
        hiddenInput: "full",
        initialCountry: "IN",
        preferredCountries: ["us"],
    });
});
</script>
<style type="text/css">
#verifyWhatsappNumber {
    width: 100%;
}

.iti {
    width: 100%;
}
</style>



<script type="text/javascript">
$("#cityCheck").change(function() {
    var city = $("#cityCheck").val();
    if (city == "Others") {
        $("#userenterCity").show();
    }
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $("#header-signout").click(function(e) {
        const checksignout = document.getElementsByClassName("checksignout");
        if (checksignout[0].classList.contains('open')) {
            setTimeout(() => {
                $(".checksignout").removeClass("open");
            }, 100)
        } else {
            setTimeout(() => {
                $(".checksignout").addClass("open");
            }, 100)

        }
    });

    // Check if there's a hash in the current URL
    if (window.location.hash) {
        // Use history.replaceState() to remove the hash
        history.replaceState({}, document.title, window.location.pathname);
    }

});
</script>


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-QM0HEXWXSF"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());

gtag('config', 'G-QM0HEXWXSF');
</script>


</body>

</html>