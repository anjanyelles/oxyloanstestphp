<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealId =  isset($_GET['dealId']) ? $_GET['dealId'] : '0';
$paymentDate =  isset($_GET['paymentDate']) ? $_GET['paymentDate'] : '0';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <left>
            <h1>
                <h1 class="text-bold">
                    You're in <span><?php echo $dealId ?> Deal.</span>
                </h1>
            </h1>
        </left>
    </section>
    <div class="cls"></div>
    <section class="content">



        <div class="cls"></div>

        <div class="row customFormQ">
            <div class="cls"></div>
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header">
                        <div class="pull-right">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="acceptedPagination">
                                        <ul class="pagination bootpag">
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    <th>S.No</th>
                                    <th>Lender Info</th>
                                    <!-- <th>Participated Date</th> -->
                                    <!-- <th>Payment Method</th> -->
                                    <th>Participate Deal Info</th>
                                    <th>Bank Info</th>
                                    <!-- <th>Check All<br/><input type="checkbox" id="selectAll"/></th> -->
                                </tr>
                            </thead>
                            <tbody id="displaycurrentUsers">
                                <tr id="displayNoRecords" class="displayRequests">
                                    <td colspan="8">No User found!</td>
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
<script id="currentUsersdetails" type="text/template">
    {{#data}}
<tr>
<td>{{sno}}</td>
<td>Lender Name:{{lenderName}}</br>
  Lender Id:LR{{userId}}</br>
group :{{groupName}}


</td>

<td>
 <b>Participation amount : </b> {{participatedAmount}} </br>
  <b>Interest :  </b> INR  {{interestAmount}} </br>
 Roi : {{rateOfInterest}} %  </br>
Payment Method : {{paymentMethod}}

</td>
<td>
  Bank Account Number : {{bankAccountNumber}}</br>
  Bank Name : {{bankName}}</br>
  Branch Name :{{branchName}}</br>
  IFSC Code :{{ifscCode}}</br>
  NameAsPerBank :{{nameAsPerBank}}
</td>


</tr>
{{/data}}
</script>
<!--   <script type="text/javascript">
  $(document).ready(function() {
 currentDealUsersInterest();
  });
  
  </script> -->
<script type="text/javascript">
window.onload = currentDealUsersInterest('<?php echo $dealId ?>', '<?php echo $paymentDate?>');
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<?php include 'admin_footer.php';?>