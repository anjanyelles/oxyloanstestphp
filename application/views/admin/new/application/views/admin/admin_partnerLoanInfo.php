<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="pull-left col-md-2">
            <h4 class="text-bold">
                Partner Loan info
            </h4>
        </div>
    </section>
    <div class="cls"></div>
    <section class="content"></br></br>
        <div class="row customFormQ">
            <div class="cls"></div>
            <div class="col-md-12">
                <div class="box box-secondary">
                    <div class="box-body editlendergroup">
                        </br></br>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr id="tabletr" class="partnerTable">
                                    <th>So</th>
                                    <th>Name</th>
                                    <th>Merchant Id</th>
                                    <th>Loan Id</th>
                                    <th>ROI</th>
                                    <th>Disbursed Amount</th>
                                    <th>Tenure</th>
                                    <th>Due/ Pending</th>
                                    <th>Future Payments</th>
                                    <th>Loan Status</th>
                                </tr>
                            </thead>
                            <tbody id="loadDealsInfo">
                                <!--  <tr id="displayNoRecords" class="displayRequests" style="display: none;">
                  <td colspan="12">No User found!</td>

                </tr> -->


                                <tr>
                                    <td>1</td>
                                    <td>Livin</td>
                                    <td>Mb345UTY</td>
                                    <td>LN101</td>
                                    <td>3%</td>
                                    <td>100000</td>
                                    <td>12 M</td>
                                    <td>25000/50000</td>
                                    <td>5000/3</td>
                                    <td>Closed</td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Sai</td>
                                    <td>Mb345UTY</td>
                                    <td>LN101</td>
                                    <td>3%</td>
                                    <td>100000</td>
                                    <td>12 M</td>
                                    <td>25000/50000</td>
                                    <td>5000/3</td>
                                    <td>Running</td>

                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Bhargav</td>
                                    <td>Mb345UTY</td>
                                    <td>LN101</td>
                                    <td>3%</td>
                                    <td>100000</td>
                                    <td>12 M</td>
                                    <td>25000/50000</td>
                                    <td>5000/3</td>
                                    <td>Running</td>

                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td>SREEJA</td>
                                    <td>Mb345UTY</td>
                                    <td>LN101</td>
                                    <td>3%</td>
                                    <td>100000</td>
                                    <td>12 M</td>
                                    <td>25000/50000</td>
                                    <td>5000/3</td>
                                    <td>Closed</td>

                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td>NARENDRA</td>
                                    <td>Mb345UTY</td>
                                    <td>LN101</td>
                                    <td>3%</td>
                                    <td>100000</td>
                                    <td>12 M</td>
                                    <td>25000/50000</td>
                                    <td>5000/3</td>
                                    <td>Running</td>

                                </tr>

                                <tr>
                                    <td>6</td>
                                    <td>ARCHANA</td>
                                    <td>Mb345UTY</td>
                                    <td>LN101</td>
                                    <td>3%</td>
                                    <td>100000</td>
                                    <td>12 M</td>
                                    <td>25000/50000</td>
                                    <td>5000/3</td>
                                    <td>Closed</td>

                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>AYANSH</td>
                                    <td>Mb345UTY</td>
                                    <td>LN101</td>
                                    <td>3%</td>
                                    <td>100000</td>
                                    <td>12 M</td>
                                    <td>25000/50000</td>
                                    <td>5000/3</td>
                                    <td>Running</td>

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
<!-- <script id="displayInterestScript" type="text/template">
{{#data}}
<tr>
  <td>{{name}}</td>
  <td>{{userId}}</td>
  <td>
    {{mobileNumber}}
  </td>
  <td>{{email}}
  </td>
</tr>
{{/data}}
</script> -->
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
<!-- <script type="text/javascript">
window.onload = getListOfPartnersUsers();
window.onload = updateEmailMobile();
</script> -->
<?php include 'admin_footer.php';?>