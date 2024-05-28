<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="margin-left:20px" class="text-bold">
            <left>FD Closed Details </left>
        </h1>

        

    </section><br />

    <section class="content">
        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="fdclosedDateRange">Date Range</option>

                </select>
                <span class="errorsearch" style="display: none;">Please choose option</span>
            </div>

            <div class="col-xs-3 text-center fdclosedstartdate" style="display: none;">
                <input type="text" name="fdclosedstartdateinfo" class="form-control  fdclosedstartDatepicker"
                    placeholder="start Date">
            </div>

            <div class="col-xs-3 text-center fdclosedInfoEnddate" style="display: none;">
                <input type="text" name="fdclosedEnddate" class="form-control fdclosedfdenddatepicker"
                    placeholder="End date">
            </div>
            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn"
                    onclick="searchfdclosedInfo('search');"><i class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="col-md-6 pull-right">
                            <div class="fdverifiedUserList pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>

                        </div>

                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">  

                  <div class="row col-12 downloadclosedFddeatils" style="display:none">
                      <button class="pull-right  btn-success btn-md montly_report_Btn"
                      onclick="downloadShett();" style="outline: none;"><i class="fa fa fa-download"></i> Fd Report </button>
                  </div>

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    <th>Borrower Details</th>
                                    <th>Fd Info</th>
                                    <th>Fd Payment Info</th>
                                  
                                </tr>
                            </thead>
                            <tbody id="displayfdmonthlyList">
                                <tr class="fdmonthlyNodata">
                                    <td colspan="8">Search Data</td>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>



<!-- <script type="text/javascript">
window.onload = searchfdmonthlyInfo('load');
</script> -->

<script id="fdmonthlypaymentList" type="text/template">

    {{#data}}
     <tr>
                                     <td>
                                       Borrower ID :    {{borrowerId}} </br>
                                        Pan Number :    {{panNumber}} </br>
                                         Dob :    {{dob}} </br>

                                     </td>



                                    <td>
                                       Fd Created Date:    {{fdCreatedDate}} </br>
                                        Fd Closed Date :    {{fdClosedDate}} </br>
                                       
                                       
                                    </td>
                                     <td>
                                     
                                           Total Fd Amount:    {{totalFdAmount}} </br>
                                               Amount Retunred To Repayment:    {{amountRetunredToRepayment}} </br>
                                                   Amount Returned To Another:    {{amountReturnedToAnother}} </br>
                                        Fd From System :    {{fdFromSystem}} </br>
                                       
                                       
                                    </td>

                                    
                                    
                                </tr>
                                {{/data}}
</script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>