<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <setcion class="content-header" style="position: static;">
        <div class="col-md-12">
            <h1>
                Loan Listings
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
                <a href="lenderraisealoanrequest" style="display: none;">
                    <button type="button" class="btn btn-success pull-right"><i class="fa fa-angle-double-right"></i>
                        <b>Increase Your Commitment</b>
                    </button>
                </a>
                <a href="lenderagreedloans">

                    <button type="button" class="btn btn-primary pull-right marR15"><i
                            class="fa fa-angle-double-right"></i> <b>Agreed Loans</b>
                    </button>
                </a>
            </div>
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
                        <option value="borrowerID">Borrower ID</option>
                    </select>
                    <span class="errorsearch" style="display: none;">Please choose option.</span>
                </div>
                <div class="col-xs-3 text-center borrowerIDBlock" style="display: none;">
                    <input type="text" name="borrowerID" class="form-control borrowerID" placeholder="Borrower ID">
                </div>
                <div class="col-xs-3 text-center amount" style="display: none;">
                    <input type="text" name="amount" class="form-control minAmount" placeholder="Min Amount (INR 5000)">
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
                        onclick="searchLoanlenderEntries();"><i class="fa fa-angle-double-right"></i> <b>Search</b>
                    </button>
                </div>
            </div>



            <div class="loanlenderListingsSection">
                <div class="cls"></div>
                <div class="pull-right">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="lenderLoanListingsPagination">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>

                            <div class="searchPagination" style="display: none;">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cls"></div>
            <div class="loadborrowerloanListings" id="loadborrowerloanListings">

                <div class="no_LoanListing" style="display:none">
                    <h3>NO USER FOUND</h3>
                </div>

            </div>


            <!-- box 1 -->


            <script id="loanListiongsTpl" type="text/template">

                {{#data}}
        <div class="col-md-4">
          <div class="box box-widget widget-user">
            <div class="widget-user-header bg-green">
              <h3 class="widget-user-username">{{user.firstName}} {{user.lastName}}</h3>
              <h5 class="widget-user-desc">BR{{userDisplayId}}</h5>
               <h5 class="widget-user-desc"> {{loanRequest}}</h5>
              <h5 class="widget-user-desc">Duration: {{offerSentDetails.duaration}}
                       <span style='display:none' class="loanTypeisI loanTypeis{{user.commentsRequestDto.durationType}}">M</span>
                          <span style='display:none' class="loanTypeisDays loanTypeis{{user.commentsRequestDto.durationType}}">Days</span>
              </h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="{{user.profilePicUrl}}" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{offerSentDetails.loanOfferedAmount}}</h5>
                    <span class="description-text">Required</span>
                  </div>
                </div>

                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{offerSentDetails.rateOfInterestToLender}}%</h5>
                    <span class="description-text">Lender Interest</span>
                  </div>
                </div>

               
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Oxy Score</h5>
                    <span class="description-text oxyScore-0{{user.oxyScore}}">
                        {{#user.oxyScore}}
                          {{user.oxyScore}}
                      {{/user.oxyScore}}

                      {{^user.oxyScore}}
                         YTR
                      {{/user.oxyScore}}
                    </span>
                  </div>
                </div>
              </div>
              <div class="cls"></div>
              <div class="box-footer">
                 <div>
                   <progress value="{{loanDisbursedAmount}}" max="{{offerSentDetails.loanOfferedAmount}}" style="width: 100%;"></progress>
                 </div>

                 <div class="clear"></div>
                 <div>
                   Amount Required on:- {{expectedDate}}
                 </div>
                 <div class="pull-left padt20">
                  <a href="javascript:void(0)" onclick="participatedlenders({{user.id}})"><button type="submit" class="btn btn-success">Participated Lenders</button></a>
                </div>
                <div class="pull-right padt20 hideIF{{loanDisbursedPercentage}}">
                  <a href="lenderviewloanoffer?loanid={{loanRequestId}}"><button type="submit" class="btn btn-primary">Application</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
{{/data}}
</script>
</div>


<div class="modal fade" id="modal-participatedlenders">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Responses to this Request.</h4>
            </div>
            <div class="modal-body">
                <table id="" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Lender</th>
                            <th>Loan Amount</th>
                            <th>ROI</th>
                            <th>Profit</th>
                        </tr>
                    </thead>
                    <tbody id="displayRequests" class="displayRequests">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<script id="displayallparticipatedRequests" type="text/template">
    {{#data}}
                <tr class="nodata-pl">
                  <td>LR{{lenderUser.id}}</td>
                  <td>{{loanRequestAmount}}</td>
                  <td>{{rateOfInterest}}%</td>
                  <td style="color: green;"><b>{{profit}}</b></td>
                </tr>
            {{/data}}
            </script>
<script type="text/javascript">
loadborrowerloanListings();
$(".oxyScore-00").html("YTR");
</script>
<!-- /.content-wrapper -->
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<style>
.content {
    float: left;
    width: 100%;
    width: 100%;
    float: left;
}
</style>
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

<?php include 'footer.php';?>