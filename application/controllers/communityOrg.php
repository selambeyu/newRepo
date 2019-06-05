<?php defined('BASEPATH') OR exit('No direct script access allowed');
class CommunityOrg extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->view('template/institute/header');
    }

    public function index(){
        $this->load->view('user/institute/communityOrg');
    }




}
?>