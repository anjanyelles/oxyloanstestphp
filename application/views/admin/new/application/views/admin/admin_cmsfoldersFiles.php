<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <section class="content-header">

        <div class="col-md-12 ">
            <div class="pull-right">

            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row searchcmsapplication" style="display:none">
            <div class="col-xs-2 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="CMSOPTIONS">Day/Month/Year</option>
                </select>
                <span class="errorsearch" style="display: none;">Please choose option.</span>
            </div>

            <div class="col-xs-2 text-center cmsDropdate" style="display: none;">
                <select class="form-control cmsDay" name="transtype">
                    <option value=""> Select Day</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>

                </select>
            </div>

            <div class="col-xs-2 text-center cmsDropMonth" style="display: none;">
                <select class="form-control cmsmonth" name="transmonth">
                    <option value=""> Select Month</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>

                </select>
            </div>
            <div class="col-xs-2 text-center cmsDropYear" style="display: none;">
                <select class="form-control cmsYear" name="transyear">
                     <option value="">Select The Year</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>

                </select>

            </div>

            <div class="col-xs-2 text-center cmsSearchType" style="display: none;">
                <select class="form-control cmsSearchUserType" name="transyear">
                    <option value="">Search User Type</option>
                    <option value="Oxyloans" selected>Oxyloans</option>
                      <option value="Student">Student</option>
                    <!-- <option value="Partner">Partner</option> -->


                </select>

            </div>


            <div class="col-xs-2 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="cmsSelectDateOptionsSearch()"><i
                        class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>


        </div>
        <div class="row">
            <div class="col-xs-12">

                <div class="cmsLoginPass">
                    <span class="error errorCms" style="display:none;">Invalid Password</span>
                    <input type="password" name="cmspass" placeholder="Enter Cms Password" class="cmspassword">
                    <button class="btn btn-xs cms-submit" onclick="verifyCmsLOGIN();">Submit</button>

                </div>



                <div class="card cmsBoxCard" style="display:none">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="tab" class="active"><a href="#home" aria-controls="home" role="tab"
                                data-toggle="tab"><i class="fa fa-user"></i> <span>Oxy CMS</a></li>
                        <li role="tab"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i
                                    class="fa fa-file" aria-hidden="true"></i> <span> Before Files</span></a></li>

                        <li role="tab"><a href="#cmsStatus" aria-controls="cmsStatus" role="tab" data-toggle="tab"><i
                                    class="fa fa-file" aria-hidden="true"></i> <span> CMS Status</span></a></li>


                        <li role="tab"><a href="#cmsStatusfailures" aria-controls="cmsStatusfailures" role="tab"
                                data-toggle="tab"><i class="fa fa-file" aria-hidden="true"></i> <span> CMS Failure
                                    Files</span></a></li>

                        <li role="tab"><a href="#studentLoans" aria-controls="studentLoans" role="tab"
                                data-toggle="tab"><i class="fa fa-file" aria-hidden="true"></i> <span> Student
                                    Loan</span></a></li>


                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <div class="" style="width:100%;">

                                <div class="alert finallMoveCMSSucessmessage" role="alert"
                                    style="background-color: #D0f0C0; display: none; font-size: 18px;">
                                    <span id="error-DealClosed"><strong>Well done!</strong> Files Moved
                                        Successfully.</span>
                                </div>

                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-md-8 pull-left cmscheckboxs">
                                            <b>Notification to groups:</b>
                                            <input type="checkbox" name="cmsNotification" class="cmsNotification" />
                                            <button class="btn btn-success btn-sm approveToCms"
                                                onclick="finalyMoveCms();"> Approve to CMS
                                            </button>
                                        </div>
                                        <div class="col-md-4 pull-right">
                                            <p><b>Oxy Total Amount of Cms files : <span
                                                        class="totalCmsamount"></span></b></p>

                                        </div>
                                    </div> </br></br></br>

                                    <table id="example2" class="table table-bordered table-hover"
                                        style=" table-layout: fixed;width:100%!important;">
                                        <thead>
                                            <tr id="example">
                                                <th style="width:20%!important;overflow: hidden;">file Name</th>
                                                <th>Amount </th>
                                                <th>Payment Date </th>
                                                <th>File status</th>
                                                <th>Check </th>
                                                <!-- <th>Comments </th> -->
                                            </tr>
                                        </thead>
                                        <tbody id="displaycmsoutputfolderFiles">
                                            <tr id="cmsdisplayNodata" style="display:none;">
                                                <td colspan="5" class="cmsnodatafound">No Data Found</td>
                                            </tr>

                                            </tfoot>
                                    </table>



                                </div>
                            </div>


                        </div>

                        <div class="tab-pane" id="profile">

                            <div class="" style="width:100%;">
                                <div class="col-xs-12">
                                    </br></br> 
                                         <div class="row">
            <div class="col-xs-3">
                <select class="form-control choosenType" id="cmsbeforefileSearch" onchange="cmsbeforefileSearchonchmage();">
                    <option value="">-- Choose --</option>
                    <option value="cmsbeforefile">Start/End Date</option>
                </select>
                <span class="errorsearch" style="display: none;">Please choose option.</span>
            </div>

            <div class="col-xs-2 text-center cmsbeforestartdatediv" style="display:none;">
               <input type="text" name="fdinvoicestartdate" class="form-control dashboardStart"
                    placeholder="start Date">
            </div>

            <div class="col-xs-3 text-center cmsbeforeenddatediv" style="display:none;">
              <input type="text" name="invoiceenddate" class="form-control dashboardEnd" placeholder="End date">
            </div>

            <div class="col-xs-2 text-center cmsbeforefilestatus" style="display:none;"  >
                    <select class="form-control choosenType" id="cmsbeforefileexcution">
                    <option value="EXECUTED" selected>EXECUTED</option>
                    <option value="INITIATED">INITIATED</option>
                     <option value="BOTH">BOTH</option>
                </select>
             
            </div>
      
            <div class="col-xs-1 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="cmsbeforefilesList()"><i
                        class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
             </div>


                                </div></br></br> </br></br> </br></br></br>                                
                                <table id="example2" class="table table-bordered table-hover">
       
                                    <thead>
                                        <tr id="example">
                                            <th>file Name</th>
                                            <th>Amount </th>
                                            <th>Payment Date </th>
                                           
                                            <th>File status</th>
                                            <th>Return Type</th>
                                        </tr>
                                    </thead>
                                    <tbody id="partnerdisplaycmsoutputfolderFiles">
                                        <tr id="oxydisplayNodata">
                                            <td colspan="12">No Data Found</td>
                                        </tr>

                                        </tfoot>
                                </table>


                            </div>


                        </div>

                        <div class="tab-pane " id="cmsStatus">
                            <div class="" style="width:100%;">
                                <div class="col-xs-12">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr id="example">
                                                <th>file Name</th>

                                            </tr>
                                        </thead>
                                        <tbody id="displaycmsStatusData">
                                            <tr id="nodatacmsStatus" style="display:none;">
                                                <td colspan="8">No Data Found</td>
                                            </tr>

                                            </tfoot>
                                    </table>



                                </div>
                            </div>

                        </div>


                        <div class="tab-pane " id="cmsStatusfailures">
                            <div class="" style="width:100%;">
                                <div class="col-xs-12">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr id="example">
                                                <th>file Name</th>

                                            </tr>
                                        </thead>
                                        <tbody id="displaycmsStatusDatafailure">
                                            <tr id="nodatacmsStatusfailure" style="display:none;">
                                                <td colspan="12">No Data Found</td>
                                            </tr>

                                            </tfoot>
                                    </table>



                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="studentLoans">

                            <div class="alert finallMoveCMSSucesstudentsmessage" role="alert"
                                style="background-color: #D0f0C0; display: none; font-size: 18px;">
                                <span id="error-DealClosed"><strong>Well done!</strong> Files Moved
                                    Successfully.</span>
                            </div>
                            <div class="" style="width:100%;">
                                <div class="col-xs-12">

                                    <div class="row col-xs-12">
                                        <button class="btn btn-success pull-left btn-md"
                                            onclick="studentMoveCms();">Approve To Cms </button>
                                    </div>



                                    <div class="row displaystudentNofile" style="display:none;">
                                        <span class="error"> Select at least one file. </span>
                                    </div>
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr id="example">
                                                <th>File Name</th>
                                                <th>Borrower Info</th>
                                                <th>Amount</th>
                                                <th>File Status</th>
                                                <th>File Type</th>
                                                <th>Select</th>


                                            </tr>
                                        </thead>
                                        <tbody id="displaycmsStudentfiles">


                                            <tr id="nodatacmsStudentFiles" style="display:none;">
                                                <td colspan="12">No Data Found</td>
                                            </tr>
                                            </tfoot>
                                    </table>



                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.row -->
    </section>
    <!-- /.content -->

    <div class="modal modal-warning fade" id="modal-studentloanError">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Oops!</h4>
                </div>
                <div class="modal-body errorstudentloan">
                    <p id="studentcmserror"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">OK</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



    <script id="displayDealsCmsFolderList" type="text/template">
        {{#data}}
    <tr>
      <td class="col-md-2">{{fileName}}</td>
           <td class="cmsAmount" value="{{amount}}">{{amount}}
            </br>
           <b>Deal Id : {{dealId}}</b>
           </td>
          <td>{{paymentDate}}
        
        </td>
        <td>{{fileStatus}}

        </br>
           <b>{{fileType}}</b>
        </td>
       <td>
        <input type="checkbox" name="cmsoutputfolderListUsers" id="cmsoxyfile" class="cmsFileStatus_{{fileStatus}}"
        value="{{fileName}}"/>
      </td>


    </tr>
    {{/data}}
    </script>

    <script id="partnerdisplayDealsCmsFolderList" type="text/template">
        {{#data}}
    <tr>
      <td>{{fileName}}</td>
           <td class="cmsAmount" value="{{totalAmount}}">
           {{totalAmount}} 
           </td>
                <td>
                    {{paymentDate}} 

                </td>
    
           <td>{{fileStatus}}</td>
            <td>{{returnType}}</td>
    </tr>
    {{/data}}
    </script>

    <script id="studentdisplayCmsFolderList" type="text/template">
        {{#data}}
    <tr>
         <td>{{fileName}}</td>


                <td>
                Name: {{borrowerName}}</br>
                Ac/No : {{accountNumber}}</br>
                IFSC : {{ifsc}}


                </td>
         


           <td class="cmsAmount" value="{{amount}}">
           {{amount}} 
           </td>



                <td>
                    {{fileStatus}} 

                </td>
    
               


            <td>{{fileType}}</td>
             <td>
        <input type="checkbox" name="studentfdlistFiles" id="fdMoveCMSfiles" class="cmsFileStatus_{{fileStatus}}"  
        value="{{fileName}}"/>
        
      </td>
    </tr>
    {{/data}}
    </script>


    <script id="displayCmsDataScriptData" type="text/template">
        {{#data}}
    <tr>
      <td>{{fileName}}</td>
    
    </tr>
    {{/data}}
    </script>

    <script id="displayCmsDataScriptDatafailures" type="text/template">
        {{#data}}
    <tr>
      <td>{{fileName}}</td>
    
    </tr>
    {{/data}}
    </script>

    <script>
    function cmsfolder(e) {
        var checkboxes = document.getElementsByName('cmsoutputfolderListUsers');
        if (e.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        }
    }
    </script>



    <script>
    function cmsfolder(e) {
        var checkboxes = document.getElementsByName('studentfdlistFiles');
        if (e.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        }
    }
    </script>
    <script type="text/javascript">
    window.onload = loadcmsBoxes();
    window.onload = oxycmsoutputfileslist();
    // window.onload = partnercmsoutputfileslist();
    window.onload = studentcmsoutputfileslist();
    window.onload = loadCmsStatus();
    window.onload = loadcmsFileDataStatus("0");
    window.onload = loadcmsFileDataStatus("1");
    window.onload=  selectThedafaultValues();
    </script>

    <style type="text/css">
    .nav-tabs {
        border-bottom: 2px solid #DDD;
    }

    .nav-tabs>li.active>a,
    .nav-tabs>li.active>a:focus,
    .nav-tabs>li.active>a:hover {
        border-width: 0;
        color: #fff !important;
        background: #1e5959 !important;
    }

    .nav-tabs>li>a {
        border: none;
        color: #1E5959 !important;
        background: #fff !important;
    }

    .nav-tabs>li>a::after {
        content: "";
        background: #5a4080;
        height: 2px;
        position: absolute;
        width: 100%;
        left: 0px;
        bottom: -1px;
        transition: all 250ms ease 0s;
        transform: scale(0);
    }

    .nav-tabs>li.active>a::after,
    .nav-tabs>li:hover>a::after {
        transform: scale(1);
    }

    .tab-nav>li>a::after {
        background: #1E5959 none repeat scroll 0% 0%;
        color: #fff;
    }

    .tab-pane {
        padding: 30px 0;
    }

    .tab-content {
        padding: 10px
    }

    .nav-tabs>li {
        width: 20%;
        text-align: center;
    }

    .card {
        background: #FFF none repeat scroll 0% 0%;
        box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3);
        margin-bottom: 30px;
        min-height: 450px;
    }

    i {
        margin-left: 3px;
    }

    .list-group-flush .list-group-item {
        padding-bottom: 30px;
        background-color: #F5F5F5;
    }

    @media all and (max-width:724px) {
        .nav-tabs>li>a>span {
            display: none;
        }

        .nav-tabs>li>a {
            padding: 5px 5px;
        }
    }

    @media (min-width: 1200px) {
        .container {
            width: 1030px !important;
        }

        .text_Updates {
            color: #3c8dbc;
        }

    }
    </style>




    </script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <?php include 'admin_footer.php';?>