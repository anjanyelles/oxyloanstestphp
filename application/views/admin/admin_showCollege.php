<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            colleges info
        </h1>
    </section><br />

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control" id="searchColleges">
                    <option value="">-- Choose --</option>
                    <option value="location">Location</option>
                    <option value="university">University</option>
                    <option value="agentName">Agents</option>
                </select>
                <span class="errorsearch" style="display: none;">Please choose option.</span>
            </div>

            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="knowCollegeInfo('')"><i
                        class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">colleges info
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


                            <iframe width="100%" height="265" src="https://www.linkedin.com/"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>



                            <table id="example2" class="table table-bordered table-hover" style="display: none;">
                                <thead>
                                    <tr id="example">
                                        <th class="tableC">College / University</th>
                                        <th class="tablebtn">More</th>


                                    </tr>
                                </thead>
                                <tbody id="loadBorrowersList">


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

<script id="loadBorrowersListTpl" type="text/template">
    {{#data}}
  <tr>   
     <td class="scriptC">{{universityName}} <span class="scriptL">{{locationInIndia}}</span></td>

     <td>

     <div class="scriptbtncollege">
      <a href="showCollegeInfo?name={{universityName}}&&type=university"><button>More</button></a>
     </div>

      <div class="scriptbtnLocation">
       <a href="showCollegeInfo?name={{universityName}}&&type=location"><button>More</button></a>
     </div>



       <div class="scriptbtnAgent">
         <a href="showCollegeInfo?agent={{universityName}}"><button>More</button></a>
     </div>

     </td>

     
      </tr>   
  {{/data}}
</script>
<script type="text/javascript">
window.onload = knowCollegeInfo("university");
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<?php include 'admin_footer.php';?>