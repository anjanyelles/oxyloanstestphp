<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <h1 class="pull-left col-md-6">
                My Interest Info
            </h1>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">

                    <div class="box-header">
                        </br>
                        <div class="row searchwalletDeabitSearch">
                            <div class="col-xs-2 text-center">
                                <select class="form-control choosenType" id="type">
                                    <option value="">-- Search --</option>
                                    <option value="wtowSearch">Start Date & End Date</option>
                                </select>
                                <span class="errorsearch" style="display: none;">Please choose option.</span>
                            </div>

                            <div class="col-xs-2 text-center wtowStartdate" style="display:none">

                                <input type="date" class="in_incomeEnd form-control" id="walletStart"
                                    format="yyyy-mm-dd">

                            </div>

                            <div class="col-xs-2 text-center wtowEnddate" style="display:none">
                                <input type="date" class="walletStart_incomeEnd form-control" id="walletSearnEnd"
                                    format="yyyy-mm-dd">
                            </div>

                            <div class="col-xs-2 text-center wtosorybasedondiv" style="display:none">
                                <select class="form-control wtosorybasedon">
                                    <option value="">-- Sort Based On --</option>
                                    <option value="PaidDate">Paid Date</option>
                                    <option value="Amount">Amount</option>
                                    <option value="DealName">Deal Name</option>
                                </select>

                            </div>

                            <div class="col-xs-2 text-center wtosorttypediv" style="display:none">
                                <select class="form-control wtosorttype">
                                    <option value="">-- Sorting Type --</option>
                                    <option value="Asc">Asc</option>
                                    <option value="Desc">Desc</option>
                                </select>
                            </div>


                            <div class="col-xs-2 text-center">
                                <button type="button" class="btn bg-gray pull-left search-btn"
                                    onclick="myinterestInfoSearch()"><i class="fa fa-angle-double-right"></i>
                                    <b>Search</b>
                                </button>
                            </div>


                        </div>
                        </br>

                        <!--   <div class="col-md-2">
                        </div>
                        <div class="col-md-10 pull-right">
                            <div class="dashBoardPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>

                            <div class="searchborrowerPagination pull-right" style="display: none;">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div> -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="pull-right text-bold" style="margin-right:15px">Total Interest Earned Amount : <span
                                class="earnInterestAmountMYdeal">0</span> </div>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="mobileDiv_4">

                                <tr id="example">
                                    <!-- <th>Deal Id</th> -->
                                    <th>Deal Name</th>
                                    <th>Interest Amount</th>
                                    <th>Paid Date</th>



                                </tr>
                            </thead>
                            <tbody id="displaymyinterestINfo" class="mobileDiv_3">
                                <tr id="norecordMyinterest" style="display:none;">
                                    <td colspan="8">No Data found!</td>
                                </tr>
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


<script id="displayMyinterestScript" type="text/template">
    {{#data}}
        <tr class="divBlock_Mob_001">
          <td class="divBlock_Mob_002">
           <span class="lable_mobileDiv">dealName</span>
          {{dealName}}</td>
          <td>
           <span class="lable_mobileDiv">interestAmount</span>
          {{interestAmount}}</td>
          <td>
           <span class="lable_mobileDiv">paidDate</span>
           {{paidDate}}</td>
          {{/data}}
          </script>
<script type="text/javascript">
window.onload = myinterestInfo();
setTimeout(function() {
    digits();
}, 3000);
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php include 'footer.php';?>