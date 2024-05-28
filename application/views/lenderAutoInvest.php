<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Auto Invest
        </h1>
        <div class="pull-left">
            <small>
                <ol class="breadcrumb">
                    <li><a href="idb"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">auto invest</li>
                </ol>
            </small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                    </div>
                    <!-- maincontent starts -->
                    <div class="main-cont borrowerprofile">
                        <div class="container">
                            <div class="note-point-block">
                                <div class="headpoint">
                                    <code class="notePoints">Note :</code>
                                </div>
                                <div class="notepoint-div">
                                    <ul class="list-note-point">
                                        <li>As soon as the deal is launched, the minimum
                                            amount will be participated automatically by the
                                            system on behalf of the lender.</li>
                                        <li>The system will participate only once in a deal
                                            (if auto lending is opted). If the lender wants
                                            to participate more than the min amount, he/she
                                            can log in and participate till the max limit is
                                            reached</li>
                                        <li>Auto lending process chooses lenders based on
                                            their wallet-loaded time. whoever loads their
                                            wallet first will be participated first in the
                                            deal.</li>
                                        <li>If there is no min amount in the wallet
                                            auto-lend cannot be applied.</li>
                                        <li>Lenders can choose auto lending for specific
                                            types of deals or all types of deals also.</li>
                                    </ul>
                                </div>

                            </div>
                            <div class="middle-block">
                                <div class="form-block1 block-loan">
                                    <form id="borrowermobileSection" autocomplete="off" method="post">
                                        <!--  Auto Invest form Starts -->
                                        <div class="step1">
                                            <div class="panel-body " id="userKYCUpload" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class=" col-lg-12">

                                                        <table
                                                            class=" table table-striped table-bordered payment_status">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col"><b>Auto Investment configuration</b>
                                                                    </th>
                                                                    <td></td>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th>User ID:<em class="mandatory">*</em></th>
                                                                    <td>
                                                                        <div class="fld-block account_form">

                                                                            <input type="text" placeholder="User Id"
                                                                                id="udisplayId" disabled>
                                                                            <span class="error oxyscoreError"
                                                                                style="display: none;">Please enter
                                                                                userid.</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <!----------------->
                                                                <tr>
                                                                    <th>Deal Type:<em class="mandatory">*</em></th>
                                                                    <td>
                                                                        <div class="fld-block citydrop">
                                                                            <span
                                                                                class="displaycity udisplaysecautoinvest"></span>
                                                                            <select name="city"
                                                                                id="selctAutoInvestmentDeal"
                                                                                class="form-control">
                                                                                <option value=""> Select Deal Type
                                                                                </option>
                                                                                <option value="NORMAL">STUDENT
                                                                                </option>
                                                                                <option value="ESCROW">ESCROW
                                                                                </option>
                                                                                  <option value="TEST">TEST
                                                                                </option>
                                                                                <option value="BOTH">STUDENT & ESCROW</option>
                                                                                </option>
                                                                            </select>

                                                                            <span class="error autoInvestmentDealError"
                                                                                style="display: none;">Please Select the
                                                                                Deal Type</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <!----------------->
                                                                <tr style="display:none">
                                                                    <th>principal Return :<em class="mandatory">*</em>
                                                                    </th>
                                                                    <td>
                                                                        <div class="fld-block citydrop">
                                                                            <select name="employmentType"
                                                                                id="autoPrincipalType"
                                                                                class="form-control">
                                                                                <option value="">
                                                                                    select principal Returns
                                                                                    Type
                                                                                </option>
                                                                                <!-- <option value="BANKACCOUNT">BANKACCOUNT
                                                                                </option> -->
                                                                                <option value="WALLET" selected>
                                                                                    WALLET</option>

                                                                            </select>

                                                                            <span class="error autoInvestReturnError"
                                                                                style="display: none;">Please select
                                                                                Principal Type</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>







                                                                <tr>
                                                                    <th>ROI Range Per Month:<em class="mandatory">*</em>
                                                                    </th>
                                                                    <td>
                                                                        <div class="fld-block citydrop">
                                                                            <select name="autoRoiRange"
                                                                                id="autoRoiRange" class="form-control">

                                                                                <option value="">
                                                                                    Select ROI Range
                                                                                </option>
                                                                                <option value="1.0-1.5">
                                                                                    1.0 - 1.5
                                                                                </option>
                                                                                <option value="1.5-2">
                                                                                    1.5 - 2.0
                                                                                </option>

                                                                            </select>

                                                                            <span class="error autoRoiRangeError"
                                                                                style="display: none;">please select ROI
                                                                                Range </span>
                                                                        </div>
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <th>Deal Participation Type :<em
                                                                            class="mandatory">*</em>
                                                                    </th>
                                                                    <td>
                                                                        <div class="fld-block citydrop">
                                                                            <select name="autodealParticipationType"
                                                                                id="autodealParticipationType"
                                                                                class="form-control">
                                                                                <option value="">
                                                                                    Select Deal Participationt Type
                                                                                </option>
                                                                                <option value="MONTHLY">
                                                                                    MONTHLY
                                                                                </option>
                                                                                <option value="QUARTELY">
                                                                                    QUAERTERLY
                                                                                </option>
                                                                                <option value="HALFLY">
                                                                                    HALF YEARLY

                                                                                </option>
                                                                                <option value="YEARLY">
                                                                                    YEARLY
                                                                                </option>
                                                                                <option value="ENDOFTHEDEAL">
                                                                                    END OF THEDEAL
                                                                                </option>
                                                                                <option value="ANY">
                                                                                    ANY
                                                                                </option>

                                                                            </select>

                                                                            <span
                                                                                class="error autoDealParticipationError"
                                                                                style="display: none;">Please select
                                                                                participation Type</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>


                                                <div>
                                                    <button type="button"
                                                        class="btn btn-primary pull-right autoinvestment-btn"
                                                        onclick="autoInvestmentSubmit()"> Save</button>
                                                </div>


                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- maincontent ends -->

                </div>
            </div>
        </div>
    </section>
    <!-- container ends -->
