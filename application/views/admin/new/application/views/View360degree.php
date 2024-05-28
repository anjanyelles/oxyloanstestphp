<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$borrowerId =  isset($_GET['borrowerId']) ? $_GET['borrowerId'] : '0';
?>
<div class="content-wrapper" style="">
    <section class="content-header">

        <div class="pull-left">
            <h4 class="m-5">
                Borrower Documents
            </h4>
        </div>
        <div class=" pull-right">
            <small>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="idb"><i class="fa fa-dashboard"></i>Home</a></li>
                    <li class="breadcrumb-item"><a href="viewmyDeals">My Running Deals</a></li>
                </ol>
            </small>
        </div>
    </section>



    <div class="container container-fluid container-md display_doc_download">

        <div class=" student_note_block">
            <p><code>Note: </code><span> All the documents are in pdf format; click the below links to download and view
                    them.</span>
            </p>
        </div>




        <div class="student_doc_block_main">

            <div class="doc_student_block showPAN" style="display:none">
                <a href="" class=" btn" type="button" target="_blank" type="application/octet-stream"
                    download="">PAN</a>
            </div>
            <div class="doc_student_block showAADHAR" style="display:none">
                <a href="" class="btn" type="button" target="_blank" type="application/octet-stream"
                    download="">Aadhaar</a>
            </div>
            <div class="doc_student_block showPASSPORT" style="display:none">
                <a href="" class="btn" type="button" target="_blank" type="application/octet-stream"
                    download="">Passport
                </a>
            </div>
            <div class="doc_student_block showTENTH" style="display:none">
                <a href="" class="btn" type="button" target="_blank" type="application/octet-stream" download="">SSC</a>
            </div>
            <div class="doc_student_block showINTER" style="display:none">
                <a href="" class="btn" type="button" target="_blank" type="application/octet-stream"
                    download="">Intermediate </a>
            </div>
            <div class="doc_student_block showGRADUATION" style="display:none">
                <a href="" class="btn" type="button" target="_blank" type="application/octet-stream"
                    download="">graduation</a>
            </div>

            <div class="doc_student_block showUNIVERSITYOFFERLETTER" style="display:none">
                <a href="" class="btn" type="button" target="_blank" type="application/octet-stream" download>university
                    allotment letter</a>
            </div>


            <div class="doc_student_block showFEE" style="display:none">
                <a href="" class="btn" type="button" target="_blank" type="application/octet-stream"
                    download="">University
                    fee</a>
            </div>

            <div class="doc_student_block showDRIVINGLICENCE" style="display:none">
                <a href="" class="btn" type="button" target="_blank" type="application/octet-stream" download="">Driving
                    Licence </a>
            </div>

            <div class="doc_student_block showPAYSLIPS" style="display:none">
                <a href="" class="btn" type="button" target="_blank" type="application/octet-stream"
                    download="">PAYSLIPS</a>
            </div>

            <div class="doc_student_block showCHEQUELEAF" style="display:none">
                <a href="" class="btn" type="button" target="_blank" type="application/octet-stream" download="">Cheque
                    Leaf </a>
            </div>
        </div>
    </div>


    <div class="row view_brrowerdocs" style="display:none">

        <div class="viewdoc_block showAADHAR">
            <p class="text-center">PAN</p>
            <embed class="embedAADHAR"
                src="https://oxyloanstestv1.s3.ap-south-1.amazonaws.com/26/AADHAR_download ravi anna.pdf#toolbar=0&navpanes=0&scrollbar=0"
                content-type="application/pdf" scrolling="auto"
                pluginspage="http://www.adobe.com/products/acrobat/readstep2.html" background-color="0xFF525659"
                top-toolbar-height="56" full-frame="" internalinstanceid="21" title="CHROME"></embed>
        </div>


        <div class="viewdoc_block ViewIframe">
            <iframe src="http://docs.google.com/gview?
             url=https://oxyloanstestv1.s3.ap-south-1.amazonaws.com/26/AADHAR_download ravi anna.pdf&embedded=true"
                style="width:100px; height:100px;" frameborder="0">
            </iframe>
        </div>

        <div class="viewdoc_block aadhar">
            <p class="text-center">aadhar</p>
            <embed src="http://infolab.stanford.edu/pub/papers/google.pdf#toolbar=0&navpanes=0&scrollbar=0"
                type="application/pdf" scrolling="auto"></embed>
        </div>

        <div class="viewdoc_block passport" style="display:none">
            <p class="text-center">passport</p>
            <embed src="http://infolab.stanford.edu/pub/papers/google.pdf#toolbar=0&navpanes=0&scrollbar=0"
                type="application/pdf" scrolling="auto"></embed>
        </div>


        <div class="viewdoc_block tenth" style="display:none">
            <p class="text-center">tenth</p>
            <embed src="http://infolab.stanford.edu/pub/papers/google.pdf#toolbar=0&navpanes=0&scrollbar=0"
                type="application/pdf" scrolling="auto"></embed>
        </div>
        <div class="viewdoc_block inter" style="display:none">
            <p class="text-center">inter</p>
            <embed src="http://infolab.stanford.edu/pub/papers/google.pdf#toolbar=0&navpanes=0&scrollbar=0"
                type="application/pdf" scrolling="auto"></embed>
        </div>

        <div class="viewdoc_block graduation" style="display:none">
            <p class="text-center">graduation</p>
            <embed src="http://infolab.stanford.edu/pub/papers/google.pdf#toolbar=0&navpanes=0&scrollbar=0"
                type="application/pdf" scrolling="auto"></embed>
        </div>
        <div class="viewdoc_block universityallotment" style="display:none">
            <p class="text-center">universityallotment</p>
            <embed src="http://infolab.stanford.edu/pub/papers/google.pdf#toolbar=0&navpanes=0&scrollbar=0"
                type="application/pdf" scrolling="auto"></embed>
        </div>
        <div class="viewdoc_block universityfee" style="display:none">
            <p class="text-center">universityfee</p>
            <embed src="http://infolab.stanford.edu/pub/papers/google.pdf#toolbar=0&navpanes=0&scrollbar=0"
                type="application/pdf" scrolling="auto"></embed>
        </div>
        <div class="viewdoc_block drivinglicence" style="display:none">
            <p class="text-center">licence</p>
            <embed src="http://infolab.stanford.edu/pub/papers/google.pdf#toolbar=0&navpanes=0&scrollbar=0"
                type="application/pdf" scrolling="auto"></embed>
        </div>
    </div>
</div>

<script type="text/javascript">
window.onload = searchBorrowerdoc("BORROWER", <?php echo $borrowerId ?>);
</script>


<?php include 'footer.php';?>