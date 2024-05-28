<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <h1 class="pull-left col-md-6">
                High Value Deals Info
            </h1>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-10 pull-right">
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
                                <tr id="example">
                                    <!-- <th>Deal Id</th> -->
                                    <th>Deal Name</th>
                                    <th>Deal Amount</th>
                                    <th>Funds Start Date</th>
                                    <th>Deal Closed Date</th>
                                    <th>No of Participated Lenders </th>


                                </tr>
                            </thead>
                            <tbody id="displayClosedData" class="mobileDiv_3">
                                <tr id="norecodeOfAsset" style="display:none;">
                                    <td colspan="8">No Data found!</td>
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
<div class="modal  fade" id="modal-viewLenderStatement">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-5 pull-left" style="margin-left:20px">
                        <br />
                        <a href="#" class="download-block"><b><span class="fa fa-download"></span> Download
                                statement</a></b>
                    </div>
                    <div class="col-xs-4 pull-right">
                        <h5 class="modal-title pull-right"> First Interest Date : <span class="firstInterestDate">
                                12-03-2021</span></h5>
                    </div>
                </div>
                <div class="modal-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="mobileDiv_4">
                            <tr style="background-color: #B0C4DE; border: 1px solid lightgrey;">
                                <th>S no</th>
                                <th>Date</th>
                                <th>Payment Status</th>
                                <th>Amount Returned</th>

                            </tr>
                        </thead>
                        <tbody id="viewLenderStatement" class="mobileDiv_3">
                            <tr id="norecodeOfClosed" style="display:none;">
                                <td colspan="8">No Data found!</td>
                            </tr>
                            </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script id="displayClosedDealScript" type="text/template">
    {{#data}}
        <tr class="divBlock_Mob_001">
          
          <td>{{dealName}}</td>
                 <td>

             <span class="numdigitsvalues" value="{{dealAmount}}"> {{dealAmount}}  </span> 



                 </td>
                              <td>{{fundsAcceptanceStartDate}}</td>
                                 <td>{{dealClosedDate}}</td>
                                   <td>{{numberOfLendersParticipated}}</td>
          
        </tr>
        {{/data}}
        </script>
<script id="lenderDealEmiCard" type="text/template">
    {{#data}}
        <tr class="divBlock_Mob_001">
          <td class="divBlock_Mob_002">
           <span class="lable_mobileDiv">sno</span>

          {{sno}}</td>
          <td>
           <span class="lable_mobileDiv">returnedDate</span>
          {{returnedDate}}</td>
          <td>
           <span class="lable_mobileDiv">status</span>

           {{status}}</td>
        
           <td>
            <span class="lable_mobileDiv">amountReturned</span>
            <span class="numdigitsvalues" value="{{amountReturned}}"> {{amountReturned}}  </span> 

         
          </td>
          
          {{/data}}
          </script>
<script type="text/javascript">
window.onload = viewAssetDealInfo();
setTimeout(function() {
    digits();
}, 3000);
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php include 'footer.php';?>