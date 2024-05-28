<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <section class="content-header">

        <h1 style="margin-left:20px" class="text-bold">
            <left>View List Of FD'S</left>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        
        <div class="row">
            <div class="col-xs-12">
                <div class="card cmsBoxCard">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="tab" class="active"><a href="#allfds" aria-controls="home" role="tab"
                                data-toggle="tab"><i class="fa fa-user"></i> <span>All </a></li>
                        <li role="tab"><a href="#Running" aria-controls="Running" role="tab" data-toggle="tab"><i
                                    class="fa fa-angle-double-right" aria-hidden="true"></i> <span> Running</span></a>
                        </li>

                        <li role="tab"><a href="#closedFds" aria-controls="closedFds" role="tab" data-toggle="tab"><i
                                    class="fa fa-circle-o" aria-hidden="true"></i> <span> Closed</span></a></li>

                        <li role="tab"><a href="#nagativePayment" aria-controls="closedFds" role="tab"
                                data-toggle="tab"><i class="fa fa-calendar" aria-hidden="true"></i> <span>Nagative
                                    FD's</span></a></li>


                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="allfds">
                            <div class="" style="width:100%;">

                                <div class="alert finallMoveCMSSucessmessage" role="alert"
                                    style="background-color: #D0f0C0; display: none; font-size: 18px;">
                                    <span id="error-DealClosed"><strong>Well done!</strong> Files Moved
                                        Successfully.</span>
                                </div>

                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class=" col-md-6 pull-left">
                                            <span class="text-bold">All FD'S</span>

                                        </div>

                                        <div class=" col-md-6 pull-right">
                                            <div class="fdPaginationAll pull-right">
                                                <ul class="pagination bootpag">
                                                </ul>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="row col-12 search-fd-bar" >
                                        <div class="search-container">

                                            <span class="fa fa-search"></span>
                                            <input type="text" placeholder="Search  User Id" name="search"
                                                id="searchCalloffdall">
                                            <p class="error searchCalloffdallerror" style="display: none;">Enter User id
                                            </p>



                                        </div>
                                        <button class="btn btn-success btn-md fd searchbar_btn col-md-3" type="button"
                                            onclick="searchFduser('allfd');">Submit</button>


                           
                                    </div>
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr id="example">
                                                <th>Borrower Info</th>
                                                <th width="20%">FD Info </th>
                                                <th>Bank Details </th>
                                                <th>FD Create Date </th>
                                                <th>View Payment Details </th>
                                                <th>FD Status</th>


                                            </tr>
                                        </thead>
                                        <tbody id="displayBorrowerAllFds">
                                            <tr class="noDataAllFds" style="display:none;">
                                                <th colspan="8">No Record Found</th>
                                            </tr>

                                            </tfoot>
                                    </table>


                                </div>
                            </div>


                        </div>

                        <div class="tab-pane" id="Running">

                            <div class="" style="width:100%;">



                                <div class="row">
                                    <div class=" col-md-6 pull-left">
                                        <span class="text-bold">Running FD's</span>

                                    </div>

                                    <div class=" col-md-6 pull-right">
                                        <div class="fdPaginationRunning pull-right">
                                            <ul class="pagination bootpag">
                                            </ul>
                                        </div>

                                    </div>
                                </div>

                                <div class="row col-12 search-fd-bar">
                                    <div class="search-container">

                                        <span class="fa fa-search"></span>
                                        <input type="text" placeholder="Search  User Id" name="search"
                                            id="searchCalloffdallrunning">
                                        <p class="error searchCalloffdallrunningerror" style="display: none;">Enter User
                                            id</p>



                                    </div>
                                    <button class="btn btn-success btn-md fd searchbar_btn" type="button"
                                        onclick="searchFduser('allrunning');">Submit</button>


                                           <button class="btn btn-warning btn-md fd col-md-2" type="button" style="margin-left:5px" 
                                            onclick="downloadTheActiveFds();"> <i class="fa fa-download"></i>  Active Fd's</button>
                                </div>

                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr id="example">
                                            <th>Borrower Info</th>
                                            <th width="17%">FD Info </th>
                                            <th>Bank Details </th>
                                            <th>FD Create Date </th>

                                            <th>View Payment Details </th>
                                            <th>FD Status</th>


                                        </tr>
                                    </thead>
                                    <tbody id="displayBorrowerRunningFds">

                                        <tr class="noDataRunningFds" style="display:none;">
                                            <th colspan="8">No Record Found</th>
                                        </tr>
                                        </tfoot>
                                </table>


                            </div>


                        </div>

                        <div class="tab-pane " id="closedFds">




                            <div class="" style="width:100%;">



                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class=" col-md-6 pull-left">
                                            <span class="text-bold">Closed FD's</span>

                                        </div>

                                        <div class=" col-md-6 pull-right">
                                            <div class="fdPaginationclosed pull-right">
                                                <ul class="pagination bootpag">
                                                </ul>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row col-12 search-fd-bar" >
                                        <div class="search-container">

                                            <span class="fa fa-search"></span>
                                            <input type="text" placeholder="Search  User Id" name="search"
                                                id="searchCallofclosedfd">
                                            <p class="error searchCallofclosedfderror" style="display: none;">Enter User
                                                id</p>



                                        </div>
                                        <button class="btn btn-success btn-md fd searchbar_btn" type="button"
                                            onclick="searchFduser('closedfd');">Submit</button>
                                    </div>
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr id="example">
                                                <th>Borrower Info</th>
                                                <th width="20%">FD Info </th>
                                                <th>Bank Details </th>

                                                <th>FD Create Date </th>
                                                <th>FD Expire Date </th>
                                                <th>View Payment Details </th>
                                                <th>FD Status</th>


                                            </tr>
                                        </thead>
                                        <tbody id="displayBorrowerClosedFds">

                                            <tr class="noDataClosedFds" style="display:none;">
                                                <th colspan="8">No Record Found</th>
                                            </tr>
                                            </tfoot>
                                    </table>



                                </div>
                            </div>

                        </div>




                        <div class="tab-pane " id="nagativePayment">
                            <div class="" style="width:100%;">
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class=" col-md-6 pull-left">
                                            <span class="text-bold">Negative FD's</span>

                                        </div>

                                        <div class=" col-md-6 pull-right">
                                            <div class="fdPaginationnegative pull-right">
                                                <ul class="pagination bootpag">
                                                </ul>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="row col-12 search-fd-bar" >
                                        <div class="search-container">

                                            <span class="fa fa-search"></span>
                                            <input type="text" placeholder="Search  User Id" name="search"
                                                id="searchCallofnagativefd">

                                            <p class="error searchCallofnagativefderror" style="display: none;">Enter
                                                User id</p>



                                        </div>
                                        <button class="btn btn-success btn-md fd searchbar_btn" type="button"
                                            onclick="searchFduser('nagativefd');">Submit</button>
                                    </div>
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr id="example">
                                                <th>Borrower Info</th>
                                                <th width="17%">FD Info </th>
                                                <th>Bank Details </th>

                                                <th>FD Create Date </th>
                                                <th>FD Expire Date </th>
                                                <th>View Payment Details </th>
                                                <th>FD Status</th>


                                            </tr>
                                        </thead>
                                        <tbody id="displayBorrowerNegative">
                                            <tr class="noDataNegativeFds" style="display:none;">
                                                <th colspan="8">No Record Found</th>
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


    <div class="modal   fade" id="modal-approveFdStatus">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Are You Sure You Want Update Interest Amount ? </h4>
                </div>
                <div class="modal-body">
                     <div>
                    <label>FD Status</label>
                    <select class="form-control" id="fdclosedStatus">
                        <option value="">Choose FD Status</option>
                        <option value="CLOSED" selected>CLOSED</option>
                    </select>
                </div>
            </br>

                    <div>
                        <label>FD AMOUNT</label>
                        <input type="text" name="Fdamount" class="form-control" placeholder="Enter FD  Amount "
                            id="closingFdamount">
                        <p class="error closingFdamounterror" style="display:none">Enter The Amount</p>
                    </div>
