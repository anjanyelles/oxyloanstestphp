<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <h1 class="pull-left col-md-6">
                Partially closed Deals
            </h1>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="col-md-6 pull-left">
                            <button class="btn btn-xs download_running" onclick="partialclosedDownloadExcel();"><span
                                    class="fa fa-download running_fa" style="margin:0px 5px"></span>Overall
                                Download</button>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="dashBoardPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                            <div class="searchborrowerPagination pull-right" style="display: none;">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="mobileDiv_4">
                                <tr id="example">
                                    <th>Deal Name</th>
                                    <th>Interest Date</th>
                                    <th>Participation</th>


                                    <!--  <th>Tenure</th>
                  <th>RoI</th> -->
                                    <th>Choosen Payout type</th>
                                    <th>Participated Date</th>
                                    <th>Statement</th>
                                    <th>Participation Details</th>
                                    <th>Participation Status</th>
                                    <!-- <th>Payment Method</th> -->
                                </tr>
                            </thead>
                            <tbody id="displayDealsData" class="mobileDiv_3">

                                <tr class="notParticipated" style="display:none;">
                                    <td colspan="8"> No Records Found!</td>
                                </tr>

                                </tfoot>
                        </table>
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


<div class="modal  fade" id="modal-addingamountInfo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-9">
                        <h4 class="modal-title">Added Participation amount Info</h4><br /><b>If you've any queries
                            please write to us
                            <a href="lenderInquiries">Click Here</a></b>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead class="mobileDiv_4">
                        <tr style="background-color: #B0C4DE; border: 1px solid lightgrey;">
                            <th>Added Amount</th>
                            <th>Participated Date</th>
                            <!-- <th>Difference In Days</th> -->
                            <th>Interest Amount</th>
                        </tr>
                    </thead>
                    <tbody id="viewAddedParticipationAmount" class="mobileDiv_3">
                        <tr style="display: none;" class="noDatafound">
                            <td colspan="8">No data found</td>
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


<div class="modal  fade" id="modal-viewLenderStatement">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-9 pull-left">
                        <h4 class="modal-title">Deal Level Loan EmiCard</h4><br /><b>If you've any queries please write
                            to us
                            <a href="lenderInquiries">Click Here</a></b>
                    </div>
                    <div class="col-xs-3 pull-right">
                        <h4 class="modal-title">First Interest Date :</h4><span
                            class="firstInterestDate">12-03-2021</span>

                    </div>
                </div>
                <div class="modal-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="mobileDiv_4">
                            <tr style="background-color: #B0C4DE; border: 1px solid lightgrey;">
                                <th>S no</th>
                                <th>Actual Payment Date</th>
                                <th>Interest Paid Date</th>
                                <th>Interest Amount</th>
                                <th>Interest paid for no of days</th>
                                <th>Payment Status</th>
                                <th>Principal Amount</th>
                                <th>Participation Details</th>


                            </tr>
                        </thead>
                        <tbody id="viewLenderStatement" class="mobileDiv_3">
                            <tr id="displayNoRecords" class="displayRequests">
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



<div class="modal  fade" id="modal-addParticipation-Status">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-9">
                        <h4 class="modal-title">Added participation Amount info</h4><br /><b>If you've any queries
                            please write to us
                            <a href="lenderInquiries">Click Here</a></b>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead class="mobileDiv_4">
                        <tr style="background-color: #B0C4DE; border: 1px solid lightgrey;">
                            <th>Amount</th>
                            <th>Date</th>

                        </tr>
                    </thead>
                    <tbody id="viewAddStatement" class="mobileDiv_3">
                        <tr>
                            <td>10000</td>
                            <td>28-09-2021</td>
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
<!-- /.content-wrapper -->
<div class="modal modal-warning fade" id="modal-errorforNofirstInterestDate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-NoInterestDATE">
                <p id="text1">Interest start date not given to this deal</p>
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


