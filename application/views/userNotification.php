<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealType =  isset($_GET['DealType']) ? $_GET['DealType'] : 'NORMAL';

if($dealType =="escrow"){
$dealType="ESCROW";
}
 else if($dealType =="normal"){
   $dealType="NORMAL";
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <h1 class="pull-left col-md-6">
                My Notifications
            </h1>

        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="dashBoardPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                            <div class="searchborrowerPagination pull-right" style="display: none;">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="mobileDiv_4">
                                <tr id="example">

                                    <th>So</th>
                                    <th>Amount</th>
                                    <th>Amount Date</th>
                                    <th>Amount Type</th>
                                    <th>Deal Name</th>

                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody id="displayDealsData" class="mobileDiv_3">
                                <tr class="displayNone" style="display:none;">
                                    <td class="">
                                        No data found
                                    </td>


                                </tr>

                                </tfoot>
                        </table>
                    </div>

                </div>

            </div>

        </div>
    </section>
</div>



<div class="modal modal-success fade" id="modal-user-notification-aggree">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title">Oops!</h6>
            </div>
            <div class="modal-body">
                <p>Thanks for the Agree</p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-outline" data-dismiss="modal"
                        onclick="usernotuploadedprofile('bank');">Ok</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script id="displayDealsScript" type="text/template">
    {{#data}}
  <tr class="divBlock_Mob_001">
    <td>
   <span class="lable_mobileDiv">Sno</span>

    {{tableId}}</td>
    <td class="dealName numeric">
      <span class="lable_mobileDiv"> Amount </span>
            {{amount}}
      </td>
    <td class="dealAmount numeric">
      <span class="lable_mobileDiv">Amount Date</span>
      {{amountLoadedDate}}</td>
   
    <td class="payouttype">
      <span class="lable_mobileDiv">Amount Type</span> {{amountType}}
    </td>
    <td class="duration numeric">

      <span class="lable_mobileDiv">Deal Name</span> 

    {{#dealName}}
    {{dealName}}
    {{/dealName}}

    {{^dealName}}
    No Data
    {{/dealName}}


  
   
    <td class="divBlock_Mob_002">
     <span class="lable_mobileDiv">&nbsp;</span>
   <button class="btn btn-xs btn-primary btn-{{status}}" onClick="agreeNotifcation('{{tableId}}')">Agree</button>
    </td>

  </tr>
  {{/data}}
  </script>

<script type="text/javascript">
$(document).ready(function() {});
window.onload = ViewMynotifications();
</script>
<!-- /.content -->
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php include 'footer.php';?>