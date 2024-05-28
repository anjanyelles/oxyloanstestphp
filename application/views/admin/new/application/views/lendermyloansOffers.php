<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="title-requested">
            Offers Sent to the Borrowers
        </h1>


        <div class="pull-right">

            <a href="lenderagreedloans">
                <button type="button" class="btn btn-success pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Agreed Loans</b>
                </button>
            </a>

            <a href="lenderrejectedrequests">
                <button type="button" class="btn btn-warning pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Rejected Offers</b>
                </button>
            </a>

            <a href="lenderacceptedrequests">
                <button type="button" class="btn btn-primary pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Accepted Offers</b>
                </button>
            </a>

            <a href="lenderresponsestoMyrequests?appNumber=0" class="viewLendersOffers">
                <button type="button" class="btn btn-success pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Responses</b>
                </button>
            </a>

            <button style="display: none" type="button" class="btn btn-primary pull-right marR15 offersSentLender"><i
                    class="fa fa-angle-double-right"></i> <b>Offers Sent</b>
            </button>
        </div>

    </section>
    <div class="cls"></div>

    <!-- Main content -->
    <section class="content">



        <div class="cls"></div>

        <div class="row customFormQ">
            <div class="cls"></div>
            <div class="pull-left">
                <p>
                    If the loan status is "Accepted", Please transfer funds to your virtual account and then go to <a
                        href="lenderagreedloans">agreed loans</a> to download the agreement and complete the eSign.
                </p>
            </div>
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


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Borrower Name</th>
                                    <th>Application Number</th>
                                    <th>Loan Amount</th>
                                    <th>Rate of Interest</th>
                                    <th>Loan purpose</th>
                                    <th>Applied on</th>
                                    <th>Loan needed by</th>
                                    <th>Status</th>
                                    <th>OxyLoans Comments</th>

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
                  <td>{{borrowerUser.firstName}} {{borrowerUser.lastName}}</td>
                  <td>{{loanRequest}}</td>
                  <td>{{loanRequestAmount}}</td>
                  <td>{{rateOfInterest}}
                    <span style='display:none' class="loanTypeisI loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> % PA</span>
                        <span style='display:none' class="loanTypeisDays loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"> Per Day</span>

                         <span style='display:none' class="loanTypeisI loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"></span>

                       <span style='display:none' class="loanTypeisDays loanTypeis{{borrowerUser.commentsRequestDto.durationType}}"></span>

                  </td>
                  <td>{{loanPurpose}}</td>
                  <td>{{loanRequestedDate}}</td>
                  <td>{{expectedDate}}</td>
                  <td>{{loanStatus}}</td>
                  <td><p class="loansis{{loanStatus}}">Please transfer funds to your virtual account and then go to agreed loans to download the agreement and complete the eSign.</p></td>
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