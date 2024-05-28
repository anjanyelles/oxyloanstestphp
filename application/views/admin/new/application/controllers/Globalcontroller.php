<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Globalcontroller extends CI_Controller {

	//datetime functions

	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
	}

	public function localdate($data) {
		if ($data = "Y-m-d H:i:s") {
			return date("Y-m-d H:i:s");
		} else if ($data = "Y-m-d") {
			return date("Y-m-d");
		} else {
			return date($data);

		}
	}

	//login session check  method
	public function logincheck() {
	if ($this->session->userdata('oxy_user_session_id') == TRUE) {
			return TRUE;
		} else {
			redirect('login');
		}
	}

	public function menu_data($role_id) {
		$user_type = $this->session->userdata('oxy_User_Type');
		if ($user_type == 1) {
			$User_Type = "b.User_Type = $user_type";
		} elseif ($user_type == 2) {
			$User_Type = "b.User_Type IN (1,2)";
		} elseif ($user_type == 3) {
			$User_Type = "b.User_Type IN (1,2,3)";
		}
		if ($user_type == 1) {
			$query = "SELECT b.*
FROM  role_permissions a join menu_name b ON a.menu_code=b.menu_code
WHERE  a.role_id = '$role_id' AND " . $User_Type . "  AND b.status='1' group by b.id ORDER BY b.id";
		} else {
			$query = "SELECT b.*
FROM  menu_name b
WHERE " . $User_Type . " AND b.status='1' group by b.id ORDER BY b.id";
		}
		$res = $this->db->query($query);
		if ($res->num_rows() > 0) {
			return $res->result();
		} else {
			return array();
		}
		return array();
	}

	public function oxy_check($table, $id) {

		$pq = $this->db->query("select * from $table where oxy_ico_id='$id'");
		if ($pq->num_rows() > 0) {
			return $pq->result();
		} else {
			return array();
		}

	}

	public function get_organization($store_id) {
		//$org_id=$this->session->userdata('multi_orgs');
		$q = $this->db->query("select org_id from m_stores where store_id='$store_id'")->row();
		return $q->org_id;
	}
	public function get_plans($org_id) {

		$pq = $this->db->query("select * from m_plans where org_id='$org_id' and status=1");
		if ($pq->num_rows() > 0) {
			return $pq->result();
		} else {
			return array();
		}

	}
	public function get_plan_data($org_id, $store_id, $plan_id) {

		$pd = $this->db->query("select p.*,p.tax_Id as plan_tax, t.*, r.* from m_plans p  left join registration_charges r on  p.org_id=r.org_id and p.store_id=r.store_id  left join tax_setup t on t.org_id= p.org_id and p.store_id=t.store_id and p.tax_Id= t.tax_Id where p.org_id='$org_id' and p.store_id='$store_id' and p.plan_id='$plan_id' and p.status=1 and r.status=1 and t.status=1");
		if ($pd->num_rows() > 0) {
			return $pd->row();
		} else {
			return array();
		}

	}
	public function get_members($org_id) {

		$pq = $this->db->query("select * from m_members where org_id='$org_id' and status=1");
		if ($pq->num_rows() > 0) {
			return $pq->result();
		} else {
			return array();
		}

	}
	public function valid_member_mobile($org_id, $mobile_number) {

		$pd = $this->db->query("select * from m_members where org_id='$org_id' and mobile_number='$mobile_number' and status=1");
		if ($pd->num_rows() > 0) {
			return $pd->row();
		} else {
			return array();
		}

	}

	public function valid_registration_no($org_id, $registration_no) {

		$pd = $this->db->query("select * from m_members where org_id='$org_id' and registration_no='$registration_no' and status=1");
		if ($pd->num_rows() > 0) {
			return $pd->row();
		} else {
			return array();
		}

	}
	public function get_card_info($card_number, $org_id) {

		$cards = $this->db->query("SELECT   m.*, cm.*, p.*, c.*, c.card_points as current_points FROM m_members m   left join m_card_members cm ON cm.member_id=m.member_id and m.org_id=cm.org_id left join m_cards c on cm.card_number=c.card_number and m.org_id=c.org_id left join m_plans p on cm.plan_id=p.plan_id AND cm.org_id =m.org_id WHERE cm.org_id = '$org_id' AND cm.card_number='$card_number' AND cm.card_status='1' AND p.status='1'");

		if ($cards->num_rows() > 0) {
			return $cards->row();
		} else {
			return array();
		}

	}

	public function get_member_data($org_id, $member_id) {

		$pd = $this->db->query("select m.*, cm.* from m_members m left join m_card_members cm on m.member_id=cm.member_id where m.org_id='$org_id' and m.member_id='$member_id' and m.status=1");
		if ($pd->num_rows() > 0) {
			return $pd->row();
		} else {
			return array();
		}

	}

	public function get_organization_from_all($org_id, $store_id) {

		$q = $this->db->query("select org_id from m_stores where org_id IN($org_id) and store_id='$store_id'")->row();
		return $q->org_id;
	}

	//page access checking  method
	public function pageaccess_check($page_id = '') {
		if ($page_id == '') {
			redirect('index');
		} elseif (array_key_exists($page_id, $this->session->userdata("access_pages")) == TRUE) {
			return TRUE;
		} else {
			redirect('index');
		}
	}

	//logout method
	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}

	//Ajax method for select drop down
	public function get_select_values() {
		$this->logincheck();
		$org_id = $this->session->userdata('org_id');
		$pagedata['get_result'] = $this->globalmodel->get_values_where($_GET['table_name'], array($_GET['select_field_name'] => $_GET['select_value'], 'org_id' => $org_id));
		$pagedata['option'] = array('value' => $_GET['display_value'], 'display' => $_GET['display_field_name']);
		$this->load->view('ajax/select', $pagedata);
	}

	//Ajax method for select drop down
	public function get_modal_show() {
		$pagedata['get_result'] = $this->globalmodel->get_values_where($_GET['table_name'], array($_GET['field_name'] => $_GET['value']));
		/* $select="t1.device_id as device_no,t1.*,t2.*";
			$table=array("table1_name"=>"registrations t1","table2_name"=>"system_info t2","table1_on"=>"t1.device_id","table2_on"=>"t2.device_id");
			$where=array("t1.device_id"=>$_GET['value']);
			$pagedata['get_result']=$this->globalmodel->two_left_join($select,$table,$where); */
		$this->load->view('ajax/modal_show', $pagedata);
	}

	//Ajax method for select drop down
	public function get_org() {
		$pagedata['get_result'] = $this->globalmodel->get_values_where($this->config->item($_GET['table_name']), array('u_id' => $_GET['value']));
		$this->load->view('ajax/modal_org_ajax', $pagedata);

	}

	public function smtp_mail($mail_list, $subject, $body) {
		$ci = get_instance();
		$ci->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.googlemail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "narendra@oxyloans.com";
		$config['smtp_pass'] = "9441026429";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$ci->email->initialize($config);
		$ci->email->from('support@icocube.io', 'ICOcube');
		$ci->email->to($mail_list);
		$this->email->reply_to('radhakrishna.t@icocube.io', 'ICOcube ');
		$ci->email->subject($subject);
		$ci->email->message($body);
		if ($ci->email->send()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function sms_gateway($sendsms) {
		//sms gateways

		$sendsms['method'] = 'sms';
		$sendsms['api_key'] = 'Af222bad6b0b44ad71b2299c23dc5f461';
		$sendsms['sender'] = 'SGCCMS';

//$sendsms=array('method'=>$method,'api_key'=>$api_key,'to'=>$to,'message'=>$message,'sender'=>$sender);

//curl functions using for sms gateways
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://portal.cozysms.com/api/v3/index.php");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($sendsms));
		$buffer = curl_exec($ch);
/*  if(empty ($buffer))
{ echo " buffer is empty ";}
else
{echo $buffer;exit;} */

		curl_close($ch);

	}

	public function getstoreid() {
		if ($_POST['store_id']) {
			$this->session->set_userdata('cozy_user_store_id', $_POST['store_id']);
			if ($_POST['store_name']) {
				$this->session->set_userdata('cozy_user_store_name', $_POST['store_name']);
			}

		} else {
			$this->session->unset_userdata('cozy_user_store_id');
			$this->session->unset_userdata('cozy_user_store_name');
		}

	}

	public function get_data_select_list() {
		$admin_pagedata['get_result'] = $this->globalmodel->get_values_where($_GET['table_name'], array($_GET['select_field_name'] => $_GET['select_value']));
		$admin_pagedata['option'] = array('value' => $_GET['display_value'], 'display' => $_GET['display_field_name']);
		$res = $admin_pagedata['get_result']->result();
		if ($res) {
			$this->load->view('ajax/check_list', $admin_pagedata);
		}
		/* else
			{
				echo "no";
			}
			exit; */

	}

	public function get_date() {
		$this->logincheck();
		$org_id = $this->session->userdata('org_id');
		if ($_POST['date_val']) {
			$this->session->set_userdata('cozy_user_get_date', $_POST['date_val']);

			$date_lock_status = $this->additionalModel->check_lock_date($_POST['date_val'], $_POST['store_id'], $org_id);

			//print_r($date_lock_status);
			//exit;
			//echo $lock_status=$date_lock_status['Lock_Status'];
			$add = '';
			$sno = 1;
			$store_expenses = $this->additionalModel->get_store_expenses($org_id, $_POST['date_val'], $_POST['store_id']);
			foreach ($store_expenses->result() as $data) {
				$store_id = $data->Store_ID;
				$exp_date_time = $data->Exp_Date_Time;

				$add .= '<tr class="gradeX"><td>' . $sno++ . '</td>
						<td class="center">' . $data->Description . '</td><td class="center">' . $data->Exp_Name . '</td><td class="center">' . $data->Payment_Method . '
						</td><td class="center">' . $data->Amount_Paid . '</td><td>Edit <a href=' . base_url() . 'store_expenses/edit/' . $exp_date_time . '/' . $store_id . '><i class="fa fa-edit"></i></a> | Delete <a href=' . base_url() . 'store_expenses/delete/' . $exp_date_time . ' OnClick="return confirm("Are You Sure Delete this Expenses");"><i class="fa fa-trash"></a></i></td>
					</tr>';
			}
			echo $add;
			//echo $this->load->view('ajax/get_data',$pagedata);
		} else {
			$this->session->unset_userdata('cozy_user_get_date');
		}

	}

	function buildtree($src_arr, $parent_id, $tree = array()) {
		$idx = 0;
		foreach ($src_arr as $row) {
			if ($row->parent_id == $parent_id) {

				foreach ($row as $k => $v) {
					$tree[$row->org_id][$k] = $v;
				}

				unset($src_arr[$idx]);
				$tree[$row->org_id]['children'] = $this->buildtree($src_arr, $row->org_id);

			}
			$idx++;
		}
		ksort($tree);
		return $tree;
	}

	function fetch_recursive($src_arr, $currentid, $parentfound = false, $cats = array()) {

		/* 	$rowdata = array();
					$rowdata[] = $currentid;
			foreach($src_arr as $row)
			{
				if((!$parentfound && $row['org_id'] == $currentid) || $row['parent_id'] == $currentid)
				{
					$rowdata[] =$row['org_id'];
					foreach($row['children'] as $k ){
						$rowdata[] = $k['org_id'];
					}
					$cats[] = $rowdata;
					if($row['parent_id'] == $currentid)
						$cats = array_merge($cats, $this->fetch_recursive($src_arr, $row['org_id'], true));
				}
		*/
		/*
					$query=$this->db->query("select *,@a := org_id from (SELECT org_id ,
			`parent_id`,`has_child`
			FROM `gshq_org` g)  a , (select @a:='$currentid') b where (a.parent_id =(@a) or a.org_id=(@a)) ")->result();
		*/
		$query = $this->db->query("select *, @a := CAST(concat(@a,',',(case when parent_id='0' then '' else org_id END))as CHAR) b from (SELECT org_id ,
`parent_id`,`has_child`
FROM `m_orgs` g)  a , (select @a:='$currentid') b  where find_in_set(a.parent_id ,@a) >0 or find_in_set(a.org_id,@a)>0")->result();

		//print_r($query);
		foreach ($query as $q) {
			$cats[0][] = $q->org_id;
		}

		//$a=array();
		//print_r($cats);exit;
		return $cats;
	}

	public function get_parent_org($org_id) {
		$query = $this->db->query("select org_id,parent_id from m_orgs where org_id='$org_id'")->row();
		if ($query->parent_id == '0') {
			$ret_org = $query->org_id;
		} else {
			$ret_org = $this->get_parent_org($query->parent_id);
		}
		return $ret_org;
	}

	public function get_above_parent_org($org_id, $ret_org = array()) {
		$query = $this->db->query("select org_id,parent_id from gshq_org where org_id='$org_id'")->row();
		$ret_org[] = $org_id;
		if ($query->parent_id == '0') {
			$ret_org[] = $query->org_id;
		} else {
			$ret_org = array_merge($ret_org, $this->get_parent_org($query->parent_id, $ret_org));
		}
		return $ret_org;
	}

	public function get_all_orgs_access() {

		$parent = $this->get_parent_org($this->session->userdata('org_id'));

		$organizations1 = $this->db->query("select org_id,org_name,has_child,parent_id from gshq_org")->result();

		//$parentorg=$this->get_parent_org($organizations[0]->org_id);

		//echo $parent;exit;
		$tree = $this->buildtree($organizations1, $parent);

		$list = $this->fetch_recursive($tree, $parent, true);

		$orgs = "'";
		if ($list) {
			for ($i = 0; $i < sizeof($list[key($list)]); $i++) {
				$orgs = $orgs . $list[key($list)][$i] . "','";

			}
			$orgs = substr($orgs, 0, -2);
		} else {
			$orgs = "'" . $parent . "'";
		}
		return $orgs;
	}

public function email_tmpl_otp($data) {
		$template = '<table class="content-holder" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="650" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td style="border-collapse: collapse;">
<table style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="border-collapse: collapse;" align="right">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td class="header" style="border-collapse: collapse;" bgcolor="#ffffff">
<table style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="border-collapse: collapse;" align="left" width="170">&nbsp;</td>

<td style="border-collapse: collapse;" align="right" width="66">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr class="maincontent">
<td style="border-collapse: collapse;" bgcolor="#1A237E">
<table style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="border-collapse: collapse;">&nbsp;</td>
</tr>
<tr>
<td style="border-collapse: collapse;">
<table style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="border-collapse: collapse;" align="left" valign="top" width="120">&nbsp;</td>
<td style="border-collapse: collapse;" align="center" width="420"><br /> <span style="font-family: Arial, sans-serif; font-size: 18px; line-height: 36px; color: #ffffff; font-weight: normal; white-space: nowrap; display: inline-block;"> Hello, ' . $data['name'] . '. </span> <br /> <span style="line-height: 5px;">&nbsp;</span> <br /> <span style="font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; color: #ffffff; font-weight: normal;">  </span> <br /> </td>
<td style="border-collapse: collapse;" align="right" valign="bottom" width="120">&nbsp;</td>
</tr>

</tbody>
</table>
</td>
</tr>
<tr>
<td style="border-collapse: collapse; font-size: 14px; line-height: 14px;">&nbsp;</td>
</tr>
<tr>
<td style="border-collapse: collapse;" align="center">
<table class="orderinfobox" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="550" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td style="border-collapse: collapse;" align="center" bgcolor="#FFFFFF"><span style="line-height: 14px;">&nbsp;</span> <br /> <span class="orderheader" style="font-family: Arial, sans-serif; font-size: 14px; line-height: 36px; color: #1A237E; font-weight: normal;"> Your Password Reset Link. <a href=' . $data['otp'] . '> Click here</a></span><br /> <span style="line-height: 18px;">&nbsp;</span></td>
</tr>
<tr>
<td style="border-collapse: collapse;" align="center" bgcolor="#FFFFFF"><span style="color: #1A237E;">
<a href=' . $data['otp'] . '> ' . $data['otp'] . '</a></span></td>
</tr>
<tr>
<td style="border-collapse: collapse;" align="center" bgcolor="#FFFFFF">
<table style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="500" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td style="border-collapse: collapse;"><span style="line-height: 12px;">&nbsp;</span></td>
<td style="border-collapse: collapse;"><span style="line-height: 12px;">&nbsp;</span></td>
</tr>
<tr>
<td style="border-collapse: collapse;" colspan="2">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style="border-collapse: collapse; font-size: 17px; line-height: 17px;">&nbsp;</td>
</tr>
<tr>
<td style="border-collapse: collapse;" align="center"><br /> <br /> <span class="troubletext" style="font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; color: #ffffff; font-weight: normal;"> If you have any questions about your request,<br />please <a href="#">contact us</a>.<br /> </span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style="border-collapse: collapse;" align="center" bgcolor="#f6f6f6">&nbsp;</td>
</tr>
</tbody>
</table>';

		return $template;
	}



public function welcomeEmail($data) {
	$template = '<table class="content-holder" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="650" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td style="border-collapse: collapse;">
<table style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="border-collapse: collapse;" align="right">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td class="header" style="border-collapse: collapse;" bgcolor="#ffffff">
<table style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="border-collapse: collapse;" align="left" width="170">&nbsp;</td>

<td style="border-collapse: collapse;" align="right" width="66">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr class="maincontent">
<td style="border-collapse: collapse;" bgcolor="#1A237E">
<table style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="border-collapse: collapse;">&nbsp;</td>
</tr>
<tr>
<td style="border-collapse: collapse;">
<table style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="border-collapse: collapse;" align="left" valign="top" width="120">&nbsp;</td>
<td style="border-collapse: collapse;" align="center" width="420"><br /> <span style="font-family: Arial, sans-serif; font-size: 18px; line-height: 36px; color: #ffffff; font-weight: normal; white-space: nowrap; display: inline-block;"> Hello, ' . $data['name'] . '. </span> <br /> <span style="line-height: 5px;">&nbsp;</span> <br /> <span style="font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; color: #ffffff; font-weight: normal;">  </span> <br /> </td>
<td style="border-collapse: collapse;" align="right" valign="bottom" width="120">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style="border-collapse: collapse; font-size: 14px; line-height: 14px;">&nbsp;</td>
</tr>
<tr>
<td style="border-collapse: collapse;" align="center">
<table class="orderinfobox" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="550" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td style="border-collapse: collapse;" align="center" bgcolor="#FFFFFF"><span style="line-height: 14px;">&nbsp;</span> <br /> <span class="orderheader" style="font-family: Arial, sans-serif; font-size: 14px; line-height: 36px; color: #1A237E; font-weight: normal;"> <h2>Welcome to ICOcube.io</h2></span><br /> <span style="line-height: 18px;">&nbsp;</span></td>
</tr>
<tr>
<td style="border-collapse: collapse;" align="center" bgcolor="#FFFFFF"><span style="color: #1A237E;">
Thanks for signing up :)</span></td>
</tr>
<tr>
<td style="border-collapse: collapse;" align="center" bgcolor="#FFFFFF">
<table style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="500" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td style="border-collapse: collapse;"><span style="line-height: 12px;">&nbsp;</span></td>
<td style="border-collapse: collapse;"><span style="line-height: 12px;">&nbsp;</span></td>
</tr>
<tr>
<td style="border-collapse: collapse;" colspan="2">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style="border-collapse: collapse; font-size: 17px; line-height: 17px;">&nbsp;</td>
</tr>
<tr>
<td style="border-collapse: collapse;" align="center"><br /> <br /> <span class="troubletext" style="font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; color: #ffffff; font-weight: normal;"> If you have any questions about your request,<br />please <a href="http://icocube.io/contactus">contact us</a>.<br /> </span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style="border-collapse: collapse;" align="center" bgcolor="#f6f6f6">&nbsp;</td>
</tr>
</tbody>
</table>';

		return $template;
	}


public function sendNotificationEmail($data) {
	$template = '<table class="content-holder" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="650" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td style="border-collapse: collapse;">
<table style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="border-collapse: collapse;" align="right">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td class="header" style="border-collapse: collapse;" bgcolor="#ffffff">
<table style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="border-collapse: collapse;" align="left" width="170">&nbsp;</td>

<td style="border-collapse: collapse;" align="right" width="66">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr class="maincontent">
<td style="border-collapse: collapse;" bgcolor="#1A237E">
<table style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="border-collapse: collapse;">&nbsp;</td>
</tr>
<tr>
<td style="border-collapse: collapse;">
<table style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="border-collapse: collapse;" align="left" valign="top" width="120">&nbsp;</td>
<td style="border-collapse: collapse;" align="center" width="420"><br /> <span style="font-family: Arial, sans-serif; font-size: 18px; line-height: 36px; color: #ffffff; font-weight: normal; white-space: nowrap; display: inline-block;"> Hello, ' . $data['name'] . '. </span> <br /> <span style="line-height: 5px;">&nbsp;</span> <br /> <span style="font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; color: #ffffff; font-weight: normal;">  </span> <br /> </td>
<td style="border-collapse: collapse;" align="right" valign="bottom" width="120">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style="border-collapse: collapse; font-size: 14px; line-height: 14px;">&nbsp;</td>
</tr>
<tr>
<td style="border-collapse: collapse;" align="center">
<table class="orderinfobox" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="550" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td style="border-collapse: collapse;" align="center" bgcolor="#FFFFFF"><span style="line-height: 14px;">&nbsp;</span> <br /> <span class="orderheader" style="font-family: Arial, sans-serif; font-size: 14px; line-height: 36px; color: #1A237E; font-weight: normal;"> <h2>Congratulations!</h2></span><br /> <span style="line-height: 18px;">&nbsp;</span></td>
</tr><tr><td style="border-collapse: collapse;" align="center" bgcolor="#FFFFFF"><span style="color: #1A237E;font-size:12px;">' . $data['investorName'] . ' is interested to invest in your ICO. Please contact Mr. Radhar Krishna Thatavarti to get more details.Email :- radhakrishna.t@icocube.com</span></td>
</tr>

<tr>
<td style="border-collapse: collapse;" align="center" bgcolor="#FFFFFF">
<table style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" border="0" width="500" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td style="border-collapse: collapse;"><span style="line-height: 12px;">&nbsp;</span></td>
<td style="border-collapse: collapse;"><span style="line-height: 12px;">&nbsp;</span></td>
</tr>
<tr>
<td style="border-collapse: collapse;" colspan="2">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style="border-collapse: collapse; font-size: 17px; line-height: 17px;">&nbsp;</td>
</tr>
<tr>
<td style="border-collapse: collapse;" align="center"><br /> <br /> <span class="troubletext" style="font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; color: #ffffff; font-weight: normal;"> If you have any questions about your request,<br />please <a href="http://icocube.io/contactus">contact us</a>.<br /> </span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style="border-collapse: collapse;" align="center" bgcolor="#f6f6f6">&nbsp;</td>
</tr>
</tbody>
</table>';

		return $template;
	}	


}
