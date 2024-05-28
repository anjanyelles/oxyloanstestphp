<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealName =  isset($_GET['dealName']) ? $_GET['dealName'] : 'NORMAL';
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
           Fee Paid Users
           
        </h1>
        
    </section>
    <div class="cls"></div>
    </br>
    </br>
     <div class="row col-xs-12" style="margin-left:15px">
            <div class="col-xs-3 text-center" style="display: none;">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose Type --</option>
                    <option value="searchFeepaidUsers">PaymentType</option>
                </select>
                <span class="errorsearch" style="display: none;">Please Choose Month And Year.</span>
            </div>
            <div class="col-xs-3 text-center dealFeeType">
                 <label class="pull-left">Choose Tenure</label>
                    <select class="form-control" name="month" id="dealFeeTypeDropDown">
                   
                    <option value="MONTHLY">MONTHLY</option>
                    <option value="QUARTELY">QUARTELY</option>
                    <option value="HALFYEARLY">HALF YEARLY</option>
                    <option value="PERYEAR">PER YEAR</option>
                    <option value="FIVEYEARS">FIVE YEARS</option>
                    <option value="TENYEARS">TEN YEARS</option>
                    <option value="LIFETIME">LIFE TIME</option>
                    <option value="PERDEAL">PER DEAL</option>
                    <option value="notlifeTimewaiver">Not Life Time Waiver</option>
                    <option value="lifeTimewaiver">Life Time Waiver</option>
                    </select>
            </div>
          
            <div class="col-xs-3 text-center feePaidUsersStartDatediv" >
                <label class="pull-left">Start Date</label>
             <input type="date" name="date" class="form-control" id="feePaidUsersStartDate">
            </div>

            <div class="col-xs-3 text-center feePaidUsersEndDatediv">
                  <label class="pull-left">End Date</label>
                 <input type="date" name="date" class="form-control" id="feePaidUsersEndDate">  
            </div>

            <div class="col-xs-3 text-center" >
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="feepaidUserInformationsearch();" style="margin-top:25px"><i
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
                               By default, we display the monthly membership subscribed users. Select the search option above to view subscriptions based on different dates.
                            </code></b>
                        </div>

                        <div class="col-2 pull-right">
                             <a href="#" target="_blank" class="feepaiduserhref"><button class="pull-right btn btn-info"><i class="fa fa-file-excel-o"></i> Download Excel </button></a>
                        </div>
                       
                    </div>
                    <div class="box-body">
                       
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    <th> User Name</th>
                                    <th> User Id </th>
                                    <th> Amount</th>
                                       <th>Fee Paid Date</th>
                                    <th> Phone No</th>
                                    <th> Email  </th>
                                    <th> Pan Number </th>

                                </tr>
                            </thead>
                            <tbody id="feepaidUserTable" class="displaywallettrns">
                                <tr class="feepaidusernodata" style="display:none">
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
    feepaidUserInformation("MONTHLY");
});
</script>
<script id="feepaidUsersInformation" type="text/template">
    {{#data}}
  <tr>
    <td>{{name}}</td>
    <td>LR{{lenderId}}</td>
    <td>{{amount}}</td>
      <td>{{paymentDate}}</td>
    <td>{{mobileNumber}}</td>
    <td>{{email}}</td>
    <td>{{panNumber}}</td>
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