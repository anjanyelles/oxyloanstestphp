<?php include 'header.php';?>
<?php include 'sidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            My Profile
            <small>Your personal information</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Payments</li>
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

                        <div class="col-xs-1"></div>

                        <div class="col-xs-10" autocomplete="off" id="myprofileSection">
                            <div class="form-group row">
                                <label for="employment" class="col-sm-2 col-form-label">Employment :</label>
                                <div class="col-sm-10">
                                    <input type="text" name="employment" class="form-control employmentValue"
                                        placeholder="Enter employment  " id="employment" data validation="employment">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company name" class="col-sm-2 col-form-label">Company name </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control companynameValue" name="companyname"
                                        placeholder="Enter company name  " id="companyname" data
                                        validation="companyname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-sm-2 col-form-label">Designation</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control designationValue"
                                        placeholder="Enter designation" name="designation" id="designation">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-sm-2 col-form-label">Description </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control descriptionValue" placeholder="Enter description"
                                        name="description" id="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="No Of Jobs Changed" class="col-sm-2 col-form-label">No Of Jobs
                                    Changed</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control NoOfJobsChangedvvalue"
                                        placeholder="Enter no of Jobs Changed" name="NoOfJobsChanged"
                                        id="NoOfJobsChanged">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="workExperience" class="col-sm-2 col-form-label" id="workExperience">work
                                    Experience</label>
                                <div class="col-sm-10">
                                    <select>
                                        <option>select</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="highest Qualification" class="col-sm-2 col-form-label">Highest
                                    Qualification</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control highestQualificationsvalue"
                                        placeholder="Enter your highestQualifications" naame="highestQualifications"
                                        id="highestQualification">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="officeAddressId" class="col-sm-2 col-form-label">Office AddressId </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control officeAddressIdValue"
                                        placeholder="Enter officeAddressIds" name="officeAddressId"
                                        id="officeAddressId"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="officeContactNumber " class="col-sm-2 col-form-label">Office Contact
                                    Number</label>
                                <div class="col-sm-10">
                                    <input type="" class="form-control officeContactNumbervalue"
                                        placeholder="Enter your officeContactNumber" name="officeContactNumber"
                                        id="officeContactNumber">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fieldOfStudy" class="col-sm-2 col-form-label">Field Of Study</label>
                                <div class="col-sm-10">
                                    <input type="" class="form-control fieldOfStudyValue"
                                        placeholder="Enter your fieldOfStudy" id="fieldOfStudy" name="fieldOfStudy">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="college " class="col-sm-2 col-form-label"> College</label>
                                <div class="col-sm-10">
                                    <input type="" class="form-control collegeValue" placeholder="Enter your college"
                                        id="college" name="college">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for=" yearOfPassing" class="col-sm-2 col-form-label"> Year Of Passing</label>
                                <div class="col-sm-10">
                                    <input type="" class="form-control yearOfPassingValue"
                                        placeholder="Enter your yearOfPassing " id=" yearOfPassing">
                                </div>
                            </div>
                            <center> <button type="submit" class="btn btn-lg btn-primary " id="myprofile-submit-btn">
                                    Submit</button></center>
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

<?php include 'footer.php';?>