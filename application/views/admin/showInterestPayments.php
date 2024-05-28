<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$status =  isset($_GET['status']) ? $_GET['status'] : 'Normal';
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="pull-left col-md-6">
            <h1 class="text-bold">
                Interest Payments Info
            </h1>
        </div>
        <div class="pull-left col-md-6" style="display: none;">
            <button class="btn btn-success btn-lg pull-right"><span class="fa fa-download">&nbsp;</span> Download Loans
                Data</button>

        </div>
    </section>
    <div class="cls"></div>
    <section class="content"></br></br>
        <div class="row">
            <div class="col-xs-2 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose Month and year --</option>
                    <option value="interestMonth&Year">MONTH&YEAR</option>
                </select>
                <span class="errorsearch" style="display: none;">Please Choose Month And Year.</span>
            </div>
            <div class="col-xs-2 text-center month" style="display: none;">
                <select class="form-control" name="month" id="interestmonth">
                    <option value=""> Select Month</option>
                    <option value="January" selected="selected">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
            </div>
            <div class="col-xs-2 text-center interestStartDate" style="display: none;">
                <select class="form-control" id="interestStartDateval">
                    <option value="">Start Date</option>
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
            <div class="col-xs-2 text-center interestEndDate" style="display: none;">
                <select class="form-control" id="interestEndDateval">
                    <option value="">End Date</option>
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
            <div class="col-xs-2 text-center year" style="display: none;">
                <select class="form-control" id="interestPayYear">
                    <option value="">End Date</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023" selected="selected">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                </select>
            </div>
            <div class="col-xs-1 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn"
                    onclick="interestPaysearch('<?php echo$status?>');"><i class="fa fa-angle-double-right"></i>
                    <b>Search</b>
                </button>
            </div>
        </div>

        <div class="row customFormQ">
            <div class="cls"></div>
            <div class="col-md-12">
                <div class="box box-secondary">
                    <div class="box-body editlendergroup">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="dealshowinterestinfo pull-left col-md-6">
                                    <h4 style="display:none; font-weight:bold; font-family:sans-serif;"
                                        class="exceutedFilesInfo">Current Month Executed Files<h4>
                                </div>

                                <div class="dealshowinterestinfosearchcall pull-left col-md-6">
                                    <a href="showInterestPayments?status=EXECUTED"> <button
                                            class="btn btn-primary btn-sm pull-right" type="button">View Executed
                                            Files</button></a>
                                </div>

                            </div>
                        </div>

                        </br></br></br>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">

                                    <th>Payment Date</th>
                                    <th>Amount</th>
                                    <th>View current Deals</th>


                                </tr>
                            </thead>
                            <tbody id="loadDealsInfo">
                                <tr id="displayNoRecords" class="displayRequests" style="display: none;">
                                    <td colspan="12">No Data found!</td>
                                </tr>
                            </tbody>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
    </section>
</div>
</div>
<div class="modal fade" id="modal-currentmonth-paymentdate">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <center>
                    <h4>Are You Sure, You Want to Update the current month payment date ?</h4>
                </center>
            </div>
            <div class="modal-body col-md-12">
                <div class="col-sm-3">
                    <label for="name " class="col-sm-12 col-form-label">Payment date<em class="error">*</em> :</label>
                </div>
                <div class="col-sm-7">
                    <input type="text" name="closedate" class="form-control closeDate"
                        placeholder="Please Enter payment Date" id="paymentDate" required="required" />
                    <span class="error error-close" style="display: none;">Please Enter payment Date</span>
                </div>


            </div>

            <div class="modal-footer currentpayoutdate">
                <button type="button" class="btn  btn-success dealpaymentBtn " data-reqID=""
                    onclick="currentMonthDealPaymentDateUpdation();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-warning fade" id="modal-error-PaymentdateUpdate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Updated</h4>
            </div>
            <div class="modal-body">
                <p id="paymentError"> Db changes have been updated in the excel sheet.
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
<div class="modal modal-success fade" id="modal-success-PaymentdateUpdate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Updated</h4>
            </div>
            <div class="modal-body">
                <p id="paymentError">Successfully updated the payment date
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
<div class="modal modal-warning fade" id="modal-searchcall-showinterestdata">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Updated</h4>
            </div>
            <div class="modal-body">
                <p id="searchbody">Deal is closed Interest payment is not their with given month or year.
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>

    </div>

</div>



