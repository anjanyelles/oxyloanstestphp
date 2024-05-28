<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$type =  isset($_GET['type']) ? $_GET['type'] : null;
$name =  isset($_GET['name']) ? $_GET['name'] : null;
$agent =  isset($_GET['agent']) ? $_GET['agent'] : null;
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        </h1>
    </section><br />
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title"> <?php  echo $name;?> <?php  echo $agent;?> Info
                                <div class="col-md-6 pull-right">
                                    <div class="dashBoardPagination pull-right">
                                        <ul class="pagination bootpag">
                                        </ul>
                                    </div>
                                    <div class="searchborrowerPagination pull-right" style="display: none;">
                                        <ul class="pagination bootpag">
                                        </ul>
                                    </div>
                                </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr id="example">
                                        <th class="tableC">University Name</th>
                                        <th class="tablebtn">Agent / Institution </th>
                                    </tr>
                                </thead>
                                <tbody id="showloadBorrowersList">

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

<script id="showloadBorrowersListTpl" type="text/template">
    {{#data}}
  <tr>   
    <td class="col-md-4">
      {{universityName}}
    </td>
     <td class="col-md-6">
      <b>Info</b></br>
       <span class="showdataofuniversity">{{info}}</span></br>

        <span class="showdataofagentLocation">
           <b>  Agent : </b>   {{agentName}}</br>
           <b>  Location : </b>  {{locationInIndia}} </br>
           <b>  Email : </b>  {{emailOrWeb}} </br>
           <b>  Address : </b>  {{address}}   
        </span> 
    </td>
      </tr>   
  {{/data}}
</script>
<script type="text/javascript">
window.onload = getInfoCollages('<?php echo $type?>', '<?php echo $name ?>', '<?php echo $agent ?>');
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php include 'admin_footer.php';?>