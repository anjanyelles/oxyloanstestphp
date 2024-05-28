<!--<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });-->
</script>
<style type="text/css">
.loadingSec {
    text-align: center;
    opacity: 0.5;
    background: #000;
    position: fixed;
    top: 0;
    bottom: 0;
    height: 200%;
    width: 100%;
    z-index: 9999;
    text-align: center;
}

.loadingSec img {
    position: absolute;
    transform: translate(50%, 200%);
}
</style>
<script src="<?php echo base_url(); ?>/assets/js/jquery.bootpag.min.js"></script>

<div class="loadingSec" style="display: none;" id="loadingSec">
    <img src="<?php echo base_url(); ?>/assets/images/loading.gif?oxy=1" width="125" />
</div>

<div class="modal fade" id="modal-change-primarytype" tabindex="-1" role="dialog"
    aria-labelledby="modal-change-primarytype" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure ?</h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success  yesChangeUsesr" data-reqID="" data-type="">Yes</button>
                &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal-change-ToTestLenderprimarytype" tabindex="-1" role="dialog"
    aria-labelledby="modal-change-primarytype" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure ? You want to change these lender to Test lender </h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success lenderToTestLender" data-reqID="" data-type=""
                    onclick="changingUserToTest();">Yes</button>
                &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>


<div class="modal  fade" id="update-deal-extend-tenure">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reopen the deal </h4>
            </div>
            <div class="modal-body">
                <label>Date </label>
                <input type="text" name="dealTenture" id="dealTenturedate" class="form-control dealTenture"
                    placeholder="Select Deal Reopen Date">
                <span class="error dealTentureerrormessage" style="display:none">Enter the deal Reopen Date</span>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn-dealReopen btn btn-info" data-id=""
                        onclick="confirmRepoensubmission();">Submit</button>
                    <button type="button" class="btn btn-default btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal  fade" id="update-deal-tenure-extend">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Extend Deal Tenure </h4>
            </div>
            <div class="modal-body">
                <label>How Many months would you like to increase The deal's Tenure? </label>
                <select class="form-control" name="increaseMonth" id="tenureMonthsDate">
                    <option value="">Choose Deal Tenure</option>
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
                </select>

                <span class="error dealTenturemonthsDate" style="display:none">Enter the deal Tenure in months</span>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn-dealExtend btn btn-info" data-id=""
                        onclick="confirmextendTenureMonths();">Submit</button>
                    <button type="button" class="btn btn-default btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal  fade" id="update-paretner-details-mobile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Your Number & Email</h4>
            </div>
            <div class="modal-body">
                <label>phone Number</label>
                <input type="text" name="whastappnumber" id="partnerPhone" class="form-control partnerPhone"></br>
                <label>Email</label>
                <input type="text" name="whastappnumber" id="partnerEmail" class="form-control partnerEmail">
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn-submitFeeinfo btn btn-info"
                        onclick="updateWhatsappNumber();">Submit</button>
                    <button type="button" class="btn btn-default btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-success fade" id="modal-shortprofilefortheborrower">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="message">Thanks for the update. This UTM borrower will get the short profile sections.</p>
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


<div class="modal modal-success fade" id="modal-filedownloadedSuccessfullyfds">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Thanks</h4>
            </div>
            <div class="modal-body">
                <p id="message">The active FD file was successfully downloaded.</p>
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



<div class="modal modal-success fade" id="modal-showdealTenureSuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body dealextendReopen">
                <p id="message">Deal Tenure Successfully Updated</p>
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



<div class="modal  fade" id="modal-readFolder-filesondate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Date/Month</h4>
            </div>
            <div class="modal-body">


                <div class="row">
                    <label>Read reports Type :</label>
                    <input type="radio" name="readrepomonths" id="readingTypeM" value="day">
                    <label>Days</label>
                    <input type="radio" name="readrepomonths" id="readingTypeD" value="month">
                    <label>Month</label>

                </div>

                <form style="display: none;" class="daywisereports">
                    <div class="input-group date col-md-12" data-date-format="dd/mm/yyyy">
                        <label>Current Date<em class="mandatory">*</em> </label>
                        <input type="text" class="form-control readDate" id="cmsfilesRead" placeholder="DD/MM/YYYY"
                            name="cmsfilesRead">
                        <span class="error cmsfilesRead" style="display: none;">Please enter disbursement date</span>

                    </div>
                    <div class="reaNotificationCheck">
                        <span><input type="checkbox" name="readReportsCheck" checked> <label for="scales"><small>Send
                                    Notifications</small></label></span>
                    </div>
                </form>


                <form class="monthreports" style="display: none;">
                    <div class="input-group date col-md-12" data-date-format="dd/mm/yyyy">


                        <div class="col-xs-6  month pull-left">
                            <label> Month:</label>
                            <select class="form-control" name="month" id="readNotificationMonthBase">
                                <option value=""> Select Month</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07" selected="selected">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>

                        <div class="col-xs-6 pull-left year">
                            <label>Year:</label>
                            <select class="form-control" id="readNotificationYearbase">
                                <option value=""> Select Year</option>
                                <option value="2022" selected="selected">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>
                        </div>

                    </div>
                    <div class="reaNotificationCheck" style="margin-left:15px!important;padding: 6px 0px;">
                        <span><input type="checkbox" name="readReportsCheckM" checked> <label for="scales"><small>Send
                                    Notifications</small></label></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm saveEmidateBtn" id="readCMSReportsm"
                        style="display:none;">submit</button>

                    <button type="button" class="btn  btn-primary btn-sm saveEmidateBtn" id="readCMSReportsd"
                        style="display:none;">submit</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="intiateTheDealamountPrincipal" role="dialog" aria-labelledby="modal-borrower-sendoffer"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are you sure you want to send the principal/interest email notification for this deal?</h4>
                </div>
                <div class="slect_input row col-xs-12">
                    <div class="slect">
                        <label> Initiate Method:</label>
                        <select class="form-control" name="month" id="readinitiateMethodType">
                            <option value="">Choose Initiate Method </option>
                            <option value="Interest">Interest </option>
                            <option value="Principal">Principal</option>
                        </select>
                    </div>

                    <span class="error notificationErorDeal" style="display:none;"> please choose initiated
                        method</span>

                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-success sendEmailNotification" data-reqid='' data-clickedid=''
                    onclick="submitEmailNotificationDeal();">Submit</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>





