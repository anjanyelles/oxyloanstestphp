<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="margin-left:20px" class="text-bold">
            <left>Download Register Lenders </left>
        </h1>

    </section><br />

    <section class="content">
        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="registerStartEndDate">Date Range</option>

                </select>
                <span class="errorsearch" style="display: none;">Please choose option</span>
            </div>

            <div class="col-xs-3 text-center registerStartdatediv" style="display: none;">
                <input type="text" name="registerStartdate" class="form-control  registerStartdate"
                    placeholder="start Date">
            </div>

            <div class="col-xs-3 text-center registerUserEnddatediv" style="display: none;">
                <input type="text" name="registerUserEnddatediv" class="form-control registerUserEnddate" placeholder="End date">
            </div>
            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn"
                    onclick="registerLenderDownload();"><i class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="col-md-6 pull-right">
                            <div class="fdverifiedUserList pull-right">
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
                                    <th> s# </th>
                                    <th> Email Status </th>
                                    <th> Download </th>


                                </tr>
                            </thead>
                            <tbody id="displayfdinvoiceList">
                                <tr class="fdinvoiceNodata">
                                    <td colspan="8"> No data found</td>

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



<script type="text/javascript">

</script>





<script id="scriptfdinvoiceList" type="text/template">

    {{#data}}
     <tr>
                                     <td> {{so}}  
                                     </td>
                                    <td>{{emailSent}}</td>
                                    <td><button class="btn btn-xs btn-primary" onclick="downloadShett('{{downloadUrl}}')"> download</button></button></td>
                                    
                                </tr>
                                {{/data}}
</script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>