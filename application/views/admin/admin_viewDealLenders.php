<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealId =  isset($_GET['id']) ? $_GET['id'] : '0';
$dealname =  isset($_GET['dealName']) ? $_GET['dealName'] : '0';
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="alert  showDealClosedMessage" role="alert"
            style="background-color: #D0f0C0; display: none; font-size: 18px;">
            <span id="error-DealClosed"><strong>Well done!</strong> Deal Closed Successfully.</span>
        </div>
        <div class="alert  showDealClosedErrorMessage" role="alert"
            style="background-color: orange; display: none; font-size: 18px;">
            <span id="error-DealClosed"><strong>Well done!</strong> Deal Closed Successfully.</span>
        </div>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">


                <div class="card cmsBoxCard">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="tab" class="active"><a href="#all" aria-controls="home" role="tab"
                                data-toggle="tab"><i class="fa fa-user"></i> <span>VIEW ALL</a></li>

                        <li role="tab"><a href="#initiated" aria-controls="profile" role="tab" data-toggle="tab"><i
                                    class="fa fa-file" aria-hidden="true"></i> <span> INITIATED USERS</span></a></li>

                        <li role="tab"><a href="#paid" aria-controls="profile" role="tab" data-toggle="tab"><i
                                    class="fa fa-money" aria-hidden="true"></i> <span> PAID USERS</span></a></li>

                        <li role="tab"><a href="#notreturn" aria-controls="profile" role="tab" data-toggle="tab"><i
                                    class="fa fa-angle-double-right" aria-hidden="true"></i> <span> NOT
                                    RETURNED</span></a></li>


                        <li role="tab"><a href="#principalInfo" aria-controls="profile" role="tab" data-toggle="tab"><i
                                    class="fa fa-calendar" aria-hidden="true"></i> <span>PRINCIPAL INFO</span></a></li>

                    </ul>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane active" id="all" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="" style="width:100%;">
                                <div class="col-xs-12">
                                    <div class="viewAlltables">
                                        <ul class="nav nav-tabs sub_active" role="tablist">
                                            <li role="tab" class="active"><a href="#alluser" aria-controls="home"
                                                    role="tab" data-toggle="tab"><i class="fa fa-user"></i>
                                                    <span>All</a></li>

                                            <li role="tab"><a href="#bankuser" aria-controls="profile" role="tab"
                                                    data-toggle="tab"><i class="fa fa-bank" aria-hidden="true"></i>
                                                    <span>Bank</span></a></li>


                                            <li role="tab"><a href="#wallet" aria-controls="profile" role="tab"
                                                    data-toggle="tab"><i class="fa fa-angle-double-right"
                                                        aria-hidden="true"></i> <span> Wallet</span></a></li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane fade active in" id="alluser">
                                                <div class="col-md-12"
                                                    style="margin-bottom: 22px; display: flex; justify-content:space-between; flex-direction: row;">

                                                    <button type="submit"
                                                        class="btn btn-sm btn-info participationLenders" style=""
                                                        onclick="participatedLendersExcel(<?php echo $dealId; ?>)">Participated
                                                        Lenders Excel</button>

                                                    <button type="submit"
                                                        class="btn btn-sm btn-warning approvedPrincipalUsers"
                                                        onclick="confirmCloseDeal();">Principal paid to All</button>

                                                    <a
                                                        href="partialApprovedPrincipalUsers?dealId=<?php echo $dealId; ?>">
                                                        <button type="submit" class="btn btn-sm btn-success"
                                                            style=" margin-left:10px;">Approved Principal
                                                            Users</button>
                                                    </a>
                                                    <button type="submit"
                                                        class="btn btn-sm btn-primary partiallyprincipalRetunrs"
                                                        onclick="retunrPrincipalAmount(<?php echo $dealId; ?>);">Partially
                                                        Principal return</button>

                                                    <button type="submit" class="btn btn-sm btn-success movewalletfun"
                                                        onclick="moveWalletConfirmation(<?php echo $dealId; ?>);">Move
                                                        to Wallet</button>

                                                </div>

                                                <table id="example2" class="table table-bordered table-hover" id="#">
                                                    <thead>
                                                        <tr id="example">
                                                            <th>User & Deal info</th>
                                                            <th>Participated Amount</th>
                                                            <th>Participation Statement</th>
                                                            <th> Principal
                                                                <!-- check All
                                                                <br /><input type="checkbox" id="selectAll"
                                                                    onchange="checkAll(this)" name="selectAll"  />
 -->
                                                            </th>
                                                            <th>Wallet
                                                                <!-- Check All
                                                                <br /><input type="checkbox" id="walletselectAll"
                                                                    onchange="checkwalletAll(this)"
                                                                    name="walletselectAll" /> -->

                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="displayDealsData">

                                                        <tr class="noDatafound" style="display:none">
                                                            <td colspan="12">No data found</td>

                                                        </tr>

                                                        </tfoot>
                                                </table>
                                            </div>

                                            <div class="tab-pane fade  in" id="wallet">

                                                <table id="example2" class="table table-bordered table-hover" id="#">
                                                    <thead>
                                                        <tr id="example">

                                                            <th>USER ID</th>
                                                            <th>LENDER NAME</th>
                                                            <th>PARTICIPATED AMOUNT</th>
                                                            <th>ROI</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="displayWALLETDealsData">

                                                        <tr class="noWALLETDatafound" style="display:none">
                                                            <td colspan="12">No data found</td>

                                                        </tr>

                                                        </tfoot>
                                                </table>
                                            </div>

                                            <div class="tab-pane fade  in" id="bankuser">

                                                <table id="example2" class="table table-bordered table-hover" id="#">
                                                    <thead>
                                                        <tr id="example">
                                                            <th>USER ID</th>
                                                            <th>LENDER NAME</th>
                                                            <th>PARTICIPATED AMOUNT</th>
                                                            <th>ROI</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="displaybankuserdata">

                                                        <tr class="nobankuserDatafound" style="display:none">
                                                            <td colspan="12">No data found</td>

                                                        </tr>

                                                        </tfoot>
                                                </table>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="initiated" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="" style="width:100%;">
                                <div class="col-xs-12">
                                    <div class="viewAlltables">
                                        <ul class="nav nav-tabs sub_active" role="tablist">
                                            <li role="tab" class="active"><a href="#tabInitiateBank"
                                                    aria-controls="home" role="tab" data-toggle="tab"><i
                                                        class="fa fa-angle-double-right"></i>
                                                    <span>Initiate Wallet Users</a></li>


                                            <li role="tab"><a href="#tabInitiateWallet" aria-controls="profile"
                                                    role="tab" data-toggle="tab"><i class="fa fa-bank"
                                                        aria-hidden="true"></i> <span> Initiate Bank Users</span></a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane fade active in" id="tabInitiateBank">
                                                <table id="example2" class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr id="example">
                                                            <th>USER ID</th>
                                                            <th>AMOUNT </th>
                                                            <th>STATUS</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="viewLenderInitiatedUsers">
                                                        <tr id="initiatedDisplayNodata" style="display:none;">
                                                            <td colspan="12">No Data Found</td>
                                                        </tr>

                                                        </tfoot>
                                                </table>
                                            </div>

                                            <div class="tab-pane fade  in" id="tabInitiateWallet">
                                                <table id="example2" class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr id="example">
                                                            <th>USER ID</th>
                                                            <th>AMOUNT </th>
                                                            <th>STATUS</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="viewLenderInitiatedbankUsers">
                                                        <tr id="initiatedbankDisplayNodata" style="display:none;">
                                                            <td colspan="12">No Data Found</td>
                                                        </tr>

                                                        </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade  " id="paid" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="" style="width:100%;">
                                <div class="col-xs-12">

                                    <div class="viewAlltables">
                                        <ul class="nav nav-tabs sub_active" role="tablist">
                                            <li role="tab" class="active"><a href="#tabPaidBank" aria-controls="home"
                                                    role="tab" data-toggle="tab"><i
                                                        class="fa fa-angle-double-right"></i>
                                                    <span>Paid Wallet Users</a></li>


                                            <li role="tab"><a href="#tabpaidWallet" aria-controls="profile" role="tab"
                                                    data-toggle="tab"><i class="fa fa-bank" aria-hidden="true"></i>
                                                    <span>Paid Bank Users</span></a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane fade active in" id="tabPaidBank">
                                                <table id="example2" class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr id="example">
                                                            <th>USER ID</th>
                                                            <th>AMOUNT </th>
                                                            <th>STATUS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="viewpaidUsers">
                                                        <tr id="paiddisplayNodata" style="display:none;">
                                                            <td colspan="12">No Data Found</td>
                                                        </tr>

                                                        </tfoot>
                                                </table>
                                            </div>

                                            <div class="tab-pane fade  in" id="tabpaidWallet">
                                                <table id="example2" class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr id="example">
                                                            <th>USER ID</th>
                                                            <th>AMOUNT </th>
                                                            <th>STATUS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="viewpaidbankUsers">
                                                        <tr id="paiddisplaybankNodata" style="display:none;">
                                                            <td colspan="12">No Data Found</td>
                                                        </tr>

                                                        </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade " id="notreturn" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="" style="width:100%;">
                                <div class="col-xs-12">

                                    <div class="viewAlltables">
                                        <ul class="nav nav-tabs sub_active" role="tablist">
                                            <li role="tab" class="active"><a href="#tabNotReturnedBank"
                                                    aria-controls="home" role="tab" data-toggle="tab"><i
                                                        class="fa fa-bank"></i>
                                                    <span>Bank Users</a></li>


                                            <li role="tab"><a href="#tabnotreturnWallet" aria-controls="profile"
                                                    role="tab" data-toggle="tab"><i class="fa fa-angle-double-right"
                                                        aria-hidden="true"></i> <span> Wallet
                                                        Users</span></a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane fade active in" id="tabNotReturnedBank">
                                                <table id="example2" class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr id="example">
                                                            <th>User Id</th>
                                                            <th>Amount </th>
                                                            <th>Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="viewnotreturnbankUsers">
                                                        <tr id="notreturndisplaybankNodata" style="display:none;">
                                                            <td colspan="12">No Data Found</td>
                                                        </tr>

                                                        </tfoot>
                                                </table>
                                            </div>

                                            <div class="tab-pane fade  in" id="tabnotreturnWallet">
                                                <table id="example2" class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr id="example">
                                                            <th>User Id</th>
                                                            <th>Amount </th>
                                                            <th>Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="viewnotreturnUsers">
                                                        <tr id="notreturndisplayNodata" style="display:none;">
                                                            <td colspan="12">No Data Found</td>
                                                        </tr>

                                                        </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade " id="principalInfo" role="tabpanel" aria-labelledby="nav-home-tab">

                            <div class="" style="width:100%;">
                                <div class="col-xs-12">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr id="example">
                                                <th>USER ID</th>
                                                <th>AMOUNT </th>
                                                <th>PAID DATE</th>
                                                <th>AMOUNT TYPE </th>
                                                <th>COMMENTS</th>

                                            </tr>
                                        </thead>
                                        <tbody id="viewprincipalUsers">
                                            <tr id="principaldisplayNodata" style="display:none;">
                                                <td colspan="12">No Data Found</td>
                                            </tr>
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


    <div class="modal fade" id="modal-closed-deal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <center>
                        <h4>Are You Sure, You Want to Close The Deal</h4>
                    </center>
                </div>
                <div class="modal-body col-md-12">
                    <div class="col-sm-3">
                        <label for="name " class="col-sm-12 col-form-label">Close Date<em class="error">*</em> :</label>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" name="closedate" class="form-control closeDate"
                            placeholder="Enter The Deal Close date" id="deal-closedDate" required="required" />
                        <span class="error error-close" style="display: none;">Please Enter The Deal Close Date</span>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn  btn-success userInterestedBtn " data-reqID=""
                        onclick="dealclosedPreview();">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                    <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="closedDealConfirmationFromAdmin" role="dialog"
        aria-labelledby="dealConfirmationFromLender">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label=""><span>CLOSE</span></button>
                </div>
                <div class="modal-body">
                    <div class="thank-you-pop" style="text-align: left;">
                        <h3 class="text-center">Please review the Closing Deal details!</h3></br>
                        <div class="bodyContentNewPopUp" style="padding-left:150px;">
                            <label>Deal Closing Amount:-</label> <span class="pinfo">200000</span></b><br />
                            <label>Deal Name :-</label><span class="closingdealName">hlo</span></b><br />
                            <label>Closing Date :</label><span class="closedate"></span>.

                            <br /><br />
                        </div>
                        <div class="clear"></div>
                        <div class="popbtns">
                            <button type="button" class="btn btn-success btn-lg yesBTN4Close" data-reqID="" data-type=""
                                onclick="dealClosed(<?php echo $dealId; ?>)">Yes, Confirm</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal  fade" id="modal-addParticipation-Status">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-xs-9">
                        <h4 class="modal-title"><span class="principalReturnText">Added participation Amount info</span>
                        </h4><br /><b>

                    </div>
                </div>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr style="background-color: #B0C4DE; border: 1px solid lightgrey;">
                            <th>Amount</th>
                            <th>Date</th>

                        </tr>
                    </thead>
                    <tbody id="viewAddStatement">
                        <tr>

                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<div class="modal modal-success fade" id="modal-partially-ApprovedSuccessMessage">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body loadedWalletUserInfo">
                <p style="font-size: 16px;" class="successMessage">Successfully updated the users Data. please wait& the
                    page will refresh after 7seconds.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-warning fade" id="modal-principalErrorMeaages">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <p style="font-size: 16px;" id="principalError">Successfully updated the users Data. please wait& the
                    page will refresh after 7seconds.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal  fade" id="modal-ApproveMoveToWallet">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title approve-ConfirmText">Wallet Confirmation</h4>
            </div>

            <div class="modal-body">
                <form>
                    <label class="col-md-3 label-account" style="padding-left:0px!important"> Account Type</label>
                    <div class="col-md-12 label-dropdown">
                        <select class="movewalletaccountNO form-group-data col-md-12" id="debitedAcc"
                            style="padding: 5px; margin-left:-17px;">
                            <option value="">Choose options</option>
                            <option value="wallet">wallet</option>
                            <option value="777705849441">777705849441</option>
                            <option value="777705849442">777705849442</option>
                        </select>
                        <span class="error walletmoveerror" style="display:none">Please choose options</span>
                    </div>
                </form>
            </div></br></br>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm dealPrincipal_Btn" data-status=""
                        data-dealId="" onclick="loadingLenderWallets(<?php echo $dealId; ?>);">confirm</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script id="displayDealsScript" type="text/template">
    {{#data}}
    <tr class="userReturnStatus_{{accountType}} userWalletAmount_{{currentAmount}}"  value={{currentAmount}} id="checkUserWalletCondition">
      <td>
         <b> User name </b>:  {{lenderName}} </br>
          <b> User Id </b>: LR {{lenderId}} </br>
           <b> Deal Name </b>:  {{dealName}} </br>
            <b> ROI </b>:  {{dealRateofinterest}} % </br>
              <b> Fee Status </b>:  {{feeStatus}} </br>

      </td>

      <td>
        <span class="partialAmountData_{{lenderId}}">{{paticipatedAmount}}</span>
       <input value="{{paticipatedAmount}}" class="paticipatedAmountVal hide" /></br></br>

       <b>current amount: {{currentAmount}} </b>
         </br></br>
          <ul>
          {{#listOfPrincipalReturned}}
          {{#.}}
           <li>{{.}}</li> 
           </br>
          {{/.}}
          {{/listOfPrincipalReturned}}
          </ul>
    </td>


   
    <td>
      <button class="btn btn-primary btn-sm" onclick="viewADDStatement({{dealId}},{{lenderId}});">participation Statement</button></br></br>
      <b> chosen Payment : </b>  {{accountType}}
    </td>
    <td>
      <input type="checkbox" name="widthdrawalCheckPrincipal" id="widthdrawalCheckPrincipal" data-userID ="{{lenderId}}" data-UserChooosenType_{{lenderId}}="{{accountType}}"></br>
      <textarea cols="10" rows="3" class="response_{{lenderId}}">Enter Principal Amount</textarea>
      <input value="{{currentAmount}}" class="paticipatedAmountVal_{{lenderId}} hide" />
    </td>

    <td>
      <input type="checkbox" name="checkAllWalletLoadMembers" id="checkAllWalletLoadMembers" wallet-userID ="{{lenderId}}"  totalAmount_UserId="{{currentAmount}}" data-UserChooosenType_{{lenderId}}="{{accountType}}"></br>
      <textarea cols="10" rows="3" class="loadwallet_{{lenderId}}">Enter Wallet Amount</textarea>
      <input value="{{paticipationMovedToWalletRequested}}" class="previousRequestedWalletVal_{{lenderId}} hide"/>
    </td>
  </tr>
  {{/data}}
  </script>


<script id="totaluserwaaletaccount" type="text/template">
    {{#data}}
  <tr>
   <td>{{userId}}</td>
    <td>{{lenderName}}</td>
    <td>{{paticipatedAmount}}</td>
    <td>{{roi}}</td>
    
  </tr>
  {{/data}}
  </script>



<script id="totaluserbankaccount" type="text/template">
    {{#data}}
  <tr>
    <td>{{userId}}</td>
    <td>{{lenderName}}</td>
    <td>{{paticipatedAmount}}</td>
    <td>{{roi}}</td>
    
    
  </tr>
  {{/data}}
  </script>


<script id="viewInitiatedUsers" type="text/template">
    {{#data}}
  <tr>
    <td>{{userId}}</td>
    <td>
    {{paticipatedAmount}} 
  </td>
   <td>{{type}}</td>
    
  </tr>
  {{/data}}
  </script>


<script id="viewInitiatedbankUsers" type="text/template">
    {{#data}}
  <tr>
    <td>{{userId}}</td>
    <td>
    {{paticipatedAmount}} 
  </td>
   <td>{{type}}</td>
    
  </tr>
  {{/data}}
  </script>

<script id="viewPaidUsers" type="text/template">
    {{#data}}
  <tr>
    <td>{{userId}}</td>
    <td>
    {{paticipatedAmount}} 
  </td>
   <td>{{type}}</td>

    
  </tr>
  {{/data}}
  </script>


<script id="viewPaidbankUsers" type="text/template">
    {{#data}}
  <tr>
    <td>{{userId}}</td>
    <td>
    {{paticipatedAmount}} 
  </td>
   <td>{{type}}</td>

    
  </tr>
  {{/data}}
  </script>


<script id="viewnotreturnedUsers" type="text/template">
    {{#data}}
     <tr>
    <td>{{userId}}</td>
    <td>
    {{paticipatedAmount}} 
  </td>
   <td>{{type}}</td>
    
  </tr>
  {{/data}}
 
  </script>
<script id="viewnotreturnedbankUsers" type="text/template">
    {{#data}}
     <tr>
    <td>{{userId}}</td>
    <td>
    {{paticipatedAmount}} 
  </td>
   <td>{{type}}</td>
    
  </tr>
  {{/data}}
 
  </script>

<script id="addParticipationStatus" type="text/template">
    {{#data}}
  <tr>
    <td>{{amount}}</td>
    <td>{{upatedDate}}</td>
    
  </tr>
  {{/data}}
  </script>


<script id="addPrincipalMoreinfoStatus" type="text/template">
    {{#data}}
  <tr>
    <td>{{userId}}</td>
    <td>{{amount}}</td>
    <td>{{paidDate}}</td>
    <td>{{amountType}}</td>
    <td>{{comments}}</td> 
  </tr>
  {{/data}}
  </script>

<script id="principalInfoenable" type="text/template">
    {{#data}}
  <tr>
    <td>{{amountPaid}}</td>
    <td>
    {{paidDate}} </br>
    Remarks:{{remarksFromAdmin}}
  </td>
  </tr>
  {{/data}}
  </script>

<script>
function checkAll(e) {
    var checkboxes = document.getElementsByName('widthdrawalCheckPrincipal');
    if (e.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = true;
        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = false;
        }
    }
}
</script>

<script>
function checkwalletAll(e) {
    var checkboxes = document.getElementsByName('checkAllWalletLoadMembers');
    if (e.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = true;
        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = false;
        }
    }
}
</script>
<script type="text/javascript">
window.onload = viewDealLenders(<?php echo $dealId; ?>);
window.onload = knowViewLenderApplicationStatus(<?php echo $dealId; ?>, "INITIATED", "WALLET");
window.onload = knowViewLenderApplicationStatus(<?php echo $dealId; ?>, "INITIATED", "BANKACCOUNT");
window.onload = knowViewLenderApplicationStatus(<?php echo $dealId; ?>, "PRINCIPALRETURNED", "WALLET");
window.onload = knowViewLenderApplicationStatus(<?php echo $dealId; ?>, "PRINCIPALRETURNED", "BANKACCOUNT");
window.onload = knowViewLenderApplicationStatus(<?php echo $dealId; ?>, "PRINCIPALNOTYETRETURNED", "WALLET");
window.onload = knowViewLenderApplicationStatus(<?php echo $dealId; ?>, "PRINCIPALNOTYETRETURNED", "BANKACCOUNT");
window.onload = knowViewLenderApplicationStatus(<?php echo $dealId; ?>, "TOTALLENDERS", "WALLET");
window.onload = knowViewLenderApplicationStatus(<?php echo $dealId; ?>, "TOTALLENDERS", "BANKACCOUNT");
window.onload = principalPaidMoreInfo(<?php echo $dealId; ?>);

var sum;
$(document).on("load", ".paticipatedAmountVal", function() {
    sum = 0;
    $(".paticipatedAmountVal").each(function() {
        sum += +$(this).val();
        console.log(sum)
    });
    $(".pinfo").html(sum);
});

var dealname = "<?php echo $dealname; ?>";
$(".closingdealName").html(dealname);
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#deal-closedDate").datepicker({
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        changeMonth: true,
        changeYear: true,
        endDate: "today",
    });
});
</script>


<script type="text/javascript">
$(document).on("load", "#checkUserWalletCondition", function() {
    $("#checkUserWalletCondition").each(function() {
        if ($("#checkUserWalletCondition").val() == 0) {
            $("#checkUserWalletCondition").removeClass("userReturnStatus_WALLET").removeClass(
                "userReturnStatus_BANKACCOUNT");
        }
    });

});

var dealname = "<?php echo $dealname;?>";
$(".closingdealName").html(dealname);
</script>

<style type="text/css">
.nav-tabs {
    border-bottom: 2px solid #DDD;
}

.nav-tabs>li.active>a,
.nav-tabs>li.active>a:focus,
.nav-tabs>li.active>a:hover {
    border-width: 0;
    color: #fff;
    background: #1e5959;
}

.sub_active>li.active>a,
.sub_active>li.active>a:focus,
.sub_active>li.active>a:hover {
    border-width: 0;
    color: #fff !important;
    background: black;
     !important;
}

.nav-tabs>li>a::after {
    content: "";
    background: #5a4080;
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
    width: 20%;
    text-align: center;
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