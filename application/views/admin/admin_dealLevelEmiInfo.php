<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="text-bold">Lender Deal Statement </h1>
    </section><br /><br /><br /><br />
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box"></br></br>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="lenderId" class="pull-left">Lender ID <em class="error">*</em> :</label>
                                <div class="col-sm-7" style="margin-left: 15px;">
                                    <input type="text" class="form-control" id="dealLenderId"
                                        placeholder="Enter The Lender ID">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label for="lenderId" class="pull-left">Deal ID<em class="error">*</em> :</label>
                                <div class="col-sm-7" style="margin-left: 15px;">
                                    <input type="text" class="form-control" id="dealId" placeholder="Enter The Deal ID">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-xm btn-primary col-sm-3" id="profit-submit-btn"
                                    onclick="getdealLevelInterestInfo();">Submit</button>

                            </div>

                        </div></br></br></br>
                        <div class="box-body dealEmiInfo" style="display: none">
                            <div class="form-group row">
                                <div class="box-header">
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
                                                <th>S no</th>
                                                <th>Date</th>
                                                <th>Interest Amount</th>
                                                <th>Payment Status</th>
                                                <th>Principal Amount</th>
                                                <th>Added Participation Amount Statement</th>

                                            </tr>
                                        </thead>
                                        <tbody id="viewLenderStatement">
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

<div class="modal  fade" id="modal-addingamountInfo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-9">
                        <h4 class="modal-title">Added Participation amount Info</h4><br /><b></b>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr style="background-color: #B0C4DE; border: 1px solid lightgrey;">
                            <th>Added Amount</th>
                            <th>Participated Date</th>
                            <th>Difference In Days</th>

                            <th>Interest Amount</th>

                        </tr>
                    </thead>
                    <tbody id="viewAddedParticipationAmount">

                        </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>


<script id="lenderDealEmiCard" type="text/template">
    {{#data}}
            <tr>
                <td>{{sno}}</td>
                <td>{{date}}</td>
                <td>{{interestAmount}}</td>
                <td>
                    {{#paymentStatus}}
                    {{paymentStatus}}
                    {{/paymentStatus}}
                    {{^paymentStatus}}
                    Future
                    {{/paymentStatus}}
                </td>
                <td>
                    {{#principalAmount}}
                    {{principalAmount}}
                    {{/principalAmount}}
                    {{^principalAmount}}
                    0
                    {{/principalAmount}}
                    
                </td>
                <td>
                    <button class="addparticipationamount btn btn-sm btn-info" onclick="viewaddstatement({{sno}});">View added amount statement</button>
                </td>
            </tr>
            {{/data}}
            </script>
<script id="filteredCARDInfo" type="text/template">
    {{#data}}
            <tr>
                <td>{{amount}}</td>
                <td>{{upatedDate}}</td>
                <td>
                    {{differenceInDays}}
                </td>
                <td>
                    {{interestAmount}}
                </td>
            </tr>
            {{/data}}
            </script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>