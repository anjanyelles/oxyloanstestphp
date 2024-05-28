<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>

<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$ticketRequestId =  isset($_GET['id']) ? $_GET['id'] : 'null';
?>

<div class="content-wrapper">
    <section class="content-header" style="margin-bottom: 40px;">
        <div class="row notepoint text-bold" style="margin-left: 10px; margin-top:10px">
            <code>Note : </code> Currently, we are processing loans to students who opt for global education only.
        </div>
        <div class="alert querrySuccessMessage" role="alert" style="background-color:#D0f0C0; display: none;">
            <p class="text-bold"> We have received your query and will get back to you with a response soon. Thank you
                for reaching out to us.</p>
        </div>
    </section>
    <div class="row customFormQ">
        <div class="box box-primary">
            <div class="box-body">
                <div class="box-body no-padding">
                    <div class="col-md-6 pull-right mbl-ref-form" style="text-align:center; margin-bottom:0px;">

                        <img src="<?php echo base_url(); ?>/assets/images/contact.png" alt="Refer a Friend"
                            style="width:50%;height: 80%; margin-top:50px; margin-left:130px;" />
                        <ul>
                            <li class="text-bold" style="padding-left: 50px; margin-top: 10px;">If you have question or
                                just want to get in touch, use the form.</li>
                        </ul>
                    </div>
                    <div class="col-md-6 pull-left mbl-ref-form" style="margin-top: 35px; padding-left: 100px;">
                        <div style="margin-bottom:10px;text-align: center;">
                            <h4>Contact Us</h4>
                        </div>

                        <div class="account_form upload_pdf leftsecblkreff">
                            <span><b>Name:</b></span>
                            <input type="text" placeholder="Enter Your name" id="query-Name">
                            <span class="inquiriesUser error" style="display: none;">Please enter your name</span>

                        </div>
                        <div class="account_form upload_pdf leftsecblkreff">
                            <span><b>Email:</b><em class="mandatory">*</em></span>
                            <input type="text" placeholder="Enter Your Email" id="query-Email">
                            <span class="inquiriesEmail error" style="display: none;">Please enter the valid
                                Email</span>
                        </div>

                        <div class="account_form upload_pdf leftsecblkreff">
                            <span><b>Whatsapp Number:</b><em class="mandatory">*</em></span>
                            <input type="text" placeholder="Enter Whatsapp  Number" id="query-Mobile">
                            <span class="inquiriesWhatsapp error" style="display: none;">Please enter your Whatsapp
                                No</span>
                        </div>
                        <div class="account_form upload_pdf leftsecblkreff">
                            <span><b>Query:</b><em class="mandatory">*</em></span>
                            <textarea class="form-control" placeholder="Write message" id="query-Subject"
                                style="height: 100px; width: 405px; resize:none;"></textarea>

                            <span class="inquiriesQuery error" style="display: none;">Please enter your Query</span>
                        </div>
                        <div class="query-submit btN">
                            <div class="upload-Query cproofs pull-left">
                                <label>Attach File</label>
                                <div class="upload_pdf">
                                    <input class="inquire-file-input queryImageUpload query-file-upload-image"
                                        id="query" type='file' onchange="uploadQueryScreesShot(this);"
                                        onclick="$('.transactionUpload')" accept="image/*" />
                                    <input type="hidden" id="queryDocumnetId"> </a>
                                    <div class="clear"></div>
                                </div>
                            </div>


                        </div>

                        <div>
                            <button class="col-md-3  btn btn-lg pull-left" id="query-submit"
                                onclick="readingQueriesFromUsers(<?php echo$ticketRequestId ?>,'null','null');">Submit</button>
                        </div>

                    </div>

                </div>

            </div>

        </div>
        <div class="row thank-query">
            <div class="contact-footer" style="text-align: center;">Question not answered?</br></br>
                Write an Email to admin@oxyloans.com
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<link rel="stylesheet" href="assets/css/selectize.default.css">
<link rel="stylesheet" href="assets/css/dd.css">
<link rel="stylesheet" href="assets/css/animate.css">
<link rel="stylesheet" href="assets/css/responsive.css">
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/style.css">
<script src="<?php echo base_url(); ?>assets/js/myscript.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/animation.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/selectize.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dd.js?oxyloans=<?php echo time(); ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript">
gettingMobileAndEmail()
$(document).ready(function() {
    noprofileCheck = "no";
    noROICheck = "no";
});
</script>
<style type="text/css">
input[type=text],
select {
    width: 100%;
    padding: 12px;
    margin-top: 6px;
    margin-bottom: 16px;
    border: 1px solid transparent;
}

input[type=text],
textarea {
    border-radius: 20px;
}

textarea {
    width: 100%;
    padding: 12px;
    margin-top: 6px;
    margin-bottom: 16px;
}

button {
    position: flex;
    margin-left: 120px;
    width: 100%;
    margin-top: 12px;
    background-color: #FFCE30;
}

.thank-query {
    margin-top: 15px;
    height: 200px;
    width: 100%;
    background-color: #EFE8BA;
}

.thank-query .contact-footer {
    margin-top: 50px;
    font-size: 20px;
    font-family: sans-serif;
}
</style>
<?php include 'footer.php';?>