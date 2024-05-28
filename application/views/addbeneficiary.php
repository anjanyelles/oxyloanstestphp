<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?> <div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add/Update Beneficiry<small>Add/Update Beneficiary information</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="">OxyTrade Details</li>
            <li class="active">Add Bebeficiary</li>
        </ol>
    </section>
    <section>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                    </div>
                    <div class="main-cont borrowerbeneficiaries">
                        <div class="middle-block">
                            <p align="left" style="margin-left:15px;">
                                <button type="button" class="btn btn-info btn-sm" id="beneficiary-add-btn">
                                    <span class="fa fa-plus"></span> Add Beneficiary</button>
                                <button type="button" class="btn btn-info btn-sm" id="beneficiary-edit-btn">
                                    <span class="fa fa-pencil"></span> Edit Beneficiary
                                </button>

                            <div class="panel-body" id="beneficiarylistDDpanel" style="display:none;">
                                <div class="form-group row">
                                    <label for="beneficiarylist" class="col-sm-2 col-form-label">Beneficiaries
                                        List</label>
                                    <div class="col-sm-3">
                                        <select name="beneficiarylist" class="form-control beneficiarylistValue" data
                                            validation="beneficiarylist" id="beneficiarylist">
                                            <option value="">-- Select AccountType--</option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            </p>
                            <div class="col-xs-1"></div>
                            <div class="form-block1 block-loan" style="margin-left:15px;margin-right:200px;">
                                <div class="panel panel-default" id="beneficiarydetailspanel" style="display:none;">
                                    <div class="panel-heading" id="headingOne">
                                        <h4 class="panel-title">
                                            <span id="beneficiarytitle"></span>
                                        </h4>
                                    </div>
                                    <!--panel-heading-->
                                    <div class="panel-body">
                                        <form autocomplete="off" id="beneficiarydetailsSection">
                                            <div class="form-group row">
                                                <label for="beneficiary name"
                                                    class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <span class="displaybeneficiaryname udisplaysec"></span>
                                                    <input type="text" name="beneficiaryname"
                                                        class="form-control beneficiarynameValue"
                                                        placeholder="Enter Beneficiary Name" id="beneficiaryname" data
                                                        validation="beneficiaryname">
                                                    <span class="error beneficiarynameError"
                                                        style="display: none;">Please enter beneficiary Name</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="beneficiary name" class="col-sm-3 col-form-label">Nick
                                                    Name</label>
                                                <div class="col-sm-9">
                                                    <span class="displaybeneficiarynickname udisplaysec"></span>
                                                    <input type="text" name="beneficiarynickname"
                                                        class="form-control beneficiarynicknameValue"
                                                        placeholder="Enter Beneficiary Nick Name"
                                                        id="beneficiarynickname" data validation="beneficiarynickname">
                                                    <span class="error beneficiarynicknameError"
                                                        style="display: none;">Please enter Beneficiary NickName</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="mobile number" class="col-sm-3 col-form-label">Mobile
                                                    Number</label>
                                                <div class="col-sm-9">
                                                    <span class="displaybeneficiarymobilenumber udisplaysec"></span>
                                                    <input type="text" name="beneficiarymobilenumber"
                                                        class="form-control beneficiarymobilenumberValue"
                                                        placeholder="Enter Beneficiary Mobile Number"
                                                        id="beneficiarymobilenumber" data validation="mobilenumber">
                                                    <span class="error beneficiarymobilenumberError"
                                                        style="display: none;">Please Enter beneficiary Mobile
                                                        Number</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="beneficiaryemail"
                                                    class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <span class="displaybeneficiaryemail udisplaysec"></span>
                                                    <input type="text" name="email"
                                                        class="form-control beneficiaryemailValue"
                                                        placeholder="Enter beneficiary EmailID" id="beneficiaryemail"
                                                        data validation="beneficiaryemail">
                                                    <span class="error beneficiaryemailError"
                                                        style="display: none;">Please Enter Beneficiary Email</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="account number" class="col-sm-3 col-form-label">Account
                                                    Number</label>
                                                <div class="col-sm-9">
                                                    <span class="displaybeneficiaryaccountnumber udisplaysec"></span>
                                                    <input type="text" name="beneficiaryaccountnumber"
                                                        class="form-control beneficiaryaccountnumberValue"
                                                        placeholder="Enter Beneficiary Account Number"
                                                        id="beneficiaryaccountnumber" data
                                                        validation="beneficiaryaccountnumber">
                                                    <span class="error beneficiaryaccountnumberError"
                                                        style="display: none;">Please Enter beneficiary Account
                                                        Number</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="beneficiary ifsc code" class="col-sm-3 col-form-label">IFSC
                                                    Code</label>
                                                <div class="col-sm-9">
                                                    <span class="displaybeneficiaryifsccode udisplaysec"></span>
                                                    <input type="text" name="beneficiaryifsccode"
                                                        class="form-control beneficiaryifsccodeValue"
                                                        placeholder="Enter beneficiary IFSC Code"
                                                        id="beneficiaryifsccode" data validation="beneficiaryifsccode"
                                                        maxlength="11">
                                                    <span class="error beneficiaryifsccodeError"
                                                        style="display: none;">Please Enter beneficiary Ifsc Code</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="beneficiary bank name" class="col-sm-3 col-form-label">Bank
                                                    Name</label>
                                                <div class="col-sm-9">
                                                    <span class="displaybeneficiarybankname udisplaysec"></span>
                                                    <input type="text" name="beneficiarybankname"
                                                        class="form-control beneficiarybanknameValue"
                                                        placeholder="Enter beneficiary Bank Name"
                                                        id="beneficiarybankname" data validation="beneficiarybankname">
                                                    <span class="error beneficiarybanknameError"
                                                        style="display: none;">Please beneficiary Bank Name</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="beneficiary branch name"
                                                    class="col-sm-3 col-form-label">Branch Name</label>
                                                <div class="col-sm-9">
                                                    <span class="displaybeneficiarybranchname udisplaysec"></span>
                                                    <input type="text" name="branchname"
                                                        class="form-control beneficiarybranchnameValue"
                                                        placeholder="Enter beneficiary Branch Name"
                                                        id="beneficiarybranchname" data
                                                        validation="beneficiarybranchname">
                                                    <span class="error beneficiarybranchnameError"
                                                        style="display: none;">Please Enter Beneficiary Branch
                                                        Name</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="address" class="col-sm-3 col-form-label">City</label>
                                                <div class="col-sm-9">
                                                    <span class="displaybeneficiarycity udisplaysec"></span>
                                                    <input type="text" name="beneficiarycity"
                                                        class="form-control beneficiarycityValue"
                                                        placeholder="Enter Beneficiary City" id="beneficiarycity" data
                                                        validation="beneficiarycity">
                                                    <span class="error beneficiarycityError"
                                                        style="display: none;">Please Enter Beneficiary City</span>
                                                </div>
                                            </div>

                                            <!-- <div class="form-group row" >
                       <label for="beneficiary amount" class="col-sm-3 col-form-label">Amount</label>
                       <div class="col-sm-9">
                         <span class="displaybeneficiaryamount udisplaysec"></span>
                         <input  type="text" name="beneficiaryamount" class="form-control beneficiaryamountValue" placeholder="Enter beneficiary amount" id="beneficiaryamount" data validation="beneficiaryamount" >
                          <span class="error beneficiaryamountError" style="display: none;">Please Enter Beneficiary Amount</span>
                       </div>
                      </div> -->

                                            <p align="center" id="forAdd" style="display:none;">
                                                <button type="button" class="btn btn-info btn-sm"
                                                    id="beneficiary-submit-btn"> Submit</button>
                                                <button type="button" class="btn btn-info btn-sm"
                                                    id="beneficiary-reset-btn"> Reset</button>
                                            </p>
                                            <p align="center" id="forEdit" style="display:none;">
                                                <button type="button" class="btn btn-info btn-sm"
                                                    id="beneficiary-edit-submit-btn">Confirm</button>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                                <!--panel-default-->
                            </div>
                            <!--form-block1 block-loan-->
                        </div>
                        <!--middle-block-->
                    </div>
                    <!--main-cont-->
    </section>


</div>
<!--content-wrapper-->

<div class="modal modal-success fade" id="modal-addbeneficiary">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p id="addSuccessMsg" style="display:none;">Beneficiary details are successfully Added.</p>
                <p id="editSuccessMsg" style="display:none;">Beneficiary details are successfully Updated.</p>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                </a>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div>

<div class="modal modal-danger fade" id="modal-beneficiryalreadyadded">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">!Oops</h4>
            </div>
            <div class="modal-body">
                <p id="beneficiaryalreadyadded"></p>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                </a>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div>

<?php include 'footer.php';?>