<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Agreed Loans
        </h1>
        <div class="pull-right">
            <a href="borroweragreedloan">
                <button type="button" class="btn btn-success pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Agreed Loans</b>
                </button>
            </a>
        </div>
    </section>
    <div class="cls"></div>
    <!-- Main content -->
    <section class="content">
        <div class="cls"></div>

        <div class="row customFormQ">
            <div class="cls"></div>
            <div class="pull-right">
                <div class="row">
                    <div class="col-md-12">
                        <div class="agreedloansPagination">
                            <ul class="pagination bootpag">
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title pull-left">Agreed Loans</h3>
                        <button class="btn btn-xs btn-primary pull-right applevelEsignCheck"
                            style="margin-right:20px!important" onclick="AppLevelDoneMobile();"><i
                                class="fa fa-angle-double-right"></i> Application Level Esign</button>
                    </div>
                    <div class="box-body">
                        <table id="applicationLevalEsignTable" class="table table-bordered table-hover">
                            <thead class="mobileDiv_4">
                                <tr>
                                    <th>Lender Name</th>
                                    <th>Loan ID</th>
                                    <th>Application ID</th>
                                    <th>Loan Amount</th>
                                    <th>EMI/Interest Type</th>
                                    <th>ROI</th>
                                    <th>Duration</th>
                                    <th>Loan Status</th>
                                    <th>Download Agreement</th>
                                    <!-- <th>E-Sign</th> -->
                                </tr>
                            </thead>

                            <tbody id="displayoffers" class="displayoffers mobileDiv_3">
                                <tr id="displayNoRecords" class="displayRequests" style="display:none">
                                    <td colspan="8">No Offers found!</td>

                                </tr>


                            </tbody>
                            </tfoot>
                        </table>



                        <div class="applicationLevelEsign"
                            style="justify-content: center; align-items: center; border: 10px solid grey; height: 30%; width: 100%; font-size:14px; margin: 10px; display: none;">
                            <center>

                                <h4 style="font-weight: bold; font-family: monospace; align-self:center;">Kindly
                                    Activate Application Level Enach </h4>
                            </center>


                        </div>


                        <div class="applicationLevelEsignnullcheck"
                            style="justify-content: center; align-items: center; border: 10px solid grey; height: 30%; width: 100%; font-size:14px; margin: 10px 20px 10px 10px; display: none;">
                            <center>

                                <h4 style="font-weight: bold; font-family: monospace; align-self:center;">No data Found
                                </h4>
                            </center>


                        </div>
                    </div>

                </div>


            </div>

        </div>
    </section>
    <script id="displayallRequests" type="text/template">
        {{#data}}
  <tr class="divBlock_Mob_001">
    <td>

    <span class="lable_mobileDiv">name</span>
    {{lenderUser.firstName}} {{lenderUser.lastName}}


  </td>
    <td>
   <span class="lable_mobileDiv">Loan Id</span>

      <a href="javascript:void(0)">{{loanId}}</a>
  
    </td>
    <td>
 <span class="lable_mobileDiv">Loan Request</span>
    {{loanRequest}}
  </td>
    <td>
 <span class="lable_mobileDiv">loan Request Amount</span>
    {{loanRequestAmount}}

  </td>
    <td>
 <span class="lable_mobileDiv">Repayment Method</span>

    {{repaymentMethod}}</td>
    <td>{{rateOfInterest}}<span style='display:none' class="loanTypeisI loanTypeis{{borrowerUser.commentsRequestDto.durationType}} "> % Per Month</span>
    <span style='display:none' class="loanTypeisDays loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Per Day</span>
  </td>
  <td>
 <span class="lable_mobileDiv">Duration</span>

    {{duration}}
    <span style='display:none' class="loanTypeisI loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Months</span>
    <span style='display:none' class="loanTypeisDays loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Days</span>
    
  </td>
  <td>

 <span class="lable_mobileDiv">loanStatus</span>
  {{loanStatus}}</td>
  <td align="center" class="actions_borrowings">
     <span class="lable_mobileDiv">Download</span>
    <a href='javascript:void(0)'  data-reqid = "{{loanRequestId}}" class="downloadAgreeent">
      <i class="fa fa-download" aria-hidden="true"  class="downloadAgreeent" onclick="downloadAgreement({{loanRequestId}})"></i>
    </a>
  </td>
 <!--  <td>
     <span class="lable_mobileDiv">Esign </span>
    <button type="button" class="btn btn-warning pull-left btn-xs" onclick="esignWithMobile({{loanRequestId}})"><i class="fa fa-angle-double-right" data-reqid = "{{loanRequestId}}"></i><b>E-sign with Mobile</b></button>
  </td> -->
</tr>
{{/data}}
</script>
    <div class="modal modal-success fade" id="modal-agreement">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Thanks!</h4>
                </div>
                <div class="modal-body">
                    <p>you have successfully completed the Esign.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal modal-danger fade" id="modal-agreement-already">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">OOPS!</h4>
                </div>
                <div class="modal-body">
                    <p>Something went wrong, Try again.</p>
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
<div class="modal modal-info fade" id="modal-mobile-otp">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Please enter OTP</h4>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control loanRequestId" style="display: none;" />
                <input type="text" class="form-control otpValue" placeholder="Enter OTP" id="otp" name="otp" value="">
                <div class="displayOTPError error" style="display:
      none;">Please enter valid OTP.</div>
                <div class="form-group">
                    <label class="checkbox-inline"><input type="checkbox" name="agreeCheckBox" id="agreeCheckBox"
                            class="agreeCheckBox" required="required"> I accept the <a
                            href="https://oxyloans.com/terms-and-conditions/" target="_blank">Terms of Use</a> &amp; <a
                            href="#">Privacy Policy</a></label>
                </div>

                <div class="displayOTPTermsError error" style="display: none;">Please agree to the terms and conditions.
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" onclick="submiteSignOTP();">Submit</button>
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-info fade" id="modal-mobile-otp-ApplicationLevel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Please enter OTP</h4>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control loanRequestId" style="display: none;" />
                <input type="text" class="form-control" placeholder="Enter OTP" id="appLevelotp" name="otp" value="">
                <div class="displayOTPError error" style="display:
      none;">Please enter valid OTP.</div>
                <div class="form-group">
                    <label class="checkbox-inline"><input type="checkbox" name="agreeCheckBox" id="AppagreeCheckBox"
                            class="AppagreeCheckBox" required="required"> I accept the <a
                            href="https://oxyloans.com/terms-and-conditions/" target="_blank">Terms of Use</a> &amp; <a
                            href="#">Privacy Policy</a></label>
                </div>

                <div class="displayOTPTermsError error" style="display: none;">Please agree to the terms and conditions.
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left"
                    onclick="AppLevelsubmitOTPeSign();">Submit</button>
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div id="quaggaModal" class="qmodel">
    <div id="quaggaModelContent" class="qmodel-content"></div>
</div>
<div class="modal modal-warning fade" id="modal-loanNotAppoved">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">OOPS!</h4>
            </div>
            <div class="modal-body">
                <p>Your Loan Is Not Approved.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.content -->
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
$("#modal-checkEsign,#modal-checkEnach").modal("hide");
loadNewAgreedloans();
</script>
<style type="text/css">
span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisDays.loanTypeisDays {
    display: inline !important;
}

span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisI.loanTypeisI,
span.loanTypeisI.loanTypeis {
    display: inline !important;
}

span.loanTypeisI.loanTypeisDays {
    display: none !important;
}

span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisDays.loanTypeis {
    display: none !important;
}

span.loanTypeisDays.loanTypeisMonths {
    display: none !important;
}
</style>
<?php include 'footer.php';?>