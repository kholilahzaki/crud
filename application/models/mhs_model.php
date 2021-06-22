<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class mhs_model extends CI_Model {
  public function view(){
    return $this->db->get('daftar_mhs')->result();
  }
 
  public function view_by($nrp){
    $this->db->where('nrp', $nrp);
    return $this->db->get('daftar_mhs')->row();
  }
 
  public function validation($mode){
    $this->load->library('form_validation');
    if($mode == "save")
      $this->form_validation->set_rules('input_nrp', 'NRP', 'required|max_length[50]');
   
    $this->form_validation->set_rules('input_nama', 'Nama', 'required|max_length[50]');
    $this->form_validation->set_rules('input_alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('input_nohp', 'No HP', 'required');
    $this->form_validation->set_rules('input_jurusan', 'Jurusan', 'required');
     
    if($this->form_validation->run())
      return TRUE;
    else
      return FALSE;
  }
 
  public function save(){
    $data = array(
      "nrp" => $this->input->post('input_nrp'),
      "nama" => $this->input->post('input_nama'),
      "alamat" => $this->input->post('input_alamat'),
      "no_hp" => $this->input->post('input_nohp'),
      "jurusan" => $this->input->post('input_jurusan')
    );
   
    $this->db->insert('daftar_mhs', $data);
  }
 
  public function edit($nrp){
    $data = array(
      "nama" => $this->input->post('input_nama'),
      "alamat" => $this->input->post('input_alamat'),
      "no_hp" => $this->input->post('input_nohp'),
      "jurusan" => $this->input->post('input_jurusan')
    );
   
    $this->db->where('nrp', $nrp);
    $this->db->update('daftar_mhs', $data);
  }
 
  public function delete($nrp){
    $this->db->where('nrp', $nrp);
    $this->db->delete('daftar_mhs');
  }
}