<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Globalcontroller.php';

class Admincontroller extends Globalcontroller {
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
	public function adminlogin(){
		$this->load->view('admin/adminlogin');
	}


	public function dashboard(){
		$this->load->view('admin/admin_dashboard');
	}
	public function lendersapplications(){
		$this->load->view('admin/admin_lendersLoanApplications');
	}
	public function borrowersapplications(){
		$this->load->view('admin/admin_borrowerLoanApplications');
	}
	public function runningLoans(){
		$this->load->view('admin/admin_runningLoans');
		
	}
	public function closedLoans(){
		$this->load->view('admin/admin_closedLoans');
	}
	public function viewLoanInformation(){
		$this->load->view('admin/admin_viewLoanInformation');
	}
	public function totalPendingEMI(){
		$this->load->view('admin/totalPendingEMI');
	}
	public function pendingCurrentEMI(){
		$this->load->view('admin/pendingCurrentEMI');
	}

	public function checkfeatureEMIs(){
		$this->load->view('admin/checkfeatureEMIs');
	}

	public function viewLoanRecord(){
		$this->load->view('admin/viewLoanRecord');
	}

	public function intrested(){
		$this->load->view('admin/admin_intrested');
	}
	public function approved(){
		$this->load->view('admin/admin_approved');
	}
	public function Disbursed(){
		$this->load->view('admin/admin_Disbursed');
	}
	public function newDisbursed(){
		$this->load->view('admin/admin_newDisbursed');
	}
	public function ApplicationLevelDisbursed(){
		$this->load->view('admin/admin_ApplicationLevelDisbursed');
	}

	public function eNACHActiveUsers(){
		$this->load->view('admin/eNACHActiveUsers');
	}

   public function lenderWallettransactions(){
		$this->load->view('admin/admin_lenderWallettransactions');
	}


	 public function registerLenderUsers(){
		$this->load->view('admin/admin_registerLenderUsers');
	}




	  public function loanAprroved(){
		$this->load->view('admin/admin_loanAprroved');
	}
	 public function expiredloans(){
		$this->load->view('admin/admin_expiredloans');
	}
	 public function rejectedApplications(){
		$this->load->view('admin/admin_rejectedApplications');
	}
	 public function acceptedLoans(){
		$this->load->view('admin/admin_acceptedLoans');
	}
	public function setMinimumAmountForEnach(){
		$this->load->view('admin/admin_setMinimumAmountForEnach');
	}
	public function lendersLoansinfo(){
		$this->load->view('admin/admin_lendersLoansinfo');
	}
	public function borrowersLoansinfo(){
		$this->load->view('admin/admin_borrowersLoaninfo');
	}
	public function lendersLoansview(){
		$this->load->view('admin/admin_lendersLoansview');
	}
	public function borrowersloansview(){
		$this->load->view('admin/admin_borrowersloansview');
	}
	public function viewminimumEMIusers(){
		$this->load->view('admin/admin_viewminimumEMIusers');
	}

	public function thirtydaybucket(){
		$this->load->view('admin/thirtydaybucket');
	}
	public function sixtydaysbucket(){
		$this->load->view('admin/sixtydaysbucket');
	}
	public function ninetydaysbucket(){
		$this->load->view('admin/ninetydaysbucket');
	}
	public function ninetyorNPAbuckets(){
		$this->load->view('admin/ninetyorNPAbuckets');
	}

	public function displaylenderAutoinvestlist(){
		$this->load->view('admin/displaylenderAutoinvestlist');
	}

	public function displaylenderautoinvestHistory(){
		$this->load->view('admin/displaylenderautoinvestHistory');
	}
	public function displaylenderwithdrawalfundsList(){
		$this->load->view('admin/displaylenderwithdrawalfundsList');
	}
	public function displayRe_Investlist(){
		$this->load->view('admin/displayRe_Investlist');
	}
	public function futureDeals(){
		$this->load->view('admin/admin_futureDeals');
	}
	public function Uploadfiles(){
		$this->load->view('admin/admin_Uploadfiles');
	}
	public function paymentsUpload(){
		$this->load->view('admin/admin_paymentUpload');
	}

	public function uploadedStatus(){
		$this->load->view('admin/admin_uploadedStatus');
	}

	public function NotyetReflected(){
		$this->load->view('admin/admin_NotyetReflected');
	}
	public function ThirtyDays(){
		$this->load->view('admin/admin_ThirtyDays');
	}
	public function ApprovedStatus(){
		$this->load->view('admin/admin_ApprovedStatus');
	}

	public function viewlenderWallets(){
		$this->load->view('admin/admin_viewlenderWallets');
	}

