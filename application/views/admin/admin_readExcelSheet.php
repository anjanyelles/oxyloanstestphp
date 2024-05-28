<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$gmailcode =  isset($_GET['code']) ? $_GET['code'] : '';
// echo "<script>alert('$gmailcode');</script>";


?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="text-bold">
            Campaign
        </h1>
        <div class="col-md-6 pull-right gmailAutharaztion">
            <a href="" id="Gmailcontacts">
                <button type="button" class="btn btn-lg btn-primary pull-right"><b>Google Sheets</b></button></a>
        </div>
        <div class="pull-right classcopyrefLink">
            <input type="hidden" id="gmailcode" name="gmailcode" class="text-fld1" value="<?php echo $gmailcode;?>">
        </div>
        <div class="alert lenderParticipationinDeal" role="alert"
            style="background-color:#D0f0C0; display: none; font-size: 18px;font-weight: bold; margin-top:60px">
            <strong>Thanks! </strong> Messages Sent Successfully,<br>
        </div>
        <div class="alert readSpeardSheet" role="alert" style="background-color:#D0f0C0; display: none;">
            <strong>Thanks!</strong>Messages Readed successfuly please check your sheet,<br>
        </div>
    </section><br />
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title text-bold">Campaign</h3>

                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row col-xs-12">

                            <div class="col-md-3 ">
                                <input type="radio" id="spreadSheet" name="spreadSheet" value="">
                                <label class="form-check-label" for="spreadSheet"> Borrower Campaign </label>
                            </div>
                            <div class="col-md-3 individual">
                                <input type="radio" id="individual" name="individual" value="" />
                                <label class="form-check-label" for="individual">
                                    Individual
                                </label>
                            </div>
                            <div class="col-md-3 unsent">
                                <input type="radio" id="bUnSent" name="bnotification" value="countUnSent" />
                                <label class="form-check-label" for="bUnSent">
                                    Unsent Notification
                                </label>
                            </div>
                            <div class="col-md-3 readResponses">
                                <input type="radio" id="response" name="excelResponse" value="writeMessage" />
                                <label class="form-check-label" for="response">
                                    Response Messages
                                </label>
                            </div>
                            <div class="col-md-3 broadcast">
                                <input type="radio" id="WhatsAppBroadcast" name="WhatsAppBroadcast"
                                    value="writeMessage" />
                                <label class="form-check-label" for="WhatsAppBroadcast">
                                    WhatsApp broadcast
                                </label>
                            </div>
                            <div class="col-md-3 emailCampaign">
                                <input type="radio" id="emailCampaignMessages" name="emailCampaign" value="email" />
                                <label class="form-check-label" for="emailCampaignMessages">
                                    Email Campaign
                                </label>
                            </div>


                            <div class="col-md-3 emailCampaignLB">
                                <input type="radio" id="emailCampaignLBMessages" name="emailCampaignLB" value="email" />
                                <label class="form-check-label" for="emailCampaignLBMessages">
                                    Email Campaign LR & BR
                                </label>
                            </div>


                            <div class="col-md-3 bulkinvite">
                                <input type="radio" id="bulkinviteExcel" name="bulkinviteExcel" value="bulk" />
                                <label class="form-check-label" for="bulkinviteExcel">
                                    Bulk Invite
                                </label>
                            </div>

                        </div>
                        <div class="col-md-10 pull-right spreadsheetform" style="display: none;">

                            <div class="form-group row">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Sheet ID <em class="error">*</em>
                                    :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="sheetId" class="form-control speardsheet"
                                        placeholder="Enter The Sheet  ID" required="required" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Range <em class="error">*</em>
                                    :</label>
                                <div class="col-sm-6">

                                    <select class="form-control roioflender" id="rangeType" data validation="rnType">
                                        <option value="">-- Choose Range --</option>
                                        <option value="normal">normal</option>
                                        <option value="critical">critical</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lenderId " class="col-sm-3 col-form-label ">Message <em class="error">*</em>
                                    :</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" cols="8" rows="6" placeholder="Text Message"
                                        id="borrowerNotification"></textarea>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-lg btn-primary col-md-4 pull-right"
                                    onclick="spreadSheetNotification();">Send</button>
                            </div>
                        </div>

                        <div class="col-md-10 pull-right individualform" style="display: none;">

                            <div class="form-group row">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Phone Number <em
                                        class="error">*</em> :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="editlenderId" class="form-control individualPhoneNumber"
                                        placeholder="Enter The Phone Number" required="required" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lenderId " class="col-sm-3 col-form-label ">Message <em class="error">*</em>
                                    :</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" cols="8" rows="6" placeholder="Text Message"
                                        id="individualText"></textarea>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-lg btn-success col-md-4 pull-right"
                                    onclick="individualMessageNotification();">Send</button>
                            </div>
                        </div>

                        <div class="clear"></div>
                        <div class="clear"></div>
                        <div class="col-md-10 pull-right unsetNotificaion" style="display: none;">

                            <div class="form-group row">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Sheet ID <em class="error">*</em>
                                    :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="sheetId" class="form-control speardsheet"
                                        id="unsentSheetId" placeholder="Enter The Sheet  ID" required="required" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Range <em class="error">*</em>
                                    :</label>
                                <div class="col-sm-6">

                                    <select class="form-control unsentBorrowers" id="rangeType" validation="rnType">
                                        <option value="">-- Choose Range --</option>
                                        <option value="normal">Normal</option>
                                        <option value="critical">Critical</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lenderId " class="col-sm-3 col-form-label ">Date <em class="error">*</em>
                                    :</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="expectedDateValue"
                                        placeholder="dd-mm-yyyy" name="PaidDate" data validation="expectedDate">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-lg btn-primary col-md-4 pull-right"
                                    onclick="spreadSheetUnsentNotification();">Send</button>
                            </div>
                        </div>
                        <div class="col-md-10 pull-right readResponse" style="display: none;">

                            <div class="form-group row">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Sheet ID <em class="error">*</em>
                                    :</label>
                                <div class="col-sm-4">
                                    <input type="text" name="sheetId" class="form-control speardsheet" id="readSheetId"
                                        placeholder="Enter The Sheet  ID" required="required" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Range <em class="error">*</em>
                                    :</label>
                                <div class="col-sm-4">

                                    <select class="form-control roioflender bRangeType" id="rangeType" data
                                        validation="rnType">
                                        <option value="">-- Choose Range --</option>
                                        <option value="normal">Normal</option>
                                        <option value="critical">Critical</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lenderId " class="col-sm-3 col-form-label ">Date <em class="error">*</em>
                                    :</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="expectedDateValues"
                                        placeholder="dd/mm/yyyy" name="PaidDate" data validation="expectedDate">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Last Message Number<em
                                        class="error">*</em> :</label>
                                <div class="col-sm-4">
                                    <input type="text" name="sheetId" class="form-control lastMessage"
                                        placeholder="Enter Last Message Number" required="required" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-lg btn-primary col-md-4 pull-right"
                                    onclick="spreadSheetReadMessage();">Send</button>
                            </div>
                        </div>
                        <div class="col-md-10 pull-right whatsAppBroadCast" style="display: none;">

                            <div class="form-group row">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Sheet ID <em class="error">*</em>
                                    :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="sheetId" class="form-control boardCastsheetId"
                                        placeholder="Enter The Sheet  ID" required="required" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Sheet Name <em
                                        class="error">*</em> :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="sheetId" class="form-control broadcastSheetName"
                                        placeholder="Enter The Sheet  Name" required="required" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lenderId " class="col-sm-3 col-form-label ">Message <em class="error">*</em>
                                    :</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" cols="8" rows="6" placeholder="Text Message"
                                        id="broadcastText"></textarea>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-lg btn-primary col-md-4 pull-right"
                                    onclick="whatsAppBroadcastCampaign();">Submit</button>
                            </div>
                        </div>
                        <div class="col-md-10 pull-right emailcampaignform" style="display: none;">

                            <div class="form-group row">
                                <label for="sheetId" class="col-sm-3 col-form-label ">Sheet ID <em class="error">*</em>
                                    :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="esheetId" class="form-control emailsheetId"
                                        placeholder="Enter The Sheet  ID" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Sheet Name <em
                                        class="error">*</em> :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="sheetId" class="form-control emailSheetName"
                                        placeholder="Enter The Sheet  Name" required />
                                </div>
                                <div class="col-md-3 sheetname"><b>EX:(Sheet1 or Sheet2)</b></div>
                            </div>


                            <div class="form-group row">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Sent Type<em class="error">*</em>
                                    :</label>

                                <div class="col-sm-6">
                                    <select class="form-control campaginType" id="primaryType" data
                                        validation="primaryType">
                                        <option value="">-- Choose --</option>
                                        <option value="whatsapp">Whatsapp</option>
                                        <option value="email">Email</option>
                                        <option value="sampleWhatsapp">Sample Whatsapp</option>
                                        <option value="sampleEmail">Sample Email</option>

                                    </select>
                                </div>
                            </div>


                                <div class="form-group row">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Mobile Number<em
                                        class="error">*</em> :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="mobileNumber" class="form-control emailSheeTmobileNumber"
                                        placeholder="Enter The Mobile Number" required />
                                </div>
                               
                            </div>



                                 <div class="form-group row">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Sample Email<em
                                        class="error">*</em> :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="sampleEmail" class="form-control emailSheesampleEmail"
                                        placeholder="Enter The Sample Email " required />
                                </div>
                               
                            </div>

                                 <div class="form-group row">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Image URL<em
                                        class="error">*</em> :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="whatsappImage" class="form-control emailwhatsappImage"
                                        placeholder="Enter The Image Url " required />
                                </div>
                               
                            </div>

                            <div class="form-group row campaignSubjectInfo" style="display:none">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Subject <em class="error">*</em>
                                    :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="sheetId" class="form-control emailsubject"
                                        placeholder="Enter The Email Subject" required />
                                </div>
                            </div>


                            <div class="form-group row emailcampaignSenderName" style="display:none">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Sender Name <em
                                        class="error">*</em> :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="sheetId" class="form-control emailcampaignSendername"
                                        placeholder="Enter Sender Name" required />
                                </div>

                            </div>

                            <div class="form-group row emailcampaignSenderType" style="display:none">
                                <label for="senderId" class="col-sm-3 col-form-label ">From Mail<em class="error">*</em>
                                    :</label>

                                <div class="col-sm-6">
                                    <select class="form-control emailSenderId" id="fromType" data
                                        validation="primaryType">
                                        <option value="">-- Choose --</option>
                                        <option value="OXYLOANS">OXYLOANS</option>
                                        <option value="STUDENT">STUDENT</option>
                                        <option value="OXYBRICKS">OXYBRICKS</option>
                                        <option value="BMV">BMV</option>
                                        <option value="erice">erice</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lenderId " class="col-sm-3 col-form-label ">Message <em class="error">*</em>
                                    :</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" cols="8" rows="6" placeholder="Text Message"
                                        id="emailText"></textarea>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-lg btn-primary col-md-4 pull-right"
                                    onclick="emailCampaign();">Submit </button>
                            </div>
                        </div>
                        <div class="col-md-10 pull-right emailcampaignLRBR" style="display: none;">
                            <div class="form-group row">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Primary Type<em class="error">*</em> :</label>
                                <div class="col-sm-6">
                                    <select class="form-control campaginPrimaryType" id="primaryType" data
                                        validation="primaryType">
                                        <option value="">-- Choose --</option>
                                        <option value="borrower">BORROWER</option>
                                        <option value="lender">LENDER</option>
                                        <option value="borrower,lender">BOTH</option>

                                    </select>
                                </div>
                            </div>



                            <div class="form-group row campaignSubjectInfo">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Subject <em class="error">*</em>
                                    :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="sheetId" class="form-control emailSubPrimary"
                                        placeholder="Enter The Email Subject" required />
                                </div>
                            </div>


                            <div class="form-group row emailcampaignSenderName">
                                <label for="lenderId" class="col-sm-3 col-form-label ">Sender Name <em
                                        class="error">*</em> :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="sheetId" class="form-control emailcampaignSendernamelrbr"
                                        placeholder="Enter Sender Name" required />
                                </div>
                            </div>


                            <div class="form-group row emailcampaignSenderType">
                                <label for="senderId" class="col-sm-3 col-form-label ">From Mail<em class="error">*</em>
                                    :</label>

                                <div class="col-sm-6">
                                    <select class="form-control emailSenderIdLRBR" id="fromType"  data
                                        validation="primaryType">
                                        <option value="">-- Choose --</option>
                                        <option value="OXYLOANS">OXYLOANS</option>
                                        <option value="STUDENT">STUDENT</option>
                                        <option value="OXYBRICKS">OXYBRICKS</option>
                                        <option value="BMV">BMV</option>
                                        <option value="erice">erice</option>

                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="lenderId " class="col-sm-3 col-form-label ">Message <em class="error">*</em>
                                    :</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" cols="8" rows="6" placeholder="Text Message"
                                        id="primaryEmailContent"></textarea>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-lg btn-primary col-md-4 pull-right"
                                    onclick="sendEmailCampaginToLRBR();">Send</button>
                            </div>
                        </div>

                        <div class="col-md-12 pull-right bulkinviteExcelSheet" style="display: none;">

                            <div class="row col-12">
                                <div class="mb-1  col-md-6">
                                    <label for="" class="form-label">File Upload <em class="error">*</em> :</label> </label>
                                    <input type="file" class="form-control" name="" id="excelfileupload" aria-describedby="helpId" />
                                    <small id="fileupload" class="form-text error errorfileupload" style="display:none">Upload File</small>
                                </div>

                                <div class="mb-1  col-md-6">
                                    <label for="projectType" class="form-label">Project Type <em class="error">*</em> :</label></label>
                                    <select class="form-control" id="projectType" aria-describedby="helpId" onchange="sampleEmail();">
                                        <option value="">Choose project Type</option>
                                        <option value="bmv">bmv (Hi@BMV.money)</option>
                                        <option value="oxybricks">oxybricks (radha@oxybricks.world)</option>
                                        <option value="oxyloans">oxyloans (support@oxyloans.com)</option>
                                        <option value="erice">erice (Hi@BMV.money)</option>
                                    </select>
                                    <small id="helpId" class="form-text error errorprojectType" style="display:none">Choosen Project Type</small>
                                </div>
                            </div>

                            <div class="row col-12">
                                <div class="mb-1  col-md-6">
                                    <label for="inviteType" class="form-label">Invite Type <em class="error">*</em> :</label></label>
                                    <select class="form-control" id="inviteType" aria-describedby="helpId" onchange="sampleEmail();">
                                        <option value="">Choose Invite Type</option>
                                        <option value="samplemsg">Sample Msg</option>
                                        <option value="whatsapp">WhatsApp</option>
                                        <option value="sampleemail">Sample Email</option>
                                        <option value="email">Email</option>
                                    </select>
                                    <small id="helpId" class="form-text error errorchoseInviteType" style="display:none">Choose Invite Type</small>
                                </div>


                                  <div class="mb-1  col-md-6">
                                    <label for="" class="form-label">Image Upload:</label> </label>
                                    <input type="file" class="form-control" name="" id="excelImageUploadData" aria-describedby="helpId"  onchange="uploadExcelImage();" />
                                    <small id="fileupload" class="form-text error errorfileupload" style="display:none">Upload Image </small>
                                </div>


                               


                            </div>
                            <div class="row col-12" id="arrayelements">

                            </div>



                             <div class="mb-1 col-md-12" style="margin-bottom: 20px;">
                                    <label for="Message" class="form-label">Message <em class="error">*</em> :</label></label>
                                    <textarea class="form-control col-md-12"  id="bulkinviteMessage" style="width: 913px; height: 105px;" 
                                        placeholder="Enter The Message"></textarea>
                                    <small id="helpId" class="form-text error errortetMessage" style="display:none">Enter The Message</small>
                                </div>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-lg btn-primary col-md-3 "
                                    onclick="sendBulkInviteExcel();">Send </button>


                                    <button type="button" class="btn btn-lg btn-default col-md-3" style="margin-left: 10px" 
                                    onclick="excelPreviewMessage();">Preview</button>
                            </div>
                        </div>

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


