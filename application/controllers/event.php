<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

    function __construct() { 
		parent::__construct(); 
		
		$this->load->model('Common_model'); 
		$this->load->model('Model_event'); 
		$this->load->view('template/institute/header');
     } 
	
	public function index()
	{
		$data['event']=$this->model_event->getEvent();
		$this->load->view('user/institute/event/view',$data);
	}
	public function upload_image()
	{
		// assets/images/product_image
			$config['upload_path'] = 'assets/adminLte/images/event_images';
			$config['file_name'] =  uniqid();
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '1000';

			// $config['max_width']  = '1024';s
			// $config['max_height']  = '768';

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('event_images'))
			{
					$error = $this->upload->display_errors();
					return $error;
			}
			else
			{
					$data = array('upload_data' => $this->upload->data());
					$type = explode('.', $_FILES['event_images']['name']);
					$type = $type[count($type) - 1];
					
					$path = $config['upload_path'].'/'.$config['file_name'].'.'.$type;
					return ($data == true) ? $path : false;            
			}
	}


	public function create(){
		$this->load->view('user/institute/event/create');
		$data['title'] = 'Add Event';

		$this->form_validation->set_rules('event_name', 'Event name', 'required');
		$this->form_validation->set_rules('event_description', 'Event description', 'required');
		if ($this->form_validation->run() == TRUE) {
				// true case
			$upload_image = $this->upload_image();
			$data = array(
				'event_name' => $this->input->post('event_name'),
				'event_description' => $this->input->post('event_description'),
				'event_type' => $this->input->post('event_type'),
				'address' => $this->input->post('address'),
				'start_date' => $this->input->post('datetime'),
				'end_date' => $this->input->post('datetime'),
				'phone' => $this->input->post('phone_no'),
				'image' => $upload_image
				
			);


			$create = $this->model_event->creatEvent($data);
			if($create == true) {
				$this->session->set_flashdata('success', 'Successfully created');
				redirect('event/', 'refresh');
			}
			else {
				$this->session->set_flashdata('errors', 'Error occurred!!');
				redirect('event/create', 'refresh');
			}
		}
	
	}

	

	public function post_event(){

	}

	public function cancel_event(){

	}

	public function edit_event($id){
		$this->form_validation->set_rules('event_name','Event_Name','trim|required');
        $this->form_validation->set_rules('event_description','Project_Body','trim|required');
    if($this->form_validation->run()==FALSE){
		$data['event_data']=$this->model_event->get_event($id);
		$event_data=$data['event_data'];

        $this->load->view('user/institute/event/edit',$data);
       
    }else{
			$data = array(
				'event_name' => $this->input->post('event_name'),
				'event_description' => $this->input->post('event_description'),
				'event_type' => $this->input->post('event_type'),
				'address' => $this->input->post('address'),
				'start_date' => $this->input->post('datetime'),
				'end_date' => $this->input->post('datetime'),
				'phone' => $this->input->post('phone_no'),
				'image' => $upload_image
				
			);

    if($this->model_event-> updateEvent($id,$data)){
        //$this->session->set_flashdata('project_updated','Your has been Edited');
        redirect('event','refresh');
    }
    }

	}

	public function delete_event($id){
		$this->model_event->deleteEvent($id);
       
        $this->session->set_flashdata('project_deleted','You have deleted the project sucessfully');
        redirect('event/','refresh');


	}

	public function tab(){
		$this->load->view('user/institute/event/tab');
	}
}
?>