	public function uploadtransactions(){
		$this->load->view('admin/admin_uploadtransactions');
	}
	 public function ECSPaymentHistory(){
		$this->load->view('admin/admin_ECSPaymentHistory');
	}
	public function ViewVanNumber(){
		$this->load->view('admin/admin_ViewVanNumber');
	}
     public function lenderRunningsloans(){
		$this->load->view('admin/admin_lenderRunningsloans');
	}
	public function borrowerRunningsinfo(){
		$this->load->view('admin/admin_borrowerRunningsinfo');
	}

	public function borrowerLoanStatus(){
		$this->load->view('admin/admin_borrowerLoanStatus');
	}
	
	public function lenderwalletamountdetails(){
		$this->load->view('admin/admin_lenderwalletamountdetails');
	}

	public function lendersemiamount(){
		$this->load->view('admin/admin_lendersemiamount');
	}

	public function borrowersemiamount(){
		$this->load->view('admin/admin_borrowersemiamount');
	}
	public function paidBorrower(){
		$this->load->view('admin/admin_paidBorrower');
	}
	public function highestpaidborrowers(){
		$this->load->view('admin/admin_highestpaidborrowers');
	}
	  public function lenderreferalinfo(){
		$this->load->view('admin/admin_lenderreferalinfo');
	}
	public function addloanowner(){
		$this->load->view('admin/admin_addloanowner');
	}

	public function createDeal(){
		$this->load->view('admin/admin_createDeal');
	}

	public function viewDeals(){
		$this->load->view('admin/admin_viewDeals');
	}

	public function viewDealLenders(){
		$this->load->view('admin/admin_viewDealLenders');
	}

	public function approveReferenceamount(){
		$this->load->view('admin/admin_approveReferenceamount');
	}

	public function editDealInfo(){
		$this->load->view('admin/admin_editDealInfo');
	}

	public function checkLenderDashboard(){
		$this->load->view('admin/admin_checkLenderDashboard');
	}

	public function editReferenceDeatils(){
		$this->load->view('admin/admin_editReferenceDeatils');
	}
	public function editGroupinfo(){
		$this->load->view('admin/admin_editGroupinfo');
	}
	public function getGroupofLender(){
		$this->load->view('admin/admin_getGroupofLender');
	}
	public function createAgreements(){
		$this->load->view('admin/admin_createAgreements');
	}
	public function lenderParticiaption(){
		$this->load->view('admin/admin_lenderParticiaption');
	}
	public function borrowersrecovery(){
		$this->load->view('admin/admin_borrowersrecovery');
	}
	public function closedLoansByPlatform(){
		$this->load->view('admin/admin_closedLoansByPlatform');
	}
	public function getOxyFoundingGroups(){
		$this->load->view('admin/admin_getOxyFoundingGroups');
	}
	public function whatsappNotification(){
	$this->load->view('admin/admin_whatsappNotification');
	}
	public function sumofDealAmountInfo(){
	$this->load->view('admin/admin_sumofDealAmountInfo');
	}
	public function equityDeals(){
	$this->load->view('admin/admin_equityDeals');
	}
	public function lenderparticipateddeal(){
	$this->load->view('admin/admin_lenderparticipateddeal');
	}

	public function offlineInterest(){
	$this->load->view('admin/admin_offlineInterest');
	}

	public function dealNotifications(){
	$this->load->view('admin/admin_dealNotifications');
	}

	public function lendersInAllEquityDeals(){
	$this->load->view('admin/admin_lendersInAllEquityDeals');
	}
	public function lendersPayUtransactions(){
	$this->load->view('admin/admin_lendersPayUtransactions');
	}
	public function borrowerPaymentTransactions(){
	$this->load->view('admin/admin_borrowerPaymentTransactions');
	}
	public function updatePayu(){
	$this->load->view('admin/admin_updatePayu');
	}
	public function paytmTransactions(){
	$this->load->view('admin/admin_paytmTransactions');
	}
	public function equityNewLenders(){
	$this->load->view('admin/admin_equityNewLenders');
	}
	public function lendersInterest(){
	$this->load->view('admin/admin_lendersInterest');
	}
	public function readExcelSheet(){
	$this->load->view('admin/admin_readExcelSheet');
	}

	public function walletbalance(){
	$this->load->view('admin/admin_walletbalance');
	}

	public function approveLenderFee(){
	$this->load->view('admin/admin_approveLenderFee');
	}
	public function escrowDeals(){
	$this->load->view('admin/admin_escrowDeals');
	}

