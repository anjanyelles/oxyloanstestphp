<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <left>
            <h4>
                Referral Info
            </h4>
        </left>
        <div class="row">

            <input type="hidden" name="reflender" id="l_partnerUtm" value="">
            <input type="hidden" name="nrirefLinkU" id="nR_partnerUtm" value="">
            <input type="hidden" name="borrowerRefLinkU" id="b_partnerUtm" value="">


            <div class="pull-right classcopyrefLink">
                <input type="text" id="refLinkU" style="display: none;"
                    value="<?php echo $_SERVER['REQUEST_URI']; ?>" />

                <button onclick="copyLenderrrefLink('#l_partnerUtm');" class="btn btn-success btn-ref btn-md"
                    data-toggle="tooltip" title="Share this link" data-placement="left"><img
                        src="<?php echo base_url(); ?>/assets/images/indiaflag.png" alt="India flag"
                        class="flagimageforRef"> Invite a Lender <i class="fa fa-user-o fa_copyRefLink"
                        aria-hidden="true"></i></button>
            </div>
            <div class="pull-right classcopyrefLink">
                <input type="text" id="nrirefLinkU" style="display: none;"
                    value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                <!--      <button onclick="copyNrirefLink('#nR_partnerUtm');" class="btn btn-primary btn-md  btn-ref-nri"  data-toggle="tooltip"title="Share This link" data-placement="right"><i class="fa fa-plane nriimage" aria-hidden="true"></i> Invite an NRI</button> -->

            </div>
            <div class="pull-right classcopyrefLink">
                <input type="text" id="borrowerRefLinkU" style="display: none;"
                    value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                <button onclick="copyBorrowerrefLink('#b_partnerUtm');" class="btn btn-warning btn-ref-borrower"
                    data-toggle="tooltip" title="Share This link" data-placement="bottom">Invite a Borrower <i
                        class="fa fa-clipboard fa_copyRefLink" aria-hidden="true"></i></button>

            </div>
            <div class="pull-right dowloadReferralStatus">
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
                                <code><strong>Note:</strong></code><br />
                                <strong>Invited:</strong> You have invited but your friend is not yet registered.<br />
                                <strong>Registered:</strong> Your friend has registered and reviewing Lending
                                opportunities.<br />
                                <strong>Lent Money:</strong> Your friend has particiated in Lending and You started
                                earning.
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
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead class="mobileDiv_4">
                                <tr>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>MobileNumber</th>
                                    <th>Status </th>
                                    <th>Referred On</th>


                                    <!-- <th>Transaction Screen Shot</th>
                  <th>Status</th>   -->
                                </tr>
                            </thead>
                            <tbody id="displaywallettrns" class="displaywallettrns mobileDiv_3">
                                <tr id="displayNoRecords" class="displayRequests" style="display: none;">
                                    <td colspan="8">No User found!</td>
                                </tr>
                                <!-- <td><a href="lenderAcceptedoffers?appNumber={{loanRequestId}}">{{loanRequest}}</a></td>
                -->
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
<script id="wallettransactiondetails" type="text/template">
    {{#data}}
  <tr class="divBlock_Mob_001">
    <td><span class="lable_mobileDiv">refereeName</span>

    {{refereeName}}</td>
    <td>
<span class="lable_mobileDiv">refereeEmail</span>

    {{refereeEmail}}</td>
    <td>
<span class="lable_mobileDiv">Mobile No</span>
    {{refereeMobileNumber}}</td>
    <td>

<span class="lable_mobileDiv">Status</span>
    {{status}}</td>
    <td>

<span class="lable_mobileDiv">Referred on</span>
    {{referredOn}}</td>
    
  </tr>
  {{/data}}
  </script>
<script type="text/javascript">
$(document).ready(function() {

    //loadWalletDetails();
    loadUtm();
    lenderreferrerinfo();
});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>