<div class="modal  fade" id="modal-viewLenderNewStatement">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-9 pull-left">
                        <h4 class="modal-title">Deal Level Loan EmiCard</h4><br /><b>If you've any queries please write
                            to us
                            <a href="lenderInquiries">Click Here</a></b>
                    </div>

                </div>
                <div class="modal-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="mobileDiv_4">
                            <tr style="background-color: #B0C4DE; border: 1px solid lightgrey;">
                                <th>S no</th>
                                <th>Interest Date</th>
                                <th>Principal Amount</th>
                                <th>Interest Amount</th>
                                <th>Difference In days</th>
                            </tr>
                        </thead>
                        <tbody id="viewLRnewStatement" class="mobileDiv_3">
                            <tr id="displayNoRecords" class="displayRequests">
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


<div class="modal  fade" id="modal-viewgetMyparticipationBreakUp">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-8 pull-left">
                        <h4 class="modal-title"></h4><br /><b>If you've any queries please write to us
                            <a href="lenderInquiries">Click Here</a></b>
                    </div>
                    <div class="col-xs-4 pull-right">
                        <div class="acceptedPagination pull-right">
                            <ul class="pagination bootpag">
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="modal-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="mobileDiv_4">
                            <tr style="background-color: #B0C4DE; border: 1px solid lightgrey;">
                                <th>S no</th>


                                <th>Participation Amount</th>
                                <th>current Amount</th>
                                <th>withdraw Amount</th>
                                <th>Returned Date</th>
                                <th>Remarks</th>

                            </tr>
                        </thead>
                        <tbody id="viewbreakupStatement" class="mobileDiv_3">
                            <tr id="displayNoRecords" class="displayRequests">
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




<div class="modal  fade" id="modal-viewsalariedBreakUpinfo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-8 pull-left">
                        <h4 class="modal-title"></h4><br /><b>If you've any queries please write to us
                            <a href="lenderInquiries">Click Here</a></b>
                    </div>
                    <div class="col-xs-4 pull-right">
                        <div class="acceptedPagination pull-right">
                            <ul class="pagination bootpag">
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="modal-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="mobileDiv_4">
                            <tr style="background-color: #B0C4DE; border: 1px solid lightgrey;">



                                <th>EMI Number</th>
                                <th>EMI DueOn</th>
                                <th>INTEREST</th>
                                <th>PRINCIPAL </th>
                                <th> EMI Amount</th>

                            </tr>
                        </thead>
                        <tbody id="viewsalariedStatement" class="mobileDiv_3">
                            <tr id="displayNoRecords" class="displayRequests">
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





