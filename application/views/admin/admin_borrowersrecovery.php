<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-bold">
            whatsapp campaign
        </h1></br></br>

        <div class="alert  showdealSuccessMessage" role="alert"
            style="background-color: #D0f0C0; display: none; font-size: 18px;">
            <strong>Well done!</strong> Message sent successfully.
        </div>
    </section>
    <div class="cls"></div>
    </br>
    </br>
    <section class="content">
        <div class="cls"></div>

        <div class="row customFormQ">
            <div class="cls"></div>
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-body">

                        <div class="form-group row">
                            <label for="name " class="col-sm-3 col-form-label ">Text Message<em class="error">*</em>
                                :</label>
                            <div class="col-sm-4">
                                <textarea class="form-control" cols="12" rows="10" placeholder="Text Message"
                                    id="whatsappcontent"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name " class="col-sm-3 col-form-label ">Message Type<em class="error">*</em>
                                :</label>
                            <div class="col-sm-4">
                                <input type="radio" name="groups" id="whatsappGroup" value="groups">
                                <label class="whatsApp-campagin-type">Groups</label>
                                <input type="radio" name="broadcast" style="margin-left:40px;" id="broadcastType"
                                    value="broadcast">
                                <label class="whatsApp-campagin-broadcast" style="margin-right:1px;">Broadcast</label>
                                <input type="hidden" name="getBroadcastChatId" id="getBroadCastId">

                            </div>
                        </div>

                        <div class="form-group row campaignType" style="display: none;">
                            <div class="col-sm-3">
                                <label for="name " class="col-form-label ">Whatsapp Groups :<em class="error">*</em> :
                                </label>
                            </div>
                            <div class="col-sm-2">
                                <div class="multipleSelection">
                                    <div class="selectBox" onclick="showCheckboxes()">
                                        <select>
                                            <option>Select options</option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>

                                    <div id="checkBoxes">
                                        <div id="whatsappgroup">
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-3 pull-right" style="margin-right: 520px; margin-top:3px">
                                <input id="selectAll" type="checkbox" class="selectWhatsApp">
                                <label for='selectAll'>Select All</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 subtn-whatsapp">
                                <button type="button" class="btn btn-lg btn-primary col-md-5"
                                    onclick="whatsappcampagin();">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<div class="modal fade" id="modal-previewEmail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Whatsapp Campaign preview</h4>
            </div>
            <div class="modal-body emailcontent">
                <div class="row">
                    <span class="wtmessage"></span>
                </div>
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
<div class="modal modal-warning fade" id="modal-alreadyAddedinDb">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text1"> You are successfully added the loan owner name</p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"
                        id="highest">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
$(document).ready(function() {
    var whatsapp =
        "FinTech & P2P Lending is a great combination. India's fastest growing start-up is offering monthly 2% Interest on your lending amount and 1% + Share Value Growth on Equity Investment,\n \n Please join Interactive Session with our OXYLOANS CEO\n  \nRadhakrishna.Thatavarti\n \n Every Thursday 9:30pm IST https://meet.google.com/oii-jkio-vxz \n \n Thanks & Regards,\nRadhakrishna.Thatavarti";
    $("#whatsappcontent").html(whatsapp);
});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
$(document).ready(function() {



});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#broadcastType").click(function() {
        getChatIdForWhatsappBroadCast();
        $('#whatsappGroup').prop('checked', false); // Checks it
        $('.campaignType').show();
        $('.campaignType-broadCast').show();

    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#whatsappGroup").click(function() {
        getwhatsappGroupsnames();
        $('#broadcastType').prop('checked', false); // Checks it
        $('.campaignType').show();
        $('.campaignType-broadCast').hide();


    });
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
<style type="text/css">
.multipleSelection {
    width: 304px;
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

#checkBoxes label {
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

<?php include 'admin_footer.php';?>