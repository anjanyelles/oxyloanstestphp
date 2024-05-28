<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <h3 class="pull-left col-md-6">
                Equity investors Data
                </h1>
                <div class="pull-right col-md-6">

                    <button class=" btn btn-warning btnRoundUp" style="border-radius:20px;"
                        onclick="downloadInvestorsLendersExcel(0);">
                        <i class="fa fa-download"></i> Equity All Investors
                    </button>
                </div>

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
                                    <th>Deal ID</th>
                                    <th>Deal Name</th>
                                    <th>
                                        <center>Download Excel</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="displayDealsData">

                                <tr>
                                    <td>01</td>
                                    <td>Deal Nader gul</td>
                                    <td align="center" class="actions_investors">
                                        <a href='javascript:void(0)' class="downloadAgreeent">
                                            <i class="fa fa-download" aria-hidden="true" class="downloadAgreeent"></i>
                                        </a>
                                    </td>


                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>Deal Nader gul</td>
                                    <td align="center" class="actions_investors">
                                        <a href='javascript:void(0)' class="downloadAgreeent">
                                            <i class="fa fa-download" aria-hidden="true" class="downloadAgreeent"></i>
                                        </a>
                                    </td>

                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>Deal Nader gul</td>
                                    <td align="center" class="actions_investors">
                                        <a href='javascript:void(0)' class="downloadAgreeent">
                                            <i class="fa fa-download" aria-hidden="true" class="downloadAgreeent"></i>
                                        </a>
                                    </td>

                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>Deal Nader gul</td>
                                    <td align="center" class="actions_investors">
                                        <a href='javascript:void(0)' class="downloadAgreeent">
                                            <i class="fa fa-download" aria-hidden="true" class="downloadAgreeent"></i>
                                        </a>
                                    </td>

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
      <td align="center" class="actions_investors">
        <a href='javascript:void(0)'  class="downloadAgreeent">
          <i class="fa fa-download" aria-hidden="true" class="downloadAgreeent" onclick="downloadInvestorsLendersExcel({{dealId}})"></i>
        </a>
      </td>
    </tr>
    {{/data}}
    </script>
    <script type="text/javascript">
    window.onload = getlistOfBorrowerDeals();
    </script>
    <script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <?php include 'admin_footer.php';?>