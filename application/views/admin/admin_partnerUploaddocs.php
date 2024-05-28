<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="col-md-3 pull-left">

            <h4>
                Upload NDA And MOU
            </h4>
        </div>

        <div class="col-md-8 pull-right input-group">
            <button class="btn btn-info pull-right"><span class="fa fa-download"
                    onclick="downloadPartnerDocs('PARTNERMOU');"> Uploaded MOU</span></button>
            <button class="btn btn-primary pull-right" style="margin-right:10px"
                onclick="downloadPartnerDocs('PARTNERNDA');"><span class="fa fa-download"> Uploaded NDA</span></button>
        </div>
    </section>

    <!-- Main content -->
    <section class="content" style="min-height: 1000px!important;">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="row dropfiles">


                        <div class="frame" style="float:right;">
                            <div class="center">
                                <div class="title">
                                    <h1 class="text">Drop NDA file to upload</h1>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="ndafileupload"
                                        aria-describedby="inputGroupFileAddon01">
                                </div>
                                <button type="button" class="btn btnfiles" name="uploadbutton"
                                    onclick="readNDA();">Upload NDA</button>

                            </div>
                        </div>


                        <div class="moudrop">
                            <div class="center">
                                <div class="title">
                                    <h1 class="text">Drop MOU file to upload</h1>
                                </div>

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="moufileupload"
                                        aria-describedby="inputGroupFileAddon01">
                                </div>

                                <button type="button" class="btn btnfiles" name="uploadbutton"
                                    onclick="readMOU();">Upload MOU</button>

                            </div>
                        </div>

                    </div>




                </div>



            </div>

        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>


<div class="modal modal-success fade" id="modal-partnerNDAupload">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>NDA uploaded successfully</p>
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

<div class="modal modal-success fade" id="modal-partnerMOUupload">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>MOU uploaded successfully</p>
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
<div class="modal modal-success fade" id="modal-successdownload">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>you have successfully Download </p>
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
<div class="modal modal-Error fade" id="modal-errordownload">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body">
                <p>Something went Worng</p>
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
<div class="modal modal-error fade" id="modal-errorpartnerNDAupload">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body">
                <p>Your NDA file is not upload</p>
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

<div class="modal modal-success fade" id="modal-successdownload">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>you have successfully Download </p>
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
<div class="modal modal-Error fade" id="modal-errordownload">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body">
                <p>Something went Worng</p>
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
                <p>Your MOU file is not upload</p>
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


<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Open+Sans:700,300);

.dropfiles {

    flex-direction: row;
    justify-content: center;
    align-items: center;
    margin-top: 40px !important;
    font-family: "Open Sans", Helvetica, sans-serif;
}

.frame {
    /*  position: absolute;*/
    margin-top: 30px;
    width: 500px;
    height: 400px;
    border-radius: 2px;
    /*  box-shadow: 4px 8px 16px 0 rgba(0, 0, 0, 0.1);*/
    overflow: hidden;
    color: #333;



}

.center {
    position: absolute;
    top: 30%;
    /*  left: 10%;*/
    /*  transform: translate(-50%, -50%);*/
    width: 400px;
    height: 260px;
    border-radius: 3px;
    /*  box-shadow: 8px 10px 15px 0 rgba(0, 0, 0, 0.2);*/
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    flex-direction: column;

}

.title {
    width: 100%;
    height: 50px;
    border-bottom: 1px solid #999;
    text-align: center;
}

.text {
    font-size: 16px;
    font-weight: 700;
    color: #666;
}

.custom-file {
    border: 1px dashed #999;
    border-radius: 2px;
    text-align: center;
    padding: 5px;
    color: #666;
}


.upload-input {
    position: relative;
    top: -62px;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
}

.btnfiles {
    display: block;
    width: 140px;
    height: 40px;
    background: #00a65a;
    color: #fff;
    border-radius: 3px;
    border: 0;
    font-size: 14px;
}
</style>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<?php include 'admin_footer.php';?>