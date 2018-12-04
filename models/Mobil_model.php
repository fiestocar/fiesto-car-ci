<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mobil_model extends CI_Model
{

    public $table = 'mobil';
    public $id = 'id_mobil';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_mobil', $q);
	$this->db->or_like('no_plat', $q);
	$this->db->or_like('merk', $q);
	$this->db->or_like('warna', $q);
	$this->db->or_like('tahun', $q);
	$this->db->or_like('id_jenis', $q);
	$this->db->or_like('id_wilayah', $q);
	$this->db->or_like('harga_sewa', $q);
	$this->db->or_like('id_kondisi', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
      $this->db->select("*,j.nama_jenis");
      $this->db->select("w.kota");
      $this->db->select("k.kondisi");
        $this->db->order_by($this->id, $this->order);
        $this->db->like('m.id_mobil', $q);
	$this->db->or_like('m.no_plat', $q);
	$this->db->or_like('m.merk', $q);
	$this->db->or_like('m.warna', $q);
	$this->db->or_like('m.tahun', $q);
	$this->db->or_like('m.id_jenis', $q);
	$this->db->or_like('m.id_wilayah', $q);
	$this->db->or_like('m.harga_sewa', $q);
	$this->db->or_like('m.id_kondisi', $q);
  $this->db->join('jenis j','m.id_jenis=j.id_jenis','left');
  $this->db->join('wilayah w','m.id_wilayah=w.id_wilayah','left');
  $this->db->join('kondisi k','m.id_kondisi=k.id_kondisi','left');
	$this->db->limit($limit, $start);
        return $this->db->get($this->table." m")->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Mobil_model.php */
/* Location: ./application/models/Mobil_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-29 13:50:53 */
/* http://harviacode.com */
