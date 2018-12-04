<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'anggota/index.html';
            $config['first_url'] = base_url() . 'anggota/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Anggota_model->total_rows($q);
        $anggota = $this->Anggota_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'anggota_data' => $anggota,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        //$this->load->view('anggota/anggota_list', $data);
        $this->template->load('template','anggota/anggota_list', $data);
    }

    public function read($id)
    {
        $row = $this->Anggota_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_anggota' => $row->id_anggota,
		'nama_anggota' => $row->nama_anggota,
		'alamat' => $row->alamat,
		'no_ktp' => $row->no_ktp,
		'no_sim' => $row->no_sim,
		'email' => $row->email,
		'no_telepon' => $row->no_telepon,
		'id_wilayah' => $row->id_wilayah,
		'sandi' => $row->sandi,
		'id_kategori' => $row->id_kategori,
	    );
            //$this->load->view('anggota/anggota_read', $data);
            $this->template->load('template','anggota/anggota_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('anggota/create_action'),
	    'id_anggota' => set_value('id_anggota'),
	    'nama_anggota' => set_value('nama_anggota'),
	    'alamat' => set_value('alamat'),
	    'no_ktp' => set_value('no_ktp'),
	    'no_sim' => set_value('no_sim'),
	    'email' => set_value('email'),
	    'no_telepon' => set_value('no_telepon'),
	    'id_wilayah' => set_value('id_wilayah'),
	    'sandi' => set_value('sandi'),
	    'id_kategori' => set_value('id_kategori'),
	);
        //$this->load->view('anggota/anggota_form', $data);
        $this->template->load('template','anggota/anggota_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_anggota' => $this->input->post('nama_anggota',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_ktp' => $this->input->post('no_ktp',TRUE),
		'no_sim' => $this->input->post('no_sim',TRUE),
		'email' => $this->input->post('email',TRUE),
		'no_telepon' => $this->input->post('no_telepon',TRUE),
		'id_wilayah' => $this->input->post('id_wilayah',TRUE),
		'sandi' => $this->input->post('sandi',TRUE),
		'id_kategori' => $this->input->post('id_kategori',TRUE),
	    );

            $this->Anggota_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('anggota'));
        }
    }

    public function update($id)
    {
        $row = $this->Anggota_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('anggota/update_action'),
		'id_anggota' => set_value('id_anggota', $row->id_anggota),
		'nama_anggota' => set_value('nama_anggota', $row->nama_anggota),
		'alamat' => set_value('alamat', $row->alamat),
		'no_ktp' => set_value('no_ktp', $row->no_ktp),
		'no_sim' => set_value('no_sim', $row->no_sim),
		'email' => set_value('email', $row->email),
		'no_telepon' => set_value('no_telepon', $row->no_telepon),
		'id_wilayah' => set_value('id_wilayah', $row->id_wilayah),
		'sandi' => set_value('sandi', $row->sandi),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
	    );
            //$this->load->view('anggota/anggota_form', $data);
            $this->template->load('template','anggota/anggota_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_anggota', TRUE));
        } else {
            $data = array(
		'nama_anggota' => $this->input->post('nama_anggota',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_ktp' => $this->input->post('no_ktp',TRUE),
		'no_sim' => $this->input->post('no_sim',TRUE),
		'email' => $this->input->post('email',TRUE),
		'no_telepon' => $this->input->post('no_telepon',TRUE),
		'id_wilayah' => $this->input->post('id_wilayah',TRUE),
		'sandi' => $this->input->post('sandi',TRUE),
		'id_kategori' => $this->input->post('id_kategori',TRUE),
	    );

            $this->Anggota_model->update($this->input->post('id_anggota', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('anggota'));
        }
    }

    public function delete($id)
    {
        $row = $this->Anggota_model->get_by_id($id);

        if ($row) {
            $this->Anggota_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('anggota'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama_anggota', 'nama anggota', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('no_ktp', 'no ktp', 'trim|required');
	$this->form_validation->set_rules('no_sim', 'no sim', 'trim');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('no_telepon', 'no telepon', 'trim|required');
	$this->form_validation->set_rules('id_wilayah', 'id wilayah', 'trim|required');
	$this->form_validation->set_rules('sandi', 'sandi', 'trim|required');
	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');

	$this->form_validation->set_rules('id_anggota', 'id_anggota', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "anggota.xls";
        $judul = "anggota";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Anggota");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "No Ktp");
	xlsWriteLabel($tablehead, $kolomhead++, "No Sim");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "No Telepon");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Wilayah");
	xlsWriteLabel($tablehead, $kolomhead++, "Sandi");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kategori");

	foreach ($this->Anggota_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_anggota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_ktp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_sim);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_telepon);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_wilayah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sandi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kategori);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=anggota.doc");

        $data = array(
            'anggota_data' => $this->Anggota_model->get_all(),
            'start' => 0
        );

        $this->load->view('anggota/anggota_doc',$data);
    }

}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-29 13:50:48 */
/* http://harviacode.com */
