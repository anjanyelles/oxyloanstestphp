<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <left class="text-bold">WhatsApp Notification </left>
        </h1>
    </section><br />
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box"></br></br>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-lg btn-primary pull-left" id="profit-submit-btn"
                                    onclick="commitmentamountnotification();">Reading Commitment Amount</button>
                            </div>

                            <div class="col-sm-4">
                                <button type="button" class="btn btn-lg btn-info pull-left" id="profit-submit-btn"
                                    onclick="notificationforlender();">Sending Notifications To Lenders </button>
                            </div>

                            <div class="col-sm-4">
                                <button type="button" class="btn btn-lg btn-warning pull-left" id="profit-submit-btn"
                                    onclick="notificationforlendingCommitment();">Reading Participation Amount </button>
                            </div>

                        </div>

                        <!-- /.
            
            /.box-header -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<div class="modal modal-success fade" id="lenderwhatsappNotification" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div align="left">
                    <h4>Successfully Notification Sent to the lenders</h4>
                </div>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>


            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-dealnotificationforcommitmentamount">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Commitment Amount Notification</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-sm-3 col-form-label ">Deal Name <em class="mandatory">*</em></label>
                    <div class="col-sm-9">
                        <select class="form-control dealName" name="dealName" id="dealName" data validation="dealName">

                        </select>

                        <span class="error commitmentnotification" style="display: none;">Please enter the Deal
                            name.</span>
                    </div>
                </div></br></br>

                <div class="form-group">
                    <label class="col-sm-3 col-form-label ">Whatsapp Group <em class="mandatory">*</em></label>
                    <div class="col-sm-6">
                        <div class="multipleSelection">
                            <div class="selectBox" onclick="showCheckboxes()">
                                <select>
                                    <option>Choose WhatsApp Groups</option>
                                </select>
                                <div class="overSelect"></div>
                            </div>

                            <div id="checkBoxes">
                                <div id="whatsappgroup">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 pull-right">
                        <input id="selectAll" type="checkbox" class="selectWhatsApp">
                        <label for='selectAll'>Select All</label>
                    </div>


                </div>

            </div></br></br>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm savecibilscoreBtn" data-clickedId=""
                        onclick="commitmentnotificationtolender();">Submit</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-dealnotificationforlender">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Deal Notification To The Lender</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-sm-3 col-form-label ">Deal Name <em class="mandatory">*</em></label>
                    <div class="col-sm-9">
                        <select class="form-control dealName" name="dealName" id="dealNames" data validation="dealName">

                        </select>

                        <span class="error commitmentnotification" style="display: none;">Please enter the Deal
                            name.</span>
                    </div>
                </div></br></br>

                <div class="form-group">
                    <label class="col-sm-3 col-form-label ">Whatsapp Group <em class="mandatory">*</em></label>
                    <div class="col-sm-6">
                        <div class="multipleSelection">
                            <div class="selectBox" onclick="showCheckboxess()">
                                <select>
                                    <option>Choose WhatsApp Groups</option>
                                </select>
                                <div class="overSelect"></div>
                            </div>

                            <div id="checkBoxess">
                                <div id="whatsappgroups">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 pull-right">
                        <input id="notificationToLender" type="checkbox" class="selectWhatsAppNt">
                        <label for='selectAll'>Select All</label>
                    </div>
                </div>

            </div></br></br>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm savecibilscoreBtn" data-clickedId=""
                        onclick="sendingWhatsAppNotification();">Submit</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-readingLendingCommitmentAmount">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Lending Commitment Amount</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-sm-3 col-form-label ">Deal Name <em class="mandatory">*</em></label>
                    <div class="col-sm-9">
                        <select class="form-control lendingdealName" name="dealName" id="lendingdealNames" data
                            validation="dealName">
                        </select>

                        <span class="error lendingdealName" style="display: none;">Please choose the Deal name.</span>
                    </div>
                </div></br></br>
                <div class="modal-footer">
                    <div align="right">
                        <button type="button" class="btn  btn-primary btn-sm savecibilscoreBtn" data-clickedId=""
                            onclick="commitmentnotificationtolender();">Submit</button>
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
        getwhatsappGroupsnamess();
        fetchdealnames();


    });
    </script>
    <script>
    var show = true;

    function showCheckboxes() {
        var checkboxes =
            document.getElementById("checkBoxes");

        if (show) {
            checkboxes.style.display = "block";
            show = false;
        } else {
            checkboxes.style.display = "none";
            show = true;
        }
    }
    </script>
    <script>
    var show = true;

    function showCheckboxess() {
        var checkboxes =
            document.getElementById("checkBoxess");

        if (show) {
            checkboxes.style.display = "block";
            show = false;
        } else {
            checkboxes.style.display = "none";
            show = true;
        }
    }
    </script>
    <script>
    var show = true;

    function showCheckboxess() {
        var checkboxes =
            document.getElementById("checkBoxess");

        if (show) {
            checkboxes.style.display = "block";
            show = false;
        } else {
            checkboxes.style.display = "none";
            show = true;
        }
    }
    </script>
    <style type="text/css">
    .multipleSelection {
        width: 399px;
        height: auto;

    }

    .selectBox {
        position: relative;
    }

    .selectBox select {
        width: 100%;
        font-weight: bold;
        height: 30px;
    }

    .overSelect {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }

    #checkBoxes {
        display: none;
        border: 1px #8DF5E4 solid;
    }

    #checkBoxess {
        display: none;
        border: 1px #8DF5E4 solid;
    }

    #checkBoxes label {
        display: block;
    }

    .subtn-whatsapp {
        left: 35%;
    }

    #checkBoxess label {
        display: block;
    }

    .subtn-whatsapp {
        left: 35%;
    }
    </style>
    <script>
    $('#selectAll').on('click', function() {
        $("input[type=checkbox]").prop("checked", $(this).prop("checked"));

    });
    </script>
    <script>
    $('#notificationToLender').on('click', function() {
        $("input[type=checkbox]").prop("checked", $(this).prop("checked"));

    });
    </script>
    <script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
    <?php include 'admin_footer.php';?>