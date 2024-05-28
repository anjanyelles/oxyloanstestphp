<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/globalcontroller.php';

class Api extends Globalcontroller {

	public function __construct(){
		parent::__construct();
		header('Access-Control-Allow-Origin: *');
	}

public function index() {
	header('Access-Control-Allow-Origin: *');
		$data = $this->db->query("(SELECT p.company_name,p.mobile_number,p.company_website,p.company_logo,p.id,p.email,p.country,p.rating,p.fb_url,p.twitter_url,p.linkedin_url,p.ico_status,p.start_date,p.end_date,p.ico_url,p.created_by,p.ico_status,p.company_description,avg(rh.rating) as public_rating,'latest_ico' AS ico_type
FROM oxy_ico p  left join public_rating_hdr rh on p.id=rh.rating_ico_id where p.ico_status='Publish' and p.rating!=0 and p.ico_premium = '0' GROUP BY p.company_name ORDER BY p.rating, p.created_date DESC limit 5)
UNION ALL

(SELECT p.company_name,p.company_website,p.company_logo,p.mobile_number,p.id,p.email,p.country,p.rating,p.fb_url,p.twitter_url,p.linkedin_url,p.ico_status,p.start_date,p.end_date,p.ico_url,p.created_by,p.ico_status,p.company_description
,avg(rh.rating) as public_rating,'premium_ico' AS ico_type
FROM oxy_ico p left join public_rating_hdr rh on p.id=rh.rating_ico_id where p.ico_status='Publish' and p.ico_premium = '1' GROUP BY p.company_name ORDER BY p.created_date DESC limit 5)
UNION ALL

(SELECT p.company_name,p.company_website,p.company_logo,p.mobile_number,p.id,p.email,p.country,p.rating,p.fb_url,p.twitter_url,p.linkedin_url,p.ico_status,p.start_date,p.end_date,p.ico_url,p.created_by,p.ico_status,p.company_description, avg(rh.rating) as public_rating,'future_ico' AS ico_type
FROM oxy_ico p left join public_rating_hdr rh on p.id=rh.rating_ico_id where p.ico_status='Publish' and p.start_date > NOW() GROUP BY p.company_name ORDER BY p.created_date DESC  limit 5)
UNION ALL
(SELECT p.company_name,p.company_website,p.company_logo,p.mobile_number,p.id,p.email,p.country,p.rating,p.fb_url,p.twitter_url,p.linkedin_url,p.ico_status,p.start_date,p.end_date,p.ico_url,p.created_by,p.ico_status,p.company_description
,avg(rh.rating) as public_rating,'completed_ico' AS ico_type FROM oxy_ico p  left join public_rating_hdr rh on p.id=rh.rating_ico_id where p.ico_status='Publish' and p.end_date < NOW() GROUP BY p.company_name ORDER BY p.created_date DESC  limit 5)
UNION ALL
(SELECT p.company_name,p.mobile_number,p.company_website,p.company_logo,p.id,p.email,p.country,p.rating,p.fb_url,p.twitter_url,p.linkedin_url,p.ico_status,p.start_date,p.end_date,p.ico_url,p.created_by,p.ico_status,p.company_description,avg(rh.rating) as public_rating,
'running_ico' AS ico_type
FROM oxy_ico p  left join public_rating_hdr rh on p.id=rh.rating_ico_id where p.ico_status='Publish' and p.start_date <= NOW() and p.end_date > NOW() GROUP BY p.company_name ORDER BY p.created_date DESC  limit 10)"
		);

		$lastThreeApproved = $this->db->query("select * from kyc_ico WHERE kyc_status = 'approved'  ORDER by Admin_updated_date DESC LIMIT 3");

		if ($lastThreeApproved->num_rows()) {
			$lastThreeApproved = $lastThreeApproved->result();
		} else {
			$lastThreeApproved = array();
		}

		if ($data->num_rows()) {
			$ico = $data->result();
		} else {
			$ico = array();
		}

	$oxy_videos = $this->db->query('select * from oxy_videos order by video_id DESC limit 10');

		if ($oxy_videos->num_rows()) {
			$oxy_videos = $oxy_videos->result();

		} else {
			$oxy_videos = array();
		}

		$ico_result = array();

		$publish = 'running_ico';
		$future = 'future_ico';
		$completed = 'completed_ico';
		$latest = 'latest_ico';
		$premium = 'premium_ico';
		$ico_result = array();
		$no_repeat = 0;

		$ico_result['premium_ico'] = array_filter($ico, function ($item) use ($premium) {
			if (stripos($item->ico_type, $premium) !== false) {
				return true;
			}
			return array();
		});

		$ico_result['latest_ico'] = array_filter($ico, function ($item) use ($latest) {

			if (stripos($item->ico_type, $latest) !== false) {
				return true;

			}

			return array();
		});

		$ico_result['running_ico'] = array_filter($ico, function ($item) use ($publish) {

			if (stripos($item->ico_type, $publish) !== false) {
				return true;

			}

			return array();
		});
		$ico_result['future_ico'] = array_filter($ico, function ($item) use ($future) {
			if (stripos($item->ico_type, $future) !== false) {
				return true;
			}
			return array();
		});

		$ico_result['completed_ico'] = array_filter($ico, function ($item) use ($completed) {
			if (stripos($item->ico_type, $completed) !== false) {
				return true;
			}
			return array();
		});

		$pagedata['icodata'] = $ico_result;
		$runningicoData = $ico_result['running_ico'];
		
		$pagedata['oxy_videos'] = $oxy_videos;
		$icos_info = $this->session->set_userdata("icos_info", $ico_result);

		$pagedata['latestapproved'] = $lastThreeApproved;
		
