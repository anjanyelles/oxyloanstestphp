<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$Id =  isset($_GET['id']) ? $_GET['id'] : '0';
$editConfirmation =  isset($_GET['edit']);

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Create UTM for Partners
        </h1>

    </section>
    <section>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                    </div>
                    <div class="main-cont borrowerbeneficiaries">
                        <div class="middle-block">
                            <p align="left" style="margin-left:20px;">
                                <button type="button" class="btn btn-info btn-lg" id="partner-add-btn">
                                    <span class="fa fa-handshake-o"></span>create Partner</button>
                                <a href="viewPartnerAndDealer">
                                    <button type="button" class="btn btn-success btn-lg viewPartnerDealers"
                                        id="view_Partner&dealer">
                                        <span class="fa fa-eye"></span> View Partners</button></a>

                                <input type="hidden" name="partnerUrl" id="partnerCopyURL">
                                <button onclick="copyBorrowerrefLink('#partnerCopyURL');"
                                    class="btn btn-warning btn-lg btn-partner-borrower" data-toggle="tooltip"
                                    title="Copy partner Link" data-placement="bottom" style="display:none">Copy
                                    URL</button>
                            </p>
                            <div class="col-xs-1"></div>
                            <div class="form-block1 block-loan" style="margin-left:15px;margin-right:10px;">
                                <div class="panel panel-default" id="borrowerpartnerdetailspanel" style="display:none;">
                                    <div class="panel-heading" id="headingOne">
                                        <h4 class="panel-title">
                                            <span id="partnertitle"></span>
                                        </h4>
                                    </div>
                                    <!--panel-heading-->
                                    <div class="panel-body">
                                        <form autocomplete="off" id="partnerdetailsSection">
                                            <div class="form-group row">
                                                <label for="partner name" class="col-sm-3 col-form-label">Partner
                                                    Name<em class="error">*</em>:</label>
                                                <div class="col-sm-3">

                                                    <input type="text" name="partnerutmname"
                                                        class="form-control partnerutmnameValue"
                                                        placeholder="Enter UTM Partner  Name" id="utmSourceNameValue"
                                                        data validation="utmSourceNameValue">
                                                    <span class="error utmSourceNamenameError"
                                                        style="display: none;">Please enter PARTNER Source Name</span>
                                                </div>

                                                <label for="beneficiary name" class="col-sm-3 col-form-label">User
                                                    Type<em class="error">*</em>:</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control userTypename" name="userTypename"
                                                        id="userTypename" data validation="userTypename">
                                                        <option value="">-- Choose User Type --</option>
                                                        <option value="SALARIED">SALARIED</option>
                                                        <option value="SELFEMPLOYED">SELFEMPLOYED</option>
                                                    </select>

                                                    <input type="hidden" name="hiddenforedit" id="partnerEditing"
                                                        value="<?php  echo $Id ?>" />
                                                    <span class="error userTypenameError" style="display: none;">Please
                                                        choose User Type</span>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="beneficiaryemail"
                                                    class="col-sm-3 col-form-label">Duration<em
                                                        class="error">*</em>:</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control partnerdurationValue" name="duration"
                                                        id="partnerduration" data validation="duration">
                                                        <option value="">-- Choose Loan Duration --</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>


                                                    </select>
                                                    <span class="error partnerDurationError"
                                                        style="display: none;">Please Choose Duration</span>
                                                </div>

                                                <label for="account number" class="col-sm-3 col-form-label">Loan
                                                    Amount<em class="error">*</em>:</label>
                                                <div class="col-sm-3">

                                                    <select class="form-control partnerdurationValue" name="duration"
                                                        id="partnerLoanAMOUNT" data validation="duration">
                                                        <option value="">-- Choose Loan Amount --</option>
                                                        <option value="1">1*Salary</option>
                                                        <option value="1.5">1.5*Salary</option>
                                                        <option value="2">2*Salary</option>
                                                        <option value="2.5">2.5*Salary</option>
                                                    </select>
                                                    <span class="error partnerloansamount" style="display: none;">Please
                                                        Choose Loan Amount</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="account number" class="col-sm-3 col-form-label">Lender
                                                    Processing Fee<em class="error">*</em>:</label>
                                                <div class="col-sm-3">

                                                    <input type="text" name="fee"
                                                        class="form-control lenderproceesingfee"
                                                        placeholder="Enter lender processing fee" id="processing fee"
                                                        data validation="">

                                                    <span class="error lenderProcessingfee"
                                                        style="display: none;">Please Enter Lender Processing Fee</span>
                                                </div>

                                                <label for="account number" class="col-sm-3 col-form-label">Borrower
                                                    Processing Fee<em class="error">*</em>:</label>
                                                <div class="col-sm-3">

                                                    <input type="text" name="fee" class="form-control bproceesingfee"
                                                        placeholder="Enter Borrower processing fee" id="processing fee"
                                                        data validation="">
                                                    <span class="error borrowerProcessingfee"
                                                        style="display: none;">Please borrower Enter Processing
                                                        Fee</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="beneficiary ifsc code"
                                                    class="col-sm-3 col-form-label">Repayment Type<em
                                                        class="error">*</em>:</label>
                                                <div class="col-sm-3">

                                                    <input type="radio" name="partnercibilRoi" id="partnerRoipI"
                                                        value="PI">
                                                    <label class="repayment-partner-roi">PI</label>
                                                    <input type="radio" name="partnercibilRoi" style="margin-left:10px;"
                                                        id="partner_i" value="I">
                                                    <label class="whatsApp-campagin-broadcast"
                                                        style="margin-right:10px;">INTEREST</label>

                                                    <input type="radio" name="partnercibilRoi" style="margin-left:10px;"
                                                        id="partner_i" value="BOTH">
                                                    <label class="whatsApp-campagin-broadcast"
                                                        style="margin-right:1px;">Both</label></br>

                                                    <span class="error partnerRepayment" style="display: none;">Please
                                                        Choose Repayment Method</span>
                                                </div>

                                                <label for="beneficiary ifsc code"
                                                    class="col-sm-3 col-form-label">Referral check<em
                                                        class="error">*</em>:</label>
                                                <div class="col-sm-3">

                                                    <input type="radio" name="partnerReferralcheck" id="partnerRoipr"
                                                        value="YES">
                                                    <label class="repayment-partner-roi">YES</label>
                                                    <input type="radio" name="partnerReferralcheck"
                                                        style="margin-left:40px;" id="partner_r" value="NO">
                                                    <label class="whatsApp-campagin-broadcast"
                                                        style="margin-right:50px;">NO</label>




                                                    <span class="error partnerreferralcheckerror"
                                                        style="display: none;">Please Choose Referral Method</span>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="partner_roi bank name"
                                                    class="col-sm-3 col-form-label">ROI-Cibil(400-500)<em
                                                        class="error">*</em>:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name="partnerRoi"
                                                        class="form-control partnerutmnameValue"
                                                        placeholder="Enter RoI for cibil(400-500)" id="partnerCibilroi1"
                                                        data validation="partnerCibilroi1">


                                                    <span class="error roicbil400error" style="display: none;">Please
                                                        Enter ROI</span>
                                                </div>
                                                <label for="partnerCibilroi2 bank name"
                                                    class="col-sm-3 col-form-label">ROI-Cibil(500-600)<em
                                                        class="error">*</em>:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name="partnerCibilroi2"
                                                        class="form-control partnerCibilroi2"
                                                        placeholder="Enter RoI for cibil(500-600)" id="partnerCibilroi2"
                                                        data validation="partnerCibilroi1">

                                                    <span class="error roicbil500Error" style="display: none;">Please
                                                        Enter ROI</span>
                                                </div>


                                            </div>

                                            <div class="form-group row">
                                                <label for="partnerCibilroi3 bank name"
                                                    class="col-sm-3 col-form-label">ROI-Cibil(600-700)<em
                                                        class="error">*</em>:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name="partnerCibilroi3"
                                                        class="form-control partnerCibilroi3"
                                                        placeholder="Enter RoI for cibil(600-700)" id="partnerCibilroi3"
                                                        data validation="partnerCibilroi3">

                                                    <span class="error roicbil600" style="display: none;">Please Enter
                                                        ROI</span>
                                                </div>


                                                <label for="partnerCibilroi4 bank name"
                                                    class="col-sm-3 col-form-label">ROI-Cibil(700-800)<em
                                                        class="error">*</em>:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name="partnerCibilroi4"
                                                        class="form-control partnerCibilroi4"
                                                        placeholder="Enter RoI for cibil(700-900)" id="partnerCibilroi4"
                                                        data validation="partnerCibilroi4">

                                                    <span class="error roicbil700" style="display: none;">Please Enter
                                                        ROI </span>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="partnerCibilroi5 bank name"
                                                    class="col-sm-3 col-form-label">ROI-Cibil(800-900)<em
                                                        class="error">*</em>:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name="partnerCibilroi4"
                                                        class="form-control partnerCibilroi4"
                                                        placeholder="Enter RoI for cibil(800-900)" id="partnerCibilroi5"
                                                        data validation="partnerCibilroi5">

                                                    <span class="error roicbil800" style="display: none;">Please Enter
                                                        ROI </span>
                                                </div>


                                                <label for="partnerCibilroi5 bank name"
                                                    class="col-sm-3 col-form-label">Lender Choice<em
                                                        class="error">*</em>:</label>
                                                <div class="col-sm-3">

                                                    <select class="form-control lenderchoicePartner"
                                                        name="lenderchoicePartner" id="lenderchoicePartner" data
                                                        validation="lenderchoicePartner">
                                                        <option value="">-- Choose Lender choice --</option>
                                                        <option value="LENDERSFROMPARTNER">Only Partner Lenders</option>
                                                        <option value="LENDERSFROMOXYLOANS">OxyLoans Lenders</option>

                                                    </select>


                                                    <span class="error partnerlenderChoose" data-status=""
                                                        style="display: none;">Please Choose Lender Choice </span>
                                                </div>
                                            </div>

                                            <div class="form-group row oxypartnerChoice" style="display:none;">
                                                <label for="partnerCibilroi5 bank name"
                                                    class="col-sm-3 col-form-label">Deal ID<em
                                                        class="error">*</em>:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name="partnerchoiceDeal"
                                                        class="form-control partnerchoiceDeal"
                                                        placeholder="Enter The Deal ID" id="partnerchoiceDeal" data
                                                        validation="partnerchoiceDeal">

                                                    <span class="error partnerChoosenDealId"
                                                        style="display: none;">Please Enter Deal Id </span>
                                                </div>

                                            </div>

                                            <p align="center" id="forAdd">
                                                <button type="button" class="btn btn-info btn-sm"
                                                    id="partnerSubmission-submit-flow"><span
                                                        class="editnameofUtm">Generate Utm</span></button>
                                            </p>

                                        </form>
                                    </div>
                                </div>
                                <!--panel-default-->
                            </div>
                            <!--form-block1 block-loan-->
                        </div>
                        <!--middle-block-->
                    </div>
                    <!--main-cont-->
    </section>

