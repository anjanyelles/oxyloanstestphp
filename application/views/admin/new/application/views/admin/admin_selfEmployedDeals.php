<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealStatus =  isset($_GET['status']) ? $_GET['status'] : 'HAPPENING';
 // echo "<script>alert('$gmailcode');</script>";

if($dealStatus =="running"){
$dealStatus="HAPPENING";
}
if($dealStatus =="closed"){
$dealStatus="CLOSED";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <h3 class="pull-left col-md-6">
                Running & Closed Self Employed Deals
                </h1>
                <div class="pull-right col-md-6">
                    <a href="selfEmployedDeals?status=running">
                        <button class=" btn btn-success btnRoundUp" style="border-radius: 20px;">
                            Self Employed Running Deals
                        </button>
                    </a>

                    <a href="selfEmployedDeals?status=closed" class="compleated-Btn">
                        <button class=" btn btn-warning btnRoundUp" style="border-radius: 20px; margin-left: 10px;">
                            Self Employed Closed Deals
                        </button>
                    </a>


                </div>

        </div>
        </br></br></br></br></br>
        <div class="alert alert-success dealClosedSuccess" role="alert" style="display: none;">
            <strong>Deal Closed successfully.</strong>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
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
                            <thead>
                                <tr id="example">
                                    <th>S.#</th>
                                    <th>Deal Name</th>
                                    <th>Loan Amount in lakhs</th>
                                    <th>Primary Borrower</th>
                                    <th>RoI from Borrower</th>
                                    <th>Avg. RoI giving <br />to the Lender</th>
                                    <th>Funding Status</th>
                                    <th>Modify</th>
                                    <th>View Participated Users</th>
                                    <th>Know More</th>
                                </tr>
                            </thead>
                            <tbody id="displayDealsData">

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

    <script id="displayDealsScript" type="text/template">
        {{#data}}
      <tr>
        <td>{{dealId}}</td>
        <td>{{dealName}}</td>
        <td>{{dealAmount}}</td>
        <td>{{borrowerName}}</td>
        <td>{{borrowerRateOfInterest}}</td>
        <td>{{averageValueForLender}}</td>
        <td>{{fundingStatus}}</td>
        <td class="btn-Edit-{{fundingStatus}}"><a href="editDealInfo?id={{dealId}}">
            <button class="btn btn-warning btn-sm "><span class="fa fa-edit"></span> Edit</button>
        </a>
        </br>
          <button class="btn btn-sx btn-danger dealStatus-{{fundingStatus}}" style="margin-top:10px;" onclick="closeTheDealStatus({{dealId}});">Stop Participation</button>

      </td>
        <td><a href="viewDealLenders?id={{dealId}}&dealName={{dealName}}">
            <button class="btn btn-success btn-sm"><span class="fa fa-eye"></span> View Lenders</button>
        </a>
      </td>
        <td><a href="{{dealLink}}" targer="_blank">
          <button class="btn btn-info">Deal Link</button>
        </a>
        </br>
        <a href="lendersInterest?id={{dealId}}" targer="_blank">
          <button class="btn btn-sx btn-danger" style="margin-top:10px;">Pay Interest</button>
        </a>

      </td>
    </tr>            
  {{/data}}
</script>
    <script type="text/javascript">
    window.onload = viewEquityDeals('<?php echo $dealStatus; ?>', "SELFEMPLOYED");
    </script>
    <script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <?php include 'admin_footer.php';?>