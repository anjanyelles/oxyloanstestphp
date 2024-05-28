<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>

<?php
 $isrefUser =  isset($_GET['ref']) ? $_GET['ref'] : 'true';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Personal Details
            <small>Your personal information</small>
        </h1>
        <ol class="breadcrumb">
            <li><button class="btn btn-success" onclick="profileUpdateWhatsapp();"><i class="fa fa-whatsapp"
                        height="20"></i></button></li>
            <li class="active">My Profile</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <input type="hidden" name="mobileOtpHidden" value="" id="mobileOtpHidden">
                    </div>

                    <div class="main-cont borrowerprofile">

                        <div class="middle-block">
                            <div class="form-block1 block-loan">
                                <form id="borrowermobileSection" autocomplete="off" method="post">
                                    <div class="step1">
                                        <!-- Address Form Starts -->
                                        <div class="panel-group" id="accordion" role="tablist"
                                            aria-multiselectable="true">
                                            <!-- Address1 Tab1 -->
                                            <div class="panel panel-default verify_pan_no">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                            href="#collapseOne" aria-expanded="true"
                                                            aria-controls="collapseOne">
                                                            <b>Borrower Profile Details</b>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                                    aria-labelledby="headingOne">
                                                    <div class="panel-body">

                                                        <div class="form-lft">
                                                            <label for="first name">First Name<em
                                                                    class="mandatory">*</em></label>
                                                            <div class="fld-block">
                                                                <input style="color: #000;" class="text-fld1 "
                                                                    type="text" id="firstnamevalue" name="firstname"
                                                                    placeholder="First Name">

                                                                <span class="error firstnameerror"
                                                                    style="display: none;">Please enter First
                                                                    name</span>

                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>

                                                        <div class="form-lft">
                                                            <label for="middle name">Middle Name</label>
                                                            <div class="fld-block">
                                                                <input type="text" id="middletname" name="middletname"
                                                                    class="text-fld1" placeholder="Middle Name">
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>

                                                        <div class="form-lft">
                                                            <label>Last Name <em class="mandatory"></em> </label>
                                                            <div class="fld-block">
                                                                <input type="text" placeholder="Last Name"
                                                                    id="lastnamevalue" name="lastname"
                                                                    class="text-fld1">
                                                                <span class="error lastnameerror"
                                                                    style="display: none;">Please enter Last name</span>


                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>

                                                        <div class="form-lft">
                                                            <label>PAN Number<em class="mandatory">*</em></label>
                                                            <div class="fld-block">
                                                                <input type="text" placeholder="PAN Number"
                                                                    id="pannumber" name="pannumber" class="text-fld1">

                                                                <span class="error pannumbererror"
                                                                    style="display: none;">Please Enter Valid PAN
                                                                    Number</span>

                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>



                                                        <div class="form-lft">
                                                            <label>Aadhaar Number</label>
                                                            <div class="fld-block">
                                                                <input type="text" placeholder="Aadhar Number"
                                                                    id="adharcardNo" name="numberAadhar"
                                                                    class="text-fld1" maxlength="12">
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
                                                                    id="dateofbirth" name="dob" class="text-fld1">
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
                                                                    id="fathername" name="fathername" class="text-fld1">

                                                                <span class="error fathernameerror"
                                                                    style="display: none;">Please enter Father
                                                                    Name</span>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>


                                                        <div class="form-lft">
                                                            <label>Mobile No<em class="mandatory">*</em></label>
                                                            <div class="fld-block">
                                                                <em class="mobile1">+91</em>
                                                                <div class="mobile22">
                                                                    <input type="text" placeholder="xxx-xxx-xxxx"
                                                                        id="bmobileNumber" name="bmobileNumber"
                                                                        class="mobile2" readonly>
                                                                </div>


                                                                <span class="error mobileNumbererror"
                                                                    style="display: none;">Please enter Mobile
                                                                    Number</span>

                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>

                                                        <div class="form-lft">
                                                            <label>WhatsApp No<em class="mandatory">*</em></label>
                                                            <div class="fld-block">
                                                                <em class="mobile1">+91</em>
                                                                <div class="mobile22">
                                                                    <input type="text" placeholder="xxx-xxx-xxxx"
                                                                        id="lwhatsAppNumber" name="bwhatsAppNumber"
                                                                        class="mobile2">
                                                                </div>

                                                                <span class="error mobileNumbererror"
                                                                    style="display: none;">Please enter WhatsApp
                                                                    Number</span>

                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        <div class="form-lft">
                                                            <label>Email ID<em class="mandatory">*</em></label>
                                                            <div class="fld-block">
                                                                <input type="email" placeholder="E-mail..."
                                                                    name="emailValue" id="emailValue"
                                                                    class="text-fld text-fld1" readonly="true">

                                                                <span class="error emailValueerror"
                                                                    style="display: none;">Enter Valid Email</span>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        <!-- <div class="form-lft">
                                                            <label>Borrow Type<em class="mandatory">*</em></label>
                                                            <div class="fld-block">
                                                                    <select class="select1 selectize-studentloan " id="studentOrNot" >
                                                                         <option value="false">Choose Borrow Type</option>
                                                                        <option value="true">Student  </option>
                                                                         <option value="false">Personal</option>
                                                                    </select>
                                    
                                                                <span class="error studentOrNoterror"
                                                                    style="display: none;">Choose Borrow Type</span>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div> -->


                                                        <div class="form-lft">
                                                            <label>Loan Amount </label>
                                                            <select id="select-beast" class="select1"
                                                                placeholder="Enter or Select the Amount..."
                                                                name="borrowerAmtValue">
                                                                <option value="">Enter or Select the Amount...</option>
                                                                <option value="10000">10000</option>
                                                                <option value="20000">20000</option>
                                                                <option value="30000">30000</option>
                                                                <option value="40000">40000</option>
                                                                <option value="50000">50000</option>
                                                                <option value="60000">60000</option>
                                                                <option value="70000">70000</option>
                                                                <option value="80000">80000</option>
                                                                <option value="90000">90000</option>
                                                                <option value="100000">100000</option>
                                                            </select>



                                                            <div class="clear"></div>

                                                            <span class="error loanAmounterror"
                                                                style="display: none; margin-left: 150px;">Please select
                                                                Loan amount</span>

                                                            <span class="error loanAmounterrorabove"
                                                                style="display: none;margin-left: 150px;">The loan
                                                                amount should be less than 1000000</span>


                                                        </div>

                                                        <h6> Borrower Category</h6>
                                                        <div id="radioId" class="form_radio st_radio no_bdr">
                                                            <div class="st_checkbox ">
                                                                <label class="radio">Salaried
                                                                    <input type="radio" name="option-1" value="SALARIED"
                                                                        id="option-1"><span> &nbsp;</span>
                                                                </label>
                                                            </div>

                                                            <div class="st_checkbox">
                                                                <label class="radio">Self-Employed
                                                                    <input type="radio" name="option-1"
                                                                        value="SELFEMPLOYED" id="option-1"><span>
                                                                        &nbsp;</span>
                                                                </label>
                                                            </div>

                                                            <div class="st_checkbox">
                                                                <label class="radio">Student
                                                                    <input type="radio" name="option-1" value="true"
                                                                        id="checkStudent"><span>
                                                                        &nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="fld-block">
                                                                <span class="error employmentError"
                                                                    style="display: none;">Please select Employement
                                                                    type</span>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>

                                                        <div id="salDiv" class="form_radio_block1_hide">
                                                            <div class="form-lft">
                                                                <label>Total Exp<em class="mandatory">*</em><b>(in
                                                                        yrs)</b>:</label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="Total Experience"
                                                                        id="totalexperience" name="totalexperience"
                                                                        class="text-fld1">
                                                                    <span class="error totalexperienceError"
                                                                        style="display: none;">Please enter Total
                                                                        experience</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft">
                                                                <label>Company<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="Company"
                                                                        id="company" name="Company" class="text-fld1">
                                                                    <span class="error companyError"
                                                                        style="display: none;">Please enter
                                                                        company</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft">
                                                                <label>Salary<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="Salary" id="salary"
                                                                        name="salary" class="text-fld1">
                                                                    <span class="error salaryError"
                                                                        style="display: none;">Please enter
                                                                        salary</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                        </div>
                                                        <div id="selfDiv" class="form_radio_block1_hide">
                                                            <div class="form-lft">
                                                                <label>Total Exp<em class="mandatory">*</em><b>(in
                                                                        yrs)</b>:</label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="Total Experience"
                                                                        id="experience" name="totalexperience"
                                                                        class="text-fld1">
                                                                    <span class="error totalexperienceError"
                                                                        style="display: none;">Please enter Total
                                                                        experience</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft">
                                                                <label>Occupation<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="Organization Name"
                                                                        id="companyName" name="Company"
                                                                        class="text-fld1">
                                                                    <span class="error companyError"
                                                                        style="display: none;">Please enter
                                                                        company</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft">
                                                                <label>Income<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="Salary"
                                                                        id="salaryAmount" name="salary"
                                                                        class="text-fld1">
                                                                    <span class="error salaryError"
                                                                        style="display: none;">Please enter
                                                                        salary</span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                        </div>

                                                        <div id="studentDiv" class="form_radio_block1_hide">
                                                            <div class="form-lft">
                                                                <label>Country<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="University Country"
                                                                        name="country" id="studentCountry"
                                                                        class="text-fld1 Country_student">
                                                                    <span class="error studentUniversityError"
                                                                        style="display: none;">
                                                                        Please enter the country of your university.
                                                                    </span>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft">
                                                                <label>University Name<em
                                                                        class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="University Name"
                                                                        id="studentUniversity" name="university"
                                                                        class="text-fld1">
                                                                    <span class="error StudentUniversityError"
                                                                        style="display: none;">Please enter the name of
                                                                        the university you are interested in going
                                                                        to</span>
                                                                    <div class="clear"></div>
                                                                </div>

                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft">
                                                                <label>Location<em class="mandatory">*</em></label>
                                                                <div class="fld-block">
                                                                    <input type="text" placeholder="University Location"
                                                                        id="studentLocation" name="IFSCCode"
                                                                        class="text-fld1 location">
                                                                    <span class="error studentLocationError"
                                                                        style="display: none;">Please enter the
                                                                        university mailing address..</span>

                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                        </div>
                                                        <br>
                                                        <div class="form-lft">
                                                            <label>Residence Address<em class="mandatory">*</em></label>
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
                                                            <label>Permanent Address<em class="mandatory">*</em></label>
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
                                                            <div class="fld-block loan_drop">
                                                                <select name="locality" id="localityValue"
                                                                    class="form-control">
                                                                    <option value="">Select locality</option>

                                                                </select>

                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>

                                                        <div class="clear"></div>
                                                        <div class="statepin">
                                                            <label>City<em class="mandatory">*</em></label>
                                                            <div class="fld-block loan_drop">
                                                                <select name="city" id="city" class="form-control">
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
                                                                <input type="text" name="others" id="others"
                                                                    placeholder='Enter City' style='display:none;' />
                                                                <span class="error cityError"
                                                                    style="display: none;">Please Select the city</span>


                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>

                                                        <div class="statepin">
                                                            <label>State:</label>
                                                            <input type="text" name="" id="state" placeholder="State"
                                                                readonly="true">
                                                            <div class="clear"></div>
                                                        </div>
                                                        <div class="clear"></div>
                                                        <br>

                                                        <div class="clear"></div>

                                                        <div class="statepin educationHide" style="display: none;">
                                                            <div class="fld-block Educationdrop">
                                                                <input type="text" name="EducationOthers"
                                                                    id="usereducationHide"
                                                                    placeholder="Enter The Education" class="col-md-12"
                                                                    style="width: 100%!important;">
                                                                <span class="error edutypeError"
                                                                    style="display: none;">Enter your Education</span>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        <div class="statepin passiontypeHide" style="display: none;">
                                                            <div class="fld-block citydrop">
                                                                <input type="text" name="EducationOthers"
                                                                    id="userpassionHide"
                                                                    placeholder="Enter your passion" class="col-md-12"
                                                                    style="width: 100%!important;">
                                                                <span class="error passionError"
                                                                    style="display: none;">Enter Your Passion</span>


                                                            </div>

                                                            <div class="clear"></div>
                                                        </div>
                                                        <div class="clear"></div>


                                                        <div class="form-lft">
                                                            <label for="facebookUrl">Facebook URL:</label>
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
                                                            <label for="Linkedin">Linkedin URL:</label>
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
                                                            <label for="Twitter">Twitter URL:</label>
                                                            <div class="fld-block">
                                                                <!--   <input type="text" id="twitterUrl" name="twitterUrl" class="text-fld1" placeholder="Twitter URL"> -->
                                                                <textarea type="text" id="twitterUrl" name="twitterUrl"
                                                                    class="text-fld1"
                                                                    placeholder="Twitter URL"></textarea>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>

                                                        <button type="button" class="btn btn-primary pull-right"
                                                            id="borrower-profile-btn">Save</button>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel panel-default referencehideSection">
                                                <div class="panel-heading" role="tab" id="referrenceDetails">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse"
                                                            data-parent="#accordion" href="#collapseReferrence"
                                                            aria-expanded="false" aria-controls="collapseTwo">
                                                            <b>Reference Details</b>
                                                            &nbsp;<span class="error displayReferenceErrorIfnot"
                                                                style="display: none;">Please fill the Reference Details
                                                            </span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseReferrence" class="panel-collapse collapse"
                                                    role="tabpanel" aria-labelledby="collapseReferrence">
                                                    <div class="panel-body referencesAppendedSec">

                                                    </div>
                                                </div>
                                            </div>

                                            <!--   end referrence details  -->

                                            <div class="panel panel-default userbank_verifyData">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse"
                                                            data-parent="#accordion" href="#collapseTwo"
                                                            aria-expanded="false" aria-controls="collapseTwo">
                                                            <b>Bank Details </b>
                                                            &nbsp;<span class="error displayBankDetailsErrorIfnot"
                                                                style="display: none;">Please fill the mandatory
                                                                fields</span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                                    aria-labelledby="headingTwo">
                                                    <div class="panel-body">

                                                        <div class="form-lft">
                                                            <label>Account No<em class="mandatory">*</em></label>
                                                            <div class="fld-block">
                                                                <input type="number" placeholder="Account Number"
                                                                    name="accountno" id="accountno"
                                                                    class="text-fld1 accountno_Bank" maxlength="18"
                                                                    minilength="8">


                                                                <!--  <input type="text" name="" placeholder="Account Number">id="accountno" -->
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
                                                                    class="text-fld1" maxlength="18" minilength="8">
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
                                                                    style="display: none;">Please enter IFSCCode</span>

                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>


                                                        <div class="form-lft bankUserName" style="display: none;">
                                                            <label>Name<em class="mandatory">*</em></label>
                                                            <div class="fld-block">
                                                                <input type="text"
                                                                    placeholder="Enter Name As Per Bank Account"
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
                                                                <input type="text" placeholder="Bank Name" id="bankname"
                                                                    name="bankname" class="text-fld1 fetchBankName">
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
                                                        <div class="form-lft form-otp bankCity" style="display: none;">
                                                            <label>City<em class="mandatory">*</em></label>
                                                            <div class="fld-block">
                                                                <input type="text" placeholder="City" name="city"
                                                                    class="text-fld1 fetchBankCity" id="cityValue">
                                                                <span class="error cityValueError"
                                                                    style="display: none;">Please enter the city where
                                                                    your bank is located</span>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        <div class="form-lft form-mob">
                                                            <label>confirmation<em class="mandatory">*</em></label>
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
                                                                    class="text-fld1 mobileotpinput" id="mobileotpinput"
                                                                    readonly>
                                                                <span class="error otperrormessage"
                                                                    style="display: none;">Please enter Otp</span>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                            <br>

                                                        </div>

                                                        <br>
                                                        <button type="button" class="btn btn-primary pull-right"
                                                            id="user-bank-btn" style="display: none;">Confirm</button>


                                                        <button type="button" class="btn btn-success pull-right"
                                                            id="user-bank-verify"
                                                            style="margin-right:4px; display: none;"> <i
                                                                class="fa fa-bank"
                                                                style="font-size:16px; margin: 0px 3px;"></i>
                                                            verify</button>

                                                        <button type="button" class="btn pull-right" id="user-otp-btn"
                                                            style="margin-right:3px;color: white; background-color: black;"><i
                                                                class="fa fa-mobile fa-sm"
                                                                style="margin: 0px 3px;"></i>Send Otp</button>
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
                                                            <b><span class="userDelaerType">Upload KYC </span></b>
                                                            &nbsp;<span class="error displayKYCDetailsErrorIfnot"
                                                                style="display: none;">Please fill the mandatory
                                                                fields</span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                                    aria-labelledby="headingThree">

                                                    <div class="panel-body" id="userKYCUpload"
                                                        enctype="multipart/form-data">
                                                        <div class="form-lft kycproofs">
                                                            <label>Pan<b style="color:red"> (Pan Card)</b></label>
                                                            <div class="fld-block upload_pdf">

                                                                <input
                                                                    class="custom-file-input panFileUpload pan-file-upload-content"
                                                                    id="pan" type='file' onchange="readPAN(this);"
                                                                    onclick="$('.panFileUpload')" accept=".pdf" />
                                                                <!-- <input type="file" class="custom-file-input">   -->
                                                                <a href="#" class="pancard"
                                                                    onclick="viewDoc('PAN')"></a>



                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>

                                                        <div class="form-lft kycproofs">
                                                            <label>Bank Statement<b style="color:red">
                                                                    (6-months)</b></label>
                                                            <div class="fld-block upload_pdf">
                                                                <input class="custom-file-input bsFileUpload"
                                                                    type='file' id="bankSatatementdoc"
                                                                    onchange="readBankStatement(this);"
                                                                    accept="application/pdf,application/vnd.ms-excel" />
                                                                <a href="#" class="bankSatatement"
                                                                    onclick="viewDoc('BANKSTATEMENT')"></a>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        <div class="form-lft kycproofs">
                                                            <label>Latest Payslips <b style="color:red">(latest payslips
                                                                    6 months)</b></label>
                                                            <div class="fld-block upload_pdf">
                                                                <input class="custom-file-input payslipsFileUpload"
                                                                    type='file' id="payslips"
                                                                    onchange="readPAYSLIPS(this);"
                                                                    accept="application/pdf,application/vnd.ms-excel" />
                                                                <a href="#" class="Payslipsdoc"
                                                                    onclick="viewDoc('PAYSLIPS')"></a>
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
                                                                    onclick="$('.chequeFileUpload')" accept=".pdf" />
                                                                <a href="#" class="chequeleaf "
                                                                    onclick="viewDoc('CHEQUELEAF')"> </a>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        <h3> <span class="isText_head">Address Proof Documents
                                                                <span><small><span class="sub_text_isStudent">(NOTE:
                                                                            Upload any one of the
                                                                            documents given below)</small></span></h3>

                                                        <div class="form-lft kycproofs is_Noraml_user">
                                                            <label>Aadhar<b style="color:red"> (Aadhar)</b></label>
                                                            <div class="fld-block upload_pdf">
                                                                <input class="custom-file-input aadharFileUpload"
                                                                    type='file'
                                                                    onchange="readDocument(this, 'AADHAR', 'aadhar');"
                                                                    id="aadhar" accept=".pdf*" />
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
                                                                    id="drivinglicence" accept=".pdf" />
                                                                <a href="#" class="DrivingLicenseDoc"
                                                                    onclick="viewDoc('DRIVINGLICENCE')"></a>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>


                                                        <div class="form-lft kycproofs">
                                                            <label>VoterID<b style="color:red"> (Voter Id)</b></label>
                                                            <div class="fld-block upload_pdf">
                                                                <input class="custom-file-input voteridFileUpload "
                                                                    type='file'
                                                                    onchange="readDocument(this,'VOTERID' ,'voterid');"
                                                                    id="voterid" accept=".pdf" />
                                                                <a href="#" class="voteridDoc"
                                                                    onclick="viewDoc('VOTERID')"></a>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>


                                                        <div class="form-lft kycproofs is_Noraml_user">
                                                            <label>Passport<b style="color:red"> (Passport)</b></label>
                                                            <div class="fld-block upload_pdf">
                                                                <input class="custom-file-input passportFileUpload"
                                                                    type='file' onchange="readPASSPORT(this);"
                                                                    id="passport" accept=".pdf" />
                                                                <a href="#" class="Passportdoc"
                                                                    onclick="viewDoc('PASSPORT')"></a>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>

                                                        <div class="isstudent_docs" style="display:none">
                                                            <h3> <span class="isText_head">Educational and University
                                                                    Documents <span><small><span
                                                                                class="sub_text_isStudent">(NOTE: All
                                                                                the documents are mandotary and are in
                                                                                pdf only.) </small></span></h3>

                                                            <div class="form-lft kycproofs student_passport">
                                                                <label>Passport<b style="color:red">
                                                                        (Passport)</b></label>
                                                                <div class="fld-block upload_pdf">
                                                                    <input class="custom-file-input passportFileUpload"
                                                                        type='file' onchange="readPASSPORT(this);"
                                                                        id="passport" accept=".pdf" />
                                                                    <a href="#" class="Passportdoc"
                                                                        onclick="viewDoc('PASSPORT')"></a>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>



                                                            <div class="form-lft kycproofs student_aadhar">
                                                                <label>Aadhar<b style="color:red"> (Aadhar)</b></label>
                                                                <div class="fld-block upload_pdf">
                                                                    <input class="custom-file-input aadharFileUpload"
                                                                        type='file'
                                                                        onchange="readDocument(this, 'AADHAR', 'aadhar');"
                                                                        id="aadhar" accept=".pdf" />
                                                                    <a href="#" class="Aadhardoc"
                                                                        onclick="viewDoc('AADHAR')"></a>


                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="form-lft kycproofs">
                                                                <label>Tenth<b style="color:red"> (tenth)</b></label>
                                                                <div class="fld-block upload_pdf">
                                                                    <input class="custom-file-input aadharFileUpload"
                                                                        type='file'
                                                                        onchange="readDocument(this, 'TENTH', 'tenth');"
                                                                        id="tenth" accept=".pdf" />
                                                                    <a href="#" class="tenthdoc"
                                                                        onclick="viewDoc('TENTH')"></a>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft kycproofs">
                                                                <label>Intermediate<b style="color:red"> (intermediate
                                                                        )</b></label>
                                                                <div class="fld-block upload_pdf">
                                                                    <input class="custom-file-input aadharFileUpload"
                                                                        type='file'
                                                                        onchange="readDocument(this, 'INTER', 'inter');"
                                                                        id="inter" accept=".pdf" />
                                                                    <a href="#" class="interdoc"
                                                                        onclick="viewDoc('INTER')"></a>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft kycproofs">
                                                                <label>Graduation <b style="color:red"> (graduation
                                                                        )</b></label>
                                                                <div class="fld-block upload_pdf">
                                                                    <input class="custom-file-input aadharFileUpload"
                                                                        type='file'
                                                                        onchange="readDocument(this, 'GRADUATION', 'graduation ');"
                                                                        id="graduation" accept=".pdf" />
                                                                    <a href="#" class="graduationdoc"
                                                                        onclick="viewDoc('GRADUATION')"></a>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft kycproofs">
                                                                <label>University Offer Letter<b style="color:red">
                                                                        (university offer letter)</b></label>
                                                                <div class="fld-block upload_pdf">
                                                                    <input class="custom-file-input aadharFileUpload"
                                                                        type='file'
                                                                        onchange="readDocument(this, 'UNIVERSITYOFFERLETTER', 'universityofferletter');"
                                                                        id="aadhar" accept=".pdf" />
                                                                    <a href="#" class="universityofferletterdoc"
                                                                        onclick="viewDoc('UNIVERSITYOFFERLETTER')"></a>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="form-lft kycproofs">
                                                                <label>University Fee Receipt <b
                                                                        style="color:red">(fee)</b></label>
                                                                <div class="fld-block upload_pdf">
                                                                    <input class="custom-file-input aadharFileUpload"
                                                                        type='file'
                                                                        onchange="readDocument(this, 'FEE', 'fee');"
                                                                        id="fee" accept=".pdf" />
                                                                    <a href="#" class="feedoc"
                                                                        onclick="viewDoc('FEE')"></a>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <!--  tab  Tab5 student info  -->
                                            <!--  <div class="panel panel-default user_studentInfo" style="display:none;">
                                                <div class="panel-heading" role="tab" id="studentInfo">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse"
                                                            data-parent="#accordion" href="#studentInfopanel"
                                                            aria-expanded="false" aria-controls="collapseTwo">
                                                            <b> University Information</b>
                                                            &nbsp;<span class="error displayStudentErrorIfnot"
                                                                style="display: none;">Please fill the mandatory
                                                                fields</span>
                                                        </a>
                                                    </h4>
                                                </div>

                                             <div id="studentInfopanel" class="panel-collapse collapse" role="tabpanel"
                                                    aria-labelledby="studentInfo" >
                                                    <div class="panel-body">
                                                        <div class="form-lft">
                                                            <label>Country<em class="mandatory">*</em></label>
                                                            <div class="fld-block">
                                                                <input type="text" placeholder="University Country"
                                                                    name="country" id="studentCountry"
                                                                    class="text-fld1 Country_student" 
                                                                      >
                                                                <span class="error studentUniversityError"
                                                                    style="display: none;">Please enter the university country.</span>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        <div class="form-lft">
                                                            <label>University Name<em
                                                                    class="mandatory">*</em></label>
                                                            <div class="fld-block">
                                                                <input type="text"
                                                                    placeholder="University Name"
                                                                    id="studentUniversity" name="university"
                                                                    class="text-fld1">
                                                                <span class="error StudentUniversityError"
                                                                    style="display: none;">Please enter the university name.</span>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        <div class="form-lft">
                                                            <label>Location<em class="mandatory">*</em></label>
                                                            <div class="fld-block">
                                                                <input type="text" placeholder="University Location"
                                                                    id="studentLocation" name="IFSCCode"
                                                                    class="text-fld1 location">
                                                                <span class="error studentLocationError"
                                                                    style="display: none;">Please enter the university location.</span>

                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>


                                                        <br>
                                                        <button type="button" class="btn btn-primary pull-right"
                                                            id="user-student-btn">Confirm</button>

                                                    </div>
                                                </div>
                                            </div>
 -->
                                            <!--  tab  Tab5 student info  -->
                                            <!-- dealer tab  Tab4  -->
                                            <div class="panel panel-default displayDealerDocs" style="display: none;">
                                                <div class="panel-heading" role="tab" id="dealerDocument">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse"
                                                            data-parent="#accordion" href="#dealerTabThree"
                                                            aria-expanded="false" aria-controls="collapseThree">
                                                            <b>Company Documents </b>
                                                            &nbsp;<span class="error displayKYCDetailsErrorIfnot"
                                                                style="display: none;">Please fill the mandatory
                                                                fields</span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="dealerTabThree" class="panel-collapse collapse" role="tabpanel"
                                                    aria-labelledby="headingThree">

                                                    <div class="panel-body" id="userKYCUpload"
                                                        enctype="multipart/form-data">
                                                        <div class="form-lft kycproofs">
                                                            <label>COMPANY PAN<b style="color:red"> (pan
                                                                    card)</b></label>
                                                            <div class="fld-block upload_pdf">

                                                                <input
                                                                    class="custom-file-input queryImageUpload query-file-upload-image"
                                                                    id="query" type='file'
                                                                    onchange="readCompanyDocument(this,'COMPANYPAN');"
                                                                    onclick="$('.transactionUpload')"
                                                                    accept="image/*,.doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" />

                                                                <a href="#" class="companypancard"
                                                                    onclick="viewDoc('COMPANYPAN')"></a>


                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>

                                                        <div class="form-lft kycproofs">
                                                            <label>MEMORANDUM OF ASSOCIATION</label>
                                                            <div class="fld-block upload_pdf">
                                                                <input
                                                                    class="custom-file-input queryImageUpload query-file-upload-image"
                                                                    id="query" type='file'
                                                                    onchange="readCompanyDocument(this,'MEMORANDUMOFASSOCIATION');"
                                                                    onclick="$('.transactionUpload')"
                                                                    accept="image/*,.doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" />
                                                                <a href="#" class="mmassociation"
                                                                    onclick="viewDoc('MEMORANDUMOFASSOCIATION')"></a>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        <div class="form-lft kycproofs">
                                                            <label>CERTIFICATE OF INSURANCE</label>
                                                            <div class="fld-block upload_pdf">
                                                                <input
                                                                    class="custom-file-input queryImageUpload query-file-upload-image"
                                                                    id="query" type='file'
                                                                    onchange="readCompanyDocument(this,'CERTIFICATEOFINSURANCE');"
                                                                    onclick="$('.transactionUpload')"
                                                                    accept="image/*,.doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" />
                                                                <a href="#" class="certificateInsurance"
                                                                    onclick="viewDoc('CERTIFICATEOFINSURANCE')"></a>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        <div class="form-lft kycproofs">
                                                            <label>GST<b style="color:red"> (GST)</b></label>
                                                            <div class="fld-block upload_pdf">

                                                                <input
                                                                    class="custom-file-input queryImageUpload query-file-upload-image"
                                                                    id="query" type='file'
                                                                    onchange="readCompanyDocument(this,'GST');"
                                                                    onclick="$('.transactionUpload')"
                                                                    accept="image/*,.doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" />
                                                                <a href="#" class="gst " onclick="viewDoc('GST')"> </a>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>


                                                        <div class="form-lft kycproofs">
                                                            <label>TAN<b style="color:red">(TAN)</b></label>
                                                            <div class="fld-block upload_pdf">
                                                                <input
                                                                    class="custom-file-input queryImageUpload query-file-upload-image"
                                                                    id="query" type='file'
                                                                    onchange="readCompanyDocument(this,'TAN');"
                                                                    onclick="$('.transactionUpload')"
                                                                    accept="image/*,.doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" />
                                                                <a href="#" class="tan" onclick="viewDoc('TAN')"></a>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>

                                                        <div class="form-lft kycproofs">
                                                            <label>COMPANY BANK STMT</label>
                                                            <input
                                                                class="custom-file-input queryImageUpload query-file-upload-image"
                                                                id="query" type='file'
                                                                onchange="readCompanyDocument(this,'COMPANYBANKSTMT');"
                                                                onclick="$('.transactionUpload')"
                                                                accept="image/*,.doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" />
                                                            <a href="#" class="companyBankStatement"
                                                                onclick="viewDoc('COMPANYBANKSTMT')"></a>
                                                            <div class="clear"></div>
                                                        </div>
                                                        <div class="clear"></div>
                                                        <div class="form-lft kycproofs">
                                                            <label>AOI<b style="color:red"> (AOI)</b></label>
                                                            <div class="fld-block upload_pdf">
                                                                <input
                                                                    class="custom-file-input queryImageUpload query-file-upload-image"
                                                                    id="query" type='file'
                                                                    onchange="readCompanyDocument(this,'AOI');"
                                                                    onclick="$('.transactionUpload')"
                                                                    accept="image/*,.doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" />
                                                                <a href="#" class="aoi" onclick="viewDoc('AOI')"></a>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        <h3>Dealer Document's <small>NOTE:Listed Documents to be Stored
                                                                in a Google Drive and The Link to be Shared to
                                                                (sriram@oxyloans.com) With Full Access.</small></h3>
                                                        <div class="upload driveLink">
                                                            <div class="dealerDriveLink">

                                                                <input type="text" name="driveLink"
                                                                    id="companyDocumetDrive"
                                                                    placeholder="Share Company Document Drive Link"></br></br>
                                                                <span class="driveError" style="display: none;">Enter
                                                                    the Drive Link</span>
                                                                <button type="button"
                                                                    class="btn btn-md btn-info driveSubmmitBTN"
                                                                    id="driveSubmmitBTN">SUBMIT</button>

                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
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
</div>
</section>
</div>




