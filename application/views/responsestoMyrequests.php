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
            Loan Listings
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
            <a href="myborrowings.php">
                <button type="button" class="btn btn-default pull-right marR15"><i class="fa fa-angle-double-left"></i>
                    <b>Back to My Borrowings</b>
                </button>
            </a>

            <a href="responsestoMyrequests.php">
                <button type="button" class="btn btn-primary pull-right marR15"><i class="fa fa-angle-double-left"></i>
                    <b>View Offers</b>
                </button>
            </a>

        </div>
    </section>
    <div class="cls"></div>
    <!-- Main content -->
    <section class="content">
        <div class="row customFormQ">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Responses to my loan listings</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <section class="content">
                        <div class="row customFormQ">
                            <!-- left column -->
                            <div class="col-md-12">
                                <div class="col-md-2">
                                </div>

                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="loadresponsetoMyrequest" id="loadresponsetoMyrequest">

                                </div>

                                <script id="loanListiongsTpl" type="text/template">
                                    {{#data}}
        <div class="col-md-4">
          <div class="box box-widget widget-user">
            <div class="widget-user-header bg-green">
              <h3 class="widget-user-username">AleXXXrXXXio</h3>
              <h5 class="widget-user-desc">LR{{userDisplayId}}</h5>
              <h5 class="widget-user-desc">Duration: {{duration}}M</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?php echo base_url(); ?>/assets/dist/img/user1-128x128.jpg" alt="User Avatar">
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
                    <h5 class="description-header">{{rateOfInterest}}%</h5>
                    <span class="description-text">Interest</span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Oxy Score</h5>
                    <span class="description-text">680</span>
                  </div>
                </div>
              </div>
              <div class="cls"></div>
              <div class="box-footer">
                 <div>
                   <progress value="500" max="{{loanRequestAmount}}" style="width: 100%;"></progress>
                 </div>

                 <div class="clear"></div>
                 <div>
                   Amount Required on:- {{expectedDate}}
                 </div>
                 <div class="pull-left padt20">
                  <a href="borrowerviewloanoffer?loanid={{loanRequestId}}"><button type="submit" class="btn btn-success">Participated Lenders</button></a>
                </div>
                <div class="pull-right padt20">
                  <a href="borrowerviewloanoffer?loanid={{loanRequestId}}"><button type="submit" class="btn btn-primary">Application</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
{{/data}}
</script>

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
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
loadresponsetoMyrequest();
</script>

<?php include 'footer.php';?>