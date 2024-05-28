<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Personal Details
            <small>Your personal information</small>
        </h1>
        <ol class="breadcrumb">
            <li><button class="btn btn-success" onclick="profileUpdateWhatsapp();"><i class="fa fa-whatsapp"></i> Update Your
                     Number</button></li>

            <li class="active">My profile</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <input type="hidden" name="mobileOtpHidden" value="" id="mobileOtpHidden">
                    </div>
                    <!-- maincontent starts -->
                    <div class="main-cont borrowerprofile">
                        <div class="container">
                            <div class="middle-block">
                                <div class="form-block1 block-loan">
                                    <form id="borrowermobileSection" autocomplete="off" method="post">
                                        <!--<h3>Ready to get started</h3>
                    <small>Create an account as borrower</small> -->

                                        <div class="step1">

                                            <!-- Address Form Starts -->
                                            <div class="panel-group" id="accordion" role="tablist"
                                                aria-multiselectable="true">
                                                <!-- Address1 Tab1 -->
                                                <div class="panel panel-default verify_pan_no">
                                                    <div class="panel-heading" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                <b>Lender Profile Details</b>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne" class="panel-collapse collapse in"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            <div class="form-lft">
                                                                <label for="first name">First Name<em
                                                                        class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" id="firstnamevalue"
                                                                        name="firstname" class="text-fld1 "
                                                                        placeholder="First Name">
                                                                    <span class="error firstnameerror"
                                                                        style="display: none;">Please enter First
                                                                        name</span>

                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft">
                                                                <label for="middle name">Middle Name:</label>
                                                                <div class="fld-block">
                                                                    <input type="text" id="middletname"
                                                                        name="middletname" class="text-fld1"
                                                                        placeholder="Middle Name">
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft">
                                                                <label>Last Name :</label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="Last Name"
                                                                        id="lastnamevalue" name="lastname"
                                                                        class="text-fld1">
                                                                    <span class="error lastnameerror"
                                                                        style="display: none;">Please enter Last
                                                                        name</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="form-lft">
                                                                <label>PAN Number<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="PAN Number"
                                                                        id="pannumber" name="pannumber"
                                                                        class="text-fld1" readonly> 
                                                                    <span class="error pannumbererror"
                                                                        style="display: none;">Please Enter a Valid PAN
                                                                        Number</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="form-lft">
                                                                <label>Aadhaar Number</label>
                                                                <div class="fld-block">
                                                                    <input type="number"placeholder="Aadhar Number"
                                                                        id="adharcardNo" name="Aadhar"
                                                                        class="text-fld1" maxlength="12"oninput="numOnly(this.id);"
                                                                        
                                                                          required/>
                                                                    <span class="error adharnumbererror"
                                                                        style="display: none;">Aadhaar Number</span>

                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>


                                                            <div class="form-lft aadharOtp" style="display:none;">
                                                                <label>Aadhaar OTP</label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="Enter Aadhar Otp"
                                                                        id="adharOtp" name="numberAadharOtp"
                                                                        class="text-fld1" maxlength="6">
                                                                    <span class="error adharOtpNo"
                                                                        style="display: none;">Aadhaar Otp</span>

                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>



                                                            <div class="form-lft">
                                                                <label>Birth Date<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="dd/mm/yyyy"
                                                                        id="dateofbirth" name="dob" class="text-fld1" readonly>
                                                                    <i><img src="<?php echo base_url(); ?>assets/images/calender.png"
                                                                            alt="calender" id=""></i>
                                                                    <span class="error dateofbirtherror"
                                                                        style="display: none;">Please enter birth
                                                                        date</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft">
                                                                <label>Father Name<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="Father Name"
                                                                        id="fathername" name="fathername"
                                                                        class="text-fld1">
                                                                    <span class="error fathernameerror"
                                                                        style="display: none;">Please enter Father
                                                                        Name</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="form-lft">
                                                                <label>Mobile No</label>
                                                                <div class="fld-block">
                                                                    <em class="mobile1">+91</em>
                                                                    <div class="mobile22">
                                                                        <input type="number" placeholder="xxx-xxx-xxxx"
                                                                            id="bmobileNumber" name="bmobileNumber"
                                                                            class="mobile2" readonly>
                                                                    </div>

                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft">
                                                                <label>WhatsApp No</label>
                                                                <div class="fld-block">
                                                                    <em class="mobile1">+91</em>
                                                                    <div class="mobile22">
                                                                        <input type="number" placeholder="Enter WhatsApp Number With Country code"
                                                                            id="lwhatsAppNumber" name="bmobileNumber"
                                                                            class="mobile2"
                                                                            maxlength="10" >
                                                                    </div>

                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft">
                                                                <label>Email ID</label>
                                                                <div class="fld-block">
                                                                    <input type="email" placeholder="E-mail..."
                                                                        name="emailValue" id="emailValue"
                                                                        class="text-fld text-fld1" readonly="true">

                                                                    <span class="error emailError"
                                                                        style="display: none;">Enter Valid Email</span>
                                                                    <!-- <div class="verify_btn"><img src="images/verify.png" alt="arrow" id="emailverifybutton"></div> -->
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div id="" class="form-lft">
                                                                <label>Residence Address<em
                                                                        class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <textarea col="4" rows="4"
                                                                        id="residenceAddress"></textarea>
                                                                    <span class="error residenceAddressError"
                                                                        style="display: none;">Please enter Residence
                                                                        Address</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft form_radio form_check">
                                                                <div class="st_checkbox no_bdr">
                                                                    <label class="checkbox">Same as Residence Address
                                                                        <input type="checkbox" name="sameAsId"
                                                                            id="sameAsId"><span> &nbsp;</span>
                                                                    </label>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <br>
                                                            <div class="form-lft">
                                                                <label>Permanent Address<em
                                                                        class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <textarea col="4" rows="4"
                                                                        id="permanentAddress"></textarea>
                                                                    <span class="error permanentAddressError"
                                                                        style="display: none;">Please enter permanent
                                                                        Address</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="statepin">
                                                                <label>Pin Code<em class="mandatory">*</em></label>
                                                                <input type="text" name="" id="pincode"
                                                                    placeholder="Pin Code">
                                                                <span class="error pincodeError"
                                                                    style="display: none;">Please enter pincode</span>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="statepin">
                                                                <label>Locality<em class="mandatory">*</em></label>
                                                                <div class="fld-block citydrop">
                                                                    <select name="locality" id="localityValue"
                                                                        class="form-control">
                                                                        <option value="">Select locality</option>

                                                                    </select>

                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>

                                                            <!--  <div class="statepin">
                                    <label>City:</label>
                                    <input type="text" name="" id="city" placeholder="City">
                                    <span class="error cityError" style="display: none;">Please enter pincode to populate city</span>
                                    <div class="clear"></div>
                                  </div> -->

                                                            <div class="statepin">
                                                                <label>City<em class="mandatory">*</em></label>
                                                                <div class="fld-block citydrop">
                                                                    <select name="city" id="city" class="form-control">
                                                                        <option value=""> Select City</option>
                                                                        <option value="Hyderabad">Hyderabad</option>
                                                                        <option value="Bangalore">Bangalore</option>
                                                                        <option value="Mumbai">Mumbai</option>
                                                                        <option value="Delhi">Delhi</option>
                                                                        <option value="Kolkata">Kolkata</option>
                                                                        <option value="Chennai">Chennai</option>
                                                                        <option value="Pune">Pune</option>
                                                                        <option value="Visakhapatnam">Visakhapatnam
                                                                        </option>
                                                                        <option value="Vijayawada">Vijayawada</option>
                                                                        <option value="Other">Other</option>

                                                                    </select>
                                                                    <span class="error cityError"
                                                                        style="display: none;">Please Select the
                                                                        city</span>
                                                                    <input type="text" name="others" class="cityValue"
                                                                        id="lenderothers" placeholder='Enter City'
                                                                        style='display:none;' />
                                                                    <!--   <input type="text" placeholder="City" name="city" class="text-fld1" id="cityValue" readonly="true"> -->

                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="statepin">
                                                                <label>State</label>
                                                                <input type="text" name="" id="state"
                                                                    placeholder="State">
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                            <br>

                                                            <!--  <div class="statepin">
                                    <label>Education<em class="mandatory">*</em></label>
                                    <div class="fld-block Educationdrop">
                                      <select  name="usereducation" id="usereducationDrop" class="form-control">
                                      
                                      </select>
                                      <span class="error eduError" style="display: none;">Please  choose the Education</span>
                                    </div>
                                    <div class="clear"></div>
                                  </div> -->
                                                            <!-- <div class="statepin">
                                    <label>Passion <em class="mandatory">*</em></label>

                                    <div class="fld-block citydrop">
                                      <select  name="passion" id="userpassionDrop" class="form-control">
                                      
                                      </select>
                                      <span class="error passionTypeError" style="display: none;">Please  choose the Passion</span>
                                      
                                    
                                    </div>
                                    
                                    <div class="clear"></div>
                                  </div> -->
                                                            <div class="clear"></div>

                                                            <div class="statepin educationHide" style="display: none;">
                                                                <!-- <label>Education<em class="mandatory">*</em></label> -->
                                                                <div class="fld-block Educationdrop">
                                                                    <input type="text" name="EducationOthers"
                                                                        id="usereducationHide"
                                                                        placeholder="Enter The Education"
                                                                        class="col-md-12"
                                                                        style="width: 100%!important;">
                                                                    <span class="error edutypeError"
                                                                        style="display: none;">Enter your
                                                                        Education</span>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="statepin passiontypeHide"
                                                                style="display: none;">
                                                                <div class="fld-block citydrop">
                                                                    <input type="text" name="EducationOthers"
                                                                        id="userpassionHide"
                                                                        placeholder="Enter your passion"
                                                                        class="col-md-12"
                                                                        style="width: 100%!important;">
                                                                    <span class="error passionError"
                                                                        style="display: none;">Enter Your Passion</span>


                                                                </div>

                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>

                                                            <div class="form-lft">
                                                                <label for="facebookUrl">Facebook URL</label>
                                                                <div class="fld-block">
                                                                    <!--<input type="text" id="facebookUrl" name="facebookUrl" class="text-fld1" placeholder="Facebook URL">  -->
                                                                    <textarea type="text" id="facebookUrl"
                                                                        name="facebookUrl" class="text-fld1"
                                                                        placeholder="Facebook URL"></textarea>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="form-lft">
                                                                <label for="Linkedin">Linkedin URL</label>
                                                                <div class="fld-block">
                                                                    <!-- <input type="text" id="linkedinUrl" name="linkedinUrl" class="text-fld1" placeholder="Linkedin URL">  -->
                                                                    <textarea type="text" id="linkedinUrl"
                                                                        name="linkedinUrl" class="text-fld1"
                                                                        placeholder="Linkedin URL"></textarea>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft">
                                                                <label for="Twitter">Twitter URL</label>
                                                                <div class="fld-block">
                                                                    <!--   <input type="text" id="twitterUrl" name="twitterUrl" class="text-fld1" placeholder="Twitter URL"> -->
                                                                    <textarea type="text" id="twitterUrl"
                                                                        name="twitterUrl" class="text-fld1"
                                                                        placeholder="Twitter URL"></textarea>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <button type="button" class="btn btn-primary pull-right "
                                                                id="lender-profile-btn">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Address1 Tab2 -->
                                                <div class="panel panel-default userbank_verifyData">
                                                    <div class="panel-heading" role="tab" id="headingTwo">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseTwo"
                                                                aria-expanded="false" aria-controls="collapseTwo">
                                                                <b>Bank Details </b>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseTwo" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingTwo">
                                                        <div class="panel-body">

                                                            <div class="form-lft">
                                                                <label>Account No<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="Account Number"
                                                                        id="accountno" name="accountno"
                                                                        class="text-fld1">
                                                                    <span class="error accountnoError"
                                                                        style="display: none;">Please enter account
                                                                        number</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft">
                                                                <label>Confirm Account No<em
                                                                        class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="number"
                                                                        placeholder="Confirm Account Number"
                                                                        id="confirmaccountno" name="accountno"
                                                                        class="text-fld1">
                                                                    <span class="error confirmaccountnoError"
                                                                        style="display: none;">Please Review The Bank
                                                                        Account Number</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="form-lft">
                                                                <label>IFSC Code<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="IFSC Code"
                                                                        id="bankifscCode" name="IFSCCode"
                                                                        class="text-fld1 IFSCCode" maxlength="11">
                                                                    <span class="error IFSCCodeerror"
                                                                        style="display: none;">Please enter
                                                                        IFSCCode</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>


                                                            <div class="form-lft bankUserName" style="display: none;">
                                                                <label>Your Name<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text"
                                                                        placeholder="Enter  your Name as Per Bank Account"
                                                                        id="name" name="name"
                                                                        class="text-fld1 fetchUsername">
                                                                    <span class="error nameError"
                                                                        style="display: none;">Please enter name</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft bankName" style="display: none;">
                                                                <label>Bank Name<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="Bank Name"
                                                                        id="bankname" name="bankname"
                                                                        class="text-fld1 fetchBankName">
                                                                    <span class="error banknameError"
                                                                        style="display: none;">Please enter your bank's
                                                                        name.</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="form-lft form-mob bankBranch"
                                                                style="display: none;">
                                                                <label>Branch<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="Branch"
                                                                        class="text-fld1 fetchBranch" name="Branch"
                                                                        id="Branch">
                                                                    <span class="error branchError"
                                                                        style="display: none;">Please enter your bank's
                                                                        branch details.</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft form-otp bankCity"
                                                                style="display: none;">
                                                                <label>City<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="City" name="city"
                                                                        class="text-fld1 fetchBankCity" id="cityValue">
                                                                    <span class="error cityValueError"
                                                                        style="display: none;">Please enter the city
                                                                        where your bank is located</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                                <br>

                                                            </div>

                                                            <div class="clear"></div>


                                                            <div class="form-lft form-mob bankBranch">
                                                                <label>Mobile No<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="number" placeholder="Mobile no"
                                                                        class="text-fld1 otpmobileno" name="otpmobileno"
                                                                        id="otpmobileno">
                                                                    <span class="error mobileError"
                                                                        style="display: none;">Enter Mobile no</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="form-lft form-otp MobileOtpsec"
                                                                style="display:none">
                                                                <label>OTP<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="number" placeholder="OTP"
                                                                        name="mobileotpinput"
                                                                        class="text-fld1 mobileotpinput"
                                                                        id="mobileotpinput" readonly>
                                                                    <span class="error otperrormessage"
                                                                        style="display: none;">Please enter Otp</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                                <br>

                                                            </div>

                                                            <div class="clear"></div>
                                                            <div class="row form-lft">
                                                                <button type="button" class="btn btn-primary pull-right"
                                                                    id="user-bank-btn"
                                                                    style="display: none;">Confirm</button>

                                                                <button type="button" class="btn pull-right"
                                                                    id="user-otp-btn"
                                                                    style="margin-right:3px;color: white; background-color: black;"><i
                                                                        class="fa fa-mobile fa-sm"
                                                                        style="margin-right:4px;"></i>Send Otp</button>

                                                                <button type="button" class="btn btn-success pull-right"
                                                                    id="user-bank-verify"
                                                                    style="margin-right:4px;display: none;"> <i
                                                                        class="fa fa-bank" style="font-size:16px"></i>
                                                                    verify</button>
                                                            </div>
                                                            <div class="clear"></div>
                                                            <div class="row form-lft">
                                                                <code>Note :</code>
                                                                <h6>your interest & principal will be transferred to the
                                                                    above mention account.</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Address1 Tab3 -->
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingThree">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseThree"
                                                                aria-expanded="false" aria-controls="collapseThree">
                                                                <b>Lender Nominee Details </b>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingThree">

                                                        <div class="panel-body">
                                                            <div class="form-lft" style="display: none;">
                                                                <label>User Id:</label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="Enter user Id"
                                                                        id="userid" name="userid" class="text-fld1"
                                                                        readonly="true">
                                                                    <span class="error useridError"
                                                                        style="display: none;">Please enter user
                                                                        id</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft">
                                                                <label>Nominee Name<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text"
                                                                        placeholder="Enter Nominee Name as Per Bank Account"
                                                                        id="name1" name="name" class="text-fld1">
                                                                    <span class="error nameError"
                                                                        style="display: none;">Please enter Nominee
                                                                        Name</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft">
                                                                <label>Relation<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="Enter Relationas"
                                                                        id="relation" name="relation" class="text-fld1">
                                                                    <span class="error relationError"
                                                                        style="display: none;">Please enter
                                                                        Relation</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft">
                                                                <label>Nominee Email<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="email"
                                                                        placeholder="Enter Nominee Email" id="email"
                                                                        name="email" class="text-fld1">
                                                                    <span class="error emailError"
                                                                        style="display: none;">Please enter Email</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="form-lft">
                                                                <label>Nominee Mobile Number<em
                                                                        class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="number"
                                                                        placeholder="Enter Mobile Number"
                                                                        id="mobileNumber" name="mobileNumber"
                                                                        class="text-fld1" maxlength="10">
                                                                    <span class="error mobileNumberError"
                                                                        style="display: none;"> Mobile
                                                                        Number should be 10 degits</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft">
                                                                <label>Account No<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="number" placeholder="Account Number"
                                                                        id="accountno1" name="accountno"
                                                                        class="text-fld1" minlength="9" maxlength="18">
                                                                    <span class="error accountnoError"
                                                                        style="display: none;">Please enter account
                                                                        number</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="form-lft">
                                                                <label>IFSC Code<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="IFSC Code"
                                                                        id="IFSCCode1" name="IFSCCode"
                                                                        class="text-fld1 IFSCCode1" maxlength="11">
                                                                    <span class="error IFSCCodeerror"
                                                                        style="display: none;">Please enter
                                                                        IFSCCode</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft">
                                                                <label>Bank Name<em class="mandatory">*</em>:</label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="Bank Name"
                                                                        id="bankname1" name="bankname"
                                                                        class="text-fld1">
                                                                    <span class="error banknameError"
                                                                        style="display: none;">Please enter
                                                                        bankname</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="form-lft form-mob">
                                                                <label>Branch<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="Branch"
                                                                        class="text-fld1" name="Branch" id="Branch1">
                                                                    <span class="error branchError"
                                                                        style="display: none;">Please enter
                                                                        Branch</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft form-otp">
                                                                <label>City<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="City" name="city"
                                                                        class="text-fld1" id="cityValue1">
                                                                    <span class="error cityValueError"
                                                                        style="display: none;">Please enter City</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                                <br>
                                                                <button type="button" class="btn btn-primary pull-right"
                                                                    id="lender-nominee-btn">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Address1 Tab4 -->
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingFour">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseFour"
                                                                aria-expanded="false" aria-controls="collapseFour">
                                                                <b>Upload KYC </b>
                                                            </a>
                                                        </h4>

                                                    </div>
                                                    <div id="collapseFour" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingFour">


                                                        <div class="panel-body" id="userKYCUpload"
                                                            enctype="multipart/form-data">
                                                            <div class="form-lft kycproofs">
                                                                <label>Pan Card<b style="color:red"> (Pan
                                                                        Card)</b></label>
                                                                <div class="fld-block upload_pdf">
                                                                    <input
                                                                        class="custom-file-input panFileUpload pan-file-upload-content"
                                                                        id="pan" type='file' onchange="readPAN(this);"
                                                                        onclick="$('.panFileUpload')"
                                                                        accept="image/*" />
                                                                    <!-- <input type="file" class="custom-file-input"> -->
                                                                    <a href="#" class="pancard "
                                                                        onclick="viewDoc('PAN')"> </a>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft kycproofs">
                                                                <label>cheque leaf <b style="color:red"> (cheque
                                                                        leaf)</b></label>
                                                                <div class="fld-block upload_pdf">
                                                                    <input
                                                                        class="custom-file-input chequeleaf pan-file-upload-content"
                                                                        id="cheque" type='file'
                                                                        onchange="chequeLeafs(this);"
                                                                        onclick="$('.chequeFileUpload')"
                                                                        accept="image/*" />
                                                                    <a href="#" class="chequeleaf "
                                                                        onclick="viewDoc('CHEQUELEAF')"> </a>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>


                                                            <h3>Address Proof Documents<small>(NOTE: Upload any one of
                                                                    the documents given below)</small></h3>

                                                            <div class="form-lft kycproofs">
                                                                <label>Aadhar<b style="color:red"> (Aadhar)</b></label>
                                                                <div class="fld-block upload_pdf">
                                                                    <input class="custom-file-input aadharFileUpload"
                                                                        type='file'
                                                                        onchange="readDocument(this, 'AADHAR', 'aadhar');"
                                                                        id="aadhar" accept="image/*" />
                                                                    <a href="#" class="Aadhardoc"
                                                                        onclick="viewDoc('AADHAR')"></a>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft kycproofs">
                                                                <label>Driving license<b style="color:red"> (Driving
                                                                        license)</b></label>
                                                                <div class="fld-block upload_pdf">
                                                                    <input
                                                                        class="custom-file-input drivinglicenceFileUpload "
                                                                        type='file'
                                                                        onchange="readDocument(this,'DRIVINGLICENCE','drivinglicence');"
                                                                        id="drivinglicence" accept="image/*" />
                                                                    <a href="#" class="DrivingLicenseDoc"
                                                                        onclick="viewDoc('DRIVINGLICENCE')"></a>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft kycproofs">
                                                                <label>VoterID<b style="color:red"> (Voter
                                                                        Id)</b></label>
                                                                <div class="fld-block upload_pdf">
                                                                    <input class="custom-file-input voteridFileUpload "
                                                                        type='file'
                                                                        onchange="readDocument(this,'VOTERID' ,'voterid');"
                                                                        id="voterid" accept="image/*" />
                                                                    <a href="#" class="voteridDoc"
                                                                        onclick="viewDoc('VOTERID')"></a>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft kycproofs">
                                                                <label>Passport<b style="color:red">
                                                                        (Passport)</b></label>
                                                                <div class="fld-block upload_pdf">
                                                                    <input class="custom-file-input passportFileUpload"
                                                                        type='file' onchange="readPASSPORT(this);"
                                                                        id="passport" accept="image/*" />
                                                                    <a href="#" class="Passportdoc"
                                                                        onclick="viewDoc('PASSPORT')"></a>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="clear"></div>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- maincontent ends -->

            </div>

        </div><!-- maincontent ends -->
