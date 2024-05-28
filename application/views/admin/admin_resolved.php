<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$queryStatus =  isset($_GET['queryStatus']) ? $_GET['queryStatus'] : 'Completed';
$primaryType =  isset($_GET['primaryType']) ? $_GET['primaryType'] : 'LENDER';
// echo "<script>alert('$gmailcode');</script>";
if($queryStatus =="completed"){
$queryStatus="Completed";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <h3 class="pull-left col-md-6">
                Resolved Queries
                </h3>
                <div class="pull-right col-md-6">
                    <a href="resolved?queryStatus=completed&primaryType=LENDER">
                        <button class=" btn btn-success btnRoundUp" style="border-radius: 20px;">
                            Resolved Lender Queries
                        </button>
                    </a>
                    <!-- <a href="resolved?queryStatus=completed&primaryType=BORROWER" class="compleated-Btn">
                        <button class=" btn btn-warning btnRoundUp" style="border-radius: 20px; margin-left: 10px;">
                            Resolved Borrower Queries
                        </button>
                    </a> -->

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
                            <b><span class="userResolvedQuery"></span>
                                : <span class="countofresolvedgquery"></span></b>
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

                                    <!-- <th>User Id</th> -->
                                    <th>Mobile Number & Email</th>
                                    <th>Query</th>
                                    <th class="col-md-3">Admin Comments</th>
                                    <th> Responded On </th>
                                    <!-- <th>Resolved By</th> -->
                                    <!-- <th>Query Status</th> -->
                                    <?php if ($userType !== 'TESTADMIN'): ?>
                                        <th>Status</th>
    <?php endif; ?> 
                                 
                                    <!-- <th>View Participated Users</th>
                  <th>Know More</th>
                  <th>Aggrements</th> -->
                                </tr>
                            </thead>
                            <tbody id="displayDealsData">
                                <tr class="noDatafoundQuery" style="display:none">
                                    <th colspan="8">No data found</th>
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
 
      
      <td>

        <b>User Id :</b>{{userNewId}}</br>
        <b>Mobile No :</b>{{mobileNumber}}</br>
        <b>Email:</b> {{email}}</br>
        <b>Ticket Id:</b>{{ticketId}}</br>
        <b>User Name:</b>{{name}}
      </td>
      <td>{{query}}</td>
      <td style="word-break: break-all;">
       <b> Admin comments  : </b> {{comments}}</br>
        <b>Resolved By :</b> {{resolvedBy}}</br>
        
        {{#fileName}}
        <b>Screen Shot :<b>  <a href="javascript:void(0)"
          onclick="downLoadWalletTrnsImage({{userId}},{{documentId}},'USERQUERYSCREENSHOT')">
          Click Here
        </a>
        {{/fileName}}

      </td>
      <td>
        <span class="query-{{status}}">{{status}}</span>
        </br></br></br>
        <span><b>Responded On:</b>{{respondedOn}}</span>
        
      </td>

      <?php if ($userType !== 'TESTADMIN'): ?>
        <td>
        <button class="btn btn-sx btn-success btn-query-{{status}}" onclick="queryApproveandUpdateComments({{id}},{{userId}},'Completed');"> Resolved </button>
        </br>
        <button class="btn btn-sx btn-danger btn-query-{{status}}"  onclick="queryApproveandUpdateComments({{id}},{{userId}},'Pending');"style="margin-top:10px;"> Pending </button>
        
      </td>
    <?php endif; ?> 
  
    </tr>
    {{/data}}
    </script>
    <script type="text/javascript">
    countofpendingquery('<?php echo $queryStatus; ?>', '<?php echo $primaryType; ?>');
    window.onload = resolvedQueries('<?php echo $queryStatus; ?>', '<?php echo $primaryType; ?>');
    </script>
    <script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <?php include 'admin_footer.php';?>