<?php 

class MY_Controller extends CI_Controller
{
	
	var $permission = array();

	public function __construct() 
	{
		parent::__construct();

		$group_data = array();
		if(empty($this->session->userdata('logged_in'))) {
			$session_data = array('logged_in' => FALSE);
			$this->session->set_userdata($session_data);
		}
		else {
			$user_id = $this->session->userdata('user_id');
			
			
		}
	}

	

	//this is a template for front page users
	public function render_template_front($page = null, $data = array())
	{

		$this->load->view('templates/header',$data);
		$this->load->view('templates/top',$data);
		$this->load->view('templates/front/nav_menu',$data);
		$this->load->view('templates/side_menubar',$data);
		$this->load->view($page, $data);
		$this->load->view('templates/footer',$data);
	}

	//this is a template for admin pages
	public function render_template_admin($page = null, $data = array())
	{

		$this->load->view('templates/header',$data);
		$this->load->view('templates/top',$data);
		$this->load->view('templates/admin/nav_menu',$data);
		$this->load->view('templates/side_menubar',$data);
		$this->load->view($page, $data);
		$this->load->view('templates/footer',$data);
	}

	
	//this is a template for community
	public function render_template_institute($page = null, $data = array())
	{

		$this->load->view('template/institute/header',$data);
		$this->load->view('template/institute/footer',$data);
		// $this->load->view('templates/top',$data);
		// $this->load->view('templates/institute/nav_menu',$data);
        // $this->load->view('users/community/layouts/side-nav',$data);
		// $this->load->view($page, $data);
		// $this->load->view('templates/footer',$data);
	}
	//this is a template for institute
	public function render_template_community($page = null, $data = array())
	{

		$this->load->view('templates/header',$data);
		$this->load->view('templates/top',$data);
		$this->load->view('templates/front/nav_menu',$data);
		$this->load->view('templates/side_menubar',$data);
		$this->load->view($page, $data);
		$this->load->view('templates/footer',$data);
	}
	//this is a template for member
	public function render_template_member($page = null, $data = array())
	{

		$this->load->view('templates/header',$data);
		$this->load->view('templates/top',$data);
		$this->load->view('templates/front/nav_menu',$data);
		$this->load->view('templates/side_menubar',$data);
		$this->load->view($page, $data);
		$this->load->view('templates/footer',$data);
	}
	public function logged_in($data = array())
	{
		$session_data = $this->session->userdata();

		if($session_data['logged_in'] == True) {
			//$this->render_template_admin('users/home', $data);
		}
		else{

		}
	}
}

