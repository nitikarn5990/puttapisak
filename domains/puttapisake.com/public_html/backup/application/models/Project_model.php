<?php
class Project_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function login($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_user_type','tbl_user_type.usertype_ID = tbl_user.usertype_ID');
        $this->db->where('user_Username',$data['user_Username']);
        $this->db->where('user_Password',$data['user_Password']);
        $qr = $this->db->get();
        $data = $qr->result_array();
        return $data;
    }



}