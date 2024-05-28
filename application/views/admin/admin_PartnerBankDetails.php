<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Bank Details
        </h1>
        <div class="pull-left">
            <small>
                <ol class="breadcrumb">
                    <li><a href="PartnerVerification"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active"><a href="partnerListUsers"><i class="fa fa-user-plus"></i> Registered Users</a>
                    </li>
                </ol>
            </small>
        </div>
    </section>

    <!-- Main content -->


    <section class="content mobile_Res_web">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <!-- maincontent starts -->
                    <div class="main-cont borrowerprofile">
                        <div class="container">
                            <div class="middle-block">
                                <div class="form-block1 block-loan ">
                                    <form id="borrowermobileSection" autocomplete="off" method="post">
                                        <!--  Auto Invest form Starts -->
                                        <div class="step1">
                                            <div class="panel-body " id="userKYCUpload" enctype="multipart/form-data">

                                                <!----------------- table content starts-------------->

                                                <div class="row mobile_Bank_res">
                                                    <div class="col-lg-12">


                                                        <table
                                                            class="table table-striped table-bordered payment_status ">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col"><b>Bank Details</b></th>
                                                                    <td></td>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <!----------------->
                                                                <tr>
                                                                    <th>Account No :<em class="mandatory">*</em></th>
                                                                    <td>
                                                                        <div class="fld-block account_form">
                                                                            <input type="text" data-toggle="tooltip"
                                                                                title="900-good"
                                                                                placeholder="Account number "
                                                                                id="oxyaccountno">
                                                                            <span class="error accountnoError"
                                                                                style="display: none;">Please enter
                                                                                Account No</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <!----------------->
                                                                <tr>
                                                                    <th>Confirm Account No :<em class="mandatory">*</em>
                                                                    </th>
                                                                    <td>
                                                                        <div class="fld-block account_form">
                                                                            <span
                                                                                class="displayoxyscore udisplaysecautoinvest"></span>
                                                                            <input type="text" data-toggle="tooltip"
                                                                                title="900-good"
                                                                                placeholder="confirm account number"
                                                                                id="oxyconfirmaccountno">
                                                                            <span class="error oxyconfirmaccountnoError"
                                                                                style="display: none;">Please review
                                                                                Confirm Account No </span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <!----------------->

                                                                <tr>
                                                                    <th>IFSC Code:<em class="mandatory">*</em></th>
                                                                    <td>
                                                                        <div class="fld-block account_form">
                                                                            <span
                                                                                class="displayoxyscore udisplaysecautoinvest"></span>
                                                                            <input type="text" data-toggle="tooltip"
                                                                                title="900-good" placeholder="Ifsc code"
                                                                                id="oxybankifscCode">
                                                                            <span class="error IFSCCodeerror"
                                                                                style="display: none;">Please enter IFSC
                                                                                Code.</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <!----------------->

                                                                <tr class="bank_username" style="display: none;">
                                                                    <th>Name:<em class="mandatory">*</em></th>
                                                                    <td>
                                                                        <div class="fld-block account_form">
                                                                            <span
                                                                                class="displayoxyscore udisplaysecautoinvest"></span>
                                                                            <input type="text" data-toggle="tooltip"
                                                                                title="900-good"
                                                                                placeholder="Enter  your name"
                                                                                id="bankUsername">
                                                                            <span class="error errorName"
                                                                                style="display: none;">Please enter User
                                                                                name.</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <!----------------->
                                                                <tr class="bank_Name" style="display: none;">
                                                                    <th>Bank Name:<em class="mandatory">*</em></th>
                                                                    <td>
                                                                        <div class="fld-block account_form">
                                                                            <span
                                                                                class="displayoxyscore udisplaysecautoinvest"></span>
                                                                            <input type="text" data-toggle="tooltip"
                                                                                title="900-good"
                                                                                placeholder="Please enter bank name"
                                                                                id="bankname">
                                                                            <span class="error errorbankName"
                                                                                style="display: none;">Please enter bank
                                                                                name.</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <!----------------->
                                                                <tr class="bank_Branch" style="display: none;">
                                                                    <th>Bank Branch:<em class="mandatory">*</em></th>
                                                                    <td>
                                                                        <div class="fld-block account_form">
                                                                            <span
                                                                                class="displayoxyscore udisplaysecautoinvest"></span>
                                                                            <input type="text" data-toggle="tooltip"
                                                                                title="900-good"
                                                                                placeholder="Please Enter Bank Branch"
                                                                                id="bankBranch">
                                                                            <span class="error errorbankBranch"
                                                                                style="display: none;">Please enter
                                                                                branch name.</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <!----------------->
                                                                <tr class="bank_city" style="display: none;">
                                                                    <th>Bank City:<em class="mandatory">*</em></th>
                                                                    <td>
                                                                        <div class="fld-block account_form">
                                                                            <span
                                                                                class="displayoxyscore udisplaysecautoinvest"></span>
                                                                            <input type="text" data-toggle="tooltip"
                                                                                title="900-good"
                                                                                placeholder="Please enter Bank city"
                                                                                id="bankcity">
                                                                            <span class="error errorbankCity"
                                                                                style="display: none;">Please enter bank
                                                                                city.</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <!----------------->


                                                                <tr id="hideautoesign" style="display: none;">
                                                                    <th>Auto e-sign Status</th>
                                                                    <td>
                                                                        <div class="fld-block account_form">
                                                                            <input type="hidden" id="displayautoesign">

                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <!----------------->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button type="button"
                                                        class="btn btn-primary pull-left autoinvest-btn"
                                                        id="user-bank-verify" style="margin-left:50px"><i
                                                            class="fa fa-bank"></i> Verify</button>

                                                    <button type="button"
                                                        class="btn btn-danger pull-left deactivate-btn"
                                                        id="user-bank-save" style="display: none;"> Save</button>


                                                    <div class="clear"></div>
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

<div class="modal modal-success fade" id="modal-partnerBankDetails">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>you have successfully updated the bank details</p>
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

.payment_status {
    width: 90%;
    margin: 0 auto 10px;
}

.table-bordered {
    border: 1px solid #f4f4f4;
}

.panel-body {
    margin-left: 0px;
}

.panel-body {
    /* padding: 15px; */
}

.step1 {
    padding: 0px 35px 16px;
    width: 100%;
    transition: 0.25s ease-in-out;
}

.form-block1 {
    display: block;
    opacity: 1;
    visibility: visible;
    margin: 0 auto 59px;
    padding: 0px 0 0;
    width: 630px;
    border: 0px solid #149bd7;
    border-radius: 8px;
    background: #fff;
}

.middle-block {
    display: block;
    margin: 0;
    padding: 0;
    width: 650px;
    position: relative;
    left: 0;
}

.borrowerprofile {
    top: 0;
    transform: none;
}


.main-cont {
    display: block;
    margin: 0;
    padding: 0;
    position: relative;
}
</style>

<script type="text/javascript">
window.onload = getBankDetails();
$(document).ready(function() {
    $('#oxyconfirmaccountno').on("cut copy paste", function(e) {
        e.preventDefault();
    });
});
</script>


<?php include 'admin_footer.php';?>