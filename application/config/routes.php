<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -----------------------------------------------------cicReport--------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['userlogin'] = 'User/userlogin';


$route['userSociallogin'] = 'User/userSociallogin';
$route['userSocialLogins'] = 'User/userSocialLogins';
$route['activateuser'] = 'User/activateuser';
//$route['resetpassword'] = 'User/resetpassword';
$route['forgotpassword'] = 'User/forgotpassword';
$route['register'] = 'User/register';
$route['registerfarmer'] = 'User/oxyfarmregistration';
$route['oxyfreewhatsapp'] = 'User/oxyfreewhatsapp';

$route['borrowerDashboard'] = 'User/borrowerDashboard';
$route['borrowerregister'] = 'User/borrowerregister';
$route['lenderregister'] = 'User/lenderregister';
$route['lenderemailregister'] = 'User/lenderemailregister';
$route['borroweremailregister'] = 'User/borroweremailregister';
$route['professionalDetails'] = 'User/professionalDetails';
$route['personalinfo'] = 'User/personalinfo';
$route['investor'] = 'User/lenderDashBoard';
$route['loanrequests'] = 'User/loanrequests';


$route['address'] = 'User/address';
$route['userkyc'] = 'User/userkyc';
$route['lenderuserkyc'] = 'User/lenderuserkyc';
$route['lenderProfit'] = 'User/lenderProfit';
$route['borroweruserkyc'] = 'User/borroweruserkyc';
$route['lenderraisealoanrequest'] = 'User/lenderraisealoanrequest';
$route['loanlistings'] = 'User/loanlistings';
$route['lenderpersonalinfo'] = 'User/lenderpersonalinfo';
$route['lenderprofessionalDetails'] = 'User/lenderprofessionalDetails';
$route['lenderaddress'] = 'User/lenderaddress';
$route['lenderloanlistings'] = 'User/lenderloanlistings';
$route['borrowerpersonalinfo'] = 'User/borrowerpersonalinfo';
$route['borrowerprofessionalDetails'] = 'User/borrowerprofessionalDetails';
$route['borroweraddress'] = 'User/borroweraddress';
$route['borrowerraisealoanrequest'] = 'User/borrowerraisealoanrequest';
$route['virtualAccount'] = 'User/virtualAccount';
$route['agreedloans'] = 'User/agreedloans';
$route['paymentHistory'] = 'User/bpaymentHistory';
$route['participateAmount'] = 'User/participateAmount';

$route['payments'] = 'User/payments';
$route['createloanrequest'] = 'User/createlonerequest';
$route['lenderviewloanoffer'] = 'User/lenderviewloanoffer';
$route['borrowerviewloanoffer'] = 'User/borrowerviewloanoffer';
$route['lenderresponsetomyrequest'] = 'User/lenderresponsetomyrequest';
$route['borrowerresponsetomyrequest'] = 'User/borrowerresponsetomyrequest';
$route['lenderagreedloans'] = 'User/lenderagreedloans';
$route['borroweragreedloans'] = 'User/borroweragreedloans';
$route['lenderpayments'] = 'User/lenderpayments';
$route['borrowerpayments'] = 'User/borrowerpayments';
$route['borrowercreateloanrequest'] = 'User/borrowercreateloanrequest';
$route['lendercreateloanrequest'] = 'User/lendercreateloanrequest';
$route['responsestoMyrequests'] = 'User/responsestoMyrequests';
$route['lenderresponsestoMyrequests'] = 'User/lenderresponsestoMyrequests';
$route['borrowerresponsestoMyrequests'] = 'User/borrowerresponsestoMyrequests';
$route['lenderacceptedrequests'] = 'User/lenderacceptedrequests';
$route['borroweracceptedrequests'] = 'User/borroweracceptedrequests';
$route['lenderrejectedrequests'] = 'User/lenderrejectedrequests';
$route['borrowerrejectedrequests'] = 'User/borrowerrejectedrequests';
$route['financialinfo'] = 'User/financialinfo';
$route['lendergenerateAgreement'] = 'User/lendergenerateAgreement';
$route['borrowergenerateAgreement'] = 'User/borrowergenerateAgreement';
$route['lenderfinancialinfo'] = 'User/lenderfinancialinfo';
$route['borrowerfinancialinfo'] = 'User/borrowerfinancialinfo';
$route['bankdetails'] = 'User/bankdetails';
$route['lenderbankdetails'] = 'User/lenderbankdetails';
$route['borrowerbankdetails'] = 'User/borrowerbankdetails';
$route['lenderAcceptedoffers'] = 'User/lenderAcceptedoffers';
$route['lenderresponses'] = 'User/lenderresponses';
$route['lendermyloansOffers'] = 'User/lendermyloansOffers';
$route['lenderRunningLoans'] = 'User/lenderRunningLoans';
$route['myrunningbLoans'] = 'User/myrunningbLoans';
$route['myrunningboffers'] = 'User/myrunningboffers';

