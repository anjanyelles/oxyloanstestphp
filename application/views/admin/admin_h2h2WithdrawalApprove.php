<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$userId =  isset($_GET['userId']) ? $_GET['userId'] : '0';
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="col-md-6">
            <h1 class="text" style="font-size:20px">
                User Withdrawal Approved List
            </h1>
        </div>

    </section>
    <div class="cls"></div>
    <section class="content">
        <div class="row customFormQ">
            <div class="cls"></div>
            <div class="col-md-12">
                <div class="box box-secondary">
                    <div class="box-body editlendergroup">
                        <table id="example2" class="table table-bordered table-hover mtop20">
                            <thead>
                                <tr id="example">

                                    <th>Deal Id</th>
                                    <th>Principal Amount</th>
                                    <th>Interest Amount</th>
                                    <th>Request Date</th>
                                    <th>Approved Date</th>
                                    <th>Move to Funds

                                    </th>
                                </tr>
                            </thead>
                            <tbody id="displayTheApproveh2hWithdrawal">
                                <tr id="displayNoRecords" class="displayRequests" style="display: none;">
                                    <td colspan="12">No User found!</td>
                                </tr>
                            </tbody>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
    </section>
</div>
</div>

<div class="modal modal-success fade" id="modal-H2H-ApprovedWithdrawalMessage">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <p>
                <h2 style="font-size: 16px;">Successfully updated the users Data. please wait& the page will refresh
                    after 7seconds.</h2>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script id="displayh2hPrincipalScript2" type="text/template">
    {{#data}}
<tr>

  <td>
    {{dealId}}
  </td>
  <td>{{amount}}</td>
  <td>{{interestAmount}}</td>
  <td>{{requestDate}}</td>
  <td>{{approvedDate}}</td>
  <td>


              <button class="btn btn-warning btn-sm" onclick="h2hPrincipalApprovedUsers('DISBURSMENT',{{id}});">
                <b><span class="principalH2hMove">Disbursment Account</b>
                </button></br></br>

                <button class="btn btn-success btn-sm" onclick="h2hPrincipalApprovedUsers('REPAYMENT',{{id}});">
                <b><span class="principalH2hMove">Repayment Account</b>
                </button>
  </td>
</tr>
{{/data}}
</script>
<script>
function checkAll(e) {
    var checkboxes = document.getElementsByName('selectOption');
    if (e.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = true;
        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = false;
        }
    }
}
</script>
<script type="text/javascript">
window.onload = approveingwithdrawalPrincipal('<?php echo $userId ?>');
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<?php include 'admin_footer.php';?>