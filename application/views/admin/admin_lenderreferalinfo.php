<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lender Referee Info
        </h1>
        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control lenderGroup" name="updating" id="Search">
                    <option value="">-- Search--</option>
                    <option value="refereelenderId">Referrer Id</option>
                </select>
                <span class="errorsearch" style="display: none;">Please choose option.</span>
            </div>

            <div class="col-xs-3 text-center refereeLenderIdSearch" style="display: none;">
                <input type="text" name="loanid" class="form-control refereeId" placeholder="Enter Referrer ID">
            </div>
            <div class="col-xs-3 text-center refereePrimaryType" style="display: none;">
                <select class="form-control" name="referreeType" id="referreType" class="form-control ">
                    <option value=""> Select Primary Type</option>
                    <option value="LENDER">Lender</option>
                    <option value="BORROWER">Borrower</option>
                </select>
            </div>
            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="searchLenderReferralId();"><i
                        class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
            <!--
      <button type="button" class="btn btn-sx btn-info  pull-right" onclick="approvereferrebonus();" style="border-radius:20px; margin-left: 16px;">Approve Reference Amount </button>
      
      <button type="button" class="btn btn-sx btn-success pull-right" onclick="sendemailtoreferres() ;" style="border-radius:20px;display: none;">Send Mail To Referees</button>
      <button type="button" class="btn btn-sx btn-success pull-right" onclick="sendemailtoreferres() ;" style="border-radius:20px;">Send Mail To Referres</button>
      -->
        </div>
        <div class="alert showSuccessMessage" role="alert" style="background-color: #D0f0C0; display: none;">
            <strong>Email's Sent Successfully To the Lender's</strong>
        </div>
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Referee Info</h3></br></br>

                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="viewlenderwallet pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>


                            <div class="viewreferrePrimaryType pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>

                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Referrer Id</th>
                                    <th>Referee Id</th>
                                    <th>Referee Name</th>
                                    <th>Email Id</th>
                                    <th>Mobile No</th>
                                    <th>Referred On</th>
                                    <th>Status</th>
                                    <th>Earned Amount</th>
                                </tr>
                            </thead>
                            <tbody id="displaywallet">
                                <tr>

                                </tr>
                                </tfoot>

                            <tbody id="displayRefereeSearch" style="display: none;">
                                <tr>
                                    <!-- <td class="referrerId">LR383</td>
                    <td class="refereeId">LR385</td>
                    <td class="referee Name">LIVIN</td>
                    <td class="emailId">livinmandeva@gmail.com</td>
                    <td class="mobileNo">7569084614</td>
                    <td class="referredon">22-11-2021</td>
                    <td class="status">Lent</td>
                    <td class="earnedAmount">1200</td> -->
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
<div class="modal  fade" id="modal-viewEMI">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-9">
                        <h4 class="modal-title">Referee Participated Info</h4><br /><b>If you've any queries please
                            contact
                            <a href="mailto:subbu@oxyloans.com">subbu@oxyloans.com</a></b>
                    </div>
                    <div class="col-xs-3">
                        <div class="acceptedPagination">
                            <ul class="pagination bootpag">
                            </ul>
                        </div>

                    </div>
                    <div class="col-xs-9">
                        <div class="pull-left text-bold">Sum Of Participated Amount:
                            <span id="disbursmentAmount">50000</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr style="background-color: #B0C4DE; border: 1px solid lightgrey;">
                            <th>Deal Name</th>
                            <th>Participated Amount</th>
                            <th>Deal Id</th>

                        </tr>
                    </thead>
                    <tbody id="binfo">

                        </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<div class="modal  fade" id="modal-viewPaymentstatus">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-9">
                        <h4 class="modal-title">Payment Status Info</h4><br /><b>If you've any queries please contact
                            <a href="mailto:subbu@oxyloans.com">subbu@oxyloans.com</a></b>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr style="background-color: #B0C4DE; border: 1px solid lightgrey;">
                            <th>S.no</th>
                            <th>Deal Name</th>
                            <th>Participated Amount</th>
                            <th>Earn Amount</th>
                            <th>Participated On</th>
                            <th>Payment Status </th>
                            <th>Transferred On</th>
                            <th>Referee ID</th>
                            <!--    <th>Loan Id</th> -->
                        </tr>
                    </thead>
                    <tbody id="lenderpaymentinfo">

                        </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.content-wrapper -->
<script id="borrowersinfo" type="text/template">
    {{#data}}
        <tr>
          <td>{{dealName}}</td>
          <td>{{participatedAmount}}</td>
          <td>{{dealId}}</td>
        </tr>
        {{/data}}
        </script>
<script id="lpaymentstatus" type="text/template">
    {{#data}}
        <tr>
          <td>{{sNo}}</td>
          <td>{{dealName}}</td>
          <td>{{participatedAmount}}</td>
          <td>{{amount}}</td>
          <td> {{participatedOn}}</td>
          <td>{{paymentStatus}}</td>
          <td>{{transferredOn}}</td>
          <td>{{refereeNewId}}</td>
        </tr>
        {{/data}}
        </script>
<script id="referrerSearchData" type="text/template">
    {{#data}}
        <tr>
          <td>{{referrerNewId}}</td>
          <td>{{refereeNewId}}
          </td>
          <td>{{refereeName}}</td>
          <td>{{refereeEmail}}</td>
          <td> {{refereeMobileNumber}}</td>
          <td>{{referredOn}}</td>
          <td>{{status}}
            </br>
            {{#refereeId}}
            <a href="javascript:void(0)" class="viewLoanLenders"
            onclick="viewpaymentStatus('LR{{refereeId}}')">View Status</a>
            {{/refereeId}}
          </td>
          <td>{{totalAmountEarned}}</td>
        </tr>
        {{/data}}
        </script>
<div class="modal modal-success fade" id="modal-referreamountapproved">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text1">Thank you For Approving The Lender's Reference Amount</br>
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
            <td>{{referrerNewId}}</td>
            
            <td>
              <!-- <a href="javascript:void(0)" class="viewLoanLenders"
              onclick="refereeRegisteredInfos('{{refereeNewId}}')">{{refereeNewId}}</a> -->
              {{refereeNewId}}
              </br></br>
              <b>PrimaryType</b>:{{primaryType}}
            </td>
            <td>{{refereeName}}
            </td>
            <td>{{refereeEmail}}</td>
            <td>{{refereeMobileNumber}}</td>
            <td>{{referredOn}}</td>
            <td>{{status}}</br>
              {{#refereeNewId}}
              <a href="javascript:void(0)" class="viewLoanLenders"
              onclick="viewpaymentStatus('{{refereeNewId}}')">View Status</a>
              {{/refereeNewId}}
              
            </td>
            <td>{{amount}}</td>
            
            
          </tr>
          {{/data}}
          </script>
<script type="text/javascript">
window.onload = lenderreferrslinfo();
</script>
<?php include 'admin_footer.php';?>