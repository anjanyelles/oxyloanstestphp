<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Rejected Loans
        </h1>

        <div class="pull-right">
            <a href="borroweragreedloans">
                <button type="button" class="btn btn-success pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Agreed Loans</b>
                </button>
            </a>

            <a href="borrowerrejectedrequests">
                <button type="button" class="btn btn-warning pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Rejected Offers</b>
                </button>
            </a>

            <a href="borroweracceptedrequests">
                <button type="button" class="btn btn-primary pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Accepted Offers</b>
                </button>
            </a>

            <a href="borrowerresponsestoMyrequests?appNumber=787" class="viewLendersOffers">
                <button type="button" class="btn btn-info pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Responses to my offer</b>
                </button>
            </a>
        </div>
    </section>
    <div class="cls"></div>

    <!-- Main content -->
    <section class="content">


        <div class="loanlenderListingsSection">
            <div class="cls"></div>
            <div class="pull-right">
                <div class="row">
                    <div class="col-md-12">
                        <div class="rejectedloansPagination">
                            <ul class="pagination bootpag">
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="cls"></div>
        <div class="displayRejectedloans" id="displayRejectedloans">

        </div>


    </section>

    <script id="displayallRejectedloans" type="text/template">
        {{#data}}
        <div class="col-md-4">
          <div class="box box-widget widget-user">
            <div class="widget-user-header bg-green">
              <h3 class="widget-user-username">{{user.firstName}} {{user.lastName}}</h3>
              <h5 class="widget-user-desc">BR{{userDisplayId}}</h5>
               <h5 class="widget-user-desc"> {{loanRequest}}</h5>
              <h5 class="widget-user-desc">Duration: {{duration}}M</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="{{user.profilePicUrl}}" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{loanRequestAmount}}</h5>
                    <span class="description-text">Offered</span>
                  </div>
                </div>
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{rateOfInterest}}%</h5>
                    <span class="description-text">Interest</span>
                  </div>
                </div>
               
              </div>
              <div class="cls"></div>
              <div class="box-footer">
                 <div>
                   <progress value="{{loanDisbursedAmount}}" max="{{loanRequestAmount}}" style="width: 100%;"></progress>
                 </div>

                 <div class="clear"></div>
                 <div>
                   Amount available on:- {{expectedDate}}
                 </div>
                 <div class="pull-left padt20" style="display: none;">
                  <a href="borrowerviewloanoffer?loanid={{loanRequestId}}"><button type="submit" class="btn btn-success">Participated Lenders</button></a>
                </div>
               <div class="pull-right padt20"> 
          
                </div>  
              </div>
            </div>
          </div>
        </div>
{{/data}}
 </script>

</div>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
loadRejectedloans();
</script>
<?php include 'footer.php';?>