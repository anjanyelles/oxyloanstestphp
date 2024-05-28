<?php include 'header1.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>OxyLoans</b>- P2P</a>
    </div>
    <?php
    $urlfromBroweser = $_SERVER['REQUEST_URI'];
    //echo $urlfromBroweser;
    $userEmailFromRequest =  isset($_GET['email']) ? $_GET['email'] : '';;

    $receivedEmailToken = isset($_GET['emailToken']) ? $_GET['emailToken'] : '';
   ?>

    <!-- /.login-logo -->
    <div class="login-box-body">
        <div class="text-center">
            <div>

                <h3><i class="fa fa-lock fa-4x"></i></h3>
                <h2 class="text-center">Reset Password?</h2>
                <p>You can reset your password here.</p>
                <p class="displayError-forgot error" style="display: none;">
                    Please enter email to reset password.
                </p>


            </div>

            <div class="enterforgotSection" <?php if($userEmailFromRequest == "" && $receivedEmailToken == ""){?>
                style="display: block;" <?php } else {?> style="display: none;" <?php } ?>>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control email" placeholder="Email" id="email" name="email" data
                        validations="email" autocomplete="off">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>



                <button type="submit" class="btn btn-lg btn-primary btn-block" id="resetbtn">Reset Password</button>
            </div>


            <!--Reset password-->
            <div class="resetSection" <?php if($userEmailFromRequest == "" && $receivedEmailToken == ""){?>
                style="display: none;" <?php } else {?> <?php } ?>>
                <!--- reset password section-->
                <div class="resetSection">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder=" Here your Email"
                            value="<?php echo $userEmailFromRequest;?>" readonly>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control passwordValue " placeholder=" Set your Password"
                            id="password" name="password" data-validation="password">
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control cpasswordValue " placeholder=" confirm your Password"
                            id="cpassword" name="cpassword" data-validation="cpassword">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback" style="display: none;">
                        <input type="emailToken" class="form-control emailToken"
                            value="<?php echo  $receivedEmailToken;?>" readonly>
                    </div>

                    <button class="btn  btn-primary btn-block btn-flat" id="savebtn">Save</button>
                </div>
            </div>
            <!--ends reset section-->






            <div class="modal modal-success fade text-left" id="modal-resetpasswordSuccess">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Congratulations!</h4>
                        </div>
                        <div class="modal-body">
                            <p>Password is successfully updated.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>




            <div class="modal modal-danger fade text-left" id="modal-resetpasswordError">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">OOPS!</h4>
                        </div>
                        <div class="modal-body">
                            <p>Email not found! Please check. </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <a href="<?php echo base_url(); ?>userlogin">Back to Login</a><br>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
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