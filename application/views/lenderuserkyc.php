<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<!-- Content Wrapper. Contains page content -->
<!-- https://bootsnipp.com/snippets/KAX4X -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Upload Your KYC Documents
            <small>KYC Documents</small>
        </h1>
    </section>

    <!-- Main content -->

    <section class="content">
        <form id="userKYCUpload" enctype="multipart/form-data">
            <div class="attachement_main">
                <h3>Documents</h3>

                <!-- pan upload -->
                <div class="attachement_lft">
                    <label>PAN :<em>*</em></label>

                    <input class="custom-file-input panFileUpload pan-file-upload-content" type='file'
                        onchange="readPAN(this);" onclick="$('.panFileUpload')" id="pan" accept="image/*" />

                    <!-- <div class="file_img">
              <img class="file-upload-image panImage pan-file-upload-content img-w"  src="#" alt="your image" />
            </div> -->

                    <a href="#" class="pancard" onclick="viewDoc('PAN')"></a>
                    <!--<span> <a href="#" class="pancard" onclick="viewDoc('PAN')" ></a>    </span> -->

                </div>


                <div class="clear"></div>
                <br>
                <h3>Address Proof's <small>(NOTE: Upload any one of the document given below)</small></h3>

                <!-- Aadhar upload -->


                <div class="attachement_lft">
                    <label>Aadhar :</label>
                    <input class="custom-file-input aadharFileUpload" type='file'
                        onchange="readDocument(this, 'AADHAR', 'aadhar');" id="aadhar" accept="image/*" />
                    <a href="#" class="Aadhardoc" onclick="viewDoc('AADHAR')"></a>
                    <!--   <div class="file_img">
    <img class="file-upload-image aadharImage aadhar-file-upload-content img-w "   src="#" alt="your image"/>
   </div> -->
                </div>

                <!-- Driving License upload -->

                <div class="attachement_lft">
                    <label>Driving License :</label>
                    <input class="custom-file-input drivinglicenceFileUpload " type='file'
                        onchange="readDocument(this,'DRIVINGLICENCE','drivinglicence');" id="drivinglicence"
                        accept="image/*" />
                    <a href="#" class="DrivingLicenseDoc" onclick="viewDoc('DRIVINGLICENCE')"></a>
                    <!-- <div class="file_img">
     <img class="file-upload-image drivinglicenceImage drivinglicence-file-upload-content img-w " src="#" alt="your image"/> 
   </div> -->
                </div>
                <!-- Voter ID upload -->


                <div class="attachement_lft">
                    <label>VoterID :</label>
                    <input class="custom-file-input voteridFileUpload " type='file'
                        onchange="readDocument(this,'VOTERID' ,'voterid');" id="voterid" accept="image/*" />
                    <a href="#" class="voteridDoc" onclick="viewDoc('VOTERID')"></a>
                    <!--  <div class="file_img">
         <img class="file-upload-image voteridImage voterid-file-upload-content img-w " src="#" alt="your image"/> 
       </div> -->
                </div>

                <!-- Passport upload -->

                <div class="attachement_lft">
                    <label>Passport :</label>
                    <input class="custom-file-input passportFileUpload" type='file' onchange="readPASSPORT(this);"
                        id="passport" accept="image/*" />
                    <a href="#" class="Passportdoc" onclick="viewDoc('PASSPORT')"></a>
                    <!--  <div class="file_img">
 <img class="file-upload-image passportImage  passport-file-upload-content img-w " src="#" alt="your image"/> 
</div> -->
                </div>


                <div class="clear"></div>

                <!--  <button class="attachement_submit kycSubmit" >Submit</button> -->
            </div>

        </form>

    </section>
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

$(function() {
    $(".img-w").each(function() {
        $(this).wrap("<div class='img-c'></div>")
        let imgSrc = $(this).find("img").attr("src");
        $(this).css('background-image', 'url(' + imgSrc + ')');
    })


    $(".img-c").click(function() {
        let w = $(this).outerWidth()
        let h = $(this).outerHeight()
        let x = $(this).offset().left
        let y = $(this).offset().top


        $(".active").not($(this)).remove()
        let copy = $(this).clone();
        copy.insertAfter($(this)).height(h).width(w).delay(500).addClass("active")
        $(".active").css('top', y - 8);
        $(".active").css('left', x - 8);

        setTimeout(function() {
            copy.addClass("positioned")
        }, 0)

    })




})

$(document).on("click", ".img-c.active", function() {
    let copy = $(this)
    copy.removeClass("positioned active").addClass("postactive")
    setTimeout(function() {
        copy.remove();
    }, 500)
})
</script>
<!-- /.content-wrapper -->
<?php include 'footer.php';?>