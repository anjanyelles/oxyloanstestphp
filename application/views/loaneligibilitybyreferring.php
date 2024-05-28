<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <left>
            <h1>
                Loan Eligibility by referring
            </h1>
        </left>
        <div class="row">
            <div class="pull-right classcopyrefLink">
                <input type="text" id="refLinkU" style="display: none;"
                    value="<?php echo $_SERVER['REQUEST_URI']; ?>" />

                <button onclick="copyrefLink('#refLinkU');" class="btn btn-success btn-ref btn-md" data-toggle="tooltip"
                    title="Share this link" data-placement="left"><img
                        src="<?php echo base_url(); ?>/assets/images/indiaflag.png" alt="India flag"
                        class="flagimageforRef"> Invite a Lender <i class="fa fa-user-o fa_copyRefLink"
                        aria-hidden="true"></i></button>
            </div>
            <div class="pull-right classcopyrefLink" style="display: none;">
                <input type="text" id="nrirefLinkU" style="display: none;"
                    value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                <button onclick="copyNrirefLink('#nrirefLinkU');" class="btn btn-primary btn-md  btn-ref-nri"
                    data-toggle="tooltip" title="Share This link" data-placement="right"><i class="fa fa-plane nriimage"
                        aria-hidden="true"></i> Invite an NRI</button>

            </div>
            <div class="pull-right classcopyrefLink">
                <input type="text" id="borrowerRefLinkU" style="display: none;"
                    value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                <button onclick="copyBorrowerrefLink('#borrowerRefLinkU');" class="btn btn-warning btn-ref-borrower"
                    data-toggle="tooltip" title="Share This link" data-placement="bottom">invite a Borrower</button>

            </div>
            <div class="pull-right dowloadReferralStatus" style="display: none;">
                <button onclick="downloadReferralStatus();" class="btn btn-danger btn-md" data-toggle="tooltip"
                    title="Download Referral Status" data-placement="right" target="_blank"><i class="fa fa-download"
                        aria-hidden="true"></i> Referral Status</button>
            </div>
        </div>


        <!--   <div class="pull-right classcopyrefLink">
      <input type="text" id="borrowerRefLinkU"
      value="<?php echo $_SERVER['REQUEST_URI']; ?>"
      />
      <button onclick="copyBorrowerrefLink();" class="btn btn-warning btn-ref-borrower"  data-toggle="tooltip" title="Share This link" data-placement="bottom">Invite a Borrower <i class="fa fa-clipboard fa_copyRefLink" aria-hidden="true"></i></button>
     
    </div> -->


    </section>
    <div class="cls"></div>
    <!-- Main content -->
    <section class="content">



        <div class="cls"></div>

        <div class="row customFormQ">
            <div class="cls"></div>
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="pull-left reff">
                            <div class="info">
                                <code><strong>Loan Eligibility Criteria:</strong></code><br />
                                <ul style="margin:10px">
                                    <li><b>You should prove your monthly salary — upload your salary slip in the
                                            system.</b></li><br />
                                    <li><b> If your salary is INR 24,000 per month and one user registers through your
                                            referral link, then your loan eligibility will be INR 2400
                                            (24,000/10=2400).</b></li><br />

                                    <li><b> If 50 people join logically, your loan eligibility will be 50*2400=INR
                                            1,20000, but we consider your salary i.e., INR 24000 as your maximum loan
                                            eligibility.</b></li>

                                </ul>
                            </div>
                        </div>
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
                        <center>

                            <div class="divLoanEligibilityInfo">

                                <div class="disAmountEligibility">
                                    Your Loan Eligibility is : INR <span class="loanEligilibilityAmount">100</span>
                                </div>
                            </div>
                        </center>
                        <!--  <table id="myborrowingsData" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>MobileNumber</th>
                  <th>Status </th>
                  <th>Referred On</th>
                  
                  
                  <th>Transaction Screen Shot</th>
                  <th>Status</th>  
                </tr>
              </thead>
              <tbody id="disloanEligibilty" class="disloanEligibilty">
                <tr id="disNoRecordloanEligibilty" class="disNoRecordloanEligibilty">
                  <td colspan="8">No User found!</td>
                </tr>
               
                </tfoot>
              </table> -->
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
<script id="displayLoaneligibilitydetails" type="text/template">
    {{#data}}
  <tr>
    <td>{{refereeName}}</td>
    <td>{{refereeEmail}}</td>
    <td>{{refereeMobileNumber}}</td>
    <td>{{status}}</td>
    <td>{{referredOn}}</td>
    
  </tr>
  {{/data}}
  </script>
<script type="text/javascript">
$(document).ready(function() {

    //loadWalletDetails();
    loanEligibilitybyreferring();
});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<?php include 'footer.php';?>