<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>
<?php 
$enach_mandate_reponse = $_REQUEST['msg'];
$enach_mandate_reponse_ary = explode("|",$enach_mandate_reponse);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            eNACH Mandate Response
        </h1>
        <div class="pull-left" style="display: none;">
            <small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">eNACH Mandate Response</li>
                </ol>
            </small>
        </div>
    </section>
    <div class="cls"></div>
    <!-- Main content -->
    <section class="content">
        <div class="cls"></div>
        <div class="row">
            <div class="col-md-12">
                <?php

                    if (count($enach_mandate_reponse_ary) > 1)
                    {

                        if ($enach_mandate_reponse_ary[0] == '0398' || $enach_mandate_reponse_ary[0] == '0300')
                        {
                    ?>
                <span class="success" style="font-size: 25px !important;; font-weight:bold !important;">Your eNACH
                    mandate is activated.</span>
                <script type="text/javascript">
                AppLevelsaveEMandateResponse(<?php echo "'";?><?php echo $enach_mandate_reponse;?><?php echo "'";?>);
                </script>

                <?php
                        }
                        else
                        {
                    ?>
                <span class="error" style="font-size: 20px !important;">Problem occured while activating eNACH mandate,
                    Please try again.</span>
                <br><span class="error"
                    style="font-size: 25px !important;"><?php echo $enach_mandate_reponse_ary[2];?></span>
                <script type="text/javascript">
                AppLevelsaveEMandateResponse(<?php echo "'";?><?php echo $enach_mandate_reponse;?><?php echo "'";?>);
                </script>
                <?php
                        }
                                        }else{
                                     ?>
                <span class="error" style="font-size: 25px !important;">Problem occured while activating eNACH mandate,
                    Please try again.</span>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<?php include 'footer.php';?>