<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<?php

$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealId =  isset($_GET['dealId']) ? $_GET['dealId'] : '0';
$paymentDate =  isset($_GET['paymentDate']) ? $_GET['paymentDate'] : '0';
$orginalpaymentDate =  isset($_GET['originalPayment']) ? $_GET['originalPayment'] : 'Null';
$fileStatus =  isset($_GET['status']) ? $_GET['status'] : 'approved';
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="col-md-6">
            <h1 class="text-bold">
                <span class="interestDealName">Gogineni 30L Deal</span> <?php echo $fileStatus ?> Users
            </h1>
        </div>
    </section>
    <div class="cls"></div>
    <section class="content">
        <div class="cls"></div>


        <div class="row customFormQ">
            <div class="cls"></div>
            <div class="col-md-12">

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
                        <div class="col-md-6 f-left">
                            <h4>Here are the Lenders</h4>
                            <b>Tenure</b> :-<span class="tottalTenure"></span> Months<br />
                            <b>Payment Month</b> :-<span class="cureentTenure"></span> Months
                        </div>
                        <div class="col-md-6 f-right rttext">
                            <div class="f-right"><br />
                                <button class="btn btn-warning btn-large" onclick="interestOnHoldUsers();">
                                    <b>On Hold</b>
                                </button>
                                <a
                                    href="viewinterestUsers?dealId=<?php echo $dealId ?>&paymentDate=<?php echo $paymentDate?>">
                                    <button class="btn btn-primary btn-large">
                                        <b>View All</b>
                                    </button>
                                </a>
                                <!-- <button class="btn btn-danger btn-large">
                <b>Undo my approval</b> -->
                                </button>
                                <br />&nbsp;
                            </div>
                            <input type="hidden" name="Paymentdate" value="<?php echo $paymentDate?>"
                                id="paymentDateOnHold">
                            <input type="hidden" name="dealId" value="<?php echo $dealId?>" id="onHolddealID">
                        </div>
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    <th>S.No</th>
                                    <th>Lender info</th>

                                    <th>Participated Amount & ROI</th>

                                    <th>Bank Details</th>

                                    <th>Check All<br /><input type="checkbox" id="selectAll" onchange="checkAll(this)"
                                            name="selectAll" /></th>
                                </tr>
                            </thead>
                            <tbody id="approveIntrestInfo">
                                <tr id="displayNoRecords" class="displayRequests" style="display: none;">
                                    <td colspan="8">No User found!</td>
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
<div class="modal modal-success fade" id="modal-H2H-ONHoldSuccessMessage">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <p>
                <h2 style="font-size: 16px;">successfully updated the user's data has to on-hold</h2>
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
<script id="displayApprovedScript" type="text/template">
    {{#data}}
  <tr>
    <td>{{sno}}</td>
    <td>{{lenderName}}</br>
      LR{{userId}}</br>
       Group : {{groupName}}
    </td>
  

    <td>
         Participate Date : {{participatedDate}}</br>
          Amount : {{participatedAmount}}</br>
        Roi:  {{rateOfInterest}}</td></br>
      <b>Interest Amount :{{interestAmount}}INR </b>
      </br>

      Loan Status : RUNNING
         </td>

    <td>
      Bank Account Number : {{bankAccountNumber}}</br>
      Bank Name : {{bankName}}</br>
      Branch Name :{{branchName}}</br>
      IFSC Code :{{ifscCode}}</br>
      NameAsPerBank :{{nameAsPerBank}}
    </td>
     <td>
      <input type="checkbox" name="selectOption" class="checkboxBots bhargavApprove"  onchange="checkChange();"
      data-userID = "{{userId}}"
      />
      <br/>
      <textarea cols="10" rows="3" class="response_{{userId}}">Calculations are correct.</textarea>
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
window.onload = approvedInterestPay('<?php echo $dealId ?>', '<?php echo $paymentDate?>', '<?php echo $fileStatus ?>',
    '<?php echo $orginalpaymentDate?>');
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<?php include 'admin_footer.php';?>