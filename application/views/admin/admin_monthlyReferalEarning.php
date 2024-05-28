<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Referrer Earning Month Wise
        </h1>
        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control lenderGroup" name="updating" id="Search">
                    <option value="">-- Search Month--</option>
                    <option value="referalEarning">Month & Year</option>
                </select>
                <span class="errorsearch" style="display: none;">Please choose option.</span>
            </div>

            <div class="col-xs-3 text-center referalEarningMonth" style="display: none;">
                <select class="form-control cmsmonth" name="transmonth" id="referralEarnigMonthwise">
                    <option value=""> Select The Month</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>

                </select>
            </div>
            <div class="col-xs-3 text-center referalEarningMonthyear" style="display: none;">
             <select class="form-control cmsYear" name="transyear" id="referalEarningYearwise">
                     <option value="">Select The Year</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                  
                </select>
            </div>
            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="referralEarningMonthWise('search');"><i
                        class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
  
        </div>
        <div class="alert showSuccessMessage" role="alert" style="background-color: #D0f0C0; display: none;">
            <strong>Email's Sent Successfully To the Lender's</strong>
        </div>
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Referrer Info</h3></br></br>

                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="viewreferalMonthlyPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>

                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body ">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                <th>Referrer Name</th>
                                <th>Referrer Id</th>
                                <th>Earned Amount</th>
                                <th>Payment Status</th>
                                <th>Transferred On</th>
                                <th>Remarks</th>
                                <th>Break Up</th>
                                </tr>
                            </thead>
                            <tbody id="displayReferalMonthlyEarnings">
                                <tr class="noRecordFound" id="noRecordFound" style="display:none;">
                                <td colspan="12">No data found </td>
                            </tr>
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
<div class="modal  fade" id="modal-viewPaymentstatus-subpayment-referral">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" style="margin-left:14px"> BreakUp View</h4>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr style="background-color: #B0C4DE; border: 3px solid lightgrey;">
                           
                            <th>refereeId</th>
                            <th>userName</th>
                            <th>transferredOn</th>
                            <th>paymentStatus</th>
                            <th>amount </th>
                            <th>remarks</th>
                        </tr>
                    </thead>
                    <tbody id="lenderpaymentinfosubamount">

                        </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<script id="monthwiseEarningSubScript" type="text/template">
    {{#data}}
    <tr class="divBlock_Mob_001">
      <td>

       <span class="lable_mobileDiv">refereeId</span>

      LR{{refereeId}}</td>
      <td>
        <span class="lable_mobileDiv">userName</span>

      {{userName}}</td>
      <td>

         <span class="lable_mobileDiv">transferredOn</span>

      {{transferredOn}}</td>
          <td>
            <span class="lable_mobileDiv">paymentStatus</span>


       {{paymentStatus}}</td>
      <td>
       <span class="lable_mobileDiv">amount</span>

      {{amount}}</td>
      
      <td>

       <span class="lable_mobileDiv">remarks</span>

      {{remarks}}</td>
      
    </tr>
    {{/data}}
    </script>

<script id="referalEarningMonthWiseScript" type="text/template">
    {{#data}}
    <tr class="divBlock_Mob_001">
      
       <td>

      <span class="lable_mobileDiv">userName</span>
      {{userName}}</td>
      <td>
      <span class="lable_mobileDiv">refereeNewId</span>

      LR {{referrerId}}</td>
      <td>
      <span class="lable_mobileDiv">amount</span>

      {{amount}}</td>
      <td>

       <span class="lable_mobileDiv">paymentStatus</span>
         {{paymentStatus}} 

      


  </td>
      <td> 
      <span class="lable_mobileDiv">transferredOn</span>
      {{transferredOn}}</td>

      <td class="col-md-3">
      <span class="lable_mobileDiv">Remarks</span>
      

      {{#remarks}}
     {{remarks}}
    {{/remarks}}
    {{^remarks}}
     No Remarks 
   {{/remarks}}

    </td>

      <td>

   <button class="btn btn-info btn-xs" onClick="myreferalMonthWiseBreakUp({{referrerId}});">View Break up</button>

  </td>
    </tr>
    {{/data}}
    </script>
<script type="text/javascript">
window.onload = referralEarningMonthWise();
</script>
<?php include 'admin_footer.php';?>