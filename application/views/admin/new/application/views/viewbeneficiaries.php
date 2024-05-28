<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            View Beneficiaries
        </h1>
        <div class="pull-left" style="display: none;">
            <small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>OxyTrade Details</a></li>
                    <li class="">OxyTrade Details</li>
                    <!--  <li class="active">View Beneficiaries</li> -->
                    <li class="active">Transfer To Beneficiary</li>
                </ol>
            </small>
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
                        <div class="acceptedPagination">
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
                        <h3 class="box-title"></h3>
                        <div class="pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myBeneficiariesData" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>SNO</th>
                                    <th>Name</th>
                                    <th>Account Number</th>
                                    <th>Amount to be Transfered</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="displayBeneficiariesToTransfer" class="displayBeneficiariesToTransfer">
                                <tr id="beneficiaryRecords" class="displayBeneficiariesToTransfer">
                                    <td colspan="4">No Beneficiaries found!</td>
                                </tr>

                                </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- <p align="right" id="beneficiaryConfirmation">  
            <button type="button" class="btn btn-info btn-sm confirmBeneficiryAmountDetails" id="beneficiary-confirm-btn" >Confirm
            </button>                              
          </p> -->
                <!-- form start -->

            </div>
            <!-- /.box -->
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal modal-danger fade" id="modal-loanamountvalidation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">!Oops</h4>
            </div>
            <div class="modal-body">
                <p id="loanamountvalidationmsg">Loan Offered Amount should be equal to total trasfer amount of
                    beneficiaries</p>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                </a>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div>

<div class="modal modal-success fade" id="modal-transferTobeneficiary">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Amount Transfer To Beneficiary Successfully</p>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                </a>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div>

<div class="modal modal-danger fade" id="modal-beneficiaryAmountErrorModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">!Oops</h4>
            </div>
            <div class="modal-body">
                <p id="beneficiaryamounterrormessage"></p>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                </a>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div>


<script id="allBenificiaries" type="text/template">
    {{#data}}
                <tr>
                  <td><input type="radio" name="beneficiaryRadio" id="{{beneficiaryAccountNumber}}" onclick="setSelectedBeneficiary(this)"></td>
                  <td>{{sno}}</td>
                  <td>{{beneficiaryName}}</td>                  
                  <td>{{beneficiaryAccountNumber}}</td>
                  <td><input class="text-fld1 " type="text" name="firstname" placeholder="Enter Amount" id="beneficiaryamount_text_{{beneficiaryAccountNumber}}" maxlength=7 onkeypress="allownumberonly(event,this)" disabled="disabled">
                    <span class="error" id="beneficiaryAmountError{{beneficiaryAccountNumber}}" style="display: none;">Please Enter Amount</span></td>
                  <td><button type="button" class="btn btn-info btn-sm confirmTfrToBeneficiryAmtDetails" id="beneficiaryamount_button_{{beneficiaryAccountNumber}}" disabled="disabled"
                  onclick="transferToBeneficiryFromBorrower(this)">Confirm
                  </button>                         
                  </td>            
                </tr>
            {{/data}}
  </script>


<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".loadingSec").show();
    loadBeneficiariesForBorrower();
});
</script>
<?php include 'footer.php';?>