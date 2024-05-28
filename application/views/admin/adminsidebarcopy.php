<?php 
    session_start(); // Start the session
    $basePATH_URL = $this->uri->uri_string(); 

    // Check if the user type is set in the session
    if(isset($_COOKIE['sUserType'])) {
        $userType = $_COOKIE['sUserType'];
        
        // Render the sidebar content based on user type
        if($userType === 'TESTADMIN') {
            // Render sidebar content for studentadmin
?>         
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
                <p><span class="displayUserName displayAdminType">Test Admin</span></p>
                <a href="#"><span class="placeUserID"></span></a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>

            <li class="displaySuperAdmin
        <?php if ($basePATH_URL == "admin/dashboard"){?>
        active
        <?php } ?>" ;>
                <a href="dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li
                class="treeview  displaySuperAdmin
        <?php if ($basePATH_URL == "admin/createDeal" || $basePATH_URL == "admin/viewDeals" || $basePATH_URL == "admin/equityDeals" || $basePATH_URL == "admin/escrowDeals"
        || $basePATH_URL == "admin/whatsappNotification"    || $basePATH_URL == "admin/pendingFiles" || $basePATH_URL == "admin/getGroupofLender"|| $basePATH_URL == "admin/lenderparticipateddeal" || $basePATH_URL == "admin/paytmTransactions"|| $basePATH_URL == "admin/salariedDeals" || $basePATH_URL == "admin/selfEmployedDeals"|| $basePATH_URL == "admin/testDeals"|| $basePATH_URL == "admin/offlineInterest"|| $basePATH_URL == "admin/dealNotifications"  || $basePATH_URL == "admin/viewDealTypePayOut"|| $basePATH_URL == "admin/futureDeals"){?>active menu-open<?php } ?>">
                <!-- <a href="#">
                    <i class="fa fa-bell"></i>
                    <span> Deals &#9733;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a> -->
                <ul class="treeview-menu">
                    <!-- <li <?php if ($basePATH_URL == "admin/createDeal"){?> class="hi-tree-menu" <?php }?>>
                        <a href="createDeal?id=0"><i class="fa fa-dot-circle-o"></i>Create New Deal</a>
                    </li>

                  
                    <li <?php if ($basePATH_URL == "admin/viewDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewDeals"><i class="fa fa-dot-circle-o"></i>View & Edit Deals</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/equityDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="equityDeals"><i class="fa fa-dot-circle-o"></i>View Equity Deals</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/escrowDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="escrowDeals"><i class="fa fa-dot-circle-o"></i>View Escrow Deals</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/testDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="testDeals"><i class="fa fa-dot-circle-o"></i>View Test Deals</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/salariedDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="salariedDeals"><i class="fa fa-dot-circle-o"></i>View Personal Deals</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/viewDealTypePayOut"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewDealTypePayOut"><i class="fa fa-dot-circle-o"></i>View Deal Payout</a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/pendingFiles"){?> class="hi-tree-menu" <?php }?>>
                        <a href="pendingFiles"><i class="fa fa-money"></i> Pending Files</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/offlineInterest"){?> class="hi-tree-menu" <?php }?>>
                        <a href="offlineInterest"><i class="fa fa-dot-circle-o"></i>Offline Interest</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/dealNotifications"){?> class="hi-tree-menu" <?php }?>>
                        <a href="dealNotifications"><i class="fa fa-dot-circle-o"></i>Deal Notification</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/viewclosedDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewclosedDeals"><i class="fa fa-dot-circle-o"></i>View Closed Deals</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/getGroupofLender"){?> class="hi-tree-menu" <?php }?>>
                        <a href="getGroupofLender"><i class="fa fa-dot-circle-o"></i>Oxy Founding Groups</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/whatsappNotification"){?> class="hi-tree-menu" <?php }?>>
                        <a href="whatsappNotification"><i class="fa fa-dot-circle-o"></i>WhatsApp Notification</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/lenderparticipateddeal"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderparticipateddeal"><i class="fa fa-dot-circle-o"></i> Update Lender
                            Participation</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/equityInvestors"){?> class="hi-tree-menu" <?php }?>>
                        <a href="equityInvestors"><i class="fa fa-dot-circle-o"></i>Equity Investors List</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/paytmTransactions"){?> class="hi-tree-menu" <?php }?>>
                        <a href="paytmTransactions"><i class="fa fa-dot-circle-o"></i>Paytm Nodal</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/runningDealInfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="runningDealInfo"><i class="fa fa-dot-circle-o"></i>Running Deals Info</a>
                    </li> -->

                    <!--  <li <?php if ($basePATH_URL == "admin/dealWithdrawRequest"){?>
            class = "hi-tree-menu"
            <?php }?>
            >
            <a href="dealWithdrawRequest"><i class="fa fa-bell"></i>Deal Withdrawal Request</a>
          </li> -->

                    <!--  <li <?php if ($basePATH_URL == "admin/closedDeals"){?>
            class = "hi-tree-menu"
            <?php }?>
            >
            <a href="closedLoans"><i class="fa fa-dot-circle-o"></i> Closed Deals</a>
          </li> -->

                </ul>
            </li>
            <!-- 
            <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/holdAmountRequest"|| $basePATH_URL == "admin/holdAmountBreakUp"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span> Hold Amount</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "admin/holdAmountRequest"){?> class="hi-tree-menu" <?php }?>>
                        <a href="holdAmountRequest"><i class="fa fa-dot-circle-o"></i> Hold Request </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/holdAmountBreakUp"){?> class="hi-tree-menu" <?php }?>>
                        <a href="holdAmountBreakUp"><i class="fa fa-dot-circle-o"></i> Hold Amount Breakup</a>
                    </li>

                </ul>
            </li> -->

            <!-- <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/borrowerRunningsinfo" || 
                  $basePATH_URL == "admin/borrowerLoanStatus"|| $basePATH_URL == "admin/fdPaymentDetails"|| $basePATH_URL == "admin/uploadFdData"|| $basePATH_URL == "admin/viewListOfFds"|| $basePATH_URL == "admin/verifyPaymentDetail"|| $basePATH_URL == "admin/transferFunds"|| $basePATH_URL == "admin/searchfdUsers"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-user-circle"></i>
                    <span></span>Student Loan Process
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "admin/borrowerRunningsinfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="borrowerRunningsinfo"><i class="fa fa-dot-circle-o"></i> Add Student Bank Ac </a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/borrowerLoanStatus"){?> class="hi-tree-menu" <?php }?>>
                        <a href="borrowerLoanStatus"><i class="fa fa-dot-circle-o"></i> Bank Verified User </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/uploadFdData"){?> class="hi-tree-menu" <?php }?>>
                        <a href="uploadFdData"><i class="fa fa-dot-circle-o"></i> Book FD </a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/fdPaymentDetails"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdPaymentDetails"><i class="fa fa-dot-circle-o"></i> Payment Details </a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/verifyPaymentDetail"){?> class="hi-tree-menu" <?php }?>>
                        <a href="verifyPaymentDetail"><i class="fa fa-dot-circle-o"></i> Verify Payment Details</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/transferFunds"){?> class="hi-tree-menu" <?php }?>>
                        <a href="transferFunds"><i class="fa fa-dot-circle-o"></i> Transfer Funds</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/viewListOfFds"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewListOfFds"><i class="fa fa-dot-circle-o"></i> View List Of FD'S </a>
                    </li>


                       <li <?php if ($basePATH_URL == "admin/searchfdUsers"){?> class="hi-tree-menu" <?php }?>>
                        <a href="searchfdUsers"><i class="fa fa-dot-circle-o"></i> Search FD Types</a>
                    </li>

                </ul>
            </li> -->




            <!-- <li
                     class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/insertPendingInformation" || $basePATH_URL == "admin/pendingamountUser"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span></span>Lender Pending Amount
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                 <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/insertPendingInformation"){?> class="hi-tree-menu" <?php }?>>
                        <a href="insertPendingInformation"><i class="fa fa-dot-circle-o"></i>Insert Details</a>
                    </li>


                      <li <?php if ($basePATH_URL == "admin/pendingamountUser"){?> class="hi-tree-menu" <?php }?>>
                        <a href="pendingamountUser"><i class="fa fa-dot-circle-o"></i>Pending amount User</a>
                    </li>

                </ul>
            </li> -->













            <!-- 
                  <li
                     class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/fdStatistics" || 
                  $basePATH_URL == "admin/fddownloadInvoice"|| $basePATH_URL == "admin/fdmonthlyloansInfo" || $basePATH_URL == "admin/fdClosedDetails"|| $basePATH_URL == "admin/fdexecutedPayment"  ){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-star"></i>
                    <span></span>FD Statistics 

                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "admin/fdStatistics"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdStatistics"><i class="fa fa-dot-circle-o"></i> Statistics</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/fddownloadInvoice"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fddownloadInvoice"><i class="fa fa-dot-circle-o"></i>Download Invoice </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/fdmonthlyloansInfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdmonthlyloansInfo"><i class="fa fa-dot-circle-o"></i> Monthly Loan Info </a>
                    </li>

                      <li <?php if ($basePATH_URL == "admin/fdexecutedPayment"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdexecutedPayment"><i class="fa fa-dot-circle-o"></i> Fd Executed Payments </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/fdClosedDetails"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdClosedDetails"><i class="fa fa-dot-circle-o"></i> Fd Closed Details </a>
                    </li>



                </ul>
            </li> -->




            <li
                class="displaySuperAdmin treeview viewMyLoanApplication
              <?php if ($basePATH_URL == "admin/borrowersapplications" || $basePATH_URL == "admin/intrested" || $basePATH_URL == "admin/loanAprroved" || $basePATH_URL == "admin/approved" || $basePATH_URL == "admin/Disbursed" || $basePATH_URL == "admin/ApplicationLevelDisbursed" || $basePATH_URL == "admin/newDisbursed"|| $basePATH_URL == "admin/ViewVanNumber"){?>active menu-open<?php } ?>">



                <!-- <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Borrower Loan Process &#9888;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a> -->
                <ul class="treeview-menu">

                    <!-- <li <?php if ($basePATH_URL == "admin/borrowersapplications"){?> class="hi-tree-menu" <?php } ?>><a
                            href="borrowersapplications?getfornotifications=0"><i class="fa fa-circle-o"></i> <span>
                                Borrowers Loan Applications
                            </span></a></li>
                    <li <?php if ($basePATH_URL == "admin/intrested"){?> class="hi-tree-menu" <?php }?>>
                        <a href="intrested"><i class="fa fa-circle-o"></i>Intrested (L1)</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/loanAprroved"){?> class="hi-tree-menu" <?php }?>>
                        <a href="loanAprroved"><i class="fa fa-circle-o"></i>Offer Accepted Users (L2)</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/approved"){?> class="hi-tree-menu" <?php }?>>
                        <a href="approved?getfornotifications=0"><i class="fa fa-circle-o"></i>Approved by Admin(L3)</a>
                    </li> -->

                    <!--  <li <?php if ($basePATH_URL == "admin/Disbursed"){?>
              class = "hi-tree-menu"
              <?php }?>
              >
              <a href="Disbursed?getfornotifications=0"><i class="fa fa-circle-o"></i> Disbursed(L4)</a>
            </li> -->
                    <li <?php if ($basePATH_URL == "admin/newDisbursed"){?> class="hi-tree-menu" <?php }?>>
                        <a href="newDisbursed?getfornotifications=0"><i class="fa fa-circle-o"></i> New
                            Disbursed(L4)</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/ApplicationLevelDisbursed"){?> class="tree-menu" <?php }?>>
                        <a href="ApplicationLevelDisbursed"><i class="fa fa-circle-o"></i>Deal Level Disbursed(L4)</a>
                    </li>




                    <li <?php if ($basePATH_URL == "admin/ApplicationLevelDisbursed"){?> class="tree-menu" <?php }?>>
                        <a href="ApplicationLevelDisbursed?Applevel=APPLEVEL"><i class="fa fa-dot-circle-o"></i>Disburse
                            Application Level</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/borrowerRunningsinfo"){?> class="noc" <?php }?>>
                        <a href="borrowerRunningsinfo?Nocborrower=NOC"><i class="fa fa-dot-circle-o"></i>Closure </a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/ViewVanNumber"){?> class="active" <?php } ?>>
                        <a href="ViewVanNumber">
                            <i class="fa fa-arrow-circle-right"></i><span>View Van Number</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li
                class="displaySuperAdmin treeview viewMyLoanApplication
          <?php if ($basePATH_URL == "admin/lendersapplications" || $basePATH_URL == "admin/lenderWallettransactions" || $basePATH_URL == "admin/uploadtransactions"|| $basePATH_URL == "admin/lenderreferalinfo"|| $basePATH_URL == "admin/approveReferenceamount" || $basePATH_URL == "admin/editReferenceDeatils" || $basePATH_URL == "admin/editGroupinfo"|| $basePATH_URL == "admin/sumofDealAmountInfo"|| $basePATH_URL == "admin/lenderstatistics"|| $basePATH_URL == "admin/registerLenderUsers"|| $basePATH_URL == "admin/monthlyReferalEarning" ){?>active menu-open<?php } ?>">
                <a href="#">


                    <i class="fa fa-user-circle"></i>
                    <span> LENDERS&#9889;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu displaySuperAdmin">
                    <li <?php if ($basePATH_URL == "admin/lendersapplications"){?> class="active" <?php } ?>><a
                            href="lendersapplications?getfornotifications=0"><i class="fa fa-arrow-circle-right"></i>
                            <span>
                                Lenders Loan Applications</span></a></li>



                    <!-- <li <?php if ($basePATH_URL == "admin/registerLenderUsers"){?> class="active" <?php } ?>><a
                            href="registerLenderUsers"><i
                                class="fa fa-arrow-circle-right"></i> <span>
                                Register Lender</span></a></li> -->



                    <li <?php if ($basePATH_URL == "admin/lenderWallettransactions"){?> class="active" <?php } ?>><a
                            href="lenderWallettransactions?getfornotifications=0"><i
                                class="fa fa-arrow-circle-right"></i> <span>
                                Lender Wallet Trasactions</span></a></li>





                    <!-- <li <?php if ($basePATH_URL == "admin/uploadtransactions"){?> class="hi-tree-menu" <?php }?>>
                        <a href="uploadtransactions" class="uploadtransactiondetails"><i
                                class="fa fa-arrow-circle-right"></i>Upload Transaction</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/poolingLendrs"){?> class="hi-tree-menu" <?php }?>>
                        <a href="poolingLendrs" class="poolingLendrs"><i class="fa fa-arrow-circle-right"></i>Pooling
                            Lenders</a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/lenderreferalinfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderreferalinfo" class="lenderreferalinfo"><i
                                class="fa fa-arrow-circle-right"></i>Lender Referee Info</a>
                    </li>


                     <li <?php if ($basePATH_URL == "admin/monthlyReferalEarning"){?> class="hi-tree-menu" <?php }?>>
                        <a href="monthlyReferalEarning" class="monthlyReferalEarning"><i
                                class="fa fa-arrow-circle-right"></i>Monthly Rerefer Earnings</a>
                    </li> -->


                    <!--   <li <?php if ($basePATH_URL == "admin/approveLenderFee"){?>
                  class = "hi-tree-menu"
                  <?php }?>>
                  <a href="approveLenderFee" class="lenderreferalinfo"><i class="fa fa-arrow-circle-right"></i>Approve Lender Fee</a>
                </li>  -->
                    <!-- <li <?php if ($basePATH_URL == "admin/approveReferenceamount"){?> class="hi-tree-menu" <?php }?>>
                        <a href="approveReferenceamount" class="approveReferenceamount"><i
                                class="fa fa-arrow-circle-right"></i>Approve Reference Amount</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/editReferenceDeatils"){?> class="hi-tree-menu" <?php }?>>
                        <a href="editReferenceDeatils" class="editReferenceDeatils"><i
                                class="fa fa-arrow-circle-right"></i>Edit Reference Details</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/editGroupinfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="editGroupinfo"><i class="fa fa-dot-circle-o"></i>Update Lender Group</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin_lenderstatistics"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderstatistics"><i class="fa fa-dot-circle-o"></i>Lender Deal Statistics</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/sumofDealAmountInfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="sumofDealAmountInfo"><i class="fa fa-dot-circle-o"></i>Lender's Participated Amount</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/lendersInAllEquityDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lendersInAllEquityDeals"><i class="fa fa-dot-circle-o"></i>Equity Lenders</a>
                    </li>
                </ul>
            </li>
 -->

                    <!-- 
            <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/displaylenderwithdrawalfundsList"|| $basePATH_URL == "admin/walletToWalletHistory"|| $basePATH_URL == "admin/dealWithdrawRequest"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span> Withdrawal Requests</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">



                    <li <?php if ($basePATH_URL == "admin/dealWithdrawRequest"){?> class="hi-tree-menu" <?php }?>>
                        <a href="dealWithdrawRequest"><i class="fa fa-bell"></i>From Deal</a>
                    </li>



                    <li class="displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/displaylenderwithdrawalfundsList"){?>
                  active
                  <?php } ?>
                  ">
                        <a href="displaylenderwithdrawalfundsList"><i class="fa fa-history" aria-hidden="true"></i>
                            <span>From Wallet</span>
                        </a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/walletToWalletHistory"){?> class="active" <?php } ?>>
                        <a href="walletToWalletHistory"><i class="fa fa-credit-card-alt"></i>
                            <span>Wallet To Wallet </span>
                        </a>
                    </li> -->

                </ul>
            </li>


            <li
                class="treeview displaySuperAdmin
          <?php if ( $basePATH_URL =="admin/lenderwalletamountdetails" || $basePATH_URL == "admin/lendersemiamount" || $basePATH_URL == "admin/borrowersemiamount" || $basePATH_URL == "admin/addloanowner"|| $basePATH_URL == "admin/getOxyFoundingGroups"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-th"></i> <span> Lenders Wallet Amount</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/checkLenderDashboard"){?> class="hi-tree-menu" <?php }?>>
                        <a href="checkLenderDashboard" class="mywallettransactionslist"><i
                                class="fa fa-circle-o"></i>Check Lender Dashboard</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/lenderwalletamountdetails"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderwalletamountdetails" class="mywallettransactionslist"><i
                                class="fa fa-circle-o"></i>wallet Transactions history</a>
                    </li>
                    <!-- <li <?php if ($basePATH_URL == "admin/lendersemiamount"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lendersemiamount" class="lendersemiamount"><i class="fa fa-circle-o"></i>Lenders EMI
                            Amount Detail</a>
                    </li> -->
                    <!-- <li <?php if ($basePATH_URL == "admin/borrowersemiamount"){?> class="hi-tree-menu" <?php }?>>
                        <a href="borrowersemiamount" class="lendersemiamount"><i class="fa fa-circle-o"></i>Loan Owners
                            Info</a>
                    </li> -->
                    <!-- <li <?php if ($basePATH_URL == "admin/addloanowner"){?> class="hi-tree-menu" <?php }?>>
                        <a href="addloanowner" class="addloanowner"><i class="fa fa-circle-o"></i>Add Loan owner</a>
                    </li> -->
                    <li <?php if ($basePATH_URL == "admin/getOxyFoundingGroups"){?> class="hi-tree-menu" <?php }?>>
                        <a href="getOxyFoundingGroups" class="getOxyFoundingGroups"><i
                                class="fa fa-circle-o"></i>Lenders wallet</a>
                    </li>
                </ul>
            </li>
            <li
                class="treeview displaySuperAdmin
          <?php if ($basePATH_URL == "admin/runningLoans" || $basePATH_URL == "admin/closedLoans" || $basePATH_URL == "admin/paidBorrower" || $basePATH_URL == "admin/highestpaidborrowers"
          || $basePATH_URL == "admin/lenderRunningsloans"|| $basePATH_URL == "admin/closedLoansByPlatform"){?>active menu-open<?php } ?>">
                <!-- <a href="#">
                    <i class="fa fa-list"></i>
                    <span> Loan Records &#9733;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a> -->
                <!-- <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/runningLoans"){?> class="hi-tree-menu" <?php }?>>
                        <a href="runningLoans"><i class="fa fa-dot-circle-o"></i> Running Loans</a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/closedLoans"){?> class="hi-tree-menu" <?php }?>>
                        <a href="closedLoans"><i class="fa fa-dot-circle-o"></i> Closed Loans</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/closedLoansByPlatform"){?> class="hi-tree-menu" <?php }?>>
                        <a href="closedLoansByPlatform"><i class="fa fa-dot-circle-o"></i> Closed By Platform</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/lenderRunningsloans"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderRunningsloans"><i class="fa fa-dot-circle-o"></i>Lenders Running loans</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/paidBorrower"){?> class="hi-tree-menu" <?php }?>>
                        <a href="paidBorrower"><i class="fa fa-dot-circle-o"></i> Paid Borrowers</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/highestpaidborrowers"){?> class="hi-tree-menu" <?php }?>>
                        <a href="highestpaidborrowers"><i class="fa fa-dot-circle-o"></i> Highest Paid Borrowers</a>
                    </li>

                </ul> -->
            </li>

            <li
                class="treeview displayPaymentAdmin
              <?php if ( $basePATH_URL == "admin/uploadedStatus" || $basePATH_URL == "admin/ApprovedStatus" ||$basePATH_URL == "admin/NotyetReflected" ||$basePATH_URL == "admin/ThirtyDays"|| $basePATH_URL == "admin/ECSPaymentHistory" || $basePATH_URL == "admin/Uploadfiles"|| $basePATH_URL == "admin/borrowersrecovery" || $basePATH_URL == "admin/TransactionAlerts" || $basePATH_URL == "admin/QrTransactions" || $basePATH_URL == "admin/cicReport"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>PAYMENTS</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "admin/uservalidityfee"){?> class="active" <?php } ?>>
                        <a href="uservalidityfee"><i class="fa fa-circle-o"></i>
                            <span>User Validity Fee </span>
                        </a>
                    </li>


                    <!-- 
                    <li <?php if ($basePATH_URL == "admin/cicReport"){?> class="active" <?php } ?>>
                        <a href="cicReport"><i class="fa fa-money"></i>
                            <span>CIC REPORT</span>
                        </a>
                    </li>




                    <li <?php if ($basePATH_URL == "admin/uploadedStatus"){?> class="active" <?php } ?>>
                        <a href="uploadedStatus?display=UPLPOADED"><i class="fa fa-check-circle"></i>
                            <span>Uploaded Data</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/QrTransactions"){?> class="active" <?php } ?>>
                        <a href="QrTransactions"><i class="fa fa-qrcode"></i>
                            <span>Qr Transactions</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/ApprovedStatus"){?> class="hi-tree-menu" <?php }?>>
                        <a href="ApprovedStatus"><i class="fa fa-check-circle"></i>Approved Data</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/NotyetReflected"){?> class="hi-tree-menu" <?php }?>>
                        <a href="NotyetReflected"><i class="fa fa-check-circle"></i>Not Yet Reflected Data</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/ECSPaymentHistory"){?> class="active" <?php } ?>>
                        <a href="ECSPaymentHistory">
                            <i class="fa fa-arrow-circle-right"></i><span>Monthly Payments</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/ThirtyDays"){?> class="hi-tree-menu" <?php }?>>
                        <a href="ThirtyDays"><i class="fa fa-calendar"></i>Last 30 Days Data</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/TransactionAlerts"){?> class="hi-tree-menu" <?php }?>>
                        <a href="TransactionAlerts"><i class="fa fa-bell"></i>Transaction Alerts</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/Uploadfiles"){?> class="hi-tree-menu" <?php }?>>
                        <a href="Uploadfiles"><i class="fa fa-upload"></i>Upload Files</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/borrowersrecovery"){?> class="hi-tree-menu" <?php }?>>
                        <a href="borrowersrecovery"><i class="fa fa-whatsapp"></i>Whatsapp Campaign</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/readExcelSheet"){?> class="hi-tree-menu" <?php }?>>
                        <a href="readExcelSheet"><i class="fa fa-upload"></i>Campaign/Notifications</a>
                    </li> -->
                </ul>
            </li>




            <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/userQueryDetails"|| $basePATH_URL == "admin/resolved"|| $basePATH_URL == "admin/closedQuery"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-clipboard"></i>
                    <span>Help Desk</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/userQueryDetails"){?> class="active" <?php } ?>>
                        <a href="userQueryDetails"><i class="fa fa-window-close"></i></i>
                            <span>Unresolved Queries</span>
                        </a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/resolved"){?> class="active" <?php } ?>>
                        <a href="resolved"><i class="fa fa-check"></i></i>
                            <span>Resolved Queries</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/closedQuery"){?> class="active" <?php } ?>>
                        <a href="closedQuery"><i class="fa fa-angle-double-right"></i></i>
                            <span>Cancelled Queries</span>
                        </a>
                    </li>

                </ul>
            </li>

            <!-- <li
                class="displaySuperAdmin treeview
                  <?php if ($basePATH_URL == "admin/totalPendingEMI" || $basePATH_URL == "admin/pendingCurrentEMI" || $basePATH_URL == "admin/checkfeatureEMIs" || $basePATH_URL == "admin/eNACHActiveUsers" || $basePATH_URL == "admin/setMinimumAmountForEnach" || $basePATH_URL == "admin/viewminimumEMIusers"){?>active menu-open<?php } ?>">
                <a href="#">
                    <span> EMI Module </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/totalPendingEMI"){?> class="hi-tree-menu" <?php }?>>
                        <a href="totalPendingEMI"><i class="fa fa-circle-o"></i> Total Pending EMIs</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/pendingCurrentEMI"){?> class="hi-tree-menu" <?php }?>>
                        <a href="pendingCurrentEMI"><i class="fa fa-circle-o"></i>Current Month Pending EMIs </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/checkfeatureEMIs"){?> class="hi-tree-menu" <?php }?>>
                        <a href="checkfeatureEMIs"><i class="fa fa-circle-o"></i>Future EMIs</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/eNACHActiveUsers"){?> class="hi-tree-menu" <?php }?>>
                        <a href="eNACHActiveUsers"><i class="fa fa-circle-o"></i>eNACH Active Users</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/setMinimumAmountForEnach"){?> class="hi-tree-menu" <?php }?>>
                        <a href="setMinimumAmountForEnach"><i class="fa fa-circle-o"></i>Set Emi Amount For eNACH</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/viewminimumEMIusers"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewminimumEMIusers"><i class="fa fa-circle-o"></i> Minimum EMI Amount Users</a>
                    </li>

                </ul>
            </li> -->
            <!-- <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/createAgreements" || $basePATH_URL == "admin/lenderParticiaption"){?>active menu-open<?php } ?>">
                <a href="#"> -->
            <!-- <i class="fa fa-bell"></i> -->
            <!-- <span> Auto Generated &#9733;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a> -->
            <ul class="treeview-menu">
                <li <?php if ($basePATH_URL == "admin/createAgreements"){?> class="hi-tree-menu" <?php }?>>
                    <a href="createAgreements"><i class="fa fa-dot-circle-o"></i>Deal Level Aggrements</a>
                </li>
                <li <?php if ($basePATH_URL == "admin/lenderParticiaption"){?> class="hi-tree-menu" <?php }?>>
                    <a href="lenderParticiaption"><i class="fa fa-dot-circle-o"></i>Disbursement</a>
                </li>

                <li <?php if ($basePATH_URL == "admin/dealBasedAggrements"){?> class="hi-tree-menu" <?php }?>>
                    <a href="dealBasedAggrements"><i class="fa fa-dot-circle-o"></i>Salaried Base Aggrements</a>
                </li>
            </ul>
            </li>

            <li
                class="displaySuperAdmin treeview
                  <?php if ($basePATH_URL == "admin/acceptedLoans" || $basePATH_URL == "admin/expiredloans" || $basePATH_URL == "admin/rejectedApplications" || $basePATH_URL == "admin/lendersLoansinfo" || $basePATH_URL == "admin/borrowersLoansinfo" || $basePATH_URL == "admin/cicReport" || $basePATH_URL == "admin/thirtydaybucket" || $basePATH_URL == "admin/sixtydaysbucket" || $basePATH_URL == "admin/ninetydaysbucket" || $basePATH_URL == "admin/ninetyorNPAbuckets"|| $basePATH_URL == "admin/showCollege"|| $basePATH_URL == "admin/sendEmailActivationLink"){?>  active menu-open<?php } ?>">
                <a href="#">


                    <span>TEST ADMIN</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <!--    <li <?php if ($basePATH_URL == "admin/showCollege"){?> class="active" <?php } ?>><a
                            href="showCollege"><i class="fa fa-arrow-circle-right"></i> <span>
                                Show Colleges
                            </span></a></li> -->

                    <!-- <li <?php if ($basePATH_URL == "admin/acceptedLoans"){?> class="active" <?php } ?>><a
                            href="acceptedLoans"><i class="fa fa-arrow-circle-right"></i> <span>
                                Accepted Loan Applications
                            </span></a></li>
                    <li <?php if ($basePATH_URL == "admin/expiredloans"){?> class="active" <?php } ?>><a
                            href="expiredloans"><i class="fa fa-arrow-circle-right"></i> <span>
                                Expired Loan Applications
                            </span></a></li>
                    <li <?php if ($basePATH_URL == "admin/rejectedApplications"){?> class="active" <?php } ?>><a
                            href="rejectedApplications"><i class="fa fa-arrow-circle-right"></i> <span>
                                Rejected Loan Applications
                            </span></a></li>

                    <li <?php if ($basePATH_URL == "admin/lendersLoansinfo"){?> class="active" <?php } ?>><a
                            href="lendersLoansinfo"><i class="fa fa-arrow-circle-right"></i> <span>
                                Lenders Loans Info
                            </span></a></li>

                    <li <?php if ($basePATH_URL == "admin/borrowersLoansinfo"){?> class="active" <?php } ?>><a
                            href="borrowersLoansinfo"><i class="fa fa-arrow-circle-right"></i> <span>
                                Borrowers Loans Info
                            </span></a></li>

                    <li <?php if ($basePATH_URL == "admin/cicReport"){?> class="active" <?php } ?>>
                        <a href="#" onclick="cicReport();">
                            <i class="fa fa-arrow-circle-right"></i> <span>CIC Report</span>
                        </a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/thirtydaybucket"){?> class="active" <?php } ?>><a
                            href="thirtydaybucket"><i class="fa fa-arrow-circle-right"></i> <span>
                                30 days bucket
                            </span></a></li>
                    <li <?php if ($basePATH_URL == "admin/sixtydaysbucket"){?> class="active" <?php } ?>><a
                            href="sixtydaysbucket"><i class="fa fa-arrow-circle-right"></i> <span>
                                60 days bucket
                            </span></a></li>

                    <li <?php if ($basePATH_URL == "admin/ninetydaysbucket"){?> class="active" <?php } ?>><a
                            href="ninetydaysbucket"><i class="fa fa-arrow-circle-right"></i> <span>
                                90 days bucket
                            </span></a></li>

                    <li <?php if ($basePATH_URL == "admin/ninetyorNPAbuckets"){?> class="active" <?php } ?>><a
                            href="ninetyorNPAbuckets"><i class="fa fa-arrow-circle-right"></i> <span>
                                91 or NPA buckets
                            </span></a></li>

                               <li <?php if ($basePATH_URL == "admin/sendEmailActivationLink"){?> class="active" <?php } ?>>
                        <a href="sendEmailActivationLink">
                            <i class="fa fa-arrow-circle-right"></i><span>Send Email Activation </span>
                        </a>
                    </li> -->



                    <li <?php if ($basePATH_URL == "admin/removeCredentials"){?> class="active" <?php } ?>>
                        <a href="removeCredentials">
                            <i class="fa fa-arrow-circle-right"></i><span>Update User Details</span>
                        </a>
                    </li>

                    <!-- <li class="displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/createUtmforpartnerDealer"){?>
                  active
                  <?php } ?>
                  ">
                        <a href="createUtmforpartnerDealer">
                            <i class="fa fa-flash"></i> <span>P&D UTM</span>
                        </a>
                    </li>

                    <li class="displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/displaylenderAutoinvestlist"){?>
                  active
                  <?php } ?>
                  ">
                        <a href="displaylenderAutoinvestlist">
                           <i class="fa fa-flash"></i>   <span>Lender Auto Invest list</span>
                        </a>
                    </li> -->
                </ul>
            </li>

            <li <?php if ($basePATH_URL == ""){?> class="active" <?php } ?>><a
                    href="https://www.oxyloans.com/new/userlogin" class="deleteSession">
                    <i class="fa fa-sign-out text-yellow"></i> <span>Sign Out</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>


