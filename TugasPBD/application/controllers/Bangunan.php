<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bangunan extends CI_Controller {
	 public function __construct() {
		 	parent::__construct();
			$this->load->model('BangunanModel');
			$this->load->library('form_validation');
	 }

	 public function bangunan_json()
	 {
		$data=$this->db->get('bangunan')->result();
		echo json_encode($data);
	 }


	 public function tambahTempat()
	 {
		 $gambar = $_FILES['gambar'];
	 	if($gambar == ''){

	 }else{
		 $config['upload_path']          = './assets/images/';
		 $config['allowed_types']        = 'gif|jpg|png';

		 $this->load->library('upload', $config);
		 if ($this->upload->do_upload('gambar')) {
			 $gambar = $this->upload->data("file_name");
		 }else{
			 echo "upload gagal";
		 }
	 }

	 $data['bangunan_nama'] = $this->input->post('nama_tempat');
	 $data['bangunan_lat'] = $this->input->post('latitude');
	 $data['bangunan_long'] = $this->input->post('longitude');
	 $data['bangunan_gambar'] = $gambar;

	 $result = $this->BangunanModel->addTempat($data);
	 if($result){
			 redirect('page/welcome');
	 }
	 }


	 public function deleteTempat($bangunan_id){
        $result = $this->BangunanModel->deleteTempat($bangunan_id);
		if($result){
		    redirect('page/welcome');
		}
	}

	public function editBangunan(){
    $id = $this->uri->segment(3);
    $result = $this->BangunanModel->getBangunan($id);
    $data['bangunan_nama'] = $result->bangunan_nama;
    $data['bangunan_lat'] = $result->bangunan_lat;
    $data['bangunan_long'] = $result->bangunan_long;
    $data['id'] = $result->bangunan_id;
    $this->load->view('edit_bangunan', $data);
  }

	public function updateBangunan() {
	 $data['bangunan_nama'] = $this->input->post('bangunan_nama');
 	 $data['bangunan_lat'] = $this->input->post('latitude');
 	 $data['bangunan_long'] = $this->input->post('longitude');
 	 $data['id'] = $this->input->post('id');
	 $result = $this->BangunanModel->updateBangunan($data);
	 if($result){
			 redirect('page/data_markers');
	 }
 }

	 public function deleteBangunan(){
		 $bangunan_id = $this->uri->segment(3);
     $result = $this->BangunanModel->deleteTempat($bangunan_id);
		if($result){
		    redirect('page/data_markers');
		}

  }
}
