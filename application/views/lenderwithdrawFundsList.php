<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lender Withdrawal List
        </h1>
    </section><br />

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title" style="color: #008B8B; ">Lender Withdrawal Request Info</h3><br />

                            <div class="col-md-6 pull-right">
                                <div class="lendersautoinvestPagination pull-right">
                                    <ul class="pagination bootpag">
                                    </ul>
                                </div>

                                <div class="searchlendersautoinvestPagination pull-right" style="display: none;">
                                    <ul class="pagination bootpag">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover" border="1">
                            <thead class="mobileDiv_4">
                                <tr>
                                    <!-- <th>LR ID & Name</th>-->
                                    <th>Raised on</th>
                                    <th>Updated On</th>
                                    <th>Amount</th>
                                    <th>Reason</th>
                                    <!--   <th>Rating</th>
                                    <th>FeedBack</th> -->
                                    <th>Requested From</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
      <span class="lable_mobileDiv">Raised On : </span>

          {{createdOn}}
      </td>


       <td> 
      <span class="lable_mobileDiv">Approved  On : </span>
      
        {{#approvedOn}} 
         {{approvedOn}}
         {{/approvedOn}} 
         {{^approvedOn}}
         Yet To Be Approved
         {{/approvedOn}}

      </td>

       <td>
        <span class="lable_mobileDiv">Amount  : </span>
       {{amount}}   
        </td>
       <td>
        <span class="lable_mobileDiv">Reason  : </span>
       {{withdrawalReason}}
     </td>

<!--     <td>
    {{rating}}
     </td>

       <td>
       {{feedBack}}
     </td> -->

       <td>
        <span class="lable_mobileDiv">Request From : </span>
         {{#requestFrom}} 
         {{requestFrom}}
         {{/requestFrom}} 
         {{^requestFrom}}
          WALLET
         {{/requestFrom}}

       </td> 
         <td>
       <span class="lable_mobileDiv">Status : </span>
         {{status}}  
       </td> 

       <td>
           <span class="lable_mobileDiv">Actions : </span>
      <button class="btn  btn-xs bg-black cancel-withdraw-request cancelWithdraw_{{statusobj}}" onClick="withdrawRequestBox('{{requestFrom}}','{{id}}');">Cancel Request</button>
       </td>  
      </tr>
  {{/data}}
</script>


<script type="text/javascript">
 window.onload = loadlenderswithdrawfundslist();
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