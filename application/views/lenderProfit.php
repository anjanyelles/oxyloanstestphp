<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Financial Reports
        </h1><br />
        <span style="font-family: sans-serif; font-size: 14px; display:none"> <code>Note</code> : Interest earned
            certificate can be
            downloaded and sent to registered email.</span>



    </section><br />
    <!-- Main content -->


    <section class="content">

        <div class="row">
            <div class="box col-xs-12 box-primary">
                <div class="box-body">

                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="mobileDiv_4">

                            <tr id="example financialYear_table">
                                <th>SO</th>
                                <th>FY</th>
                                <th>EARNINGS</th>
                                <th>DOWNLOAD FY REPORT </th>
                                <th>EMAIL FY REPORT </th>
                            </tr>


                        </thead>
                        <tbody id="displayFinancialData" class="mobileDiv_3">
                            <tr id="nodataFinancial" style="display:none;">
                                <td colspan="8">No Data found!</td>
                            </tr>
                            <!--

                                   <tr class="">
                                    <td>1</td>
                                     <td>22-23</td>
                                     <td>12456</td>
                                      <td><button class="btn btn-xa btn-warning" onclick="profitearnedstatus('DOWNLOAD');"
                                >
                                <span class="fa fa-download"></span> Download
                                </button></td>
                                       <td><button class="btn btn-sx btn-success" onclick="profitearnedstatus('EMAIL');"
                                >
                                <span class="fa fa-envelope"></span> Email
                            </button></td>
                                </tr> -->
                            </tfoot>
                    </table>



                </div>



                <!--   <div class="card text-center lenderProfit" style="box-shadow: none !important;">
                    <div class="card-header mobile_profit">
                        <h3 style="font-family: sans-serif;">
                            Earnings Certificate FY 22-23:
                            <button class="btn btn-md btn-success" onclick="profitearnedstatus('EMAIL');"
                                style="margin-left: 40px;">
                                <span class="fa fa-envelope"></span> Email Earning Details
                            </button>
                            <button class="btn btn-md btn-warning" onclick="profitearnedstatus('DOWNLOAD');"
                                style="margin-left: 40px;">
                                <span class="fa fa-download"></span> Download Earnings Certificate
                            </button>
                            <h3>
                    </div>

                </div> -->

                <!--
                <div class="inputFiledscertificate" style="display:none;">

                    <div>
                        <label>Start Date : </label>
                        <input type="date" class="in_incomeStart" id="certificateStart">
                    </div>

                    <div>
                        <label>End Date :</label>
                        <input type="date" class="in_incomeEnd" id="certificateEnd">
                    </div>

                    <button class="btn btn-md bg-black interest_sub lender_incomeCrtificate" data-type="" onclick="profitearnedCertificate();">
                        Submit
                    </button>
                </div> -->
                <!--

                <div class="showErrormessageDate" style="display:none">
                    <span class="errormessage"></span><button onclick="hideerror();"> <i
                            class="fa fa-window-close"></i></button>
                </div> -->
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<div class="modal modal-success fade" id="modal-downloadOffer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks</h4>
            </div>
            <div class="modal-body">
                <p id="text1">
                    Thanks for lending with OxyLoans!.
                    <br /><br />
                    We are proud to have you as a lender. Thank you! <br /><br />

                    Congratulations! Your earning certificate is being downloaded.
                </p>
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

<div class="modal modal-success fade" id="modal-alreadyDoneSendOffer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks</h4>
            </div>
            <div class="modal-body">
                <p id="text1">
                    Thanks for lending with OxyLoans!.
                    <br /><br />

                    We are proud to have you as a lender. Thank you! <br /><br />
                    Earnings certificate has been sent to your <b>Registered Email</b>, Please review.
                </p>
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
<div class="modal modal-success fade" id="modal-agreement">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Your certificate is downloaded.</p>
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
<div class="modal modal-success fade" id="modal-agreements">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>
                    Deatailed "Interest Earned Certificate & Statement" is sent to your Registered email,
                </p>
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


<script type="text/javascript">
window.load = getFinicalYearReport();
</script>


<script id="scriptFinancialData" type="text/template">
    {{#data}}
<tr>
<td>{{sNo}}</td>
<td>{{financialYear}}</td>
<td>{{incomeEarned}}</td>
 <td>

<button class="btn btn-xa btn-warning"  onclick="profitearnedCertificate( '{{startDate}}', '{{endDate}}','DOWNLOAD');">
    <span class="fa fa-download"></span> Download
</button>
 </td>
<td>

<button class="btn btn-sx btn-success" onclick="profitearnedCertificate('{{startDate}}', '{{endDate}}','EMAIL')";>
<span class="fa fa-envelope"></span> Email </button>

</td>
</tr>
{{/data}}
</script>



<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'footer.php';?>