<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealType =  isset($_GET['DealType']) ? $_GET['DealType'] : 'NORMAL';

if($dealType =="escrow"){
$dealType="ESCROW";

}
 else if($dealType =="normal"){
   $dealType="NORMAL";
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row dealWithdrawFunds">
            <div class="col-md-6 headingPart-dealWithdraw">
                <h1 class="pull-left ">
                    Withdraw Funds From Deals
                </h1>

                <div class="pull-left col-xs-12 col-md-6">
                    <small>
                        <ol class="breadcrumb">
                            <li><a href="idb"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                            <li class="active"> <a href="https://sites.google.com/view/withdrawalfromdeal/home"
                                    target="_blank">Help</a></li>
                        </ol>
                    </small>
                </div>


            </div>

            <div class="pull-right col-md-9 mobileDiv_2">
                <a href="lenderWithdrawfunds" class="">
                    <button class=" btn btn-primary btnRoundUp">
                       <i class="fa fa-angle-double-right"></i> Withdraw from Wallet
                    </button>
                </a>


                <a href="dealWithdrawfunds?DealType=escrow" class="">
                    <button class=" btn btn-success btnRoundUp">
                        Withdraw from an Escrow deal
                    </button>
                </a>
                <a href="dealWithdrawfunds?DealType=normal" class="">
                    <button class=" btn btn-warning btnRoundUp">
                        Withdraw from a Normal deal
                    </button>
                </a>

                 
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="col-md-6 pull-left" >

                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="dashBoardPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                            <div class="searchborrowerPagination pull-right">
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
                                    <th>Deal Type</th>
                                    <th>Participated Amount</th>
                                    <th>RoI</th>
                                    <th>Duration </th>
                                    <th>Deal Status</th>
                                    <th>Requested Amount</th>
                                    <th>Select</th>


                                </tr>
                            </thead>
                            <tbody id="displayDealsData" class="mobileDiv_3">
                                <tr id="displayNoRecords" class="displayRequests" style="display:none;">
                                    <td colspan="8">No Data found!</td>
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


<div class="modal  fade" id="modal-viewRequstedAmountBreakUp">
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
                        <thead>
                            <tr style="background-color: #B0C4DE; border: 1px solid lightgrey;">
                                <th>S no</th>


                                <th>Participation Amount</th>
                                <th>current Amount</th>
                                <th>withdraw Amount</th>
                                <th>Returned Date</th>
                                <th>Remarks</th>

                            </tr>
                        </thead>
                        <tbody id="viewbreakupStatement">
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

<div class="modal  fade" id="modal-viewgetDealWithdrawalRequest">
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
                        <thead>
                            <tr style="background-color: #B0C4DE; border: 1px solid lightgrey;">
                                <th>dealId</th>
                                <th>Amout</th>
                                <th>Requested Amount</th>

                            </tr>
                        </thead>
                        <tbody id="viewDealWithdrawalBreakUp">
                            <tr id="displayNoRecords" class="displayRequests" style="display:none;">
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



<script id="filteredWithdrawalInfo" type="text/template">
    {{#data}}
       <tr>
        <td>{{dealId}}</td>
        <td>{{amount}}</td>
        <td>
          {{requestDate}}
        </td>
      </tr>
      {{/data}}
      </script>


<script id="displayDealsScript" type="text/template">

    {{#data}}
  <tr class="deal-{{fundingStatus}} divBlock_Mob_001">
    <td class="dealID numeric divBlock_Mob_002">{{dealName}}</td>
    <td class="dealName numeric">
      <span class="lable_mobileDiv">Deal Name</span>
            {{dealType}}
      </td>
    <td class="dealAmount numeric">
      <span class="lable_mobileDiv">Deal Amount</span>
      {{paticipatedAmount}}</td>
   
    <td class="payouttype">
      <span class="lable_mobileDiv">Payout Type</span> {{rateOfInterest}}%
    </td>
    <td class="duration numeric"><span class="lable_mobileDiv">Duration</span> {{dealDuration}} Months</td>
     <td class="payouttype">
      <span class="lable_mobileDiv">Deal  Status</span>{{currentStatus}}
    </td>  
    <td class="requestedAmount divBlock_Mob_002">
         <span class="lable_ShowMore_{{requestedAmount}} lable_With_Requested">
            {{requestedAmount}}
          <a href="javascript:void(0)" class="new_ST_btn  getWithdrawRequest_{{requestedAmount}} pull-right"
          onclick="getNewStatementInfo('{{dealId}}')">BREAK UP</a>
          </span>
           </br>
            </br>  
        <div class="solidToggle_{{dealId}}" style="display:none">
        <span class="viewBreakup"><button class="btn btn-xs pull-left btn-primary"  onclick="viewWithdrawalBreakUp('{{dealId}}');">Know more</button></span>
           
         </div>
    </td>
    <td class="divBlock_Mob_002">
     <span class="lable_mobileDiv">&nbsp;</span>
      <a class="btn-{{fundingStatus}}" href="lenderdealWithdrawfunds?dealId={{dealId}}&currentAmount={{currentValue}}&requestedAmount={{requestedAmount}}&dealName={{dealName}}&roi={{rateOfInterest}}">
      <button class="btn btn-success btn-sm numeric" id="myBtn"><i class="fa fa-money" style="font-size:20px"></i>Withdraw</button>
    </a>
    </td>

  </tr>
  {{/data}}
  </script>

<script type="text/javascript">
$(document).ready(function() {
    //$('.loadingSec').show();
});
window.onload = showWithdrawDeal('<?php echo $dealType; ?>');
</script>
<!-- /.content -->
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php include 'footer.php';?>