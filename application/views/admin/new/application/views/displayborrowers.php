<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>


<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Group of borrowers Info
        </h1>
    </section>
    <div class="cls"></div>


    <section class="content">
        <div class="cls"></div>

        <div class="row customFormQ">
            <div class="cls"></div>
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
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

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body borrowers">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr style="background-color: #B0C4DE; border: 3px solid lightgrey;">
                                    <th>Borrower Id</th>
                                    <th>Borrower Name</th>
                                </tr>
                            </thead>
                            <tbody id="binfo">
                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script id="borrowersinfo" type="text/template">
    {{#data}}
    <tr>
      <td>BR{{borrowerId}}</td>
      <td>{{firstName}} {{lastName}}</td>
    </tr>              

  {{/data}}
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<?php include 'footer.php';?>