<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>QR PAYMENTS HISTORY</center>
        </h1>
    </section><br />
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Qr Transactions</h3>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="viewqrpayments pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr style="background-color: #B0C4DE; border: 3px solid lightgrey;">
                                    <th>Name</th>
                                    <th>User Id</th>
                                    <th>Wallet Amount</th>
                                    <th>Paid Date</th>
                                    <th>Callback info</th>

                                </tr>
                            </thead>
                            <tbody id="displayQRransactions">
                                <tr id="displayNoRecords" class="displayRequests" style="border: 3px solid lightgrey;">
                                    <td colspan="1">No Data Found!</td>
                                </tr>
                                </tfoot>
                        </table>
                    </div>

                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<script id="displayQRPaytm" type="text/template">
    {{#data}}
  <tr>
    <td>{{name}}</td>
    <td>{{userId}}</td>
    <td>{{walletAmount}}</td>
    <td>{{paidOnDate}}</td>

    <td>
           <ul>
          {{#callBackResponseDto}}
          {{#.}}
          <li>payerVA : {{payerVA}} </br> Amount:{{payerAmount}} </br> bankRRN : {{bankRRN}}</li>
          {{/.}}
          {{/callBackResponseDto}}
          </ul>
        

  </td>
    
  </tr>
  {{/data}}
  </script>
<script type="text/javascript">
window.onload = qrpaymentsHistory();
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>