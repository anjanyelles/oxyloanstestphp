<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealId =  isset($_GET['deal']) ? $_GET['deal'] : '0';
$paymentDate =  isset($_GET['paymentDate']) ? $_GET['paymentDate'] : '0';
$currentMonthPaymentDate =  isset($_GET['currentDate']) ? $_GET['currentDate'] : 'Null';
$totalInterestAmount =  isset($_GET['totalInterest']) ? $_GET['totalInterest'] : '0';
$dealNameinfo =  isset($_GET['dealname']) ? $_GET['dealname'] : '';
$orginalPaymentDate =  isset($_GET['orginalPaymentDate']) ? $_GET['orginalPaymentDate'] : 'Null';
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="col-md-6">
            <small>
                <h1 class="text" style="font-size:17px; font-weight:bold; text-transform: uppercase;">
                    You're in <span><?php echo $dealNameinfo ?> Deal.</span>
                </h1>
            </small>
        </div>
        <div class="col-md-6 tright">
            <span class="dealProtcats">Payment Date :-</span> <span><?php echo $paymentDate?></span><br />
            <span class="dealProtcats">Payment Date in <span>Current Month</span> :-</span>
            <span><?php echo $currentMonthPaymentDate?></span><br />

            <button class="btn btn-success pull-right" style="display: none"><span class="fa fa-download">&nbsp;</span>
                Download List</button>

        </div>
    </section>
    <div class="cls"></div>
    <section class="content">
        <div class="row customFormQ">
            <div class="cls"></div>
            <div class="col-md-12">
                <div class="box box-secondary">
                    <div class="box-body editlendergroup">

                        <div class="col-md-2 text-bold">
                            Deal Value:<span class="totalDealValue">0</span>

                        </div>
                        <div class="col-md-2 text-bold">
                            acheived:<span class="totalDealAchived">0</span>

                        </div>
                        <div class="col-md-3 text-bold">
                            Current Value : INR<span class="totalDealCurrentValue">0</span>

                        </div>

                        <div class="col-md-3 text-bold">
                          Approximately Interest: INR <?php echo $totalInterestAmount?>

                        </div>

                        <div class="col-md-2 text-bold">
                         Interest :INR  <span class="currectInterestShow">0</span>
                        </div>

                        <div class="col-md-12 f-right rttext"><br /><br /><br />

                            <div class="f-right"><br />

                                <a href="dealWithdrawinfo?id=<?php echo $dealId ?>">
                                    <button class="btn btn-info btn-large">
                                        <b>Withdrawal Users</b>
                                    </button>
                                </a>
                                <a
                                    href="viewinterestUsers?dealId=<?php echo $dealId ?>&paymentDate=<?php echo $paymentDate?>&currentDate=">
                                    <button class="btn btn-primary btn-large">
                                        <b>View All</b>
                                    </button>
                                </a>


                                <a
                                    href="interestApprovedUsers?dealId=<?php echo $dealId ?>&paymentDate=<?php echo $currentMonthPaymentDate?>&originalPayment=<?php echo $orginalPaymentDate ?>">
                                    <button class="btn btn-success btn-large">
                                        <b>Approved Users</b>
                                    </button>
                                </a>


                                <a
                                    href="interestApprovedUsers?dealId=<?php echo $dealId ?>&paymentDate=<?php echo $currentMonthPaymentDate?>&originalPayment=<?php echo $orginalPaymentDate ?>&status=REJECTED">
                                    <button class="btn btn-warning btn-large">
                                        <b>Rejected Users</b>
                                    </button>
                                </a>


                                <a
                                    href="viewpaymentSuccess?deal=<?php echo $dealId ?>&paymentDate=<?php echo $currentMonthPaymentDate?>">
                                    <button class="btn btn-primary btn-large"> <b>Payment Success Users</b> </button>
                                </a>

                                <br />&nbsp;
                            </div>
                            <input type="hidden" name="movedoc" id="movedoctooutputfolder">
                            <input type="hidden" name="Paymentdate" value="<?php echo $paymentDate?>"
                                id="paymentDateApprove">
                            <input type="hidden" name="Paymentcurrentdate" value="<?php echo $currentMonthPaymentDate?>"
                                id="paymentcurrentDate">
                            <input type="hidden" name="dealId" value="<?php echo $dealId?>" id="approvedealID">
                        </div>
                        <div class="col-md-12 approval_2_H2H" style="display: none;">
                            <b> Approve Excel :</b>
                            <input type="checkbox" name="h2hApproveExcel" class="checkboxBots approvingUser" />

                            <button class="btn btn-warning btn-large"
                                onclick="h2hApprovingUser('<?php echo $orginalPaymentDate?>');">
                                <b><span class="approvingUser">Bhargav is Approving</span></b>
                            </button>
                        </div>


                        <table id="example2" class="table table-bordered table-hover mtop20">
                            <thead>
                                <tr id="example">
                                    <th>S.No</th>
                                    <th>User Info</th>
                                    <th>Participation Info</th>


                                    <th>Bank Details </th>

                                    <th>Check All<br /><input type="checkbox" id="selectAll" onchange="checkAll(this)"
                                            name="selectAll" / class="h2h2checkallApproved"></th>
                                </tr>
                            </thead>
                            <tbody id="approveIntrestInfo">
                                <tr id="displayNoRecords" class="displayRequests" style="display: none;">
                                    <td colspan="12">No User found!</td>
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
<div class="modal modal-success fade" id="modal-dbchangesforInterest">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Updated</h4>
            </div>
            <div class="modal-body">
                Db changes have been updated in the excel sheet.
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
<div class="modal modal-success fade" id="modal-movedTOoutputfolder">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Updated</h4>
            </div>
            <div class="modal-body">
                <p>
                    you have successfully updated the subbu&bhargav approvals.please wait the page will refresh in
                    4seconds.</p>
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
<div class="modal modal-warning fade" id="modal-showerrormessagesfotApproveingUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Status</h4>
            </div>
            <div class="modal-body">
                Db changes have been updated in the excel sheet.
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
<div class="modal modal-success fade" id="modal-H2H-ApprovedSuccessMessage">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <p>
                <h2 style="font-size: 16px;">Successfully updated the users Data. please wait& the page will refresh
                    after 7seconds.</h2>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-confirmOutput-folder" tabindex="-1" role="dialog"
    aria-labelledby="modal-interested-borrower" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure want to move the file to the output folder ?</h4>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success userInterestedBtn " data-reqID=""
                    onclick="movefoldertoh2hdoc();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<script id="displayInterestScript2" type="text/template">
    {{#data}}
<tr>
  <td>{{sno}}
  </td>
  <td>{{lenderName}}</br>
    LR{{userId}}</br>

User Group: {{groupName}}
  </td>
  <td>
Date : {{participatedDate}}</br>
Roi : {{rateOfInterest}} % </br>
<b> Participation Amount : </b> {{participatedAmount}}</br>
<b>Interest Amount : </b> {{interestAmount}}

  </td>

  <td>
    Bank Account Number : {{bankAccountNumber}}</br>
    Bank Name : {{bankName}}</br>
    Branch Name :{{branchName}}</br>
    IFSC Code :{{ifscCode}}</br>
    NameAsPerBank :{{nameAsPerBank}}
  </td>

  <td>
    <input type="checkbox" name="selectOption" class="checkboxBots approvingUser"
    data-userID="{{userId}}" 
    />
    <br/>
    <textarea cols="10" rows="3" class="response_{{userId}}">Calculations are correct.</textarea>
  </td>
</tr>
{{/data}}
</script>
<script>
function checkAll(e) {
    var checkboxes = document.getElementsByName('selectOption');

    if (e.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = true;
        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = false;
        }
    }

}
</script>



<script type="text/javascript">
window.onload = approveingInterestPay('<?php echo $dealId ?>', '<?php echo $currentMonthPaymentDate?>', 'onhold',
     '<?php echo $orginalPaymentDate?>');
</script>


<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<?php include 'admin_footer.php';?>