<link rel="stylesheet" href="assets/css/selectize.default.css">
<link rel="stylesheet" href="assets/css/dd.css">
<link rel="stylesheet" href="assets/css/animate.css">
<link rel="stylesheet" href="assets/css/responsive.css">
<link rel="stylesheet" href="assets/css/bootstrap.css">
<!-- <link rel="stylesheet" href="assets/css/font-awesome.css"> -->
<link rel="stylesheet" href="assets/css/style.css">

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script src="<?php echo base_url(); ?>assets/js/myscript.js?oxyloans=<?php echo time(); ?>"></script>

<script src="<?php echo base_url(); ?>assets/js/animation.js?oxyloans=<?php echo time(); ?>"></script>

<script src="<?php echo base_url(); ?>assets/js/selectize.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dd.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-input-mask-phone-number.js?oxyloans=<?php echo time(); ?>">
</script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-filestyle.js?oxyloans=<?php echo time(); ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#confirmaccountno').on("cut copy paste", function(e) {
        e.preventDefault();
    });
})
</script>
<script type="text/javascript">
setKYCvars();
getKYC();
loadpersonalallDetails();
setTimeout(()=>{
 getVerifyPan();
},3000);


$(document).ready(function() {
    noprofileCheck = "no";
    noROICheck = "no";
});



