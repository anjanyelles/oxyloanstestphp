<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <left>
            <h1>
                My Earnings Month Wise
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
                        <div class="div">
                            <div class="row">
                                  <div class="col-md-6 pull-left">
                                    <div class="">
                                        <h5 class="text-bold"><span class="referalEarningMonth"> Current Month</span> paid amount :INR  <span class="monthErningPaidAmount">0</span></h5>
                                    </div>

                                </div>
                                <div class="col-md-6 pull-right">
                                    <div class="acceptedPagination pull-right">
                                        <ul class="pagination bootpag">
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="col-md-12 row">
                        <div class="select_Box col-md-3">
                             <select class="form-control cmsmonth" name="transmonth" id="referralEarnigMonth">
                    <option value=""> Select The Month</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>

                </select>
                    
                        </div>

                          <div class="select_Box col-md-3">
                    <select class="form-control cmsYear" name="transyear" id="referalEarningYear">
                     <option value="">Select The Year</option>
                     <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                  
                </select>
                    
                        </div>

                          <div class="select_Box col-md-3">
                           <button class="btn btn-info col-12" id="search_monthly_Earning" onclick="referralEarningMonthWise('search')">Search</button>
                    
                        </div>
 </div>

                    </br></br></br>


                    
                    </div>

                    <table id="myborrowingsData" class="table table-bordered table-hover">
                        <thead class="mobileDiv_4">
                            <tr id="viewUserQueryStatus">
                                <th>Referrer Name</th>
                                <th>Referrer Id</th>
                                <th>Earned Amount</th>
                                <th>Payment Status</th>
                                <th>Transferred On</th>
                                <th>Remarks</th>
                                <th>Break Up</th>
                            </tr>
                        </thead>
                    <tbody id="displayReferalEarningTable" class="displayoffers mobileDiv_3">
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
                                href="lenderInquiries">Click Here</a></b>
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

<div class="modal  fade" id="modal-viewPaymentstatus-subpayment-referral">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-9">
                        <h4 class="modal-title">Breakup View</h4><br /><b>If you have any queries please write to
                            us
                            <a
                                href="lenderInquiries">Click Here</a></b>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr style="background-color: #B0C4DE; border: 3px solid lightgrey;">
                           
                            <th>refereeId</th>
                            <th>userName</th>
                            <th>transferredOn</th>
                            <th>paymentStatus</th>
                            <th>amount </th>
                            <th>remarks</th>
                        </tr>
                    </thead>
                    <tbody id="lenderpaymentinfosubamount">

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


<script id="monthwiseEarningSubScript" type="text/template">
    {{#data}}
    <tr class="divBlock_Mob_001">
      <td>

       <span class="lable_mobileDiv">refereeId</span>

      LR{{refereeId}}</td>
      <td>
        <span class="lable_mobileDiv">userName</span>

      {{userName}}</td>
      <td>

         <span class="lable_mobileDiv">transferredOn</span>

      {{transferredOn}}</td>
          <td>
            <span class="lable_mobileDiv">paymentStatus</span>


       {{paymentStatus}}</td>
      <td>
       <span class="lable_mobileDiv">amount</span>

      {{amount}}</td>
      
      <td>

       <span class="lable_mobileDiv">remarks</span>

      {{remarks}}</td>
      
    </tr>
    {{/data}}
    </script>
<script id="referalEarningMonthWiseScript" type="text/template">
    {{#data}}
    <tr class="divBlock_Mob_001">
      
       <td>

      <span class="lable_mobileDiv">userName</span>
      {{userName}}</td>
      <td>
      <span class="lable_mobileDiv">refereeNewId</span>

      LR {{referrerId}}</td>
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

      <td>

   <button class="btn btn-info btn-xs" onClick="myreferalMonthWiseBreakUp();">View Break up</button>


  </td>
    </tr>



    {{/data}}
    </script>
<script type="text/javascript">
$(document).ready(function() {
    // refereeRegisteredInfo();
     window.onload=getUserDetails();
    referralEarningMonthWise();

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