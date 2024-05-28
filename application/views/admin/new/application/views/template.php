<?php include 'header1.php';?>
<!-- Content Wrapper. Contains page content -->

<!-- /.login-logo -->
<div>

    <body style="margin:0; padding:40px 0 30px 0;">
        <table align="center" cellpadding="0" cellspacing="0" width="500"
            style="border-width:10px; border-color: #2595FF; border-style: solid;">
            <tr>
                <td align="center" bgcolor="#ffffff" style="padding: 40px 0 30px 0;">
                    <img src="https://secure.oxyloans.com/_ui/images/main_logo.png" width="300"
                        style="display: block;" />
                    <p>Thank you for registering with Oxyloans. Click the link below to activate your account. </p>
                    <a href="<?php echo base_url(); ?>activateuser">Activate</a>
                </td>
            </tr>
        </table>
        <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
$(function() {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
    });
});
</script>