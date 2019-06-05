<?php

class Model_punishment extends CI_Model{

    public function getAccused(){
       
            $this->db->select('*'); 
            $this->db->from('accused_person');
            $query = $this->db->get();
            return $query->result();
    

    }

    public function get_accused($id){
        $this->db->where('accused_id',$id);
        $get_data=$this->db->get('accused_person');
        return $get_data->row();

    }

    public function addAccused($data){
        $insert_query=$this->db->insert('accused_person',$data);
        return $insert_query; 
       
    

    }

    public function updateAccused($id,$data){
        $this->db->where('accused_id',$id);
        $this->db->update('accused_person',$data);
        return true;

    }


    public function deleteAccused($id){
        $this->db->where('accused_id',$id);
        $this->db->delete('accused_person');

    }
}

?>