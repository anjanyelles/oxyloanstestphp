<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <section class="content-header">

        <div class="col-md-12 ">
            <div class="pull-right">
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="card cmsBoxCard">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="tab" class="active"><a href="#home" aria-controls="home" role="tab"
                                data-toggle="tab"><i class="fa fa-money"></i> <span>
                                    Pending Principal
                                </span></a></li>
                        <li role="tab"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i
                                    class="fa fa-file" aria-hidden="true"></i> <span>Pending Interest</span></a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <div class="" style="width:100%;">
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="box" style="margin-top:0px!important; border: none!important;">
                                                <div class="box-header" style="padding:0px!important;">
                                                    <h4 style="margin-left:10px;" class="text-bold">Pending Principal
                                                        Files</h4>
                                                </div>
                                                <div class="box-body">

                                                    <table id="example2" class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr id="example">
                                                                <th>Deal Id</th>
                                                                <th>User Id</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="displayPendingFilesData">

                                                            <tr style="display: none;" id="displaypendingH2h">
                                                                <td colspan="12">No data found</td>
                                                            </tr>

                                                            </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile">
                            <div class="" style="width:100%;">
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="box" style="margin-top:0px!important; border: none!important;">
                                                <div class="box-header" style="padding:0px!important;">
                                                    <h4 style="margin-left:10px;" class="text-bold">Pending Interest
                                                        Files</h4>
                                                </div>
                                                <div class="box-body">
                                                    <table id="example2" class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr id="example">
                                                                <th>Payment Date</th>
                                                                <th>Deal Id</th>
                                                                <th>User Id</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="displayh2hPendingData">

                                                            <tr style="display: none;" id="displayPendingH2HInfo">
                                                                <td colspan="12">No data found</td>
                                                            </tr>

                                                            </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section>
    <div class="modal modal-success fade" id="modal-cicsuccessinfo">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Status</h4>
                </div>
                <div class="modal-body">
                    <p id="display_text"></p>

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




    <script id="displayPendingFilesTpl" type="text/template">
        {{#data}}
      <tr>
        <td>{{dealId}}</td>
        <td>{{userId}}</td>
        <td>{{amount}}</td>
      </tr>
      {{/data}}
      </script>

    <script id="displayPendingH2hFiles" type="text/template">
        {{#data}}
      <tr>

         <td>
        {{paymentDate}}
        </td>
        <td>
        {{dealId}}
        </td>
  
         <td>
          {{userId}}
        </td>
        <td>
         {{amount}}
        </td>
      </tr>
      {{/data}}
      </script>
    <script type="text/javascript">
    window.onload = pendingPrincipalFiles();
    window.onload = pendingH2HFiles();
    </script>


    <style type="text/css">
    .nav-tabs {
        border-bottom: 2px solid #DDD;
    }

    .nav-tabs>li.active>a,
    .nav-tabs>li.active>a:focus,
    .nav-tabs>li.active>a:hover {
        border-width: 0;
        color: #fff !important;
        background: #00a65a !important;
    }

    .nav-tabs>li>a {
        border: none;
        color: #1E5959 !important;
        background: #fff !important;
    }

    .nav-tabs>li>a::after {
        content: "";
        background: #316879;
        height: 2px;
        position: absolute;
        width: 100%;
        left: 0px;
        bottom: -1px;
        transition: all 250ms ease 0s;
        transform: scale(0);
    }

    .nav-tabs>li.active>a::after,
    .nav-tabs>li:hover>a::after {
        transform: scale(1);
    }

    .tab-nav>li>a::after {
        background: #1E5959 none repeat scroll 0% 0%;
        color: #fff;
    }

    .tab-pane {
        padding: 30px 0;
    }

    .tab-content {
        padding: 10px
    }

    .nav-tabs>li {
        width: 20%;
        text-align: center;
        font-family: sans-serif;
        font-weight: bold;
    }

    .card {
        background: #FFF none repeat scroll 0% 0%;
        box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3);
        margin-bottom: 30px;
        min-height: 450px;
    }

    i {
        margin-left: 3px;
    }

    .list-group-flush .list-group-item {
        padding-bottom: 30px;
        background-color: #F5F5F5;
    }

    @media all and (max-width:724px) {
        .nav-tabs>li>a>span {
            display: none;
        }

        .nav-tabs>li>a {
            padding: 5px 5px;
        }
    }

    @media (min-width: 1200px) {
        .container {
            width: 1030px !important;
        }

        .text_Updates {
            color: #3c8dbc;
        }

    }
    </style>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <?php include 'admin_footer.php';?>