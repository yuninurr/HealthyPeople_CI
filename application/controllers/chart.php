<?php
defined('BASEPATH') or exit('No direct script access allowed');

class chart extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates_admin/admin_header');
        $this->load->view('templates_admin/admin_sidebar');
        $this->load->view('templates_admin/admin_topbar');
        $this->load->view('admin/chart');
        $this->load->view('templates_admin/admin_footer');
    }
}
