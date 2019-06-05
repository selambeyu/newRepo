<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct() { 
        parent::__construct(); 
		$this->load->view('template/institute/header');
       
	
          
     } 
	
	public function index()
	{
		$this->load->view('user/institute/profile/view');
	}

	
}
?>