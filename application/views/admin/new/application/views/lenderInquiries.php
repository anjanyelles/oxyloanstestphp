<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$ticketRequestId =  isset($_GET['id']) ? $_GET['id'] : 'null';
$dealName =  isset($_GET['dealName']) ? $_GET['dealName'] : 'null';
$dealId =  isset($_GET['dealId']) ? $_GET['dealId'] : 'null';
?>

<div class="content-wrapper">
    <section class="content-header" style="margin-bottom: 40px;">
        <div class="alert querrySuccessMessage" role="alert" style="background-color:#D0f0C0; display: none;">
            <p class="text-bold"> 
Thank you for reaching out to us. Your request has been successfully received, and a ticket has been generated. Our dedicated support team is currently reviewing your inquiry. You can expect a personalized response within the next 3 to 5 business days </p>

        </div>
    </section>
    <input type="hidden" id="query-Name" value="">
    <input type="hidden" id="query-Email" value="">
    <input type="hidden" id="query-Mobile" maxlength="12" value="">

    <div class="container contact_us_main">
        <div class="title text-center">contact us</div>
        <div class="hearder_part accordion-body">
            <div class="address_section">
                <div class="icons_box">
                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                </div>
                <div class="sub_text">
                    <span> CC-02, Block-C</span>
                    <span> Indu Fortune Fields, KPHB Colony,</span>
                    <span> Hyderabad</span>
                </div>

            </div>
            <div class="phone_section">
                <div class="icons_box">
                    <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                </div>
                <div class="sub_text">
                    <span>9966888825</span>
                </div>

            </div>
            <div class="email_section">
                <div class="icons_box">
                    <span class=" glyphicon glyphicon-envelope" aria-hidden="true"></span>
                </div>
                <div class="sub_text">
                    <span> support@oxyloans.com</span>
                </div>

            </div>
            <div class="website_section">
                <div class="icons_box">
                    <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>

                </div>
                <div class="sub_text">
                    <span><a href="https://oxyloans.com/faq/" target="_blank" style="color:#333;">More</a></span>
                </div>

            </div>
        </div>
        <div class="form_data">
            <h1>Query and screenshot</h1>
            <div class="upload-container">
                <div>
                    <textarea class="documentTextarea" name="document" rows="5" cols="10"
                        placeholder="Paste or write your query here" id="query-Subject"></textarea>
                    <span class="inquiriesQuery error" style="display: none;">Please enter your Query</span>
                </div>
                <div class="uploadimagedoc">
                    <div class="upload_doc">
                        <input type="file" name="imageUpload" id="imageUpload" class="hide"
                            onchange="uploadQueryScreesShot(this);" accept="image/*" />
                        <label for="imageUpload" class="uploadbtn uploadbtn-large"> <span
                                class="glyphicon glyphicon-upload" aria-hidden="true" for="imageUpload"> </span></label>
                    </div>
                    <input type="hidden" id="queryDocumnetId">

                </div>
                <div class="img_preview_wrap" style="display:none;">
                    <img src="" id="imagePreview" alt="Preview Image" width="150px" height="180px">
                </div>
            </div>

            <div class="query_submit_btn">
                <button class="btn btn-info" id="query-submit"
                    onclick="readingQueriesFromUsers('<?php echo$ticketRequestId ?>','<?php echo$dealName ?>','<?php echo$dealId ?>');">Submit</button>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
gettingMobileAndEmail();
</script>

<script type="text/javascript">
$('#imageUpload').change(function() {
    readImgUrlAndPreview(this);

    function readImgUrlAndPreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(".img_preview_wrap").css("display", "block");
                $('#imagePreview').removeClass('hide').attr('src', e.target.result);
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
});
</script>

<?php include 'footer.php';?>