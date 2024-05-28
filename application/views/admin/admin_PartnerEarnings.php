<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <left>
            <h3>
                My Earnings through Invite
            </h3>
        </left>
        <div class="row">

            <input type="hidden" name="reflender" id="l_partnerUtm" value="">
            <input type="hidden" name="nrirefLinkU" id="nR_partnerUtm" value="">
            <input type="hidden" name="borrowerRefLinkU" id="b_partnerUtm" value="">


            <div class="pull-right classcopyrefLink">
                <input type="text" id="refLinkU" style="display: none;" value="<?php echo $_SERVER['REQUEST_URI'];?>" />
                <button onclick="copyLenderrrefLink('#l_partnerUtm');" class="btn btn-success btn-ref btn-md"
                    data-toggle="tooltip" title="Share this link" data-placement="left"><img
                        src="<?php echo base_url(); ?>/assets/images/indiaflag.png" alt="India flag"
                        class="flagimageforRef"> Invite a Lender <i class="fa fa-user-o fa_copyRefLink"
                        aria-hidden="true"></i></button>
            </div>
            <div class="pull-right classcopyrefLink">
                <input type="text" id="nrirefLinkU" style="display:none;"
                    value="<?php echo $_SERVER['REQUEST_URI']; ?>" />


            </div>
            <div class="pull-right classcopyrefLink">
                <input type="text" id="borrowerRefLinkU" style="display: none;"
                    value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                <button onclick="copyBorrowerrefLink('#b_partnerUtm');" class="btn btn-warning btn-ref-borrower"
                    data-toggle="tooltip" title="Share This link" data-placement="bottom">Invite a Borrower <i
                        class="fa fa-clipboard fa_copyRefLink" aria-hidden="true"></i></button>

            </div>

        </div>

    </section>
    <div class="cls"></div>
    </br>
    </br>
    <!-- Main content -->
    <section class="content">



        <div class="cls"></div>

        <div class="row customFormQ showEarnamountStatus">
            <div class="cls"></div>
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="pull-right">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="acceptedPagination pull-right">
                                        <ul class="pagination bootpag">
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="pull-left col-md-12">
                            <div class="col-md-5 pull-left">
                                <p class="download_Text">To view complete data of transactions,
                                    </br> please download your statement here
                                </p>
                            </div>
                            <div class="col-md-3 pull-left">
                                <button class="btn btn-danger btn-lg btn4ReferralPayment pull-right"
                                    onclick="downloadreferrencePaymentStatus('');" data-toggle="tooltip"
                                    title="Download Referral Amount Statement" data-placement="right" target="_blank"><i
                                        class="fa fa-download" aria-hidden="true"></i> Download Statement</button>

                            </div>
                        </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="select_Box pull-right mobile_Select">
                            <p class="earn_Text pull-left text-bold">Please select Earned status to </br>view paid or
                                unpaid referral amount </p>
                            <select class="form-select myformSelcInvestments myEarningStatus" id="myformSelcInvestments"
                                aria-label="Default select example">
                                <option value="" selected>--Earned Status --</option>
                                <option value="Paid">PAID</option>
                                <option value="Unpaid">UNPAID</option>
                                <option value="">BOTH</option>
                            </select>
                        </div></br></br></br>
                        <div class="col-md-3 pull-left mobile_Select_div">
                            <p class="text-bold">Total Earnings : INR <span class="totalEarning">0</span></p>
                        </div>
                        <div class="col-md-3 pull-left mobile_Select_div">
                            <p class="text-bold pull-right">Paid Earnings : INR <span class="paidEarning">0</span></p>
                        </div>
                        <div class="col-md-3 pull-right mobile_Select_div">
                            <p class="text-bold">Unpaid Earnings : INR <span class="unpaidEarning">0</span></p>
                        </div>
                    </div>

                    <table id="myborrowingsData" class="table table-bordered table-hover">
                        <thead class="mobileDiv_4">
                            <tr id="viewUserQueryStatus">
                                <th>Referee Name</th>
                                <th>Referee Id</th>
                                <th>Earned Amount</th>
                                <th>Payment Status</th>
                                <th>Transferred On</th>



                            </tr>
                        </thead>
                        <tbody id="displaywallettrns" class="displaywallettrns mobileDiv_3">

                            <tr id="noRecordFound" class="noRecordFound">
                                <td colspan="8">No data found!</td>

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
<div class="modal  fade" id="modal-viewEMI">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-9">
                        <h4 class="modal-title">Disbursement Info</h4><br /><b>If you have any queries please write to
                            us
                            <a
                                href="https://oxyloans.com/new/lenderInquiries">https://oxyloans.com/new/lenderInquiries</a></b>
                    </div>
                    <div class="col-xs-3">
                        <div class="acceptedPagination">
                            <ul class="pagination bootpag">
                            </ul>
                        </div>

                    </div>
                    <div class="col-xs-9">
                        <div class="pull-left text-bold">Sum Of Disbursement Amount :
                            <span id="disbursmentAmount">50000</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead class="mobileDiv_4">
                        <tr style="background-color: #B0C4DE; border: 3px solid lightgrey;">
                            <th>Disbursment Date</th>
                            <th>Disbursment Amount </th>
                            <!--    <th>Loan Id</th> -->
                        </tr>
                    </thead>
                    <tbody id="binfo" class="displaywallettrns mobileDiv_3">

                        </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<div class="modal  fade" id="modal-viewPaymentstatus">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-9">
                        <h4 class="modal-title">Payment Status Info</h4><br /><b>If you have any queries please write to
                            us
                            <a
                                href="https://oxyloans.com/new/lenderInquiries">https://oxyloans.com/new/lenderInquiries</a></b>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead class="mobileDiv_4">
                        <tr style="background-color: #B0C4DE; border: 3px solid lightgrey;">
                            <th>S.no</th>
                            <th>Deal Name</th>
                            <th>Participated Amount</th>
                            <th>Participated On</th>
                            <th>Earned Amount</th>
                            <th>Payment Status </th>
                            <th>Transferred On</th>
                        </tr>
                    </thead>
                    <tbody id="lenderpaymentinfo" class="mobileDiv_3">

                        <tr id="displayNoRecords" class="displayRequests ">
                            <td colspan="8">No data found!</td>
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

