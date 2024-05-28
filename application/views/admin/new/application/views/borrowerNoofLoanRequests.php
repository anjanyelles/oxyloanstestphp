<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <setcion class="content-header" style="position: static;">
        <h1>
            My Loan Requests
        </h1>
        <div class="pull-left">
            <small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">My Loans</li>
                </ol>
            </small>
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
                            <div class="borrowerLoansRequestPagination">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                            <div class="searchborrowerPagination" style="display: none;">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cls"></div>
            <div class="loadallloansListings" id="loadallloansListings">

            </div>

        </section>
</div>

<script id="loadallloansListingsTpl" type="text/template">
    {{#data}}
        <div class="col-md-4">
          <div class="box box-widget widget-user">
            <div class="widget-user-header bg-green">
              <h3 class="widget-user-username">{{user.firstName}} {{user.lastName}}</h3>
              <h5 class="widget-user-desc">LR{{userDisplayId}}</h5>
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
                   Amount available on:-{{expectedDate}}
                 </div>
                
               <div class="pull-right padt20"> 
                  <a href="borrowerresponsestoMyrequests?appNumber=0"><button type="submit" class="btn btn-primary">Responses</button></a>
                </div>  
              </div>
            </div>
          </div>
        </div>
{{/data}}
</script>

<script type="text/javascript">
loadallMyLoanRequests();
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'footer.php';?>