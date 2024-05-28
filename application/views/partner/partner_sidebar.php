<?php $basePATH_URL = $this->uri->uri_string(); ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>/assets/images/user1.png" class="img-circle userPicArea"
                    alt="User Image">
                <!--  <div class="img-circle displayEditOption" style="display: none;">
          <img src="<?php echo base_url(); ?>/assets/images/changePhoto.png" class="img-circle" alt="EDIT Profile Picture" width="45">
        </div> -->
            </div>
            <div class="pull-left info">
                <span id="displayUserName" style="margin-top:30px;color: whitesmoke; font-weight:bold;"></span>
                <div class="" style="margin-top:16px; color: whitesmoke; font-weight:bold;"> WALLET : <span
                        class="walletinfopartner"></span></div>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>

            <li class="displaySuperAdmin
        <?php if ($basePATH_URL == "partner/Dashboard"){?>
        active
        <?php } ?>" ;>
                <a href="Dashboard">
                    <i class="fa fa-dashboard"></i> <span>New Dashboard</span>
                </a>
            </li>


            <li
                class="treeview partnerDashboard
                  <?php if ($basePATH_URL == "partner/partnerResetPassword" || $basePATH_URL == "partner/partnerListUsers"|| $basePATH_URL == "partner/partnerLenderList"){?>active menu-open<?php }?>">
                <a href="#">
                    <i class="fa fa-users pull-left"></i><span>Registred Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <!-- <li <?php if ($basePATH_URL == "partner/partnerResetPassword"){?>
                      class = "hi-tree-menu"
                      <?php }?>
                      >
                      <a href="partnerResetPassword"><i class="fa fa-dot-circle-o"></i>Reset Password</a>
                    </li> -->

                    <li <?php if ($basePATH_URL == "partner/partnerListUsers"){?> class="hi-tree-menu" <?php }?>>
                        <a href="partnerListUsers"><i class="fa fa-dot-circle-o"></i>Registered Borrowers</a>
                    </li>

                    <li <?php if ($basePATH_URL == "partner/partnerLenderList"){?> class="hi-tree-menu" <?php }?>>
                        <a href="partnerLenderList"><i class="fa fa-dot-circle-o"></i>Registered Lenders</a>
                    </li>


                </ul>
            </li>




            <li class="displaySuperAdmin
        <?php if ($basePATH_URL == "partner/partnerUserLoaninfo"){?>
        active
        <?php } ?>" ;>
                <a href="partnerUserLoaninfo">
                    <i class="fa fa-bell-o"></i> <span>Running Loans by Partner</span>
                </a>
            </li>


            <li class="partnerDashboard" <?php if ($basePATH_URL == "partner/PartnerVerification"){?> class="active"
                <?php } ?>>
                <a href="PartnerVerification" data-id="" data-Name="" class="addIdtoURL updateRefURL"><i
                        class="fa fa-check" aria-hidden="true"></i> <span>Verfication</span></a>
            </li>

            <li class="treeview partnerDashboard
                    <?php if ($basePATH_URL == "partner/viewBorrowerStatus"){?>active menu-open<?php }?>">
                <a href="#">
                    <i class="fa fa-users pull-left"></i><span>Borrowers Loan Status</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "partner/viewBorrowerStatus"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewBorrowerStatus?status=PartnerApproved"><i class="fa fa-dot-circle-o"></i>Approved
                            borrowers</a>
                    </li>

                    <li <?php if ($basePATH_URL == "partner/viewBorrowerStatus"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewBorrowerStatus?status=PartnerReject"><i class="fa fa-dot-circle-o"></i>Rejected
                            borrowers</a>
                    </li>

                    <li <?php if ($basePATH_URL == "partner/viewBorrowerStatus"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewBorrowerStatus?status=PartnerShortList"><i class="fa fa-dot-circle-o"></i>ShortList
                            Borrowers </a>
                    </li>


                </ul>
            </li>


            <li
                class="treeview partnerDashboard
           <?php if ($basePATH_URL == "partner/referaPartner"|| $basePATH_URL == "partner/PartnerRegisteredInfo" || $basePATH_URL == "partner/PartnerReferrerInfo" || $basePATH_URL == "partner/PartnerEarnings" || $basePATH_URL == "partner/PartneradviseSeekers"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-globe"></i> <span>My Network</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "partner/referaPartner"){?> class="active" <?php } ?>>
                        <a href="referaPartner" data-id="" data-Name="" class="addIdtoURL updateRefURL"><i
                                class="fa fa-user-plus"></i> <span>Refer a Friend </span></a>

                    </li>
                    <li <?php if ($basePATH_URL == "partner/PartnerRegisteredInfo"){?> class="active" <?php } ?>>
                        <a href="PartnerRegisteredInfo" data-id="" data-Name="" class="addIdtoURL updateInfoUrl"><i
                                class="fa fa-plus"></i> <span>Referral Status </span></a>

                    </li>
                    <!--  <li
           <?php if ($basePATH_URL == "partner/PartnerReferrerInfo"){?>
              class="active"
            <?php } ?> >
            <a href="PartnerReferrerInfo" data-id="" data-Name="" class="addIdtoURL updateregUrl"><i class="fa fa-plus"></i> <span>My Contacts</span></a>

        </li>   -->

                    <li <?php if ($basePATH_URL == "partner/PartnerEarnings"){?> class="active" <?php } ?>>
                        <a href="PartnerEarnings" data-id="" data-Name="" class="addIdtoURL updateregUrl"><i
                                class="fa fa-plus"></i> <span>My Earnings</span></a>

                    </li>

                </ul>
            </li>

            <li class="partnerDashboard" <?php if ($basePATH_URL == "partner/PartnerBankDetails"){?> class="active"
                <?php } ?>>
                <a href="PartnerBankDetails" data-id="" data-Name="" class="addIdtoURL updateRefURL"><i
                        class="fa fa-bank" aria-hidden="true"></i> <span>Bank Details</span></a>
            </li>


            <li class="partnerDashboard" <?php if ($basePATH_URL == "partner/PartnerNDA_MOU"){
                    ?> class="active" <?php } ?>>
                <a href="PartnerNDA_MOU" data-id="" data-Name="" class="addIdtoURL updateRefURL"><i class="fa fa-file"
                        aria-hidden="true"></i> <span>Generate NDA AND MOU</span></a>
            </li>



            <li class="partnerDashboard" <?php if ($basePATH_URL == "partner/partnerUploaddocs"){
                    ?> class="active" <?php } ?>>
                <a href="partnerUploaddocs" data-id="" data-Name="" class="addIdtoURL updateRefURL"><i
                        class="fa fa-upload" aria-hidden="true"></i> <span>Upload NDA AND MOU</span></a>
            </li>

            <li <?php if ($basePATH_URL == ""){?> class="active" <?php } ?>><a
                    href="https://www.oxyloans.com/new/userlogin" class="deleteSession">
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
<script src="<?php echo base_url(); ?>assets/js/partner.js?oxyloans=<?php echo time(); ?>"></script>