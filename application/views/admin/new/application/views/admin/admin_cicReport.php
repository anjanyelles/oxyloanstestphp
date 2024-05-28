<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <section class="content-header">

        <div class="col-md-12 ">
            <div class="pull-right">
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="card cmsBoxCard">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="tab" class="active"><a href="#home" aria-controls="home" role="tab"
                                data-toggle="tab"><i class="fa fa-plus"></i> <span>ADD CIC DATA</a></li>
                        <li role="tab"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i
                                    class="fa fa-file" aria-hidden="true"></i> <span>UPDATE CIC</span></a></li>


                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <div class="" style="width:100%;">


                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group row col-xs-12">
                                                <div class="col-xs-5">
                                                    <label for="lenderId" class="lenderID">User Id</label>
                                                    <input type="text" class="form-control cicuserid" id="cicuserid"
                                                        placeholder="Enter the  User Id" name="participatedid" data
                                                        validation="expectedDate">
                                                    <span class="error errorcicuserid" style="display: none;">Please
                                                        enter The user ID</span>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="lendergroup" class="groupID"> Deal Id</label>
                                                    <input type="text" class="form-control cicDealID" id="cicDealID"
                                                        placeholder="Enter The lender Deal Id" name="cicDealID" data
                                                        validation="cicDealID">
                                                    <span class="error errorcicDealID" style="display: none;">Please
                                                        enter The Deal Id</span>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="form-group row col-xs-12">
                                                <div class="col-xs-5">
                                                    <label for="processingFee" class="feeamount">Tenure</label>
                                                    <input type="text" class="form-control fee" id="Tenurecic"
                                                        placeholder="Enter The Tenure" name="Tenurecic" data
                                                        validation="Tenurecic">
                                                    <span class="error errorTenurecic" style="display: none;">Please
                                                        Enter Tenure</span>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="amount" class="mobileNumber">Date Of Disbursment</label>
                                                    <input type="text" class="form-control cicDisbursments"
                                                        id="cicDisbursments" placeholder="Enter The Disbursment Date"
                                                        name="cicDisbursments" data validation="pAmount">
                                                    <span class="error errorcicDisbursments"
                                                        style="display: none;">Please enter The Date Of
                                                        Disbursment</span>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="form-group row col-xs-12">
                                                <div class="col-xs-5">
                                                    <label for="lenderReturnType" class="lrReturnType">Disbursed Amount
                                                    </label>
                                                    <input type="text" class="form-control cicDisbursed"
                                                        id="cicDisbursedamount" placeholder="Enter The Disbursed Amount"
                                                        name="cicDisbursed" data validation="cicDisbursed">
                                                    <span class="error errorcicDisbursed" style="display: none;">Please
                                                        enter The Disbursed Amount </span>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="primaryType" class="rateofinteresttolender">ROI</label>
                                                    <input type="text" class="form-control roicic" id="cicroi"
                                                        placeholder="Enter The ROI" data validation="roi">
                                                    <span class="error errorroicic" style="display: none;">Please Enter
                                                        The ROI</span>
                                                </div>
                                            </div>
                                            <div class="clear"></div>

                                            <div class="clear"></div>
                                            <div class="clear"></div>
                                            <div class="clear"></div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-lg btn-primary col-md-4 pull-right"
                                                    onclick="cicaddinfo();">Submit</button>
                                            </div>

                                            <!-- /.box-body -->

                                            <!-- /.box -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="tab-pane" id="profile">

                            <div class="" style="width:100%;">
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group row col-xs-12">
                                                <div class="col-xs-5">
                                                    <label for="lenderId" class="lenderID">User Id</label>
                                                    <input type="text" class="form-control updatecicuseric"
                                                        id="updatecicuseric" placeholder="Enter the  User  ID"
                                                        name="updatecicuseric" data validation="updatecicuseric">
                                                    <span class="error errorupdatecicuseric"
                                                        style="display: none;">Please enter The User ID</span>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="lendergroup" class="groupID">Date Of Last
                                                        Payment</label>
                                                    <input type="text" class="form-control ciclastdate" id="ciclastdate"
                                                        placeholder="Enter The lender Date Of Last Payment "
                                                        name="ciclastdate" data validation="ciclastdate">
                                                    <span class="error errorciclastdate" style="display: none;">Please
                                                        enter The Date Of Last Payment</span>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="form-group row col-xs-12">
                                                <div class="col-xs-5">
                                                    <label for="email" class="email">Date Closed</label>
                                                    <input type="text" class="form-control cicdateclosed"
                                                        id="cicdateclosed" placeholder="Enter The date Closed"
                                                        name="cicdateclosed" data validation="cicdateclosed">
                                                    <span class="error errorcicdateclosed" style="display: none;">Please
                                                        enter Date Closed</span>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="amount" class="mobileNumber">current Balance</label>
                                                    <input type="text" class="form-control ciccurrentbalance"
                                                        id="ciccurrentbalance" placeholder="Enter The currentBalance"
                                                        name="ciccurrentbalance" data validation="ciccurrentbalance">
                                                    <span class="error errorciccurrentbalance"
                                                        style="display: none;">Please enter Current Balance</span>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="form-group row col-xs-12">
                                                <div class="col-xs-5">
                                                    <label for="lenderReturnType" class="lrReturnType">Amount Over
                                                        Due</label>
                                                    <input type="text" class="form-control cicoverdue" id="cicoverdue"
                                                        placeholder="Enter The Amount Over Due" name="cicoverdue" data
                                                        validation="cicoverdue">
                                                    <span class="error errorcicoverdue" style="display: none;">Please
                                                        enter The Amount Over Due</span>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="primaryType" class="cicnoofdayspastdue">No Of Days Past
                                                        Due</label>
                                                    <input type="text" class="form-control cicnoofdayspastdue"
                                                        id="cicnoofdayspastdue"
                                                        placeholder="Enter The No Of Days Past Due" data
                                                        validation="cicnoofdayspastdue">
                                                    <span class="error errorcicnoofdayspastdue"
                                                        style="display: none;">Please No Of Days Past Due</span>
                                                </div>
                                            </div>
                                            <div class="clear"></div>

                                            <div class="clear"></div>
                                            <div class="clear"></div>
                                            <div class="clear"></div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-lg btn-primary col-md-4 pull-right"
                                                    onclick="cicupdate();">Submit</button>
                                            </div>

                                            <!-- /.box-body -->

                                            <!-- /.box -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section>
    <div class="modal modal-success fade" id="modal-cicsuccessinfo">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Status</h4>
                </div>
                <div class="modal-body">
                    <p id="display_text"></p>

                </div>
                <div class="modal-footer">
                    <div align="right">

                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script type="text/javascript">
    $(document).ready(function() {
        $("#ciclastdate,#cicDisbursments,#cicdateclosed").datepicker({
            todayHighlight: true,
            format: 'dd-mm-yyyy',
            // startDate: new Date(),
            changeMonth: true,
            changeYear: true,
            endDate: "today",
        });
    });
    </script>


    <style type="text/css">
    .nav-tabs {
        border-bottom: 2px solid #DDD;
    }

    .nav-tabs>li.active>a,
    .nav-tabs>li.active>a:focus,
    .nav-tabs>li.active>a:hover {
        border-width: 0;
        color: #fff !important;
        background: #77c593 !important;
    }



    .nav-tabs>li>a {
        border: none;
        color: #1E5959 !important;
        background: #fff !important;
    }



    .nav-tabs>li>a::after {
        content: "";
        background: #316879;
        height: 2px;
        position: absolute;
        width: 100%;
        left: 0px;
        bottom: -1px;
        transition: all 250ms ease 0s;
        transform: scale(0);
    }

    .nav-tabs>li.active>a::after,
    .nav-tabs>li:hover>a::after {
        transform: scale(1);
    }

    .tab-nav>li>a::after {
        background: #1E5959 none repeat scroll 0% 0%;
        color: #fff;
    }

    .tab-pane {
        padding: 30px 0;
    }

    .tab-content {
        padding: 10px
    }

    .nav-tabs>li {
        width: 15%;
        text-align: center;
    }

    .card {
        background: #FFF none repeat scroll 0% 0%;
        box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3);
        margin-bottom: 30px;
        min-height: 450px;
    }

    i {
        margin-left: 3px;
    }

    .list-group-flush .list-group-item {
        padding-bottom: 30px;
        background-color: #F5F5F5;
    }

    @media all and (max-width:724px) {
        .nav-tabs>li>a>span {
            display: none;
        }

        .nav-tabs>li>a {
            padding: 5px 5px;
        }
    }

    @media (min-width: 1200px) {
        .container {
            width: 1030px !important;
        }

        .text_Updates {
            color: #3c8dbc;
        }

    }
    </style>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <?php include 'admin_footer.php';?>