<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('UserModel');
  }

  public function index(){
    if($this->session->userdata('authenticated'))
      redirect('page/welcome');

    $this->load->view('v_login');
  }

  public function aksi_login(){
   $username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
   $password = sha1($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5

   $user = $this->UserModel->get($username); // Panggil fungsi get yang ada di UserModel.php

   if(empty($user)){ // Jika hasilnya kosong / user tidak ditemukan
     $this->session->set_flashdata('message', 'Username tidak ditemukan'); // Buat session flashdata
     redirect('login'); // Redirect ke halaman login
   }else{
     if($password == $user->password){ // Jika password yang diinput sama dengan password yang didatabase
       $session = array(
         'authenticated'=>true, // Buat session authenticated dengan value true
         'username'=>$user->username,
         'id'=>$user->id_user,// Buat session username
         'nama'=>$user->nama,
         'tipe_user'=>$user->tipe_user// Buat session authenticated
       );

       $this->session->set_userdata($session); // Buat session sesuai $session
       redirect('page/welcome'); // Redirect ke halaman welcome
     }else{
       $this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
       redirect('login'); // Redirect ke halaman login
     }
   }
 }

 public function register() {
   $this->load->view('v_register');
 }

 public function aksi_register(){
  $data['username'] = $this->input->post('username');
  $data['password'] = sha1($this->input->post('password'));
  $data['tipe_user'] = 'user';

  $result = $this->UserModel->register($data);
  if($result){
      echo '<script language="javascript">alert("Success!")</script>';
      redirect('login'); // Redirect ke halaman login
  }else{
      echo '<script language="javascript">alert("Failed!")</script>';
      redirect('home/register'); // Redirect ke halaman register
  }
}




  public function aksi_logout(){
    $this->session->sess_destroy(); // Hapus semua session
    redirect('login'); // Redirect ke halaman login
  }
}