		$onlyRunningIco = $this->session->set_userdata("running_ico", $runningicoData);
		$this->load->layout('index', $pagedata);
	}


	public function upload() {
	    if($this->session->userdata('review_user_session_id') == FALSE) {
	        $this->session->set_userdata('message', 'login_fail');
	        $this->load->layout('userAuth');
	    } else{
    		$pagedata = array();
    
    		$cat_data = $this->db->query('select cat_id, category_name from ico_category where status=1');
    		$res = $cat_data->result();
    
    		$pagedata['ico_category'] = $res;
    		if ($this->form_validation->run('uploadico') === FALSE) {
    			$this->load->layout('upload', $pagedata);
    		} else {			
    		$this->load->library('upload');
    
    		$company_name = $this->input->post('company_name');
    		$company_website = $this->input->post('company_website');
    		$company_description = $this->input->post('about');
    		$mobile_number = $this->input->post('mobile_number');
    		$email = $this->input->post('email');
    		$fb_url = $this->input->post('facebook_url');
    		$twitter_url = $this->input->post('twitter_url');
    		$linkedin_url = $this->input->post('linkedin_url');
    		$about = $this->input->post('about');
    		$country = $this->input->post('country');
    		$start_date = $this->input->post('start_date');
    		$end_date = $this->input->post('end_date');
    		$ico_relation = $this->input->post('ico_relation');
    		$category = $this->input->post('category');
    		$price_per_token = $this->input->post('price_per_token');
    		$token_name = $this->input->post('token_name');
    		$country_code = $this->input->post('country_code');
    		$private_sale_start_date = $this->input->post('private_from_date');
    		$private_sale_end_date = $this->input->post('private_to_date');
    		$pre_sale_start_date = $this->input->post('pre_from_date');
    		$pre_sale_end_date = $this->input->post('pre_to_date');
    		$author_description = '';
    		$rating = '';
    
    		$whitepaper = $this->input->post('whitepaper');
    		echo "whitepaper ";
    		echo $whitepaper;
    		// echo"in is dir";
    		//  echo $_FILES['myfile']['name'];
      //  echo $_FILES['myfile']['size'];
      //   echo $_FILES['myfile']['tmp_name'];
    		// echo"white displayed";
    
    		$file_name = preg_replace("/[^a-zA-Z0-9\s]/", "", trim($company_name));
    
    
    		$file_name = str_replace(' ', '_', $file_name);
    		echo "file name";
    		echo $file_name;
    
    		$this->upload->initialize(array('upload_path' => 'uploads/',
    			'allowed_types' => "pdf",
    			'overwrite' => FALSE,
    			'file_name' => $file_name,
    			'max_size' => '150000',
    		));
    
    		if ($this->upload->do_upload('whitepaper')) {
    		    $this->upload->initialize(array('upload_path' => 'uploads/logo',
    				'allowed_types' => "gif|jpg|png|jpeg|pdf",
    				'overwrite' => FALSE,
    				'file_name' => $file_name,
    				'width' => '80',
    				'max_size' => '1200',
    			));
    
    			if ($this->upload->do_upload('company_logo')) {
    				$upload_data = $this->upload->data();
    				$file_ext = $upload_data['file_name'];
    				$ext = substr($file_ext, strpos($file_ext, ".") + 1);
    
    				$insert_data = array(
    					'table' => $this->config->item('oxy_ico'),
    					'insertdata' => array(
    						'company_name' => $company_name,
    						'company_logo' => $file_name . '.' . $ext,
    						'company_description' => $company_description,
    						'mobile_number' => $mobile_number,
    						'email' => $email,
    						'country' => $country,
    						'company_website' => $company_website,
    						'fb_url' => $fb_url,
    						'twitter_url' => $twitter_url,
    						'linkedin_url' => $linkedin_url,
    						'start_date' => $start_date,
    						'end_date' => $end_date,
    						'ico_status' => 'Pending',
    						'ico_relation' => $ico_relation,
    						'price_per_token' => $price_per_token,
    						'category' => $category,
    						'ico_file' => $file_name . '.pdf',
    						'submit_type' => 'Guest',
    						'author_description' => $author_description,
    						'rating' => $rating,
    						'token_name' => $token_name,
    						'country_code' => $country_code,
    						'private_sale_start_date' => $private_sale_start_date,
    						'private_sale_end_date' => $private_sale_end_date,
    						'pre_sale_start_date' => $pre_sale_start_date,
    						'pre_sale_end_date' => $pre_sale_end_date,
    						'created_date' => $this->localdate('Y-m-d H:i:s'),
    						'updated_date' => $this->localdate('Y-m-d H:i:s')));
    
    				$insertion = $this->globalmodel->insert_data($insert_data);
    				$this->session->set_userdata('message', 'success');
    				redirect('upload');
    
    			} else {
    
    				$this->session->set_userdata('file_status', 'logo_fail');
    				$this->load->layout('upload',$pagedata);
    			}
    
    		} else {
    			$this->session->set_userdata('file_status', 'ico_fail');
    			$this->load->layout('upload',$pagedata);
    		}
    		echo $private_sale_start_date;
    		echo $private_sale_end_date;
    			
    		}
	    }
	}
	public function contactus() {

		$this->load->layout('contact');
	}

	public function faq() {

		$this->load->layout('faq');
	}


	public function submit_whitepaper() {

		
				}




	public function icolist($param) {

		$perPage = 5;

		if (!empty($this->input->get("page"))) {

			$start = ceil($this->input->get("page") * $perPage);

			if ($param == 'running') {

				$data = $this->db->limit($start, $this->perPage)->query(""
				);

			} else if ($param == 'completed') {
				$data = $this->db->limit($start, $this->perPage)->query("(SELECT p.*
,'completed_ico' AS ico_type FROM oxy_ico p  where p.ico_status='Publish' and p.end_date < NOW() ORDER BY p.created_date DESC )"
				);

			} else if ($param == 'future') {
				$data = $this->db->limit($start, $this->perPage)->query("(SELECT p.*
,'future_ico' AS ico_type
FROM oxy_ico p  where p.ico_status='Publish' and p.start_date > NOW() ORDER BY p.created_date DESC )"
				);

			} else {
				redirect('/');exit;
			}
			$pagedata['ico'] = $data->result();

			$result = $this->load->view('ico', $pagedata);
			echo json_encode($result);

		} else {

			if ($param == 'running') {

				$data = $this->db->limit(5, $perPage)->query("(SELECT p.company_name,p.company_website,p.company_logo,p.id,p.country,p.rating,p.fb_url,p.twitter_url,p.linkedin_url,p.ico_status,p.start_date,p.end_date,p.ico_url,p.created_by,p.ico_status,p.company_description,avg(rh.rating) as public_rating,
'running_ico' AS ico_type
FROM oxy_ico p  left join public_rating_hdr rh on p.id=rh.rating_ico_id where p.ico_status='Publish' and p.start_date <= NOW() and p.end_date > NOW() GROUP BY p.company_name ORDER BY p.created_date DESC)"
				);

			} else if ($param == 'completed') {
				$data = $this->db->limit(5, $perPage)->query("(SELECT p.company_name,p.company_website,p.company_logo,p.id,p.country,p.rating,p.fb_url,p.twitter_url,p.linkedin_url,p.ico_status,p.start_date,p.end_date,p.ico_url,p.created_by,p.ico_status,p.company_description
,avg(rh.rating) as public_rating,'completed_ico' AS ico_type FROM oxy_ico p  left join public_rating_hdr rh on p.id=rh.rating_ico_id where p.ico_status='Publish' and p.end_date < NOW() GROUP BY p.company_name ORDER BY p.created_date DESC)"
				);

			} else if ($param == 'future') {
				$data = $this->db->limit(5, $perPage)->query("(SELECT p.company_name,p.company_website,p.company_logo,p.id,p.country,p.rating,p.fb_url,p.twitter_url,p.linkedin_url,p.ico_status,p.start_date,p.end_date,p.ico_url,p.created_by,p.ico_status,p.company_description, avg(rh.rating) as public_rating,'future_ico' AS ico_type
FROM oxy_ico p left join public_rating_hdr rh on p.id=rh.rating_ico_id where p.ico_status='Publish' and p.start_date > NOW() GROUP BY p.company_name ORDER BY p.created_date DESC )"
				);

			} else if ($param == 'premium') {
				$data = $this->db->limit(5, $perPage)->query("(SELECT p.company_name,p.company_website,p.company_logo,p.id,p.country,p.rating,p.fb_url,p.twitter_url,p.linkedin_url,p.ico_status,p.start_date,p.end_date,p.ico_url,p.created_by,p.ico_status,p.company_description
,avg(rh.rating) as public_rating,'premium_ico' AS ico_type
FROM oxy_ico p left join public_rating_hdr rh on p.id=rh.rating_ico_id where p.ico_status='Publish' and p.ico_premium = '1' GROUP BY p.company_name ORDER BY p.created_date DESC)"
				);

			} else {
				redirect('/');exit;
			}
			if ($data->num_rows() > 0) {
				$pagedata['icotype'] = $param;
				$pagedata['ico'] = $data->result();
				$pagedata['result'] = '';

			} else {
				$pagedata['icotype'] = $param;
				$pagedata['ico'] = array();
				$pagedata['result'] = 'No&nbsp;' . $param . '&nbsp;ICOs Avialable';

			}

			$this->load->layout('ico-list', $pagedata);
		}

	}
	public function icoview($icoid) {


		$ico_check = $this->db->query("select * from oxy_ico where ico_url='$icoid'");
		if ($ico_check->num_rows() < 1) {
			redirect('/');
		}

		$res = $this->db->query("select i.id as oxy_id, i.email as oxy_email, i.*, u.id as user_id,u.*,r.*, avg(rh.rating) as public_rating FROM oxy_ico i
left join oxy_admin u ON i.created_by = u.id
left join oxy_rating r on i.id = r.oxy_ico_id
left join public_rating_hdr rh on rh.rating_ico_id=i.id where i.ico_url='$icoid'");
		$icodata = $res->row();
		$pagedata['ico'] = $icodata;
		$res_rate = $this->db->query("select ru.*, rh.rating as public_rating from public_rating_hdr rh left join review_users ru on ru.public_review_user_id=rh.public_user_id where rh.rating_ico_id='$icodata->oxy_id'");
		$pagedata['total_rating'] = 0;
		if ($res_rate->num_rows() > 0) {
			$pagedata['total_rating'] = $res_rate->num_rows();
			$res_rate = $res_rate->result();

			$pagedata['public_rating'] = $res_rate;
		} else {
			$pagedata['public_rating'] = array();
		}
		$comment = $this->db->query("select u.*, c.* from public_comment c left join review_users u on u.public_review_user_id=c.public_user_id where c.rating_ico_id='$icodata->oxy_id' and public_rating_id=0 order by c.created_datetime ASC");

		if ($comment->num_rows() > 0) {
			$comment = $comment->result();
			$pagedata['comments'] = $comment;

		} else {
			$pagedata['comments'] = array();
		}

		$fact = $this->db->query("select * from oxy_factors order by id ASC");
		if ($fact->num_rows() > 0) {
			$fact = $fact->result();
			$pagedata['factors'] = $fact;
		} else {
			$pagedata['factors'] = array();
		}
		$this->load->layout('icoview', $pagedata);

	}

	public function icorating($icoid) {

		$ico_check = $this->db->query("select * from oxy_ico where ico_url='$icoid'");
		if ($ico_check->num_rows() < 1) {
			redirect('/');
		}

		$res = $this->db->query("select i.id as oxy_id, i.email as oxy_email, i.*, u.id as user_id,u.*,r.*, avg(rh.rating) as public_rating FROM oxy_ico i
left join oxy_admin u ON i.created_by = u.id
left join oxy_rating r on i.id = r.oxy_ico_id
left join public_rating_hdr rh on rh.rating_ico_id=i.id where i.ico_url='$icoid'");
		$icodata = $res->row();
		$pagedata['ico'] = $icodata;

		$res_rate = $this->db->query("select
			  h.rating,
			  h.public_rating_id,
			  h.rating as public_rating,
			  u1.reviewer_first_name as reviewer_name,
			  u2.reviewer_first_name as comment_person_name,
			  c.comment,
			  c.comment_id,
			  c.rating_ico_id,
			  c.created_datetime
			  from public_rating_hdr h
left join public_comment c on c.public_rating_id=h.public_rating_id and h.rating_ico_id=c.rating_ico_id
left join review_users u1 on u1.public_review_user_id= h.public_user_id
left join review_users u2 on u2.public_review_user_id= c.public_user_id
where h.rating_ico_id='$icodata->oxy_id' order by  h.public_rating_id, c.comment_id ");

		$pagedata['total_rating'] = 0;
		
		if ($res_rate->num_rows() > 0) {
			$pagedata['total_rating'] = $res_rate->num_rows();
			$res_rate = $res_rate->result();
	
			$pagedata['public_rating'] = $res_rate;
		} else {
			$pagedata['public_rating'] = array();
		}

		$this->load->layout('icorating', $pagedata);

	}

	public function loginuser() {
	header('Access-Control-Allow-Origin: *');

		$this->session->set_userdata('login_user', $this->input->post());
		$data = $this->session->userdata('login_user');

		$auth_data = array();

		$auth_data['user'] = json_decode($data['current_user'], true);

		$auth_data['status'] = 200;

		$this->session->set_userdata('login_user', $auth_data['user']);
		$data = $this->session->userdata('login_user');
		$this->session->set_userdata('login_user_id', $data['ID']);
		$this->session->set_userdata('login_user_name', $data['display_name']);
	}
	public function review($icoid) {

		$auth_user = $this->session->userdata('review_user_session_id');
		$ico_url = $this->session->set_userdata('ico_url', $icoid);

		$ico_check = $this->db->query("select * from oxy_ico where ico_url='$icoid'");
		if ($ico_check->num_rows() < 1) {
			redirect('/');
		}
		if (empty($auth_user)) {
			redirect('icoview/' . $icoid);
		}

		$res = $this->db->query("select i.id as oxy_id, i.email as oxy_email, i.*, u.id as user_id,u.*,r.* FROM oxy_ico i
left join oxy_admin u ON i.created_by = u.id
left join oxy_rating r on i.id = r.oxy_ico_id where i.ico_url='$icoid'");

		$icodata = $res->row();
		$pagedata['ico'] = $icodata;

		$res = $this->db->query("select * from oxy_factors  ORDER BY id ASC");

		$review_data = $res->result();

		$review_arr = array();

		$pagedata['factors'] = $review_data;

		if ($this->form_validation->run('public_review') === FALSE) {

			$this->load->layout('review', $pagedata);
		}

}
	

public function review_user() {
    
    $first_name = $this->input->post('first_name');
    $password = trim($this->input->post('password'));
    $email = trim($this->input->post('email'));
    $last_name = $this->input->post('last_name');
    //$fb_id = $this->input->post('id');
    //$fb_link = $this->input->post('link');
    //$gender = $this->input->post('gender');
    $register_type = trim($this->input->post('register_type'));
    $mobi_user =  trim($this->input->post('mobile_user'));
    $otpStatus = "";
    
    $res = array();
    
    
    $review_user = $this->db->query("select * from review_users where reviewer_email='$email'");
    $review_mobile = $this->db->query("select * from review_users where reviewer_mobile ='$mobi_user'");
    
    if($review_mobile->num_rows() > 0){
        $res['code'] = 205;
        $res['msg'] = 'User Mobile Already Existed';
        echo json_encode($res);
    } else if ($review_user->num_rows() > 0) {
        $res['code'] = 202;
        $res['msg'] = 'User Email Already Existed';
        echo json_encode($res);
    }else {
        
        // create chain address for registered user
        $ch = curl_init();
        $url='http://182.18.139.198/rest_multichain/index.php/multichain/newaddress';
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
            'API-Access-Token: testapi_key'));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);
        
        
        
        
        $result=json_decode($response, true);
        $insert_data = array('table' => 'review_users',
            'insertdata' => array(
                'reviewer_first_name' => $first_name,
                'reviewer_last_name' => $last_name,
                'reviewer_email	' => $email,
                'reviewer_password	' => $password,
                'reviewer_contact' => '',
                'reviewer_mobile' => $mobi_user,
                'fb_id' => NULL,
                'fb_link' => NULL,
                'gender' => NULL,
                'wallet_balance' =>NULL,
                'register_type' => $register_type,
                'chain_address'=>trim($result['data']),
                'created_datetime' => $this->localdate('Y-m-d H:i:s')));
        
        //echo $register_type;
        
        $insertion = $this->globalmodel->insert_data($insert_data);
        
        echo $insertion;
        
        if ($insertion) {
            
            $session_data_set = array('review_user_session_id' => $this->db->insert_id(),
                'review_user_session_name' => $first_name,
                'review_user_session_email' => $email,
                'review_user_session_mobile' => $mobi_user,
                'review_user_session_chain_address' => trim($result['data']));
            $this->session->set_userdata($session_data_set);
            // curl function for to get created chain address wallet balance
            $ch = curl_init();
            $fields = trim($result['data']);
            $fields = json_encode($fields);
            
            
            if($register_type == "Investor"){
                $wallet_balance = 0;
            }else{
                $url='http://182.18.139.198/rest_multichain/index.php/multichain/chain_address';
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                    'API-Access-Token: testapi_key'));
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                $response = curl_exec($ch);
                curl_close($ch);
                $result=json_decode($response, true);
                $wallet_balance = $result['data'];
            }
            // balance of created chain address with asset name
            $res['wallet']=$wallet_balance;
            
            $res['code'] = 200;
            $res['msg'] = 'user created';
            
            
            $postEmail = trim($this->session->userdata('email'));
            $postEmail = json_encode($postEmail);
            
            // Welcome Email Starts
                $enc = base64_encode($email);
                $otp = base_url() . "index" . $enc;
                $mail_list = array($this->input->post('email'));
                $subject = "Welcome to TetraBank.io";
                $this->session->set_userdata(array("register_otp"=>$otp,"register_email"=>$this->input->post('email'),"password_rest"=>"yes"));
                $body = $this->welcomeEmail(array("name" => $first_name));
				$mail_response = $this->smtp_mail($mail_list, $subject, $body);
				$res['mail']=$mail_response;
                //$this->globalmodel->update($this->config->item('users'),array('pp_email' =>$this->input->post('email')));
            // Welcome Email Ends 
            
            echo json_encode($res);
            
            /*
             $createStream = "http://182.18.139.198/rest_multichain/index.php/multichain/create_stream";
             curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
             'API-Access-Token: testapi_key'));
             curl_setopt($ch, CURLOPT_URL, $createStream);
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
             curl_setopt($ch, CURLOPT_HEADER, FALSE);
             curl_setopt($ch, CURLOPT_POST, TRUE);
             curl_setopt($ch, CURLOPT_POSTFIELDS, $postEmail);
             curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
             curl_close($ch);
             */
            //Publish to the multichan
            
            
        } else {
            $res['code'] = 202;
            $res['msg'] = 'something wrong';
            echo json_encode($res);
        }
    }
}



	
	public function review_submit() {
		$this->db->trans_begin();
		$rating1 = $this->input->post('rating1');
		$rating2 = $this->input->post('rating2');
		$rating3 = $this->input->post('rating3');
		$rating4 = $this->input->post('rating4');
		$rating5 = $this->input->post('rating5');
		$rating6 = $this->input->post('rating6');
		$rating7 = $this->input->post('rating7');
		$rating8 = $this->input->post('rating8');
		$rating9 = $this->input->post('rating9');
		$rating10 = $this->input->post('rating10');
		$review_user = $this->session->userdata('review_user_session_id');
		$review_ico = $this->input->post('oxy_id');

		$review_exist = $this->db->query("select * from public_rating_hdr where rating_ico_id='$review_ico' and public_user_id='$review_user'");
		$ico_url = $this->session->userdata('ico_url');
		if ($review_exist->num_rows() > 0) {
			$this->session->set_userdata(array('create_status' => 'exist'));
			redirect('review/' . $ico_url);
		}
		$rating = $rating1 + $rating2 + $rating3 + $rating4 + $rating5 + $rating6 + $rating7 + $rating8 + $rating9 + $rating10;
		$rating = $rating / 10;

		$insert_data = array('table' => 'public_rating_hdr',
			'insertdata' => array(
				'rating_ico_id' => $review_ico,
				'rating' => $rating,
				'public_user_id' => $review_user,
				'created_datetime' => $this->localdate('Y-m-d H:i:s'),
				'updated_datetime' => $this->localdate('Y-m-d H:i:s')));

		$insertion = $this->globalmodel->insert_data($insert_data);

		$public_rating_id = $this->db->insert_id();

		$insert_data = array('table' => 'public_rating_dtl',
			'insertdata' => array(
				'public_rating_id' => $public_rating_id,
				'rating1' => $rating1,
				'rating2' => $rating2,
				'rating3' => $rating3,
				'rating4' => $rating4,
				'rating5' => $rating5,
				'rating6' => $rating6,
				'rating7' => $rating7,
				'rating8' => $rating8,
				'rating9' => $rating9,
				'rating10' => $rating10,
				'rating_ico_id' => $review_ico,
				'public_user_id' => $review_user,
				'created_datetime' => $this->localdate('Y-m-d H:i:s'),
				'updated_datetime' => $this->localdate('Y-m-d H:i:s')));

		$insertion = $this->globalmodel->insert_data($insert_data);
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
		} else {
			$this->db->trans_commit();
		}

		if ($insertion) {
			redirect('api/review_success');
			$this->session->unset_userdata('ico_url');

		}

	}

	public function review_user_login() {

		$password = trim($this->input->post('password'));
		$email = trim($this->input->post('email'));

		$review_user = $this->db->query("select * from review_users where 	reviewer_email='$email' and reviewer_password='$password'");
		if ($review_user->num_rows() > 0) {
			$review_user = $review_user->row();
			$session_data_set = array('review_user_session_id' => $review_user->public_review_user_id, 'review_user_session_name' => $review_user->reviewer_first_name, 'review_user_session_email' => $review_user->reviewer_email, 'review_user_session_mobile' => $review_user->reviewer_mobile , 'review_user_session_chain_address' => trim($review_user->chain_address));
			$this->session->set_userdata($session_data_set);

			$res['code'] = 300;
			$res['msg'] = 'login success';
			echo json_encode($res);

		} else {

			$res['code'] = 301;
			$res['msg'] = 'login failed';
			echo json_encode($res);

		}

	}

	public function review_success() {

		$this->load->layout('review_success');
	}

	public function post_comment() {

		$comment = $this->input->post('comment');
		$rating_id = $this->input->post('rating_id');
		$ico_id = $this->input->post('ico_id');
		$review_user = $this->session->userdata('review_user_session_id');

		$review_exist = $this->db->query("select * from public_comment where public_rating_id='$rating_id' and public_user_id='$review_user' and rating_ico_id='$ico_id'");
		if ($review_exist->num_rows() > 0) {
			$res['code'] = 402;
			$res['msg'] = 'exist';
			echo json_encode($res);
		} else {
			$insert_data = array('table' => 'public_comment',
				'insertdata' => array(
					'public_rating_id' => $rating_id,
					'comment' => $comment,
					'public_user_id' => $review_user,
					'rating_ico_id' => $ico_id,
					'created_datetime' => $this->localdate('Y-m-d H:i:s'),
					'updated_datetime' => $this->localdate('Y-m-d H:i:s')));

			$insertion = $this->globalmodel->insert_data($insert_data);
			if ($insertion) {
				$res['code'] = 400;
				$res['msg'] = 'comment fialed';
				echo json_encode($res);

			} else {

				$res['code'] = 401;
				$res['msg'] = 'comment success';
				echo json_encode($res);

			}

		}

	}

	public function videos() {
		$data = $this->db->query("select iv.* from oxy_videos iv  ORDER BY iv.video_id ASC");

		if ($data->num_rows() > 0) {

			$data = $data->result();

		} else {
			$data = array();
		}
		$pagedata['oxy_videos'] = $data;

		$this->load->layout("videos", $pagedata);

	}

	public function getuserrating() {

		$rating_id = $this->input->post('rating_id');
		$ico_id = $this->input->post('ico_id');

		$ratingdata = $this->db->query("SELECT r.*,u.reviewer_first_name as rname FROM `public_rating_dtl` r left join review_users u on u.public_review_user_id= r.public_user_id where r.public_rating_id='$rating_id' and r.rating_ico_id ='$ico_id' ORDER BY r.public_rating_id ASC");
		$result = array();

		if ($ratingdata->num_rows() > 0) {
			$ratingdata = $ratingdata->result_array();
			$result['rating'] = $ratingdata;
		} else {
			$result['rating'] = array();

		}
		$fact = $this->db->query("SELECT factor FROM `oxy_factors` ORDER BY id  ASC");
		if ($fact->num_rows() > 0) {
			$fact = $fact->result();
			$result['factors'] = $fact;

		} else {
			$result['factors'] = array();

		}
		echo $this->load->view('rating_info', $result, true);

	}

	public function forgotpassword() {
		if (empty($this->session->userdata('review_user_session_id'))) {
			$data['page_title'] = 'TetraBank || Password Reset';
			$this->load->layout('forgotpassword', $data);
		} else {
			redirect('/');
		}

	}

	public function kYC() {

		$session_user=$this->session->userdata('review_user_session_id');
        $pagedata = array();
        $user_id = $this->session->userdata('review_user_session_id');
        $repeated_user = $this->db->query("select * from kyc_ico where user_id='$user_id'");
        $govt_categories=$this->db->query('select govt_cat_id, category_name from govt_category where status=1');
        $res = $govt_categories->result();
        $pagedata['govt_category'] = $res;
		
		

        

		if ($this->form_validation->run('uploadkyc') === FALSE) {
			if($repeated_user->num_rows() > 0){
    			$this->session->set_userdata('message', 'repeated_user');
    		} 
		} else {
			if($repeated_user->num_rows() > 0){
	    		$this->session->set_userdata('message', 'repeated_user');
	    }

		//echo"here too";		
		//$this->load->library('upload');
        $first_name =$this->input->post('kyc_first_name');
		$govt_id_no = $this->input->post('govt_id_no');
        $user_id = $this->session->userdata('review_user_session_id');
        $address=$this->input->post('address');
		$email=$this->input->post('email');
		$govt_id_no=$this->input->post('govt_id_no');
		$govt_id_image=$this->input->post('govt_id_image');
		$selfie_passport=$this->input->post('selfie_passport');
		$govt_category=$this->input->post('govt_category');
		$mobile_number = $this->input->post('mobile');
        $file_name = preg_replace("/[^a-zA-Z0-9\s]/", "", trim($govt_id_image));
       	$file_name = str_replace(' ', '_', $file_name);
		

        $this->upload->initialize(array('upload_path' => 'uploads/govt_id/',
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => FALSE,
			'file_name' => $file_name,
			'max_size' => '150000',
		));
		


		if ($this->upload->do_upload('govt_id_image')) {
			
			 //echo("iam inside successfully");

				$upload_data1 = $this->upload->data();
				$file_ext1 = $upload_data1['file_name'];
				$ext1 = substr($file_ext1, strpos($file_ext1, ".") + 1);

				
			$this->upload->initialize(array('upload_path' => 'uploads/passports',
			 	'allowed_types' => "gif|jpg|png|jpeg|pdf",
			 	'overwrite' => FALSE,
		     	'file_name' => $file_name,
				'width' => '100',
				'max_size' => '1500',
			));

       if ($this->upload->do_upload('selfie_passport')) {
				$upload_data = $this->upload->data();
				$file_ext = $upload_data['file_name'];
				$ext = substr($file_ext, strpos($file_ext, ".") + 1);
			
				$insert_data = array('table'=>'kyc_ico',
			    'insertdata' => array( 'email' => $email,
			    				'chain_address' => $address,
			    				'govt_id_name' => $govt_category,
								'govt_id_image' => $file_ext1,
								'selfie_passport'=> $file_ext,	
								'first_name' => $first_name,
								'govt_id_no' =>$govt_id_no,
								'kyc_status' => 'pending',
								'mobile_number' => $mobile_number,
								'uploaded_date' =>	$this->localdate('Y-m-d H:i:s'),
								'user_id' => $user_id,

							)
							);
							


				 $insertion = $this->globalmodel->insert_data($insert_data);
				echo $insertion;
				if($insertion){
				 $this->session->set_userdata('message', 'success');

				$ch = curl_init();
			    $fields = array(
			 	'address' => trim($this->session->userdata('review_user_session_chain_address')),
			 	  'upload_text' =>bin2hex($govt_id_no),
			 	  'name' => trim($this->session->userdata('review_user_session_name')),
			 	 
			 	);
			
			$ch = curl_init();
			// $fields = trim($this->session->userdata('review_user_session_chain_address'));
			 $fields = json_encode($fields);

			//echo $fields;
			$url='http://182.18.139.198/rest_multichain/index.php/multichain/publish_to_stream';
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
			  'API-Access-Token: testapi_key'));
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			$response = curl_exec($ch);		
			//echo $response;
			curl_close($ch);
			$result=json_decode($response, true);
			//echo $result;
			
			if($result['data']['result_address'] != NULL)
			{
			
			$result['res_code']= 200;
			$result['res_msg']='Your kyc details are published in blockchain';
			//echo $result['res_msg'];
			//echo $result['data']['result_address'];
			 
           }
			
			else{
				//$result['res_msg']= "stream published";
				$result['res_code']=201;
				$result['res_msg']='Your kyc details are not published in blockchain,Please try again';
				//echo $result;
                }

               

           }
			//echo "inserted into db";	

			}else {
				$this->session->set_userdata('file_status', 'passport_fail');
			}
		} else{
			$this->session->set_userdata('file_status', 'govt_id_fail');
		 }
	}
	$data = $this->db->query("select u.*,m.status as catalog_status from review_users u  LEFT JOIN merchant_outlets m  ON u.public_review_user_id = m.user_id where u.public_review_user_id=$session_user");
	$kyc_status = $this->db->query("select kyc_status from kyc_ico where user_id = $user_id");

		if ($kyc_status->num_rows() > 0) {
			$kyc_status = $kyc_status->row();
		} else {
			$kyc_status = array();
		}

		if ($data->num_rows() > 0) {
		
		// curl function for to get created chain address wallet balance
			$ch = curl_init();
			 $fields = trim($this->session->userdata('review_user_session_chain_address'));
			 $fields = json_encode($fields);
			$url='http://182.18.139.198/rest_multichain/index.php/multichain/getwalletbalance';
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
			  'API-Access-Token: testapi_key'));
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			$response = curl_exec($ch);		
			curl_close($ch);
			$result=json_decode($response, true);
			$wallet_balance=$result['data'];

			$wallet_balance=json_decode($wallet_balance['balance']);

			if(!empty($wallet_balance)){
				$pagedata['wallet']=$wallet_balance[0];
				
			$this->session->set_userdata('session_user_wallet_balance',$wallet_balance[0]->qty);

			}else{
				$pagedata['wallet']= new stdClass();
				$pagedata['wallet']->qty=0;
				$this->session->set_userdata('session_user_wallet_balance',$pagedata['wallet']->qty);
			}
			 // balance of created chain address with asset name


			$data = $data->row();
			
			/* Transaction list start*/
			
				$ch = curl_init();
			 $user['address'] = trim($this->session->userdata('review_user_session_chain_address'));
			 $address = json_encode($user);
			$url='http://182.18.139.198/rest_multichain/index.php/multichain/listaddresstransactions';
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
			  'API-Access-Token: testapi_key'));
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $address);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			$trans_response = curl_exec($ch);		
			curl_close($ch);
			
			$transaction=json_decode($trans_response, true);
			$trans_data=json_decode($transaction['data']);
			
			//echo '<pre>';
			//echo json_encode( $trans_data);exit;
			
			
			
		} else {
			$data = array();
		}

	$pagedata['kyc_status'] = $kyc_status;	
	$pagedata['profile'] = $data;
	$this->load->layout('kyc',$pagedata);


	}

	public function forgot_password() {
		if (

			$this->input->post('email') != '') {
			$query = $this->globalmodel->get_values_where($this->config->item('review_users'), array('reviewer_email' => $_POST['email']));
			// Print_r($query);
			// echo $this->db->last_query();
			//Print_r($query[0]->User_Id);
			//exit();
			if ($query) {
				$data = $this->input->post('email') . "||" . $query[0]->public_review_user_id . "||" . date('dmyhis');
				$enc = base64_encode($data);
				$otp = base_url() . "api/resetpassword/" . $enc;
				$mail_list = array($this->input->post('email'));
				$subject = "Email verification Link";
				//$this->session->set_userdata(array("register_otp"=>$otp,"register_email"=>$this->input->post('email'),"password_rest"=>"yes"));
				$body = $this->email_tmpl_otp(array("name" => $query[0]->reviewer_first_name, "otp" => $otp));
				$mail_response = $this->smtp_mail($mail_list, $subject, $body);
				//$this->globalmodel->update($this->config->item('users'),array("otp"=>$otp),array('pp_email' =>$this->input->post('email')));
				if ($mail_response) {
					$this->globalmodel->update($this->config->item('review_users'), array('forgot_password' => 1), array('reviewer_email' => $query[0]->reviewer_email));
					echo "success";
				} else {
					echo "fail";
				}
			} else {
				echo "notexist";
			}
		} else {

			echo 'fail';
		}
	}


	public function resetpassword($data) {
		$res = explode('||', base64_decode($data));
		//$res[0] is email and $res[1] is userid
		// echo json_encode($res);exit;
		$query = $this->globalmodel->get_values_where($this->config->item('review_users'), array('reviewer_email' => $res[0], 'public_review_user_id' => $res[1]));
		if ($query[0]->forgot_password == 1) {
			$pagedata['reviewer_first_name'] = $query[0]->reviewer_first_name;
			$pagedata['reviewer_email'] = $query[0]->reviewer_email;
			$pagedata['page_title'] = 'TetraBank | Reset Password';
			$this->load->layout('resetpassword', $pagedata);

		} else {
			redirect('/');
		}

	}

	public function update_password() {
		if ($this->input->post('r_password') != "") {
			$password = trim($this->input->post('r_password'));
			$user_email = trim($this->input->post('reviewer_email'));
			$forgot_password = 0;
			$update = $this->globalmodel->update($this->config->item('review_users'), array('forgot_password' => $forgot_password, 'reviewer_password' => $password), array('reviewer_email' => $user_email));
			if ($update) {
				echo 'success';

			} else {
				echo 'fail';
			}
		} else {
			redirect('/');

		}
	}
	
	
	public function contactus_email(){
		
		$name=trim($this->input->post('name'));
		$email=trim($this->input->post('email'));
		$mobile=trim($this->input->post('mobile'));
		$message=trim($this->input->post('message'));
		$mail_list='kris@bmvcoin.com';
		
		$subject='TetraBank Enquire';
		$body='Contact Person name:-&nbsp;'.$name.'<br>Contact Email:-&nbsp;'.$email.'<br>Contact Number:-&nbsp;'.$mobile.'<br><br>Message:-&nbsp;'.$message.'<br>';
		
		$mail_response = $this->smtp_mail($mail_list, $subject, $body);
		if($mail_response){
			echo 200;
			
		}else{
			echo 201;
	}
	}



	public function profile(){

	$session_user=$this->session->userdata('review_user_session_id');
	$pagedata=array();
	
	if($session_user){

		$data = $this->db->query("select u.*,m.status as catalog_status from review_users u  LEFT JOIN merchant_outlets m  ON u.public_review_user_id = m.user_id where u.public_review_user_id=$session_user");
				if ($data->num_rows() >0){
					$profile=$data->row();
					if($profile->register_type =='I') redirect('overview');
				}
		// $data = $this->db->query("select u.*,m.status as catalog_status from review_users u  LEFT JOIN merchant_outlets m  ON u.public_review_user_id = m.user_id where u.public_review_user_id=$session_user");


	$data = $this->db->query("(SELECT p.company_name,p.company_website,p.company_logo,p.id,p.country,p.rating,p.fb_url,p.twitter_url,p.linkedin_url,p.ico_status,p.start_date,p.end_date,p.ico_url,p.created_by,p.ico_status,p.company_description,avg(rh.rating) as public_rating,'latest_ico' AS ico_type
FROM oxy_ico p  left join public_rating_hdr rh on p.id=rh.rating_ico_id where p.ico_status='Publish' and p.rating!=0 and p.ico_premium = '0' GROUP BY p.company_name ORDER BY p.rating,p.created_date DESC limit 5)
UNION ALL

(SELECT p.company_name,p.company_website,p.company_logo,p.id,p.country,p.rating,p.fb_url,p.twitter_url,p.linkedin_url,p.ico_status,p.start_date,p.end_date,p.ico_url,p.created_by,p.ico_status,p.company_description
,avg(rh.rating) as public_rating,'premium_ico' AS ico_type
FROM oxy_ico p left join public_rating_hdr rh on p.id=rh.rating_ico_id where p.ico_status='Publish' and p.rating!=0 and p.ico_premium = '1' GROUP BY p.company_name ORDER BY p.created_date DESC limit 5)
UNION ALL

(SELECT p.company_name,p.company_website,p.company_logo,p.id,p.country,p.rating,p.fb_url,p.twitter_url,p.linkedin_url,p.ico_status,p.start_date,p.end_date,p.ico_url,p.created_by,p.ico_status,p.company_description, avg(rh.rating) as public_rating,'future_ico' AS ico_type
FROM oxy_ico p left join public_rating_hdr rh on p.id=rh.rating_ico_id where p.ico_status='Publish' and p.start_date > NOW() GROUP BY p.company_name ORDER BY p.created_date DESC  limit 5)
UNION ALL
(SELECT p.company_name,p.company_website,p.company_logo,p.id,p.country,p.rating,p.fb_url,p.twitter_url,p.linkedin_url,p.ico_status,p.start_date,p.end_date,p.ico_url,p.created_by,p.ico_status,p.company_description
,avg(rh.rating) as public_rating,'completed_ico' AS ico_type FROM oxy_ico p  left join public_rating_hdr rh on p.id=rh.rating_ico_id where p.ico_status='Publish' and p.end_date < NOW() GROUP BY p.company_name ORDER BY p.created_date DESC  limit 5)
UNION ALL
(SELECT p.company_name,p.company_website,p.company_logo,p.id,p.country,p.rating,p.fb_url,p.twitter_url,p.linkedin_url,p.ico_status,p.start_date,p.end_date,p.ico_url,p.created_by,p.ico_status,p.company_description,avg(rh.rating) as public_rating,
'running_ico' AS ico_type
FROM oxy_ico p  left join public_rating_hdr rh on p.id=rh.rating_ico_id where p.ico_status='Publish' and p.rating!=0 and p.start_date <= NOW() and p.end_date > NOW() GROUP BY p.company_name ORDER BY p.created_date DESC  limit 5)"
		);

	//$pagedata['userdata'] = $data;

		if ($data->num_rows()) {
			$ico = $data->result();

		} else {
			$ico = array();
		}

		$oxy_videos = $this->db->query('select * from oxy_videos order by video_id DESC limit 5');

		if ($oxy_videos->num_rows()) {
			$oxy_videos = $oxy_videos->result();

		} else {
			$oxy_videos = array();
		}

		$ico_result = array();

		$publish = 'running_ico';
		$future = 'future_ico';
		$completed = 'completed_ico';
		$latest = 'latest_ico';
		$premium = 'premium_ico';
		$ico_result = array();
		$no_repeat = 0;

		$ico_result['premium_ico'] = array_filter($ico, function ($item) use ($premium) {

			if (stripos($item->ico_type, $premium) !== false) {
				return true;

			}

			return array();
		});

		$ico_result['latest_ico'] = array_filter($ico, function ($item) use ($latest) {

			if (stripos($item->ico_type, $latest) !== false) {
				return true;

			}

			return array();
		});

		$ico_result['running_ico'] = array_filter($ico, function ($item) use ($publish) {

			if (stripos($item->ico_type, $publish) !== false) {
				return true;

			}

			return array();
		});
		$ico_result['future_ico'] = array_filter($ico, function ($item) use ($future) {
			if (stripos($item->ico_type, $future) !== false) {
				return true;
			}
			return array();
		});

		$ico_result['completed_ico'] = array_filter($ico, function ($item) use ($completed) {
			if (stripos($item->ico_type, $completed) !== false) {
				return true;
			}
			return array();
		});

		$pagedata['icodata'] = $ico_result;
		$pagedata['oxy_videos'] = $oxy_videos;
		$data = $this->db->query("select u.*,m.status as catalog_status from review_users u  LEFT JOIN merchant_outlets m  ON u.public_review_user_id = m.user_id where u.public_review_user_id=$session_user");
		if ($data->num_rows() > 0) {
		
		// curl function for to get created chain address wallet balance
			$ch = curl_init();
			 $fields = trim($this->session->userdata('review_user_session_chain_address'));
			 $fields = json_encode($fields);
			$url='http://182.18.139.198/rest_multichain/index.php/multichain/getwalletbalance';
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
			  'API-Access-Token: testapi_key'));
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			$response = curl_exec($ch);		
			curl_close($ch);
			$result=json_decode($response, true);
			$wallet_balance=$result['data'];

			$wallet_balance=json_decode($wallet_balance['balance']);

			if(!empty($wallet_balance)){
				$pagedata['wallet']=$wallet_balance[0];
				
			$this->session->set_userdata('session_user_wallet_balance',$wallet_balance[0]->qty);

			}else{
				$pagedata['wallet']= new stdClass();
				$pagedata['wallet']->qty=0;
				$this->session->set_userdata('session_user_wallet_balance',$pagedata['wallet']->qty);
			}
			 // balance of created chain address with asset name


			$data = $data->row();
			
			/* Transaction list start*/
			
				$ch = curl_init();
			 $user['address'] = trim($this->session->userdata('review_user_session_chain_address'));
			 $address = json_encode($user);
			$url='http://182.18.139.198/rest_multichain/index.php/multichain/listaddresstransactions';
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
			  'API-Access-Token: testapi_key'));
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $address);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			$trans_response = curl_exec($ch);		
			curl_close($ch);
			
			$transaction=json_decode($trans_response, true);
			$trans_data=json_decode($transaction['data']);
			
			//echo '<pre>';
			//echo json_encode( $trans_data);exit;
			
			
			
		} else {
			$data = array();
		}
		$where="and u.public_review_user_id != '$session_user'";
		$user_list = $this->db->query("(SELECT u.*,m.*,m.status as catalog_status from review_users u 
		left join  `merchant_outlets` m on u.public_review_user_id=m.user_id	
		where u.register_type='Merchant' $where)
							UNION ALL
							(SELECT  u.*,m.*,m.status as catalog_status from review_users u 
		left join  `merchant_outlets` m on u.public_review_user_id=m.user_id	
		where  u.register_type='Individual' $where)");
							
		/*To upload category of govt authorised ids*/


