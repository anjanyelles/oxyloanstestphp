<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            My Loan Applications
        </h1>
        <div class="pull-right  mobile_View_div">

            <a href="borroweracceptedrequests" class="mobile_View_Hide">
                <button type="button" class="btn btn-primary pull-right marR15 "><i
                        class="fa fa-angle-double-right"></i> <b>Accepted Offers</b>
                </button>
            </a>
            <a href="borrowerresponsestoMyrequests?appNumber=0" class="viewLendersOffers mobile_View_Hide">
                <button type="button" class="btn btn-success pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Responses </b>
                </button>
            </a>

            <a href="borrowerNewLoanRequests" class="borrowerUserType mobile_View_div_a">
                <button type="button" class="btn btn-info pull-right marR15 shownewLoan"><i
                        class="fa fa-angle-double-right"></i> <b>New loan request</b>
                </button>
            </a>
        </div>

    </section>
    <div class="cls"></div>
    <!-- Main content -->
    <section class="content">
        <div class="cls"></div>
        <div class="row customFormQ">
            <div class="cls"></div>
            <div class="pull-right">
                <div class="row">
                    <div class="col-md-12">
                        <div class="acceptedPagination">
                            <ul class="pagination bootpag">
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="pull-right">

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead class="mobileDiv_4">
                                <tr>
                                    <th>Loan Info </th>
                                    <th>Repayment</th>
                                    <th>Loan Status</th>
                                    <th>Modify</th>
                                </tr>
                            </thead>
                            <tbody id="displayRequests" class="displayRequests mobileDiv_3">
                                <tr id="displayNoRecords" style="display:none;">
                                    <td colspan="8">No Offers found!</td>
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
<!-- /.content-wrapper -->


<div class="modal modal-warning fade" id="modal-alreadyDoneLoanEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="loanedit-wrong">admin sent an offer now you can change your loan request</p>
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

<div class="modal modal-success fade" id="modal-LoanEditSucess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="bodyLoanRequestError"></p>
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


<script id="displayallRequests" type="text/template">
    {{#data}}
  <tr class="divBlock_Mob_001">
    <td>
<span class="lable_mobileDiv">Info </span>
  Amount :  {{loanRequestAmount}}</br>
  ROI: {{rateOfInterest}}  % Per Month </br>
  Duration : {{duration}} {{durationType}}</br>
  </td>

  <td>

   <span class="lable_mobileDiv">repayment method</span>
   Repayment: {{repaymentMethod}}</br>
   Requested Date : {{loanRequestedDate}}</br>
   Loan Purpose : {{loanPurpose}}

</td>


  <td><span class="lable_mobileDiv">status</span>{{loanStatus}}</td>
     <td class="laonEditbleAccess-{{loanStatus}} editloansRequest col-md-2">
     <span class="lable_mobileDiv">modify</span>
     <button class="btn btn-sm btn-info editloanreques"  onClick="editRequestUsers();">edit</button>
     <button class="btn btn-sm btn-primary editloanreques" onClick="editandrejectLoanRequest('Hold');">hold</button>
     <button class="btn btn-sm btn-danger editloanreques-{{loanStatus}}" onClick="editandrejectLoanRequest('Rejected');" >Delete</button>
  </td>
  
</tr>
{{/data}}
</script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    window.onload = viewMyLoanApplications();
});
</script>

<?php include 'footer.php';?>