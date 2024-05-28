<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <h3 class="pull-left col-md-6">
                Closed Deals
                </h1>
        </div>
        </br></br></br></br></br>

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
                                    <th>Deal Id</th>
                                    <th>Deal Name</th>
                                    <th>Deal Status</th>
                                    <th>Primary Borrower</th>
                                    <th>Deal Closed Date</th>
                                    <th>Deal Amount</th>

                                </tr>
                            </thead>
                            <tbody id="displayDealsData">

                                <tr id="closedDealNodata" style="display:none">
                                    <td colspan="8">No data found</td>
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
<td>Closed</td>
<td>{{borrowerName}}</td>

<td>{{borrowerClosedDate}}</td>
<td>{{dealAmountGivenBysir}}</td>
</tr>
{{/data}}
</script>
    <script type="text/javascript">
    window.onload = viewClosedDeals();
    </script>
    <script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <?php include 'admin_footer.php';?>