$govt_cat_result = array();

$govt_categories=$this->db->query('select govt_cat_id, category_name from govt_category where status=1');

$res = $govt_categories->result();

$pagedata['govt_category'] = $res;





/*.....*/

		$categories =$this->db->query("SELECT c.* FROM categories c left join merchant_outlets m on c.Store_ID = m.store_id  where m.user_id = ".$session_user)->result();
		
		$products =$this->db->query("SELECT p.*,c.Category_name FROM products p LEFT JOIN categories c ON p.Cat_ID = c.Cat_ID AND p.Store_ID = c.Store_ID LEFT JOIN  merchant_outlets m	on p.Store_ID = m.store_id where  m.user_id = ".$session_user)->result();
			
		if ($user_list->num_rows() > 0) {
			$user_list=$user_list->result();

		}else{
			$user_list=array();
		}
		$list = array();

		$merchant = 'Merchant';
		$individual = 'Individual';

		$list['Merchant'] = array_filter($user_list, function ($item) use ($merchant) {

			if (stripos($item->register_type, $merchant) !== false) {
				return true;

			}

			return array();
		});


		$list['Individual'] = array_filter($user_list, function ($item) use ($individual) {

			if (stripos($item->register_type, $individual) !== false) {
				return true;

			}

			return array();
		});

		$pagedata['users']=$list;

		$pagedata['profile'] = $data;
		
        $pagedata['categories'] = $categories;
        $pagedata['products'] = $products;
		$pagedata['transactions']=$trans_data;


		//var_dump($pagedata['products']);exit;
		$this->load->layout("profile", $pagedata);
	}else{
		redirect('/');
	}
	

}








