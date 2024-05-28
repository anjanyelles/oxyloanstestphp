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
        <a href="../../index2.html"><b>OxyLoans</b>- P2P</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Activate user account here</p>

        <form class="activateSection" method="POST" autocomplete="off">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder=" Here your Email"
                    value="<?php echo $userEmailFromRequest;?>" readonly>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control passwordValue" placeholder=" Set your Password" id="password"
                    name="password" data validation="password">
                <span id="strength_message"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control cpasswordValue" placeholder=" confirm your Password"
                    id="cpassword" name="cpassword" data valiidation="cpassword">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback" style="display: none;">
                <input type="emailToken" class="form-control emailToken" value="<?php echo  $receivedEmailToken;?>"
                    readonly>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck" style="display: none;">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <a href="<?php echo base_url(); ?>userlogin">Back to Login</a><br>

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