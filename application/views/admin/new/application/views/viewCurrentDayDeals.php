<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealStatus =  isset($_GET['status']) ? $_GET['status'] : 'CURRENT';
if($dealStatus =="CURRENT"){
$dealStatus="CURRENT";
}
if($dealStatus =="closed"){
$dealStatus="CLOSED";
}
 // echo "<script>alert('$gmailcode');</script>";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="currentdealbox_div">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <h1 class="pull-left col-md-3">
               Today  Deals
            </h1>
            <div class="pull-right col-md-9 mobileDiv_2">

              <!--   <a href="viewmyDeals">
                    <button class="runningDeals-Btn btn btn-info btnRoundUp pull-right">
                        My Participated Deals
                    </button>
                </a> -->


            </div>
        </div>
        <div class="row" >
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="col-md-6 text-center">
                            <a href="viewDeals" class="pull-left" style="margin-top:20px"><button class="btn btn-primary btn-md">View Running Deals <i class="fa fa-angle-double-right"></i> </button></a>
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
                            <thead class="mobileDiv_4">
                                <tr id="example">
                                    <th width="23%">Deal Info</th>
                                    <th width="20%">Participation Details</th>
                                    <th width="18%">Duration & Time Limits</th>
                                    <th width="20%">ROI & Withdrawal Details </th>
                                    <th width="23%">Participate</th>

                                    <!-- <th>Participated Lenders</th> -->

                                </tr>
                            </thead>
                            <tbody id="displayDealsData" class="mobileDiv_3">

                                <tr style="display: none;" id="displayDelasInfo">
                                    <td colspan="12" class="text-bold"> <span class="currentdealNotepoint"> No deals created today. Let's check active deals.</span><i class="fa fa-spinner fa-spin currentdealnotfound  mx-3"></i> </td>
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
<script id="displayDealsScript" type="text/template">
    {{#data}}
  <tr class="deal-{{fundingStatus}} divBlock_Mob_001">
    <td class="dealName numeric knowAtmType">
      <span class="mobile_res earningbloack"><b>Deal Name:</b> {{dealName}}
       <span class="warm_message pull-right isAtm_{{withdrawStatus}}" style="display:none">ATW</span>
      </span>

       <span class="mobile_View_Hide"><b>Deal Id:</b> {{dealId}}  </span>     

          
               {{#firstParticipationDate}}
                <br/>
               <span class="mobile_View_Hide"><b>Started :</b> {{firstParticipationDate}}  </span> 
               {{/firstParticipationDate}}

               {{^firstParticipationDate}}
                <br/>
               <span class="mobile_View_Hide"><b>Started :</b> No one  participated Till Now </span>  
              {{/firstParticipationDate}} 

                {{#lastParticipationDate}}
                <br/>
               <span class="mobile_View_Hide"><b>Last Participated :</b> 
               {{lastParticipationDate}} </span> 
               {{/lastParticipationDate}}

                {{#dealLink}}
               <br/>
               <span class="mobile_View_Hide"><b>Borrower Documents :</b> <a href="{{dealLink}}" target="_blank">Click here to View</a> </span> 
               {{/dealLink}}



               {{#messageSentToLenders}}
               <br/>
               <span class="mobile_View_Hide"><b>Deal Specific Comments :</b> {{messageSentToLenders}}  </span> 
               {{/messageSentToLenders}}
           

             </td>
             <td class="dealAmount numeric">
            <span class="lable_mobileDiv mobile_View_Hide">Deal Limits </span>
             <span class="mobile_View_Hide"><b> Participated Amount : </b> 
              <span class="numdigitsvalues" value="{{totalPaticipatedAmount}}"> {{totalPaticipatedAmount}}  </span> 
              </span><br/>
              <span class="mobile_res">  
               <b> Available Limit</b>:
              <span class="numdigitsvalues" value="{{remainingAmountToPaticipateInDeal}}"> {{remainingAmountToPaticipateInDeal}}  </span> 

                </span>

               <span class="mobile_res">   <b> Deal Value </b>:
                <span class="numdigitsvalues" value="{{dealAmount}}"> {{dealAmount}}  </span> 
             </span>
              <!-- <span class="mobile_View_Hide"><b>Fund Status : </b> {{fundingStatus}} -->
                  </td>
   
             <td class="duration numeric">
                
             <span class="lable_mobileDiv">Duration : {{duration}} Months </span>
                   <span class="mobile_View_Hide"> <b> Tenure :- </b> {{duration}} Months</span><br/>

                <p class="mobile_View_Hide" style="margin: 10px 0 10px"> <b> Participation Limits :-</b><br/>
                 <span class="mobile_View_Hide"><b>Min :</b>
                <span class="numdigitsvalues" value="{{minimumAmountInDeal}}">{{minimumAmountInDeal}}</span>
                </span><br/>
                 <span class="mobile_View_Hide"><b>Max :</b> <span class="numdigitsvalues" value="{{lenderPaticipationLimit}}">{{lenderPaticipationLimit}}</span> </span><br/>
                 </p>  
               </td>
                 <td class="numeric mobile_view_Atm"> 

                 <span class="lable_mobileDiv"><b>Payable ROI :</b>  



                {{rateOfInterest}} 


                  </span>      
                <span class="lable_mobileDiv pull-right">
                 <b>Withdrawal Details :- </b>
                 <span> <b>ATW :</b> {{withdrawStatus}}</span> </br> 
                 <span class="withdraw_roi_{{withdrawStatus}}" style="display:none" ><b>Withdrawal ROI:</b> {{roiForWithdraw}}  % </span> 
                </span>

               <span class="mobile_View_Hide"><b>Payable ROI :</b>  
               {{rateOfInterest}} 



   


                </span>
         
                 <br/>
                  <p class="mobile_View_Hide" style="margin:15px 0px 0px 0px"> <b>Withdrawal Details :- </b>  <br/>
                <span class="mobile_View_Hide"> <b>ATW :</b> {{withdrawStatus}} </span><br/>
               <span class="mobile_View_Hide withdraw_roi_{{withdrawStatus}}" style="display:none"><b>Withdrawal ROI:</b> {{roiForWithdraw}}  % </span>
                </p>
                <i class="fa fa-info-circle fl myinfos mobile_View_Hide pull-right" data-toggle="tooltip" data-placement="left"
                  title="If a lender chooses ATW(Any Time Withdrawal) for a deal, the ROI will be changed to a lesser percentage than opted. ATW ROI may not be the same for all deals."></i>
               </td>
  
            <td class="participateBTN_001 numeric">
             <span class="lable_mobileDiv">Participate </span>
              <a class="btn-{{fundingStatus}} isparticipatingStatus-{{lenderPaticipateStatus}}" href="participateDeal?id={{dealId}}">
              <button class="btn btn-success btn-sm numeric" id="myBtn"><span class="fa fa-flash btn-sm"></span> Participate</button>
              </a> <br/>

                <p style="margin:15px 0px 0px 0px">   
                 <b> Deal opened & Closed Time </b><br/>
                 {{fundsAcceptanceStartDate}} <b> to </b> {{fundsAcceptanceEndDate}}

                  </p>


            </td>
  </tr>
  {{/data}}
  </script>
<script type="text/javascript">
$(document).ready(function() {
    //$('.loadingSec').show();
});
window.onload = viewCurrentDayDeals('<?php echo $dealStatus;  ?>');
setTimeout(function() {
    digits();
}, 3000);
</script>

<script>
setTimeout(function() {
    $(".numeric .earningbloack .warm_message").each(function(index) {
        var element = $(".warm_message");

        if (element[index].classList.contains(".isAtm_YES")) {
            $(".isAtm_YES").html("ATW");
        } else {
            $(".isAtm_NO").hide();

        }
    });
}, 1000);
</script>
<!-- /.content -->
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php include 'footer.php';?>