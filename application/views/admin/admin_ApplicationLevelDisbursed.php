<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<?php
   $urlfromBroweser = $_SERVER['REQUEST_URI'];
  $AppLevel =  isset($_GET['Applevel']) ? $_GET['Applevel'] : 'NORMAL';
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Application Level Disbursed
        </h1>
    </section><br />
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title"> </h3>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="approvedPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                            <div class="searchapprovedPagination pull-right" style="display: none;">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label" id="names"> </h4>BORROWER ID :</h4>
                            </label>
                            <div class="col-sm-4">
                                <input type="text" name="lenderid" class="form-control"
                                    placeholder="ENTER THE BORROWER ID" id="borrowerId" required="required" />
                                <span class="error mobile" style="display: none;">Please Enter BORROWER ID</span>
                            </div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-xm btn-primary" id="profit-submit-btn"
                                    onclick="viewborrowerssearch('<?php echo$AppLevel?>');">Submit</button>
                            </div>

                        </div>
                        <div class="box-body Disbursment" style="display: none;">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr id="example">
                                        <th>Borrower Info</th>
                                        <th>APP ID</th>
                                        <th>Loan Details</th>
                                        <th>
                                            <center>Disburse All Loans</center>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody id="loadBorrowersList">


                                    </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<script id="loadBorrowersListTpl" type="text/template">
    {{#data}}
  <tr>
    
    <td>{{borrowerName}}</td>
    <td>APBR{{applicationId}}</td>
    <td>
      <b>Amount :</b>{{disbursmentAmount}}<br/>
      <br/><b>ROI :</b>{{rateOfInterest}} % Monthly<br/>
      <br/><b>Duration :</b>{{duration}}<br/>
      <br/><b>Duration Type :</b>{{durationType}}<br/>
      <br/><b>Amount Disbursed :</b>{{amountDisbursed}}<br/>
      <br/><b>Amount To Be Disbursed :</b>{{amountToBeDisbursed}}
    </td>
    <td>
       <br/>
      <center><button type="button" class="btn btn-success  btn-sm userDisbursed" id="user-{{oxyLoanAdminComments}}"onclick="Disbursed('{{borrowerId}}',this)" data-reqid = "{{borrowerUserId}}" data-loanid="{{borrowerUserId}}"> <b>Disburse</b></button></center><br/>
      <a href="javascript:void(0)" class="viewLoanLenders"onclick="viewborrowers({{borrowerId}})" ><center>View Loans</center></a><br/>
    </td>
    <tr>
      <td style="display:none;" colspan="14" class="viewrunningLoanLenders viewrunningLoanLenders-{{borrowerId}}">
        <div class="col-md-6 pull-right" style="display:none">
          <div class="interstedPagination1 pull-right">
            <ul class="pagination bootpag">
            </ul>
          </div>
        </div>
        
        <table class="table table-bordered table-hover">
          <thead>
            <tr style="background-color: aqua;">
              
              <th>Lender Id</th>
              <th>Lender Name</th>
              <th>Disbursment amount</th>
              
            </tr>
          </thead>
          <tbody id="viewrunningLoanLenders-{{borrowerId}}">
            <tr id="displayNoLoanRecords" class="displayNoLoanRecords" >
              <td colspan="8">No Offers found!</td>
            </tr>
          </tbody>
          </tfoot>
        </table>
      </td>
    </tr>
    
  </tr>
  {{/data}}
  </script>


<script id="displaydealLevelApplication" type="text/template">
    {{#data}}
  <tr>
    
    <td>{{borrowerName}} <br/>
     User ID: {{borrowerId}}
    </td>
    <td>APBR{{applicationId}}</td>
    <td>
      <b>Amount :</b>{{disbursmentAmount}}<br/>
      <br/><b>ROI :</b>{{rateOfInterest}} % Monthly<br/>
      <br/><b>Duration :</b>{{duration}}<br/>
      <br/><b>Duration Type :</b>{{durationType}}<br/>
      <br/><b>Amount Disbursed :</b>{{amountDisbursed}}<br/>
      <br/><b>Amount To Be Disbursed :</b>{{amountToBeDisbursed}}
    </td>
    <td>
     
      <center>

        <button  type="button" class="btn btn-success btn-xs loanDisbursToCms" onclick="isapppLevelDisbursed('{{borrowerId}}');">App Level Disburse </button>
      </center>
    </td>
    
  </tr>
  {{/data}}
  </script>
<script id="viewlenders" type="text/template">
    {{#data}}
  <tr style="border: 3px solid lightgrey;">
    
    
    <td>LR{{lender_id}}</td>
    <td>{{lender_name}}</td>
    <td>{{disbursment_amount}}</td>
  </tr>
  {{/data}}
  </script>
<div class="modal  fade" id="modal-Disbursementdate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Disbursement Date</h4>
            </div>
            <div class="modal-body">
                <form>

                    <label> Disbursement Date<em class="mandatory">*</em> </label>
                    <div class="input-group date" data-date-format="dd/mm/yyyy">
                        <input type="text" class="form-control borrowerDisbursementDate dobformat"
                            id="borrowerDisbursementDate" placeholder="DD/MM/YYYY" name="borrowerDisbursementDate">
                        <span class="error brDisbursedDateError" style="display: none;">Please enter disbursement
                            date</span>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <div align="right">

                    <button type="button" class="btn  btn-primary btn-sm saveEmidateBtn" data-loanid=""
                        onclick="updateDisbursementDate()">Save</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal  fade" id="modal-App-Level-disbursed">
    <div class="modal-dialog">
        <div class="modal-content offer_popup">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Application Level Disbursed</h4>
            </div>
            <div class="offer_popup_cont clearfix">
                <div class="offer_popup_field clearfix">
                    <label>Disbursed Date<em class="mandatory">*</em></label>
                    <div class="fld-block">
                        <input type="text" class="disbursedDate" id="disbursedDate"
                            placeholder="Enter the disbursed date">
                        <span class="error loanDealError" style="display: none;"> Enter the Disbursed Amount</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm  savedisbursedUser" data-loanid=""
                        onclick="AppLevelDisbursedAmount()">Submit</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="modal  fade modal-success" id="modal-movefiletocms">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>.</p>

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

<div class="modal modal-warning fade" id="modal-amount-limit-exced">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text1">bjhvj.</p>
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


<div class="modal fade" id="modal-enterDisbursementDate" tabindex="-1" role="dialog"
    aria-labelledby="modal-enterDisbursementDate" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure, you want to give the Disbursement Date ?</h4>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success userDisbursementDate" data-loanid=""
                    onclick="saveDisbursementDate();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-warning fade" id="modal-loanActive">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">oops!</h4>
            </div>
            <div class="modal-body">
                This loan is in accepted state ,Please activate the loan.
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
<div class="modal modal-success fade" id="modal-disbursementdatesuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                Successfully entered the disbursement date,Now this record seen in running loans.
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
<div class="modal fade" id="modal-borrower-rejectoffer" tabindex="-1" role="dialog"
    aria-labelledby="modal-borrower-sendoffer" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure, do you want to Reject the offer to this user?</h4>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success borrowerRejectofferBtn" data-reqid='' data-clickedid=''
                    onclick="borrowersRejectoffer();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-borrower-rejectoffers" tabindex="-1" role="dialog"
    aria-labelledby="modal-borrower-sendoffer" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure, do you want to Reject the offer to this user?</h4>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success borrowerRejectofferBtn" data-reqid='' data-clickedid=''
                    onclick="borrowersRejectoffers();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-warning fade" id="modal-alreadyDoneSendOffer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text1">bjhvj.</p>
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
<div class="modal modal-danger fade" id="modal-adminrejectedoffer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                Rejected this offer and Lender can't see this application in loan listings.
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
<div class="modal modal-warning fade" id="modal-loandisbursedcompleted">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                This loan Amount is already disbursed.
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
<div class="modal  fade" id="modal-Disbursementsdate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Disbursement Date</h4>
            </div>
            <div class="modal-body">
                <form>

                    <label> Disbursement Date<em class="mandatory">*</em> </label>
                    <div class="input-group date" data-date-format="dd/mm/yyyy">
                        <input type="text" class="form-control borrowerDisbursementsDate dobformat"
                            id="borrowerDisbursementsDate" placeholder="DD/MM/YYYY" name="borrowerDisbursementDate">
                        <span class="error brDisbursedDateError" style="display: none;">Please enter disbursement
                            date</span>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                    </div>

                    <!--<textarea type="" name="borrowerDisbursementDate" class="borrowerDisbursementDate  form-control" ></textarea><br/>-->

                    <!-- Emi Start Date: <textarea type="" name="emidate" class="emidate form-control" ></textarea><br/>-->

                </form>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <!-- <button type="button" class="btn  btn-primary btn-sm saveEmidateBtn" data-dismiss="modal" data-loanid="" onclick="updateDisbursementDate()">Save</button> -->
                    <button type="button" class="btn  btn-primary btn-sm saveEmidateBtns" data-loanid=""
                        onclick="DisbursementDate()">Save</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-enterDisbursementsDate" tabindex="-1" role="dialog"
    aria-labelledby="modal-enterDisbursementDate" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure, you want to give the Disbursement Date ?</h4>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success userDisbursementsDate" data-loanid=""
                    onclick="DisbursementDatesave();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-success fade" id="modal-disbursementsdatesuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                This Record will be seen in Running loans.
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
<div class="modal modal-warning fade" id="modal-loanActives">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">oops!</h4>
            </div>
            <div class="modal-body">
                This loan is in accepted state ,Please activate the loan.
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
<script type="text/javascript">
$(document).ready(function() {
    $('#borrowerDisbursementDate').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        // startDate: new Date(),
        autoclose: true
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#borrowerDisbursementsDate').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        // startDate: new Date(),
        autoclose: true
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {

    $("#disbursedDate,#nocBorrowerpaidDate").datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        startDate: new Date(),
        changeMonth: true,
        changeYear: true,
        endDate: "today",
    });
});
</script>

<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<style type="text/css">
/* .btn-APPROVED{opacity: 0.5; cursor: not-allowed;}*/
#user-DISBURSED {
    pointer-events: none;
    cursor: not-allowed;
    opacity: 0.65;
    filter: alpha(opacity=65);
    -webkit-box-shadow: none;
    box-shadow: none;
}
</style>
<?php include 'admin_footer.php';?>