</div>
</section>
</div>
<!-- maincontent ends -->
<!-- container ends -->
<!-- wrapper ends -->
<!-- SET: SCRIPTS -->
<link rel="stylesheet" href="assets/css/selectize.default.css">
<link rel="stylesheet" href="assets/css/dd.css">
<link rel="stylesheet" href="assets/css/animate.css">
<link rel="stylesheet" href="assets/css/responsive.css">
<link rel="stylesheet" href="assets/css/bootstrap.css">
<!--<link rel="stylesheet" href="assets/css/font-awesome.css"> -->
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/js/myscript.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/animation.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/selectize.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dd.js?oxyloans=<?php echo time(); ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- END: SCRIPTS -->
<!-- END: SCRIPTS -->
<script type="text/javascript">
$(document).ready(function() {
    $('#confirmaccountno').on("cut copy paste", function(e) {
        e.preventDefault();
    });

    $("#usereducationDrop").change(function() {

        var useredu = $("#usereducationDrop").val();
        if (useredu == 'Other') {
            $(".educationHide").show();
            $(".educationHide").fadeOut(200).fadeIn(200).fadeOut(200).fadeIn(200);
        } else {
            $(".educationHide").hide();
        }
    });
    $("#userpassionDrop").change(function() {
        var Passion = $("#userpassionDrop").val();

        if (Passion == 'Other') {
            $(".passiontypeHide").show();
            $(".passiontypeHide").fadeOut(200).fadeIn(200).fadeOut(200).fadeIn(200);
        } else {

            $(".passiontypeHide").hide()
        }

    });
})
</script>
<script type="text/javascript">
loadpersonalallDetails();
setKYCvars();
getKYC();
// getLenderPassonEducation();
loadlendernomineeDetails();
UpdatedNewBankDetails();
// getLenderPassion();
setTimeout(()=>{
 getVerifyPan();
},3000);
  

