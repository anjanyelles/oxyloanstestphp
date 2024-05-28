<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Responses to My Loan Requests
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



        <div class="cls"></div>

        <div class="row customFormQ">
            <div class="cls"></div>
            <div class="pull-right">
                <div class="row">
                    <div class="col-md-12">
                        <div class="myloanrequestPagination">
                            <ul class="pagination bootpag">
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
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
                                    <th>Rate of Interest</th>
                                    <th>Loan purpose</th>
                                    <th>Applied on</th>
                                    <th>Loan needed by</th>
                                    <th>Status</th>
                                    <th>Edit / Delete</th>
                                </tr>
                            </thead>
                            <tbody id="displayRequests" class="displayRequests">




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



<script id="displayallRequests" type="text/template">
    {{#data}}
                <tr>
                  <td><a href="borrowerresponsestoMyrequests?appNumber={{loanRequestId}}">{{loanRequest}}</a></td>
                  <td>{{loanRequestAmount}}</td>
                  <td>{{rateOfInterest}}</td>
                  <td>{{loanPurpose}}</td>
                  <td>{{loanRequestedDate}}</td>
                  <td>{{expectedDate}}</td>
                  <td>{{loanStatus}}</td>
                  <td align="center" class="actions_borrowings">
                    <a href='#'>
                      <i class="fa fa-pencil-square-o" aria-hidden="true" class="blue"></i>
                    </a>
                    <a href='#'>
                      <i class="fa fa-trash red" aria-hidden="true" data-toggle="modal" data-target="#deleteRecord"></i>
                    </a>
                    <a href='displayResponse.php'>
                      <i class="fa fa-external-link black" aria-hidden="true" data-toggle="modal" data-target="#openResponse"></i>
                    </a>
                  </td>
                </tr>
            {{/data}}
            </script>

<!-- /.content-wrapper -->
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
loadresponserequest();
</script>
<?php include 'footer.php';?>