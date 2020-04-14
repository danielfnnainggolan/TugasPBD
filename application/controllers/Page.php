<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends MY_Controller {

  public function __construct()
	{
    parent::__construct();

    $this->load->model('BangunanModel','BangunanModel');
    $this->load->model('UserModel');
  }

  public function welcome(){
    $tipe_user = $this->session->userdata('tipe_user');
    if($tipe_user == 'admin'){
      $this->load->view('v_home');
    }
    else if($tipe_user == 'operator'){
      $this->load->view('v_home');
    }
    else{
      $this->load->view('v_home');
    }
  }

  public function data_user(){
    $result = $this->UserModel->getUser();
    $data['user'] = $result;
      $this->load->view('data_user', $data);
  }


  public function profil_user(){
    $result = $this->UserModel->getProfile();
    $data['nama'] = $result->nama;
    $data['email'] = $result->email;
    $data['username'] = $result->username;
    $data['id'] = $result->id_user;
    $this->load->view('profil_user', $data);

  }
}
