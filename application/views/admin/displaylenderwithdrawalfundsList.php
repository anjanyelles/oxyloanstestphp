<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

  <?php 
    session_start(); // Start the session
    $basePATH_URL = $this->uri->uri_string(); 

    // Check if the user type is set in the session
    if(isset($_COOKIE['sUserType'])) {
        $userType = $_COOKIE['sUserType'];
        
    }
?>      

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lender Withdrawal List
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
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="searchlenderswithdrawalList()">
                    <i class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>

        </div><br /><br />


        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title" style="color: #008B8B; ">Lender Withdrawal info</h3>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="lenderswithdrawalPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>

                            <div class="searchlenderswithdrawalPagination pull-right" style="display: none;">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover" border="1">
                            <thead>
                                <tr>
                                    <th>LR ID & Name</th>
                                    <th>Withdrawal Info</th>

                                    <!-- <th>Withdraw Amount</th>
                  <th>Withdrawal Reason</th>
                  <th>Rating</th> -->
                                    <!--   <th>FeedBack</th> -->
                                    <th>Status</th>
                                    <!-- <th>Actions</th> -->

                                    <?php if ($userType !== 'TESTADMIN'): ?>
        <th>Actions</th>
    <?php endif; ?> 
                                </tr>
                            </thead>
                            <tbody id="loadwithdrawfundslist">




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

<script id="loadlenderswithdrawfundslistTpl" type="text/template">
    {{#data}}
      <tr>
      <td>
       LR{{userId}} <br/>
      {{firstName}}  {{lastName}}<br/>
      <b>Email:</b>{{email}} <br/>
      <b>Mobile Number:</b>{{mobileNumber}} <br/>

       </td> 
      <td>Created On :  {{createdOn}}   </br>
        Withdrawal Amount : {{amount}} </br>
        Rating : {{rating}}  </br>
        Feedback : {{feedBack}}
      </td>
     <!--   <td>{{amount}}  </td>
       <td>{{withdrawalReason}}</td>
       <td>{{rating}}</td> -->
     <!--   <td>{{feedBack}}</td> -->


         <td>

        <b> Status : </b> {{status}} </br>
           <b> Current Wallet:</b>{{currentAmount}}    </br>


           {{#adminComments}}
               <b class="admincomments_{{adminComments}}">Admin comments :</b> <span class="admincomments_{{adminComments}}"> {{adminComments}}
             </span>
           {{/adminComments}}
           
         </td>   
         <?php if ($userType !== 'TESTADMIN'): ?>
            <td>

<div class="w2w-block-{{statusobj}}" style="display:none">
  <button type="button" class="btn btn-success  btn-xs btn-withdraw{{status}} " id="arrove-{{id}}" onclick="lenderwithdrawFundaApprove({{id}})" data-clikedId="{{id}}"><b>Approve</b></button><br/><br/>
  <button type="button" class="btn btn-danger btn-xs btn-withdraw{{status}}" id="reject-{{id}}"   onclick="lenderwithdrawFundReject({{id}})" data-clikedId="{{id}}"><b>Reject</b></button>
  </div>

<div class="w2w-blockShow-{{statusobj}}" style="display:none">
{{status}}


{{#approvedOn}} 
</br>
Update On :  {{approvedOn}} 
{{/approvedOn}} 






</div>





  </td>
    <?php endif; ?> 

      </tr>


  {{/data}}
</script>


<div class="modal fade" id="modal-approve-withdrawfunds" tabindex="-1" role="dialog"
    aria-labelledby="modal-interested-borrower" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure ?</h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success lenderwithdrawfundsBtn " data-clikedId=""
                    onclick="lenderwithdrawfunds();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<div class="modal  fade" id="modal-approve-withdrawfundsComments">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Comments</h4>
            </div>
            <div class="modal-body">
                <form>
                    <textarea type="text" name="" class="form-control withdrawfundsComments"></textarea><br />
                </form>

            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm withdrawfundsCommentsBtn" data-dismiss="modal"
                        data-clikedId="" onclick="savewithdrawfundsComments()">Save</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-danger fade" id="modal-transactiondanger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">     
                Error
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
    
            </div>
            <div class="modal-body">
              
            </div>
            <div class="modal-footer">
                <a href="#">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">OK</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-success fade" id="modal-withdrawalAprrovesuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                You have Approved this withdrawal.
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



<div class="modal fade" id="modal-reject-withdrawfunds" tabindex="-1" role="dialog"
    aria-labelledby="modal-interested-borrower" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure ?</h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success lenderwithdrawfundsrejectBtn" data-clikedId=""
                    onclick="lenderwithdrawfundsreject();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<div class="modal  fade" id="modal-reject-withdrawfundsComments">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Comments</h4>
            </div>
            <div class="modal-body">
                <form>
                    <textarea type="text" name="" class="form-control withdrawfundsrejectComments"></textarea><br />
                </form>

            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm withdrawfundsCommentsrejectBtn"
                        data-dismiss="modal" data-clikedId="" onclick="savewithdrawfundsrejectComments()">Save</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-success fade" id="modal-withdrawalReject">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                You have Reject this withdrawal.
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


<div class="modal modal-warning fade" id="modal-displayLenderwithdrawalFundsErrors">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">!Oops</h4>
            </div>
            <div class="modal-body displaylender">
              <p class="errormessage"></p>
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


<!-- <script type="text/javascript">
window.onload = loadlenderswithdrawfundslist();
</script> -->

<style type="text/css">
#example2 tr th,
#example2 tr td {
    border: 1px solid #000;
}

#example2 tr th {
    background-color: #D3D3D3;
}

.btn-withdrawAPPROVED,
.btn-withdrawREJECTED,
.btn-withdrawCANCELLED {
    pointer-events: none;
    cursor: not-allowed;
    opacity: 0.65;
    filter: alpha(opacity=65);
    -webkit-box-shadow: none;
    box-shadow: none;
}
</style>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<?php include 'admin_footer.php';?>