<?php 

	class M_masuk extends CI_Model{

		function cek_masuk($tabel,$where){
			return $this->db->get_where($tabel,$where);
		}	
	}

 ?>