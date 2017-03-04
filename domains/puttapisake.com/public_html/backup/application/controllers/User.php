<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Project_model');
    }

    public function index()
    {
        $content["content"] = $this->load->view("home_view", null , TRUE);
        $this->load->view("template/front", $content);
    }

    public function login()
    {
        $content["content"] = $this->load->view("login_view", null , TRUE);
        $this->load->view("template/admin_template", $content);
    }
}