<!--<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });-->
</script>
<style type="text/css">
.loadingSec {
    text-align: center;
    opacity: 0.5;
    background: #000;
    position: fixed;
    top: 0;
    bottom: 0;
    height: 200%;
    width: 100%;
    z-index: 9999;
    text-align: center;
}

.loadingSec img {
    top: 300px;
    position: absolute;
}
</style>
<script src="<?php echo base_url(); ?>/assets/js/jquery.bootpag.min.js"></script>

<div class="loadingSec" style="display: none;" id="loadingSec">
    <img src="<?php echo base_url(); ?>/assets/images/loading.gif?oxy=1" width="125" />
</div>




<!-- <div class="loadercontainer">
  <div class="outer"></div>
   <div class="inner"></div>
    <div class="middle"></div>
    <div class="dot"></div>
  </div> -->








<div class="modal fade" id="modal-change-primarytype" tabindex="-1" role="dialog"
    aria-labelledby="modal-change-primarytype" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div align="center">
                    <h4>Are You Sure ?</h4>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-success  yesChangeUsesr" data-reqID="" data-type="">Yes</button>
                &nbsp;&nbsp; &nbsp;&nbsp;
                <button type="button" class="btn  btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>


<div class="modal  fade" id="update-paretner-details-mobile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Your Number & Email</h4>
            </div>
            <div class="modal-body">
                <label>phone Number</label>
                <input type="text" name="whastappnumber" id="partnerPhone" class="form-control partnerPhone"></br>
                <label>Email</label>
                <input type="text" name="whastappnumber" id="partnerEmail" class="form-control partnerEmail">
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn-submitFeeinfo btn btn-info"
                        onclick="updateWhatsappNumber();">Submit</button>
                    <button type="button" class="btn btn-default btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-warning fade" id="modal-check-session-expire">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Warning!</h4>
            </div>
            <div class="modal-body">
                <p class="text-profileCheck">
                    Your Session will Expire Automatically in 5 Minutes.</br>
                    Select Continue Session to Extend Your session.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Ok</button>
                <button type="button" class="btn btn-outline btn-outline pull-left" onclick="getNewTime();">Continue
                    Session</button>
                <button type="button" class="btn btn-outline pull-left" onclick="signout();">End session now</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div></div>


</body>

</html>