$(document).ready(function() {
    noprofileCheck = "no";
    noROICheck = "no";
});
$('#radioId input:radio').click(function() {
    $('#salDiv,selfDiv').removeClass('form_radio_block1_show');
    $('#salDiv,selfDiv').addClass('form_radio_block1_hide');
    if ($(this).val() === 'sal') {
        $('#salDiv').addClass('form_radio_block1_show');
        $('#selfDiv').removeClass('form_radio_block1_show');

    } else if ($(this).val() === 'self') {
        $('#selfDiv').addClass('form_radio_block1_show');
        $('#salDiv').removeClass('form_radio_block1_show');

    }
});
$('#sameAsId').click(function() {
    if ($(this).prop("checked") == true) {
        $('#sameAsDiv').addClass('form_radio_block1_hide');
    } else if ($(this).prop("checked") == false) {
        $('#sameAsDiv').removeClass('form_radio_block1_hide');
    }
});
</script>

<div class="modal modal-success fade" id="modal-fileUploadedSuccessfully">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>

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


<div class="modal modal-success fade" id="modal-profileSuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>
                    Your personal details have been saved successfully.</p>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-success fade" id="modal-personalprofileSuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Your profile details are successfully completed.</p>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" class="closeProfile">
                    <button type="button" class="btn btn-outline pull-left">Close</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-success fade" id="modal-bankSuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>
                    Your bank details have been saved successfully.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-success fade" id="modal-lenderNominee">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>
                    Your nominee details have been saved successfully.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-default  fade" id="modal-profileverifyWhatsappNumber">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    Update your WhatsApp number.</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-9 pull-left">
                        <input type="tel" name="verifyWhatsappNumber" id="verifyWhatsappNumber"
                            class="form-control whatsAppNumber col-md-12" maxlength="10">
                        <input type="hidden" name="phone_number[main]" id="code" />
                        <span class="error messagefornonnriwhatsApp" style="display:none">Enter your 10 digits WhatsApp
                            number.</span>
                    </div>
                    <div class="col-md-3 pull-left mobile_Pad">
                        <span class="btn btn-info btn-textchange" onclick="verifyWhatsappNumber();">Send OTP</span>
                    </div>
                </div></br>
                <div class="whats-Otp">
                    <input type="text" name="whastappnumber" id="whatsAppOtp" class="form-control whatsAppNumber"
                        placeholder="Enter the Whatsapp OTP" maxlength="4">
                    <span class="otp-warnign" style="display: none; color: red;">Enter Valid OTP it should be 4 digits</span>
                </div>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-primary" onclick="profilUpdateWhatsapp();">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-success fade" id="modal-profileupdateWhatsappNumberStatus">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Status</h4>
            </div>
            <div class="modal-body">
                <p class="text-bold">Your Number Successfully Updated</p>
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


<div class="modal modal-warning fade" id="modal-profile-not-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title">Oops!</h6>
            </div>
            <div class="modal-body-profile">
                <h6 class="">Nominee details not filled </h6>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-outline" data-dismiss="modal"
                        onclick="usernotuploadedprofile('nomine');">Ok</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal modal-warning fade" id="modal-profilesession-not-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title">Oops!</h6>
            </div>
            <div class="modal-body-profile">
                <h6 class=""> Profile details not filled </h6>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-outline" data-dismiss="modal"
                        onclick="usernotuploadedprofile('profile');">Ok</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-warning fade" id="modal-bank-not-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title">Oops!</h6>
            </div>
            <div class="modal-body-profile">
                <h6 class="">Bank details not filled </h6>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-outline" data-dismiss="modal"
                        onclick="usernotuploadedprofile('bank');">Ok</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-warning fade" id="modal-aadhar-verify">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title">Oops!</h6>
            </div>
            <div class="modal-body">
                <h6 class="bodyData"> </h6>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-outline" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-success fade" id="modal-aadhar-verify-otp">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title">Thanks!</h6>
            </div>
            <div class="modal-body">
                <h6 class="bodyData">Aadhar Successfully verified</h6>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-outline" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<?php include 'footer.php';?>