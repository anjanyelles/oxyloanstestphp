<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <left>
            <h1>
                My Earnings Through Invite Friend
            </h1>
        </left>
    
        <div class="row">

            <div class="pull-right classcopyrefLink">

                <button class="btn btn-danger" data-toggle="tooltip" title="Faqs About Earnings"
                    data-placement="bottom"><a href="https://sites.google.com/view/interestearningsfaqs/home"
                        target="_blank" style="color:white;">Faqs </a><i class="fa fa-angle-double-right"
                        aria-hidden="true"></i></button>

            </div>

            <div class="pull-right classcopyrefLink">
                <input type="text" id="refLinkU" style="display: none;" value="<?php echo $_SERVER['REQUEST_URI'];?>" />
                <button onclick="copyrefLink('#refLinkU');" class="btn btn-success btn-ref btn-md" data-toggle="tooltip"
                    title="Share this link" data-placement="left"><img
                        src="<?php echo base_url(); ?>/assets/images/indiaflag.png" alt="India flag"
                        class="flagimageforRef"> Invite a Lender <i class="fa fa-user-o fa_copyRefLink"
                        aria-hidden="true"></i></button>



            </div>
            <div class="pull-right classcopyrefLink">
                <input type="text" id="nrirefLinkU" style="display:none;"
                    value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                <button onclick="copyNrirefLink('#nrirefLinkU');" class="btn btn-primary btn-md  btn-ref-nri"
                    data-toggle="tooltip" title="Share This link" data-placement="right"><i class="fa fa-plane nriimage"
                        aria-hidden="true"></i>Invite an NRI</button>

            </div>
            <div class="pull-right classcopyrefLink">
                <input type="text" id="borrowerRefLinkU" style="display: none;"
                    value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                <button onclick="copyBorrowerrefLink('#borrowerRefLinkU');" class="btn btn-warning btn-ref-borrower"
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


                            <div class="pull-left reff">
                            <div class="info">
                                <code><strong>Note:</strong></code><br />
                                <strong>Invited:</strong> You have invited but your friend is not yet registered.<br />
                                <strong>Registered:</strong> Your friend has registered and reviewing Lending
                                opportunities.<br />
                                <strong>Lent Money:</strong> Your friend has particiated in Lending and You started
                                earning
                            </div>
                        </div>


              

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="col-md-12 row">

                        <div class="col-md-8 pull-left row">
                                 <div class="col-md-12 pull-left row">
                                <button class="btn btn-danger btn-lg"
                                    onclick="downloadreferrencePaymentStatus('');" data-toggle="tooltip"
                                    title="Download Referral Amount Statement" data-placement="right" target="_blank"><i
                                        class="fa fa-download" aria-hidden="true"></i> Download Statement</button>

                                 <a href="referalEaringsMonthWise" > <button class="btn btn-info btn-lg btn-primary" ><i
                                        class="fa fa-calendar" aria-hidden="true"></i> Month Wise Earning</button></a>

                            </div>



                        </div>




                        <div class="select_Box pull-right col-md-4">
                            <select class="form-select myformSelcInvestments myEarningStatus pull-right col-md-6" id="myformSelcInvestments"
                                aria-label="Default select example">
                                <option value="" selected>--Choose Earned Status --</option>
                                <option value="Paid">PAID</option>
                                <option value="Unpaid">UNPAID</option>
                                <option value="">BOTH</option>
                            </select>
                        </div>
 </div>

                    </br></br></br>


                        <div class="col-md-3 pull-left mobile_Select_div">
                            <p class="text-bold">Total Earnings : INR <span class="totalEarning">10000</span></p>
                        </div>
                        <div class="col-md-3 pull-left mobile_Select_div">
                            <p class="text-bold pull-right">Paid Earnings : INR <span class="paidEarning">10000</span>
                            </p>
                        </div>
                        <div class="col-md-3 pull-right mobile_Select_divt">
                            <p class="text-bold">Unpaid Earnings : INR <span class="unpaidEarning">10000</span></p>
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
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody id="displaywallettrns" class="displayoffers mobileDiv_3">
                            <tr class="noRecordFound" id="noRecordFound" style="display:none;">
                                <td colspan="12">No data found </td>
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
                    <tbody id="binfo" class="displayoffers mobileDiv_3">

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
                    <thead>
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
                    <tbody id="lenderpaymentinfo">

                        </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>