<!-- /.content-wrapper -->
<script id="borrowersinfo" type="text/template">
    {{#data}}
    <tr class="divBlock_Mob_001">
      <td>
       <td><span class="lable_mobileDiv">Date</span>
      {{disbursmentDate}}</td>
      <td>
        <td><span class="lable_mobileDiv">Amount</span>
      {{disbursmentAmount}}</td>
    </tr>
    {{/data}}
    </script>
<script id="lpaymentstatus" type="text/template">
    {{#data}}
     <tr class="divBlock_Mob_001">
      <td>
      <td><span class="lable_mobileDiv">sNo</span>
      {{sNo}}</td>
      <td>
      <td><span class="lable_mobileDiv">dealName</span>
      {{dealName}}</td>
      <td>
      <td><span class="lable_mobileDiv">Amount</span>
      {{participatedAmount}}</td>
      <td>
       <span class="lable_mobileDiv">participatedOn</span>
       {{participatedOn}}</td>
      <td>{{amount}}</td>
      
      <td>
        <span class="lable_mobileDiv">status</span>
      {{paymentStatus}}</td>
      <td>
      <span class="lable_mobileDiv">transferredOn</span>

      {{transferredOn}}</td>
      <!--   <td>LR{{refereeId}}</td> -->
    </tr>
    {{/data}}
    </script>
<script id="wallettransactiondetails" type="text/template">
    {{#data}}
    <tr class="divBlock_Mob_001">
      
      <td>

<span class="lable_mobileDiv">userName</span>

      {{userName}}</td>
      <td>
<span class="lable_mobileDiv">refereeNewId</span>


      {{refereeNewId}}</td>
      <td>
<span class="lable_mobileDiv">amount</span>


      {{amount}}</td>
      <td>
<span class="lable_mobileDiv">status</span>


      {{paymentStatus}}</td>
      <td>

<span class="lable_mobileDiv">transferredOn</span>

      {{transferredOn}}</td>
    </tr>
    {{/data}}
    </script>
<script type="text/javascript">
$(document).ready(function() {
    referralBonusAmountBasedONStatus('');
    loadUtm();


});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>