$route['creditReportInfo'] = 'User/creditReportInfo';
$route['creditreportview'] = 'User/creditreportview';
$route['termsandconditions'] = 'User/termsandconditions';

$route['eMandate'] = 'User/eMandate';
$route['applicationEmandate'] = 'User/applicationEmandate';

$route['lender_profilePage'] = 'User/lender_profilePage';
$route['borrower_profilePage'] = 'User/borrower_profilePage';
$route['myRunningLoansforEMI'] = 'User/myRunningLoansforEMI';
$route['paltformFeeCollection'] = 'User/paltformFeeCollection';
$route['applicationpaltformFeeCollection'] = 'User/applicationpaltformFeeCollection';
$route['favouriteBorrowers'] = 'User/favouriteBorrowers';

$route['acceptLoanoffer'] = 'User/acceptLoanoffer';
$route['borrowerNoofLoanRequests'] = 'User/borrowerNoofLoanRequests';
$route['borrowerNewLoanRequests'] = 'User/borrowerNewLoanRequests';
$route['borrowerExpiredLoans'] = 'User/borrowerExpiredLoans';
$route['borrowerRejectedloans'] = 'User/borrowerRejectedloans';
$route['borrowerAcceptedloans'] = 'User/borrowerAcceptedloans';
$route['borrowerFeePayment'] = 'User/borrowerFeePayment';
$route['borrowerFeeOnlinePayment'] = 'User/borrowerFeeOnlinePayment';
$route['borrowerFeepaymentSuccess'] = 'User/borrowerFeepaymentSuccess';
$route['lenderReceivedEMI'] = 'User/lenderReceivedEMI';
$route['newdashboard'] = 'User/newdashboard';
$route['idb'] = 'User/newDB';
$route['nrilenderregistration'] = 'User/nrilenderregistration';


$route['lenderAutoInvest'] = 'User/lenderAutoInvest';
$route['lenderautoinvestHistory'] = 'User/lenderautoinvestHistory';
$route['lenderWithdrawfunds'] = 'User/lenderWithdrawfunds';
$route['withdrawWalletToWallet'] = 'User/withdrawWalletToWallet';
$route['wallettowalletRequest'] = 'User/wallettowalletRequest';
$route['lenderdealWithdrawfunds'] = 'User/lenderdealWithdrawfunds';
$route['lenderwithdrawFundsList'] = 'User/lenderwithdrawFundsList';
$route['lenderRe_invest'] = 'User/lenderRe_invest';
$route['referafriend'] = 'User/referafriend';
$route['displayingReferrerInfo'] = 'User/displayingReferrerInfo';
$route['refereeRegisteredInfo'] = 'User/refereeRegisteredInfo';
$route['referalEaringsMonthWise'] = 'User/referalEaringsMonthWise';
$route['borrowerreferafriend'] = 'User/borrowerreferafriend';
$route['borrowerReferrerInfo'] = 'User/borrowerReferrerInfo';
$route['borrowerRegisteredInfo'] = 'User/borrowerRegisteredInfo';
$route['borrowerInquiries'] = 'User/borrowerInquiries';
$route['lenderInquiries'] = 'User/lenderInquiries';
$route['adviseSeekers'] = 'User/adviseSeekers';
$route['viewlendingStatement'] = 'User/viewlendingStatement';


