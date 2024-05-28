<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Rejected Offers
        </h1>
        <div class="pull-left">
            <small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">Loan Requests</li>
                </ol>
            </small>
        </div>
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

            <a href="lenderresponsestoMyrequests?appNumber=787" class="viewLendersOffers">
                <button type="button" class="btn btn-info pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Responses to my offer</b>
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
                        <div class="rejectedPagination">
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
                        <h3 class="box-title">Rejected Offers</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr>
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
                                <!--     
         <td><a href="lenderresponsestoMyrequests?appNumber={{loanRequestId}}">{{loanRequest}}</a></td> 

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


<script id="displayallRequests" type="text/template">
    {{#data}}
                <tr>
                  <td><a href="#">{{loanRequest}}</a></td>
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
                  <td align="center" class="actions_borrowings hide">
                    <a href='#'>
                      <i class="fa fa-pencil-square-o" aria-hidden="true" class="blue"></i>
                    </a>
                    <a href='#'>
                      <i class="fa fa-trash red" aria-hidden="true" data-toggle="modal" data-target="#deleteRecord"></i>
                    </a>
                    <a href='displayResponse.php'>
                      <i class="fa fa-external-link black" aria-hidden="true" data-toggle="modal" data-target="#openResponse"></i>
                    </a>
                  </td>
                </tr>
            {{/data}}
            </script>
<!-- /.content-wrapper -->
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
loadRejectedrequests();
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