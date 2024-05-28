<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Seekers asked Questions
        </h1>
        <div class="row mobileDiv_5">
            <div class="pull-right classcopyrefLink">
                <input type="text" id="refLinkU" style="display: none;" value="<?php echo $_SERVER['REQUEST_URI'];?>" />
                <button onclick="copyrefLink('#refLinkU');" class="btn btn-success    btn-ref btn-md"
                    data-toggle="tooltip" title="Share this link" data-placement="left"><img
                        src="<?php echo base_url(); ?>/assets/images/indiaflag.png" alt="India flag"
                        class="flagimageforRef"> Invite a Lender <i class="fa fa-user-o fa_copyRefLink"
                        aria-hidden="true"></i></button>
            </div>

            <div class="pull-right classcopyrefLink">
                <input type="text" id="nrirefLinkU" style="display:none;"
                    value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                <button onclick="copyNrirefLink('#nrirefLinkU');" class="btn btn-primary btn-md  btn-ref-nri"
                    data-toggle="tooltip" title="Share This link" data-placement="right"><i class="fa fa-plane nriimage"
                        aria-hidden="true"></i> Invite an NRI</button>

            </div>

            <div class="pull-right classcopyrefLink">
                <input type="text" id="borrowerRefLinkU" style="display: none;"
                    value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                <button onclick="copyBorrowerrefLink('#borrowerRefLinkU');" class="btn btn-warning btn-ref-borrower"
                    data-toggle="tooltip" title="Share This link" data-placement="bottom">Invite a Borrower <i
                        class="fa fa-clipboard fa_copyRefLink" aria-hidden="true"></i></button>

            </div>

            <div class="pull-right dowloadReferralStatus classcopyrefLink">
                <button onclick="downloadReferralAmountStatement();" class="btn btn-danger btn-md" data-toggle="tooltip"
                    title="Download Referral Amount Statement" data-placement="right" target="_blank"><i
                        class="fa fa-download" aria-hidden="true"></i> Referral Amount Statement</button>
            </div>

        </div>

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
                        <input type="hideen" name="seekerscontent" id="inviteSeekersContent" style="display: none;"
                            value="Thanks for approaching me, I have Reviewed Your Profile Very Happy to invite you to My network,
              I am Investing multiples of INR 50,000 in numerous deals, distributing risk, and maximizing monthly profit. I am earning a profit of on average 24% per year, an average 2% Pay-out. My friends from MNCs like TCS, Microsoft, IBM, Cap Gemini, Yash, etc have started their investment journey with small amounts (like 50k) and currently investing in lakhs. If this interests you, if you also want to earn like them then OxyLoans is the connection.">

                        <table id="expertsData" class="table table-bordered table-hover">
                            <thead class="mobileDiv_4">
                                <tr>
                                    <th>Name</th>
                                    <th>MobileNumber</th>
                                    <th>Email</th>
                                    <th>Question</th>
                                    <th>Invite</th>


                                </tr>
                            </thead>
                            <tbody id="seekersData" class="displaywallettrns  mobileDiv_3">
                                <tr id="displayNoRecords" class="displayRequests">
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

<div class="modal modal-success fade" id="modal-alreadyDoneSendOffers">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text1">Thanks for approaching me, I have Reviewed Your Profile Very Happy to Invite you to My
                    network</p>
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
<div class="modal modal-warning fade" id="modal-alreadySentRequest">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text1">Thank you for referring.</p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>

    </div>

</div>


<script id="seekerInfo" type="text/template">
    {{#data}}
  <tr class="divBlock_Mob_001">
    <td>
  <span class="lable_mobileDiv"> Name</span>
    {{name}}</td>
    <td>
  <span class="lable_mobileDiv">mobileNumber
  </span>

    {{mobileNumber}}</td>
    <td>
  <span class="lable_mobileDiv">email</span>

    {{email}}</td>
    <td>

  <span class="lable_mobileDiv">content And Faqs</span>
    {{contentAndFaqs}}</td>
    <td>
      <button class="btn btn-info btn-md invite-btn" onclick="inviteseekers('{{email}}','{{mobileNumber}}','{{name}}','{{id}}');">Invite</button>
    </td>
    
  </tr>
  {{/data}}
  </script>
<script type="text/javascript">
$(document).ready(function() {
    getadviceSeekers();
});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'footer.php';?>