$route['admin/auth'] = 'Admincontroller/adminlogin';
$route['admin/eNACHActiveUsers'] = 'Admincontroller/eNACHActiveUsers';

$route['breferafriend'] = 'User/breferafriend';
$route['bdisplayingReferrerInfo'] = 'User/bdisplayingReferrerInfo';
$route['brefereeRegisteredInfo'] = 'User/brefereeRegisteredInfo';
$route['loaneligibilitybyreferring'] = 'User/loaneligibilitybyreferring';
$route['borrowerContacts'] = 'User/borrowerContacts';

$route['admin/dashboard'] = 'Admincontroller/dashboard';
$route['admin/lendersapplications'] = 'Admincontroller/lendersapplications';
$route['admin/borrowersapplications'] = 'Admincontroller/borrowersapplications';
$route['admin/runningLoans'] = 'Admincontroller/runningLoans';
$route['admin/closedLoans'] = 'Admincontroller/closedLoans';
$route['admin/viewLoanInformation'] = 'Admincontroller/viewLoanInformation';

$route['admin/totalPendingEMI'] = 'Admincontroller/totalPendingEMI';
$route['admin/pendingCurrentEMI'] = 'Admincontroller/pendingCurrentEMI';
$route['admin/checkfeatureEMIs'] = 'Admincontroller/checkfeatureEMIs';
$route['admin/viewLoanRecord'] = 'Admincontroller/viewLoanRecord';
$route['admin/partialApprovedPrincipalUsers'] = 'Admincontroller/partialApprovedPrincipalUsers';

$route['admin/intrested'] = 'Admincontroller/intrested';
$route['admin/approved'] = 'Admincontroller/approved';
$route['admin/Disbursed'] = 'Admincontroller/Disbursed';
$route['admin/newDisbursed'] = 'Admincontroller/newDisbursed';
$route['admin/ApplicationLevelDisbursed'] = 'Admincontroller/ApplicationLevelDisbursed';
$route['admin/lenderWallettransactions'] = 'Admincontroller/lenderWallettransactions';
$route['admin/loanAprroved'] = 'Admincontroller/loanAprroved';
$route['admin/expiredloans'] = 'Admincontroller/expiredloans';
$route['admin/rejectedApplications'] = 'Admincontroller/rejectedApplications';
$route['admin/acceptedLoans'] = 'Admincontroller/acceptedLoans';
$route['admin/setMinimumAmountForEnach'] = 'Admincontroller/setMinimumAmountForEnach';
$route['admin/lendersLoansinfo'] = 'Admincontroller/lendersLoansinfo';
$route['admin/borrowersLoansinfo'] = 'Admincontroller/borrowersLoansinfo';
$route['admin/lendersLoansview'] = 'Admincontroller/lendersLoansview';
$route['admin/borrowersloansview'] = 'Admincontroller/borrowersloansview';
$route['admin/viewminimumEMIusers'] = 'Admincontroller/viewminimumEMIusers';

$route['admin/thirtydaybucket'] = 'Admincontroller/thirtydaybucket';
$route['admin/sixtydaysbucket'] = 'Admincontroller/sixtydaysbucket';
$route['admin/ninetydaysbucket'] = 'Admincontroller/ninetydaysbucket';
$route['admin/ninetyorNPAbuckets'] = 'Admincontroller/ninetyorNPAbuckets';


$route['admin/showCollege'] = 'Admincontroller/showCollege';
$route['admin/showCollegeInfo'] = 'Admincontroller/showCollegeInfo';

$route['admin/displaylenderAutoinvestlist'] = 
'Admincontroller/displaylenderAutoinvestlist';

