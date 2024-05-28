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
                <p><span class="displayUserName"></span></p>
                <a href="#"><span class="placeUserID"></span></a>
            </div>
            <div class="row groupBlock">
                <div class="pull-left image">
                    <i class="fa fa-group"></i>
                </div>
                <div class="pull-left image">
                    <span class="groupNameis"></span>
                </div>
            </div>




            <div class="row wallet-bal wallet-Section">
                <div class="pull-left image">
                    <span><img src="<?php echo base_url(); ?>/assets/images/wallet-icon.png" width="20"></span>
                    <span>Wallet :&nbsp;&nbsp;</span>
                    <span class="lenderWalletAmount"></span>
                </div>
            </div>
            <a href="viewmyDeals" style="display: none;">
                <div class="row inHoldBlock">
                    <div class="clear"></div>
                    <div class="pull-left">
                        <i class="fa fa-hand-stop-o pauseWid"></i>
                        <span>On Hold :&nbsp;&nbsp;</span>
                        <span class="inHold"></span>
                    </div>
                </div>
            </a>


            
            <!--    <div class="row inoxyequity">
              <div class="clear"></div>
              <div class="pull-left">
                <i class="fa fa-money pauseWid"></i>
                <span>OxyEquity :&nbsp;&nbsp;</span>
                <span class="equityInvestment">0</span>
              </div>
            </div> -->

        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form" style="display: none;">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li <?php if ($basePATH_URL == "idb"){?> class="active" <?php } ?>>
                <a href="idb">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li
                class="treeview oxyPartnerLender
                  <?php if ($basePATH_URL == "user_PayQrCode"  || $basePATH_URL == "virtualAccount"){?>active menu-open<?php } ?>">

                <a href="#">
                    <i class="fa fa-book"></i> <span>Load Your Wallet</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "user_PayQrCode"){?> class="active" <?php } ?>>
                        <a href="user_PayQrCode">
                            <i class="fa fa-qrcode"></i> <span>Through QR</span>
                        </a>
                    </li>


                    <li <?php if ($basePATH_URL == "virtualAccount"){?> class="active" <?php } ?>>
                        <a href="virtualAccount"><i class="fa fa-book"></i> <span> Through Virtual Account</span></a>
                    </li>




                </ul>
            </li>






            <li <?php if ($basePATH_URL == "lender_profilePage"){?> class="active" <?php } ?>>
                <a href="lender_profilePage">
                    <i class="fa fa-user-circle"></i> <span>Profile Details</span>
                </a>
            </li>



            <li <?php if ($basePATH_URL == "lenderloanlistings"){?> class="active" <?php } ?>><a
                    href="lenderloanlistings"><i class="fa fa-th-list text-aqua"></i> <span>Loan Listings</span></a>
            </li>





            <li
                class="treeview oxyPartnerLender
        <?php if ($basePATH_URL == "viewDeals" || $basePATH_URL == "equityDeals" || $basePATH_URL == "escrowDeals"|| $basePATH_URL == "salariedDeals" || $basePATH_URL == "selfemployedDeals"  || $basePATH_URL == "viewCurrentDayDeals"){?>active menu-open<?php } ?>">

                <a href="#">
                    <i class="fa fa-bell colYell"></i> <span>Ongoing Deals</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">


                     <li <?php if ($basePATH_URL == "viewCurrentDayDeals"){?> class="active" <?php } ?>>
                        <a href="viewCurrentDayDeals">
                         <i class="fa fa-flash"></i>  <span>Today Deals  </span>
                        </a>
                    </li>


                    <li <?php if ($basePATH_URL == "viewDeals"){?> class="active" <?php } ?>>
                        <a href="viewDeals">
                            <i class="fa fa-bullseye"></i> <span> Running Deals</span>
                        </a>
                    </li>
                    <!--  <li <?php if ($basePATH_URL == "equityDeals"){?>
                class="active"
              <?php } ?>>
            <a href="equityDeals">
              <i class="fa fa-bullseye"></i> <span>Running Equity Deals</span>
            </a>
          </li> -->

                    <li <?php if ($basePATH_URL == "escrowDeals"){?> class="active" <?php } ?>>
                        <a href="escrowDeals">
                            <i class="fa fa-bullseye"></i> <span> Escrow Deals</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "salariedDeals"){?> class="active" <?php } ?>>
                        <a href="salariedDeals">
                            <i class="fa fa-bullseye"></i> <span>Personal  Deals</span>
                        </a>
                    </li>

                    <!-- <li <?php if ($basePATH_URL == "selfemployedDeals"){?>
                class="active"
              <?php } ?>>
            <a href="selfemployedDeals">
              <i class="fa fa-bullseye"></i> <span>Self Employed Deals</span>
            </a>
          </li>
          </li> -->
                </ul>
            </li>


            <li class="treeview oxyPartnerLender
        <?php if ($basePATH_URL == "viewmyDeals" || $basePATH_URL == "myClosedDeals" || $basePATH_URL == "participateDeal" || $basePATH_URL == "lenderProfit"|| $basePATH_URL == "assetsDealInfo" || $basePATH_URL == "partialClosedDeals" || $basePATH_URL == "myinterestInfo"|| $basePATH_URL == "holdAmount"){?>active 
             menu-open<?php } ?>">

                <a href="#">
                    <i class="fa fa-smile-o colGreen"></i> <span>My Deals Info</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "viewmyDeals"){?> class="active" <?php } ?>>
                        <a href="viewmyDeals">
                            <i class="fa fa-bolt "></i> <span>Running Deals</span>
                        </a>
                    </li>

                <!--     <li <?php if ($basePATH_URL == "autoInvestment"){?> class="active" <?php } ?>>
                        <a href="autoInvestment">
                            <i class="fa fa-bolt "></i> <span>Auto Invested Deals</span>
                        </a>
                    </li> -->

                    <li <?php if ($basePATH_URL == "myClosedDeals"){?> class="active" <?php } ?>>
                        <a href="myClosedDeals">
                            <i class="fa fa-bolt "></i> <span>Closed Deals</span>
                        </a>
                    </li>


                    <li <?php if ($basePATH_URL == "holdAmount"){?> class="active" <?php } ?> id="isHoldAmount">
                        <a href="holdAmount">
                            <i class="fa fa-bolt "></i> <span>Hold Amount</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "partialClosedDeals"){?> class="active" <?php } ?>>
                        <a href="partialClosedDeals">
                            <i class="fa fa-bolt "></i> <span> Partially Closed Deals</span>
                        </a>
                    </li>


                    <li <?php if ($basePATH_URL == "myinterestInfo"){?> class="active" <?php } ?>>
                        <a href="myinterestInfo">
                            <i class="fa fa-bolt "></i> <span>My Interest Earnings</span>
                        </a>
                    </li>



                    <li <?php if ($basePATH_URL == "assetsDealInfo"){?> class="active" <?php } ?>>
                        <a href="assetsDealInfo">
                            <i class="fa fa-bolt "></i> <span>High Value Deals</span>
                        </a>
                    </li>


                    <li <?php if ($basePATH_URL == "lenderProfit"){?> class="active" <?php } ?>>
                        <a href="lenderProfit">
                            <i class="fa fa-star" style="color:yellow"></i> <span>Earnings Certificate</span>
                        </a>
                    </li>


                    <li <?php if ($basePATH_URL == ""){?> class="active" <?php } ?>>
                        <a href="#" onclick="borrowerMonthlyStatements();"><i class="fa ion-stats-bars"></i> Loan
                            Statement</a>
                    </li>



                </ul>

            </li>




      <li
            class="treeview newLenderWalletToWallet
            <?php if ($basePATH_URL == "withdrawWalletToWallet" || $basePATH_URL == "walletdebithistory" || $basePATH_URL == "wallettowalletRequest"){?>active menu-open<?php } ?>" >
                <a href="#">
                    <i class="fa fa-user-plus"></i> <span>Wallet To Wallet</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">

                  
            <li <?php if ($basePATH_URL == "withdrawWalletToWallet"){?> class="hi-tree-menu" <?php }?>
                id="hidewalletinfo">
                <a href="withdrawWalletToWallet">
                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                    Raise a request
                </a>
            </li>


                     <li <?php if ($basePATH_URL == "wallettowalletRequest"){?> class="hi-tree-menu" <?php }?>>
                        <a href="wallettowalletRequest"><i class="fa fa-circle-o"></i>View  history </a>
                    </li>



               <li <?php if ($basePATH_URL == "walletdebithistory"){?> class="hi-tree-menu" <?php }?>>
                        <a href="walletdebithistory"><i class="fa fa-circle-o"></i>Debit  history </a>
                    </li>


                </ul>
            </li>


           <li
                class="treeview newLenderAuto
            <?php if ($basePATH_URL == "lenderAutoInvest" || $basePATH_URL == "lenderautoinvestHistory"  || $basePATH_URL == "lenderAutoInvest" || $basePATH_URL == "lenderRe_invest" ){?>active menu-open<?php } ?>" >
                <a href="#">
                    <i class="fa fa-bars"></i> <span>Auto Invest</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "lenderAutoInvest"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderAutoInvest"><i class="fa fa-circle-o"></i>Config Auto Invest </a>
                    </li>


                    <li <?php if ($basePATH_URL == "lenderautoinvestHistory"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderautoinvestHistory"><i class="fa fa-circle-o"></i>View History</a>
                    </li>


                 

                </ul>
            </li> 

            <li
                class="treeview
        <?php if ($basePATH_URL == "lenderWithdrawfunds" || $basePATH_URL == "lenderwithdrawFundsList"|| $basePATH_URL == "dealWithdrawfunds"|| $basePATH_URL == "lenderwithdrawFundsList" ){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-bars"></i> <span>Withdraw Funds</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">


                    <li <?php if ($basePATH_URL == "dealWithdrawfunds"){?> class="hi-tree-menu" <?php }?>
                        id="hidewalletinfo">
                        <a href="dealWithdrawfunds"><i class="fa fa-circle-o"></i>Raise a request</a>
                    </li>



                   <!--  <li <?php if ($basePATH_URL == "lenderWithdrawfunds"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderWithdrawfunds"><i class="fa fa-circle-o"></i>From Wallet </a>
                    </li> -->



                 


                    <li <?php if ($basePATH_URL == "lenderwithdrawFundsList"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderwithdrawFundsList"><i class="fa fa-circle-o"></i>My Withdrawal History</a>
                    </li>
                </ul>
            </li>
            <li
                class="treeview
        <?php if ($basePATH_URL == "uploadtransactiondetails" || $basePATH_URL == "mywallettransactionslist" || $basePATH_URL == "validitytransactions"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Wallet Transactions</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <!--  <li <?php if ($basePATH_URL == "uploadtransactiondetails"){?>
                    class = "hi-tree-menu"
                  <?php }?>>
              <a href="uploadtransactiondetails" class="uploadtransactiondetails"><i class="fa fa-circle-o"></i>Upload Transaction</a>
            </li>        -->


                    <li <?php if ($basePATH_URL == "mywallettransactionslist"){?> class="hi-tree-menu" <?php }?>>
                        <a href="mywallettransactionslist" class="mywallettransactionslist"><i
                                class="fa fa-circle-o"></i>My Transactions</a>
                    </li>





                    <li <?php if ($basePATH_URL == "validitytransactions"){?> class="hi-tree-menu" <?php }?>>
                        <a href="validitytransactions" class=""><i class="fa fa-circle-o"></i>Membership Fee
                            Transactions</a>
                    </li>

                </ul>
            </li>

            <!--
        <li
            <?php if ($basePATH_URL == "favouriteBorrowers"){?>
              class="active"
            <?php } ?>
        >
          <a href="favouriteBorrowers">
            <i class="fa fa-th"></i> <span>Favourite Borrowers</span>
          </a>
        </li> -->

            <!--   <li class="treeview
<?php if ($basePATH_URL == "lenderpersonalinfo" || $basePATH_URL == "lenderprofessionalDetails" || $basePATH_URL == "lenderaddress" || $basePATH_URL == "lenderfinancialinfo" || $basePATH_URL == "lenderbankdetails"){?>active menu-open<?php } ?>"
>
            <a href="#"><i class="fa fa-user-circle"></i></i> <span>My Profile</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
              <ul class="treeview-menu">

                  <li <?php if ($basePATH_URL == "lenderpersonalinfo"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                  ><a href="lenderpersonalinfo">Personal Details </a></li>

                  <li <?php if ($basePATH_URL == "lenderprofessionalDetails"){?>
                        class = "hi-tree-menu"
                      <?php } ?>
                  ><a href="lenderprofessionalDetails">Professional Details</a></li>

                  <li  <?php if ($basePATH_URL == "lenderaddress"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                      ><a href="lenderaddress">Address Details</a></li>

                  <li <?php if ($basePATH_URL == "lenderfinancialinfo"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                      ><a href="lenderfinancialinfo">Financial Details</a></li>

                  <li  <?php if ($basePATH_URL == "lenderbankdetails"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                      ><a href="lenderbankdetails">Bank Details</a></li>

              </ul>
        </li>
--->


            <!---   <li
         <?php if ($basePATH_URL == "lenderuserkyc"){?>
              class="active"
            <?php } ?>
        >
          <a href="lenderuserkyc">
            <i class="fa fa-cloud-upload"></i>
            <span>Upload Your KYC</span>
          </a>
        </li> --->



            <li class="treeview
        <?php if ($basePATH_URL == "lenderraisealoanrequest" || $basePATH_URL == "myloanofferstoborrowers" || $basePATH_URL == "lenderagreedloans" || $basePATH_URL == "lenderacceptedrequests" || $basePATH_URL == "lenderrejectedrequests" || $basePATH_URL == "borrowerresponsestoMyrequests" || $basePATH_URL == "lenderresponsestoMyrequests" || $basePATH_URL == "lenderRunningLoans" || $basePATH_URL == "lendermyloansOffers" || $basePATH_URL == "lenderresponsestoMyrequests" || $basePATH_URL == "lenderReceivedEMI"|| $basePATH_URL == "lenderProfit" || $basePATH_URL == "groupofborrowers"){?>active menu-open<?php } ?>"
                style="display:none">
                <a href="#">
                    <i class="fa fa-th"></i> <span>My Lendings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <!--
            My Loans
            My Loan Offers (2)
            Responses to My Offers
          -->
                    <li <?php if ($basePATH_URL == "lenderRunningLoans"){?> class="hi-tree-menu" <?php }?>
                        id="lrunnings" style="display:none;">
                        <a href="lenderRunningLoans" class="myloansLenderLoans"><i class="fa fa-circle-o"></i>Running
                            Loans</a>
                    </li>


                    <li <?php if ($basePATH_URL == "lendermyloansOffers"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lendermyloansOffers" class="myloansLenderLoans"><i class="fa fa-circle-o"></i>Offers
                            Sent</a>
                    </li>


                    <li <?php if ($basePATH_URL == "lenderresponsestoMyrequests"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderresponsestoMyrequests?appNumber=0" class="viewLendersOffers"><i
                                class="fa fa-circle-o"></i>Responses</a>
                    </li>

                    <li<?php if ($basePATH_URL == "lenderagreedloans"){?> class="hi-tree-menu" <?php }?>><a
                            href="lenderagreedloans"><i class="fa fa-circle-o"></i> Agreed Loans</a>
            </li>


            <li <?php if ($basePATH_URL == "lenderReceivedEMI"){?> class="hi-tree-menu" <?php }?>>
                <a href="lenderReceivedEMI"><i class="fa fa-circle-o"></i>Received EMIs </a>
            </li>


            <li <?php if ($basePATH_URL == "groupofborrowers"){?> class="hi-tree-menu" <?php }?> id="loanOwner"
                style="display:none;">
                <a href="groupofborrowers"><i class="fa fa-circle-o"></i>Loan Owner Info </a>
            </li>

            <li <?php if ($basePATH_URL == "lenderProfit"){?> class="active" <?php } ?>>
                <a href="lenderProfit"><i class="fa fa-circle-o"></i> <span>Profit Earned</span></a>
            </li>
            <!--
              <li <?php if ($basePATH_URL == "lenderraisealoanrequest"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                      ><a href="lenderraisealoanrequest"><i class="fa fa-circle-o"></i> Increase your lending amount</a></li>
              <li<?php if ($basePATH_URL == "myloanofferstoborrowers"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                      ><a href="lenderresponsetomyrequest"><i class="fa fa-circle-o"></i> My Loan offers</a></li>



               <li <?php if ($basePATH_URL == "lenderacceptedrequests"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                      ><a href="lenderacceptedrequests"><i class="fa fa-circle-o"></i>Accepted offers </a></li>




               <li <?php if ($basePATH_URL == "lenderrejectedrequests"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                      ><a href="lenderrejectedrequests"><i class="fa fa-circle-o"></i>Rejected requests </a></li>
                <li<?php if ($basePATH_URL == "lenderagreedloans"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                      ><a href="lenderagreedloans"><i class="fa fa-circle-o"></i> Agreed Loans</a></li>

                -->


        </ul>
        </li>





        <!--
        <li
         <?php if ($basePATH_URL == "lenderpayments"){?>
              class="active"
            <?php } ?>
        >
        <a href="lenderpayments"><i class="fa fa-credit-card text-yellow"></i> <span>Payments | EMIs</span></a></li>
        <li <?php if ($basePATH_URL == "faq.php"){?>
              class="active"
            <?php } ?>
            ><a href="faq.php"><i class="fa fa-circle-o text-green"></i> <span>Oxyloans FAQ</span></a></li>




        <li
        <?php if ($basePATH_URL == "#"){?>
              class="active"
            <?php } ?>
            >
            <a href="#"><i class="fa ion-stats-bars"></i> <span>OXY Products</span></a>
        </li>

               <li
             <?php if ($basePATH_URL == "newdashboard"){?>
              class="active"
            <?php } ?>
        >
          <a href="newdashboard">
            <i class="fa fa-dashboard"></i> <span>New Dashboard</span>
          </a>
        </li>-->

        <li
            class="treeview
        <?php if ($basePATH_URL == "referafriend"|| $basePATH_URL == "displayingReferrerInfo" || $basePATH_URL == "refereeRegisteredInfo"|| $basePATH_URL == "lendercontacts" ){?>active menu-open<?php } ?>">
            <a href="#">
                <i class="fa fa-globe"></i> <span>My Network</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>

            <ul class="treeview-menu">

                <li <?php if ($basePATH_URL == "referafriend"){?> class="active" <?php } ?>>
                    <a href="referafriend" data-id="" data-Name="" class="addIdtoURL updateRefURL"><i
                            class="fa fa-user-plus"></i> <span>Refer a Friend </span></a>

                </li>
                <li <?php if ($basePATH_URL == "displayingReferrerInfo"){?> class="active" <?php } ?>>
                    <a href="displayingReferrerInfo" data-id="" data-Name="" class="addIdtoURL updateInfoUrl"><i
                            class="fa fa-plus"></i> <span>Referral Status </span></a>

                </li>

                <!--  <li
           <?php if ($basePATH_URL == "educationMappedUsers"){?>
              class="active"
            <?php } ?> >
            <a href="educationMappedUsers" data-id="" data-Name="" class="addIdtoURL updateRefURL"><i class="fa fa-users"></i> <span>Mapped Users </span></a>

        </li>   -->
                <li <?php if ($basePATH_URL == "lendercontacts"){?> class="active" <?php } ?>>
                    <a href="lendercontacts" data-id="" data-Name="" class="addIdtoURL updateregUrl"><i
                            class="fa fa-plus"></i> <span>My Contacts</span></a>

                </li>

                <li <?php if ($basePATH_URL == "refereeRegisteredInfo"){?> class="active" <?php } ?>>
                    <a href="refereeRegisteredInfo" data-id="" data-Name="" class="addIdtoURL updateregUrl"><i
                            class="fa fa-plus"></i> <span>My Earnings</span></a>

                </li>



            <!--     <li <?php if ($basePATH_URL == "referalEaringsMonthWise"){?> class="active" <?php } ?>>
                    <a href="referalEaringsMonthWise" data-id="" data-Name="" class="addIdtoURL updateregUrl"><i
                            class="fa fa-plus"></i> <span>Earnings Month Wise</span></a>

                </li> -->

                <!--       <li
           <?php if ($basePATH_URL == "adviseSeekers"){?>
              class="active"
            <?php } ?> >
            <a href="adviseSeekers" data-id="" data-Name="" class="addIdtoURL updateregUrl"><i class="fa fa-handshake-o"></i> <span>Advice Seekers</span></a>
        </li>   -->
            </ul>
        </li>



        <li
            class="treeview
        <?php if ($basePATH_URL == "lenderInquiries" || $basePATH_URL == "viewTicketHistory"|| $basePATH_URL == "emicalculator" ){?>active menu-open<?php } ?>">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Help Desk</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>

            <ul class="treeview-menu">

                <li <?php if ($basePATH_URL == "lenderInquiries"){?> class="active" <?php } ?>>
                    <a href="lenderInquiries"><i class="fa fa-pencil"></i>Write to us</a>
                </li>


                <li <?php if ($basePATH_URL == "viewTicketHistory"){?> class="active" <?php } ?>>
                    <a href="viewTicketHistory"><i class="fa fa-eye"></i>View Ticket History</a>
                </li>

                <li <?php if ($basePATH_URL == "emicalculator"){?> class="active" <?php } ?>>
                    <a href="emicalculator"><i class="fa fa-calculator"></i> <span>EMI Calculator</span></a>
                </li>


            </ul>
        </li>


        <li <?php if ($basePATH_URL == "userlogin"){?> class="active" <?php } ?>>
            <a href="#"><i class="fa fa-sign-out text-yellow "></i> <span class="deleteSession">Sign Out</span></a>
        </li>

        </ul>
    </section>
    <!-- /.sidebar -->
    <?php // echo $basePATH_URL; ?>

</aside>

<style>
/*.skin-blue .main-header .navbar,
    .skin-blue .main-header .logo{background-color:#6456B7}*/
</style>