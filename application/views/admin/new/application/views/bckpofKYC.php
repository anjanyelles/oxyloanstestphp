<!-- Content Wrapper. Contains page content -->
<!-- https://bootsnipp.com/snippets/KAX4X -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Upload Your ID Proofs
            <small>KYC Documents</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <!-- The file upload form used as target for the file upload widget -->
                        <form id="userKYCUpload" enctype="multipart/form-data">
                            <div class="file-upload col-xs-3 panUpload">
                                <button class="file-upload-btn" type="button"
                                    onclick="$('.panFileUpload').trigger( 'click' )">Add PAN Card</button>

                                <div class="image-upload-wrap pan-image-upload-wrap">
                                    <input class="file-upload-input panFileUpload" type='file' onchange="readPAN(this);"
                                        accept="image/*" />
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add Pan Card</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content pan-file-upload-content">
                                    <img class="file-upload-image panImage" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <button type="button" class="remove-image pan-uploadedButton">Uploaded
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- AADHAR CARD -->

                            <div class="file-upload col-xs-3 aadharUpload">
                                <button class="file-upload-btn" type="button"
                                    onclick="$('.aadharFileUpload').trigger( 'click' )">Add AADHAR </button>

                                <div class="image-upload-wrap aadhar-image-upload-wrap">
                                    <input class="file-upload-input aadharFileUpload" type='file'
                                        onchange="readAADHAR(this);" accept="image/*" />
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add AADHAR</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content  aadhar-file-upload-content">
                                    <img class="file-upload-image aadharImage" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <button type="button"
                                            class="remove-image aadhar-uploadedButton">Uploaded</button>
                                    </div>
                                </div>
                            </div>



                            <!-- PASSPORT CARD -->
                            <div class="file-upload col-xs-3 passportUpload">
                                <button class="file-upload-btn" type="button"
                                    onclick="$('.passportFileUpload').trigger( 'click' )">Add PASSPORT</button>

                                <div class="image-upload-wrap passport-image-upload-wrap">
                                    <input class="file-upload-input passportFileUpload" type='file'
                                        onchange="readPASSPORT(this);" accept="image/*" />
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add PASSPORT</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content  aadhar-file-upload-content">
                                    <img class="file-upload-image passportImage" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <button type="button"
                                            class="remove-image passport-uploadedButton">Uploaded</button>
                                    </div>
                                </div>
                            </div>



                            <div class="file-upload col-xs-3 bsUpload">
                                <button class="file-upload-btn" type="button"
                                    onclick="$('.bsFileUpload').trigger( 'click' )">UPLOAD BANK STATEMENT</button>

                                <div class="image-upload-wrap bs-image-upload-wrap">
                                    <input class="file-upload-input bsFileUpload" type='file'
                                        onchange="readBankStatement(this);"
                                        accept="application/pdf,application/vnd.ms-excel" />
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add Bank Statement.<small>Only PDF*</small>
                                        </h3>
                                    </div>
                                </div>
                                <div class="file-upload-content  bs-file-upload-content">
                                    <img class="file-upload-image bsImage" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <button type="button"
                                            class="remove-image aadhar-uploadedButton">Uploaded</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <br /><br /><br />
                    <div class="center" align="center" style="display: none;">
                        <button class="btn btn-success uploadKYC" type="button">Upload All</button>
                    </div>
                    <br /><br /><br />
                    </form>

                    <div class="clear"></div>
                    <!--               
              <div class="row uploadedDocuments">
                 <div class="col-xs-2"> 
                    <h3>Uploaded documents</h3>
                 </div>
                <div class="col-xs-2">
                    <img src="" class="panImage uploadedPics"  />
                </div>

                <div class="col-xs-2">
                    <img src="" class="passportImage uploadedPics"  />
                </div>

                <div class="col-xs-2">
                    <img src="" class="aadharImage uploadedPics"  />
                </div>
              </div>
            -->
                </div>
                <!-- /.box-body -->



            </div>
            <!-- /.box -->
        </div>
</div>
</section>
<!-- /.content -->
</div>



<div class="modal modal-success fade" id="modal-fileUploadedSuccessfully">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p>
                <h2>File uploaded successfully.</h2>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script type="text/javascript">
setKYCvars();
getKYC();
</script>
<!-- /.content-wrapper -->
<?php include 'footer.php';?>





function readPAN(input) {
console.log(input);
$(".loadingSec").show();
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function(e) {
$('.panUpload .image-upload-wrap').hide();

$('.panUpload .file-upload-image').attr('src', e.target.result);
$('.panUpload .file-upload-content').show();

$('.panUpload .image-title').html(input.files[0].name);
};

reader.readAsDataURL(input.files[0]);

var fd = new FormData();
var files = input.files[0];
fd.append('PAN',files);
console.log(fd);
var actionURL = $("#userKYCUpload").attr("action");
//alert(actionURL);

$.ajax({
url: actionURL,
type: 'post',
data: fd,
contentType: false,
processData: false,
success: function(data,textStatus,xhr){
if(data != 0){
$("#modal-fileUploadedSuccessfully").modal('show');
$(".loadingSec").hide();
}else{
alert('file not uploaded');
}
},
error: function(xhr,textStatus,errorThrown){
console.log('Error Something');
},
beforeSend: function(xhr) {
xhr.setRequestHeader("accessToken",saccessToken);
}

});

} else {
removeUpload();
}
}

