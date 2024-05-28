<?php include 'header1.php';?>

<div class="whatsappmaindiv">
    <ul class="nav nav-tabs" style="border-width: 1.5px;">
        <li class="active"><a data-toggle="pill" href="#bulk"><b>Bulk Message to 10 Numbers</b></a></li>
        <li><a data-toggle="pill" href="#num"><b>Whatsapp Message to 10 Numbers</b></a></li>

    </ul>

    <div class="tab-content">
        <div id="bulk" class="tab-pane fade in active">
            <div class="row col-xs-12">
                <div class="col-xs-8 pull-left">
                    <center>
                        <h4><strong>Whatsapp Messages </strong></h4>
                    </center>
                    <div class="attachement_lft row" style="padding:25px;">
                        <label class="col-md-6">Uploads Excel sheet :<em>*</em></label>
                        <input class="custom-file-input excel" type='file' id="whatsapp"
                            style="border: 0.5px solid #000000; border-radius: 30px;height: 35px;width: 50%;"
                            accept=".xlsx, .xls" />
                    </div>
                    <div class="attachement_lft row" style="padding:25px;">
                        <label class="col-md-6">Enter Your Mobile No:<em>*</em></label>
                        <input type="tel" name="mobileNumber" class="form-control custom-file-input" id="mobilenumber1"
                            placeholder="Enter your Number"
                            style="width:80%;border-radius: 12px; font-size:14px;text-align: center;" />
                    </div>
                    <div class="attachement_lft row" style="padding:25px;">
                        <label class="col-md-6">Message:<em>*</em></label>
                        <textarea class="form-control custom-file-input" rows="4" id="comments"
                            style="width: 50%;border-radius: 10px;padding-left: 20px;"
                            placeholder=" Enter the text message "></textarea>
                        <span class="errormsg" style="display:none; color: red;">please Enter messages</span>
                        <div style="padding-left: 70%;padding-top: 10px;">
                            <button onclick="oxyFreeWhatsappbulk();" name="submit" class="btn btn-primary"> Submit
                            </button>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>


                <div class="col-xs-4 pull-right bulk-imgsec">
                    <div class="container">
                        <img src="./assets/images/bulk3.jpeg" alt="Image" class="img-responsive"
                            style="width:15%; height:10%;opacity:10; margin-top:0px;">
                        <div class="bottomleft">
                        </div>
                    </div>
                    <ul style="font-weight: normal; font-size: 15px;">
                        <li><code>Note:</code></li>
                        <li>You can send Free Whatsapp Messages </li>
                        <li>You can send Whatsapp messages up to 10 members only.</li>
                        <li>You can upload an excelsheet with mobilenumbers to send Bulk Whatsapp Messages.</li>
                        <li> The File format should be .xlsx or .xls</br></br>

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Mobile Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>XXXXXXXXXX</td>
                                    </tr>

                                </tbody>
                            </table>


                        </li>
                    </ul>

                </div>
            </div>
        </div>

        <!-----------------Tab@2-------------------->

        <div id="num" class="tab-pane fade">
            <div class="row">
                <div class="col-md-6 pull-right">
                    <h4 class="text-primary getwhatsappIndividal">Send Whatsapp Messages To Your Friends For Marketing
                    </h4>
                    <ul></ul>
                    <div class="col-xs-12">
                        <div class="bs-form-wrapper divparts">
                            <label>Enter Your Mobile No</label>
                            <input type="tel" name="" class="form-control input" id="number"
                                placeholder="Enter Your Mobile Number" style="width: 66%;border-radius: 12px;"><span
                                class="errornumbersss" style="display:none; color: red;">Please Enter mobile
                                number</span><br />
                        </div>
                        <div class="bs-form-wrapper  divparts" style="margin-right: 5px;">
                            <label>Enter Your Friends/Marketing Mobile Numbers</label>
                            <input type="tel" name="phoneNumbers" class="form-control nums" id="phoneNumbers"
                                placeholder="Enter Your Friends Mobile Number" required="required"
                                style="width: 100%;border-radius: 12px;">
                            <span class="errornumberss" placeholder=" Enter the text message "
                                style="display:none; color: red;">Please enter mobile number</span>

                        </div><br />
                        <div class="form-group divparts">
                            <label for="comment" class="text-normal">Message:</label>
                            <textarea class="form-control" rows="5" id="comment" style="width: 66%;border-radius: 12px;"
                                placeholder="Enter the text message"></textarea>
                            <span class="errormsg" style="display:none; color: red;">please Enter messages</span>
                        </div>
                        <div class="form-group text-center">
                            <button onclick="oxyfreewhatsapps();" name="submit" class="btn btn-primary text-center">
                                Submit </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 individualMessagesWhatsapp pull-left">
                    <div class="row">
                        <img src="./assets/images/whatsapp34.png" alt="Image" class="img-responsive"
                            style="width:30%; height:30%;opacity: 10; margin-right: 50px;margin-right: 1px;" />
                        <!--  <div class="topleft">
        <img src="./assets/images/free.jpeg" alt="Image" class="img-responsive animate_animated animateheartBeat animateinfinite animate_slow pull-right" style="width:12%; height:12%;"/>
      </div> -->
                    </div>
                    <ul style="font-weight: normal; font-size: 15px;">
                        <li> <code>NOTE:</code></li>
                        <li>You can send messages to your friends for sales or marketing purpose.</li>
                        <li>Enter mobile numbers separated by a comma.</li>
                        <li>Ex:77XXXXXX95,77XXXXX885</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var number = $(".nums").val();
var file = $(".files").val();
if (number == "") {
    $(".numsError").html("Please enter Number");
    $(".numsError").show();
    isValid = false;
} else {
    $(".numsError").hide();
}
if (file == "") {
    $(".filesError").html("Please enter Excel file");
    $(".filesError").show();
    isValid = false;
} else {
    $(".numsError").hide();
}
</script>

<style type="text/css">
.my-element {
    animate-delay: 2s;
    animate__slow: 4s;
}

.container {
    position: relative;
}

.topleft {
    position: absolute;
    top: 5px;
    left: 20px;
}

.img {
    width: 100%;
    height: auto;
    opacity: 0.3;
}

.bottomleft {
    position: absolute;
    bottom: 8px;
    left: 16px;
    font-size: 18px;
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    var input = document.querySelector("#phoneNumbers");
    window.intlTelInput(input, {
        utilsScript: "build/js/utils.js",
        separateDialCode: true,
        hiddenInput: "full",
        preferredCountries: ["in"],
    });
    $("meta[property='og\\title']").attr("content",
        "Peer to Peer Lending platform || OxyLoans || NRI Registration");
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    var input = document.querySelector("#mobilenumber1");
    window.intlTelInput(input, {
        utilsScript: "build/js/utils.js",
        separateDialCode: true,
        hiddenInput: "full",
        preferredCountries: ["in"],
    });
    $("meta[property='og\\title']").attr("content",
        "Peer to Peer Lending platform || OxyLoans || NRI Registration");
});
</script>
<style type="text/css">
.iti {
    width: 65% !important;
}
</style>

<style type="text/css">
.lbchkbox label {
    font-style: 0px;
}
</style>

<?php include 'footer.php';?>