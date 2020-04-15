<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends MY_Controller {

  public function __construct()
	{
    parent::__construct();
    $this->load->library('pdf');

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

  public function editUser(){
    $id = $this->uri->segment(3);
    $result = $this->UserModel->getProfile();
    $data['nama'] = $result->nama;
    $data['email'] = $result->email;
    $data['username'] = $result->username;
    $data['id'] = $result->id_user;
    $this->load->view('edit_user', $data);
  }




  public function deleteUser(){
    $id = $this->uri->segment(3);
    $result = $this->UserModel->deleteUser($id);
    $this->load->view('data_user', $data);
    if($result){
      redirect('page/data_user');
    }
  }

  public function data_markers(){
    $result = $this->BangunanModel->get();
    $data['bangunan'] = $result;
    $this->load->view('data_markers', $data);

  }

  public function exportBangunan(){
      $pdf = new FPDF('l','mm','A5');
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',16);
      $pdf->Cell(190,7,'Data Marker Bangunan',0,1,'C');
      $pdf->Cell(10,7,'',0,1);
      $pdf->SetFont('Arial','B',10);
      $pdf->SetLeftMargin(50);
      $pdf->Cell(50,6,'Nama Bangunan',1,0,'C');
      $pdf->Cell(27,6,'Latitude',1,0,'C');
      $pdf->Cell(27,6,'Longitude',1,1,'C');
      $pdf->SetFont('Arial','',10);
      $bangunan = $this->db->get('bangunan')->result();
      foreach ($bangunan as $row){
          $pdf->Cell(50,6,$row->bangunan_nama,1,0,'C');
          $pdf->Cell(27,6,$row->bangunan_lat,1,0,'C');
          $pdf->Cell(27,6,$row->bangunan_long,1,1,'C');
          //$pdf->Cell(25,6,$row->,1,1);
      }
      $pdf->Output();
  }


}