public function merchant_profile_update(){
$company_name=$this->input->post('company_name');
$area=$this->input->post('area');
$address=$this->input->post('address');
$state=$this->input->post('state');
$pincode=$this->input->post('pincode');
$country=$this->input->post('country');
$catalog_status=$this->input->post('status');
//echo "$company_name";

$session_user=$this->session->userdata('review_user_session_id');
//echo "update merchant_outlets set status = ".$catalog_status." where user_id = ".$session_user;

$update_status=$this->db->query("update merchant_outlets set status = ".$catalog_status." where user_id = ".$session_user);

			$update = $this->globalmodel->update($this->config->item('review_users'), array('company_name' => $company_name, 'company_address1' => $area, 'company_address2'=>$address, 'pincode'=>$pincode, 'country'=>$country, 'state' =>$state), array('public_review_user_id' => $session_user));
			
			if ($update) {
				$res['res_code']=200;
				//$res['res_msg']=$register_type;

			} else {
				$res['res_code']=201;
				$res['res_msg']='register_type not defined';
			}

}


public function individual_profile_update(){
$first_name=$this->input->post('first_name');
$last_name=$this->input->post('last_name');
$area=$this->input->post('area');
$address=$this->input->post('address');
$state=$this->input->post('state');
$pincode=$this->input->post('pincode');
$country=$this->input->post('country');

$session_user=$this->session->userdata('review_user_session_id');
			$update = $this->globalmodel->update($this->config->item('review_users'), array('reviewer_first_name' => $first_name,'reviewer_last_name' => $last_name, 'company_address1' => $area, 'company_address2'=>$address, 'pincode'=>$pincode, 'country'=>$country, 'state' =>$state), array('public_review_user_id' => $session_user));
			if ($update) {
				$res['res_code']=200;
				$res['res_msg']=$register_type;

			} else {
				$res['res_code']=201;
				$res['res_msg']='register_type not defined';
			}


}