<script id="displayInterestScript" type="text/template">
    {{#data}}
      <tr>

     <td class="col-md-4">
    <span class="lable_mobileDiv">Sno</span>
    {{paymentDate}}</td>

    <td class="col-md-4">
    {{amount}} 
    </td>
    
    <td class="col-md-4">
  <button class="btn btn-xs bg-black showinterestinfopayment" data-Id={{paymentDate}}   onclick="viewCurrentDealInfo('{{paymentDate}}');">Break Up View</button>
      
    </td>
  
  </tr>

 <tr class="disPlayNone ">

    <td style="display:none;" colspan="14" class="viewQueryadminStatus viewQueryShowInterestPayments-{{paymentDate}}  solidToggle_{{paymentDate}}">
      
      <table class="table table-bordered table-hover">
        <thead>
          <tr style="background-color: #ADD8E6; border: 1px solid lightgrey;">

                  <th>Payment Date</th>
                  <th>Deal Info</th>
                  <th>Lenders Info</th>
                  <th>View More</th> 
        
          </tr>
        </thead>
        <tbody id="displayUserShowinterestInfo-{{paymentDate}}">

        <tr class="viewQueryAdminComments_{{paymentDate}}" style='display:none'>
        <td class="col-md-8">
          No comments Found
        </td>

       </tr> 

        </tbody>
        </tfoot>
      </table>
    </td>
     
      </tr>
      {{/data}}
      </script>


<script id="displayshowinterestInfoScript" type="text/template">
    {{#data}}
    
      <tr class="showinterestPaymentinquery-{{paymentDate}}">
        <td>{{paymentDate}}</br></br>
         {{#actualPaymentDate}}
          <b>Updated payment date</br>
          {{actualPaymentDate}}</b>
          {{/actualPaymentDate}}
          {{^actualPaymentDate}}
         <a href="#" onclick="updateCurrentmonthpaymentdate('{{dealId}}','{{noOfLenders}}','{{totalInterest}}','{{paymentDate}}');">Update Payment Date</a>
          {{/actualPaymentDate}} </br> </br>

          <b>Payment Status :
          

           {{#dealStatus}}
            {{dealStatus}}
            {{/dealStatus}}
            {{^dealStatus}}
             Pending
           {{/dealStatus}}


        </b>
        </td>
       
          <td> Deal Name:  {{dealName}} </br>
            ID: {{dealId}}</br>
             Deal Value: {{totalDealValue}}</br>
            Achieved Value: {{totalAchievedValue}}</br>
             Current Value: {{currentValue}}</br>
             ROI :{{rateOfInterest}} % 
           </td>
            <td>
           NO of Lenders: {{noOfLenders}}</br>
           No of Withdraw: {{totalNoOfWithDrawls}}</br>
           Bank  Withdraw  : {{noOfwithdrawlsFromDeal}}  </br>
           Wallet Withdraw   : {{noOfwithdrawlsFromWallet}}  </br>
           Withdraw Value:    {{withDrawlValue}} </br>
           <b>Interest amount : INR {{totalInterest}}</b>
         
        </td>
    
        <td>
          <a class="isactualPaymentDate_{{actualPaymentDate}}" href="viewdealBasedPayments?deal={{dealId}}&paymentDate={{actualPaymentDate}}&currentDate={{actualPaymentDate}}&totalInterest={{totalInterest}}&dealname={{dealName}}&orginalPaymentDate={{paymentDate}}">  

            <button class="btn btn-warning btn-large ispaymentExecited_{{dealStatus}}">MORE >> </button></a> </br> </br>
          <a class="viewLenders" href="viewDealLenders?id={{dealId}}& dealName={{dealName}}" target="_blank"><button class="btn btn-success btn-large"> View Lenders</button></a>


          
        </td>
      </tr>
  
      {{/data}}
      </script>
<script type="text/javascript">
window.onload = getInterestInfo("<?php echo$status ?>");
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#paymentDate, #cmsfilesRead,#monthReportsdate").datepicker({
        format: 'dd-mm-yyyy',
        changeMonth: true,
        changeYear: true,
        todayHighlight: true,
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {

    $('input[name="readrepomonths"]').on('click change', function(e) {
        var reportsType = ($(this).val());
        if (reportsType == "day") {
            $(".monthreports").hide();
            $('.daywisereports').show();
            $("#readCMSReportsd").show()
            $("#readCMSReportsm").hide()
        } else {
            $(".monthreports").show();
            $('.daywisereports').hide();
            $("#readCMSReportsm").show();
            $("#readCMSReportsd").hide()
        }
    });
});
</script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<?php include 'admin_footer.php';?>