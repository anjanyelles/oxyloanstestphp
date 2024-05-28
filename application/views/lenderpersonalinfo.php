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
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Myprofile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <p class="displayError-myprofile error" style="display: none;">

                        </p>

                        <div class="col-xs-1"></div>
                        <form autocomplete="off" id="personalinfoSection">
                            <div class="col-xs-10">

                                <div class="form-group row">
                                    <label for="First name" class="col-sm-2 col-form-label">First Name</label>
                                    <div class="col-sm-10">
                                        <span class="displayFirstName udisplaysec"></span>
                                        <input type="text" name="firstname" class="form-control firstnameValue"
                                            placeholder="Enter your firstname" id="firstname" data
                                            validation="firstname" maxlength="30">

                                        <span class="error firstnameError" style="display: none;">Please enter your
                                            first name</span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="middle name" class="col-sm-2 col-form-label middlenameLb">Middle
                                        Name</label>
                                    <div class="col-sm-10">
                                        <span class="displaymiddleName udisplaysec"></span>
                                        <input type="text" class="form-control middlenameValue"
                                            placeholder="Enter your middlename" name="middlename" id="middlename" data
                                            validation="middlename" maxlength="30">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Last name" class="col-sm-2 col-form-label">Last Name </label>
                                    <div class="col-sm-10">
                                        <span class="displayLastName udisplaysec"></span>

                                        <input type="text" class="form-control lastnameValue" name="lastname"
                                            placeholder="Enter your lastname" id="lastname" data validation="lastname"
                                            maxlength="30">
                                        <span class="error lastnameError" style="display: none;">Please enter your last
                                            name</span>
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <label for="PAN Number" class="col-sm-2 col-form-label">PAN Number</label>
                                    <div class="col-sm-10">
                                        <span class="displaypanNumber udisplaysec"></span>
                                        <input type="text" class="form-control panNumberValue"
                                            placeholder="Enter your PAN Number" name="panNumber" id="panNumber" data
                                            validation="panNumber" maxlength="30">
                                        <span class="error panNumberError" style="display: none;">Please enter your PAN
                                            Number</span>
                                    </div>
                                </div>
                                <div class="form-group row" style="display: none;">
                                    <label for="Salary" class="col-sm-2 col-form-label">Salary</label>
                                    <div class="col-sm-10">
                                        <span class="displaysalary udisplaysec"></span>
                                        <input type="text" class="form-control salaryValue"
                                            placeholder="Enter your salary" name="salary" id="salary" data
                                            validation="salary" maxlength="30">
                                        <span class="error salaryError" style="display: none;">Please enter your
                                            Salary</span>
                                    </div>
                                </div>

                                <div class="form-group row" style="display: none;">
                                    <label for="Company name" class="col-sm-2 col-form-label">Company name</label>
                                    <div class="col-sm-10">
                                        <span class="displaycompanyName udisplaysec"></span>
                                        <input type="text"
                                            class="form-control companynameValue autocomplete companynameInputs"
                                            placeholder="Enter your Companyname" name="companyname" id="companyname"
                                            data validation="companyname" maxlength="30">
                                        <span class="error companynameError" style="display: none;">Please enter your
                                            Company name</span>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="Father name" class="col-sm-2 col-form-label">Father Name</label>
                                    <div class="col-sm-10">
                                        <span class="displayFatherName udisplaysec"></span>
                                        <input type="text" class="form-control fathernameValue"
                                            placeholder="Enter your fathername" name="fathername" id="fathername" data
                                            validation="fathername" maxlength="30">
                                        <span class="error fathernameError" style="display: none;">Please enter your
                                            father name</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="dateofbirth" class="col-sm-2 col-form-label">Date of Birth</label>
                                    <div class="col-sm-10">
                                        <span class="displaydateofbirth udisplaysec"></span>
                                        <div class="input-group date" data-date-format="dd/mm/yyyy">
                                            <input type="text" class="form-control dateofbirthValue dobformat"
                                                id="dateofbirth" placeholder="DD/MM/YYYY" name="dateofbirth" data
                                                validation="dateofbirth">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </div>
                                        </div>


                                        <span class="error dateofbirthError" style="display: none;">Please enter date of
                                            birth
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gender" class="col-sm-2 col-form-label" id="gender" name="gender" data
                                        validation="gender">Gender</label>
                                    <div class="col-sm-10">
                                        <span class="displaygender udisplaysec"></span>
                                        <span class="genderInfo">
                                            <input type="radio" id="genderforMale" name="gendervalue" value="M" />
                                            <label for="genderforMale">Male</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" id="genderforFemale" name="gendervalue" value="F" />
                                            <label for="genderforFemale">Female</label>
                                        </span>
                                        <span class="error genderError" style="display: none;">Please choose
                                            gender</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="maritalStatus" class="col-sm-2 col-form-label" id="maritalStatus"
                                        name="maritalStatus" data validation="maritalStatus">Marital Status</label>
                                    <div class="col-sm-10">
                                        <span class="displaymaritalStatus udisplaysec"></span>
                                        <span class="maritalStatusInfo">
                                            <input type="radio" id="maritalStatusmarried" name="maritalStatus"
                                                value="M" />
                                            <label for="maritalStatus">Married</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" id="maritalStatussingle" name="maritalStatus"
                                                value="S" />
                                            <label for="maritalStatus">Single</label>
                                        </span>
                                        <span class="error maritalStatusError" style="display: none;">Please choose
                                            maritalStatus</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">Present Address</label>
                                    <div class="col-sm-10">
                                        <span class="displayaddress udisplaysec"></span>
                                        <textarea type="text" name="address" class="form-control addressValue"
                                            placeholder="Enter your  Address" id="address" data
                                            validation="address"></textarea>
                                        <span class="error addressError" style="display: none;">Please enter
                                            Address</span>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="nationality" class="col-sm-2 col-form-label">Nationality</label>
                                    <div class="col-sm-10">
                                        <span class="displaynationality udisplaysec"></span>
                                        <select class="form-control nationalityValue" name="nationality"
                                            id="nationality" data validation="nationality">

                                            <option value="">--Select your Nationality---</option>
                                            <option value="Indian">Indian</option>
                                        </select>
                                        <span class="error nationalityError" style="display: none;">Please choose
                                            Nationality</span>
                                    </div>
                                </div>
                                <p align="center">
                                    <button type="button" class="btn btn-flat btn-primary" id="profile-submit-btn">
                                        Submit</button>
                                    <button type="button" class="btn btn-info btn-sm" id="profile-edit-btn">
                                        <span class="glyphicon glyphicon-pencil"></span> Edit
                                    </button>
                                </p>

                            </div>
                        </form>
                        <div class="col-xs-1"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal modal-success fade" id="modal-profileSuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Your personal details are successfully updated.</p>
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

<div class="modal modal-danger fade" id="modal-profile-error">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <p>Please enter valid profile Details.</p>
                <!-- /.modal-dialog -->
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
loadpersonalDetails();
$(document).ready(function() {
    noprofileCheck = "no";
    noROICheck = "no";
});
//alert(noprofileCheck);
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<?php include 'footer.php';?>