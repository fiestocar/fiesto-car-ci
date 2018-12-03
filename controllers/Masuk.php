<?php 

	class Masuk extends CI_Controller{

		function __construct(){
			parent::__construct();		
			$this->load->model('m_masuk');

			switch ($this->session->userdata('status')) {
				case 'admin':
					redirect(base_url());
					break;
				case 'member':
					redirect(base_url('fiesto_car'));
					break;
				case 'supir':
					redirect(base_url('supirfiesto'));
					break;
			}
		}

		function index(){
			$this->load->view('autentifikasi/masuk');
		}

		function proses_masuk(){
			$email = $this->input->post('email');
			$kata_sandi = $this->input->post('kata_sandi');
			$query = array(
				'email' => $email,
				'kata_sandi' => md5($kata_sandi)
			);

			$cek = $this->m_masuk->cek_masuk("member",$query)->num_rows();
			if($cek > 0){
				$hasil = $this->m_masuk->cek_masuk("member",$query)->row_array();
				switch ($hasil['status']) {
					case 1:
						//masuk admin
							$data_sesi = array(
								'nama' => $hasil['nama_member'],
								'email' => $email,
								'status' => "admin",
								'ket' => "masuk");
							$this->session->set_userdata($data_sesi);
						break;
					case 2:
						//masuk member
							$data_sesi = array(
								'nama' => $hasil['nama_member'],
								'email' => $email,
								'status' => "member",
								'ket' => "masuk"
							);
							$this->session->set_userdata($data_sesi);
							redirect(base_url("fiesto_car"));
						break;
					case 3:
						//masuk supir
							$data_sesi = array(
								'nama' => $hasil['nama_member'],
								'email' => $email,
								'status' => "supir",
								'ket' => "masuk"
							);
							$this->session->set_userdata($data_sesi);
							redirect(base_url("supirfiesto"));
						break;
					default:
						$this->session->sess_destroy();
						break;
				}
			}else{
				$this->session->set_flashdata('gagal_masuk',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Email atau Kata Sandi Salah</strong> silahkan coba lagi.
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect(base_url("masuk"));
			}
		}
	}

 ?>