<div class="modal fade" id="modal-principalTransfer-method" tabindex="-1" role="dialog"
    aria-labelledby="modal-borrower-sendoffer" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure, you want to move the principal amount to <span class="modeType text-bold"></span>?
                    </h4>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success btn-of-confirmation" deal-Id="" transfer-mode=""
                    onclick="transferfundsConfirmation();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-success fade" id="modal-view-paymentsuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks</h4>
            </div>
            <div class="modal-body">
                <p id="text1">Thanks for your update.</p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"
                        id="highest">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script id="lenderDealEmiCard" type="text/template">
    {{#data}}
      <tr class="divBlock_Mob_001">
        <td class="divBlock_Mob_002">{{sno}}</td>
        <td>{{date}}</td>

         <td>
          {{#interestPaidDate}}
            {{interestPaidDate}}
           {{/interestPaidDate}}
            {{^interestPaidDate}}
             Yet to be paid
          {{/interestPaidDate}}
         </td>

        <td>

        {{#automaticInterestCalculation}}
        {{interestAmount}}
        {{/automaticInterestCalculation}}
         {{^automaticInterestCalculation}}
          {{amountRecevied}}
          {{/automaticInterestCalculation}}

      </td>
         <td>
          {{differenceInDaysForFirstParticipation}}
          </td>

        <td>

          {{#paymentStatus}}
          {{paymentStatus}}
          {{/paymentStatus}}
          {{^paymentStatus}}
          Future
          {{/paymentStatus}}
        </td>
        <td>
          {{#principalAmount}}
          {{principalAmount}}
          {{/principalAmount}}
          {{^principalAmount}}
          0
          {{/principalAmount}}
          
          </td>
            <td>
                <button class="addparticipationamount btn btn-sm btn-info" onclick="viewaddstatement({{sno}});">View added amount statement</button>
            </td>
      </tr>
      {{/data}}
      </script>
<script id="filteredCARDInfo" type="text/template">
    {{#data}}
       <tr class="divBlock_Mob_001">
        <td>{{amount}}</td>
        <td>{{upatedDate}}</td>
       <!--  <td>
          {{differenceInDays}}
        </td> -->
        <td>
          {{interestAmount}}
        </td>
      </tr>
      {{/data}}
      </script>

<script id="addParticipationStatus" type="text/template">
    {{#data}}
      <tr class="divBlock_Mob_001">
         <td>

          <span class="lable_mobileDiv">amount</span>
         {{amount}}</td>
        <td>

        <span class="lable_mobileDiv">upatedDate</span>
        {{upatedDate}}</td>
       
      </tr>
      {{/data}}
      </script>

<script id="getlenderNewStatement" type="text/template">
    {{#data}}
      <tr class="divBlock_Mob_001">
          <td class="divBlock_Mob_002">

          <span class="lable_mobileDiv">sno</span>

          {{sno}}</td>
          <td>
          <span class="lable_mobileDiv">emiStartDate</span>

          {{emiStartDate}}</td>
          <td>

         <span class="lable_mobileDiv">principalAmount</span>
          {{principalAmount}}</td>
        <td>

         <span class="lable_mobileDiv">interestAmount</span>
        {{interestAmount}}</td>
        <td>

          <span class="lable_mobileDiv">differenceInDays</span>
          {{differenceInDays}}
        </td>
      </tr>
      {{/data}}
      </script>
<script id="displayDealsScript" type="text/template">
    {{#data}}
        <tr class="divBlock_Mob_001">
        <td><span class="lable_mobileDiv">Deal Name</span>
          {{dealName}}</br>
           Deal Type : {{dealType}}
         </td>
           <td><span class="lable_mobileDiv">RoI & Duration </span>

          {{firstInterestDate}}</br>
          <b class="mobile_View_Hide">Duration : </b></br>{{dealDuration}} M</br>
          <b class="mobile_View_Hide">ROI :</b> {{rateOfInterest}} %

          </td>
           <td class="col-md-2"><span class="lable_mobileDiv">Participated</span>
           <span class="lable_ShowMore_{{pricipalReturned}}">

        
          <span class="numdigitsvalues" value="{{paticipatedAmount}}"> {{paticipatedAmount}} </span> 


          <a href="javascript:void(0)" class="new_ST_btn pull-right"
           onclick="getNewStatementInfo('{{dealId}}')">BREAK UP</a>
          </span>

           </br>
            </br>
      
           <div class="solidToggle_{{dealId}}" style="display:none">
          <span class="viewBreakup">Current Value : {{currentValue}}<button class="btn btn-xs pull-right btn-primary"  onclick="breakupmyParticipation('{{dealId}}');">Know more</button></span>
           <!-- </br> -->
           <!-- <p class="ShowCurrentStatus col-md-3 pull-right">Current Status:{{currentStatus}}</p> -->
       
         </div>
       </td>
        <!-- <td><span class="lable_mobileDiv">Duration</span>{{dealDuration}}</td>
        <td><span class="lable_mobileDiv">RoI</span>{{rateOfInterest}}%</td> -->
        <td><span class="lable_mobileDiv">Payout Type</span>{{lederReturnType}}</td>
        <td><span class="lable_mobileDiv">Participated Date</span>{{registeredDate}}</td>
         <td>
         
             {{#loanId}}

                <a href="javascript:void(0)" class="lenderStatement"
                 onclick="viewSalariedLenderStatement('{{loanId}}')">
                   <button class="btn btn-info btn-sm brn-viemob_001">View Statement </button>
                   </a> 

              {{/loanId}}




               {{^loanId}}

               {{#loanStatementValueCheck}}
                <span class="lable_mobileDiv">&nbsp;</span>
                <a href="javascript:void(0)" class="lenderStatement"
                 onclick="viewNewLenderStatement('{{dealId}}')">
                   <button class="btn btn-info btn-sm brn-viemob_001">View Statement </button>
                   </a> 
                {{/loanStatementValueCheck}}

                {{^loanStatementValueCheck}}
                 <a href="javascript:void(0)" class="lenderStatement viewLenderNewStatement_{{loanStatementValueCheck}}"
                 onclick="viewDealLenderStatement('{{dealId}}')">
                   <button class="btn btn-info btn-sm brn-viemob_001">View Statement </button>
                 </a>
                {{/loanStatementValueCheck}}
                 {{/loanId}}

          </td>
     
          <td>
        <span class="lable_mobileDiv">Participate Details</span>
        <button class="btn btn-primary btn-sm brn-viemob_001" onclick="viewADDStatement('{{dealId}}');">Details</button>
        </td>

          <td>
           <span class="lable_mobileDiv">Deal Status</span>
          
          {{#lenderPaticipateStatus}}
         <a href="participateDeal?id={{dealId}}" class="btn-{{participationStatus}} isparticipated-{{participationStatus}}">
          <button class="btn btn-success btn-sm brn-viemob_001">Open</button>
        </a> 
         {{/lenderPaticipateStatus}}  
         {{^lenderPaticipateStatus}}
            Closed
         {{/lenderPaticipateStatus}} 


      </td>
        <!-- <td>
        <button class="btn btn-xs btn-primary mobile_View_Hide" onclick="confirmationTransfer({{dealId}},'Bank Account');"> Transfer to bank</button></br></br>

         <button class="btn btn-xs btn-warning mobile_View_Hide" onclick="confirmationTransfer({{dealId}},'Wallet');"> Transfer to wallet</button></br></br>

         {{#accountType}}
          <b>chosen  : </b> {{accountType}}
         {{/accountType}}
          {{^accountType}}
         <b>chosen  : </b> NotYet
          {{/accountType}}

      </td>  -->
    </tr> 
    {{/data}}
    </script>


<script id="subDataUpdatedInfo" type="text/template">
    {{#data}}
      <tr class="divBlock_Mob_001">
        <span class="lable_mobileDiv">amount</span>
        <td>{{amount}}</td>
      </tr>
    {{/data}}
    </script>



<script id="viewBreakUPinfo" type="text/template">
    {{#data}}
      <tr class="divBlock_Mob_001">
        <td>
<span class="lable_mobileDiv">sno </span>

        {{sno}}</td>
       
          
                <td>
<span class="lable_mobileDiv">paticiaptedAmount </span>
                {{paticiaptedAmount}}</td>
                  <td>
<span class="lable_mobileDiv">currentAmount </span>

                  {{currentAmount}}</td>
                   <td>

<span class="lable_mobileDiv">amount </span>
                   {{amount}}</td>
                <td>

<span class="lable_mobileDiv">returedDate </span>

                {{returedDate}}</td>
                 <td>

<span class="lable_mobileDiv">remarks </span>
                 {{remarks}}</td>
        
      </tr>
    {{/data}}
    </script>


<script id="viewsalariedBreakUpInfo" type="text/template">
    {{#data}}
      <tr class="divBlock_Mob_001">
            <td>
<span class="lable_mobileDiv">emiNumber </span>


            {{emiNumber}}</td>    
                <td>
<span class="lable_mobileDiv">emiDueOn </span>

                {{emiDueOn}}</td>
               <td>

<span class="lable_mobileDiv">Interest </span>
               {{lenderEmiDetails.interestDetails}}</td>
                <td>

<span class="lable_mobileDiv">principal </span>
                {{lenderEmiDetails.principalDetails}}</td>
                 <td>

<span class="lable_mobileDiv">Email </span>

                 {{lenderEmiDetails.emiDetails}}</td>
        
      </tr>
    {{/data}}
    </script>

<script type="text/javascript">
// window.onload = viewMyDeals();
window.onload = dealPartialClosedDeal();
setTimeout(function() {
    digits();
}, 3000);
// $(document).ready(function() {
// $(".btn-ACHIEVED button").html('Deal Closed');
// });
</script>
<!-- /.content -->
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'footer.php';?>