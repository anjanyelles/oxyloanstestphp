<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="margin-left:20px" class="text-bold">
            <left>FD Statistics</left>
        </h1>

    </section><br />

    <section class="content">
        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="daterange">Date Range</option>

                </select>
                <span class="errorsearch" style="display: none;">Please choose option</span>
            </div>

            <div class="col-xs-3 text-center fdstatsstartdate" style="display: none;">
                <input type="text" name="fdstatsstartdate" class="form-control  fdstartdatepicker"
                    placeholder="start Date">
            </div>

            <div class="col-xs-3 text-center fdstatsenddate" style="display: none;">
                <input type="text" name="fdstatsenddate" class="form-control fdenddatepicker" placeholder="End date">
            </div>
            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="searchFdStats('search');"><i
                        class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>




        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <h4 class="text-bold">FD Statistics</h4>
                        <table id="example2" class="table table-bordered table-hover" style="width: 50%;"> 
                        <!--     <thead>
                                <tr id="example">
                                    <th>No of FDs Done</th>
                                    <th>Value of the FDS </th>
                                    <th>No of the active FDS</th>
                                    <th>Value of the active Fds</th>
                                    <th>Total Interest Received to ICICI</th>
                                    <th>Total Interest Received to HDFC</th>
                                    <th>Total Fd Closed Interest </th>

                                </tr>
                            </thead> -->
                            <tbody id="displayfdstatcslist">


                            
                                   
                                   

                                 <tr class="fdstatcsNodata"  style="display:none;">
                                <th>Users</th>
                                 <td>No data found </td>
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



<script type="text/javascript">
window.onload = searchFdStats('load');
</script>





<script id="scriptfdstatsList" type="text/template">

    {{#data}}




                                <tr class="fdstastics">
                                <th>No of FDs Done</th>
                                 <td> {{noOfFdsDone}} </td>
                                </tr>


                                   <tr class="fdstastics">
                                    <th>Value of the FDS</th>
                                     <td>INR {{valueOfFd}}</td>
                                </tr>


                                <tr class="fdstastics">
                                    <th>No of the active FDS</th>
                                     <td>  {{noOfActiveFds}}</td>
                                </tr>

                                <tr class="fdstastics">
                                    <th>Value of the active Fds</th>
                                     <td>INR  {{noOfActiveFdsAmount}}</td>
                                </tr>
                                   <tr class="fdstastics">
                                    <th >Total Interest Received to ICICI</th>
                                     <td>INR  {{amountReceivedToIcici}}</td>
                                </tr>
                                   <tr class="fdstastics">
                                    <th>Total Interest Received to HDFC</th>
                                     <td>INR {{amountReceivedToHdfc}}</td>
                                </tr>
                                   <tr class="fdstastics">
                                    <th>Total Fd Closed Interest </th>
                                     <td>INR {{totalFdClosedInterest}}</td>

                                {{/data}}
</script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>