$route['admin/displaylenderautoinvestHistory'] = 
'Admincontroller/displaylenderautoinvestHistory';
$route['admin/displaylenderwithdrawalfundsList'] = 
'Admincontroller/displaylenderwithdrawalfundsList';
$route['admin/viewwalletdetails'] = 'Admincontroller/viewwalletdetails';
$route['admin/futureDeals'] = 'Admincontroller/futureDeals';

$route['admin/Uploadfiles'] = 'Admincontroller/Uploadfiles';
$route['admin/paymentsUpload'] = 'Admincontroller/paymentsUpload';
$route['admin/lenderreferalinfo'] = 'Admincontroller/lenderreferalinfo';
$route['admin/uploadedStatus'] = 'Admincontroller/uploadedStatus';
$route['admin/ApprovedStatus'] = 'Admincontroller/ApprovedStatus';
$route['admin/NotyetReflected'] = 'Admincontroller/NotyetReflected';
$route['admin/ThirtyDays'] = 'Admincontroller/ThirtyDays';
$route['admin/viewlenderWallets'] = 'Admincontroller/viewlenderWallets';
$route['admin/uploadtransactions'] = 'Admincontroller/uploadtransactions';
$route['admin/ECSPaymentHistory'] = 'Admincontroller/ECSPaymentHistory';
$route['admin/ViewVanNumber'] = 'Admincontroller/ViewVanNumber';
$route['admin/lenderRunningsloans'] = 'Admincontroller/lenderRunningsloans';
$route['admin/borrowerRunningsinfo'] = 'Admincontroller/borrowerRunningsinfo';
$route['admin/borrowerLoanStatus'] = 'Admincontroller/borrowerLoanStatus';




$route['admin/lenderwalletamountdetails'] = 'Admincontroller/lenderwalletamountdetails';
$route['admin/lendersemiamount'] = 'Admincontroller/lendersemiamount';
$route['admin/borrowersemiamount'] = 'Admincontroller/borrowersemiamount';
$route['admin/paidBorrower'] = 'Admincontroller/paidBorrower';
$route['admin/highestpaidborrowers'] = 'Admincontroller/highestpaidborrowers';
$route['admin/addloanowner'] = 'Admincontroller/addloanowner';
$route['admin/createDeal'] = 'Admincontroller/createDeal';
$route['admin/viewDeals'] = 'Admincontroller/viewDeals';

$route['admin/viewDealLenders'] = 'Admincontroller/viewDealLenders';
$route['admin/approveReferenceamount'] = 'Admincontroller/approveReferenceamount';
$route['admin/editDealInfo'] = 'Admincontroller/editDealInfo';
$route['admin/checkLenderDashboard'] = 'Admincontroller/checkLenderDashboard';
$route['admin/runningDealInfo'] = 'Admincontroller/runningDealInfo';
$route['admin/createUtmforpartnerDealer'] = 'Admincontroller/createUtmforpartnerDealer';


$route['admin/displayRe_Investlist'] = 'Admincontroller/displayRe_Investlist';
$route['admin/walletToWalletHistory'] = 'Admincontroller/walletToWalletHistory';
$route['admin/monthlyReferalEarning'] = 'Admincontroller/monthlyReferalEarning';




$route['enachMandateResponse'] = 'User/enachMandateResponse';
$route['AppLevelenachMandateResponse'] = 'User/AppLevelenachMandateResponse';
$route['paymentsuccess'] = 'User/paymentsuccess';
$route['paymentfailure'] = 'User/paymentfailure';
$route['onlinePayment'] = 'User/onlinePayment';
$route['uploadtransactiondetails'] = 'User/uploadtransactiondetails';
$route['mywallettransactionslist'] = 'User/mywallettransactionslist';
$route['validitytransactions'] = 'User/validitytransactions';
$route['myClosedDeals'] = 'User/myClosedDeals';
$route['partialClosedDeals'] = 'User/partialClosedDeals';
$route['assetsDealInfo'] = 'User/assetsDealInfo';
$route['myinterestInfo'] = 'User/myinterestInfo';

