<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="pull-left col-md-2">
            <h4 class="text-bold">
                Registered Borrowers
            </h4>
        </div>
        <div class="pull-right col-md-10 mytopPa mobile_View_div">
            <button class=" btn btn-info btn-ref-lender" onclick="copyLenderrrefLink('#lenderRefLinkU');">
                Copy Lender Refferal Link
            </button>
            <button class="btn btn-warning btn-ref-borrower" onclick="copyBorrowerrefLink('#borrowerRefLinkU');">
                Copy Borrower Refferal Link
            </button>
            <input type="text" class="l_partnerUtm" id="lenderRefLinkU" value="" style="display: none;" />
            <input type="text" class="b_partnerUtm" id="borrowerRefLinkU" value="" style="display: none;" />

            <input type="text" class="l_partnerRegister" id="partnerRegister_LinkU" value="" style="display: none;" />

            <input type="text" class="b_partnerRegister" id="partnerbRegister_LinkU" value="" style="display: none;" />

            <button class="btn btn-md btn-primary wellcomenote" onclick="wellcomenote();">Welcome Note</button>

            <button class="btn btn-md   btn-success btn-reg-partner mobile_View_Hide"
                onclick="partner_register('#partnerRegister_LinkU');">Register as Lender</button>


            <button class="btn btn-md  btn-primary btn-regb-partner mobile_View_Hide"
                onclick="partner_bregister('#partnerbRegister_LinkU');">Register as Borrower</button>
        </div>
    </section>
    <div class="cls"></div>
    <section class="content"></br></br>
        <div class="row customFormQ">
            <div class="cls"></div>
            <div class="col-md-12">
                <div class="box box-secondary">
                    <div class="box-header MobDiv_05">
                        Registered Borrowers
                    </div>
                    <div class="box-body editlendergroup">
                        </br></br>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="mobileDiv_4">
                                <tr id="example">
                                    <th>name</th>
                                    <th>userId</th>
                                    <th>mobileNumber</th>
                                    <th>email</th>
                                    <th>Modify</th>

                                </tr>
                            </thead>
                            <tbody id="loadDealsInfo" class="displayoffers mobileDiv_3">
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
<div class="modal  fade" id="update-paretner-details-mobile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Your Number & Email</h4>
            </div>
            <div class="modal-body">
                <label>phone Number</label>
                <input type="text" name="whastappnumber" id="partnerPhone" class="form-control partnerPhone"></br>
                <label>Email</label>
                <input type="text" name="whastappnumber" id="partnerEmail" class="form-control partnerEmail">
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-info" onclick="partnerUpdateNumberEmail();">Submit</button>
                    <button type="button" class="btn btn-default btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-success fade" id="modal-sucessfully-updated">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Your are successfully updated the Email& Mobile</br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>
<div class="modal modal-info fade" id="message informastion">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">info!</h4>
            </div>
            <div class="modal-body">
                <p>Welcome to oxyloans. Thank you for registering with us.
                    Our partnership will enable your users to Lend/Invest money and borrow money.
                    Enable your user to register as oxyloans lender/investor with the below link:
                    http://182.18.139.198/new/register_lender?utm=NewTest
                    Enable your user to register as oxyloans borrower with the below link:
                    http://182.18.139.198/new/register_borrower?utm=NewTest</br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>
<script id="displayInterestScript" type="text/template">
    {{#data}}
<tr class="divBlock_Mob_001">
  <td>
     <span class="lable_mobileDiv">name</span>
  {{name}}
</td>
  <td>
 <span class="lable_mobileDiv">userId</span>
  {{userId}}
</td>
  <td>
    <span class="lable_mobileDiv">mobileNumber</span>
    {{mobileNumber}}
  </td>
  <td>
 <span class="lable_mobileDiv">email</span>
    {{email}}
  </td>

   <td>
 <span class="lable_mobileDiv">email</span>
   <button class="btn btn-xs btn-success">Approve</button>
   <button class="btn btn-xs btn-warning">Reject</button>
   <button class="btn btn-xs btn-primary">Not now</button>
  </td>
</tr>
{{/data}}
</script>
<div class="modal modal-info fade" id="modal-welcomeWindow">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Welcome to OxyLoans!</h4>
            </div>
            <div class="modal-body">
                <b>Thank you for registering with us..</b><br /><br />
                Our partnership enables your users to Lend/Invest and borrow money. <br /><br />Enable your user to
                register as oxyloans lender/investor through the below link
                https://www.oxyloans.com/new/register_lender?utm=<span class="partnerUtm"></span> <br /><br />Enable
                your user to register as oxyloans borrower through the below link:
                https://www.oxyloans.com/new/register_borrower?utm=<span class="partnerUtm"></span>
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
<script type="text/javascript">
window.onload = getListOfPartnersUsers();
window.onload = updateEmailMobile();
</script>
<?php include 'admin_footer.php';?>