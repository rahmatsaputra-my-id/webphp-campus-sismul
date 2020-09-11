<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Beranda extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('mhome');
    $this->load->model('mlogin');
      if ($this->session->userdata('nama')) {
        redirect(base_url("home"));
    }
  }

  public function index(){
    $data['contents'] = $this->mhome->getData(NULL, array('idField' => 'id',
     'img' => 'file_name', 'judulField' => 'judul'), 'post', FALSE);

    $this->load->view('include/header_beranda');
    $this->load->view('beranda', $data);
    $this->load->view('include/footer_beranda');
  }

  public function flogin(){
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('include/header_beranda');
      $this->load->view('login');
      $this->load->view('include/footer_beranda');
    }else{
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $where = array(
      'username' => $username,
      'password' => $password
      );
      $cek = $this->mlogin->cek_login("user",$where)->num_rows();
      if($cek > 0){
   
        $data_session = array(
          'nama' => $username,
          'status' => "Login"
          );
   
        $this->session->set_userdata($data_session);
   
        redirect(base_url("home"));
   
      }else{
        echo '<script>alert("Username dan Password tidak valid!");</script>';
        $this->load->view('include/header_beranda');
        $this->load->view('login');
        $this->load->view('include/footer_beranda');
      }   
    }
  }

  

  public function detailContent($idContent){
    $data['detail'] = $this->mhome->getData(array('id' => $idContent), NULL,'post', TRUE);

    $this->load->view('include/header_beranda');
    $this->load->view('detail_content', $data);
    $this->load->view('include/footer_beranda');
  }

  
  

}