<?php 
        } elseif($userType === 'MASTERADMIN') {
            // Render sidebar content for admin
?>

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
                <p><span class="displayUserName displayAdminType"><?php echo $userType; ?></span></p>
                <a href="#"><span class="placeUserID"></span></a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>

            <li class="displaySuperAdmin
        <?php if ($basePATH_URL == "admin/dashboard"){?>
        active
        <?php } ?>" ;>
                <a href="dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li
                class="treeview  displaySuperAdmin
        <?php if ($basePATH_URL == "admin/createDeal" || $basePATH_URL == "admin/viewDeals" || $basePATH_URL == "admin/equityDeals" || $basePATH_URL == "admin/escrowDeals"
        || $basePATH_URL == "admin/whatsappNotification"    || $basePATH_URL == "admin/pendingFiles" || $basePATH_URL == "admin/getGroupofLender"|| $basePATH_URL == "admin/lenderparticipateddeal" || $basePATH_URL == "admin/paytmTransactions"|| $basePATH_URL == "admin/salariedDeals" || $basePATH_URL == "admin/selfEmployedDeals"|| $basePATH_URL == "admin/testDeals"|| $basePATH_URL == "admin/offlineInterest"|| $basePATH_URL == "admin/dealNotifications"  || $basePATH_URL == "admin/viewDealTypePayOut"|| $basePATH_URL == "admin/futureDeals"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-bell"></i>
                    <span> Deals &#9733;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/createDeal"){?> class="hi-tree-menu" <?php }?>>
                        <a href="createDeal?id=0"><i class="fa fa-dot-circle-o"></i>Create New Deal</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/viewDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewDeals"><i class="fa fa-dot-circle-o"></i>View & Edit Deals</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/equityDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="equityDeals"><i class="fa fa-dot-circle-o"></i>View Equity Deals</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/escrowDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="escrowDeals"><i class="fa fa-dot-circle-o"></i>View Escrow Deals</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/testDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="testDeals"><i class="fa fa-dot-circle-o"></i>View Test Deals</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/salariedDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="salariedDeals"><i class="fa fa-dot-circle-o"></i>View Personal Deals</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/viewDealTypePayOut"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewDealTypePayOut"><i class="fa fa-dot-circle-o"></i>View Deal Payout</a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/pendingFiles"){?> class="hi-tree-menu" <?php }?>>
                        <a href="pendingFiles"><i class="fa fa-money"></i> Pending Files</a>
                    </li>


                    <!-- <li <?php if ($basePATH_URL == "admin/offlineInterest"){?> class="hi-tree-menu" <?php }?>>
                        <a href="offlineInterest"><i class="fa fa-dot-circle-o"></i>Offline Interest</a>
                    </li> -->

                    <li <?php if ($basePATH_URL == "admin/dealNotifications"){?> class="hi-tree-menu" <?php }?>>
                        <a href="dealNotifications"><i class="fa fa-dot-circle-o"></i>Deal Notification</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/viewclosedDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewclosedDeals"><i class="fa fa-dot-circle-o"></i>View Closed Deals</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/getGroupofLender"){?> class="hi-tree-menu" <?php }?>>
                        <a href="getGroupofLender"><i class="fa fa-dot-circle-o"></i>Oxy Founding Groups</a>
                    </li>


                    <!-- <li <?php if ($basePATH_URL == "admin/whatsappNotification"){?> class="hi-tree-menu" <?php }?>>
                        <a href="whatsappNotification"><i class="fa fa-dot-circle-o"></i>WhatsApp Notification</a>
                    </li> -->


                    <!-- <li <?php if ($basePATH_URL == "admin/lenderparticipateddeal"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderparticipateddeal"><i class="fa fa-dot-circle-o"></i> Update Lender
                            Participation</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/equityInvestors"){?> class="hi-tree-menu" <?php }?>>
                        <a href="equityInvestors"><i class="fa fa-dot-circle-o"></i>Equity Investors List</a>
                    </li> -->
                    <!-- <li <?php if ($basePATH_URL == "admin/paytmTransactions"){?> class="hi-tree-menu" <?php }?>>
                        <a href="paytmTransactions"><i class="fa fa-dot-circle-o"></i>Paytm Nodal</a>
                    </li> -->
                    <li <?php if ($basePATH_URL == "admin/runningDealInfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="runningDealInfo"><i class="fa fa-dot-circle-o"></i>Running Deals Info</a>
                    </li>

                    <!--  <li <?php if ($basePATH_URL == "admin/dealWithdrawRequest"){?>
            class = "hi-tree-menu"
            <?php }?>
            >
            <a href="dealWithdrawRequest"><i class="fa fa-bell"></i>Deal Withdrawal Request</a>
          </li>

                    <!--  <li <?php if ($basePATH_URL == "admin/closedDeals"){?>
            class = "hi-tree-menu"
            <?php }?>
            >
            <a href="closedLoans"><i class="fa fa-dot-circle-o"></i> Closed Deals</a>
          </li> -->

                </ul>
            </li>
            <!-- 
            <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/holdAmountRequest"|| $basePATH_URL == "admin/holdAmountBreakUp"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span> Hold Amount</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "admin/holdAmountRequest"){?> class="hi-tree-menu" <?php }?>>
                        <a href="holdAmountRequest"><i class="fa fa-dot-circle-o"></i> Hold Request </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/holdAmountBreakUp"){?> class="hi-tree-menu" <?php }?>>
                        <a href="holdAmountBreakUp"><i class="fa fa-dot-circle-o"></i> Hold Amount Breakup</a>
                    </li>

                </ul>
            </li> -->

            <!-- <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/borrowerRunningsinfo" || 
                  $basePATH_URL == "admin/borrowerLoanStatus"|| $basePATH_URL == "admin/fdPaymentDetails"|| $basePATH_URL == "admin/uploadFdData"|| $basePATH_URL == "admin/viewListOfFds"|| $basePATH_URL == "admin/verifyPaymentDetail"|| $basePATH_URL == "admin/transferFunds"|| $basePATH_URL == "admin/searchfdUsers"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-user-circle"></i>
                    <span></span>Student Loan Process
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "admin/borrowerRunningsinfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="borrowerRunningsinfo"><i class="fa fa-dot-circle-o"></i> Add Student Bank Ac </a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/borrowerLoanStatus"){?> class="hi-tree-menu" <?php }?>>
                        <a href="borrowerLoanStatus"><i class="fa fa-dot-circle-o"></i> Bank Verified User </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/uploadFdData"){?> class="hi-tree-menu" <?php }?>>
                        <a href="uploadFdData"><i class="fa fa-dot-circle-o"></i> Book FD </a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/fdPaymentDetails"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdPaymentDetails"><i class="fa fa-dot-circle-o"></i> Payment Details </a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/verifyPaymentDetail"){?> class="hi-tree-menu" <?php }?>>
                        <a href="verifyPaymentDetail"><i class="fa fa-dot-circle-o"></i> Verify Payment Details</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/transferFunds"){?> class="hi-tree-menu" <?php }?>>
                        <a href="transferFunds"><i class="fa fa-dot-circle-o"></i> Transfer Funds</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/viewListOfFds"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewListOfFds"><i class="fa fa-dot-circle-o"></i> View List Of FD'S </a>
                    </li>


                       <li <?php if ($basePATH_URL == "admin/searchfdUsers"){?> class="hi-tree-menu" <?php }?>>
                        <a href="searchfdUsers"><i class="fa fa-dot-circle-o"></i> Search FD Types</a>
                    </li>

                </ul>
            </li> -->




            <!-- <li
                     class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/insertPendingInformation" || $basePATH_URL == "admin/pendingamountUser"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span></span>Lender Pending Amount
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                 <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/insertPendingInformation"){?> class="hi-tree-menu" <?php }?>>
                        <a href="insertPendingInformation"><i class="fa fa-dot-circle-o"></i>Insert Details</a>
                    </li>


                      <li <?php if ($basePATH_URL == "admin/pendingamountUser"){?> class="hi-tree-menu" <?php }?>>
                        <a href="pendingamountUser"><i class="fa fa-dot-circle-o"></i>Pending amount User</a>
                    </li>

                </ul>
            </li> -->













            <!-- 
                  <li
                     class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/fdStatistics" || 
                  $basePATH_URL == "admin/fddownloadInvoice"|| $basePATH_URL == "admin/fdmonthlyloansInfo" || $basePATH_URL == "admin/fdClosedDetails"|| $basePATH_URL == "admin/fdexecutedPayment"  ){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-star"></i>
                    <span></span>FD Statistics 

                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "admin/fdStatistics"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdStatistics"><i class="fa fa-dot-circle-o"></i> Statistics</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/fddownloadInvoice"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fddownloadInvoice"><i class="fa fa-dot-circle-o"></i>Download Invoice </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/fdmonthlyloansInfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdmonthlyloansInfo"><i class="fa fa-dot-circle-o"></i> Monthly Loan Info </a>
                    </li>

                      <li <?php if ($basePATH_URL == "admin/fdexecutedPayment"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdexecutedPayment"><i class="fa fa-dot-circle-o"></i> Fd Executed Payments </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/fdClosedDetails"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdClosedDetails"><i class="fa fa-dot-circle-o"></i> Fd Closed Details </a>
                    </li>



                </ul>
            </li> -->




            <li
                class="displaySuperAdmin treeview viewMyLoanApplication
              <?php if ($basePATH_URL == "admin/borrowersapplications" || $basePATH_URL == "admin/intrested" || $basePATH_URL == "admin/loanAprroved" || $basePATH_URL == "admin/approved" || $basePATH_URL == "admin/Disbursed" || $basePATH_URL == "admin/ApplicationLevelDisbursed" || $basePATH_URL == "admin/newDisbursed"|| $basePATH_URL == "admin/ViewVanNumber"){?>active menu-open<?php } ?>">



                <!-- <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Borrower Loan Process &#9888;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a> -->
                <ul class="treeview-menu">

                    <!-- <li <?php if ($basePATH_URL == "admin/borrowersapplications"){?> class="hi-tree-menu" <?php } ?>><a
                            href="borrowersapplications?getfornotifications=0"><i class="fa fa-circle-o"></i> <span>
                                Borrowers Loan Applications
                            </span></a></li>
                    <li <?php if ($basePATH_URL == "admin/intrested"){?> class="hi-tree-menu" <?php }?>>
                        <a href="intrested"><i class="fa fa-circle-o"></i>Intrested (L1)</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/loanAprroved"){?> class="hi-tree-menu" <?php }?>>
                        <a href="loanAprroved"><i class="fa fa-circle-o"></i>Offer Accepted Users (L2)</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/approved"){?> class="hi-tree-menu" <?php }?>>
                        <a href="approved?getfornotifications=0"><i class="fa fa-circle-o"></i>Approved by Admin(L3)</a>
                    </li> -->

                    <!--  <li <?php if ($basePATH_URL == "admin/Disbursed"){?>
              class = "hi-tree-menu"
              <?php }?>
              >
              <a href="Disbursed?getfornotifications=0"><i class="fa fa-circle-o"></i> Disbursed(L4)</a>
            </li> -->
                    <li <?php if ($basePATH_URL == "admin/newDisbursed"){?> class="hi-tree-menu" <?php }?>>
                        <a href="newDisbursed?getfornotifications=0"><i class="fa fa-circle-o"></i> New
                            Disbursed(L4)</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/ApplicationLevelDisbursed"){?> class="tree-menu" <?php }?>>
                        <a href="ApplicationLevelDisbursed"><i class="fa fa-circle-o"></i>Deal Level Disbursed(L4)</a>
                    </li>




                    <li <?php if ($basePATH_URL == "admin/ApplicationLevelDisbursed"){?> class="tree-menu" <?php }?>>
                        <a href="ApplicationLevelDisbursed?Applevel=APPLEVEL"><i class="fa fa-dot-circle-o"></i>Disburse
                            Application Level</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/borrowerRunningsinfo"){?> class="noc" <?php }?>>
                        <a href="borrowerRunningsinfo?Nocborrower=NOC"><i class="fa fa-dot-circle-o"></i>Closure </a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/ViewVanNumber"){?> class="active" <?php } ?>>
                        <a href="ViewVanNumber">
                            <i class="fa fa-arrow-circle-right"></i><span>View Van Number</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li
                class="displaySuperAdmin treeview viewMyLoanApplication
          <?php if ($basePATH_URL == "admin/lendersapplications" || $basePATH_URL == "admin/lenderWallettransactions" || $basePATH_URL == "admin/uploadtransactions"|| $basePATH_URL == "admin/lenderreferalinfo"|| $basePATH_URL == "admin/approveReferenceamount" || $basePATH_URL == "admin/editReferenceDeatils" || $basePATH_URL == "admin/editGroupinfo"|| $basePATH_URL == "admin/sumofDealAmountInfo"|| $basePATH_URL == "admin/lenderstatistics"|| $basePATH_URL == "admin/registerLenderUsers"|| $basePATH_URL == "admin/monthlyReferalEarning" ){?>active menu-open<?php } ?>">
                <a href="#">


                    <i class="fa fa-user-circle"></i>
                    <span> LENDERS&#9889;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu displaySuperAdmin">
                    <!-- <li <?php if ($basePATH_URL == "admin/lendersapplications"){?> class="active" <?php } ?>><a
                            href="lendersapplications?getfornotifications=0"><i class="fa fa-arrow-circle-right"></i>
                            <span>
                                Lenders Loan Applications</span></a></li>



                            <li <?php if ($basePATH_URL == "admin/registerLenderUsers"){?> class="active" <?php } ?>><a
                            href="registerLenderUsers"><i
                                class="fa fa-arrow-circle-right"></i> <span>
                                Register Lender</span></a></li>  -->



                    <li <?php if ($basePATH_URL == "admin/lenderWallettransactions"){?> class="active" <?php } ?>><a
                            href="lenderWallettransactions?getfornotifications=0"><i
                                class="fa fa-arrow-circle-right"></i> <span>
                                Lender Wallet Trasactions</span></a></li>





                    <li <?php if ($basePATH_URL == "admin/uploadtransactions"){?> class="hi-tree-menu" <?php }?>>
                        <a href="uploadtransactions" class="uploadtransactiondetails"><i
                                class="fa fa-arrow-circle-right"></i>Upload Transaction</a>
                    </li>



                    <!-- <li <?php if ($basePATH_URL == "admin/poolingLendrs"){?> class="hi-tree-menu" <?php }?>>
                        <a href="poolingLendrs" class="poolingLendrs"><i class="fa fa-arrow-circle-right"></i>Pooling
                            Lenders</a>
                    </li> 



                    <li <?php if ($basePATH_URL == "admin/lenderreferalinfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderreferalinfo" class="lenderreferalinfo"><i
                                class="fa fa-arrow-circle-right"></i>Lender Referee Info</a>
                    </li>


                     <li <?php if ($basePATH_URL == "admin/monthlyReferalEarning"){?> class="hi-tree-menu" <?php }?>>
                        <a href="monthlyReferalEarning" class="monthlyReferalEarning"><i
                                class="fa fa-arrow-circle-right"></i>Monthly Rerefer Earnings</a>
                    </li>


                      <li <?php if ($basePATH_URL == "admin/approveLenderFee"){?>
                  class = "hi-tree-menu"
                  <?php }?>>
                  <a href="approveLenderFee" class="lenderreferalinfo"><i class="fa fa-arrow-circle-right"></i>Approve Lender Fee</a>
                </li> 
                    <li <?php if ($basePATH_URL == "admin/approveReferenceamount"){?> class="hi-tree-menu" <?php }?>>
                        <a href="approveReferenceamount" class="approveReferenceamount"><i
                                class="fa fa-arrow-circle-right"></i>Approve Reference Amount</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/editReferenceDeatils"){?> class="hi-tree-menu" <?php }?>>
                        <a href="editReferenceDeatils" class="editReferenceDeatils"><i
                                class="fa fa-arrow-circle-right"></i>Edit Reference Details</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/editGroupinfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="editGroupinfo"><i class="fa fa-dot-circle-o"></i>Update Lender Group</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin_lenderstatistics"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderstatistics"><i class="fa fa-dot-circle-o"></i>Lender Deal Statistics</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/sumofDealAmountInfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="sumofDealAmountInfo"><i class="fa fa-dot-circle-o"></i>Lender's Participated Amount</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/lendersInAllEquityDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lendersInAllEquityDeals"><i class="fa fa-dot-circle-o"></i>Equity Lenders</a>
                    </li> -->
                </ul>
            </li>



            <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/displaylenderwithdrawalfundsList"|| $basePATH_URL == "admin/walletToWalletHistory"|| $basePATH_URL == "admin/dealWithdrawRequest"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span> Withdrawal Requests</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">



                    <li <?php if ($basePATH_URL == "admin/dealWithdrawRequest"){?> class="hi-tree-menu" <?php }?>>
                        <a href="dealWithdrawRequest"><i class="fa fa-bell"></i>From Deal</a>
                    </li>



                    <li class="displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/displaylenderwithdrawalfundsList"){?>
                  active
                  <?php } ?>
                  ">
                        <a href="displaylenderwithdrawalfundsList"><i class="fa fa-history" aria-hidden="true"></i>
                            <span>From Wallet</span>
                        </a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/walletToWalletHistory"){?> class="active" <?php } ?>>
                        <a href="walletToWalletHistory"><i class="fa fa-credit-card-alt"></i>
                            <span>Wallet To Wallet </span>
                        </a>
                    </li>

                </ul>
            </li>


            <li
                class="treeview displaySuperAdmin
          <?php if ( $basePATH_URL =="admin/lenderwalletamountdetails" || $basePATH_URL == "admin/lendersemiamount" || $basePATH_URL == "admin/borrowersemiamount" || $basePATH_URL == "admin/addloanowner"|| $basePATH_URL == "admin/getOxyFoundingGroups"){?>active menu-open<?php } ?>">
                <!-- <a href="#">
                    <i class="fa fa-th"></i> <span> Lenders Wallet Amount</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a> -->
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/checkLenderDashboard"){?> class="hi-tree-menu" <?php }?>>
                        <a href="checkLenderDashboard" class="mywallettransactionslist"><i
                                class="fa fa-circle-o"></i>Check Lender Dashboard</a>
                    </li>

                    <!-- <li <?php if ($basePATH_URL == "admin/lenderwalletamountdetails"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderwalletamountdetails" class="mywallettransactionslist"><i
                                class="fa fa-circle-o"></i>wallet Transactions history</a>
                    </li> -->
                    <!-- <li <?php if ($basePATH_URL == "admin/lendersemiamount"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lendersemiamount" class="lendersemiamount"><i class="fa fa-circle-o"></i>Lenders EMI
                            Amount Detail</a>
                    </li> -->
                    <!-- <li <?php if ($basePATH_URL == "admin/borrowersemiamount"){?> class="hi-tree-menu" <?php }?>>
                        <a href="borrowersemiamount" class="lendersemiamount"><i class="fa fa-circle-o"></i>Loan Owners
                            Info</a>
                    </li> -->
                    <!-- <li <?php if ($basePATH_URL == "admin/addloanowner"){?> class="hi-tree-menu" <?php }?>>
                        <a href="addloanowner" class="addloanowner"><i class="fa fa-circle-o"></i>Add Loan owner</a>
                    </li> -->
                    <!-- <li <?php if ($basePATH_URL == "admin/getOxyFoundingGroups"){?> class="hi-tree-menu" <?php }?>>
                        <a href="getOxyFoundingGroups" class="getOxyFoundingGroups"><i
                                class="fa fa-circle-o"></i>Lenders wallet</a>
                    </li> -->
                </ul>
            </li>
            <li
                class="treeview displaySuperAdmin
          <?php if ($basePATH_URL == "admin/runningLoans" || $basePATH_URL == "admin/closedLoans" || $basePATH_URL == "admin/paidBorrower" || $basePATH_URL == "admin/highestpaidborrowers"
          || $basePATH_URL == "admin/lenderRunningsloans"|| $basePATH_URL == "admin/closedLoansByPlatform"){?>active menu-open<?php } ?>">
                <!-- <a href="#">
                    <i class="fa fa-list"></i>
                    <span> Loan Records &#9733;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a> -->
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/runningLoans"){?> class="hi-tree-menu" <?php }?>>
                        <a href="runningLoans"><i class="fa fa-dot-circle-o"></i> Running Loans</a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/closedLoans"){?> class="hi-tree-menu" <?php }?>>
                        <a href="closedLoans"><i class="fa fa-dot-circle-o"></i> Closed Loans</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/closedLoansByPlatform"){?> class="hi-tree-menu" <?php }?>>
                        <a href="closedLoansByPlatform"><i class="fa fa-dot-circle-o"></i> Closed By Platform</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/lenderRunningsloans"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderRunningsloans"><i class="fa fa-dot-circle-o"></i>Lenders Running loans</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/paidBorrower"){?> class="hi-tree-menu" <?php }?>>
                        <a href="paidBorrower"><i class="fa fa-dot-circle-o"></i> Paid Borrowers</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/highestpaidborrowers"){?> class="hi-tree-menu" <?php }?>>
                        <a href="highestpaidborrowers"><i class="fa fa-dot-circle-o"></i> Highest Paid Borrowers</a>
                    </li>

                </ul>
            </li>

            <li
                class="treeview displayPaymentAdmin
              <?php if ( $basePATH_URL == "admin/uploadedStatus" || $basePATH_URL == "admin/ApprovedStatus" ||$basePATH_URL == "admin/NotyetReflected" ||$basePATH_URL == "admin/ThirtyDays"|| $basePATH_URL == "admin/ECSPaymentHistory" || $basePATH_URL == "admin/Uploadfiles"|| $basePATH_URL == "admin/borrowersrecovery" || $basePATH_URL == "admin/TransactionAlerts" || $basePATH_URL == "admin/QrTransactions" || $basePATH_URL == "admin/cicReport"){?>active menu-open<?php } ?>">



                <!-- <a href="#">
                    <i class="fa fa-money"></i>
                    <span>PAYMENTS</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a> -->
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "admin/uservalidityfee"){?> class="active" <?php } ?>>
                        <a href="uservalidityfee"><i class="fa fa-circle-o"></i>
                            <span>User Validity Fee </span>
                        </a>
                    </li>


                    <!-- 
                    <li <?php if ($basePATH_URL == "admin/cicReport"){?> class="active" <?php } ?>>
                        <a href="cicReport"><i class="fa fa-money"></i>
                            <span>CIC REPORT</span>
                        </a>
                    </li>




                    <li <?php if ($basePATH_URL == "admin/uploadedStatus"){?> class="active" <?php } ?>>
                        <a href="uploadedStatus?display=UPLPOADED"><i class="fa fa-check-circle"></i>
                            <span>Uploaded Data</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/QrTransactions"){?> class="active" <?php } ?>>
                        <a href="QrTransactions"><i class="fa fa-qrcode"></i>
                            <span>Qr Transactions</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/ApprovedStatus"){?> class="hi-tree-menu" <?php }?>>
                        <a href="ApprovedStatus"><i class="fa fa-check-circle"></i>Approved Data</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/NotyetReflected"){?> class="hi-tree-menu" <?php }?>>
                        <a href="NotyetReflected"><i class="fa fa-check-circle"></i>Not Yet Reflected Data</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/ECSPaymentHistory"){?> class="active" <?php } ?>>
                        <a href="ECSPaymentHistory">
                            <i class="fa fa-arrow-circle-right"></i><span>Monthly Payments</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/ThirtyDays"){?> class="hi-tree-menu" <?php }?>>
                        <a href="ThirtyDays"><i class="fa fa-calendar"></i>Last 30 Days Data</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/TransactionAlerts"){?> class="hi-tree-menu" <?php }?>>
                        <a href="TransactionAlerts"><i class="fa fa-bell"></i>Transaction Alerts</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/Uploadfiles"){?> class="hi-tree-menu" <?php }?>>
                        <a href="Uploadfiles"><i class="fa fa-upload"></i>Upload Files</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/borrowersrecovery"){?> class="hi-tree-menu" <?php }?>>
                        <a href="borrowersrecovery"><i class="fa fa-whatsapp"></i>Whatsapp Campaign</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/readExcelSheet"){?> class="hi-tree-menu" <?php }?>>
                        <a href="readExcelSheet"><i class="fa fa-upload"></i>Campaign/Notifications</a>
                    </li> -->
                </ul>
            </li>




            <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/userQueryDetails"|| $basePATH_URL == "admin/resolved"|| $basePATH_URL == "admin/closedQuery"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-clipboard"></i>
                    <span>Help Desk</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/userQueryDetails"){?> class="active" <?php } ?>>
                        <a href="userQueryDetails"><i class="fa fa-window-close"></i></i>
                            <span>Unresolved Queries</span>
                        </a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/resolved"){?> class="active" <?php } ?>>
                        <a href="resolved"><i class="fa fa-check"></i></i>
                            <span>Resolved Queries</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/closedQuery"){?> class="active" <?php } ?>>
                        <a href="closedQuery"><i class="fa fa-angle-double-right"></i></i>
                            <span>Cancelled Queries</span>
                        </a>
                    </li>

                </ul>
            </li>

            <!-- <li
                class="displaySuperAdmin treeview
                  <?php if ($basePATH_URL == "admin/totalPendingEMI" || $basePATH_URL == "admin/pendingCurrentEMI" || $basePATH_URL == "admin/checkfeatureEMIs" || $basePATH_URL == "admin/eNACHActiveUsers" || $basePATH_URL == "admin/setMinimumAmountForEnach" || $basePATH_URL == "admin/viewminimumEMIusers"){?>active menu-open<?php } ?>">
                <a href="#">
                    <span> EMI Module </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/totalPendingEMI"){?> class="hi-tree-menu" <?php }?>>
                        <a href="totalPendingEMI"><i class="fa fa-circle-o"></i> Total Pending EMIs</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/pendingCurrentEMI"){?> class="hi-tree-menu" <?php }?>>
                        <a href="pendingCurrentEMI"><i class="fa fa-circle-o"></i>Current Month Pending EMIs </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/checkfeatureEMIs"){?> class="hi-tree-menu" <?php }?>>
                        <a href="checkfeatureEMIs"><i class="fa fa-circle-o"></i>Future EMIs</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/eNACHActiveUsers"){?> class="hi-tree-menu" <?php }?>>
                        <a href="eNACHActiveUsers"><i class="fa fa-circle-o"></i>eNACH Active Users</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/setMinimumAmountForEnach"){?> class="hi-tree-menu" <?php }?>>
                        <a href="setMinimumAmountForEnach"><i class="fa fa-circle-o"></i>Set Emi Amount For eNACH</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/viewminimumEMIusers"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewminimumEMIusers"><i class="fa fa-circle-o"></i> Minimum EMI Amount Users</a>
                    </li>

                </ul>
            </li> -->
            <!-- <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/createAgreements" || $basePATH_URL == "admin/lenderParticiaption"){?>active menu-open<?php } ?>">
                <a href="#"> -->
            <!-- <i class="fa fa-bell"></i> -->
            <!-- <span> Auto Generated &#9733;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a> -->
            <ul class="treeview-menu">
                <li <?php if ($basePATH_URL == "admin/createAgreements"){?> class="hi-tree-menu" <?php }?>>
                    <a href="createAgreements"><i class="fa fa-dot-circle-o"></i>Deal Level Aggrements</a>
                </li>
                <li <?php if ($basePATH_URL == "admin/lenderParticiaption"){?> class="hi-tree-menu" <?php }?>>
                    <a href="lenderParticiaption"><i class="fa fa-dot-circle-o"></i>Disbursement</a>
                </li>

                <li <?php if ($basePATH_URL == "admin/dealBasedAggrements"){?> class="hi-tree-menu" <?php }?>>
                    <a href="dealBasedAggrements"><i class="fa fa-dot-circle-o"></i>Salaried Base Aggrements</a>
                </li>
            </ul>
            </li>

            <li
                class="displaySuperAdmin treeview
                  <?php if ($basePATH_URL == "admin/acceptedLoans" || $basePATH_URL == "admin/expiredloans" || $basePATH_URL == "admin/rejectedApplications" || $basePATH_URL == "admin/lendersLoansinfo" || $basePATH_URL == "admin/borrowersLoansinfo" || $basePATH_URL == "admin/cicReport" || $basePATH_URL == "admin/thirtydaybucket" || $basePATH_URL == "admin/sixtydaysbucket" || $basePATH_URL == "admin/ninetydaysbucket" || $basePATH_URL == "admin/ninetyorNPAbuckets"|| $basePATH_URL == "admin/showCollege"|| $basePATH_URL == "admin/sendEmailActivationLink"){?>  active menu-open<?php } ?>">
                <a href="#">


                    <span>SUPER ADMIN</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <!--    <li <?php if ($basePATH_URL == "admin/showCollege"){?> class="active" <?php } ?>><a
                            href="showCollege"><i class="fa fa-arrow-circle-right"></i> <span>
                                Show Colleges
                            </span></a></li> -->

                    <!-- <li <?php if ($basePATH_URL == "admin/acceptedLoans"){?> class="active" <?php } ?>><a
                            href="acceptedLoans"><i class="fa fa-arrow-circle-right"></i> <span>
                                Accepted Loan Applications
                            </span></a></li>
                    <li <?php if ($basePATH_URL == "admin/expiredloans"){?> class="active" <?php } ?>><a
                            href="expiredloans"><i class="fa fa-arrow-circle-right"></i> <span>
                                Expired Loan Applications
                            </span></a></li>
                    <li <?php if ($basePATH_URL == "admin/rejectedApplications"){?> class="active" <?php } ?>><a
                            href="rejectedApplications"><i class="fa fa-arrow-circle-right"></i> <span>
                                Rejected Loan Applications
                            </span></a></li>

                    <li <?php if ($basePATH_URL == "admin/lendersLoansinfo"){?> class="active" <?php } ?>><a
                            href="lendersLoansinfo"><i class="fa fa-arrow-circle-right"></i> <span>
                                Lenders Loans Info
                            </span></a></li>

                    <li <?php if ($basePATH_URL == "admin/borrowersLoansinfo"){?> class="active" <?php } ?>><a
                            href="borrowersLoansinfo"><i class="fa fa-arrow-circle-right"></i> <span>
                                Borrowers Loans Info
                            </span></a></li>

                    <li <?php if ($basePATH_URL == "admin/cicReport"){?> class="active" <?php } ?>>
                        <a href="#" onclick="cicReport();">
                            <i class="fa fa-arrow-circle-right"></i> <span>CIC Report</span>
                        </a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/thirtydaybucket"){?> class="active" <?php } ?>><a
                            href="thirtydaybucket"><i class="fa fa-arrow-circle-right"></i> <span>
                                30 days bucket
                            </span></a></li>
                    <li <?php if ($basePATH_URL == "admin/sixtydaysbucket"){?> class="active" <?php } ?>><a
                            href="sixtydaysbucket"><i class="fa fa-arrow-circle-right"></i> <span>
                                60 days bucket
                            </span></a></li>

                    <li <?php if ($basePATH_URL == "admin/ninetydaysbucket"){?> class="active" <?php } ?>><a
                            href="ninetydaysbucket"><i class="fa fa-arrow-circle-right"></i> <span>
                                90 days bucket
                            </span></a></li>

 <li <?php if ($basePATH_URL == "admin/ninetyorNPAbuckets"){?> class="active" <?php } ?>><a
                            href="ninetyorNPAbuckets"><i class="fa fa-arrow-circle-right"></i> <span>
                                91 or NPA buckets
                            </span></a></li>

                        -->


                    <li <?php if ($basePATH_URL == "admin/sendEmailActivationLink"){?> class="active" <?php } ?>>
                        <a href="sendEmailActivationLink">
                            <i class="fa fa-arrow-circle-right"></i><span>Send Email Activation </span>
                        </a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/removeCredentials"){?> class="active" <?php } ?>>
                        <a href="removeCredentials">
                            <i class="fa fa-arrow-circle-right"></i><span>Update User Details</span>
                        </a>
                    </li>

                    <!-- <li class="displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/createUtmforpartnerDealer"){?>
                  active
                  <?php } ?>
                  ">
                        <a href="createUtmforpartnerDealer">
                            <i class="fa fa-flash"></i> <span>P&D UTM</span>
                        </a>
                    </li>

                    <li class="displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/displaylenderAutoinvestlist"){?>
                  active
                  <?php } ?>
                  ">
                        <a href="displaylenderAutoinvestlist">
                           <i class="fa fa-flash"></i>   <span>Lender Auto Invest list</span>
                        </a>
                    </li> -->
                </ul>
            </li>

            <li <?php if ($basePATH_URL == ""){?> class="active" <?php } ?>><a
                    href="https://www.oxyloans.com/new/userlogin" class="deleteSession">
                    <i class="fa fa-sign-out text-yellow"></i> <span>Sign Out</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>


<?php 
        } elseif($userType === 'ADMIN') {
            // Render sidebar content for admin
?>

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
                <p><span class="displayUserName displayAdminType">Super Admin</span></p>
                <a href="#"><span class="placeUserID"></span></a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>

            <li class="displaySuperAdmin
        <?php if ($basePATH_URL == "admin/dashboard"){?>
        active
        <?php } ?>" ;>
                <a href="dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li
                class="treeview  displaySuperAdmin
        <?php if ($basePATH_URL == "admin/createDeal" || $basePATH_URL == "admin/viewDeals" || $basePATH_URL == "admin/equityDeals" || $basePATH_URL == "admin/escrowDeals"
        || $basePATH_URL == "admin/whatsappNotification"    || $basePATH_URL == "admin/pendingFiles" || $basePATH_URL == "admin/getGroupofLender"|| $basePATH_URL == "admin/lenderparticipateddeal" || $basePATH_URL == "admin/paytmTransactions"|| $basePATH_URL == "admin/salariedDeals" || $basePATH_URL == "admin/selfEmployedDeals"|| $basePATH_URL == "admin/testDeals"|| $basePATH_URL == "admin/offlineInterest"|| $basePATH_URL == "admin/dealNotifications"  || $basePATH_URL == "admin/viewDealTypePayOut"|| $basePATH_URL == "admin/futureDeals"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-bell"></i>
                    <span> Deals &#9733;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/createDeal"){?> class="hi-tree-menu" <?php }?>>
                        <a href="createDeal?id=0"><i class="fa fa-dot-circle-o"></i>Create New Deal</a>
                    </li>

                  
                    <li <?php if ($basePATH_URL == "admin/viewDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewDeals"><i class="fa fa-dot-circle-o"></i>View & Edit Deals</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/equityDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="equityDeals"><i class="fa fa-dot-circle-o"></i>View Equity Deals</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/escrowDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="escrowDeals"><i class="fa fa-dot-circle-o"></i>View Escrow Deals</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/testDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="testDeals"><i class="fa fa-dot-circle-o"></i>View Test Deals</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/salariedDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="salariedDeals"><i class="fa fa-dot-circle-o"></i>View Personal Deals</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/viewDealTypePayOut"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewDealTypePayOut"><i class="fa fa-dot-circle-o"></i>View Deal Payout</a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/pendingFiles"){?> class="hi-tree-menu" <?php }?>>
                        <a href="pendingFiles"><i class="fa fa-money"></i> Pending Files</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/offlineInterest"){?> class="hi-tree-menu" <?php }?>>
                        <a href="offlineInterest"><i class="fa fa-dot-circle-o"></i>Offline Interest</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/dealNotifications"){?> class="hi-tree-menu" <?php }?>>
                        <a href="dealNotifications"><i class="fa fa-dot-circle-o"></i>Deal Notification</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/viewclosedDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewclosedDeals"><i class="fa fa-dot-circle-o"></i>View Closed Deals</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/getGroupofLender"){?> class="hi-tree-menu" <?php }?>>
                        <a href="getGroupofLender"><i class="fa fa-dot-circle-o"></i>Oxy Founding Groups</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/whatsappNotification"){?> class="hi-tree-menu" <?php }?>>
                        <a href="whatsappNotification"><i class="fa fa-dot-circle-o"></i>WhatsApp Notification</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/lenderparticipateddeal"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderparticipateddeal"><i class="fa fa-dot-circle-o"></i> Update Lender
                            Participation</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/equityInvestors"){?> class="hi-tree-menu" <?php }?>>
                        <a href="equityInvestors"><i class="fa fa-dot-circle-o"></i>Equity Investors List</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/paytmTransactions"){?> class="hi-tree-menu" <?php }?>>
                        <a href="paytmTransactions"><i class="fa fa-dot-circle-o"></i>Paytm Nodal</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/runningDealInfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="runningDealInfo"><i class="fa fa-dot-circle-o"></i>Running Deals Info</a>
                    </li>

                    <!--  <li <?php if ($basePATH_URL == "admin/dealWithdrawRequest"){?>
            class = "hi-tree-menu"
            <?php }?>
            >
            <a href="dealWithdrawRequest"><i class="fa fa-bell"></i>Deal Withdrawal Request</a>
          </li> -->

                    <!--  <li <?php if ($basePATH_URL == "admin/closedDeals"){?>
            class = "hi-tree-menu"
            <?php }?>
            >
            <a href="closedLoans"><i class="fa fa-dot-circle-o"></i> Closed Deals</a>
          </li> -->

                </ul>
            </li>

            <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/holdAmountRequest"|| $basePATH_URL == "admin/holdAmountBreakUp"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span> Hold Amount</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "admin/holdAmountRequest"){?> class="hi-tree-menu" <?php }?>>
                        <a href="holdAmountRequest"><i class="fa fa-dot-circle-o"></i> Hold Request </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/holdAmountBreakUp"){?> class="hi-tree-menu" <?php }?>>
                        <a href="holdAmountBreakUp"><i class="fa fa-dot-circle-o"></i> Hold Amount Breakup</a>
                    </li>

                </ul>
            </li>

            <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/borrowerRunningsinfo" || 
                  $basePATH_URL == "admin/borrowerLoanStatus"|| $basePATH_URL == "admin/fdPaymentDetails"|| $basePATH_URL == "admin/uploadFdData"|| $basePATH_URL == "admin/viewListOfFds"|| $basePATH_URL == "admin/verifyPaymentDetail"|| $basePATH_URL == "admin/transferFunds"|| $basePATH_URL == "admin/searchfdUsers"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-user-circle"></i>
                    <span></span>Student Loan Process
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "admin/borrowerRunningsinfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="borrowerRunningsinfo"><i class="fa fa-dot-circle-o"></i> Add Student Bank Ac </a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/borrowerLoanStatus"){?> class="hi-tree-menu" <?php }?>>
                        <a href="borrowerLoanStatus"><i class="fa fa-dot-circle-o"></i> Bank Verified User </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/uploadFdData"){?> class="hi-tree-menu" <?php }?>>
                        <a href="uploadFdData"><i class="fa fa-dot-circle-o"></i> Book FD </a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/fdPaymentDetails"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdPaymentDetails"><i class="fa fa-dot-circle-o"></i> Payment Details </a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/verifyPaymentDetail"){?> class="hi-tree-menu" <?php }?>>
                        <a href="verifyPaymentDetail"><i class="fa fa-dot-circle-o"></i> Verify Payment Details</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/transferFunds"){?> class="hi-tree-menu" <?php }?>>
                        <a href="transferFunds"><i class="fa fa-dot-circle-o"></i> Transfer Funds</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/viewListOfFds"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewListOfFds"><i class="fa fa-dot-circle-o"></i> View List Of FD'S </a>
                    </li>


                       <li <?php if ($basePATH_URL == "admin/searchfdUsers"){?> class="hi-tree-menu" <?php }?>>
                        <a href="searchfdUsers"><i class="fa fa-dot-circle-o"></i> Search FD Types</a>
                    </li>

                </ul>
            </li>




                  <li
                     class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/insertPendingInformation" || $basePATH_URL == "admin/pendingamountUser"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span></span>Lender Pending Amount
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                 <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/insertPendingInformation"){?> class="hi-tree-menu" <?php }?>>
                        <a href="insertPendingInformation"><i class="fa fa-dot-circle-o"></i>Insert Details</a>
                    </li>


                      <li <?php if ($basePATH_URL == "admin/pendingamountUser"){?> class="hi-tree-menu" <?php }?>>
                        <a href="pendingamountUser"><i class="fa fa-dot-circle-o"></i>Pending amount User</a>
                    </li>

                </ul>
            </li>
                 













                  <li
                     class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/fdStatistics" || 
                  $basePATH_URL == "admin/fddownloadInvoice"|| $basePATH_URL == "admin/fdmonthlyloansInfo" || $basePATH_URL == "admin/fdClosedDetails"|| $basePATH_URL == "admin/fdexecutedPayment"  ){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-star"></i>
                    <span></span>FD Statistics 

                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "admin/fdStatistics"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdStatistics"><i class="fa fa-dot-circle-o"></i> Statistics</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/fddownloadInvoice"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fddownloadInvoice"><i class="fa fa-dot-circle-o"></i>Download Invoice </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/fdmonthlyloansInfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdmonthlyloansInfo"><i class="fa fa-dot-circle-o"></i> Monthly Loan Info </a>
                    </li>

                      <li <?php if ($basePATH_URL == "admin/fdexecutedPayment"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdexecutedPayment"><i class="fa fa-dot-circle-o"></i> Fd Executed Payments </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/fdClosedDetails"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdClosedDetails"><i class="fa fa-dot-circle-o"></i> Fd Closed Details </a>
                    </li>



                </ul>
            </li>




            <li
                class="displaySuperAdmin treeview viewMyLoanApplication
              <?php if ($basePATH_URL == "admin/borrowersapplications" || $basePATH_URL == "admin/intrested" || $basePATH_URL == "admin/loanAprroved" || $basePATH_URL == "admin/approved" || $basePATH_URL == "admin/Disbursed" || $basePATH_URL == "admin/ApplicationLevelDisbursed" || $basePATH_URL == "admin/newDisbursed"|| $basePATH_URL == "admin/ViewVanNumber"){?>active menu-open<?php } ?>">



                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Borrower Loan Process &#9888;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "admin/borrowersapplications"){?> class="hi-tree-menu" <?php } ?>><a
                            href="borrowersapplications?getfornotifications=0"><i class="fa fa-circle-o"></i> <span>
                                Borrowers Loan Applications
                            </span></a></li>
                    <li <?php if ($basePATH_URL == "admin/intrested"){?> class="hi-tree-menu" <?php }?>>
                        <a href="intrested"><i class="fa fa-circle-o"></i>Intrested (L1)</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/loanAprroved"){?> class="hi-tree-menu" <?php }?>>
                        <a href="loanAprroved"><i class="fa fa-circle-o"></i>Offer Accepted Users (L2)</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/approved"){?> class="hi-tree-menu" <?php }?>>
                        <a href="approved?getfornotifications=0"><i class="fa fa-circle-o"></i>Approved by Admin(L3)</a>
                    </li>

                    <!--  <li <?php if ($basePATH_URL == "admin/Disbursed"){?>
              class = "hi-tree-menu"
              <?php }?>
              >
              <a href="Disbursed?getfornotifications=0"><i class="fa fa-circle-o"></i> Disbursed(L4)</a>
            </li> -->
                    <li <?php if ($basePATH_URL == "admin/newDisbursed"){?> class="hi-tree-menu" <?php }?>>
                        <a href="newDisbursed?getfornotifications=0"><i class="fa fa-circle-o"></i> New
                            Disbursed(L4)</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/ApplicationLevelDisbursed"){?> class="tree-menu" <?php }?>>
                        <a href="ApplicationLevelDisbursed"><i class="fa fa-circle-o"></i>Deal Level Disbursed(L4)</a>
                    </li>




                    <li <?php if ($basePATH_URL == "admin/ApplicationLevelDisbursed"){?> class="tree-menu" <?php }?>>
                        <a href="ApplicationLevelDisbursed?Applevel=APPLEVEL"><i class="fa fa-dot-circle-o"></i>Disburse
                            Application Level</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/borrowerRunningsinfo"){?> class="noc" <?php }?>>
                        <a href="borrowerRunningsinfo?Nocborrower=NOC"><i class="fa fa-dot-circle-o"></i>Closure </a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/ViewVanNumber"){?> class="active" <?php } ?>>
                        <a href="ViewVanNumber">
                            <i class="fa fa-arrow-circle-right"></i><span>View Van Number</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li
                class="displaySuperAdmin treeview viewMyLoanApplication
          <?php if ($basePATH_URL == "admin/lendersapplications" || $basePATH_URL == "admin/lenderWallettransactions" || $basePATH_URL == "admin/uploadtransactions"|| $basePATH_URL == "admin/lenderreferalinfo"|| $basePATH_URL == "admin/approveReferenceamount" || $basePATH_URL == "admin/editReferenceDeatils" || $basePATH_URL == "admin/editGroupinfo"|| $basePATH_URL == "admin/sumofDealAmountInfo"|| $basePATH_URL == "admin/lenderstatistics"|| $basePATH_URL == "admin/registerLenderUsers"|| $basePATH_URL == "admin/monthlyReferalEarning" ){?>active menu-open<?php } ?>">
                <a href="#">
                    

                    <i class="fa fa-user-circle"></i>
                    <span> LENDERS&#9889;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu displaySuperAdmin">
                    <li <?php if ($basePATH_URL == "admin/lendersapplications"){?> class="active" <?php } ?>><a
                            href="lendersapplications?getfornotifications=0"><i class="fa fa-arrow-circle-right"></i>
                            <span>
                                Lenders Loan Applications</span></a></li>



                            <li <?php if ($basePATH_URL == "admin/registerLenderUsers"){?> class="active" <?php } ?>><a
                            href="registerLenderUsers"><i
                                class="fa fa-arrow-circle-right"></i> <span>
                                Register Lender</span></a></li>



                    <li <?php if ($basePATH_URL == "admin/lenderWallettransactions"){?> class="active" <?php } ?>><a
                            href="lenderWallettransactions?getfornotifications=0"><i
                                class="fa fa-arrow-circle-right"></i> <span>
                                Lender Wallet Trasactions</span></a></li>





                    <li <?php if ($basePATH_URL == "admin/uploadtransactions"){?> class="hi-tree-menu" <?php }?>>
                        <a href="uploadtransactions" class="uploadtransactiondetails"><i
                                class="fa fa-arrow-circle-right"></i>Upload Transaction</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/poolingLendrs"){?> class="hi-tree-menu" <?php }?>>
                        <a href="poolingLendrs" class="poolingLendrs"><i class="fa fa-arrow-circle-right"></i>Pooling
                            Lenders</a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/lenderreferalinfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderreferalinfo" class="lenderreferalinfo"><i
                                class="fa fa-arrow-circle-right"></i>Lender Referee Info</a>
                    </li>


                     <li <?php if ($basePATH_URL == "admin/monthlyReferalEarning"){?> class="hi-tree-menu" <?php }?>>
                        <a href="monthlyReferalEarning" class="monthlyReferalEarning"><i
                                class="fa fa-arrow-circle-right"></i>Monthly Rerefer Earnings</a>
                    </li>


                    <!--   <li <?php if ($basePATH_URL == "admin/approveLenderFee"){?>
                  class = "hi-tree-menu"
                  <?php }?>>
                  <a href="approveLenderFee" class="lenderreferalinfo"><i class="fa fa-arrow-circle-right"></i>Approve Lender Fee</a>
                </li>  -->
                    <li <?php if ($basePATH_URL == "admin/approveReferenceamount"){?> class="hi-tree-menu" <?php }?>>
                        <a href="approveReferenceamount" class="approveReferenceamount"><i
                                class="fa fa-arrow-circle-right"></i>Approve Reference Amount</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/editReferenceDeatils"){?> class="hi-tree-menu" <?php }?>>
                        <a href="editReferenceDeatils" class="editReferenceDeatils"><i
                                class="fa fa-arrow-circle-right"></i>Edit Reference Details</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/editGroupinfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="editGroupinfo"><i class="fa fa-dot-circle-o"></i>Update Lender Group</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin_lenderstatistics"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderstatistics"><i class="fa fa-dot-circle-o"></i>Lender Deal Statistics</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/sumofDealAmountInfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="sumofDealAmountInfo"><i class="fa fa-dot-circle-o"></i>Lender's Participated Amount</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/lendersInAllEquityDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lendersInAllEquityDeals"><i class="fa fa-dot-circle-o"></i>Equity Lenders</a>
                    </li>
                </ul>
            </li>



            <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/displaylenderwithdrawalfundsList"|| $basePATH_URL == "admin/walletToWalletHistory"|| $basePATH_URL == "admin/dealWithdrawRequest"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span> Withdrawal Requests</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">



                    <li <?php if ($basePATH_URL == "admin/dealWithdrawRequest"){?> class="hi-tree-menu" <?php }?>>
                        <a href="dealWithdrawRequest"><i class="fa fa-bell"></i>From Deal</a>
                    </li>



                    <li class="displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/displaylenderwithdrawalfundsList"){?>
                  active
                  <?php } ?>
                  ">
                        <a href="displaylenderwithdrawalfundsList"><i class="fa fa-history" aria-hidden="true"></i>
                            <span>From Wallet</span>
                        </a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/walletToWalletHistory"){?> class="active" <?php } ?>>
                        <a href="walletToWalletHistory"><i class="fa fa-credit-card-alt"></i>
                            <span>Wallet To Wallet </span>
                        </a>
                    </li>

                </ul>
            </li>


            <li
                class="treeview displaySuperAdmin
          <?php if ( $basePATH_URL =="admin/lenderwalletamountdetails" || $basePATH_URL == "admin/lendersemiamount" || $basePATH_URL == "admin/borrowersemiamount" || $basePATH_URL == "admin/addloanowner"|| $basePATH_URL == "admin/getOxyFoundingGroups"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-th"></i> <span> Lenders Wallet Amount</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/checkLenderDashboard"){?> class="hi-tree-menu" <?php }?>>
                        <a href="checkLenderDashboard" class="mywallettransactionslist"><i
                                class="fa fa-circle-o"></i>Check Lender Dashboard</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/lenderwalletamountdetails"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderwalletamountdetails" class="mywallettransactionslist"><i
                                class="fa fa-circle-o"></i>wallet Transactions history</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/lendersemiamount"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lendersemiamount" class="lendersemiamount"><i class="fa fa-circle-o"></i>Lenders EMI
                            Amount Detail</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/borrowersemiamount"){?> class="hi-tree-menu" <?php }?>>
                        <a href="borrowersemiamount" class="lendersemiamount"><i class="fa fa-circle-o"></i>Loan Owners
                            Info</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/addloanowner"){?> class="hi-tree-menu" <?php }?>>
                        <a href="addloanowner" class="addloanowner"><i class="fa fa-circle-o"></i>Add Loan owner</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/getOxyFoundingGroups"){?> class="hi-tree-menu" <?php }?>>
                        <a href="getOxyFoundingGroups" class="getOxyFoundingGroups"><i
                                class="fa fa-circle-o"></i>Lenders wallet</a>
                    </li>
                </ul>
            </li>
            <li
                class="treeview displaySuperAdmin
          <?php if ($basePATH_URL == "admin/runningLoans" || $basePATH_URL == "admin/closedLoans" || $basePATH_URL == "admin/paidBorrower" || $basePATH_URL == "admin/highestpaidborrowers"
          || $basePATH_URL == "admin/lenderRunningsloans"|| $basePATH_URL == "admin/closedLoansByPlatform"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span> Loan Records &#9733;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/runningLoans"){?> class="hi-tree-menu" <?php }?>>
                        <a href="runningLoans"><i class="fa fa-dot-circle-o"></i> Running Loans</a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/closedLoans"){?> class="hi-tree-menu" <?php }?>>
                        <a href="closedLoans"><i class="fa fa-dot-circle-o"></i> Closed Loans</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/closedLoansByPlatform"){?> class="hi-tree-menu" <?php }?>>
                        <a href="closedLoansByPlatform"><i class="fa fa-dot-circle-o"></i> Closed By Platform</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/lenderRunningsloans"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderRunningsloans"><i class="fa fa-dot-circle-o"></i>Lenders Running loans</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/paidBorrower"){?> class="hi-tree-menu" <?php }?>>
                        <a href="paidBorrower"><i class="fa fa-dot-circle-o"></i> Paid Borrowers</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/highestpaidborrowers"){?> class="hi-tree-menu" <?php }?>>
                        <a href="highestpaidborrowers"><i class="fa fa-dot-circle-o"></i> Highest Paid Borrowers</a>
                    </li>

                </ul>
            </li>

            <li
                class="treeview displayPaymentAdmin
              <?php if ( $basePATH_URL == "admin/uploadedStatus" || $basePATH_URL == "admin/ApprovedStatus" ||$basePATH_URL == "admin/NotyetReflected" ||$basePATH_URL == "admin/ThirtyDays"|| $basePATH_URL == "admin/ECSPaymentHistory" || $basePATH_URL == "admin/Uploadfiles"|| $basePATH_URL == "admin/borrowersrecovery" || $basePATH_URL == "admin/TransactionAlerts" || $basePATH_URL == "admin/QrTransactions" || $basePATH_URL == "admin/cicReport"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>PAYMENTS</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "admin/uservalidityfee"){?> class="active" <?php } ?>>
                        <a href="uservalidityfee"><i class="fa fa-circle-o"></i>
                            <span>User Validity Fee </span>
                        </a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/cicReport"){?> class="active" <?php } ?>>
                        <a href="cicReport"><i class="fa fa-money"></i>
                            <span>CIC REPORT</span>
                        </a>
                    </li>




                    <li <?php if ($basePATH_URL == "admin/uploadedStatus"){?> class="active" <?php } ?>>
                        <a href="uploadedStatus?display=UPLPOADED"><i class="fa fa-check-circle"></i>
                            <span>Uploaded Data</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/QrTransactions"){?> class="active" <?php } ?>>
                        <a href="QrTransactions"><i class="fa fa-qrcode"></i>
                            <span>Qr Transactions</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/ApprovedStatus"){?> class="hi-tree-menu" <?php }?>>
                        <a href="ApprovedStatus"><i class="fa fa-check-circle"></i>Approved Data</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/NotyetReflected"){?> class="hi-tree-menu" <?php }?>>
                        <a href="NotyetReflected"><i class="fa fa-check-circle"></i>Not Yet Reflected Data</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/ECSPaymentHistory"){?> class="active" <?php } ?>>
                        <a href="ECSPaymentHistory">
                            <i class="fa fa-arrow-circle-right"></i><span>Monthly Payments</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/ThirtyDays"){?> class="hi-tree-menu" <?php }?>>
                        <a href="ThirtyDays"><i class="fa fa-calendar"></i>Last 30 Days Data</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/TransactionAlerts"){?> class="hi-tree-menu" <?php }?>>
                        <a href="TransactionAlerts"><i class="fa fa-bell"></i>Transaction Alerts</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/Uploadfiles"){?> class="hi-tree-menu" <?php }?>>
                        <a href="Uploadfiles"><i class="fa fa-upload"></i>Upload Files</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/borrowersrecovery"){?> class="hi-tree-menu" <?php }?>>
                        <a href="borrowersrecovery"><i class="fa fa-whatsapp"></i>Whatsapp Campaign</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/readExcelSheet"){?> class="hi-tree-menu" <?php }?>>
                        <a href="readExcelSheet"><i class="fa fa-upload"></i>Campaign/Notifications</a>
                    </li>
                </ul>
            </li>




            <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/userQueryDetails"|| $basePATH_URL == "admin/resolved"|| $basePATH_URL == "admin/closedQuery"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-clipboard"></i>
                    <span>Help Desk</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/userQueryDetails"){?> class="active" <?php } ?>>
                        <a href="userQueryDetails"><i class="fa fa-window-close"></i></i>
                            <span>Unresolved Queries</span>
                        </a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/resolved"){?> class="active" <?php } ?>>
                        <a href="resolved"><i class="fa fa-check"></i></i>
                            <span>Resolved Queries</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/closedQuery"){?> class="active" <?php } ?>>
                        <a href="closedQuery"><i class="fa fa-angle-double-right"></i></i>
                            <span>Cancelled Queries</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li
                class="displaySuperAdmin treeview
                  <?php if ($basePATH_URL == "admin/totalPendingEMI" || $basePATH_URL == "admin/pendingCurrentEMI" || $basePATH_URL == "admin/checkfeatureEMIs" || $basePATH_URL == "admin/eNACHActiveUsers" || $basePATH_URL == "admin/setMinimumAmountForEnach" || $basePATH_URL == "admin/viewminimumEMIusers"){?>active menu-open<?php } ?>">
                <a href="#">
                    <span> EMI Module </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/totalPendingEMI"){?> class="hi-tree-menu" <?php }?>>
                        <a href="totalPendingEMI"><i class="fa fa-circle-o"></i> Total Pending EMIs</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/pendingCurrentEMI"){?> class="hi-tree-menu" <?php }?>>
                        <a href="pendingCurrentEMI"><i class="fa fa-circle-o"></i>Current Month Pending EMIs </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/checkfeatureEMIs"){?> class="hi-tree-menu" <?php }?>>
                        <a href="checkfeatureEMIs"><i class="fa fa-circle-o"></i>Future EMIs</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/eNACHActiveUsers"){?> class="hi-tree-menu" <?php }?>>
                        <a href="eNACHActiveUsers"><i class="fa fa-circle-o"></i>eNACH Active Users</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/setMinimumAmountForEnach"){?> class="hi-tree-menu" <?php }?>>
                        <a href="setMinimumAmountForEnach"><i class="fa fa-circle-o"></i>Set Emi Amount For eNACH</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/viewminimumEMIusers"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewminimumEMIusers"><i class="fa fa-circle-o"></i> Minimum EMI Amount Users</a>
                    </li>

                </ul>
            </li>
            <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/createAgreements" || $basePATH_URL == "admin/lenderParticiaption"){?>active menu-open<?php } ?>">
                <a href="#">
                    <!-- <i class="fa fa-bell"></i> -->
                    <span> Auto Generated &#9733;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/createAgreements"){?> class="hi-tree-menu" <?php }?>>
                        <a href="createAgreements"><i class="fa fa-dot-circle-o"></i>Deal Level Aggrements</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/lenderParticiaption"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderParticiaption"><i class="fa fa-dot-circle-o"></i>Disbursement</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/dealBasedAggrements"){?> class="hi-tree-menu" <?php }?>>
                        <a href="dealBasedAggrements"><i class="fa fa-dot-circle-o"></i>Salaried Base Aggrements</a>
                    </li>
                </ul>
            </li>

            <li
                class="displaySuperAdmin treeview
                  <?php if ($basePATH_URL == "admin/acceptedLoans" || $basePATH_URL == "admin/expiredloans" || $basePATH_URL == "admin/rejectedApplications" || $basePATH_URL == "admin/lendersLoansinfo" || $basePATH_URL == "admin/borrowersLoansinfo" || $basePATH_URL == "admin/cicReport" || $basePATH_URL == "admin/thirtydaybucket" || $basePATH_URL == "admin/sixtydaysbucket" || $basePATH_URL == "admin/ninetydaysbucket" || $basePATH_URL == "admin/ninetyorNPAbuckets"|| $basePATH_URL == "admin/showCollege"|| $basePATH_URL == "admin/sendEmailActivationLink"){?>  active menu-open<?php } ?>">
                <a href="#">

                    
                    <span>SUPER ADMIN</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                 <!--    <li <?php if ($basePATH_URL == "admin/showCollege"){?> class="active" <?php } ?>><a
                            href="showCollege"><i class="fa fa-arrow-circle-right"></i> <span>
                                Show Colleges
                            </span></a></li> -->

                    <li <?php if ($basePATH_URL == "admin/acceptedLoans"){?> class="active" <?php } ?>><a
                            href="acceptedLoans"><i class="fa fa-arrow-circle-right"></i> <span>
                                Accepted Loan Applications
                            </span></a></li>
                    <li <?php if ($basePATH_URL == "admin/expiredloans"){?> class="active" <?php } ?>><a
                            href="expiredloans"><i class="fa fa-arrow-circle-right"></i> <span>
                                Expired Loan Applications
                            </span></a></li>
                    <li <?php if ($basePATH_URL == "admin/rejectedApplications"){?> class="active" <?php } ?>><a
                            href="rejectedApplications"><i class="fa fa-arrow-circle-right"></i> <span>
                                Rejected Loan Applications
                            </span></a></li>

                    <li <?php if ($basePATH_URL == "admin/lendersLoansinfo"){?> class="active" <?php } ?>><a
                            href="lendersLoansinfo"><i class="fa fa-arrow-circle-right"></i> <span>
                                Lenders Loans Info
                            </span></a></li>

                    <li <?php if ($basePATH_URL == "admin/borrowersLoansinfo"){?> class="active" <?php } ?>><a
                            href="borrowersLoansinfo"><i class="fa fa-arrow-circle-right"></i> <span>
                                Borrowers Loans Info
                            </span></a></li>

                    <li <?php if ($basePATH_URL == "admin/cicReport"){?> class="active" <?php } ?>>
                        <a href="#" onclick="cicReport();">
                            <i class="fa fa-arrow-circle-right"></i> <span>CIC Report</span>
                        </a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/thirtydaybucket"){?> class="active" <?php } ?>><a
                            href="thirtydaybucket"><i class="fa fa-arrow-circle-right"></i> <span>
                                30 days bucket
                            </span></a></li>
                    <li <?php if ($basePATH_URL == "admin/sixtydaysbucket"){?> class="active" <?php } ?>><a
                            href="sixtydaysbucket"><i class="fa fa-arrow-circle-right"></i> <span>
                                60 days bucket
                            </span></a></li>

                    <li <?php if ($basePATH_URL == "admin/ninetydaysbucket"){?> class="active" <?php } ?>><a
                            href="ninetydaysbucket"><i class="fa fa-arrow-circle-right"></i> <span>
                                90 days bucket
                            </span></a></li>

                    <li <?php if ($basePATH_URL == "admin/ninetyorNPAbuckets"){?> class="active" <?php } ?>><a
                            href="ninetyorNPAbuckets"><i class="fa fa-arrow-circle-right"></i> <span>
                                91 or NPA buckets
                            </span></a></li>

                               <li <?php if ($basePATH_URL == "admin/sendEmailActivationLink"){?> class="active" <?php } ?>>
                        <a href="sendEmailActivationLink">
                            <i class="fa fa-arrow-circle-right"></i><span>Send Email Activation </span>
                        </a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/removeCredentials"){?> class="active" <?php } ?>>
                        <a href="removeCredentials">
                            <i class="fa fa-arrow-circle-right"></i><span>Update User Details</span>
                        </a>
                    </li>

                    <li class="displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/createUtmforpartnerDealer"){?>
                  active
                  <?php } ?>
                  ">
                        <a href="createUtmforpartnerDealer">
                            <i class="fa fa-flash"></i> <span>P&D UTM</span>
                        </a>
                    </li>

                    <li class="displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/displaylenderAutoinvestlist"){?>
                  active
                  <?php } ?>
                  ">
                        <a href="displaylenderAutoinvestlist">
                           <i class="fa fa-flash"></i>   <span>Lender Auto Invest list</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li <?php if ($basePATH_URL == ""){?> class="active" <?php } ?>><a
                    href="https://www.oxyloans.com/new/userlogin" class="deleteSession">
                    <i class="fa fa-sign-out text-yellow"></i> <span>Sign Out</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<?php 
        } elseif($userType === 'STUDENTADMIN') {
            // Render sidebar content for testadmin
?>
<aside class="main-sidebar">
    <!-- Sidebar content for testadmin -->
    <section>
        <!-- Sidebar content specific to testadmin goes here -->
    </section>
</aside>

<?php 
        } elseif($userType === 'BorrADMIN') {
            // Render sidebar content for testadmin
?>

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
                <p><span class="displayUserName displayAdminType"></span></p>
                <a href="#"><span class="placeUserID"></span></a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>

            <li class="displaySuperAdmin
        <?php if ($basePATH_URL == "admin/dashboard"){?>
        active
        <?php } ?>" ;>
                <a href="dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li
                class="treeview  displaySuperAdmin
        <?php if ($basePATH_URL == "admin/createDeal" || $basePATH_URL == "admin/viewDeals" || $basePATH_URL == "admin/equityDeals" || $basePATH_URL == "admin/escrowDeals"
        || $basePATH_URL == "admin/whatsappNotification"    || $basePATH_URL == "admin/pendingFiles" || $basePATH_URL == "admin/getGroupofLender"|| $basePATH_URL == "admin/lenderparticipateddeal" || $basePATH_URL == "admin/paytmTransactions"|| $basePATH_URL == "admin/salariedDeals" || $basePATH_URL == "admin/selfEmployedDeals"|| $basePATH_URL == "admin/testDeals"|| $basePATH_URL == "admin/offlineInterest"|| $basePATH_URL == "admin/dealNotifications"  || $basePATH_URL == "admin/viewDealTypePayOut"|| $basePATH_URL == "admin/futureDeals"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-bell"></i>
                    <span> Deals &#9733;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/createDeal"){?> class="hi-tree-menu" <?php }?>>
                        <a href="createDeal?id=0"><i class="fa fa-dot-circle-o"></i>Create New Deal</a>
                    </li>

                  
                    <li <?php if ($basePATH_URL == "admin/viewDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewDeals"><i class="fa fa-dot-circle-o"></i>View & Edit Deals</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/equityDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="equityDeals"><i class="fa fa-dot-circle-o"></i>View Equity Deals</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/escrowDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="escrowDeals"><i class="fa fa-dot-circle-o"></i>View Escrow Deals</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/testDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="testDeals"><i class="fa fa-dot-circle-o"></i>View Test Deals</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/salariedDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="salariedDeals"><i class="fa fa-dot-circle-o"></i>View Personal Deals</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/viewDealTypePayOut"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewDealTypePayOut"><i class="fa fa-dot-circle-o"></i>View Deal Payout</a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/pendingFiles"){?> class="hi-tree-menu" <?php }?>>
                        <a href="pendingFiles"><i class="fa fa-money"></i> Pending Files</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/offlineInterest"){?> class="hi-tree-menu" <?php }?>>
                        <a href="offlineInterest"><i class="fa fa-dot-circle-o"></i>Offline Interest</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/dealNotifications"){?> class="hi-tree-menu" <?php }?>>
                        <a href="dealNotifications"><i class="fa fa-dot-circle-o"></i>Deal Notification</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/viewclosedDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewclosedDeals"><i class="fa fa-dot-circle-o"></i>View Closed Deals</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/getGroupofLender"){?> class="hi-tree-menu" <?php }?>>
                        <a href="getGroupofLender"><i class="fa fa-dot-circle-o"></i>Oxy Founding Groups</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/whatsappNotification"){?> class="hi-tree-menu" <?php }?>>
                        <a href="whatsappNotification"><i class="fa fa-dot-circle-o"></i>WhatsApp Notification</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/lenderparticipateddeal"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderparticipateddeal"><i class="fa fa-dot-circle-o"></i> Update Lender
                            Participation</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/equityInvestors"){?> class="hi-tree-menu" <?php }?>>
                        <a href="equityInvestors"><i class="fa fa-dot-circle-o"></i>Equity Investors List</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/paytmTransactions"){?> class="hi-tree-menu" <?php }?>>
                        <a href="paytmTransactions"><i class="fa fa-dot-circle-o"></i>Paytm Nodal</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/runningDealInfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="runningDealInfo"><i class="fa fa-dot-circle-o"></i>Running Deals Info</a>
                    </li>

                    <!--  <li <?php if ($basePATH_URL == "admin/dealWithdrawRequest"){?>
            class = "hi-tree-menu"
            <?php }?>
            >
            <a href="dealWithdrawRequest"><i class="fa fa-bell"></i>Deal Withdrawal Request</a>
          </li> -->

                    <!--  <li <?php if ($basePATH_URL == "admin/closedDeals"){?>
            class = "hi-tree-menu"
            <?php }?>
            >
            <a href="closedLoans"><i class="fa fa-dot-circle-o"></i> Closed Deals</a>
          </li> -->

                </ul>
            </li>

            <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/holdAmountRequest"|| $basePATH_URL == "admin/holdAmountBreakUp"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span> Hold Amount</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "admin/holdAmountRequest"){?> class="hi-tree-menu" <?php }?>>
                        <a href="holdAmountRequest"><i class="fa fa-dot-circle-o"></i> Hold Request </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/holdAmountBreakUp"){?> class="hi-tree-menu" <?php }?>>
                        <a href="holdAmountBreakUp"><i class="fa fa-dot-circle-o"></i> Hold Amount Breakup</a>
                    </li>

                </ul>
            </li>

            <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/borrowerRunningsinfo" || 
                  $basePATH_URL == "admin/borrowerLoanStatus"|| $basePATH_URL == "admin/fdPaymentDetails"|| $basePATH_URL == "admin/uploadFdData"|| $basePATH_URL == "admin/viewListOfFds"|| $basePATH_URL == "admin/verifyPaymentDetail"|| $basePATH_URL == "admin/transferFunds"|| $basePATH_URL == "admin/searchfdUsers"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-user-circle"></i>
                    <span></span>Student Loan Process
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "admin/borrowerRunningsinfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="borrowerRunningsinfo"><i class="fa fa-dot-circle-o"></i> Add Student Bank Ac </a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/borrowerLoanStatus"){?> class="hi-tree-menu" <?php }?>>
                        <a href="borrowerLoanStatus"><i class="fa fa-dot-circle-o"></i> Bank Verified User </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/uploadFdData"){?> class="hi-tree-menu" <?php }?>>
                        <a href="uploadFdData"><i class="fa fa-dot-circle-o"></i> Book FD </a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/fdPaymentDetails"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdPaymentDetails"><i class="fa fa-dot-circle-o"></i> Payment Details </a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/verifyPaymentDetail"){?> class="hi-tree-menu" <?php }?>>
                        <a href="verifyPaymentDetail"><i class="fa fa-dot-circle-o"></i> Verify Payment Details</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/transferFunds"){?> class="hi-tree-menu" <?php }?>>
                        <a href="transferFunds"><i class="fa fa-dot-circle-o"></i> Transfer Funds</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/viewListOfFds"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewListOfFds"><i class="fa fa-dot-circle-o"></i> View List Of FD'S </a>
                    </li>


                       <li <?php if ($basePATH_URL == "admin/searchfdUsers"){?> class="hi-tree-menu" <?php }?>>
                        <a href="searchfdUsers"><i class="fa fa-dot-circle-o"></i> Search FD Types</a>
                    </li>

                </ul>
            </li>




                  <li
                     class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/insertPendingInformation" || $basePATH_URL == "admin/pendingamountUser"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span></span>Lender Pending Amount
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                 <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/insertPendingInformation"){?> class="hi-tree-menu" <?php }?>>
                        <a href="insertPendingInformation"><i class="fa fa-dot-circle-o"></i>Insert Details</a>
                    </li>


                      <li <?php if ($basePATH_URL == "admin/pendingamountUser"){?> class="hi-tree-menu" <?php }?>>
                        <a href="pendingamountUser"><i class="fa fa-dot-circle-o"></i>Pending amount User</a>
                    </li>

                </ul>
            </li>
                 













                  <li
                     class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/fdStatistics" || 
                  $basePATH_URL == "admin/fddownloadInvoice"|| $basePATH_URL == "admin/fdmonthlyloansInfo" || $basePATH_URL == "admin/fdClosedDetails"|| $basePATH_URL == "admin/fdexecutedPayment"  ){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-star"></i>
                    <span></span>FD Statistics 

                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "admin/fdStatistics"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdStatistics"><i class="fa fa-dot-circle-o"></i> Statistics</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/fddownloadInvoice"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fddownloadInvoice"><i class="fa fa-dot-circle-o"></i>Download Invoice </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/fdmonthlyloansInfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdmonthlyloansInfo"><i class="fa fa-dot-circle-o"></i> Monthly Loan Info </a>
                    </li>

                      <li <?php if ($basePATH_URL == "admin/fdexecutedPayment"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdexecutedPayment"><i class="fa fa-dot-circle-o"></i> Fd Executed Payments </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/fdClosedDetails"){?> class="hi-tree-menu" <?php }?>>
                        <a href="fdClosedDetails"><i class="fa fa-dot-circle-o"></i> Fd Closed Details </a>
                    </li>



                </ul>
            </li>




            <li
                class="displaySuperAdmin treeview viewMyLoanApplication
              <?php if ($basePATH_URL == "admin/borrowersapplications" || $basePATH_URL == "admin/intrested" || $basePATH_URL == "admin/loanAprroved" || $basePATH_URL == "admin/approved" || $basePATH_URL == "admin/Disbursed" || $basePATH_URL == "admin/ApplicationLevelDisbursed" || $basePATH_URL == "admin/newDisbursed"|| $basePATH_URL == "admin/ViewVanNumber"){?>active menu-open<?php } ?>">



                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Borrower Loan Process &#9888;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "admin/borrowersapplications"){?> class="hi-tree-menu" <?php } ?>><a
                            href="borrowersapplications?getfornotifications=0"><i class="fa fa-circle-o"></i> <span>
                                Borrowers Loan Applications
                            </span></a></li>
                    <li <?php if ($basePATH_URL == "admin/intrested"){?> class="hi-tree-menu" <?php }?>>
                        <a href="intrested"><i class="fa fa-circle-o"></i>Intrested (L1)</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/loanAprroved"){?> class="hi-tree-menu" <?php }?>>
                        <a href="loanAprroved"><i class="fa fa-circle-o"></i>Offer Accepted Users (L2)</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/approved"){?> class="hi-tree-menu" <?php }?>>
                        <a href="approved?getfornotifications=0"><i class="fa fa-circle-o"></i>Approved by Admin(L3)</a>
                    </li>

                    <!--  <li <?php if ($basePATH_URL == "admin/Disbursed"){?>
              class = "hi-tree-menu"
              <?php }?>
              >
              <a href="Disbursed?getfornotifications=0"><i class="fa fa-circle-o"></i> Disbursed(L4)</a>
            </li> -->
                    <li <?php if ($basePATH_URL == "admin/newDisbursed"){?> class="hi-tree-menu" <?php }?>>
                        <a href="newDisbursed?getfornotifications=0"><i class="fa fa-circle-o"></i> New
                            Disbursed(L4)</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/ApplicationLevelDisbursed"){?> class="tree-menu" <?php }?>>
                        <a href="ApplicationLevelDisbursed"><i class="fa fa-circle-o"></i>Deal Level Disbursed(L4)</a>
                    </li>




                    <li <?php if ($basePATH_URL == "admin/ApplicationLevelDisbursed"){?> class="tree-menu" <?php }?>>
                        <a href="ApplicationLevelDisbursed?Applevel=APPLEVEL"><i class="fa fa-dot-circle-o"></i>Disburse
                            Application Level</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/borrowerRunningsinfo"){?> class="noc" <?php }?>>
                        <a href="borrowerRunningsinfo?Nocborrower=NOC"><i class="fa fa-dot-circle-o"></i>Closure </a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/ViewVanNumber"){?> class="active" <?php } ?>>
                        <a href="ViewVanNumber">
                            <i class="fa fa-arrow-circle-right"></i><span>View Van Number</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li
                class="displaySuperAdmin treeview viewMyLoanApplication
          <?php if ($basePATH_URL == "admin/lendersapplications" || $basePATH_URL == "admin/lenderWallettransactions" || $basePATH_URL == "admin/uploadtransactions"|| $basePATH_URL == "admin/lenderreferalinfo"|| $basePATH_URL == "admin/approveReferenceamount" || $basePATH_URL == "admin/editReferenceDeatils" || $basePATH_URL == "admin/editGroupinfo"|| $basePATH_URL == "admin/sumofDealAmountInfo"|| $basePATH_URL == "admin/lenderstatistics"|| $basePATH_URL == "admin/registerLenderUsers"|| $basePATH_URL == "admin/monthlyReferalEarning" ){?>active menu-open<?php } ?>">
                <a href="#">
                    

                    <i class="fa fa-user-circle"></i>
                    <span> LENDERS&#9889;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu displaySuperAdmin">
                    <li <?php if ($basePATH_URL == "admin/lendersapplications"){?> class="active" <?php } ?>><a
                            href="lendersapplications?getfornotifications=0"><i class="fa fa-arrow-circle-right"></i>
                            <span>
                                Lenders Loan Applications</span></a></li>



                            <li <?php if ($basePATH_URL == "admin/registerLenderUsers"){?> class="active" <?php } ?>><a
                            href="registerLenderUsers"><i
                                class="fa fa-arrow-circle-right"></i> <span>
                                Register Lender</span></a></li>



                    <li <?php if ($basePATH_URL == "admin/lenderWallettransactions"){?> class="active" <?php } ?>><a
                            href="lenderWallettransactions?getfornotifications=0"><i
                                class="fa fa-arrow-circle-right"></i> <span>
                                Lender Wallet Trasactions</span></a></li>





                    <li <?php if ($basePATH_URL == "admin/uploadtransactions"){?> class="hi-tree-menu" <?php }?>>
                        <a href="uploadtransactions" class="uploadtransactiondetails"><i
                                class="fa fa-arrow-circle-right"></i>Upload Transaction</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/poolingLendrs"){?> class="hi-tree-menu" <?php }?>>
                        <a href="poolingLendrs" class="poolingLendrs"><i class="fa fa-arrow-circle-right"></i>Pooling
                            Lenders</a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/lenderreferalinfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderreferalinfo" class="lenderreferalinfo"><i
                                class="fa fa-arrow-circle-right"></i>Lender Referee Info</a>
                    </li>


                     <li <?php if ($basePATH_URL == "admin/monthlyReferalEarning"){?> class="hi-tree-menu" <?php }?>>
                        <a href="monthlyReferalEarning" class="monthlyReferalEarning"><i
                                class="fa fa-arrow-circle-right"></i>Monthly Rerefer Earnings</a>
                    </li>


                    <!--   <li <?php if ($basePATH_URL == "admin/approveLenderFee"){?>
                  class = "hi-tree-menu"
                  <?php }?>>
                  <a href="approveLenderFee" class="lenderreferalinfo"><i class="fa fa-arrow-circle-right"></i>Approve Lender Fee</a>
                </li>  -->
                    <li <?php if ($basePATH_URL == "admin/approveReferenceamount"){?> class="hi-tree-menu" <?php }?>>
                        <a href="approveReferenceamount" class="approveReferenceamount"><i
                                class="fa fa-arrow-circle-right"></i>Approve Reference Amount</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/editReferenceDeatils"){?> class="hi-tree-menu" <?php }?>>
                        <a href="editReferenceDeatils" class="editReferenceDeatils"><i
                                class="fa fa-arrow-circle-right"></i>Edit Reference Details</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/editGroupinfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="editGroupinfo"><i class="fa fa-dot-circle-o"></i>Update Lender Group</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin_lenderstatistics"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderstatistics"><i class="fa fa-dot-circle-o"></i>Lender Deal Statistics</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/sumofDealAmountInfo"){?> class="hi-tree-menu" <?php }?>>
                        <a href="sumofDealAmountInfo"><i class="fa fa-dot-circle-o"></i>Lender's Participated Amount</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/lendersInAllEquityDeals"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lendersInAllEquityDeals"><i class="fa fa-dot-circle-o"></i>Equity Lenders</a>
                    </li>
                </ul>
            </li>



            <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/displaylenderwithdrawalfundsList"|| $basePATH_URL == "admin/walletToWalletHistory"|| $basePATH_URL == "admin/dealWithdrawRequest"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span> Withdrawal Requests</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">



                    <li <?php if ($basePATH_URL == "admin/dealWithdrawRequest"){?> class="hi-tree-menu" <?php }?>>
                        <a href="dealWithdrawRequest"><i class="fa fa-bell"></i>From Deal</a>
                    </li>



                    <li class="displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/displaylenderwithdrawalfundsList"){?>
                  active
                  <?php } ?>
                  ">
                        <a href="displaylenderwithdrawalfundsList"><i class="fa fa-history" aria-hidden="true"></i>
                            <span>From Wallet</span>
                        </a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/walletToWalletHistory"){?> class="active" <?php } ?>>
                        <a href="walletToWalletHistory"><i class="fa fa-credit-card-alt"></i>
                            <span>Wallet To Wallet </span>
                        </a>
                    </li>

                </ul>
            </li>


            <li
                class="treeview displaySuperAdmin
          <?php if ( $basePATH_URL =="admin/lenderwalletamountdetails" || $basePATH_URL == "admin/lendersemiamount" || $basePATH_URL == "admin/borrowersemiamount" || $basePATH_URL == "admin/addloanowner"|| $basePATH_URL == "admin/getOxyFoundingGroups"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-th"></i> <span> Lenders Wallet Amount</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/checkLenderDashboard"){?> class="hi-tree-menu" <?php }?>>
                        <a href="checkLenderDashboard" class="mywallettransactionslist"><i
                                class="fa fa-circle-o"></i>Check Lender Dashboard</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/lenderwalletamountdetails"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderwalletamountdetails" class="mywallettransactionslist"><i
                                class="fa fa-circle-o"></i>wallet Transactions history</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/lendersemiamount"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lendersemiamount" class="lendersemiamount"><i class="fa fa-circle-o"></i>Lenders EMI
                            Amount Detail</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/borrowersemiamount"){?> class="hi-tree-menu" <?php }?>>
                        <a href="borrowersemiamount" class="lendersemiamount"><i class="fa fa-circle-o"></i>Loan Owners
                            Info</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/addloanowner"){?> class="hi-tree-menu" <?php }?>>
                        <a href="addloanowner" class="addloanowner"><i class="fa fa-circle-o"></i>Add Loan owner</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/getOxyFoundingGroups"){?> class="hi-tree-menu" <?php }?>>
                        <a href="getOxyFoundingGroups" class="getOxyFoundingGroups"><i
                                class="fa fa-circle-o"></i>Lenders wallet</a>
                    </li>
                </ul>
            </li>
            <li
                class="treeview displaySuperAdmin
          <?php if ($basePATH_URL == "admin/runningLoans" || $basePATH_URL == "admin/closedLoans" || $basePATH_URL == "admin/paidBorrower" || $basePATH_URL == "admin/highestpaidborrowers"
          || $basePATH_URL == "admin/lenderRunningsloans"|| $basePATH_URL == "admin/closedLoansByPlatform"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span> Loan Records &#9733;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/runningLoans"){?> class="hi-tree-menu" <?php }?>>
                        <a href="runningLoans"><i class="fa fa-dot-circle-o"></i> Running Loans</a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/closedLoans"){?> class="hi-tree-menu" <?php }?>>
                        <a href="closedLoans"><i class="fa fa-dot-circle-o"></i> Closed Loans</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/closedLoansByPlatform"){?> class="hi-tree-menu" <?php }?>>
                        <a href="closedLoansByPlatform"><i class="fa fa-dot-circle-o"></i> Closed By Platform</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/lenderRunningsloans"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderRunningsloans"><i class="fa fa-dot-circle-o"></i>Lenders Running loans</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/paidBorrower"){?> class="hi-tree-menu" <?php }?>>
                        <a href="paidBorrower"><i class="fa fa-dot-circle-o"></i> Paid Borrowers</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/highestpaidborrowers"){?> class="hi-tree-menu" <?php }?>>
                        <a href="highestpaidborrowers"><i class="fa fa-dot-circle-o"></i> Highest Paid Borrowers</a>
                    </li>

                </ul>
            </li>

            <li
                class="treeview displayPaymentAdmin
              <?php if ( $basePATH_URL == "admin/uploadedStatus" || $basePATH_URL == "admin/ApprovedStatus" ||$basePATH_URL == "admin/NotyetReflected" ||$basePATH_URL == "admin/ThirtyDays"|| $basePATH_URL == "admin/ECSPaymentHistory" || $basePATH_URL == "admin/Uploadfiles"|| $basePATH_URL == "admin/borrowersrecovery" || $basePATH_URL == "admin/TransactionAlerts" || $basePATH_URL == "admin/QrTransactions" || $basePATH_URL == "admin/cicReport"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>PAYMENTS</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "admin/uservalidityfee"){?> class="active" <?php } ?>>
                        <a href="uservalidityfee"><i class="fa fa-circle-o"></i>
                            <span>User Validity Fee </span>
                        </a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/cicReport"){?> class="active" <?php } ?>>
                        <a href="cicReport"><i class="fa fa-money"></i>
                            <span>CIC REPORT</span>
                        </a>
                    </li>




                    <li <?php if ($basePATH_URL == "admin/uploadedStatus"){?> class="active" <?php } ?>>
                        <a href="uploadedStatus?display=UPLPOADED"><i class="fa fa-check-circle"></i>
                            <span>Uploaded Data</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/QrTransactions"){?> class="active" <?php } ?>>
                        <a href="QrTransactions"><i class="fa fa-qrcode"></i>
                            <span>Qr Transactions</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/ApprovedStatus"){?> class="hi-tree-menu" <?php }?>>
                        <a href="ApprovedStatus"><i class="fa fa-check-circle"></i>Approved Data</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/NotyetReflected"){?> class="hi-tree-menu" <?php }?>>
                        <a href="NotyetReflected"><i class="fa fa-check-circle"></i>Not Yet Reflected Data</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/ECSPaymentHistory"){?> class="active" <?php } ?>>
                        <a href="ECSPaymentHistory">
                            <i class="fa fa-arrow-circle-right"></i><span>Monthly Payments</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/ThirtyDays"){?> class="hi-tree-menu" <?php }?>>
                        <a href="ThirtyDays"><i class="fa fa-calendar"></i>Last 30 Days Data</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/TransactionAlerts"){?> class="hi-tree-menu" <?php }?>>
                        <a href="TransactionAlerts"><i class="fa fa-bell"></i>Transaction Alerts</a>
                    </li>


                    <li <?php if ($basePATH_URL == "admin/Uploadfiles"){?> class="hi-tree-menu" <?php }?>>
                        <a href="Uploadfiles"><i class="fa fa-upload"></i>Upload Files</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/borrowersrecovery"){?> class="hi-tree-menu" <?php }?>>
                        <a href="borrowersrecovery"><i class="fa fa-whatsapp"></i>Whatsapp Campaign</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/readExcelSheet"){?> class="hi-tree-menu" <?php }?>>
                        <a href="readExcelSheet"><i class="fa fa-upload"></i>Campaign/Notifications</a>
                    </li>
                </ul>
            </li>




            <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/userQueryDetails"|| $basePATH_URL == "admin/resolved"|| $basePATH_URL == "admin/closedQuery"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-clipboard"></i>
                    <span>Help Desk</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/userQueryDetails"){?> class="active" <?php } ?>>
                        <a href="userQueryDetails"><i class="fa fa-window-close"></i></i>
                            <span>Unresolved Queries</span>
                        </a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/resolved"){?> class="active" <?php } ?>>
                        <a href="resolved"><i class="fa fa-check"></i></i>
                            <span>Resolved Queries</span>
                        </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/closedQuery"){?> class="active" <?php } ?>>
                        <a href="closedQuery"><i class="fa fa-angle-double-right"></i></i>
                            <span>Cancelled Queries</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li
                class="displaySuperAdmin treeview
                  <?php if ($basePATH_URL == "admin/totalPendingEMI" || $basePATH_URL == "admin/pendingCurrentEMI" || $basePATH_URL == "admin/checkfeatureEMIs" || $basePATH_URL == "admin/eNACHActiveUsers" || $basePATH_URL == "admin/setMinimumAmountForEnach" || $basePATH_URL == "admin/viewminimumEMIusers"){?>active menu-open<?php } ?>">
                <a href="#">
                    <span> EMI Module </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/totalPendingEMI"){?> class="hi-tree-menu" <?php }?>>
                        <a href="totalPendingEMI"><i class="fa fa-circle-o"></i> Total Pending EMIs</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/pendingCurrentEMI"){?> class="hi-tree-menu" <?php }?>>
                        <a href="pendingCurrentEMI"><i class="fa fa-circle-o"></i>Current Month Pending EMIs </a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/checkfeatureEMIs"){?> class="hi-tree-menu" <?php }?>>
                        <a href="checkfeatureEMIs"><i class="fa fa-circle-o"></i>Future EMIs</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/eNACHActiveUsers"){?> class="hi-tree-menu" <?php }?>>
                        <a href="eNACHActiveUsers"><i class="fa fa-circle-o"></i>eNACH Active Users</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/setMinimumAmountForEnach"){?> class="hi-tree-menu" <?php }?>>
                        <a href="setMinimumAmountForEnach"><i class="fa fa-circle-o"></i>Set Emi Amount For eNACH</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/viewminimumEMIusers"){?> class="hi-tree-menu" <?php }?>>
                        <a href="viewminimumEMIusers"><i class="fa fa-circle-o"></i> Minimum EMI Amount Users</a>
                    </li>

                </ul>
            </li>
            <li
                class="treeview displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/createAgreements" || $basePATH_URL == "admin/lenderParticiaption"){?>active menu-open<?php } ?>">
                <a href="#">
                    <!-- <i class="fa fa-bell"></i> -->
                    <span> Auto Generated &#9733;</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($basePATH_URL == "admin/createAgreements"){?> class="hi-tree-menu" <?php }?>>
                        <a href="createAgreements"><i class="fa fa-dot-circle-o"></i>Deal Level Aggrements</a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/lenderParticiaption"){?> class="hi-tree-menu" <?php }?>>
                        <a href="lenderParticiaption"><i class="fa fa-dot-circle-o"></i>Disbursement</a>
                    </li>

                    <li <?php if ($basePATH_URL == "admin/dealBasedAggrements"){?> class="hi-tree-menu" <?php }?>>
                        <a href="dealBasedAggrements"><i class="fa fa-dot-circle-o"></i>Salaried Base Aggrements</a>
                    </li>
                </ul>
            </li>

            <li
                class="displaySuperAdmin treeview
                  <?php if ($basePATH_URL == "admin/acceptedLoans" || $basePATH_URL == "admin/expiredloans" || $basePATH_URL == "admin/rejectedApplications" || $basePATH_URL == "admin/lendersLoansinfo" || $basePATH_URL == "admin/borrowersLoansinfo" || $basePATH_URL == "admin/cicReport" || $basePATH_URL == "admin/thirtydaybucket" || $basePATH_URL == "admin/sixtydaysbucket" || $basePATH_URL == "admin/ninetydaysbucket" || $basePATH_URL == "admin/ninetyorNPAbuckets"|| $basePATH_URL == "admin/showCollege"|| $basePATH_URL == "admin/sendEmailActivationLink"){?>  active menu-open<?php } ?>">
                <a href="#">

                    
                    <span>SUPER ADMIN</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                 <!--    <li <?php if ($basePATH_URL == "admin/showCollege"){?> class="active" <?php } ?>><a
                            href="showCollege"><i class="fa fa-arrow-circle-right"></i> <span>
                                Show Colleges
                            </span></a></li> -->

                    <li <?php if ($basePATH_URL == "admin/acceptedLoans"){?> class="active" <?php } ?>><a
                            href="acceptedLoans"><i class="fa fa-arrow-circle-right"></i> <span>
                                Accepted Loan Applications
                            </span></a></li>
                    <li <?php if ($basePATH_URL == "admin/expiredloans"){?> class="active" <?php } ?>><a
                            href="expiredloans"><i class="fa fa-arrow-circle-right"></i> <span>
                                Expired Loan Applications
                            </span></a></li>
                    <li <?php if ($basePATH_URL == "admin/rejectedApplications"){?> class="active" <?php } ?>><a
                            href="rejectedApplications"><i class="fa fa-arrow-circle-right"></i> <span>
                                Rejected Loan Applications
                            </span></a></li>

                    <li <?php if ($basePATH_URL == "admin/lendersLoansinfo"){?> class="active" <?php } ?>><a
                            href="lendersLoansinfo"><i class="fa fa-arrow-circle-right"></i> <span>
                                Lenders Loans Info
                            </span></a></li>

                    <li <?php if ($basePATH_URL == "admin/borrowersLoansinfo"){?> class="active" <?php } ?>><a
                            href="borrowersLoansinfo"><i class="fa fa-arrow-circle-right"></i> <span>
                                Borrowers Loans Info
                            </span></a></li>

                    <li <?php if ($basePATH_URL == "admin/cicReport"){?> class="active" <?php } ?>>
                        <a href="#" onclick="cicReport();">
                            <i class="fa fa-arrow-circle-right"></i> <span>CIC Report</span>
                        </a>
                    </li>
                    <li <?php if ($basePATH_URL == "admin/thirtydaybucket"){?> class="active" <?php } ?>><a
                            href="thirtydaybucket"><i class="fa fa-arrow-circle-right"></i> <span>
                                30 days bucket
                            </span></a></li>
                    <li <?php if ($basePATH_URL == "admin/sixtydaysbucket"){?> class="active" <?php } ?>><a
                            href="sixtydaysbucket"><i class="fa fa-arrow-circle-right"></i> <span>
                                60 days bucket
                            </span></a></li>

                    <li <?php if ($basePATH_URL == "admin/ninetydaysbucket"){?> class="active" <?php } ?>><a
                            href="ninetydaysbucket"><i class="fa fa-arrow-circle-right"></i> <span>
                                90 days bucket
                            </span></a></li>

                    <li <?php if ($basePATH_URL == "admin/ninetyorNPAbuckets"){?> class="active" <?php } ?>><a
                            href="ninetyorNPAbuckets"><i class="fa fa-arrow-circle-right"></i> <span>
                                91 or NPA buckets
                            </span></a></li>

                               <li <?php if ($basePATH_URL == "admin/sendEmailActivationLink"){?> class="active" <?php } ?>>
                        <a href="sendEmailActivationLink">
                            <i class="fa fa-arrow-circle-right"></i><span>Send Email Activation </span>
                        </a>
                    </li>



                    <li <?php if ($basePATH_URL == "admin/removeCredentials"){?> class="active" <?php } ?>>
                        <a href="removeCredentials">
                            <i class="fa fa-arrow-circle-right"></i><span>Update User Details</span>
                        </a>
                    </li>

                    <li class="displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/createUtmforpartnerDealer"){?>
                  active
                  <?php } ?>
                  ">
                        <a href="createUtmforpartnerDealer">
                            <i class="fa fa-flash"></i> <span>P&D UTM</span>
                        </a>
                    </li>

                    <li class="displaySuperAdmin
                  <?php if ($basePATH_URL == "admin/displaylenderAutoinvestlist"){?>
                  active
                  <?php } ?>
                  ">
                        <a href="displaylenderAutoinvestlist">
                           <i class="fa fa-flash"></i>   <span>Lender Auto Invest list</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li <?php if ($basePATH_URL == ""){?> class="active" <?php } ?>><a
                    href="https://www.oxyloans.com/new/userlogin" class="deleteSession">
                    <i class="fa fa-sign-out text-yellow"></i> <span>Sign Out</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<?php 
        } else {

            echo "Invalid user type: $userType";
        }
    } else {

        echo "User type is not set in the session. Default behavior can be applied here.";
      
    }
?>   










              




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