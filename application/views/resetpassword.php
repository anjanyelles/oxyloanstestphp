<?php include 'header1.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>OxyLoans</b>- P2P</a>
    </div>
    <!-- /.login-logo -->
    <div class="reset-box-body">
        <!--reset password-->
        <div class="resetSection">
            <p class="reset-box-msg">Use the form below to reset your password.</p>

            <form method="post" id="resetSection">
                <div class="form-group has-feedback">
                    <input type="password" class="form-control passwordValue" placeholder=" Set your Password"
                        id="password" name="password" data validatation="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control cpasswordValue" placeholder=" confirm your Password"
                        id="cpassword" name="cpassword" data validation="cpassword">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck" style="display: none;">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="form-group">
                    <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password"
                        type="submit">
                </div>
                <!-- /.col -->
        </div>
        </form>
        <a href="#">Back to Login</a><br>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</div>

<!-- iCheck -->
<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>
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