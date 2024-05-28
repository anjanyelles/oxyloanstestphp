<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper newDashboard">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="pull-left">
            Lending Details
            <small>New</small>
        </h1>

        <div class="pull-right">
            <form>
                <div class="form-group">
                    <select class="form-select myformSelc" aria-label="Default select example">
                        <option value="" selected>-- Sort by --</option>
                        <option value="asc">Asc</option>
                        <option value="des">Des</option>
                        <option value="dealwise">Deal wise</option>
                        <option value="closed">Closed</option>
                        <option value="running">Running</option>
                    </select>
                </div>
            </form>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- COL 4 left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <div class="pull-right">
                            <span>Download Report</span>

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <br />
                    <!-- form start -->
                    <table class="table table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Date</th>
                                <th>Closed Date</th>
                                <th>Amount</th>
                                <th>RoI</th>
                                <th>Deal Name</th>
                                <th>Tenure / Current</th>
                                <th>Earnings</th>
                                <th>Withdrawls</th>
                                <th>Running value</th>
                                <th>Loan Status</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>05-07-2020</td>
                                <td>05-12-2020</td>
                                <td>150000</td>
                                <td>24%</td>
                                <td>Our Food</td>
                                <td>6 / 5</td>
                                <td>15000</td>
                                <td>50000</td>
                                <td>100000</td>
                                <td>Closed</td>
                            </tr>

                            <tr>
                                <td>1.</td>
                                <td>05-07-2020</td>
                                <td>05-12-2020</td>
                                <td>150000</td>
                                <td>24%</td>
                                <td>Our Food</td>
                                <td>6 / 5</td>
                                <td>15000</td>
                                <td>50000</td>
                                <td>100000</td>
                                <td>Closed</td>
                            </tr>

                            <tr>
                                <td>1.</td>
                                <td>05-07-2020</td>
                                <td>05-12-2020</td>
                                <td>150000</td>
                                <td>24%</td>
                                <td>Our Food</td>
                                <td>6 / 5</td>
                                <td>15000</td>
                                <td>50000</td>
                                <td>100000</td>
                                <td>Closed</td>
                            </tr>

                            <tr>
                                <td>1.</td>
                                <td>05-07-2020</td>
                                <td>05-12-2020</td>
                                <td>150000</td>
                                <td>24%</td>
                                <td>Our Food</td>
                                <td>6 / 5</td>
                                <td>15000</td>
                                <td>50000</td>
                                <td>100000</td>
                                <td>Closed</td>
                            </tr>

                            <tr>
                                <td>1.</td>
                                <td>05-07-2020</td>
                                <td>05-12-2020</td>
                                <td>150000</td>
                                <td>24%</td>
                                <td>Our Food</td>
                                <td>6 / 5</td>
                                <td>15000</td>
                                <td>50000</td>
                                <td>100000</td>
                                <td>Closed</td>
                            </tr>


                        </thead>
                        <tr>
                    </table>
                    <div class="box-footer">



                        <ul class="pagination pull-right notopMargin">
                            <li data-lp="1" class="first disabled"><a href="javascript:void(0);">←</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li data-lp="1.6" class="last"><a href="javascript:void(0);">→</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
</div>
<!-- ./wrapper -->
<?php include 'footer.php';?>