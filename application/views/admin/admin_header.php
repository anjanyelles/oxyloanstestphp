

<?php 
    session_start(); // Start the session
    $basePATH_URL = $this->uri->uri_string(); 

    // Check if the user type is set in the session
    if(isset($_COOKIE['sUserType'])) {
        $userType = $_COOKIE['sUserType'];
        
        // Render the sidebar content based on user type
        if($userType === 'ADMIN1') {
            // Render sidebar content for studentadmin
        }
        
    }
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OxyLoans.com| Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->

    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->



    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin.css?oxyloans=<?php echo time()?>">
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Daterange picker -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/colorbox.css?oxyloans=<?php echo time()?>">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    <!-- jQuery 3 -->
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/jquery.colorbox.js?oxyloans=<?php echo time(); ?>"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.colorbox-min.js?oxyloans=<?php echo time(); ?>"></script>


    <script src="<?php echo base_url(); ?>assets/js/admin.js?oxyloans=<?php echo time(); ?>"></script>

    <script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
</head>

<body class="wrapper skin-green sidebar-mini" style="height: auto;
    min-height: 100%;">
    <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">

            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">
            <?php echo $userType; ?>
            </span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><?php echo $userType; ?></span>


        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
 
                <!-- <div class="pull-left viewCms hideInterestPayments" style="margin-right:10px;margin-top: 8px;">
                    <button class="btn btn-primary  readReports" id="CMSReports" onclick="readCmsDatepopup();">Read
                        Reports</button>
                </div> -->



                <!-- <div class="pull-left viewCms hideInterestPayments" style="margin-right:10px">
                    <a href="cmsfoldersFiles">
                        <button class="btn btn-warning btn-top-alg">Cms</button>
                    </a>
                </div>
                <div class="pull-left hideInterestPayments">
                    <a href="showInterestPayments">
                        <button class="btn btn-info btn-top-alg">View Interests & Approve</button>
                    </a>
                </div> -->
                <ul class="nav navbar-nav">

                    <!-- Notifications -->
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- <i class="fa fa-bell-o"></i>
                            <span class="label label-warning totalNotifications">10</span> -->
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have <span id="totalNotifications">10</span> notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="borrowersapplications?getfornotifications=Interested">
                                            <i class="fa fa-users text-aqua"></i> Interested Pending Borrowers
                                            &nbsp;&nbsp; <span id="totalInterestedBorrowers"
                                                class="displycolor label label-primary">10</span></a>
                                    </li>
                                    <li>
                                        <a href="lendersapplications?getfornotifications=LenderInterested">
                                            <i class="fa fa-users text-aqua"></i> Interested Pending Lenders
                                            &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<span id="totalInterestedLenders"
                                                class="displycolor label label-primary">10</span></a>
                                    </li>
                                    <li>
                                        <a href="intrested?getfornotifications=0">
                                            <i class="fa fa-users text-aqua"></i> Send offer pending users
                                            &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<span id="offerPendingFromAdminSide"
                                                class="displycolor label label-primary">10</span></a>
                                    </li>
                                    <li>
                                        <a href="lenderWallettransactions?getfornotifications=LenderWallet">
                                            <i class="fa fa-users text-yellow"></i> Lender Transaction Upload
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="totalLenderTransaction"
                                                class="displycolor label label-primary">10</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="approved?getfornotifications=0">
                                            <i class="fa fa-users text-red"></i> Loans In Agreed State(L3)
                                            <span id="totalAgreedState"
                                                class="displycolor label label-primary">10</span> </a>
                                    </li>
                                    <li>
                                        <a href="Disbursed?getfornotifications=0">
                                            <i class="fa fa-users text-green"></i>Pending Disbursment Date
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                id="totalDisbursmentPending"
                                                class="displycolor label label-primary">10</span></a>
                                    </li>

                                </ul>
                            </li>
                            <!-- <li class="footer"><a href="#">View all</a></li>-->
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <!-- Notifications ENDS -->


                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu checksignout" id="header-signout">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url(); ?>assets/images/user1.png" class="user-image"
                                alt="User Image">
                            <span class="displayUserName"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle"
                                    alt="User Image">

                                <p><span class="displayUserName"></span>
                                    - <span class="placeUserID"></span>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body hide">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="javascript:void(0)" class="btn btn-default btn-flat showProfile">My
                                        Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat deleteSession">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->

    <script type="text/javascript">
    $(document).ready(function() {
        $(".sidebar-toggle").click(function(event) {
            const isOpen = document.querySelector('body');
            if (isOpen.classList.contains('sidebar-open')) {
                $(".sidebar-mini").removeClass("sidebar-open");

            } else {
                $(".sidebar-mini").addClass("sidebar-open");

            }
        });

    });

    $(document).ready(function() {
        $("#header-signout").click(function(e) {
            const checksignout = document.getElementsByClassName("checksignout");
            if (checksignout[0].classList.contains('open')) {
                $(".checksignout").removeClass("open");
            } else {
                $(".checksignout").addClass("open");
            }
        });
    });
    </script>
    <style type="text/css">
    .displycolor {
        color: #8a6d3b;
    }
    </style>