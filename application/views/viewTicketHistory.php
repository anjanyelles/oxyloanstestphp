<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <left>
            <h1>
                Ticket History
            </h1>
        </left>
    </section>
    <div class="cls"></div>
    </br>
    </br>
    <!-- Main content -->
    <section class="content">
        <div class="cls"></div>

        <div class="row customFormQ getviewQueryStatus">
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
                                    </div>
                                    <select class="form-select myformSelcInvestment" id="mySelectQueryStatus"
                                        aria-label="Default select example">
                                        <option value="" selected>--Query Status --</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Cancelled">Cancelled</option>
                                        <option value="">Both</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myborrowingsData" class="table table-bordered table-hover mobileDiv_3">
                            <thead class="mobileDiv_4">
                                <tr id="viewUserQueryStatus">
                                    <th>Sno</th>
                                    <th>Ticket Id</th>
                                    <th>Query</th>
                                    <th class="Query-Staus">Admin Comments</th>
                                </tr>
                            </thead>
                            <tbody id="displayUserQuerystatus" class="displayUserQuerystatus mobileDiv_3">
                                <tr id="displayNoneQuery" class="displayNoneQuery" style="display:none">
                                    <td colspan="8">No Data found!</td>
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
<script id="wallettransactiondetails" type="text/template">
    {{#data}}
  <tr class="divBlock_Mob_001 displayNorecordQueryHistory">
    <td class="col-md-1">
    <span class="lable_mobileDiv">Sno</span>

    {{sNo}}</td>
    <td class="col-md-3">
    <span class="lable_mobileDiv">ticketId</span>

       {{ticketId}}</br>
       Received On : {{receivedOn}}</br>
       Status : {{status}}
    </td>
    <td class="col-md-6">
    <span class="lable_mobileDiv">query</span>

    {{query}}  


{{#comments}}
</br> </br>
 <b>Admin comments : </b> {{comments}}
{{/comments}}

</td>

    <td class="col-md-1 querystatus-{{status}}">
    <a href="javascript:void(0)" class="getUserAdminComments getUserAdminCommentsShow-{{status}} disPlayNone"onclick="viewTicketHistory({{id}})"><button class="btn btn-xs btn-info">View Comments</button></a></br></br>

    <a href="lenderInquiries?id={{id}}" class="getUserAdminComments  getUserAdminComments-{{status}}"><button class="btn btn-xs bg-black">Write Reply</button></a>

    </br></br>

    <a href="javascript:void(0)" class="getUserAdminComments  getUserAdminComments-{{status}}"onclick="subinquiries({{id}})">
      <button class="btn btn-xs btn-primary">Inquiries Reply</button></a>

      </br></br>


      <a href="javascript:void(0)" class="getUserAdminComments  getUserAdminComments-{{status}} calcelTicket" calcel-Id="{{id}}" onclick="cancelquery({{id}})">
        <button class="btn btn-xs bg-yellow"> Cancel </button></a>

    </td>
  </tr>

 <tr class="disPlayNone">

      <td style="display:none;" colspan="14" class="viewQueryadmin    viewQueryadminStatus-{{id}}">
       <div class="col-md-6 pull-right">
        <div class="interstedPagination1 pull-right">
          <ul class="pagination bootpag">
          </ul>
        </div>
      </div>
      
      <table class="table table-bordered table-hover" >
        <thead>
           <tr style="background-color: #ADD8E6; border: 1px solid lightgrey;"> 
            <th>Admin Comments</th>
            <th>Responded On</th>
            
          </tr>
         </thead>
         <tbody id="displayUserQuery-{{id}}">
         <tr class="viewQueryAdminComments">
          <td class="col-md-8">
           No comments Found
         </td>
       </tr>
        </tbody>
        </tfoot>
      </table>
    </td>
  </tr> 


<tr class="inquiriesdisPlayNone">
      <td style="display:none;" colspan="14" class="inquiriesdisPlayNone    inquiriesdisPlayNonedata-{{id}}">

       <div class="col-md-6 pull-right">
        <div class="interstedPagination1 pull-right">
          <ul class="pagination bootpag">
          </ul>
        </div>
      </div>
      
      <table class="table table-bordered table-hover" >
        <thead>
           <tr style="background-color: #ADD8E6; border: 1px solid lightgrey;"> 
            <th>User Info</th>
            <th>Query </th>
         
          </tr>
         </thead>
         <tbody id="displaySubUserQuery-{{id}}">
         <tr class="viewSubqueryNodata" style="display:none">
          <td class="col-md-12">
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



<script id="inquiriesReplay" type="text/template">
    {{#data}}
  <tr>
    <td>{{pendingQuereis}}</td>
    <td>{{respondedOn}}</td>
  </tr>
 
  {{/data}}
  </script>


<script id="viewgetUserQuery" type="text/template">
    {{#data}}
  <tr>
    <td>
    Name : {{name}}</br>
     Mobile Number: {{mobileNumber}}</br>
     Ticket Id:{{ticketId}}</br>
     Received On: {{receivedOn}}

    </td>
     <td>
     {{query}}
    </td>
  </tr>
  {{/data}}
  </script>
<script type="text/javascript">
$(document).ready(function() {
    getViewTicketHistory('');
});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'footer.php';?>