<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <setcion class="content-header" style="position: static;">

        <h1>
            Favourite Borrowers
        </h1>
        <div class="pull-left">
            <small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Loan Listings</li>
                </ol>
            </small>
        </div>
        <div class="pull-right">
            <a href="borrowerraisealoanrequest">
                <button type="button" class="btn btn-success pull-right"><i class="fa fa-angle-double-right"></i>
                    <b>Apply for a Loan</b>
                </button>
            </a>
            <a href="borroweragreedloans">
                <button type="button" class="btn btn-primary pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Agreed Loans</b>
                </button>
            </a>
        </div>
        </section>

        <div class="cls"></div>
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-xs-3 text-center">
                    <select class="form-control choosenType" id="type">
                        <option value="">-- Choose --</option>
                        <option value="amount">Amount</option>
                        <option value="roi">ROI</option>
                        <option value="searchWithID">Lender ID</option>
                    </select>
                    <span class="errorsearch" style="display: none;">Please choose option.</span>
                </div>

                <div class="col-xs-3 text-center searchWithID" style="display: none;">
                    <input type="text" name="searchWithID" class="form-control searchWithID searchWithIDinput"
                        placeholder="Lender ID">
                </div>

                <div class="col-xs-3 text-center amount" style="display: none;">
                    <input type="text" name="amount" class="form-control minAmount" placeholder="Min Amount">
                </div>
                <div class="col-xs-3 text-center amount" style="display: none;">
                    <input type="text" name="amount" class="form-control maxAmount" placeholder="Max Amount">
                </div>

                <div class="col-xs-3 text-center roi" style="display: none;">
                    <input type="text" name="ROI" class="form-control minRoi" placeholder="Min ROI">
                </div>
                <div class="col-xs-3 text-center roi" style="display: none;">
                    <input type="text" name="ROI" class="form-control maxRoi" placeholder="Max ROI">
                </div>

                <div class="col-xs-3 text-center">
                    <button type="button" class="btn bg-gray pull-left search-btn"
                        onclick="searchborrowerLoanEntries();"><i class="fa fa-angle-double-right"></i> <b>Search</b>
                    </button>
                </div>
            </div>


            <div class="loanlenderListingsSection">
                <div class="cls"></div>
                <div class="pull-right">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="borrowerLoanListingsPagination">
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
            <div class="loadloanListings" id="loadloanListings">

            </div>


            <!-- box 1 -->


            <script id="loanListiongsTpl" type="text/template">
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
                   Amount available on:- {{expectedDate}}
                 </div>
                 <div class="pull-left padt20" style="display: none;">
                  <a href="borrowerviewloanoffer?loanid={{loanRequestId}}"><button type="submit" class="btn btn-success">Participated Lenders</button></a>
                </div>
               <div class="pull-right padt20"> 
                  <a onclick="checkOutstandingAmount({{loanRequestId}},{{outStandingAmount}})"><button type="submit" class="btn btn-primary">Application</button></a>
                </div>  
              </div>
            </div>
          </div>
        </div>
{{/data}}
</script>
</div>




<script type="text/javascript">
loadfavouriteBorrowers();
</script>
<!-- /.content-wrapper -->
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>


<?php include 'footer.php';?>