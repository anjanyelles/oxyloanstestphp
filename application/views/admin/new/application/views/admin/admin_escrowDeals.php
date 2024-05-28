<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealStatus =  isset($_GET['status']) ? $_GET['status'] : 'HAPPENING';
 // echo "<script>alert('$gmailcode');</script>";
if($dealStatus =="running"){
$dealStatus="HAPPENING";
}
if($dealStatus =="closed"){
$dealStatus="CLOSED";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <h3 class="pull-left col-md-6">
                Running & Closed Escrow Deals
                </h1>
                <div class="row col-xs-12 col-12">
                          
                            <div class="col-sm-3">
                                <input type="text" name="updating" class="form-control" placeholder="Enter The Deal Name" id="searchDealIdInfo">
                            
                            </div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-xm btn-primary col-sm-3" id="profit-submit-btn"
                                    onclick="searchDealInformation('ESCROW');">Search</button>


                            </div>
                        </div>


        </div>
        </br></br></br></br></br>
        <div class="alert alert-success dealClosedSuccess" role="alert" style="display: none;">
            <strong>Deal Closed successfully.</strong>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="col-md-6 runningheader">
                            <a href="escrowDeals?status=running">
                                <button class=" btn btn-success btnRoundUp" style="border-radius: 5px;">
                                    Escrow Running Deals <i class="fa fa-angle-double-right"></i>
                                </button>
                            </a>

                            <a href="escrowDeals?status=closed" class="compleated-Btn">
                                <button class=" btn btn-warning btnRoundUp"
                                    style="border-radius: 5px; margin-left: 10px;">
                                    Escrow Participation Closed Deals <i class="fa fa-angle-double-right"></i>
                                </button>
                            </a>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="dashBoardPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                            <div class="searchborrowerPagination pull-right" style="display: none;">
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
                                    <th>Deal Name</th>
                                    <th>Deal Info</th>
                                    <th>Deal User</th>


                                    <th>Modify</th>
                                    <th>View Participated Users</th>
                                    <th>Know More</th>
                                </tr>
                            </thead>
                            <tbody id="displayDealsData">

                                <tr style="display: none;" id="displayDelasInfo">
                                    <td colspan="12">No data found</td>
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

    <script id="displayDealsScript" type="text/template">
        {{#data}}
     <tr class="dealClosedUser_{{dealCurrentAmount}}">
      
        <td>
          <b> Deal name </b>:{{dealName}} </br> 

          Deal Id :{{dealId}} </br> 


        <b>Aggrements : {{agreementsGenerationStatus}}</b>

         </br> 


           {{#firstParticipationDate}}
             First Participation : <b> {{firstParticipationDate}}</b></br> 
            {{/firstParticipationDate}}
            {{^firstParticipationDate}}
             First Participation : <b> No Data</b></br> 
             {{/firstParticipationDate}}

           {{#lastParticipationDate}}
           Last Participation : <b> {{lastParticipationDate}}</b>
           {{/lastParticipationDate}}
           {{^lastParticipationDate}}
            Last Participation : <b> No Data</b>
            {{/lastParticipationDate}}


      <!--    <b> Deal Amount </b>:  {{dealAmount}}  -->
        </td>
        <td>
        Participate :   {{dealPaticipatedAmount}} </br> </br> 
        Current Amount : {{dealCurrentAmount}} </br> </br> 
         To Wallet : {{#dealAmountReturnedToWallet}} 
                      {{dealAmountReturnedToWallet}} 
                    {{/dealAmountReturnedToWallet}} 
                    {{^dealAmountReturnedToWallet}} 
                             0
                     {{/dealAmountReturnedToWallet}}


            </br> </br> 
          Return Principal : {{#withdrawalAndPrincipalReturned}}
               {{withdrawalAndPrincipalReturned}}
           {{/withdrawalAndPrincipalReturned}}
            {{^withdrawalAndPrincipalReturned}}
            0
             {{/withdrawalAndPrincipalReturned}}

        </td>

  <td style="width:22%!important; overflow: hidden; word-break: break-word;">
    Borrower :{{borrowerName}}</br>
  Borrower ROI :{{borrowerRateOfInterest}}</br>
  Lender ROI :{{rateOfInterest}} </br>
  Status :{{fundingStatus}}</br>

  <b>Deal Amount : <span class="numdigitsvalues" value="{{dealAmount}}"> {{dealAmount}}</span> </b>

  </br>


  {{#emiEndDate}}
    <b>Emi date : {{emiEndDate}}  </b>
    {{/emiEndDate}}


        </td>

      <!--   <td>{{borrowerName}}</td>
        <td>{{borrowerRateOfInterest}}</td>
        <td>{{averageValueForLender}}</td>
        <td>{{fundingStatus}}</td> -->
        
        <td><a href="editDealInfo?id={{dealId}}">
            <button class="btn btn-warning btn-sm"><span class="fa fa-edit"></span> Edit</button>
            </a>
            </br>
          <button class="btn btn-sx btn-danger dealStatus-{{fundingStatus}}" style="margin-top:10px;" onclick="closeTheDealStatus({{dealId}});">Stop Participation</button>


            </br>
            </br>
            <button class="btn btn-sx btn-info reOpenStatus-{{fundingStatus}}" onclick="reopenDeal({{dealId}});">Deal Reopen</button>


        </td>
        <td><a href="viewDealLenders?id={{dealId}}&dealName={{dealName}}">
            <button class="btn btn-success btn-sm"><span class="fa fa-eye"></span> View Lenders</button>
        </a></br></br>

        <a href="dealWithdrawinfo?id={{dealId}}"> <button class="btn btn-primary btn-sm"><span class="fa fa-money"></span> Withdrawal Request</button></a>


                 </br></br>

        <button type="button" class="btn btn-sm btn-dealsummery" onclick="viewdealsummaryPrincipal('{{dealId}}','PRINCIPAL','{{dealName}}')"> <span class="fa fa-money"></span> Principal Summary</button>

        
      </td>
        <td>

      <!--     <a href="{{dealLink}}" targer="_blank">
          <button class="btn btn-sx btn-info">Deal Link</button>
        </a>

      </br> -->


          <a href="lendersInterest?id={{dealId}}" targer="_blank">
          <button class="btn btn-sx btn-primary" style="margin-top:10px;">Pay Interest</button>
        </a>
        

         </br>
         <button class="btn btn-sx btn-info" style="margin-top:8px;" onclick="initiatingNotification({{dealId}});">Initiating Notifications</button>

         </br></br>

                 <button type="button" class="btn  btn-sm btn btn-dealsummery" onclick="viewdealsummaryInterest('{{dealId}}','INTEREST','{{dealName}}')"> <span class="fa fa-money"></span> Interest Summary</button>    


      </td>
       
    </tr>          
  {{/data}}
</script>
    <script type="text/javascript">
    window.onload = viewEquityDeals('<?php echo $dealStatus; ?>', "ESCROW");
    setTimeout(function() {
        digits();
    }, 3000);
    </script>
    <script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <?php include 'admin_footer.php';?>