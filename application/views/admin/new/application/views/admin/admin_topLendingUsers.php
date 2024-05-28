<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealName =  isset($_GET['dealName']) ? $_GET['dealName'] : 'NORMAL';
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Top Lending Users
        </h1>
        
        
    </section>
    <div class="cls"></div>
    </br>
    </br>
     <div class="row col-xs-12" style="margin-left:15px">
           
         <div class="col-xs-3 text-center knowtopLendingRange">
                <label class="pull-left">Choose Limit</label>
           <select class="form-control" id="topLendingUserCountLimit">
         
               <option value="10">10</option>
                <option value="20">20</option>
                 <option value="30">30</option>
                  <option value="40">40</option>
                   <option value="50">50</option>
                    <option value="100">100</option>
                     <option value="200">200</option>
                       <option value="500">500</option>
                     <option value="1000">1000</option>
           </select>
            
            </div>
             <div class="col-xs-3 text-center topLendingStartDatediv" >
                <label class="pull-left">Start Date</label>
             <input type="date" name="date" class="form-control" id="topLendingStartDate">
            </div>

            <div class="col-xs-3 text-center topLendingEndDatediv">
                  <label class="pull-left">End Date</label>
                 <input type="date" name="date" class="form-control" id="topLendingEndDated">  
            </div>
       
          

            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="topLendingUserSearch();" style="margin-top:25px"><i
                        class="fa fa-angle-double-right"></i>
                    <b>Search</b>
                </button>
            </div>
        </div>
    <section class="content">
        <div class="cls"></div>

        <div class="row customFormQ">
            <div class="cls"></div>
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    

                    <!-- /.box-header -->
                    <div class="box-header">

                        <div class="col-10">
                            <b> Note : <code> 
                      By default, we display the top 20 lenders. If you want to view more, please select the search option above.
                            </code></b>
                        </div>


                        <div class="col-2 pull-right">
                              <a href="#" target="_blank" class="topLendingUserExcel"><button class="pull-right btn btn-info"><i class="fa fa-file-excel-o"></i> Download Excel </button></a>

                        </div>



                    </div>
                    <div class="box-body">
                       
                        <table id="topLendingTableUser" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    
                                    <th> User Id </th>
                                    <th> Name</th>
                                    <th>Amount</th>
                                    <th>email</th>
                                      <th>Address</th>
                                 

                                </tr>
                            </thead>
                            <tbody id="topLendingTable" class="displaywallettrns">
                                <tr class="topLendingNoData" style="display:none">
                                    <td colspan="8">No data found</td>
                                    
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<script type="text/javascript">
$(document).ready(function() {
 topLendingUser(20);
});
</script>
<script id="topLendingScript" type="text/template">
    {{#data}}
  <tr>
    <td>LR{{lenderId}}</td>
    <td>{{lenderName}}</td>
    <td>{{totalParticipationAmount}}</td>
    <td>{{email}}</td>
     <td>{{address}}</td>
  
  </tr>
  {{/data}}
  </script>

<style type="text/css">
#selectElementId {
    box-sizing: border-box;
    height: 35px;
    width: 100px;
}
</style>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>