</br>

                    <div>
                        <label>FD closed  Date</label>
                        <input type="text" name="Fdamount" class="form-control" placeholder="Enter FD Closed Date"
                            id="closingFddate">
                        <p class="error closingFddateerror" style="display:none">Enter The fd closed date</p>
                    </div>
</br>
                     <div>
                        <label> Return To Repayment Amount</label>
                        <input type="text" name="Fdamount" class="form-control" placeholder="Enter Returned To Repayment Amount"
                            id="repaymentAmount">
                        <p class="error closingFdrepaymenterror" style="display:none">Enter  Return To Repayment Amount</p>
                    </div>
</br>
                     <div>
                        <label>Amount Returned To Another</label>
                        <input type="text" name="Fdamount" class="form-control" placeholder="Enter Amount Returned To Another "
                            id="returntoanootheraccount">
                        <p class="error closingreturntoanothererror" style="display:none">Enter The Amount Returned To Another</p>
                    </div>
</br>
                      <div>
                       <b>Enter The comments</b>
                        <textarea id="fdreturncomment" class="col-md-12 col-lg-12" placeholder="Enter the comments" style="resize: none;"></textarea>
                        <p class="error closingrfdreturncommenterror" style="display:none">Enter comments</p>
                    </div>

</br>
                </div>
                </br>
                <div class="modal-footer">
                    <div align="right">
                        <button type="button" class="btn  btn-primary btn-sm" id="fdclosingPaymentId" data-clikedId=""
                            onclick="fdClosing()">Save</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="modal   fade" id="modal-sendReminder">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmation? </h4>
                </div>
                <div class="modal-body">
                    <label>Are You Sure You Want to Send the Reminder to the Borrower to Pay the Due Amount?</label>
                </div>
                <div class="modal-footer">
                    <div align="right">
                        <button type="button" class="btn  btn-primary btn-sm saveApproveCommentsBtn"
                            data-dismiss="modal" data-clikedId="" onclick="updatewalletApproveComments()">yes</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="modal fade" id="modal-SendNotification">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmation? </h4>
                </div>
                <div class="modal-body">
                    <label>Are Sure You want to approve the payment</label>
                </div>
                <div class="modal-footer">
                    <div align="right">
                        <button type="button" class="btn  btn-primary btn-sm saveApproveCommentsBtn"
                            data-dismiss="modal" data-clikedId=""
                            onclick="updateThePaymentStatus('APPROVED')">Save</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>




    <div class="modal modal-success fade" id="modal-sucess-fd-closing">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Thanks </h4>
                </div>
                <div class="modal-body">
                    <label>you have successfully Updated the fd Closed Amount</label>
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




    <div class="modal  fade" id="modal-viewPaymentHistory">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="row">



                </div>
                <div class="modal-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="mobileDiv_4">
                            <tr style="background-color: #B0C4DE; border: 1px solid lightgrey;">



                                <th>Account Type</th>
                                <th>Paid Amount</th>
                                <!-- <th>Paid ON</th> -->
                                <th>Status</th>



                            </tr>
                        </thead>
                        <tbody id="displayViewPaymentRecords" class="mobileDiv_3">
                            <tr id="displayNoRecords" style="display:none;">
                                <td colspan="8">No Data found!</td>
                            </tr>


                            </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>





