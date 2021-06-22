<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Daftar_mhs extends CI_Controller {
 
  public function __construct(){
    parent::__construct();
   
    $this->load->model('mhs_model');
  }
 
  public function index(){
    $data['daftar_mhs'] = $this->mhs_model->view();
    $this->load->view('daftar_mhs/index', $data);
  }
 
  public function tambah(){
    if($this->input->post('submit')){
      if($this->mhs_model->validation("save")){
        $this->mhs_model->save();
        redirect('daftar_mhs');
      }
    }
   
    $this->load->view('daftar_mhs/form_tambah');
  }
 
  public function ubah($nrp){
    if($this->input->post('submit')){
      if($this->mhs_model->validation("update")){
        $this->mhs_model->edit($nrp);
        redirect('daftar_mhs');
      }
    }
   
    $data['daftar_mhs'] = $this->mhs_model->view_by($nrp);
    $this->load->view('daftar_mhs/form_ubah', $data);
  }
 
  public function hapus($nrp){
    $this->mhs_model->delete($nrp);
    redirect('daftar_mhs');
  }
}