//Chnages by livin mandeva Starts
//Regarding Oxy Trade Starts On 13-11-2020

$route['borrowervanaccountdetails'] = 'User/borrowervanaccountdetails';
$route['addbeneficiary'] = 'User/addbeneficiary';
$route['viewbeneficiaries'] = 'User/viewbeneficiaries';
$route['groupofborrowers'] = 'User/groupofborrowers';
$route['displayborrowers'] = 'User/displayborrowers';
$route['viewDeals'] = 'User/viewRunningDeals';
$route['viewCurrentDayDeals'] = 'User/viewCurrentDayDeals';


$route['dealLenders'] = 'User/dealLenders';
$route['participateDeal'] = 'user/participateDeal';
$route['lenderPayFee'] = 'user/lenderPayFee';
$route['lendercontacts'] = 'User/lendercontacts';
$route['viewmyDeals'] = 'User/viewparticipatedDeals';
$route['userParticipatedDeals'] = 'User/userParticipatedDeals';
$route['autoInvestment'] = 'User/autoInvestment';


$route['loanowner'] = 'User/loanowner';
$route['equityDeals'] = 'User/equityDeals';
$route['listequityDeals'] = 'User/listequityDeals';
$route['escrowDeals'] = 'User/escrowDeals';
$route['salariedDeals'] = 'User/salariedDeals';
$route['testDeals'] = 'User/testDeals';
$route['selfemployedDeals'] = 'User/selfemployedDeals';
$route['gmailUserRegister'] = 'User/gmailUserRegister';
$route['lendingExperts'] = 'User/oxyLendingExperts';
$route['seekAdvice'] = 'User/seekAdvice';
$route['holdAmount'] = 'User/holdAmount';

$route['admin/editReferenceDeatils'] = 'Admincontroller/editReferenceDeatils';
$route['admin/editGroupinfo'] = 'Admincontroller/editGroupinfo';
$route['admin/getGroupofLender'] = 'Admincontroller/getGroupofLender';
$route['admin/createAgreements'] = 'Admincontroller/createAgreements';
$route['admin/lenderParticiaption'] = 'Admincontroller/lenderParticiaption';
$route['admin/borrowersrecovery'] = 'Admincontroller/borrowersrecovery';
$route['admin/closedLoansByPlatform'] = 'Admincontroller/closedLoansByPlatform';
$route['admin/getOxyFoundingGroups'] = 'Admincontroller/getOxyFoundingGroups';
$route['admin/whatsappNotification'] = 'Admincontroller/whatsappNotification';
$route['admin/sumofDealAmountInfo'] = 'Admincontroller/sumofDealAmountInfo';
$route['admin/equityDeals'] = 'Admincontroller/equityDeals';
$route['admin/offlineInterest'] = 'Admincontroller/offlineInterest';
$route['admin/dealNotifications'] = 'Admincontroller/dealNotifications';
$route['admin/lenderparticipateddeal'] = 'Admincontroller/lenderparticipateddeal';
$route['admin/lendersInAllEquityDeals'] = 'Admincontroller/lendersInAllEquityDeals';
$route['admin/lendersPayUtransactions'] = 'Admincontroller/lendersPayUtransactions';
$route['admin/borrowerPaymentTransactions'] = 'Admincontroller/borrowerPaymentTransactions';
$route['admin/updatePayu'] = 'Admincontroller/updatePayu';
$route['admin/paytmTransactions'] = 'Admincontroller/paytmTransactions';

$route['admin/uservalidityfee'] = 'Admincontroller/uservalidityfee';
$route['admin/viewDealTypePayOut'] = 'Admincontroller/viewDealTypePayOut';




