<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
//echo $urlfromBroweser;
$dealId =  isset($_GET['id']) ? $_GET['id'] : '0';;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="text-bold">
            <span class="dealName"></span> Lenders Interest Info
        </h1>
        <button class="btn btn-sm btn-success pull-right"
            onclick="confirmapprovelenderInterest('<?php echo $dealId?>');" style="margin-left: 10px;">approve</button>
        <button class="btn btn-sm btn-danger pull-right" onclick="rejectStatusofLenders();">reject</button></br></br>
        <div class="alert interestSuccessMessage" role="alert" style="background-color:#D0f0C0;display: none;">
            <strong>Well done!</strong>successfully updated.
        </div>
        <div class="alert interestWrongMessage" role="alert" style="background-color:orange;display: none;">
            <span class="warningmessage"></span>
        </div>
    </section>
    <div class="cls"></div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="amount&city">Year&Month</option>
                </select>
                <span class="errorsearch" style="display: none;">Please choose option.</span>
            </div>
            <div class="col-xs-2 text-center amount" style="display: none;">
                <input type="text" name="amount" class="form-control maxAmount" id="dealyear"
                    placeholder="Enter The year">
            </div>
            <div class="col-xs-2 text-center city" style="display: none;">
                <select class="form-control" name="city" id="months" class="form-control city">
                    <option value="">-- Choose Month--</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
            </div>
            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn"
                    onclick="lenderInterestInfo('<?php echo $dealId?>');"><i class="fa fa-angle-double-right"></i>
                    <b>Search</b>
                </button>
            </div>
        </div>
        <div class="cls"></div>

        <div class="row customFormQ">
            <div class="cls"></div>
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h4>Total Interest amount value:<span class="totalInterestValue"></span></h4>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="city" id="lenderReturnType"
                                    class="form-control city">
                                    <option value="">-- Choose Return Type--</option>
                                    <option value="LENDERINTEREST">Lender Interest</option>
                                    <option value="LENDEREMI">Lender Emi</option>
                                    <option value="LENDERPRINCIPAL">Lender Principal</option>
                                    <option value="LENDERWITHDRAW">Lender Withdraw</option>
                                    <option value="LENDERRELEND">Lender Relend</option>
                                </select>
                            </div>

                            <div class="col-md-5">

                                <h4>First Interest Date: <span class="firstInterestDate"></span></h4>
                                <button class="btn btn-lg btn-success pull-right btn-excelDownload"
                                    style="margin-left:30px; display: none"
                                    onclick="lenderInterestExcelDownload('<?php echo $dealId?>');"><i
                                        class="fa fa-file-excel-o fa-1.5x downloadexcelIcon"></i>Download</button>

                                <label for='selectAll' class="pull-right">Select All</label>
                                <input class="pull-right" id="selectAll" type="checkbox"
                                    style="width:30px; height: 20px;">

                            </div>
                        </div></br></br>
                        <table id="example2" class="table table-bordered table-hover interestPayToLender"
                            style="display: none;">
                            <thead>
                                <tr id="example">
                                    <th>Lender ID</th>
                                    <th>Lender Name</th>
                                    <th>Interest Amount</th>
                                    <th>ROI</th>
                                    <th>Return Type</th>

                                    <th>Date</th>
                                    <th>Select</th>
                                    <th>Participated Info</th>
                                </tr>
                            </thead>
                            <tbody id="loadGetgroupName">
                                <tr>
                                    <td>LR201</td>
                                    <td>LENO</td>
                                    <td>200</td>
                                    <td>13%</td>
                                    <td>31/08/2021</td>
                                    <td><input type="checkbox" name="type" id="selectAll" value="201"></td>
                                </tr>
                                <tr>
                                    <td>LR202</td>
                                    <td>SWAPNA</td>
                                    <td>2000</td>
                                    <td>34%</td>
                                    <td>1/09/2021</td>
                                    <td><input type="checkbox" name="type" id="selectAll" value="202"></td>
                                </tr>
                                <tr>
                                    <td>LR203</td>
                                    <td>SRAVYA</td>
                                    <td>300</td>
                                    <td>16%</td>
                                    <td>3/08/2021</td>
                                    <td><input type="checkbox" name="type" id="selectAll" value="203"></td>
                                </tr>
                                <tr>
                                    <td>LR204</td>
                                    <td>RENUKA</td>
                                    <td>500</td>
                                    <td>45%</td>
                                    <td>4/08/2021</td>
                                    <td><input type="checkbox" name="type" id="selectAll" value="204"></td>
                                </tr>


                                </tfoot>
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
</div>
<!-- /.content-wrapper -->
<div class="modal fade modal-info" id="modal-rejectapprovepaytm">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Comments</h4>
            </div>
            <div class="modal-body">
                <textarea class="form-control interestRejectComments" cols="10" rows="4"
                    placeholder="Please Enter The comments"></textarea>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm savecibilscoreBtn" data-clickedId=""
                        onclick="rejectapprovelenderInterest('<?php echo $dealId?>');">Submit</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal  fade" id="modal-addingamountInfo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-9">
                        <h4 class="modal-title">Added Participation amount Info</h4><br /><b>
                            <!-- If you've any queries please write to us
              <a href="lenderInquiries">Click Here</a> -->
                        </b>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr style="background-color: #B0C4DE; border: 1px solid lightgrey;">
                            <th>Added Amount</th>
                            <th>Participated Date</th>
                            <th>Difference In Days</th>
                            <th>Interest Amount</th>

                        </tr>
                    </thead>
                    <tbody id="viewAddedParticipationAmount">

                        </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<script id="lenderInterestMonthly" type="text/template">
    {{#data}}
    <tr>
      <td>LR{{singleLenderInterestDetails.lenderId}}</td>
      <td>{{singleLenderInterestDetails.name}}</td>
      <td>{{singleLenderInterestDetails.interestAmount}}</td>
      <td>{{singleLenderInterestDetails.rateOfInterest}}%</td>
      <td>{{singleLenderInterestDetails.lenderReturnType}}</td>
      <td>{{singleLenderInterestDetails.date}}</td>
      <td><input type="checkbox"  name="type"  id="selectAll" value="{{singleLenderInterestDetails.lenderId}}"></td>
      <td>
        <button class="btn btn-primary btn-md participatedInfo" onclick="getParticipateStatement('<?php echo $dealId?>');">added Amount Info</button>
      </td>
    </tr>
    {{/data}}
    </script>
<script id="filteredCARDInfo" type="text/template">
    {{#data}}
    <tr>
      <td>{{amount}}</td>
      <td>{{upatedDate}}</td>
      <td>
        {{differenceInDays}}
      </td>
      <td>
        {{interestAmount}}
      </td>
    </tr>
    {{/data}}
    </script>
<script type="text/javascript">
$(document).ready(function() {

});
</script>
<script>
$('#selectAll').on('click', function() {
    $("input[type=checkbox]").prop("checked", $(this).prop("checked"));

});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>