public function check_register_type(){
	$session_user=$this->session->userdata('review_user_session_id');
	if($session_user){
		$data = $this->db->query("select register_type from review_users where public_review_user_id=$session_user");
		if ($data->num_rows() > 0) {
			$user=$data->row();
			$res=array();
			if($user->register_type == NULL || $user->register_type =='' ){
				$res['res_code']=201;
				$res['res_msg']='false';
			}else{
				$res['res_code']=200;
				$res['res_msg']=$user->register_type;
			}

			
		}else{
			$res['res_code']=202;
				$res['res_msg']='false';
		}
	}else{
		$res['res_code']=203;
				$res['res_msg']='false';

	}

	echo json_encode($res);


}

public function register_type_update(){
if ($this->input->post('register_type') != "") {
			$register_type = trim($this->input->post('register_type'));
			$session_user=$this->session->userdata('review_user_session_id');
			$update = $this->globalmodel->update($this->config->item('review_users'), array('register_type' => $register_type), array('public_review_user_id' => $session_user));
			if ($update) {
				$res['res_code']=200;
				$res['res_msg']=$register_type;

			} else {
				$res['res_code']=201;
				$res['res_msg']='register_type not defined';
			}
		} else {
			$res['res_code']=201;
				$res['res_msg']='register_type not defined';

		}
		echo json_encode($res);


}



