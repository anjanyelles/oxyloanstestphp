<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Validity fee paid users
        </h1>
    </section><br />

    <!-- Main content -->

    <section class="content">

        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control paidUsearch" id="paidUsearchType">
                    <option value="">-- Choose --</option>
                    <option value="Wallet">Wallet</option>
                    <option value="Payu">PayU</option>
                    <option value="">HDFC</option>

                </select>
                <span class="errorsearch" style="display: none;">Please choose option.</span>
            </div>
            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left paidFeeType"
                    onclick="getvaliditypaidUsersSearch();"><i class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Paid Through <span class="paidType">Wallet</span></h3>
                        </div>

                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="acceptedPaginationadmin pull-right" style="display:none">
                            <ul class="pagination bootpag" style="margin:0px !important">
                            </ul>

                        </div>



                        <div class="acceptedPaginationadminsearch pull-right" style="display:none">
                            <ul class="pagination bootpag" style="margin:0px !important">
                            </ul>

                        </div>


                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    <th>User Id</th>
                                    <th>Transaction Number</th>
                                    <th>Amount</th>
                                    <th>Payment Date</th>
                                    <th>Deal Id</th>
                                    <th>Paid Date</th>
                                    <th>Deal Name</th>

                                </tr>
                            </thead>
                            <tbody id="displayPaidUsersInfo">

                                <tr class="noDatafoundPaid" style="display:none">
                                    <td colspan="8">No data found</td>
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
<script id="displayRecordsPaidUsers" type="text/template">
    {{#data}}
      <tr>
        <td>LR {{userId}}</td>
        <td>{{transactionNumber}}</td>
        <td>{{amount}}</td>
        <td>{{paymentDate}}</td>
        <td>
         {{#dealId}}
          {{dealId}}
            {{/dealId}}
            {{^dealId}}
            No data
           {{/dealId}}
        </td>

        <td>
         {{#paidDate}}
          {{paidDate}}
            {{/paidDate}}
            {{^paidDate}}
            No data
           {{/paidDate}}
        </td>
        

        <td>
          {{#dealName}}
           {{dealName}}
            {{/dealName}}
            {{^dealName}}
            No data
           {{/dealName}}


        </td>
    
      </tr>   
  {{/data}}
</script>

<script type="text/javascript">
window.onload = getvaliditypaidUsers("Wallet");
</script>

<?php include 'admin_footer.php';?>