<script id="fdlistAll" type="text/template">
    {{#data}}   
          <tr class="noDatafoundStatus">
                                            <td>
                                                   <b> Name : {{userName}} </b></br>
                                                     ID: BR{{userId}}   </br>
                                                    Mobile No : {{registeredMobileNumber}}
                                                </td>
                                                <td>
                                                      <b> Fd Amount : {{fdAmount}} </b> </br>
                                                       {{#fdAmountFromSystem}}
                                                      <b> From System :{{fdAmountFromSystem}}  </b></br>
                                                    {{/fdAmountFromSystem}}
                                                   <b>  ROI : {{roi}} % PM  </b> <br>
                                                      Funding Type : {{fundingType}} 
                                                </td>
                                                <td>
                                                    {{bankName}}</br>
                                                    {{ifsc}} </br>
                                                    {{branch}}
                                                </td>

                                            <td>

                                               <b> FD create Date :  {{fdCreatedDate}}</b></br>

                                                 <b>  Fee payer : {{paymentsCollection}}</b>


                                                {{#fdValidityDate}}
                                                  </br>
                                                    Fd expire :  {{fdValidityDate}}    </br>
                                                  {{#days}}
                                                   <b>   Days : {{days}} </b> 
                                                  {{/days}}
                                                {{/fdValidityDate}}

                                            </td>



                                         
                                            <td>

                                    <button class="btn btn-info btn-xs" onclick="viewFdpaymentHistory({{userId}});">
                                                    Payment History</button>
                                            </td>

                                            <td>
                                               {{status}} </br></br>
                                    <button class="btn btn-xs btn-primary" onclick="updateFdAmount({{paymentId}});">
                                                        Update FD Status</button>


                                            </td>
                                        </tr>



 {{/data}}
</script>


<script id="fdlistRunning" type="text/template">
    {{#data}}   
<tr class="noDatafoundStatus fdnagativeList_{{status}}">
                                            <td>
                                                   <b> Name : {{userName}} </b></br>
                                                     ID: BR{{userId}}  </br>
                                                    Mobile No : {{registeredMobileNumber}}
                                                </td>
                                                <td>
                                                   <b>Fd Amount : {{fdAmount}} </b> </br>
                                                       {{#fdAmountFromSystem}}
                                                      <b> From System :{{fdAmountFromSystem}}  </b></br>
                                                    {{/fdAmountFromSystem}}
                                                   <b>  ROI : {{roi}} % PM  </b> <br>

                                                     <b>  Fee payer : {{paymentsCollection}}</b></br>

                                                     Funding Type : {{fundingType}} 
                                                </td>
                                                <td>
                                                    {{bankName}}</br>
                                                    {{ifsc}} </br>
                                                    {{branch}}
                                                </td>

                                            <td>

                                               <b> FD create Date :  {{fdCreatedDate}} </b>



                                        <div class="fd_{{status}} fd_runnings_{{status}}" style="display:none">
                                                <b>  FD validity Date :  {{fdValidityDate}}</b></br>
                                                  <b> Negative Days: {{days}} days</b> 

                                                </div>

                                            </td>

                                            <td>

                             <button class="btn btn-info btn-xs" onclick="viewFdpaymentHistory({{userId}});">
                                                    Payment History</button>
                                            </td>

                                            <td>
                                               {{status}} </br></br>
                                    <button class="btn btn-xs btn-primary" onclick="updateFdAmount({{paymentId}});">
                                                        Update FD Status</button>


                                            </td>
                                        </tr>



 {{/data}}
</script>






<script id="fdlistClosed" type="text/template">
    {{#data}}   
 <tr class="noDatafoundStatus">
                                                <td>
                                                   <b> Name : {{userName}} </b></br>
                                                     ID: BR{{userId}}   </br>
                                                    Mobile No : {{registeredMobileNumber}}
                                                </td>
                                                <td>
                                                   <b>Fd Amount : {{fdAmount}} </b> </br>
                                                     <b>  Fee payer : {{paymentsCollection}}</b></br>


                                                       {{#fdAmountFromSystem}}
                                                      <b>From System :{{fdAmountFromSystem}}  </b></br>
                                                    {{/fdAmountFromSystem}}
                                                   <b>  ROI : {{roi}} % PM  </b> <br>
                                                     Funding Type : {{fundingType}} 
                                                </td>
                                                <td>
                                                    {{bankName}}</br>
                                                    {{ifsc}} </br>
                                                    {{branch}}
                                                </td>
                                                <td>

                                                    FD create Date : {{fdCreatedDate}} <br/>

                                                    

                                                </td>



                                                <td>

                                                   <b> FD Expired Date : {{fdValidityDate}} </b> </br>
                                                        FD Closed Date : {{fdClosedDate}}

                                                </td>
                                                <td>

                                         <button class="btn btn-info btn-xs"
                                         onclick="viewFdpaymentHistory({{userId}});"> Payment History</button>
 


                                          {{#feeInvoice}}
                                           </br> </br>  
                                         <button class="btn btn-success btn-xs"
                                         onclick="downloadClosaedInvoice('{{feeInvoice}}');"> Download Invoice </button>
                                          {{/feeInvoice}}

                                    




                                                </td>

                                                <td>
                                                    {{status}} 


                                                </td>
                                            </tr>



 {{/data}}
</script>



<script id="fdlistnagative" type="text/template">
    {{#data}}   
        <tr class="noDatafoundStatus">
                                                <td>
                                                    <b> Name : {{userName}} </b></br>
                                                     ID: BR{{userId}}   </br>
                                                    Mobile No : {{registeredMobileNumber}}
                                                </td>
                                                <td>
                                                    <b>Fd Amount : {{fdAmount}} </b> </br>

                                                    <b>  Fee payer : {{paymentsCollection}}</b></br>

                                                       {{#fdAmountFromSystem}}
                                                      <b> From System :{{fdAmountFromSystem}}  </b></br>
                                                    {{/fdAmountFromSystem}}
                                                   <b>  ROI : {{roi}} % PM  </b> <br>
                                                      Funding Type : {{fundingType}} 
                                                </td>
                                                <td>
                                                    {{bankName}}</br>
                                                    {{ifsc}} </br>
                                                    {{branch}}
                                                </td>

                                                <td>

                                                   <b>  FD create Date :  {{fdCreatedDate}}</b>


                                                </td>



                                                <td>

                                                    FD Expired Date : {{fdValidityDate}} </br>
                                                    <b>  Negative Days :  {{days}} </b>

                                                </td>
                                                <td>

                                            <button class="btn btn-info btn-xs"
                                             onclick="viewFdpaymentHistory({{userId}});"> Payment History</button>
                                                </td>

                                                <td>
                                                    {{status}}
                                                </td>
                                            </tr>



 {{/data}}
</script>


<script id="scriptiewFdPaymentHistory" type="text/template">
    {{#data}}

     <tr>

    <td>
       {{accountType}}                                             
    </td>


    <td>
     {{amountPaid}}                                              
    </td>

     <td>
    {{documentStatus}}
    </td>

     </tr>                                                
   {{/data}}  
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
    background: #3f826D !important;
}

.nav-tabs>li>a {
    border: none;
    color: #1E5959 !important;
    background: #fff !important;
}

.nav-tabs>li>a::after {
    content: "";

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
    text-align: left;
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



<script type="text/javascript">
window.load = viewunningFdListInformation('RUNNING');
window.load = viewNegativeFdListInformation('NEGATIVE');
window.load = viewAllFdListInformation('ALL');
window.load = viewclosedFdListInformation('CLOSED');
</script>


</script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<?php include 'admin_footer.php';?>