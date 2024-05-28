<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Wallet To wallet history
        </h1>

    </section><br />
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                    </div> </br></br>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover" border="1">
                            <thead class="mobileDiv_4">
                                <tr>
                                    <!-- <th>LR ID & Name</th>-->
                                    <th>Receiver Id </th>
                                    <th>Receiver Name</th>
                                    <th>Requested Date</th>
                                    <th>Approved Date</th>
                                    <th>Amount</th>
                                     <th>Status</th>
                                     <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody id="loadwithdrawfundslist" class="mobileDiv_3">

                                <tr id="displayNoRecords" class="displayRequests" style="display:none;">
                                    <td colspan="8">No Data found!</td>
                                </tr>
                            </tbody>
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

<script id="loadlenderswithdrawfundslistTpl" type="text/template">
    {{#data}}
      <tr class="divBlock_Mob_001">
      <td> 
         LR {{receiverId}}
      </td>

       <td>
       {{receiverName}}   
        </td>
      <td>
      {{requestedDate}}
     </td>
       <td>



        {{#transformedDate}}
         {{transformedDate}}
        {{/transformedDate}}

         {{^transformedDate}}
          Not yet updated
        {{/transformedDate}}
     
     </td>

    <td>
    {{amount}}
     </td>

      <td>
    {{status}}
     </td>

       <td>
        <button class="btn btn-xs btn-info wallet-to-wallet-status-{{statusobj}}" onClick="cancelMyWithdrawWalletRequest({{id}})">Cancel Request</button>
     </td>

      </tr>
  {{/data}}
</script>

<div class="modal modal-success fade" id="modal-wallet-request-approve">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Thanks
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              You have successfully canceled  Your Request
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
window.onload = wallettowalletHistory();
</script>

<style type="text/css">
#example2 tr th,
#example2 tr td {
    border: 1px solid #000;
}

#example2 tr th {
    background-color: #D3D3D3;
}
</style>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<?php include 'footer.php';?>