$route['admin/equityNewLenders'] = 'Admincontroller/equityNewLenders';
$route['admin/lendersInterest'] = 'Admincontroller/lendersInterest';
$route['admin/readExcelSheet'] = 'Admincontroller/readExcelSheet';
$route['admin/approveLenderFee'] = 'Admincontroller/approveLenderFee';
$route['admin/walletbalance'] = 'Admincontroller/walletbalance';
$route['admin/escrowDeals'] = 'Admincontroller/escrowDeals';
$route['admin/userQueryDetails'] = 'Admincontroller/userQueryDetails';
$route['admin/closedQuery'] = 'Admincontroller/closedQuery';
$route['admin/equityInvestors'] = 'Admincontroller/equityInvestors';
$route['admin/dealLevelClosing'] = 'Admincontroller/dealLevelClosing';
$route['admin/showInterestPayments'] = 'Admincontroller/showInterestPayments';
$route['admin/viewdealBasedPayments'] = 'Admincontroller/viewdealBasedPayments';
$route['admin/dealLevelEmiInfo'] = 'Admincontroller/dealLevelEmiInfo';
$route['admin/removeCredentials'] = 'Admincontroller/removeCredentials';
$route['admin/sendEmailActivationLink'] = 'Admincontroller/sendEmailActivationLink';
$route['admin/viewinterestUsers'] = 'Admincontroller/viewinterestUsers';
$route['admin/interestApprovedUsers'] = 'Admincontroller/interestApprovedUsers';
$route['admin/viewclosedDeals'] = 'Admincontroller/viewclosedDeals';
$route['admin/dealBasedAggrements'] = 'Admincontroller/dealBasedAggrements';
$route['borroweragreedloan'] = 'User/borroweragreedloan';
$route['oxyregister'] = 'User/oxyregister';
$route['borrowerloanrequest'] = 'User/borrowerloanrequest';
$route['demoReferralPage'] = 'User/demoReferralPage';
$route['admin/lenderstatistics'] = 'Admincontroller/lenderstatistics';
$route['admin/helpdesksidebar'] = 'Admincontroller/helpdesksidebar';
$route['admin/helpdeskadmin'] = 'Admincontroller/helpdeskadmin';
$route['admin/resolvedQueries'] = 'Admincontroller/resolvedQueries';
$route['admin/cicReport'] = 'Admincontroller/cicReport';
$route['admin/pendingFiles'] = 'Admincontroller/pendingFiles';
$route['admin/healdeskLenderloanapplication'] = 'Admincontroller/healdeskLenderloanapplication';

$route['admin/healdeskBorrowerloanapplication'] = 'Admincontroller/healdeskBorrowerloanapplication';

$route['admin/dealWithdrawRequest'] = 'Admincontroller/dealWithdrawRequest';
$route['admin/dealWithdrawinfo'] = 'Admincontroller/dealWithdrawinfo';
$route['admin/resolved'] = 'Admincontroller/resolved';
$route['admin/viewPartnerAndDealer'] = 'Admincontroller/viewPartnerAndDealer';
$route['admin/h2h2WithdrawalApprove'] = 'Admincontroller/h2h2WithdrawalApprove';
$route['admin/TransactionAlerts'] = 'Admincontroller/TransactionAlerts';
$route['admin/cmsfoldersFiles'] = 'Admincontroller/cmsfoldersFiles';
$route['admin/poolingLendrs'] = 'Admincontroller/poolingLendrs';
$route['admin/QrTransactions'] = 'Admincontroller/QrTransactions';
$route['admin/partnerListUsers'] = 'Admincontroller/partnerListUsers';
$route['admin/partnerResetPassword'] = 'Admincontroller/partnerResetPassword';
$route['admin/partnerLenderList'] = 'Admincontroller/partnerLenderList';
$route['admin/salariedDeals'] = 'Admincontroller/salariedDeals';
$route['admin/testDeals'] = 'Admincontroller/testDeals';
$route['admin/selfEmployedDeals'] = 'Admincontroller/selfEmployedDeals';
$route['admin/PartnerBankDetails'] = 'Admincontroller/PartnerBankDetails';
$route['admin/PartnerNDA_MOU'] = 'Admincontroller/PartnerNDA_MOU';
$route['admin/partnerDashboard'] = 'Admincontroller/partnerDashboard';
$route['admin/partnernewDashboard'] = 'Admincontroller/partnernewDashboard';
$route['admin/partnerLoanInfo'] = 'Admincontroller/partnerLoanInfo';
$route['admin/viewpaymentSuccess'] = 'Admincontroller/viewpaymentSuccess';

