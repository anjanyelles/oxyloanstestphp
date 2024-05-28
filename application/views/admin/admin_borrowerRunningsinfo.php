<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>


<div class="content-wrapper">
    <section class="content-header">
        <h1 style="margin-left:20px" class="text-bold">
            <left>Add Student Bank Info</left>
        </h1>
    </section>


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header"></div>
                    <div class="box-body studentloandiv">





                        <div class="row col-xs-12 fetchblock">
                            <div class="pull-left fetchBorrowerData col-xs-6">
                                <label for="fetchBorrower" class="form-label col-md-4">Borrower Id :<em
                                        class="error ">*</em> </label>
                                <input type="text" class="form-control col-md-3 pull-left" name="fetchBorrower"
                                    id="fetechUserid" placeholder="Enter the Borrower Id" aria-describedby="helpId"
                                    placeholder="Enter The Borrower ID">
                                <span class="error errorborrowerid" style="display:none"> Enter the borrower Id</span>
                                <button class="btn btn-primary fetchBorrowerDataBased col-md-3 pull-left"
                                    onclick="fetchBorrowerfDDetails();">Fetch Deatils</button>

                            </div>

                            <div class="col-md-6 fetchUserBasicInfo" style="display:none;">
                                <small class="pull-left col-md-8 ">
                                    <h5 class="text-bold">NAME : <span class="fdUserName"> livin mandeva</span> </h5>
                                    <h5 class="text-bold">PAN : <span class="fdUserPanNo"> BFWPL6111F </span></h5>
                                </small>

                            </div>


                        </div>


                        <div class="row col-xs-12 bank-verifydata">

                            <div class="row col-xs-12 text-uppercase">
                                <div class="col-md-4 pull-left fduserBankDetails" style="display:none">


                                    <div class="row col-xs-8">
                                        <label class="fetchUserName" for="fetchUserName">Bank </label>
                                        <select class="form-control" id="fdBankAccount">
                                            <option value="">Choose Bank</option>
                                            <option value="Punjab National Bank">PNB BANK</option>
                                            <option value="YES BANK">YES BANK</option>
                                            <option value="Kotak Mahindra Bank">KOTAK BANK </option>
                                            <option value="HDFC Bank Ltd">HDFC BANK</option>
                                            <option value=" IDBI Bank Ltd">IDBI BANK</option>

                                        </select>

                                        <span class="error fdBankAccountchoosen" style="display: none;">choose Fd
                                            Account</span>
                                    </div>

                                    <div class="row col-xs-8">
                                        <label class="fetchUserName" for="fetchUserName">Account Number</label>
                                        <input type="text" name="fetchUserName" class="form-control"
                                            placeholder="Enter New Fd Account Number" id="fdaccountNumber">
                                        <span class="error fdBankAccountno" style="display: none;">Enter The Account
                                            Number
                                            Number</span>
                                    </div>

                                    <div class="row col-xs-8">
                                        <label class="fetchUserName" for="fetchUserName">IFSC Code</label>
                                        <input type="text" name="fetchUserName" class="form-control"
                                            placeholder="Enter The IFSC Code" id="fdIfscCode">
                                        <span class="error fdBankIfsccode" style="display: none;">Enter The IFSC
                                            Code</span>
                                    </div>


                                    <div class="row col-xs-8">
                                        <label class="fetchUserName" for="fetchUserName">Branch </label>
                                        <input type="text" name="fetchUserName" class="form-control"
                                            placeholder="Enter Branch Name" readonly id="fdUserBankBranch">
                                        <span class="error fdBankBranch" style="display: none;">Enter The User Branch
                                        </span>
                                    </div>


                                    <div class="row col-xs-8">
                                        <label class="fetchUserName" for="fetchUserName">Name as Per bank</label>
                                        <input type="text" name="fetchUserName" class="form-control"
                                            placeholder="Name as per Bank" readonly id="fdUserNameAsPerBank">
                                        <span class="error fdBankNameUserName" style="display: none;">Enter The User
                                            Name </span>
                                    </div>

                                </div>

                                <div class="col-xs-8 pull-left fdFillDetails" style="display:none">
                                    <div class="row col-xs-12">
                                        <div class="col-xs-6">
                                            <label class="fetchUserName" for="fetchUserName">Lead By</label>
                                            <select class="form-control" id="fdlead">
                                                <option value="">Choose Lead By</option>
                                                <option value="VISHNU">VISHNU</option>
                                                <option value="SUBBU">SUBBU</option>
                                                <option value="SURESH">SURESH </option>
                                                <option value="SANDEEP">SANDEEP</option>

                                            </select>
                                            <span class="error fDlead" style="display: none;">Choose The FD Lead</span>
                                        </div>


                                        <div class="col-xs-6">
                                            <label class="consultancy_name" for="consultancy_name"> Consultancy</label>
                                         
