<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<?php
   $urlfromBroweser = $_SERVER['REQUEST_URI'];
  //echo $urlfromBroweser;
  $appNumber = $_GET['appNumber'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Responses from the borrowers
        </h1>
        <div class="pull-left">
            <small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Loan Listings</li>
                    <span class="loanrequestIDP hide"><?php echo $appNumber; ?></span>
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

            <a href="lendermyloansOffers" class="viewLendersOffers">
                <button type="button" class="btn btn-info pull-right marR15"><i class="fa fa-angle-double-right"></i>
                    <b>Offers Sent</b>
                </button>
            </a>
        </div>
    </section>

    <div class="cls"></div>
    <!-- Main content -->
    <section class="content">
        <div class="row customFormQ">
            <div class="cls"></div>
            <div class="pull-right">
                <div class="row">
                    <div class="col-md-12">
                        <div class="responsetomyloanrequestPagination">
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
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <section class="content">
                        <div class="row customFormQ">
                            <!-- left column -->
                            <div class="col-md-12">

                                <div id="displayNoRecords" class="displayNoRecords" style="display: none;">
                                    <b>Awaiting response from the Borrowers.You will be notified through Email and SMS
                                        about the status of your offer.</b>
                                </div>
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="loadresponsetoMyrequest" id="loadresponsetoMyrequest">

                                </div>



                                <!-- -->
                                <div class="" id="display_negotiate_section" style="display: none;">
                                    Test
                                </div>
                                <!-- -->



                                <!-- /.widget-user -->
                            </div>
                            <!-- box 1 ends -->
                        </div>
                </div>
    </section>
</div>
<!-- /.box -->
</div>


</section>
<!-- /.content -->
</div>

<!-- /.content-wrapper -->

<div class="modal modal-success fade" id="modal-success">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Congratulations!</h4>
            </div>
            <div class="modal-body">
                <p>Congratulations, You've accepted the offer from <span>LR12345</span> and here is the accepted info.
                </p>
                <p>

                </p>
            </div>
            <div class="modal-footer">
                <a href="generateagreement.php">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close and take me to
                        the next steps.</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<div class="modal modal-danger fade" id="modal-danger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Rejected</h4>
            </div>
            <div class="modal-body">
                <p>You've rejected the offer from LR1234 and offer details</p>
            </div>
            <div class="modal-footer">
                <a href="responsestoMyrequests.php">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close & Take me to the
                        other offers.</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<style>
.example-modal .modal {
    position: relative;
    top: auto;
    bottom: auto;
    right: auto;
    left: auto;
    display: block;
    z-index: 1;
}

.example-modal .modal {
    background: transparent !important;
}
</style>

<script id="loanListiongsTpl" type="text/template">
    {{#data}}
        <div class="col-md-4 entrieBlock-{{loanRequestId}}" data-tmp-id="id-{{loanRequest}}">
          <div class="box box-widget widget-user">
            <div class="widget-user-header bg-green">
              <h3 class="widget-user-username">{{user.firstName}} {{user.lastName}}</h3>
              <h5 class="widget-user-desc">BR{{userDisplayId}}</h5>
               <h5 class="widget-user-desc"> {{loanRequest}}</h5>
              <h5 class="widget-user-desc">Duration: {{duration}}



                       <span style='display:none' class="loanTypeisI loanTypeis{{durationType}}"> M</span>

                          <span style='display:none' class="loanTypeisDays loanTypeis{{durationType}}"> Days</span>




              </h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="{{user.profilePicUrl}}" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{loanRequestAmount}}</h5>
                    <span class="description-text">Required</span>
                  </div>
                </div>
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{loanRequestedDate}}</h5>
                    <span class="description-text">Loan Request Date</span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Oxy Score</h5>
                    <span class="description-text oxyScore-0{{user.oxyScore}}">{{user.oxyScore}}</span>
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
                   Amount Required on:- {{expectedDate}}
                 </div>
                  <div class="displayActionButtons-{{loanStatus}} userReacted">
                     <div class="pull-left padt20">
                      <!--  onclick="respondToLoanRequest('Accepted', {{loanRequestId}})" -->

                    <a href="javascript:void(0)"  class="resptoLoanar" data-loanRequestId={{loanRequestId}} data-action-type ="Accepted" data-toggle="modal" data-target="#promptAccUser"  onclick="userresponding('Accepted', {{loanRequestId}});">
                      <button type="submit" class="btn btn-success">Accept</button></a>
                  </div>
    
                       <!-- onclick="respondToLoanRequest('Rejected', {{loanRequestId}})" -->
                  <div class="pull-right padt20" >
                    <a href="javascript:void(0)"   class="resptoLoanar" data-loanRequestId={{loanRequestId}} data-action-type ="Rejected" data-toggle="modal" data-target="#promptAccUser" onclick="userresponding('Rejected', {{loanRequestId}});">
                      <button type="submit" class="btn btn-danger">Reject</button></a>
                  </div>
                </div>
                  </div>   
                 <div class="displayAppMessage-{{loanStatus}} loanStatus-sec" style="display:none;">You've {{loanStatus}} this request.
                 </div>
            </div>
          </div>
        </div>
{{/data}}
</script>



<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".loadingSec").show();
});
setTimeout(function() {
    loadresponsetoMyrequest();
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

<div class="modal modal-info fade" id="modal-displaySuggetion">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Your response is sent to the borrower.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="promptAccUser" tabindex="-1" role="dialog" aria-labelledby="promptAccUser"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <!--    <i class="material-icons" style="font-size:48px;color:orange;" >error_outline</i> -->
                    <h4>Are You Sure You Want to <span class="reactedName"></span> this request ?</h4>


                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success postreqID" data-reqID="" data-type=""
                    onclick="respondToLoanRequest('')">Yes</button> &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php include 'footer.php';?>