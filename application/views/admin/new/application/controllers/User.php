<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Globalcontroller.php';

class User extends Globalcontroller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function userlogin() {
		$this->load->view('userlogin');
	}


	public function oxyfreewhatsapp() {
		$this->load->view('oxyfreewhatsapp');
	}
	public function userSociallogin() {
		$this->load->view('userSociallogin');
	}
	public function userSocialLogins() {
		$this->load->view('userSocialLogins');
	}
	public function activateuser() {
		$this->load->view('activateuser');
	}
	public function forgotpassword() {
		$this->load->view('forgotpassword');
		
	}
	public function resetpassword() {
		$this->load->view('resetpassword');
	}
	public function register() {
		$this->load->view('register');
	}

	public function oxyfarmregistration(){
		$this->load->view('registerfarmer');
	}
    public function oxyregister() {
		$this->load->view('oxyregister');
	}
	public function borrowerDashboard() {
		$this->load->view('borrowerDashboard');
	}
	public function borrowerregister() {
		$this->load->view('borrowerregister');
	}
	public function lenderregister() {
		$this->load->view('lenderregister');
	}
	public function lenderemailregister() {
		$this->load->view('lenderemailregister');
	}
	public function borroweremailregister() {
		$this->load->view('borroweremailregister');
	}
	public function professionalDetails() {
		$this->load->view('professionalDetails');
	}

	public function personalinfo() {
		$this->load->view('personalinfo');
	}	


	public function lenderDashBoard() {
		$this->load->view('lenderDashBoard');
	}	

	public function loanrequests() {
		$this->load->view('loanrequests');
	}	

	public function raisealoanrequest() {
		$this->load->view('raisealoanrequest');
	}	

	public function address() {
		$this->load->view('address');
	}	

	public function userkyc() {
		$this->load->view('userKYC');
	}
		public function lenderuserkyc() {
		$this->load->view('lenderuserkyc');
	}
		public function borroweruserkyc() {
		$this->load->view('borroweruserkyc');
	}
	public function lenderraisealoanrequest() {
		$this->load->view('lenderraisealoanrequest');
	}
	public function loanlistings() {
		$this->load->view('loanlistings');
	}
	public function lenderpersonalinfo() {
		$this->load->view('lenderpersonalinfo');
	}	
	public function lenderprofessionalDetails() {
		$this->load->view('lenderprofessionalDetails');
	}
	public function lenderaddress() {
		$this->load->view('lenderaddress');
	}	
	public function lenderloanlistings() {
		$this->load->view('lenderloanlistings');
	}	

	public function borroweraddress() {
		$this->load->view('borroweraddress');
	}	
	public function borrowerpersonalinfo() {
		$this->load->view('borrowerpersonalinfo');
	}
	public function borrowerprofessionalDetails() {
		$this->load->view('borrowerprofessionalDetails');
	}	
	public function borrowerraisealoanrequest() {
		$this->load->view('borrowerraisealoanrequest');
	}	
	public function virtualAccount() {
		$this->load->view('virtualAccount');
	}	
	public function referafriend() {
		$this->load->view('referafriend');
	}
	public function displayingReferrerInfo() {
		$this->load->view('displayingReferrerInfo');
	}	
	public function refereeRegisteredInfo() {
		$this->load->view('refereeRegisteredInfo');
	}	

	public function referalEaringsMonthWise() {
		$this->load->view('referalEaringsMonthWise');
	}	


	public function payments() {
		$this->load->view('payments');
	}	
	public function createlonerequest() {
		$this->load->view('createloanrequest');
	}	
	public function lenderviewloanoffer() {
		$this->load->view('lenderviewloanoffer');
	}	
	public function borrowerviewloanoffer() {
		$this->load->view('borrowerviewloanoffer');
	}	
	public function lenderresponsetomyrequest() {
		$this->load->view('lenderresponsetomyrequest');
	}	
	public function borrowerresponsetomyrequest() {
		$this->load->view('borrowerresponsetomyrequest');
	}	
	public function lenderagreedloans() {
		$this->load->view('lenderagreedloans');
	}	
	public function borroweragreedloans() {
		$this->load->view('borroweragreedloans');
	}	
	public function lenderpayments() {
		$this->load->view('lenderpayments');
	}	
	public function borrowerpayments() {
		$this->load->view('borrowerpayments');
	}	
	public function lendercreateloanrequest() {
		$this->load->view('lendercreateloanrequest');
	}	
	public function borrowercreateloanrequest() {
		$this->load->view('borrowercreateloanrequest');
	}	
    public function responsestoMyrequests() {
		$this->load->view('responsestoMyrequests');
	}	
	public function lenderresponsestoMyrequests() {
		$this->load->view('lenderresponsestoMyrequests');
	}	
	public function borrowerresponsestoMyrequests() {
		$this->load->view('borrowerresponsestoMyrequests');
	}
	public function lenderacceptedrequests() {
		$this->load->view('lenderacceptedrequests');
	}	
    public function borroweracceptedrequests() {
		$this->load->view('borroweracceptedrequests');
	}
	public function lenderrejectedrequests() {
		$this->load->view('lenderrejectedrequests');
	}	
    public function borrowerrejectedrequests() {
		$this->load->view('borrowerrejectedrequests');
	}
	 public function financialinfo() {
		$this->load->view('financialinfo');
	}
	 public function lendergenerateAgreement() {
		$this->load->view('lendergenerateAgreement');
	}
	public function borrowergenerateAgreement() {
		$this->load->view('borrowergenerateAgreement');
	}
	public function lenderfinancialinfo() {
		$this->load->view('lenderfinancialinfo');
	}
	public function borrowerfinancialinfo() {
		$this->load->view('borrowerfinancialinfo');
	}
	public function bankdetails() {
		$this->load->view('bankdetails');
	}
	public function lenderbankdetails() {
		$this->load->view('lenderbankdetails');
	}
	public function borrowerbankdetails() {
		$this->load->view('borrowerbankdetails');
	}
	public function lenderAcceptedoffers() {
		$this->load->view('lenderAcceptedoffers');
	}

	public function lenderresponses() {
		$this->load->view('lenderresponses');	
	}

	public function lendermyloansOffers() {
		$this->load->view('lendermyloansOffers');	
	}
	
	public function lenderRunningLoans() {
		$this->load->view('lenderRunningLoans');	
	}
	public function myrunningbLoans() {
		$this->load->view('myrunningbLoans');	
	}
	
	public function myrunningboffers() {
		$this->load->view('myrunningboffers');	
	}

	public function eMandate() {
		$this->load->view('eMandate');	
	}

	public function creditReportInfo() {
		$this->load->view('creditReportInfo');	
	}
	
	public function creditreportview() {
		$this->load->view('creditreportview');	
	}
   public function termsandconditions() {
		$this->load->view('termsandconditions');	
	}
	
	 public function lender_profilePage() {
		$this->load->view('lender_profilePage');	
	}

     public function borrower_profilePage() {
		$this->load->view('borrower_profilePage');	
	}
	
	public function enachMandateResponse() {
		$this->load->view('enachMandateResponse');	
	}


   public function AppLevelenachMandateResponse() {
		$this->load->view('AppLevelenachMandateResponse');	
	}  
	
    public function paymentsuccess() {
		$this->load->view('paymentsuccess');	
	}

    public function paymentfailure() {
		$this->load->view('paymentfailure');	
	}
    public function onlinePayment() {
		$this->load->view('onlinePayment');	
	}
	public function myRunningLoansforEMI() {
		$this->load->view('myRunningLoansforEMI');	
	}

	public function applicationpaltformFeeCollection() {
		$this->load->view('applicationpaltformFeeCollection');	
	}

	public function paltformFeeCollection() {
		$this->load->view('paltformFeeCollection');	
	}

	public function favouriteBorrowers() {
		$this->load->view('favouriteBorrowers');	
	}
	
	public function uploadtransactiondetails() {
		$this->load->view('lenderuploadtransactions');	
	}
	
	public function mywallettransactionslist() {
		$this->load->view('lenderwallettransactionslist');	
	}
	public function acceptLoanoffer() {
		$this->load->view('acceptLoanoffer');	
	}
   public function borrowerNoofLoanRequests() {
		$this->load->view('borrowerNoofLoanRequests');	
	}
	public function borrowerNewLoanRequests() {
		$this->load->view('borrowerNewLoanRequests');	
	}

	public function borrowerExpiredLoans() {
		$this->load->view('borrowerExpiredLoans');	
	}

	public function borrowerRejectedloans() {
		$this->load->view('borrowerRejectedloans');	
	}
    public function borrowerAcceptedloans() {
		$this->load->view('borrowerAcceptedloans');	
	}

	public function borrowerFeePayment() {
		$this->load->view('borrowerFeePayment');	
	}

	public function borrowerFeeOnlinePayment() {
		$this->load->view('borrowerFeeOnlinePayment');	
	}
	public function borrowerFeepaymentSuccess() {
		$this->load->view('borrowerFeepaymentSuccess');	
	}
	public function lenderReceivedEMI() {
		$this->load->view('lenderReceivedEMI');	
	}
	public function lenderAutoInvest() {
		$this->load->view('lenderAutoInvest');	
	}
	public function lenderautoinvestHistory() {
		$this->load->view('lenderautoinvestHistory');	
	}
	public function lenderWithdrawfunds() {
		$this->load->view('lenderWithdrawfunds');	
	}
	public function lenderdealWithdrawfunds() {
		$this->load->view('lenderdealWithdrawfunds');	
	}
	public function lenderwithdrawFundsList() {
		$this->load->view('lenderwithdrawFundsList');	
	}
	public function lenderRe_invest() {
		$this->load->view('lenderRe_invest');	
	}

	public function bpaymentHistory() {
		$this->load->view('bpaymentHistory');	
	}

	//Chages by PrathiIT Starts
	//Regarding Oxy Trade Starts On 13-11-2020

	public function borrowervanaccountdetails() {
		$this->load->view('borrowervanaccountdetails');	
	}

	public function addbeneficiary() {
		$this->load->view('addbeneficiary');	
	}

	public function viewbeneficiaries() {
		$this->load->view('viewbeneficiaries');	
	}

	public function lenderProfit() {
		$this->load->view('lenderProfit');
	}

	public function groupofborrowers() {
		$this->load->view('groupofborrowers');	
	}

	public function displayborrowers() {
		$this->load->view('displayborrowers');
	}
	public function newdashboard() {
		$this->load->view('newdashboard');
	}
	public function newDB() {
		$this->load->view('newDB');
	}
	public function nrilenderregistration() {
		$this->load->view('nrilenderregistration');
	}

	public function viewRunningDeals() {
		$this->load->view('viewRunningDeals');
	}
	

	public function viewCurrentDayDeals() {
		$this->load->view('viewCurrentDayDeals');
	}

	public function participateDeal(){
		$this->load->view('participateDeal');
	}

	public function lenderPayFee(){
		$this->load->view('lenderPayFee');
	}
	
	public function lendercontacts() {
		$this->load->view('lendercontacts');
	}
	public function viewparticipatedDeals(){
		$this->load->view('myparticipatedDeals');
	}

		public function autoInvestment(){
		$this->load->view('autoInvestment');
	}

	public function userParticipatedDeals(){
		$this->load->view('userParticipatedDeals');
	}
	 public function loanowner() {
		$this->load->view('loanowner');
	}
	public function gmailUserRegister() {
		$this->load->view('gmailUserRegister');
	}

	
	public function dealLenders() {
		$this->load->view('dealLenders');
	}
	public function equityDeals() {
		$this->load->view('equityDeals');
	}
     public function escrowDeals(){
		$this->load->view('escrowDeals');
	}
	public function participateAmount() {
		$this->load->view('participateAmount');
	}

    public function borrowerInquiries() {
		$this->load->view('borrowerInquiries');
	}
	public function lenderInquiries() {
		$this->load->view('lenderInquiries');
	}
    public function adviseSeekers() {
		$this->load->view('adviseSeekers');
	}
    public function oxyLendingExperts() {
		$this->load->view('oxyLendingExperts');
	}

	 function seekAdvice() {
		$this->load->view('seekAdvice');
	}
	public function myClosedDeals() {
		$this->load->view('myClosedDeals');
	}

	public function partialClosedDeals() {
		$this->load->view('partialClosedDeals');
	}


   public function assetsDealInfo() {
		$this->load->view('assetsDealInfo');
	}

	 public function myinterestInfo() {
		$this->load->view('myinterestInfo');
	}

	public function viewlendingStatement() {
		$this->load->view('viewlendingStatement');
	}
	public function borroweragreedloan() {
		$this->load->view('borroweragreedloan');
	}
	 public function borrowerloanrequest() {
		$this->load->view('borrowerloanrequest');
	}
	public function demoReferralPage() {
		$this->load->view('demoReferralPage');
	}
	public function register_lender() {
		$this->load->view('register_lender');
	}
	public function register_lender_activate_proceed(){
		$this->load->view('register_lender-activate_proceed');

	}
	public function viewTicketHistory() {
		$this->load->view('viewTicketHistory');
	}
	public function bviewTicketHistory() {
		$this->load->view('bviewTicketHistory');
	}
	public function viewMyloanApplications() {
		$this->load->view('viewMyloanApplications');
	}
	public function register_lender_activate_thanksMessage(){
	$this->load->view('register_lender_activate_thanksMessage');
	}

	public function register_lender_thanksMessage() {
	 $this->load->view('register_lender_thanksMessage');
	}
	public function admlogin() {
	 $this->load->view('admlogin');
	}
	public function register_borrower() {
		$this->load->view('register_borrower');
	}
	public function register_borrower_activate_proceed(){
		$this->load->view('register_borrower_activate_proceed');

	}

	  public function dealWithdrawfunds(){
		$this->load->view('dealWithdrawfunds');
	}

	 public function user_PayQrCode(){
		$this->load->view('user_PayQrCode');

	}

	public function breferafriend() {
		$this->load->view('breferafriend');
	}
	public function bdisplayingReferrerInfo() {
		$this->load->view('bdisplayingReferrerInfo');
	}	
	public function brefereeRegisteredInfo() {
		$this->load->view('brefereeRegisteredInfo');
	}


     public function loaneligibilitybyreferring() {
		$this->load->view('loaneligibilitybyreferring');
	}

	public function loancaluclator(){
		$this->load->view('loancalc');
	}

	public function payUtest(){
		$this->load->view('payUtest');
	}
	public function payUresponse(){
		$this->load->view('payUresponse');
	}
	public function partnerLogin(){
		$this->load->view('partnerLogin');
	}
     public function payUtest2(){
		$this->load->view('payUtest2');
	}
     public function partner_Register(){
		$this->load->view('partner_Register');
	}

	 public function participatedDealSuccess(){
      $this->load->view('participatedDealSuccess');
	}
	
	public function educationMappedUsers(){
      $this->load->view('educationMappedUsers');
	}

	public function borrowerMappedUsers(){
      $this->load->view('borrowerMappedUsers');
	}

	public function passionMappedUsers(){
      $this->load->view('passionMappedUsers');
	}

	public function emicalculator(){
      $this->load->view('emiucalculator');
	}

	public function borroweremicalculator(){
      $this->load->view('borroweremicalculator');
	}
	public function borrowerContacts(){
      $this->load->view('borrowerContacts');
	}

	public function salariedDeals(){
      $this->load->view('salariedDeals');
	}
	
   public function testDeals(){
      $this->load->view('testDeals');
	}


	 public function selfemployedDeals(){
      $this->load->view('selfemployedDeals');
	}

	 public function ViewBorrowerLoanInfo(){
      $this->load->view('ViewBorrowerLoanInfo');
	}

	 public function PayBorrowerEmiQR(){
      $this->load->view('PayBorrowerEmiQR');
	}


	public function applicationEmandate(){
      $this->load->view('applicationEmandate');
	}

	 public function View360degree(){
      $this->load->view('View360degree');
	}

	 public function userNotification(){
      $this->load->view('userNotification');
	}

	 public function withdrawWalletToWallet(){
      $this->load->view('withdrawWalletToWallet');
	}

	 public function wallettowalletRequest(){
      $this->load->view('wallettowalletRequest');
	}

	  public function validitytransactions() {
		$this->load->view('validitytransactions');	
	 }


	   public function holdAmount() {
		$this->load->view('holdAmount');	
	 }

	   public function walletdebithistory() {
		$this->load->view('walletdebithistory');	
	 }

	    public function listequityDeals() {
	    	
		$this->load->view('listequityDeals');	
	 }

	 public function paymembership() {  	
	  $this->load->view('paymembership');	
	 }
	
	//Regarding Oxy Trade Ends On 13-11-2020
	//Changes by livin mandeva Ends
}
