<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
         wallet  Debit history
  
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
                                    <!-- <th>Requested Date</th> -->
                                    <th>Approved Date</th>
                                    <th>Amount</th>

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
    <!--   <td>
      {{requestedDate}}
     </td> -->
       <td>


        {{#transformedDate}}
         {{transformedDate}}
        {{/transformedDate}}

         {{^transformedDate}}
          Not yet approved
        {{/transformedDate}}
     
     </td>

    <td>
    {{amount}}
     </td>

      </tr>
  {{/data}}
</script>



<script type="text/javascript">
window.onload = wallettowalletDebitHistory();
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