<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>


<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Higest Borrowing Loan Owner's Info
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
                                    <!-- <th>Sum Of Emi Amount</th> -->
                                </tr>
                            </thead>
                            <tbody id="displaywallettrns" class="displaywallettrns">
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
                        <h4 class="modal-title">BORROWERS INFO</h4><br /><b>If you've any queries please contact
                            <a href="mailto:subbu@oxyloans.com">subbu@oxyloans.com</a></b>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr style="background-color: #B0C4DE; border: 3px solid lightgrey;">
                            <th>Borrower Id</th>
                            <th>Borrower Name</th>
                            <th>Remaining Loan Offered Amount</th>
                            <!--    <th>Loan Id</th> -->
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

<div class="modal modal-success fade" id="modal-alreadyDoneSendOffer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text1"> You are successfully added the loan owner name</p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"
                        id="highest">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-warning fade" id="modal-alreadyAddedinDb">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text1"> You are successfully added the loan owner name</p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"
                        id="highest">Close</button>
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
                  <td><a href="javascript:void(0)" class="viewLoanLenders"
                    onclick="viewborrowersemi('{{loanOwner}}')">{{loanOwner}}</a>
                  </td> 
                
                
                </tr>

 {{/data}}
  </script>

<script id="borrowersinfo" type="text/template">
    {{#data}}
    <tr>
      <td>BR{{borrowerId}}</td>
      <td>{{firstName}} {{lastName}}</td>
      <td>{{remainingLoanOfferedAmount}}</td>
    </tr>              

  {{/data}}
</script>


<script type="text/javascript">
$(document).ready(function() {
    noprofileCheck = "no";
    noROICheck = "no";
    borrowersemiamount();
});
</script>

k

<style type="text/css">
#selectElementId {
    box-sizing: border-box;
    height: 35px;
    width: 100px;
}
</style>

<script id="loadLendersRunningloans" type="text/template">
    {{#data}}
      <tr style="border: 3px solid lightgrey;">
        <td>{{lenderId}}</td>
        <td>{{lenderName}}</td>
        <td>{{lenderAccountNumber}}"</td>
        <td>{{borrowerId}}</td>
        <td>{{borrowerName}}</td>
        <td>{{loanId}}</td>
        <td>{{emiAmount}}</td>
        <td>{{disbursementDate}}</td>
        <td>{{emiDueOn}}</td>
        <td>{{emiPaidOn}}</td>
      </tr>
  {{/data}}
</script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<?php include 'admin_footer.php';?>