	public function userQueryDetails(){
	$this->load->view('admin/admin_userQueryDetails');
	}
	public function closedQuery(){
	$this->load->view('admin/admin_closedQuery');
	}
	public function equityInvestors(){
	$this->load->view('admin/admin_equityInvestors');
	}
	public function dealLevelClosing(){
	$this->load->view('admin/admin_dealLevelClosing');
	}
	public function showInterestPayments(){
		$this->load->view('admin/showInterestPayments');
	}
	public function viewdealBasedPayments(){
		$this->load->view('admin/viewdealBasedPayments');
	}

	public function dealLevelEmiInfo(){
	$this->load->view('admin/admin_dealLevelEmiInfo');
	}
	public function removeCredentials(){
	$this->load->view('admin/admin_removeCredentials');
	}

	public function sendEmailActivationLink(){
	$this->load->view('admin/admin_sendEmailActivationLink');
	}


	public function runningDealInfo(){
	$this->load->view('admin/admin_runningDealInfo');
	}
	public function interestApprovedUsers(){
	$this->load->view('admin/admin_interestApprovedUsers');
	}
	public function viewinterestUsers(){
	$this->load->view('admin/admin_viewinterestUsers');
	}
	public function viewclosedDeals(){
	$this->load->view('admin/admin_viewclosedDeals');
	}
    public function dealBasedAggrements(){
	$this->load->view('admin/admin_dealBasedAggrements');
	}
	public function lenderstatistics(){
	$this->load->view('admin/admin_lenderstatistics');
	}
    public function helpdesksidebar(){
	$this->load->view('admin/admin_helpdesksidebar');
	}
	 public function helpdeskadmin(){
	$this->load->view('admin/admin_helpdeskadmin');
	}
	public function resolvedQueries(){
	$this->load->view('admin/admin_resolvedQueries');
	}
	public function resolved(){
	$this->load->view('admin/admin_resolved');
	}
	public function dealWithdrawRequest(){
	$this->load->view('admin/admin_dealWithdrawRequest');
	}

	public function dealWithdrawinfo(){
	$this->load->view('admin/admin_dealWithdrawinfo');
	}
	public function createUtmforpartnerDealer(){
	$this->load->view('admin/admin_createUtmforpartnerDealer');
	}
	public function viewPartnerAndDealer(){
	$this->load->view('admin/admin_viewPartnerAndDealer');
	}
	public function h2h2WithdrawalApprove(){
	$this->load->view('admin/admin_h2h2WithdrawalApprove');
	}
	public function partialApprovedPrincipalUsers(){
	$this->load->view('admin/admin_partialApprovedPrincipalUsers');
	}
	public function TransactionAlerts(){
	$this->load->view('admin/admin_TransactionAlerts');
	}
	public function cmsfoldersFiles(){
	$this->load->view('admin/admin_cmsfoldersFiles');
	}
	public function poolingLendrs(){
	$this->load->view('admin/admin_poolingLendrs');
	}
	public function QrTransactions(){
	$this->load->view('admin/admin_QrTransactions');
	}
	public function partnerListUsers(){
	$this->load->view('admin/admin_partnerListUsers');
	}
	public function partnerLenderList(){
	$this->load->view('admin/admin_partnerLenderList');
	}
	public function partnerResetPassword(){
	$this->load->view('admin/admin_partnerResetPassword');
	}
	public function referaPartner(){
	$this->load->view('admin/admin_referaPartner');
	}
	public function PartnerReferrerInfo(){
	$this->load->view('admin/admin_PartnerReferrerInfo');
	}
	public function PartnerRegisteredInfo(){
	$this->load->view('admin/admin_PartnerRegisteredInfo');
	}
	public function PartneradviseSeekers(){
	$this->load->view('admin/admin_PartneradviseSeekers');
	}
	public function PartnerEarnings(){
	$this->load->view('admin/admin_PartnerEarnings');
	}

	public function PartnerVerification(){
	$this->load->view('admin/admin_PartnerVerification');
	}

	public function adminemicalculator(){
	$this->load->view('admin/admin_adminemicalculator');
	}

	public function salariedDeals(){
	$this->load->view('admin/admin_salariedDeals');
	}

    public function testDeals(){
	$this->load->view('admin/admin_testDeals');
	}



	public function selfEmployedDeals(){
	$this->load->view('admin/admin_selfEmployedDeals');
	}

	public function PartnerBankDetails(){
	$this->load->view('admin/admin_PartnerBankDetails');
	}

     public function PartnerNDA_MOU(){
	$this->load->view('admin/admin_PartnerNDA_MOU');
	}

	  public function partnerUploaddocs(){
	$this->load->view('admin/admin_partnerUploaddocs');
	}

	  public function partnerDashboard(){
	   $this->load->view('admin/admin_partnerDashboard');
	}

	public function partnernewDashboard(){
	   $this->load->view('admin/admin_partnernewDashboard');
	}

