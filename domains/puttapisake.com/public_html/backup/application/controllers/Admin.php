<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Project_model');
    }

    public function index()
    {
        $content["content"] = $this->load->view("admin_view", null , TRUE);
        $this->load->view("template/admin_template", $content);
    }

    public function product()
    {
        $content["content"] = $this->load->view("admin_product_view", null , TRUE);
        $this->load->view("template/admin_template", $content);
    }

    public function product_type()
    {
        $content["content"] = $this->load->view("admin_product_type_view", null , TRUE);
        $this->load->view("template/admin_template", $content);
    }

    public function product_group()
    {
        $content["content"] = $this->load->view("admin_product_group_view", null , TRUE);
        $this->load->view("template/admin_template", $content);
    }

    public function meansurement()
    {
        $content["content"] = $this->load->view("admin_meansurement_view", null , TRUE);
        $this->load->view("template/admin_template", $content);
    }
}