<select name="consultancy_name" class="form-control" id="fdconsultancy">
    <option value="">Choose Consultancy</option>
    <option value="KADMUSS">KADMUSS</option>
    <option value="GLOBAL EDU(MUMBAI)">GLOBAL EDU(MUMBAI)</option>
    <option value="LEO">LEO</option>
    <option value="DIRECT">DIRECT</option>
    <option value="DHANALAKSHMI">DHANALAKSHMI</option>
    <option value="GROWING GLOBAL">GROWING GLOBAL</option>
    <option value="DCHOS">DCHOS</option>
    <option value="VISA MASTERS">VISA MASTERS</option>
    <option value="APEX">APEX</option>
    <option value="ILW">ILW</option>
    <option value="AE SQUARE">AE SQUARE</option>
    <option value="i-90">i-90</option>
    <option value="IAEC DSNR">IAEC DSNR</option>
    <option value="IAEC-KUKATPALLY">IAEC-KUKATPALLY</option>
    <option value="SKILLFORD">SKILLFORD</option>
    <option value="CEOI">CEOI</option>
    <option value="IAEC">IAEC</option>
    <option value="THE HOPE">THE HOPE</option>
    <option value="BLUE OCEAN">BLUE OCEAN</option>
    <option value="SUNIL REDDY">SUNIL REDDY</option>
    <option value="ABROAD DREAM">ABROAD DREAM</option>
    <option value="NEXT STEP">NEXT STEP</option>
    <option value="AFYND(CHENNAI)">AFYND(CHENNAI)</option>
    <option value="AVC">AVC</option>
    <option value="NEXT GEN">NEXT GEN</option>
    <option value="KAREER CRAFTERS">KAREER CRAFTERS</option>
    <option value="V-IMMIGRATE">V-IMMIGRATE</option>
    <option value="I20-QUEST">I20-QUEST</option>
    <option value="AJ (MUMBAI)">AJ (MUMBAI)</option>
    <option value="WISDOM (MUMBAI)">WISDOM (MUMBAI)</option>
    <option value="SS HASTHINA">SS HASTHINA</option>
    <option value="VISA CORNER">VISA CORNER</option>
    <option value="ENLIGHTEN ABROAD">ENLIGHTEN ABROAD</option>
    <option value="EDU GUIDE(MUMBAI)">EDU GUIDE(MUMBAI)</option>
    <option value="UNIVERSAL">UNIVERSAL</option>
    <option value="SRH GLOBAL">SRH GLOBAL</option>
    <option value="VAISHNAVI">VAISHNAVI</option>
    <option value="IAEC-NARAYANAGUDA">IAEC-NARAYANAGUDA</option>
    <option value="IAEC-AS RAO">IAEC-AS RAO</option>
    <option value="OJAS">OJAS</option>
    <option value="ORIENT SPECTRA">ORIENT SPECTRA</option>
    <option value="UNIFIED">UNIFIED</option>
    <option value="BRIGHT OVERSEAS">BRIGHT OVERSEAS</option>
    <option value="NEPTUNE">NEPTUNE</option>
    <option value="MARUTI">MARUTI</option>
    <option value="VEDA">VEDA</option>
    <option value="ADVAITHA">ADVAITHA</option>
    <option value="UNI ADVISORS">UNI ADVISORS</option>
    <option value="SYGNUS">SYGNUS</option>
    <option value="SIRIAN">SIRIAN</option>
    <option value="TRIUMPH">TRIUMPH</option>
    <option value="ABROAD GATEWAY">ABROAD GATEWAY</option>
    <option value="GEE BEE (MUMBAI)">GEE BEE (MUMBAI)</option>
    <option value="CN MONEY">CN MONEY</option>
    <option value="EMINENT OVERSEAS">EMINENT OVERSEAS</option>
    <option value="SHANJ">SHANJ</option>
    <option value="ANAGA">ANAGA</option>
    <option value="AARA OVERSEAS">AARA OVERSEAS</option>
    <option value="AGARWAL OVERSEAS">AGARWAL OVERSEAS</option>
    <option value="EXCELLENCE">EXCELLENCE</option>
    <option value="SUPER ABROAD">SUPER ABROAD</option>
    <option value="VISA BEES">VISA BEES</option>
    <option value="EICS">EICS</option>
    <option value="AARUSH">AARUSH</option>
    <option value="SUNRISE">SUNRISE</option>
    <option value="VISA GRANT">VISA GRANT</option>
