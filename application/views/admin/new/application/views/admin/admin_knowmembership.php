<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealName =  isset($_GET['dealName']) ? $_GET['dealName'] : 'NORMAL';
?>
<div class="content-wrapper">
    <section class="content-header">
    <h1> Know Membership B/W Dates</h1>
    </section>
    <div class="cls"></div>
    </br>
    </br>
     <div class="row col-xs-12" style="margin-left:15px">
            <div class="col-xs-3 text-center" style="display:none">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose Type --</option>
                    <option value="rangeMembership">Range</option>
                </select>
                <span class="errorsearch" style="display: none;">Please Choose Dates</span>
            </div>


            <div class="col-xs-3 text-center knowmembershipDate" >
                <label class="pull-left">Start Date</label>
             <input type="date" name="date" class="form-control" id="membershipKnowstartDate">
            </div>

            <div class="col-xs-3 text-center endknowmembershipDate">
                  <label class="pull-left">End Date</label>
                 <input type="date" name="date" class="form-control" id="membershipKnowEndDate">  
            </div>
          
            <div class="col-xs-4 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="knowmembershipSearch('search');" style="margin-top:25px"><i
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

                             <div class="col-9">
                               <b> Note : <code> 
                                 Displaying Membership expired users till date, Choose the above search to get the users between custom date range
                               </code></b>
                              </div>


                        <div class="col-3 pull-right">
                            <div class="knowmembershipPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                       
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    
                                    <th> User Id </th>
                                    <th> User Name</th>
                                    <th>Previous Paid Amount</th>
                                    <th>Renewed Status</th>
                                    <th> Validity Date</th>
                                 

                                </tr>
                            </thead>
                            <tbody id="membershipKnoWTable" class="displaywallettrns">
                                <tr class="knowDataMembership" style="display:none">
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
 knowmembership();
});
</script>
<script id="membershipKnoWScript" type="text/template">
    {{#data}}
  <tr>
    <td>LR{{userId}}</td>
       <td>{{lenderName}}</td>
    <td>{{previousAmount}}</td>
    <td>{{renewedStatus}}</td>
    <td>{{validityDate}}</td>

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