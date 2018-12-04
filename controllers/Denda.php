<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Denda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Denda_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'denda/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'denda/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'denda/index.html';
            $config['first_url'] = base_url() . 'denda/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Denda_model->total_rows($q);
        $denda = $this->Denda_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'denda_data' => $denda,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        //$this->load->view('denda/denda_list', $data);
        $this->template->load('template','denda/denda_list', $data);
    }

    public function read($id)
    {
        $row = $this->Denda_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_denda' => $row->id_denda,
		'jenis_denda' => $row->jenis_denda,
		'biaya_denda' => $row->biaya_denda,
	    );
            //$this->load->view('denda/denda_read', $data);
            $this->template->load('template','denda/denda_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('denda'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('denda/create_action'),
	    'id_denda' => set_value('id_denda'),
	    'jenis_denda' => set_value('jenis_denda'),
	    'biaya_denda' => set_value('biaya_denda'),
	);
        //$this->load->view('denda/denda_form', $data);
        $this->template->load('template','denda/denda_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenis_denda' => $this->input->post('jenis_denda',TRUE),
		'biaya_denda' => $this->input->post('biaya_denda',TRUE),
	    );

            $this->Denda_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('denda'));
        }
    }

    public function update($id)
    {
        $row = $this->Denda_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('denda/update_action'),
		'id_denda' => set_value('id_denda', $row->id_denda),
		'jenis_denda' => set_value('jenis_denda', $row->jenis_denda),
		'biaya_denda' => set_value('biaya_denda', $row->biaya_denda),
	    );
            //$this->load->view('denda/denda_form', $data);
            $this->template->load('template','denda/denda_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('denda'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_denda', TRUE));
        } else {
            $data = array(
		'jenis_denda' => $this->input->post('jenis_denda',TRUE),
		'biaya_denda' => $this->input->post('biaya_denda',TRUE),
	    );

            $this->Denda_model->update($this->input->post('id_denda', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('denda'));
        }
    }

    public function delete($id)
    {
        $row = $this->Denda_model->get_by_id($id);

        if ($row) {
            $this->Denda_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('denda'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('denda'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('jenis_denda', 'jenis denda', 'trim|required');
	$this->form_validation->set_rules('biaya_denda', 'biaya denda', 'trim|required');

	$this->form_validation->set_rules('id_denda', 'id_denda', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "denda.xls";
        $judul = "denda";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Denda");
	xlsWriteLabel($tablehead, $kolomhead++, "Biaya Denda");

	foreach ($this->Denda_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_denda);
	    xlsWriteNumber($tablebody, $kolombody++, $data->biaya_denda);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=denda.doc");

        $data = array(
            'denda_data' => $this->Denda_model->get_all(),
            'start' => 0
        );

        $this->load->view('denda/denda_doc',$data);
    }

}

/* End of file Denda.php */
/* Location: ./application/controllers/Denda.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-29 13:50:24 */
/* http://harviacode.com */