	public function partnerLoanInfo(){
	   $this->load->view('admin/admin_partnerLoanInfo');
	}

	public function viewpaymentSuccess(){
	   $this->load->view('admin/admin_viewpaymentSuccess');
	}

	public function healdeskLenderloanapplication(){
	   $this->load->view('admin/admin_healdeskLenderloanapplication');
	}

	public function healdeskBorrowerloanapplication(){
	   $this->load->view('admin/admin_healdeskBorrowerloanapplication');
	}

	public function cicReport(){
	   $this->load->view('admin/admin_cicReport');
	}


     public function pendingFiles(){
	   $this->load->view('admin/admin_pendingFiles');
	}
	 public function walletToWalletHistory(){
      $this->load->view('admin/admin_walletToWalletHistory');
	}


	public function showCollege(){
	   $this->load->view('admin/admin_showCollege');
	}

	 public function showCollegeInfo(){
      $this->load->view('admin/admin_showCollegeInfo');
	}

	public function uservalidityfee(){
      $this->load->view('admin/admin_uservalidityfee');
	}

	 public function viewDealTypePayOut(){
      $this->load->view('admin/admin_viewDealTypePayOut');
	}

	public function holdAmountRequest(){
      $this->load->view('admin/admin_holdAmountRequest');
	}

	 public function holdAmountBreakUp(){
      $this->load->view('admin/admin_holdAmountBreakUp');
	}


     public function HelpDeskPersonalDeals(){
      $this->load->view('admin/admin_HelpDeskPersonalDeals');
	}
	public function HelpDeskequityDeals(){
      $this->load->view('admin/admin_HelpDeskequityDeals');
	}

	public function HelpDeskescrowDeals(){
      $this->load->view('admin/admin_HelpDeskescrowDeals');
	}

	 public function HelpDesksalariedDeals(){
      $this->load->view('admin/admin_HelpDesksalariedDeals');
	}

	 public function HelpDesktestDeals(){
      $this->load->view('admin/admin_HelpDesktestDeals');
	}


     public function fdPaymentDetails(){
      $this->load->view('admin/admin_fdPaymentDetails');
	}
	public function uploadFdData(){
      $this->load->view('admin/admin_uploadFdData');
	}

	public function viewListOfFds(){
      $this->load->view('admin/admin_viewListOfFds');
	}



	public function searchfdUsers(){
      $this->load->view('admin/admin_searchfdUsers');
	}

	 public function verifyPaymentDetail(){
      $this->load->view('admin/admin_verifyPaymentDetail');
	}

	 public function transferFunds(){
      $this->load->view('admin/admin_transferFunds');
	}


	public function fdStatistics(){
      $this->load->view('admin/admin_fdStatistics');
	}
	// public function topLendingUsers(){
	// 	$this->load->view('admin/admin_topLendingUsers');
	//   }
	 public function monthlyReferalEarning(){
      $this->load->view('admin/admin_topLendingUsers');
	}
	public function topReferralBonus(){
		$this->load->view('admin/admin_topReferralBonus');
	  }
	public function knowmembership(){
		$this->load->view('admin/admin_knowmembership');
		}
		public function membershipFee(){
			$this->load->view('admin/admin_membershipFee');
			}
		public function feepaidusers(){
			$this->load->view('admin/admin_feepaidusers');
			}
			

			public function topLendingUsers(){
				$this->load->view('admin/admin_topLendingUsers');
				}
			
		// $route['admin/feepaidusers'] = 'Admincontroller/feepaidusers';
	public function insertPendingInformation(){
      $this->load->view('admin/admin_insertPendingInformation');
	}
	public function holdInterestAmountRequest(){
		$this->load->view('admin/admin_holdInterestAmountRequest');
	  }

	  public function feependingusers(){
		$this->load->view('admin/admin_feependingusers');
		}
	  public function activeLenderParticipationAmount(){
		$this->load->view('admin/admin_activeLenderParticipationAmount');
		}

	public function pendingamountUser(){
      $this->load->view('admin/admin_pendingamountUser');
	}

	public function fddownloadInvoice(){
      $this->load->view('admin/admin_fddownloadInvoice');
	}

	 public function fdmonthlyloansInfo(){
      $this->load->view('admin/admin_fdmonthlyloansInfo');
	}


	 public function fdClosedDetails(){
      $this->load->view('admin/admin_fdClosedDetails');
	}

	 public function fdexecutedPayment(){
      $this->load->view('admin/admin_fdexecutedPayment');
	}

	 public function fdpaymentDashboard(){
      $this->load->view('admin/admin_fdpaymentDashboard');
	}


	 public function monthlyReferalEarning(){
      $this->load->view('admin/admin_monthlyReferalEarning');
	}

}
