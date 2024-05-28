<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <left class="text-bold">Lenders Wallet Info </left>
        </h1></br></br>
        <div class="alert showSuccessMessage" role="alert" style="background-color: #D0f0C0; display: none;">
            <strong>Email's Sent Successfully To the Lender's</strong>
        </div>
    </section><br />
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box"></br></br>
                    <div class="box-body">
                        <div class="row">
                            <label for="lenderId " class="col-sm-3 col-form-label ">Select Lender Wallet Type <em
                                    class="error">*</em> :</label>
                            <div class="col-sm-4">
                                <select class="form-control lenderGroup" name="updating" id="editlendergroups" data
                                    validation="updating">
                                    <option value="">-- Choose Lender Wallet Type --</option>
                                    <option value="GREATERTHANZERO">GREATERTHANZERO</option>
                                    <option value="ZERO">ZERO</option>
                                    <option value="LESSTHANZERO">LESSTHANZERO</option>

                                </select>
                            </div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-xm btn-primary col-sm-3" id="profit-submit-btn"
                                    onclick="getoxyfoundingwalletBlans();">Submit</button>

                                <button type="button" class="btn btn-xm btn-warning col-sm-6" id="profit-submit-btn"
                                    data-downloadurs="" onclick="downloadLenderWallets();"
                                    style="margin-left:10px; display: none;">download Excel</button>

                            </div>
                        </div>
                        <div class="box-body getoxyfoundingwallets" style="display: none;">
                            <div class="form-group row">
                                <div class="box-header">
                                    <div class="col-md-6 pull-left">


                                    </div>
                                    <div class="col-md-6 pull-right">
                                        <div class="viewLenderwalletsinfo pull-right">
                                            <ul class="pagination bootpag">
                                            </ul>
                                        </div>
                                        <div class="searchborrowerPagination pull-right" style="display: none;">
                                            <ul class="pagination bootpag">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr id="example">
                                                <th>User ID</th>
                                                <th>Lender Name</th>
                                                <th>Wallet Amount Info</th>

                                            </tr>
                                        </thead>
                                        <tbody id="displayWalletsBalns">
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                            </tr>
                                            </tfoot>
                                    </table>
                                    </br>
                                    </br>

                                </div>
                                <!-- /.
                                    
                                    /.box-header -->
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
<script id="displayOxyfoundingWalletsblans" type="text/template">
    {{#data}}
            <tr>
                <td>LR{{userId}}</td>
                <td>{{name}}</td>
                <td>
                    <b> Credit </b>:  {{credit}} </br>
                     <b> Debit </b>:  {{debit}} </br>
                      <b> Current Wallet  </b>:  {{currentWalletAmount}} </br>
                       <b> Total Loan Amount </b>:  {{totalLoanAmount}} </br>
                       <!--  <b> Credit </b>:  {{credit}} </br>
                         <b> Credit </b>:  {{credit}} </br> -->
                </td>
            </tr>
            {{/data}}
            </script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>