$('#radioId input:radio').click(function() {
    $('#salDiv,#selfDiv,#studentDiv').removeClass('form_radio_block1_show');
    $('#salDiv,#selfDiv,#studentDiv').addClass('form_radio_block1_hide');
    if ($(this).val() === 'SALARIED') {
        $('#salDiv').addClass('form_radio_block1_show');
        $('#selfDiv').removeClass('form_radio_block1_show');
        $('#studentDiv').removeClass('form_radio_block1_show');

    } else if ($(this).val() === 'SELFEMPLOYED') {
        $('#selfDiv').addClass('form_radio_block1_show');
        $('#salDiv').removeClass('form_radio_block1_show');
        $('#studentDiv').removeClass('form_radio_block1_show');
    } else if ($(this).val() === 'true') {
        $('#studentDiv').addClass('form_radio_block1_show');
        $('#salDiv').removeClass('form_radio_block1_show');
        $('#selfDiv').removeClass('form_radio_block1_show');
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

<script type="text/javascript">
$(document).ready(function() {
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


<div class="modal modal-success fade" id="modal-fileUploadedSuccessfully">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>

            </div>
            <div class="modal-body">
                <span class="driveText" style="font-size: 16px;">File Uploaded Successfully</span>
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

<div class="modal modal-success fade" id="modal-referencedetails">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p class="textInfo">Your reference details have been successfully submitted.</p>
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
                    Update  your WhatsApp number.</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-9 pull-left">
                        <input type="tel" name="verifyWhatsappNumber" id="verifyWhatsappNumber"
                            class="form-control whatsAppNumber col-md-12">
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
                        placeholder="Enter the Whatsapp OTP">
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
            <div class="modal-body">
                <h6 class="notupdate">Nominee details not filled </h6>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-outline errormessage_profile" data-dismiss="modal"
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
            <div class="modal-body">
                <h6 class="notupdate"> Profile details not filled </h6>
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
            <div class="modal-body">
                <h6 class="notupdate">Bank details not filled </h6>
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