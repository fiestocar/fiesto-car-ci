<?php 

	//MASUK SEBAGAI MEMBER
	class Supirfiesto extends CI_Controller{

		function __construct(){
			parent::__construct();		
			
			if (!$this->session->userdata('ket') == 'masuk') {
				redirect(base_url());
			}
		}

		function index(){
			$this->load->view('supirfiesto/akun');
		}

		function keluar(){
			$this->session->sess_destroy();
			redirect(base_url());
		}

	}

?>