<div class="modal fade" id="modal-previewEmail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4>Here is the email preview message.</h4>
            </div>
            <div class="modal-body emailcontent">
                <div class="text-center imagepart"><img class="excelsheetUploadImage" src="https://erice.in/web/images/h2.png" alt="imageoferice"></img></div>

               
                <div class="row">
                    <p>Hi <span class="getfrndName" style="padding: 0px;"></span></p>

                    <br />

                    <div class="largeImagePart" style="display:none">
                        <img src="" alt="largeImage" class="largeImagesrc">
                        <br />   <br />
                    </div>   


                    <p class="previewContent"></p>
                    <br />
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

 <div class="modal modal-error fade" id="modal-errorpartnerMOUupload">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Oops!</h4>
             </div>
             <div class="modal-body">
                 <p>Something went wrong.</p>
             </div>
             <div class="modal-footer">
                 <div align="right">
                     <button type="button" class="btn btn-default btn-sm " data-dismiss="modal">Close</button>
                 </div>
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>
<script type="text/javascript">
$(document).ready(function() {
    $("#spreadSheet").click(function() {
        borrowersMsgContenNormal("normal");
        $('#individual').prop('checked', false);
        $('#bUnSent').prop('checked', false); // Checks it
        $('#response').prop('checked', false);
        $('#WhatsAppBroadcast').prop('checked', false);
        $('#emailCampaignMessages').prop('checked', false);
        $('#emailCampaignLBMessages').prop('checked', false);
        $('#bulkinviteExcel').prop('checked', false);

        $('.spreadsheetform').show();
        $('.individualform').hide();
        $('.unsetNotificaion').hide();
        $('.readResponse').hide();
        $('.whatsAppBroadCast').hide();
        $('.emailcampaignform').hide();
        $('.emailcampaignLRBR').hide();
        $(".bulkinviteExcelSheet").hide();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#individual").click(function() {
        borrowersMsgContenNormal("critical");
        $('#spreadSheet').prop('checked', false); // Checks it
        $('#bUnSent').prop('checked', false);
        $('#response').prop('checked', false);
        $('#WhatsAppBroadcast').prop('checked', false);
        $('#emailCampaignMessages').prop('checked', false);
        $('#emailCampaignLBMessages').prop('checked', false);
        $('#bulkinviteExcel').prop('checked', false);


        $('.individualform').show();
        $('.spreadsheetform').hide();
        $('.unsetNotificaion').hide();
        $('.readResponse').hide();
        $('.whatsAppBroadCast').hide();
        $('.emailcampaignform').hide();
        $('.emailcampaignLRBR').hide();
        $(".bulkinviteExcelSheet").hide();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#bUnSent").click(function() {
        $('#spreadSheet').prop('checked', false);
        $('#individual').prop('checked', false);
        $('#response').prop('checked', false);
        $('#WhatsAppBroadcast').prop('checked', false);
        $('#emailCampaignMessages').prop('checked', false);
        $('#emailCampaignLBMessages').prop('checked', false);
        $('#bulkinviteExcel').prop('checked', false);


        $('.individualform').hide();
        $('.spreadsheetform').hide();
        $('.readResponse').hide();
        $('.emailcampaignLRBR').hide();
        $('.whatsAppBroadCast').hide();
        $('.emailcampaignform').hide();
        $('.unsetNotificaion').show();
        $(".bulkinviteExcelSheet").hide();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#response").click(function() {
        $('#spreadSheet').prop('checked', false);
        $('#individual').prop('checked', false);
        $('#bUnSent').prop('checked', false);
        $('#WhatsAppBroadcast').prop('checked', false);
        $('#emailCampaignMessages').prop('checked', false);
        $('#emailCampaignLBMessages').prop('checked', false);
        $('#bulkinviteExcel').prop('checked', false);

        $('.readResponse').show();
        $('.individualform').hide();
        $('.spreadsheetform').hide();
        $('.unsetNotificaion').hide();
        $('.whatsAppBroadCast').hide();
        $('.emailcampaignform').hide();
        $('.emailcampaignLRBR').hide();
        $(".bulkinviteExcelSheet").hide();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#WhatsAppBroadcast").click(function() {
        $('#spreadSheet').prop('checked', false);
        $('#individual').prop('checked', false);
        $('#bUnSent').prop('checked', false);
        $('#response').prop('checked', false);
        $('#bulkinviteExcel').prop('checked', false);


        $('#emailCampaignMessages').prop('checked', false);
        $('#emailCampaignLBMessages').prop('checked', false);
        $('.readResponse').hide();
        $('.individualform').hide();
        $('.spreadsheetform').hide();
        $('.unsetNotificaion').hide();
        $('.whatsAppBroadCast').show();
        $('.emailcampaignform').hide();
        $('.emailcampaignLRBR').hide();
        $(".bulkinviteExcelSheet").hide();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#emailCampaignMessages").click(function() {
        $('#spreadSheet').prop('checked', false);
        $('#individual').prop('checked', false);
        $('#bUnSent').prop('checked', false);
        $('#response').prop('checked', false);
        $('#WhatsAppBroadcast').prop('checked', false);
        $('#emailCampaignLBMessages').prop('checked', false);
        $('#bulkinviteExcel').prop('checked', false);

        $('.readResponse').hide();
        $('.individualform').hide();
        $('.spreadsheetform').hide();
        $('.unsetNotificaion').hide();
        $('.whatsAppBroadCast').hide();
        $('.emailcampaignform').show();
        $(".bulkinviteExcelSheet").hide();
        $('.emailcampaignLRBR').hide();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#emailCampaignLBMessages").click(function() {
        $('#spreadSheet').prop('checked', false);
        $('#individual').prop('checked', false);
        $('#bUnSent').prop('checked', false);
        $('#response').prop('checked', false);
        $('#WhatsAppBroadcast').prop('checked', false);
        $('#emailCampaignMessages').prop('checked', false);
        $('#bulkinviteExcel').prop('checked', false);

        $('.readResponse').hide();
        $('.individualform').hide();
        $('.spreadsheetform').hide();
        $('.unsetNotificaion').hide();
        $('.whatsAppBroadCast').hide();
        $('.emailcampaignform').hide();
        $(".bulkinviteExcelSheet").hide();
        $('.emailcampaignLRBR').show();

    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $("#bulkinviteExcel").click(function() {
        $('#spreadSheet').prop('checked', false);
        $('#individual').prop('checked', false);
        $('#bUnSent').prop('checked', false);
        $('#response').prop('checked', false);
        $('#WhatsAppBroadcast').prop('checked', false);
        $('#emailCampaignMessages').prop('checked', false);
        $('#emailCampaignLBMessages').prop('checked', false);

        $('.readResponse').hide();
        $('.individualform').hide();
        $('.spreadsheetform').hide();
        $('.unsetNotificaion').hide();
        $('.whatsAppBroadCast').hide();
        $('.emailcampaignform').hide();
        $('.emailcampaignLRBR').hide();
         $(".bulkinviteExcelSheet").show();



    });
});
</script>


<script type="text/javascript">
$(document).ready(function() {
    $("#inviteType").change(function() {
        const type = $("#inviteType").val();

        const inviteType = [{
                type: "sampleemail",
                sub: ["sampleEmail",  "mailSubject", "mailDispalyName"
                ]
            },
            {
                type: "email",
                sub: ["mailSubject", "mailDispalyName"]
            },
            {
                type: "samplemsg",
                sub: ["sampleMobile"]
            },
            
        ];


        const targetObject = inviteType.find(item => item.type === type);
        if (targetObject) {
            $("#arrayelements").empty();
            const divelement = targetObject.sub.map(subItem =>{
                return(
                   `
                 <div class="mb-2 col-md-6" style="margin-bottom:15px">
                 <label for="${subItem=="whatsappImage" ? "Whatsapp Image URL" : subItem}" class="form-label">${subItem} <em class="error">*</em></label> :
                  <input type="text" class="form-control"  id="array_${subItem}" placeholder="Enter The ${subItem}"/>
                      <small id="helpId_${subItem}" class="form-text error error_${subItem}" style="display:none">Enter the ${subItem}</small>
                </div>
                `);
            });
          
          $("#arrayelements").append(divelement);
        };
      
    });
});
</script>


<script type="text/javascript">
$(document).ready(function() {
    $("#expectedDateValue").datepicker({
        todayHighlight: true,
        format: 'dd-mm-yyyy',
        changeMonth: true,
        changeYear: true,
        endDate: "today",
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#expectedDateValues").datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
       
        changeMonth: true,
        changeYear: true,
        endDate: "today",
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    getGmailAuthorization();
});
</script>



<script type="text/javascript">
$(document).ready(function() {
    $("#bulkinviteExcel").change(function() {
        var campaignType = $(".campaginType").val();

        if (campaignType == "whatsapp") {
            $(".campaignSubjectInfo").hide();
            $(".emailcampaignSenderName").hide();
            $(".emailcampaignSenderType").hide();
        } else {
            $(".campaignSubjectInfo").show();
            $(".emailcampaignSenderName").show();
            $(".emailcampaignSenderType").show();
        }


    });
});
</script>



<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>