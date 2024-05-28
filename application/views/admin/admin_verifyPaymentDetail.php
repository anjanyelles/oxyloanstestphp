<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <section class="content-header">

        <h1 style="margin-left:20px" class="text-bold">
            <left>Verify The Payment Details</left>
        </h1>
    </section>

    <section class="content">
        <div class="row">

            <div class="fdverifypaymentlogin">
                <span class="error errorverify" style="display:none;">Invalid Password</span>
                <input type="password" name="fdpass" placeholder="Enter The Password"
                    class="paymentverifyLoginpassword">
                <button class="btn btn-xs cms-submit" onclick="verifypaymentVerifyStudent();">Submit</button>
                

            </div>
            <div class="col-xs-12 bank-verifydata_boolean" style="display:none">
                <div class="card cmsBoxCard">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="tab" class="active"><a href="#hdfcPayments" aria-controls="home" role="tab"
                                data-toggle="tab"><i class="fa fa-bank"></i>
                                <span>All HDFC </a></li>
                        <li role="tab"><a href="#hdfcApproved" aria-controls="home" role="tab" data-toggle="tab"><i
                                    class="fa fa-bank"></i>
                                <span> HDFC Approved</a></li>
                        <li role="tab"><a href="#hdfcRejected" aria-controls="home" role="tab" data-toggle="tab"><i
                                    class="fa fa-bank"></i>
                                <span>HDFC Rejected</a></li>
                        <li role="tab"><a href="#iciciPayments" aria-controls="Running" role="tab" data-toggle="tab"><i
                                    class="fa fa-bank" aria-hidden="true"></i> <span>All- ICICI</span></a></li>

                        <li role="tab"><a href="#iciciApproved" aria-controls="Running" role="tab" data-toggle="tab"><i
                                    class="fa fa-bank" aria-hidden="true"></i> <span>ICICI Approved</span></a></li>

                        <li role="tab"><a href="#iciciRejected" aria-controls="Running" role="tab" data-toggle="tab"><i
                                    class="fa fa-bank" aria-hidden="true"></i> <span> ICICI Rejected</span></a></li>


                    </ul>


                    <div class="tab-content">
                        <div class="tab-pane active" id="hdfcPayments">
                            <div class="" style="width:100%;">

                                <div class="alert finallMoveCMSSucessmessage" role="alert"
                                    style="background-color: #D0f0C0; display: none; font-size: 18px;">
                                    <span id="error-DealClosed"><strong>Well done!</strong> Files Moved
                                        Successfully.</span>
                                </div>

                                <div class="col-xs-12">

                                    <div class="row col-md-6 pull-left">
                                        <span class="text-bold">ALL HDFC PAYMNETS</span>
                                    </div>

                                    <div class=" col-md-6 pull-right">
                                        <div class="hdfcPaginationAll pull-right">
                                            <ul class="pagination bootpag">
                                            </ul>
                                        </div>

                                    </div>


                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr id="example">
                                                <th>Borrower Info</th>
                                                <th>Bank Details </th>
                                                <th>FD Amount & Booked Info </th>
                                                <th>FD Status & payment </th>


                                                <th>Actions </th>



                                            </tr>
                                        </thead>
                                        <tbody id="displayPaymentHdfc">

                                            <tr class="nohdfcpayments" style="display:none">
                                                <th colspan="8">
                                                    No Record Found
                                                </th>
                                            </tr>




                                            </tfoot>
                                    </table>


                                </div>
                            </div>


                        </div>

                        <div class="tab-pane" id="iciciPayments">

                            <div class="" style="width:100%;">
                                <div class="row col-md-6">
                                    <span class="text-bold">ALL ICICI PAYMNETS</span>
                                </div>


                                <div class=" col-md-6 pull-right">
                                    <div class="iciciPaginationAll pull-right">
                                        <ul class="pagination bootpag">
                                        </ul>
                                    </div>

                                </div>


                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr id="example">
                                            <th>Borrower Info</th>
                                            <th>Bank Details </th>
                                            <th>FD Amount & Booked Info </th>
                                            <th>FD Status & payment </th>


                                            <th>Actions </th>


                                        </tr>
                                    </thead>
                                    <tbody id="displayIciciViewList">

                                        <tr class="noicicipayments" style="display:none">
                                            <th colspan="8">
                                                No Record Found
                                            </th>
                                        </tr>


                                        </tfoot>
                                        </tfoot>
                                </table>


                            </div>


                        </div>




                        <div class="tab-pane" id="hdfcApproved">

                            <div class="" style="width:100%;">
                                <div class="row col-md-6">
                                    <span class="text-bold">HDFC APPROVED Payments</span>
                                </div>


                                <div class=" col-md-6 pull-right">
                                    <div class="hdfcapprovedlist pull-right">
                                        <ul class="pagination bootpag">
                                        </ul>
                                    </div>

                                </div>


                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr id="example">
                                            <th>Borrower Info</th>
                                            <th>Bank Details </th>
                                            <th>FD Amount & Booked Info </th>
                                            <th>FD Status & payment </th>


                                            <th>Actions </th>


                                        </tr>
                                    </thead>
                                    <tbody id="approveddisplayhdfcViewList">

                                        <tr class="nohdfcapprovedpayments" style="display:none">
                                            <th colspan="8">
                                                No Record Found
                                            </th>
                                        </tr>


                                        </tfoot>
                                        </tfoot>
                                </table>


                            </div>


                        </div>



                        <div class="tab-pane" id="hdfcRejected">

                            <div class="" style="width:100%;">
                                <div class="row col-md-6">
                                    <span class="text-bold">HDFC REJECT PAYMNETS</span>
                                </div>


                                <div class=" col-md-6 pull-right">
                                    <div class="hdfcrejectedfile pull-right">
                                        <ul class="pagination bootpag">
                                        </ul>
                                    </div>

                                </div>


                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr id="example">
                                            <th>Borrower Info</th>
                                            <th>Bank Details </th>
                                            <th>FD Amount & Booked Info </th>
                                            <th>FD Status & payment </th>


                                            <th>Actions </th>


                                        </tr>
                                    </thead>
                                    <tbody id="displayRejectHdfcViewList">

                                        <tr class="nohdfcrejectedlist" style="display:none">
                                            <th colspan="8">
                                                No Record Found
                                            </th>
                                        </tr>


                                        </tfoot>
                                        </tfoot>
                                </table>


                            </div>


                        </div>


                        <div class="tab-pane" id="iciciApproved">

                            <div class="" style="width:100%;">
                                <div class="row col-md-6">
                                    <span class="text-bold">ICICI APPROVED PAYMNETS</span>
                                </div>


                                <div class=" col-md-6 pull-right">
                                    <div class="iciciapprovedPaginationAll pull-right">
                                        <ul class="pagination bootpag">
                                        </ul>
                                    </div>

                                </div>


                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr id="example">
                                            <th>Borrower Info</th>
                                            <th>Bank Details </th>
                                            <th>FD Amount & Booked Info </th>
                                            <th>FD Status & payment </th>


                                            <th>Actions </th>


                                        </tr>
                                    </thead>
                                    <tbody id="approvedisplayIciciViewList">

                                        <tr class="approvenoicicipayments" style="display:none">
                                            <th colspan="8">
                                                No Record Found
                                            </th>
                                        </tr>


                                        </tfoot>
                                        </tfoot>
                                </table>


                            </div>


                        </div>


                        <div class="tab-pane" id="iciciRejected">

                            <div class="" style="width:100%;">
                                <div class="row col-md-6">
                                    <span class="text-bold">ICICI REJECTED PAYMNETS</span>
                                </div>


                                <div class=" col-md-6 pull-right">
                                    <div class="icicirejectedPaginationAll pull-right">
                                        <ul class="pagination bootpag">
                                        </ul>
                                    </div>

                                </div>


                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr id="example">
                                            <th>Borrower Info</th>
                                            <th>Bank Details </th>
                                            <th>FD Amount & Booked Info </th>
                                            <th>FD Status & payment </th>


                                            <th>Actions </th>


                                        </tr>
                                    </thead>
                                    <tbody id="rejecteddisplayIciciViewList">

                                        <tr class="norejectedicicipayments" style="display:none">
                                            <th colspan="8">
                                                No Record Found
                                            </th>
                                        </tr>


                                        </tfoot>
                                        </tfoot>
                                </table>


                            </div>


                        </div>




                    </div>
                </div>
    </section>



    <div class="modal modal-success  fade" id="modal-approveFdStatus">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Are You Sure You Want Update Interest Amount ? </h4>
                </div>
                <div class="modal-body">

                    <label>FD AMOUNT</label>
                    <input type="text" name="Fdamount" class="form-control">

                </div>
                <div class="modal-footer">
                    <div align="right">
                        <button type="button" class="btn  btn-primary btn-sm saveApproveCommentsBtn"
                            data-dismiss="modal" data-clikedId="" onclick="updatewalletApproveComments()">Save</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>





    <div class="modal   fade" id="modal-approvePayment">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmation? </h4>
                </div>
                <div class="modal-body">
                    <label>Are Sure You want to approve the payment</label>
                </div>
                <div class="modal-footer">
                    <div align="right">
                        <button type="button" class="btn  btn-primary btn-sm fdpaymetApprovalApprove" data-paymentId=""
                            onclick="updateThePaymentStatus('APPROVED')">yes</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



    <div class="modal   fade" id="modal-rejectPayment">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmation? </h4>
                </div>
                <div class="modal-body">
                    <label>Are Sure You want to reject the payment</label>
                </div>
                <div class="modal-footer">
                    <div align="right">
                        <button type="button" class="btn  btn-primary btn-sm fdpaymetApprovalreject" data-paymentId=""
                            onclick="updateThePaymentStatus('REJECTED')">yes</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="modal   fade" id="modal-generateInvoice">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmation? </h4>
                </div>
                <div class="modal-body">
                    <label>Are Sure You want to Generate the Invoice</label>
                </div>
                <div class="modal-footer">
                    <div align="right">
                        <button type="button" class="btn  btn-primary btn-sm saveApproveCommentsBtn"
                            data-dismiss="modal" data-clikedId="" onclick="updateThePaymentStatus()">yes</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="modal  fade modal-success" id="modal-approve-paymentScreen">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Thanks!</h4>
                </div>
                <div class="modal-body loansUserSuccessMessage">
                    <p class="#">Payment Status Has Successfuly updated </p>

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



    <div class="modal  fade modal-warning" id="modal-approve-paymentwarningVerification">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Oops!</h4>
                </div>
                <div class="modal-body loansUserSuccessMessage">
                    <p class="#"></p>

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





    <script id="fdpaymentHdfc" type="text/template">
        {{#data}}   

  <tr >
                                            <td>
                                              <b>  Name : {{userName}}  </b></br>
                                              <b>   User Id : {{userId}} </b></br>
                                             

                                             
                                            </td>

                                            <td>
                                                Ac No : {{accountNumber}}</br>
                                                Bank : {{bankName}}</br>
                                                IFSC : {{ifsc}} </br>
                                                Branch : {{branch}}
                                            </td>

                                                  <td>

                                                  <b>  FD Amount : {{fdAmount}}</b> </br>

                                                    {{#fdAmountFromSystem}}
                                                    <b>From System : {{fdAmountFromSystem}}</b></br>
                                                    {{/fdAmountFromSystem}}
                                                 
                                                {{#fdcreatedDate}}
                                                 <b>  FD Create Date : {{fdcreatedDate}}</b>
                                                </br>

                                                {{/fdcreatedDate}}


                                            
                                                <b>  Funding Type : {{fundingType}}</b>
                                       



                                            </td>



                                            <td>

                                                Running</br>

                                                  <b>  Fee payer : {{paymentsCollection}}</b></br>
                                                
                                                <b> Paid : {{amountPaid}} </b></br>

                                               


                                     Screen Shot : <a href="javascript:void(0)" onclick="viewFdPayment('{{url}}');">View</a>

                                            </td>

                                       <td>
                                              
                                        <button class="btn btn-xs btn-primary"
                                        onclick="viewFdpaymentapprove({{paymentId}});">Approve</button>

                                                </br>
                                        <button class="btn btn-xs btn-warning"
                                        onclick="viewFdpaymentreject({{paymentId}});">Reject</button></br>

                                       


                                            </td>
                                        </tr>


  

   
 {{/data}}
</script>





    <script id="fdpaymentIcici" type="text/template">
        {{#data}}   

  <tr>
                                            <td>
                                               <b>  Name : {{userName}}  </b></br>
                                              <b>   User Id : {{userId}} </b></br>
                                             
                                             
                                            </td>

                                            <td>
                                                Ac No : {{accountNumber}}</br>
                                                Bank : {{bankName}}</br>
                                                IFSC : {{ifsc}} </br>
                                                Branch : {{branch}}
                                            </td>



                                            <td>

                                                 <b>  FD Amount : {{fdAmount}}</b> </br>

                                                    {{#fdAmountFromSystem}}
                                                    <b>From System : {{fdAmountFromSystem}}</b></br>
                                                    {{/fdAmountFromSystem}}

                                               <b> FD Create Date : {{fdcreatedDate}}</b>
                                                </br>
                                                <b> Funding Type : {{fundingType}} </b>

                                            </td>



                                            <td>

                                                Running</br>

                                          <b>  Fee payer : {{paymentsCollection}}</b></br>

                                               <b>   Paid : {{amountPaid}}</b></br>
                                     Screen Shot : <a href="javascript:void(0)" onclick="viewFdPayment('{{url}}');">view</a>

                                            </td>





                                       



                                            <td>
                                           
                                        <button class="btn btn-xs btn-primary"
                                        onclick="viewFdpaymentapprove({{paymentId}});">Approve</button>

                                                </br>
                                        <button class="btn btn-xs btn-warning"
                                        onclick="viewFdpaymentreject({{paymentId}});">Reject</button></br>


                                            </td>
                                        </tr>


  

   
 {{/data}}
</script>




    <script id="approvedfdpaymenthdfc" type="text/template">
        {{#data}}   

  <tr>
                                            <td>
                                               <b>  Name : {{userName}}  </b></br>
                                              <b>   User Id : {{userId}} </b></br>
                                               
                                             
                                            </td>

                                            <td>
                                                Ac No : {{accountNumber}}</br>
                                                Bank : {{bankName}}</br>
                                                IFSC : {{ifsc}} </br>
                                                Branch : {{branch}}
                                            </td>


                                                <td>

                                                  <b>  FD Amount : {{fdAmount}}</b> </br>

                                                    {{#fdAmountFromSystem}}
                                                    <b>From System : {{fdAmountFromSystem}}</b></br>
                                                    {{/fdAmountFromSystem}}

                                               <b> FD Create Date : {{fdcreatedDate}}</b>
                                                </br>
                                                <b> Funding Type : {{fundingType}} </b> </br>
                                                Invoice : <a href="javascript:void(0)" onclick="viewFdPayment('{{invoiceUrl}}');">download</a>


                                            </td>



                                            <td>






                                                Running</br>
                                                  <b>  Fee payer : {{paymentsCollection}}</b></br>

                                              <b>  Paid : {{amountPaid}} </b></br>
                                     Screen Shot : <a href="javascript:void(0)" onclick="viewFdPayment('{{url}}');">view</a>

                                            </td>



                                        


                                       



                                            <td>
                                    
                                        <button class="btn btn-xs btn-warning"
                                        onclick="viewFdpaymentreject({{paymentId}});">Reject</button></br>
 

                                            </td>
                                        </tr>


  

   
 {{/data}}
</script>



    <script id="rejectedfdpaymenthdfc" type="text/template">
        {{#data}}   

  <tr>
                                            <td>
                                              <b>  Name : {{userName}}  </b></br>
                                              <b>   User Id : {{userId}} </b></br>
                                            
                                             
                                            </td>

                                            <td>
                                                Ac No : {{accountNumber}}</br>
                                                Bank : {{bankName}}</br>
                                                IFSC : {{ifsc}} </br>
                                                Branch : {{branch}}
                                            </td>



                                            <td>

                                                 <b>  FD Amount : {{fdAmount}}</b> </br>

                                                    {{#fdAmountFromSystem}}
                                                    <b>From System : {{fdAmountFromSystem}}</b></br>
                                                    {{/fdAmountFromSystem}}

                                               <b> FD Create Date : {{fdcreatedDate}}</b>
                                                </br>
                                                <b> Funding Type : {{fundingType}} </b> 

                                            </td>



                                            <td>

                                                Running</br>
                                                  <b>  Fee payer : {{paymentsCollection}}</b></br>

                                                Paid : {{amountPaid}}</br>
                                     Screen Shot : <a href="javascript:void(0)" onclick="viewFdPayment('{{url}}');">view</a>

                                            </td>





                                       



                                            <td>
                                               
                                        <button class="btn btn-xs btn-primary"
                                        onclick="viewFdpaymentapprove({{paymentId}});">Approve</button>

                                   <!--       </br>
                                        <button class="btn btn-xs btn-warning"
                                        onclick="viewFdpaymentreject({{paymentId}});">Reject</button></br>  -->


                                            </td>
                                        </tr>


  

   
 {{/data}}
</script>



    <script id="approvedpaymentIcici" type="text/template">
        {{#data}}   

  <tr>
                                            <td>
                                                 <b>  Name : {{userName}}  </b></br>
                                              <b>   User Id : {{userId}} </b></br>
                                               
                                             
                                            </td>

                                            <td>
                                                Ac No : {{accountNumber}}</br>
                                                Bank : {{bankName}}</br>
                                                IFSC : {{ifsc}} </br>
                                                Branch : {{branch}}
                                            </td>

                                              <td>

                                               <b>  FD Amount : {{fdAmount}}</b> </br>

                                                    {{#fdAmountFromSystem}}
                                                    <b>From System : {{fdAmountFromSystem}}</b></br>
                                                    {{/fdAmountFromSystem}}

                                               <b> FD Create Date : {{fdcreatedDate}}</b>
                                                </br>
                                                <b> Funding Type : {{fundingType}} </b> 

                                            </td>



                                            <td>

                                                Running</br>
                                                  <b>  Fee payer : {{paymentsCollection}}</b></br>

                                               <b> Paid : {{amountPaid}} </b></br>
                                     Screen Shot : <a href="javascript:void(0)" onclick="viewFdPayment('{{url}}');">view</a>

                                            </td>



                                          


                                
                                            <td>
                                               
                                 

                                              
                                        <button class="btn btn-xs btn-warning"
                                        onclick="viewFdpaymentreject({{paymentId}});">Reject</button></br> 


                                            </td>
                                        </tr>


  

   
 {{/data}}
</script>



    <script id="rejectpaymentIcici" type="text/template">
        {{#data}}   

  <tr>
                                            <td>
                                                 <b>  Name : {{userName}}  </b></br>
                                              <b>   User Id : {{userId}} </b></br>
                                             
                                             
                                            </td>

                                            <td>
                                                Ac No : {{accountNumber}}</br>
                                                Bank : {{bankName}}</br>
                                                IFSC : {{ifsc}} </br>
                                                Branch : {{branch}}
                                            </td>




                                            <td>

                                                <b>  FD Amount : {{fdAmount}}</b> </br>

                                                    {{#fdAmountFromSystem}}
                                                    <b>From System : {{fdAmountFromSystem}}</b></br>
                                                    {{/fdAmountFromSystem}}

                                               <b> FD Create Date : {{fdcreatedDate}}</b>
                                                </br>
                                                <b> Funding Type : {{fundingType}} </b> 

                                            </td>



                                            <td>

                                                Running</br>
                                                  <b>  Fee payer : {{paymentsCollection}}</b></br>
                                               <b> Paid : {{amountPaid}} </b></br>
                                     Screen Shot : <a href="javascript:void(0)" onclick="viewFdPayment('{{url}}');">view</a>

                                            </td>





                                       



                                            <td>
                                             
                                        <button class="btn btn-xs btn-primary"
                                        onclick="viewFdpaymentapprove({{paymentId}});">Approve</button>



                                            </td>
                                        </tr>


  

   
 {{/data}}
</script>



    <script type="text/javascript">
    window.load = loadverifyBoxes();
    window.load = uploadFdPaymentStatusHDFC("UPLOADED", 'HDFC');
    window.load = ApproveFdPaymentStatusHDFC("APPROVED", 'HDFC');
    window.load = rejectedFdPaymentStatusHDFC("REJECTED", 'HDFC');

    window.load = uploadFdPaymentStatusICICI("UPLOADED", 'ICICI');
    window.load = ApprovePaymentStatusICICI("APPROVED", 'ICICI');
    window.load = rejectedPaymentStatusICICI("REJECTED", 'ICICI');
    </script>

    <style type="text/css">
    .nav-tabs {
        border-bottom: 2px solid #DDD;
    }

    .nav-tabs>li.active>a,
    .nav-tabs>li.active>a:focus,
    .nav-tabs>li.active>a:hover {
        border-width: 0;
        color: #fff !important;
        background: #3f826D !important;
    }

    .nav-tabs>li>a {
        border: none;
        color: #1E5959 !important;
        background: #fff !important;
    }

    .nav-tabs>li>a::after {
        content: "";

        height: 2px;
        position: absolute;
        width: 100%;
        left: 0px;
        bottom: -1px;
        transition: all 250ms ease 0s;
        transform: scale(0);
    }

    .nav-tabs>li.active>a::after,
    .nav-tabs>li:hover>a::after {
        transform: scale(1);
    }

    .tab-nav>li>a::after {
        background: #1E5959 none repeat scroll 0% 0%;
        color: #fff;
    }

    .tab-pane {
        padding: 30px 0;
    }

    .tab-content {
        padding: 10px
    }

    .nav-tabs>li {
        width: 15%;
        text-align: left;
    }

    .card {
        background: #FFF none repeat scroll 0% 0%;
        box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3);
        margin-bottom: 30px;
        min-height: 450px;
    }

    i {
        margin-left: 3px;
    }

    .list-group-flush .list-group-item {
        padding-bottom: 30px;
        background-color: #F5F5F5;
    }

    @media all and (max-width:724px) {
        .nav-tabs>li>a>span {
            display: none;
        }

        .nav-tabs>li>a {
            padding: 5px 5px;
        }
    }

    @media (min-width: 1200px) {
        .container {
            width: 1030px !important;
        }

        .text_Updates {
            color: #3c8dbc;
        }

    }
    </style>







    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <?php include 'admin_footer.php';?>