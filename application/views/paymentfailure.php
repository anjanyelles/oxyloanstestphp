<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Payment Status
        </h1>

    </section>
    <div class="cls"></div>

    <!-- Main content -->
    <section class="content">
        <div class="cls"></div>


        <!-- /.box-header -->
        <div class="box-body">
            <span class="error" style="font-size: 25px !important;"> Transaction Failed. Something Went Wrong. Please
                try again after some time ...</span>
        </div>
        <!-- /.box-body -->
    </section>
    <!-- /.content -->
</div>

<script type="text/javascript">
writeCookie('loanssquessequenceno', 'undefined');
writeCookie('loansemsschedulenodd', 'undefined');
</script>

<?php include 'footer.php';?>