  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Professional Details
              <small>Your professional information</small>
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

                          <div class="col-xs-1"></div>
                          <form autocomplete="off" id="myprofileSection">
                              <div class="col-xs-10">
                                  <div class="form-group row">
                                      <label for="employment" class="col-sm-4 col-form-label">Employment</label>
                                      <div class="col-sm-8">
                                          <span class="displayemployment udisplaysec"></span>
                                          <!--<input  type="text" name="employment" class="form-control employmentValue" placeholder="Enter employment  " id="employment" data validation="employment">-->
                                          <select id="employment" class="form-control employmentValue" name="employment"
                                              data validation="employment">
                                              <option value="">--select one--</option>
                                              <option value="PRIVATE">PRIVATE</option>
                                              <option value="PUBLIC">PUBLIC</option>
                                              <option value="GOVERMENT">GOVERMENT</option>
                                          </select>
                                          <span class="error employmentError" style="display: none;">Please select
                                              employment type</span>

                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="company name" class="col-sm-4 col-form-label">Company Name </label>
                                      <div class="col-sm-8">
                                          <span class="displaycompanyname udisplaysec"></span>
                                          <input type="text" class="form-control companynameValue" name="companyname"
                                              placeholder="Enter company name  " id="companyname" data
                                              validation="companyname">
                                          <span class="error companynameError" style="display: none;">Please enter
                                              company name</span>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="text" class="col-sm-4 col-form-label">Designation</label>
                                      <div class="col-sm-8">
                                          <span class="displaydesignation udisplaysec"></span>
                                          <input type="text" class="form-control designationValue"
                                              placeholder="Enter designation" name="designation" id="designation" data
                                              validation="designation">
                                          <span class="error designationError" style="display: none;">Please enter your
                                              designation</span>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="text" class="col-sm-4 col-form-label">Description </label>
                                      <div class="col-sm-8">
                                          <span class="displaydescription udisplaysec"></span>
                                          <textarea class="form-control descriptionValue"
                                              placeholder="Enter description" name="description"
                                              id="description"></textarea>
                                          <span class="error descriptionError" style="display: none;">Please enter
                                              description</span>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="No Of Jobs Changed" class="col-sm-4 col-form-label">No Of Jobs
                                          Changed</label>
                                      <div class="col-sm-8">
                                          <span class="displayNoOfJobsChanged udisplaysec"></span>

                                          <select id="NoOfJobsChanged" class="form-control NoOfJobsChangedvvalue"
                                              name="NoOfJobsChanged" data validation="NoOfJobsChanged">
                                              <option value="">--Select No Of Jobs Changed---</option>
                                              <option value="0">0</option>
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5">5</option>
                                          </select>


                                          <span class="error NoOfJobsChangedError" style="display: none;">Please select
                                              no of jobs changed </span>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="workExperience" class="col-sm-4 col-form-label">Work
                                          Experience</label>
                                      <div class="col-sm-8">
                                          <span class="displayworkExperience udisplaysec"></span>
                                          <select id="workExperience" class="form-control workExperienceValue"
                                              name="workExperience" data validation="workExperience">
                                              <option value="">--Select work Experience---</option>
                                              <option value="0">0</option>
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5">5</option>
                                              <option value="6">6</option>
                                              <option value="7">7</option>
                                              <option value="8">8</option>
                                              <option value="9">9</option>
                                              <option value="10">10</option>
                                              <option value="More Than 10 Years">More Than 10 Years</option>

                                          </select>
                                          <span class="error workexperienceError" style="display: none;">Please select
                                              work Experience </span>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="highest Qualification" class="col-sm-4 col-form-label">Highest
                                          Qualification</label>
                                      <div class="col-sm-8">
                                          <span class="displayhighestQualifications udisplaysec"></span>

                                          <select id="highestQualification"
                                              class="form-control highestQualificationsvalue"
                                              name="highestQualifications" data validation="highestQualifications">
                                              <option value="">--Select Highest Qualification---</option>

                                              <option value="10th">10th</option>
                                              <option value="10 + 2/Diploma">10 + 2/Diploma</option>
                                              <option value="Graduation">Graduation-BA/BBA/B.com/B.sc</option>
                                              <option value="Graduation">Graduation-BDS/BHM/B.Pharm/MBBS/LLB</option>
                                              <option value="Graduation">Graduation-B.Tech/B.E/B.Arch</option>
                                              <option value="Others">Graduation-Others</option>
                                              <option value=" Post Graduation">Post Graduation-CA/CS/ICWA</option>
                                              <option value="Post Graduation">Post Graduation-LLM/M.Pharm</option>
                                              <option value="Post Graduation">Post Graduation-M.A/M.Com/M.Sc/MCA
                                              </option>
                                              <option value="Post Graduation">Post Graduation-M.Arch/MS/M.Tech</option>
                                              <option value="Post Graduation">Post Graduation-MBA/PGDBM</option>
                                              <option value="others">Post Graduation-Others</option>
                                          </select>

                                          <span class="error highestqualificationError" style="display: none;">Please
                                              select your highest Qualification</span>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label for="officeContactNumber " class="col-sm-4 col-form-label">Office Contact
                                          Number</label>
                                      <div class="col-sm-8">
                                          <span class="displayofficeContactNumber  udisplaysec"></span>
                                          <input type="" class="form-control officeContactNumbervalue"
                                              placeholder="Enter your officeContactNumber" name="officeContactNumber"
                                              id="officeContactNumber"></span>
                                          <span class="error officeContactNumberError" style="display: none;">Please
                                              enter your office Contact Number
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="fieldOfStudy" class="col-sm-4 col-form-label">Field Of Study</label>
                                      <div class="col-sm-8">
                                          <span class="displayfieldOfStudy  udisplaysec"></span>
                                          <input type="" class="form-control fieldOfStudyValue"
                                              placeholder="Enter your fieldOfStudy" id="fieldOfStudy"
                                              name="fieldOfStudy">
                                          <span class="error fieldOfStudyError" style="display: none;">Please enter your
                                              field Of Study</span>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="college " class="col-sm-4 col-form-label"> College</label>
                                      <div class="col-sm-8">
                                          <span class="displaycollege udisplaysec"> </span>
                                          <input type="" class="form-control collegeValue"
                                              placeholder="Enter your college" id="college" name="college">
                                          <span class="error collegeError" style="display: none;">Please enter your
                                              college</span>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for=" yearOfPassing" class="col-sm-4 col-form-label"> Year Of
                                          Passing</label>
                                      <div class="col-sm-8">
                                          <span class="displayyearOfPassing udisplaysec"></span>
                                          <input type="" class="form-control yearOfPassingValue"
                                              placeholder="Enter your yearOfPassing " id="yearOfPassing">
                                          <span class="error yearOfPassingError" style="display: none;">Please enter
                                              your year Of Passing</span>
                                      </div>
                                  </div>

                                  <p align="center">
                                      <button type="button" class="btn btn-flat btn-primary" id="myprofile-submit-btn">
                                          Submit</button>
                                      <button type="button" class="btn btn-info btn-sm" id="myprofile-edit-btn">
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
  <div class="modal modal-success fade" id="modal-professionaldetailsSuccess">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Thanks!</h4>
              </div>
              <div class="modal-body">
                  <p>Your professional Details have successfully entered. </p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <script type="text/javascript">
loadprofessionalDetails();
  </script>
  <?php include 'footer.php';?>