<div class="modal  fade" id="modal-myearningunPaidStatement">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
             

             <h4 class="modal-title" style="margin-left:14px"> Unpaid Amount Information</h4>
                <div class="modal-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="mobileDiv_4">
                        <tr style="background-color: #B0C4DE; border: 1px solid lightgrey;">
                                <th>Participated Amount</th>
                                <th>Participated Date</th>
                                <th>Earned Amount</th>
                                 <th>Returned Date</th>
                                 <th>Remarks</th>

                            </tr>
                        </thead>
                        <tbody id="earningUnpaidStatementTable" class="mobileDiv_3">
                            <tr id="norecodeOfEarning" style="display:none;">
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
<script id="earningunpadScript" type="text/template">
    {{#data}}
    <tr class="divBlock_Mob_001">
       <td>
      <span class="lable_mobileDiv">Participated Amount</span>
      {{participatedAmount}}</td>
      <td>
       <span class="lable_mobileDiv">Participated Date</span>
       {{participatedDate}}</td>
        <td>
       <span class="lable_mobileDiv">Earned Amount</span>
      {{bonusAmount}}</td>
        <td>
       <span class="lable_mobileDiv">Returned Date</span>
      {{returnedDate}}</td>
        <td>
       <span class="lable_mobileDiv">Remarks</span>
      {{remarks}}</td>
    </tr>
    {{/data}}
    </script>

<script id="borrowersinfo" type="text/template">
    {{#data}}
    <tr class="divBlock_Mob_001">
       <td>
      <span class="lable_mobileDiv">disbursmentDate</span>

      {{disbursmentDate}}</td>
      <td>
       <span class="lable_mobileDiv">disbursmentAmount</span>

      {{disbursmentAmount}}</td>
    </tr>
    {{/data}}
    </script>
<script id="lpaymentstatus" type="text/template">
    {{#data}}
    <tr class="divBlock_Mob_001">
      <td>

       <span class="lable_mobileDiv">sNo</span>

      {{sNo}}</td>
      <td>
        <span class="lable_mobileDiv">dealName</span>

      {{dealName}}</td>
      <td>

         <span class="lable_mobileDiv">participatedAmount</span>

      {{participatedAmount}}</td>
          <td>
            <span class="lable_mobileDiv">participatedOn</span>


       {{participatedOn}}</td>
      <td>
       <span class="lable_mobileDiv">amount</span>

      {{amount}}</td>
      
      <td>

       <span class="lable_mobileDiv">paymentStatus</span>

      {{paymentStatus}}</td>
      <td>
      <span class="lable_mobileDiv">transferredOn</span>

      {{transferredOn}}</td>

      
 
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

       <span class="lable_mobileDiv">paymentStatus</span>
         {{paymentStatus}} 

         <div class="earning_Amount_{{paymentStatus}}" style="display:none"><button class="btn btn-xs btn-info" onclick="earningUnpaidBreakup('{{refereeId}}','{{dealId}}');">Break up</button></div>


  </td>
      <td> 
      <span class="lable_mobileDiv">transferredOn</span>
      {{transferredOn}}</td>

      <td class="col-md-3">
      <span class="lable_mobileDiv">Remarks</span>
      

      {{#remarks}}
     {{remarks}}
    {{/remarks}}
    {{^remarks}}
     No Remarks 
   {{/remarks}}

     



    </td>
    </tr>


    
    {{/data}}
    </script>
<script type="text/javascript">
$(document).ready(function() {
    // refereeRegisteredInfo();
     window.onload=getUserDetails();
    referralBonusAmountBasedONStatus('');

});
</script>

<script type="text/javascript">
function copyToClipboard(text, el) {



    var copyTest = document.queryCommandSupported('copy');
    var elOriginalText = el.attr('data-original-title');



    if (copyTest === true) {
        var copyTextArea = document.createElement("textarea");

        copyTextArea.value = text;
        document.body.appendChild(copyTextArea);
        copyTextArea.select();


        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'Copied!' : 'Whoops, not copied!';
            el.attr('data-original-title', msg).tooltip('show');

            // document.getElementById('elid').setAttribute('title', 'Copied');


        } catch (err) {
            console.log('Oops, unable to copy');
        }
        document.body.removeChild(copyTextArea);
        el.attr('data-original-title', elOriginalText);
    } else {
        // Fallback if browser doesn't support .execCommand('copy')
        window.prompt("Copy to clipboard: Ctrl+C or Command+C, Enter", text);
    }
}
$(document).ready(function() {

    $('.js-tooltip').tooltip();
    $('.js-copy').click(function() {
        var text = $(this).attr('data-copy');
        var el = $(this);
        alert(el);
        copyToClipboard(text, el);
    });
});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'footer.php';?>