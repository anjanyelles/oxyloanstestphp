<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Agreed Loans
        </h1>
        <div class="pull-left">
            <small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>&nbsp;Dashboard</a></li>
                    <li class="active">Agreed Loans</li>
                </ol>
            </small>
        </div>
        <div class="pull-right">


            <a href="lenderagreedloans">
                <button type="button" class="btn btn-success pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Agreed Loans</b>
                </button>
            </a>

            <a href="lenderrejectedrequests">
                <button type="button" class="btn btn-warning pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Rejected Offers</b>
                </button>
            </a>

            <a href="lenderacceptedrequests">
                <button type="button" class="btn btn-primary pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Accepted Offers</b>
                </button>
            </a>

            <a href="lenderresponsestoMyrequests?appNumber=787" class="viewLendersOffers">
                <button type="button" class="btn btn-info pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Responses to my offer</b>
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
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Agreed Loans</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Borrower Name</th>
                                    <th>Loan ID</th>
                                    <th>Application ID</th>
                                    <th>Loan Amount</th>
                                    <th>EMI Type</th>
                                    <th>ROI</th>
                                    <th>Duration</th>
                                    <th>Loan Status</th>
                                    <th>Agreement</th>
                                    <th>E-Sign</th>
                                </tr>
                            </thead>

                            <tbody id="displayoffers" class="displayoffers">
                                <tr id="displayNoRecords" class="displayRequests">
                                    <td colspan="8">No Offers found!</td>
                                </tr>




                            </tbody>


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


    <script id="displayallRequests" type="text/template">
        {{#data}}

                   <tr>
                     <td>{{borrowerUser.firstName}} {{borrowerUser.lastName}} </td> 
                     <td>{{loanId}}</td>
                      <td>{{loanRequest}}</td>
                      <td>{{loanRequestAmount}}</td>
                      <td>{{repaymentMethod}}</td>
                      <td>{{rateOfInterest}}

                        <span style='display:none' class="loanTypeisI loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> % PA</span>
                        <span style='display:none' class="loanTypeisDays loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Per Day</span>
                        
                      <td>{{duration}} 
                          <span style='display:none' class="loanTypeisI loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Months</span>

                          <span style='display:none' class="loanTypeisDays loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Days</span>

                      </td>
                      <td>{{loanStatus}}</td>
                      <td align="center" class="actions_borrowings">
                        <a href='javascript:void(0)'  data-reqid = "{{loanRequestId}}" class="downloadAgreeent">
                         <i class="fa fa-download" aria-hidden="true" class="downloadAgreeent" onclick="downloadAgreement({{loanRequestId}})"></i>
                        </a>
                      </td>
                      <td>
                        
                        <button type="button" class="btn btn-warning pull-left btn-xs" onclick="esignDoneMobile({{loanRequestId}})"><i class="fa fa-angle-double-right" data-reqid = "{{loanRequestId}}" ></i> <b>E-sign with Mobile</b></button>
                        <!--
                          <br/>
                          (OR)
                          <br/>

                        <button type="button" class="btn btn-success pull-left btn-xs" onclick="esignDone({{loanRequestId}})"><i class="fa fa-angle-double-right" data-reqid = "{{loanRequestId}}" ></i> <b>E-sign AADHAR</b></button>
                      -->
                        
                        
                      </td>
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
                    <p>Your Agreement is downloaded.</p>
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

<div class="modal modal-success fade" id="modal-agreement">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">YUP!</h4>
            </div>
            <div class="modal-body">
                <p>E-Sign is Done.</p>
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
                <p>E-Sign is already done.</p>
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
                <p>Esign is successfully completed.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
                <input type="text" value="" class="form-control otpValue" placeholder="Enter OTP" id="otpValue"
                    name="otpValue">
                <div class="displayOTPError  error" style="display: none;">Please enter valid OTP.</div>
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
                <button type="button" class="btn btn-outline pull-left" onclick="submitOTPeSign();">Submit</button>

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
                <p>Admin is reviewing this loan application.It might take a while....</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
loadAgreedloans();
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