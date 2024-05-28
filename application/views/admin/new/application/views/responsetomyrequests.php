<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Responses to my loans requests
        </h1>
        <div class="pull-left">
            <small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">Loan Requests</li>
                </ol>
            </small>
        </div>
        <div class="pull-right">
            <a href="agreedLoans.php">
                <button type="button" class="btn btn-success pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Agreed Loans</b>
                </button>
            </a>

            <a href="responsestoMyrequests.php">
                <button type="button" class="btn btn-warning pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Responses</b>
                </button>
            </a>

            <a href="myborrowings.php">
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
                        <h3 class="box-title">Responses</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Application Number</th>
                                    <th>Loan Amount</th>
                                    <th>Balance Amount</th>
                                    <th>EMI</th>
                                    <th>Applied on</th>
                                    <th>Loan needed by</th>
                                    <th>Status</th>
                                    <th>Edit / Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="displayResponse.php">APBR101906</a></td>
                                    <td>2,00,000</td>
                                    <td>1,63,000</td>
                                    <td>6,222.22</td>
                                    <td>20-Dec-2017</td>
                                    <td>28-Dec-2017</td>
                                    <td>Applied</td>
                                    <td align="center" class="actions_borrowings">
                                        <a href='#'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" class="blue"></i>
                                        </a>
                                        <a href='#'>
                                            <i class="fa fa-trash red" aria-hidden="true" data-toggle="modal"
                                                data-target="#deleteRecord"></i>
                                        </a>
                                        <a href='displayResponse.php'>
                                            <i class="fa fa-external-link black" aria-hidden="true" data-toggle="modal"
                                                data-target="#openResponse"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="displayResponse.php">APBR101906</a></td>
                                    <td>2,00,000</td>
                                    <td>1,63,000</td>
                                    <td>6,222.22</td>
                                    <td>20-Dec-2017</td>
                                    <td>28-Dec-2017</td>
                                    <td>Applied</td>
                                    <td align="center" class="actions_borrowings">
                                        <a href='#'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" class="blue"></i>
                                        </a>
                                        <a href='#'>
                                            <i class="fa fa-trash red" aria-hidden="true" data-toggle="modal"
                                                data-target="#deleteRecord"></i>
                                        </a>
                                        <a href='displayResponse.php'>
                                            <i class="fa fa-external-link black" aria-hidden="true" data-toggle="modal"
                                                data-target="#openResponse"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="displayResponse.php">APBR101906</a></td>
                                    <td>2,00,000</td>
                                    <td>1,63,000</td>
                                    <td>6,222.22</td>
                                    <td>20-Dec-2017</td>
                                    <td>28-Dec-2017</td>
                                    <td>Applied</td>
                                    <td align="center" class="actions_borrowings">
                                        <a href='#'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" class="blue"></i>
                                        </a>
                                        <a href='#'>
                                            <i class="fa fa-trash red" aria-hidden="true" data-toggle="modal"
                                                data-target="#deleteRecord"></i>
                                        </a><a href='displayResponse.php'>
                                            <i class="fa fa-external-link black" aria-hidden="true" data-toggle="modal"
                                                data-target="#openResponse"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="displayResponse.php">APBR101906</a></td>
                                    <td>2,00,000</td>
                                    <td>1,63,000</td>
                                    <td>6,222.22</td>
                                    <td>20-Dec-2017</td>
                                    <td>28-Dec-2017</td>
                                    <td>Applied</td>
                                    <td align="center" class="actions_borrowings">
                                        <a href='#'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" class="blue"></i>
                                        </a>
                                        <a href='#'>
                                            <i class="fa fa-trash red" aria-hidden="true" data-toggle="modal"
                                                data-target="#deleteRecord"></i>
                                        </a><a href='displayResponse.php'>
                                            <i class="fa fa-external-link black" aria-hidden="true" data-toggle="modal"
                                                data-target="#openResponse"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="displayResponse.php">APBR101906</a></td>
                                    <td>2,00,000</td>
                                    <td>1,63,000</td>
                                    <td>6,222.22</td>
                                    <td>20-Dec-2017</td>
                                    <td>28-Dec-2017</td>
                                    <td>Applied</td>
                                    <td align="center" class="actions_borrowings">
                                        <a href='#'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" class="blue"></i>
                                        </a>
                                        <a href='#'>
                                            <i class="fa fa-trash red" aria-hidden="true" data-toggle="modal"
                                                data-target="#deleteRecord"></i>
                                        </a><a href='displayResponse.php'>
                                            <i class="fa fa-external-link black" aria-hidden="true" data-toggle="modal"
                                                data-target="#openResponse"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="displayResponse.php">APBR101906</a></td>
                                    <td>2,00,000</td>
                                    <td>1,63,000</td>
                                    <td>6,222.22</td>
                                    <td>20-Dec-2017</td>
                                    <td>28-Dec-2017</td>
                                    <td>Applied</td>
                                    <td align="center" class="actions_borrowings">
                                        <a href='#'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" class="blue"></i>
                                        </a>
                                        <a href='#'>
                                            <i class="fa fa-trash red" aria-hidden="true" data-toggle="modal"
                                                data-target="#deleteRecord"></i>
                                        </a><a href='displayResponse.php'>
                                            <i class="fa fa-external-link black" aria-hidden="true" data-toggle="modal"
                                                data-target="#openResponse"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="displayResponse.php">APBR101906</a></td>
                                    <td>2,00,000</td>
                                    <td>1,63,000</td>
                                    <td>6,222.22</td>
                                    <td>20-Dec-2017</td>
                                    <td>28-Dec-2017</td>
                                    <td>Applied</td>
                                    <td align="center" class="actions_borrowings">
                                        <a href='#'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" class="blue"></i>
                                        </a>
                                        <a href='#'>
                                            <i class="fa fa-trash red" aria-hidden="true" data-toggle="modal"
                                                data-target="#deleteRecord"></i>
                                        </a><a href='displayResponse.php'>
                                            <i class="fa fa-external-link black" aria-hidden="true" data-toggle="modal"
                                                data-target="#openResponse"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="displayResponse.php">APBR101906</a></td>
                                    <td>2,00,000</td>
                                    <td>1,63,000</td>
                                    <td>6,222.22</td>
                                    <td>20-Dec-2017</td>
                                    <td>28-Dec-2017</td>
                                    <td>Applied</td>
                                    <td align="center" class="actions_borrowings">
                                        <a href='#'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" class="blue"></i>
                                        </a>
                                        <a href='#'>
                                            <i class="fa fa-trash red" aria-hidden="true" data-toggle="modal"
                                                data-target="#deleteRecord"></i>
                                        </a><a href='displayResponse.php'>
                                            <i class="fa fa-external-link black" aria-hidden="true" data-toggle="modal"
                                                data-target="#openResponse"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="displayResponse.php">APBR101906</a></td>
                                    <td>2,00,000</td>
                                    <td>1,63,000</td>
                                    <td>6,222.22</td>
                                    <td>20-Dec-2017</td>
                                    <td>28-Dec-2017</td>
                                    <td>Applied</td>
                                    <td align="center" class="actions_borrowings">
                                        <a href='#'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" class="blue"></i>
                                        </a>
                                        <a href='#'>
                                            <i class="fa fa-trash red" aria-hidden="true" data-toggle="modal"
                                                data-target="#deleteRecord"></i>
                                        </a><a href='displayResponse.php'>
                                            <i class="fa fa-external-link black" aria-hidden="true" data-toggle="modal"
                                                data-target="#openResponse"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="displayResponse.php">APBR101906</a></td>
                                    <td>2,00,000</td>
                                    <td>1,63,000</td>
                                    <td>6,222.22</td>
                                    <td>20-Dec-2017</td>
                                    <td>28-Dec-2017</td>
                                    <td>Applied</td>
                                    <td align="center" class="actions_borrowings">
                                        <a href='#'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" class="blue"></i>
                                        </a>
                                        <a href='#'>
                                            <i class="fa fa-trash red" aria-hidden="true" data-toggle="modal"
                                                data-target="#deleteRecord"></i>
                                        </a><a href='displayResponse.php'>
                                            <i class="fa fa-external-link black" aria-hidden="true" data-toggle="modal"
                                                data-target="#openResponse"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="displayResponse.php">APBR101906</a></td>
                                    <td>2,00,000</td>
                                    <td>1,63,000</td>
                                    <td>6,222.22</td>
                                    <td>20-Dec-2017</td>
                                    <td>28-Dec-2017</td>
                                    <td>Applied</td>
                                    <td align="center" class="actions_borrowings">
                                        <a href='#'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" class="blue"></i>
                                        </a>
                                        <a href='#'>
                                            <i class="fa fa-trash red" aria-hidden="true" data-toggle="modal"
                                                data-target="#deleteRecord"></i>
                                        </a><a href='displayResponse.php'>
                                            <i class="fa fa-external-link black" aria-hidden="true" data-toggle="modal"
                                                data-target="#openResponse"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="displayResponse.php">APBR101906</a></td>
                                    <td>2,00,000</td>
                                    <td>1,63,000</td>
                                    <td>6,222.22</td>
                                    <td>20-Dec-2017</td>
                                    <td>28-Dec-2017</td>
                                    <td>Applied</td>
                                    <td align="center" class="actions_borrowings">
                                        <a href='#'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" class="blue"></i>
                                        </a>
                                        <a href='#'>
                                            <i class="fa fa-trash red" aria-hidden="true" data-toggle="modal"
                                                data-target="#deleteRecord"></i>
                                        </a><a href='displayResponse.php'>
                                            <i class="fa fa-external-link black" aria-hidden="true" data-toggle="modal"
                                                data-target="#openResponse"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="displayResponse.php">APBR101906</a></td>
                                    <td>2,00,000</td>
                                    <td>1,63,000</td>
                                    <td>6,222.22</td>
                                    <td>20-Dec-2017</td>
                                    <td>28-Dec-2017</td>
                                    <td>Applied</td>
                                    <td align="center" class="actions_borrowings">
                                        <a href='#'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" class="blue"></i>
                                        </a>
                                        <a href='#'>
                                            <i class="fa fa-trash red" aria-hidden="true" data-toggle="modal"
                                                data-target="#deleteRecord"></i>
                                        </a><a href='displayResponse.php'>
                                            <i class="fa fa-external-link black" aria-hidden="true" data-toggle="modal"
                                                data-target="#openResponse"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="displayResponse.php">APBR101906</a></td>
                                    <td>2,00,000</td>
                                    <td>1,63,000</td>
                                    <td>6,222.22</td>
                                    <td>20-Dec-2017</td>
                                    <td>28-Dec-2017</td>
                                    <td>Applied</td>
                                    <td align="center" class="actions_borrowings">
                                        <a href='#'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" class="blue"></i>
                                        </a>
                                        <a href='#'>
                                            <i class="fa fa-trash red" aria-hidden="true" data-toggle="modal"
                                                data-target="#deleteRecord"></i>
                                        </a><a href='displayResponse.php'>
                                            <i class="fa fa-external-link black" aria-hidden="true" data-toggle="modal"
                                                data-target="#openResponse"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="displayResponse.php">APBR101906</a></td>
                                    <td>2,00,000</td>
                                    <td>1,63,000</td>
                                    <td>6,222.22</td>
                                    <td>20-Dec-2017</td>
                                    <td>28-Dec-2017</td>
                                    <td>Applied</td>
                                    <td align="center" class="actions_borrowings">
                                        <a href='#'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" class="blue"></i>
                                        </a>
                                        <a href='#'>
                                            <i class="fa fa-trash red" aria-hidden="true" data-toggle="modal"
                                                data-target="#deleteRecord"></i>
                                        </a><a href='displayResponse.php'>
                                            <i class="fa fa-external-link black" aria-hidden="true" data-toggle="modal"
                                                data-target="#openResponse"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="displayResponse.php">APBR101906</a></td>
                                    <td>2,00,000</td>
                                    <td>1,63,000</td>
                                    <td>6,222.22</td>
                                    <td>20-Dec-2017</td>
                                    <td>28-Dec-2017</td>
                                    <td>Applied</td>
                                    <td align="center" class="actions_borrowings">
                                        <a href='#'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" class="blue"></i>
                                        </a>
                                        <a href='#'>
                                            <i class="fa fa-trash red" aria-hidden="true" data-toggle="modal"
                                                data-target="#deleteRecord"></i>
                                        </a><a href='displayResponse.php'>
                                            <i class="fa fa-external-link black" aria-hidden="true" data-toggle="modal"
                                                data-target="#openResponse"></i>
                                        </a>
                                    </td>
                                </tr>


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
</div>
<!-- /.content-wrapper -->

<?php include 'footer.php';?>