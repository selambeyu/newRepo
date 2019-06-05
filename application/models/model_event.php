<?php

class Model_event extends CI_Model{

    public function getEvent(){
       
            $this->db->select('*'); 
            $this->db->from('event');
            $query = $this->db->get();
            return $query->result();
    

    }

    public function get_event($id){
        $this->db->where('event_id',$id);
        $get_data=$this->db->get('event');
        return $get_data->row();

    }

    public function creatEvent($data){
        $insert_query=$this->db->insert('event',$data);
        return $insert_query; 
       
    

    }

    public function updateEvent($id,$data){
        $this->db->where('event_id',$id);
        $this->db->update('event',$data);
        return true;

    }


    public function deleteEvent($id){
        $this->db->where('event_id',$id);
        $this->db->delete('event');

    }
}

?>