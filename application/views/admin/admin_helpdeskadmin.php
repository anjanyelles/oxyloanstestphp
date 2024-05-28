<?php include 'admin_header.php';?>
<?php include 'admin_helpdesksidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$queryStatus =  isset($_GET['queryStatus']) ? $_GET['queryStatus'] : 'Pending';
$primaryType =  isset($_GET['primaryType']) ? $_GET['primaryType'] : 'LENDER';
// echo "<script>alert('$gmailcode');</script>";
if($queryStatus =="pending"){
$queryStatus="Pending";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <h3 class="pull-left">
                User Queries
            </h3>
            <div class="pull-right col-md-6">
                <a href="helpdeskadmin?queryStatus=pending&primaryType=LENDER">
                    <button class=" btn btn-success btnRoundUp" style="border-radius: 20px;">
                        Pending Lender Queries
                    </button>
                </a>
                <a href="helpdeskadmin?queryStatus=pending&primaryType=BORROWER" class="compleated-Btn">
                    <button class=" btn btn-warning btnRoundUp" style="border-radius: 20px; margin-left: 10px;">
                        Pending Borrower Queries
                    </button>
                </a>

            </div>
            </br></br></br>
            <div class="alert  querySuccessMessage" role="alert" style="background-color: #D0f0C0; display: none;">
                <strong class="text-bold" style="font-size: 18px;">Successfully Updated.</strong>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="col-md-6">
                            <b><span class="userQueryType"></span>
                                : <span class="countofquery"></span></b>
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
                            <thead>
                                <tr id="example">
                                    <th>S.#</th>
                                    <th>User Info</th>
                                    <th>Query</th>
                                    <!-- <th>Screenshot</th> -->

                                    <th>Query Status</th>
                                    <th> Status</th>

                                </tr>
                            </thead>
                            <tbody id="displayDealsData">
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
    <div class="modal  fade" id="modal-approveQueryCommentsUpdate">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Comments</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <textarea type="text" name="" class="form-control queryComments"></textarea><br />
                        <div class="form-group row uploadAttachment">
                            <label class="attachText">Attach File :</label>
                            <div class="upload_pdf col-md-4 pull-right">
                                <input class="custom-file-input queryImageUpload query-file-upload-image" id="query"
                                    type='file' onchange="uploadQueryScreesShot(this);"
                                    onclick="$('.transactionUpload')" accept="image/*" />
                                <input type="hidden" id="queryDocumnetId"> </a>
                                <div class="clear"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="duration" class="col-sm-3 col-form-label">Updating By<em class="error">*</em>
                                :</label>
                            <div class="col-sm-9">
                                <select class="form-control queyUpdatedBy" name="updating" id="updating" data
                                    validation="updating">
                                    <option value="">-- Choose Your Name --</option>
                                    <option value="Radha">Radha</option>
                                    <option value="Megha">Megha</option>
                                    <option value="Muni">Muni</option>
                                    <option value="Lakshmi">Lakshmi</option>
                                    <option value="Sekhar">sekhar</option>
                                    <option value="Bhargav">Bhargav</option>
                                    <option value="Subash">Subash</option>
                                    <option value="Ramadevi">Ramadevi</option>
                                    <option value="Livin">Livin</option>
                                    <option value="Pranav">Pranav</option>
                                    <option value="Anusha">Anusha</option>
                                    <option value="Archana">Archana</option>
                                    <option value="Narendra">Narendra</option>
                                    <option value="Jyothi">Jyothi</option>
                                </select>
                            </div>
                        </div>
                </div>
                </form>

                <div class="modal-footer">
                    <div align="right">
                        <button type="button" class="btn  btn-primary btn-sm approveQueryCommentsBtn"
                            data-dismiss="modal" data-clikedId="" data-userId="" data-status=""
                            onclick="approveQuery()">Save</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="modal  fade" id="modal-displaySubUserQuery">
        <div class="modal-dialog user_emi">
            <div class="modal-content">
                <div class="modal-header emi_header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body emi_body_cont">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr style="background-color: #ADD8E6; border: 1px solid lightgrey;">
                                <th>User Info</th>
                                <th>Query </th>

                            </tr>
                        </thead>
                        <tbody id="displaySubUserQuery" class="mobileDiv_3">
                            <tr class="viewSubqueryNodata" style="display:none">
                                <td colspan="8">
                                    No comments Found
                                </td>
                            </tr>
                            </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->


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
    <script id="displayDealsScript" type="text/template">
        {{#data}}
    <tr>
      <td>{{sNo}}</td>
    
      <td>
         <b>User Id:</b>{{userNewId}}</br>
        <b>Mobile No :</b>{{mobileNumber}}</br>
        <b>Email:</b> {{email}}</br>
        <b>Ticket Id:</b>{{ticketId}}</br>
        <b>User Name:</b>{{name}}
      </td>
      <td>{{query}}</td>
      <td>
        <b><p>Pending Comments</p></b>
        <ul>
          {{#listOfPendingQueries}}
          {{#.}}
          <li>{{pendingQuereis}} - {{resolvedBy}}-{{respondedOn}}</li>
          {{/.}}
          {{/listOfPendingQueries}}
        </ul>
        
      </td>
   
      <td>

        {{#fileName}}
        <b>ScreenShot</b>:  <a href="javascript:void(0)"
          onclick="downLoadWalletTrnsImage({{userId}},{{documentId}},'USERQUERYSCREENSHOT')">
          Click Here
        </a></br>
        {{/fileName}}

        <span class="query-{{status}}"><b>Status:</b>{{status}}</span>
        </br>
        <span><b>received On: </b>{{receivedOn}}</span></br>

        {{#resolvedBy}}
         <span><b>Resolved By:</b>{{resolvedBy}}</span>
         {{/resolvedBy}}
      
      </td>
    
    </tr>
    {{/data}}
    </script>
    <script type="text/javascript">
    // countofpendingquery('Pending');
    window.onload = getUserQueries('<?php echo $queryStatus; ?>', '<?php echo $primaryType; ?>');
    </script>
    <script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <?php include 'admin_footer.php';?>