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
                Deal Payout
            </h1>
        </div>

    </section>
    <div class="cls"></div>
    <section class="content"></br></br>
        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose Deal Type and Payout --</option>
                    <option value="viewdealsPayouts">Dealtype & payout</option>
                </select>
                <span class="errorsearch" style="display: none;">Please Choose Month And Year.</span>
            </div>
            <div class="col-xs-3 text-center dealtypeinfo" style="display: none;">
                <select class="form-control" name="month" id="dealtypeinfosearch">
                    <option value="">Deal Type</option>
                    <option value="CLOSED">CLOSED</option>
                    <option value="OPENED">OPENED</option>


                </select>
            </div>
            <div class="col-xs-3 text-center dealpayouttype" style="display: none;">
                <select class="form-control" id="dealpayouttypeval">
                    <option value="">Payout</option>
                    <option value="YEARLY">YEARLY</option>
                    <option value="MONTHLY">MONTHLY</option>
                    <option value="QUARTERLY">QUARTERLY</option>
                    <option value="ENDOFTHEDEAL">ENDOFTHEDEAL</option>

                </select>
            </div>

            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="viewDealTypeInfosearch();"><i
                        class="fa fa-angle-double-right"></i>
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


                            </div>
                        </div>
                        <div class="pull-left">
                            <h4>Deal Status : <span class="loadDealStatus">closed</span></h4>
                        </div>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">

                                    <th>Deal Info</th>
                                    <th>Dates Info</th>
                                    <th>Duration</th>

                                </tr>
                            </thead>
                            <tbody id="viewloaddealPayoutType">
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



<script id="displayViewDealPayment" type="text/template">
    {{#data}}
     

      
      <tr class="">
        <td>
            Deal name: {{dealName}}  </br>
            Deal Amount :{{dealAmount}}</br>
            Rate Of Interest {{rateOfInterest}} </br>

        </td>
          <td> 
          Funds Acceptance End Date : {{fundsAcceptanceEndDate}} </br>
          Funds Acceptance Start Date :{{fundsAcceptanceStartDate}} </br>
          Loan Active Date:{{loanActiveDate}} </br>

           </td>
            <td>
          Duration :{{duration}} </br>
          WithDrawalRoi:{{withDrawalRoi}} 
         
        </td>
      </tr>
      {{/data}}
      </script>

<script type="text/javascript">
window.onload = viewDealTypeInfo();
</script>


<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<?php include 'admin_footer.php';?>