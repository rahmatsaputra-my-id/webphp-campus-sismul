<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Home extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('mhome');
    $this->load->model('mlogin');
    if (!$this->session->userdata('nama')) {
        redirect(base_url("Beranda"));  
    }
  }

  public function index(){
    $id_user = $this->session->userdata('nama');
    $data['contents'] = $this->mhome->getData(array('user_id' => $id_user), array('idField' => 'id','img' => 'file_name', 'judulField' => 'judul'), 'post', FALSE);

    $this->load->view('include/header');
    $this->load->view('home', $data);
    $this->load->view('include/footer');
  }

   public function register(){
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]');
    $this->form_validation->set_rules('repassword', 'RePassword', 'trim|required|max_length[50]');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('include/header');
      $this->load->view('register');
      $this->load->view('include/footer');
    }else{
    $data['username'] = $this->input->post('username');
    $data['password'] = $this->input->post('password');
    $data['repassword'] = $this->input->post('repassword');
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $repassword = $this->input->post('repassword');

      $where = array(
      'username' => $username
      );

      $cek = $this->mlogin->cek_login("user",$where)->num_rows();
      if($cek > 0){
   
        $data_session = array(
          'nama' => $username,
          'status' => "Login"
          );
        
        echo '<script>alert("Pendaftaran Gagal! Username telah digunakan");</script>';
        $this->session->set_userdata($data_session);
   
        $this->load->view('include/header');
        $this->load->view('register');
        $this->load->view('include/footer');
      
      }else if($password != $repassword){
 
      echo '<script>alert("Pendaftaran Gagal! password tidak match");</script>';
      $this->load->view('include/header');
      $this->load->view('register');
      $this->load->view('include/footer');

      }else{
        $this->mlogin->cek_register($data);
        echo '<script>alert("Pendaftaran Berhasil!");</script>';
        $this->load->view('include/header');
        $this->load->view('register');
        $this->load->view('include/footer');
      }   
    }
  }


  public function logout(){
    $this->session->unset_userdata("nama"); 
    $this->session->unset_userdata("status");
    $this->session->unset_userdata("user_id");
      redirect(base_url("Beranda/flogin"));
  }
  
  public function create(){
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('judul', 'Judul', 'required|max_length[50]');
    $this->form_validation->set_rules('asal', 'Asal', 'required|max_length[50]');
    $this->form_validation->set_rules('desc_foto', 'Desc_foto', 'required|max_length[50]');
    $this->form_validation->set_rules('desc', 'Description', 'required');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('include/header');
      $this->load->view('create');
      $this->load->view('include/footer');
    }else{
      $judul = $this->input->post('judul');
      $asal = $this->input->post('asal');
      $desc = $this->input->post('desc');
      $desc_foto = $this->input->post('desc_foto');

      $id = uniqid($judul.'-', TRUE);
      $config['upload_path'] = './asset/upload/';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['max_size'] = '100000';
      $config['file_ext_tolower'] = 'true';
      $config['file_name'] = str_replace('.', '_', $id);

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('image')) {
        $this->session->set_flashdata('error', $this->upload->display_errors('<p class="z-depth-4 card-panel red darken-1"><strong>Oh snap!</strong> ', '</p>'));
        redirect('home/create');
      }else {
        $file_name = $this->upload->data('file_name');
        $data = array(
          'user_id'     => $this->session->userdata('nama'),
          'judul'       => $judul,
          'asal'        => $asal,
          'desc_foto'   => $desc_foto,
          'description' => $desc,
          'file_name'   => $file_name
        );

        $this->mhome->inputData('post', $data);
        redirect("home");
      }
    }
  }

  public function detailContent($idContent){
    $data['detail'] = $this->mhome->getData(array('id' => $idContent), NULL,'post', TRUE);

    $this->load->view('include/header');
    $this->load->view('detail_content', $data);
    $this->load->view('include/footer');
  }

  public function manage(){
    $id_user = $this->session->userdata('nama');
    $data['manages'] = $this->mhome->getData(array('user_id' => $id_user),array('idf' => 'id', 'img' => 'file_name', 'judulF' => 'judul'), 'post', FALSE);

    $this->load->view('include/header');
    $this->load->view('manage', $data);
    $this->load->view('include/footer');
  }

  public function delete($idContent){
    $content = $this->mhome->getData(array('id' =>$idContent), array('filename' => 'file_name'), 'post', TRUE);
    $this->mhome->deleteData(array('id' => $idContent), 'post');

    unlink("./asset/upload/".$content['file_name']);
    redirect('home/manage');
  }

  public function edit($idContent){
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('name', "Content's Name", 'required|max_length[50]');
    $this->form_validation->set_rules('asal', "Content's Name", 'required|max_length[50]');
    $this->form_validation->set_rules('desc_foto', "Content's Name", 'required|max_length[50]');
    $this->form_validation->set_rules('desc', 'Content\'s Name', 'required');
    $this->form_validation->set_rules('image', 'Content\'s Name');
    
    if ($this->form_validation->run() === FALSE) {
      $data['edit'] = $this->mhome->getData(array('id' => $idContent), NULL, 'post', TRUE);

      $this->load->view('include/header');
      $this->load->view('edit', $data);
      $this->load->view('include/footer');
      } else {
        $name = $this->input->post('name');
        $asal = $this->input->post('asal');
        $desc_foto = $this->input->post('desc_foto');
        $desc = $this->input->post('desc');

        $id = uniqid($name."-",TRUE);

        $edit = array(
          "judul"       => $name,
          "asal"        => $asal,
          "desc_foto"   => $desc_foto,
          "description" => $desc
        );

        if (!empty($this->input->post('file'))) {
          $post = $this->mhome->getData(array('id' => $idContent), NULL, 'post', TRUE);

          $config['upload_path']      = './asset/upload/';
          $config['allowed_types']    = 'jpg|jpeg|png';
          $config['max_size']         = '100000';
          $config['file_ext_tolower'] = TRUE;
          $config['overwrite']        = TRUE;
          $config['file_name']        = $post['file_name'];
          
          $this->load->library('upload', $config);
          if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('error', $this->upload->display_errors('<p class="z-depth-4 card-panel red darken-1"><strong>Oh snap!</strong>', '</p>'));
            redirect('home/edit/'.$idContent);
            } else{
              $this->mhome->updateData(array('id' => $idContent), $edit, 'post');
              redirect('home/manage');
            }
          } else{
            $this->mhome->updateData(array('id' => $idContent), $edit, 'post');
            redirect('home/manage');
          }
          
      }
  }



}


