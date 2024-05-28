<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <setcion class="content-header" style="position: static;">

        <h1>
            Accepted Loans
        </h1>
        <div class="pull-right mobile_View_div">
            <a href="borroweragreedloans" class="mobile_View_div_a">
                <button type="button" class="btn btn-success pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Agreed Loans</b>
                </button>
            </a>
            <a href="borrowerrejectedrequests" class="mobile_View_div_a">
                <button type="button" class="btn btn-warning pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Rejected Offers</b>
                </button>
            </a>

            <a href="borroweracceptedrequests" class="mobile_View_div_a">
                <button type="button" class="btn btn-primary pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Accepted Offers</b>
                </button>
            </a>
            <a href="borrowerresponsestoMyrequests?appNumber=787" class="viewLendersOffers mobile_View_div_a">
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
                            <div class="acceptedloansPagination">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="cls"></div>
            <div class="displayAcceptedLoans" id="displayAcceptedLoans">

            </div>

            <!-- box 1 -->

            <script id="displayallAcceptedLoans" type="text/template">
                {{#data}}
  <div class="col-md-4">
    <div class="box box-widget widget-user">
      <div class="widget-user-header bg-green">
        <h3 class="widget-user-username">{{user.firstName}} {{user.lastName}}</h3>
        <h5 class="widget-user-desc">BR{{userDisplayId}}</h5>
        <h5 class="widget-user-desc"> {{loanRequest}}</h5>
        <h5 class="widget-user-desc">Duration: {{duration}}
        <span style='display:none' class="loanTypeisI loanTypeis{{durationType}}"> Months</span>
        <span style='display:none' class="loanTypeisDays loanTypeis{{durationType}}"> Days</span>
        </h5>
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
<script type="text/javascript">
loadAcceptedLoans();
</script>
<style type="text/css">
span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisDays.loanTypeisDays {
    display: inline !important;
}

span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisI.loanTypeisI,
span.loanTypeisI.loanTypeis {
    display: inline !important;
}

span.loanTypeisI.loanTypeisDays {
    display: none !important;
}

span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisDays.loanTypeis {
    display: none !important;
}

span.loanTypeisDays.loanTypeisMonths {
    display: none !important;
}
</style>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'footer.php';?>