<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="test-bold">
            Equity New Lenders
        </h1>
    </section>
    <div class="cls"></div>
    <section class="content">
        <div class="cls"></div>

        <div class="row customFormQ">
            <div class="cls"></div>
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="pull-right">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="acceptedPagination">
                                        <ul class="pagination bootpag">
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="equityLendersData" class="table table-bordered table-hover">
                            <thead>
                                <tr style="background-color: #B0C4DE; border: 3px solid lightgrey;">
                                    <th>Lender Id</th>
                                    <th>Lender Name</th>
                                    <th>Lender Group Id</th>
                                    <th>Lender Group Name</th>
                                    <th>Deal Id</th>
                                    <th>Deal Name</th>
                                    <th>Participated Amount</th>

                                </tr>
                            </thead>
                            <tbody id="displayEquitylenders" class="displaywallettrns">
                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script id="equityLendersinfo" type="text/template">
    {{#data}}
  <tr>
    <td>LR{{lenderId}}</td>
    <td>{{lenderName}}</td>
    <td>{{groupId}}</td>
    <td>
    {{#groupName}}
    {{groupName}}
  {{/groupName}}
  {{^groupName}}
    New Lender
  {{/groupName}}
  </td>
    <td>{{dealId}}</td>
    <td>{{dealName}}</td>
     <td>{{participatedAmount}}</td>
  </tr>
  {{/data}}
  </script>
<script type="text/javascript">
$(document).ready(function() {
    equitynewLenders();
});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<?php include 'admin_footer.php';?>