<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>
<?php
   $urlfromBroweser = $_SERVER['REQUEST_URI'];
  //echo $urlfromBroweser;
  $requestidFromClick =  $_GET['loanId'];
  //$receivedEmailToken = $_GET['emailToken'];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Create a loan request
            <span class="requestidFromClick hide"><?php echo $requestidFromClick; ?></span>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Payments</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">

                        <div class="col-xs-1"></div>
                        <form autocomplete="off" id="raisealoanrequest">
                            <div class="col-xs-10">

                                <div class="form-group row">
                                    <label for="loanRequestAmount " class="col-sm-2 col-form-label">Loan Request
                                        Amount</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="loanRequestAmount"
                                            class="form-control loanRequestAmount" placeholder="Enter your Amount"
                                            id="loanRequestAmount" data validation="loanRequestAmount"
                                            required="required">
                                        <span class="error loanRequestAmountError" style="display: none;">Please enter
                                            loan amount value</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rateOfInterest " class="col-sm-2 col-form-label">Rate of Interest per
                                        Annum</label>
                                    <div class="col-sm-10">
                                        <!--  <input  type="text" class="form-control rateOfInterest" name="rateOfInterest" placeholder="Enter your rateOfInterest" id="rateOfInterest" data validation="rateOfInterest">-->
                                        <select class="form-control rateOfInterest" name="rateOfInterest"
                                            id="rateOfInterest" data validation="rateOfInterest">
                                            <option value="">-- Choose ROI --</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="36">36</option>
                                            <option value="48">48</option>
                                        </select>

                                        <span class="error rateOfInterestError" style="display: none;">Please choose
                                            Rate of Interest</span>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="duration" class="col-sm-2 col-form-label">Loan Duration (in
                                        months)</label>
                                    <div class="col-sm-10">
                                        <!--<input type="text" class="form-control durationValue" placeholder="Enter your duration time" name="duration" id="duration" data validation="duration"> -->

                                        <select class="form-control durationValue" name="duration" id="duration" data
                                            validation="duration">
                                            <option value="">-- Choose Loan Duration --</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="7">7</option>
                                            <option value="6">6</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                        </select>

                                        <span class="error durationError" style="display: none;">Please choose
                                            duration</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="repaymentMethod" class="col-sm-2 col-form-label">Preferred Re-Payment
                                        Method</label>
                                    <div class="col-sm-10">

                                        <label>
                                            <input type="radio" id="principleMethod" name="repaymentMethod"
                                                value="PI" />
                                            Pay (P + I) monthly by Flat EMI method)<span class="displayEMIvalue"
                                                style="display: none;">Your EMI is <span
                                                    class="emiValueIs">0</span></span>
                                        </label>
                                        <label>
                                            <input type="radio" id="interestMethod" name="repaymentMethod" value="I" />
                                            Pay Interest (I) monthly and Principal (P) at end (Applicable for mortgage
                                            loans only.)
                                            <span class="displayEMIvalue" style="display: none;">Your Interest is <span
                                                    class="payonlyint">0</span></span>
                                        </label>


                                        <span class="error repaymentMethodError" style="display: none;">Please choose
                                            repayment method</span>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="loanPurpose" class="col-sm-2 col-form-label">Loan Purpose</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control  loanPurpose"
                                            placeholder="Enter your loanPurpose" name="loanPurpose" id="loanPurpose"
                                            data validation="loanPurpose">
                                        <span class="error loanPurposeError" style="display: none;">Please choose loan
                                            purpose </span>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="expectedDate" class="col-sm-2 col-form-label">Expected Date </label>
                                    <div class="col-sm-10">

                                        <div class="input-group date" data-date-format="dd/mm/yyyy">
                                            <input type="text" class="form-control expectedDateValue" id="expectedDate"
                                                placeholder="dd/mm/yyyy" name="expectedDate" data
                                                validation="expectedDate">
                                            <div class="input-group-addon">
                                                <span class=" glyphicon glyphicon-calendar"></span>
                                            </div>

                                        </div>
                                        <span class="error expectedDateError" style="display: none;">Please choose date
                                            when you're expected loan</span>
                                    </div>
                                </div>



                                <center> <button type="button" class="btn btn-lg btn-primary"
                                        id="createloan-submit-btn">Submit</button>

                                </center>

                            </div>
                        </form>
                        <div class="col-xs-1"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal modal-success fade" id="modal-raisealoan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Thanks for submitting the Loan Request. You can check the Lenders response in My Loan Requests. </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php include 'footer.php';?>