function readAADHAR(input) {
$(".loadingSec").show();
if (input.files && input.files[0]) {

var reader = new FileReader();

reader.onload = function(e) {
$('.aadharUpload .image-upload-wrap').hide();

$('.aadharUpload .file-upload-image').attr('src', e.target.result);
$('.aadharUpload .file-upload-content').show();

$('.aadharUpload .image-title').html(input.files[0].name);
};

reader.readAsDataURL(input.files[0]);

var fd = new FormData();
var files = input.files[0];
fd.append('AADHAR',files);
console.log(fd);
var actionURL = $("#userKYCUpload").attr("action");
//alert(actionURL);

$.ajax({
url: actionURL,
type: 'post',
data: fd,
contentType: false,
processData: false,
success: function(data,textStatus,xhr){
if(data != 0){
$("#modal-fileUploadedSuccessfully").modal('show');
$(".loadingSec").hide();
}else{
alert('file not uploaded');
}
},
error: function(xhr,textStatus,errorThrown){
console.log('Error Something');
},
beforeSend: function(xhr) {
xhr.setRequestHeader("accessToken",saccessToken);
}
});

} else {
removeUpload();
}
}


function readPASSPORT(input) {
$(".loadingSec").show();
if (input.files && input.files[0]) {

var reader = new FileReader();

reader.onload = function(e) {
$('.passportUpload .image-upload-wrap').hide();

$('.passportUpload .file-upload-image').attr('src', e.target.result);
$('.passportUpload .file-upload-content').show();

$('.passportUpload .image-title').html(input.files[0].name);
};

reader.readAsDataURL(input.files[0]);

var fd = new FormData();
var files = input.files[0];
fd.append('PASSPORT',files);
console.log(fd);
var actionURL = $("#userKYCUpload").attr("action");
//alert(actionURL);
console.log(fd);
$.ajax({
url: actionURL,
type: 'post',
data: fd,
contentType: false,
processData: false,
success: function(data,textStatus,xhr){
if(data != 0){
$("#modal-fileUploadedSuccessfully").modal('show');
$(".loadingSec").hide();
}else{
alert('file not uploaded');
}
},
error: function(xhr,textStatus,errorThrown){
alert('file not uploaded');
},
beforeSend: function(xhr) {
xhr.setRequestHeader("accessToken",saccessToken);
}
});
} else {
removeUpload();
}
}



function readBankStatement(input) {
$(".loadingSec").show();
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function(e) {
$('.bsUpload .image-upload-wrap').hide();

$('.bsUpload .file-upload-image').attr('src', "http://182.18.139.198/new/assets/images/pdf.png");
$('.bsUpload .file-upload-content').show();

$('.bsUpload .image-title').html(input.files[0].name);
};

reader.readAsDataURL(input.files[0]);

var fd = new FormData();
var files = input.files[0];
fd.append('BANKSTATEMENT',files);
// alert(fd);
var actionURL = $("#userKYCUpload").attr("action");
// alert(actionURL);

$.ajax({
url: actionURL,
type: 'post',
data: fd,
contentType: false,
processData: false,
success: function(data,textStatus,xhr){
if(data != 0){
$("#modal-fileUploadedSuccessfully").modal('show');
$(".loadingSec").hide();
}else{
alert('file not uploaded');
}
},
error: function(xhr,textStatus,errorThrown){
console.log('Error Something');
},
beforeSend: function(xhr) {
xhr.setRequestHeader("accessToken",saccessToken);
}

});

} else {
removeUpload();
}
}


function removeUpload(fromclass) {
//var fromclass = $(this).attr("id");
//alert(fromclass);
$('.'+fromclass+' .file-upload-input').replaceWith($('.'+fromclass+' .file-upload-input').clone());
$('.'+fromclass+' .file-upload-content').hide();
$('.'+fromclass+' .image-upload-wrap').show();
}


$('.image-upload-wrap').bind('dragover', function () {
$('.image-upload-wrap').addClass('image-dropping');
});

$('.image-upload-wrap').bind('dragleave', function () {
$('.image-upload-wrap').removeClass('image-dropping');
});


$(".uploadKYC").click(function(){
////alert(1);
// Get form
var form = $('#fileUploadForm')[0];

// Create an FormData object
var data = new FormData(form);

// If you want to add an extra field for the FormData
//data.append("CustomField", "This is some extra data, testing");
//$('.uploadAllFilesAdded').prop("disabled", true);

//alert(data);

var panUpload = $('.panFileUpload').val();
//alert(panUpload);


var aadharUpload = $('.aadharFileUpload').val();
// alert(aadharUpload);

var passportUpload = $('.passportFileUpload').val();
// alert(passportUpload);
// var file = panUpload.files[0];
// var formData = new FormData();
// formData.append('file', file)

});


function setKYCvars(){
suserId = getCookie("sUserId");
sprimaryType = getCookie("sUserType");
saccessToken = getCookie("saccessToken");

if(userisIn == "local"){
//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
var formUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/upload/kyc";

}else{
// https://fintech.oxyloans.com/oxyloans/
var formUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/upload/kyc";

}
//var formUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/upload/kyc";
$("#userKYCUpload").attr("action", formUrl);
}