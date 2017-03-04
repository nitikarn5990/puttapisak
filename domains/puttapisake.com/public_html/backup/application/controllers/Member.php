<?php
class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Project_model');
    }

    public function index()
    {
        if($this->check_login()==true){

            redirect('/Member/product');
        }
    else
        {
            $this->load->view("login_view");
        }

    }

    public function login()
    {
        $data = array(
            'user_Username' => $this->input->post('user_Username'),
            'user_Password' => $this->input->post('user_Password')
        );
        $get = $this->Project_model->login($data);
        if(!empty($get[0]))
        {
            if($get[0]['usertype_Name']=='admin')
            {
                $this->set_session($get[0]);
                redirect('/Member/product');
            } else {
                $this->product();
            }
        } else {
            redirect('Member');

        }
    }

    public function set_session($data)
    {
        $userdata = array(
            'user_ID' => $data['user_ID'],
            'user_Username' => $data['user_Username'],
            'user_Name' => $data['user_Name'],
            'user_Lastname' => $data['user_Lastname'],
            'user_Sex' => $data['user_Sex'],
            'user_Birthday' => $data['user_Birthday'],
            'user_Address' => $data['user_Address'],
            'user_Mobile' => $data['user_Mobile'],
            'user_Email' => $data['user_Email'],
            'user_Picture' => $data['user_Picture'],
            'user_Status' => $data['user_Status'],
            'usertype_ID' => $data['usertype_ID'],
            'usertype_Name' => $data['usertype_Name'],
            'usertype_Status' => $data['usertype_Status'],
            'is_login' => '1'
        );
        $test = $this->session->set_userdata($userdata);


    }

    public function check_login()
    {
        if($this->session->userdata('is_login') == '1')
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function admin()
    {
        if($this->check_login())
        {
            $this->load->view('manage_view');
        }
        else
        {
            redirect('member');
        }

    }

    public function product()
    {
        if($this->check_login())
        {
            $this->load->view('product_view');
        }
        else
        {
            redirect('member');
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('member');
    }

    public function load_session()
    {
        $test = $this->session->all_userdata();
        $testt = $this->session->userdata();
        echo json_encode($test);
    }
}