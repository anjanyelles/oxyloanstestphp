<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Agreed Loans
        </h1>
        <div class="pull-left">
            <small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>&nbsp;Dashboard</a></li>
                    <li class="active">Agreed Loans</li>
                </ol>
            </small>
        </div>
        <div class="pull-right">
            <a href="borroweragreedloans">
                <button type="button" class="btn btn-success pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Agreed Loans</b>
                </button>
            </a>

            <a href="borrowerresponsetomyrequest">
                <button type="button" class="btn btn-warning pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Responses</b>
                </button>
            </a>

            <a href="myborrowings.htm1">
                <button type="button" class="btn btn-primary pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Loan Requests</b>
                </button>
            </a>
        </div>
    </section>
    <div class="cls"></div>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control">
                    <option>-- Choose --</option>
                    <option>Amount</option>
                    <option>Application Date</option>
                    <option>EMI</option>
                </select>
            </div>
            <div class="col-xs-3 text-center">
                <input type="text" name="q" class="form-control" placeholder="Min Amount">
            </div>
            <div class="col-xs-3 text-center">
                <input type="text" name="q" class="form-control" placeholder="Max Amount">
            </div>
            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left"><i class="fa fa-angle-double-right"></i>
                    <b>Search</b>
            </div>
        </div>

        <div>&nbsp;</div>
        <div>&nbsp;</div>

        <div class="cls"></div>

        <div class="row customFormQ">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Agreed Loans</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Loan ID</th>
                                    <th>Lender ID</th>
                                    <th>Loan Amount</th>
                                    <th>EMI</th>
                                    <th>ROI</th>
                                    <th>Duration</th>
                                    <th>Loan Status</th>
                                    <th>Download Agreement</th>
                                    <th>E-Sign</th>
                                </tr>
                            </thead>
                            <tbody>


                                </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- form start -->

            </div>
            <!-- /.box -->
        </div>


    </section>
    <!-- /.content -->

    <?php include 'footer.php';?>