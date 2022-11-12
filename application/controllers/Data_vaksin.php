<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_vaksin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vaksin_model');
    }

    public function index()
    {

        $data['vaksin'] = $this->Vaksin_model->get_data('vaksin')->result();
        $data['type'] = $this->Vaksin_model->get_data('type')->result();

        $this->load->view('templates_admin/admin_header');
        $this->load->view('templates_admin/admin_sidebar');
        $this->load->view('templates_admin/admin_topbar', $data);
        $this->load->view('admin/data_vaksin', $data);
        $this->load->view('templates_admin/admin_footer');
    }

    public function destroy_datavaksin($id)
    {
        $where = array('id_vaksin' => $id);
        $this->Vaksin_model->destroy_vaksin($where, 'vaksin');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Removed successfull </div>');
        redirect('data_vaksin');
    }

    public function tambah_vaksin()
    {
        $data['vaksin'] = $this->Vaksin_model->get_data('vaksin')->result();
        $data['type'] = $this->Vaksin_model->get_data('type')->result();
        $this->load->view('templates_admin/admin_header');
        $this->load->view('templates_admin/admin_sidebar');
        $this->load->view('templates_admin/admin_topbar', $data);
        $this->load->view('admin/data_vaksin', $data);
        $this->load->view('templates_admin/admin_footer');
    }

    public function detail_vaksin($id)
    {
        $data['vaksin'] = $this->Vaksin_model->ambil_id_vaksin($id);
        $data['type'] = $this->Vaksin_model->get_data('type')->result();
        $this->load->view('templates_admin/admin_header');
        $this->load->view('templates_admin/admin_sidebar');
        $this->load->view('templates_admin/admin_topbar');
        $this->load->view('admin/data_vaksin', $data);
        $this->load->view('templates_admin/admin_footer');
    }

    public function tambah_vaksin_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_vaksin();
        } else {
            $kode_type          = $this->input->post('kode_type');
            $nama               = $this->input->post('nama');
            $jumlah             = $this->input->post('jumlah');
            $status             = $this->input->post('status');

            $data = array(
                'kode_type'         => $kode_type,
                'nama'              => $nama,
                'jumlah'            => $jumlah,
                'status'            => $status,
            );

            $this->Vaksin_model->insert_data($data, 'vaksin');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> Berhasil</div>');
            redirect('data_vaksin');
        }
    }

    public function update_vaksin_aksi()
    {
        $this->_rules();

        $data['vaksin'] = $this->Vaksin_model->get_data('vaksin')->result();
        $data['type'] = $this->Vaksin_model->get_data('type')->result();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar');
            $this->load->view('admin/data_vaksin', $data);
            $this->load->view('templates_admin/admin_footer');
        } else {
            $id                 = $this->input->post('id_vaksin');
            $kode_type          = $this->input->post('kode_type');
            $nama               = $this->input->post('nama');
            $jumlah             = $this->input->post('jumlah');
            $status             = $this->input->post('status');

            $data = array(
                'kode_type'         => $kode_type,
                'nama'              => $nama,
                'jumlah'            => $jumlah,
                'status'            => $status,
            );

            $where = array(
                'id_vaksin' => $id
            );

            $this->Vaksin_model->update_data('vaksin', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> Satuan Kerja Changed</div>');
            redirect('data_vaksin');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_type', 'Kode Vaksin', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
    }
    public function chart()
    {

        $data['vaksin'] = $this->Vaksin_model->get_data('vaksin')->result();
        $data['type'] = $this->Vaksin_model->get_data('type')->result();

        $this->load->view('templates_admin/admin_header');
        $this->load->view('templates_admin/admin_sidebar');
        $this->load->view('templates_admin/admin_topbar', $data);
        $this->load->view('admin/chart', $data);
        $this->load->view('templates_admin/admin_footer');
    }
    public function expdf()
    {
        require './assets/vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        $datavaksin = $this->Vaksin_model->getAllVaksin();
        $data = $this->load->view('pdf/mpdf', ['semuavaksin' => $datavaksin], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }

    public function exexcel()
    {
        $data['vaksin'] = $this->Vaksin_model->getAllVaksin();
        $this->load->view('admin/exel', $data);
    }
}
