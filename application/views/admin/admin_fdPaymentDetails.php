<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>


<div class="content-wrapper">
    <section class="content-header">
        <h1 style="margin-left:20px" class="text-bold">
            <left>FD Payment Details</left> <span class="error errorborrowerid" style="display:none"> Enter the borrower
                Id</span>
        </h1>
    </section>

    <span class="error errorborrowerid" style="display:none"> Enter the borrower Id</span>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header"></div>
                    <div class="box-body studentloandiv">
                        <div class="row col-xs-12 fetchblock">
                            <div class="fetchBorrowerData fdpaymentDetails row">
                                <label for="fetchBorrower" class="form-label col-md-4">Borrower Id :<em
                                        class="error">*</em> </label>
                                <input type="text" class="form-control col-md-8 pull-right" name="fetchBorrower"
                                    id="fetechUserid" placeholder="Enter the Borrower Id" />
                                <span class="error errorfdpaymentborrowerid" style="display:none;"> Enter the borrower
                                    Id</span>
                                <button class="btn btn-primary fetchBorrowerDataBased" type="button"
                                    onclick="fetchFDBorrowerPersonalDetails();">Fetch</button>
                            </div>


                        </div>

                        <div class="body-paymentDetails row col-xs-12">
                            <div class="input-box col-md-8 pull-left">
                                <div class="row col-xs-12">
                                    <label class="col-xs-3">FD Value : <em class="error">*</em> </label>
                                    <div class="col-xs-8">
                                        <input type="text" name="" class=" form-control paymentfdamount"
                                            placeholder="Enter The Fd value">
                                        <span class="error paymentFdValue" style="display:none">Enter The Amount</span>
                                    </div>

                                </div>

                                <div class="row col-xs-12">
                                    <label class="col-xs-3">RoI : <em class="error">*</em></label>
                                    <div class="col-md-8">
                                        <input type="text" name="" class=" form-control fdpaymetRoi"
                                            placeholder="Enter The RoI">
                                        <span class="error paymentFdRoi" style="display:none">Enter The FD ROI </span>
                                    </div>

                                </div>

                                <div class="row col-xs-12">
                                    <label class="col-xs-3">HDFC Payment :<em class="error">*</em></label>
                                    <div class="col-xs-8">
                                        <input type="text" name="" class="form-control fdhdfcpayment"
                                            placeholder="Enter The HDFC Paid Amount">
                                        <span class="error paymentHdfc" style="display:none">Enter The HDFC
                                            Payment</span>
                                    </div>
                                </div>



                                <div class="row col-xs-12">
                                    <label class="col-xs-3">ICICI Payment :<em class="error">*</em> </label>
                                    <div class="col-xs-8">
                                        <input type="text" name="" class="form-control icicipayment"
                                            placeholder="Enter The ICICI Paid Amount">
                                        <span class="error paymenticici" style="display:none">Enter The ICIC
                                            Payment</span>
                                    </div>
                                </div>

                                <div class="row col-xs-12">
                                    <span class="error hfcscreenshotpayment"
                                        style="display:none;margin-left: 10px;">Upload The Hdfc screen shot</span>
                                    <label class="col-xs-3">HDFC Screen Shot:<em class="error">*</em> </label>
                                    <div class="col-xs-8 uploadscreenshot">
                                        <input type="file" name="screenshot" class="hdfcscreenshot" id="hdfcscreenshot">
                                    </div>

                                </div>



                                <div class="row col-xs-12">
                                    <span class="error iciciscreenshotpayment"
                                        style="display:none; margin-left:10px">Upload The Icici screen shot</span>
                                    <label class="col-xs-3">ICICI Screen Shot :<em class="error">*</em> </label>
                                    <div class="col-xs-8 uploadscreenshot">
                                        <input type="file" name="screenshot" class="iciciscreenshot"
                                            id="iciciscreenshot">
                                    </div>


                                </div>


                                <div class="row col-xs-12">
                                    <label class="col-xs-3"> </label>
                                    <div class="col-xs-9">
                                        <button class="btn btn-primary pull-right" onclick="saveFDPaymentHistory();">
                                            Save FD Payment Data </button>
                                    </div>
                                </div>
                            </div>

                            <div class="interest-info col-md-4 pull-left">
                                <div class="container interestCard">
                                    <h4 class="text-bold">Interest Info</h4>
                                    <div class="card">
                                        <div class="card-header text-bold text-upppercase"> Calculation Based On
                                            Days
                                        </div>
                                        <div class="card-body">
                                            <div class="interestDays">
                                                <div> 15 days Interest : INR <span
                                                        class="interestForfiftenDays">0</span>
                                                </div>
                                                <div> 30 days Interest : INR <span
                                                        class="interestForthirtyDays">0</span>
                                                </div>
                                                <div> 45 days Interest : INR <span
                                                        class="interestForfourtyDays">0</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>










                    </div>


                </div>
            </div>
        </div>
    </section>

</div>





<div class="modal  fade" id="modal-calroi-sheet">
    <div class="modal-dialog">
        <div class="modal-content offer_popup">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Move to Cms </h4>
            </div>
            <div class="offer_popup_cont clearfix">

                <div class="offer_popup_field clearfix">
                    <label>Deal Id<em class="mandatory">*</em></label>
                    <div class="fld-block">
                        <input type="text" class="dealId" id="loanOfferDeal" placeholder="Enter the disburse deal">
                        <span class="error loanDealError" style="display: none;">Please enter Deal Id.</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="offer_popup_field clearfix">
                    <label>Fee Percentage:</label>
                    <div class="fld-block">
                        <select class="form-control disbursefee" id="disbursefeeValue">
                            <option value="">-- Choose Percentage --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>

                        <div class="clear"></div>
                        <span class="error roierrorcms" style="display: none;">Please select fee percentage.</span>
                    </div>


                    <div class="clear"></div>
                </div>
                <div class="offer_popup_field clearfix">
                    <label>Borrower fee Status<em class="mandatory">*</em></label>
                    <div class="fld-block">
                        <select class="form-control " id="borrowerfeeStatus">
                            <option value="">-- Choose Status --</option>
                            <option value="true">true</option>
                            <option value="false">false</option>

                        </select>
                        <span class="error roidisError" style="display: none;">Please select fee status.</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm  savedisbursedDeal" data-loanid=""
                        onclick="disbursesToCms()">Move to cms</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<div class="modal  fade modal-success" id="modal-fdpaymentDataUploaded">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body loansUserSuccessMessage">
                <p class="info-message">Payment Data was successfully Updated</p>

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
<!-- /.modal-dialog -->


<script id="displayborrowerloanOfferUsers" type="text/template">
    {{#data}}
      <tr>
        <td>BR{{borrowerId}}</td>
             <td>{{userNameAccoringToBank}}</td>
                 <td>{{accountNumber}}</td>
                     <td>{{ifsc}}</td>
                     <td>{{loanAmount}}</td>
                      <td><button class="btn btn-primary btn-xs" onclick="editLoanBorrowerProcess('{{borrowerId}}','{{userNameAccoringToBank}}','{{accountNumber}}','{{ifsc}}','{{loanAmount}}');">Edit</button></button></td>
     
      </tr>
      {{/data}}
      </script>

<script type="text/javascript">
// calculateInterest(2000000, 2);
</script>


<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>