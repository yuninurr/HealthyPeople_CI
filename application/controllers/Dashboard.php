<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates_admin/admin_header');
        $this->load->view('templates_admin/admin_sidebar');
        $this->load->view('templates_admin/admin_topbar');
        $this->load->view('admin/dashboard');
        $this->load->view('templates_admin/admin_footer');
    }
}