</div>
<!-- wrapper ends -->

<div class="modal modal-success fade" id="modal-autoinvestsuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Thank you for choosing Auto Investment.</p>
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
<div class="modal modal-success fade" id="modal-autoinvestUpadate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Thanks for Updating the Auto Investment.</p>
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

<div class="modal modal-info fade" id="modal-deactivateAutoInvest">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p>Your Auto invest deactivated.</p>
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

<div class="modal modal-info fade" id="modal-activateAutoInvest">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p>Your Auto invest activated.</p>
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

<div class="modal modal-warning fade" id="modal-notupdatedanythinginpage">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p>There is no any update in the feilds please update feilds.</p>
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

<!-- SET: SCRIPTS -->

<link rel="stylesheet" href="assets/css/selectize.default.css">
<link rel="stylesheet" href="assets/css/dd.css">
<link rel="stylesheet" href="assets/css/animate.css">
<link rel="stylesheet" href="assets/css/responsive.css">
<link rel="stylesheet" href="assets/css/style.css">


<script type="text/javascript">
loadUserId();
</script>

<style type="text/css">
.st_checkbox {
    float: left;
    margin: 0 10px 0 18px;
    width: 30% !important;
}

.st_checkbox .checkbox {
    padding: 5px 0 0 30px !important;
    width: 100%;
}

.account_form input {
    color: #757070;
}


.activate-btn,
.deactivate-btn,
.edit-autoinvest-btn,
.autoinvest-btn,
.autoinvestUpdate-btn {
    border: none;
    color: white;
    padding: 8px 18px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
    float: right;
    border-radius: 4px;
}

.fld-block {
    display: block;
    margin: 0;
    padding: 0;
    width: 100%;
    float: right;
    position: relative;
}

.fld-block input {
    background: #f9fafd;
    border: 1px solid #dce1ee;
    border-radius: 4px !important;
}

.form-block1 th {
    color: #1c75bc;
}

.form_radio {
    margin: 0px 0px 0px 0px;
}
</style>


<?php include 'footer.php';?>