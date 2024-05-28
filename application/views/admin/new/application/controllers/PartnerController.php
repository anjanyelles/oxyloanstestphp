<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Globalcontroller.php';

class PartnerController extends Globalcontroller {

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
	
	public function Dashboard(){
		$this->load->view('partner/Dashboard');
	}

	public function partnerLoaninfo(){
	$this->load->view('partner/partnerLoaninfo');
	}

	public function partnerUserLoaninfo(){
	$this->load->view('partner/partnerUserLoaninfo');
	}

	public function PartnerBankDetails(){
	$this->load->view('partner/PartnerBankDetails');
	}
  
    public function PartnerNDA_MOU(){
	$this->load->view('partner/PartnerNDA_MOU');
	}

	 public function partnerUploaddocs(){
	$this->load->view('partner/PartnerUploaddocs');
	}

	  
	public function partnerListUsers(){
	$this->load->view('partner/PartnerListUsers');
	}

	public function partnerLenderList(){
	$this->load->view('partner/PartnerLenderList');
	}

	public function partnerResetPassword(){
	$this->load->view('partner/PartnerResetPassword');
	}

	public function referaPartner(){
	$this->load->view('partner/referaPartner');
	}

	public function PartnerReferrerInfo(){
	$this->load->view('partner/PartnerReferrerInfo');
	}

	public function PartnerRegisteredInfo(){
	$this->load->view('partner/PartnerRegisteredInfo');
	}

	public function PartneradviseSeekers(){
	$this->load->view('partner/PartneradviseSeekers');
	}

	public function PartnerEarnings(){
	$this->load->view('partner/PartnerEarnings');
	}

	public function PartnerVerification(){
	$this->load->view('partner/PartnerVerification');
	}

     public function PartnerBorrowerInfo(){
	$this->load->view('partner/PartnerBorrowerInfo');
	}

     public function viewBorrowerStatus(){
	$this->load->view('partner/viewBorrowerStatus');
	}
}