public function transfer_asset_balance(){


	$to_address=trim($this->input->post('to_address'));
	$transfer_balance=trim($this->input->post('transfer_balance'));
	$res=array();


		// curl function for transfer asset  balance
			$ch = curl_init();
			 $fields = array(
			 	'from_address' => trim($this->session->userdata('review_user_session_chain_address')),
			 	 'to_address' => $to_address,
			 	  'transfer_balance' => $transfer_balance
			 	);

			 $fields = json_encode($fields);
			$url='http://182.18.139.198/rest_multichain/index.php/multichain/asset_balance_transfer';
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
			  'API-Access-Token: testapi_key'));
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			$response = curl_exec($ch);		
			curl_close($ch);
			$result=json_decode($response, true);
			// $wallet_balance=$result['data'];
			// $wallet_balance=json_decode($wallet_balance);

				if($result['data']['balance'] == NULL || $result['data']['balance'] ==''){
					$res['code']=201;
					$res['msg']='Insufficient balance or no permissions';
				}else{
					$res['code']=200;
					$res['msg']='Balance transferred';

				}

				echo json_encode($res);


}


public function getaddress_balance(){

	$address=$this->input->post('address');

	$res=array();
	// curl function for to get created chain address wallet balance
			$ch = curl_init();
			 $fields = trim($address);
			 $fields = json_encode($fields);
			$url='http://182.18.139.198/rest_multichain/index.php/multichain/getwalletbalance';
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
			  'API-Access-Token: testapi_key'));
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			$response = curl_exec($ch);		
			curl_close($ch);
			$result=json_decode($response, true);
			$wallet_balance=$result['data'];
			$wallet_balance=json_decode($wallet_balance['balance']);

					// balance of created chain address with asset name
					$pagedata['wallet']=$wallet_balance[0];

				$res['balance']=$wallet_balance[0];

				echo json_encode($res);



}
  public function categories_add(){
  $session_user=$this->session->userdata('review_user_session_id');	
	$category_name=$_POST['category_name'];
	$cat_id=$_POST['cat_id'];
	$status=$_POST['status'];
    $store_data =$this->db->query("SELECT store_id  FROM merchant_outlets where user_id =".$session_user)->row();
	$store_id=$store_data->store_id;
	
	if($cat_id=='')
	{
		/* $res =$this->db->query("SELECT max(s.Cat_ID)+1 as Cat_ID,m.store_id FROM seq_no s left join  merchant_outlets m on m.Store_ID=s.Store_ID where m.user_id=".$session_user)->row(); */
		
		$res =$this->db->query("SELECT max(Cat_ID)+1 as Cat_ID FROM seq_no  where Store_ID='".$store_id."'")->row();
		//var_dump($res);
		$cat_id=$res->Cat_ID;
		$insert_data = array('table'=>'categories',
							  'insertdata' => array( 'Store_ID'=>$store_id,
													 'Cat_ID'=>$cat_id,
													 'Category_name' => $category_name,
													 'status'=>$status,
													 'Created_Datetime' =>date('Y-m-d H:i:s')
													
													)
							);
							
		$insertion = $this->globalmodel->insert_data($insert_data);
		$this->db->query("update seq_no set Cat_ID = ".$cat_id.",Updated_Datetime = NOW() where Store_ID='".$store_id."'");
		if($insertion){
			 $result['msg']="Category added successfully";
			echo json_encode($result); 
		}
		else
		{
			$result['msg']="Error.Try again";
			echo json_encode($result);
		}
		  
	}
	else
	{
		$updation=$this->db->query("update categories set Category_name = '".$category_name."',status=".$status.",Updated_Datetime = NOW() where Cat_ID = ".$cat_id." and Store_ID='".$store_id."'" );
		if($updation){
			 $result['msg']="Category updated successfully";
			echo json_encode($result); 
		}
		else
		{
			$result['msg']="Error.Try again";
			echo json_encode($result);
		}
		
	}
  }
	public function products_add()
	{
	$session_user=$this->session->userdata('review_user_session_id');		
	$cat_id=$_POST['cat_id'];
	$product_name=$_POST['product_name'];
	$product_short_name=$_POST['product_short_name'];
	$price=$_POST['price'];
	$points=$_POST['points'];
	$prod_num=$_POST['prod_num'];
	$status=$_POST['status'];
	$store_data =$this->db->query("SELECT store_id  FROM merchant_outlets where user_id =".$session_user." and status=1")->row();
	$store_id=$store_data->store_id;
	
		if($prod_num==''){
		
		/* $res =$this->db->query("SELECT max(s.ProdNum)+1 as product_id FROM seq_no s left join merchant_outlets m on m.Store_ID = s.Store_ID where m.user_id =".$session_user." and m.store_id='".$store_id."'")->row();
           */
		    $res =$this->db->query("SELECT max(ProdNum)+1 as product_id FROM seq_no WHERE store_ID='".$store_id."'")->row();
           
		$ProdNum=$res->product_id;
		 $insert_data = array('table'=>'products',
							  'insertdata' => array( 'Store_ID'=>$store_id,
													 'Cat_ID'=>$cat_id,
													 'ProdNum'=>$ProdNum,
													 'ProdName' => $product_name,
													  'ProdShortName' => $product_short_name,
													  'price' => $price,
													  'points' => $points,
													   'status'=>$status,
													   'Created_Datetime' =>date('Y-m-d H:i:s')
													  )
							);
		$insertion = $this->globalmodel->insert_data($insert_data); 

		$this->db->query("UPDATE `seq_no` SET `ProdNum` = ".$ProdNum.",Updated_Datetime = NOW() WHERE Store_ID = '".$store_id."'");
			 if($insertion){ 
			     $result['code']=200;
				 $result['msg']="Product added successfully";
				echo json_encode($result);  
			 }
			 else
			 {
				  $result['code']=201;
				  $result['msg']="Error.Try again";
				echo json_encode($result); 
				 
			 }
		}
		else
		{
			
			$updation=$this->db->query("update products set ProdName = '".$product_name."',Cat_ID = ".$cat_id.",ProdShortName='".$product_short_name."',price =".$price." ,points =".$points.",status=".$status.",Updated_Datetime = NOW() where ProdNum=".$prod_num." and Store_ID = '".$store_id."'" );
			//echo $this->db->last_query();exit;
				 if($updation){ 
				  $result['code']=200;
					 $result['msg']="Product updated successfully";
					echo json_encode($result);  
				 }
				 else
				 {
					  $result['code']=201;
					  $result['msg']="Error.Try again";
					echo json_encode($result); 
					 
				 }
		
		}
	}


