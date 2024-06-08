<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="margin-left:20px" class="text-bold">
            <left>Registered Users</left>
        </h1>
        <div class="col-md-6 pull-right">
                            <div class="dashBoardPagination pull-right">
                                
                            <ul class="pagination bootpag"><li data-lp="1" class="first disabled"><a href="javascript:void(0);">←</a></li><li data-lp="1" class="prev disabled"><a href="javascript:void(0);">«</a></li><li data-lp="1" class="active"><a href="javascript:void(0);">1</a></li><li data-lp="2" class=""><a href="javascript:void(0);">2</a></li><li data-lp="3"><a href="javascript:void(0);">3</a></li><li data-lp="2" class="next"><a href="javascript:void(0);">»</a></li><li data-lp="3.3" class="last"><a href="javascript:void(0);">→</a></li></ul></div>
                            <div class="searchborrowerPagination pull-right" style="display: none;">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
    </section><br />

    <section class="content">
        <div class="row">
        <div class="col-xs-2 text-center">
                <select class="form-control choosetype" name="choosetype">
                    <option value="">-- Choose --</option>
                    <option value="LENDER">LENDER</option>
                    <option value="BORROWER">BORROWER</option>

                </select>
                <span class="errorsearch" style="display: none;">Please choose option</span>
            </div>
            <div class="col-xs-2 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="registerStartEndDate">Date Range</option>

                </select>
                <span class="errorsearch" style="display: none;">Please choose option</span>
            </div>

            <div class="col-xs-3 text-center registerStartdatediv" style="display: none;">
                <input type="text" name="registerStartdate" class="form-control  registerStartdate"
                    placeholder="start Date">
            </div>

            <div class="col-xs-3 text-center registerUserEnddatediv" style="display: none;">
                <input type="text" name="registerUserEnddatediv" class="form-control registerUserEnddate" placeholder="End date">
            </div>
            <div class="col-xs-2 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn"
                    onclick="numberOfRegistered11();"><i class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>


    
        
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="col-md-6 pull-right">
                            <!-- <div class="pagenationget pull-right pagenationget">
                                <ul class="pagination bootpag">
                                </ul>
                            </div> -->

                        </div>

                    </div>
                    <div class="fdverifiedUserList pull-right">
    <ul class="pagination bootpag" id="pagination"></ul>
</div>


                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>  
    
                                <tr id="example">
                                    <th>userId </th>
                                    <th> UserName </th>
                                    <th> mobileNumber </th>
                                    <th>panNumber </th>
                                    <th> address </th>
                                    <th> email </th>
                                    <th> primaryType </th>
                                    <th> registeredDate </th>


                                </tr>
                            </thead>
                            <tbody id="displayfdinvoiceList11">
                                <tr class="fdinvoiceNodata" style="display:none;">
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
    </section >


    <!-- /.content -->
</div>



<script type="text/javascript">
window.onload = numberOfRegisteredUsers("load");
</script>


<script type="text/javascript">
numberOfRegistered11();

// Bind the numberOfRegistered11 function to the Bootpag page event
$('.dashBoardPagination').on("page", function(event, num) {
    // Call the function again when the page changes
    numberOfRegistered11();
});
</script>


<script id="scriptfdinvoiceList11" type="text/template">

    {{#data}}
     <tr>      
                                     <td> {{userId}}  
                                     </td>
                                    <td>{{userName}}</td>
                                    <td>{{mobileNumber}}</td>
                                    <td>{{panNumber}}</td>
                                    <td>{{address}}</td>
                                    <td>{{email}}</td>
                                    <td>{{primaryType}}</td>
                                    <td>{{registeredDate}}</td>
                                 
                                    
                                </tr>
                                {{/data}}
</script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>