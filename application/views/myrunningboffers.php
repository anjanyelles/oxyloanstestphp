<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Loan requests sent to the Lenders
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

            <a href="borrowerresponsestoMyrequests?appNumber=0" class="viewLendersOffers">
                <button type="button" class="btn btn-success pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Responses</b>
                </button>
            </a>
        </div>

    </section>
    <div class="cls"></div>

    <!-- Main content -->
    <section class="content">



        <div class="cls"></div>

        <div class="row customFormQ">
            <div class="cls"></div>
            <div class="pull-right">
                <div class="row">
                    <div class="col-md-12">
                        <div class="acceptedPagination">
                            <ul class="pagination bootpag">
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="pull-right">
                            <!-- 
		           	<a href="lenderagreedloans">
		              <button type="button" class="btn btn-success pull-right marR15"><i class="fa fa-angle-double-right"></i> <b>Agreed Loans</b>
		            </button>
		           </a>

		           <a href="lenderrejectedrequests">
		              <button type="button" class="btn btn-warning pull-right marR15"><i class="fa fa-angle-double-right"></i> <b>Rejected Offers</b>
		            </button>
		           </a>
		           
		           <a href="lenderacceptedrequests">
		              <button type="button" class="btn btn-primary pull-right marR15"><i class="fa fa-angle-double-right"></i> <b>Accepted Offers</b>
		            </button>
		           </a>

		           <a href="lenderresponsestoMyrequests?appNumber=787" class="viewLendersOffers">
		              <button type="button" class="btn btn-info pull-right marR15"><i class="fa fa-angle-double-right"></i> <b>Responses to my offer</b>
		            </button>
		           </a>
		       -->
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Lender Name
                                    </th>
                                    <th>Application Number</th>
                                    <th>Loan Amount</th>
                                    <th>Rate of Interest</th>
                                    <th>Loan purpose</th>
                                    <th>Applied on</th>
                                    <th>Loan needed by</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody id="displayRequests" class="displayRequests">
                                <tr id="displayNoRecords" class="displayRequests">
                                    <td colspan="8">No Offers found!</td>
                                </tr>
                                <!-- <td><a href="lenderAcceptedoffers?appNumber={{loanRequestId}}">{{loanRequest}}</a></td>
				    -->
                                </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- form start -->

            </div>
            <!-- /.box -->
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script id="displayallRequests" type="text/template">
    {{#data}}
                <tr>
                  <td>{{lenderUser.firstName}} {{lenderUser.lastName}}</td>
                  <td>{{loanRequest}}</td>
                  <td>{{loanRequestAmount}}</td>
                <td>{{rateOfInterest}}<span style='display:none' class="loanTypeisI loanTypeis{{borrowerUser.commentsRequestDto.durationType}} "> % PA</span>
                        <span style='display:none' class="loanTypeisDays loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Per Day</span>
                      </td>
                  <td>{{loanPurpose}}</td>
                  <td>{{loanRequestedDate}}</td>
                  <td>{{expectedDate}}</td>
                  <td>{{loanStatus}}</td>
                </tr>
            {{/data}}
  </script>


<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".loadingSec").show();
});
setTimeout(function() {
    loadRequestsSent();
}, 1000);
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
<?php include 'footer.php';?>