$route['admin/HelpDeskPersonalDeals'] = 'Admincontroller/HelpDeskPersonalDeals';
$route['admin/HelpDeskequityDeals'] = 'Admincontroller/HelpDeskequityDeals';
$route['admin/HelpDeskescrowDeals'] = 'Admincontroller/HelpDeskescrowDeals';
$route['admin/HelpDesksalariedDeals'] = 'Admincontroller/HelpDesksalariedDeals';
$route['admin/HelpDesktestDeals'] = 'Admincontroller/HelpDesktestDeals';


$route['admin/referaPartner'] = 'Admincontroller/referaPartner';
$route['admin/PartnerReferrerInfo'] = 'Admincontroller/PartnerReferrerInfo';
$route['admin/PartnerRegisteredInfo'] = 'Admincontroller/PartnerRegisteredInfo';
$route['admin/PartneradviseSeekers'] = 'Admincontroller/PartneradviseSeekers';
$route['admin/PartnerEarnings'] = 'Admincontroller/PartnerEarnings';
$route['admin/PartnerVerification'] = 'Admincontroller/PartnerVerification';
$route['admin/adminemicalculator'] = 'Admincontroller/adminemicalculator';
$route['admin/partnerUploaddocs'] = 'Admincontroller/partnerUploaddocs';
$route['admin/holdAmountRequest'] = 'Admincontroller/holdAmountRequest';
$route['admin/holdAmountBreakUp'] = 'Admincontroller/holdAmountBreakUp';



$route['admin/fdPaymentDetails'] = 'Admincontroller/fdPaymentDetails';
$route['admin/uploadFdData'] = 'Admincontroller/uploadFdData';
$route['admin/viewListOfFds'] = 'Admincontroller/viewListOfFds';
$route['admin/searchfdUsers'] = 'Admincontroller/searchfdUsers';
$route['admin/verifyPaymentDetail'] = 'Admincontroller/verifyPaymentDetail';
$route['admin/transferFunds'] = 'Admincontroller/transferFunds';
$route['admin/fdStatistics'] = 'Admincontroller/fdStatistics';
$route['admin/fddownloadInvoice'] = 'Admincontroller/fddownloadInvoice';
$route['admin/fdmonthlyloansInfo'] = 'Admincontroller/fdmonthlyloansInfo';
$route['admin/fdpaymentDashboard'] = 'Admincontroller/fdpaymentDashboard';
$route['admin/fdClosedDetails'] = 'Admincontroller/fdClosedDetails';
$route['admin/topReferralBonus'] = 'Admincontroller/topReferralBonus';
$route['admin/topLendingUsers1'] = 'Admincontroller/topLendingUsers1';
$route['admin/topLendingUsers'] = 'Admincontroller/topLendingUsers';


$route['admin/membershipFee'] = 'Admincontroller/membershipFee';

$route['admin/feepaidusers'] = 'Admincontroller/feepaidusers';


$route['admin/fdexecutedPayment'] = 'Admincontroller/fdexecutedPayment';
$route['admin/feependingusers'] = 'Admincontroller/feependingusers';
$route['admin/activeLenderParticipationAmount'] = 'Admincontroller/activeLenderParticipationAmount';
$route['admin/insertPendingInformation'] = 'Admincontroller/insertPendingInformation';
$route['admin/knowmembership'] = 'Admincontroller/knowmembership';
$route['admin/pendingamountUser'] = 'Admincontroller/pendingamountUser';

$route['admin/registerLenderUsers'] = 'Admincontroller/registerLenderUsers';
$route['admin/holdInterestAmountRequest'] = 'Admincontroller/holdInterestAmountRequest';



