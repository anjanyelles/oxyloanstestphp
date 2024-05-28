<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<?php
    $urlfromBroweser = $_SERVER['REQUEST_URI'];
    $dealowner =  isset($_GET['ownername']) ? $_GET['ownername'] : '0';;

   ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Runninng Loans
        </h1>
        <div class="pull-left">
            <small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">Loan Requests</li>
                </ol>
            </small>
        </div>
    </section>

    <div class="cls"></div></br></br>


    <!-- Main content -->
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
                                        <input type="hidden" id="borrowername" name="borrowername" class="text-fld1"
                                            value="<?php echo $dealowner;?>">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr style="background-color: #B0C4DE; border: 3px solid lightgrey;">
                                    <th>Borrower ID</th>
                                    <th>Borrower Name</th>
                                    <th>Disbursment Amount</th>
                                    <th>Disbursment Date</th>
                                </tr>
                            </thead>
                            <tbody id="binfo">
                                <tr id="displayNoRecords" class="displayRequests">
                                    <td colspan="8">No User found!</td>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- form start -->

        </div>
        <!-- /.box -->
</div>


</section>
<!-- /.content -->
</div>




<script id="borrowersinfo" type="text/template">
    {{#data}}
    <tr>
      <td>BR{{borrowerId}}</td>
      <td>{{firstName}} {{lastName}}</td>
      <td>{{disbursmentAmount}}</td>
      <td>{{disbursmentDate}}</td>
    </tr>              
  {{/data}}
</script>
<script type="text/javascript">
window.load = viewborrowerloanowner();
</script>





<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<?php include 'footer.php';?>