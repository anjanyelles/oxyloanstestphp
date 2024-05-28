<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="text-bold" style="margin-left:12px">
            Search Fd Types 
        </h1>
        <div class="row">
            <div class="col-xs-3 ">
                <select class="form-control" name="updating" id="FdSearch" onchange="searchFdoptions();">
                    <option value="">-- Search--</option>
                    <option value="fundingType">FD TYPE</option>
                     <option value="consultancy">Consultancy</option>
                       <option value="bank">Bank</option>
                </select>
                <span class="errorsearchlist error" style="display: none;">Please choose option.</span>
            </div>

            

          
            <div class="col-xs-3 text-center fundingList" style="display: none;">
                <select class="form-control" name="fundingType" id="fundingTypelist">
                    
                </select>
            </div>


            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="searchingFdListUsers();"><i
                        class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>

        </div>
    
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Search Users</h3></br></br>

                        </div>
                     <div class="col-md-6 pull-right  searchUserDownload"  style="display:none">
                            <div class="viewlenderwallet pull-right">
                               <a href="#" class="downloadsearchList" onclick="downloadShett()"> 
                             <button class="btn btn-success btn-sm"><i class="fa fa-download"> Download List</i></button>
                               </a>
                            </div>


                       
                        </div>
                    </div>



                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                               <thead>
                                            <tr id="example">
                                                <th>Borrower Info</th>
                                                <th width="20%">FD Info </th>
                                                <th>FD Create Date </th>
                                                <th>FD Closed Date </th>
                                                <th>Address</th>


                                            </tr>
                                        </thead>
                            <tbody id="displaysearchListTable">
                                <tr class="noDatafdsearchList">
                                                <th colspan="8">No Record Found</th>
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

<!-- /.modal-dialog -->
</div>

<!-- /.modal-dialog -->
</div>
<!-- /.content-wrapper -->



<script id="displaySeachedList" type="text/template">
    {{#data}}   
 <tr class="noDatafoundStatus">
                                                <td>
                                                   <b> Name : {{name}} </b></br>
                                                     ID: {{borrowerId}}   </br>
                                                    Mobile No : {{registeredMobileNumber}} </br>
                                                    Pan NO :{{panNumber}}
                                                </td>
                                                <td>
                                                   <b>Fd Amount : {{totalFdAmount}} </b> </br>
                                                    
                                                      <b>From System :{{fdFromSystem}}  </b></br>
                                                 
                                             
                                                </td>
                                              
                                                <td>

                                                    FD create Date : {{fdCreatedDate}}

                                                </td>



                                                <td>

                                                        FD Closed Date : {{fdClosedDate}}

                                                </td>
                                

                                                <td>
                                                   {{address}}</br>
                                                   {{pincode}},{{stateCode}}
                                                </td>
                                            </tr>



 {{/data}}
          </script>
<script type="text/javascript">

</script>
<?php include 'admin_footer.php';?>