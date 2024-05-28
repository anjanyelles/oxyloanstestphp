<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <left>BORROWER VAN NUMBER </left>
        </h1>
    </section><br />
    <!-- Main content -->

    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <br />
                    <br />
                    <div class="box-body">
                        <div class="row viewvannumber">
                            <label for="name " class="col-sm-3 col-form-label vannumber"> </h4>Borrower Id :</h4>
                            </label>
                            <div class="col-sm-4">
                                <input type="text" name="mobilenumber" class="form-control"
                                    placeholder="Enter The borrower Id " id="mobile" required="required" />
                                <span class="error mobile" style="display: none;">Please Enter Borrower Id</span>
                            </div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-xm btn-primary" id="profit-submit-btn"
                                    onclick="viewvannumber();">Submit</button>

                            </div>

                        </div>
                        </br>
                        <div class="box-body vannumber" style="display: none">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>UserId</th>
                                                <th>User Name</th>
                                                <th>Unique Number</th>
                                                <th>Van Number</th>

                                            </tr>
                                        </thead>
                                        <tbody id="displaywallet">
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>


                                            </tr>
                                            </tfoot>
                                    </table>
                                    </br>
                                    </br>
                                    <div class="form-group row" id="van" style="display: none">

                                        <label for="name " class="col-sm-2 col-form-label">Regenerate Van :</label>
                                        <div class="col-sm-1">
                                            <button type="button" class="btn btn-success pull-left btn-sm" id="id"
                                                onclick="generatevan();"><b>generate Van</b></button><br />

                                        </div>

                                    </div>
                                </div>
                                <!-- /.
                  
                  /.box-header -->

                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<div class="modal modal-success fade" id="modal-vannunber">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Updated</h4>
            </div>
            <div class="modal-body">
                Van Generated Successfully,
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-warning fade" id="modal-alreadyDoneSendOffer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text1">bjhvj.</p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script id="displaywalletTpl" type="text/template">
    {{#data}}
      <tr>
        <td>BR{{userId}}</td>
        <td>{{userName}}</td>
        <td>{{uniqueNumber}}</td>
        <td>{{vanNumber}}</td>
      </tr>
      {{/data}}
      </script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>