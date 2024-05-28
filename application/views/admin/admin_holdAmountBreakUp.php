<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <section class="content-header hold-headsection">
        <h4 class="text  fw-bold  m-3 holdamount-text">
            Hold Deal Users
        </h4>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                    </div>
                    <div class="box-body">
                        <div class="table table-responsive table-breakup row col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-left bg-info" id="example2">
                                    <thead class="text-white">
                                        <tr style="background-color: #b0c4de; color:back">
                                            <th scope="col">Lender Id</th>
                                            <th scope="col">Request Date</th>
                                            <th scope="col">Current Hold Amount </th>
                                            <th scope="col">Hold Amount </th>
                                            <th scope="col"> Reason </th>
                                            <th scope="col"> Status </th>
                                            <th scope="col"> Choose Deal </th>
                                        </tr>
                                    </thead>
                                    <tbody id="userHoldRequest_body">
                                        <tr style="display: none;" class="hold_ten_users">
                                            <td colspan="12">No Record Found</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal modal-success fade" id="modal-holdrequestedBreakUp">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p style="font-size: 16px;" id="modal_title_text"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal modal-warning fade" id="modal-holdrequestedErrormessage">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">!Oops</h4>
            </div>
            <div class="modal-body">
                <p style="font-size: 16px;" id="modal_title_warning"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script id="holdrequestUsersdetails" type="text/template">
    {{#data}}
  <tr>
    <td>LR{{userId}}</td>
    <td>{{createdOn}}</td>
    <td>{{currentHoldAmount}} </td>
    <td>{{holdAmount}} </td>
    <td>{{comments}} </td>
    <td>{{status}}</td>
     <td>
     <div class="d-grid gap-2">
     <button type="button" name="" id="btn_{{currentHoldAmount}}"
      class="btn bg-black text-white btn-xs m-3 btn-hold-submit btn_{{status}}"
       onclick="submitholdrequest('{{userId}}','{{holdAmount}}','{{status}}')">Choose
      <i class="fa fa-arrow-down mx-3"></i></button>
      <button type="button" name="" id="delete_HoldRequest" class="btn btn-xs m-3 btn-danger" onclick="deleteHoldRequest('{{id}}');">Delete
       <i class="fa fa-trash"></i></button>
      </div>
    </td>
  </tr>


<tr class="hold_subUser-{{userId}}{{holdAmount}}{{status}}"  style="display:none"> 
<td colspan="14" class="viewQueryadminStatus">
 <div class="col-md-12" style="margin-bottom:15px">

    <button class="btn btn-info  btn-xs pull-left holdAmount_Process" onclick="processDealHoldUsersAmount('{{id}}','{{userId}}','{{holdAmount}}','{{status}}',{{currentHoldAmount}});">
     Process <i class="fa fa-spinner fa-spin financialLoading"  style="display:none"></i> </button> 


    <div class="acceptedPagination pull-right">
      <ul class="holdAmountDealspagination-{{userId}}{{holdAmount}}{{status}} bootpag">
     </ul>
    </div>
    </div>

<table class="table table-bordered table-hover"  id="myTable">
  <thead >
 <tr
style="background-color: #ADD8E6; border: 1px solid lightgrey;">
<th>Deal Id</th>
<th>Deal Name</th>
 <th>ROI</th>
<th>Principal Amount</th>
<th>Interest Amount</th>
<th>Next Payment</th>
 <th>Deduct Principal</th>
<th>Deduct Interest</th>

 </tr>
</thead>
<tbody id="displayUserHoldRunningDealsInfo-{{userId}}{{holdAmount}}{{status}}">
    <tr class="displayUserHoldRunningDealsInfo-{{userId}}" style="display:none">
        <td colspan="12" class="displaynodata-{{userId}}" >No data found</td>
    </tr>
      
 </tbody>
 </tfoot>
</table>
</td>
</tr>
  {{/data}}
  </script>

<script id="holdAmountBreakUp" type="text/template">
    {{#data}}
    <tr>
    
    <td>{{dealId}} </td>
    <td>{{dealName}}</td>
    <td>{{dealRateofinterest}}%</td>
    <td>{{paticipatedAmount}}</td>
    <td>{{lenderFurtherPaymentDetailsamount}}</td>
    <td>{{lenderFurtherPaymentDetailsdate}} </td>
    <td>
    <input type="radio"   class="checkdeductprincipal" name="hold_amout_radio_{{dealId}}">
    </td>
     <td>
     <input type="radio"  class="checkdeductInterest" name="hold_amout_radio_{{dealId}}">
  </td>
</tr>
  {{/data}}
  </script>

<script type="text/javascript">
window.onload = holdamountList("currentUsers");
</script>

<?php include 'admin_footer.php';?>