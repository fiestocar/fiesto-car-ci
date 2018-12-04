<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori_anggota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_anggota_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'kategori_anggota/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kategori_anggota/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kategori_anggota/index.html';
            $config['first_url'] = base_url() . 'kategori_anggota/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kategori_anggota_model->total_rows($q);
        $kategori_anggota = $this->Kategori_anggota_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kategori_anggota_data' => $kategori_anggota,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        //$this->load->view('kategori_anggota/kategori_anggota_list', $data);
        $this->template->load('template','kategori_anggota/kategori_anggota_list', $data);
    }

    public function read($id)
    {
        $row = $this->Kategori_anggota_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kategori' => $row->id_kategori,
		'kategori' => $row->kategori,
	    );
            //$this->load->view('kategori_anggota/kategori_anggota_read', $data);
            $this->template->load('template','kategori_anggota/kategori_anggota_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_anggota'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kategori_anggota/create_action'),
	    'id_kategori' => set_value('id_kategori'),
	    'kategori' => set_value('kategori'),
	);
        //$this->load->view('kategori_anggota/kategori_anggota_form', $data);
        $this->template->load('template','kategori_anggota/kategori_anggota_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kategori' => $this->input->post('kategori',TRUE),
	    );

            $this->Kategori_anggota_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kategori_anggota'));
        }
    }

    public function update($id)
    {
        $row = $this->Kategori_anggota_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kategori_anggota/update_action'),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'kategori' => set_value('kategori', $row->kategori),
	    );
            //$this->load->view('kategori_anggota/kategori_anggota_form', $data);
            $this->template->load('template','kategori_anggota/kategori_anggota_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_anggota'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kategori', TRUE));
        } else {
            $data = array(
		'kategori' => $this->input->post('kategori',TRUE),
	    );

            $this->Kategori_anggota_model->update($this->input->post('id_kategori', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kategori_anggota'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kategori_anggota_model->get_by_id($id);

        if ($row) {
            $this->Kategori_anggota_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kategori_anggota'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_anggota'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');

	$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kategori_anggota.xls";
        $judul = "kategori_anggota";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kategori");

	foreach ($this->Kategori_anggota_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kategori);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=kategori_anggota.doc");

        $data = array(
            'kategori_anggota_data' => $this->Kategori_anggota_model->get_all(),
            'start' => 0
        );

        $this->load->view('kategori_anggota/kategori_anggota_doc',$data);
    }

}

/* End of file Kategori_anggota.php */
/* Location: ./application/controllers/Kategori_anggota.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-29 14:05:34 */
/* http://harviacode.com */
