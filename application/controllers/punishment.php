<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Punishment extends CI_Controller{
    public function __construct(){
        parent ::__construct();
        $this->load->view('template/institute/header');
    }


    public function index(){
        $data['accused_person']=$this->model_punishment->getAccused();
        $this->load->view('user/institute/punishment/view',$data);
    }

    public function addAccused(){
        $this->load->view('user/institute/punishment/addAccused');
        $data['title'] = 'Add accused';

        $this->form_validation->set_rules('first_name', 'Fist name', 'required');
        $this->form_validation->set_rules('last_name', 'Last name', 'required');
        if ($this->form_validation->run() == TRUE) {
            // true case
        	// $upload_image = $this->upload_image();

        	$data = array(
        		'fist_name' => $this->input->post('first_name'),
        		'last_name' => $this->input->post('last_name'),
        		'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'start_date'=>$this->input->post('datetime'),
                'end_date'=>$this->input->post('datetime'),
                'phone_no'=>$this->input->post('phone_no')
        		
        	);

        	$create = $this->model_punishment->addAccused($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('punishment/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('punishment/create', 'refresh');
        	}
        }

    }
    public function edit_accused($id){
		$this->form_validation->set_rules('first_name','Event_Name','trim|required');
        $this->form_validation->set_rules('last_name','Project_Body','trim|required');
    if($this->form_validation->run()==FALSE){
		$data['accused_data']=$this->model_punishment->get_accused($id);
		$event_data=$data['accused_data'];

        $this->load->view('user/institute/punishment/edit',$data);
       
    }else{
			$data = array(
				'fist_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'start_date' => $this->input->post('datetime'),
				'end_date' => $this->input->post('datetime'),
				'phone_no' => $this->input->post('phone_no'),
				'age' => $this->input->post('age')
				
			);

    if($this->model_punishment->updateAccused($id,$data)){
        //$this->session->set_flashdata('project_updated','Your has been Edited');
        redirect('punishment','refresh');
    }
    }

    }
    
    public function delete_accused($id){
		$this->model_punishment->deleteAccused($id);
       
        $this->session->set_flashdata('project_deleted','You have deleted the project sucessfully');
        redirect('punishment/','refresh');


	}

}