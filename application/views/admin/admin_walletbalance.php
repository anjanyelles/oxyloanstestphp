<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--   <h1> Wallet Balance Based on Start date and End Date</h1> -->
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="clear"></div>
                    <div class="box-body">
                        <div class="form-group row">
                            <center>
                                <H4>Wallet Balance Based on Start date and End Date</H4>
                            </center></br>
                            </br>
                            <label for="name " class="col-sm-2 col-form-label">Start Date :</label>
                            <div class="col-md-3">
                                <input type="text" placeholder="yyyy-mm-dd" id="startdate" name="dob" class="text-fld1">
                                <div class="clear"></div>
                            </div>

                            <label for="name " class="col-sm-2 col-form-label">End Date :</label>
                            <div class="col-sm-3">
                                <input type="text" placeholder="yyyy-mm-dd" id="enddate" name="dob" class="text-fld1">
                                <div class="clear"></div>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-xm btn-primary" id="profit-submit-btn"
                                    onclick="getCurrentwalletBlans();">Submit</button>

                            </div>
                        </div>
                        <hr>

                        <div class="box-body currentWalletinfo" style="display: none">
                            <div class="form-group row">
                                <div class="box-header">
                                    <div class="col-md-6">
                                        <h5> Lenders Current Wallet Amount:- <span class="lrCurrentWallet"></span></h5>

                                    </div>


                                    <div class="col-md-6 pull-right">
                                        <h5>Total Wallet Amount On Given Date:- <span class="totalAmountDate"></span>
                                        </h5>
                                        <div class="searchborrowerPagination pull-right" style="display: none;">
                                            <ul class="pagination bootpag">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr id="example">
                                                <th>Lender ID</th>
                                                <th>Amount</th>

                                                <th>Name</th>

                                            </tr>
                                        </thead>
                                        <tbody id="displayAmountInfo">
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>




                                            </tr>
                                            </tfoot>
                                    </table>
                                    </br>
                                    </br>

                                </div>
                                <!-- /.
                                    
                                    /.box-header -->
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
<script id="currentWalletInfo" type="text/template">
    {{#data}}
            <tr>
                <td>{{lenderId}}</td>
                <td>{{amount}}</td>
                
                <td>
                  {{name}}
                </td>
            </tr>
            {{/data}}
            </script>
<script type="text/javascript">
$(document).ready(function() {


});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#startdate").datepicker({
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        // startDate: new Date(),
        changeMonth: true,
        changeYear: true,

    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#enddate").datepicker({
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        todayHighlight: true,

        changeMonth: true,
        changeYear: true,

    });
});
</script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>