public function sendInvestorInterest(){
	$icoOwnerEmail = $this->input->post('_icoOwnerEmail');
	//$icoOwnerEmail = "subbu@oxyloans.com";
	$icoName = $this->input->post('_icoName');
	$investorName = $this->input->post('_investorName');
	$investorEmail = $this->input->post('_investorEmail');
	$icoOwner_contact = $this->input->post('_icoOwner_contact');
	$investor_contact = $this->input->post('_investor_contact');
	//$investor_contact = (int)$investor_contact;
	
	$insert_data = array('table'=>"interests_ico",
	    'insertdata' => array(
	        'ico_name' => $icoName,
	        'ico_owner_email' => $icoOwnerEmail,
	        'investor_name' => $investorName,
	        'investor_email' => $investorEmail,	   
	        'ico_owner_phone' => $icoOwner_contact,
	        'investor_phone' => $investor_contact
	       ));
	
	$insertion = $this->globalmodel->insert_data($insert_data);
	$this->session->set_userdata('message', 'success');
	
	
	exit();
	
	$enc = base64_encode($icoOwnerEmail);
	$otp = base_url() . "index" . $enc;
	$mail_list = array($icoOwnerEmail);
	 //$this->email->cc('email1@test.com,email2@test.com,email3@test.com');

	//$mail_list = array("subbu@oxyloans.com");
	$subject = $investorName . " is interested to invest in your ICO.";
	$this->session->set_userdata(array("register_otp"=>$otp,"register_email"=>$this->input->post('icoOwnerEmail'),"password_rest"=>"yes"));
	$body = $this->sendNotificationEmail(array('name' => $icoName, 'investorName' => $investorName));
	$mail_response = $this->smtp_mail($mail_list, $subject, $body);
	$ccemail = $this->smtp_mail("radhakrishna.t@oxychain.io", $subject, $body);

		//$this->globalmodel->update($this->config->item('users'),array("otp"=>$otp),array('pp_email' =>$this->input->post('icoOwnerEmail')));
		
	/* Sending Email to Investor Starts
		$enc = base64_encode($icoOwnerEmail);
		$otp = base_url() . "index" . $enc;
		$mail_list = array("subbu@oxyloans.com");
		$subject = "Some one is intrested to invest your in " . $icoName;
		$this->session->set_userdata(array("register_otp"=>$otp,"register_email"=>$this->input->post('email'),"password_rest"=>"yes"));
		$body = $this->sendNotificationEmail(array("icoOwner" => $icoOwnerEmail));
		$mail_response = $this->smtp_mail($mail_list, $subject, $body);
		// $this->globalmodel->update($this->config->item('users'),array("otp"=>$otp),array('pp_email' =>"subbu@oxyloans.com"));
	*/
}

