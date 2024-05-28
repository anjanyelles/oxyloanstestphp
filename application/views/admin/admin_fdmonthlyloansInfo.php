<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<?php 
    session_start(); // Start the session
    $basePATH_URL = $this->uri->uri_string(); 

    // Check if the user type is set in the session
    if(isset($_COOKIE['sUserType'])) {
        $userType = $_COOKIE['sUserType'];
        
    }
?> 


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="margin-left:20px" class="text-bold">
            <left>FD Monthly Info </left>
        </h1>
    
    </section><br />
    

    <section class="content">
        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="fdmonthlyinfo">Date Range</option>

                </select>
                <span class="errorsearch" style="display: none;">Please choose option</span>
            </div>

            <div class="col-xs-3 text-center fdmonthlystartdate" style="display: none;">
                <input type="text" name="fdmonthlystartdate" class="form-control  fdmonthlystartDatepicker"
                    placeholder="start Date">
            </div>

            <div class="col-xs-3 text-center fdmonthlyEnddate" style="display: none;">
                <input type="text" name="fdmonthlyEnddate" class="form-control fdmonthlyenddatepicker"
                    placeholder="End date">
            </div>
            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn"
                    onclick="searchfdmonthlyInfo('search');"><i class="fa fa-angle-double-right"></i> <b>Search</b>
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
                    <?php if ($userType === 'SUPERADMIN'): ?>
                        <div class="row col-12">
                      <button class="pull-right  btn-success btn-md montly_report_Btn"
                      onclick="downloadShett();" style="outline: none;"><i class="fa fa fa-download"></i> Fd Report </button>
                  </div>
<?php endif; ?>

                

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    <th>User Info </th>
                                    <th>User Addres </th>
                                    <th> Fd Info </th>



                                </tr>
                            </thead>
                            <tbody id="displayfdmonthlyList">
                                <tr class="fdmonthlyNodata" style="display:none;">
                                    <td colspan="8"> No data found</td>

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
window.onload = searchfdmonthlyInfo('load');
</script>

<script id="fdmonthlypaymentList" type="text/template">

    {{#data}}
     <tr>
                                     <td>
                                       <b> Name : {{name}} </b> </br>
                                        ID : {{borrowerId}} </br> 
                                        Pan : {{panNumber}}
                                        
                                     </td>

                                    <td>
                                      {{address}}  </br>
                                      State : {{stateCode}}</br>
                                      registeredDate : {{registeredDate}}
                                    </td>



                                    <td>
                                     <b>   FD Amount : {{totalFdAmount}} </b> </br>
                                     <b>   FD From System : {{fdFromSystem}} </b>
                                    </td>
                                    
                                </tr>
                                {{/data}}
</script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>