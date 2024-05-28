 <?php include 'header.php';?>
 <?php include 'lendersidebar.php';?>
 <div class="content-wrapper">
     <section class="content-header">
         <h1>
             Load Your Wallet Through QR Code
         </h1>
         <div class="pull-right">
             <small>

                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="https://sites.google.com/view/walletloading/home"
                             target="_blank"> <i class="fa fa-angle-double-right"> </i> Help </a></li>
                     <li class="breadcrumb-item"><a href="idb"><i class="fa fa-dashboard"></i> Home </a></li>
                     <li class="breadcrumb-item"><a href="withdrawWalletToWallet">Wallet to Wallet</a></li>

                 </ol>
             </small>
         </div>
     </section>
     <div class="row">
         <div class="col-md-12">
             <div class="box box-primary">
                 <div class="box-header">
                 </div>
                 <div class="box-body">
                     <div class="qrbox-info">
                         <div class="qrbox-text">
                             <h1><i class="fa fa-qrcode" aria-hidden="true"></i> Load Your wallet with QR Scan</h1>
                             <div>
                                 <input type="text" name="qrAmount" placeholder="Enter The amount" id="qrAmountValue">
                                 <span class="nullQrAmount pull-left" style="display: none;"><em class="error">Enter the
                                         Amount Value</em></span>
                             </div>

                             <div>

                                 <CENTER>
                                     <button type="Submit" class="btn btn-info btn-lg" style="margin-top:15px;"
                                         id="genQRcode"> SUBMIT </button>
                                 </CENTER>
                             </div>

                             <div class="qrNotePoints">
                                 <code><strong>Note:</strong></code>
                                 <ul>
                                     <li>Transaction limit is INR <b>1,00,000</b> Only.</li>
                                     <li>If you want to load more than a lakh, you have to scan multiple times.</li>
                                 </ul>

                             </div>
                         </div>
                         <div id="qrcode-container" style="display: none;">

                             <input type="hidden" name="qrUrl" id="qrUrlpath">
                             <input type="hidden" name="qrUrlID" id="qrUrlID">
                             <h2 style="align-items: center; margin:10px;font-family: sans-serif;">Scan QR CODE</h2>
                             <hr class="underline">
                             </hr>
                             </br>
                             <canvas id="qrcode" class="qrcode"></canvas>
                             <div class="qrNotePoints pull-right">
                                 <code><strong>Note:</strong></code>
                                 <ul>
                                     <li>Transaction limit is INR 1,00,000 Only.</li>
                                     <li>If you want to load more than a lakh, you have to scan multiple times.</li>
                                     <!--   <li>Pay Through Link: <a href="" class="qrPayThroughLink" target="_blank"></a></li> -->
                                 </ul>

                             </div>
                             </br>
                             <button class="btn btn-outline-dark  btn-lg backtoamount" onclick="backtoQRamount();"><i
                                     class="fa fa-arrow-left" aria-hidden="true"></i> BACK </button>

                         </div>

                         <div id="page-wrap" style="display: none;">
                             <div class="meter">
                                 <span style="width: 100%"></span>
                             </div>
                             <div class="status-progressbar">

                                 <div class="qr-scanStatus">
                                     Status: <span class="qrscanStatus"
                                         style="font-size: 20px; font-family: sans-serif;">Initiated</span>
                                     </br>
                                     <button class="btn btn-outline-dark  btn-lg backtoamount qrStatusBack "
                                         onclick="backtoQRamount();"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                         BACK </button>
                                 </div>


                             </div>
                         </div>
                     </div>

                     <div class="displayHelpVideoSection">
                         <h1>How to load the wallet through UPI</h1>
                         <div class="videpPlayerSection">
                             <iframe width="100%" height="265" src="https://www.youtube.com/embed/RUg_WsZ-90g?rel=0"
                                 title="YouTube video player" frameborder="0"
                                 allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                 allowfullscreen></iframe>
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </div>
 </div>
 <style type="text/css">
.meter {
    box-sizing: content-box;
    height: 40px;
    /* Can be anything */
    position: relative;
    margin: 60px 0 20px 0;
    /* Just for demo spacing */
    /*background: #555;*/
    border-radius: 25px;
    padding: 0px;
    box-shadow: inset 0 -1px 1px rgba(255, 255, 255, 0.3);
}

.meter>span {
    display: block;
    height: 80%;
    border-top-right-radius: 0px;
    border-bottom-right-radius: 0px;
    border-top-left-radius: 0px;
    border-bottom-left-radius: 0px;
    background-color: rgb(43, 194, 83);
    background-image: linear-gradient(center bottom,
            rgb(43, 194, 83) 37%,
            rgb(84, 240, 84) 69%);
    box-shadow: inset 0 2px 9px rgba(255, 255, 255, 0.3),
        inset 0 -2px 6px rgba(0, 0, 0, 0.4);
    position: relative;
    overflow: hidden;
}

.meter>span:after,
.animate>span>span {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    background-image: linear-gradient(-45deg,
            rgba(255, 255, 255, 0.2) 25%,
            transparent 25%,
            transparent 50%,
            rgba(255, 255, 255, 0.2) 50%,
            rgba(255, 255, 255, 0.2) 75%,
            transparent 75%,
            transparent);
    z-index: 1;
    background-size: 50px 50px;
    animation: move 2s linear infinite;
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    overflow: hidden;
}

.animate>span:after {
    display: none;
}

@keyframes move {
    0% {
        background-position: 0 0;
    }

    100% {
        background-position: 50px 50px;
    }
}

.orange>span {
    background-image: linear-gradient(#f1a165, #f36d0a);
}

.red>span {
    background-image: linear-gradient(#f0a3a3, #f42323);
}

.nostripes>span>span,
.nostripes>span::after {
    background-image: none;
}

#page-wrap {
    width: 490px;
    margin: 80px auto;
}
 </style>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
 <?php include 'footer.php';?>