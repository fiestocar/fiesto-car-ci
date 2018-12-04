<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mobil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mobil_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'mobil/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mobil/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mobil/index.html';
            $config['first_url'] = base_url() . 'mobil/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mobil_model->total_rows($q);
        $mobil = $this->Mobil_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mobil_data' => $mobil,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        //$this->load->view('mobil/mobil_list', $data);
        $this->template->load('template','mobil/mobil_list', $data);
    }

    public function read($id)
    {
        $row = $this->Mobil_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_mobil' => $row->id_mobil,
		'no_plat' => $row->no_plat,
		'merk' => $row->merk,
		'warna' => $row->warna,
		'tahun' => $row->tahun,
		'id_jenis' => $row->id_jenis,
		'id_wilayah' => $row->id_wilayah,
		'harga_sewa' => $row->harga_sewa,
		'id_kondisi' => $row->id_kondisi,
	    );
            //$this->load->view('mobil/mobil_read', $data);
            $this->template->load('template','mobil/mobil_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mobil'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mobil/create_action'),
	    'id_mobil' => set_value('id_mobil'),
	    'no_plat' => set_value('no_plat'),
	    'merk' => set_value('merk'),
	    'warna' => set_value('warna'),
	    'tahun' => set_value('tahun'),
	    'id_jenis' => set_value('id_jenis'),
	    'id_wilayah' => set_value('id_wilayah'),
	    'harga_sewa' => set_value('harga_sewa'),
	    'id_kondisi' => set_value('id_kondisi'),
	);
        //$this->load->view('mobil/mobil_form', $data);
        $this->template->load('template','mobil/mobil_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_plat' => $this->input->post('no_plat',TRUE),
		'merk' => $this->input->post('merk',TRUE),
		'warna' => $this->input->post('warna',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'id_jenis' => $this->input->post('id_jenis',TRUE),
		'id_wilayah' => $this->input->post('id_wilayah',TRUE),
		'harga_sewa' => $this->input->post('harga_sewa',TRUE),
		'id_kondisi' => $this->input->post('id_kondisi',TRUE),
	    );

            $this->Mobil_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mobil'));
        }
    }

    public function update($id)
    {
        $row = $this->Mobil_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mobil/update_action'),
		'id_mobil' => set_value('id_mobil', $row->id_mobil),
		'no_plat' => set_value('no_plat', $row->no_plat),
		'merk' => set_value('merk', $row->merk),
		'warna' => set_value('warna', $row->warna),
		'tahun' => set_value('tahun', $row->tahun),
		'id_jenis' => set_value('id_jenis', $row->id_jenis),
		'id_wilayah' => set_value('id_wilayah', $row->id_wilayah),
		'harga_sewa' => set_value('harga_sewa', $row->harga_sewa),
		'id_kondisi' => set_value('id_kondisi', $row->id_kondisi),
	    );
            //$this->load->view('mobil/mobil_form', $data);
            $this->template->load('template','mobil/mobil_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mobil'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_mobil', TRUE));
        } else {
            $data = array(
		'no_plat' => $this->input->post('no_plat',TRUE),
		'merk' => $this->input->post('merk',TRUE),
		'warna' => $this->input->post('warna',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'id_jenis' => $this->input->post('id_jenis',TRUE),
		'id_wilayah' => $this->input->post('id_wilayah',TRUE),
		'harga_sewa' => $this->input->post('harga_sewa',TRUE),
		'id_kondisi' => $this->input->post('id_kondisi',TRUE),
	    );

            $this->Mobil_model->update($this->input->post('id_mobil', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mobil'));
        }
    }

    public function delete($id)
    {
        $row = $this->Mobil_model->get_by_id($id);

        if ($row) {
            $this->Mobil_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mobil'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mobil'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('no_plat', 'no plat', 'trim|required');
	$this->form_validation->set_rules('merk', 'merk', 'trim|required');
	$this->form_validation->set_rules('warna', 'warna', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	$this->form_validation->set_rules('id_jenis', 'id jenis', 'trim|required');
	$this->form_validation->set_rules('id_wilayah', 'id wilayah', 'trim|required');
	$this->form_validation->set_rules('harga_sewa', 'harga sewa', 'trim|required');
	$this->form_validation->set_rules('id_kondisi', 'id kondisi', 'trim|required');

	$this->form_validation->set_rules('id_mobil', 'id_mobil', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mobil.xls";
        $judul = "mobil";
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
	xlsWriteLabel($tablehead, $kolomhead++, "No Plat");
	xlsWriteLabel($tablehead, $kolomhead++, "Merk");
	xlsWriteLabel($tablehead, $kolomhead++, "Warna");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Jenis");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Wilayah");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Sewa");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kondisi");

	foreach ($this->Mobil_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_plat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->merk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->warna);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_jenis);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_wilayah);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga_sewa);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kondisi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=mobil.doc");

        $data = array(
            'mobil_data' => $this->Mobil_model->get_all(),
            'start' => 0
        );

        $this->load->view('mobil/mobil_doc',$data);
    }

}

/* End of file Mobil.php */
/* Location: ./application/controllers/Mobil.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-29 13:50:53 */
/* http://harviacode.com */
