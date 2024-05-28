<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <section class="content-header hold-headsection">
        <h4 class="text  fw-bold  m-3 holdamount-text">
            Hold Deal Amount
        </h4>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row col-md-12 hold-amount-box ">
                            <div class="row col-md-6 hold-amount-inputs">
                                <div class="hold_error col-md-12 hold-amount-inputs-fields"
                                    style="color: red; display: none;">
                                    <b>Error message: </b><span class="error_message error text-bold"
                                        style="margin-left:100px; font-weight: 600;">something went wrong</span>
                                </div>
                                <div class=" col-md-12 hold-amount-inputs-fields">
                                    <label for="" class="form-label">Lender Id :<em class="error">*</em> </label>
                                    <input type="text" class="form-control" name="" id="holdUser_id"
                                        placeholder="Enter the lender Id" aria-describedby="helpId" placeholder="">

                                </div>

                                <div class=" col-md-12 hold-amount-inputs-fields">
                                    <label for="" class="form-label">Deal Id :<em class="error">*</em> </label>
                                    <input type="text" class="form-control" name="" id="holdUser_deal_id"
                                        placeholder="Enter the deal Id" aria-describedby="helpId" placeholder="">

                                </div>


                                <div class=" col-md-12 hold-amount-inputs-fields ">
                                    <label for="" class="form-label">Hold Amount :<em class="error">*</em></label>
                                    <input type="text" class="form-control" name="" id="hold_amount"
                                        placeholder="Enter the hold amount" aria-describedby="helpId" placeholder="">
                                    </br>

                                </div>

                                <div class=" col-md-12 hold-amount-inputs-fields">
                                    <label for="" class="form-label">comments:<em class="error">*</em></label>
                                    <textarea name="" id="hold_comments" class="form-control hold-amount-text" rows="3"
                                        required="required" placeholder="Enter the comments"></textarea>


                                </div>

                                <div class="col-md-12 hold-amount-inputs-fields text-center">
                                    <label for="" class="form-label"> </label>
                                    <button class="btn btn-primary" type="button" onclick="holdAmountRequest()"
                                        id="submit_hold_request">Process</button>

                                </div>
                            </div>

                            <div class="row showUserDeals col-md-6" style="display:none;">
                                <div class="show-Hold-user">
                                    <div class="btn-group btn-group-md">
                                        <a href="holdAmountBreakUp" target="_blank"> <button type="button"
                                                class="btn btn-primary">
                                                View Hold User
                                                <span class="fa fa fa-angle-double-right mx-5"></span></button></a>
                                    </div>
                                </div>

                                <div class="show-Hold-user-table" style="display:none;">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="example2">
                                            <thead class="table-light">
                                                <caption class="text-bold">Current 5 Hold Users</caption>
                                                <tr>
                                                    <th>Lender Id</th>
                                                    <th>Hold Amount</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="userHoldRequest_body">
                                                <tr style="display: none;" class="hold_ten_users">
                                                    <td colspan="12">No Record Found</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                        </table>
                                    </div>

                                </div>


                            </div>


                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
</div>

<div class="modal modal-success fade" id="modal-holdrequestedSubmitted">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>
                <h2 style="font-size: 16px;">User request data is successfully saved!</h2>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script type="text/javascript">
window.onload = holdamountList("currentUsers");
</script>

<script id="holdrequestUsersdetails" type="text/template">
    {{#data}}

  <tr>
    <td>LR {{userId}}</td>
    <td>{{holdAmount}} </td>
    <td>{{status}}</td>
    
    
  </tr>
  {{/data}}
  </script>



<?php include 'admin_footer.php';?>