public function userAuth() {
    if ($this->session->userdata('oxy_user_session_id') == TRUE) {
        return TRUE;
    } else {
        $this->load->layout('userAuth');
    }
}

public function verifyMobileNumber(){
    $mobi_user =  trim($this->input->post('mobile_user'));
    $email = trim($this->input->post('email'));
    //echo $mobi_user;
    $review_mobile = $this->db->query("select * from review_users where reviewer_mobile ='$mobi_user'");
    $review_user = $this->db->query("select * from review_users where reviewer_email='$email'");
    //echo  $review_mobile->num_rows(); 
    if ($review_user->num_rows() > 0) {
        $res['code'] = 202;
        $res['msg'] = 'User Email Already Existed';
        //echo json_encode($res);
    } else if($review_mobile->num_rows() > 0){
        $res['code'] = 205;
        $res['msg'] = 'User Mobile Already Existed';
    } else{
        $res['code'] = 300;
        $res['msg'] = 'verification success';
    }
    echo json_encode($res, true);
    
    //$result = json_decode($response, true);
    
}
public function viewpeerInfo($kyc_id){

	$kyc_id = $kyc_id;

	$session_user=$this->session->userdata('review_user_session_id');
    $pagedata = array();	
    $user_id = $this->session->userdata('review_user_session_id');

	//$pagedata = $kui;
	$kyc_status = $this->db->query("select kyc_status from kyc_ico where user_id = $kyc_id");
	if ($kyc_status->num_rows() > 0) {
		$kyc_status = $kyc_status->row();
	} else {
		$kyc_status = array();
	}
	$pagedata['kyc_status'] = $kyc_status;
	/*KYC STATUS ENDS*/

	$data = $this->db->query("select u.*,m.status as catalog_status from review_users u  LEFT JOIN merchant_outlets m  ON u.public_review_user_id = m.user_id where u.public_review_user_id=$session_user");
		

		if ($data->num_rows() > 0) {
		
		// curl function for to get created chain address wallet balance
			$ch = curl_init();
			 $fields = trim($this->session->userdata('review_user_session_chain_address'));
			 $fields = json_encode($fields);
			$url='http://182.18.139.198/rest_multichain/index.php/multichain/getwalletbalance';
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
			  'API-Access-Token: testapi_key'));
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			$response = curl_exec($ch);		
			curl_close($ch);
			$result=json_decode($response, true);
			$wallet_balance=$result['data'];

			$wallet_balance=json_decode($wallet_balance['balance']);

			if(!empty($wallet_balance)){
				$pagedata['wallet']=$wallet_balance[0];
				
			$this->session->set_userdata('session_user_wallet_balance',$wallet_balance[0]->qty);

			}else{
				$pagedata['wallet']= new stdClass();
				$pagedata['wallet']->qty=0;
				$this->session->set_userdata('session_user_wallet_balance',$pagedata['wallet']->qty);
			}
			 // balance of created chain address with asset name


			$data = $data->row();
		} else {
			$data = array();
		}
		$pagedata['profile'] = $data;

		/*Profile Data Ends*/

		/*Requested ID Data Fetch and save START*/
		$user_id = $this->session->userdata('review_user_session_id');
		$user_type = $this->session->userdata('oxy_user_type');
				
		
		$res = $this->db->query("select k.kyc_id as kyc_id,k.email as email,k.*,r.* from kyc_ico k left join review_users r on k.user_id = r.public_review_user_id where k.kyc_id='$kyc_id' group by k.uploaded_date DESC" );


		//$data_kyc = $res->row();

		if ($res->num_rows() > 0) {
			$data_kyc = $res->row();

		} else {
			$data_kyc = array();
		}


		//echo "Now before edit_kyc page";
	

		$kyc_dataRows = $this->db->query("select * from kyc_ico WHERE user_id = $kyc_id");

		if ($kyc_dataRows->num_rows() > 0) {
			$kyc_data = $kyc_dataRows->row();

		} else {
			$kyc_data = array();
		}

		$pagedata['kyc_data'] = $kyc_data;

		$getUserData = $this->db->query("select * from review_users WHERE public_review_user_id = $kyc_id");


		if ($getUserData->num_rows() > 0) {
			$userRow = $getUserData->row();

		} else {
			$userRow = array();
		}
		$pagedata['userRow'] = $userRow;
		$this->session->set_userdata('message', 'success');	//echo $comments;
		$this->load->layout('viewpeerInfo',$pagedata);
	}


	public function saveKycApproveData(){
		// Saving the data from the viewpeerInfo

		$this->db->trans_begin();
		$chain_address=$this->input->post('chain_address');
		$updatedby = $this->input->post('updatedby');
		$purpose = $this->input->post('purpose');
		$comments = $this->input->post('comments');
		$kyc_status = $this->input->post('kyc_status');
		$kyc_id = $this->input->post('kycid');
		
		echo $kyc_id;



		$insert_data = array(
			'comments' => $comments,
		    'kyc_status' => $kyc_status,
			'Admin_updated_date' => $this->localdate('Y-m-d H:i:s'),
			'chain_address' => $chain_address,
			'UpdatedBy' => $updatedby,
			'Purpose' => $purpose,
		);	

		$where = array('user_id' => $kyc_id);
		$table = 'kyc_ico';
		$updation = $this->globalmodel->update($table, $insert_data, $where);


		if ($updation) {

			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
			} else {
					$this->db->trans_commit();
			}
		}
			
	}	

		
	public function viewkycPeersList(){
		$session_user=$this->session->userdata('review_user_session_id');
	    $pagedata = array();	
	    $user_id = $this->session->userdata('review_user_session_id');
	    
	    $repeated_user = $this->db->query("select * from kyc_ico where user_id='$user_id'");
	    $govt_categories=$this->db->query('select govt_cat_id, category_name from govt_category where status=1');
	    $res = $govt_categories->result();
	    $pagedata['govt_category'] = $res;	

	    $data = $this->db->query("select u.*,m.status as catalog_status from review_users u  LEFT JOIN merchant_outlets m  ON u.public_review_user_id = m.user_id where u.public_review_user_id=$session_user");
		

		if ($data->num_rows() > 0) {
		
		// curl function for to get created chain address wallet balance
			$ch = curl_init();
			 $fields = trim($this->session->userdata('review_user_session_chain_address'));
			 $fields = json_encode($fields);
			$url='http://182.18.139.198/rest_multichain/index.php/multichain/getwalletbalance';
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
			  'API-Access-Token: testapi_key'));
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			$response = curl_exec($ch);		
			curl_close($ch);
			$result=json_decode($response, true);
			$wallet_balance=$result['data'];

			$wallet_balance=json_decode($wallet_balance['balance']);

			if(!empty($wallet_balance)){
				$pagedata['wallet']=$wallet_balance[0];
				
			$this->session->set_userdata('session_user_wallet_balance',$wallet_balance[0]->qty);

			}else{
				$pagedata['wallet']= new stdClass();
				$pagedata['wallet']->qty=0;
				$this->session->set_userdata('session_user_wallet_balance',$pagedata['wallet']->qty);
			}
			 // balance of created chain address with asset name


			$data = $data->row();
		} else {
			$data = array();
		}

		$kyc_status = $this->db->query("select kyc_status from kyc_ico where user_id = $user_id");

			if ($kyc_status->num_rows() > 0) {
				$kyc_status = $kyc_status->row();
			} else {
				$kyc_status = array();
			}


	$kyc_list = $this->db->query("select k.kyc_id as kyc_id,k.email as email,k.*,r.* from kyc_ico k left join review_users r on k.user_id = r.public_review_user_id group by k.uploaded_date DESC");

		if ($kyc_list->num_rows() > 0) {
			$kyc_datalist = $kyc_list->result();
		} else {
			$kyc_datalist = array();
		}	

		
		$pagedata['kyc_status'] = $kyc_status;	
		$pagedata['profile'] = $data;
		$pagedata['kyc_list'] = $kyc_datalist;
		$this->load->layout('viewkycPeersList',$pagedata);		
	}
	public function smtp_test(){
		$subject ="Test subject";
		$body="Test msg";
		$mail_list='shiva.pusuluri17@gmail.com';
		echo $this->smtp_mail($mail_list, $subject, $body);
	}
}