$route['register_lender'] = 'User/register_lender';
$route['user_PayQrCode'] = 'User/user_PayQrCode';
$route['userNotification'] = 'User/userNotification';
$route['dealWithdrawfunds'] = 'User/dealWithdrawfunds';
$route['register_lender_thanksMessage'] = 'User/register_lender_thanksMessage';
$route['register_active_proceed'] = 'User/register_lender_activate_proceed';
$route['register_lender_activate_thanksMessage'] = 'User/register_lender_activate_thanksMessage';
$route['viewTicketHistory'] = 'User/viewTicketHistory';
$route['bviewTicketHistory'] = 'User/bviewTicketHistory';
$route['viewMyloanApplications'] = 'User/viewMyloanApplications';
$route['admlogin'] = 'User/admlogin';
$route['register_borrower'] = 'User/register_borrower';
 $route['register_borrower_activate_proceed'] = 'User/register_borrower_activate_proceed';
$route['loancalculator'] = 'User/loancaluclator';
$route['payUtest'] = 'User/payUtest';
$route['payUtest2'] = 'User/payUtest2';
$route['payUresponse'] = 'User/payUresponse';
$route['partnerLogin'] = 'User/partnerLogin';
$route['partner_Register'] = 'User/partner_Register';
$route['participatedDealSuccess'] = 'User/participatedDealSuccess';
$route['emicalculator'] = 'User/emicalculator';
$route['borroweremicalculator'] = 'User/borroweremicalculator';
$route['ViewBorrowerLoanInfo'] = 'User/ViewBorrowerLoanInfo';
$route['PayBorrowerEmiQR'] = 'User/PayBorrowerEmiQR';
$route['View360degree'] = 'User/View360degree';
$route['walletdebithistory'] = 'User/walletdebithistory';
$route['paymembership'] = 'User/paymembership';
$route['educationMappedUsers'] = 'User/educationMappedUsers';
$route['borrowerMappedUsers'] = 'User/borrowerMappedUsers';
$route['passionMappedUsers'] = 'User/passionMappedUsers';
$route['partner/Dashboard'] = 'PartnerController/Dashboard';
$route['partner/partnerLoaninfo'] = 'PartnerController/partnerLoaninfo';
$route['partner/partnerUserLoaninfo'] = 'PartnerController/partnerUserLoaninfo';
$route['partner/viewBorrowerStatus'] = 'PartnerController/viewBorrowerStatus';
$route['partner/partnerListUsers'] = 'PartnerController/PartnerListUsers';
$route['partner/partnerResetPassword'] = 'PartnerController/PartnerResetPassword';
$route['partner/partnerLenderList'] = 'PartnerController/PartnerLenderList';
$route['partner/PartnerBankDetails'] = 'PartnerController/PartnerBankDetails';
$route['partner/PartnerNDA_MOU'] = 'PartnerController/PartnerNDA_MOU';
$route['partner/referaPartner'] = 'PartnerController/referaPartner';
$route['partner/PartnerReferrerInfo'] = 'PartnerController/PartnerReferrerInfo';
$route['partner/PartnerRegisteredInfo'] = 'PartnerController/PartnerRegisteredInfo';
$route['partner/PartneradviseSeekers'] = 'PartnerController/PartneradviseSeekers';
$route['partner/PartnerEarnings'] = 'PartnerController/PartnerEarnings';
$route['partner/PartnerVerification'] = 'PartnerController/PartnerVerification';
$route['partner/partnerUploaddocs'] = 'PartnerController/PartnerUploaddocs';
$route['partner/PartnerBorrowerInfo'] = 'PartnerController/PartnerBorrowerInfo';





$route['admin/activLendersParicipationAmountAndCount'] = 'Admincontroller/activLendersParicipationAmountAndCount';
$route['admin/RegisteredUsers'] = 'Admincontroller/RegisteredUsers';
$route['admin/borrowerfddetails'] = 'Admincontroller/borrowerfddetails';
$route['admin/participatedUsers'] = 'Admincontroller/participatedUsers';