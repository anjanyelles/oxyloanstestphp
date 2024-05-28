<?php include 'header1.php';?>
<!-- Content Wrapper. Cotains page content -->
<?php
   $urlfromBroweser = $_SERVER['REQUEST_URI'];
  //echo $urlfromBroweser;
  $userEmailFromRequest =  $_GET['email'];
  $receivedEmailToken = $_GET['emailToken'];
?>
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Attention</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body text-center">
        <div><p>Your OxyLoans account is currently inactive. Reach out to admin@oxyloans.com to reactivate and resume accessing platform features.</p></div>
       
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- <div class="modal modal-success fade" id="modal-activateUser">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
              </div>
              <div class="modal-body">
                <p><b>Now, </b>Your account is activated and password has been set. Please login.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
             /.modal-content 
         
        </div> -->


<div class="modal modal-danger fade" id="modal-activateUser-error">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <p>Account does not exists. Please <a href="<?php echo base_url(); ?>register">register now</a>!</p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.passtrength.js?OXY=<?php echo time(); ?>"></script>

<script>
$(function() {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
    });
});
</script>

<?php include 'footer.php';?>