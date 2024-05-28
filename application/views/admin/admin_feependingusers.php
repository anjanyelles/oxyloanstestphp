<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealName =  isset($_GET['dealName']) ? $_GET['dealName'] : 'NORMAL';
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
           Fee Pending Users
        </h1>
        
        
    </section>
    <div class="cls"></div>
    </br>
    </br>
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
                                Displaying Fee Pending User On these pages, if you want more information,download the Excel sheet.
                            </code></b>
                        </div>

                        <div class="col-2 pull-right">
                               <a href="#" target="_blank" class="pendinguserhref"><button class="pull-right btn btn-info"><i class="fa fa-file-excel-o"></i> Download Excel </button></a> 
                        </div>
                    
                    </div>
                    <div class="box-body">
                       
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    <th> User Name</th>
                                    <th> User Id </th>
                                    <th> Mobile No </th>
                                    <th> lender Type </th>
                                    <th> Deal Id </th>
                                    <th> Amount </th>

                                </tr>
                            </thead>
                            <tbody id="feependingUsersInformationtable" class="displaywallettrns">
                                <tr class="feependingusernodata" style="display:none">
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
    getfeepeningusers();
});
</script>
<script id="feependingUsersInformation" type="text/template">
    {{#data}}
  <tr>
    <td>{{firstName}}</td>
    <td>LR{{userId}}</td>
    <td>{{mobileNumber}}</td>
    <td>{{lenderType}}</td>
    <td>{{dealId}}</td>
    <td>INR {{amount}}</td>
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