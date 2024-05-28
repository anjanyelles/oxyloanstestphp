<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>


<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Loan Owner's Info
        </h1>
    </section>
    <div class="cls"></div>
    </br>
    </br>
    <section class="content">
        <div class="cls"></div>
        <div class="row customFormQ">
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

                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Loan Owner Name</th>
                                </tr>
                            </thead>
                            <tbody id="displaywallettrns" class="displaywallettrns">
                                <tr id="displayNoRecords" class="displayRequests">
                                    <td colspan="8">No User found!</td>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal  fade" id="modal-viewEMI">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-9">
                        <h4 class="modal-title">Primary Borrower's Info</h4><br />If you've any queries please contact
                        <a href="mailto:subbu@oxyloans.com">subbu@oxyloans.com</a>
                    </div>

                    <div class="col-xs-3">
                        <div class="acceptedPagination">
                            <ul class="pagination bootpag">
                            </ul>
                        </div>
                    </div>
                </div></br>
                <div class="row col-xs-9">
                    <div class="pull-left text-bold">Total Number Of Borrowers:
                        <span id="totalborrowers">50000</span>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr style="background-color: #B0C4DE; border: 3px solid lightgrey;">
                            <th>Borrower ID</th>
                            <th>Borrower Name</th>
                            <th>Disbursment Amount</th>
                            <th>Disbursment Date</th>

                        </tr>
                    </thead>
                    <tbody id="binfo">

                        </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<script id="wallettransactiondetails" type="text/template">
    {{#data}}
                <tr> 
                  <td><a href="loanowner?ownername={{loanOwner}}" class="viewLoanLenders"
                    >{{loanOwner}}</a>
                  </td> 
                </tr>

 {{/data}}
  </script>

<script id="borrowersinfo" type="text/template">
    {{#data}}
    <tr>
      <td>BR{{borrowerId}}</td>
      <td>{{firstName}} {{lastName}}</td>
      <td>{{disbursmentAmount}}</td>
      <td>{{disbursmentDate}}</td>
    </tr>              

  {{/data}}
</script>

<script type="text/javascript">
$(document).ready(function() {
    getgroupingofborrowers();
});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<?php include 'footer.php';?>