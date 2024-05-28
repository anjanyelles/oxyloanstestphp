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
                <p> <span class="displayUserName"></span></p>
                <a href="#"><span class="placeUserID"></span></a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header header-BorrowerDes">
                Loan Eligibility:- <span class="loanEligilibilityAmount"></span>
                <i class="glyphicon glyphicon-info-sign myinfoofRefeee"
                    title="Once a referee joins OxyLoans using the referral link, the borrower loan eligibility is INR 1000. If 10 referees join OxyLoans using the referral link, the borrower loan eligibility is INR 10000."></i>
            </li>
            <li <?php if ($basePATH_URL == "borrowerDashboard"){?> class="active" <?php } ?>>
                <a href="borrowerDashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <!--    <li
            <?php if ($basePATH_URL == "creditReportInfo" || $basePATH_URL == "creditreportview"){?>
              class="active"
            <?php } ?> id="experianlistid"
        >
          <a id="experianid" href="javascript:void(0)">
            <i class="fa fa-credit-card"></i> <span>Get Your Credit Report</span>
          </a>
        </li> -->

            <li <?php if ($basePATH_URL == "borrower_profilePage"){?> class="active" <?php } ?>>
                <a href="borrower_profilePage">
                    <i class="fa fa-user-circle"></i> <span>Profile Details</span>
                </a>
            </li>



            <!--Chnages by livin mandeva Starts
        <!--Regarding Oxy Trade Starts On 13-11-2020-->

            <!-- <li class="treeview <?php if ($basePATH_URL == "borrowervanaccountdetails" || $basePATH_URL == "addbeneficiary"
         || $basePATH_URL == "viewbeneficiaries"){?>active menu-open<?php } ?>" id="oxyTradeLi" style="display:none;">
           <a href="#">
            <i class="fa fa-th"></i> <span>OxyTrade Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($basePATH_URL == "borrowervanaccountdetails"){?>
                class = "hi-tree-menu"
                <?php }?> class="getborrowervannumber"
            >
              <a href="borrowervanaccountdetails"><i class="fa fa-circle-o"></i>My Van Account</a>
            </li>

            <li <?php if ($basePATH_URL == "addbeneficiary"){?>
                class = "hi-tree-menu"
                <?php }?>
            >
              <a href="addbeneficiary"><i class="fa fa-circle-o"></i>Add Beneficiary</a>
            </li>

            <li <?php if ($basePATH_URL == "viewbeneficiaries"){?>
                class = "hi-tree-menu"
                <?php }?>
            >
              <a href="viewbeneficiaries"><i class="fa fa-circle-o"></i>Transfer To Be Beneficiary</a>
            </li>
          </ul>
        </li> -->


            <!--Regarding Oxy Trade Ends On 13-11-2020-->
            <!--Chnages by livin mandeva Ends -->

            <!-- <li
            <?php if ($basePATH_URL == "borrowerNoofLoanRequests"){?>
              class="active"
            <?php } ?>
        >
          <a href="borrowerNoofLoanRequests">
            <i class="fa fa-th"></i> <span>My Loan Requests</span>
          </a>
        </li> -->



            <!--  <li class="treeview 
         <?php if ($basePATH_URL == "borrowerpersonalinfo" || $basePATH_URL == "borrowerprofessionalDetails" || $basePATH_URL == "borroweraddress" || $basePATH_URL == "borrowerfinancialinfo" || $basePATH_URL == "borrowerbankdetails"){?>active menu-open<?php } ?>"
         >
            <a href="#"><i class="fa fa-user-circle"></i></i> <span>My Profile</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
              <ul class="treeview-menu">
                  
                  <li <?php if ($basePATH_URL == "borrowerpersonalinfo"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                      ><a href="borrowerpersonalinfo">Personal Details</a></li>
                  <li <?php if ($basePATH_URL == "borrowerprofessionalDetails"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                      > <a href="borrowerprofessionalDetails">Professional Details</a></li>
                  <li <?php if ($basePATH_URL == "borroweraddress"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                       ><a href="borroweraddress">Address Details</a></li>
                  <li <?php if ($basePATH_URL == "borrowerfinancialinfo"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                      ><a href="borrowerfinancialinfo">Financial Details</a></li>
                  <li <?php if ($basePATH_URL == "borrowerbankdetails"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                      ><a href="borrowerbankdetails">Bank Details</a></li>
              </ul>
        </li> -->

            <!--  <li <?php if ($basePATH_URL == "borroweruserkyc"){?>
              class="active"
            <?php } ?>
            >
          <a href="borroweruserkyc">
            <i class="fa fa-cloud-upload"></i>
            <span>Upload Your KYC</span>
          </a>
        </li> 



          <li
           <?php if ($basePATH_URL == "borroweremicalculator"){?>
              class="active"
            <?php } ?> >
            <a href="borroweremicalculator"><i class="fa fa-calculator"></i> <span> EMI  Calculator</span></a>
        </li> -->

            <li
                class="treeview <?php if ($basePATH_URL == "borrowerraisealoanrequest" || $basePATH_URL == "borrowerresponsetomyrequest" || $basePATH_URL == "borroweragreedloans" || $basePATH_URL == "borroweracceptedrequests" || $basePATH_URL == "borrowerrejectedrequests" || $basePATH_URL == "borrowerresponsestoMyrequests"  || $basePATH_URL == "myrunningbLoans"  || $basePATH_URL == "myrunningboffers" || $basePATH_URL == "eMandate" ||
        $basePATH_URL =="borrowerExpiredLoans" ||  $basePATH_URL =="borrowerRejectedloans"||  $basePATH_URL =="borrowerAcceptedloans" || $basePATH_URL =="viewMyloanApplications"|| $basePATH_URL =="borroweragreedloan"|| $basePATH_URL =="applicationEmandate"){?>active menu-open<?php } ?>">

                <a href="#">
                    <i class="fa fa-th"></i> <span>My Borrowings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu" id="zagglelist">

                    <li <?php if ($basePATH_URL == "myrunningbLoans"){?> class="hi-tree-menu" <?php }?>>
                        <a href="myrunningbLoans"><i class="fa fa-circle-o"></i>Running Loans</a>
                    </li>


                    <li <?php if ($basePATH_URL == "viewMyloanApplications"){?> class="hi-tree-menu" <?php } ?>>
                        <a href="viewMyloanApplications"><i class="fa fa-circle-o"></i>My Loan Applications</a>
                    </li>





                    <!--  <li <?php if ($basePATH_URL == "myrunningboffers"){?>
                class = "hi-tree-menu"
                <?php }?>
            >
              <a href="myrunningboffers"><i class="fa fa-circle-o"></i> Requests Sent</a>
            </li> 

            <li <?php if ($basePATH_URL == "borrowerresponsestoMyrequests"){?>
                  class = "hi-tree-menu"
                <?php }?>
            >
                <a href="borrowerresponsestoMyrequests?appNumber=0" class="viewLendersOffers"><i class="fa fa-circle-o"></i> Responses</a>
            </li> -->

                    <!--   <li <?php if ($basePATH_URL == "borroweragreedloans"){?>
                        class = "hi-tree-menu"
                      <?php }?> 
                      ><a href="borroweragreedloans"><i class="fa fa-circle-o"></i>Agreed Loans</a>
            </li> -->


                    <li <?php if ($basePATH_URL == "borroweragreedloan"){?>
                        class="hi-tree-menu applicationLevelSideMenu" <?php }?>><a href="borroweragreedloan"><i
                                class="fa fa-circle-o"></i>Agreed loans</a>
                    </li>

                    <!--  <li <?php if ($basePATH_URL == "paymentHistory"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                      ><a href="paymentHistory"><i class="fa fa-circle-o"></i> Payment History</a>
            </li> -->
                    <!-- 
			       <li <?php if ($basePATH_URL == "eMandate"){?>
                        class = "hi-tree-menu"
                      <?php }?> 
                      ><a href="eMandate"><i class="fa fa-circle-o"></i>eNACH</a>
            </li> -->


                    <li <?php if ($basePATH_URL == "applicationEmandate"){?> class="hi-tree-menu applicationLevel"
                        <?php }?>><a href="applicationEmandate"><i class="fa fa-circle-o"></i>Enach</a>
                    </li>



                    <!--   <li <?php if ($basePATH_URL == "borrowerAcceptedloans"){?> class="hi-tree-menu" <?php } ?>>
                        <a href="borrowerAcceptedloans"><i class="fa fa-circle-o"></i>Accepted loans</a>
                    </li>
 -->

                    <!--     <li  <?php if ($basePATH_URL == "borrowerRejectedloans"){?>
              class="hi-tree-menu"
            <?php } ?>    
        >
        <a href="borrowerRejectedloans"><i class="fa fa-circle-o"></i>Rejected loans</a>
      </li> -->

                    <!--  <li <?php if ($basePATH_URL == "paymentHistory"){?>
              class="hi-tree-menu"
            <?php } ?>  
        >
        <a href="paymentHistory"><i class="fa fa-circle-o"></i>Payment History</a>
      </li> -->


                    <!--      <li <?php if ($basePATH_URL == "borrowerExpiredLoans"){?> class="hi-tree-menu" <?php } ?>>
                        <a href="borrowerExpiredLoans"><i class="fa fa-circle-o"></i>Expired loans</a>
                    </li>
 -->



                    <!--<li class="active"><a href="loanrequests"><i class="fa fa-circle-o"></i> Loan Requests</a></li>-->
                    <!--
              <li <?php if ($basePATH_URL == "borrowerraisealoanrequest"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                      ><a href="borrowerraisealoanrequest"><i class="fa fa-circle-o"></i> Raise a loan request</a></li>

              <li <?php if ($basePATH_URL == "borrowerresponsetomyrequest"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                      ><a href="borrowerresponsetomyrequest"><i class="fa fa-circle-o"></i> My Loan Requests</a></li>

              <li <?php if ($basePATH_URL == "borrowerresponsestoMyrequests"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                      ><a href="borrowerresponsetomyrequest" class="viewLendersOffers"><i class="fa fa-circle-o"></i> Responses to My Requests</a></li>                      
              
            
              <li <?php if ($basePATH_URL == "borroweracceptedrequests"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                      ><a href="borroweracceptedrequests"><i class="fa fa-circle-o"></i> Accepted requests</a></li>
              <li <?php if ($basePATH_URL == "borrowerrejectedrequests"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                      ><a href="borrowerrejectedrequests"><i class="fa fa-circle-o"></i> Rejected requests</a></li>
              
               <li <?php if ($basePATH_URL == "borroweragreedloans"){?>
                        class = "hi-tree-menu"
                      <?php }?>
                      ><a href="borroweragreedloans"><i class="fa fa-circle-o"></i> Agreed Loans</a></li>
                    -->
                </ul>
            </li>

            <li <?php if ($basePATH_URL == "loanlistings"){?> class="active" <?php } ?>><a href="loanlistings"><i
                        class="fa fa-th-list text-aqua"></i> <span>Loan Listings</span></a></li>

            <li
                class="treeview <?php if ($basePATH_URL == "paltformFeeCollection" || $basePATH_URL == "myRunningLoansforEMI" || $basePATH_URL == "paymentsuccess" || $basePATH_URL == "paymentfailure" || $basePATH_URL == "onlinePayment" || $basePATH_URL == "borrowerFeePayment" || $basePATH_URL == "borrowerFeeOnlinePayment" || $basePATH_URL == "borrowerFeepaymentSuccess"|| $basePATH_URL == "applicationpaltformFeeCollection"){?>active menu-open<?php } ?>">

                <a href="#">
                    <i class="fa fa-credit-card"></i> <span>Payments</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">

                    <!-- <li <?php if ($basePATH_URL == "paltformFeeCollection"){?>
                class = "hi-tree-menu"
                <?php }?>
            >
              <a href="paltformFeeCollection"><i class="fa fa-circle-o"></i>Pay Paltform Fee</a>
            </li>-->

                    <li <?php if ($basePATH_URL == "myRunningLoansforEMI" || $basePATH_URL == "paymentsuccess" || $basePATH_URL == "paymentfailure" || $basePATH_URL == "onlinePayment"){?>
                        class="hi-tree-menu" <?php }?>>
                        <a href="myRunningLoansforEMI"><i class="fa fa-circle-o"></i>Pay EMI</a>
                    </li>


                    <!--      <li <?php if ($basePATH_URL == "applicationpaltformFeeCollection"){?>
                class = "hi-tree-menu"
                <?php }?>
            >
              <a href="applicationpaltformFeeCollection"><i class="fa fa-circle-o"></i>OVERALL EMI</a>
            </li> -->



                    <!-- <li <?php if ($basePATH_URL == "borrowerFeePayment" || $basePATH_URL == "borrowerFeeOnlinePayment" || $basePATH_URL == "borrowerFeepaymentSuccess"){?>
                class = "hi-tree-menu"
                <?php }?>
            >              
            <a href="borrowerFeePayment"><i class="fa fa-circle-o"></i>Fee Payment</a>
            </li> -->


                </ul>
            </li>

            <li
                class="treeview 
        <?php if ($basePATH_URL == "breferafriend"|| $basePATH_URL == "bdisplayingReferrerInfo" || $basePATH_URL == "brefereeRegisteredInfo"
        || $basePATH_URL == "loaneligibilitybyreferring" || $basePATH_URL == "borrowerContacts"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-globe"></i> <span>My Network</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "breferafriend"){?> class="active" <?php } ?>>
                        <a href="breferafriend" data-id="" data-Name="" class="addIdtoURL updateRefURL"><i
                                class="fa fa-user-plus"></i> <span>Refer a Friend </span></a>
                    </li>
                    <li <?php if ($basePATH_URL == "bdisplayingReferrerInfo"){?> class="active" <?php } ?>>
                        <a href="bdisplayingReferrerInfo" data-id="" data-Name="" class="addIdtoURL updateInfoUrl"><i
                                class="fa fa-plus"></i> <span>Referral Status </span></a>

                    </li>

                    <li <?php if ($basePATH_URL == "borrowerContacts"){?> class="active" <?php } ?>>
                        <a href="borrowerContacts" data-id="" data-Name="" class="addIdtoURL updateInfoUrl"><i
                                class="fa fa-plus"></i> <span>My contacts</span></a>

                    </li>
                    <!-- 
           <li
           <?php if ($basePATH_URL == "borrowerMappedUsers"){?>
              class="active"
            <?php } ?> >
            <a href="borrowerMappedUsers" data-id="" data-Name="" class="addIdtoURL updateRefURL"><i class="fa fa-users"></i> <span>Mapped Users </span></a>

        </li>  -->


                    <li <?php if ($basePATH_URL == "loaneligibilitybyreferring"){?> class="active" <?php } ?>>
                        <a href="loaneligibilitybyreferring" data-id="" data-Name="" class="addIdtoURL updateInfoUrl"><i
                                class="fa fa-plus"></i> <span>Loan
                                Eligibility by Referring
                    </li>


                    <li <?php if ($basePATH_URL == "brefereeRegisteredInfo"){?> class="active" <?php } ?>>
                        <a href="brefereeRegisteredInfo" data-id="" data-Name="" class="addIdtoURL updateregUrl"><i
                                class="fa fa-plus"></i> <span>My Earnings</span></a>

                    </li>


                </ul>
            </li>


            <li style="display:none" <?php if ($basePATH_URL == "mid.php"){?> class="active" <?php } ?>><a
                    href="mid.php"><i class="fa fa-book"></i> <span>My Multichain ID</span></a>
            </li>


            <!--   <li  style="display:none" <?php if ($basePATH_URL == "borrowerpayments"){?>
              class="active"
            <?php } ?> 
        ><a href="borrowerpayments"><i class="fa fa-credit-card text-yellow"></i> <span>Payments | EMIs</span></a></li>
        
        <li style="display:none" <?php if ($basePATH_URL == "faq.php"){?>
              class="active"
            <?php } ?> 
        ><a href="faq.php"><i class="fa fa-circle-o text-green"></i> <span>Oxyloans FAQ</span></a></li>

       
        <li  style="display:none" <?php if ($basePATH_URL == "#"){?>
              class="active"
            <?php } ?> 
            ><a href="#"><i class="fa ion-stats-bars"></i> <span>OXY Products</span></a>
        </li> -->

            <li
                class="treeview 
        <?php if ($basePATH_URL == "borrowerInquiries" || $basePATH_URL == "bviewTicketHistory"){?>active menu-open<?php } ?>">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Help Desk</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">

                    <li <?php if ($basePATH_URL == "borrowerInquiries"){?> class="active" <?php } ?>>
                        <a href="borrowerInquiries"><i class="fa fa-pencil"></i>Write to us</a>
                    </li>


                    <li <?php if ($basePATH_URL == "bviewTicketHistory"){?> class="active" <?php } ?>>
                        <a href="bviewTicketHistory"><i class="fa fa-eye"></i>View Ticket History</a>
                    </li>
                </ul>
            </li>






            <li <?php if ($basePATH_URL == ""){?> class="active" <?php } ?>>
                <a href="#" onclick="borrowerMonthlyStatements();"><i class="fa ion-stats-bars"></i> Loan Statement</a>
            </li>


            <li <?php if ($basePATH_URL == "userlogin"){?> class="active" <?php } ?>><a href="userlogin"><i
                        class="fa fa-sign-out text-yellow"></i> <span>Sign Out</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>