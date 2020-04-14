<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load library phpspreadsheet


class User extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
		$this->load->model('UserModel');
	}

	//<-Function which used in User Page ->
	public function addUser(){
		$data['username'] = $this->input->post('u_username');
		$data['password'] = md5($this->input->post('u_password'));
    $data['name'] = $this->input->post('u_name');
    $data['level'] = $this->input->post('u_level');

		$result = $this->UserModel->addUser($data);
		if($result){
		    redirect('page/data_user');
		}else{
		    redirect('page/data_user');
		}
	}

	public function deleteByID(){
		$user_id = $this->input->post('u_id');

        $result = $this->UserModel->deleteUser($user_id);
		if($result){
		    redirect('page/data_user');
		}else{
		    redirect('page/data_user');
		}
	}

	public function deleteAll(){
        $result = $this->UserModel->deleteAll();
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_user');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_user');
		}
	}

	public function updateUser(){
		$data['id_user'] = $id = $this->session->userdata('id');
		$data['username'] = $this->input->post('username');
    $data['nama'] = $this->input->post('nama');
    $data['email'] = $this->input->post('email');
		$result = $this->UserModel->updateUser($data);
		if($result){
			  redirect('page/welcome');
			}
	}
}
