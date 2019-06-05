<?php

Class Common_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function encrypt_script($string)
    {
        $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $string, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
           return( $qEncoded );
    }

    function decrypt_script($string)
    {
        $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
           return( $qDecoded );
    }

    function insert($table,$data)
    {
        $this->db->insert($table,$data);
        //return $this->db->insert_id();
    }

    function get_users()
    {
        $this->db->select('id, CONCAT(`first_name`," ", `last_name`) AS `name` ,email,mobile_no,gender,address');
        $result = $this->db->get('user_master');
        return $result->result();
    }

    public function get_user_detail($id){
        $this->db->select('*');
        $this->db->where('id',$id);
        $result = $this->db->get('user_master');
        return $result->result();
    }

    public function update($table,$data,$where)
    {
        if(!empty($where))
            $this->db->where($where);
            $this->db->update($table, $data);
    }

    public function delete($table, $where)
    {

        $this->db->where($where);
        $this->db->delete($table);
    }
}
?>