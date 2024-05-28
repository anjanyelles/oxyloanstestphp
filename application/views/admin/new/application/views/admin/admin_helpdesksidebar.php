<?php $basePATH_URL = $this->uri->uri_string(); ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>/assets/images/user1.png" class="img-circle userPicArea"
                    alt="User Image">
                <div class="img-circle displayEditOption" style="display: none;">
                    <img src="<?php echo base_url(); ?>/assets/images/changePhoto.png" class="img-circle"
                        alt="EDIT Profile Picture" width="45">
                </div>
            </div>
            <div class="pull-left info">
                <p><span class="displayUserName displayAdminType">HELPDESK ADMIN</span></p>
                <a href="#"><span class="placeUserID"></span></a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>




            <li
                class="treeview
        <?php if ($basePATH_URL == "admin/helpdeskadmin" || $basePATH_URL == "admin/resolvedQueries"  ){?>active menu-open<?php }?>">


                <a href="#">
                    <i class="fa fa-clipboard"></i>
                    <span>Help Desk</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/helpdeskadmin"){?> class="active" <?php } ?>>
                        <a href="helpdeskadmin"><i class="fa fa-window-close" aria-hidden="true"></i></i>
                            <span>Lender Queries</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/helpdeskadmin" ||  $basePATH_URL == "admin/resolvedQueries"){?>
                        class="active" <?php } ?>>
                        <a href="helpdeskadmin?queryStatus=pending&primaryType=BORROWER"><i class="fa fa-check"
                                aria-hidden="true"></i></i>
                            <span>Borrower Queiers</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/resolvedQueries"){?> class="active" <?php } ?>>
                        <a href="resolvedQueries"><i class="fa fa-window-close" aria-hidden="true"></i></i>
                            <span>Resolved Lender Queries</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/resolvedQueries"){?> class="active" <?php } ?>>
                        <a href="resolvedQueries?queryStatus=completed&primaryType=BORROWER"><i class="fa fa-check"
                                aria-hidden="true"></i></i>
                            <span>Resolved Borrower Queries</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="displaySuperAdmin treeview viewMyLoanApplication
        <?php if ($basePATH_URL == "admin/healdeskBorrowerloanapplication"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Borrower Loan Process &#9888;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "admin/healdeskBorrowerloanapplication"){?> class="hi-tree-menu"
                        <?php } ?>><a href="healdeskBorrowerloanapplication?getfornotifications=0"><i
                                class="fa fa-circle-o"></i> <span>
                                Borrowers Loan Applications
                            </span></a></li>

                </ul>
            </li>

            <li class="displaySuperAdmin treeview viewMyLoanApplication
          <?php if ($basePATH_URL == "admin/healdeskLenderloanapplication"){?>active menu-open<?php } ?>">
                <a href="#">
                    <span> LENDERS&#9889;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu displaySuperAdmin">
                    <li <?php if ($basePATH_URL == "admin/healdeskLenderloanapplication"){?> class="active" <?php } ?>>
                        <a href="healdeskLenderloanapplication?getfornotifications=0"><i
                                class="fa fa-arrow-circle-right"></i> <span>
                                Lenders Loan Applications</span></a>
                    </li>

                </ul>
            </li>


            <li
                class="displaySuperAdmin treeview viewMyLoanApplication
          <?php if ($basePATH_URL == "admin/HelpDeskPersonalDeals" ||  $basePATH_URL == "admin/HelpDeskequityDeals" || $basePATH_URL == "admin/HelpDeskescrowDeals"|| $basePATH_URL == "admin/HelpDesksalariedDeals"|| $basePATH_URL == "admin/HelpDesktestDeals"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span> Deals </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu displaySuperAdmin">
                    <li <?php if ($basePATH_URL == "admin/HelpDeskPersonalDeals"){?> class="active" <?php } ?>>
                        <a href="HelpDeskPersonalDeals?getfornotifications=0"><i
                                class="fa fa-arrow-circle-right"></i>View Student Deals <span>
                            </span></a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/HelpDeskequityDeals"){?> class="active" <?php } ?>>
                        <a href="HelpDeskequityDeals?getfornotifications=0"><i class="fa fa-arrow-circle-right"></i>
                            <span>
                                View Equity Deals</span></a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/HelpDeskescrowDeals"){?> class="active" <?php } ?>>
                        <a href="HelpDeskescrowDeals?getfornotifications=0"><i class="fa fa-arrow-circle-right"></i>
                            <span>
                                View Escrow Deals</span></a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/HelpDesksalariedDeals"){?> class="active" <?php } ?>>
                        <a href="HelpDesksalariedDeals?getfornotifications=0"><i class="fa fa-arrow-circle-right"></i>
                            <span>
                                View Salaried Deals</span></a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/HelpDesktestDeals"){?> class="active" <?php } ?>>
                        <a href="HelpDesktestDeals?getfornotifications=0"><i class="fa fa-arrow-circle-right"></i>
                            <span>
                                View Test Deals</span></a>
                    </li>


                </ul>
            </li>

            <li <?php if ($basePATH_URL == ""){?> class="active" <?php } ?>><a href="#" class="deleteSession">
                    <i class="fa fa-sign-out text-yellow"></i> <span>Sign Out</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<style>
.skin-blue .main-header .navbar,
.skin-blue .main-header .logo {
    background-color: #6456B7
}

.hi-tree-menu {
    font-weight: bold;
}

.hi-tree-menu a {
    color: #FFFFFF !important;
}
</style>

<script type="text/javascript">
$.sidebarMenu = function(menu) {
    var animationSpeed = 300;

    $(menu).on('click', 'li a', function(e) {
        var $this = $(this);
        var checkElement = $this.next();
        if (checkElement.is('.treeview-menu') && checkElement.is(':visible')) {
            checkElement.slideUp(animationSpeed, function() {
                checkElement.removeClass('menu-open');
            });
            checkElement.parent("li").removeClass("active");
        }
        //If the menu is not visible
        else if ((checkElement.is('.treeview-menu')) && (!checkElement.is(':visible'))) {
            //Get the parent menu
            var parent = $this.parents('ul').first();
            //Close all open menus within the parent
            var ul = parent.find('ul:visible').slideUp(animationSpeed);
            //Remove the menu-open class from the parent
            ul.removeClass('menu-open');
            //Get the parent li
            var parent_li = $this.parent("li");
            //Open the target menu and add the menu-open class
            checkElement.slideDown(animationSpeed, function() {
                //Add the class active to the parent li
                checkElement.addClass('menu-open');
                parent.find('li.active').removeClass('active');
                parent_li.addClass('active');
            });
        }
        //if this isn't a link, prevent the page from being redirected
        if (checkElement.is('.treeview-menu')) {
            e.preventDefault();
        }
    });
}
$.sidebarMenu($('.sidebar-menu'))
</script>