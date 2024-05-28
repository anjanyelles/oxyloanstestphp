<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Active Lenders
        </h1>

        
    </section>
    <div class="cls"></div>

    <section class="content">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="box-header">
                        <div class="pull-right">
                            <div class="row">
                                <div class="col-md-12">
                                   <a href="#" target="_blank" class="downloadActiveParticipation">
                                    <button class="btn btn-success btn-md"><i class="fa fa-file-excel-o"></i> Download Excel</button>
                                   </a>
                                </div>
                            </div>
                        </div>
                    </div>

                  
                    <table id="myborrowingsData" class="table table-bordered table-hover">
                        <thead>
                            <tr id="example">

                                <th>User Id</th>
                                <th>Lender Name</th>
                                <th>Investment Amount</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody id="displayActiveLendersParticpation" class="displaywallettrns">
                            <tr id="displayNoRecordsParticipation" class="displaywallettrns">
                                <td colspan="8">No records found!</td>
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
<script id="activeLenderParticippationScript" type="text/template">
    {{#data}}
  <tr>
    <td>LR{{lenderId}}</td>
    <td>{{lenderName}} </td>
    <td>INR {{totalParticipationAmount}}</td>
    <td>{{mobileNumber}} </td>
    <td>{{email}} </td>
    <td>
      {{address}}
    </td>
  </tr>
  {{/data}}
  </script>



<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    activeLenderParticipation();
});
</script>
<?php include 'admin_footer.php';?>