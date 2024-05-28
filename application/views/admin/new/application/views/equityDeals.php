<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealStatus =  isset($_GET['status']) ? $_GET['status'] : 'HAPPENING';
if($dealStatus =="running"){
$dealStatus="HAPPENING";
}
if($dealStatus =="closed"){
$dealStatus="CLOSED";
}
// echo "<script>alert('$gmailcode');</script>";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <h1 class="pull-left col-md-6">
                Running & Closed Equity Deals
            </h1>
            <div class="pull-right col-md-6 mobileDiv_2" style="display: none;">
                <a href="equityDeals?status=running" class="runningDeals-Btn">
                    <button class=" btn btn-success btnRoundUp">
                        Equity Running Deals
                    </button>
                </a>

                <a href="equityDeals?status=closed" class="compleated-Btn">
                    <button class=" btn btn-warning btnRoundUp">
                        Equity Participation Closed Deals
                    </button>
                </a>
                <a href="viewmyDeals">
                    <button class="runningDeals-Btn btn btn-info btnRoundUp">
                        My Participated Deals
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="col-md-6">
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
                                    <th>Deal Id</th>
                                    <th>Deal Name</th>
                                    <th>Loan Amount</th>
                                    <th>Primary Borrower</th>
                                    <th>Tenure in Months</th>
                                    <!-- <th>My Participation</th> -->
                                    <th>Participate</th>
                                    <th>Funding Start Date - Funding End Date</th>
                                    <th>Funding Status</th>
                                    <th>View Participated Users</th>

                                </tr>
                            </thead>
                            <tbody id="displayDealsData" class="mobileDiv_3">
                                <tr style="display: none;" id="displayDelasInfo">
                                    <td colspan="12">No data found</td>
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
<script id="displayDealsScript" type="text/template">
    {{#data}}
      <tr class="divBlock_Mob_001">
       <td class="dealID numeric divBlock_Mob_002">{{dealId}}</td>
    <td>
      <span class="lable_mobileDiv">Deal Name</span>{{dealName}}</td>
      {{dealName}}
    </td>
    <td>
      <span class="lable_mobileDiv">Deal Amount</span>
      {{dealAmount}}
    </td>
    <td>
      <span class="lable_mobileDiv">Borrower Name</span>
      {{borrowerName}}
    </td>
    <td>
      <span class="lable_mobileDiv">Duration</span>
      {{duration}}
    </td>
    
    <td>
      <span class="lable_mobileDiv">&nbsp;</span>
      <a class="btn-{{fundingStatus}}" href="participateDeal?id={{dealId}}">
        <button class="btn btn-success btn-sm"><span class="fa fa-flash btn-sm"></span> PARTICIPATE</button>
      </a>
    </td>
    <td>
      <span class="lable_mobileDiv">Participation Time</span>
      {{fundsAcceptanceStartDate}} To {{fundsAcceptanceEndDate}}
    </td>
    <td>
      <span class="lable_mobileDiv">Fund Status</span>
      {{fundingStatus}}
    </td>
    <td>
      <span class="lable_mobileDiv">&nbsp;</span>
      <a href="dealLenders?id={{dealId}}">
        <button class="btn btn-info btn-sm"><span class="fa fa-eye"></span> View Lenders</button>
      </a>
    </td>
  </tr>
  {{/data}}
  </script>
<script type="text/javascript">
$(document).ready(function() {
    //$('.loadingSec').show();
});
window.onload = viewEquityDeals('<?php echo $dealStatus;  ?>', "EQUITY");
</script>
<!-- /.content -->
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php include 'footer.php';?>