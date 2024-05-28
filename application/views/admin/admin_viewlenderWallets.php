<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lender Wallets
        </h1>
    </section><br />

    <!-- Main content -->

    <section class="content">

        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="lenderID">Lender ID</option>
                </select>
                <span class="errorsearch" style="display: none;">Please choose option.</span>
            </div>

            <div class="col-xs-3 text-center lenderid" style="display: none;">
                <input type="text" name="lenderid" class="form-control lenderid" placeholder="Lender ID">
            </div>

            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="LENDERWALLET();"><i
                        class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>




        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Lender Wallets info</h3>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="viewlenderwallet pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> Lender ID</th>
                                    <th> scrow AccountNumber</th>
                                    <th>Lender Name</th>
                                    <th>wallet Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="displaywallet">

                                <tr>
                                    <td>LN123</td>
                                    <td>AP123</td>
                                    <td>LR123</td>
                                    <td>BR123</td>
                                    <td>INR <span>500000</span></td>
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
<script id="displaywalletTpl" type="text/template">
    {{#data}}
      <tr>
        <td>LR{{id}}</td>
        <td>{{scrowAccountNumber}}</td>
        <td>{{lenderName}}</td>
        <td>{{walletAmount}}</td>
        <td>{{status}}</td>
       
      </tr>   
  {{/data}}
</script>
<script id="displaywalletTpl1" type="text/template">
    {{#data}}
      <tr>
        <td>LR{{id}}</td>
        <td>{{scrowAccountNumber}}</td>
        <td>{{lenderName}}</td>
        <td>{{walletAmount}}</td>
        <td>{{status}}</td>
       
      </tr>   
  {{/data}}
</script>
<script type="text/javascript">
window.onload = viewlenderwallet();
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>