</select>


                                            <span class="error fDConsultancy" style="display: none;">Enter The
                                                Consultancy Name</span>
                                        </div>


                                    </div>



                                    <div class="row col-xs-12">

                                        <div class="col-xs-6">
                                            <label class="fetchUserName" for="fetchUserName">ROI </label>
                                            <input type="text" name="fetchUserName" class="form-control"
                                                placeholder="Enter The Fd ROI" id="fdroi">
                                            <span class="error fDRoi" style="display: none;">Enter The FD ROI</span>

                                        </div>
                                        <div class="col-xs-6">
                                            <label class="fetchUserName" for="fetchUserName">Funding Type</label>

                                            <select class="form-control" id="fdfundingType">
                                                <option value="">Choose Fd Type</option>
                                                <option value="SAVINGS">SAVING</option>
                                                <option value="DAYS">ONE DAY</option>
                                                <option value="FD">FD</option>

                                            </select>
                                            <span class="error fdFundingType" style="display: none;">Choose Funding
                                                Type</span>

                                        </div>
                                    </div>

                                    <div class="row col-xs-12">
                                        <div class="col-xs-6">
                                            <label class="fetchUserName" for="fetchUserName">Country</label>
                                            <input type="text" name="fetchUserName" class="form-control"
                                                placeholder="Enter The Country" id="fdStudentCountry">
                                            <span class="error fdCountry" style="display: none;">Enter The Country
                                                Name</span>
                                        </div>

                                        <div class="col-xs-6">
                                            <label class="fetchUserName" for="fetchUserName">University Name</label>
                                            <input type="text" name="fetchUserName" class="form-control"
                                                placeholder="Enter The University Name" id="FdUniversityName">
                                            <span class="error fdUniversity" style="display: none;">Enter The University
                                                Name</span>
                                        </div>

                                    </div>

                                    <div class="row col-xs-12">

                                        <div class="col-xs-6">
                                            <label class="fetchUserName" for="fetchUserName">Student Phone
                                                Number</label>
                                            <input type="text" name="fetchUserName" class="form-control"
                                                placeholder="Student New SIM Phone Number" id="fdStudentMobileNumber">
                                            <span class="error fdStudentPhone" style="display: none;">Enter The Student
                                                Phone Number</span>
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="fetchUserName" for="fetchUserName">FD Amount</label>
                                            <input type="text" name="fetchUserName" class="form-control"
                                                placeholder="Enter The FD Amount" id="fdAmount">
                                            <span class="error fdamount" style="display: none;">Enter The Fd
                                                Amount</span>
                                        </div>



                                    </div>

                                    <div class="row col-xs-12">

                                           <div class="col-xs-6">
                                            <label class="paymentcollection" for="paymentcollection">Fee payer</label>
                                            <select class="form-control" id="paymentcollection">
                                            <option value="">Choose Fee payer</option>
                                            <option value="STUDENT">STUDENT</option>
                                            <option value="CONSULTANCY">CONSULTANCY</option>
                                            </select>
                                            <span class="error paymentcollectionerror" style="display: none;">Choose Fee payer
                                                </span>
                                        </div>


                                          <div class="col-xs-6">
                                            <label class="loanType" for="loanType">loan Type</label>
                                            <select class="form-control" id="loanType">
                                            <option value="">Choose loan Type</option>
                                            <option value="STUDENT">STUDENT</option>
                                            <option value="ASSET">ASSET</option>
                                            </select>
                                            <span class="error loantypeErrormessage" style="display: none;">Choose loan Type
                                                </span>
                                        </div>
                            </div>
                                </div>

                            </div>
                        </div>

                        <div class="submitUserFetchData actionBtn_fd" style="display:none">
                            <div class="col-xs-6">
                                <button class="btn btn-success" onclick="verifyFdbankAccountNumber();"><span
                                        class="fa fa-bank"></span> Verify Bank </button>

                                <button class="btn btn-primary submitAccountDetails" style="display:none;"
                                    onclick="borrowerSaveAccountDetails();"> <span
                                        class="fa fa-angle-double-right "></span> Save Details </button>
                            </div>
                        </div>
                        </br>






                    </div>


                </div>
            </div>
        </div>
    </section>

</div>





<div class="modal  fade" id="modal-calroi-sheet">
    <div class="modal-dialog">
        <div class="modal-content offer_popup">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Move to Cms </h4>
            </div>
            <div class="offer_popup_cont clearfix">

                <div class="offer_popup_field clearfix">
                    <label>Deal Id<em class="mandatory">*</em></label>
                    <div class="fld-block">
                        <input type="text" class="dealId" id="loanOfferDeal" placeholder="Enter the disburse deal">
                        <span class="error loanDealError" style="display: none;">Please enter Deal Id.</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="offer_popup_field clearfix">
                    <label>Fee Percentage:</label>
                    <div class="fld-block">
                        <select class="form-control disbursefee" id="disbursefeeValue">
                            <option value="">-- Choose Percentage --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>

                        <div class="clear"></div>
                        <span class="error roierrorcms" style="display: none;">Please select fee percentage.</span>
                    </div>


                    <div class="clear"></div>
                </div>
                <div class="offer_popup_field clearfix">
                    <label>Borrower fee Status<em class="mandatory">*</em></label>
                    <div class="fld-block">
                        <select class="form-control " id="borrowerfeeStatus">
                            <option value="">-- Choose Status --</option>
                            <option value="true">true</option>
                            <option value="false">false</option>

                        </select>
                        <span class="error roidisError" style="display: none;">Please select fee status.</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm  savedisbursedDeal" data-loanid=""
                        onclick="disbursesToCms()">Move to cms</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<div class="modal  fade modal-success" id="modal-studentDetails-fd">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body loansUserSuccessMessage">
                <p class="#">Borrower details have been saved.</p>

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
<!-- /.modal-dialog -->





<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>