</div>
<!--content-wrapper-->
<div class="modal modal-success fade" id="modal-addbeneficiary">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p id="addSuccessMsg" style="display:none;">Beneficiary details are successfully Added.</p>
                <p id="editSuccessMsg" style="display:none;">Beneficiary details are successfully Updated.</p>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                </a>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div>
<div class="modal modal-danger fade" id="modal-beneficiryalreadyadded">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">!Oops</h4>
            </div>
            <div class="modal-body">
                <p id="beneficiaryalreadyadded"></p>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                </a>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div>
<div class="modal modal-success fade" id="modal-generatedpasswordPartner">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks</h4>
            </div>
            <div class="modal-body">
                <p>You have successfully created the partner. Copy the partner url and share it with them. </p>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                </a>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div>

<?php include 'admin_footer.php';?>

<script type="text/javascript">
$(document).ready(function() {

    window.load = fetchUtmPartnerDetails("<?php echo $Id?>", "<?php echo $editConfirmation?>");

});



function copyBorrowerrefLink(element) {

    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).val()).select();
    document.execCommand("copy");
    $temp.remove();
    $('.btn-partner-borrower').html('Copied!');

}
</script>

<script>
$(document).ready(function() {
    $("#lenderchoicePartner").change(function() {
        var lenderchoice = $("#lenderchoicePartner").val();

        if (lenderchoice == "LENDERSFROMOXYLOANS") {
            $(".oxypartnerChoice").show();
        } else {
            $(".oxypartnerChoice").hide();
        }
    });
});
</script>