<?php include 'header.php';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <h1 class="pull-left col-md-6">
                My Equity Info
            </h1>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="col-md-2">
                            <a class="downloadEquity" href="#"><button class="btn btn-info btn-xs"><span
                                        class="fa fa-download fa-1x"
                                        onclick="listofEquityDeal()"></span>Excel</button></a>
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
                        <h5>Total Equity Amount : <span class="equityAmount"></span></h5>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="mobileDiv_4">
                                <tr id="example">

                                    <th>Deal Name</th>
                                    <th>DEAL ID</th>
                                    <th>Return Type</th>
                                    <th>Participated Amount</th>
                                    <th>Shares</th>
                                    <th>Participated On</th>
                                    <th>More </th>

                                </tr>
                            </thead>
                            <tbody id="knowdealParticipation" class="mobileDiv_3">
                                <tr class="dispalyEquitynoData" style="display:none;">
                                    <td colspan="8">No data found</td>
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
                                <!-- <th>Payment Status</th> -->
                                <th>Amount Returned</th>

                            </tr>
                        </thead>
                        <tbody id="viewEquity" class="mobileDiv_3">
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
<script id="displayShoweqituDeals" type="text/template">
    {{#data}}
                     
        <tr class="divBlock_Mob_001">
          <td>
            <span class="lable_mobileDiv">Deal Name</span>
          {{dealName}}</td>

          <td>
             <span class="lable_mobileDiv">dealId</span>

            {{dealId}}     
          </td>
           <td>
           <span class="lable_mobileDiv">lenderReturnType</span>

           {{lenderReturnType}} </td>

            <td>
           <span class="lable_mobileDiv">participatedAmount</span>
            {{participatedAmount}}</td>

          <td>
        <span class="lable_mobileDiv">rateOfInterest</span>
          {{shares}}</td>

           <td>
          <span class="lable_mobileDiv">participated On</span>
           {{participatedOn}}</td>

            <td>
          <span class="lable_mobileDiv"> View Break Up</span>
      
        <button class="btn btn-xs bg-black viewinterestdataId" data-Id={{dealId}} onClick="showinteerestEquity('{{dealId}}')" >View Interest </button>

       </td>
        </tr>


    <tr class="subquery_interest">
    <td style="display:none;" colspan="14" class="viewinterestequitydataId-{{dealId}}  solidToggle_{{dealId}}">
      
      <table class="table table-bordered table-hover">
        <thead>
          <tr style="background-color: #ADD8E6; border: 1px solid lightgrey;">

                  <th>Deal Id</th>
                  <th>Interest Amount</th>
                  <th>Received On</th>   
            
          </tr>
        </thead>
        <tbody id="displayUserEquityInterestInfo-{{dealId}}">

        <tr class="viewUserINterestDatafound{{dealId}}" style='display:none'>
        <td class="col-md-8" >
          No comments Found
        </td>
       </tr> 

        </tbody>
        </tfoot>
      </table>
    </td>
     
      </tr>
        {{/data}}
        </script>

<script id="displayshowinterestequityInfoScript" type="text/template">
    {{#data}}
      <tr class="showinterestofEqityInfo-{{dealId}}">
        <td> 
          {{dealId}}
         </td>
         <td> 
         {{interestAmount}}
         </td>
          <td>
          {{receivedOn}}
          </td>
         </tr>
  
      {{/data}}
      </script>
<script type="text/javascript">
window.onload = listofEquityDeal();
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php include 'footer.php';?>