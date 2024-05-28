<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<div class="content-wrapper">

    <section class="content-header">
        <div class="row">
            <h1 class="pull-left col-md-6">
                Hold Amount From Deals
            </h1>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="pull-left reff">
                            <div class="info">
                                <code><strong>Note : </strong></code><br />
                                <strong>Hold Amount : </strong> Kindly note that if extra amount is paid for any deal we
                                will display here. We will deduct the extra paid amount from the upcoming
                                interest/principal payments.Please find the details below: <br />

                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="mobileDiv_4">
                                <tr id="example">

                                    <th width="10%">Sno</th>
                                    <th width="20%">Extra amount</th>
                                    <th width="25%">Extra amount paid details </th>
                                    <th width="25%">Deduction details </th>
                                    <th width="10%">Status</th>

                                </tr>
                            </thead>
                            <tbody id="displayUserHoldAmountRequest" class="mobileDiv_3">
                                <tr class="displayhideclosed">
                                    <td colspan="12">No Record Found</td>
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
window.load = holdAmountViewToLender();
</script>



<script id="viewUserHoldRequest" type="text/template">
    {{#data}}
    <tr>
      <td>{{id}}</td>
      <td> INR {{holdAmount}} </td>
      <td> {{comments}}
      </td>
       <td> {{#userHoldAmountMappedToDealRequestDto}}
          {{#.}}
          <li>  {{textComment}}
          </li>

          {{/.}}
          {{/userHoldAmountMappedToDealRequestDto}}
     
      </td>
      <td>{{status}}</td>
    </tr>
    {{/data}}
    </script>



<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php include 'footer.php';?>