<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section><br />
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box"></br></br>
                    <div class="box-body">
                        <div class="row" style="display: flex; flex-direction:row;">

                            <div class="col-sm-5" style="display: flex; flex-direction:row;">
                                <label for="lenderId" class="pull-left">Select Lender Group <em class="error">*</em>
                                    :</label>
                                <select class="form-control lenderGroup" name="updating" id="editlendergroup" data
                                    validation="updating" style="width:50%; margin-left: 20px;">
                                    <option value="">-- Choose Lender Group--</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control lenderGroup" name="updating" id="summonth" data
                                    validation="updating">
                                    <option value="">-- Choose Month--</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="sumYear" placeholder="Enter The Year"
                                    value="" required>
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-md btn-primary col-sm-4" id="profit-submit-btn"
                                    onclick="getoxyfoundingamountInfo();">Submit</button>
                            </div>

                        </div>
                        <div class="box-body dealamointinfo" style="display: none">
                            <div class="form-group row">
                                <div class="box-header">
                                    <div class="col-md-6">
                                        <h4>Total Participated Value till <span class="till-ParticipationDate"
                                                style="font-size: 16px;"></span> :- <span
                                                class="oxywalletinfo">october</span></h4>
                                        <h4>Total Deal Amount in
                                            <span class="till-ParticipationYear" style="font-size: 16px;"></span> :-
                                            <span class="totalDealAmountMonth"></span>
                                        </h4>
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
                                                <th>Deal Id</th>
                                                <th>Deal Name</th>
                                                <th>Total Deal Amount</th>
                                                <th>Total Deal Amount By Month And Year</th>

                                            </tr>
                                        </thead>
                                        <tbody id="displayAmountInfo">
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
<script id="OxyfoundingAmountInfo" type="text/template">
    {{#data}}
            <tr>
                <td>{{dealId}}</td>
                <td>{{dealName}}</td>
                <td>
                    {{#sumOfDealAmount}}
                    {{sumOfDealAmount}}
                    {{/sumOfDealAmount}}
                    {{^sumOfDealAmount}}
                    0
                    {{/sumOfDealAmount}}
                </td>

                <td>
                    {{#sumOfDealAmountByMonthAndYear}}
                    {{sumOfDealAmountByMonthAndYear}}
                    {{/sumOfDealAmountByMonthAndYear}}
                    {{^sumOfDealAmountByMonthAndYear}}
                    0
                    {{/sumOfDealAmountByMonthAndYear}}
                </td>
            </tr>
            {{/data}}
            </script>
<script type="text/javascript">
$(document).ready(function() {
    getlendergroupname();

});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>