<div class="modal" id="modal-displayPrincipalSummary">
    <div class="modal-dialog modal-lg user_emi">
        <div class="modal-content">
            <div class="modal-header emi_header">
                <div class="interestSumarry col-md-5">
                    <div class="dealName pull-left">
                        <b>Deal Name:</b> <span class="knowclassname mt-2"></span>
                    </div>
                    <div class="dealName pull-right">
                        <b>Payout:</b> <span class=" mt-2">Principal</span>
                    </div>

                </div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr style="background-color: #ADD8E6; border: 1px solid lightgrey;">
                            <th>Paid Date</th>
                            <th>File Status </th>
                            <th>Amount Type</th>
                            <th>Amount</th>
                            <th>File Name </th>

                        </tr>
                    </thead>
                    <tbody id="displayPrincipalSumary" class="mobileDiv_3">
                        <tr class="nodataPrincipal" style="display:none">
                            <td colspan="8">
                                No comments Found
                            </td>
                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>


<div class="modal" id="modal-displayInterestSummary">
    <div class="modal-dialog modal-lg user_emi">
        <div class="modal-content">
            <div class="modal-header emi_header">


                <div class="interestSumarry col-md-5">
                    <div class="dealName">
                        <b>Deal Name:</b> <span class="knowclassname mt-2"></span>
                    </div>

                    <div class="dealName  interestpayout">
                        <b>Payout:</b> <span class="mt-2">Interest</span>
                    </div>

                </div>


                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>


            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr style="background-color: #ADD8E6; border: 1px solid lightgrey;">
                            <th>Paid Date</th>
                            <th>File Status </th>
                            <th>Amount Type</th>
                            <th>Amount</th>
                            <th>File Name </th>

                        </tr>
                    </thead>
                    <tbody id="displayInterestSumary" class="mobileDiv_3">
                        <tr class="nodataPrincipal" style="display:none">
                            <td colspan="8">
                                No comments Found
                            </td>
                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>


<script async src="https://www.googletagmanager.com/gtag/js?id=G-QM0HEXWXSF"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());
gtag('config', 'G-QM0HEXWXSF');
</script>
</body>

</html>

<!--   <script type="text/javascript">
      // window.onload = getInterestInfo();
      </script> -->
<script type="text/javascript">
$(document).ready(function() {
    $("#paymentDate, #cmsfilesRead,#monthReportsdate").datepicker({
        format: 'dd-mm-yyyy',
        changeMonth: true,
        changeYear: true,
        todayHighlight: true,
    });

    $("#dealTenturedate").datepicker({
        format: 'dd/mm/yyyy',
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


 // Check if there's a hash in the current URL
if (window.location.hash) {
  // Use history.replaceState() to remove the hash
  history.replaceState({}, document.title, window.location.pathname);
}
});
</script>


<script id="scriptpricipalInfo" type="text/template">
    {{#data}}
  <tr>
    <td>
    {{paidDate}}
    </td>
     <td>
     {{fileStatus}}
    </td>
      <td>
     {{amountType}}
    </td>
      <td>
     {{amount}}
    </td>
     <td>
     {{fileName}}
    </td>
  </tr>
  {{/data}}
  </script>


<script id="scriptInterestInfo" type="text/template">
    {{#data}}
  <tr>
    <td>
    {{paidDate}}
    </td>
     <td>
     {{fileStatus}}
    </td>
      <td>
     {{amountType}}
    </td>
      <td>
     {{amount}}
    </td>
     <td>
     {{fileName}}
    </td>
  </tr>
  {{/data}}
  </script>




<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>