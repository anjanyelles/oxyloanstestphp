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
| -------------------------------------------------------------------------
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
$route['activateuser'] = 'User/activateuser';
//$route['resetpassword'] = 'User/resetpassword';
$route['forgotpassword'] = 'User/forgotpassword';
$route['register'] = 'User/register';
$route['borrowerDashboard'] = 'User/borrowerDashboard';
$route['professionalDetails'] = 'User/professionalDetails';
$route['personalinfo'] = 'User/personalinfo';
$route['investor'] = 'User/lenderDashBoard';
$route['loanrequests'] = 'User/loanrequests';
$route['address'] = 'User/address';
$route['userkyc'] = 'User/userkyc';
$route['lenderuserkyc'] = 'User/lenderuserkyc';
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




$route['admin/auth'] = 'Admincontroller/adminlogin';
$route['admin/dashboard'] = 'Admincontroller/dashboard';
$route['admin/lendersapplications'] = 'Admincontroller/lendersapplications';
$route['admin/borrowersapplications'] = 'Admincontroller/borrowersapplications';
$route['admin/runningLoans'] = 'Admincontroller/runningLoans';
$route['admin/closedLoans'] = 'Admincontroller/closedLoans';
$route['admin/viewLoanInformation'] = 'Admincontroller/latestLoans';




//$route['404_override'] = '';
//$route['translate_uri_dashes'] = FALSE;
