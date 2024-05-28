<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Borrowers Minimum eNACH Amount Users
        </h1>
    </section><br />

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="SearchMinEnach">
                    <option value="">-- Choose --</option>
                    <option value="userName">Name</option>
                    <option value="borrowerID">Borrower ID</option>

                </select>
                <span class="errorsearch" style="display: none;">Please choose option.</span>
            </div>


            <div class="col-xs-3 text-center userName" style="display: none;">
                <input type="text" name="userName" class="form-control firstName" placeholder="First Name">
            </div>
            <div class="col-xs-3 text-center userName" style="display: none;">
                <input type="text" name="userName" class="form-control lastName" placeholder="Last Name">
            </div>

            <div class="col-xs-3 text-center borrowerid" style="display: none;">
                <input type="text" name="borrowerid" class="form-control borrowerid" id="borrowerid"
                    placeholder="Borrower ID">
            </div>

            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="SearchMinEnachUsers();"><i
                        class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">eNACH Borrower info</h3>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="interstedPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>

                            <div class="searchinterstedPagination pull-right" style="display: none;">
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
                                    <th>App ID</th>
                                    <th>BR ID & Name</th>
                                    <th>BR Email</th>
                                    <th>EMI Amount</th>
                                    <th>Tenure</th>
                                    <th>Created On</th>
                                </tr>
                            </thead>
                            <tbody id="loadBorrowersInterestedList">


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

<script id="loadBorrowersInterestedListTpl" type="text/template">
    {{#data}}
      <tr>
        <td>{{applicationId}}</td>
        <td>BR{{borrowerUser.id}}<br/>
    {{borrowerUser.firstName}} {{borrowerUser.lastName}}<br/>
    <b>city :</b>{{borrowerUser.city}}
    <br/><b>oxyScore :</b> {{borrowerUser.oxyScore}}
        
        </td>
        <td>{{borrowerUser.email}}<br/>{{borrowerUser.mobileNumber}}</td>
       <td>{{amount}}</td>
       <td><b>{{tenure}}</b> Months</td>
      <td>{{createdOn}}</td>
       
   
      </tr>

  {{/data}}
</script>




<script type="text/javascript">
window.onload = loadMinimumAmounteNACHusers();
</script>


<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>