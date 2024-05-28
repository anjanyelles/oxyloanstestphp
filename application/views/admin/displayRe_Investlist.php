<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lender Re Invest list
        </h1>
    </section><br />

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose --</option>
                    <option value="lenderID">Lender ID</option>
                    <option value="userName">Name</option>
                </select>
            </div>
            <div class="col-xs-3 text-center lenderid" style="display: none;">
                <input type="text" name="lenderid" id="lenderid" class="form-control lenderid" placeholder="Lender ID">
            </div>
            <div class="col-xs-3 text-center userName" style="display: none;">
                <input type="text" name="userName" class="form-control firstName" placeholder="First Name">
            </div>
            <div class="col-xs-3 text-center userName" style="display: none;">
                <input type="text" name="userName" class="form-control lastName" placeholder="Last Name">
            </div>
            <div class="col-xs-3 text-center">
                <button type="" class="btn bg-gray pull-left search-btn" onclick="searchlendersReinvest()">
                    <i class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>

        </div>


        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Lender info</h3>

                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="lendersreinvestPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>

                            <div class="searchlendersreinvestPagination pull-right" style="display: none;">
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
                                    <th>Lender ID & Name</th>
                                    <th>Email & Mobile Number
                                    <th>Emi Amount</th>
                                    <th>Created on</th>
                                    <th>Status</th>
                                    <th>Approve to Escrow</th>
                                </tr>
                            </thead>
                            <tbody id="loadlendersaReinvestList">




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

<script id="loadlendersReinvestListTpl" type="text/template">
    {{#data}}
      <tr>
       <td><b>Userid:</b>LR {{userId}} <br/>
        <b>Name:</b>{{firstName}} {{lastName}}<br/>
        <b>Wallet Amount:</b> {{lenderWalletAmount}} <br/>  
       </td>
    <td><b> Email:</b>{{email}} <br/>
    <b>Mobile Number :</b> {{mobileNumber}}</td>
        <td>
       <b>Emi Amount Added ToEscrow:</b>{{emiAmountAddedToEscrow}} <br/>
        <b>Emi Amount Available For Escrow:</b> {{emiAmountAvbleForEscrow}} <br/>
       </td>
       
         <td>{{createdOn}}  </td>
          <td>{{status}}  </td>

      
        
    <td>

   <button type="button" class="btn btn-success pull-left btn-xs disable-{{userId}}"  id="emi-{{userId}}" onclick="useremisapprovetoEscrow('{{userId}}')"> <b> Move To Escrow</b></button>
   
    </td>
      </tr>


  {{/data}}
</script>

<div class="modal modal-success fade" id="modal-movefundsemitoescrow">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                This user funds emi moved to Escrow.
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


<script type="text/javascript">
window.onload = loadlendersReinvestList();
</script>


<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>